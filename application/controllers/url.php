<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'controllers/PadreController.php');
class Url extends PadreController {

	// variables 
		private $_model;
	public function __construct(){
		parent::__construct();
	}

	public function index($url){
		$embedUrl = "https://www.youtube.com/embed/".$url;
		$videoInformation = "";
		$data = array(
			'embedUrl' => $embedUrl
		);

		$this->load->view('url/url/index.php',$data);		
	}
}