<?php
include("../../model/source.php");
$a=new chucnang();
error_reporting(0);
session_start();
$malogin=$_SESSION['malogin'];
if(isset($_SESSION['malogin']) && isset($_SESSION['password']))
{
	$a->confirm($_SESSION['malogin'],$_SESSION['password']);
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
<title>Trang Chủ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="http://iweb-studio.com" />
<!-- css -->
<link href="../../sailor/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../sailor/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen"/>	
<link href="../../sailor/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="../../sailor/css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="../../sailor/skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="../../sailor/bodybg/bg1.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<header >
	<div class="navbar-default" style="background-color: #88B77B">
		<div class="container">
			<div><h4 style="color: white">📞 <a href="tel:0123456789" style="color: white">0123456789</a> - <a href="tel:0123555589" style="color: white">0123555589</a> 
				📧 <a href="mailto:info@dhcn.com" style="color: white">info@dhcn.com</a></h4></div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">

				</ul>
			</div>
		</div>		
	</div>	
</header>
<div id="wrapper">
	<!-- start header -->
	<header>       
     <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="trangchu.php"><img src="../../images/logo.jpg" width="80px" height="70px" alt=""/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li>
							<a href="trangchu.php" >Trang Chủ</a>
                            
						</li>
                         <li class="dropdown">
							<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><img src="../../images/icon user.png" width="30px" height="30px"> <i class="fa fa-angle-down"></i><?php echo $malogin;?></a>
                            <ul class="dropdown-menu">                                
                                <li><a href="" data-toggle="modal" data-target="#ModalChange">Đổi mật khẩu</a></li>
                                <li><a href="" data-toggle="modal" data-target="#ModalLogout">Đăng xuất</a></li>  								
                            </ul>						
								
						</li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
<!-- Modal Logout -->
<div class="modal fade" id="ModalLogout" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Bạn muốn đăng xuất</h4>
        </div>
        <div class="modal-body">
         	<form method="post">				
					<table width="400px" align="center">														
						<tr align="center">
							<td width="50%"><input type="submit" name="logout" id="logout" value="Có" class="btn btn-success"></td>
							<td width="50%"><input type="submit" value="Không" class="btn btn-danger" data-dismiss="modal"></td>
						</tr>						
					</table>				
			</form>
        </div>
        <div class="modal-footer">
        	
        </div>
      </div>
      
    </div>
</div>
<!-- END -->
<!-- Modal Change Pass -->
<div class="modal fade" id="ModalChange" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Đổi mật khẩu</h4>
        </div>
        <div class="modal-body">
         	<form method="post">
				<center>
					<table width="700px">			
						<tr>
							<td><label>Mật khẩu mới :</label></td>
							<td><input type="password" name="pass" id="pass"></td>
						</tr>
						<tr>
							<td height="50px"><label>Xác nhận mật khẩu mới :</label></td>
							<td width="500px"><input type="password" name="cfpass" id="cfpass"><span id = "error1" style="color: red"></span></td>
						</tr>
						<tr>
							<td height="50px"><span id = "error" style="color: red"></span></td>	
							<td><input type="button" name="change" id="change" value="Đổi mật khẩu" class="btn btn-primary"></td>			
						</tr>
					</table>
				</center>
			</form>
        </div>        
      </div>
      
    </div>
</div>	
	<section id="content">		
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
                            <a href="../chat/index.php">								
								<div class="icon">
								<img src="../../images/chat.png" width="100px" height="100px" alt=""/>
								</div>
								<h4>Trò Chuyện</h4>
                                </a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
                            <a href="?action=danhsachlop"	>								
								<div class="icon">
								<img src="../../images/sach.png" width="100px" height="80px" alt=""/>
								</div>
								<h4>Quản Lí Điểm</h4>
                                </a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
                            <a href="?action=dslop(hs)"	>								
								<div class="icon">
								<img src="../../images/hoso.jpg" width="100px" height="80px" alt=""/>
								</div>
								<h4>Quản lí Thông tin Sinh Viên</h4>
                                </a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
                            <a href="?action=danhsachnguoidung">							
								<div class="icon">
								<img src="../../images/nguoidung.png" width="100px" height="80px" alt=""/>
								</div>
								<h4>Quản Lí Tài Khoản</h4>
                                </a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
  	<?php
			if(isset($_GET['action']))
			{
				$ac=$_GET['action'];
			}
			else
			{
				$ac='';
			}
			if(isset($_POST['logout']))
			{
				session_destroy();
				echo '<script>
							window.location.href="../../index.php";
						</script>';
			}
	?> 
		<!-- divider -->
		<div class="container">
		<div class="row"  style="height : 300px">
			<div class="col-lg-12">
				<div class="solidline">              
                                <?php								
									if($ac=='danhsachnguoidung')
									{include('danhsachnguoidung.php');}	
									elseif($ac=='dslop(hs)')
									{include('dslop(thongtinsv).php');}								
									elseif($ac=='danhsachlop')
									{include('danhsachlop.php');}
									elseif($ac=='danhsachac')
									{include('danhsachac.php');}
									elseif($ac=='danhsachsv')
									{include('danhsachsinhvien.php');}
									elseif($ac=='dssvthongtin')
									{include('dssvthongtin.php');}
									elseif($ac=='diem')
									{include('diem.php');}
									elseif($ac=='xoadiem')
									{$a->xoadiem($sql);}
									elseif($ac=='xoaac')
									{$a->xoaac($sql);}
									elseif($ac=='suaac')
									{include('suaac.php');}
									elseif($ac=='suadiem')
									{include('suadiem.php');}
									elseif($ac=='themtaikhoan')
									{include('themtaikhoan.php');}
									elseif($ac=='themac')
									{include('themac.php');}
									elseif($ac=='thongtinsv')
									{include('thongtin.php');}
									elseif($ac=='updatethongtin')
									{include('updatethongtin.php');}
									elseif($ac=='monhoc')
									{include('monhoc.php');}
									elseif($ac=='suamonhoc')
									{include('updatemonhoc.php');}
									elseif($ac=='xoamonhoc')
									{include('xoamonhoc.php');}	
									elseif($ac=='themmonhoc')
									{include('themmonhoc.php');}														
                                ?>
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
		<!-- divider -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
	</section>	
	<footer style="background-color: #457347">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div>
					<h4 style="color: white">Thông tin liên hệ :</h4>
					<p >
                    <h4 style="color: white">
                    	🏢 12 Nguyễn Văn Bảo,Phường 4, Quận Gò Vấp, Tp.Hồ Chí Minh<br><br>
						📞 <a href="tel:0123456789" style="color: white">0123456789</a> - <a href="tel:0123555589" style="color: white">0123555589</a> <br><br>
						📧 <a href="mailto:info@dhcn.com" style="color: white">info@dhcn.com</a>
                    </h4>                      
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div>
					<h4 style="color: white">Thời gian làm việc : </h4>
					<p >
                    <h4 style="color: white"> 
                    	📅 Thứ 2 – Thứ 6 :  8h00AM – 17h00PM<br><br>
						📅 Thứ 7 :  8h00AM – 14h00PM<br>						
                    </h4>
					</p>
				</div>
			</div>
		</div>
	</div>
	</footer>
	<footer style="background-color: black;">
	<div class="container">			
		<div class="row">
			<h4 style="color: green; text-align: center;">Copyright © 2021 - Phát triển bởi Lê Lương Sơn - Mai Hữu Tường</h4>					
		</div>		
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="../../sailor/js/jquery.min.js"></script>
<script src="../../sailor/js/modernizr.custom.js"></script>
<script src="../../sailor/js/jquery.easing.1.3.js"></script>
<script src="../../sailor/js/bootstrap.min.js"></script>
<script src="../../sailor/plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="../../sailor/plugins/flexslider/flexslider.config.js"></script>
<script src="../../sailor/js/jquery.appear.js"></script>
<script src="../../sailor/js/stellar.js"></script>
<script src="../../sailor/js/classie.js"></script>
<script src="../../sailor/js/uisearch.js"></script>
<script src="../../sailor/js/jquery.cubeportfolio.min.js"></script>
<script src="../../sailor/js/google-code-prettify/prettify.js"></script>
<script src="../../sailor/js/animate.js"></script>
<script src="../../sailor/js/custom.js"></script>

	
</body>
</html>
<script type="text/javascript">		
	$("#change").click(function(){
	var pass = document.getElementById("pass").value;
	var cfpass = document.getElementById("cfpass").value;
		if(pass !='' && cfpass !='')
		{
			$("#error").text('');
			if(pass == cfpass)
			{
				$("#error1").text('');
				$.ajax({
					url : "doimk.php",
					method : 'POST',
					data : {pass:pass}			
				}).done(function(data){
					if(data=='ok')
					{						
						alert("Đổi mật khẩu thành công");
						document.getElementById("pass").value='';	
						document.getElementById("cfpass").value = '';
						$("#close").click();					
					}
					else if(data=='not1111')
					{
						alert("Vui lòng nhập mật khẩu khác mật khẩu mặc định");
						document.getElementById("pass").value='';	
						document.getElementById("cfpass").value = '';

					}
					else if(data=='exist')	
					{
						alert("Vui lòng nhập mật khẩu khác mật khẩu cũ");
						document.getElementById("pass").value='';	
						document.getElementById("cfpass").value = '';
					}
					else
					{
						alert(data);
					}				
				});
			}
			else
			{
				document.getElementById("error1").innerHTML = "*Vui lòng nhập mật khẩu trùng khớp";
			}
		}
		else
		{
			document.getElementById("error").innerHTML = "*Vui lòng nhập đầy đủ thông tin";
		}
	})
</script>