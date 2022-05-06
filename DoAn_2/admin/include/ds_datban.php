<div class="alert mt-3 text-center" role="alert">
    <h3>DANH SÁCH ĐƠN ĐẶT BÀN</h3>
</div>
<div class="table-responsive">
    <table id="example" class="table table-borderless" cellspacing="0">
        <thead >
            <tr class="bg-warning">
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ngày nhận</th>
                <th>Thời gian nhận</th>
                <th>Số người</th>
                <th>Trạng thái</th>
                <th>Xác nhận</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $sql="SELECT * from tbl_datban order by id_datban desc";  
                $query = mysqli_query($con,$sql);
                $i=1;
                    while ($row = mysqli_fetch_assoc($query)){?>
                    <tr class="table-light">
                        <td class='p-3'><?php echo $i;?></td>
                        <td class='p-3'><?php echo $row ['hoten'];?></td>
                        <td class='p-3'><?php echo $row ['email'];?></td>
                        <td class='p-3'><?php echo $row ['sdt'];?></td>
                        <td class='p-3'><?php echo $row ['ngay'];?></td>
                        <td class='p-3'><?php echo $row ['thoigian'];?></td>
                        <td class='p-3 text-center'><?php echo $row ['songuoi'];?></td>
                        <td class='p-3'>
                            <?php 
                                if($row ['trangthai'] == 0){
                                    echo "Chưa xác nhận";
                                }if($row ['trangthai'] == 1){
                                    echo "Đã xác nhận";
                                }
                                if($row ['trangthai'] == 2){
                                    echo "Đã hủy";
                                }
                            ?>
                        </td>
                        <td class='p-3'><a href="?quanly=xulydatban&id=<?php echo $row['id_datban'];?>">Xong
                        </a>
                        </td>
                    <tr>
                    <?php
                    $i++;
                } 
        ?> 
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

