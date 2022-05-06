

<div class="col-12">
  <form action="" method="POST" enctype="multipart/form-data">
    <h3 class="text-center">CHỨC NĂNG THÊM LOẠI SẢN PHẨM</h3><br>
    
    <div class="row">
      <div class="col-1"></div>
      <div class="col-4">
          <div class="form-group">
            <label>Tên loại:</label>
            <input type="text" class="form-control border-0" name="txt_TenLoai">
          </div>
          <div class="form-group">
              <label>Chi tiết sản phẩm:</label><br>
              <textarea id="editor1" class="border-0" name="txt_diengiai" cols="42" rows="4"></textarea>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
            <div class="form-group">
              <label>Ảnh minh họa:</label>
              <input type="file" class="form-control-file border-0" name="txt_HinhDaiDien">
            </div>
          <div class="form-group">
            <label>Trạng thái:</label>
            <select name="txt_TrangThai" class="form-control border-0">
              <option value="1">Hiển thị</option>
              <option value="0">Không hiển thị</option>
            </select>
          </div><br><br>
          <div class="text-right ">
              <button type="submit" class="btn btn-outline-primary " name="btn_themloaisp">Thêm Loại</button>
          </div>
      </div>
      <?php require('xulynhaploaisp.php');?>
      
      <div class="col-1"></div>
      </div>
  </form>
</div>
