<?php
  session_start();
  // ini_set("display_errors","0");
  // $loi="";
  $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
  date_default_timezone_set ("Asia/Saigon"); 
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
      echo("<script>location.href = 'index.php';</script>");
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
    <title>Serri Shop | Success</title>
    
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
  <body>
    <?php 
      include("connect.php");
    ?>

  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- Start header section -->
 <?php 
  include("menu.php");
?>

<section id="aa-subscribe">
<form method="post">
  <div class="main-shopping">
    <?php
          $khachhang = mysqli_query($conn,"SELECT * FROM users WHERE email ='".$_SESSION['username']."'");
          $items = mysqli_fetch_array($khachhang);
    ?>
    <?php
      if(isset($_GET['btOrder']) && isset($_SESSION['username']) && isset($_SESSION['cart']) )
    {
      $sum_all = 0;
      $now = getdate();
      $giam = 0;
      $currentDate =$now["hours"].":".$now["minutes"].":".$now["seconds"]." ".$now["mday"] . "/" . $now["mon"] . "/" . $now["year"] ; 
      if($_SESSION['cart'] != NULL)
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
          $sum_all += $rows['price']*$_SESSION['cart'][$rows['id']]; 
        }

        if($idcode)
        {
          $sqlcheck = "SELECT * from code where idcode = '$idcode'";
          if ($resultCode = $conn->query($sqlcheck)) {
            while($rs = mysqli_fetch_array($resultCode))
            {
              $giam = ($sum_all/100 )* $rs['percent'];
            } 
          }else{
              $giam = 0;
          }
        }
        $sum_all = $sum_all - $giam + 20000;
        $insertDonhang = mysqli_query($conn,"INSERT INTO donhang (name, email, phone, address, discount, total, orderdate, status) VALUES ('".$items['name']."','".$items['email']."','".$items['phone']."','".$items['address']."','".$giam."','".$sum_all."','".$currentDate."','0')"); 
         
        if ($insertDonhang) {
          $errors = 0;
          $id_order= mysqli_insert_id($conn);
          $item_result = mysqli_query($conn,$item_query);
          while ($rows = mysqli_fetch_array($item_result))
          {
            $insert1 = mysqli_query($conn,"INSERT INTO orderdetail (idordered, idproduct, name, qty , price, orderdate, status) 
            VALUES ('".$id_order."','".$rows['id']."','".$rows['name']."','".$_SESSION['cart'][$rows['id']]."','".$rows['price']."','".$currentDate."','0')"); 
              if (!$insert1) {
                  $errors = 1;
                  echo "???? c?? l???i x???y ra: ".mysqli_error($conn);
              }
          }
          if ($errors==0) {
            unset($_SESSION['cart']);
            unset($_SESSION['idcode']);
            echo '<script language="javascript">';
            echo 'alert("?????t h??ng th??nh c??ng!");';
            echo("location.href = 'ordered.php';");
            echo '</script>';
          }
        }else {
            echo "???? c?? l???i x???y ra: ".mysqli_error($conn);
          }
      }
    }else{
      echo("<script>location.href = 'index.php';</script>");
    }
  ?>
</form>
 </section>


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>????ng k?? nh???n tin</h3>
            <p>H??y ????? l???i email c???a b???n ????? nh???n th??ng b??o m???i nh???t c???a ch??ng t??i!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Email">
              <input type="submit" value="????ng k??">
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
              <span class="fa fa-cc-discover"></span>
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