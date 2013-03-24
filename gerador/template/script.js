/* begin Page */
/* Created by Artisteer v3.1.0.48375 */
// css helper

function geturl(content,i){
    var texto = "http://generator.sytes.net/gerador/generator.php"+ content;
	window.prompt("Image URL:",texto);
    var src = "../gerador/template/images/url2-icon.svg";
	$("#"+i).attr("src", src);
}

function aleatorio(inferior,superior){ 
   	numPossibilidades = Math.abs(superior - inferior);
   	aleat = Math.random() * numPossibilidades 
   	aleat = Math.floor(aleat)
  	return parseInt(inferior<superior?inferior:superior) + aleat;
}
function h2d(h) {
	return parseInt(h,16);
}
function limpar(){
	$("#svg").empty();
}
function desenhar(){
	
	var svg = '';
	var c = new Array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
	var cor = '';
	var qtd = $("#f1qtd").val()*1 + $("#f2qtd").val()*1;
	var fil = '';
	
	var aux1 = '';
	var aux2 = '';
	var aux3 = '';
	var aux4 = '';
	
	var cor1 = new Array;
	var cor2 = new Array;
	
	/////////////
	////TEXTO////
	/////////////
	if(tex.checked){
		//svg += "<text id=\"Text2\" x=\"0\" y=\"140\" fill=\"none\" stroke-width=\"3\" stroke=\"black\" font-family=\"Arial Black\" font-size=\"100\" text-anchor=\"left\" >";
		svg += "<clipPath id=\"texto\">"
		svg += "<text id=\"Text\" x=\"0\" y=\"140\" font-family=\"Arial Black\" font-size=\"100\" text-anchor=\"left\" >";
      	svg += $("#te").val();
   		svg += "</text>";
   		svg += "</clipPath>";
		svg += "<g style=\"clip-path:url(#texto)\">";
	}
	////////////
	for(i=0;i<qtd;i++){
		
	///////////	
	//FIGURAS//
	///////////////////////////////////////////////////////////
		///////////
		//CIRCULO//
	///////////////
		if($("#f1").val() == "on" && $("#f1qtd").val() > (i)){
			
			//VAR AUXILIARES
			fil = '';
			cor = '';
			aux1 = aleatorio($("#margin").val(),($("#x").val()-$("#margin").val()));
			aux2 = aleatorio($("#margin").val(),($("#y").val()-$("#margin").val()));
			aux3 = aleatorio(1,$("#f1r").val());
			//
			
			//EFEITOS
			////OPACIDADE
			if(f1e2.checked){
				if(f1e2a.checked)
					qtd2 = aleatorio(0,100)/100;
				else
					qtd2 = $("#f1e2q").val()/100;
					
				fil += " fill-opacity='"+ qtd2 +"' ";
			}
			////
			////CONTORNO
			if(f1e3.checked){
				if(f1e3a.checked)
					qtd2 = aleatorio(1,aux3/3);
				else
					qtd2 = $("#f1e3q").val();
				
				if(f1e3b.checked){
					for(j=0;j<6;j++)
						cor += c[aleatorio(0,16)];
					fil += " stroke='#"+ cor +"' ";
					cor = '';
				}
				else{
					aux4 = $("#f1e3r").val();
					
					cor1[0] = h2d(aux4.substr(0,2));
					cor1[1] = h2d(aux4.substr(2,2));
					cor1[2] = h2d(aux4.substr(4,2));
		
					aux4 = $("#f1e3r_").val();
					
					cor2[0] = h2d(aux4.substr(0,2));
					cor2[1] = h2d(aux4.substr(2,2));
					cor2[2] = h2d(aux4.substr(4,2));
					
					fil += " stroke='RGB(" + aleatorio(cor1[0],cor2[0]) + "," + aleatorio(cor1[1],cor2[1]) + "," + aleatorio(cor1[2],cor2[2]) + ")' ";
				}
				
				fil += " stroke-width='"+ qtd2 +"' ";
			}
			////
			////COR
			if(f1e4.checked){
				if(f1e4a.checked){
					for(j=0;j<6;j++)
						cor += c[aleatorio(0,16)];
					fil += " fill='#" + cor + "' ";
				}
				else{
					aux4 = $("#f1e4q").val();
					
					cor1[0] = h2d(aux4.substr(0,2));
					cor1[1] = h2d(aux4.substr(2,2));
					cor1[2] = h2d(aux4.substr(4,2));
		
					aux4 = $("#f1e4q_").val();
					
					cor2[0] = h2d(aux4.substr(0,2));
					cor2[1] = h2d(aux4.substr(2,2));
					cor2[2] = h2d(aux4.substr(4,2));
					
					fil += " fill='RGB(" + aleatorio(cor1[0],cor2[0]) + "," + aleatorio(cor1[1],cor2[1]) + "," + aleatorio(cor1[2],cor2[2]) + ")' ";
				}
			}
			////
			//
			
			//DESENHO
			svg += "<circle cx='" + aux1 + "' cy='" + aux2 + "' r='" + aux3 + "' " + fil + "/>";
			//
		}		
	///////////////
	
		////////////
		//QUADRADO//
	////////////////
		if($("#f2").val() == "on" && $("#f2qtd").val() > (i)){
			
			//VAR AUXILIARES
			fil = '';
			cor = '';

			aux1 = aleatorio(1,$("#f2l").val());
			aux2 = aleatorio(1,$("#f2a").val());
			//
			
			//EFEITOS
			////OPACIDADE
			if(f2e2.checked){
				if(f2e2a.checked)
					qtd2 = aleatorio(0,100)/100;
				else
					qtd2 = $("#f2e2q").val()/100;
					
				fil += " fill-opacity='"+ qtd2 +"' ";
			}
			////
			//
			
			////CONTORNO
			if(f2e3.checked){
				if(f2e3a.checked)
					qtd2 = aleatorio(1,(aux1*aux2)/200);
				else
					qtd2 = $("#f2e3q").val();
				
				if(f2e3b.checked){
					for(j=0;j<6;j++)
						cor += c[aleatorio(0,16)];
					fil += " stroke='#"+ cor +"' ";
					cor = '';
				}
				else{
					aux4 = $("#f2e3r").val();
					
					cor1[0] = h2d(aux4.substr(0,2));
					cor1[1] = h2d(aux4.substr(2,2));
					cor1[2] = h2d(aux4.substr(4,2));
		
					aux4 = $("#f2e3r_").val();
					
					cor2[0] = h2d(aux4.substr(0,2));
					cor2[1] = h2d(aux4.substr(2,2));
					cor2[2] = h2d(aux4.substr(4,2));
					
					fil += " stroke='RGB(" + aleatorio(cor1[0],cor2[0]) + "," + aleatorio(cor1[1],cor2[1]) + "," + aleatorio(cor1[2],cor2[2]) + ")' ";
				}
				
				fil += " stroke-width='"+ qtd2 +"' ";
			}
			////
			////COR
			if(f2e4.checked){
				if(f2e4a.checked){
					for(j=0;j<6;j++)
						cor += c[aleatorio(0,16)];
					fil += " fill='#" + cor + "' ";
				}
				else{
					aux4 = $("#f2e4q").val();
					
					cor1[0] = h2d(aux4.substr(0,2));
					cor1[1] = h2d(aux4.substr(2,2));
					cor1[2] = h2d(aux4.substr(4,2));
		
					aux4 = $("#f2e4q_").val();
					
					cor2[0] = h2d(aux4.substr(0,2));
					cor2[1] = h2d(aux4.substr(2,2));
					cor2[2] = h2d(aux4.substr(4,2));
					
					fil += " fill='RGB(" + aleatorio(cor1[0],cor2[0]) + "," + aleatorio(cor1[1],cor2[1]) + "," + aleatorio(cor1[2],cor2[2]) + ")' ";
				}
			}
			////

			
			//DESENHO			
			svg += "<rect x='" + aleatorio($("#margin").val(),($("#x").val()-2*$("#margin").val())) + "' y='" + aleatorio($("#margin").val(),($("#y").val()-2*$("#margin").val())) + "' width='" + aleatorio(1,$("#f2l").val()) + "' height='" + aleatorio(1,$("#f2a").val()) + "' " + fil + " />";
			//
		}
	///////////////
	/////////////////////////////////////////////////////
	}
		if(tex.checked)
			svg += "</g>";
	////IMPRESSÃO FINAL
	window.opener.document.getElementById("svg").innerHTML = "<svg width='" + $("#x").val() + "' height='" + $("#y").val() + "'>" + svg + "</svg>";	
	////
}


function show(id){
	var check = document.getElementById(id);
	if(id=='tabela'){
			$("#tabela").slideUp(200);
			$("#t").delay(200).fadeIn(200).append('<span onclick=\"show(\'t\');\">Mostrar</span>');
	}
	else if(id=='t'){
			$("#t").fadeOut(200).empty();
			$("#tabela").slideDown(200);
	}	
	else if(id=='tex'){
		if(check.checked)
			$("#texto").fadeIn(200);
		else
			$("#texto").fadeOut(200);
	}
//FIGURAS
	//CIRCULO	
	else if(id=='f1'){
		if(check.checked)
			$("#brf1").fadeIn(200);
		else{
			$("#brf1").fadeOut(200);
			$("#f1qtd").val(0);
		}
	}
		//EFEITOS
			//OPACIDADE
			else if(id=='f1e2'){
				if(check.checked)
					$("#brf1e2").fadeIn(200);
				else{
					$("#brf1e2").fadeOut(200);
					$("#brf1e2a").fadeOut(200);
				}
			}
			else if(id=='f1e2a'){
				if(!check.checked)
					$("#brf1e2a").fadeIn(200);
				else
					$("#brf1e2a").fadeOut(200);
			}
			//
			//CONTORNO
			else if(id=='f1e3'){
				if(check.checked){
					$("#brf1e3").fadeIn(200);
					$("#brf1e3a_").fadeIn(200);
				}
				else{
					$("#brf1e3").fadeOut(200);
					$("#brf1e3a").fadeOut(200);
					$("#brf1e3a_").fadeOut(200);
					$("#brf1e3b").fadeOut(200);
				}
			}
			else if(id=='f1e3a'){
				if(!check.checked)
					$("#brf1e3a").fadeIn(200);
				else
					$("#brf1e3a").fadeOut(200);
			}
			else if(id=='f1e3b'){
				if(!check.checked)
					$("#brf1e3b").fadeIn(200);
				else
					$("#brf1e3b").fadeOut(200);
			}
			//
			//COR
			else if(id=='f1e4'){
				if(check.checked)
					$("#brf1e4").fadeIn(200);
				else{
					$("#brf1e4").fadeOut(200);
					$("#brf1e4a").fadeOut(200);
				}
			}
			else if(id=='f1e4a'){
				if(!check.checked)
					$("#brf1e4a").fadeIn(200);
				else
					$("#brf1e4a").fadeOut(200);
			}
			//
		//
	//
	//QUADRADO
	else if(id=='f2'){
		if(check.checked)
			$("#brf2").fadeIn(200);
		else{
			$("#brf2").fadeOut(200);
			$("#f2qtd").val(0);
		}
	}
		//EFEITOS
			//OPACIDADE
			else if(id=='f2e2'){
				if(check.checked)
					$("#brf2e2").fadeIn(200);
				else{
					$("#brf2e2").fadeOut(200);
					$("#brf2e2a").fadeOut(200);
				}
			}
			else if(id=='f2e2a'){
				if(!check.checked)
					$("#brf2e2a").fadeIn(200);
				else
					$("#brf2e2a").fadeOut(200);
			}
			//						
			//CONTORNO
			else if(id=='f2e3'){
				if(check.checked){
					$("#brf2e3").fadeIn(200);
					$("#brf2e3a_").fadeIn(200);
				}
				else{
					$("#brf2e3").fadeOut(200);
					$("#brf2e3a").fadeOut(200);
					$("#brf2e3a_").fadeOut(200);
					$("#brf2e3b").fadeOut(200);
				}
			}
			else if(id=='f2e3a'){
				if(!check.checked)
					$("#brf2e3a").fadeIn(200);
				else
					$("#brf2e3a").fadeOut(200);
			}
			else if(id=='f2e3b'){
				if(!check.checked)
					$("#brf2e3b").fadeIn(200);
				else
					$("#brf2e3b").fadeOut(200);
			}
			//
			//COR
			else if(id=='f2e4'){
				if(check.checked)
					$("#brf2e4").fadeIn(200);
				else{
					$("#brf2e4").fadeOut(200);
					$("#brf2e4a").fadeOut(200);
				}
			}
			else if(id=='f2e4a'){
				if(!check.checked)
					$("#brf2e4a").fadeIn(200);
				else
					$("#brf2e4a").fadeOut(200);
			}
			//
		//
	//
	//TRIÂNGULO
	else if(id=='f3'){
		if(check.checked)
			$("#brf3").fadeIn(200);
		else
			$("#brf3").fadeOut(200);
	}
		//EFEITOS
		else if(id=='f3e1'){
			if(check.checked)
				$("#brf3e1").fadeIn(200);
			else
				$("#brf3e1").fadeOut(200);
		}
		else if(id=='f3e1a'){
			if(!check.checked)
				$("#brf3e1a").fadeIn(200);
			else
				$("#brf3e1a").fadeOut(200);
		}
		//
	//
}

function limpar(){
	$("#svg").empty();
}


function light(id){
	if(id=="login"){
		$("#login").css("opacity", 1.0)
		$("#register").css("opacity", 0.4)
	}
	else if(id=="register"){
		$("#register").css("opacity", 1.0)
		$("#login").css("opacity", 0.4)
	}
}
(function($) {
    var data = [
        {str:navigator.userAgent,sub:'Chrome',ver:'Chrome',name:'chrome'},
        {str:navigator.vendor,sub:'Apple',ver:'Version',name:'safari'},
        {prop:window.opera,ver:'Opera',name:'opera'},
        {str:navigator.userAgent,sub:'Firefox',ver:'Firefox',name:'firefox'},
        {str:navigator.userAgent,sub:'MSIE',ver:'MSIE',name:'ie'}];
    for (var n=0;n<data.length;n++)	{
        if ((data[n].str && (data[n].str.indexOf(data[n].sub) != -1)) || data[n].prop) {
            var v = function(s){var i=s.indexOf(data[n].ver);return (i!=-1)?parseInt(s.substring(i+data[n].ver.length+1)):'';};
            $('html').addClass(data[n].name+' '+data[n].name+v(navigator.userAgent) || v(navigator.appVersion)); break;			
        }
    }
})(jQuery);
/* end Page */

/* begin Layout */
jQuery(function () {
     var c = jQuery('div.art-content');
    if (c.length !== 1) return;
    var s = c.parent().children('.art-layout-cell:not(.art-content)');


    if (jQuery.browser.msie && parseInt(jQuery.browser.version) < 8) {
        jQuery(window).bind('resize', function() {
            var w = 0;
            c.hide();
            s.each(function() { w += this.clientWidth; });
            c.w = c.parent().width(); c.css('width', c.w - w + 'px');
            c.show();
        });
    }

    jQuery(window).trigger('resize');
});/* end Layout */

/* begin Button */
function artButtonSetup(className) {
    jQuery.each(jQuery("a." + className + ", button." + className + ", input." + className), function (i, val) {
        var b = jQuery(val);
        if (!b.parent().hasClass('art-button-wrapper')) {
            if (b.is('input')) b.val(b.val().replace(/^\s*/, '')).css('zoom', '1');
            if (!b.hasClass('art-button')) b.addClass('art-button');
            jQuery("<span class='art-button-wrapper'><span class='art-button-l'> </span><span class='art-button-r'> </span></span>").insertBefore(b).append(b);
            if (b.hasClass('active')) b.parent().addClass('active');
        }
        b.mouseover(function () { jQuery(this).parent().addClass("hover"); });
        b.mouseout(function () { var b = jQuery(this); b.parent().removeClass("hover"); if (!b.hasClass('active')) b.parent().removeClass('active'); });
        b.mousedown(function () { var b = jQuery(this); b.parent().removeClass("hover"); if (!b.hasClass('active')) b.parent().addClass('active'); });
        b.mouseup(function () { var b = jQuery(this); if (!b.hasClass('active')) b.parent().removeClass('active'); });
    });
}
jQuery(function() { artButtonSetup("art-button"); });

/* end Button */



