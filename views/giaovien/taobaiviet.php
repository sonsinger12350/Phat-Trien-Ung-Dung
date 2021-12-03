<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" accept-charset="utf-8">
  <table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="" style="text-align: center"><h2>Bài Viết Mới</h2>
        </td>
      </tr>
      <tr>
        <td width="542"><input type="text" name="txtten" id="txtten" class="form-control input-lg" placeholder="Tên bài viết" tabindex="4" required=""></td>
       </tr> 
      <tr>
        <td><label for="txtnoidung">Nội dung:</label>
        <textarea name="txtnoidung" id="txtnoidung" cols="45" rows="5"  class="form-control input-lg" required></textarea></td>
      </tr>
       <tr>
        <td width="542"><label for="txtfile">File đính kèm :</label>
         <input type="file" name="txtfile" id="txtfile"></td>
       </tr>      
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Tạo"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="51"><input type="reset" class="btn btn-primary btn-block btn-lg" name="reset" id="reset" value="Hủy"></td>
       <td>&nbsp;</td> 
      </tr>
    </tbody>
  </table>
<?php
$ten=$_REQUEST['txtten'];
$nguoitao=$_SESSION['ten'];
$lop = $_SESSION['lophoc'];
$noidung=$_REQUEST['txtnoidung'];
$name=$_FILES['txtfile']['name'];
$local=$_FILES['txtfile']['tmp_name'];
switch($_POST['nut'])
{
	case 'Tạo':
	{
		if($g->uploadfile($local,'../../images',$name)==1)
		{
			$g->themxoasua("insert into baiviet(tenbaiviet,nguoitao,lophoc,noidung,file) values('$ten','$nguoitao','$lop','$noidung','$name')");
			echo '<script>
					alert("Tạo thành công");
				</script>';
			echo '<script>
					window.location.href="?action=diendan";
				</script>';
		}
		else
		{
			echo '<script>
					alert("Tạo bài viết không thành công !");
				</script>';
		}
		break;
	}
}
?>
</form>
</body>
</html>