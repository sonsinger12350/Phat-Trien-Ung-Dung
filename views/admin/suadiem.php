<?php
$id=$_GET['id'];
?>
<form name="form1" method="post" action="">
  <table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="" style="text-align: center"><h2>Kết quả học tập</h2>
        </td>
      </tr>
      <tr>
        <td width="542"><input type="text" name="txtma" id="txtma" class="form-control input-lg" placeholder="Mã sinh viên" tabindex="4" value="<?php  $a->diem("select masv from diem where id_diem='$id'");?>"></td>
       </tr>
       <tr>
        <td width="542"><input type="text" name="txtten" id="txtten" class="form-control input-lg" placeholder="Tên sinh viên" tabindex="4" value="<?php  $a->diem("select hoten from diem where id_diem='$id'");?>"></td>
       </tr>
       <tr>
        <td><input type="text" name="txtlop" id="txtlop" class="form-control input-lg" placeholder="Lớp Học" tabindex="4" value="<?php  $a->diem("select lophoc from diem where id_diem='$id'");?>"></td>      
      </tr>
      <tr>
        <td><input type="text" name="txttenmh" id="txttenmh" class="form-control input-lg" placeholder="Tên môn học" tabindex="4" value="<?php $a->diem("select tenmonhoc from diem where id_diem='$id'");?>"></td>      
      </tr>
      <tr>
        <td><input type="text" name="txttk" id="txttk" class="form-control input-lg" placeholder="Thường kỳ" tabindex="4" value="<?php  $a->diem("select thuongky from diem where id_diem='$id'");?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="txtgk" id="txtgk" class="form-control input-lg" placeholder="Giữa kỳ" tabindex="4" value="<?php  $a->diem("select giuaky from diem where id_diem='$id'");?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="txtck" id="txtck" class="form-control input-lg" placeholder="Cuối kỳ" tabindex="4" value="<?php  $a->diem("select cuoiky from diem where id_diem='$id'");?>"></td>
      </tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Sửa"></td>
      </tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Hủy"></td>
      </tr>
    </tbody>
  </table>
<?php
$masv=$_REQUEST['txtma'];
$ten=$_REQUEST['txtten'];
$lop=$_REQUEST['txtlop'];
$monhoc=$_REQUEST['txttenmh'];
$diemtk=$_REQUEST['txttk'];
$diemgk=$_REQUEST['txtgk'];
$diemck=$_REQUEST['txtck'];
$diemtong=($diemtk*2+$diemgk*3+$diemck*5)/10;
switch($_POST['nut'])
{
	case 'Sửa':
	{
		$a->themxoasua("update diem
				  set masv='$masv',hoten='$ten',lophoc='$lop',tenmonhoc='$monhoc',thuongky='$diemtk',giuaky='$diemgk',cuoiky='$diemck',diemtong='$diemtong'
				  where id_diem='$id'");
		echo '<script> 
				alert("Sửa điểm thành công !");
	       </script>';
	echo '<script> 
				window.history.go(-2);
	      </script>';
		break;
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