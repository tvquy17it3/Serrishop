<?php
require 'vendor/autoload.php';

class HeaderAC extends database{
    public  $prd = 0;
    public  $th  = 0;
    public  $ReturnURL;
    public  $sum_all;
    protected $name;
    protected $email;
    protected $phone;
    protected $address;
    protected $level=2;
    protected $gender;

    public function CartCheck()
    {
        if(isset($_SESSION['cart']))
        {
            $this->prd = count($_SESSION['cart']);
            $this->th = $this->prd;
            if ($this->prd==0) {
            unset($_SESSION['cart']);
            }
        }
    }

    public function User()
    {   
        $this->ReturnURL= base64_encode($_SERVER['REQUEST_URI']);
        if (isset($_SESSION['username']))
        { 
            $name= $_SESSION['username'];
            // $pass1=$_SESSION['password'];            
            $this->select("SELECT * FROM users where email='$name'");
            while ($user=$this->fetch()){
                $this->level   = $user->active;
                $this->name    = $user->name;
                $this->email   = $user->email;
                $this->address = $user->address;
                $this->phone   = $user->phone;
            }
            if($this->level == 1)
            {
                echo '<a href="dash/index.php">Xin chào: '.$this->name.'</a> <a href="logout.php?return_url='.$this->ReturnURL.'">Đăng xuất</a>';
            }
            else
            {
                echo '<a href="profile.php">Xin chào: '.$this->name.'</a><a href="logout.php?return_url='.$this->ReturnURL.'">Đăng xuất</a>';
            }
        }
        else
        {
            echo '<a href="account.php?return_url='.$this->ReturnURL.'">Đăng nhập</a>';
        }
    }

    public function Cart()
    {
        $this->sum_all = 0;
        $this->ReturnURL= base64_encode($_SERVER['REQUEST_URI']);
        if(isset($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $id =>$this->prd)
            {
                $arr_id[] = $id;
            }

            $str_id = implode(',',$arr_id);
            $this->select("SELECT * FROM  products WHERE id IN ($str_id) ORDER BY id ASC");
            while ($rows=$this->fetch()){
            {
                $this->sum_all += $rows->price*$_SESSION['cart'][$rows->id];
                echo "<li>
                <a class='aa-cartbox-img' href='product-detail.php?id=$rows->id'><img src='$rows->images' alt='img'></a>
                <div class='aa-cartbox-info'>
                    <h4><a href='product-detail.php?id=$rows->id'>$rows->name</a></h4>
                    <p>".$_SESSION['cart'][$rows->id]." x ".number_format($rows->price)."</p>
                </div>
                <a class='aa-remove-product' href='delcart.php?id=$rows->id&return_url=$this->ReturnURL'><span class='fa fa-times'></span></a>
                </li> ";

            }
            }
        }
    }
}