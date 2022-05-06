<div class="col-12">
    <div class="alert text-center" role="alert">
    <h3>DANH SÁCH SẢN PHẨM</h3>
    </div>
    <div>
        <a href="?quanly=themsp">
            <button class="btn btn-outline-primary mb-2"><i class='fas fa-arrows-alt mr-1'></i>Thêm mới</button>
        </a>
    </div>
<div class="table-responsive">
    <table id="example" class="table table-borderless" cellspacing="0">
        <thead>
            <tr class="bg-warning text-center">
                <th style="width: 50px;">STT</th>
                <th style="width: 250px;">Tên sản phẩm</th>
                <th style="width: 250px;">Đơn giá</th>
                <th style="width: 250px;">Hình ảnh</th>
                <th style="width: 250px;">Sửa</th>
                <th style="width: 250px;">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $sql_table_hsx = "SELECT * FROM tbl_sanpham order by id_sanpham DESC";
        $kq = mysqli_query($con, $sql_table_hsx);
        $i = 1;
        while ($row = mysqli_fetch_assoc($kq)) {
            ?>
            <tr class="table-light">
                <td class="text-center"><?php echo $i; ?></td>
                <td><?php echo $row['ten_sanpham']; ?></td>
                <td class="text-center"><?php echo number_format($row['gia_sanpham']); ?></td>
                <td class='p-2 text-center'><img src="./public/images/anh/<?php echo $row['hinhanh']; ?>" style="width:50px;"></td>
                <td style="vertical-align: middle; text-align: center;">
                    <a href="?quanly=suasp&id=<?php echo $row['id_sanpham']; ?>">
                        <button class="btn btn-outline-success">Sửa</button>
                    </a>
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?');" href="?quanly=themsp&action=delete&id=<?php echo $row['id_sanpham']; ?>">
                        <button class="btn btn-outline-danger">Xóa</button>
                    </a>
                </td>
                <?php
                    require("xulynhapsp.php");
                ?>            
            </tr>
        <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    </div>   
    </div> 
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
