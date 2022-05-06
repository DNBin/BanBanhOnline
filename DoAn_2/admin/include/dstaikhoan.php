<?php
    if(isset($_GET['idpass'])){
        $id = $_GET['idpass'];
        $sql=(mysqli_query($con,"UPDATE tbl_member SET pass = md5(123) WHERE id='$id'"));
        echo '<script>window.location="?quanly=taikhoan"</script>';
    }else{
        $id='';
    }
?>
<div class="alert mt-3 text-center" role="alert">
    <h3>DANH SÁCH TÀI KHOẢN NGƯỜI DÙNG</h3>
</div>
    <table id="example" class="table table-striped table-borderless table-responsive table-responsive-md" cellspacing="0">
        <thead>
            <tr class="bg-warning">
                    <th class="align-middle">STT</th>
                    <th style="width: 250px;" class="align-middle">Tên đăng nhập</th>
                    <th style="width: 250px;" class="align-middle">Họ Tên</th>
                    <th style="width: 250px;" class="align-middle">Địa chỉ</th>
                    <th style="width: 250px;" class="align-middle">Số điện thoại</th>
                    <th style="width: 250px;" class="align-middle">Email</th>
                    <th style="width: 250px;" class="align-middle">Set Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_table_member = "SELECT * FROM tbl_member order by id ASC";
            $kq = mysqli_query($con, $sql_table_member);
            $i=1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr class="table-light">
                    <td class="align-middle text-center"><?php echo $i; ?></td>
                    <td class="align-middle"><?php echo $row['user']; ?></td>
                    <td class="align-middle"><?php echo $row['hoten']; ?></td>
                    <td class="align-middle"><?php echo $row['diachi']; ?></td>
                    <td class="align-middle"><?php echo $row['sdt']; ?></td>
                    <td class="align-middle"><?php echo $row['email']; ?></td>
                    <td class="text-center "><a href="?quanly=taikhoan&idpass=<?php echo $row['id']; ?>"><i class="fas fa-key text-warning"></a></td>
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
