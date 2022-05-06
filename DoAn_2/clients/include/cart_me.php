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
                        <h2>Đơn hàng của tôi</h2>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Page Header End -->
<?php
    if(isset($_SESSION['dangnhap'])){
		$id_kh=$_SESSION['id_khachhang'];
?>
        <!-- Cart Start -->
        <div class="text-center m-1 mt-5">
        <strong><h1>DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h1></strong> 
    </div>

<div class="container bg-white">
    <div class="row">
        <table class="table table-striped table-borderless table-hover" cellspacing="0">
            <thead>
                <tr class="bg-warning">
                    <th>STT</th>
                    <th>Mã hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                    <th class="text-center">Hủy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from tbl_donhang where id_khachhang='$id_kh' group by mahang order by ngaydat desc";
                $query = mysqli_query($con, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td class='p-3'><?php echo $i; ?></td>
                        <td class='p-3'><?php echo $row['mahang']; ?></td>
                        <td class='p-3'><?php echo $row['hoten']; ?></td>
                        <td class='p-3'><?php echo $row['ngaydat']; ?></td>
                        <td class='p-3'>
                            <?php
                            if ($row['tinhtrang'] == 0) {
                                echo "Chưa xác nhận";
                            }
                            if ($row['tinhtrang'] == 1) {
                                echo "Đã xác nhận";
                            }
                            if ($row['tinhtrang'] == 2) {
                                echo "Đang giao hàng";
                            }
                            if ($row['tinhtrang'] == 3) {
                                echo "Đã gửi";
                            }
                            if ($row['tinhtrang'] == 4) {
                                echo "Hoàn tất";
                            }
                            if ($row['tinhtrang'] == 5) {
                                echo "Đã hủy";
                            } ?>
                        </td>
                        <td class='p-3'><a href="?quanly=chitietdh&mahd=<?php echo $row['mahang']; ?>">Chi tiết</a></td>
                        <?php
                        if ($row['tinhtrang'] < 2) { ?>
                            <td style="vertical-align: middle; text-align: center;">
                                <a onclick="return confirm('Bạn có chắc là muốn hủy đơn hàng này không?');" href="?quanly=huy&mahd=<?php echo $row['mahang']; ?>">
                                    <button class="btn btn-danger">Hủy</button>
                                </a>
                            </td>

                        <?php } else {?>
                            <td style="vertical-align: middle; text-align: center;">
                                <a onclick="return alert('Bạn không thể hủy đơn hàng này. Do đơn hàng đang trong quá trình vận chuyển hoặc bạn đã nhận nó rồi!');">
                                    <button class="btn btn-danger">Hủy</button>
                                </a>
                            </td>
                        <?php } ?>
                    <tr>
                    <?php
                    $i++;
                }

                    ?>
            </tbody>
        </table>
    </div>
</div>
        <?php
            }
        ?>  

