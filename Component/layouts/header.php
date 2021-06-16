<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  require 'vendor/autoload.php';
  $CheckH = new HeaderAC();
  $CheckH->CartCheck();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Serri Shop | Home</title>
    <link href="public/css/font-awesome.css" rel="stylesheet">
    <link href="public/css/bootstrap.css" rel="stylesheet">   
    <link href="public/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/jquery.simpleLens.css">
    <link rel="stylesheet" type="text/css" href="public/css/slick.css">
    <link rel="stylesheet" type="text/css" href="public/css/nouislider.css">
    <link id="switcher" href="public/css/theme-color/default-theme.css" rel="stylesheet">
    <link href="public/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link href="public/css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  </head>
<body <?php if(isset($className)) echo $className ?>>   
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
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
                  <!-- <li><a href="account.html" id="checkLogin1">Tài khoản</a></li> -->
                  <li class="hidden-xs"><a href="cart.php">Giỏ hàng</a></li>
                  <!-- <li class="hidden-xs"><a href="checkout.php">Thanh toán</a></li> -->
                  <li>
                      <?php          
                          $CheckH->User();
                      ?>
                    <!-- <a href="" data-toggle="modal" data-target="#login-modal" id="checkLogin2">Đăng nhập</a> -->
                  </li>
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
                <!-- <a href="index.php"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="cart.php">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ hàng</span>
                  <span class="aa-cart-notify"><?php echo $CheckH->prd;?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <?php
                     $CheckH->Cart();
                    ?>
                    <li>
                      <span class="aa-cartbox-total-title">
                        Tổng
                      </span>
                      <span class="aa-cartbox-total-price">
                         <?php echo number_format($CheckH->sum_all); ?>₫
                      </span>
                    </li>
                  </ul>
                  <?php if ($CheckH->th!=0): ?>
                    <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.php">Thanh toán</a>
                  <?php endif ?>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form method="GET" action="product.php">
                  <input type="text" name="search" placeholder="Bạn muốn tìm gì?">
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
              <!-- <li><a href="index.php">Trang chủ</a></li> -->
              <li><a href="product.php">HÀNG MỚI</a></li>
              <li><a href="product.php">SẢN PHẨM<span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="product.php">HÀNG MỚI</a></li>
                  <li><a href="product.php?fill=2">BÁN CHẠY</a></li>
                   <li><a href="product.php">SẢN PHẨM<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="product.php">TẤT CẢ SẢN PHẨM</a></li>
                      <li><a href="product.php?sort=Áo sơ mi">ÁO SƠ MI</a></li>
                      <li><a href="product.php?sort=Áo kiểu">ÁO KIỂU</a></li>
                      <li><a href="product.php?sort=Áo thun">ÁO THUN</a></li>
                      <li><a href="product.php?sort=Áo khoác">ÁO KHOÁC</a></li>
                      <li><a href="product.php?sort=Chân váy">CHÂN VÁY</a></li>
                      <li><a href="product.php?sort=Quần dài">QUẦN DÀI</a></li>
                      <li><a href="product.php?sort=Quần short">QUẦN SHORT</a></li>
                      <li><a href="product.php?sort=Đầm">ĐẦM</a></li>
                      <li><a href="product.php?sort=Hàng dệt kim">HÀNG DỆT KIM</a></li>
                      <!-- <li><a href="product.html">JEANS | DENIM</a></li> -->
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="contact.php">VỀ CHÚNG TÔI</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->