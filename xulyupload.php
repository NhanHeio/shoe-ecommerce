<?php
	function upload(){
		$conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
		$sql = "SELECT COUNT(*) FROM `hanghoa`";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		if($row['COUNT(*)']<=9){
			$MSHH = "HH00".($row['COUNT(*)']+1);
		}else{
			$MSHH = "HH0".($row['COUNT(*)']+1);
		}
		$TenHH = $_POST['TenHH'];
		$Gia = $_POST['Gia'];
        $SoLuongHang = $_POST['SoLuongHang'];
        $size39 = $_POST['Size39'];
        $size40 = $_POST['Size40'];
        $size41 = $_POST['Size41'];
        $MaNhom = $_POST['MaNhom'];
        $MoTaHH = $_POST['MoTaHH'];
        $Hinh = $MSHH . ".jpg";
		if (isset($_FILES['image-upload'])) {
            $fileTmpPath = $_FILES['image-upload']['tmp_name'];
            $fileName = $_FILES['image-upload']['name'];
            $fileSize = $_FILES['image-upload']['size'];
            $fileType = $_FILES['image-upload']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $uploadFileDir = 'C:\\xampp\\htdocs\\laptrinhweb\\WebBH\\img\\product\\';
            $dest_path = $uploadFileDir . $Hinh;
            move_uploaded_file($fileTmpPath, $dest_path);  
        }
        
		
		$addproduct = mysqli_query($conn, "
        INSERT INTO hanghoa(
            MSHH,
            TenHH,
            Gia,
            SoLuongHang,
            MaNhom,
			Hinh,
			MoTaHH
            )
        VALUES(
            '{$MSHH}',
            '{$TenHH}',
            '{$Gia}',
            '{$SoLuongHang}',
            '{$MaNhom}',
			'{$Hinh}',
			'{$MoTaHH}'
            )
    ");
    if($addproduct){
        mysqli_free_result($result);
        header("location:admin.php");
    }else{
        echo "Có lỗi xảy ra. Vui lòng upload lại!";
    }
    if(($size39 + $size40 +$size41) == $SoLuongHang){
        $sql1= "INSERT INTO `chitiethanghoa` VALUES ('{$MSHH}','39','{$size39}')";
        $sql2= "INSERT INTO `chitiethanghoa` VALUES ('{$MSHH}','40','{$size40}')";
        $sql3= "INSERT INTO `chitiethanghoa` VALUES ('{$MSHH}','41','{$size41}')";
        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);
        $result3 = mysqli_query($conn,$sql3);
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
    }else{
        echo 'Co loi xay ra';
    }
    }
    upload();
	?>