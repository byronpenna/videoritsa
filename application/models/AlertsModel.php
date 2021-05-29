<?php 
/**
 * 
 */
class AlertsModel extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Entidades/AlertsE");
	}
	public function add(){
		try {
			
		} catch (Exception $e) {
			
		}
	}
	
	public function list(){
		$returnObj 			= new stdClass();
		$returnObj->status 	= false;
		try {
			$sql = "
				SELECT * from alerts;
			";
			$query = $this->db->query($sql);
			//print_r($query);
			$alerts = array();
			$returnObj->status = true;
			foreach ($query->result() as $key => $row) {
				//print_r($row);
				$alertE = new AlertsE();
				$status = $alertE->getFromRowResult($row);
				if($status){
					array_push($alerts, $alertE);	
				}
			}
			$returnObj->alerts = $alerts;
		} catch (Exception $e) {
			
		}
		return $returnObj;
	}
}