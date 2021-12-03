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
<h2 align="center">Thông tin sinh viên</h2>
<div class ="col-md-3"><img src="../../images/<?php  $g->thongtinsv("select distinct anh from hososinhvien where masv='$masv'");?>" width="300px" height="300px" alt=""/></div>
<div class ="col-md-6">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr style="text-align: center">
        <td colspan="2"></td>
      </tr>
      <tr>
        <td width="122"><label for="textfield">Mã sinh viên</label></td>
        <td width="378"><?php echo $masv;?></td>
      </tr>
      <tr>
        <td><label for="textfield">Họ Tên</label></td>
        <td><?php  $g->thongtinsv("select distinct hoten from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Giới Tính</label></td>
        <td><?php  $g->thongtinsv("select distinct gioitinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Ngày Sinh</label></td>
        <td><?php  $g->thongtinsv("select distinct ngaysinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Nơi Sinh</label></td>
        <td><?php  $g->thongtinsv("select distinct noisinh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Chuyên Ngành</label></td>
        <td><?php  $g->thongtinsv("select distinct nganh from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Lớp</label></td>
        <td><?php  $g->thongtinsv("select distinct lophoc from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td><label for="textfield">Email</label></td>
        <td><?php  $g->thongtinsv("select distinct email from hososinhvien where masv='$masv'");?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>