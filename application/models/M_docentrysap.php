<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_docentrysap extends CI_Model {

	function read($workCenter, $mobileId) {
		$query = $this->db->query("SELECT TOP 1 * FROM STEM_MOBILE_SHOPFLOORHEADER WHERE posted = '1' AND  workCenter = '$workCenter' AND mobileId = '$mobileId' ORDER BY docEntry DESC");

		return $query->result_array();
	}
}