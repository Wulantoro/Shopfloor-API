<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_workcenter extends CI_Model{
	public function read() {
		

$query = $this->db->query("select distinct name, code 
from 
 [@ST_UDWC]
 where  
 U_IsActive='1'");

return $query->result_array();
		
		
	}
}