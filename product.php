<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
?>
<?php

 // so san pham da add vao cart
  $prd = 0;
  if(isset($_SESSION['cart']))
  {
    $prd = count($_SESSION['cart']);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Serri Shop | Product</title>
    
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
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage"> 
  <?php 
  include("connect.php");
?> 
  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- Start header section -->
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
                  <li class="hidden-xs"><a href="cart.html">Giỏ hàng</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Thanh toán</a></li>
                  <li>
                      <?php          
                          if (isset($_SESSION['username']))
                          { 
                            $level = 2;
                            $name="";
                            $name= $_SESSION['username'];
                            // $pass1=$_SESSION['password'];
                            $sqltk = "SELECT * FROM users where email='$name'";
                            if($resulttk = $conn->query($sqltk))
                            {
                              while($user_info = mysqli_fetch_array($resulttk))
                              {
                                  $level = $user_info['active'];
                                  $name=$user_info['name'];
                              }    
                            }
                                
                            if($level == 1)
                            {
                              echo '<a href="dash/index.php">Xin chào: '.$name.'</a> <a href="logout.php">Đăng xuất</a>';
                            }
                            else
                            {
                              echo '<a href="profile.php">Xin chào: '.$name.'</a><a href="logout.php">Đăng xuất</a>';
                            }
                          }
                          else
                          {
                            echo '<a href="account.php">Đăng nhập</a>';
                          }
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
                <a class="aa-cart-link" href="cart.html">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ hàng</span>
                  <span class="aa-cart-notify"><?php echo $prd;?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
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
                        $item_result = mysqli_query($conn,$item_query) or die ('Cannot select table!');
                        while ($rows = mysqli_fetch_array($item_result))
                        {
                          ?>
                          <li>
                            <a class="aa-cartbox-img" href="product-detail.php?id=<?php echo $rows['id']; ?>"><img src="<?php echo $rows['images']; ?>" alt="img"></a>
                            <div class="aa-cartbox-info">
                              <h4><a href="product-detail.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></a></h4>
                              <p><?php echo $_SESSION['cart'][$rows['id']]." x ".number_format($rows['price']); ?></p>
                                <?php 
                                    $sum_all += $rows['price']*$_SESSION['cart'][$rows['id']]; 
                                ?>
                            </div>
                            <a class="aa-remove-product" href="delcart.php?id=<?php echo $rows['id'];?>&return_url=<?php echo $ReturnURL; ?>"><span class="fa fa-times"></span></a>
                          </li>  
                    <?php     
                           }
                      }
                 ?>
                    <li>
                      <span class="aa-cartbox-total-title">
                        Tổng
                      </span>
                      <span class="aa-cartbox-total-price">
                         <?php echo number_format($sum_all); ?>₫
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
              <!-- <li><a href="index.php">Trang chủ</a></li> -->
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
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/index/bannerproduct.png" alt="fashion img" width="100%">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.php" class="active">Serri Shop</a></li>         
          <!-- <li class="active">Shop</li> -->
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head" style="width: 90%">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sắp xếp theo</label>
                  <select name="">
                    <option value="1" selected="Default">Mặc định</option>
                    <option value="2">Giá Giảm dần</option>
                    <option value="3">Giá Tăng dần</option>
                    <option value="4">Mua nhiều</option>
                    <option value="4">Đang khuyến mãi</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Hiển thị</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right" >
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg" >
                <!-- start single product item -->
                        <!-- hang 1 san pham-->
                        <!-- start single product item -->
                        <!-- <li>
                          <figure>
                            <a class="aa-product-img" href="product-detail1.html"><img style="height: 300px;width: 250px" src="img/premium/sp3.jpg" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="product-detail1.html">Áo thun tay dài form ngắn</a></h4>
                              <span class="aa-product-price">295,000₫</span>
                              <p class="aa-product-descrip">
                                Màu sắc: Trắng và Xám<br/>
                                Chất liệu: Thun 2 chiều<br/>
                                Đặc tính: Co giãn tốt, ít nhăn<br/>
                              </p>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Yêu thích"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="So sánh"><span class="fa fa-exchange"></span></a>                        
                          </div>
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li> -->

                      <?php
                        if(isset($_GET['sort'])){
                          $sorts= $_GET['sort'];
                          $new_query="SELECT * FROM products where category=N'$sorts' order by id desc limit 12";
                        }elseif (isset($_GET['fill'])) {
                          $ratings= $_GET['fill'];
                          $new_query="SELECT * FROM products where ratings = '$ratings' order by id limit 12";
                        }else{
                          $new_query="SELECT * FROM products order by id desc limit 12";
                        }
                        $new_res = mysqli_query($conn,$new_query) or die('Cannot select table!');
                        while ($new_items = mysqli_fetch_array($new_res))
                         { ?>
                            <li>
                              <figure>
                                <a class="aa-product-img" href="product-detail.php?id=<?php echo $new_items['id']; ?>"><img style="height: 300px;width: 250px" src="<?php echo $new_items['images']; ?>" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn" href="add-cart.php?id=<?php echo $new_items['id']; ?>&return_url=<?php echo $ReturnURL; ?>"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $new_items['id']; ?>"><?php echo $new_items['name']; ?></a></h4>
                                  <span class="aa-product-price"><?php echo number_format($new_items['price']); ?>₫</span>
                                  <p class="aa-product-descrip">
                                Màu sắc: Trắng và Xám<br/>
                                Chất liệu: Thun 2 chiều<br/>
                                Đặc tính: Co giãn tốt, ít nhăn<br/>
                              </p>
                                </figcaption>
                              </figure>                        
                              <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Yêu thích"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="So sánh"><span class="fa fa-exchange"></span></a>                        
                              </div>
                              <!-- product badge -->
                             <span class="aa-badge aa-hot" href="#">HOT!</span>                   
                            </li>
                      <?php } ?>
                                                     
              </ul> 
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#" style="font-weight: bold;">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Danh mục</h3>
              <ul class="aa-catg-nav">
                <li><a href="product.php">Hàng mới</a></li>
                <li><a href="product.php?fill=2">Bán chạy</a></li>
                <li><a href="product.php?sort=Áo sơ mi">Áo sơ mi</a></li>
                <li><a href="product.php?sort=Áo kiểu">Áo kiểu</a></li>
                <li><a href="product.php?sort=Áo thun">Áo thun</a></li>
                <li><a href="product.php?sort=Áo khoác">Áo khoác</a></li>
                <li><a href="product.php?sort=Chân váy">Chân váy</a></li>
                <li><a href="product.php?sort=Quần dài">Quần dài</a></li>
                <li><a href="product.php?sort=Quần short">Quần short</a></li>
                <li><a href="product.php?sort=Đầm">Đầm</a></li>
                <li><a href="product.php?sort=Hàng dệt kim">Hàng dệt kim</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="#">Nhiều màu</a>
                <a href="#">Màu đen</a>
                <a href="#">Trắng</a>
                <a href="#">Hoa</a>
                <a href="#">Bông</a>
                <a href="#">Ngắn tay</a>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Khoảng giá</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">50.000</span> 
                  <span id="skip-value-upper" class="example-val">100.000</span>
                  <button class="aa-filter-btn" type="submit" style="margin:15px; ">Lọc</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Màu sắc</h3>
              <div class="aa-color-tag">
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-green" href="#"></a>
                <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <!-- <a class="aa-color-cyan" href="#"></a> -->
                <!-- <a class="aa-color-olive" href="#"></a> -->
                <a class="aa-color-orchid" href="#"></a>
              </div>                            
            </div>
            <!-- single sidebar -->
<!--             <div class="aa-sidebar-widget">
              <h3>Đã xem gần đây</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="product-detail1.html" class="aa-cartbox-img" style="height: 112px;"><img alt="img" src="img/premium/sp3.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="product-detail1.html">Áo thun tay dài form ngắn</a></h4>
                      <p>295,000₫</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="product-detail2.html" class="aa-cartbox-img" style="height: 112px;"><img alt="img" src="img/premium/sp4.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="product-detail2.html">Quần ngắn lưng thun kẻ sọc</a></h4>
                      <p>298.000₫</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div> -->
            <!-- single sidebar -->
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Đăng ký nhận tin</h3>
            <p>Hãy để lại email của bạn để nhận thông báo mới nhất của chúng tôi!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Email">
              <input type="submit" value="Đăng ký">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

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
  

  </body>
</html>