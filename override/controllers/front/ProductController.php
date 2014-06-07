<?php

class ProductController extends ProductControllerCore
{
    
    public function initContent()
        {
            $ethnicity_cat_id =130;
                            $catarray = Db::getInstance()->ExecuteS('SELECT cp.id_category,cl.name, cc.id_parent FROM 

            '._DB_PREFIX_.'category_product cp, '._DB_PREFIX_.'category_lang cl ,'._DB_PREFIX_.'category cc where cp.id_category=cl.id_category and cc.id_category=cl.id_category and

            cl.id_lang='.(int)(self::$cookie->id_lang).' and cp.id_product='.$this->product->id.' and 

            cp.id_category!=1 and cc.id_parent = '.$ethnicity_cat_id );
             
            $ethnicity= array_pop ($catarray);
             self::$smarty->assign('ethnicity',$ethnicity);
        return parent::initContent();
        }     
     
}

