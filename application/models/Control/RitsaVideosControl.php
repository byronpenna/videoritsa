<?php 
class RitsaVideosControl extends CI_Model
{
	function __construct()
	{
		# code...
		parent::__construct();

		$this->load->model("Entidades/RitsaVideosE");
	}
	public function save(RitsaVideosE $obj){
		$returnObj = new stdClass();
		$returnObj->status = false;
		try {
			$sql = "
			INSERT INTO `ritsa_videos` (
			`title`, `base_url`) 
			VALUES ('".$obj->_title."', '".$obj->_baseUrl."');
			";
			$this->db->query($sql);
			$returnObj->status = true;
		}catch(Exception $e){

		}
		return $returnObj;
	}
	

	public function getVideoFromUrl($url){
		$returnObj = new stdClass();
		$returnObj->status = false;

		try {
			$sql = "
				SELECT * FROM `ritsa_videos` WHERE base_url = '".$url."';
			";
			$query = $this->db->query($sql);
			foreach ($query->result() as $key => $row) {
				$ritsaVideosE = new RitsaVideosE();
				$status = $ritsaVideosE->getFromRowResult($row);
				$returnObj->video = $ritsaVideosE;
				$returnObj->status = true;
			}

		}catch(Exception $e){

		}
		return $returnObj;

	}

}