<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $f = "home/"; //view folder

    private $datos= array();
	private $mostrar_barra= true;
	private $id;

	public function __construct(){
		parent::__construct();
		$this->validar_sesion();
		$this->id= $_SESSION['usuario_id'];
		$this->datos['titulo']= 'Practica PHP: Lista de tareas';
		$this->load->model('pendientes');
	}

	public function index()
	{
		redirect('home/main');
	}

    public function main(){		
        $this->mostrar();
    }

	private function validar_sesion(){
		if (isset($_SESSION['usuario_id']) == false){
			redirect('login');
			exit();
		}
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
