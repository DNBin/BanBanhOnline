<?php
    $mahd = $_GET['mahd'];
		$result = mysqli_query($con, "SELECT count(mahang) as total from tbl_donhang where mahang = '$mahd'");
		$row = mysqli_fetch_assoc($result);
		$total_records = $row['total'];
		$current_page = isset($_GET['quanly']) ? $_GET['quanly'] : 1;
		$limit = 15;
		$total_page = ceil($total_records / $limit);
		if ($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1){
			$current_page = 1;
		}
		$start = ($current_page - 1) * $limit;
		$result = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham where tbl_donhang.id_sanpham=tbl_sanpham.id_sanpham AND mahang = '$mahd' LIMIT $start, $limit");
		?>
<div class="mt-3">			
<table class="table-responsive-sm table-bordered">
    <thead class="thead-light">
		<tr>
			<th colspan="6" class="text-center">DANH SÁCH SẢN PHẨM</th>
		</tr>
      <tr>
        <th>STT</th>
        <th>Tên SP</th>
		<th>Số lượng</th>
		<th>Giá</th>
        <th>Phương thức thanh toán</th>
      </tr>
    </thead>
			<?php
				 $sql="SELECT * FROM tbl_donhang where mahang = '$mahd'";  
                $query = mysqli_query($con,$sql);
				$i=1;
				 if(mysqli_num_rows($query)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)){?>
    		<tr>
                <td class='p-2'><?php echo $i;?></td>
                <td class='p-2'><?php echo $row ['ten_sanpham'];?></td>
                <td class='p-2'><?php echo $row ['soluongban'];?></td>
                <td class='p-2'><?php echo $row ['gia'];?></td>
                <td class='p-2'><?php if($row ['pttt'] == 1){
                                            echo "Thẻ ngân hàng";
                                        }
                                        if($row ['pttt'] == 2){
                                            echo "Trực tiếp khi nhận hàng";
                                        }
                                        if($row ['pttt'] == 3){
                                            echo "ZaloPay";
                                        }
                    ?>
                </td>
            </tr>
            <?php
			$i++;
	    }
	}
?>
</table>
</div>
