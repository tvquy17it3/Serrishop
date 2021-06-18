<?php
  $loi="";
  // $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);
  require 'vendor/autoload.php';
  require_once 'Component/layouts/header.php';
  $auth = new Auth();
  $auth->Chechauth();

  class Account extends Auth{
    public function Login_form($email,$pass)
    {
      if (!$this->Validate_email($email)) {
        echo "<p style='color: red'>Email không đúng định dạng!</p>";
     }else{
       $user = $this->Login($email,$pass);
       if($user){
         if (isset($_GET["return_url"])) {
           $return_url = base64_decode($_GET["return_url"]);
           echo("<script>location.href = '$return_url';</script>");
         } 
          echo("<script>location.href = 'index.php';</script>");
       }else{
         echo "<p style='color: red'>Sai email hoặc mật khẩu!</p>";
       }
     }
    }
  }

$account = new Account();
?>
  <?php 
    include("connect.php");
  ?>

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-5">
                <div class="aa-myaccount-login" style="margin-bottom: 15px;">
                <h4>Đăng nhập</h4>
                  <?php
                      if (isset($_POST["submitlogin"])) {
                        $email = $_POST["email1"];
                        $pass= $_POST["password1"];
                        $account->Login_form($email,$pass);
                      }
                  ?>          
          <form method="post" action="">
                <label id="result"></label><br/>
                  <div class="aa-login-form">
                     <label for="">Địa chỉ email:<span>*</span></label>
                     <input type="text" name="email1" required>
                     <label for="">Mật khẩu:<span>*</span></label>
                      <input type="password" placeholder="" name="password1" required>
                      <button class="aa-browse-btn" type="submit" name="submitlogin">Đăng nhập</button>
                      <!-- <label class="rememberme" for="rememberme"><input type="checkbox" name="remember" value="1" checked> Ghi nhớ tài khoản! </label> -->
                      <!-- <p class="aa-lost-password"><a href="#">Bạn quên mật khẩu?</a></p> -->
                  </div>
                </form>
                </div>
                <div>
                  <p>Quên mật khẩu? hoặc Đăng ký</p>
                  <div>
                    <img src="public/img/logingf.jpg" width="455" >
                  </div>
               </div>
              </div>
              <div class="col-md-1" style="border-right: 1px solid #e5e5e5;height: 400px"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="aa-myaccount-register">                 
                 <h4>Đăng ký</h4>
                    <?php
                      if(isset($_POST['submitdk']))
                        { 
                          $name=$_POST['fullname'];
                          $email =$_POST['email'];
                          $pw2=md5($_POST['password2']);
                          $pw22=md5($_POST['password22']);
                          include("connect.php");

                          if(!$name || !$email || !$pw2 || !$pw22)
                          {
                            $loi="Vui lòng nhập thông tin đầy đủ!";
                          }
                          else
                          {
                            $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                            $result = mysqli_query($conn, $user_check_query);
                            $user = mysqli_fetch_assoc($result);
                            
                            if ($user) {
                              if ($user['email'] === $email) {
                                $loi="<p style='color: red'>Email này đã tồn tại!!</p>";
                              }
                            }else{
                              if($pw2 == $pw22)
                              {
                                $query = "INSERT INTO users (name, email, password, active) VALUES('$name', '$email', '$pw2',2)";
                                    mysqli_query($conn, $query);
                                $loi="<p style='color: red'>Đăng ký thành công!!</p>";
                                $_SESSION['username'] = $email;
                                $_SESSION['password']=$pw2;
                                echo("<script>alert('Đăng ký thành công!');location.href = 'index.php';</script>");
                              }
                              else
                              {
                                $loi="Xác nhận mật khẩu không trùng khớp!";
                              }
                            }
                          }
                          echo $loi;
                        }
                      ?>

                 <form method="post" action="" class="aa-login-form">
                    <label for="">Họ tên:<span>*</span></label>
                    <input type="text" placeholder="" name="fullname" required>
                    <label for="">Địa chỉ email:<span>*</span></label>
                    <input type="text" placeholder="" name="email" required>
                    <label for="">Mật khẩu:<span>*</span></label>
                    <input type="password" placeholder="" name="password2" required>
                    <label for="">Xác nhận mật khẩu:<span>*</span></label>
                    <input type="password" placeholder="" name="password22" required>
                    <button type="submit" name="submitdk" class="aa-browse-btn">Đăng ký</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 <?php 
      require_once 'Component/layouts/Subscribe.php';
      require_once 'Component/layouts/footer.php'; 
 ?>