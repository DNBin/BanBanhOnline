<?php
    require("./connect.php");
?>
            
                <h3 class="page-heading mb-4">Dashboard</h3>
                <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <h3 class="text-warning">
                              <i class="fab fa-product-hunt"></i>
                            </h3>
                          </div>
                          <div class="float-right">
                            <h4 class="bold-text">
                            <?php
                                $sql_sumsp = "select  sum(soluong) from tbl_sanpham";
                                $kq = mysqli_query($con, $sql_sumsp);
                                $row = mysqli_fetch_assoc($kq);
                                echo $row['sum(soluong)'];
                                ?>
                            </h4>
                          </div>
                        </div>
                        <p class="text-muted text-center pt-3">Tổng sản phẩm</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <h3 class="text-danger">
                              <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                            </h3>
                          </div>
                          <div class="float-right">
 
                            <h4 class="bold-text">
                            <?php
                                $sql_sumsp = "select  sum(soluongban) from tbl_donhang";
                                $kq = mysqli_query($con, $sql_sumsp);
                                $row = mysqli_fetch_assoc($kq);
                                echo $row['sum(soluongban)'];
                              ?>
                            </h4>
                          </div>
                        </div>
                        <p class="text-muted text-center pt-3">Sản phẩm đã bán</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-2">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <h3 class="text-success">
                              <i class="fas fa-tags"></i>
                            </h3>
                          </div>
                          <div class="float-right">

                            <h4 class="bold-text">
                            <?php
                                $sql_sumsp = "select  (sum(soluong) - sum(soluongban)) from tbl_sanpham";
                                $kq = mysqli_query($con, $sql_sumsp);
                                $row = mysqli_fetch_assoc($kq);
                                echo $row['(sum(soluong) - sum(soluongban))'];
                              ?>
                            </h4>
                          </div>
                        </div>
                        <p class="text-muted pt-3 text-center">Sản phẩm tồn kho</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <h3 class="text-primary">
                              <i class="fas fa-comments-dollar"></i>
                            </h3>
                          </div>
                          <div class="float-right">
                            <h4 class="bold-text">
                            <?php
                                $sql_sumsp = "select  sum(soluongban * gia) from tbl_donhang";
                                $kq = mysqli_query($con, $sql_sumsp);
                                $row = mysqli_fetch_assoc($kq);
                                echo number_format($row['sum(soluongban * gia)'], 0).' đ';
                              ?>
                            </h4>
                          </div>
                        </div>
                        <p class="text-muted text-center pt-3">Tổng doanh thu </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Đơn hàng</h5>
                        <div class="row">
                          <div class="col-12">
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn hàng đã nhận</p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "select  sum(soluongban) from tbl_donhang";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                             " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn đặt hàng chưa xác nhận</p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "SELECT  sum(soluongban) from tbl_donhang where tinhtrang=0";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                                " aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn đặt hàng đã xác nhận </p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "SELECT  sum(soluongban) from tbl_donhang where tinhtrang=1";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                                " aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn đặt hàng đang được giao</p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "SELECT  sum(soluongban) from tbl_donhang where tinhtrang=2";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                                " aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn đặt hàng đã giao</p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "SELECT  sum(soluongban) from tbl_donhang where tinhtrang=3";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                                " aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn hàng đã hoàn thành</p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "SELECT  sum(soluongban) from tbl_donhang where tinhtrang=4";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                                " aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            
                            <div class="mb-4">
                              <p class="card-text text-muted mb-2">Đơn đặt hàng đã bị hủy </p>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 
                                <?php
                                    $sql_sumsp = "SELECT  sum(soluongban) from tbl_donhang where tinhtrang=5";
                                    $kq = mysqli_query($con, $sql_sumsp);
                                    $row = mysqli_fetch_assoc($kq);
                                    echo $row['sum(soluongban)'];
                                ?>%
                                " aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            
                            
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
                

