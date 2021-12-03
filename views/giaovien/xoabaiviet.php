<?php
$id=$_GET['id'];
$g->themxoasua("delete from baiviet where id_baiviet = $id limit 1");
echo '<script>
		alert("Xóa thành công");
	</script>';
echo '<script>
		window.location.href="?action=diendan";
	</script>';	
?>