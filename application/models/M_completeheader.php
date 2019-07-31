<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_completeheader extends CI_Model {


function read($workCenter) {
	$query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORHEADER WHERE status = 'Completed' AND workCenter = '$workCenter'  ORDER BY docEntry DESC");

	return $query->result_array();
}
}