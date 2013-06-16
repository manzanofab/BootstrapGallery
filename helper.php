<?php
/**
 * @copyright	Copyright (C) 2013 Fabian Manzano. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * I have test this extension installing in different sites, all of them has worked smoothly, however
 * this is my first extension ever publish in JED, and i want to make myself clear that I am not responsable
 * of any misbehaviour that can cause the installation of this extension into your system.
 */

// no direct access
defined('_JEXEC') or die;
//JLoader::register('ContentHelperRoute', JPATH_SITE.'/components/com_content/helpers/route.php');
class modBootstrapGalleryHelper
{
public static function check($params,$folder_name) 
		{
			//$folder_name   = $params->get('folder');
			$files = glob("images/".$folder_name."/*.*");
			$thumb_size    = $params->get('size');
			$size = array
					(
						array (),
						array ()
					);
			$b = count($files);
			if ($b==0) 
			{
				//return false;
				$check = null;
			}
			else
			{
				//check that there is at least 1 image;
				$cont = 0;
				for ($i=0; $i<$b; $i++) 
					{ 
					$image = $files[$i];
					//$base_name = basename($image);//get the name of photo
					list($width, $height) = getimagesize($image);
						if (is_numeric($width)) 
						{
							
				//$a = "<div class='fabresize img-rounded pagination-centered ' style='line-height:".$thumb_size."px ;height:".$thumb_size."px; width:".$thumb_size."px;'> ";
			if ($width >= $height)
				{
				$w = $width / $thumb_size;
				$h = $height / $w;
				$w = $thumb_size;
				}
			else
				{
				$h = $height / $thumb_size;
				$w = $width / $h;
				$h = $thumb_size;
				}
				$size[0][$i]=$w;
				$size[1][$i]=$h;
				
							$cont++;
						}
				}
				if ($count=0)
					{
						//return false;//they are files in the folder but non of them were images.
						$check = null;

					}
				else
					{
						//return true;	
						$check = $size;
					}
			}
			return $check;

		}
}	//class ends
