<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class M_criteria extends CI_Model{

	function read($wccode = null, $docnum = null) {
		/*$query = $this->db->query("SELECT U_ItemCode,U_WCCode,U_Criteria,U_Standard,U_CriteriaName,U_ValueType,U_Standard
  FROM [@ASTEM_STDSPEC] a LEFT JOIN b 
  where U_IsActive = 1
  and U_ItemCode = '6-12-0079'
  and U_WCCode = 'INJ 850T19K'");*/

  /*$query = $this->db->query("SELECT distinct a.U_Sequence, h.U_Quantity, C.itemCode, C.docNum, C.status, d.itemName, b.U_Desc, E.U_IsActive, f.code, f.name, e.code AS 'wccode', c.plannedQty, b.U_WCCode, i.U_ItemCode, i.U_WCCode, i.U_Criteria, i.U_Standard, i.U_CriteriaName, i.U_ValueType, i.U_Standard
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.DocNum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = h.DocEntry and h.U_Sequence=a.U_Sequence
LEFT JOIN [@ASTEM_STDSPEC] i on i.Code = c.ItemCode
where
C.Status = 'R' AND E.U_IsActive='1' AND b.U_WCCode='INJ 850T19K' and c.itemCode ='20018555'");*/

$query = $this->db->query("SELECT distinct 
  	a.U_Sequence, 
  	cast(h.U_Quantity as int) as U_Quantity, 
  	C.itemCode, 
  	C.docnum, 
  	C.status, 
  	d.itemName, 
  	b.U_Desc, 
  	E.U_IsActive, 
  	f.code, 
  	f.name, 
  	e.code AS 'wccode', 
  	c.plannedQty, 
  	b.U_WCCode, 
  	i.U_ItemCode, 
  	i.U_WCCode, 
  	i.U_Criteria, 
  	i.U_Standard, 
  	i.U_CriteriaName, 
  	i.U_ValueType, 
  	i.U_Standard
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.docnum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
LEFT JOIN [@ASTEM_STDSPEC] i on i.U_ItemCode = c.ItemCode and i.U_WCCode = b.U_WCCode

where

  -- C.Status = 'R' AND E.U_IsActive='1' AND b.U_WCCode = '$wccode' and c.docnum ='$docnum'

 C.Status = 'R' AND E.U_IsActive='1' AND b.U_WCCode='INJ 120T02M' and c.docnum='10016643' and i.U_IsActive = '1' and a.U_Sequence ='1'");


		return $query->result_array();
	}


  function addCriteria($data) {
    $this->db->insert('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
    return $this->db->affected_rows();
  }
}