<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_namawc extends CI_Model{

	function read($code = null) {

		$query = $this->db->query("SELECT distinct name, code 
from 
 [@ST_UDWC]
 where  
 U_IsActive='1' AND code = '$code'");

return $query->result_array();
	}
}