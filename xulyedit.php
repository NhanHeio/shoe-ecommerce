<?php
    function edit(){
        $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
        $MSHH = $_POST['MSHH'];
        $TenHH = $_POST['TenHH'];
	    $Gia = $_POST['Gia'];
	    $SoLuongHang = $_POST['SoLuongHang'];
        $MaNhom = $_POST['MaNhom'];
        $MoTaHH = $_POST['MoTaHH'];
        $size39 = $_POST['Size39'];
        $size40 = $_POST['Size40'];
        $size41 = $_POST['Size41'];
        $sql = "UPDATE `hanghoa` SET `TenHH`='{$TenHH}',`Gia`='{$Gia}',`SoLuongHang`='{$SoLuongHang}',`MaNhom`='{$MaNhom}',`MoTaHH`='{$MoTaHH}' WHERE `MSHH`='{$MSHH}'";
        $result = mysqli_query($conn,$sql);
        if(($size39 + $size40 + $size41)==$SoLuongHang){
            $sql1="UPDATE `chitiethanghoa` SET `MSHH`='{$MSHH}',`Size` = '39',`SoLuong`=$size39";
            $sql2="UPDATE `chitiethanghoa` SET `MSHH`='{$MSHH}',`Size` = '40',`SoLuong`=$size40";
            $sql3="UPDATE `chitiethanghoa` SET `MSHH`='{$MSHH}',`Size` = '40',`SoLuong`=$size41";
            $result1 = mysqli_query($conn,$sql1);
            $result2 = mysqli_query($conn,$sql2);
            $result3 = mysqli_query($conn,$sql3);
        }
        mysqli_free_result($result);
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
    }
    edit();
    header("location:admin.php");
?>