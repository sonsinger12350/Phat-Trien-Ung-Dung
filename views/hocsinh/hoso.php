<?php 
$masv=$_SESSION['malogin'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
  <div class="row">
     <h2 align="center">Thông tin sinh viên</h2>
  </div>
 
  <div class ="col-md-3"><img src="../../images/<?php  $hs->thongtinsv("select distinct anh from hososinhvien where masv='$masv'");?>" width="250px" height="250px" alt=""/>
</div>
<form id="form1" name="form1" method="post">  

<div class ="col-md-6">
  <table width="100%" border="0px" cellpadding="0" cellspacing="0">
    <tbody>      
      <tr>
        <td><label for="textfield">Mã sinh viên :</label></td>
        <td><?php echo $masv;?></td>
      </tr>
      <tr>
        <td><label for="textfield">Họ Tên :</label></td>
        <td><?php  $hs->thongtinsv("select distinct hoten from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Giới Tính :</label></td>
        <td><?php  $hs->thongtinsv("select distinct gioitinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Ngày Sinh :</label></td>
        <td><?php  $hs->thongtinsv("select distinct ngaysinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Nơi Sinh :</label></td>
        <td><?php  $hs->thongtinsv("select distinct noisinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Chuyên Ngành :</label></td>
        <td><?php  $hs->thongtinsv("select distinct nganh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Lớp :</label></td>
        <td><?php  $hs->thongtinsv("select distinct lophoc from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Email :</label></td>
        <td><?php  $hs->thongtinsv("select distinct email from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" id="submit" value="Cập nhật thông tin"></td>
      </tr>
    </tbody>
  </table>

  <p>&nbsp; </p>
  <p>&nbsp;</p>
  </div>
  <div class="col-md-3"></div>
<?php
switch($_POST['submit'])
{
	case 'Cập nhật thông tin':
	{
		echo '<script>
				window.location.href="?action=updatehoso";
			</script>';
		break;
	}
}
?>
</form>
</body>
</html>