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
    <title>Serri Shop | Product Detail</title>
    
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
  include("connect.php");
?>  
     <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- Start header section -->
<?php 
  include("menu.php");
?> 


  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <?php
                  if(!isset($_GET['id'])){
                    header('location:index.php');
                  }
                  $id = $_GET['id'];
                  $sanpham ="SELECT * FROM products where id=".$id;
                  $sanpham_res = mysqli_query($conn,$sanpham) or die("Cannot select table!");
                  while ($sanpham_items = mysqli_fetch_array($sanpham_res))
                  {
                ?>
                  <div class="row">
                    <!-- Modal view slider -->
                    <div class="col-md-5 col-sm-5 col-xs-12">                              
                      <div class="aa-product-view-slider">                                
                        <div id="demo-1" class="simpleLens-gallery-container">
                          <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container"><a data-lens-image="<?php echo $sanpham_items['images']; ?>" class="simpleLens-lens-image"><img src="<?php echo $sanpham_items['images']; ?>" class="simpleLens-big-image"></a></div>
                          </div>
                          <div class="simpleLens-thumbnails-container">
                              <a data-big-image="<?php echo $sanpham_items['images']; ?>" data-lens-image="<?php echo $sanpham_items['images']; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                                <img src="<?php echo $sanpham_items['images']; ?>" style="width: 45px;height: 55px;">
                              </a>  

                              <a data-big-image="<?php echo $sanpham_items['images']; ?>" data-lens-image="<?php echo $sanpham_items['images']; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                                <img src="<?php echo $sanpham_items['images']; ?>" style="width: 45px;height: 55px;">
                              </a>

                              <a data-big-image="<?php echo $sanpham_items['images']; ?>" data-lens-image="<?php echo $sanpham_items['images']; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                                <img src="<?php echo $sanpham_items['images']; ?>" style="width: 45px;height: 55px;">
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal view content -->
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="aa-product-view-content">
                        <h3><?php echo $sanpham_items['name']; ?></h3>
                        <div class="aa-price-block">
                          <span class="aa-product-view-price"><?php echo number_format($sanpham_items['price']);?>₫</span>
                          <p class="aa-product-avilability">Tình trạng: 
                            <?php 
                              $countsp = $sanpham_items['status'];
                              if($countsp >0 ){
                                  echo "<span style='color: green'>Còn hàng</span>";
                              }else{
                                echo "<span style='color: red'>Hết hàng</span>";
                              }
                            ?></p>
                        </div>
                        <!-- <p>Chất liệu: Acetic Acid<br/>
                          Màu sắc: Trắng và Xám
                        </p> -->
                        <h4>Size </h4>
                        <div class="aa-prod-view-size">
                          <?php 
                              $strsize = $sanpham_items['size'];
                              $varSize = explode(',', $strsize);
                              foreach ($varSize as $value) {
                                echo "<a>$value</a>";
                              }
                          ?>
                          <!-- <a href="#">S</a> -->
                         <!--  <a href="#">M</a>
                          <a href="#">L</a> -->
                        </div>
                        <h4>Màu sắc: <?php echo $sanpham_items['colors']; ?></h4>
                        <div class="aa-color-tag">
                          <!--  <a href="#" class="aa-color-yellow"></a>   -->                
                          <!-- <a href="#" class="aa-color-pink"></a> -->
                          <a href="#" class="aa-color-white"></a>                      
                        </div>
                        <div class="aa-prod-quantity">
                          <form action="">
                            <select id="" name="">
                              <?php 
                                if ($countsp > 0) {
                                  for ($i=1; $i <= $countsp; $i++) { 
                                    if ($i<=8) {
                                      echo "<option value='$i'>$i</option>";
                                    }else{
                                      break;
                                    }
                                  }
                                }
                              ?>
<!--                               <option selected="1" value="0">1</option>
                              <option value="1">2</option>
                              <option value="2">3</option>
                              <option value="3">4</option>
                              <option value="4">5</option> -->
                            </select>
                          </form>
                          <p class="aa-prod-category">
                            Danh mục: <a href="#"><?php echo $sanpham_items['category']; ?></a>
                          </p>
                        </div>
                        <div class="aa-prod-view-bottom">
                          <a class="aa-add-to-cart-btn" href="add-cart.php?id=<?php echo $sanpham_items['id']; ?>&return_url=<?php echo $ReturnURL; ?>">Thêm vào giỏ hàng</a>
                          <a class="aa-add-to-cart-btn" href="#">So sánh</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Mô tả</a></li>
                <li><a href="#review" data-toggle="tab">Đánh giá</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p style="font-weight: bold;">Chất Liệu & Chi Tiết</p>
                  <ul>
                    <li><?php echo $sanpham_items['description']; ?></li>
                  </ul>
                </div>
              <?php                  
             }
            ?>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>Đánh giá về sản phẩm(2)</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/index/dieumy.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>My</strong> - <span>20/01/2021</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <p>Chất liệu tốt, hỗ trợ nhiệt tình, giao hàng nhanh.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/index/thuthang.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Thu Thắng</strong> - <span>12/02/2021</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Ổn trong tầm giá.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Đánh giá ngay</h4>
                   <div class="aa-your-rating">
                     <p>Chọn</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Hãy chia sẻ cảm nhận của bạn về sản phẩm</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
<!--                       <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div> -->

                      <button type="submit" class="btn btn-default aa-review-submit">Đánh giá</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Gợi ý cho bạn</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <?php
                  $new_query="SELECT * FROM products order by id desc limit 8";
                  $new_res = mysqli_query($conn,$new_query) or die('Cannot select table!');
                  while ($new_items = mysqli_fetch_array($new_res))
                  { ?>
                      <li>
                        <figure>
                          <a class="aa-product-img" href="product-detail.php?id=<?php echo $new_items['id']; ?>"><img style="height: 300px;width: 250px" src="<?php echo $new_items['images']; ?>" alt="polo shirt img"></a>
                          <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
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
            </div>  
          </div>
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