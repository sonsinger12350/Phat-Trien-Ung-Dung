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
    <tr>
        <td height="50" style="text-align: center"><h2>Thêm tài khoản</h2></td>
      </tr>
      <tr>
        <td height="50" style="text-align: left"><input name="txtma" class="form-control input-lg" type="text" id="txtma" size="35" placeholder="Mã đăng nhập"></td>
      </tr>
      <tr>
        <td height="50" style="text-align: left"><input name="txtten" class="form-control input-lg" type="text" id="txtten" size="35" placeholder="Họ tên"></td>
      </tr>
      <tr>
        <td height="50" style="text-align: left"><input name="txtlop" class="form-control input-lg" type="text" id="txtlop" size="35" placeholder="Lớp"></td>
      </tr>
      <tr>
        <td height="35" style="text-align: left"><label for="txtquyen">Phân quyền:</label>
          <select id="txtquyen" name="txtquyen">
            <option id="admin" name="admin">admin</option>
        <option name="giaovien" id="giaovien">giaovien</option>
        <option name="sinhvien" id="sinhvien">sinhvien</option>
      </select></td>
      </tr>
      <tr>
        <td height="43" style="text-align: left"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Thêm"></td>
      </tr>
      <tr>
        <td height="48" style="text-align: left"><input type="reset" class="btn btn-primary btn-block btn-lg" name="reset" id="reset" value="Hủy"></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
<?php 
$malogin=$_REQUEST['txtma'];
$ten=$_REQUEST['txtten'];
$lop=$_REQUEST['txtlop'];
$phanquyen=$_REQUEST['txtquyen'];
switch($_POST['nut'])
{
	case'Thêm':
	{
		if(empty($malogin)  || empty($ten)  || empty($lop)  || empty($phanquyen))
		{
			echo'<script>
					alert("Vui lòng nhập đầy đủ thông tin !");
				</script>';
		}
		else
		{
			$a->addaccount($malogin,$ten,$lop,$phanquyen);
		}
		break;
	}
}
?>
</form>
</body>
</html>