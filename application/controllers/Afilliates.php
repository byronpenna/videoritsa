<?php

include_once(APPPATH.'controllers/PadreController.php');

class Afilliates extends PadreController {
	// variables
		private $_model;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
	public function howTo(){

	}
}
