<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
?>
<?php
  $prd = 0;
  $th = 0;
  if(isset($_SESSION['cart']))
  {
    $prd = count($_SESSION['cart']);
    $th = $prd;
    if ($prd==0) {
      unset($_SESSION['cart']);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Serri Shop | Home</title>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">   
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link href="css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  </head>
<!--   onload="checkCookie()" -->
<body>    
<?php 
  include("connect.php");
?>

  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- Start header section -->
<?php 
  include("menu.php");
?>
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/banner2.jpg" alt="slide img" />
              </div>
             
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/banner1.jpg" alt="slide img" />
              </div>
            </li>
            <!-- single slide item -->   
<!--             <li>
              <div class="seq-model">
                <img data-seq src="img/slider/banner3.jpg" alt="slide img" />
              </div>
            </li> -->              
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row" >
              <!-- promo left -->
              <div class="col-md-5 no-padding" >                
                <div class="aa-promo-left" >
                  <div class="aa-promo-banner" >                    
                    <img src="img/women/anhduoibn1.jpg" alt="img" style="height: 570px">
                    <div class="aa-prom-content">
                      <span>25% Off</span>
                      <h4><a href="#">Serri X Allure By Reia</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/women/W1.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>MOTF PREMIUM</span>
                        <h4><a href="#"></a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/women/anhduoibn2.jpg.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        <h4><a href="#">#dailydrops</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/women/anhduoibn3.jpg.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>New</span>
                        <h4><a href="#">Serri BASICS</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/women/W2.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>15% Off</span>                      
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
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Hàng mới</a></li>
                    <li><a href="#women" data-toggle="tab">ĐẦM</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- hang 1 san pham-->
                        <!-- start single product item -->
                      <?php
                        $new_query="SELECT * FROM products order by id desc limit 8";
                        $new_res = mysqli_query($conn,$new_query);
                        while ($new_items = mysqli_fetch_array($new_res))
                        { ?>
                            <li>
                              <figure>
                                <a class="aa-product-img" href="product-detail.php?id=<?php echo $new_items['id']; ?>"><img style="height: 300px;width: 250px" src="<?php echo $new_items['images']; ?>" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn" href="add-cart.php?id=<?php echo $new_items['id']; ?>&return_url=<?php echo $ReturnURL; ?>"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>   
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $new_items['id']; ?>"><?php echo $new_items['name']; ?></a></h4>
                                  <span class="aa-product-price"><?php echo number_format($new_items['price']); ?>₫</span>
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
                      <a class="aa-browse-btn" href="product.php">Tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->
                    <!-- start dam product category -->
                    <div class="tab-pane fade" id="women">
                      <ul class="aa-product-catg">
                        <?php
                          $new_query="SELECT * FROM products where category=N'Đầm' order by id desc limit 8";
                          $new_res = mysqli_query($conn,$new_query);
                          while ($new_items = mysqli_fetch_array($new_res))
                          { ?>
                              <li>
                                <figure>
                                  <a class="aa-product-img" href="product-detail.php?id=<?php echo $new_items['id']; ?>"><img style="height: 300px;width: 250px" src="<?php echo $new_items['images']; ?>" alt="polo shirt img"></a>
                                  <a class="aa-add-card-btn" href="add-cart.php?id=<?php echo $new_items['id']; ?>&return_url=<?php echo $ReturnURL; ?>"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a> 
                                    <figcaption>
                                    <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $new_items['id']; ?>"><?php echo $new_items['name']; ?></a></h4>
                                    <span class="aa-product-price"><?php echo number_format($new_items['price']); ?>₫</span>
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
                      <a class="aa-browse-btn" href="product.php?sort=Đầm">Xem thêm<span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / dam product category -->
                  </div>             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="img/index/bn34.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <!-- <li class="active"><a href="#popular" data-toggle="tab">HÀNG MỚI</a></li> -->
                <li class="active"><a href="#featured" data-toggle="tab">BÁN CHẠY</a></li>                 
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    <?php
                        $new_query="SELECT * FROM products where ratings = 2 order by id limit 8";
                        $new_res = mysqli_query($conn,$new_query);
                        while ($new_items = mysqli_fetch_array($new_res))
                        { ?>
                            <li>
                              <figure>
                                <a class="aa-product-img" href="product-detail.php?id=<?php echo $new_items['id']; ?>"><img style="height: 300px;width: 250px" src="<?php echo $new_items['images']; ?>" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn" href="add-cart.php?id=<?php echo $new_items['id']; ?>&return_url=<?php echo $ReturnURL; ?>"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a> 
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $new_items['id']; ?>"><?php echo $new_items['name']; ?></a></h4>
                                  <span class="aa-product-price"><?php echo number_format($new_items['price']); ?>₫</span>
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
                  <a class="aa-browse-btn" href="product.php?fill=2">Xem thêm<span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->         
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>MIỄN PHÍ VẬN CHUYỂN</h4>
                <P>Dành cho các sản phẩm đủ điều kiện</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>7 ngày đổi trả</h4>
                <P>Bạn có thể đổi trả sản phẩm trong vòng 7 ngày</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>Hỗ trợ 24/7</h4>
                <P>Chúng tôi có đội ngũ sẽ hỗ trợ bạn hết mình</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>TIN TỨC</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="img/index/blog1.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>15K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>826</a>
                      <a href="#"><i class="fa fa-comment-o"></i>120</a>
                      <span href="#"><i class="fa fa-clock-o"></i>12/03/2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Đón Hè rực rỡ với trang sức kim cương 8 Hearts and 8 Arrows</a></h3>
                    <p>Mùa hè – mùa mang đậm những dấu ấn rực rỡ của tự nhiên, đồng thời cũng là mùa của sự cuồng nhiệt và tràn đầy cảm hứng, đang đến gần. Các nhà mốt bắt đầu tung ra những Bộ sưu tập thời trang và trang sức đình đám, nhằm xua tan đi sự u ám của một năm đại dịch.</p> 
                    <a href="#" class="aa-read-mor-btn">Đọc thêm <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="img/index/blog2.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>25K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>1226</a>
                      <a href="#"><i class="fa fa-comment-o"></i>520</a>
                      <span href="#"><i class="fa fa-clock-o"></i>10/03/2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Những mẫu váy không thể thiếu trong hành lí đi biển Hè 2021</a></h3>
                    <p>Những kì nghỉ về vùng biển xanh mát với cát vàng lấp lánh cùng tiếng sóng vỗ rì rào luôn là lựa chọn nghỉ dưỡng đầu tiên xuất hiện trong tâm trí chúng ta mỗi khi Hè tới. Và để chuyến đi chơi thêm phần rạng rỡ dưới nắng Hè thì không thể thiếu những món đồ thời trang...</p> 
                     <a href="#" class="aa-read-mor-btn">Đọc thêm <span class="fa fa-long-arrow-right"></span></a>         
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="img/index/blog3.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>28K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>1426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>760</a>
                      <span href="#"><i class="fa fa-clock-o"></i>21/02/2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">3 xu hướng phụ kiện thời trang không thể bỏ lỡ trong mùa Hè 2021</a></h3>
                    <p>Và trong mùa Xuân – Hè 2021 này những xu hướng tới gần với bạn nhất? Hãy bắt đầu từ những chiếc túi nhỏ xíu tựa như vỏ đựng điện thoại di động mà trên sàn diễn từng hiện lên “crossbody phone case”. Hãy đến với chi tiết chần bông “quilted” – biểu tượng...</p> 
                    <a href="#" class="aa-read-mor-btn">Đọc thêm<span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container" >
      <div class="row">
        <div class="col-md-12" >
          <div class="aa-client-brand-area" >
            <ul class="aa-client-brand-slider" >
              <li><a href="#"><img src="img/index/sl1.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl2.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl4.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl5.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl6.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl7.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl8.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="img/index/sl9.jpg" alt="java img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

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
  <!-- <script src="js/login.js"></script>  -->

  </body>
</html>