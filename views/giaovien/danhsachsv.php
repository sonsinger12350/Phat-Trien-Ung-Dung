<?php 
$lop=$_SESSION['lophoc'];
?>
<link rel="stylesheet" type="text/css" href="../../css/table.css">
<form name="form1" method="post" action="">
  <table width="555" border="1" align="center" cellpadding="0" cellspacing="0" class="styled-table">
    <tbody>
      <tr style="text-align: center">
        <td colspan="4">Danh Sách Sinh Viên</td>
      </tr>
      <tr style="text-align: center">
        <td width="74">STT</td>
        <td width="146">Mã sinh viên</td>
        <td width="257">Họ Tên</td>
        <td width="68"></td>
      </tr>
      <?php $g->danhsach("select distinct masv,hoten from diem where lophoc='$lop'");?>
    </tbody>
  </table>

</form>