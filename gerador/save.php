<?php
$prev = new save();
		
$info = array();
$f1att = array();
$f2att = array();
$f3att = array();
$f1 = 1;
$f2 = 1;
$f3 = 1;

$info["width"] = $_POST["x"];
$info["height"] = $_POST["y"];
$info["margin"] = $_POST["margin"];
$info["text-stroke"] = 0;
$info["stroke-color"] = "undef";
$info["font"] = "undef";

$info["type"] = 0;

if($_POST["type"] == "a")
	$info["img_id"] = $_POST["imgid"];

if($_POST["f1"] == 0){
	$info["circles-id"] = -1;
	$f1 = 0;
}
				
if($_POST["f2"] == 0){
	$info["rectangles-id"] = -1;
	$f2 = 0;
}

if($_POST["f3"] == 0){
	$info["triangles-id"] = -1;
	$f3 = 0;
}
			
			
///////////////
//TAMANHO/QTD//
///////////////


////////
///F1///
////////
$f1att["qtd"] = $_POST["f1qtd"];

if($f1att["qtd"] > 350)
	$f1att["qtd"] = 350;

$f1att["raio"] = $_POST["f1r"];



////////
///F2///
////////
$f2att["qtd"] = $_POST["f2qtd"];

if($f2att["qtd"] > 350)
	$f2att["qtd"] = 350;

$f2att["max-width"] = $_POST["f2l"];
$f2att["max-height"] = $_POST["f2a"];


////////
///F1///
////////
if($_POST["f1e2"] == 1){
	if($_POST["f1e2a"] == 1)
		$f1att["fill-opacity"] = -1;
	else
		$f1att["fill-opacity"] = $_POST["f1e2q"];
}
else
	$f1att["fill-opacity"] = 100;

if($_POST["f1e3"] == 1){
	if($_POST["f1e3a"] == 1)
		$f1att["stroke-width"] = -1;
	else
		$f1att["stroke-width"] = $_POST["f1e3q"];
		
	if($_POST["f1e3b"] == 1){
		$f1att["stroke-min"] = "rand";
		$f1att["stroke-max"] = "rand";
	}
	else{
		$f1att["stroke-min"] = $_POST["f1e3r"];
		$f1att["stroke-max"] = $_POST["f1e3r_"];
	}
}
else
	$f1att["stroke-width"] = 0;

if($_POST["f1e4"] == 1){
	if($_POST["f1e4a"] == 1){
		$f1att["fill-min"] = "rand";
		$f1att["fill-max"] = "rand";
	}
	else{
		$f1att["fill-min"] = $_POST["f1e4q"];
		$f1att["fill-max"] = $_POST["f1e4q_"];
	}
}


////////
///F2///
////////
if($_POST["f2e2"] == 1){
	if($_POST["f2e2a"] == 1)
		$f2att["fill-opacity"] = -1;
	else
		$f2att["fill-opacity"] = $_POST["f2e2q"];
}
else
	$f2att["fill-opacity"] = 100;

if($_POST["f2e3"] == 1){
	if($_POST["f2e3a"] == 1)
		$f2att["stroke-width"] = -1;
	else
		$f2att["stroke-width"] = $_POST["f2e3q"];
		
	if($_POST["f2e3b"] == 1){
		$f2att["stroke-min"] = "rand";
		$f2att["stroke-max"] = "rand";
	}
	else{
		$f2att["stroke-min"] = $_POST["f2e3r"];
		$f2att["stroke-max"] = $_POST["f2e3r_"];
	}
}
else
	$f2att["stroke-width"] = 0;

if($_POST["f2e4"] == 1){
	if($_POST["f2e4a"] == 1){
		$f2att["fill-min"] = "rand";
		$f2att["fill-max"] = "rand";
	}
	else{
		$f2att["fill-min"] = $_POST["f2e4q"];
		$f2att["fill-max"] = $_POST["f2e4q_"];
	}
}

$result = $prev->save_img($id,$_POST["type"],$_POST["nome"],$info,$f1,$f2,$f3,$f1att,$f2att,$f3att);
?>