<meta charset="utf-8" />
<?php
    $id = $_GET['id'];
    $sql_1 = "SELECT * from tbl_danhmuc where id_danhmuc = '$id'";
    $row_1 = mysqli_query($con, $sql_1);
    $count = mysqli_num_rows($row_1);
    if ($count > 0) {
        $nhaphsx = mysqli_fetch_array($row_1);
}
?>
    <div class="col-12">
        <div class=" mt-3 text-center" role="alert">
            <h3>CHỨC NĂNG SỬA LOẠI SẢN PHẨM</h3>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="txt_id" value="<?php echo $nhaphsx['id_danhmuc']; ?>" />
            
            <div class="row">
                <div class="col-1"></div>
                <div class="col-4">
            
                    <div class="form-group">
                        <label>Tên loại:</label>
                        <input type="text" class="form-control border-0" name="txt_TenLoai" value="<?php echo $nhaphsx['ten_danhmuc']; ?>">
                    </div>
                    <div class="form-group">
                            <label>Chi tiết sản phẩm:</label><br>
                            <textarea id="editor1" class="border-0" name="txt_diengiai" cols="42" rows="4"><?php echo $nhaphsx['chitiet_danhmuc']; ?></textarea>
                        </div>
                    
                </div>
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="form-group">
                            <label>Ảnh minh họa:</label>
                            <input type="file" class="form-control-file border-0" name="txt_HinhAnh" value="<?php echo $nhaphsx['anh_danhmuc']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái:</label>
                        <select name="txt_TrangThai" class="form-control border-0">
                            <option value="1">Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                    </div><br><br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary w-50 mb-5" name="btn_SuaLoaiSP">Sửa</button>
                        <?php require('xulynhaploaisp.php'); ?>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>

        </form>
    </div>
