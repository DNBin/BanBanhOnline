<?php
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
    if(isset($_POST['thanhtoan'])){
        $mahang=rand(0,9999);
        $hoten=$_POST['hoten'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $pttt=$_POST['pttt'];
        $gia=$_POST['gia'];
        $idkh=$_POST['idkh'];
        if($mahang==''||$hoten==''||$sdt==''||$email==''||$diachi==''||$pttt==''||$gia==''||$idkh==''){
            echo "  <script> alert('Vui lòng nhập đầy đủ thông tin!'); </script>";
        }
        else{
            for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
                $id_sanpham=$_POST['thanhtoan_product_id'][$i];
                $soluong=$_POST['thanhtoan_soluong'][$i];
                $sql_donhang=mysqli_query($con,"INSERT INTO tbl_donhang(id_sanpham,soluongban,gia,mahang,id_khachhang,hoten,sdt,email,diachi,pttt) values ('$id_sanpham','$soluong','$gia','$mahang','$idkh','$hoten','$sdt','$email','$diachi','$pttt')");
                $sql_sanpham=mysqli_query($con,"UPDATE tbl_sanpham SET soluongban=('$soluong'+ soluongban )WHERE id_sanpham='$id_sanpham'");
                $sql_delete_thanhtoan=mysqli_query($con,"DELETE FROM tbl_giohang WHERE id_sanpham='$id_sanpham' AND id_khachhang='$id_kh'");
                echo "  <script> alert('Bạn đã đặt hàng thành công! Chúng tôi sẽ giao hàng đến bạn trong thời gian sớm nhất'); </script>";
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
?>
<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Thanh Toán</h2>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Page Header End -->
<?php
	if(isset($_SESSION['dangnhap'])){		
        $sql_khachhang=mysqli_query($con,"SELECT * FROM tbl_member WHERE id='$id_kh'");
        $sql_thanhtoan=mysqli_query($con,"SELECT * FROM tbl_giohang WHERE id_khachhang='$id_kh' ORDER BY id_giohang");
?>
       <!--  Pay Start -->
    <div class="booking " style="background-color: #ffff;">
        <div class="container">
            <div class="row ">
                <div class="col-lg-5">
                    <div class="section-header">
                        <br>
                        <br>
                        <h3>Thông tin giao hàng</h3>  
                    </div>
                    <?php
                        while($row_khachhang=mysqli_fetch_array($sql_khachhang)){
                    ?>
                    <div class="booking-form">    
                        <form action="" method="POST">
                            <div class="control-group">
                            <?php
                                while($row_thanhtoan=mysqli_fetch_array($sql_thanhtoan)){
                            ?>
                                <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['id_sanpham']?>">
                                <input type="hidden" name="ten_sanpham" value="<?php echo $row_thanhtoan['ten_sanpham']?>">
                                <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong']?>">
                                <input type="hidden" name="gia" value="<?php echo $row_thanhtoan['gia_sanpham']?>">
                            <?php
                                }
                            ?> 
                                <div class="input-group">
                                    <input type="hidden" name="idkh" value="<?php echo $row_khachhang['id']?>">
                                    <input type="text" name="hoten" class="form-control" placeholder="Họ tên" required="required" value="<?php echo $row_khachhang['hoten']?>" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" required="required" value="<?php echo $row_khachhang['sdt']?>" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" value="<?php echo $row_khachhang['email']?>" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ" required="required" value="<?php echo $row_khachhang['diachi']?>" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-map-marker-alt"></i></div>
                                    </div>
                                </div>
                            </div>   
                            <div class="control-group" >
                                <div class="input-group">
                                    <select class="custom-select form-control" style="color: #ffff;" name="pttt">
                                        <option value="" selected>Phương thức thanh toán</option>
                                        <option value="1" style="color: #719a0a;" >Thẻ ngân hàng</option>
                                        <option value="2" style="color: #719a0a;">Trực tiếp khi nhận hàng</option>
                                        <option value="3" style="color: #719a0a;">ZaloPay</option>    
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn custom-btn" type="submit" name="thanhtoan">Đặt hàng</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                </div>
<?php
    }
?>
                <div class="col-lg-1"></div>
                <?php
                    $sql_laygiohang=mysqli_query($con,"SELECT * FROM tbl_giohang WHERE id_khachhang=$id_kh ORDER BY id_giohang");
                ?>
                <div class="col-lg-6">
                    <div class="section-header">
                        <br>
                        <br>
                        <h3>Thông tin sản phẩm</h3>  
                    </div>
                        <div class="container" >
                            <form action="" method="POST">
                                <div class="table-responsive" >
                                    <table class="table table-borderless">
                                        <thead class="bg-warning" style="text-align: center; ">
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white " style="text-align: center; ">    
                                        <?php
                                            $sum=0;
                                            while($row_laygiohang=mysqli_fetch_array($sql_laygiohang)){
                                                $sum+=($row_laygiohang['gia_sanpham']*$row_laygiohang['soluong']);
                                        ?>             
                                                    <tr>
                                                        <input type="hidden" name="id_sanpham" value="<?php echo $row_laygiohang['id_sanpham']?>">
                                                        <td><?php echo $row_laygiohang['ten_sanpham']?></td>
                                                        <td><?php echo $row_laygiohang['soluong']?></td>
                                                        <td><?php echo number_format($row_laygiohang['gia_sanpham'])?></td>
                                                        <td><?php echo number_format($row_laygiohang['gia_sanpham']*$row_laygiohang['soluong'])?></td>
                                                       
                                                    </tr>
                                        <?php
                                            }
                                        ?>
                                            <tr>
                                                <td colspan="3" class="text-right">Tổng cộng:</td>
                                                <td colspan="1"><?php echo number_format($sum)?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
                
            </div>
        </div>
    </div> 
        <!-- Pay End -->