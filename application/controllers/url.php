<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'controllers/PadreController.php');
class Url extends PadreController {

	// variables 
		private $_model;
	public function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('session');
		
		$this->load->model("Entidades/Usuario");
		$this->load->model("Entidades/AnnotationE");
		$this->load->model("Entidades/RitsaVideosE");
		$this->load->model("Control/RitsaVideosControl");
		$this->load->model("Control/AnnotationControl");
	}

	public function doAnnotation(){
		$annotationE = new AnnotationE();

	}
	// url 
	public function index($url){
		$embedUrl = "https://www.youtube.com/embed/".$url;
		$controlVideos = new RitsaVideosControl();
		$user = null;
		if(isset($_SESSION["user"]) && $_SESSION["user"] != null){
			$user = unserialize($_SESSION["user"]);
		}
		$videoInformation 		 = $controlVideos->getVideoFromUrl($url);
		$controlAnnotation 		 = new AnnotationControl();
		$videoAnnotation 		 = new AnnotationE();
		$videoAnnotation->_video = $videoInformation->video;
		if($user != null){
			$videoAnnotation 		 = $controlAnnotation->getMessageByVideoAndUser($videoInformation->video->_id,$user->_idUsuario);
			$videoAnnotation->_video = $videoInformation->video;
		}
		//$videoAnnotation = $

		if(!$videoInformation->status){
			// video is not valid
		}
		$data = array(
			'videoAnnotation' => $videoAnnotation
		);

		$this->load->view('url/url/index.php',$data);		
	}
	public function deleteAnnotation($id,$videoReference){
		try{
			$controlAnnotation = new AnnotationControl();
			$control = $controlAnnotation->delete($id);
			redirect('/url/index/'.$videoReference, 'location');
		}catch(Exception $e){

		}
	}
	public function saveAnnotation(){
		try {
			$controlAnnotation = new AnnotationControl();
			$user = unserialize($_SESSION["user"]);
			$annotation 				= new AnnotationE();
			$annotation->_video 		= new RitsaVideosE();
			$annotation->_video->_id 	= $_POST['txtVideoId'];
			$annotation->_message 		= $_POST['txtAreaNota'];
			$control = $controlAnnotation->save($annotation,$user->_idUsuario);

			if($control->status){
				redirect('/url/index/'.$_POST['txtVideoURL'], 'location');
			}else{
				echo "<pre>";
					print_r($control);
				echo "</pre>";
			}
		} catch (Exception $e) {
			
		}
	}
}
