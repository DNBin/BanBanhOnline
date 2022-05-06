
<?php
    $id = $_GET['id'];
    $sql_1 = "SELECT * from tbl_sanpham where id_sanpham = '$id'";
    $row_1 = mysqli_query($con, $sql_1);
    $count = mysqli_num_rows($row_1);
    if ($count > 0) {
        $nhapsp = mysqli_fetch_array($row_1);
    }
?>
        <div class="col-12 ">
            <div class="alert mt-3 text-center" role="alert">
                <h3>SỬA SẢN PHẨM</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="txt_id" value="<?php echo $nhapsp['id_sanpham']; ?>" />
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input type="text" class="form-control border-0"  name="txt_TenSP" value="<?php echo $nhapsp['ten_sanpham']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm:</label>
                            <input type="number" min="0" size="10" class="form-control border-0" name="txt_DonGia" value="<?php echo $nhapsp['gia_sanpham']; ?>">
                        </div>  
                        <div class="form-group">
                            <label>Chi tiết sản phẩm:</label>
                            <textarea id="editor1" class="border-0" name="txt_diengiai" cols="42" rows="5"><?php echo $nhapsp['chitiet_sanpham']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-4">
                        
                        <div class="form-group">
                            <label>Số lượng:</label>
                            <input type="number" class="form-control border-0" name="txt_SoLuong" value="<?php echo $nhapsp['soluong']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Ảnh minh họa:</label><br>
                            <img src="./public/images/anh/<?php echo $nhapsp['hinhanh']; ?>" alt="" width="50px" height="50px"><br>
                            <input type="file" class="form-control-file border-0" name="txt_HinhAnh" value="<?php echo $nhapsp['hinhanh']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm:</label>
                            <?php
                            $sql = "SELECT distinct * from tbl_danhmuc";
                            $loaisp = mysqli_query($con, $sql);
                            ?>
                            <select name="txt_IDChungLoai" class="form-control border-0">
                                <option value="<?php echo $nhapsp['id_danhmuc']; ?>">Chọn danh mục sản phẩm
                            </option>
                                <?php
                                while ($row = mysqli_fetch_array($loaisp)) {
                                    echo "<option value=" . $row['id_danhmuc'] . ">" . $row['ten_danhmuc'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="txt_trangthai" class="form-control border-0">
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="text-right mr-5">
                    <button type="submit" class="btn btn-outline-info mr-5" name="btn_SuaSP">Sửa sản phẩm</button>
                </div>
                <?php require('xulynhapsp.php'); ?>
            </form>
        </div>
<script>
    CKEDITOR.replace('editor1');
</script>