<?php 
class PantallaUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Control/ControlUsuario");
	}
	public function login(&$usuario,&$roles){ // retorna un objeto usuario
		try{
			$usuarioRetorno = new Usuario();
			$controlUsuario = new ControlUsuario();
			$sql = "
				SELECT * FROM `users` 
				WHERE username = '".$usuario->getUsuario()."' 
				and pass = MD5('".$usuario->getPass()."');
			";
			//CALL sp_pantallaUsuario_login('".$usuario->getUsuario()."','".$usuario->getPass()."')
			$param = array(
				$usuario->getUsuario(), 
				$usuario->getPass()
			);
			$query = $this->db->query($sql);
			$row = $query->row();
			//print_r($row);
			//$query->next_result();
			//$query->free_result();
			$retorno = false;
			//echo "num".$query->num_rows." <BR>"; 
			if($row != null){
				$retorno = true;
				$usuario->setId($row->id);
				$usuario->setUsuario($row->username);
				//$roles = $controlUsuario->getRolesByUser($usuario->_idUsuario);		
			}
			return $retorno;
		}catch(Exception $e){

		}
	}
}