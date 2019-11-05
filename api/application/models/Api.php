<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Model {
    var $auth_key       = "";

    public function autenticar($token){
		$query = $this->db->query(
			"SELECT * from token where expiracao > NOW() and token = ?", array($token)
		);
		if($query->num_rows() == 1){
			return true;
        }
        echo json_encode(array('status' => 401,'message' => 'Unauthorized.'));
        return false;
	}
}