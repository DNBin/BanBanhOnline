<?php
    session_start();
    include('../connect.php'); 
?>
<?php
    if(isset($_POST['dangky'])){
		$user=$_POST['user'];
		$sdt=$_POST['sdt'];
		$diachi=$_POST['diachi'];
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
        $hoten=$_POST['hoten'];
        if($user==''||$pass==''||$sdt==''||$diachi==''||$email==''||$hoten==''){
            echo '<script>alert("Nhập đầy đủ thông tin")</script>';    
        }else{
            $sql_dangky=mysqli_query($con,"INSERT INTO tbl_member(user,pass,hoten,sdt,email,diachi) values ('$user','$pass','$hoten','$sdt','$email','$diachi')");
            echo "<script> alert('Đăng ký tài khoản thành công');</script>";
            echo '<script>window.location="./login.php"</script>';
        }
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div id="loading">
        <div id="loading-center">
        </div>
     </div>
     <video autoplay muted loop id="myVideo">
        <source src="../public/images/logo/Sun.mp4" type="video/mp4">
      </video>
      <style>
         #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            width:100%;
        }
      </style>
        <br><br><br><br>
      <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3>Đăng Ký</h3>
                </div>
                <div class="card-body">
                    <form action=""  method="POST">
                        <div class="input-group form-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Tài khoản" name="user">     
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="pass">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Họ tên" name="hoten">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                            </div>
                            <input type="number" min="0" size="10" class="form-control" placeholder="Số điện thoại" name="sdt">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Đăng ký" name="dangky" class="btn float-right custom-btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Bạn đã có tài khoản?<a href="login.php">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>