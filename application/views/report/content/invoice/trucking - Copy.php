<style>
body{
	font-size:8pt;
}
.invoices{
	font-size:9.5pt;
}
tr.border_bottom td {
  border-bottom:3px solid black;
}
tr.border_top td {
  border-top:1px solid black;
}
tr.border_top_bold td {
  border-top:3px solid black;
}
table.noborder td{
border:0px solid white!important;
}
.borderkirikanan{
	border-left:2px solid black;
	border-right:2px solid black;
}
.noatm{
	font-size:11px;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<?php //print_mz($joborder); ?><body>
<table width="100%" border="0" cellspacing="0" class="invoices">
  <tr>
    <td colspan="3"><div align="center"><strong>INVOICE</strong></div></td>
  </tr>
  <tr class="">
    <td width="34%"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" class="invoices">
        <tr>
          <td width="33%">To </td>
          <td width="67%"><?php echo $messers;?></td>
        </tr>
        <tr>
          <td>PIC </td>
          <td><?php echo $pic?></td>
        </tr>
        <tr>
          <td colspan="2"><?php echo $address;?></td>
        </tr>
      </table>
      <p> <br>
      </p>
    </td>
    <td width="34%">&nbsp;</td>
    <td width="32%">DEBIT NOTE<br />
    ORIGINAL
    <p>PO No. <?php echo $sum['po']?> </p>
    <p>Invoice No. <?php echo $sum['number']?> </p>
    <p>Invoice Date. <?php echo tglindo($sum['create_date'])?> </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="0" align="center" cellspacing="0" class="invoices">
      <tr class="border_bottom border_top_bold">
        <td width="13%" rowspan="2" align="center">Date</td>
        <td width="12%" rowspan="2" align="center">Vehicle No. </td>
        <td width="12%" rowspan="2" align="center">Kewill No. </td>
        <td width="9%" rowspan="2" align="center">JO No. </td>
        <td width="11%" rowspan="2" align="center" class="borderkirikanan">Load/Unload</td>
        <td width="7%" rowspan="2" align="center" class="borderkirikanan">Description</td>
        <td width="12%" rowspan="2" align="center" class="borderkirikanan">Service</td>
        <td colspan="2" align="center" class="borderkirikanan" style="border-right:3px solid black; border-left:3px solid black;">AMOUNT</td>
        <td width="14%" rowspan="2" align="center" class="borderkirikanan">TOTAL AMOUNT </td>
      </tr>
      <tr class="border_bottom">
        <td width="11%" align="center" class="borderkirikanan">USD</td>
        <td width="11%" align="center" class="borderkirikanan">IDR</td>
        </tr><?php
		$totrp=0;
		$totusd=0;
		$all=0;
		$jo='';
		foreach($detail as $isi){
			if($jo!=$isi['jo']){
				$qdetail=$this->db->query("SELECT * FROM sv_trucking_order WHERE number='".$isi['jo']."'")->row_array();
				$vno=(GetValue('code','master_truck',array('id'=>'where/'.$qdetail['vehicle_no']))=='0' ? $qdetail['vehicle_no'] : GetValue('code','master_truck',array('id'=>'where/'.$qdetail['vehicle_no'])));
			}
		?>
      <tr>
        <td ><?php echo tglindo($qdetail['create_date'])?></td>
        <td class="borderkirikanan" ><?php echo $vno;?></td>
        <td class="borderkirikanan" ><?php echo $isi['kewill'];?></td>
        <td class="borderkirikanan" ><?php echo $isi['jo']?></td>
        <td align="right" class="borderkirikanan"><?php echo $qdetail['loading'].' - '.$qdetail['unloading']?></td>
        <td align="right" class="borderkirikanan"><?php echo $isi['desc']?></td>
        <td align="right" class="borderkirikanan"><?php echo GetValue('name','sv_master_trucking',array('id'=>'where/'.$qdetail['service']))?></td>
        <td align="right" class="borderkirikanan"><?php echo uang($isi['usd'])?></td>
        <td align="right" class="borderkirikanan"><?php echo uang($isi['idr'])?></td>
        <td align="right" class="borderkirikanan"><?php echo uang($isi['total'])?></td>
      </tr>
		<?php
		$totrp+=$isi['idr'];
		$totusd+=$isi['usd'];
		$jo=$isi['jo'];
		$all+=$isi['total'];
		} ?>
      <tr class="border_top_bold border_bottom">
        <td colspan="3">TOTAL AMOUNT </td>
        <td colspan="4">&nbsp;</td>
        <td align="right" class="borderkirikanan"><?php echo uang($totusd)?></td>
        <td align="right" class="borderkirikanan"><?php echo uang($totrp)?></td>
        <td align="right" class="borderkirikanan"><?php echo uang($all)?></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>*Exchange rate subject to-date of payment</p>
<p>*Our invoice are payable cash  in full amount to PT ECSI INDONESIA by the indicated due date</p>
<p>*If any discrepency kindly contact us within 7 days in writing from the days of invoices</p>
<p>Account No.   </p>
<table width="40%" border="0" cellspacing="0" class="noatm">
  <tr>
    <td>PT. ECSI INDONESIA</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>BANK BCA MATRAMAN</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>IDR Account No </td>
    <td>342-3409-009</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>PT. ECSI INDONESIA</td>
    <td>&nbsp;</td>
  </tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>PT. ECSI INDONESIA</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">BANK MANDIRI KCP LATUMENTEN </td>
  </tr>
  <tr>
    <td>IDR Account No </td>
    <td>117-00-1422013-1</td>
  </tr>
</table>
<table width="20%" border="0" cellspacing="0" style="float:right;">
  
  <tr class="border_top">
    <td align="center">Authorized Signature</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
