<?php 
	$mahd = $_GET['mahd'];
	$sql_1 = "SELECT * from tbl_donhang  where mahang = '$mahd'";
	$row_1 = mysqli_query($con,$sql_1);
	$count = mysqli_num_rows($row_1);
	if($count>0){
		$chitiet = mysqli_fetch_array($row_1);
	}
?>
<div class="row">
    <div class="col-md-6 col-12 p-5">
        <form action="index_admin.php?nc=chitiet" method="POST" enctype="multipart/form-data">
            <h3 class="text-center">THÔNG TIN HÓA ĐƠN</h3><br>
            <p><b>Mã hóa đơn: </b><?php echo "$mahd"; ?></p>
            <p><b>Tên khách hàng: </b><?php echo $chitiet['hoten']; ?></p>
            <p><b>Số điện thoại: </b><?php echo $chitiet['sdt']; ?></p>
            <p><b>Email: </b><?php echo $chitiet['email']; ?></p>
            <p><b>Địa chỉ: </b><?php echo $chitiet['diachi']; ?></p>
            <p><b>Ngày đặt hàng: </b><?php echo $chitiet['ngaydat']; ?></p>
        </form>
    </div>
    <div class="col-md-6 col-12 pt-5">
        <?php require("ds_cthd.php");?>
        <div class="text-right mt-5 mr-5">
            <a href="./include/viewhoadon.php?quanly=inhoadon&mahd=<?php echo $mahd;?>"><button type="submit" class="btn btn-outline-primary">Xuất hóa đơn</button></a>
</div> 
    </div>
</div>

                    
