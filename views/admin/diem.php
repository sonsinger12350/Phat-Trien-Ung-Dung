<?php
error_reporting(0);
session_start();
$malogin=$_SESSION['malogin'];
$masv=$_GET['masv'];
?>
<link rel="stylesheet" type="text/css" href="../../css/table.css">
<div class="row"> 
  <div class="col-md-12">
      <form name="form1" method="post" action="" style=" padding-left:70px;">
        <table width="100%" border="0" cellspacing="1" cellpadding="1" style="text-align:center;" class="styled-table">
          <tr>
            <td colspan="8"><h3 style=" font-family:'Times New Roman', Times, serif; font-weight:bold;">Kết Quả Học Tập</h3></td>            
          </tr>
          <tr style="text-align: center">
					<td width="30">STT</td>
					<td width="350">Tên môn học</td>
					<td width="150">Điểm thường kỳ</td>
					<td width="120">Điểm giữa kỳ</td>
					<td width="120">Điểm cuối kỳ</td>
                    <td width="120">Điểm tổng kết</td>
                    <td></td>
                    <td></td>
                    				
		  </tr>
          <?php								
				$a->LayDiemAdmin("select * from diem where masv='$masv'");
		?>
        </table>
    </form>
    </div>
</div>
