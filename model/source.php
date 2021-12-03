<?php
session_start(); 
include ("data.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<?php
class chucnang
{
	private $db;
	function __construct()
	{
		$this->db = new database();
	}
	
	/*Đăng ký*/
	function dangky($ten,$lop,$user,$pass)
	{
		$pass=md5($pass);
		$sql="select * from users where malogin='$user'";
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{	
			echo'<script>
					alert("Tài khoản đã tồn tại !");
				</script>';
		}
		else
		{
			$query="insert into users(malogin,password,ten,lophoc,phanquyen) values('$user','$pass','$ten','$lop','sinhvien')";
			mysqli_query($this->db->connect(),$query);
			echo '<script>
				alert("Đăng ký thành công !");
			</script>';
			echo '<script>
					window.location.href="index.php";
				</script>';
		}
	}
	/*End*/
	
	/*Đăng nhập*/
	function dangnhap($malogin,$password)
	{
		$mahoa=md5('1111',false);
		$password=md5($password);
		$sql="select * from users where malogin='$malogin' and password='$password'";
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$_SESSION['user_id']=$row['user_id'];
				$_SESSION['phanquyen']=$row['phanquyen'];
				$_SESSION['malogin']=$row['malogin'];
				$_SESSION['password']=$row['password'];
				$_SESSION['ten']=$row['ten'];
				$_SESSION['lophoc']=$row['lophoc'];
				$query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				//$kq=mysqli_query($this->db->connect(),$query);
				if ($this->db->connect()->query($query) === TRUE)
				{					
					//$last_id = mysqli_insert_id($this->db->connect());					
					$_SESSION['login_details_id'] = $_SESSION['user_id'];							
				} 
				if($_SESSION['password']==$mahoa)
				{
					echo'
						<script>
							window.location.href="views/hocsinh/xacnhanpass.php";
						</script>
						';
				}
				elseif($_SESSION['phanquyen']=='sinhvien')
				{
					echo'
						<script>
						alert("Đăng nhập thành công");
							window.location.href="views/hocsinh/trangchu.php";
						</script>
						';
				}
				elseif($_SESSION['phanquyen']=='giaovien')
				{
					echo'
						<script>
						alert("Đăng nhập thành công");
							window.location.href="views/giaovien/trangchu.php";
						</script>
						';
				}
				elseif($_SESSION['phanquyen']=='admin')
				{
					
					echo'
						<script>
						alert("Đăng nhập thành công");
							window.location.href="views/admin/trangchu.php";
						</script>			
						';
				}
			}
		}
		else
		{
			echo'
				<script>
				alert("Đăng nhập thất bại !");
				</script>
				';
			echo'
				<script>
				window.location.href="index.php";
				</script>
				';
		}
	}
	/*End*/
	/*Xác nhận đăng nhập*/
	function confirm($malogin,$password)
	{
		$sql="select malogin from users where malogin='$malogin' and password='$password'";
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i<0)
		{
			echo '<script language="javascript">
				              window.location.href="../index.php";
				      </script>';
			echo '<script language="javascript">
				              alert("Đăng nhập thất bại");
				      </script>';
		}
	}	
	/*End*/
	function dangxuat($value)
	{
		unset($_SESSION[$value]);
		echo '<script language="javascript">
					            window.location.href="../../index.php";
					      </script>';

	}	
	/*End*/	
	/*Hiển thị Du Lieu Diem Cho Nguoi Dung*/
	function LayDiemHocsinh($sql)
	{
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{			
			$dem=1;
			$thuongky=$row['thuongky'];
			$giuaky=$row['giuaky'];
			$cuoiky=$row['cuoiky'];
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['tenmonhoc'];
				$query="select tenmonhoc from monhoc where id_monhoc='$id'";
				$kq=mysqli_query($this->db->connect(),$query);	
				$rows=mysqli_fetch_array($kq);
				echo'
				  <tr style="text-align: center">
					<td width="45">'.$dem.'</td>
					<td width="131">'.$rows['tenmonhoc'].'</td>
					<td width="161">'.$row['thuongky'].'</td>
					<td width="134">'.$row['giuaky'].'</td>
					<td width="140">'.$row['cuoiky'].'</td>
					<td width="140">'.$row['diemtong'].'</td>										
				  </tr>
				  ';
			$dem++;
			}
		}
	}	
	/*End*/
	
	/*Hiển thị Điểm Cho Giáo Viên*/
	function LayDiemGiaovien($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);			
		if($i>0)
		{			
			$dem=1;
			while($row=mysqli_fetch_array($ketqua))
			{	
				$id=$row['tenmonhoc'];
				$query="select tenmonhoc from monhoc where id_monhoc='$id'";
				$kq=mysqli_query($this->db->connect(),$query);	
				$rows=mysqli_fetch_array($kq);			
				echo'
				  <tr style="text-align: center">
					<td width="45">'.$dem.'</td>
					<td width="131">'.$rows['tenmonhoc'].'</td>
					<td width="161">'.$row['thuongky'].'</td>
					<td width="134">'.$row['giuaky'].'</td>
					<td width="140">'.$row['cuoiky'].'</td>
					<td width="140">'.$row['diemtong'].'</td>
				  </tr>
				  ';
			$dem++;
			}
		}
	}	
	/*End*/
	
	/*Hiển thị tên môn học*/
	function laytenmh($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{				
				echo $row['tenmonhoc'];
			}
		}
	}
	/**/
	
	/*Hiển thị Điểm Cho Admin*/
	function LayDiemAdmin($sql)
	{
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{			
			$dem=1;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['tenmonhoc'];
				$query="select tenmonhoc from monhoc where id_monhoc='$id'";
				$kq=mysqli_query($this->db->connect(),$query);	
				$rows=mysqli_fetch_array($kq);
				echo'
				  <tr style="text-align: center">
					<td width="30">'.$dem.'</td>
					<td width="300">'.$rows['tenmonhoc'].'</td>
					<td width="130">'.$row['thuongky'].'</td>
					<td width="110">'.$row['giuaky'].'</td>
					<td width="110">'.$row['cuoiky'].'</td>
					<td width="110">'.$row['diemtong'].'</td>
					<td width="30"><a href="?action=xoadiem&id='.$row['id_diem'].'">Xóa</a></td>					
					<td width="30"><a href="?action=suadiem&id='.$row['id_diem'].'">Sửa</a></td>					
				  </tr>
				  ';
			$dem++;
			}
		}
	}	
	/*End*/
	
	/*Hiển thị danh sách lớp (xem điểm)*/
	function danhsachlop($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem=1;
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{				
				echo '<tr style="text-align: center">
						<td>'.$dem.'</td>
						<td>'.$row['lophoc'].'</td>
						<td><a href="?action=danhsachsv&lop='.$row['lophoc'].'">Xem</a></td>
					  </tr>';
			$dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị danh sách lớp (thông tin sinh viên)*/
	function dslop($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem=1;
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{				
				echo '<tr style="text-align: center">
						<td>'.$dem.'</td>
						<td>'.$row['lophoc'].'</td>
						<td><a href="?action=dssvthongtin&lop='.$row['lophoc'].'">Xem</a></td>
					  </tr>';
			$dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị danh sách sinh viên giáo viên*/
	function danhsach($sql)
	{	
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem=1;		
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{												
				echo '<tr style="text-align: center">
						<td>'.$dem.'</td>
						<td>'.$row['masv'].'</td>
						<td>'.$row['hoten'].'</td>
						<td><a href="?action=diem&masv='.$row['masv'].'">Xem</a></td>
					  </tr>';
				$dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị danh sách sinh viên (điểm)*/
	function danhsachsv($sql)
	{	
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem=1;		
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{				
				echo '<tr style="text-align: center">
						<td>'.$dem.'</td>
						<td>'.$row['masv'].'</td>
						<td>'.$row['hoten'].'</td>
						<td><a href="?action=diem&masv='.$row['masv'].'">Xem</a></td>
					  </tr>';
			 $dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị danh sách sinh viên (xem thông tin)*/
	function danhsachsinhvien($sql)
	{	
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem=1;		
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{				
				echo '<tr>
						<td>'.$dem.'</td>
						<td>'.$row['masv'].'</td>
						<td>'.$row['hoten'].'</td>
						<td><a href="?action=thongtinsv&masv='.$row['masv'].'">Xem</a></td>						
					  </tr>';
			 $dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị điểm*/
	function diem($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				echo $row['masv'];
				echo $row['hoten'];
				echo $row['lophoc'];
				$id_monhoc = $row['tenmonhoc'];
				echo $row['thuongky'];
				echo $row['giuaky'];
				echo $row['cuoiky'];
				echo $row['diemtong'];
				
			}
		}
		$result = mysqli_query($this->db->connect(),"select tenmonhoc from monhoc where id_monhoc = '$id_monhoc'");
		$rows = mysqli_fetch_array($result);
		echo $rows['tenmonhoc'];
	}
	/*End*/	
	
	/*Sửa Điểm*/
	function suadiem($sql)
	{
		$id=$_GET['id'];		
		mysqli_query($this->db->connect(),$sql);
		echo '<script>
				window.location.href="?action=diem";
			</script>';
	}
	/*End*/
	
	/*Nhập Điểm*/
	function nhapdiem($masv,$monhoc,$diemtk,$diemgk,$diemck,$diemtong)
	{
		$lophoc=$_SESSION['lophoc'];
		$sql="insert into diem(masv,lophoc,tenmonhoc,thuongky,giuaky,cuoiky,diemtong) values('$masv','$lophoc','$monhoc','$diemtk','$diemgk','$diemck','$diemtong')";
		mysqli_query($this->db->connect(),$sql);
			echo '<script>
				alert("Nhập điểm thành công !");
			</script>';
			echo '<script>
					window.location.href="?action=danhsachsv";
				</script>';
	}
	/*End*/
		
	/*Hiển thị danh sách người dùng*/
	function dsnguoidung($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$pass=md5($row['password']);
		$dem=1;
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo '<tr style="text-align: center">
						<td>'.$dem.'</td>
						<td>'.$row['phanquyen'].'</td>
						<td width="50"><a href="?action=danhsachac&phanquyen='.$row['phanquyen'].'">Xem</a></td>
					  </tr>';
				$dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị danh sách account*/
	function dsaccount($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);		
		$dem=1;
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo '<tr style="text-align: center">
						<td>'.$dem.'</td>
						<td>'.$row['malogin'].'</td>
						<td>'.$row['ten'].'</td>
						<td>'.$row['password'].'</td>
						<td>'.$row['lophoc'].'</td>
						<td>'.$row['phanquyen'].'</td>
						<td><a href="?action=xoaac&id='.$row['user_id'].'">Xóa</a></td>
						<td><a href="?action=suaac&id='.$row['user_id'].'">Sửa</a></td>
					  </tr>';
				$dem++;
			}
		}
	}
	/*End*/
	
	/*Hiển thị 1 account*/
	function xuatac($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);		
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo $row['malogin'];
				echo $row['password'];
				echo $row['ten'];
				echo $row['lophoc'];
				echo $row['phanquyen'];
			}
		}
	}
	/*End*/

	/*Xóa account*/
	function xoadiem($sql)
	{
		$id=$_GET['id'];
		$sql="delete from diem where id_diem='$id' limit 1";
		mysqli_query($this->db->connect(),$sql);
		echo '<script>alert("Xóa thành công !");</script>';
		echo '<script>window.history.go(-2);</script>';		
	}
	/*End*/
	
	/*Xóa account*/
	function xoaac($sql)
	{
		$id=$_GET['id'];
		$sql="delete from users where user_id='$id'";
		mysqli_query($this->db->connect(),$sql);
		echo '<script>alert("Xóa thành công !");</script>';
		echo '<script>window.history.go(-2);</script>';			
	}
	/*End*/
	
	/*Thêm account*/
	function addaccount($malogin,$ten,$lop,$phanquyen)
	{
		$pass='1111';
		$pass=md5($pass);
		$sql="select * from users where malogin='$malogin'";
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{	
			echo'<script>
					alert("Tài khoản đã tồn tại !");
				</script>';
		}
		else
		{
			$query="insert into users(malogin,password,ten,lophoc,phanquyen) values('$malogin','$pass','$ten','$lop','$phanquyen')";
			mysqli_query($this->db->connect(),$query);
			echo '<script>
				alert("Thêm thành công !");
			</script>';
			echo '<script>
					window.location.href="?action=danhsachnguoidung";
				</script>';
		}
	}
	/*End*/
	
	/*Hiển thị thông tin sinh viên*/
	function thongtinsv($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				echo $row['masv'];
				echo $row['hoten'];
				echo $row['lophoc'];
				echo $row['gioitinh'];
				echo $row['ngaysinh'];
				echo $row['noisinh'];
				echo $row['nganh'];	
				echo $row['anh'];	
				echo $row['email'];			
			}
		}
	}
	/*End*/
	
	/*Lấy ảnh*/
	function anh($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				echo $row['anh'];				
				
			}
		}
	}
	/*End*/
	
	/*Tạo Bài Viết*/
	function themxoasua($sql)
	{
		mysqli_query($this->db->connect(),$sql);		
	}	
	/*End*/	
	
	/*Hiển thị danh sách bài viết(Giáo Viên)*/
	function dsbaiviet($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo '<tr style="text-align: center">						
						<td>'.$row['tenbaiviet'].'</td>
						<td>'.$row['nguoitao'].'</td>
						<td>'.$row['giotao'].'</td>
						<td><a href="?action=xembaiviet&id='.$row['id_baiviet'].'">Xem</a></td>						
						<td><a href="?action=xoabaiviet&id='.$row['id_baiviet'].'">Xóa</a></td>
						<td><a href="?action=suabaiviet&id='.$row['id_baiviet'].'">Sửa</a></td>
						<td width="120px"><a href="?action=thongbao&id='.$row['id_baiviet'].'">Thông báo</a></td>
					  </tr>';
			}
		}
	}
	/*End*/
	
	/*Hiển thị danh sách bài viết(Học Sinh)*/
	function baiviet($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo '<tr style="text-align: center">						
						<td>'.$row['tenbaiviet'].'</td>
						<td>'.$row['nguoitao'].'</td>
						<td>'.$row['giotao'].'</td>
						<td><a href="?action=xembaiviet&id='.$row['id_baiviet'].'">Xem</a></td>	
					  </tr>';
			}
		}
	}
	/*End*/
	
	/*Hiển thị 1 bài viết*/
	function laybaiviet($sql)
	{		
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo $row['tenbaiviet'];
				echo $row['noidung'];
				echo $row['file'];
			}
		}
	}
	/*End*/
	
	/*Hiển thị option môn học*/
	function dsmonhoc($sql)
	{
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo '<option value='.$row['id_monhoc'].'>'.$row['tenmonhoc'].'</option>';
			}
		}
	}	
	/*End*/

	/*Hiển thị danh sách môn học*/
	function danhsachmon($sql)
	{
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem = '1';
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo '<tr style="text-align: center">						
						<td>'.$dem.'</td>
						<td>'.$row['tenmonhoc'].'</td>
						<td><a href="?action=suamonhoc&id='.$row['id_monhoc'].'">Sửa</a></td>	
						<td><a href="?action=xoamonhoc&id='.$row['id_monhoc'].'">Xóa</a></td>	
					  </tr>';
					  $dem++;
			}
		}
	}	
	/*End*/

	/*Hiển thị danh sách môn học*/
	function lay1monhoc($sql)
	{
		$ketqua=mysqli_query($this->db->connect(),$sql);
		$i=mysqli_num_rows($ketqua);
		$dem = '1';
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{							
				echo $row['id_monhoc'];
				echo $row['tenmonhoc'];
			}
		}
	}	
	/*End*/
	
	/*Upload file*/	
	function uploadfile($local,$folder,$name)
	{
		if($local!='' && $folder!='' && $name!='')
		{					
			$newname=$folder.'/'.$name;
			if(move_uploaded_file($local,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
	/*End*/
}
?>