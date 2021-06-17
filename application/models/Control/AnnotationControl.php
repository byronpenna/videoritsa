<?php 
class AnnotationControl extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Entidades/AnnotationE");
	}
	public function save(AnnotationE $obj,$userID){
		$returnObj = new stdClass();
		$returnObj->status = false;
		try{
			$sql = "

			INSERT INTO `annotations` ( `message`, `user_id`, `video_id`, `creation_date`) 

			VALUES (
			'".$obj->_message."', 
			".$userID.", 
			'".$obj->_video->_id."', 
			current_timestamp()

			);
 
			";
			$this->db->query($sql);
			$returnObj->status = true;

		}catch(Exception $e){

		}
		return $returnObj;
	}
	public function delete($id){
		$returnObj = new stdClass();
		$returnObj->status = false;
		try {
			$sql = "
				DELETE FROM annotations where id = ".$id." 
			";
			$this->db->query($sql);
			$returnObj->status = true;
		} catch (Exception $e) {
			
		}
	}
	public function getMessageByVideoAndUser($videoID,$userID){
		$returnObj = new stdClass();
		$annotations = array();
		try{
			$sql = "
			SELECT * 
			from annotations 
			where video_id = ".$videoID." and user_id = ".$userID."
			";
			$query = $this->db->query($sql);
			foreach ($query->result() as $key => $row) {
				$annotationE = new AnnotationE();
				
				$status = $annotationE->getFromRowResult($row);
				array_push($annotations,$annotationE);
			}
		}catch(Exception $e){

		}
		$returnObj->annotations = $annotations;
		return $returnObj;

	}
}