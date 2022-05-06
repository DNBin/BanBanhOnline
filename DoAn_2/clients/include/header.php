<?php
    session_start();
   if(isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    }else{
        $dangxuat='';
    }
    if($dangxuat=='dangxuat'){
        unset($_SESSION['dangnhap']);
        unset($_SESSION['id_khachhang']);
        unset($_SESSION['user']);
        unset($_SESSION['anh']);
        header('Location: index.php');
    }
?>

<!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand"><img src="./public/images/logo/LogoBin-1-removebg-preview.png" alt="" width="110px" height="150px"></a>
                
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link ">Trang chủ</a>
                        <a href="?quanly=about" class="nav-item nav-link">Giới thiệu</a>
                        <a href="?quanly=menu" class="nav-item nav-link">Menu</a>
                        <a href="?quanly=booking" class="nav-item nav-link">Đặt bàn</a>
                        <a href="?quanly=contact" class="nav-item nav-link ">Liên hệ</a>
                    <?php
                        if(isset($_SESSION['dangnhap'])){
                            $id_kh=$_SESSION['id_khachhang'];
                            $ten=$_SESSION['user'];
                            $anh=$_SESSION['anh'];
                    ?> 
                        <a href="?quanly=cart" class="nav-item nav-link" > <i class="fas fa-cart-plus"></i></a>
                        <a class="nav-item nav-link " onclick="document.getElementById('id01').style.display='block'" style="width:auto; cursor: pointer;"> <i class="fab fa-sistrix"></i></a>
                        <div id="id01" class="modal">
                        <form action="?quanly=search" method="post">
                            <div class="input-group " style="width: 20%; margin:1% auto auto 74%; background-color: rgb(255, 255, 255); border-radius: 5px;">
                                <input type="search" placeholder="Nhập từ bạn cần tìm?" aria-describedby="button-addon3" class="form-control bg-none border-0" style=" border-radius: 30px; font-size: 14px;" name="search_product">
                                <div class="input-group-append border-0">
                                    <button type="submit" name="search" style="border:none;background:none;outline:none;"><a id="button-addon3" type="button" class="btn btn-link text-success "><i class="fa fa-search"></i></a></button>
                                </div>
                            </div>
                        </form>
                        </div>
                            <li class="nav-item dropdown mr-2">
                                <a class="nav-link active" href="#" id="navbardrop" data-toggle="dropdown">
                                <img src="./public/images/image_user/<?php echo $anh ?>" alt="" class="rounded-circle" width="25px" height="25px">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg-white">
                                <a class="dropdown-item" href="?quanly=bookme">
                                        <i class="fas fa-cart-plus"><span class="p-2">Đơn đặt bàn của tôi</span></i>
                                    </a>
                                    <a class="dropdown-item" href="?quanly=cartme">
                                        <i class="fas fa-cart-plus"><span class="p-2"> Đơn hàng của tôi</span></i>
                                    </a>
                                    <a class="dropdown-item" href="include/changepass.php">
                                        <i class="fas fa-unlock-alt "><span class="p-2"> Thay đổi mật khẩu</span></i>
                                    </a>
                                    <a class="dropdown-item" href="?login=dangxuat">
                                        <i class="fas fa-sign-out-alt"><span class="p-2"> Đăng xuất</span></i>
                                    </a>
                                </div>
                            </li>

                    <?php
                        }else{
                    ?>
                        <a href="include/login.php" class="nav-item nav-link " style="font-size: 12px; margin-top: 5px;">Đăng nhập</a>
                        <a href="include/register.php" class="nav-item nav-link" style="font-size: 12px; margin-top: 5px;">Đăng ký</a>
                        <a href="?quanly=cart" class="nav-item nav-link" > <i class="fas fa-cart-plus"></i></a>
                        <a class="nav-item nav-link " onclick="document.getElementById('id01').style.display='block'" style="width:auto; cursor: pointer;"> <i class="fab fa-sistrix"></i></a>
                        <div id="id01" class="modal">
                        <form action="?quanly=search" method="post">
                            <div class="input-group " style="width: 20%; margin:1% auto auto 74%; background-color: rgb(255, 255, 255); border-radius: 5px;">
                                <input type="search" placeholder="Nhập từ bạn cần tìm?" aria-describedby="button-addon3" class="form-control bg-none border-0" style=" border-radius: 30px; font-size: 14px;" name="search_product">
                                <div class="input-group-append border-0">
                                    <button type="submit" name="search" style="border:none;background:none;outline:none;"><a id="button-addon3" type="button" class="btn btn-link text-success "><i class="fa fa-search"></i></a></button>
                                </div>
                            </div>
                        </form>
                        </div>
                    <?php
                        }
                    ?>       
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        