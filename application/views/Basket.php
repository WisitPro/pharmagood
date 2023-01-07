
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/BasketN.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/UpdateCart.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>


<body>

    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="HomePage3">หน้าหลัก</a>

            <a id="btCart" href="Basket"><i class="fa-solid fa-basket-shopping"></i> ตะกร้าสินค้า</a>
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

        <th width="30%">Product</th>
        <th width="20%">Price</th>
        <th width="13%">Quantity</th>
        <div id="subtractadd">
     
     </div>
        <th width="30%" class="text-right">Subtotal</th>
        <th width="12%"></th>
    </tr>
</thead>
<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
    <tr>
        
        <td><?php echo $item["name"]; ?></td>
        <td id="price"><?php echo ''.$item["price"].' THB'; ?></td>
        
        <td><input type="button" name="subtract" id="subtract" value="-"></input> <input type="text" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">  
     <input type="button" name="add" id="add" value="+"></input></td>
   
        <td class="text-right"><?php echo ''.$item["subtotal"].' THB'; ?></td>
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
        <td class="text-right"><strong><?php echo ''.$this->cart->total().' THB'; ?></strong></td>
        <td></td>
    </tr>
    <?php } ?>
</tbody>
</table>

        </div>
        <div class="allpricetotal">
        

        </div>
        <button href="checkout.php" id="btGo">ชำระเงิน</button>

        <?php
        // mysql_close();
        ?>

    </div>

</body>

</html>
<script>
    function Out() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = 'CusLogout';


    }
</script>