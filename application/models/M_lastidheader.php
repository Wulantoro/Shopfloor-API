<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_lastidheader extends CI_Model {

	function read($mobileId = null) {
		// $this->db->where('mobileId', $mobileId);
		// $this->db->order_by('docEntry', 'desc');
		// $this->db->limit(1);

		// return $this->db->get('STEM_MOBILE_SHOPFLOORHEADER')->result_array();

		// $query = $this->db->query("SELECT TOP 1 * from STEM_MOBILE_SHOPFLOORHEADER WHERE mobileId = '$mobileId' ORDER BY docEntry DESC");
		$query = $this->db->query("SELECT TOP 1 * from IPP_MOBILE_SHOPFLOORHEADER WHERE mobileId = '$mobileId' ORDER BY docEntry DESC");

		// $query = $this->db->query("SELECT id from STEM_MOBILE_SHOPFLOORHEADER WHERE docEntry = '$docEntry'");
		return $query->result_array();
	}
}