<?php
require "classes/class.php";

$db = new db();
$img_id = $_GET["id"];
$token = $_GET["accesskey"];
$preview = $_GET["p"];
$gen = new generator();

echo $gen->drawing($img_id,$preview,$token);
?>