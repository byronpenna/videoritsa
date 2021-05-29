<?php 
class AlertsLogModel extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Entidades/AlertsE");
		$this->load->model("Entidades/AlertsLogE");
	}
	public function getActiveAlert(){
		$returnObj = new stdClass();
		try {
			$sql = "
				SELECT al.id as al_id,al.start_date , al.alert_id,al.end_date,a.* 
				FROM `alerts_log` al
				inner join alerts a 
				on a.id = al.alert_id
				WHERE end_date >= now() and start_date <= now()
				order by al.id desc
				;
			";
			$query = $this->db->query($sql);
			//print_r($query);
			$alertsLogs 		= array();
			$returnObj->status 	= true;
			foreach ($query->result() as $key => $row) {
				//print_r($row);
				$alertLogE = new AlertsLogE();
				$status = $alertLogE->getFromRowResult($row);
				if($status){
					array_push($alertsLogs, $alertLogE);	
				}
			}
			$returnObj->alertsLogs = $alertsLogs;
		} catch (Exception $e) {
			
		}

		return $returnObj;
	}
	public function add($alertID){
		$sql = "
			INSERT INTO alerts_log(alert_id,start_date,end_date)
			select id,now(), DATE_ADD(now(), INTERVAL duration second)
			from alerts 
			where id = ".$alertID.";
		";
		$this->db->query($sql);
			

	}
}