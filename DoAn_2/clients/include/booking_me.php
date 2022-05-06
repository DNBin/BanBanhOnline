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
                        <h2>Đơn đặt bàn của tôi</h2>
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
        <strong><h1>DANH SÁCH ĐƠN ĐẶT BÀN</h1></strong> 
    </div>
<div class="container bg-white">
    <div class="row">
        <table class="table table-striped table-borderless table-hover" cellspacing="0">
            <thead>
                <tr class="bg-warning">
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày nhận bàn</th>
                    <th>Thời gian nhận</th>
                    <th>Số người</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Hủy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * from tbl_datban where id_khachhang='$id_kh' order by id_datban desc";
                    $query = mysqli_query($con, $sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query)) { 
                ?>
                    <tr>
                        <td class='p-3'><?php echo $i; ?></td>
                        <td class='p-3'><?php echo $row['hoten']; ?></td>
                        <td class='p-3'><?php echo $row['ngay']; ?></td>
                        <td class='p-3'><?php echo $row['thoigian']; ?></td>
                        <td class='p-3'><?php echo $row['songuoi']; ?></td>
                        <td class='p-3'>
                            <?php
                            if ($row['trangthai'] == 0) {
                                echo "Chưa xác nhận";
                            }
                            if ($row['trangthai'] == 1) {
                                echo "Đã xác nhận";
                            }
                            if ($row['trangthai'] == 2) {
                                echo "Đã hủy";
                            }
                             ?>
                        </td>
                        <?php
                        if ($row['trangthai'] < 1) { ?>
                            <td style="vertical-align: middle; text-align: center;">
                                <a onclick="return confirm('Bạn có chắc là muốn hủy đơn đặt bàn này không?');" href="?quanly=huydb&id=<?php echo $row['id_datban']; ?>">
                                    <button class="btn btn-danger">Hủy</button>
                                </a>
                            </td>

                        <?php } else {?>
                            <td style="vertical-align: middle; text-align: center;">
                                <a onclick="return alert('Bạn không thể hủy đơn đặt bàn này. Do đơn đã được xử lý !');">
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

