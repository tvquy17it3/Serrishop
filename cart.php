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
    <title>Serri Shop | Cart Page</title>
    
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
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
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
                  <li class="hidden-xs"><a href="cart.php">Giỏ hàng</a></li>
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
                <a class="aa-cart-link" href="cart.php">
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
              <li><a href="contact.html">VỀ CHÚNG TÔI</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->  

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table" style="border: 1px solid #fff;border-radius: 10px; background: #f9f9f9;box-shadow: 1px 1px 1px 3px #e9e9e9;">
             <form action="">
               <div class="table-responsive">
                 <h3 style="font-weight: bold;">Tóm tắt mặt hàng(1) <small></small></h3>
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-wrap checkbox-primary">
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                          </label>
                        </td>
                        <td><a href="product-detail1.html"><img src="img/premium/sp3.jpg" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="product-detail.html">Áo thun tay dài form ngắn</a>
                          <br/>
                          Size:
                          <select style="background: none repeat scroll 0 0 #FFFFFF;
                            border: 1px solid #E5E5E5;
                            border-radius: 5px 5px 5px 5px;
                            box-shadow: 0 0 5px #E8E8E8 inset;
                            ">
                            <option value="0">L</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="2">L</option>
                          </select>
                        </td>
                        <td>295,000₫</td>
                        <td><input class="aa-cart-quantity" type="number" value="1"></td>
                        <td>295,000₫</td>
                        <td>
                            <span aria-hidden="true"><i class="fa fa-close" style="color: red;"></i></span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="7" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Nhập mã">
                            <input class="aa-cart-view-btn" type="submit" value="Kiểm tra">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Cập nhật lại giỏ hàng">
                        </td>

                      </tr>
                      </tbody>
                  </table>
                </div>


             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Tính tiền</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng tiền hàng</th>
                     <td>295,000₫</td>
                   </tr>
                   <tr>
                     <th>Mã giảm giá</th>
                     <td>-20.000đ</td>
                   </tr>
                   <tr>
                     <th>Tổng cộng</th>
                     <td>275.000đ</td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.html" class="aa-cart-view-btn">mua hàng</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


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