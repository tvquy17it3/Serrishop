<?php
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
  require 'vendor/autoload.php';
  $className="class='productPage'";
  require_once 'Component/layouts/header.php';
  $list_prod = new ListProduct();
?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="public/img/index/bannerproduct.png" alt="fashion img" width="100%">
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
                <?php
                  $list_prod->Product($list_prod->QueryItems());
                  if ($list_prod->Countprd ==0) {
                    echo "<span class='example-val'><h3>Không có dữ liệu</h3></span>";
                  }
                ?>                             
              </ul> 
            </div>
            <?php if($list_prod->Countprd !=0 ): ?>
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
                    <li><a href="#">Có <?php echo $list_prod->Countprd?> kết quả!</a></li>
                  </ul>
                </nav>
              </div>
            <?php endif ?>
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
                  <span id="skip-value-lower" class="example-val" name="min">50.000</span> 
                  <span id="skip-value-upper" class="example-val" name="max">100.000</span>
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

  <?php 
      require_once 'Component/layouts/Subscribe.php';
      require_once 'Component/layouts/footer.php'; 
   ?>
   