<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_lastreject extends CI_Model{

	function read($docEntry = null) {
		/*$query = $this->db->query("SELECT lineNumber
           FROM  IPP_MOBILE_SHOPFLOORDETAIL2 order by lineNumber DESC LIMIT 1 WHERE docEntry = 'docEntry'");*/

		// $this->db->select('docEntry');
		// $this->db->select('lineNumber');
		// $this->db->select('rejectName');
		// $this->db->limit('1');
		$this->db->where('docEntry',$docEntry);
		$this->db->order_by('lineNumber', 'desc');
		$this->db->limit(1);

		return $this->db->get('IPP_MOBILE_SHOPFLOORDETAIL2')->result_array();
		// return $this->db->array();
           
	}
}