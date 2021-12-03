<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
require_once "../../model/data.php";
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title></title> 
    <link rel="stylesheet" type="text/css" href="../../css/table.css">
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <h2>Thông báo qua mail đến các sinh viên lớp 
    <?php echo $_SESSION['lophoc']?></h2>
    <input type="submit" class="btn btn-primary" name="nut" id="nut" value="Gửi">
<?php
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$conn=mysqli_connect("localhost","root","","congnghemoi");
$lop=$_SESSION['lophoc'];
$thongtin = mysqli_query($db->connect(),"select * from hososinhvien where lophoc = '$lop'");
$ten = $_SESSION['ten'];
$baiviet = mysqli_query($db->connect(),"select * from baiviet where id_baiviet = '$id'");
$dulieu=mysqli_fetch_array($baiviet);
$chude = $dulieu['tenbaiviet'];
$noidung = $dulieu['noidung'];
if(isset($_POST['nut']))
{
    while($rows=mysqli_fetch_array($thongtin))
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sonsinger.sl@gmail.com';                     //SMTP username
        $mail->Password   = 'Aptx4869';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;
        $mail->setFrom('sonsinger.sl@gmail.com',$ten);      
        $mail->addAddress($rows['email']); 
        $mail->WordWrap = 50;                       
        $mail->isHTML(true);


        //Attachments
        #$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        $body='
<div style="background-color: lightgrey;font-size: 20px;width: 100%">
    <table width="90%" border="0" align="center">
      <tbody>
        <tr>
            <td colspan="4" align="center"><h2>Thông báo đến từ '.$ten.'</h2></td>
        </tr>
        <tr>
            <td colspan="4">'.$noidung.'</td>
        </tr>              
      </tbody>
    </table>

</div>
        ';
        $mail->Subject = $chude;
        $mail->Body    = $body; 
        $send = $mail ->Send();                 
    }
    
    echo '<script>
                alert("Thông báo đã được gửi");
            </script>';
    echo '<script>
                 window.location.href="?action=diendan";
            </script>';
}
?>
</form>
</body>
</html>