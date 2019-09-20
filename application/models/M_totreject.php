<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_totreject extends CI_Model{

	function read($hostHeadEntry = null) {
		$query = $this->db->query("SELECT SUM(rejectQty) AS total FROM STEM_MOBILE_SHOPFLOORLINESREJECT WHERE hostHeadEntry = '$hostHeadEntry'");

		return $query->result_array();
	}
}