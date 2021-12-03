<?php
$id=$_GET['id'];
?>
<form name="form1" method="post" action="">
  <table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="" style="text-align: center"><h2>Cập nhật thông tin</h2>
        </td>
      </tr>
       <tr>
        <td width="542"><input type="text" name="txtma" id="txtma" class="form-control input-lg" placeholder="Mã đăng nhập" tabindex="4" value="<?php $a->xuatac("select malogin from users where user_id='$id'");?>"></td>
       </tr>
      <tr>
        <td><input type="text" name="txtpass" id="txtpass" class="form-control input-lg" placeholder="Password" tabindex="4" ></td>      
      </tr>	
      <tr>
        <td><input type="text" name="txtten" id="txtten" class="form-control input-lg" placeholder="Tên người dùng" tabindex="4" value="<?php $a->xuatac("select distinct ten from users where user_id='$id'");?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="txtlop" id="txtlop" class="form-control input-lg" placeholder="Lớp" tabindex="4" value="<?php $a->xuatac("select distinct lophoc from users where user_id='$id'");?>"></td>
      </tr>
      <tr>
        <td><label for="select">Phân Quyền :</label>
          <select name="txtphanquyen" id="txtphanquyen">
          <option value="sinhvien">Sinh Viên</option>
          <option value="giaovien">Giáo Viên</option>
          <option value="admin">Admin</option>
        </select></td>
      </tr>     
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Nhập"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Hủy"></td>
       <td>&nbsp;</td> 
      </tr>
    </tbody>
  </table>
<?php
$ma=$_REQUEST['txtma'];
$pass=$_REQUEST['txtpass'];
$ten=$_REQUEST['txtten'];
$lop=$_REQUEST['txtlop'];
$phanquyen=$_REQUEST['txtphanquyen'];
switch($_POST['nut'])
{
	case 'Nhập':
	{
		if(empty($ma) || empty($pass) || empty($ten) || empty($phanquyen))
		{ 
			echo '<script>
					alert("Vui lòng nhập đầy đủ thông tin");
				</script>';			
		}
		else
		{
			$pass=md5($pass);
			$a->themxoasua("update users set malogin='$ma', password='$pass', ten='$ten', lophoc='$lop', phanquyen='$phanquyen' where user_id='$id'");	
			echo '<script>
				alert("Sửa thành công !");
			</script>';
			echo '<script>
				window.history.go(-2);
			</script>';		
		}
	}
	case 'Hủy':
	{
		echo '<script>
				window.history.go(-2);
			</script>';	
		break;
	}
}
?>
</form>