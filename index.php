<?php
  // ini_set("display_errors","0");
  // $loi="";
  // composer dump-autoload
  require 'vendor/autoload.php';
  $list_prod = new ListProduct();
  require_once 'Component/layouts/header.php';
?>

  <!-- Start header section -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/img/slider/banner2.jpg" alt="slide img" />
              </div>
             
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/img/slider/banner1.jpg" alt="slide img" />
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
                    <img src="public/img/women/anhduoibn1.jpg" alt="img" style="height: 570px">
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
                      <img src="public/img/women/W1.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>MOTF PREMIUM</span>
                        <h4><a href="#"></a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="public/img/women/anhduoibn2.jpg.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        <h4><a href="#">#dailydrops</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="public/img/women/anhduoibn3.jpg.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>New</span>
                        <h4><a href="#">Serri BASICS</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="public/img/women/W2.jpg" alt="img">                      
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
                    <li class="active"><a href="#men" data-toggle="tab">H??ng m???i</a></li>
                    <li><a href="#women" data-toggle="tab">?????M</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- hang 1 san pham-->
                        <!-- start single product item -->
                      <?php   
                        $list_prod->Product('SELECT * FROM products order by id desc limit 8');
                      ?>
                      </ul>
                      <a class="aa-browse-btn" href="product.php">T???t c??? s???n ph???m <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->
                    <!-- start dam product category -->
                    <div class="tab-pane fade" id="women">
                      <ul class="aa-product-catg">
                        <?php     
                          $list_prod->Product("SELECT * FROM products where category=N'?????m' order by id desc limit 8");               
                        ?>
                      </ul>
                      <a class="aa-browse-btn" href="product.php?sort=?????m">Xem th??m<span class="fa fa-long-arrow-right"></span></a>
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
            <a href="#"><img src="public/img/index/bn34.jpg" alt="fashion banner img"></a>
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
                <!-- <li class="active"><a href="#popular" data-toggle="tab">H??NG M???I</a></li> -->
                <li class="active"><a href="#featured" data-toggle="tab">B??N CH???Y</a></li>                 
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    <?php     
                      $list_prod->Product("SELECT * FROM products where ratings = 2 order by id limit 8");               
                    ?>                            
                  </ul>
                  <a class="aa-browse-btn" href="product.php?fill=2">Xem th??m<span class="fa fa-long-arrow-right"></span></a>
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
                <h4>MI???N PH?? V???N CHUY???N</h4>
                <P>D??nh cho c??c s???n ph???m ????? ??i???u ki???n</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>7 ng??y ?????i tr???</h4>
                <P>B???n c?? th??? ?????i tr??? s???n ph???m trong v??ng 7 ng??y</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>H??? tr??? 24/7</h4>
                <P>Ch??ng t??i c?? ?????i ng?? s??? h??? tr??? b???n h???t m??nh</P>
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
            <h2>TIN T???C</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="public/img/index/blog1.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>15K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>826</a>
                      <a href="#"><i class="fa fa-comment-o"></i>120</a>
                      <span href="#"><i class="fa fa-clock-o"></i>12/03/2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">????n H?? r???c r??? v???i trang s???c kim c????ng 8 Hearts and 8 Arrows</a></h3>
                    <p>M??a h?? ??? m??a mang ?????m nh???ng d???u ???n r???c r??? c???a t??? nhi??n, ?????ng th???i c??ng l?? m??a c???a s??? cu???ng nhi???t v?? tr??n ?????y c???m h???ng, ??ang ?????n g???n. C??c nh?? m???t b???t ?????u tung ra nh???ng B??? s??u t???p th???i trang v?? trang s???c ????nh ????m, nh???m xua tan ??i s??? u ??m c???a m???t n??m ?????i d???ch.</p> 
                    <a href="#" class="aa-read-mor-btn">?????c th??m <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="public/img/index/blog2.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>25K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>1226</a>
                      <a href="#"><i class="fa fa-comment-o"></i>520</a>
                      <span href="#"><i class="fa fa-clock-o"></i>10/03/2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Nh???ng m???u v??y kh??ng th??? thi???u trong h??nh l?? ??i bi???n H?? 2021</a></h3>
                    <p>Nh???ng k?? ngh??? v??? v??ng bi???n xanh m??t v???i c??t v??ng l???p l??nh c??ng ti???ng s??ng v??? r?? r??o lu??n l?? l???a ch???n ngh??? d?????ng ?????u ti??n xu???t hi???n trong t??m tr?? ch??ng ta m???i khi H?? t???i. V?? ????? chuy???n ??i ch??i th??m ph???n r???ng r??? d?????i n???ng H?? th?? kh??ng th??? thi???u nh???ng m??n ????? th???i trang...</p> 
                     <a href="#" class="aa-read-mor-btn">?????c th??m <span class="fa fa-long-arrow-right"></span></a>         
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="public/img/index/blog3.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>28K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>1426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>760</a>
                      <span href="#"><i class="fa fa-clock-o"></i>21/02/2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">3 xu h?????ng ph??? ki???n th???i trang kh??ng th??? b??? l??? trong m??a H?? 2021</a></h3>
                    <p>V?? trong m??a Xu??n ??? H?? 2021 n??y nh???ng xu h?????ng t???i g???n v???i b???n nh???t? H??y b???t ?????u t??? nh???ng chi???c t??i nh??? x??u t???a nh?? v??? ?????ng ??i???n tho???i di ?????ng m?? tr??n s??n di???n t???ng hi???n l??n ???crossbody phone case???. H??y ?????n v???i chi ti???t ch???n b??ng ???quilted??? ??? bi???u t?????ng...</p> 
                    <a href="#" class="aa-read-mor-btn">?????c th??m<span class="fa fa-long-arrow-right"></span></a>
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
              <li><a href="#"><img src="public/img/index/sl1.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl2.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl4.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl5.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl6.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl7.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl8.jpg" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/index/sl9.jpg" alt="java img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->
   <?php 
      require_once 'Component/layouts/Subscribe.php';
      require_once 'Component/layouts/footer.php'; 
   ?>
  <script src="public/js/sequence.js"></script>
  <script src="public/js/sequence-theme.modern-slide-in.js"></script> 