<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_upcriteria extends CI_Model {
	function read($docEntry) {
		$query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORLINESREJECT");

		

		return $query->result_array();
	}

	function upCriteria($data) {
		 $this->db->insert('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
    return $this->db->affected_rows();
	}
	}
