<?php
  session_start();
  // ini_set("display_errors","0");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Serri Shop | Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/css/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/css/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../vendors/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .form-control{
        margin:0px;border: 1px solid #ced4da;
        padding: 6px;
        border-radius: 10px;
      }
    </style>
  </head>

  <body class="nav-md" >
<?php 
  include("../connect.php");
?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><span>SERRI SHOP</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../img/userdash.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!-- <li><a href="index.php"><i class="fa fa-server" aria-hidden="true"></i>Hoạt động</a></li> -->
                  <li><a ><i class="fa fa-edit"></i>Đơn hàng<span class="fa fa-chevron-down" aria-hidden="true"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Chưa xác nhận</a></li>
                      <li><a href="#">Đã xác nhận</a></li>
                      <li><a href="#">Đã gửi</a></li>
                      <li><a href="#">Hoàn thành</a></li>
                      <li><a href="#">Đã hủy</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>Thống kê<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Hôm nay</a></li>
                      <li><a href="#">Theo tuần</a></li>
                      <li><a href="#">Theo tháng</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Quản lý sản phẩm</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-product-hunt" aria-hidden="true"></i>Sản phẩm<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="addproduct.php">Thêm sản phẩm</a></li>
                      <li><a href="allproduct.php">Tât cả sản phẩm</a></li>
                      <li><a href="code.php">Mã giảm giá</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-picture-o" aria-hidden="true"></i>Banner <span class="fa fa-chevron-down"></span></a>
                  </li>                 
                </ul>
              </div>
              <div class="menu_section">
                <h3>Quản lý tài khoản</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users" aria-hidden="true"></i>Tài khoản<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Nhân viên</a></li>
                      <li><a href="#">Người dùng</a></li>
                      <li><a href="#">Đã khóa</a></li>
                    </ul>
                  </li>   
                  <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>Về trang chính</a></li>            
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" onclick="delete_cookie()">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../img/userdash.png" alt="">Admin
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Cài đặt</span>
                    </a>
                  <a class="dropdown-item"  href="javascript:;">Trợ giúp</a>
                    <a class="dropdown-item" onclick="delete_cookie()"><i class="fa fa-sign-out pull-right"></i>Đăng xuất</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">3</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../img/user13.png" alt="Profile Image" /></span>
                        <span>
                          <span>Thu Thắng</span>
                          <span class="time">3 phút trước</span>
                        </span>
                        <span class="message">
                          Yêu cầu về xử lý đơn hàng mã: serrishop324512
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../img/user11.png" alt="Profile Image" /></span>
                        <span>
                          <span>Uyển My</span>
                          <span class="time">2 giờ trước</span>
                        </span>
                        <span class="message">
                          Kích hoạt lại tài khoản tthang@vku.udn.vn
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../img/user11.png" alt="Profile Image" /></span>
                        <span>
                          <span>Diệu Mi</span>
                          <span class="time">3 giờ trước</span>
                        </span>
                        <span class="message">
                          Đã gửi đơn.
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>Xem tất cả</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
            <!-- <h1>THÊM SẢN PHẨM</h1> -->
          </div>
          <!-- /top tiles -->

          <div class="row" style="margin: 50px;">
            <div class="col-md-12 col-sm-12 " >
              <div style="text-align: center;font-size: 26px">
                <p><h1 >MÃ GIẢM GIÁ</h1></p>
              </div>
              <?php
                if(isset($_POST['add-code']))// neu bien ok ton tai  
                {
                    $ipcode = $_POST['ipcode'];
                    $ipgiam = $_POST['ipgiam'];
                    $ipcounts = $_POST['ipcounts'];
                    $ipstart = $_POST['ipstart'];
                    $ipfinish = $_POST['ipfinish'];           
                    // `id`, `idcode`, `percent`, `description`, `counts`, `start`, `finish`

                    $upload_query =mysqli_query($conn,"INSERT INTO code(idcode, percent, counts, start, finish) VALUES ('".$ipcode."',".$ipgiam.",'".$ipcounts."','".$ipstart."','".$ipfinish."')");
                    if ($upload_query) {
                      echo "<h5 style='color: blue'>Thêm thành công mã: <i>".$ipcode.", giảm: ".$ipgiam."%</i></h5>";
                    }else {
                      echo "Đã có lỗi xảy ra: ".mysqli_error($conn);
                    }
            
                }
              ?>
              <form action="code.php" method="post" name="form_code" >
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="inputCity">Mã giảm giá</label>
                      <input type="text" class="form-control" name="ipcode" required value="<?php echo 'serrishop'.rand(100,1000).rand(100,1000).rand(100,1000);   ?>">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputState">Giảm %</label>
                      <input type="text" class="form-control" name="ipgiam" required value="20">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Số lượng</label>
                      <input type="text" class="form-control" name="ipcounts" required value="2">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Bắt đầu</label>
                      <input type="date" class="form-control" name="ipstart" required value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Kết thúc</label>
                      <input type="date" class="form-control"  name="ipfinish" required value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-md-1">
                      <label for="inputZip">.</label>
                      <button type="submit" class="btn btn-primary form-control" name="add-code">Tạo mã</button>
                    </div>
                  </div>
                </form>

              <table class="table">
                <p style="margin-bottom: 30px;"></p>
                     <?php 
                     // SELECT `id`, `idcode`, `percent`, `description`, `counts`, `start`, `finish` FROM `code` WHERE 1
                        $result = mysqli_query($conn,"SELECT * FROM code ORDER BY id DESC");
                      ?>

                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Mã giảm giá</th>
                    <th scope="col">Giảm %</th>
                    <!-- <th scope="col">Mô tả</th> -->
                    <th scope="col">Còn lại</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Kết thúc</th>
                    <th scope="col">XÓA/SỬA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                     ?>
                        <tr>
                          <th scope="row" ><?php echo $row['idcode']?></th>
                          <td><?php echo $row['percent']; ?></td>
                          <!-- <td><?php echo $row['description']?></td> -->
                          <td><?php echo $row['counts']?></td>
                          <td><?php echo $row['start']?></td>
                          <td><?php echo $row['finish']?></td>
                          <td>
                             <button type="button" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa!!?')"><a href="delcode.php?id=<?php echo $row['id']; ?>">Xóa</a></button>
                             <button type="button" class="btn btn-warning" onclick="thongbao();">Chỉnh sửa</button>
                          </td>
                        </tr>
                      <?php
                    } ?>
                </tbody>
              </table>
            </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/jquery.flot.js"></script>
    <script src="../vendors/jquery.flot.pie.js"></script>
    <script src="../vendors/jquery.flot.time.js"></script>
    <script src="../vendors/jquery.flot.stack.js"></script>
    <script src="../vendors/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/jquery.flot.orderBars.js"></script>
    <script src="../vendors/jquery.flot.spline.min.js"></script>
    <script src="../vendors/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jquery.vmap.js"></script>
    <script src="../vendors/jquery.vmap.world.js"></script>
    <script src="../vendors/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment.min.js"></script>
    <script src="../vendors/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../vendors/custom.min.js"></script>
    <script type="text/javascript">
      function thongbao(){
        alert("Chưa hoàn thiện hành động này!");
      }
    </script>
	
  </body>
</html>
