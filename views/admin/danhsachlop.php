<link rel="stylesheet" type="text/css" href="../../css/table.css">
<center>
  <div class='row' align="left">
    <td>
      <p>
          <a href="?action=monhoc"><h4>Môn học</h4></a>
      </p>
    </td>
  </div>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="styled-table">
    <tbody>
      <tr style="text-align: center">
        <td width="63">STT</td>
        <td width="431">Danh Sách Lớp</td>
        <td width="63"></td>
      </tr>
      <?php $a->danhsachlop('select distinct lophoc from diem ');?>
    </tbody>
  </table>
</form>
</center>



