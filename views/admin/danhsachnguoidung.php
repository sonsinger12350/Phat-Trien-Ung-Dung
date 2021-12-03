<link rel="stylesheet" type="text/css" href="../../css/table.css">
<div class='row' align="left">
    <p>
        <a href="?action=themac"><h4>Thêm tài khoản</h4></a>
     </p>
</div>
<div class="row"> 
  <div class="col-md-12">
      <form name="form1" method="post" action="" >
        <table width="100%" border="0" cellspacing="1" cellpadding="1" class="styled-table">
          <tr>
            <td colspan="3"><h3 style=" font-family:'Times New Roman', Times, serif; font-weight:bold;">Danh sách Người Dùng</h3></td>            
          </tr>
          <tr style="text-align: center">
					<td width="45">STT</td>
					<td width="140">Phân Quyền</td> 
                    <td></td>                   				
		  </tr>
          <?php								
			     $a->dsnguoidung("select distinct phanquyen from users")	
		      ?>
        </table>
    </form>
    </div>
</div>