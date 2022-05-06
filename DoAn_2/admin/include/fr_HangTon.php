
<div class="alert mt-3 text-center" role="alert">
    <h3>DANH SÁCH HÀNG TỒN</h3>
</div>
    <table id="example" class="table table-borderless"  cellspacing="0">
        <thead>
            <tr class="bg-warning text-center">
                    <th>STT</th>
                    <th style="width: 250px;">Tên sản phẩm</th>
                    <th style="width: 250px;">Hình ảnh</th>
                    <th style="width: 250px;">Số lượng nhập</th>
                    <th style="width: 250px;">Số lượng bán</th>
                    <th style="width: 250px;">Số lượng tồn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql_spton = "SELECT * FROM tbl_sanpham";
            $kq = mysqli_query($con, $sql_spton);
            $i=1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr class="table-light">
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['ten_sanpham']; ?></td>
                    <td class='p-2 text-center'><img src="./public/images/anh/<?php echo $row ['hinhanh'];?>" style="width:50px;"></td>
                    <td class="text-center"><?php echo $row['soluong']; ?></td>
                    <td class="text-center"><?php echo $row['soluongban']; ?></td>
                    <td class="text-center"><?php echo $row['soluong'] - $row['soluongban']; ?></td>
                </tr>
            <?php
            $i++;
            }
            ?>
        </tbody>
    </table>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

