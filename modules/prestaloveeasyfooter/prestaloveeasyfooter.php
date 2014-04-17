<?php
/* prestaloveeasyfooter.php version 1.0 created by PrestaLove.com */

class PrestaloveEasyFooter extends Module
{
	private $_html = '';

	public function __construct()
	{
		$this->name = 'prestaloveeasyfooter';
		$this->tab = 'front_office_features';
		$this->version = 1.0;
		$this->author = 'PrestaLove';
		$this->need_instance = 0;
		
		parent::__construct();
		$this->displayName = $this->l('PrestaLove Easy Footer');
		$this->description = $this->l('Custom Top, footer layout');
		$this->secure_key = Tools::encrypt($this->name);
		$this->module_key = 'dc473334279e5f4d66e33251624d968d';
	}

	public function install()
	{
		if(!parent::install() ||
			!$this->registerHook('header') ||
			!$this->registerHook('footer') ||	
			!$this->installDB())
			return false;
		return true;
	}

	public function installDb()
	{
  		Db::getInstance()->ExecuteS('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pl_easyfooter_lang` (
			  `id_plef` INT NOT NULL ,
			  `id_lang` INT NOT NULL ,
			  `title` VARCHAR( 128 ) NOT NULL ,
			  `content` TEXT NOT NULL 
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;');
			
		Db::getInstance()->ExecuteS('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pl_easyfooter` (
			`id_plef` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`name` VARCHAR( 128 ) NOT NULL ,
			`float` VARCHAR( 128 ) NOT NULL ,
			`css_class` VARCHAR( 128 ) NOT NULL ,
			`width` VARCHAR( 128 ) NOT NULL ,
			`margin` VARCHAR( 128 ) NOT NULL ,
			`padding` VARCHAR( 128 ) NOT NULL ,
      		`publish` TINYINT( 1 ) NOT NULL ,
			`order` INT NOT NULL 
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;');
		return true;
	}

	public function uninstall()
	{
		if(!parent::uninstall() || 
		   !$this->uninstallDB())
			return false;
		return true;
	}
	
	private function uninstallDb()
	{
		Db::getInstance()->ExecuteS('DROP TABLE `'._DB_PREFIX_.'pl_easyfooter`');
		Db::getInstance()->ExecuteS('DROP TABLE `'._DB_PREFIX_.'pl_easyfooter_lang`');
		return true;
	}

	public function getContent()
	{
    	global $cookie;
		$modules = Module::getModulesOnDisk();	
		
		$this->_html .= '<h2>'.$this->l('PrestaLove Easy Footer').'</h2>';
		
		if(Tools::isSubmit('submitPrestaLoveEasyFooter'))
    	{
			// Add data to database
			$this->addPLEasyFooter(Tools::getValue('name'), Tools::getValue('title'), Tools::getValue('content'), Tools::getValue('float_style'), Tools::getValue('css_class'), Tools::getValue('width'), Tools::getValue('margin'), Tools::getValue('padding'), Tools::getValue('publish'));
			$this->_html .= $this->displayConfirmation($this->l('The Block  has been added'));
    	}		
			
    	if(Tools::isSubmit('submitPrestaLoveEasyFooterRemove'))
    	{
      		$this->removePLEasyFooter(Tools::getValue('id_plef'));      
      		$this->_html .= $this->displayConfirmation($this->l('The Block has been removed'));
    	}		
		
		$flg_plef_edit = 0;
		if(Tools::isSubmit('submitPrestaLoveEasyFooterEdit'))
    	{
      		$id_plef = Tools::getValue('id_plef', 0);
			$plef_edit = $this->getPLEasyFooters(NULL, $id_plef);
			$flg_plef_edit = 1;
    	}
	
		if(Tools::isSubmit('submitPrestaLoveEasyFooterEdited'))
    	{
			$this->editPLEasyFooter(Tools::getValue('id_plef_edit', 0), Tools::getValue('name'), Tools::getValue('title'), Tools::getValue('content'), Tools::getValue('float_style'), Tools::getValue('css_class'), Tools::getValue('width'), Tools::getValue('margin'), Tools::getValue('padding'), Tools::getValue('publish'));
      
      		$this->_html .= $this->displayConfirmation($this->l('The Block has been edited'));
    	}
		
		
		if (Tools::isSubmit('id_plef') AND Tools::isSubmit('way') AND Tools::isSubmit('order'))
		{
			$this->_html .= $this->displayConfirmation($this->l('Order changed!'));
			if (Tools::getValue('way') == 0)
			{
				if (Db::getInstance()->Execute('
				UPDATE `'._DB_PREFIX_.'pl_easyfooter`
				SET `order` = '.((int)(Tools::getValue('order')) + 1).'
				WHERE `order` = '.((int)(Tools::getValue('order'))) ))
					Db::getInstance()->Execute('
					UPDATE `'._DB_PREFIX_.'pl_easyfooter`
					SET `order` = '.((int)(Tools::getValue('order'))).'
					WHERE `id_plef` = '.(int)(Tools::getValue('id_plef')));
			}
			elseif (Tools::getValue('way') == 1)
			{
				if(Db::getInstance()->Execute('
				UPDATE `'._DB_PREFIX_.'pl_easyfooter`
				SET `order` = '.((int)(Tools::getValue('order')) - 1).'
				WHERE `order` = '.((int)(Tools::getValue('order'))) ))
					Db::getInstance()->Execute('
					UPDATE `'._DB_PREFIX_.'pl_easyfooter`
					SET `order` = '.((int)(Tools::getValue('order'))).'
					WHERE `id_plef` = '.(int)(Tools::getValue('id_plef')));
			}
			Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
			
		}
		// Display content
		$this->_html .= '
		<fieldset>		
		<script type="text/javascript" src="../js/jquery/jquery.tablednd_0_5.js"></script>
		<script type="text/javascript" src="../modules/prestaloveeasyfooter/js/prestaloveeasyfooter.js"></script>
		<script type="text/javascript">PrestaLoveEasyFooterDnD(\''.$this->secure_key.'\');</script>
	    	<legend><img src="../img/admin/details.gif" alt="" title="" />'.$this->l('List of Blocks').'</legend>
      		<table style="width:100%;" class="table tableDnD"  id="tableplef">
        		<thead>
          			<tr>
						<th>'.$this->l('#').'</th>
						<th>'.$this->l('Order').'</th>
						<th>'.$this->l('Name').'</th>
						<th>'.$this->l('Float').'</th>
						<th>'.$this->l('CSS class').'</th>
						<th>'.$this->l('Width').'</th>
						<th>'.$this->l('Margin').'</th>
						<th>'.$this->l('Padding').'</th>
						<th>'.$this->l('Publish').'</th>
						<th>'.$this->l('Action').'</th>
				  	</tr>
        		</thead>
        		<tbody>';
          			$this->_html .=  $this->displayTableEasyFooter();
        		$this->_html .= '</tbody>
      		</table>
  		</fieldset><br /><br />';
	
		
		$this->_html .= '<h2 id="create_html">Create Block</h2>';

		/* Languages preliminaries */
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$iso = Language::getIsoById((int)($cookie->id_lang));
		$divLangName = 'title&curren;content';
		
		$isoTinyMCE = (file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en');
		$ad = dirname($_SERVER["PHP_SELF"]);
		$this->_html .=  '
			<script type="text/javascript">	
			var iso = \''.$isoTinyMCE.'\' ;
			var pathCSS = \''._THEME_CSS_DIR_.'\' ;
			var ad = \''.$ad.'\' ;
			</script>
			<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js"></script>
			<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce.inc.js"></script>';
		
		$this->_html .= '
   		<fieldset>
      		<legend><img src="../img/admin/add.gif" alt="" title="" />'.$this->l('Add/Edit Custom HTML Block').'</legend>
			
			<form action="'.$_SERVER['REQUEST_URI'].'#create_html" method="post" id="form">';
				$this->_html .= '
				<label for="css_class">'.$this->l('Name').'</label>      			
				<div class="margin-form">
					<input id="css_class" type="text" name="name" value="'. ($flg_plef_edit ? $plef_edit[0]['name'] : '' ) .'" size="60" />					
					<p class="clear">'.$this->l('Name of block').'</p>
				</div>';
				
				// Title of HTML block
				$this->_html .= '<label for="title">'.$this->l('Title').'</label>	
				<div class="margin-form">';
				
				foreach ($languages as $language)
				{
					$this->_html .= '
					<div id="title_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;">
						<input type="text" name="title['.$language['id_lang'].']" id="title_text_'.$language['id_lang'].'" size="60" value="';
						if($flg_plef_edit) {
							$plef_title = $this->getPLEasyFooters($language['id_lang'], $id_plef);
							$this->_html .= $plef_title[0]['title'];
						}
					$this->_html .= '" />
					</div>';
				}
				$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'title', true);
				$this->_html .= '</div><p class="clear">&nbsp;</p>';
				
				// Content of HTML block
				$this->_html .= '
				<label for="content">'.$this->l('Content').'</label> 
				<div class="margin-form">';
				foreach ($languages as $language)
				{
					$this->_html .= '
					<div id="content_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;">
						<textarea class="rte" cols="70" rows="10" id="content_textarea_'.$language['id_lang'].'" name="content['.$language['id_lang'].']">';
						if($flg_plef_edit) {
							$plef_content = $this->getPLEasyFooters($language['id_lang'], $id_plef);
							$this->_html .= $plef_content[0]['content'];
						}
						$this->_html .= '</textarea>
					</div>';
				 }
				
				$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'content', true);
				$this->_html .= '</div><p class="clear">&nbsp;</p>';
				$this->_html .= '
				<label for="float_style">'.$this->l('Float').'</label>      			
				<div class="margin-form">
					<select name="float_style">';
						$this->_html .= '<option value="none" ';
						if($flg_plef_edit) if($plef_edit[0]['float'] == '') $this->_html .= ' SELECTED ';
						$this->_html .= '>&lt;none&gt;</option>';
						$this->_html .= '<option value="left" ';
						if($flg_plef_edit) if($plef_edit[0]['float'] == 'left') $this->_html .= ' SELECTED ';
						$this->_html .= '>Float block to the left</option>';
						$this->_html .= '<option value="right" ';
						if($flg_plef_edit) if($plef_edit[0]['float'] == 'right') $this->_html .= ' SELECTED ';
						$this->_html .= '>Float block to the right</option>';
						$this->_html .= '<option value="center" ';
						if($flg_plef_edit) if($plef_edit[0]['float'] == 'center') $this->_html .= ' SELECTED ';
						$this->_html .= '>Position block in the center</option>';
						$this->_html .= '<option value="clear" ';
						if($flg_plef_edit) if($plef_edit[0]['float'] == 'clear') $this->_html .= ' SELECTED ';
						$this->_html .= '>Clear floats (block drops to a new line)</option>';
				$this->_html .= '
					</select>
					<p class="clear">'.$this->l('Change the position of this block').'</p>
				</div>';
				
				$this->_html .= '
				<label for="css_class">'.$this->l('Additional CSS classes').'</label>      			
				<div class="margin-form">
					<input id="css_class" type="text" name="css_class" value="'. ($flg_plef_edit ? $plef_edit[0]['css_class'] : '' ) .'" size="30" />					
					<p class="clear">'.$this->l('Optionally add additional CSS classes. Example: my-first-class my-second-class').'</p>
				</div>';
				
				$this->_html .= '
				<label for="Width">'.$this->l('Width').'</label>      			
				<div class="margin-form">
					<input id="width" type="text" name="width" value="'. ($flg_plef_edit ? $plef_edit[0]['width'] : '' ) . '" size="10" />
					<p class="clear">'.$this->l('Width of block: 220px or 30%').'</p>
				</div>';
				
				$this->_html .= '
				<label for="margin">'.$this->l('Margin').'</label>      			
				<div class="margin-form">
					<input id="margin" type="text" name="margin" value="'. ($flg_plef_edit ? $plef_edit[0]['margin'] : '0 10px' ) .'" size="30" />
					<p class="clear">'.$this->l('Extra margin outside block. Example: 0px 20px 20px 10px (top right bottom left)').'</p>
				</div>';
				
				$this->_html .= '
				<label for="padding">'.$this->l('Padding').'</label>      			
				<div class="margin-form">
					<input id="padding" type="text" name="padding" value="'. ($flg_plef_edit ? $plef_edit[0]['padding'] : '0' ) .'" size="30" />
					<p class="clear">'.$this->l('Extra padding inside block. Example: 0px 20px 20px 10px (top right bottom left)').'</p>
				</div>';
				$this->_html .= '
				<label>'.$this->l('Publish').'</label>
				<div class="margin-form">';
				if($flg_plef_edit) {
					if($plef_edit[0]['publish']) {
						$this->_html .= '<input type="radio" name="publish" value="1" checked /><img title="Enabled" alt="Enabled" src="../img/admin/enabled.gif"/>
						<input type="radio" name="publish" value="0" /><img title="Disabled" alt="Disabled" src="../img/admin/disabled.gif"/>';
					}
					else {
						$this->_html .= '<input type="radio" name="publish" value="1" /><img title="Enabled" alt="Enabled" src="../img/admin/enabled.gif"/>
						<input type="radio" name="publish" value="0" checked /><img title="Disabled" alt="Disabled" src="../img/admin/disabled.gif"/>';
					}
				}
				else {
					$this->_html .= '<input type="radio" name="publish" value="1" checked /><img title="Enabled" alt="Enabled" src="../img/admin/enabled.gif"/>
					<input type="radio" name="publish" value="0" /><img title="Disabled" alt="Disabled" src="../img/admin/disabled.gif"/>';
				}
				$this->_html .= '
				</div>';
				
				$this->_html .= '				
				<p class="center"> ';
				if(!$flg_plef_edit) {
					$this->_html .= '<input type="submit" name="submitPrestaLoveEasyFooter" value="'.$this->l('  Add  ').'" class="button" /> ';
				}
				else {
					$this->_html .= '<input type="hidden" name="id_plef_edit" value="'.$id_plef.'" /><input type="submit" name="submitPrestaLoveEasyFooterEdited" value="'.$this->l('  Save  ').'" class="button" /> ';
				}
		$this->_html .= '
		   	</form>
    	</fieldset><br /><br />';
		
				
		echo $this->_html;
	
	}

	private function addPLEasyFooter($name, $title, $content, $float, $css_class, $width, $margin, $padding, $publish)
	{
	    $order = 0;
	    $max_order = Db::getInstance()->ExecuteS('
			SELECT max(`order`) as mo
			FROM '._DB_PREFIX_.'pl_easyfooter');		
		if($max_order[0]['mo'] != NULL) $order = $max_order[0]['mo'] + 1;
		
		// Insert ID
		$getid =  Db::getInstance()->ExecuteS('SELECT MAX(id_plef) AS `id_plef` FROM `'._DB_PREFIX_.'pl_easyfooter`');
		
		$id_plef = 0;
		if($getid) $id_plef = $getid[0]["id_plef"] + 1;
		
		Db::getInstance()->autoExecute(
		  _DB_PREFIX_.'pl_easyfooter',
		  array(
			'id_plef'=>$id_plef,
			'name' => $name,
			'float' => $float,
			'css_class' => $css_class,
			'width' => $width,
			'margin' => $margin,
			'padding' => $padding,
			'publish' => $publish,
			'order' => (int)$order
		  ),
		  'INSERT'
		);
		// Add data on stmenu_lang table
		foreach($title as $id_lang=>$title)
		{
		  Db::getInstance()->autoExecute(
			_DB_PREFIX_.'pl_easyfooter_lang',
			array(
			  'id_plef'=>$id_plef,
			  'id_lang'=>$id_lang,
			  'title'=>$title,
			  'content' => $content[$id_lang]
			),
			'INSERT'
		  );
		}
	}
	
	private function editPLEasyFooter($id_plef, $name, $title, $content, $float, $css_class, $width, $margin, $padding, $publish)
	{
		global $cookie;
		// Update data on cycleslideshow table
		$queryUpdate = 'UPDATE `'._DB_PREFIX_.'pl_easyfooter`
				SET 
				`float` = "'. $float .'",
				`name` = "'. $name .'",
				`css_class` = "'. $css_class .'",
				`width` = "'. $width .'",	
				`margin` = "'. $margin .'",
				`padding` = "'. $padding .'",
				`publish` = "'. $publish .'" WHERE `id_plef` = '.intval($id_plef);

		Db::getInstance()->Execute($queryUpdate);
		foreach($title as $id_lang=>$title)
		{
			$data = array (
				'title' => $title,
				'content' => $content[$id_lang]
			);
			
			Db::getInstance()->AutoExecute(_DB_PREFIX_.'pl_easyfooter_lang', $data, 'UPDATE', '`id_lang` = '.(int)($id_lang) . ' AND `id_plef` = '.intval($id_plef));
		}		
	}
	
	private function removePLEasyFooter ($id_plef)
	{
		Db::getInstance()->delete(_DB_PREFIX_.'pl_easyfooter', "id_plef = '{$id_plef}'");
		Db::getInstance()->delete(_DB_PREFIX_.'pl_easyfooter_lang', "id_plef = '{$id_plef}'");
	}
	
	public function getPLEasyFooters($id_lang, $id_plef=NULL, $publish=NULL)
	{
		return Db::getInstance()->ExecuteS('
    		SELECT l.*, ll.*
    		FROM '._DB_PREFIX_.'pl_easyfooter l 
    		LEFT JOIN '._DB_PREFIX_.'pl_easyfooter_lang ll ON (l.id_plef = ll.id_plef AND ll.id_lang = "'.$id_lang.'") WHERE 1=1
    			'.((!is_null($id_plef)) ? 'AND l.id_plef = "'.$id_plef.'"' : '').'
				'.((!is_null($publish)) ? 'AND l.publish = "'.$publish.'"' : '').'	
			Order by `order`
    	');
	}
	
	private function displayTableEasyFooter()
	{	
		global $cookie;	
		$tablelistEasyFooter = '';
				
		$listEasyFooters = $this->getPLEasyFooters($cookie->id_lang);
		
		$count = 0;
		foreach($listEasyFooters as $listEasyFooter) {
			$tablelistEasyFooter .= '<tr id="tr_0_'.$listEasyFooter['id_plef'].'_'.$listEasyFooter['order'].'" '.($irow++ % 2 ? 'class="alt_row"' : '').'>';
			$tablelistEasyFooter .= '<td>'. ++$count .'</td>';
			$tablelistEasyFooter .= '<td class="center pointer dragHandle">
				<a'.(($listEasyFooter['order'] == (count($listEasyFooters) - 1) OR count($listEasyFooters) == 1) ? ' style="display: none;"' : '').' href="'.$currentIndex.'&configure=prestaloveeasyfooter&id_plef='.$listEasyFooter['id_plef'].'&position='.$position.'&way=1&order='.(int)($listEasyFooter['order'] + 1).'&token='.Tools::getAdminTokenLite('AdminModules').'">
					<img src="../img/admin/down.gif" alt="'.$this->l('Down').'" title="'.$this->l('Down').'" /></a>
				<a'.($listEasyFooter['order'] == 0 ? ' style="display: none;"' : '').' href="'.$currentIndex.'&configure=prestaloveeasyfooter&id_plef='.$listEasyFooter['id_plef'].'&position='.$position.'&way=0&order='.(int)($listEasyFooter['order'] - 1).'&token='.Tools::getAdminTokenLite('AdminModules').'">
					<img src="../img/admin/up.gif" alt="'.$this->l('Up').'" title="'.$this->l('Up').'" /></a>
						</td>';
			$tablelistEasyFooter .= '<td>'.$listEasyFooter['name'].'</td>';
			$tablelistEasyFooter .= '<td>'.$listEasyFooter['float'].'</td>';
			$tablelistEasyFooter .= '<td>'.$listEasyFooter['css_class'].'</td>';
			$tablelistEasyFooter .= '<td>'.$listEasyFooter['width'].'</td>';
			$tablelistEasyFooter .= '<td>'.$listEasyFooter['margin'].'</td>';
			$tablelistEasyFooter .= '<td>'.$listEasyFooter['padding'].'</td>';		
			$tablelistEasyFooter .= '<td class="center">'. ($listEasyFooter['publish'] == "1" ? '<img title="Enabled" alt="Enabled" src="../img/admin/enabled.gif" />' : '<img title="Disabled" alt="Disabled" src="../img/admin/disabled.gif" />').'</td>';
			$tablelistEasyFooter .= '<td> <form action="'.$_SERVER['REQUEST_URI'].'#create_html" method="post">
                <input type="hidden" name="id_plef" value="'.$listEasyFooter['id_plef'].'" />
				
				<button name="submitPrestaLoveEasyFooterEdit" class="button"><img src="../img/admin/edit.gif" alt="Edit" title="Edit" /></button>
          		<button name="submitPrestaLoveEasyFooterRemove" class="button" onclick="javascript:return confirm(\''.$this->l('Are you sure you want to remove this block?').'\');" ><img src="../img/admin/delete.gif" alt="Delete" title="Delete" /></button>
          		</form></td>';
			$tablelistEasyFooter .= '</tr>';			
		}
		return $tablelistEasyFooter;
	}
	

	public function hookFooter($params)
	{
		global $smarty, $cookie;
		$listPLEasyFooters = $this->getPLEasyFooters($cookie->id_lang, NULL, 1);
		$smarty->assign('LISTPLEFS', $listPLEasyFooters);
    	return $this->display(__FILE__, 'prestaloveeasyfooter.tpl');
	}
	
	public function hookHeader($params)
	{
		global $smarty;
		return $this->display(__FILE__, 'prestaloveeasyfooter-header.tpl');
	}
}
?>