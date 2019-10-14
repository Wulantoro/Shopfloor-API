<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_sincreject extends CI_Model {
	function read($DocEntry = null) {

		$this->db->order_by('DocEntry', 'desc');
		$this->db->limit(1);

		return $this->db->get('STEM_MOBILE_SHOPFLOORLINESREJECT')->result_array();
	}

	public function save_batch($data) {
		return $this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESREJECT', $data);
	}
}