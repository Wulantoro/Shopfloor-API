<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_temp extends CI_Model {


	function addTemp($data) {
		$this->db->insert('table_temp', $data);
		return $this->db->affected_rows();
	}
}