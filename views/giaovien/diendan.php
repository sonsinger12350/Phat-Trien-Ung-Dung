<?php
$nguoitao=$_SESSION['ten'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sailor - Bootstrap 3 corporate template</title>
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


<form id="form1" name="form1" method="post">
<div id="wrapper">
	<section id="inner-headline">
	<div class="container" style="background-color: lightgrey;">
		<div class="row">
			<div class="col-lg-12">
				<h3 align="center">Diễn Đàn Trao Đổi Giữa HS và GV</h3>
          <div class="col-md-4">                  
          </div>
              <div class="col-md-4">
                  <input name="nut" type="submit" class="btn btn-primary btn-block btn-lg" id="nut" value="Thêm một chủ đề mới">
                <?php 
        					switch(isset($_POST['nut']))
        					{
        						case 'Thêm một chủ đề mới':
        						{
        							echo '<script>
        									window.location.href="?action=taobaiviet";
        								</script>';
        								break;
        						}
        					}
        				?>
              </div>
                <div class="col-md-4">                  
                </div>
		  </div>
		</div>       
	</div>
	</section>
    <div id="wrapper">
    <section>
    <div class="container">
     <div class="row">        
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="styled-table">
                      <tbody>
                        <tr>
                          <td width="25%">Chủ Đề</td>
                          <td width="20%">Người Tạo</td>
                          <td width="30%">Giờ Tạo</td>
                        </tr>
                        <?php $g->dsbaiviet("select * from baiviet where nguoitao='$nguoitao'")?>
                      </tbody>
                    </table>     
  </div>
  </div>
  </section>
  </div>
</div>
</form>
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