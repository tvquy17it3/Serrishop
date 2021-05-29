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
 <?php 
  include("menu.php");
?>

<?php //cap nhat lai gia khi nhap vao so luong
  if(isset($_POST['update_cart']))
  {
    foreach($_POST['num'] as $id => $prd)//prd la gia tri nhap vao.moi id tuong ung voi so luong nhap vao
    {
      if(($prd > 0) and (is_numeric($prd)))//nhap vao so luong >0  thi tiep tuc tinh
      {
        $_SESSION['cart'][$id] = $prd;
      }
    }
  }
?>

<?php //check code
  if(isset($_POST['check_code']))
  {
    $idcode1 = $_POST["idcode"];
    $sqlcheck = "SELECT * from code where idcode = '$idcode1'";
    $resultCode = $conn->query($sqlcheck);
    if ($resultCode->num_rows !=0) {
        $_SESSION['idcode'] = $idcode1;
        echo("<script>location.href = 'cart.php';</script>");
    }else{
      echo '<script language="javascript">';
      echo 'alert("Mã không tồn tại!")';
      echo '</script>';
    } 

  }
?>

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table" style="border: 1px solid #fff;border-radius: 10px; background: #f9f9f9;box-shadow: 1px 1px 1px 3px #e9e9e9;">
               <div class="table-responsive">
                 <h3 style="font-weight: bold;"><?php if($th!=0) {echo "Tóm tắt mặt hàng (".$th.")";} else {echo"Bạn chưa chọn sản phẩm nào!";} ?></p> <small></small>
                </h3>
                <?php if ($th!=0): ?>
                 <form method="post">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sum_all = 0;
                        $sum_sp = 0;
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
                                <td><a href="product-detail.php?id=<?php echo $rows['id']; ?>"><img src="<?php echo $rows['images']; ?>" alt="img"></a></td>
                                <td><a class="aa-cart-title" href="product-detail.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></a>
                                  <br/>
                                  Size:
                                  <select name="ipsize" style="background: none repeat scroll 0 0 #FFFFFF;
                                    border: 1px solid #E5E5E5;
                                    border-radius: 5px 5px 5px 5px;
                                    box-shadow: 0 0 5px #E8E8E8 inset;
                                    ">
                                    <?php 
                                        $strsize = $rows['size'];
                                        $varSize = explode(',', $strsize);
                                        foreach ($varSize as $value) {
                                          echo "<option value='".$value."'>".$value."</option>";
                                        }
                                    ?>
                                  </select>
                                </td>
                                
                                <?php 
                                  $min = $rows['status'] == 0 ? 0 : 1; 
                                  $max = $rows['status'] == 0 ? 0 : $rows['status'];  
                                ?>

                                <td><?php echo number_format($rows['price']); ?>₫</p></td>
                                <td>
                                  <input class="aa-cart-quantity" type="number" name ="num[<?php echo $rows['id']; ?>]" max="<?php echo $max;?>" min="<?php echo $min;?>" value="<?php if ($max==0) { echo 0; }else echo $_SESSION['cart'][$rows['id']]; ?>">
                                </td>
                                <td><?php echo number_format($rows['price']*$_SESSION['cart'][$rows['id']]); ?>₫</td>
                                <?php 
                                      $sum_all += $rows['price']*$_SESSION['cart'][$rows['id']]; 
                                  ?>
                                <td>
                                  <a class="aa-remove-product" href="delcart.php?id=<?php echo $rows['id'];?>&return_url=<?php echo $ReturnURL; ?>"><span aria-hidden="true"><i class="fa fa-close" style="color: red;"></i></span></a>
                                    
                                </td>
                              </tr>
                        <?php     
                          }
                        }
                     ?>

                      <tr>
                        <td colspan="7" class="aa-cart-view-bottom">
                          <form method="post">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Nhập mã" name="idcode">
                            <input class="aa-cart-view-btn" type="submit" value="Kiểm tra" name="check_code">
                          </div>
                          </form>
                            <input class="aa-cart-view-btn" type="submit" name="update_cart" value="Cập nhật lại giỏ hàng">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                  </form>
                  <?php endif ?>
                </div>

            <?php if ($th!=0): ?>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Tính tiền</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng tiền hàng</th>
                     <td><?php echo number_format($sum_all); ?>₫</td>
                   </tr>
                   <tr>
                     <th>Mã: 
                      <?php
                          if($idcode){
                            echo $idcode;
                          }
                          $giam=0;
                      ?>
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
                              echo "0đ";
                            }
                          }else{
                            echo "0đ";
                          }
                        ?>
                     </td>
                   </tr>
                   <tr>
                     <th>Tổng cộng</th>
                     <td><?php echo number_format($sum_all-$giam); ?>₫</td>
                   </tr>
                 </tbody>
               </table>
                <a href="checkout.html" class="aa-cart-view-btn">mua hàng</a>
             </div>
             <?php endif ?>
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
              <span class="fa fa-cc-discover"></span>
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