<?php
    session_start();
    include('../connect.php'); 
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
?>
<?php
    if(isset($_POST['doimatkhau'])){
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        $new_pass=md5($_POST['new_pass']);
        if($user==''||$pass==''||$new_pass==''){
            echo '<script>alert("Nhập đầy đủ thông tin")</script>';    
        }else{
            $sql_select_change = mysqli_query($con,"SELECT * FROM tbl_member WHERE user='$user' AND pass ='$pass' LIMIT 1");
            $count = mysqli_num_rows($sql_select_change);
            $row_dangnhap = mysqli_fetch_array($sql_select_change);
            if($count>0){
                $sql_update=mysqli_query($con,"UPDATE tbl_member SET pass='$new_pass'");
                echo '<script>alert("Thay đổi mật khẩu thành công")</script>';
                header('Location: ../index.php');        
            }else{   
                echo '<script>alert("Tài khoản hoặc mật khẩu sai")</script>';
            }  
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Change Password</title>
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
                <div class="card-header text-center">
                    <h3>Đổi mật khẩu</h3>
                </div>
                <div class="card-body">
                    <form action=""  method="POST">
                        <?php 
                            $sql_select = mysqli_query($con,"SELECT * FROM tbl_member WHERE id='$id_kh'");
                            while($row_khachhang = mysqli_fetch_array($sql_select)){
                        ?>
                        <div class="input-group form-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Tài khoản" name="user" value="<?php echo $row_khachhang['user'] ?>">
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="pass">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mật khẩu mới" name="new_pass">
                        </div>
                            <input type="submit" value="Đổi mật khẩu" name="doimatkhau" class="btn float-right custom-btn">
                        </div>
                        <?php
                            }
                        ?>
                    </form>
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