<?php
require "ellipse.php";
require "rectangle.php";
require "effects.php";

class db{
	
	static $hashs;
	static $token;
	
	public $id;			//RECEBE ID
	var $email;			//RECEBE EMAIL
	var $password;		//RECEBE SENHA
	
	var $query;			//*RECEBE CÓDIGO SQL
	var $check;			//*RECEBE CÓDIGO SQL	(CONSULTA)
	
	var $value;			//RECEBE VALOR
	var $type;			//RECEBE TIPO DO VETOR
	var $fetcha;		//RECEBE VETOR["STRING"]
	var $fetchr;		//RECEBE VETOR[num]
	
	var $sql;			//RECEBE CÓDIGO SQL	
	var $table;			//RECEBE NOME DE TABELA
	var $column;		//RECEBE NOME DA COLUNA
	
	var $img_id;		//RECEBE O ID DA IMAGEM ATUAL
	var $arr;			//RECEBE ARRAY QUALQUER
	
	function __construct(){
		$this->connection();
		self::$hashs = md5("gim");
		self::$token = md5("gon");
	}
	
	function connection(){
		////////////////////////////////////////
		// ERROS                              //
		// -1 : Falha na conexão com o banco  //
		// -2 : Falha na conexão com a db     //
		////////////////////////////////////////
		
		$connect['host'] = "localhost";
		$connect['login'] = "root";
		$connect['password'] = "";
		$connect['database'] = "gerador";
		
		$connect['connect'] = mysql_connect($connect['host'],$connect['login'],$connect['password']);
		if(!$connect['connect'])
			return -1;
		
		$connect['db_connect'] = mysql_select_db($connect['database'], $connect['connect']);
		if (!$connect['db_connect'])
			return -2;
		
		srand(time());
		return 1;
	}
	
	function register($email,$password){
		//////////////////////////////////////
		// ERROS                            //
		// -1 : Deixou espaços em branco    //
		// -2 : Já existe o email no banco  //
		// -3 : Falha no cadastro           //
		//////////////////////////////////////
		
		$this->email = $email;
		$this->password = $password;
		
		if(empty($this->email) || empty($this->password))
			return -1;
		
		$this->check = mysql_query("SELECT * FROM users_".self::$hashs." WHERE email = '".$this->email."'");
		if(@mysql_num_rows($this->check))
			return -2;
		
		$this->password = self::$token.md5($this->password);
		
		$this->query = mysql_query("INSERT INTO users_".self::$hashs." VALUES ('','".$this->email."','".$this->password."')");
		
		if(@mysql_affected_rows($this->query) == -1)
			return -3;
		
		return 1;
	}
	
	function login($lemail,$lpassword){
		//////////////////////////////////////
		// ERROS                            //
		// -1 : Não existe o email no banco //
		// -2 : Senha incorreta             //
		//////////////////////////////////////
		
		$this->email = $lemail;
		$this->password = $lpassword;
		
		$this->check = mysql_query("SELECT * FROM users_".self::$hashs." WHERE email = '".$this->email."'");
		
		if(!@mysql_num_rows($this->check))
			return -1;
		
		$this->fetcha = mysql_fetch_array($this->check);
		
		$this->password = self::$token.md5($this->password);
		if($this->password != $this->fetcha["password"])
			return -2;
		
		return 1;
	}
	
	function autoinc($table){
		$this->query = mysql_query("SELECT LAST_INSERT_ID() FROM ".$table."_".self::$hashs."");
		$return = mysql_fetch_row($this->query);
		return $return[0];
	}
	
	function dbconsult($table,$type){
		///////////////////////////////////////
		// ERROS                             //
		// -1 : Não há registros encontrados //
		///////////////////////////////////////
		
		$this->table = $table;
		$this->type = $type;
		
		$this->query = mysql_query("SELECT * FROM ".$this->table."_".self::$hashs);
			
		if(!@mysql_num_rows($this->query))
			return -1;
			
		return $this->dbconsultnext();
				
	}
	
	function dbconsultspec($table,$column,$value,$type){
		///////////////////////////////////////
		// ERROS                             //
		// -1 : Não há registros encontrados //
		///////////////////////////////////////
		
		$this->table = $table;
		$this->value = $value;
		$this->column = $column;
		$this->type = $type;
		
		$this->query = mysql_query("SELECT * FROM ".$this->table."_".self::$hashs." WHERE ".$this->column." = '".$this->value."'");
			
		if(!@mysql_num_rows($this->query))
			return -1;
			
		return $this->dbconsultnext();
				
	}
	
	function dbconsultnext(){
		/////////////////////////////////////////
		// ERROS                               //
		// -1 : Tipo errado                    //
		// -2 : Não foi realizado uma consulta //
		/////////////////////////////////////////
		
		if(!$this->query)
			return -2;
			
		if($this->type == "a")
			return(mysql_fetch_array($this->query));
		elseif($this->type == "r")
			return(mysql_fetch_row($this->query));
		else
			return -1;
	}
	
	function dbcount(){
		return @mysql_num_rows($this->query);
	}
	
	function save($info,$f1_att,$f2_att,$f3_att){
		/////////////////////////////////////////
		// ERROS                               //
		// -1 : Falha userimgs                 //
		// -2 : Falha circles                  //
		// -3 : Falha rectangles               //
		// -4 : Falha generator                //
		/////////////////////////////////////////
		
		
		$token = md5($info["name"]);
		$this->query = mysql_query("INSERT INTO userimgs_".self::$hashs." VALUES ('','".$this->id."','".$info["name"]."','".$token."')");

		if(@mysql_affected_rows($this->query) == -1)
			return -1;
			
		$this->img_id = $this->autoinc("userimgs");
		
		if($info["circles-id"] == 1){
			$this->query = mysql_query("INSERT INTO circles_".self::$hashs." VALUES ('','".$f1_att["qtd"]."','".$f1_att["raio"]."','".$f1_att["stroke-min"]."','".$f1_att["stroke-max"]."','".$f1_att["stroke-width"]."','".$f1_att["fill-min"]."','".$f1_att["fill-max"]."','".$f1_att["fill-opacity"]."')");
			
			if(@mysql_affected_rows($this->query) == -1)
				return -2;
				
			$info["circles-id"] = $this->autoinc("circles");
		}
		else
			$info["circles-id"] = -1;
		
		if($info["rectangles-id"] == 1){
			$this->query = mysql_query("INSERT INTO rectangles_".self::$hashs." VALUES ('','".$f2_att["qtd"]."','".$f2_att["max-width"]."','".$f2_att["max-height"]."','".$f2_att["stroke-min"]."','".$f2_att["stroke-max"]."','".$f2_att["stroke-width"]."','".$f2_att["fill-min"]."','".$f2_att["fill-max"]."','".$f2_att["fill-opacity"]."')");
			
			if(@mysql_affected_rows($this->query) == -1)
				return -3;
				
			$info["rectangles-id"] = $this->autoinc("rectangles");
		}
		else
			$info["rectangles-id"] = -1;
			
		$this->query = mysql_query("INSERT INTO generator_".self::$hashs." VALUES ('".$this->img_id."','".$info["type"]."','".$info["width"]."','".$info["height"]."','".$info["margin"]."','".$info["circles-id"]."','".$info["rectangles-id"]."','".$info["text-stroke"]."','".$info["stroke-color"]."','".$info["font"]."')");
		
		if(@mysql_affected_rows($this->query) == -1)
			return -4;
			
		return 1;
	}
	
	
	function updt($info,$f1_att,$f2_att,$f3_att){
		/////////////////////////////////////////
		// ERROS                               //
		// -2 : Falha circles                  //
		// -3 : Falha rectangles               //
		// -4 : Falha generator                //
		/////////////////////////////////////////
		
		$data = $this->dbconsultspec("generator","img_id",$info["img_id"],"a");
		
		if($info["circles-id"] == 1){
			$this->query = mysql_query("UPDATE circles_".self::$hashs." SET `qtd`='".$f1_att["qtd"]."', `raio`='".$f1_att["raio"]."', `stroke-min`='".$f1_att["stroke-min"]."', `stroke-max`='".$f1_att["stroke-max"]."', `stroke-width`='".$f1_att["stroke-width"]."', `fill-min`='".$f1_att["fill-min"]."', `fill-max`='".$f1_att["fill-max"]."', `fill-opacity`='".$f1_att["fill-opacity"]."' WHERE `id`='".$data["circles-id"]."'");			
			
			if(@mysql_affected_rows($this->query) == -1){
				return -2;
			}
		}
		else{
			$this->query = mysql_query("UPDATE generator_".self::$hashs." SET `circles-id`='-1' WHERE `img_id`='".$data["img_id"]."'");
			
			if(@mysql_affected_rows($this->query) == -1)
				return -2;
				
			$this->query = mysql_query("DELETE FROM circles_".self::$hashs." WHERE `id`='".$data["circles-id"]."'");
			if(@mysql_affected_rows($this->query) == -1)
				return -2;
		}
		
		if($info["rectangles-id"] == 1){
			$this->query = mysql_query("UPDATE rectangles_".self::$hashs." SET `qtd`='".$f2_att["qtd"]."', `max-width`='".$f2_att["max-width"]."', `max-height`='".$f2_att["max-height"]."', `stroke-min`='".$f2_att["stroke-min"]."', `stroke-max`='".$f2_att["stroke-max"]."', `stroke-width`='".$f2_att["stroke-width"]."', `fill-min`='".$f2_att["fill-min"]."', `fill-max`='".$f2_att["fill-max"]."', `fill-opacity`='".$f2_att["fill-opacity"]."' WHERE `id`='".$data["rectangles-id"]."'");
			
			if(@mysql_affected_rows($this->query) == -1)
				return -3;
		}
		else{
			$this->query = mysql_query("UPDATE generator_".self::$hashs." SET `rectangles-id`='-1' WHERE `img_id`='".$data["img_id"]."'");
			
			if(@mysql_affected_rows($this->query) == -1)
				return -3;
				
			$this->query = mysql_query("DELETE FROM rectangles_".self::$hashs." WHERE `id`='".$data["rectangles-id"]."'");
			if(@mysql_affected_rows($this->query) == -1)
				return -3;
		}
			
		$this->query = mysql_query("UPDATE generator_".self::$hashs." SET `type`='".$info["type"]."', `width`='".$info["width"]."', `height`='".$info["height"]."', `margin`='".$info["margin"]."', `text-stroke`='".$info["text-stroke"]."', `stroke-color`='".$info["stroke-color"]."', `font`='".$info["font"]."' WHERE `img_id`='".$data["img_id"]."'");
		
		if(@mysql_affected_rows($this->query) == -1)
			return -4;
			
		return 1;
	}

	
	
	
	
	function checkid($img_id,$id){
		$this->check = mysql_query("SELECT * FROM userimgs_".self::$hashs." WHERE img_id = '".$img_id."' AND id = '".$id."'");
		if(@mysql_num_rows($this->check) != 1)
			return -1;
		else 
			return 1;
	}
	
	function delete($img_id,$id){
		
		if($this->checkid($img_id,$id) == -1)
			return -1;
		
		mysql_query("DELETE FROM userimgs_".self::$hashs." WHERE img_id = '".$img_id."'");
		$this->query = mysql_query("SELECT * FROM generator_".self::$hashs." WHERE img_id = '".$img_id."'");
		$ids = mysql_fetch_row($this->query);
		mysql_query("DELETE FROM generator_".self::$hashs." WHERE img_id = '".$img_id."'");
		if($ids[0] != -1)
			mysql_query("DELETE FROM circles_".self::$hashs." WHERE id = '".$ids[5]."'");
		if($ids[1] != -1)
			mysql_query("DELETE FROM rectangles_".self::$hashs." WHERE id = '".$ids[6]."'");
		
		return 1;
	}

}

class generator extends db{
	
	var $aux;
	
	private $ellipse;	
	private $rectangle;

	var $divid;
	var $img_id;
	var $info;
	
	var $svg;				//RECEBE STRING FINAL
	
	function __construct(){
		$this->connection();
		$this->info = array();
		$this->svg = "";
	}
	
	function imgdata(){
		/////////////////////////////////////////
		// ERROS                               //
		// -1 : Id errado                      //
		/////////////////////////////////////////
		$this->info = $this->dbconsultspec("generator","img_id",$this->img_id,"a");
		if($this->info == -1)
			return -1;
		return $this->info;
	}
	
	function drawing($img_id,$type,$token){
		$this->img_id = $img_id;
		$this->imgdata();
		
		$check_token = $this->dbconsultspec("userimgs","img_id",$img_id,"a");
		if($check_token["token"] != $token)
			return -1;
			
		$this->svg = "";
		
		if( $type == "t" ){
			$this->info["width"] = 100;
			$this->info["height"] = 100;
		}		
		
		$qtd = "";
		
		//$this->polygon = array();
		
		$this->ellipse = new ellipse();
		$this->ellipse->info = $this->info;
		$this->ellipse->data = $this->dbconsultspec("circles","id",$this->info["circles-id"],"a");
		$qtd += $this->ellipse->data["qtd"];
		
		$this->rectangle = new rectangle();
		$this->rectangle->info = $this->info;
		$this->rectangle->data = $this->dbconsultspec("rectangles","id",$this->info["rectangles-id"],"a");
		$qtd += $this->rectangle->data["qtd"];
		
		for( $i=0 ; $i < $qtd ; $i++ ){
			
			if($this->ellipse->data["qtd"] > $i){		
				if($this->info["circles-id"] != -1)
					$this->svg .= $this->ellipse->draw($type);
			}
			if($this->rectangle->data["qtd"] > $i){
				if($this->info["rectangles-id"] != -1)
					$this->svg .= $this->rectangle->draw($type);
			}
			
		}
		
		
		return "<svg width='".$this->info["width"]."' height='".$this->info["height"]."' version='1.1' xmlns='http://www.w3.org/2000/svg'>".$this->svg."</svg>";
	}
}

class save extends generator{
	
	function __constructor(){
		$this->connection();
	}

	function save_img($id,$type,$name,$info,$f1,$f2,$f3,$f1_att,$f2_att,$f3_att){
		
		$this->info = array();
		$this->info = $info;
		$this->info["name"] = $name;
		$this->info["circles-id"] = $f1;
		$this->info["rectangles-id"] = $f2;
		
		$this->id = $id;
		
		if($type == "s")
			$result = $this->save($this->info,$f1_att,$f2_att,$f3_att);
			
		elseif($type == "a")
			$result = $this->updt($this->info,$f1_att,$f2_att,$f3_att);
		
		return $result;
	}
	
}
?>