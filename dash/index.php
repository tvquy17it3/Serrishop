<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
  date_default_timezone_set ("Asia/Saigon"); 
?>
<?php
  $nameAd = "";
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
  </head>

  <body class="nav-md" >
  <?php 
  include("../connect.php");
  include("checkad.php");
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
                <h2>
                   <?php echo $nameAd; ?>
                </h2>
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
                      <li><a href="index.php?status=1">Đã xác nhận</a></li>
                      <li><a href="index.php?status=2">Đã gửi</a></li>
                      <li><a href="index.php?status=3">Hoàn thành</a></li>
                      <li><a href="index.php?status=4">Đã hủy</a></li>
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
                      <!-- <li><a href="code.php">Mã giảm giá</a></li> -->
                    </ul>
                  </li>
                  <li><a href="code.php"><i class="fa fa-codiepie" aria-hidden="true"></i>Mã giảm giá</a>
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
              <a data-toggle="tooltip" data-placement="top" title="Đăng xuất" href="../logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php 
          include("topmenu.php");
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <p style="font-size: 36px;align-content: center;">
                <?php
                  if (isset($_GET['status'])) {
                      $idstatus = $_GET['status'];
                      switch ($idstatus) {
                          case 1:
                              echo "Các đơn hàng đã xác nhận!";
                             break;
                          case 2:
                              echo "Các đơn hàng đang vận chuyển!";
                              break;
                          case 3:
                              echo "Các đơn hàng đã hoàn thành!";
                            break;
                          case 4:
                              echo "Các đơn hàng đã hủy!";
                              break;
                          default:
                              echo("<script>location.href = 'index.php';</script>");
                              break;
                      }
                      $sql = "SELECT * FROM donhang where status='$idstatus' ORDER BY id DESC";
                    }else {
                      echo "Các đơn hàng chưa xác nhận!";
                      $sql = "SELECT * FROM donhang where status='0' ORDER BY id DESC";
                    }
                ?>
              </p>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Địa chỉ nhận</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Cập nhật</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $results = $conn->query($sql);
                    if ($results->num_rows > 0) {
                        while($obj = $results->fetch_object()) {
                          echo "<tr>";
                          // `id`, `name`, `email`, `phone`, `address`, `discount`, `total`, `orderdate`, `status`
                          echo "<td>".$obj->id."</td>";
                          echo "<td>".$obj->name."</td>";
                          echo "<td>".$obj->phone."</td>";
                          echo "<td>".number_format($obj->total)."đ</td>";
                          echo "<td>".$obj->address."</td>";
                          echo "<td>".$obj->orderdate."</td>";
                          // echo "<td>".$obj->status."</td>";
                          echo "<td>
                                  <button type='button' class='btn bg-info'><a href='vieworder.php?id=".$obj->id."' style='color: white' >Chi tiết</a></button>
                                </td>";
                          echo "</tr>";
                        }
                    }
                  ?>
                  <!-- <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
<!--         <footer>
          <div class="pull-right">
            Thu Thang <a href="https://colorlib.com">Vku</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
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
	
  </body>
</html>
