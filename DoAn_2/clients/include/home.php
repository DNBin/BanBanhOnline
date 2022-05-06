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
    if(isset($_POST['lienhe'])){
        $hoten=$_POST['hoten'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $ghichu=$_POST['ghichu'];
        if(isset($_SESSION['dangnhap'])){
            $idkh=$_SESSION['id_khachhang'];
        }
        else{
            $idkh=0;
        }
        $sql_lienhe=mysqli_query($con,"INSERT INTO tbl_lienhe(hoten,email,sdt,ghichu,id_khachhang) values ('$hoten','$email','$sdt','$ghichu','$idkh')");      
        echo '<script>alert("Bạn đã gửi tin thành công. Chúng tôi sẽ hỗ trợ bạn nhanh nhất có thể")</script>'; 
    }
?>
 <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="./public/images/homepage/4.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1><span>Chất Lượng</span> Sản Phẩm Tốt Nhất</h1>
                            <p>
                                Chúng tôi luôn mang đến cho bạn những món bánh tuyệt vời nhất của chúng tôi
                            </p>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="?quanly=menu">Xem Menu</a>
                                <a class="btn custom-btn" href="?quanly=booking" style="padding: 12px 36px;">Đặt Bàn</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="./public/images/homepage/view.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>Nhân Viên <span>Thân Thiện</span></h1>
                            <p>
                                Thân thiện, linh hoạt luôn là tiêu chí hàng đầu của chúng tôi
                            </p>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="?quanly=menu">Xem Menu</a>
                                <a class="btn custom-btn" href="?quanly=booking" style="padding: 12px 36px;">Đặt bàn</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="./public/images/homepage/carousel-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>Giao hàng <span>Nhanh</span></h1>
                            <p>
                                Nếu chúng tôi nhận giao hàng nhanh thứ hai  thì không cửa hàng nào có thể xếp thứ nhất
                            </p>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="?quanly=menu">Xem Menu</a>
                                <a class="btn custom-btn" href="?quanly=booking" style="padding: 12px 36px;"> Đặt bàn </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        
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
                                        <input type="text" name="ngay" class="form-control datetimepicker-input" placeholder="Ngày" data-target="#date" data-toggle="datetimepicker"/>
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
                                    <button class="btn custom-btn" type="submit" name="datban">Đặt ngay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="./public/images/homepage/about.jpg" alt="Image">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header">
                                <p>Giới thiệu về chúng tôi</p>
                                <h2>Chào mừng bạn đến với cửa hàng bánh ngọt - Bin Cake</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Bin Cake là cửa hàng chuyên phân phối bánh ngọt nên đảm bảo luôn đưa ra mức giá ưu đãi nhất cho khách hàng.
                                </p>
                                <p>
                                    Đến với Bin Cake bạn sẽ được cung cấp các sản phẩm bánh ngọt đa dạng nhiều thể loại, chất lượng thì khỏi phải bàn luôn nha!!
                                </p>
                                <p>
                                   Đội ngũ nhân viên trẻ đầy nhiệt huyết của cửa hàng được đào tạo chuyên môn luôn sẵn sàng phục vụ khách hàng.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
        
        
        <!-- Food Start -->
        <div class="food">
            <div class="container">
                <div class="row align-items-center">
                <?php
                    $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_danhmuc");
                    while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                        if($row_danhmuc['hienthi']==1){
                ?>
                    <div class="col-md-4">
                        <div class="food-item">
                            <i class=""><img src="./public/images/homepage/<?php echo $row_danhmuc['anh_danhmuc'] ?>" alt="" width="60px" height="50px"></i>
                           
                            <h2><?php echo $row_danhmuc['ten_danhmuc'] ?></h2>
                            <p><?php echo $row_danhmuc['chitiet_danhmuc'] ?></p>
                            <a href="?quanly=menu">Xem Menu</a>
                        </div>
                        
                    </div>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div> 
        <!-- Food End-->
        
        
        <!-- Menu Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center"> 
                    <h2 style="border-bottom: 5px solid #ea8025; width: 40%; margin-left: 30%;">Sản phẩm Hot</h2>
                </div>
                <div class="row">
                    <?php
                        $sql_sphot = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE hot = '1' ORDER BY id_sanpham DESC LIMIT 4");
                        while($row_sphot=mysqli_fetch_array($sql_sphot)){
                             
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="./public/images/anh/<?php echo $row_sphot['hinhanh']?>" alt="Image" width="120px" height="270px">
                                <form action="?quanly=cart" method="POST">
                                <div class="team-social">       
                                    <a class="btn custom-btn" href="?quanly=product&id=<?php echo $row_sphot['id_sanpham']?>"><i class="far fa-eye"></i></a>
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
                                <h5 style="color: #4a7d4e;"><?php echo $row_sphot['ten_sanpham']?></h5>
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
       <!-- Meunu End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Liên hệ với chúng tôi</p>
                    <h2>Liên Hệ</h2>
                </div>
                <div class="row align-items-center contact-information">
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Địa chỉ</h3>
                                <p>678 Phường 6, TP Cao Lãnh, Đồng Tháp</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Số điện thoại</h3>
                                <p>0866 744 002</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Email</h3>
                                <p>dangngocbin2000 @gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-share"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Follow</h3>
                                <div class="contact-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row contact-form">
                    <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125552.67486457108!2d105.55582205890731!3d10.459525423980002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a65a7745ea433%3A0xa7cfd64d35b50f23!2zVHAuIENhbyBMw6NuaCwgxJDhu5NuZyBUaMOhcCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1632195386543!5m2!1svi!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div id="success"></div>
                        <form action="" method="POST">
                            <div class="control-group">
                                <input type="text" class="form-control"  placeholder="Họ tên " required="required"  name="hoten"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" placeholder="Email" required="required"  name="email"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" min="0" size="20" class="form-control" placeholder="Số điện thoại" required="required"  name="sdt"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" placeholder="Ghi chú" required="required"  name="ghichu"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn custom-btn" type="submit" name="lienhe">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->