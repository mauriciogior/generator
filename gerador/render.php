<?php

///GERA A IMAGEM E FORÇA SALVAR///
if(isset($_POST["img"])){
	//HEADERS PARA FORÇAR SALVAR
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');        
	header('Content-Disposition: attachment; filename='.$_POST["name"].'.'.$_POST["tipo"]);
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . $_POST["length"]);
	
	//SE FOR JPEG (TEM UMA LETRA A MAIS E UM COD LIXO NO COMEÇO
	if($_POST["tipo"] == "jpg"){
		$uri = substr($_POST["img"],27);
	}
	//
	$uri =  substr($_POST["img"],strpos($_POST["img"],",")+1);
	echo  base64_decode($uri);
}
/// ///

///FORMULÁRIO DE REQUISIÇÃO///
else{
	
	///FALTOU DADOS -> CAI FORA///
	if(!isset($_GET["id"]) || !isset($_GET["accesskey"])){
		echo "<script>window.close()</script>";
	}
	/// ///
	else{
?>
<html>
<head>
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/canvg.js"></script> 
<script type="text/javascript" src="template/jquery.js"></script>
</head>
<body bgcolor="#322E24">

<!-- UTILIZA CANVAS -->
<canvas style="display:none;" id="canvas" width="200px" height="200px"></canvas>
<script>
function download(tipo){

	//MONTA O SVG NO CANVAS
	canvg('canvas', 'generator.php?id=<?=$_GET["id"]?>&accesskey=<?=$_GET["accesskey"]?>', { ignoreMouse: true, ignoreAnimation: true }) 
	
	///ACESSA O CANVAS
	var canvas = document.getElementById("canvas");
	
	///ARMAZENA O DATAURL EM img
	var img = canvas.toDataURL("image/"+tipo+"");
	
	///SE FOR JPEG (TEM UMA LETRA A MAIS)
	if(tipo == "jpeg")
		var img2 = atob(img.substr(23));
	else
		var img2 = atob(img.substr(22));
	
	//ARMAZENA DADOS NO FORMULÁRIO E ENVIA
	document.envia.length.value = img2.length;
		
	if(tipo == "jpeg")
		tipo = "jpg";
	
	document.envia.tipo.value = tipo;
	document.envia.img.value = img;
		
	document.envia.submit();
}</script>
<form name="envia" action="render.php" method="post">
	<input type="hidden" name="img" value=""/>
	<input type="hidden" name="length" value=""/>
	<input type="hidden" name="name" value="<?=$_GET["name"]?>"/>

<INPUT type="hidden" name="tipo" value="generator.php?id=<?=$_GET["id"]?>&accesskey=<?=$_GET["accesskey"]?>"/>
<IMG onClick="download('png')" id="png" style="cursor:pointer" src="template/images/png-icon.svg" />
<IMG onClick="download('jpeg')" id="jpeg" style="cursor:pointer" src="template/images/jpg-icon.svg" />
<IMG onClick="download('bmp')" id="bmp" style="cursor:pointer" src="template/images/bmp-icon.svg" />
<A href="svg.php?id=<?=$_GET["id"]?>&accesskey=<?=$_GET["accesskey"]?>&name=<?=$_GET["name"]?>"><IMG style="cursor:pointer" src="template/images/svg-icon.svg" /></A><BR>
<INPUT type="button" onClick="window.close()" value="Close"/>
</form>
</body>
</html>
<?php
}
}
?>