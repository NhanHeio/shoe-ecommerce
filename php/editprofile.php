<?php
     session_start();
     $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    $mskh = $_SESSION['MSKH'];
    $hoten = $_POST['HoTenKH'];
    $diachi = $_POST['DiaChi'];
    $sdt = $_POST['SDT'];
    $email = $_POST['Email'];
    $result = mysqli_query($conn,"UPDATE `khachhang`
        SET 
            HoTenKH = '{$hoten}',
            DiaChi = '{$diachi}',
            SoDienThoai = '{$sdt}',
            Email = '{$email}'
        WHERE MSKH = '$mskh'
    ");
    header("location:/laptrinhweb/WebBH/profile.php")
?>