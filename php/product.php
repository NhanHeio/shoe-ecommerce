<?php
    $conn = new mysqli('localhost','root','','qlbh') or die('Ket noi that bai');
    session_start();
    if (isset($_POST['nameCategory']))
    {
        $name=$_POST['nameCategory'];
        $query = mysqli_query($conn,"SELECT * FROM `nhomhanghoa` WHERE TenNhom = '$name'");
        $r = mysqli_fetch_assoc($query);
        $manhom = $r['MaNhom'];
        $sql = "SELECT * FROM `hanghoa` WHERE MaNhom = '$manhom'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result)){
                
                echo '<div class="grid__col-2-10">
                    <a href="#" id="'. $row['MSHH'] .'" class="home-product-item1">
						<div class="home-product-item">
							<img class="home-product-item-img" src="img\\product\\'.$row["Hinh"].'" alt="">
							<div class="home-product-info">
								<span class="home-product-item-name">'.$row["TenHH"] .'</span>
								<span class="home-product-item-price">'. $row["Gia"].'VND</span>
							</div>
						</div></a>
					</div>';
            }

        }
        
    }
?>