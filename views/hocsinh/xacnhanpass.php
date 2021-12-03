<?php
include("../../model/source.php");
$hs=new chucnang();
$masv=$_SESSION['malogin'];
error_reporting(0);
?>
<?php
if(isset($_SESSION['malogin']) && isset($_SESSION['password']))
{
  $hs->confirm($_SESSION['malogin'],$_SESSION['password']);
}
else
{
  echo '
    <script>
      window.location.href="../../index.php";
    </script> 
    ';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>Đổi mật khẩu</title>
<link href="../../sailor/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../sailor/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen"/> 
<link href="../../sailor/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="../../sailor/css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="../../sailor/skins/default.css" rel="stylesheet" />

  <!-- boxed bg -->
  <link id="bodybg" href="../../sailor/bodybg/bg1.css" rel="stylesheet" type="text/css" />
<form name="form1" method="post" action="">
  <table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>        
        <td colspan="" style="text-align: center"><h2>Cập nhật password</h2>
        </td>
      </tr>
       <tr>
        <td width="542"><input type="text" name="txtpass" id="txtpass" class="form-control input-lg" placeholder="Mật khẩu mới" tabindex="4" data-validate = "Password is required"></td>
      </tr>
      <tr><span id="thongbao" style="font-family: 'Times New Roman', Times, serif;"></span></tr>
      <tr>
        <td><input type="text" name="txtcfpass" id="txtcfpass" class="form-control input-lg" placeholder="Xác nhận mật khẩu mới" tabindex="4" data-validate = "Confirm password is required" onblur="ktNLMK()"></td>
      </tr>
      <tr><span id="tb" style="font-family: 'Times New Roman', Times, serif;"></span></tr>
      <tr>
        <td height="51"><input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" id="submit" value="Xác nhận"></td>
       <td>&nbsp;</td> 
      </tr>
    </tbody>
  </table>  
  </head>
  </html>
</form>
<script>
function ktNLMK() {
            var nlmk = document.getElementById("txtcfpass").value;
            var mk = document.getElementById("txtpass").value;
          if(nlmk != mk) {
          if(mk == 1111)
          {
            document.getElementById("tb").innerHTML = " ";
          }
          else
              document.getElementById("tb").innerHTML = "Mật khẩu phải trùng khớp.Vui lòng nhập đúng mật khẩu !!!";
            return false;
                }
                else
          document.getElementById("tb").innerHTML = " ";
                return true;
        }
</script>
<?php
$pass=$_REQUEST['txtpass'];
$cfpass=$_REQUEST['txtcfpass'];
switch(isset($_POST['submit']))
{
  case 'Xác nhận':
  {
    if(!empty($pass) || !empty($cfpass))
    {
      if($pass=='1111')
      {
        echo '<script>
              alert("Vui lòng không dùng lại mật khẩu này");
          </script>';
      }  
      else
      {
        $pass=md5($pass);
        $hs->doimk("update users set password='$pass' where malogin='$masv'");
      } 
    }
    else
    {
      echo '<script>
              alert("Vui lòng nhập đầy đủ");
          </script>';
    }
  }
}
?>