<?php

class effects{
	
	var $returnsvg;

	var $aux;

	var $R;
	var $G;
	var $B;
	
	var $R_min;
	var $G_min;
	var $B_min;
	
	var $R_max;
	var $G_max;
	var $B_max;
	
	function nrandom($inf,$sup){
		return $inf>$sup?@rand($sup,$inf):@rand($inf,$sup);
	}

///////////////////////////////////////////////////////////////
//////////////////////////CONTENT//////////////////////////////
///////////////////////////////////////////////////////////////
/**/	function fill($data){
/**/		$this->returnsvg = "";
/**/		//FILL		
/**/			////COR
/**/				if($data["fill-min"] != "undef"){
/**/					if($data["fill-min"] == "rand"){
/**/						
/**/						$this->R_min = 0;
/**/						$this->G_min = 0;
/**/						$this->B_min = 0;
/**/						
/**/						$this->R_max = 255;
/**/						$this->G_max = 255;
/**/						$this->B_max = 255;
/**/						
/**/					}
/**/					else{
/**/						
/**/						$this->aux = array();
/**/						
/**/						$this->aux = str_split($data["fill-min"],2);
/**/						$this->R_min = hexdec($this->aux[0]);
/**/						$this->G_min = hexdec($this->aux[1]);
/**/						$this->B_min = hexdec($this->aux[2]);
/**/						
/**/						$this->aux = str_split($data["fill-max"],2);
/**/						$this->R_max = hexdec($this->aux[0]);
/**/						$this->G_max = hexdec($this->aux[1]);
/**/						$this->B_max = hexdec($this->aux[2]);
/**/						
/**/					}
/**/					
/**/					$this->R = $this->nrandom($this->R_min,$this->R_max);
/**/					$this->G = $this->nrandom($this->G_min,$this->G_max);
/**/					$this->B = $this->nrandom($this->B_min,$this->B_max);
/**/					
/**/					if($this->R < 16)	$this->R = "0".dechex($this->R);
/**/					else				$this->R = dechex($this->R);
/**/					if($this->G < 16)	$this->G = "0".dechex($this->G);
/**/					else				$this->G = dechex($this->G);
/**/					if($this->B < 16)	$this->B = "0".dechex($this->B);
/**/					else				$this->B = dechex($this->B);
/**/
/**/					$this->returnsvg .= " fill='#".$this->R.$this->G.$this->B."' ";
/**/					
/**/				}
/**/			//FIM FILL
/**/
/**/	}
/**/		
/**/	function opacity($data){
/**/		$this->returnsvg = "";
/**/	//OPACIDADE/**/		
/**/		if($data["fill-opacity"] != 100){
/**/			if($data["fill-opacity"] == -1)
/**/				$this->returnsvg .= " fill-opacity='".($this->nrandom(0,99)/100)."' ";
/**/			else
/**/				$this->returnsvg .= " fill-opacity='".($data["fill-opacity"]/100)."' ";
/**/		}
/**/		else
/**/				$this->returnsvg .= " fill-opacity='".($data["fill-opacity"]/100)."' ";
/**/	//
/**/		return $this->returnsvg;
/**/	}
/**/		
/**/	function stroke($data){
/**/		$this->returnsvg = "";
/**/		//CONTORNO
/**/			////WIDTH
/**/				if($data["stroke-width"] == -1)
/**/					$this->returnsvg .= " stroke-width='".$this->nrandom(1,(($data["raio1"])*($data["raio2"])/9) + ($data["max-width"])*($data["max-height"])/2500)."' ";
/**/				else
/**/					$this->returnsvg .= " stroke-width='".$data["stroke-width"]."' ";
/**/							
/**/			////COR
/**/				if($data["stroke-min"] != "undef"){
/**/					if($data["stroke-min"] == "rand"){
/**/						
/**/						$this->R_min = 0;
/**/						$this->G_min = 0;
/**/						$this->B_min = 0;
/**/						
/**/						$this->R_max = 255;
/**/						$this->G_max = 255;
/**/						$this->B_max = 255;
/**/						
/**/					}
/**/					else{
/**/						
/**/						$this->aux = array();
/**/						
/**/						$this->aux = str_split($data["stroke-min"],2);
/**/						$this->R_min = hexdec($this->aux[0]);
/**/						$this->G_min = hexdec($this->aux[1]);
/**/						$this->B_min = hexdec($this->aux[2]);
/**/						
/**/						$this->aux = str_split($data["stroke-max"],2);
/**/						$this->R_max = hexdec($this->aux[0]);
/**/						$this->G_max = hexdec($this->aux[1]);
/**/						$this->B_max = hexdec($this->aux[2]);
/**/						
/**/					}
/**/					
/**/					$this->R = $this->nrandom($this->R_min,$this->R_max);
/**/					$this->G = $this->nrandom($this->G_min,$this->G_max);
/**/					$this->B = $this->nrandom($this->B_min,$this->B_max);
/**/
/**/					if($this->R < 16)	$this->R = "0".dechex($this->R);
/**/					else				$this->R = dechex($this->R);
/**/					if($this->G < 16)	$this->G = "0".dechex($this->G);
/**/					else				$this->G = dechex($this->G);
/**/					if($this->B < 16)	$this->B = "0".dechex($this->B);
/**/					else				$this->B = dechex($this->B);
/**/					
/**/					$this->returnsvg .= " stroke='#".$this->R.$this->G.$this->B."' ";
/**/					
/**/				}
/**/			//FIM CONTORNO
/**/			return $this->returnsvg;
/**/	}
///////////////////////////////////////////////////////////////////
//////////////////////////FIM CONTENT//////////////////////////////
///////////////////////////////////////////////////////////////////
}
?>