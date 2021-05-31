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
                              echo '<a href="dash/index.php">Xin chào: '.$name.'</a> <a href="logout.php?return_url='.$ReturnURL.'">Đăng xuất</a>';
                            }
                            else
                            {
                              echo '<a href="profile.php">Xin chào: '.$name.'</a><a href="logout.php?return_url='.$ReturnURL.'">Đăng xuất</a>';
                            }
                          }
                          else
                          {
                            echo '<a href="account.php?return_url='.$ReturnURL.'">Đăng nhập</a>';
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
                        $item_result = mysqli_query($conn,$item_query);
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
                  <?php if ($th!=0): ?>
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