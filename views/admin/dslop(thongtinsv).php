<link rel="stylesheet" type="text/css" href="../../css/table.css">
<form name="form1" method="post" action="">

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"	 class="styled-table">
    <tbody>
     <tr>
        <td colspan="3"><h3 style=" font-family:'Times New Roman', Times, serif; font-weight:bold;">Danh Sách Lớp</h3></td>            
      </tr>
      <tr style="text-align: center">
        <td width="15%">STT</td>
        <td width="70%">Danh Sách Lớp</td>
        <td width="15%"></td>
      </tr>
      <?php $a->dslop('select distinct lophoc from hososinhvien ');?>
    </tbody>
  </table>


</form>