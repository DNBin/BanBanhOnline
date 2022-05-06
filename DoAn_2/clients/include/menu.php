<?php
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
?>

<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Menu Bánh Ngọt</h2>
            </div>
            <div class="col-12">
                <a href="">Trang chủ</a>
                <a href="">Menu</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
        <?php
            $result = mysqli_query($con, 'SELECT count(id_sanpham) AS total FROM tbl_sanpham WHERE hienthi=1');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 8;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $result = mysqli_query($con, "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $start, $limit");
            
        ?>
      
        <!-- Food Start -->
        <div class="food mt-0">
            <div class="container">
                <div class="row align-items-center">
                <?php
                    $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_danhmuc LIMIT 3");
                    while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                        if($row_danhmuc['hienthi']==1){
                ?>
                    <div class="col-md-4">
                        <div class="food-item">
                            <i class=""><img src="./public/images/homepage/<?php echo $row_danhmuc['anh_danhmuc'] ?>" alt="" width="60px" height="50px"></i>
                            <h2><?php echo $row_danhmuc['ten_danhmuc'] ?></h2>
                            <p><?php echo $row_danhmuc['chitiet_danhmuc'] ?></p>
                            <a href="">Xem Menu</a>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>
                    
                </div>
            </div>
        </div>
        <!-- Food End -->
       
        <div class="menu">
            <div class="container">
                <div class="section-header text-center">
                    <p> Menu </p>
                </div>
                <div class="menu-tab">
                    <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#banhkem">Bánh Kem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#burgers">Burger</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#donut">Donut</a>
                        </li>
                    </ul>
                    <div class=" team tab-content " style="width: 100%;">
                        <div id="banhkem" class="container tab-pane active section-header text-center">
                            <div class="row">
                                <?php
                                    $sql_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE id_danhmuc=1 AND hienthi=1 LIMIT 4");
                                    while($row_sanpham=mysqli_fetch_array($sql_sanpham)){
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="team-item">
                                        <div class="team-img">
                                            <img src="./public/images/anh/<?php echo $row_sanpham['hinhanh'] ?>" alt="Image" width="120px" height="270px">
                                            <form action="?quanly=cart" method="POST">
                                            <div class="team-social">   
                                                <a class="btn custom-btn" href="?quanly=product&id=<?php echo $row_sanpham['id_sanpham']?>"><i class="far fa-eye"></i></a>
                                                <input type="hidden" name="ten_sanpham" value="<?php echo $row_sanpham['ten_sanpham']?>">
                                                <input type="hidden" name="id_sanpham" value="<?php echo $row_sanpham['id_sanpham']?>">
                                                <input type="hidden" name="gia_sanpham" value="<?php echo $row_sanpham['gia_sanpham']?>">
                                                <input type="hidden" name="soluong" value="1">
                                                <input type="hidden" name="id_khachhang" value="<?php echo $id_kh?>">
                                                <button type="submit" name="themgiohang" style="border:none;background:none;outline:none;"><a class="btn custom-btn"  ><i class="fas fa-cart-plus"></i></a>  </button> 
                                            </div>
                                            </form>
                                        </div>
                                        <div class="team-text">
                                            <h2 style="color: #4a7d4e;"><?php echo $row_sanpham['ten_sanpham'] ?></h2>
                                            <p style="color: #634202;"><span style="color:#fbaf32;"><?php echo number_format($row_sanpham['gia_sanpham'])?> VND</span></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            
                        </div>
                        <div id="burgers" class="container tab-pane fade section-header text-center">
                            <div class="row">
                            <?php
                                    $sql_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE id_danhmuc=2 AND hienthi=1 LIMIT 4");
                                    while($row_sanpham=mysqli_fetch_array($sql_sanpham)){
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="team-item">
                                        <div class="team-img">
                                            <img src="./public/images/anh/<?php echo $row_sanpham['hinhanh'] ?>" alt="Image" width="120px" height="270px">
                                            <form action="?quanly=cart" method="POST">
                                            <div class="team-social">   
                                                <a class="btn custom-btn" href="?quanly=product&id=<?php echo $row_sanpham['id_sanpham']?>"><i class="far fa-eye"></i></a>
                                                <input type="hidden" name="ten_sanpham" value="<?php echo $row_sanpham['ten_sanpham']?>">
                                                <input type="hidden" name="id_sanpham" value="<?php echo $row_sanpham['id_sanpham']?>">
                                                <input type="hidden" name="gia_sanpham" value="<?php echo $row_sanpham['gia_sanpham']?>">
                                                <input type="hidden" name="soluong" value="1">
                                                <input type="hidden" name="id_khachhang" value="<?php echo $id_kh?>">
                                                <button type="submit" name="themgiohang" style="border:none;background:none;outline:none;"><a class="btn custom-btn"  ><i class="fas fa-cart-plus"></i></a>  </button> 
                                            </div>
                                            </form>
                                        </div>
                                        <div class="team-text">
                                            <h2 style="color: #4a7d4e;"><?php echo $row_sanpham['ten_sanpham'] ?></h2>
                                            <p style="color: #634202;"><span style="color:#fbaf32;"><?php echo number_format($row_sanpham['gia_sanpham'])?> VND</span></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div id="donut" class="container tab-pane fade section-header text-center">
                            <div class="row">
                            <?php
                                    $sql_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE id_danhmuc=3 AND hienthi=1 LIMIT 4");
                                    while($row_sanpham=mysqli_fetch_array($sql_sanpham)){
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="team-item">
                                        <div class="team-img">
                                            <img src="./public/images/anh/<?php echo $row_sanpham['hinhanh'] ?>" alt="Image" width="120px" height="270px">
                                            <form action="?quanly=cart" method="POST">
                                            <div class="team-social">   
                                                <a class="btn custom-btn" href="?quanly=product&id=<?php echo $row_sanpham['id_sanpham']?>"><i class="far fa-eye"></i></a>
                                                <input type="hidden" name="ten_sanpham" value="<?php echo $row_sanpham['ten_sanpham']?>">
                                                <input type="hidden" name="id_sanpham" value="<?php echo $row_sanpham['id_sanpham']?>">
                                                <input type="hidden" name="gia_sanpham" value="<?php echo $row_sanpham['gia_sanpham']?>">
                                                <input type="hidden" name="soluong" value="1">
                                                <input type="hidden" name="id_khachhang" value="<?php echo $id_kh?>">
                                                <button type="submit" name="themgiohang" style="border:none;background:none;outline:none;"><a class="btn custom-btn"  ><i class="fas fa-cart-plus"></i></a>  </button> 
                                            </div>
                                            </form>
                                        </div>
                                        <div class="team-text">
                                            <h2 style="color: #4a7d4e;"><?php echo $row_sanpham['ten_sanpham'] ?></h2>
                                            <p style="color: #634202;"><span style="color:#fbaf32;"><?php echo number_format($row_sanpham['gia_sanpham'])?> VND</span></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center"> 
                    <h2 style="border-bottom: 5px solid #ea8025; width: 40%; margin-left: 30%;">Menu sản phẩm </h2>
                </div>
                <div class="row">
                    <?php
                        while($row_sphot=mysqli_fetch_array($result)){
                             
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
                <div class="row">
                            <div class="col-12">
                                <ul class="pagination justify-content-center">
                                <?php
                                    if ($current_page > 1 && $total_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?quanly=menu&page=' . ($current_page - 1) . '"> < </a></li> ';
                                    }
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        if ($i == $current_page) {
                                            echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li> ';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="?quanly=menu&page=' . $i . '">' . $i . '</a> </li>';
                                        }
                                    }
                                    if ($current_page < $total_page && $total_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?quanly=menu&page=' . ($current_page + 1) . '"> > </a></li> ';
                                    }
                                ?>                
                                </ul> 
                            </div>
                        </div>
            </div>
        </div>                 
                        
                        
                        
                    
        <!-- Menu End -->

        