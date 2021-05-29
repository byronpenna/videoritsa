<?php 
class AlertsLogE extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Entidades/AlertsE");
		
	}
	public $_id;
	public $_alert;
	public $_start_date;
	public $_end_date;
	public function getFromRowResult($row){
		$status = true;
		try {
			$this->_id 				= $row->al_id;
			$this->_alert 			= new AlertsE();
			$this->_alert->getFromID($row->alert_id);
			$this->_start_date 		= $row->start_date;
			$this->_end_date 		= $row->end_date;

		} catch (Exception $e) {
			$status = false;
		}
		return $status;
	}

}