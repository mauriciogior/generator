<?php

class ellipse{

	var $data;
	var $aux;
	var $svg;
	
	var $info;

	var $returnsvg;
	
	private $effects;
	
	function draw($type){
		if( $type == "t" ){
			$this->aux = ($this->info["width"]+$this->info["height"])/100;
			$this->data["raio1"] = $this->data["raio1"]/$this->aux;
			$this->data["raio2"] = $this->data["raio2"]/$this->aux;
			$this->data["qtd"] = $this->data["qtd"]/$this->aux;
		}
		
		$this->svg = "";
		$this->effects = new effects();
		
			//CONTORNO
				$this->svg .= $this->effects->stroke($this->data);
			//
			//FILL
				$this->svg .= $this->effects->fill($this->data);
			//
			//OPACIDADE
				if($data["fill-min"] != "undef")
					$this->svg .= $this->effects->opacity($this->data);
				else
					$this->svg .= " fill-opacity='0' ";
			//
			
			$this->returnsvg = "";
			
			if($data["raio2"] == 0)
				$this->returnsvg .= "<circle";
			else
				$this->returnsvg .= "<ellipse";
				
			$this->returnsvg .= " cx='".$this->effects->nrandom($this->info["margin"],($this->info["width"]-$this->info["margin"]))."'";
			$this->returnsvg .= " cy='".$this->effects->nrandom($this->info["margin"],($this->info["height"]-$this->info["margin"]))."'";
			
			if($data["raio2"] == 0)
				$this->returnsvg .= " r='".$this->effects->nrandom(1,$this->data["raio1"])."'";
			else
				$this->returnsvg .= " rx='".$this->effects->nrandom(1,$this->data["raio1"])."' ry='".$this->effects->nrandom(1,$this->data["raio2"])."'";
			
			$this->returnsvg .= " ".$this->svg."/>";
			
		return $this->returnsvg;
		
	}


}

?>