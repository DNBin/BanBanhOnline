<meta charset="utf-8" />
<?php
	session_start();
	require('../connect.php');
	if(isset($_POST['btn_login'])){
		$tendn = $_POST['txt_tendn'];
		$pass = md5($_POST['txt_pass']);
		$sql = "SELECT * FROM tbl_admin WHERE user = '$tendn' AND pass = '$pass'";
		$query = mysqli_query($con,$sql);
		$row_dangnhap = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		if($row > 0){			
			$_SESSION['admin']=$row_dangnhap['hoten'];
            $_SESSION['id_admin']=$row_dangnhap['id_admin'];
            $_SESSION['user_admin']=$row_dangnhap['user'];
            $_SESSION['anh_admin']=$row_dangnhap['anh'];
			echo '<script>alert("Đăng  nhập thành công")</script>';
			echo '<script>window.location="../index.php"</script>';	
		}else{
			echo '<script>alert("Đăng  nhập thất bại")</script>';
			header('Location: login_admin.php');
		}		
	}
?>