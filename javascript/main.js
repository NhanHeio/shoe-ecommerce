
function noUpdate(){
    alert("Tính năng chưa cập nhật!!!");
}

//load product trang chu
$(document).ready(function() {
    $(".category-link").click(function(event) {
        
        var nameCategory=event.target.id;
        $.ajax({
            url:"php/product.php",
            method:"POST",
            data: {nameCategory:nameCategory},
            dataType:'html',
            success:function(data) 
            {   
                $("#product_listItem").html(data); 
               // alert("OK");
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});

$(document).ready(function() {
    $(".admin-category-link").click(function(event) {
        
        var nameAdminCategory=event.target.id;
        $.ajax({
            url:"php/admincart.php",
            method:"POST",
            data: {nameAdminCategory:nameAdminCategory},
            dataType:'html',
            success:function(data) 
            {   
                $("#admin-list-item-cart").html(data); 
                // alert("OK");
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});


// mo trang san pham
$(document).ready(function() {
    $(".home-product-item1").click(function(event) {
        
        var idProduct=$(this).attr("id");
        event.preventDefault();
        $.ajax({
            url:"productdetail.php",
            method:"POST",
            data: {idProduct:idProduct},
            success:function(data) 
            {   
                window.location.href="/laptrinhweb/WebBH/productinfo.php";
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});
//them gio hang
$(document).ready(function() {
    //add item page when clicking add to cart
    $(document).on('click', '.addcart-btn',function(){
        //event.preventDefault();
        var itemCode = $(this).attr("id");
        var itemCount=$('#soluong').val();
        if ($("input[name='size']:checked").val())
        {
            var itemKindCode=$("input[name='size']:checked").val();
        }
        else
        {
            alert("Bạn phải chọn loại hàng !");
            return false;
        }
        alert(itemCode+"\n"+itemCount+"\n"+itemKindCode);
        $.ajax({
            url:"php/addcart.php",
            method:"POST",
            data: {itemCode:itemCode,itemCount:itemCount,itemKindCode:itemKindCode},
            dataType:'text',
            success:function(data)
            {
                
            },
            error:function(data)
            {
                alert("Không kết nối được đến server");
            }
        }); 
    });
});


//xoa item trong gio hang
$(document).ready(function() {
    $(".header__cart-item-remove").click(function(event) {
        
        var idProduct=$(this).attr("id");
        event.preventDefault();
        $.ajax({
            url:"php/removeitemcart.php",
            method:"POST",
            data: {idProduct:idProduct},
            success:function(data) 
            {   
                alert(data);
            },
            error:function(data)
            {
            }
        });
    });
});
//thanh toan
$(document).ready(function() {
    $("#confirm-buy-cod").click(function(event) {
        
        $.ajax({
            url:"php/confirmOrder.php",
            success:function(data) 
            {   
                alert(data);
            },
            error:function(data)
            {
            }
        });
    });
});

//edit profile
$(document).ready(function() {
    $("#edit-profile").click(function(event) {
        $.ajax({
            url:"php/editprofile.php",
            success:function(data) 
            {   
               alert("OK");
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});