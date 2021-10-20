<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    session_start();
    if (isset($_POST['nameAdminCategory']))
    {
        $name=$_POST['nameAdminCategory'];
        if($name == 'all-order'){
            $sql = "SELECT * FROM `dathang`";
        }else if($name =='unconfirmed-order'){
            $sql = "SELECT * FROM `dathang` WHERE Trangthai = 'unconfirmed'";
        }else{
            $sql = "SELECT * FROM `dathang` WHERE Trangthai = 'confirmed'";
        }
        $query = mysqli_query($conn,$sql);
        echo '<table border="1" cellspacing="0">
                <tr>
                    <td class = "product-text">Số Đơn</td>
                    <td class = "product-text">MSKH</td>
                    <td class = "product-text">Ngày đặt hàng</td>
                    <td class = "product-text">Tên HH</td>
                    <td class = "product-text">Size</td>
                    <td class = "product-text">Số lượng</td>
                    <td class = "product-text">Giá</td>
                    <td class = "product-text">Trạng thái</td>
                </tr>';
        if(mysqli_num_rows($query)){

            while($r = mysqli_fetch_assoc($query)){
                $sodon = $r['SoDonDH'];
                $mskh = $r['MSKH'];
                $date =$r['NgayDH'];
                $status=$r['TrangThai'];
                $result = mysqli_query($conn,"SELECT * FROM chitietdathang WHERE SoDonDH = '$sodon'");
    
                    if($row = $result->fetch_assoc()){
    
                        echo '<tr>
                            <td class = "product-text">'.$sodon.'</td>
                            <td class = "product-text">'. $mskh .'</td>
                            <td class = "product-text">'. $date .'</td>
                            <td class = "product-text">'.$row['TenHH'].'</td>
                            <td class = "product-text">'. $row['Size'] .'</td>
                            <td class = "product-text">'. $row['SoLuong'] .'</td>
                            <td class = "product-text">'. $row['Gia'] .'</td>';
                            if($status == 'unconfirmed'){
                                echo '<td class = "product-text">
                                <form method="POST" action="php/adminconfirm.php">
                                    <button type="submit" class="btn btn--primary">Xác nhận</button>
                                    <input type="hidden" name="SoDonDH" value="'. $sodon .'">
                                </form>
                                </td>';
                            }else{
                                echo '<td class = "product-text">Đã xác nhận</td>';
                            }                        
                            echo '</tr>';
                        
                    }
                }
        }else{
            echo '<tr>
            <td class = "product-text" colspan="8">Không có đơn đơn hàng</td>
            </tr>';
        }
            echo '</table>';
        }
        
    
?>