<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    session_start();
    $mshh=$_POST['itemCode'];
    $sl=$_POST['itemCount'];
    $size=$_POST['itemKindCode'];
    if(isset($_SESSION["MSKH"]))
    {
        $id=$_POST['itemCode'];
        $mskh = $_SESSION['MSKH'];
        $sql = "SELECT * FROM `hanghoa` WHERE MSHH = '$id'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $tenhh = $row['TenHH'];
            $soluonghang = $row['SoLuongHang'];
            
        }
        
            $query = mysqli_query($conn,"INSERT INTO `giohang` VALUES ('$mskh','$mshh','$tenhh','$size','$sl')");
        
              
    }else echo "Not login";
?>

