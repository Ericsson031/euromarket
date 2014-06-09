<?php

class Product extends ProductCore
{
    /** @var string product ethnicity*/
    public $ethnicity;
    
    //self::$definition['fields']['ethnicity'] = array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isString');
        
        public static function getProductProperties($id_lang, $row, Context $context = null)
        {   
            $row['ethnicity'] = self::getDefaultProductEthnicity($row['id_product']);
            return parent::getProductProperties($id_lang, $row, $context);
        }
    
    	public static function getDefaultProductEthnicity($id_product, Context $context = null)
	{
             $ethnicity_cat_id =130;
             $ethnicity = Db::getInstance()->getRow('SELECT cp.id_category,cl.name, cc.id_parent FROM 

            '._DB_PREFIX_.'category_product cp, '._DB_PREFIX_.'category_lang cl ,'._DB_PREFIX_.'category cc where cp.id_category=cl.id_category and cc.id_category=cl.id_category and

            cl.id_lang='.(int)Context::getContext()->language->id.' and cp.id_product='.$id_product.' and 

            cp.id_category!=1 and cc.id_parent = '.$ethnicity_cat_id );    
            return $ethnicity;
	}
}

