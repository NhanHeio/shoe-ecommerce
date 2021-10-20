<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    include "top.php"
?>
<?php
    $mskh = $_SESSION['MSKH'];
    $result = mysqli_query($conn,"SELECT * FROM `khachhang` WHERE MSKH = '$mskh'");
    $row = mysqli_fetch_assoc($result);
echo '<div id="product" class="grid__row">
            <div class="grid__col-2"></div>
            <div class="grid__col-4">
                <img class="avatar" src="img\\avatar\\'.$mskh.'.jpg" alt="">
            </div>
            <div class="grid__col-4"><form action="php/editprofile.php" method="POST">
                <h3 class="profile-info">Họ và tên :<input type="text" name="HoTenKH" placeholder=" '. $row['HoTenKH'].'"></h3>
                <h3 class="profile-info"> :Địa chỉ :<input type="text" name="DiaChi" placeholder=" '. $row['DiaChi'].'"> </h3>
                <h3 class="profile-info">SDT:<input type="text" name="SDT" placeholder=" '. $row['SoDienThoai'].'"> </h3>
                <h3 class="profile-info">Email:<input type="text" name="Email" placeholder=" '. $row['Email'] .'"> </h3>
                <button type="submit" id="edit-profile" class="btn btn--primary">Chỉnh sửa thông tin</button>
                
            </div>         
            </div>
    <div class="grid__col-2"></div>';
?>
<?php
    include("bottom.php");
?>