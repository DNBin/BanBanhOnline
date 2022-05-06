<?php
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
    if(isset($_POST['datban'])){
        if(isset($_SESSION['id_khachhang'])){
            $hoten=$_POST['hoten'];
            $sdt=$_POST['sdt'];
            $email=$_POST['email'];
            $ngay=$_POST['ngay'];
            $thoigian=$_POST['thoigian'];
            $songuoi=$_POST['songuoi'];
            $sql_datban=mysqli_query($con,"INSERT INTO tbl_datban(hoten,email,sdt,ngay,thoigian,songuoi,id_khachhang) values ('$hoten','$email','$sdt','$ngay','$thoigian','$songuoi','$id_kh')"); 
            echo '<script>alert("Cảm ơn bạn đã ủng hộ chức năng đặt bàn của chúng tôi. Hãy đến đúng giờ để nhận bàn bạn nhé!!")</script>';
        }else{
            echo '<script>alert("Vui lòng đăng nhập để đặt bàn!")</script>'; 
            echo '<script>window.location="index.php"</script>'; 
        }       
    }
?>

<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Đặt Bàn</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Trang chủ</a>
                        <a href="">Đặt bàn</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        

        <!-- Booking Start -->
        <div class="booking">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="booking-content">
                            <div class="section-header">
                                <p>Đặt Bàn</p>
                                <h2>Mong các bạn hãy ủng hộ tính năng mới của chúng tôi</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Nhận thấy sự ủng hộ của quý khách hàng nên cửa hàng chúng tôi mở thêm chức năng đặt bàn trên website. Để khách hàng có thể đặt bàn trước tại nhà, không phải chờ đợi khi đến cửa hàng.
                                </p>
                                <p>
                                    Đây cũng là lần đầu cửa hàng chúng tôi áp dụng chức năng mới này, nên có điều chi sai sót mong quý khách hàng rộng lòng thương thảo qua. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="booking-form">
                            <form action="" method="POST">
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" name="hoten" class="form-control" placeholder="Họ tên" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group date" id="date" data-target-input="nearest">
                                        <input type="text" name="ngay" class="form-control datetimepicker-input" placeholder="Ngày " data-target="#date" data-toggle="datetimepicker"/>
                                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group time" id="time" data-target-input="nearest">
                                        <input type="text" name="thoigian" class="form-control datetimepicker-input" placeholder="Thời gian" data-target="#time" data-toggle="datetimepicker"/>
                                        <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" >
                                    <div class="input-group">
                                        <select class="custom-select form-control" style="color: #ffff;" name="songuoi">
                                            <option selected >Số người</option>
                                            <option value="1" style="color: #719a0a;" >1 </option>
                                            <option value="2" style="color: #719a0a;">2 </option>
                                            <option value="3" style="color: #719a0a;">3 </option>
                                            <option value="4" style="color: #719a0a;">4 </option>
                                            <option value="5" style="color: #719a0a;">5 </option>
                                            <option value="6" style="color: #719a0a;">6 </option>
                                            <option value="7" style="color: #719a0a;">7 </option>
                                            <option value="8" style="color: #719a0a;">8 </option>
                                            <option value="9" style="color: #719a0a;">9 </option>
                                            <option value="10" style="color: #719a0a;">10 </option>
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn custom-btn" type="submit" name="datban">Đặt ngay

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Booking End -->
        
        
        <!-- Menu Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Menu</p>
                    <h2 style="border-bottom: 5px solid #ea8025; width: 40%; margin-left: 30%;">Có thể bạn thích</h2>
                </div>
                <div class="row">
                <?php
                    $sql_sphot = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE hot='1' ORDER BY id_sanpham DESC LIMIT 4");
                    while($row_sphot=mysqli_fetch_array($sql_sphot)){                       
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="./public/images/anh/<?php echo $row_sphot['hinhanh'] ?>" alt="Image" width="120px" height="270px">
                                <form action="?quanly=cart" method="POST">
                                <div class="team-social">   
                                        <a class="btn custom-btn" href=""><i class="fas fa-eye"></i></a>
                                        <input type="hidden" name="ten_sanpham" value="<?php echo $row_sphot['ten_sanpham']?>">
                                        <input type="hidden" name="id_sanpham" value="<?php echo $row_sphot['id_sanpham']?>">
                                        <input type="hidden" name="gia_sanpham" value="<?php echo $row_sphot['gia_sanpham']?>">
                                        <input type="hidden" name="soluong" value="1">
                                        <input type="hidden" name="id_khachhang" value="<?php echo $id_kh?>">
                                        <button type="submit" name="themgiohang" style="border:none;background:none;outline:none;"><a class="btn custom-btn"  ><i class="fas fa-cart-plus"></i></a>  </button>  
                                </div>
                                </form>
                            </div>
                            <div class="team-text">
                                <h5 style="color: #4a7d4e;"><?php echo $row_sphot['ten_sanpham'] ?></h5>
                                <p style="color: #634202;"><span style="color:#fbaf32;"><?php echo number_format($row_sphot['gia_sanpham'])?> VND</span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                        
                    
                </div>
            </div>
        </div>
        <!-- Menu End -->