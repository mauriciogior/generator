<?php
require "template/template.php";
require "classes/class.php";
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'[]>
<html xmlns:fb='http://ogp.me/ns/fb#'>
<head>
    <!--
    Created by Artisteer v3.1.0.48375
    Base template (without users data) checked by http://validator.w3.org : 'This page is valid XHTML 1.0 Transitional'
    -->
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title><?=$LN["title"]?></title>

    <link rel='stylesheet' href='template/style.css' type='text/css' media='screen' />
    <script type='text/javascript' src='template/jscolor/jscolor.js'></script>
    <!--[if IE 6]><link rel='stylesheet' href='template/style.ie6.css' type='text/css' media='screen' /><![endif]-->
    <!--[if IE 7]><link rel='stylesheet' href='template/style.ie7.css' type='text/css' media='screen' /><![endif]-->

    <script type='text/javascript' src='template/jquery.js'></script>
    <script type='text/javascript' src='template/script.js'></script>
   <style type='text/css'>
.art-post .layout-item-0 { padding-right: 10px;padding-left: 10px; }
   .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   </style>

</head>
<script>
function post_value(t){
	if(x.value == ''){
		alert("<?=$LN[popuperr1]?>");
	}
	else if(nome.value == '' && t == 's'){
		alert("<?=$LN[popuperr2]?>");
	}
	else if(y.value == ''){
		alert("<?=$LN[popuperr3]?>");
	}
	else if(margin.value == ''){
		alert("<?=$LN[popuperr16]?>");
	}
	else if(!f1.checked && !f2.checked){
		alert("<?=$LN[popuperr4]?>");
	}
		else if(f1.checked && f1qtd.value == ''){
			alert("<?=$LN[popuperr5]?>");
		}
		else if(f1.checked && f1r.value == ''){
			alert("<?=$LN[popuperr6]?>");
		}
		else if(f1.checked && f1e2.checked && !f1e2a.checked && f1e2q.value == ''){
			alert("P<?=$LN[popuperr7]?>");
		}
		else if(f1.checked && f1e3.checked && !f1e3a.checked && f1e3q.value == ''){
			alert("<?=$LN[popuperr8]?>");
		}
		else if(f1.checked && f1e4.checked && !f1e4a.checked && (f1e4q.value == '' || f1e4q_.value == '')){
			alert("<?=$LN[popuperr9]?>");
		}
		else if(f2.checked && f2qtd.value == ''){
			alert("<?=$LN[popuperr10]?>");
		}
		else if(f2.checked && f2l.value == ''){
			alert("<?=$LN[popuperr11]?>");
		}
		else if(f2.checked && f2a.value == ''){
			alert("<?=$LN[popuperr12]?>");
		}
		else if(f2.checked && f2e2.checked && !f2e2a.checked && f2e2q.value == ''){
			alert("<?=$LN[popuperr13]?>");
		}
		else if(f2.checked && f2e3.checked && !f2e3a.checked && f2e3q.value == ''){
			alert("<?=$LN[popuperr14]?>");
		}
		else if(f2.checked && f2e4.checked && !f2e4a.checked && (f2e4q.value == '' || f2e4q_.value == '')){
			alert("<?=$LN[popuperr15]?>");
		}
	else{
		window.opener.document.desenha.x.value = document.getElementById('x').value;
		window.opener.document.desenha.y.value = document.getElementById('y').value;
		window.opener.document.desenha.margin.value = document.getElementById('margin').value;
		
		if(tex.checked)
			window.opener.document.desenha.tex.value = '1';
		else
			window.opener.document.desenha.tex.value = '0';
			
		window.opener.document.desenha.te.value = document.getElementById('te').value;
		
		if(f1.checked)
			window.opener.document.desenha.f1.value = '1';
		else
			window.opener.document.desenha.f1.value = '0';
			
		if(f2.checked)
			window.opener.document.desenha.f2.value = '1';
		else
			window.opener.document.desenha.f2.value = '0';
			
		if(f3.checked)
			window.opener.document.desenha.f3.value = '1';
		else
			window.opener.document.desenha.f3.value = '0';
		
		if(f1.checked){
			window.opener.document.desenha.f1qtd.value = document.getElementById('f1qtd').value;
			window.opener.document.desenha.f1r.value = document.getElementById('f1r').value;
			
			if(f1e2.checked)
				window.opener.document.desenha.f1e2.value = '1';
			else
				window.opener.document.desenha.f1e2.value = '0';
				
			if(f1e2a.checked)
				window.opener.document.desenha.f1e2a.value = '1';
			else
				window.opener.document.desenha.f1e2a.value = '0';
				
			window.opener.document.desenha.f1e2q.value = document.getElementById('f1e2q').value;
			
			if(f1e3.checked)
				window.opener.document.desenha.f1e3.value = '1';
			else
				window.opener.document.desenha.f1e3.value = '0';
				
			if(f1e3a.checked)
				window.opener.document.desenha.f1e3a.value = '1';
			else
				window.opener.document.desenha.f1e3a.value = '0';
				
			window.opener.document.desenha.f1e3q.value = document.getElementById('f1e3q').value;
			
			if(f1e3b.checked)
				window.opener.document.desenha.f1e3b.value = '1';
			else
				window.opener.document.desenha.f1e3b.value = '0';
				
			window.opener.document.desenha.f1e3r.value = document.getElementById('f1e3r').value;
			window.opener.document.desenha.f1e3r_.value = document.getElementById('f1e3r_').value;
			
			if(f1e4.checked)
				window.opener.document.desenha.f1e4.value = '1';
			else
				window.opener.document.desenha.f1e4.value = '0';
				
			if(f1e4a.checked)
				window.opener.document.desenha.f1e4a.value = '1';
			else
				window.opener.document.desenha.f1e4a.value = '0';
				
			window.opener.document.desenha.f1e4q.value = document.getElementById('f1e4q').value;
			window.opener.document.desenha.f1e4q_.value = document.getElementById('f1e4q_').value;
		}
		if(f2.checked){
			window.opener.document.desenha.f2qtd.value = document.getElementById('f2qtd').value;
			window.opener.document.desenha.f2l.value = document.getElementById('f2l').value;
			window.opener.document.desenha.f2a.value = document.getElementById('f2a').value;
			
			if(f2e2.checked)
				window.opener.document.desenha.f2e2.value = '1';
			else
				window.opener.document.desenha.f2e2.value = '0';
				
			if(f2e2a.checked)
				window.opener.document.desenha.f2e2a.value = '1';
			else
				window.opener.document.desenha.f2e2a.value = '0';
				
			window.opener.document.desenha.f2e2q.value = document.getElementById('f2e2q').value;
			
			if(f2e3.checked)
				window.opener.document.desenha.f2e3.value = '1';
			else
				window.opener.document.desenha.f2e3.value = '0';
				
			if(f2e3a.checked)
				window.opener.document.desenha.f2e3a.value = '1';
			else
				window.opener.document.desenha.f2e3a.value = '0';
				
			window.opener.document.desenha.f2e3q.value = document.getElementById('f2e3q').value;
			
			if(f2e3b.checked)
				window.opener.document.desenha.f2e3b.value = '1';
			else
				window.opener.document.desenha.f2e3b.value = '0';
				
			window.opener.document.desenha.f2e3r.value = document.getElementById('f2e3r').value;
			window.opener.document.desenha.f2e3r_.value = document.getElementById('f2e3r_').value;
			
			if(f2e4.checked)
				window.opener.document.desenha.f2e4.value = '1';
			else
				window.opener.document.desenha.f2e4.value = '0';
				
			if(f2e4a.checked)
				window.opener.document.desenha.f2e4a.value = '1';
			else
				window.opener.document.desenha.f2e4a.value = '0';
				
			window.opener.document.desenha.f2e4q.value = document.getElementById('f2e4q').value;
			window.opener.document.desenha.f2e4q_.value = document.getElementById('f2e4q_').value;
		}
		if((t=='s') || (t=='a'))
			window.opener.document.desenha.nome.value = document.getElementById('nome').value;
			
		window.opener.document.desenha.type.value = t;
		
		if(t=='a')
			window.opener.document.desenha.imgid.value = document.getElementById('imgid').value;
		
		if(t=='d')
			desenhar();
		
		if((t=='s') || (t=='a')){
		window.opener.document.desenha.submit();	
			window.close();
		}
	}
}

</script>

<?php
if(isset($_GET["img_id"])){
	$new = 0;
	$db = new db();
	$data = new generator();
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
	$data->img_id = $_GET["img_id"];
	$info = $data->imgdata();
	
	if($info["circles-id"] != -1){
		$f1 = $data->dbconsultspec("circles","id",$info["circles-id"],"a");
	}
	if($info["rectangles-id"] != -1){
		$f2 = $data->dbconsultspec("rectangles","id",$info["rectangles-id"],"a");
	}
}
else {
	$info = array( 
	"circles-id" => -1 ,
	"rectangles-id" => -1 ,
	"margin" => 0
	);
	$f1 = array(
	"fill-opacity" => 100 ,
	"stroke-width" => 0 ,
	"stroke-min" => "rand" ,
	"fill-min" => "undef" ,
	);
	$f2 = array(
	"fill-opacity" => 100 ,
	"stroke-width" => 0 ,
	"stroke-min" => "rand" ,
	"fill-min" => "undef" ,
	);
	$new = 1;
}
?>
<body bgcolor='#453F31'>
<FORM id='desenha' action=''.$PHP_SELF.'' method='POST'>
	<input type="hidden" value="<?=$data->img_id?>" id="imgid"/>
<div id='tabela' style='position:absolute; margin-top:1px; margin-left:1px; width:99%'>
    	<table cellpadding='8'>
            <tr bgcolor='#3E392C'>
                <td valign='top' width='30%'>INFORMAÇÕES BÁSICAS<br />
                    Tamanho do documento: <input size='4' maxlength='4' type='text' name='x' id='x' value='<?=$info["width"]?>'/> X <input size='4' maxlength='4' type='text' name='y' id='y' value='<?=$info["height"]?>'/><br />
					Margem: <input size='3' maxlength='3' type='text' name='margin' value='<?=$info["margin"]?>' id='margin' value='0' /><br><br>
                    Texto (Opcional): <input type='checkbox' disabled id='tex' name='tex' onchange='show("tex")'/>
                    <div id='texto' style='display:none;'><input size='30' type='text' name='te' id='te'/></div><BR><BR>
                    <?php
					if(isset($_GET["img_id"])){
						$name = $data->dbconsultspec("userimgs","img_id",$_GET["img_id"],"a");
						$name = $name["name"];
					?>
                    Nome: <input type='text' value='<?=$name?>' disabled id='nome' name='nome' size='30'/>
                   	<?php
					}
					else {
					?>
                    Nome: <input type='text' id='nome' name='nome' size='30'/>
                    <?php
					}
					?>
                </td>
			</tr>
			<tr bgcolor='#3E392C'>
				<td>FIGURAS</td>
			</tr>
		</table>
		<table cellpadding='8' width='100%'>
			<tr bgcolor='#3E392C'>
                <td align='right' valign='top' width='100px'>Circulos:
                <?php if($info["circles-id"] != -1){ ?>
					<input type='checkbox' id='f1' name='f1' onchange='show("f1")' checked/>
                <?php } else {?>
					<input type='checkbox' id='f1' name='f1' onchange='show("f1")'/>
                <?php } ?>
				</td>
				<td>
					<div id='brf1' <?php if($info["circles-id"] == -1){ ?>style='display:none;<?php } ?>'>
					<table cellpadding='8'>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Quantidade: <input type='textbox' value='<?=$f1["qtd"]?>' size='1' value='0' id='f1qtd' name='f1qtd' />
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Max raio: <input type='textbox' value='<?=$f1["raio"]?>' size='1' id='f1r' name='f1r' />
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Opacidade: <input<?php if($f1["fill-opacity"] != 100) {?> checked <?php } ?> type='checkbox' id='f1e2' name='f1e2' onchange='show("f1e2")'/>
							</td>
							<td align='right'>
								<div id='brf1e2'<?php if($f1["fill-opacity"] == 100) {?> style='display:none;' <?php } ?>>
								&nbsp;Valor aleatório: <input type='checkbox' name='f1e2a' id='f1e2a' onchange='show("f1e2a")' <?php if(($f1["fill-opacity"] == -1) || $new == 1) {?>checked<?php } ?>/>
								</div>
							</td>
							<td align='left'>
								<div id='brf1e2a' <?php if(($f1["fill-opacity"] == -1) || ($f1["fill-opacity"] == 100)) {?>style='display:none;'<?php } ?>>
								&nbsp;Quantidade: <input type='textbox' value='<?=$f1["fill-opacity"]?>' name='f1e2q' size='1' id='f1e2q' />			
								</div>
							</td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Contorno: <input type='checkbox' name='f1e3' id='f1e3' onchange='show("f1e3")' <?php if($f1["stroke-width"] != 0) {?>checked<?php } ?>/>
							</td>
							<td align='right'>
								<div id='brf1e3' <?php if($f1["stroke-width"] == 0) {?>style='display:none;'<?php } ?>>
                                &nbsp;Valor aleatório: <input type='checkbox' name='f1e3a' id='f1e3a' onchange='show("f1e3a")' <?php if(($f1["stroke-width"] == -1) || $new == 1) {?>checked<?php } ?>/>
								</div>
							</td>
							<td align='left'>
                                <div id='brf1e3a' <?php if(($f1["stroke-width"] == -1) || ($f1["stroke-width"] == 0)) {?>style='display:none;'<?php } ?>>
                                &nbsp;Tamanho (px): <input type='textbox' value='<?=$f1["stroke-width"]?>' size='1' name='f1e3q' id='f1e3q' /><br>
                                </div>
							</td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td></td>
							<td>
                                <div id='brf1e3a_' <?php if($f1["stroke-width"] == 0) {?>style='display:none;'<?php } ?>>
								&nbsp;Colorido Aleatório: <input type='checkbox' name='f1e3b' id='f1e3b' onchange='show("f1e3b")' <?php if($f1["stroke-min"] == "rand") {?>checked<?php } ?>/>			</div>
							</td>
							<td>
                                <div id='brf1e3b' <?php if($f1["stroke-min"] == "rand") {?>style='display:none;'<?php } ?>>
                                &nbsp;Faixa de cores: <input type='textbox' value='<?=$f1["stroke-min"]?>' name='f1e3r' class='color' size='2' id='f1e3r' /> - <input type='textbox' name='f1e3r_' value='<?=$f1["stroke-max"]?>' class='color' size='2' id='f1e3r_' />
                                </div>
							</td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Colorido: <input type='checkbox' name='f1e4' id='f1e4' onchange='show("f1e4")' <?php if(($f1["fill-min"] != "undef") || ($new != 1)) {?>checked<?php } ?>/>					</td>
							<td align='right'>
							<div id='brf1e4' <?php if($new == 1) {?>style='display:none;'<?php } ?>>
                               &nbsp;&nbsp;Valor aleatório: <input type='checkbox' name='f1e4a' id='f1e4a' onchange='show("f1e4a")' <?php if(($f1["fill-min"] == "rand") || ($new == 1)) {?>checked<?php } ?>/>
							</td>
							<td align='left'>
								<div id='brf1e4a' <?php if(($f1["fill-min"] == "rand") || ($new == 1)) {?>style='display:none;'<?php } ?>>
                                &nbsp;Faixa de cores: <input type='textbox' value='<?=$f1["fill-min"]?>' name='f1e4q' class='color' size='2' id='f1e4q' /> - <input type='textbox' value='<?=$f1["fill-max"]?>' class='color' size='2' name='f1e4q_' id='f1e4q_' />
                                </div>
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
			
			<tr bgcolor='#3E392C'>
                <td align='right' valign='top'>
					Retângulos: 
                    
                <?php if($info["rectangles-id"] != -1){ ?>
					<input type='checkbox' id='f2' name='f2' onchange='show("f2")' checked/>
                <?php } else {?>
					<input type='checkbox' id='f2' name='f2' onchange='show("f2")'/>
                <?php } ?>
				</td>
				<td>
					<div id='brf2' <?php if($info["rectangles-id"] == -1){ ?>style='display:none;'<?php } ?>>
					<table cellpadding='8'>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Quantidade: <input type='textbox' value='<?=$f2["qtd"]?>' value='0' size='1' id='f2qtd' name='f2qtd' />
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Max altura: <input type='textbox' value='<?=$f2["max-height"]?>' size='2' id='f2a' name='f2a' />
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Max largura: <input type='textbox' value='<?=$f2["max-width"]?>' size='2' id='f2l' name='f2l' />
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Opacidade: <input<?php if($f2["fill-opacity"] != 100) {?> checked <?php } ?> type='checkbox' id='f2e2' name='f2e2' onchange='show("f2e2")'/>
							</td>
							<td align='right'>
								<div id='brf2e2'<?php if($f2["fill-opacity"] == 100) {?> style='display:none;' <?php } ?>>
								&nbsp;Valor aleatório: <input type='checkbox' name='f2e2a' id='f2e2a' onchange='show("f2e2a")' <?php if(($f2["fill-opacity"] == -1) || $new == 1) {?>checked<?php } ?>/>
								</div>
							</td>
							<td align='left'>
								<div id='brf2e2a' <?php if(($f2["fill-opacity"] == -1) || ($f2["fill-opacity"] == 100)) {?>style='display:none;'<?php } ?>>
								&nbsp;Quantidade: <input type='textbox' value='<?=$f2["fill-opacity"]?>' name='f2e2q' size='1' id='f2e2q' />			
								</div>
							</td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Contorno: <input type='checkbox' name='f2e3' id='f2e3' onchange='show("f2e3")' <?php if($f2["stroke-width"] != 0) {?>checked<?php } ?>/>
							</td>
							<td align='right'>
								<div id='brf2e3' <?php if($f2["stroke-width"] == 0) {?>style='display:none;'<?php } ?>>
                                &nbsp;Valor aleatório: <input type='checkbox' name='f2e3a' id='f2e3a' onchange='show("f2e3a")' <?php if(($f2["stroke-width"] == -1) || $new == 1) {?>checked<?php } ?>/>
								</div>
							</td>
							<td align='left'>
                                <div id='brf2e3a' <?php if(($f2["stroke-width"] == -1) || ($f2["stroke-width"] == 0)) {?>style='display:none;'<?php } ?>>
                                &nbsp;Tamanho (px): <input type='textbox' value='<?=$f2["stroke-width"]?>' size='1' name='f2e3q' id='f2e3q' /><br>
                                </div>
							</td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td></td>
							<td>
                                <div id='brf2e3a_' <?php if($f2["stroke-width"] == 0) {?>style='display:none;'<?php } ?>>
								&nbsp;Colorido Aleatório: <input type='checkbox' name='f2e3b' id='f2e3b' onchange='show("f2e3b")' <?php if($f2["stroke-min"] == "rand") {?>checked<?php } ?>/>			</div>
							</td>
							<td>
                                <div id='brf2e3b' <?php if($f2["stroke-min"] == "rand") {?>style='display:none;'<?php } ?>>
                                &nbsp;Faixa de cores: <input type='textbox' value='<?=$f2["stroke-min"]?>' name='f2e3r' class='color' size='2' id='f2e3r' /> - <input type='textbox' name='f2e3r_' value='<?=$f2["stroke-max"]?>' class='color' size='2' id='f2e3r_' />
                                </div>
							</td>
						</tr>
						<tr bgcolor='#453F31' valign='top'>
							<td align='right'>
								Colorido: <input type='checkbox' name='f2e4' id='f2e4' onchange='show("f2e4")' <?php if(($f2["fill-min"] != "undef") || ($new != 1)) {?>checked<?php } ?>/>					</td>
							<td align='right'>
							<div id='brf2e4' <?php if($new == 1) {?>style='display:none;'<?php } ?>>
                               &nbsp;&nbsp;Valor aleatório: <input type='checkbox' name='f2e4a' id='f2e4a' onchange='show("f2e4a")' <?php if(($f2["fill-min"] == "rand") || ($new == 1)) {?>checked<?php } ?>/>
							</td>
							<td align='left'>
								<div id='brf2e4a' <?php if(($f2["fill-min"] == "rand") || ($new == 1)) {?>style='display:none;'<?php } ?>>
                                &nbsp;Faixa de cores: <input type='textbox' value='<?=$f2["fill-min"]?>' name='f2e4q' class='color' size='2' id='f2e4q' /> - <input type='textbox' value='<?=$f2["fill-max"]?>' class='color' size='2' name='f2e4q_' id='f2e4q_' />
                                </div>
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
			<tr bgcolor='#3E392C' valign='top'>
                <td align='right'>Triângulos: <input type='checkbox' id='f3' name='f3' onchange='show("f3")'/></td>
				<td></td>
			</tr>
            <tr>
                <td>
					<input type='hidden' value='' id='create' name='create'/>
					<input type='hidden' value='' id='type' name='type'/>
                    <input type='button' value='Desenhar' onClick='post_value("d")'/>
                </td>
				<td>
                    <input type='button' value='Salvar' onClick='post_value("<?php if($new!=1){?>a<?php } else {?>s<?php } ?>")'/>
				</td>
            </tr>
        </table>
		</FORM>
		</BODY>

<?php
unset($data);
unset($db);
?>
