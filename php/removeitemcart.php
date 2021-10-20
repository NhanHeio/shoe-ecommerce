<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    session_start();
    if (isset($_POST['idProduct']))
    {
        $mskh = $_SESSION['MSKH'];
        $id=$_POST['idProduct'];
        //  echo "$id";
        // echo "$mskh";
        $query = mysqli_query($conn,"DELETE FROM `giohang` WHERE MSHH = '$id' AND MSKH = '$mskh'");
        
        
    }
?>