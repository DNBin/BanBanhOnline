<?php
    if(isset($_POST['themgiohang'])){
        if(isset($_SESSION['dangnhap'])){
            $id_kh=$_SESSION['id_khachhang'];      
			$tensanpham = $_POST['ten_sanpham'];
			$id_sanpham = $_POST['id_sanpham'];
			$gia = $_POST['gia_sanpham'];
			$soluong = $_POST['soluong'];
            $idkh = $_POST['id_khachhang'];
			$sql_select_giohang=mysqli_query($con,"SELECT * FROM tbl_giohang WHERE id_sanpham='$id_sanpham' AND id_khachhang='$id_kh'");
			$count=mysqli_num_rows($sql_select_giohang);
			if($count>0){
				$row_sanpham=mysqli_fetch_array($sql_select_giohang);
				$soluong=$row_sanpham['soluong']+1;
				$sql_giohang="UPDATE tbl_giohang SET soluong='$soluong' WHERE id_sanpham='$id_sanpham'";
			}else{
				$soluong=$soluong;
				$sql_giohang="INSERT INTO tbl_giohang(ten_sanpham,id_sanpham,gia_sanpham,soluong,id_khachhang) values ('$tensanpham','$id_sanpham','$gia','$soluong','$idkh')";
			}
			$insert_row=mysqli_query($con,$sql_giohang);
			if($insert_row==0){
				header('Location:?quanly=product&id'.$id_sanpham);
			}
        }
        else{
            echo '<script>alert("Vui lòng đăng nhập để mua hàng!")</script>'; 
            echo '<script>window.location="index.php"</script>'; 
        }

    }elseif(isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		$sql_xoa=mysqli_query($con,"DELETE FROM tbl_giohang WHERE id_giohang='$id'");
		
		
	}elseif(isset($_POST['capnhatsoluong'])){
        for($i=0;$i<count($_POST['product_id']);$i++){
			$id_sp=$_POST['product_id'][$i];
			$sl=$_POST['soluong'][$i];		
			$sql_update=mysqli_query($con,"UPDATE tbl_giohang SET soluong='$sl' WHERE id_sanpham='$id_sp'");
        }	
	}
?>

<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Giỏ Hàng</h2>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Page Header End -->
<?php
    if(isset($_SESSION['dangnhap'])){
		$id_kh=$_SESSION['id_khachhang'];
        $sql_laygiohang=mysqli_query($con,"SELECT * FROM tbl_giohang WHERE id_khachhang='$id_kh' ORDER BY id_giohang");
?>
        <!-- Cart Start -->
        <div class="team">
            <div class="container" >
                <form action="" method="POST">
                    <div class="table-responsive" >
                        <table class="table table-borderless">
                            <thead class="bg-warning" style="text-align: center; ">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                                $sanpham_id=0;
                                $sum=0;
                                while($row_laygiohang=mysqli_fetch_array($sql_laygiohang)){
                                    $sum+=($row_laygiohang['gia_sanpham']*$row_laygiohang['soluong']);
                                    $sanpham_id=$row_laygiohang['id_sanpham'];
                            ?>
                            <tbody class="bg-light " style="text-align: center; ">
        
                                        <tr>
                                            
                                            <td><?php echo $row_laygiohang['ten_sanpham']?></td>
                                            <td><input type="number" id="sl" min="1" max="100" value="<?php echo $row_laygiohang['soluong']?>" name="soluong[]"></td>
                                            <input  type="hidden" name="product_id[]" value="<?php echo $row_laygiohang['id_sanpham']?>">
                                            <td><?php echo number_format( $row_laygiohang['gia_sanpham'])?></td>
                                            <td><?php echo number_format( $row_laygiohang['gia_sanpham']*$row_laygiohang['soluong'])?></td>
                                            <td ><button type="submit" name="capnhatsoluong" class="btn btn-outline-info">Cập nhật</button></td>
                                            <td ><a href="?quanly=cart&xoa=<?php echo $row_laygiohang['id_giohang']?>"><button type="button" name="xoa" class="btn btn-outline-danger">Xóa</button></a></td>
                                           
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                <tr>
                                    <td colspan="5" class="text-right">Tổng cộng:</td>
                                    <td colspan="1"><?php echo number_format( $sum)?></td>
                                </tr>
                                <tr>
                                    <?php
                                        if($sanpham_id==0){
                                    ?>
                                        <td colspan="6" class="text-right">
                                         <span>Bạn hãy thêm sản phẩm vào giỏ hàng</span>
                                    </td>
                                    <?php
                                        }else{
                                    ?>
                                    <td colspan="6" class="text-right">
                                        <a href="?quanly=pay">
                                            <input type="button" class="btn custom-btn " value="Thanh toán">
                                        </a>
                                    </td>
                                    
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </form>
            </div>
        </div>  
        <?php
            }
        ?>  
        
       <!-- Cart End -->