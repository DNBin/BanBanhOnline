<?php 
  session_start();
  require("./connect.php");
  if(!isset($_SESSION['admin'])){
    header('Location: ./include/login_admin.php');
}
  if(isset($_GET['login_admin'])){
    $logout = $_GET['login_admin'];
}else{
    $logout='';
}
if($logout=='dangxuat_admin'){
    session_destroy();
    header('Location: ./include/login_admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị hệ thống</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="./public/css/dataTables.bootstrap.min.css" rel="stylesheet" />
  <link href="./public/css/style.css" rel="stylesheet" />
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script src="./public/js/jquery-3.3.1.min.js"></script>
  <script src="./public/js/jquery.dataTables.min.js"></script>
  <script src="./public/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 pl-0 bg-white ">
            <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
              <div class="user-info text-center pt-3">
                <img src="./public/images/image_user/<?php echo $_SESSION['anh_admin'] ?>" alt="" width="70px" height="100px" style="border-radius:50px;">
                <p class="pt-2"></p>
                <p class="designation"><?php echo $_SESSION['admin'] ?></p>
                <span class="online"></span>
              </div>
              <ul class="nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">
                    <i class="fas fa-tachometer-alt pr-2"></i>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=dssp">
                    <i class="fab fa-product-hunt text-success pr-2"></i>
                    <span class="menu-title">Quản lý sản phẩm</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=dmloai">
                    <i class="fas fa-store-alt text-dark pr-1"></i>
                    <span class="menu-title">Quản lý danh mục</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=taikhoan">
                    <i class="fas fa-users text-warning pr-1"></i>
                    <span class="menu-title">Quản lý người dùng</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=thongke">
                    <i class="fa fa-shopping-cart text-info pr-2"></i>
                    <span class="menu-title">Thống kê đơn hàng</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=hangton">
                    <i class="fas fa-tags text-danger pr-2"></i>
                    <span class="menu-title">Thống kê hàng tồn</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=lienhe">
                    <i class="far fa-address-card text-danger pr-2"></i>
                    <span class="menu-title">Quản lý liên hệ</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?quanly=datban">
                    <i class="fas fa-table text-danger pr-2"></i>
                    <span class="menu-title">Quản lý đặt bàn</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="col-md-10 p-0">
            <nav class="navbar navbar-expand-md bg-admin" >
              <a class="navbar-brand text-white" href="index.php"><i class='fas fa-home mr-1'></i>Home</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown mr-2">
                    <a class="nav-link active" href="#" id="navbardrop" data-toggle="dropdown">
                      <img src="./public/images/image_user/<?php echo $_SESSION['anh_admin']?>" alt="" class="rounded-circle" width="30px" height="30px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="?login_admin=dangxuat_admin">
                            <i class="fas fa-sign-out-alt"> Đăng xuất</i>
                        </a>
                    </div>
                </li>
                </ul>
              </div>
            </nav>
            <div class="content-wrapper p-4">
        <?php
        if ($_SESSION['admin'] != '') {
          if (isset($_GET['quanly'])) {
            if ($_GET['quanly'] == 'themhsx') {
              require('./include/fr_NhapHangSX.php');
            }
            if ($_GET['quanly'] == 'suahsx') {
              require('./include/fr_SuaHSX.php');
            }
            if ($_GET['quanly'] == 'dmloai') {
              require('./include/dsdmloai.php');
            }
            if ($_GET['quanly'] == 'themloaisp') {
              require('./include/fr_NhapLoaiSP.php');
            }
            if ($_GET['quanly'] == 'sualoaispx') {
              require('./include/fr_SuaLoaiSP.php');
            }
            if ($_GET['quanly'] == 'dssp') {
              require('./include/dssp.php');
            }
            if ($_GET['quanly'] == 'themsp') {
              require('./include/fr_NhapSanPham.php');
            }
            if ($_GET['quanly'] == 'suasp') {
              require('./include/fr_SuaSanPham.php');
            }
            if ($_GET['quanly'] == 'tintuc') {
              require('./include/dstintuc.php');
            }
            if ($_GET['quanly'] == 'themtt') {
              require('./include/fr_TinTuc.php');
            }
            if ($_GET['quanly'] == 'view_suatt') {
              require('./include/fr_SuaTinTuc.php');
            }
            if ($_GET['quanly'] == 'chitietdh') {
              require('./include/fr_ChiTietDH.php');
            }
            if ($_GET['quanly'] == 'taikhoan') {
              require('./include/dstaikhoan.php');
            }
            if ($_GET['quanly'] == 'thongke') {
              require('./include/fr_ThongKeDH.php');
            }
            if ($_GET['quanly'] == 'xacnhan') {
              require('./include/xulyxacnhan.php');
            }
            if ($_GET['quanly'] == 'hangton') {
              require('./include/fr_HangTon.php');
            }
            if ($_GET['quanly'] == 'lienhe') {
              require('./include/ds_lienhe.php');
            }
            if ($_GET['quanly'] == 'datban') {
              require('./include/ds_datban.php');
            }
            if ($_GET['quanly'] == 'xulydatban') {
              require('./include/xulydatban.php');
            }
            
          } else {
            include('./include/home.php');
          }
        } 
        ?>
            </div>
      </div>
    </div>
  </div>
  
</body>

</html>