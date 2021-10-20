<?php session_start(); 
 
if (isset($_SESSION['HoTenKH'])){
    unset($_SESSION['HoTenKH']); // xóa session login
}
header("location:index.php");
?>
