<?php
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];

    }else{
        $id='';
    }
    $sql_chitiet=mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE id_sanpham=$id");
	
?>

<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Chi Tiết Sản Phẩm</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Menu</a>
                        <a href="">Chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <?php
            while($row_chitiet=mysqli_fetch_array($sql_chitiet)){
        ?>       
        <!-- Food Start -->
        <section class="team " >
            <div class="container pb-5" >
                <div class="row">
                    <div class="col-lg-5 mt-5">
                        <div class=" mb-3">
                            <img src="./public/images/anh/<?php echo $row_chitiet['hinhanh']?>" alt="Card image cap" id="product-detail" height="100%" width="100%">
                        </div>
                       
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7 mt-5">
                            <div class="card-body">
                                <br>
                                <br>
                                <h1 class="h2"><?php echo $row_chitiet['ten_sanpham']?></h1>
                                <p class="h5 py-2" style="color: #fbaf32;">Giá: <?php echo number_format($row_chitiet['gia_sanpham'])?> Đồng</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Nhãn hiệu:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong><?php echo $row_chitiet['nhanhieu']?></strong></p>
                                    </li>
                                </ul>
        
                                <h6>Mô tả:</h6>
                                <p><?php echo $row_chitiet['chitiet_sanpham']?> </p>
                                <form action="?quanly=cart" method="POST">  
                                    <div class="row pb-3">     
                                        <div class="col d-grid">
                                            <input type="hidden" name="ten_sanpham" value="<?php echo $row_chitiet['ten_sanpham']?>">
                                            <input type="hidden" name="id_sanpham" value="<?php echo $row_chitiet['id_sanpham']?>">
                                            <input type="hidden" name="gia_sanpham" value="<?php echo $row_chitiet['gia_sanpham']?>">
                                            <input type="hidden" name="soluong" value="1">
                                            <input type="hidden" name="id_khachhang" value="<?php echo $id_kh?>">
                                            <button type="submit" class="btn custom-btn" name="themgiohang">Thêm sản phẩm</button>  
                                        </div>
                                    </div>
                                </form>
        
                            </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Food End -->
        
        
        <!-- Menu Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">     
                    <h2 style="border-bottom: 5px solid #ea8025; width: 40%; margin-left: 30%;">Có thể bạn thích</h2>
                </div>
                <div class="row">
                <?php
                    $sql_sphot = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE hot='1' ORDER BY id_sanpham ASC LIMIT 4");
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
        <!-- Menu End -->
        <?php
            }
        ?>