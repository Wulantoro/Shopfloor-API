<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_lastdocnum extends CI_Model {

	function read() {
		// $this->db->where('docEntry', $docEntry);
		$this->db->order_by('docEntry', 'desc');
		$this->db->limit(1);

		return $this->db->get('IPP_MOBILE_SHOPFLOORHEADER')->result_array();
		// return $this->db->get('STEM_MOBILE_SHOPFLOORHEADER')->result_array();
	}
}