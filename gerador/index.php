<?php 
session_start();

require "src/facebook.php";
if($_GET["logout"]=="yes"){    
	if(isset($_SESSION["email"]))
		unset($_SESSION["email"]);
	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
	echo "<script>window.location='index.php';</script>";
}
require "classes/class.php";
require "template/template.php";
require "modules/fbconnect.php";

$db = new db();
if(!$db->connection()){
	switch($db->connection()){
	case -1:
		echo "FALHA NA CONEXÃO COM O BANCO.";
		break;
	case -2:
		echo "FALHA NA CONEXÃO COM A DB.";
		break;
	}
}
else {

$email = $_SESSION["email"];
if(!isset($_SESSION["user"]))
	include("modules/fbconnect.php");

$id = $db->dbconsultspec("users","email",$email,"r");
$id = $id[0];

if($_GET["d"] == 1){
	if(!empty($_GET["img_id"])){
		$result = $db->delete($_GET["img_id"],$id);
		if($result == -1)
			echo "<script>alert('".$LN["deleteerr1"]."')</script>";
		echo "<script>window.location='index.php'</script>";
	}
}
?>
	<?=$header?>
    <?php
	if(isset($_POST["create"])){
		echo $top_create.'
    	<div id="svg"></div>';
	}
	elseif(isset($_GET["edit"])){
		$canI = $db->checkid($_GET["img_id"],$id);
		if($canI == 1){
			echo $top_create.'<div id="svg"></div>';
			echo '
			<script>
			if (window.XMLHttpRequest){
			  xmlhttp=new XMLHttpRequest();
			}
			else{
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("svg").innerHTML=xmlhttp.responseText;
			  }
			}
			xmlhttp.open("GET","../gerador/generator.php?id='.$_GET['img_id'].'&accesskey='.$_GET['key'].'",true);
			xmlhttp.send();
			</script>
			';
		}
		else{
			echo "<script>alert('".$LN["editerr1"]."')</script>";
			echo "<script>window.location='index.php'</script>";
		}
	}
	else {
		if(isset($_POST["x"])){
			require_once("save.php");
		}
	?>
    <?=$title?>
	<?php if ($_SESSION["user"]){
		$me = $facebook->api('me', array('fields' => 'name'));?>
    	<?=$LN["signedinas"]?> <BR><h2>&nbsp;&nbsp;&nbsp;&nbsp;<?=strtoupper($me['name'])?></h2>
    <?php } elseif (isset($_SESSION["email"])) {?>
        <?=$LN["signedinas"]?> <BR><h2>&nbsp;&nbsp;&nbsp;&nbsp;<?=strtoupper($_SESSION["email"])?></h2>
	<?php } else { ?>
    	<?=$LN["welcome"]?>
    <?php } ?>
    <BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;<div class="fb-like" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false" data-font="arial"></div>
    <?=$content?>
            <DIV id="central" class="container" align="center">
				<?php
					if(isset($_GET["id"]) && $_GET["id"] == "pol"){
						echo $LN["termos"];
					}
					else{
                /////////////////////////////
                ///ÁREA DE NÃO CADASTRADOS///
                /////////////////////////////
                /////////////////////////////
                ///ÁREA DE NÃO CADASTRADOS///
                /////////////////////////////
                    if (!$user && !isset($_SESSION["email"])){ 
                ?>
                    <?php require_once("modules/login.php"); ?>
                    <?php require_once("modules/register.php"); ?>
                <?php } 
                /////////////////////////
                ///ÁREA DE CADASTRADOS///
                /////////////////////////
                else { 
                ?>
                <DIV id="logged"><?php require_once("modules/logged.php"); ?></DIV><BR>
                    <?php require_once("modules/logout.php"); ?><BR>
                <?php } }?>
            </DIV>
<?php
	echo $rest;
	}
 }?>

</body>
</html>