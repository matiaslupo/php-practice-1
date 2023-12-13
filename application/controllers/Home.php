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
		$this->datos['nick']= $_SESSION['nick'];
		$this->load->model('pendientes_model');
	}

	public function index()
	{
		redirect('home/main');
	}

    public function main(){		
		$pendientes= $this->pendientes_model->listar_tareas($this->id);
		if (count($pendientes)){
			$this->datos['pendientes']= $pendientes;
		} else {
			$this->datos['info']= "No hay tareas pendientes";
		}
        $this->mostrar();
    }

	public function crear_tarea(){
		$this->validar_sesion();
		$this->load->library('form_validation');
        $this->form_validation->set_rules('texto', 'Tarea', 'required|trim');
		if ($this->form_validation->run()){
			$datos= array(
				"texto" => $this->input->post("texto"),
				"usuario_id" => $this->id
			);
			if ($this->pendientes_model->nueva($datos) === false){
				$this->datos['error']= "Ha ocurrido un error al guardar la tarea";
			}			
		} else {
			$this->datos['error']= validation_errors();
		}
		redirect('home');
		// $this->test($this->datos);
		// $this->output->enable_profiler(true);
	}

	private function test($data = array()){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
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
