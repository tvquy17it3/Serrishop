<?php
  session_start();
  // ini_set("display_errors","0");
  $loi="";
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
  <head>
    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Serri Shop | Account Page</title>
    
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
  <body >
  <?php 
  if (isset($_SESSION['username'])){
      header("Location:index.php");
    } 

  ?>
       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
  <header id="aa-header">

    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button">
                      Đà Nẵng
                    </a>
                  </div>
                </div>
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>0776555522</p>
                </div>
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.html" id="checkLogin1">Tài khoản</a></li>
                  <li class="hidden-xs"><a href="cart.html">Giỏ hàng</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Thanh toán</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Serri<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="cart.html">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ hàng</span>
                  <span class="aa-cart-notify">1</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="product-detail1.html"><img src="img/premium/sp3.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="product-detail1.html">Áo thun tay dài form ngắn</a></h4>
                        <p>1 x 295,000₫</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                  
                    <li>
                      <span class="aa-cartbox-total-title">
                        Tổng
                      </span>
                      <span class="aa-cartbox-total-price">
                        295,000₫
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Thanh toán</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Bạn muốn tìm gì?">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->

    <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <!-- <li><a href="index.html">Trang chủ</a></li> -->
              <li><a href="product.html">HÀNG MỚI</a></li>
              <li><a href="product.html">SẢN PHẨM<span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="product.html">HÀNG MỚI</a></li>
                  <li><a href="product.html">BÁN CHẠY</a></li>
                   <li><a href="product.html">SẢN PHẨM<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="product.html">TẤT CẢ SẢN PHẨM</a></li>
                      <li><a href="product.html">ÁO SƠ MI</a></li>
                      <li><a href="product.html">ÁO KIỂU</a></li>
                      <li><a href="product.html">ÁO THUN</a></li>
                      <li><a href="product.html">ÁO KHOÁC</a></li>
                      <li><a href="product.html">CHÂN VÁY</a></li>
                      <li><a href="product.html">QUẦN DÀI</a></li>
                      <li><a href="product.html">QUẦN SHORT</a></li>
                      <li><a href="product.html">ĐẦM</a></li>
                      <li><a href="product.html">HÀNG DỆT KIM</a></li>
                      <li><a href="product.html">JEANS | DENIM</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="contact.html">VỀ CHÚNG TÔI</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->  

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-5">
                <div class="aa-myaccount-login" style="margin-bottom: 15px;">
                <h4>Đăng nhập</h4>
                  <?php
                    if (isset($_POST["submitlogin"])) {
                      $user = $_POST["username1"];
                      $pass=$_POST["password1"];
                      $user = strip_tags($user);
                      $user = addslashes($user);
                      $pass = strip_tags($pass);
                      $pass = addslashes($pass);
                      $remember=((isset($_POST['remember'])!=0)?1:"");

                      if ($user == "" || $pass =="") {
                        $loi="<p style='color: red'>Email hoặc mật khẩu chưa nhập!</p>";
                      }else
                        {
                          include("connect.php");
                          $pass=md5($pass);
                          $sqllg = "SELECT * from users where email = '$user' and password = '$pass' ";
                          $resultlg = $conn->query($sqllg);
                          if ($resultlg->num_rows !=0) {
                              $_SESSION['username'] = $user;
                              $_SESSION['password']=$pass;
                                // header('Location:index.php');
                              // echo "ok";
                              echo("<script>location.href = 'index.php';</script>");
                          }else{
                              $loi="<p style='color: red'>Email hoặc mật khẩu không đúng!</p>";
                            } 
                        }
                         echo $loi;
                    }
                  ?>          
          <form method="post" action="">
                <label id="result"></label><br/>
                  <div class="aa-login-form">
                     <label for="">Địa chỉ email:<span>*</span></label>
                     <input type="text" name="username1" required>
                     <label for="">Mật khẩu:<span>*</span></label>
                      <input type="password" placeholder="" name="password1" required>
                      <button class="aa-browse-btn" type="submit" name="submitlogin">Đăng nhập</button>
                      <!-- <label class="rememberme" for="rememberme"><input type="checkbox" name="remember" value="1" checked> Ghi nhớ tài khoản! </label> -->
                      <!-- <p class="aa-lost-password"><a href="#">Bạn quên mật khẩu?</a></p> -->
                  </div>
                </form>
                </div>
                <div>
                  <p>Quên mật khẩu? hoặc Đăng ký</p>
                  <div>
                    <img src="img/logingf.jpg" width="455" >
                  </div>
               </div>
              </div>
              <div class="col-md-1" style="border-right: 1px solid #e5e5e5;height: 400px"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="aa-myaccount-register">                 
                 <h4>Đăng ký</h4>
                    <?php
                      if(isset($_POST['submitdk']))
                        { 
                          $name=$_POST['fullname'];
                          $email =$_POST['email'];
                          $pw2=md5($_POST['password2']);
                          $pw22=md5($_POST['password22']);
                          include("connect.php");

                          if(!$name || !$email || !$pw2 || !$pw22)
                          {
                            $loi="Vui lòng nhập thông tin đầy đủ!";
                          }
                          else
                          {
                            $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                            $result = mysqli_query($conn, $user_check_query);
                            $user = mysqli_fetch_assoc($result);
                            
                            if ($user) {
                              if ($user['email'] === $email) {
                                $loi="<p style='color: red'>Email này đã tồn tại!!</p>";
                              }
                            }else{
                              if($pw2 == $pw22)
                              {
                                $query = "INSERT INTO users (name, email, password, active) VALUES('$name', '$email', '$pw2',2)";
                                    mysqli_query($conn, $query);
                                $loi="<p style='color: red'>Đăng ký thành công!!</p>";
                                $_SESSION['username'] = $email;
                                $_SESSION['password']=$pw2;
                                echo("<script>alert('Đăng ký thành công!');location.href = 'index.php';</script>");
                              }
                              else
                              {
                                $loi="Xác nhận mật khẩu không trùng khớp!";
                              }
                            }
                          }
                          echo $loi;
                        }
                      ?>

                 <form method="post" action="" class="aa-login-form">
                    <label for="">Họ tên:<span>*</span></label>
                    <input type="text" placeholder="" name="fullname" required>
                    <label for="">Địa chỉ email:<span>*</span></label>
                    <input type="text" placeholder="" name="email" required>
                    <label for="">Mật khẩu:<span>*</span></label>
                    <input type="password" placeholder="" name="password2" required>
                    <label for="">Xác nhận mật khẩu:<span>*</span></label>
                    <input type="password" placeholder="" name="password22" required>
                    <button type="submit" name="submitdk" class="aa-browse-btn">Đăng ký</button>                    
                  </form>
                </div>
              </div>
            </div>          
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
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
     
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
  <!-- <script src="js/login.js"></script>  -->
<!--   https://www.studentstutorial.com/php/signup-login-form-in-php-mysql.php -->

  </body>
</html>