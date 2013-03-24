<?php
//An arry with codes and corresponding languages
$lang_array = array(
"pt" => "yes",
"en" => "yes",
);

//Get list of languajes selected in the browser
$lang_browser = $_SERVER["HTTP_ACCEPT_LANGUAGE"];

//Get an array of languajes and print the corresponding value from $languajes_array
$lang = @str_split($lang_browser,2);
if($lang_array[$lang[0]] == "yes")
	require_once("../gerador/lang/".$lang[0].".php");
else
	require_once("../gerador/lang/en.php");
?>
