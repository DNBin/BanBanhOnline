<?php
    if(isset($_SESSION['dangnhap'])){
    $id_kh=$_SESSION['id_khachhang'];
    }
    else{
        $id_kh='';
    }
?>

<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Chi tiết đơn hàng</h2>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Page Header End -->
<?php
    if(isset($_SESSION['dangnhap'])){
		$id_kh=$_SESSION['id_khachhang'];
?>
<?php
    $mahd = $_GET['mahd'];
    $sql_1 = "select * from tbl_donhang  where mahang = '$mahd'";
    $row_1 = mysqli_query($con, $sql_1);
    $count = mysqli_num_rows($row_1);
    if ($count > 0) {
        $chitiet = mysqli_fetch_array($row_1);
    } 
?>
<div class="container bg-white p-3">
    <div class="row">
        <div class="col-md-6 col-12 ">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3 class="text-center">THÔNG TIN HÓA ĐƠN</h3><br>
                <p><b>Mã hóa đơn: </b><?php echo "$mahd"; ?></p>
                <p><b>Ngày đặt hàng: </b><?php echo $chitiet['ngaydat']; ?></p>
                <p><b>Tên khách hàng: </b><?php echo $chitiet['hoten']; ?></p>
                <p><b>Số điện thoại: </b><?php echo $chitiet['sdt']; ?></p>
                <p><b>Email: </b><?php echo $chitiet['email']; ?></p>
                <p><b>Địa chỉ: </b><?php echo $chitiet['diachi']; ?></p>
                <p><b>Trạng thái: </b><span class="text-danger">
                    <?php 
                        if($chitiet ['tinhtrang'] == 0){
                            echo "Chưa xác nhận";
                        }if($chitiet ['tinhtrang'] == 1){
                            echo "Đã xác nhận";
                        }if($chitiet ['tinhtrang'] == 2){
                            echo "Đang giao hàng";
                        }if($chitiet ['tinhtrang'] == 3){
                            echo "Đã gửi";
                        }if($chitiet ['tinhtrang'] == 4){
                            echo "Hoàn tất";
                        }if($chitiet ['tinhtrang'] == 5){
                            echo "Đã hủy";
                        }
                    ?>
                    </span>
                </p>
            </form>
        </div>
        <div class="col-md-6 col-12">
        <h3 class="text-center">DANH SÁCH SẢN PHẨM</h3><br>
            <table class="table table-borderless table-hover">
                <thead class="bg-warning">
                    
                    <tr>
                        <th>STT</th>
                        <th style="width:100px">Tên SP</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th >Phương thức thanh toán</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM tbl_donhang,tbl_sanpham where tbl_donhang.id_sanpham= tbl_sanpham.id_sanpham and mahang = '$mahd'";
                $query = mysqli_query($con, $sql);
                $total = 0;
                $tongsp = 0;
                $i = 1;
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr class="bg-light">
                            <td class='p-2'><?php echo $i; ?></td>
                            <td class='p-2'><?php echo $row['ten_sanpham']; ?></td>
                            <td class='p-2'><?php echo $row['soluongban']; ?></td>
                            <td class='p-2'><?php echo number_format($row['gia']); ?></td>
                            <td class='p-2'><?php if ($row['pttt'] == 1) {
                                                echo ("Thẻ ngân hàng");
                                            }
                                            if ($row['pttt'] == 2) {
                                                echo ("Trực tiếp khi nhận hàng");
                                            }
                                            if ($row['pttt'] == 3) {
                                                echo ("ZaloPay");
                                            }
                                            ?>
                            </td>
                        </tr>
                <?php
                        $tongsp = $tongsp + ($row['soluongban'] * $row['gia']);
                        $i++;
                    }
                }
                
                ?>
                <tr class="bg-light">
                        <td colspan="4" class="text-right">Tổng cộng:</td>
                        <td colspan="1"><?php echo number_format($tongsp)." vnđ" ?></td>
                    </tr>
            </table>
        </div>
    </div>
</div>
        <?php
            }
        ?>  

