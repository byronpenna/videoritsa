<?php
//@session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'controllers/PadreController.php');
class Welcome extends PadreController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// variables 
		private $_model;
	// metodos magicos
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->model("acciones/WelcomeModel");
			$this->load->model("Entidades/Usuario");
			$this->load->model("Entidades/Accesos/RolUsuario");
			$this->load->library('session');
			$this->_model = new WelcomeModel();
		}
	// organizar categorias
		public function ordenCategoria($categorias){
			$nivel = Array();
			foreach ($categorias as $key => $categoria) {
				if($categoria->id_padre_fk == null){
					$nivel[$categoria->idCategoria] = new stdClass();
					$nivel[$categoria->idCategoria]->nombre = $categoria->categoria;
					$nivel[$categoria->idCategoria]->elementos = array();
				}else{
					array_push($nivel[$categoria->id_padre_fk]->elementos, $categoria);
				}
			}
			return $nivel;
		}
	// metodos 
		private function getUserFromPostLogin(){
			$usuario = new Usuario();
			$usuario->setUsuario($_POST['Username']);
			$usuario->setPass($_POST['Password']);
			return $usuario;
		}
	// url 
		public function logout(){
			$_SESSION = null;
			session_destroy();
			redirect('/Welcome/index', 'refresh');
		}
		public function index()
		{	
			$this->load->view('url/welcome/index.php');
		}
		public function testing(){
			$this->load->view("url/welcome/testing.php");
		}
		public function home(){
			//require_once(APPPATH."models\Entidades\Usuario.php");
			//$usuarioLogueado   =   $this->session->userdata("usuario");
			if(!isset($_SESSION["user"]) || $_SESSION["user"] == null){
				redirect('/welcome/index', 'refresh');
			}

			$usuarioLogueado = unserialize($_SESSION["user"]);
			if(isset($usuarioLogueado)){
				$rolesUsuario = $_SESSION["rolesUsuario"];
				$usu = new Usuario();
				$usu->setUsuario($usuarioLogueado->getUsuario());
				$usu->setId($usuarioLogueado->getId());
				$data = array('user' => $usuarioLogueado );
				$this->load->view('url/welcome/home.php',$data);		
			}else{
				redirect('/welcome/index', 'refresh');
			}

		}
		public function login(){
			try{
				$this->load->model("acciones/PantallaUsuario");
				$pantalla 	= new PantallaUsuario();				
				$usuario 	= $this->getUserFromPostLogin();
				$roles 		= array(); // array de roles del usuario;
				$logueado 	= $pantalla->login($usuario,$roles);
				if ($logueado){
					$_SESSION["user"] 			= serialize($usuario);
					$_SESSION["rolesUsuario"] 	= serialize($roles);
					redirect('/Welcome/Home', 'refresh');
				}else{
					redirect('/Welcome/index', 'refresh');
				}
			}catch(Exception $e){

			}
			
		}
}
