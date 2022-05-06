<?php
    if(isset($_SESSION['dangnhap'])){
        $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
/*     $sql_product = mysqli_query($con, 'SELECT count(id_sanpham) AS total FROM tbl_sanpham WHERE hienthi=1');
    $row = mysqli_fetch_assoc($sql_product);
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
    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $start, $limit"); */
    
    if(isset($_POST['search'])){
        $tukhoa=$_POST['search_product'];       
        $sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE ten_sanpham LIKE '%$tukhoa%' ORDER BY id_sanpham ");
            $title=$tukhoa; 
    }
?>
<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Tìm kiếm</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Menu Start -->
        <div class="team">
            <div class="container">
                <div class="row">
                    <?php
                        while($row_product=mysqli_fetch_array($sql_product)){
                            if($row_product['hienthi']==1){    
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="./public/images/anh/<?php echo $row_product['hinhanh']?>" alt="Image">
                                <form action="?quanly=cart" method="POST">
                                <div class="team-social">       
                                    <a class="btn custom-btn" href="?quanly=product&id=<?php echo $row_product['id_sanpham']?>"><i class="far fa-eye"></i></a>
                                    <input type="hidden" name="ten_sanpham" value="<?php echo $row_product['ten_sanpham']?>">
                                    <input type="hidden" name="id_sanpham" value="<?php echo $row_product['id_sanpham']?>">
                                    <input type="hidden" name="gia_sanpham" value="<?php echo $row_product['gia_sanpham']?>">
                                    <input type="hidden" name="soluong" value="1">
                                    <input type="hidden" name="id_khachhang" value="<?php echo $id_kh?>">
                                    <button type="submit" name="themgiohang" style="border:none;background:none;outline:none;"><a class="btn custom-btn"  ><i class="fas fa-cart-plus"></i></a>  </button>                     
                                </div>
                                </form>
                            </div>
                            <div class="team-text">
                                <h5 style="color: #4a7d4e;"><?php echo $row_product['ten_sanpham']?></h5>
                                <p style="color: #634202;"><span style="color:#fbaf32;"><?php echo number_format($row_product['gia_sanpham'])?> VND</span></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                            }
                        }
                    ?> 
                </div>
               <!--  <div class="row">
                            <div class="col-12">
                                <ul class="pagination justify-content-center">
                                <?php
                                    if ($current_page > 1 && $total_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?quanly=search&page=' . ($current_page - 1) . '"> < </a></li> ';
                                    }
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        if ($i == $current_page) {
                                            echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li> ';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="?quanly=search&page=' . $i . '">' . $i . '</a> </li>';
                                        }
                                    }
                                    if ($current_page < $total_page && $total_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?quanly=search&page=' . ($current_page + 1) . '"> > </a></li> ';
                                    }
                                ?>                
                                </ul> 
                            </div>
                        </div> -->
            </div>
        </div>
       <!-- Meunu End -->