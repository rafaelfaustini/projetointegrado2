<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

	private $token = "1eb25dcc1b1dbdf402a8155436f567c8a787666e4208db7d77a356c98cfc7251";

	function __construct()
	{
		parent::__construct(); 
		$this->load->helper('form'); 
	}

	public function index()
	{
		$data=array();

		$keyword = $this->input->post('keyword');
		$date = $this->input->post('date');

		if(!empty($_POST)){
		$data['aulas'] = $this->buscar($this->token, $keyword, $date);

		if($data['aulas'] == null || empty($data['aulas'])){
			$data = [];
		}
	}
		$data['keyword'] = $keyword;
		$data['date'] = $date;
		
		$this->load->view('index/index.php', $data);
	}

	private function buscar($token, $keyword,$data){
		try{
			$token = urlencode($token);
			$keyword=urlencode($keyword);
			$data = urlencode($data);
			$parameter = "";
			if(isset($keyword) && !empty($keyword)){
				$parameter.="&keyword=$keyword";
			}
			if(isset($data) && !empty($data)){
				$parameter.="&keyword=$data";
			}
		$aulas = json_decode(
			file_get_contents("https://cadeprofessor-api.herokuapp.com/index.php/aula/busca?token=$token$parameter"), true);
		return $aulas;

		} catch (Exception $e) {
			return null;
		}
	}

	}
	

