<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
?>
<?php

 // so san pham da add vao cart
  $prd = 0;
  $th = 0;
  $idcode = 0;
  $percent = 0;
  if(isset($_SESSION['cart']))
  {
    $prd = count($_SESSION['cart']);
    $th = $prd;
    if ($prd==0) {
      unset($_SESSION['cart']);
    }
  }else{
    echo("<script>location.href = 'index.php';</script>");
  }
  if(isset($_SESSION['idcode'])){
    $idcode = $_SESSION['idcode'];
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Serri Shop | Checkout Page</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  </head>
  <body onload="checkCookie()">         
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

    <?php 
      include("connect.php");
        if (!isset($_SESSION['username'])){
          header("Location:account.php?return_url=$ReturnURL");
        } 
    ?>

  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- Start header section -->
<?php 
  include("menu.php");
?> 
 
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="success.php" method="GET">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Bạn có mã giảm giá?
                          </a>
                        </h4>
                      </div>
                      <form method="post"></form>
                      <form method="post">
                        <div class="panel-body">
                         <input type="text" placeholder="Nhập mã" class="aa-coupon-code" name="id">
                         <input type="submit" value="Kiểm tra" name="check_code" class="aa-browse-btn">
                       </div>
                      </form>
                      <p style="margin:20px">
                        <?php //check code
                        if(isset($_POST['check_code']))
                          {
                            $idcode1 = $_POST["id"];
                            $sqlcheck = "SELECT * from code where idcode = '$idcode1'";
                            $resultCode = $conn->query($sqlcheck);
                            if ($resultCode->num_rows !=0) {
                              while($rs = $resultCode->fetch_object())
                                  {
                                    $_SESSION['idcode'] = $idcode1;
                                    echo "Mã: ".$idcode1;
                                    echo "  | Giảm: ".$rs->percent."%";
                                    // echo "| Kết thúc: ".$rs->finish;
                                    echo "<a href='' style='font-weight: bold; color: blue;float: right;font-size: 12px;'>OK</a>";
                                    // echo("<script>location.href = 'checkout.php';</script>");
                                  } 
                            }else{
                                echo "Mã không tồn tại!";
                            } 
                          }
                      ?>
                    </p>
                    </div>
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a style="float: left;">
                            Địa chỉ nhận hàng:
                          </a>
                          <a href="updateprofile.php" style="font-weight: bold; color: blue;float: right;font-size: 12px;">Thay đổi</a><br>
                        </h4>
                      </div>
                      <form method="post"></form>
                      <form method="post">
                        <div class="panel-body">
                          <?php
                            $email= $_SESSION['username'];
                            $sql = "SELECT * FROM users where email='$email'";
                            $results = $conn->query($sql);
                            if ($results->num_rows > 0) {
                                while($obj = $results->fetch_object()) {
                                echo "Họ tên:  ".$obj->name;
                                echo "<br>Số ĐT: ".$obj->phone;
                                echo "<br>Email: ".$obj->email;
                                echo "<br>Địa chỉ: ".$obj->address;
                                }
                      }
                    ?>
                       </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Tóm tắt đơn hàng</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Sản phẩn</th>
                          <th>Tổng</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $sum_all = 0;
                          if(isset($_SESSION['cart']))
                          {
                            foreach($_SESSION['cart'] as $id =>$prd)
                            {
                                $arr_id[] = $id;
                            }
                            $str_id = implode(',',$arr_id);
                            $item_query = "SELECT * FROM  products WHERE id IN ($str_id) ORDER BY id ASC";
                            $item_result = mysqli_query($conn,$item_query);
                            while ($rows = mysqli_fetch_array($item_result))
                            {
                              ?>
                                <tr>
                                  <td>
                                    <!-- <img src="" alt="img" style="height: 60px"> -->
                                    <?php echo $rows['name']; ?><br><strong><?php  echo $_SESSION['cart'][$rows['id']]; ?> x <?php echo number_format($rows['price']); ?></strong>
                                  </td>
                                  <td><br/>
                                    <?php echo number_format($rows['price']*$_SESSION['cart'][$rows['id']]); ?>₫
                                    <?php 
                                      $sum_all += $rows['price']*$_SESSION['cart'][$rows['id']]; 
                                    ?>
                                  </td>
                                </tr>
                            <?php     
                              }
                          }
                       ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Tổng tiền hàng</th>
                          <td><?php echo number_format($sum_all); ?>₫</td>
                        </tr>
                        <tr>
                          <th>Mã giảm giá<br><?php
                          if($idcode){ echo $idcode;}
                            $giam=0;?>
                        </th>
                          <td>
                            <?php //check code
                          if($idcode)
                          {
                            $sqlcheck = "SELECT * from code where idcode = '$idcode'";
                            if ($resultCode = $conn->query($sqlcheck)) {
                              while($rs = mysqli_fetch_array($resultCode))
                              {
                                  $percent= $rs['percent'];
                                  $giam = ($sum_all/100 )* $percent;
                                  echo "-".number_format($giam)."đ (".$percent."%)";
                              } 
                            }else{
                              echo "-0đ";
                            }
                          }else{
                            echo "-0đ";
                          }
                        ?>
                          </td>
                        </tr>
                         <tr>
                          <th>Phí vận chuyển</th>
                          <td>+20.000đ</td>
                        </tr>
                         <tr>
                          <th>Thành tiền</th>
                          <td><?php echo number_format($sum_all-$giam+20000); ?>đ</td>
                          <input type="text" name="btOrder" hidden value="<?php echo $sum_all-$giam+20000; ?>">
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Phương thức thanh toán</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios" checked>Thanh toán khi nhận hàng</label>
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios"  style="margin-bottom: 10px;"> Via Paypal</label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                    <input type="submit" value="ĐẶT HÀNG" class="aa-browse-btn" name="btOrder" onclick="return confirm('Đặt hàng!')">           
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>VỀ CHÚNG TÔI</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Giới Thiệu Serri Shop</a></li>
                    <li><a href="#">Chương Trình</a></li>
<!--                     <li><a href="#">Blogger Thời Trang</a></li> -->
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>HỖ TRỢ KHÁCH HÀNG</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Phí Vận Chuyển</a></li>
                      <li><a href="#">Trả Lại</a></li>
                      <li><a href="#">Hướng Dẫn Đặt Hàng</a></li>
                      <li><a href="#">Làm Thế Nào Để Theo Dõi</a></li>
                      <li><a href="#">Hướng Dẫn Kích Thước</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>DỊCH VỤ KHÁCH HÀNG</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Liên Hệ Chúng Tôi</a></li>
                      <li><a href="#">Phương Thức Thanh Toán</a></li>
                      <li><a href="#">Điểm Thưởng</a></li>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>
                    <address>
                      <p>125 Nguyễn Văn Linh, Đà Nẵng</p>
                      <p><span class="fa fa-phone"></span> 0776555522</p>
                      <p><span class="fa fa-envelope"></span>serri@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <!-- <p>Designed by <a href="404.html">Thu Thang VKU</a></p> -->
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover" onclick="checkCookie()"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Đăng Nhập</h4>
          <!-- <form class="aa-login-form"> -->
            <div class="aa-login-form">
            <label id="result"></label><br/>
            <label for="">Địa chỉ email<span>*</span></label>
            <input type="text" placeholder=""  name="username" id="username">
            <label for="">Mật khẩu<span>*</span></label>
            <input type="password" placeholder="" name="password" id="password">
            <button class="aa-browse-btn" id="submit" onclick="validate()">Đăng nhập</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Ghi nhớ tài khoản </label>
            <p class="aa-lost-password"><a href="#">Bạn quên mật khẩu?</a></p>
            <div class="aa-register-now">
              Bạn chưa có tài khoản?<a href="account.html">Đăng ký ngay!</a>
            </div>
          </div>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>   


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>  
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>  
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script> 
    <script src="js/login.js"></script> 
    <script>
    function myFunctionAl() {
      alert("Đặt hàng thành công!");
    }
    </script>
    
  </body>
</html>