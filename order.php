<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    
    include "top.php"
?>
<div class="grid__row">
    <div class="grid__col-2"></div>
<?php
    if(isset($_SESSION['HoTenKH'])){
        $mskh = $_SESSION['MSKH'];
        $result = mysqli_query($conn,"SELECT * FROM `khachhang` WHERE MSKH = '$mskh'");
        $row = mysqli_fetch_assoc($result);
        echo '<div class="grid__col-8">
        <div class="order">
        <h3 class="order-info">Tên khách hàng:'. $row['HoTenKH'] .'</h3>
        <h3 class="order-info">Đia chỉ:'. $row['DiaChi'] .'</h3>
        <h3 class="order-info">SDT:'. $row["SoDienThoai"] .'</h3>';
        $result1 = mysqli_query($conn,"SELECT * FROM `giohang` WHERE MSKH = '$mskh'");
        $thanhtoan = 0;
        while($row1 = mysqli_fetch_assoc($result1)){
            $mshh = $row1['MSHH'];
            $result2 = mysqli_query($conn,"SELECT Gia FROM `hanghoa` WHERE MSHH = '$mshh'");
            $row2 = mysqli_fetch_assoc($result2);
            $sl = $row1['SoLuong'];
            $gia = $row2['Gia'];
            $tong = $gia*$sl;
            $thanhtoan = $tong + $thanhtoan;
            echo '<div class = "order-pay">
                <h3 class="order-info">Tên hàng hóa :'. $row1['TenHH'] .'</h3>
                <h3 class="order-info">Size :'. $row1['Size'] .'</h3>
                <h3 class="order-info">Số lượng :'. $row1['SoLuong'] .'</h3>
                <h3 class="order-info">Giá :'. $row2['Gia'] .'</h3>
                <h3 class="order-info">Tổng giá :'. $tong .'</h3>
                </div>';
        }
        echo '<h3 class="order-info">Tổng tiền :'. $thanhtoan .'VND</h3>
            <div class="confirm-buy">
                <button id="confirm-buy-cod" class="btn btn--primary">Thanh toán khi nhận hàng</button>
                <button id="confirm-buy-credit" class="btn btn--primary" onclick="noUpdate();">Thanh toán online</button>
            </div>
        </div>
        </div>';
    }
?>        
    <div class="grid__col-2"></div>
</div>
<?php include ("bottom.php") ?>