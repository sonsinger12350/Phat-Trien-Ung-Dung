<form name="form1" method="post" action="">
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="2" style="text-align: center"><h2>Thêm môn học</h2>
        </td>
      </tr>      
      <tr>
        <td width="100"><label>Tên môn học:</label></td>
        <td width="500"><input type="text" name="txtten" id="txtten" class="form-control input-lg" tabindex="4"></td>
       </tr>
      <tr>
        <tr><td><br></td></tr>
        <td colspan="2" height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Thêm"></td>
      </tr>
      <tr>
        
        <td colspan="2" height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Hủy"></td>
      </tr>
    </tbody>
  </table>
<?php
$ten=$_REQUEST['txtten'];

switch($_POST['nut'])
{
	case 'Thêm':
	{
		$a->themxoasua("insert into monhoc(tenmonhoc) values('$ten')");
		echo '<script> 
				alert("Thêm thành công !");
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