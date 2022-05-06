
<div class="alert mt-3 text-center" role="alert">
    <h3>DANH SÁCH ĐƠN HÀNG</h3>
</div>
    <table id="example" class="table table-borderless" cellspacing="0">
        <thead class="bg-warning">
            <tr >
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Xác nhận</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $sql="SELECT * from tbl_donhang group by mahang order by id_donhang desc";  
                $query = mysqli_query($con,$sql);
                $i=1;
                    while ($row = mysqli_fetch_assoc($query)){?>
                    <tr class="table-light">
                        <td class='p-3'><?php echo $i;?></td>
                        <td class='p-3'><?php echo $row ['mahang'];?></td>
                        <td class='p-3'><?php echo $row ['hoten'];?></td>
                        <td class='p-3'><?php echo $row ['ngaydat'];?></td>
                        <td class='p-3'>
                            <?php 
                                if($row ['tinhtrang'] == 0){
                                    echo "Chưa xác nhận";
                                }if($row ['tinhtrang'] == 1){
                                    echo "Đã xác nhận";
                                }if($row ['tinhtrang'] == 2){
                                    echo "Đang giao hàng";
                                }if($row ['tinhtrang'] == 3){
                                    echo "Đã gửi";
                                }if($row ['tinhtrang'] == 4){
                                    echo "Hoàn tất";
                                }if($row ['tinhtrang'] == 5){
                                    echo "Đã hủy";
                                }

                            ?>
                        </td>
                        <td class='p-3'><a href="?quanly=xacnhan&mahd=<?php echo $row['mahang'];?>">Xong</a></td>
                        <td class='p-3'><a href="?quanly=chitietdh&mahd=<?php echo $row['mahang'];?>">Chi tiết</a></td>
                        <tr>
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

