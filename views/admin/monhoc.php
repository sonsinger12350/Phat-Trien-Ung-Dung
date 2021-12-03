<link rel="stylesheet" type="text/css" href="../../css/table.css">
  <div class='row' align="left">
    <td>
      <p>
          <a href="?action=themmonhoc"><h4>Thêm môn học</h4></a>
      </p>
    </td>
  </div>
<center>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="styled-table">
    <tbody>
      <tr style="text-align: center">
        <td width="63"><h3>STT</h3></td>
        <td width="431"><h3>Danh Sách Môn học</h3></td>
        <td width="63"></td>
        <td width="63"></td>
      </tr>
      <?php $a->danhsachmon('select * from monhoc group by id_monhoc');?>
    </tbody>
  </table>
</form>
</center>