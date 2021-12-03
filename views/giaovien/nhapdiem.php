<?php
 $masv=$_GET['masv'];
?>
<form name="form1" method="post" action="">
  <table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="" style="text-align: center"><h2>Kết quả học tập</h2>
        </td>
      </tr>
      <tr>
        <td width="542"><input type="text" name="txtma" id="txtma" class="form-control input-lg" placeholder="Mã sinh viên" tabindex="4" value="<?php echo $masv;?>"></td>
       </tr>
       <tr>
        <td><input type="text" name="txttensv" id="txttensv" class="form-control input-lg" placeholder="Tên sinh viên" tabindex="4" value="<?php $g->thongtinsv("select distinct hoten from hososinhvien where masv='$masv'");?>"></td>      
      </tr>
      <tr>
        <td><label>Tên môn học :</label>
        <select name="txttenmh" id="txttenmh">
        <?php $g->dsmonhoc("select * from monhoc");?>
        </select></td>      
      </tr>
      <tr>
        <td><input type="text" name="txttk" id="txttk" class="form-control input-lg" placeholder="Thường kỳ" tabindex="4" required=""></td>
      </tr>
      <tr>
        <td><input type="text" name="txtgk" id="txtgk" class="form-control input-lg" placeholder="Giữa kỳ" tabindex="4" required=""></td>
      </tr>
      <tr>
        <td><input type="text" name="txtck" id="txtck" class="form-control input-lg" placeholder="Cuối kỳ" tabindex="4" required=""></td>
      </tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Nhập"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="51"><input type="reset" class="btn btn-primary btn-block btn-lg" name="reset" id="reset" value="Hủy"></td>
       <td>&nbsp;</td> 
      </tr>
    </tbody>
  </table>
<?php
$masv=$_REQUEST['txtma'];
$ten=$_REQUEST['txttensv'];
$monhoc=$_REQUEST['txttenmh'];
$diemtk=$_REQUEST['txttk'];
$diemgk=$_REQUEST['txtgk'];
$diemck=$_REQUEST['txtck'];
$diemtong=($diemtk*2+$diemgk*3+$diemck*5)/10;
$lophoc=$_SESSION['lophoc'];
switch($_POST['nut'])
{
	case 'Nhập':
	{
		$g->themxoasua("insert into diem(masv,hoten,lophoc,tenmonhoc,thuongky,giuaky,cuoiky,diemtong) values('$masv','$ten','$lophoc','$monhoc','$diemtk','$diemgk','$diemck','$diemtong')");
		echo '<script>
				alert("Nhập điểm thành công !");
			</script>';
      echo '<script>
        window.history.go(-2);
      </script>'; 		
		break;
	}
}
?>
</form>
