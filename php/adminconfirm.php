<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    session_start();
    if (isset($_POST['SoDonDH']))
    {
        $msnv = $_SESSION['MSNV'];
        $name=$_POST['SoDonDH'];
        $query = mysqli_query($conn,"UPDATE `dathang` SET MSNV = '$msnv', TrangThai = 'confirmed' WHERE SoDonDH = '$name'");


         header("location:admin.php");
    }
?>