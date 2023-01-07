<?php
foreach ($tbl_orderList as $row) {
    $ol_id = $row->ol_id;
}

?>

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
            <table>
                <tr1>
                    <th>
                        สินค้า
                    </th>
                    <th>
                        จำนวน
                    </th>
                    <th>
                        ราคา
                    </th>


                </tr1>
                <?php

                foreach ($tbl_orderList as $row) {

                ?>
                    <tr>
                        <td><?php echo $row->ol_id; ?></td>

                        <td><?php echo $row->pro_id; ?></td>
                        <td><?php echo $row->qty; ?></td>


                    </tr>
                <?php

                }

                ?>

            </table>



        </div>

        <p id="total">รวมทั้งหมด:</p>

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