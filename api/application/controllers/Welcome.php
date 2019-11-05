<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$data = "2019-11-04";
		$texto = "";
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
		professor.nome like '%$texto%' OR
		disciplina.nome like '%$texto%' 
		) AND
		
		dia_semana.nome IN (SELECT DAYNAME('$data'))
		
		;");
		echo json_encode($query->result(), JSON_UNESCAPED_UNICODE);
	}
}
