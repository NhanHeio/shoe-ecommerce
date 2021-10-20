<?php
    session_start();
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    $query = mysqli_query($conn,"SELECT COUNT(SoDonDH) FROM `dathang`");
    $row = mysqli_fetch_assoc($query);
    $SoDonDH = "DH".($row['COUNT(SoDonDH)']+1);
    $mskh = $_SESSION['MSKH'];
    $result = mysqli_query($conn,"
        insert into `dathang` 
            VALUES(
                '{$SoDonDH}',
                '{$mskh}',
                'NV001',
                '2021-01-01',
                'unconfirmed')"
            );
    
        $result1 = mysqli_query($conn,"SELECT * FROM `giohang` WHERE MSKH = '$mskh'");
        while($row1 = mysqli_fetch_assoc($result1)){
            $mshh = $row1['MSHH'];
            $sl = $row1['SoLuong'];
            $size = $row1['Size'];
            $tenhh = $row1['TenHH'];
            $result2 = mysqli_query($conn,"SELECT Gia FROM `hanghoa` WHERE MSHH = '$mshh'");
            $row2 = mysqli_fetch_assoc($result2);
            $gia = $row2['Gia'];
            $result3 = mysqli_query($conn,"
                INSERT INTO `chitietdathang` 
                    VALUES(
                        '{$SoDonDH}',
                        '{$mshh}',
                        '{$sl}',
                        '{$size}',
                        '{$tenhh}',
                        '{$gia}')
                        ");
            $result5 = mysqli_query($conn,"UPDATE `hanghoa` SET SoLuongHang = (SoLuongHang-'$sl') WHERE MSHH = '$mshh'");
            $result6 = mysqli_query($conn,"UPDATE `chitiethanghoa` SET SoLuong = (SoLuong-'$sl') WHERE MSHH = '$mshh' AND Size = '$size' ");
        }
        $result4 = mysqli_query($conn,"DELETE FROM `giohang` WHERE MSKH = '$mskh'");
        
    
?>