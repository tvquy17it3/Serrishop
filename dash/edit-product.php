<?php
  session_start();
  // ini_set("display_errors","0");
  if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];
  }else{
    echo("<script>location.href = 'allproduct.php';</script>");
  }
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
                  <!-- <li><a href="index.php"><i class="fa fa-server" aria-hidden="true"></i>Ho???t ?????ng</a></li> -->
                  <li><a ><i class="fa fa-edit"></i>????n h??ng<span class="fa fa-chevron-down" aria-hidden="true"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Ch??a x??c nh???n</a></li>
                      <li><a href="index.php?status=1">???? x??c nh???n</a></li>
                      <li><a href="index.php?status=2">???? g???i</a></li>
                      <li><a href="index.php?status=3">Ho??n th??nh</a></li>
                      <li><a href="index.php?status=4">???? h???y</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>Th???ng k??<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">H??m nay</a></li>
                      <li><a href="#">Theo tu???n</a></li>
                      <li><a href="#">Theo th??ng</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Qu???n l?? s???n ph???m</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-product-hunt" aria-hidden="true"></i>S???n ph???m<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="addproduct.php">Th??m s???n ph???m</a></li>
                      <li><a href="allproduct.php">T??t c??? s???n ph???m</a></li>
                      <!-- <li><a href="code.php">M?? gi???m gi??</a></li> -->
                    </ul>
                  </li>
                  <li><a href="code.php"><i class="fa fa-codiepie" aria-hidden="true"></i>M?? gi???m gi??</a>
                  </li> 
                  <li><a><i class="fa fa-picture-o" aria-hidden="true"></i>Banner <span class="fa fa-chevron-down"></span></a>
                  </li>                 
                </ul>
              </div>
              <div class="menu_section">
                <h3>Qu???n l?? t??i kho???n</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users" aria-hidden="true"></i>T??i kho???n<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Nh??n vi??n</a></li>
                      <li><a href="#">Ng?????i d??ng</a></li>
                      <li><a href="#">???? kh??a</a></li>
                    </ul>
                  </li>   
                  <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>V??? trang ch??nh</a></li>            
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
              <a data-toggle="tooltip" data-placement="top" title="????ng xu???t" href="../logout.php">
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
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
            <!-- <h1>TH??M S???N PH???M</h1> -->
          </div>
          <!-- /top tiles -->
          <div class="row" style="margin: 50px;">
            <div class="col-md-12 col-sm-12 " >
              <div style="text-align: center;font-size: 26px">
                <p><h1>S???A S???N PH???M</h1></p>
                <a href="../product-detail.php?id=<?php echo $id_product;?>"><h5>M?? s???n ph???m:<?php echo $id_product;?><h5></a>
              </div>
              <?php
                    if(isset($_POST['add-product']))
                    {
                        $tensp  = $_POST['tensp'];
                        $giasp0 = trim($_POST['giasp']);
                        $giasp1 = str_replace(",","",$giasp0);
                        $giasp  = str_replace("???","",$giasp1);
                        $sizesp = $_POST['sizesp'];
                        $mausp = $_POST['mausp'];
                        $danhmucsp =$_POST['danhmucsp'];
                        $soluongsp= $_POST['soluongsp'];
                        $mieuta = $_POST['mieutasp'];

                        $upload_query =mysqli_query($conn,"UPDATE products SET name='$tensp', price='$giasp',size='$sizesp',colors='$mausp',category='$danhmucsp', description='$mieuta', status='$soluongsp' WHERE id = '$id_product'");
                        if ($upload_query) {
                            echo "<h3>???? C???P NH???T</h3>";
                        }else {
                            echo "???? c?? l???i x???y ra: ".mysqli_error($conn);
                        }
                    }
                  ?>
                <p></p>
              <form method="post" name="form_logo">
                <?php
                  // id`, `name`, `price`, `size`, `colors`, `category`, `images`, `description`, `status`, `ratings` FROM `products`
                  $sql = "SELECT * FROM products WHERE id ='$id_product'";
                  $results = $conn->query($sql);
                  if ($results->num_rows > 0) {
                      while($obj = $results->fetch_object()) {
                          $name=$obj->name;
                          $price =$obj->price;
                          $size =$obj->size;
                          $colors =$obj->colors;
                          $category =$obj->category;
                          $description = $obj->description;
                          $status = $obj->status;
                      }
                  }else{
                    echo("<script>location.href = 'allproduct.php';</script>");
                  }
              ?>
                <div class="form-group">
                  <label for="inputAddress">T??n s???n ph???m:</label>
                  <input type="text" class="form-control" name="tensp" required="" value="<?php echo $name;?>">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4"> Gi??:</label>
                    <input type="text" class="form-control" name="giasp" required="" value="<?php echo $price;?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Size:</label>
                    <input type="text" class="form-control" name="sizesp" required="" value="<?php echo $size;?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">M??u s???c:</label>
                    <input type="text" class="form-control" name="mausp" required value="<?php echo $colors;?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputState">Danh m???c:</label>
                    <select name="danhmucsp" class="form-control" required="">
                      <option selected value="<?php echo $category;?>"><?php echo $category;?></option>
                      <option value="??o s?? mi">??o s?? mi</option>
                      <option value="??o ki???u">??o ki???u</option>
                      <option value="??o thun">??o thun</option>
                      <option value="??o kho??c">??o kho??c</option>
                      <option value="Ch??n v??y">Ch??n v??y</option>
                      <option value="Qu???n d??i">Qu???n d??i</option>
                      <option value="Qu???n short">Qu???n short</option>
                      <option value="?????m">?????m</option>
                      <option value="H??ng d???t kim">H??ng d???t kim</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputZip">S??? l?????ng:</label>
                    <input type="text" class="form-control" name="soluongsp" required="" value="<?php echo $status;?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label for="inputAddress">M?? t??? s???n ph???m:</label>
                  <textarea name="mieutasp" cols="80" class="form-control"><?php echo $description; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="add-product">L??U L???I</button>
              </form>
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
	
  </body>
</html>
