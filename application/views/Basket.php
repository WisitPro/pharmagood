
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
// Update item quantity
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}

</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/BasketC.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/UpdateCart.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/qty.js"></script> -->
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>


<body>

    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="controller/HomePage3">หน้าหลัก</a>

            <a id="btCart" href="Cart"><i class="fa-solid fa-basket-shopping"></i> ตะกร้าสินค้า</a>
            <a id="btOut" onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>

    </nav>
    <a onclick="window.history.back()"><button id="p2"><i class="fa-solid fa-caret-left"></i> กลับ</button></a>
    <p id="p1">ตะกร้าสินค้าของฉัน</p>


    <div id="p3">
        <div id="p4">
        <table class="table table-striped">
        <thead>
    <tr>

        <th style="width:30%;" >Product</th>
        <th >Price</th>
        <th style="width:20%;">Quantity</th>
        <div id="subtractadd">

     </div>
        <th  class="text-right">Subtotal</th>
        <th ></th>
    </tr>
</thead>

<!-- <script>
    function incrementValue()
    {   
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        
    }
    function notincrementValue()
    {
        var value = parseInt(document.getElementById('number').value, 0);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number').value = value;
    }
</script> -->
    <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
        <tr>
            
            <td><?php echo $item["name"]; ?></td>
            <td id="price"><?php echo ''.$item["price"]; ?></td>
            
            <td >
            <form id="myform">
            <input style="width:30px" type="button" value="-"  class="minus" />       
        <input style="width:60px" type="text" id="qty1" value="<?php echo $item["qty"]; ?>" class="qty"  />       
        
        <input style="width:30px" type="button" value="+"  class="add" />  
    </form>

            <!-- <div class="input-group">
        <span class="input-group-btn">
         <input type="button" value="+" id="add1" class="add" />       
        </span>
        <input type="text" class="qty form-control no-padding text-center item-quantity"  id="qty1" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
        <span class="input-group-btn">
           <input type="button" value="-" id="minus1" class="minus" /><br /><br />
        </span>
    </div> -->


    
            <td class="text-right"><?php echo ''.$item["subtotal"].' บาท'; ?></td>
 
            <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;"><i class="itrash"></i> </button> </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="6"><p>Your cart is empty.....</p></td>
        <?php } ?>
        <?php if($this->cart->total_items() > 0){ ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong></strong></td>
            <td><strong>Cart Total</strong></td>
            <td class="text-right"><strong><?php echo '$'.$this->cart->total().' USD'; ?></strong></td>
            <td></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>

        </div>
        <div class="allpricetotal">
        

        <button href="checkout.php" id="btGo">ชำระเงิน</button>

        <?php
        // mysql_close();
        ?>

    </div>
    

</body>

</html>
<script>
    function Out() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = 'controller/CusLogout';


    }
</script>