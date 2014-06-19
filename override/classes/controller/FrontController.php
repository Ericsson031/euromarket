<?php

class FrontController extends FrontControllerCore
{
    public function setMedia()
    {
        parent::setMedia(); // CSS files
        Tools::addJS(_THEME_JS_DIR_.'isLoggedEmployee.js');
        Tools::addJS(_THEME_JS_DIR_.'jquery.cookie.js');
		//Tools::addJS(_THEME_JS_DIR_.'splash.js');
        Tools::addJS(_THEME_JS_DIR_.'stickyfooter.js');				
        Tools::addJS(_THEME_JS_DIR_.'IEstyling.js');
    }

}