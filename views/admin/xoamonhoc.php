<?php
$id=$_GET['id'];
$a->themxoasua("delete from monhoc where id_monhoc = $id limit 1");
echo '<script>
		alert("Xóa thành công");
	</script>';
echo '<script>
		window.history.go(-1);
	</script>';	
?>