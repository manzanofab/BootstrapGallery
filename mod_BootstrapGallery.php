<?php
/**
 * @copyright	Copyright (C) 2013 Fabian Manzano. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * I have test this extension installing in different sites, all of them has worked smoothly, however
 * I want to make myself clear that I am not responsable
 * of any misbehaviour that can cause the installation of this extension into your system.
 */

// no direct access
defined('_JEXEC') or die;
/*
JLoader::register('modBootstrapGalleryHelper', dirname(__FILE__).'/helper.php');
*/
$folder_name   = $params->get('folder');
$jquery   = $params->get('jquery');
$bmin   = $params->get('bmin');

if ($jquery == 1) {JHTML::script('modules/mod_BootstrapGallery/extras/jquery.js');	}
if ($bmin == 1) {JHTML::script('modules/mod_BootstrapGallery/extras/bootstrap.min.js');}

JHTML::stylesheet('modules/mod_BootstrapGallery/extras/fabian1.css');
//JHTML::script('modalfab.js', 'modules/mod_BootstrapGallery/extras/');
//JHTML::script('modules/mod_BootstrapGallery/extras/modalfab.js');


require_once dirname(__FILE__).'/helper.php';
//modBootstrapGalleryHelper::info($params); //here i am calling this static funciton
$check = modBootstrapGalleryHelper::check($params,$folder_name);//I need to check that the folder exist and that it has images
if ($check==null)//if null no images display error messsage
{
echo 
"<pre>Oops: Or I couldnt find any images in the folder, or<br /> I couldnt find a folder with the name of <span class='label label-warning'>".$params->get('folder')."</span><br>Please make sure the folder exist in the Media Manager (Content -> Media Manager)<br>If the folder exists, please double check that you have spell it correctly in the Module Menu: Basic Options.</pre>";	
}
else//there is images do the thumbs and diplay layout
{
//modBootstrapGalleryHelper::photos($params,$folder_name);
$layout = $params->get('layout', 'default');
require JModuleHelper::getLayoutPath('mod_BootstrapGallery', $layout);
}
?>