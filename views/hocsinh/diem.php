<link rel="stylesheet" type="text/css" href="../../css/table.css">
<?php
error_reporting(0);
session_start();
$malogin=$_SESSION['malogin'];
?>
<div class="row"> 
    <div class="col-md-12">
      <form name="form1" method="post" action="">
        <table width="100%" border="0" cellspacing="1" cellpadding="1" style="text-align:center;" class="styled-table">
          <tr>
            <td colspan="8"><h3 style=" font-family:'Times New Roman', Times, serif; font-weight:bold;">Kết Quả Học Tập</h3></td>
          </tr>
          <tr style="text-align: center">
					<td width="30">STT</td>
					<td width="350">Tên môn học</td>
					<td width="110">Điểm thường kỳ</td>
					<td width="110">Điểm giữa kỳ</td>
					<td width="110">Điểm cuối kỳ</td>
                    <td width="110">Điểm tổng kết</td>					
		  </tr>
          <?php								
				$hs->LayDiemHocsinh("select * from diem where masv='$malogin'");
		?>
        </table>
      </form>
    </div>
</div>
