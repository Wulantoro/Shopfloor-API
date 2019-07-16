<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_inputreject extends CI_Model{

	function read($docentry) {
		// $query = $this->db->query("SELECT * from STEM_MOBILE_SHOPFLOORLINESREJECT where docentry = '$docentry'");

		$query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORDETAIL2 where docentry = '$docentry'");

		return $query->result_array();
	}

	function addReject($data) {
		// $query = $this->db->insert("INSERT INTO IPP_MOBILE_SHOPFLOORDETAIL2  ")

		$this->db->insert('IPP_MOBILE_SHOPFLOORDETAIL2', $data);
		$this->db->set('lineNumber', '1');

		return $this->db->affected_rows();
		// return $query->affected_rows();
	}

	function deleteReject($docEntry) {
		$this->db->delete('IPP_MOBILE_SHOPFLOORDETAIL2', ['docEntry' => $docEntry]);
		return $this->db->affected_rows();

		// $delete = $this->db->delete("DELETE FROM IPP_MOBILE_SHOPFLOORDETAIL2 where docEntry = '$docEntry'");
		// return $delete->affected_rows();

	}
}