<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_productorder extends CI_Model {
	public function read($wccode) {
		

			$query = $this->db->query("SELECT distinct C.itemCode, C.docNum, C.status, d.itemName, b.U_Desc, E.U_IsActive, f.code, f.name, e.code AS 'wccode', c.plannedQty, b.U_WCCode
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.DocNum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = h.DocEntry and h.U_Sequence=a.U_Sequence
 where  
C.Status = 'R' AND E.U_IsActive='1' AND U_WCCode = '$wccode'");

			return $query->result_array();
			
	}
}