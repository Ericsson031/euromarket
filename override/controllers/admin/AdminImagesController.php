<?php

class AdminImagesController extends AdminImagesControllerCore
{
    	protected function _regenerateThumbnails($type = 'all', $deleteOldImages = false)
	{
                //print_r('test contorl');
		$this->start_time = time();
		ini_set('max_execution_time', $this->max_execution_time); // ini_set may be disabled, we need the real value
		$this->max_execution_time = (int)ini_get('max_execution_time');
		$languages = Language::getLanguages(false);

		$process =
			array(
				array('type' => 'categories', 'dir' => _PS_CAT_IMG_DIR_),
				array('type' => 'manufacturers', 'dir' => _PS_MANU_IMG_DIR_),
				array('type' => 'suppliers', 'dir' => _PS_SUPP_IMG_DIR_),
				array('type' => 'scenes', 'dir' => _PS_SCENE_IMG_DIR_),
				array('type' => 'products', 'dir' => _PS_PROD_IMG_DIR_),
				array('type' => 'stores', 'dir' => _PS_STORE_IMG_DIR_)
			);
                

		// Launching generation process
		foreach ($process as $proc)
		{
			if ($type != 'all' && $type != $proc['type'])
				continue;

			// Getting format generation
			$formats = ImageType::getImagesTypes($proc['type']);
			if ($type != 'all')
			{
				$format = strval(Tools::getValue('format_'.$type));
				if ($format != 'all')
					foreach ($formats as $k => $form)
						if ($form['id_image_type'] != $format)
							unset($formats[$k]);
			}
                        
                        print_r('Last image:'.Configuration::get('last_image').'</br>');
                        print_r('Last watermark:'.Configuration::get('last_watermark').'</br>');
                        //Configuration::updateValue('last_image', 650);
                        //Configuration::updateValue('last_watermark', 1);
                            
			if ($deleteOldImages){
				$this->_deleteOldImages($proc['dir'], $formats, ($proc['type'] == 'products' ? true : false));
                        	Configuration::updateValue('last_image', 1);
                                Configuration::updateValue('last_watermark', 1);
                        	}
			
                         
                        // Generate new images*/
                        
                        if (($return = $this->_regenerateNewImages($proc['dir'], $formats, ($proc['type'] == 'products' ? true : false))) === true){
                                if (!count($this->errors)) $this->errors[] = sprintf(Tools::displayError('Cannot write %s images. Please check the folder\'s writing permissions %s.'), $proc['type'], $proc['dir']);
                        } elseif ($return == 'timeout') {
                                $this->errors[] = Tools::displayError('Only part of the images have been regenerated. The server timed out before finishing.');
                        }
                                
                        
                        // Generate watermarks
                        /*if ($proc['type'] == 'products') {
                                if ($this->_regenerateWatermark($proc['dir']) == 'timeout') $this->errors[] = Tools::displayError('Server timed out. The watermark may not have been applied to all images.');
                        }
                        print_r('regenerated');
                        */
                        // If no errors found, regenerate "no picture" images
                        if (!count($this->errors)) {
                                if ($this->_regenerateNoPictureImages($proc['dir'], $formats, $languages)) $this->errors[] = sprintf(Tools::displayError('Cannot write "No picture" image to (%s) images folder. Please check the folder\'s writing permissions.'), $proc['type']);
                        }
                        
                                                
                        /*
                        if (($return = $this->_regenerateNewImages($proc['dir'], $formats, ($proc['type'] == 'products' ? true : false))) === true)
			{
				if (!count($this->errors))
					$this->errors[] = sprintf(Tools::displayError('Cannot write %s images. Please check the folder\'s writing permissions %s.'), $proc['type'], $proc['dir']);
			}
			elseif ($return == 'timeout')
				$this->errors[] = Tools::displayError('Only part of the images have been regenerated. The server timed out before finishing.');
			else
			{
				if ($proc['type'] == 'products')
					if ($this->_regenerateWatermark($proc['dir']) == 'timeout')
						$this->errors[] = Tools::displayError('Server timed out. The watermark may not have been applied to all images.');
				if (!count($this->errors))
					if ($this->_regenerateNoPictureImages($proc['dir'], $formats, $languages))
						$this->errors[] = sprintf(
							Tools::displayError('Cannot write "No picture" image to (%s) images folder. Please check the folder\'s writing permissions.'),
							$proc['type']
						);
			}*/
                        
		}
		return (count($this->errors) > 0 ? false : true);
	}
        
        protected function _regenerateNewImages($dir, $type, $productsImages = false)
	{
                print_r('water');
		$result = Db::getInstance()->executeS('
		SELECT m.`name` FROM `'._DB_PREFIX_.'module` m
		LEFT JOIN `'._DB_PREFIX_.'hook_module` hm ON hm.`id_module` = m.`id_module`
		LEFT JOIN `'._DB_PREFIX_.'hook` h ON hm.`id_hook` = h.`id_hook`
		WHERE h.`name` = \'actionWatermark\' AND m.`active` = 1');
                
            print_r('new regen');
		if (!is_dir($dir))
			return false;

		$errors = false;
		if (!$productsImages)
		{
			foreach (scandir($dir) as $image)
				if (preg_match('/^[0-9]*\.jpg$/', $image))
					foreach ($type as $k => $imageType)
					{
						// Customizable writing dir
						$newDir = $dir;
						if ($imageType['name'] == 'thumb_scene')
							$newDir .= 'thumbs/';
						if (!file_exists($newDir))
							continue;
						if (!file_exists($newDir.substr($image, 0, -4).'-'.stripslashes($imageType['name']).'.jpg'))
						{
							if (!file_exists($dir.$image) || !filesize($dir.$image))
							{
								$errors = true;
								$this->errors[] = sprintf(Tools::displayError('Source file does not exist or is empty (%s)'), $dir.$image);
							}
							elseif (!ImageManager::resize($dir.$image, $newDir.substr($image, 0, -4).'-'.stripslashes($imageType['name']).'.jpg', (int)$imageType['width'], (int)$imageType['height']))
							{
								$errors = true;
								$this->errors[] = sprintf(Tools::displayError('Failed to resize image file (%s)'), $dir.$image);
							}
						}
						if (time() - $this->start_time > $this->max_execution_time - 10) // stop 4 seconds before the timeout, just enough time to process the end of the page on a slow server
							return 'timeout';
					}
		}
		else
		{
			foreach (Image::getAllImages() as $image)
			{
				$imageObj = new Image($image['id_image']);
				$existing_img = $dir.$imageObj->getExistingImgPath().'.jpg';
                                print_r($image['id_image']);
                                if(Configuration::get('last_image')<= (int)$image['id_image']){
				if (file_exists($existing_img) && filesize($existing_img))
				{
                                    print_r($image['id_image'].'-');
                                        print_r($imageObj->id_product.'</br>');
					foreach ($type as $imageType)				
						if (!file_exists($dir.$imageObj->getExistingImgPath().'-'.stripslashes($imageType['name']).'.jpg'))
							if (!ImageManager::resize($existing_img, $dir.$imageObj->getExistingImgPath().'-'.stripslashes($imageType['name']).'.jpg', (int)($imageType['width']), (int)($imageType['height'])))
							{
								$errors = true;
								$this->errors[] = Tools::displayError(sprintf('Original image is corrupt (%s) for product ID %2$d or bad permission on folder', $existing_img, (int)$imageObj->id_product));
							}
                                
                                
                                $moduleInstance = Module::getInstanceByName('watermark');
                                call_user_func(array($moduleInstance, 'hookActionWatermark'), array('id_image' => $imageObj->id, 'id_product' => $imageObj->id_product));

                                Configuration::updateValue('last_image', (int)$image['id_image']);
				}
				else
				{
					$errors = true;
					$this->errors[] = Tools::displayError(sprintf('Original image is missing or empty (%1$s) for product ID %2$d', $existing_img, (int)$imageObj->id_product));
				}
				if (time() - $this->start_time > $this->max_execution_time - 10) // stop 4 seconds before the tiemout, just enough time to process the end of the page on a slow server
					return 'timeout';
                        }
			}
		}

		return $errors;
	}
        
        /*
        protected function _regenerateWatermark($dir)
	{

		if ($result && count($result))
		{
			$productsImages = Image::getAllImages();
			foreach ($productsImages as $image)
			{
				$imageObj = new Image($image['id_image']);
                                if(Configuration::get('last_watermark')<= (int)$image['id_image']){
				if (file_exists($dir.$imageObj->getExistingImgPath().'.jpg')){
					$moduleInstance = Module::getInstanceByName('watermark');
                                call_user_func(array($moduleInstance, 'hookActionWatermark'), array('id_image' => $imageObj->id, 'id_product' => $imageObj->id_product));}
				Configuration::updateValue('last_watermark', (int)$image['id_image']);	
		}
                }}
	}*/
        
        /* Hook watermark optimization */
	protected function _regenerateWatermark($dir)
	{
            print_r('water');
		$result = Db::getInstance()->executeS('
		SELECT m.`name` FROM `'._DB_PREFIX_.'module` m
		LEFT JOIN `'._DB_PREFIX_.'hook_module` hm ON hm.`id_module` = m.`id_module`
		LEFT JOIN `'._DB_PREFIX_.'hook` h ON hm.`id_hook` = h.`id_hook`
		WHERE h.`name` = \'actionWatermark\' AND m.`active` = 1');

		if ($result && count($result))
		{
			$productsImages = Image::getAllImages();
			foreach ($productsImages as $image)
			{                                
				$imageObj = new Image($image['id_image']);
                                print_r($image['id_image'].'</br>');
                                if(Configuration::get('last_watermark')<= (int)$image['id_image']){
				if (file_exists($dir.$imageObj->getExistingImgPath().'.jpg'))
					foreach ($result as $module)
					{
						$moduleInstance = Module::getInstanceByName($module['name']);
						if ($moduleInstance && is_callable(array($moduleInstance, 'hookActionWatermark')))
							call_user_func(array($moduleInstance, 'hookActionWatermark'), array('id_image' => $imageObj->id, 'id_product' => $imageObj->id_product));
                                                //print_r($imageObj);
                                                Configuration::updateValue('last_watermark', (int)$image['id_image']);
						if (time() - $this->start_time > $this->max_execution_time - 10) // stop 4 seconds before the tiemout, just enough time to process the end of the page on a slow server
							return 'timeout';
                                }
                                
                              }
		}
	}
	}

        
}

