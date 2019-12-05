<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

/**
 * 
 */
class M_Sequence extends CI_Model{
	
	function read($wccode= null,$docnum = null ) {
			/*$query = $this->db->query("SELECT distinct a.U_Sequence, 
g.U_Quantity
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.DocNum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@STEM_PRODCARDH] f on f.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] g on g.DocEntry = f.DocEntry and g.U_Sequence=a.U_Sequence
where  
C.Status = 'R' AND E.U_IsActive='1' AND code='INJ 850T19K' and c.DocNum ='20018555'");*/


/***************yang benar***********************/
// $query = $this->db->query("SELECT distinct a.U_Sequence, h.U_Quantity, C.itemCode, C.docnum, C.status, d.itemName, b.U_Desc, E.U_IsActive, f.code, f.name, e.code AS 'wccode', c.plannedQty, b.U_WCCode
// from 
// [@ST_ROUTEPDH] a
// left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
// left join OWOR C ON C.docnum = A.U_PDNO
// left join OITM D ON D.ItemCode = C.ItemCode
// left join [@ST_UDWC] E ON E.code = b.U_WCCode
// left join [@ST_UDRTH] F ON F.Code = b.U_Reference
// left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
// left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
//  where  
// C.Status = 'R' AND E.U_IsActive='1' AND U_WCCode = '$wccode' AND c.docnum= '$docnum'");


$query = $this->db->query("SELECT distinct a.U_Sequence, h.U_Quantity, 
(select isnull(sum(t0.U_InputQty),0)  from [@ASTEM_PRDSPECH] t0 where t0.U_PD_No = a.U_PDNO and t0.U_Sequence = a.U_Sequence and t0.Status = 'O' and t0.U_TglSelesai > '2019-01-01' ) as Input,
C.itemCode, C.docnum, C.status, d.itemName, b.U_Desc, E.U_IsActive, f.code, f.name, e.code AS 'wccode', c.plannedQty, b.U_WCCode
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.docnum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
 where  
C.Status = 'R' AND E.U_IsActive='1' AND U_WCCode = '$wccode' AND c.docnum= '$docnum'
and
h.U_Quantity-(select isnull(sum(t0.U_InputQty),0)  from [@ASTEM_PRDSPECH] t0 where t0.U_PD_No = a.U_PDNO and t0.U_Sequence = a.U_Sequence and t0.Status = 'O' and t0.U_TglSelesai > '2019-01-01' ) >0");



/*******************************ini paling bener*************************************************************./
/*$query = $this->db->query("SELECT distinct a.U_Sequence, h.U_Quantity, C.itemCode, C.docnum, C.status, d.itemName, b.U_Desc, E.U_IsActive, f.code, f.name, e.code AS 'wccode', c.plannedQty, b.U_WCCode
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.docnum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
 where  
C.Status = 'R' AND E.U_IsActive='1' AND U_WCCode = '$wccode' AND c.docnum= '$docnum'");*/


/***********************************************************/
/*$query = $this->db->query("SELECT distinct a.U_Sequence, h.U_Quantity, C.itemCode, C.docnum, C.status, d.itemName, b.U_Desc, E.U_IsActive, f.code, f.name, e.code AS 'wccode', c.plannedQty, b.U_WCCode
from 
[@ST_ROUTEPDH] a
left join [@ST_ROUTEPDD] b on b.DocEntry = a.DocEntry
left join OWOR C ON C.docnum = A.U_PDNO
left join OITM D ON D.ItemCode = C.ItemCode
left join [@ST_UDWC] E ON E.code = b.U_WCCode
left join [@ST_UDRTH] F ON F.Code = b.U_Reference
left join [@STEM_PRODCARDH] g on g.U_PD_Entry = c.DocEntry
left join [@STEM_PRODCARDD] h on h.DocEntry = g.DocEntry and h.U_Sequence=a.U_Sequence
 where  
C.Status = 'R' AND E.U_IsActive='1' AND c.docnum = '$docnum'");*/
			return $query->result_array();
	}
}