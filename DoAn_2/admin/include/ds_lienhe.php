<div class="alert mt-3 text-center" role="alert">
    <h3>DANH SÁCH LIÊN HỆ</h3>
</div>
    <table id="example" class="table table-striped table-borderless table-responsive table-responsive-md" cellspacing="0">
        <thead>
            <tr class="bg-warning">
                    <th class="align-middle">STT</th>
                    <th style="width: 250px;" class="align-middle">Họ Tên</th>
                    <th style="width: 250px;" class="align-middle">Số điện thoại</th>
                    <th style="width: 250px;" class="align-middle">Email</th>
                    <th style="width: 250px;" class="align-middle">Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_table_member = "SELECT * FROM tbl_lienhe order by id_lienhe ASC";
            $kq = mysqli_query($con, $sql_table_member);
            $i=1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr class="table-light">
                    <td class="align-middle text-center"><?php echo $i; ?></td>
                    <td class="align-middle"><?php echo $row['hoten']; ?></td>
                    <td class="align-middle"><?php echo $row['sdt']; ?></td>
                    <td class="align-middle"><?php echo $row['email']; ?></td>
                    <td class="align-middle"><?php echo $row['ghichu']; ?></td>
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
