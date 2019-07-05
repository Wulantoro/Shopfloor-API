<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_loginuser extends CI_Model {


	function __construct()
    {
        parent::__construct();
    }


    function read($U_STEM_Username) {
        $query = $this->db->query("SELECT * FROM OHEM WHERE U_STEM_Username = '$U_STEM_Username'");
        return $query->result_array();
    }

    function LoginApi($U_STEM_Username, $U_STEM_Password)
    {
        $result = $this->db->query("SELECT * FROM OHEM WHERE U_STEM_Username = '$U_STEM_Username' AND U_STEM_Password = '$U_STEM_Password'");
        return $result->result();
    }

   
    }

	