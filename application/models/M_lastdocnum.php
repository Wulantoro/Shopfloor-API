<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_lastdocnum extends CI_Model {

	function read($docEntry = null) {
		// $this->db->where('docEntry', $docEntry);

		/*********************benrer************************************/
		$this->db->order_by('docEntry', 'desc');
		$this->db->limit(1);

		// return $this->db->get('IPP_MOBILE_SHOPFLOORHEADER')->result_array();
		return $this->db->get('STEM_MOBILE_SHOPFLOORHEADER')->result_array();
		/****************************************************************/



		// $query = $this->db->query("SELECT TOP 1 * from STEM_MOBILE_SHOPFLOORHEADER WHERE docEntry = '$docEntry' ORDER BY docEntry DESC");

		// // $query = $this->db->query("SELECT id from STEM_MOBILE_SHOPFLOORHEADER WHERE docEntry = '$docEntry'");
		// return $query->result_array();



		// return $this->db->get('STEM_MOBILE_SHOPFLOORHEADER')->result_array();
	}
}