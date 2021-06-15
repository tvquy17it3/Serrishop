<?php
 require 'vendor/autoload.php';

 class ListProduct extends database{
    public $Countprd=0;
    public function Product($sql)
    {   
        $ReturnURL = base64_encode($_SERVER['REQUEST_URI']);            
        $this->select($sql);
        while ($new_items=$this->fetch())
        {
            $this->Countprd++;
            echo"<li>
                    <figure>
                        <a class='aa-product-img' href='product-detail.php?id=$new_items->id'>
                            <img style='height: 300px;width: 250px' src='$new_items->images' alt='polo shirt img'>
                        </a>";
                        if (is_numeric($new_items->status)> 0){
                            echo "<a class='aa-add-card-btn' href='add-cart.php?id=".$new_items->id."&return_url=".$ReturnURL."'><span class='fa fa-shopping-cart'></span>
                            Thêm vào giỏ hàng</a> ";
                        }
                            
                        echo "<figcaption>
                            <h4 class='aa-product-title'><a href='product-detail.php?id=$new_items->id'>$new_items->name</a></h4>
                            <span class='aa-product-price'>".number_format($new_items->price)."₫</span>
                            <p class='aa-product-descrip'>
                                Màu sắc: Trắng và Xám<br/>
                                Chất liệu: Thun 2 chiều<br/>
                                Đặc tính: Co giãn tốt, ít nhăn<br/>
                              </p>
                        </figcaption>
                    </figure>                        
                    <div class='aa-product-hvr-content'>
                        <a href='#' data-toggle='tooltip' data-placement='top' title='Yêu thích'><span class='fa fa-heart-o'></span></a>
                        <a href='#' data-toggle='tooltip' data-placement='top' title='So sánh'><span class='fa fa-exchange'></span></a>                        
                    </div>
                    <!-- product badge -->
                    <span class='aa-badge aa-hot' href='#'>HOT!</span>                   
                </li>";
        }
    }

    public function QueryItems()
    {
      if(isset($_GET['sort'])){
        $sorts= $_GET['sort'];
        $new_query="SELECT * FROM products where category=N'$sorts' order by id desc limit 12";
      }elseif (isset($_GET['fill'])) {
        $ratings= $_GET['fill'];
        $new_query="SELECT * FROM products where ratings = '$ratings' order by id limit 12";
      }elseif(isset($_GET['search'])){
        $search = $_GET['search'];
        $new_query="SELECT * FROM products where category = N'$search' or name =N'$search' order by id limit 12";
      }
      else{
        $new_query="SELECT * FROM products order by id desc limit 12";
      }
      return $new_query;
    }
 }
