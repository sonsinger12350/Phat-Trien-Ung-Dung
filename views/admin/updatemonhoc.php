<?php
$id=$_GET['id'];
?>
<form name="form1" method="post" action="">
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="2" style="text-align: center"><h2>Sửa môn học</h2>
        </td>
      </tr>
      <tr>
        <td width="100"><label>ID môn học:</label></td>
        <td width="500"><input type="text" name="txtma" id="txtma" class="form-control input-lg" tabindex="4" value="<?php  $a->lay1monhoc("select id_monhoc from monhoc where id_monhoc='$id'");?>"></td>
       </tr>
      <tr>
        <td width="100"><label>Tên môn học:</label></td>
        <td width="500"><input type="text" name="txtten" id="txtten" class="form-control input-lg" tabindex="4" value="<?php  $a->lay1monhoc("select tenmonhoc from monhoc where id_monhoc='$id'");?>"></td>
       </tr>
      <tr>
        
        <td colspan="2" height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Sửa"></td>
      </tr>
      <tr>
        
        <td colspan="2" height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Hủy"></td>
      </tr>
    </tbody>
  </table>
<?php
$ma=$_REQUEST['txtma'];
$ten=$_REQUEST['txtten'];

switch($_POST['nut'])
{
	case 'Sửa':
	{
		$a->themxoasua("update monhoc
				  set id_monhoc='$ma',tenmonhoc='$ten' where id_monhoc='$id'");
		echo '<script> 
				alert("Sửa thành công !");
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