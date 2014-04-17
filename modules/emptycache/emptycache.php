<?php
/**
 * Protect your templates
 *
 * @category Prestashop
 * @category Module
 * @author Samdha <contact@samdha.net>
 * @copyright Samdha
 * @license commercial license see license.txt
 * @version 1.0.1.0
 * @license logo http://www.gnu.org/copyleft/gpl.html GPL
 * @see logo http://icones.pro/diabolique-visage-image-png.html
**/

if (!class_exists('emptycache', false)) {
	if (!defined('_PS_MODULE_DIR_')) // PS 1.0
		define('_PS_MODULE_DIR_', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR);
	require_once(_PS_MODULE_DIR_.'emptycache'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'modulesamdha.php');
	class emptycache extends modulesamdha
	{
		public $shortName = 'empcache';
		private $cacheDirs = array();

		function __construct()
		{
		 	$this->name = 'emptycache';
		 	$this->tab = version_compare(_PS_VERSION_, '1.4.0.0', '<')?'Tools':'administration';
		 	$this->version = '1.0.1.0';

		 	parent::__construct();

		 	/* The parent construct is required for translations */
			$this->page = basename(__FILE__, '.php');
			$this->displayName = $this->l('Empty cache');
			$this->description = $this->l('Allows you to clean Prestashop cache');
			if (version_compare(_PS_VERSION_, '1.5.0.0', '<')) {
				$this->cacheDirs = array(
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'compile',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'cache',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty_v2'.DIRECTORY_SEPARATOR.'cache',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty_v2'.DIRECTORY_SEPARATOR.'compile',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'cache',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'tmp'
				);
			} else {
				$this->cacheDirs = array(
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'compile',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'cache',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty_v2'.DIRECTORY_SEPARATOR.'cache',
					_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'tools'.DIRECTORY_SEPARATOR.'smarty_v2'.DIRECTORY_SEPARATOR.'compile',
					defined('_PS_CACHE_DIR_')?_PS_CACHE_DIR_:(_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'cache'),
					defined('_PS_TMP_IMG_DIR_')?_PS_TMP_IMG_DIR_:(_PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'tmp')
				);
			}
		}
		
		public function install()
		{
			if (version_compare(_PS_VERSION_, '1.5.0.0', '<')) {
				return (
					parent::install()
					&& $this->registerHook('header')
				);
			} else {
				return (
					parent::install()
					&& $this->registerHook('header')
					&& $this->registerHook('displayBackOfficeHeader')
				);
			}
		}

		public function _displayForm($token, $big = true, $space = false) {
			if (version_compare(_PS_VERSION_, '1.5.0.0', '>=')) {
				$currentIndex = AdminController::$currentIndex;
			} else
				global $currentIndex;

			$output = parent::_displayForm($token, false);
			$output .= '
				<form action="'.$currentIndex.'&amp;configure='.$this->name.'&amp;token='.$token.'" method="post">
					<fieldset class="width3">
						<legend>'.$this->l('Informations').'</legend>
						<p>
						'.$this->l('This module allows you to clean Prestashop cache.').'
						</p>
						<p>
						'.$this->l('Caching is used to speed up the display of page by saving its output to a file. If a cached version of the page is available, that is displayed instead of regenerating the output. Caching can speed things up tremendously but when you are working on your shop design or updating a module it\'s very annoying.').'
						</p>
						<p>
							<input type="submit" class="button" name="cleanCache" value="'.$this->l('Empty cache').' ('.$this->HumanReadableFilesize($this->getCacheSize()).')" />';
			if ($this->getFrontCookie()->{$this->name} == $this->config[$this->shortName.'token'])
				$output .= '&nbsp;<input type="submit" class="button" name="hideIcon" value="'.$this->l('Remove icon from header').'" />';
			else
				$output .= '&nbsp;<input type="submit" class="button" name="showIcon" value="'.$this->l('Show icon in header').'" />';
			$output .= '
						</p>
					</fieldset>
				</form>
				<br class="clear"/>
			';
			return $output;
		}

		public function _postProcess($token) {
			if (version_compare(_PS_VERSION_, '1.5.0.0', '>=')) {
				$currentIndex = AdminController::$currentIndex;
			} else
				global $currentIndex;

            if (!isset($this->config[$this->shortName.'token'])) {
                $this->config[$this->shortName.'token'] = Tools::passwdGen();
                Configuration::updateValue($this->shortName.'token', $this->config[$this->shortName.'token']);
            }
			if (Tools::isSubmit('cleanCache')) {
				$this->emptyTheCache();
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&conf=1&token='.$token);
			}
			if (Tools::isSubmit('showIcon')) {
				$this->getFrontCookie()->{$this->name} = $this->config[$this->shortName.'token'];
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&conf=6&token='.$token);
			}
			if (Tools::isSubmit('hideIcon')) {
				unset($this->getFrontCookie()->{$this->name});
				Tools::redirectAdmin($currentIndex.'&configure='.$this->name.'&conf=6&token='.$token);
			}
			return parent::_postProcess($token);
		}

		// set default config
		public function getDefaultConfig() 
		{
			$result = array(
				$this->shortName.'token' => NULL, // password for cookie
			);
			
			return $result;
		}
			
		public function hookdisplayBackOfficeHeader($params) 
		{
			return $this->hookHeader($params);
		}

		public function hookHeader($params) {
			if (version_compare(_PS_VERSION_, '1.5.0.0', '>=')) {
				$context = Context::getContext();
				$smarty = $context->smarty;
				$link = $context->link;
			} else {
				global $smarty, $link;
			}
			$this->getConfig();
			if (
				isset($this->config[$this->shortName.'token'])
				&& ($this->getFrontCookie()->{$this->name} == $this->config[$this->shortName.'token'])
			) {
				if (Tools::getValue($this->name)) {
					$this->emptyTheCache();
					Tools::redirectAdmin($this->getUrlWithoutParameter());
				}
				$smarty->assign(array(
					'cacheSize' => $this->HumanReadableFilesize($this->getCacheSize()),
					'this_path' => $this->_path
				));
				
				return $this->display(__FILE__, (version_compare(_PS_VERSION_, '1.5.0.0', '<')?'views/templates/hook/':'').$this->name.'.tpl');
			}
		}
		
		private function emptyTheCache() {
			foreach($this->cacheDirs as $dir)
				if (file_exists($dir))
					$this->emptydir($dir);
		}
		
		private function getCacheSize() {
			$size = 0;
			foreach($this->cacheDirs as $dir) {
				$size += $this->dirsize($dir);
			}
			return $size;
		}
		
		/** Usefull functions **/

		/**
		 * return the current url without a parameter
		 * @see Link::getUrlWith
		 *
		 * @param string $key the parameter
		 * @return string
		 **/
		public function getUrlWithoutParameter()
		{
			$url = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:($_SERVER['SCRIPT_NAME'].'?'.$_SERVER['QUERY_STRING']);
			$url = preg_replace('/'.$this->name.'=1&?/', '', $url);
			return rtrim($url, '?&');
		}
		
		/**
		 * Returns a human readable filesize
		 *
		 * @author      wesman20 (php.net)
		 * @author      Jonas John
		 * @version     0.3
		 * @link        http://www.jonasjohn.de/snippets/php/readable-filesize.htm
		 */
		function HumanReadableFilesize($size) {

			// Adapted from: http://www.php.net/manual/en/function.filesize.php

			$mod = 1024;

			$units = explode(' ','B KB MB GB TB PB');
			for ($i = 0; $size > $mod; $i++) {
				$size /= $mod;
			}

			return round($size, 2) . ' ' . $units[$i];
		}

		// http://www.php.net/manual/fr/function.rmdir.php#98622
		private function emptydir($dir) {
			if (is_dir($dir)) {
				$objects = scandir($dir);
				foreach ($objects as $object)
					if ($object != "." && $object != ".." && $object != 'index.php')
						if (is_dir($dir.DIRECTORY_SEPARATOR.$object))
							$this->emptydir($dir.DIRECTORY_SEPARATOR.$object);
						else
							@unlink($dir.DIRECTORY_SEPARATOR.$object);
				reset($objects);
			}
		}

		private function dirsize($dir) {
			$size = 0;
			if (is_dir($dir)) {
				$objects = scandir($dir);
				foreach ($objects as $object)
					if ($object != "." && $object != ".." && $object != 'index.php')
						if (is_dir($dir.DIRECTORY_SEPARATOR.$object))
							$size += $this->dirsize($dir.DIRECTORY_SEPARATOR.$object);
						else
							$size += filesize($dir.DIRECTORY_SEPARATOR.$object);
				reset($objects);
			}
			return $size;
		}

		private function getFrontCookie() {
			if (version_compare(_PS_VERSION_, '1.5.0.0', '>=')) {
				if (defined('_PS_ADMIN_DIR_')) {
					$cookie = Context::getContext()->cookie;
				} else {
					$cookie = new Cookie('psAdmin');
				}
			} else {
				if (defined('_PS_ADMIN_DIR_')) {
					$cookie = new Cookie('ps');
				} else {
					global $cookie;
				}
			}
			return $cookie;
		}
	}
}

?>
