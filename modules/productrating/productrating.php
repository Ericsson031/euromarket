<?php

if (!defined('_CAN_LOAD_FILES_'))
	exit;

require( dirname(__FILE__) . '/rating/_drawrating.php');
require( dirname(__FILE__) . '/rating/_config-rating.php');

/**
 * Modulo para prestashop:
 * 
 * Este modulo permite ao usuario colocar um forma de avaliação
 * dos seus produtos pelo cliente.
 * @package PrestashopBR.com
 * @author Dlani [Mend's] <mends@prestashopbr.com>
 * @autor GCCSystem | Gleriston <contato@prestashopbr.com>
 * @colaborator Carmonteiro
 * @copyright 2009
 * @version 0.92B
 */
class productrating extends Module
{
	function __construct()
	{
		$this->name 	= 'productrating';
		$this->tab 		= 'Products';
		$this->version  =  0.95;
		
		/** Tradução **/
		$this->l_rating	= $this->l('Give your rating now');
		$this->l_rating	= $this->l('Rating');
		$this->l_cast	= $this->l('cast');
		$this->l_votes	= $this->l('votes');
		$this->l_vote	= $this->l('vote');
		$this->l_out	= $this->l('out of');
		$this->l_thank	= $this->l('Thanks for voting!');	

		parent::__construct(); // The parent construct is required for translations

		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Product Rating');
		$this->description = $this->l('Rating products in AJAX');
	}
	
	function traduz($termo)
	{
		return $this->l($termo);
	}

	function install()
	{
		
		Configuration::updateValue('RATING_NUMBER', 5);
		Configuration::updateValue('RATING_STAR', '0001.gif');
		Configuration::updateValue('RATING_BGCL', 'f1f2f4');
		Configuration::updateValue('RATING_BDCL', 'd0d3d8');
		
		
		Db::getInstance()->Execute
			('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ratings` (
  			`id` varchar(11) NOT NULL,
  			`total_votes` int(11) NOT NULL default 0,
  			`total_value` int(11) NOT NULL default 0,
  			`used_ips` longtext,
  			PRIMARY KEY  (`id`)
			) ENGINE=InnoDB  AUTO_INCREMENT=3;');
		
		if (!parent::install())
			return false;
		if (!$this->registerHook('displayLeftColumnProduct'))
			return false;
		if (!$this->registerHook('displayHeader'))
			return false;
                if (!$this->registerHook('displayProductListReviews'))
			return false;
		return true;
	}
  
  function uninstall()
	{
    Db::getInstance()->Execute
			('DROP TABLE IF EXISTS '._DB_PREFIX_.'ratings');
		if (!parent::uninstall())
      return false;
		return true;
	}
  
	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>';
		
	
		if (Tools::isSubmit('submitStar'))
		{
			$star_pic 	= Tools::getValue('star_pic');
			$back_col 	= Tools::getValue('bgcolor');
			$bord_col 	= Tools::getValue('bdcolor');
			
			Configuration::updateValue('RATING_STAR', $star_pic);
			Configuration::updateValue('RATING_BGCL', $back_col);
			Configuration::updateValue('RATING_BDCL', $bord_col);
		}
				
		if (Tools::isSubmit('submit'))
		{
			$onllog 	= Tools::getValue('onllogg');
			Configuration::updateValue('RATING_ONLG', $onllog);
			
			$nbr = intval(Tools::getValue('nbr'));
			if (!$nbr OR $nbr <= 0 OR !Validate::isInt($nbr))
				$errors[] = $this->l('Invalid number');
			else
				Configuration::updateValue('RATING_NUMBER', $nbr);
			if (isset($errors) AND count($errors))
				$output .= $this->displayError(implode('<br />', $errors));
			else
				$output .= $this->displayConfirmation($this->l('Settings updated'));
		}
		
		return $output.$this->displayForm();
	}
	
	public function displayForm()
	{
		$star_pic	= Tools::getValue('star_pic', Configuration::get('RATING_STAR'));

		$array	= array(1,2,3,4,5,6,7,8,9,10);
		
		$output = '
		<a href="http://www.prestashopbr.com" title="PrestashopBR.com&trade;" >
		<img src="http://laboratorio.prestashopbr.com/img/logo.jpg" 
		style="float:left; margin-right:15px;" alt="PrestashopBR.com&trade;" /></a>
		<br /><br />
		
		<p><b>'.$this->l('Allow visitors vote to products with Star Rating.').'</b></p>
		<p>Powered by <i><b><font size="3px"><font color="green">Prestashop<font color="blue">BR</font>.com
		</font></font></b></i></p><div class="clear">
		';
		
		$output .= '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
				<label>'.$this->l('Number of Stars').'</label>
				<div class="margin-form">
					
				<select size="1" name="nbr">';
		
		foreach ( $array as $value )					
		$output .= "<option value=\"$value\" ".( Tools::getValue('nbr', Configuration::get('RATING_NUMBER')) == $value ?  ' SELECTED ' : false )." >$value</option>";
	
	
		$output .= '
				</select>
					
				<p class="clear">'.$this->l('The number of stars (default: 10)').'</p>
					
				</div>';
				
				
		$output .= '
			<label >'.$this->l('Only Logged').'</label>
			<div class="margin-form">
			<input type="checkbox" name="onllogg" value="1" '.( Tools::getValue('onllogg', Configuration::get('RATING_ONLG')) ? 'checked="checked"' : false ).' />
				<p class="clear">'.$this->l('Only logged user can vote.').'</p></div>';	
				
		$output .= '<center>
					<input type="submit" name="submit" value="'.$this->l('Save').'" class="button" />
				</center>
			</fieldset>
		</form><br />';
		
		/** STAR **/
		$output .= '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
		<fieldset>
			<legend><img src="../img/admin/themes.gif" />'.$this->l('Star').'</legend>';
			
		$star_pic	= Tools::getValue('star_pic', Configuration::get('RATING_STAR'));

		foreach ( $this->pegaArquivos() as $id => $value )
		{
			if ($star_pic ==  $value){
				$check = 'checked = "checked"'; 
			}else{
				$check = '';
			}
			
			$output .=  '

			<label style="width: 30px; float: left; margin-right: 7px; margin-bottom: 20px; padding: 0; 
			text-align: center;">
			<input type="radio" name="star_pic" value="'.$value.'" '.$check.' >';
						
			$output .=  '<img src="../modules/productrating/rating/stars/'.$value.'" />';
			
			$output .=  '</label>
			';
			
		}
		
		$output .= '<div class="clear"></div><hr>
			<label class="clear" >'.$this->l('Background Color').'</label>
			<div class="margin-form">
				<input type="text" size="7" name="bgcolor" value="'.
				Tools::getValue('bgcolor', Configuration::get('RATING_BGCL')).'" />
				<p class="clear">'.$this->l('Hexadecimal code color Ex. f1f2f4, or 0 for Transparent.').'</p></div>';
		
		$output .= '
			<label >'.$this->l('Border Color').'</label>
			<div class="margin-form">
				<input type="text" size="7" name="bdcolor" value="'.
				Tools::getValue('bdcolor', Configuration::get('RATING_BDCL')).'" />
				<p class="clear">'.$this->l('Hexadecimal code color Ex. d0d3d8, or 0 for None.').'</p></div>';

		$output .= '<br /><center><input type="submit" name="submitStar" value="'.$this->l('Save').'" 
			class="button" />
		</center>
		</fieldset>
		</form>';
		
		return $output;
	}

	public function pegaArquivos()
	{

		$diretorio				= dirname(__FILE__) . '/rating/stars/';
		
		$ponteiro 				= opendir( $diretorio  );

		while ( $nome_itens = readdir($ponteiro) )
		{
			$itens[] = $nome_itens ;
		}
		
		sort( $itens ) ;

		foreach ( $itens as $listar )
		{
			if ( $listar != "." && $listar != ".." && $listar != "Thumbs.db" )
			{
				if ( !is_dir($listar) )
				{
					$arquivos[] = $listar ;
				}
			}
		}
		
		return $arquivos;
		
	}

	function hookDisplayHeader($params)
	{
		global $smarty;
		
		$star_pic	= Tools::getValue('star_pic', 	Configuration::get('RATING_STAR'));
		$back_col   = Tools::getValue('bgcolor', 	Configuration::get('RATING_BGCL'));
		$bord_col	= Tools::getValue('bdcolor', 	Configuration::get('RATING_BDCL'));
				
		
		$smarty->assign( 'bdcolor', $bord_col );
		$smarty->assign( 'bgcolor', $back_col );
		$smarty->assign( 'star', 	$star_pic );
		
		return $this->display(__FILE__, 'productrating-header.tpl');
	}

	function hookDisplayLeftColumnProduct($params)
	{
		global $smarty, $cookie, $page_name, $logged;
		$onllog		=        Tools::getValue('onllog', 	Configuration::get('RATING_ONLG'));

		$number		=	Tools::getValue('nbr', Configuration::get('RATING_NUMBER'));

		$rating		=	rating_bar( Tools::getValue('id_product'),  $number);
		
		$static		=	rating_bar( Tools::getValue('id_product'), $number, 'static' );

		$smarty->assign( 'onllog', $onllog );
		$smarty->assign( 'rating', $rating );
		$smarty->assign( 'result', $static );
                return $this->display(__FILE__, 'productrating.tpl');
	}
        
        function hookDisplayProductListReviews($params)
        {
                
                $id_product = $params['product']['id_product'];
                
                global $smarty, $cookie, $page_name, $logged;
                
		$onllog		= Tools::getValue('onllog', 	Configuration::get('RATING_ONLG'));

		$number		=	Tools::getValue('nbr', Configuration::get('RATING_NUMBER'));

		$rating		=	rating_bar( $id_product,  $number);
		
		$static		=	rating_bar( $id_product, $number, 'static' );

                //print_r($params['product']['id_product']);
                $smarty->assign( 'id_prod', $id_product);
		
		$smarty->assign( 'onllog', $onllog );
		$smarty->assign( 'rating', $rating );
		$smarty->assign( 'result', $static );
                
                
            return $this->display(__FILE__, 'productrating.tpl');
        }
}

?>
