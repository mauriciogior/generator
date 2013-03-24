<?php
session_start();
require "../gerador/classes/class.php";
require "../gerador/template/template.php";
require "../gerador/src/facebook.php";

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
$fbconfig['appUrl'] = "https://strong-day-9898.herokuapp.com/"; 

//$email = $_SESSION["email"];

// Create An instance of our Facebook Application.
$facebook = new Facebook(array(
  'appId'  => '108170255993438',
  'secret' => 'ba8e1bfee563b30879a118907621b0cf',
  'status' => 'true',
));
$user = $facebook->getUser();
if (!$user)
// redirect to Facebook login to get a fresh user access_token
  $loginUrl = $facebook->getLoginUrl(array('scope' => 'manage_pages, user_photos'));
else {
	 $email = $facebook->api('me', array('fields' => 'username'));
	 $email = $email["username"];
	 $check = $db->dbconsultspec("users","email",$email["username"],"a");
	 if($check == -1)
		  $db->register($email,"facebook");
     try {
      // If the user has been authenticated then proceed
      $user_profile = $facebook->api('/me');
	  echo "<script>alert('".$user_profile["name"]."')</script>";
     } catch (FacebookApiException $e) {
      error_log($e);
      $user = null;
     }
}
$id = $db->dbconsultspec("users","email",$email,"r");
$id = $id[0];

if($_GET["d"] == 1){
	if(!empty($_GET["img_id"])){
		$result = $db->delete($_GET["img_id"],$id);
		if($result == -1)
			echo "<script>alert('You cannot delet this image!')</script>";
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
	<?php if ($user){
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
                    if (!$user && !isset($_SESSION["email"])){ 
                ?>
                    <?php require_once("modules/login.php"); ?>
                <?php } 
                /////////////////////////
                ///ÁREA DE CADASTRADOS///
                /////////////////////////
                else { 
                ?>
                <DIV id="logged"><?php require_once("../gerador/modules/logged.php"); ?></DIV><BR>
                <?php } }?>
            </DIV>
<?php
	echo $rest;
	}
 }?>

</body>
</html>