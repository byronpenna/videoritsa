<?php 
class RitsaVideosE extends CI_Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}		
	public $_id;
	public $_title;
	public $_baseUrl;
	public function getFromID($id){
		$returnObj 			= new stdClass();
		$returnObj->status 	= false;
		try {
			$sql = "
			select * from ritsa_videos where id = ".$id." limit 1;
			";
			$query = $this->db->query($sql);
			foreach ($query->result() as $key => $row) {
				$returnObj->status = $this->getFromRowResult($row);
			}
		}catch(Exception $e){

		}
		return $returnObj;
	}

	public function getEmbedURL(){
		return "https://www.youtube.com/embed/".$this->_baseUrl;
	}
	public function getFromRowResult($row){
		$status = true;
		try {
			$this->_id 			= $row->id;
			$this->_title 		= $row->title;
			$this->_baseUrl		= $row->base_url;
			
		}catch (Exception $e) {
			$status = false;
		}
		return $status;
	}
}