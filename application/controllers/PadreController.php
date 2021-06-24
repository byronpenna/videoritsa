<?php 
class PadreController extends CI_Controller
{
	public $_usuarioSession;
	function __construct()
	{
		parent::__construct();	
		
		if(@$_SESSION["user"] != null){
			$this->_usuarioSession = unserialize($_SESSION["user"]);
			//echo "logueado";
		}else{
			if(!$this->isLoginUrl()){
				redirect("/welcome","refresh");
			}else{
				//echo "no lo necesita";	
			}
			
		}
	}
	// funciones 
		function getAjaxFrm(){
			$frm = json_decode($_POST["form"]);
			return $frm;
		}
		public $allowed = [
			"url" => [
				"index"
			]
		];
		public function isAllowedMethod($controller,$method){
			$return = false;
			foreach ($this->allowed[$controller] as $key => $allowedMethod) {
				if($method == $allowedMethod){
					$return = true;
					break;
				}
			}
			return $return;
		}
		public function isLoginUrl(){
			$isLogin = false;
			$ci =& get_instance();
			// Muestra el nombre del controlador
		        $controlador 	= $ci->router->fetch_class();
		    // Muestra el nombre del metodo que se esta ejecutando
		        $menu_principal = $ci->router->fetch_method();
		   	if( $controlador == "welcome" && $menu_principal = "index"){
		   		$isLogin = true;
		   		return $isLogin;
		   	}
		   	$isLogin = $this->isAllowedMethod($controlador,$menu_principal);
		   	return $isLogin;
		}
}