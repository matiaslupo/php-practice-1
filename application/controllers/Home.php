<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $f = "home/"; //view folder
    private $datos= array();
	private $mostrar_barra= true;

	public function __construct(){
		parent::__construct();
		$this->datos['titulo']= 'Practica PHP: Lista de tareas';
	}

	public function index()
	{
		redirect('home/main');
	}

    public function main(){
        $this->mostrar();
    }

	private function mostrar($vista= "home"){
        $this->load->view("plantillas/cabecera", $this->datos);
		if ($this->mostrar_barra){
			$this->load->view("plantillas/navegacion", $this->datos);
		}
        $this->load->view($this->f.$vista, $this->datos);
        $this->load->view('plantillas/pie', $this->datos);
	}
}
