<?php
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sailor - Bootstrap 3 corporate templaate</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="http://iweb-studio.com" />
<!-- css -->
<link href="../../sailor/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../sailor/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="../../sailor/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/table.css">

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



<div id="wrapper">
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 align="center">Diễn Đàn Trao Đổi Giữa HS và GV</h3>              
		  </div>
		</div>      
	</div>
	</section>
    <div id="wrapper">
    <section>
    <div class="container">
     <div class="row">
        <form id="form1" name="form1" method="post">
                    <table width="1150" border="0" align="center" cellpadding="0" cellspacing="0" class="styled-table">
                      <tbody>
                        <tr>
                          <td width="353"><h2><?php $hs->laybaiviet("select tenbaiviet from baiviet where id_baiviet='$id'") ?></h2></td>
                          
                        </tr>                        	
                      </tbody>
                    </table>
                    <p><?php $hs->laybaiviet("select noidung from baiviet where id_baiviet='$id'"); ?></p>
                    <p>Tệp đính kèm : <?php $hs->laybaiviet("select file from baiviet where id_baiviet='$id'"); ?></p>
                    <?php
						$conn=mysqli_connect("localhost","root","","CongNgheMoi");
						$sql="select file from baiviet where id_baiviet = '$id'";
						$ketqua=mysqli_query($conn,$sql);
						$i=mysqli_num_rows($ketqua);
						if($i>0)
						{
							while($rows=mysqli_fetch_array($ketqua))
							{
								$file=$rows['file'];
							}
						}
							// Array containing sample image file names							
							$st = "../../images/".$file	;											
							// Loop through array to create image gallery
							echo "<a href='$st'>Dowload</a>";
					?>
       </form>
  </div>
  </div>
  </section>
  </div>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../sailor/js/jquery.min.js"></script>
<script src="../../sailor/js/modernizr.custom.js"></script>
<script src="../../sailor/js/jquery.easing.1.3.js"></script>
<script src="../../sailor/js/bootstrap.min.js"></script>
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