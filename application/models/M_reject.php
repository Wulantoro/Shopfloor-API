<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_reject extends CI_Model {
	public function read($Code) {
		$query = $this->db->query("SELECT code, name FROM [@ASTEM_REJECT] WHERE U_IsActive = '1'");

		return $query->result_array();
	}
}