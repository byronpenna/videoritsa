<?php
//@session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'controllers/PadreController.php');


class Live extends PadreController {
	// variables 
		private $_model;
	// metodos magicos
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('session');

			$this->load->model("Entidades/MessageE");
			$this->load->model("Control/ControlMessages");

			$this->load->model("Entidades/AlertsE");
			$this->load->model("AlertsModel");
			$this->load->model("AlertsLogModel");

		}
		public function getAlerts(){
			$returnObj 				= new stdClass();
			$returnObj->status 		= true;
			$alertLogModel 			= new AlertsLogModel();
			$returnObj 				= $alertLogModel->getActiveAlert();
			echo json_encode( $returnObj);
		}
		public function getMessages(){
			$messageModel 	= new ControlMessages();
			$control 		= $messageModel->getActiveMessage();
			
			$data 			= array('message' => $control->message );
			echo json_encode($data);
		}
		public function launchAlert($id){
			$alertID = $id;
			$alertLogModel = new AlertsLogModel();
			$control = $alertLogModel->add($alertID);
			redirect('/Live/addAlert/', 'location');	
		}
		public function save(){
			$messageE 			= new MessageE();
			$messageE->_title 	= $_POST['txtTitle'];
			$messageE->_message = $_POST['txtMessage'];
			$messageModel 		= new ControlMessages();
			$control 			= $messageModel->save($messageE);
			redirect('/Live/add/', 'location');	
		}
		public function activateMessage($id){
			try {
				$messageModel 		= new ControlMessages();
				$messageModel->activateById($id);
				redirect('/Live/add/', 'location');	
			} catch (Exception $e) {
				
			}	
		}
	// url

		public function alerts() {

			//$$$

			$alertLogModel 			= new AlertsLogModel();
			$activeAlerts 			= $alertLogModel->getActiveAlert();
			$data = array(
				'activeAlerts' => $activeAlerts
			);
			$this->load->view('url/live/alerts.php',$data);
		}
		public function addAlert(){
			$alertsModel 	= new AlertsModel();
			$control 		= $alertsModel->list();
			$data 			= array(
				'alerts' => $control->alerts
			);
			
			$this->load->view('url/live/add_alert.php',$data);
		}
		public function add(){
			$messageModel 	= new ControlMessages();
			$control 		= $messageModel->getActiveMessage();
			$message 		= $control->message;
			$data 			= array(
				'message' 		=> $message,
				'todaysMessages' 	=> $messageModel->getTodayMessage()
			);
			
			$this->load->view('url/live/add.php',$data);
		}
		public function mensajes()
		{	
			$messageModel 	= new ControlMessages();
			$control 		= $messageModel->getActiveMessage();
			$data 			= array('message' => $control->message );
			$this->load->view('url/live/mensajes.php',$data);
		}
}
