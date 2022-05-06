<div class="alert mt-3 text-center" role="alert">
    <h3>DANH SÁCH LOẠI</h3>
</div>
<div>
    <a href="?quanly=themloaisp">
        <button class="btn btn-outline-primary mr-4 mb-2"><i class='fas fa-arrows-alt mr-1'></i>Thêm mới</button>
    </a>
</div>
<br>
<div class="table-responsive">
    <table class="table table-borderless" cellspacing="0">
        <thead>
            <tr class="bg-warning text-center">
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_table_hsx = "SELECT * FROM tbl_danhmuc order by id_danhmuc ASC";
            $kq = mysqli_query($con, $sql_table_hsx);
            $i = 1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr class="table-light text-center">
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['ten_danhmuc']; ?></td>
                    <td><?php if ($row['hienthi'] == 1) {
                                echo "Hiển thị";
                            } else {
                                echo "Không hiển thị";
                            }; ?></td>
                    <td style="vertical-align: middle; text-align: center;">
                        <a href="?quanly=sualoaispx&id=<?php echo $row['id_danhmuc']; ?>">
                            <button class="btn btn-outline-success">Sửa</button>
                        </a>
                    </td>
                    <td style="vertical-align: middle; text-align: center;">
                        <a onclick="return confirm('Bạn có chắc là muốn xóa hãng sản xuất này không?');" href="?quanly=dmloai&action=deleteloaisp&id=<?php echo $row['id_danhmuc'];?>">
                            <button class="btn btn-outline-danger">Xóa</button>
                        </a>
                    </td>
                    <?php require('xulynhaploaisp.php'); ?>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>