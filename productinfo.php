<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    
    include "top.php"
?>
<?php

echo '<div id="product" class="grid__row">
            <div class="grid__col-2"></div>
            <div class="grid__col-4">
                <img class="home-product-detail-img" src="img\\product\\'.$_SESSION["Hinh"].'" alt="">
            </div>
            <div class="grid__col-4">
                <h2 class="home-product-detail-name">Tên hàng hóa:  '. $_SESSION['TenHH'].' </h2>
                <h3 class="home-product-detail-price">Giá bán:  '. $_SESSION['Gia'].' </h3>
                <h3 class="home-product-detail-decription">Mô tả hàng hóa: '. $_SESSION['MoTaHH'].' </h3>
                <h3 class="home-product-detail-decription">Số lượng còn lại: '. $_SESSION['SL'] .' </h3>
                
                <div class="home-product-modify">
                    <span class="radio-size"><input type="radio" name="size" value="39" checked="checked">Size: 39</span>
                    <span class="radio-size"><input type="radio" name="size" value="40">Size: 40<span>
                    <span class="radio-size"><input type="radio" name="size" value="41">Size: 41</span>
                </div>
                <p style="font-size:18px">Số Lượng <input id="soluong" type="text" name="soluong" ></p> 
                <button type="submit" id="'. $_SESSION["MSHH"] .'" class="btn btn--primary addcart-btn">Thêm vào giỏ hàng</button>
                
            </div>         
            </div>
    <div class="grid__col-2"></div>';
?>
<?php
    include("bottom.php");
?>