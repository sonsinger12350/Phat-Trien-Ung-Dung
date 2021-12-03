<?php 
$masv=$_GET['masv'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr style="text-align: center">
        <td colspan="2"><h2>Thông tin sinh viên<span style="text-align: center"></h2></span></td>
      </tr>
      <tr>
        <td width="122"><label for="textfield">Mã sinh viên</label></td>
        <td width="378"><?php echo $masv;?></td>
      </tr>
      <tr>
        <td><label for="textfield">Họ Tên</label></td>
        <td><?php  $a->thongtinsv("select distinct hoten from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Giới Tính</label></td>
        <td><?php  $a->thongtinsv("select distinct gioitinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Ngày Sinh</label></td>
        <td><?php  $a->thongtinsv("select distinct ngaysinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Nơi Sinh</label></td>
        <td><?php  $a->thongtinsv("select distinct noisinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Chuyên Ngành</label></td>
        <td><?php  $a->thongtinsv("select distinct nganh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Lớp</label></td>
        <td><?php  $a->thongtinsv("select distinct lophoc from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Email</label></td>
        <td><?php  $a->thongtinsv("select distinct email from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Ảnh:</label></td>
         <td><img src="../../images/<?php  $a->thongtinsv("select distinct anh from hososinhvien where masv='$masv'");?>" width="32" height="32" alt=""/></td>       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp; </p>
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="268"><input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" id="submit" value="Cập Nhật Thông Tin"></td>
        
        <td width="232"><input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" id="submit" value="Thoát"></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
<?php
switch($_POST['submit'])
{
	case 'Cập Nhật Thông Tin':
	{
		echo '<script>
				window.history.go(-2);
			</script>';
		break;
	}
	case 'Thoát':
	{
		echo '<script>
				window.history.go(-2);
			</script>';
		break;
	}
}
?>
</form>
</body>
</html>