<?php

$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.48375
    Base template (without users data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>welcome!</title>



    <link rel="stylesheet" href="template/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="template/jscolor/jscolor.js"></script>
    <!--[if IE 6]><link rel="stylesheet" href="template/style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="template/style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="template/jquery.js"></script>
    <script type="text/javascript" src="template/script.js"></script>
   <style type="text/css">
.art-post .layout-item-0 { padding-right: 10px;padding-left: 10px; }
   .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   </style>

</head>';

$title = '<body background="generator.php?id=1">
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-header">
        <div class="art-header-position">
            <div class="art-header-wrapper">
                <div class="cleared reset-box"></div>
                <div class="art-header-inner">
                <div class="art-logo">
                                 <h1 class="art-logo-name">IMAGE GENERATOR</h1>
                                                </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="cleared reset-box"></div>
    <div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
                                <h2 class="art-postheader">';


$content= ' </h2>
                                                <div class="art-postcontent">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%;">
        <p><br /></p>';
        
$rest ='        <p></p>
    </div>
    </div>
</div>

                </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-body">
                            <div class="art-footer-text">
                                <p>Copyright © 2012. All Rights Reserved.<br>Developed by Maurício Giordano - mcgiordano@grad.icmc.usp.br</p>
                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <div class="cleared"></div>
</div>';

$top_create = '
			<div style="background-color:#322E24">
			<div id="t" style="display:none;position:absolute;margin-left:15px;margin-top:17px;z-index:1;cursor:pointer;"></div>
                <div class="art-footer-body">
                            <div class="art-footer-text">    
                                <p style="font-family:Century Gothic",Arial, Helvetica, Sans-Serif;">Copyright © 2012. All Rights Reserved.<br>Developed by Maurício Giordano - mcgiordano@grad.icmc.usp.br</p>
                            </div>
                </div>
            </div>
			<FORM name="desenha" method="POST" action="'.$PHP_SELF.'">
				<INPUT type="hidden" name="x"/>
				<INPUT type="hidden" name="y"/>
				<INPUT type="hidden" name="qtd"/>
				<INPUT type="hidden" name="tex"/>
				<INPUT type="hidden" name="te"/>
				<INPUT type="hidden" name="f1"/>
				<INPUT type="hidden" name="f2"/>
				<INPUT type="hidden" name="f3"/>
				<INPUT type="hidden" name="f1r"/>
				<INPUT type="hidden" name="f1e2"/>
				<INPUT type="hidden" name="f1e2a"/>
				<INPUT type="hidden" name="f1e2q"/>
				<INPUT type="hidden" name="f1e3"/>
				<INPUT type="hidden" name="f1e3a"/>
				<INPUT type="hidden" name="f1e3q"/>
				<INPUT type="hidden" name="f1e3b"/>
				<INPUT type="hidden" name="f1e3r"/>
				<INPUT type="hidden" name="f1e3r_"/>
				<INPUT type="hidden" name="f1e4"/>
				<INPUT type="hidden" name="f1e4a"/>
				<INPUT type="hidden" name="f1e4q"/>
				<INPUT type="hidden" name="f1e4q_"/>
				<INPUT type="hidden" name="create"/>
				<INPUT type="hidden" value="" name="type"/>
			</FORM>';


$popup = '
<script>
function post_value(s){
		if(x.value == ""){
		alert(\'Please fill the "width" form!\');
	}
	else if(y.value == ""){
		alert(\'Please fill the "height" form!\');
	}
	else if(qtd.value == ""){
		alert(\'Please fill the "quantity" form!\');
	}
	else if(!f1.checked){
		alert(\'Please select a polygon!\');
	}
	else if(f1.checked && f1r.value == ""){
		alert(\'Please fill the "Max raio" form on circle!\');
	}
	else if(f1e2.checked && !f1e2a.checked && f1e2q.value == ""){
		alert(\'Please fill the "opacity" form on circle!\');
	}
	else if(f1e3.checked && !f1e3a.checked && f1e3q.value == ""){
		alert(\'Please fill the "stroke-width" form on circle!\');
	}
	else if(f1e4.checked && !f1e4a.checked && (f1e4q.value == "" || f1e4q_.value == "")){
		alert(\'Please fill the "color" form on circle!\');
	}
	else{
		window.opener.document.desenha.x.value = document.getElementById("x").value;
		window.opener.document.desenha.y.value = document.getElementById("y").value;
		window.opener.document.desenha.qtd.value = document.getElementById("qtd").value;
		if(tex.checked)
			window.opener.document.desenha.tex.value = document.getElementById("tex").value;
		window.opener.document.desenha.te.value = document.getElementById("te").value;
		window.opener.document.desenha.f1.value = document.getElementById("f1").value;
		window.opener.document.desenha.f2.value = document.getElementById("f2").value;
		window.opener.document.desenha.f3.value = document.getElementById("f3").value;
		window.opener.document.desenha.f1r.value = document.getElementById("f1r").value;
		if(f1e2.checked)
			window.opener.document.desenha.f1e2.value = document.getElementById("f1e2").value;
		if(f1e2a.checked)
			window.opener.document.desenha.f1e2a.value = document.getElementById("f1e2a").value;
		window.opener.document.desenha.f1e2q.value = document.getElementById("f1e2q").value;
		if(f1e3.checked)
			window.opener.document.desenha.f1e3.value = document.getElementById("f1e3").value;
		if(f1e3a.checked)
			window.opener.document.desenha.f1e3a.value = document.getElementById("f1e3a").value;
		window.opener.document.desenha.f1e3q.value = document.getElementById("f1e3q").value;
		if(f1e3b.checked)
			window.opener.document.desenha.f1e3b.value = document.getElementById("f1e3b").value;
		window.opener.document.desenha.f1e3r.value = document.getElementById("f1e3r").value;
		window.opener.document.desenha.f1e3r_.value = document.getElementById("f1e3r_").value;
		if(f1e4.checked)
			window.opener.document.desenha.f1e4.value = document.getElementById("f1e4").value;
		if(f1e4a.checked)
			window.opener.document.desenha.f1e4a.value = document.getElementById("f1e4a").value;
		window.opener.document.desenha.f1e4q.value = document.getElementById("f1e4q").value;
		window.opener.document.desenha.f1e4q_.value = document.getElementById("f1e4q_").value;
		window.opener.document.desenha.type.value = s;
		window.opener.document.desenha.submit();
	}
}
window.onbeforeunload = function() {
    alert("dasdsa");
}
</script>
<body onbeforeunload="alert(\'closing\');">
<div id="tabela" style="position:absolute; margin-top:1px; margin-left:1px; width:99%">
    	<table bordercolor="#000000" border="1" width="101%" cellpadding="8">
			<FORM id="desenha" action="'.$PHP_SELF.'" method="POST">
            <tr height="150px">
                <td valign="top" width="30%">INFORMAÇÕES BÁSICAS<br />
                    Tamanho do documento: <input size="4" maxlength="4" type="text" name="x" id="x"/> X <input size="4" maxlength="4" type="text" name="y" id="y"/><br />
                    Quantidade de figuras: <input size="3" maxlength="3" type="text" name="qtd" id="qtd"/><br />
                    Texto (Opcional): <input type="checkbox" id="tex" name="tex" onchange="show(\'tex\')"/>
                    <div id="texto" style="display:none;"><input size="30" type="text" name="te" id="te"/></div>
                </td>
                <td valign="top" width="70%">FIGURAS<br />
                    <table width="100%">
                    	<tr>
                        	<td width="33%">Circulos: <input type="checkbox" id="f1" name="f1" onchange="show(\'f1\')"/></td>
                           	<td width="33%">Retângulos: <input type="checkbox" id="f2" name="f2" onchange="show(\'f2\')"/></td>
                            <td width="33%">Triângulos: <input type="checkbox" id="f3" name="f3" onchange="show(\'f3\')"/></td>
                        </tr>
                        <tr>
                        	<td><div id="brf1" style="display:none;">
                           	    Max raio: <input type="textbox" size="1" id="f1r" name="f1r" /><br />
                                Opacidade: <input type="checkbox" id="f1e2" name="f1e2" onchange="show(\'f1e2\')"/>
                                <div id="brf1e2" style="display:none;">
                                    &nbsp;&nbsp;Valor aleatório: <input type="checkbox" name="f1e2a" id="f1e2a" onchange="show(\'f1e2a\')" checked/>
                                    <div id="brf1e2a" style="display:none;">
                                        &nbsp;&nbsp;Quantidade: <input type="textbox" name="f1e2q" size="1" id="f1e2q" /><br>
                                    </div><br>
                                </div><br />
                                Contorno: <input type="checkbox" name="f1e3" id="f1e3" onchange="show(\'f1e3\')"/>
                                <div id="brf1e3" style="display:none;">
                                    &nbsp;&nbsp;Valor aleatório: <input type="checkbox" name="f1e3a" id="f1e3a" onchange="show(\'f1e3a\')" checked/>
                                    <div id="brf1e3a" style="display:none;">
                                        &nbsp;&nbsp;Tamanho (px): <input type="textbox" size="1" name="f1e3q" id="f1e3q" /><br>
                                    </div><br>
                                    &nbsp;&nbsp;Colorido Aleatório: <input type="checkbox" name="f1e3b" id="f1e3b" onchange="show(\'f1e3b\')" checked/>
                                    <div id="brf1e3b" style="display:none;">
                                        &nbsp;&nbsp;Faixa de cores: #<input type="textbox" name="f1e3r" class="color" size="2" id="f1e3r" /> - #<input type="textbox" name="f1e3r_" class="color" size="2" id="f1e3r_" /><br>
                                    </div><br>
                                </div><br />
                                Colorido: <input type="checkbox" name="f1e4" id="f1e4" onchange="show(\'f1e4\')" checked/>
                                <div id="brf1e4">
                                    &nbsp;&nbsp;Valor aleatório: <input type="checkbox" name="f1e4a" id="f1e4a" onchange="show(\'f1e4a\')" checked/>
                                    <div id="brf1e4a" style="display:none;">
                                        &nbsp;&nbsp;Faixa de cores: #<input type="textbox" name="f1e4q" class="color" size="2" id="f1e4q" /> - #<input type="textbox" class="color" size="2" name="f1e4q_" id="f1e4q_" /><br>
                                  </div><br>
                                </div>
                            </div><br /></td>
                            
                            
                            
                            <td><div id="brf2" style="display:none;">
                            	Max altura: <input type="textbox" size="2" id="f2a" /><br>Max largura:<input type="textbox" size="2" id="f2l" /><br />
                                Desfoque (blur): <input type="checkbox" id="f2e1" onchange="show(\'f2e1\')"/>
                                <div id="brf2e1" style="display:none;">
                                    &nbsp;&nbsp;Valor aleatório: <input type="checkbox" id="f2e1a" onchange="show(\'f2e1a\')" checked/>
                                    <div id="brf2e1a" style="display:none;">
                                        &nbsp;&nbsp;Quantidade: <input type="textbox" size="1" id="f2e1q" /><br>
                                    </div><br>
                                </div><br />
                                Opacidade: <input type="checkbox" id="f2e2" onchange="show(\'f2e2\')"/>
                                <div id="brf2e2" style="display:none;">
                                    &nbsp;&nbsp;Valor aleatório: <input type="checkbox" id="f2e2a" onchange="show(\'f2e2a\')" checked/>
                                    <div id="brf2e2a" style="display:none;">
                                        &nbsp;&nbsp;Quantidade: <input type="textbox" size="1" id="f2e2q" /><br>
                                    </div><br>
                                </div>
                            </div><br /></td>
                            <td><div id="brf3" style="display:none;">
                          	    Max lado: <input type="textbox" size="2" id="f3l" />
                            </div><br /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
					<input type="hidden" value="" id="create" name="create"/>
					<input type="hidden" value="" id="type" name="type"/>
                    <input type="button" value="Desenhar" onClick="post_value(\'s\')"/>
                    <input type="button" value="Salvar" onClick="desenhar(\'s\')"/>
					</FORM>
                </td>
            </tr>
        </table>
		</BODY>';

