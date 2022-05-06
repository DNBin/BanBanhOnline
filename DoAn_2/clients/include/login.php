<?php
    session_start();
    include('../connect.php'); 
?>
<?php
    if(isset($_POST['dangnhap'])){
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        if($user==''||$pass==''){
            echo '<script>alert("Nhập đầy đủ thông tin")</script>';    
        }else{
            $sql_select_login = mysqli_query($con,"SELECT * FROM tbl_member WHERE user='$user' AND pass ='$pass'");
            $count = mysqli_num_rows($sql_select_login);
            $row_dangnhap = mysqli_fetch_array($sql_select_login);
            if($count>0){
                $_SESSION['dangnhap']=$row_dangnhap['hoten'];
                $_SESSION['id_khachhang']=$row_dangnhap['id'];
                $_SESSION['user']=$row_dangnhap['user'];
                $_SESSION['anh']=$row_dangnhap['anh'];
                echo '<script>alert("Đăng nhập tài khoản thành công")</script>';
                echo '<script>window.location="../index.php"</script>';
            }else{   
                echo '<script>alert("Tài khoản hoặc mật khẩu sai")</script>';
            }  
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
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
        <br><br><br><br><br><br>
      <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <br><h3>Đăng Nhập</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
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
                        </div><br>
                        <!-- <div class="row align-items-center remember">
                            <input name="check" type="checkbox">Nhớ tài khoản
                        </div> -->
                        <div class="form-group">
                            <input type="submit" value="Đăng nhập" name="dangnhap" class="btn float-right custom-btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Bạn không có tài khoản?<a href="register.php">Đăng ký</a>
                    </div><br>
                    <!-- <div class="d-flex justify-content-center">
                        <a href="#">Bạn quên mật khẩu?</a>
                    </div> -->
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