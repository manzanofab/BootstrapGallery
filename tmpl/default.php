<?php
/**
 * @copyright	Copyright (C) 2011 Fabian Manzano. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
/*
IMPORTANT
array 1 is 0
array 2 is 1.
position 1 in array 1 is 1
position 1 in array 2 is 1
*/
?>

<?php
$folder          = $params->get('folder');
$size            = $params->get('size')."px";
$scroll_height   = $size*1.15."px";
echo "<div class=\"cont\">";

$moduleclass_sfx = $params->get('moduleclass_sfx');
$files = glob("images/".$folder_name."/*.*");
$b = count($files);
$index =0 ;
for ($i=0; $i<$b; $i++) 
{ 
	$num = $files[$i];
	$base_name = basename($num);//get the name of photo
	list($width, $height) = getimagesize($num);
	
	if (is_numeric($width)) 
	{
		$w = $check [0][$i]."px";
		$h = $check [1][$i]."px";
			echo "<div class=\"image\">
			
			<a class=\"fabmod\" data-toggle=\"modal\" data-slide-index=\"$index\">
			<img src=\"$num\" alt=\"$base_name\" width=\"$w\" height=\"$h\"></a>
			
			</div>";

		$index++;
	}
}
echo "</div>";

echo "
<div id=\"myModal\" class=\"modal fade\">
    <div id=\"myCarousel\" class=\"carousel\">
        <div class=\"carousel-inner\">
            <div class=\"active item\">
                <div class=\"modal-body\">
                    <img src=\"$files[0]\" alt=\"$base_name\" width=\"91%\">
                </div>
            </div>";
for ($i=1; $i<count($files); $i++) {
		$num = $files[$i];
		$base_name = basename($num);//get the name of photo
		list($width, $height) = getimagesize($num);
		if (is_numeric($width)) 
		{
		echo "
            <div class=\"item\">
                <div class=\"modal-body\">
                    <img src=\"$num\" alt=\"$base_name\" width=\"91%\" >
                </div>
            </div>	
		";
		}//end is_numeric
	}//end for count files
	echo "
        </div>
        <!-- Carousel nav -->
        <a class=\"carousel-control left\" href=\"#myCarousel\" data-slide=\"prev\">&lsaquo;</a>
        <a class=\"carousel-control right\" href=\"#myCarousel\" data-slide=\"next\">&rsaquo;</a>
    </div>
</div>		
	";	
?>

<script type="text/javascript">
$(document).ready(function(){
var $myModal = $('#myModal').modal({show: false});
var $myCarousel = $('#myCarousel').carousel({'interval': false});

$('.fabmod').click(function() {
    $myModal.modal('show');
    $myCarousel.carousel($(this).data('slide-index'));
});

});
</script>
