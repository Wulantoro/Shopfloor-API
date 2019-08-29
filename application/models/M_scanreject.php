<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_scanreject extends CI_Model {

	public function read($code = null) {
		$query = $this->db->query("SELECT name FROM [@ASTEM_REJECT] WHERE U_IsActive = '1' AND code = '$code'");

		return $query->result_array();
	}
}