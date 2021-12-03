<?php 
$lop=$_GET['lop'];
?>
<link rel="stylesheet" type="text/css" href="../../css/table.css">
<center>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="styled-table">
    <tbody>
      <tr style="text-align: center">
        <td colspan="4"><h2>Danh Sách Sinh Viên</h2></td>
      </tr>
      <tr style="text-align: center">
        <td width="63"><strong>STT</strong></td>
        <td width="250"><strong>Mã sinh viên</strong></td>
        <td width="500"><strong>Họ Tên</strong></td>
        <td></td>
      </tr>
      <?php $a->danhsachsv("select distinct masv,hoten from hososinhvien where lophoc='$lop'");?>
    </tbody>
  </table>  
</form>
</center>