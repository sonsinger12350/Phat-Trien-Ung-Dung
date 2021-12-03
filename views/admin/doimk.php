<?php
session_start();
require_once "../../model/data.php";
$p = new database();
$masv=$_SESSION['malogin'];
if(isset($_POST['pass']))
{  
  $pass = $_POST['pass'];
  if($pass=='1111')
  {
    echo 'not1111';
  }  
  else
  {
    $pass = md5($pass);        
    $ketqua = mysqli_query($p->connect(),"select * from users where malogin = '$masv'");      
    $row = mysqli_fetch_array($ketqua);   
    if($pass == $row['password'])
    {
      echo 'exist';
    }
    else
    {
      mysqli_query($p->connect(),"update users set password = '$pass'");
      echo 'ok';
    }    
  } 
}
else
{
  echo 'error';
}

?>