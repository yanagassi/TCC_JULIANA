<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
 
	public function __construct(){
        parent::__construct();
		$this->load->model('base_model'); 
	}
	 
	private function pega_dados(){
		return $this->base_model->pega_dados();
	}

	public function index()
	{ 
		$this->load->view('analisa_dados', array("parametro" => $this->pega_dados()));
	} 

	public function migracao(){ 
		if($this->base_model->migracao()){
			$this->load->view('migrar_dados');
		}
	}
}
