<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_criteriasucc extends CI_Model {
	function read($hostHeadEntry) {
		
		$query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORLINESCRITERIA where hostHeadEntry='$hostHeadEntry'");

		

		return $query->result_array();
	}

	}