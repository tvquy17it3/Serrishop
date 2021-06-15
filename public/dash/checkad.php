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
            $nameAd =$user_info['name'];
        }    
      }
      if($level != 1)
      {
        echo("<script>location.href = '../index.php';</script>");
      }
    }
    else
    {
      echo("<script>location.href = '../index.php';</script>");
    }
?>