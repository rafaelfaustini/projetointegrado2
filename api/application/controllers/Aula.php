<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        parent::__construct();

         //load the model  
         $this->load->model('Api');  

    }
	public function busca()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			
			$token = $this->input->get("token");
			$autorizacao = $this->Api->autenticar($token);
			
			if($autorizacao == true){				
				$palavra_chave = $this->input->get("keyword");
				$data = $this->input->get("data");

				if(!isset($palavra_chave, $data)){

					echo json_encode(array('status' => 400,'message' => 'Bad request.'));
					return;
				}
				$data = new DateTime($data);
				$data = $data->format('Y-m-d');
				$query = $this->db->query("
				Select
				aula.id,
				professor.nome as 'Professor',
				disciplina.nome as 'Disciplina',
				aula.horario_inicio as 'Inicio',
				aula.horario_fim as 'Fim',
				sala.numero as 'Sala'
				
				FROM
				aula,
				professor,
				disciplina,
				sala,
				dia_semana
				
				WHERE
				aula.professor = professor.id AND
				aula.disciplina = disciplina.id AND
				aula.dia_semana = dia_semana.id AND
				aula.sala = sala.id AND
				
				(
				professor.nome like '%$palavra_chave%' OR
				disciplina.nome like '%$palavra_chave%' 
				) AND
				
				dia_semana.nome IN (SELECT DAYNAME(?))
				
				;",$data);
					//echo $this->db->last_query();
				$r = $query->result();
	    			echo json_encode($r, JSON_UNESCAPED_UNICODE);
			} 
		}

		}

}
