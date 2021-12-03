<?php
error_reporting(0);
session_start();
$malogin=$_SESSION['malogin'];
$masv=$_GET['masv'];
?>
<link rel="stylesheet" type="text/css" href="../../css/table.css">
<div class='row'><td><p>
          <a href="?action=nhapdiem&masv=<?php echo $masv;?>"><h4>Nhập điểm</h4></a>
        </p></td></div>
<div class="row"> 
  <div class="col-md-12">
      <form name="form1" method="post" action="">
        <table width="100%" border="0" cellspacing="1" cellpadding="1" class="styled-table">
          <tr>
            <td colspan="6"><h3 style=" font-family:'Times New Roman', Times, serif; font-weight:bold;">Kết Quả Học Tập</h3></td>            
          </tr>
          <tr>
					<td width="10%">STT</td>
					<td width="30%">Tên môn học</td>
					<td width="15%">Điểm thường kỳ</td>
					<td width="15%">Điểm giữa kỳ</td>
					<td width="15%">Điểm cuối kỳ</td>
          <td width="15%">Điểm tổng kết</td>
		  </tr>
          <?php								
				$g->LayDiemGiaovien("select * from diem where masv='$masv'");
		?>
        </table>
    </form>
    </div>
</div>
