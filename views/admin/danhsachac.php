<?php 
$phanquyen=$_GET['phanquyen'];
?>
<link rel="stylesheet" type="text/css" href="../../css/table.css">
<div class="row">
  <div class="col-md-12">
      <form name="form1" method="post" action="">
        <table width="100%" border="0" cellspacing="1" cellpadding="1" class="styled-table">
          <tr>
            <td colspan="8"><h3 style=" font-family:'Times New Roman', Times, serif; font-weight:bold;">Danh sách tài khoản</h3></td>            
          </tr>
          <tr style="text-align: center">
					<td width="45">STT</td>
					<td width="131">Mã đăng nhập</td>
					<td width="161">Tên Người Dùng</td>
					<td width="134">PassWord</td>
          <td width="134">Lớp</td>
					<td width="140">Phân Quyền</td>
					<td></td> 
          <td></td>                   				
		  </tr>
          <?php								
			$a->dsaccount("select * from users where phanquyen='$phanquyen'")	
		?>
        </table>
    </form>
    </div>
</div>