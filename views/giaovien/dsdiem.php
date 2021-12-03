<?php 
$lop=$_SESSION['lophoc'];
?>
<link rel="stylesheet" type="text/css" href="../../css/table.css">
<form name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="styled-table">
    <tbody>
      <tr>
        <td colspan="4">Danh Sách Sinh Viên</td>
      </tr>
      <tr>
        <td width="10%">STT</td>
        <td width="35%">Mã sinh viên</td>
        <td width="35%">Họ Tên</td>
        <td width="20"></td>
      </tr>
      <?php $g->danhsachsv("select distinct masv,hoten from hososinhvien where lophoc='$lop'");?>
    </tbody>
  </table>
<?php  
switch($_POST['submit'])
{
	case 'Thoát':
	{
		echo '<script>
				window.location.href="trangchu.php";
			</script>';
		break;
	}
}
?>
</form>