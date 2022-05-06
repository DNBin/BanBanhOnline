<?php
	if(isset($_POST['btn_them'])){  
			$Tensp=$_POST['txt_TenSP'];
			$DienGiai=$_POST['txt_diengiai'];
			$DonGia = $_POST['txt_DonGia'];
			$anh=$_FILES['txt_HinhDaiDien']['name'];
			if($anh!=''){
				$dich = $anh;
				move_uploaded_file($_FILES['txt_HinhDaiDien']['name'],$dich);
				$dich=substr($dich,0);
			}
			$IDChungLoai = $_POST['txt_IDChungLoai'];
			$TrangThai = $_POST['txt_trangthai'];
			$SoLuong = $_POST['txt_SoLuong'];
            if($Tensp==''||$DienGiai==''||$DonGia==''||$anh==''||$IDChungLoai==''||$TrangThai==''){
                echo "  <script> alert('Vui lòng nhập đầy đủ thông tin!'); </script>";
            }else{
                $sql="INSERT INTO tbl_sanpham(ten_sanpham,chitiet_sanpham,gia_sanpham,hinhanh,id_danhmuc,hienthi,soluong) 
                VALUES('$Tensp','$DienGiai','$DonGia','$dich','$IDChungLoai','$TrangThai','$SoLuong')";
                $row = mysqli_query($con,$sql);
                echo '<script>alert("Đã thêm sản phẩm mới thành công!")</script>';  
                echo '<script>window.location="?quanly=themsp"</script>';
            }
		}
    
    //code xóa sản phẩm
    
	if(isset($_GET["action"]))  
    {  
     if($_GET["action"] == "delete")  
     {
         $id_item = $_GET["id"];
         $sql = "DELETE FROM tbl_sanpham where id_sanpham=".$id_item."";
         $ketqua = mysqli_query($con,$sql);
         if($ketqua > 0){  
                 echo '<script>window.location="?quanly=dssp"</script>';
         }
     }  
    }
   
   //code sửa sản phẩm

   if(isset($_POST['btn_SuaSP']))
   {
           $tem_id = $_POST["txt_id"];
           $Tensp_sua=$_POST['txt_TenSP'];
           $DienGiai_sua=$_POST['txt_diengiai'];
           $SoLuong_sua = $_POST['txt_SoLuong'];
           $DonGia_sua = $_POST['txt_DonGia'];
           $anh=$_FILES['txt_HinhAnh']['name'];
           if($anh!=''){
               $dich = $anh;
               move_uploaded_file($_FILES['txt_HinhAnh']['name'],$dich);
               $dich=substr($dich,0);
           }
           $IDChungLoai_sua = $_POST['txt_IDChungLoai'];
           $TrangThai_sua = $_POST['txt_trangthai'];
           if(!isset($dich)){
                 $sql_suasp = "UPDATE tbl_sanpham SET  ten_sanpham = '$Tensp_sua', chitiet_sanpham = '$DienGiai_sua',  gia_sanpham = $DonGia_sua, id_danhmuc = $IDChungLoai_sua, hienthi = $TrangThai_sua , soluong = $SoLuong_sua where id_sanpham=".$tem_id."";
           }else{
                $sql_suasp = "UPDATE tbl_sanpham SET  ten_sanpham = '$Tensp_sua', chitiet_sanpham = '$DienGiai_sua',  gia_sanpham = $DonGia_sua, hinhanh = '$dich', id_danhmuc = $IDChungLoai_sua, hienthi = $TrangThai_sua , soluong = $SoLuong_sua where id_sanpham=".$tem_id."";
           }
            $row = mysqli_query($con,$sql_suasp);
            if($row>0){
                echo "
                <script language='javascript'>
                        alert('Cập nhật thành công');
                        window.open('?quanly=dssp','_self',3);
                </script>";
                
            } else
            {
                echo "
                <script language='javascript'>
                        alert('Vui lòng nhập đầy đủ thông tin!');
                </script>";
            }
   }
