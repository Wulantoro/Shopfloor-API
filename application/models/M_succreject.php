<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_succreject extends CI_Model{

	function read($hostHeadEntry = null) {
		
		 $query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORLINESREJECT where hostHeadEntry = '$hostHeadEntry'");
		
		return $query->result_array();
	}

}
