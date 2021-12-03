<?php
error_reporting(0);
include("model/source.php");
$p=new chucnang();
?>
<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>Đăng Nhập</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>Đăng nhập để tiếp tục</h1>
	<div class="w3layoutscontaineragileits">
	
		<form action="#" method="post">
			<input type="text" name="txtuser" id="txtuser" placeholder="Mã đăng nhập :">
			<input type="password" name="txtpass" id="txtpass" placeholder="Mật khẩu :">
			<div class="aitssendbuttonw3ls">
				<input name="nut" type="submit" id="nut" value="Đăng nhập">
			
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	<!-- for register popup -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="contact-form1">
			<div class="contact-w3-agileits">
				<h3>Đăng ký</h3>
				<form action="#" method="post">
					<div class="form-sub-w3ls">
							<input placeholder="Họ tên :" required="" name="txtten" id="txtten" type="text">
							<div class="icon-agile">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
						</div>
                        <div class="form-sub-w3ls">
							<input placeholder="Lớp học :" required="" name="txtlop" id="txtlop" type="text">
							<div class="icon-agile">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
						</div>						
						<div class="form-sub-w3ls">
							<input placeholder="Mã sinh viên :" required="" name="txtma" id="txtma" type="text">
							<div class="icon-agile">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
						</div>						
						<div class="form-sub-w3ls">
							<input placeholder="Mật khẩu :" required="" name="txtpss" id="txtpss" type="password" >
							<div class="icon-agile">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-sub-w3ls">
							<input placeholder="Xác nhận mật khẩu :" required="" name="txtcfpass" id="txtcfpass" type="password" onBlur="ktNLMK()">
							<div class="icon-agile">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>
					<div class="submit-w3l">
						<input type="submit" name="submit" id="submit" value="Xác nhận">
					</div>
				</form>
			</div>
		</div>
        <script>
        function ktNLMK() {
            var nlmk = document.getElementById("txtcfpass").value;
            var mk = document.getElementById("txtpss").value;
            if(nlmk != ''){
                if (nlmk != mk) {
                    alert("Password không trùng khớp.Vui lòng kiểm tra lại!");
                    return false;
                }
                else
                    
                return true;
            }
        }
        </script>
	<?php
	$ten=$_REQUEST['txtten'];
	$lop=$_REQUEST['txtlop'];	
	$user=$_REQUEST['txtma'];
	$pass=$_REQUEST['txtpss'];
	$cfpass=$_REQUEST['txtcfpass'];
	switch($_POST['submit'])
	{
		case 'Xác nhận':
			{
				$p->dangky($ten,$lop,$user,$pass);
			}
	}
	?>	
	</div>
	
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
</body>
<!-- //Body -->

</html>
<?php
$malogin=$_REQUEST['txtuser'];
$password=$_REQUEST['txtpass'];
switch($_POST['nut'])
{
	case 'Đăng nhập':
		{
			if($malogin =='' || $password == '')
			{
				echo '<script>alert("Vui lòng nhập đầy đủ thông tin");</script>';			
			}
			else
			{
				$p->dangnhap($malogin,$password);
			}
			
		}
		break;
		
}
?>