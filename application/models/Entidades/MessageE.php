<?php
/**
 * 
 */
class MessageE extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public $_id;
	public $_title;
	public $_message;
	public $_active;
	
	public function getFromRowResult($row){
		$status = true;
		try {
			$this->_id 		= $row->id;
			$this->_title 	= $row->title;
			$this->_message = $row->message;
			$this->_active 	= $row->active;
		} catch (Exception $e) {
			$status = false;
		}
		return $status;
	}
}