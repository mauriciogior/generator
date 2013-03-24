<?php
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');        
header('Content-Disposition: attachment; filename='.$_GET["name"].'.svg');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
require "classes/class.php";
echo '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" 
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';

$db = new db();
$img_id = $_GET["id"];
$token = $_GET["accesskey"];
$preview = $_GET["p"];
$gen = new generator();

echo $gen->drawing($img_id,$preview,$token);
?>