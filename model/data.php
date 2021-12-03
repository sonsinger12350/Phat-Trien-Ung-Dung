<?php
class database
{
	function connect()
	{
		$conn=mysqli_connect("localhost","id16893036_son","Aptx4869+4869","id16893036_dulieu");
		if(!$conn)
		{
			die("Kết nối database thất bại!");
			exit();
		}
		else
		{
			mysqli_set_charset($conn,"utf8");
			return $conn;
		}
	}	
}
?>