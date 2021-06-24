<?php 
class PeopleControl extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Entidades/Persona");
	}
	public function save(Persona $people){
		$returnObj = new stdClass();
		$returnObj->status = false;
		try{
			$sql = "
				INSERT INTO people(names,lastname,email)
				values('".$people->_nombres."','".$people->_apellidos."','".$people->_correo."');
			";
			$this->db->query($sql);
			$id = $this->db->insert_id();
			$returnObj->insertedID = $id;
			$returnObj->status = true;
		}catch(Exception $ex){

		}
		return $returnObj;	
	}
	public function getByID(){

	}
	public function get(){

	}
}
