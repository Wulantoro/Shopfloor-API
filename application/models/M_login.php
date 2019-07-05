<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_login extends CI_Model{
	public function __construct(){

parent::__construct();
$this->load->database();
}

public function login_api($U_STEM_Username, $U_STEM_Pasword) {
	$query = $this->db->query("select * from OHEM where 'U_STEM_Username' = '$U_STEM_Username' AND 'U_STEM_Pasword' = '$U_STEM_Pasword");
}
}
