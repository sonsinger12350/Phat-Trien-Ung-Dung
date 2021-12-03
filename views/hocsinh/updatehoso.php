<?php
$masv=$_SESSION['malogin'];
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="" style="text-align: center"><h2>Cập nhật thông tin</h2>
        </td>
      </tr>
       <tr>
        <td width="542"><input type="text" name="txtten" id="txtten" class="form-control input-lg" placeholder="Tên sinh viên" tabindex="4" value="<?php  $hs->thongtinsv("select distinct hoten from hososinhvien where masv='$masv'");?>"></td>
       </tr>
      <tr>
        <td><input type="text" name="txtgioitinh" id="txtgioitinh" class="form-control input-lg" placeholder="Giới Tính" tabindex="4" value="<?php  $hs->thongtinsv("select distinct gioitinh from hososinhvien where masv='$masv'");?>"></td>      
      </tr>
      <tr>
        <td><input type="text" name="txtngay" id="txtngay" class="form-control input-lg" placeholder="Ngày Sinh" tabindex="4" value="<?php  $hs->thongtinsv("select distinct ngaysinh from hososinhvien where masv='$masv'");?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="txtnoisinh" id="txtnoisinh" class="form-control input-lg" placeholder="Nơi Sinh" tabindex="4" value="<?php  $hs->thongtinsv("select distinct noisinh from hososinhvien where masv='$masv'");?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="txtnganh" id="txtnganh" class="form-control input-lg" placeholder="Chuyên Ngành" tabindex="4" value="<?php  $hs->thongtinsv("select distinct nganh from hososinhvien where masv='$masv'");?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="txtlop" id="txtlop" class="form-control input-lg" placeholder="Lớp" tabindex="4" value="<?php  $hs->thongtinsv("select distinct lophoc from hososinhvien where masv='$masv'");?>"></td>      
      </tr>
      <tr>
        <td><input type="text" name="txtemail" id="txtemail" class="form-control input-lg" placeholder="Email" tabindex="4" value="<?php  $hs->thongtinsv("select distinct email from hososinhvien where masv='$masv'");?>"></td>      
      </tr>
       <tr>
        <td><label for="txtanh">Ảnh :</label>
         <input type="file" name="txtanh" id="txtanh"></td>      
      </tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Nhập"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="out" id="out" value="Hủy"></td>
       <td>&nbsp;</td> 
      </tr>
    </tbody>
  </table>
<?php
$ten=$_REQUEST['txtten'];
$gioitinh=$_REQUEST['txtgioitinh'];
$ngaysinh=$_REQUEST['txtngay'];
$noisinh=$_REQUEST['txtnoisinh'];
$nganh=$_REQUEST['txtnganh'];
$lop=$_REQUEST['txtlop'];
$email = $_REQUEST['txtemail'];
$name=$_FILES['txtanh']['name'];
$local=$_FILES['txtanh']['tmp_name'];
switch($_POST['nut'])
{
	case 'Nhập':
	{
		if(!empty($ten) || !empty($gioitinh) || !empty($ngaysinh) || !empty($noisinh) || !empty($nganh) || !empty($lop) || !empty($email))
		{
			if($hs->uploadfile($local,'../../images',$name)==1)
			{
				$hs->themxoasua("update hososinhvien set hoten='$ten', lophoc='$lop', gioitinh='$gioitinh', ngaysinh='$ngaysinh', noisinh='$noisinh', nganh='$nganh', anh='$name',email='$email' where masv='$masv'");
				echo '<script>
				alert("Cập nhật thành công !");
					</script>';
				echo '<script>
					window.location.href="?action=hoso";
					</script>';
			}
			else
			{
				echo '<script>
					alert("Cập nhật thông tin không thành công !");
				</script>';	
			}
		}
	}
}
if(isset($_POST['out']))
{
  echo '<script>
          window.history.go(-2);
        </script>'; 
}
?>
</form>