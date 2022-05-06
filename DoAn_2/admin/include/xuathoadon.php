<!DOCTYPE html>
<html>
<head>
    <title>In hóa đơn</title>
    <link rel="stylesheet" type="text/css" href="../public/css/hoadon.css">
</head>

<body onload="window.print();">
<div class="container-fluid">
    <div id="page" class="page">
        <div class="row header">
            <div class="logo col-5">
                <img src="../public/images/logo/LogoBin-1-removebg-preview.png"  class="img-fluid" />
        </div>
        <div class="company text-center col-7">
                <p><b>Bin Cake</b></p>
                <span>Địa chỉ:Cao Lãnh, Đồng Tháp</span><br>
                
                <span>Email:bincake@gmail.com</span><br>
                <span>ĐT: 0866744002</span><br>
            </div>
        </div>
        <hr />
        <div class="text-center">
            <h4>HÓA ĐƠN THANH TOÁN</h4>
            <span class="text-right">Số: <?php $mahd = $_GET['mahd']; echo $mahd ?></span><br />
        </div>
        <div style="float: right;">
            <span>Đồng Tháp,</span>
            <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = getdate();
            echo " Ngày " . $date['mday'] . ",<span>";
            echo " Tháng " . $date['mon'] . ",<span>";
            echo " Năm " . $date['year'] . "<span style='margin-left:5px'>";
            ?>
        </div>
        <br />
        <br />
        <?php
        $mahd = $_GET['mahd'];
        $sql = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.id_sanpham = tbl_sanpham.id_sanpham AND mahang = '$mahd'");
        $result = mysqli_query($con, "SELECT * FROM tbl_donhang where mahang = '$mahd'");
        $array = mysqli_fetch_array($result);
        ?>
        <div class="col-12">
            <p>Họ và tên khách hàng : <b><?php echo $array['hoten']; ?></b></p>
            <p>Điện thoại KH : <b><?php echo $array['sdt']; ?></b></p>
            <p>Email KH : <b><?php echo $array['email']; ?></b></p>
            <p>Địa chỉ KH : <b><?php echo $array['diachi']; ?></b></p>
            <p>Ngày đặt hàng : <b><?php echo $array['ngaydat']; ?></b></p>
        </div>
        <div class="col-12">
            <table class="mb-3 table table-bordered table-hover">
                <tr class="bg-info">
                    <th class="p-2 text-center">STT</th>
                    <th class="p-2 text-center">Tên sản phẩm</th>
                    <th class="p-2 text-center">Số lượng</th>
                    <th class="p-2 text-center">Giá</th>
                    <th class="p-2 text-center">Thành tiền</th>
                    <th class="p-2 text-center">Phương thức thanh toán</th>
                </tr>
                <?php
                $pos = 1;
                $tongsotien = 0;
                if ($sql) {
                    while ($row = mysqli_fetch_array($sql)) {
                        $tongsotien += $row['soluongban'] * $row['gia'];
                        ?>
                        <tr>
                            <td class="p-2"><?php echo $pos++; ?></td>
                            <td class="p-2"><?php echo $row['ten_sanpham']; ?></td>
                            <td class="p-2 text-center"><?php echo $row['soluongban']; ?></td>
                            <td class="p-2 text-center"><?php echo number_format($row['gia'], 0, ",", "."); ?></td>
                            <td class="p-2 text-center"><?php echo number_format(($row['soluongban'] * $row['gia']), 0, ",", "."); ?></td>
                            <td class="p-2 text-center">
                                <?php if ($row['pttt'] == 1) {
                                        echo "Thẻ ngân hàng";
                                    } else if ($row['pttt'] == 2) {
                                        echo "Trực tiếp khi nhận hàng";
                                    } else if ($row['pttt'] == 3) {
                                        echo "ZaloPay";
                                    } else {
                                        echo "Trực tiếp khi nhận hàng";
                                    }
                                ?>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "";
                } ?>
                <tr>
                    <td colspan="4" class="tong"><b>Tổng cộng</b></td>
                    <td class="p-2 text-center"><b><?php echo number_format(($tongsotien), 0, ",", ".") ?>đ</b></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="footer-left">
            <p class="mb-5">Người mua</p>
            <b><?php echo $array['hoten']; ?></b>
        </div>
        <div class="footer-right">
            <p>Người bán</p>
        </div>
    </div>
    </div>
</body>

</html>