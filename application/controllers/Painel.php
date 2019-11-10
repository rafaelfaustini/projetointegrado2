<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Painel extends CI_Controller {

	private $token = "1eb25dcc1b1dbdf402a8155436f567c8a787666e4208db7d77a356c98cfc7251";


	function __construct()
	{
		parent::__construct(); 
	}

	public function index()
	{
		$this->load->view('professor/painel.php');
	}

	private function get_http_response_code($url) {
		$headers = get_headers($url);
		return substr($headers[0], 9, 3);
	}

	public function list($tabela=null){
		
		if(isset($tabela) && !empty($tabela)){
			$url = "https://cadeprofessor-api.herokuapp.com/index.php/$tabela?token=".$this->token;
			$data = array();
			if($this->get_http_response_code($url) == "200"){
				$listaApi = file_get_contents($url);
				$elementos = json_decode($listaApi, true);
				$data["lista"] = $elementos;
				$data["nome"] = $tabela;
				$this->load->view("professor/lista", $data);
			} else {
				redirect('/', 'refresh');
			}
	}
}

private function sendPost($_url, $_param, $token){
	$ch = curl_init();

	$_param["token"] = $token;


	curl_setopt($ch, CURLOPT_URL, $_url);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
	http_build_query($_param));
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	
	// receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$server_output = curl_exec ($ch);
	$info = curl_getinfo($ch);

	curl_close ($ch);

	//var_dump($info);

var_dump($server_output);
	$resultado = json_decode($server_output, true);
	var_dump($resultado);
	return $resultado["status"];

}

	public function add($tabela=null){
		if(isset($tabela) && !empty($tabela)){
			$url = "https://cadeprofessor-api.herokuapp.com/index.php/$tabela?token=".$this->token;
			$data = array();

			$enviar = $this->input->post('add');
			if(isset($enviar)){
				$vetor = array();
				$listaApi = file_get_contents($url);
				$elementos = json_decode($listaApi, true);
				$data["colunas"] = array_keys($elementos[0]);
				foreach ($data["colunas"] as $coluna){
					if($coluna == "id"){
						continue;
					}
					$vetor[$coluna] = $this->input->post($coluna);
					$urlPost = "https://cadeprofessor-api.herokuapp.com/index.php/$tabela";
					$code = $this->sendPost($urlPost, $vetor, $this->token);
					if($code == "200"){
						redirect('/', 'refresh');
					}

				}

			}
			if($this->get_http_response_code($url) == "200"){
				$listaApi = file_get_contents($url);
				$elementos = json_decode($listaApi, true);
				$data["colunas"] = array_keys($elementos[0]);
				$data["nome"] = $tabela;
				$this->load->view("professor/add", $data);
			} else {
				redirect('/', 'refresh');
			}
	}
	}

	public function update($id){

	}

	public function remove($id){
		
	}

	}
	

