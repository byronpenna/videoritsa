<?php 
class ControlMessages extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();

		$this->load->model("Entidades/MessageE");
	}
	public function save(MessageE $mjs){
		$returnObj = new stdClass();
		$returnObj->status = false;
		try {
			$sql = "UPDATE messages set active = 0";
			$this->db->query($sql);
			$sql = "
				INSERT INTO `messages` (`title`, `message`, `active`,`creation_date`) 
				VALUES ('".$mjs->_title."', '".$mjs->_message."', b'1',now());
			";
			$this->db->query($sql);
			$returnObj->status = true;
		} catch (Exception $e) {
			
		}
		return $returnObj;
		
	}
	public function activateById($id){
		$returnObj = new stdClass();
		$returnObj->status = false;
		
		try {
			$sql = "UPDATE messages set active = 0";
			$this->db->query($sql);

			$sql = "UPDATE messages set active = 1 where id = ".$id;
			$this->db->query($sql);

			$returnObj->status = false;
		
		} catch (Exception $e) {
			
		}

		return $returnObj;
	}
	public function getTodayMessage(){

		$returnObj = new stdClass();

		try {
			$sql = "
				SELECT * 
				FROM `messages` WHERE 
                creation_date BETWEEN '2021-03-25' and '2021-03-26'
				order by id desc
			";

			$query = $this->db->query($sql);
			$query = $this->db->query($sql);
			$todaysMessages = array();
			foreach ($query->result() as $key => $row) {
				$messageE = new MessageE();
				$returnObj->status = $messageE->getFromRowResult($row);
				array_push($todaysMessages, $messageE);
				
			}

		} catch (Exception $e) {
			
		}
		$returnObj->todaysMessages = $todaysMessages;

		return $returnObj;
	}
	public function getActiveMessage(){
		
		$returnObj = new stdClass();
		try{
			
			$sql = "
				SELECT * 
				FROM `messages` WHERE active = 1
				order by id desc
				limit 1;
			";

			$query = $this->db->query($sql);
			foreach ($query->result() as $key => $row) {
				$messageE = new MessageE();
				$returnObj->status = $messageE->getFromRowResult($row);
				$returnObj->message = $messageE;
				//public $_idUsuario;
	 			//public	$_usuario;
			}

		}catch(Exception $ex ){

		}

		return $returnObj;

	}
}