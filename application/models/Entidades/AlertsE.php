<?php 

class AlertsE extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	public $_id;
	public $_alertMjs;
	public $_withTimer;
	public $_duration;
	public $_severity; // obj
	public function getFromID($id){
		$returnObj 			= new stdClass();
		$returnObj->status 	= false;
		try {
			$sql = "SELECT * 
			FROM `alerts` 
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
		try {
			
			$this->_id 			= $row->id;
			$this->_alertMjs 	= $row->alert_mjs;
			$this->_withTimer	= $row->withTimer;
			$this->_duration 	= $row->duration;
			$this->_severity 	= $row->severity_id;

		} catch (Exception $e) {
			$status = false;
		}
		return $status;
	}
}