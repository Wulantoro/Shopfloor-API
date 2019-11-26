<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_upcriteria extends CI_Model {
	function read($hostHeadEntry) {
		// $query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORLINESREJECT");
		// $query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORLINESCRITERIA where hostHeadEntry='$hostHeadEntry'");
		$query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORLINESCRITERIA where hostHeadEntry='$hostHeadEntry'");

		

		return $query->result_array();
	}

	/*function upCriteria($data) {
	$this->db->insert('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
    return $this->db->affected_rows();
	// return $this->db->insert_batch('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
		// $this->db->insert_batch('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
		// return $this->db->affected_rows();
	}*/

	/*function batchInsert($data) {
		$count = count($data['count']);
		for($i = 0; $i < $count; $i++) {
			$entries[] = array(
			'docEntry' =>$this->post('docEntry'),
			'lineNumber' =>$this->post('lineNumber'),
			'criteria' =>$this->post('criteria'),
			'criteriaDesc'=>$this->post('criteriaDesc'),
			'valueType' =>$this->post('valueType'),
			'standard' =>$this->post('standard'),
			'actualResult'=>$this->post('actualResult'),
			'actualRemarks'=>$this->post('actualRemarks'));
		}
		$this->db->insert_batch('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
		if ($this->db->affected_rows() > 0) {
			# code...
			return 1;
		}else{
			return 0;
		}
		
	}*/

	public function save_batch($data) {

		// return $this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESCRITERIA', $data);
		return $this->db->insert_batch('IPP_MOBILE_SHOPFLOORLINESCRITERIA', $data);
	}


	}