<?php
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
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

<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Liên hệ với chúng tôi</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Liên hệ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Liên Hệ Với Chúng Tôi</p>
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
                                <p>012 345 6789</p>
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
                                <input type="number" min="0" size="10" class="form-control" placeholder="Số điện thoại" required="required"  name="sdt"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" placeholder="Ghi chú" required="required" name="ghichu"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn custom-btn" type="submit" id="sendMessageButton" name="lienhe">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->