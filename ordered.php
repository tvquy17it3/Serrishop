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
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="img/user11.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <!-- <h4><?php echo $ho_ten;?></h4> -->
                              <!-- <p class="text-secondary mb-1">Kh??ch h??ng th??n thi???t</p> -->
                              <p class="text-muted font-size-sm">Kh??ch h??ng th??n thi???t</p>
                              <button class="btn btn-primary">Theo d??i</button>
                              <button class="btn btn-outline-primary">Tin nh???n</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <span class="text-secondary"><a href="profile.php">H??? s?? c???a t??i</a> </span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-truck" aria-hidden="true" ></i>
                            <span class="text-secondary"><a href="ordered.php">Tr???ng th??i ????n h??ng</a></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-heart" aria-hidden="true" style="color: red"></i>
                            <span class="text-secondary"><a href="">Y??u th??ch</a></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <p style="align-content: center; margin-top: 5px;margin-right: 8px;"> <a href="contact.php" style="float: right;color: red">Ph???n h???i</a> </p>
                        <div class="card-body">
                          <div class="row">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">H??? t??n</th>
                                  <th scope="col">S??? ??T</th>
                                  <th scope="col">T???ng ti???n</th>
                                  <th scope="col">Ng??y ?????t</th>
                                  <th scope="col">Tr???ng th??i</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $email= $_SESSION['username'];
                                  $sql = "SELECT * FROM donhang where email='$email' ORDER BY id DESC";
                                  $results = $conn->query($sql);
                                  if ($results->num_rows > 0) {
                                      while($obj = $results->fetch_object()) {
                                        echo "<tr>";
                                        // `id`, `name`, `email`, `phone`, `address`, `discount`, `total`, `orderdate`, `status`
                                        echo "<td>".$obj->name."</td>";
                                        echo "<td>".$obj->phone."</td>";
                                        echo "<td>".number_format($obj->total)."??</td>";
                                        echo "<td>".$obj->orderdate."</td>";
                                        switch ($obj->status) {
                                          case 0:
                                              echo "<td>Ch??a x??c nh???n</td>";
                                             break;
                                          case 1:
                                              echo "<td>???? x??c nh???n</td>";
                                             break;
                                          case 2:
                                              echo "<td>??ang v???n chuy???n</td>";
                                              break;
                                          case 3:
                                              echo "<td>Ho??n th??nh</td>";
                                            break;
                                          case 4:
                                              echo "<td>???? h???y</td>";
                                              break;
                                          default:
                                                echo "<td>???? h???y</td>";
                                              break;
                                      }
                                        echo "<td><a href='orderDetail.php?id_order=".$obj->id."' style='color:blue'>Chi ti???t</a></td>";
                                        echo "</tr>";
                                      }
                                  }
                                ?>
                              </tbody>
                            </table>
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
                  <h3>V??? CH??NG T??I</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Gi???i Thi???u Serri Shop</a></li>
                    <li><a href="#">Ch????ng Tr??nh</a></li>
<!--                     <li><a href="#">Blogger Th???i Trang</a></li> -->
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>H??? TR??? KH??CH H??NG</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Ph?? V???n Chuy???n</a></li>
                      <li><a href="#">Tr??? L???i</a></li>
                      <li><a href="#">H?????ng D???n ?????t H??ng</a></li>
                      <li><a href="#">L??m Th??? N??o ????? Theo D??i</a></li>
                      <li><a href="#">H?????ng D???n K??ch Th?????c</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>D???CH V??? KH??CH H??NG</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Li??n H??? Ch??ng T??i</a></li>
                      <li><a href="#">Ph????ng Th???c Thanh To??n</a></li>
                      <li><a href="#">??i???m Th?????ng</a></li>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>K???T N???I V???I CH??NG T??I</h3>
                    <address>
                      <p>125 Nguy???n V??n Linh, ???? N???ng</p>
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
  </body>
</html>