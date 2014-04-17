<?php /* Smarty version Smarty-3.1.8, created on 2013-11-10 02:56:18
         compiled from "/home/eurobalk/public_html/themes/PRS050107/maintenance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1162586604527ebd92c6a711-47283366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eccc528bd173d12c077f929cdb9585e0cd2eb06e' => 
    array (
      0 => '/home/eurobalk/public_html/themes/PRS050107/maintenance.tpl',
      1 => 1382023611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1162586604527ebd92c6a711-47283366',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'favicon_url' => 0,
    'css_dir' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527ebd92cfe517_60405375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527ebd92cfe517_60405375')) {function content_527ebd92cfe517_60405375($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/eurobalk/public_html/tools/smarty/plugins/modifier.escape.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>
		<title><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
</title>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)){?>
		<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'htmlall', 'UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)){?>
		<meta name="keywords" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_keywords']->value, 'htmlall', 'UTF-8');?>
" />
<?php }?>
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,follow" />
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
maintenance.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="maintenance">
        	<div class="header">
            <h1><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
logo.png" alt="EuroBalkan Shop" title="EuroBalkan Shop"/></h1>
            </div>
            <div id="content">
                
            <br><div id="construction">
            <img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
uc.png" alt="EuroBalkan Shop" title="EuroBalkan Shop"/>
            </div>
            <br>
            <p id="message">
				<?php echo smartyTranslate(array('s'=>'In order to perform site maintenance, our online shop has shut down temporarily.'),$_smarty_tpl);?>
<br /><br />
				<?php echo smartyTranslate(array('s'=>'We apologize for the inconvenience and ask that you please try again later.'),$_smarty_tpl);?>

			 </p>
			 <span style="clear:both;">&nbsp;</span>
            <br>Visit us on Location:
            <br><a href="http://maps.google.com/maps?q=Icon+II,+Jumeirah+Lake+Towers+Dubai,+United+Arab+Emirates&amp;ie=UTF8&amp;hnear=Icon+Tower+2+-+Emirates+Hills+-+Dubaj&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left" title="Show map">Icon II, Cluster L, Jumeirah Lake Towers, Dubai, U.A.E.</a>
            <br>call us: + 971 (0) 4362 0868
            <br /> or send us an E-mail: <a href="mailto:info@eurobalkanshop.com" style="color:#0000FF;text-align:left">info@eurobalkanshop.com</a>
			 
		</div>
	</body>
</html>
<?php }} ?>