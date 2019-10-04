<?php

class base_model extends CI_Model {


    public function __construct(){
        parent::__construct(); 
		$this->load->database(); 
    }
    
    private function relpace_data($dados, $hora){ 
		$data = explode("/", $dados);
		return $data[2] . "-" . $data[1] . "-" . $data[0] . " ".$hora;
    } 
    
    public function migracao(){
        $dados = array();
		if ($file = fopen(BASEPATH."/../MIGRAR/datalogger.txt", "r")) {
		   while(!feof($file)) {
			   $line = fgets($file); 
			   $arr = explode("~#~", $line);
			   if($arr[0] != null){
				   array_push($dados, $arr);
			   } 
		   }
		   fclose($file);
	   	}
   
		foreach($dados as $key){  
			$array = array(
				"Temperatura" => (rand(5, 40) / 3),//$key[2],
				"Data" => $this->relpace_data($key[0], $key[1]),
				"Umidade" =>  random_int(51,100),//$key[3],
				"Velocidade_vento" => (rand(5, 10) / 3), //$key[4],
				"Municipio" => $key[5],
				"Latitude" => $key[6],
				"Longitude"=> $key[7],

			);
			$this->db->insert('dados',$array);
        }
        
        return true;
    }


    public function pega_dados(){
        return $this->db->get('dados')->result_array();
    }
}