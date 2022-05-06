<?php
        if(isset($_POST['btn_themloaisp'])){
		echo "Đã bấm nút thêm";
		if($_POST['txt_TenLoai']!=""){
			$tenLoai=$_POST['txt_TenLoai'];
			$trangThai = $_POST['txt_TrangThai'];
                        $chitiet_sua=$_POST['txt_diengiai'];
                        $anh=$_FILES['txt_HinhDaiDien']['name'];

			if($anh!=''){
				$dich = $anh;
				move_uploaded_file($_FILES['txt_HinhDaiDien']['name'],$dich);
				$dich=substr($dich,0);
			}
			$sql="INSERT INTO tbl_danhmuc(ten_danhmuc,anh_danhmuc,chitiet_danhmuc,hienthi) VALUES('$tenLoai','$dich','$chitiet_sua','$trangThai')";
			$row = mysqli_query($con,$sql);
			echo '<script>window.location="?quanly=dmloai"</script>';
		}else{
			echo "Bạn phải nhập tên danh mục.";
		}
    }
    
    //code xóa sản phẩm
	if(isset($_GET["action"]))  
    {  
     if($_GET["action"] == "deleteloaisp")  
     {
         $id_item = $_GET["id"];
         $sql = "DELETE from tbl_danhmuc where id_danhmuc=".$id_item."";
         $ketqua = mysqli_query($con,$sql);
         if($ketqua > 0){
                 echo '<script>window.location="?quanly=dmloai"</script>';
         }
     }  
    }
   
   //code sửa HSX
   if(isset($_POST['btn_SuaLoaiSP']))
   {
           $tem_id = $_POST["txt_id"];
           $tenLoai_sua=$_POST['txt_TenLoai'];
           $anh=$_FILES['txt_HinhAnh']['name'];
           if($anh!=''){
               $dich = $anh;
               move_uploaded_file($_FILES['txt_HinhAnh']['name'],$dich);
               $dich=substr($dich,0);
           }
           $chitiet_sua=$_POST['txt_diengiai'];
           $trangthai_sua=$_POST['txt_TrangThai'];
        if(isset($dich)){   
                $sql_suahsx = "UPDATE tbl_danhmuc SET ten_danhmuc = '$tenLoai_sua', anh_danhmuc = '$dich',chitiet_danhmuc = '$chitiet_sua', hienthi = '$trangthai_sua' where id_danhmuc=".$tem_id."";
       }else{
                $sql_suahsx = "UPDATE tbl_danhmuc SET ten_danhmuc = '$tenLoai_sua', chitiet_danhmuc = '$chitiet_sua', hienthi = '$trangthai_sua' where id_danhmuc=".$tem_id."";
       }
       $row = mysqli_query($con,$sql_suahsx);
       if($row>0){
        echo "
        <script language='javascript'>
                alert('Cập nhật thành công');
                window.open('?quanly=dmloai','_self',3);
        </script>";
           
       } else
       {
        echo "
        <script language='javascript'>
                alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
       }
   }
?>