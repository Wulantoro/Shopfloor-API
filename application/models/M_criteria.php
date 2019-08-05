<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class M_criteria extends CI_Model{

	function read($wccode = null, $docNum = null, $seq = null ) {
  // function read($wccode = null, $docNum = null) {
    // function read($wccode = null) {
  // function read($docNum = null) {
  // function read($docNum = null, $wccode = null) {
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
C.Status = 'R' AND E.U_IsActive='1' AND b.U_WCCode='INJ 850T19K' and c.docNum ='20018555'");*/

/*$query = $this->db->query("SELECT distinct 
  	a.U_Sequence, 
    i.U_WCCode, 
  	cast(h.U_Quantity as int) as U_Quantity, 
  	C.itemCode, 
  	C.docNum, 
  	C.status, 
  	d.itemName, 
  	b.U_Desc, 
  	E.U_IsActive, 
  	f.code, 
  	f.name, 
  	e.code AS 'wccode', 
  	c.plannedQty, 
  	i.U_ItemCode, 
  	i.U_Criteria, 
  	i.U_Standard, 
  	i.U_CriteriaName, 
  	i.U_ValueType, 
  	i.U_Standard
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.docNum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
LEFT JOIN [@ASTEM_STDSPEC] i on i.U_ItemCode = c.ItemCode and i.U_WCCode = b.U_WCCode

where

  -- E.U_IsActive='1' AND C.Status = 'R' AND b.U_WCCode = '$wccode' AND C.docNum = '$docNum'
 


 i.U_IsActive = '1' AND C.Status = 'R' AND b.U_WCCode='INJ 120T02M' and c.docNum='10016643' 
 --and a.U_Sequence ='1'");*/



 /*****************yang bener********************************/

/*$query = $this->db->query("SELECT distinct 
a.U_Sequence, 
h.U_Quantity, 
C.itemCode, 
C.docNum, 
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
left join OWOR C ON C.DocNum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
LEFT JOIN [@ASTEM_STDSPEC] i on i.U_ItemCode = c.ItemCode and i.U_WCCode = b.U_WCCode

where
C.Status = 'R' 
AND E.U_IsActive='1' 
AND b.U_WCCode='INJ 120T02M' 
and c.docNum='10016643' 
and a.U_Sequence ='1'");
AND c.docNum='$docNum'
b.U_WCCode='$wccode'
--and a.U_Sequence ='1'*/


$query = $this->db->query("SELECT distinct 
a.U_Sequence AS 'seq', 
h.U_Quantity, 
C.itemCode, 
C.docNum, 
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
i.U_Standard, 
j.actualResult,
j.lineNumber

from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.DocNum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
LEFT JOIN [@ASTEM_STDSPEC] i on i.U_ItemCode = c.ItemCode and i.U_WCCode = b.U_WCCode
LEFT JOIN IPP_MOBILE_SHOPFLOORDETAIL1 j on j.DocEntry = a.DocEntry


where
C.Status = 'R' 
AND E.U_IsActive='1' 
AND b.U_WCCode='$wccode'
AND c.docNum='$docNum'
and a.U_Sequence ='$seq'
");

/***************************************************************************************************************************************/
		return $query->result_array();
	}


  function addCriteria($data) {
    $this->db->insert('IPP_MOBILE_SHOPFLOORDETAIL1', $data);
    return $this->db->affected_rows();
  }
}