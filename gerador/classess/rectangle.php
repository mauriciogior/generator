<?php

class rectangle{
	
	var $data;
	var $aux;
	var $svg;
	
	var $info;

	var $returnsvg;
	
	private $effects;
	
	function draw($type){
		if( $type == "t" ){
			$this->aux = ($this->info["width"]+$this->info["height"])/100;
			$this->data["max-width"] = $this->data["max-width"]/$this->aux;
			$this->data["max-height"] = $this->data["max-height"]/$this->aux;
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
			
			$this->returnsvg .= "<rect";
			$this->returnsvg .= " x='".$this->effects->nrandom($this->info["margin"],($this->info["width"]-(8/3)*($this->info["margin"])))."'";
			$this->returnsvg .= " y='".$this->effects->nrandom($this->info["margin"],($this->info["height"]-(8/3)*($this->info["margin"])))."'";
			$this->returnsvg .= " width='".$this->effects->nrandom(1,$this->data["max-width"])."'";
			$this->returnsvg .= " height='".$this->effects->nrandom(1,$this->data["max-height"])."'";
			$this->returnsvg .= " ".$this->svg."/>";
			
		return $this->returnsvg;
		
	}
}
?>