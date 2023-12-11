<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $f = "login/"; //view folder
    private $datos= array();

    public function __construct(){
        parent::__construct();
		$this->datos['titulo']= 'Bienvenido';
	}

	public function index()
	{
		redirect('login/main');
	}

    public function main(){
        $this->mostrar();
    }

	private function mostrar($vista= "login"){
        $this->load->view("plantillas/cabecera", $this->datos);
        $this->load->view($this->f.$vista, $this->datos);
        $this->load->view('plantillas/pie', $this->datos);
	}
}
