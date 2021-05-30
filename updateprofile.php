<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  include("connect.php");
  if (!isset($_SESSION['username'])){
      header("Location:account.php");
  } 
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
  
?>

<?php

 // so san pham da add vao cart
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
    <!-- https://www.bootdey.com/snippets/view/profile-with-data-and-skills -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Serri Shop | Contact</title>
    
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
    <link href="css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="css\toastr.css" rel="stylesheet"/>
    <style type="text/css">
      .main-body {
          padding: 15px;
          margin-bottom: 100px;
      }
      .card {
          box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
      }

      .card {
          position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          background-color: #fff;
          background-clip: border-box;
          border: 0 solid rgba(0,0,0,.125);
          border-radius: .25rem;
      }

      .card-body {
          flex: 1 1 auto;
          min-height: 1px;
          padding: 1rem;
      }

      .gutters-sm {
          margin-right: -8px;
          margin-left: -8px;
      }

      .gutters-sm>.col, .gutters-sm>[class*=col-] {
          padding-right: 8px;
          padding-left: 8px;
      }
      .mb-3, .my-3 {
          margin-bottom: 1rem!important;
      }

      .bg-gray-300 {
          background-color: #e2e8f0;
      }
      .h-100 {
          height: 100%!important;
      }
      .shadow-none {
          box-shadow: none!important;
      }

    </style>


  </head>
  <body> 
  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- Start header section -->
 <?php 
  include("menu.php");
?>
  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="container">
            <div class="main-body">
              <?php
                $email= $_SESSION['username'];
               $sql = "SELECT * FROM users where email='$email'";
                $results = $conn->query($sql);
                if ($results->num_rows > 0) {
                    while($obj = $results->fetch_object()) {
                        $ho_ten=$obj->name;
                        $email =$obj->email;
                        $dien_thoai =$obj->phone;
                        $gioi_tinh =$obj->gender;
                        $dia_chi =$obj->address;
                   }
                }
              ?>
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="img/user11.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4><?php echo $ho_ten;?></h4>
                              <!-- <p class="text-secondary mb-1">Khách hàng thân thiết</p> -->
                              <p class="text-muted font-size-sm">Khách hàng thân thiết</p>
                              <button class="btn btn-primary">Theo dõi</button>
                              <button class="btn btn-outline-primary">Tin nhắn</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                           <span class="text-secondary"><a href="profile.php">Hồ sơ của tôi</a> </span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-truck" aria-hidden="true" ></i>
                            <span class="text-secondary">Trạng thái đơn hàng</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-heart" aria-hidden="true" style="color: red"></i>
                            <span class="text-secondary"><a href="wishlist.html">Yêu thích</a></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <?php
                      if (isset($_POST["submit_update"])) {
                          $ho_ten = $_POST["ho_ten"];
                          $dien_thoai=$_POST["dien_thoai"];
                          $dia_chi=$_POST["dia_chi"];

                          if(isset($_POST['gioi_tinh'])){
                              $gioi_tinh = $_POST['gioi_tinh'];
                            } else {
                                $gioi_tinh= "";
                            }
                            $email= $_SESSION['username'];
                            $sql3="UPDATE users SET name='$ho_ten',phone='$dien_thoai', gender='$gioi_tinh',address='$dia_chi' WHERE email='$email'";
                            $result3 = $conn->query($sql3);
                            if ($result3) {
                              echo '<h2 class="mb-0" style="color: blue">Cập nhật thành công!!</h2>';
                            }
                            
                        }
                      ?>
                      <form action="" method="POST">
                      <div class="card mb-3">
                        <p style="align-content: center; margin-top: 5px;margin-right: 8px;"> <a href="profile.php" style="float: right;color: red">Huỷ</a> </p>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Họ Tên</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input class="form-control" type="text" value="<?php echo $ho_ten;?>" name="ho_ten">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Số điện thoại</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input class="form-control" type="text" value="<?php echo $dien_thoai;?>" name="dien_thoai">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Địa chỉ</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input class="form-control" type="text" value="<?php echo $dia_chi;?>" name="dia_chi">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Giới tính</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              Nam <input type="radio" name="gioi_tinh" value="Nam" <?php if (isset($gioi_tinh) && $gioi_tinh=="Nam") { echo "checked"; }  ?>  >
                              Nữ <input type="radio" name="gioi_tinh" value="Nữ" <?php if (isset($gioi_tinh) && $gioi_tinh=="Nữ") { echo "checked"; } ?> >
                            </div>
                          </div>
                          <div class="row" >
                              <div class="col-sm-3"></div>
                              <div class="col-sm-3">
                                <input type="submit" class="btn btn-primary" value="Cập nhật" name="submit_update">
                              </div>
                              <div class="col-sm-3"></div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
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
  <script src="js\toastr.js"></script>
<!--   <script type="text/javascript">
    $(document).ready(function() {
      
          if (sessionStorage.getItem("profile") == "ok") {
            toastr["success"]("Cập nhật thành công!");
            sessionStorage.removeItem('profile');
          }
    })
   function jsfunction() {
     alert(sessionStorage.getItem("profile"));
   }
</script> -->
  </body>
</html>