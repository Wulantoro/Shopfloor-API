<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class M_sincheader extends CI_Model {
 function read($DocEntry= null) {
	
	// $query = $this->db->query("SELECT * from [@STEM_PRDSPECH] ORDER BY DocEntry  LIMIT '1' DESC");
	// return $query->result_array();

	// $this->db->where('docEntry',$docEntry);
		$this->db->order_by('DocEntry', 'desc');
		$this->db->limit(1);

		return $this->db->get('@STEM_PRDSPECH')->result_array();
}

function addSincHeader($data) {
	$this->db->insert('@STEM_PRDSPECH', $data);
	return $this->db->affected_rows();

	// $this->db->insert('header12', $data);
	// return $this->db->affected_rows();
}
}