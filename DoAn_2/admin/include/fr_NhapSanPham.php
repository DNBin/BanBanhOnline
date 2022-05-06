<div class="col-12">
    <form action="" method="POST" enctype="multipart/form-data">
      <h3 class="text-center">CHỨC NĂNG THÊM SẢN PHẨM</h3><br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-4">
          <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" class="form-control border-0" name="txt_TenSP">
          </div>
          <div class="form-group">
            <label>Giá sản phẩm:</label>
            <input type="number" size="20" min="0" class="form-control border-0" name="txt_DonGia">
          </div>
          <div class="form-group ">
            <label>Chi tiết sản phẩm:</label><br>
            <textarea id="editor1" class="border-0" name="txt_diengiai" cols="42" rows="5"></textarea>
          </div>
          
    </div>
    <div class="col-2"></div>
    <div class="col-4">
          <div class="form-group">
            <label>Số lượng:</label>
            <input type="number" size="20" min="1" class="form-control border-0" name="txt_SoLuong">
          </div>
          <div class="form-group">
            <label>Ảnh minh họa:</label>
            <input type="file" class="form-control-file border border-0" name="txt_HinhDaiDien">
          </div>
          <div class="form-group">
            <label>Danh mục sản phẩm:</label>
            <?php
            $sql = "SELECT distinct * from tbl_danhmuc";
            $loaisp = mysqli_query($con, $sql);
            ?>
            <select name="txt_IDChungLoai" class="form-control border-0">
              <option>Chọn danh mục sản phẩm</option>
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
        <button type="submit" class="btn btn-outline-primary mr-5" name="btn_them">Thêm sản phẩm</button>
      </div>
      <?php
        require('xulynhapsp.php'); 
      ?>
    </form>
  </div>

<script>
        CKEDITOR.replace('editor1');
    </script>