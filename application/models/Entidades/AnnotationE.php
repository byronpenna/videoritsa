<?php
class AnnotationE extends CI_Model
{
	function __construct(){
		# code...
		parent::__construct();
	}
	public $_id;
	public $_message;
	public $_user;
	public $_video;
	public function getFromID($id){

		$returnObj 			= new stdClass();
		$returnObj->status 	= false;
		try {
			$sql = "SELECT * 
			FROM `annotations` 
			WHERE id = ".$id."
			LIMIT 1;
			";
			$query = $this->db->query($sql);
			
			foreach ($query->result() as $key => $row) {
				$returnObj->status = $this->getFromRowResult($row);
			}

		} catch (Exception $e) {
			
		}
		return $returnObj;

	}
	public function getFromRowResult($row){
		$status = true;
		try{
			$this->_id 			= $row->id;
			$this->_message		= $row->message;
			/*$this->_video		= $row->id;
			$this->_user		= $row->id;
			*/
		}catch(Exception $e){
			$status = false;
		}
		return $status;
	}
}