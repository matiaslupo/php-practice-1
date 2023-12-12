<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $f = "login/"; //view folder
    private $datos= array();

    public function __construct(){
        parent::__construct();
		$this->datos['titulo']= 'Bienvenido';
        $this->load->model('usuarios_model');
	}

	public function index()
	{
		redirect('login/main');
	}

    public function main(){       
        $this->mostrar();
    }

    public function login(){        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nick', 'Nombre de usuario', 'required|trim');
        $this->form_validation->set_rules('clave', 'Clave', 'required'); 
        if ($this->form_validation->run()){
            $nick= $this->input->post('nick');
            $clave= md5($this->input->post('clave'));
            $res= $this->usuarios_model->login(array('nick' => $nick, 'clave' => $clave));
            if ($res !== false){
                $_SESSION['usuario_id']= $res['usuario_id'];
                $_SESSION['nick']= $nick;
                redirect('home');
                return;                
            } else {
                $this->datos['errors']= 'Credenciales invalidas, intente de nuevo.';
            }
        } else {
            $this->datos['errors']= validation_errors();            
        }
        $this->mostrar();        
    }

    public function cerrar_sesion(){
        session_destroy();
        redirect('login');
    }

	private function mostrar($vista= "login"){
        $this->load->view("plantillas/cabecera", $this->datos);
        $this->load->view($this->f.$vista, $this->datos);
        $this->load->view('plantillas/pie', $this->datos);
	}
}
