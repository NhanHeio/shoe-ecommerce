<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    session_start();
    if (isset($_POST['idProduct']))
    {
        $id=$_POST['idProduct'];
        $query = mysqli_query($conn,"SELECT * FROM `hanghoa` WHERE MSHH = '$id'");
        $mskh = $_SESSION['MSKH'];
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                $_SESSION['MSHH'] = $id;
                $_SESSION['TenHH'] = $row['TenHH'];
                $_SESSION['Gia'] = $row['Gia'];
                $_SESSION['MoTaHH'] = $row['MoTaHH'];
                $_SESSION['Hinh'] = $row['Hinh'];
                $_SESSION['SL'] = $row['SoLuongHang'];
            }
        }         
              
    }
?>