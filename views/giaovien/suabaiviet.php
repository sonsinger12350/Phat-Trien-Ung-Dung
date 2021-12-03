<?php
$id=$_GET['id'];
?>
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
        <td colspan="" style="text-align: center"><h2>Sửa bài viết</h2>
        </td>
      </tr>
      <tr>
        <td width="542"><input type="text" name="txtten" id="txtten" class="form-control input-lg" placeholder="Tên bài viết" tabindex="4" value="<?php $g->laybaiviet("select tenbaiviet from baiviet where id_baiviet ='$id'")?>"></td>
       </tr> 
      <tr>
        <td><label for="txtnoidung">Nội dung:</label>
        <input name="txtnoidung" id="txtnoidung"  class="form-control input-lg" value="<?php $g->laybaiviet("select noidung from baiviet where id_baiviet ='$id'")?>"></td>
      </tr>
       <tr>
        <td width="542"><label for="txtfile">File đính kèm :</label>
         <input type="file" name="txtfile" id="txtfile"></td>
       </tr>      
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="nut" id="nut" value="Sửa"></td>
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
	case 'Sửa':
	{
				$g->uploadfile($local,'../../images',$name);
				$g->themxoasua("update baiviet set tenbaiviet='$ten',noidung='$noidung',file='$name' where id_baiviet='$id'");
				echo '<script>
						alert("Sửa thành công");
					</script>';
				echo '<script>
						window.location.href="?action=diendan";
					</script>';	
		break;
	}
}
?>
</form>
</body>
</html>