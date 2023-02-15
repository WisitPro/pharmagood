<?php
foreach ($tbl_product as $row) {
    $pro_id = $row->pro_id;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductList.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    <br><br><br>




    <form action="Product_Add" method="POST" autocomplete="off">
        <p style="font-size: 28px;">ฟอร์มเพิ่มสินค้า</p>
        <!-- <input type="text" name="pro_id"  style="visibility:hidden ;position:absolute" value="<?php echo $row->pro_id + 1 ?>"> -->


        <input type="text" class="pro_id" name="pro_id" placeholder="รหัสสินค้า*" maxlength="13" onkeypress='validate(event)' required>
        <input type="text" class="pro_name" name="pro_name" placeholder="ชื่อสินค้า*" required>&nbsp;
        <select name="type_id" id="selectlist" required>
            <option disabled selected hidden style="color:#FF5353;">ประเภทยารักษา</option>
            <?php foreach ($product_type as $type) { ?>
                <option value="<?php echo $type->type_id ?>"><?php echo $type->type_name ?></option>
            <?php } ?>
        </select>
        <div style="height:10px"></div>

        <span id="line2">

            <input type="text" class="pro_price" name="pro_price" placeholder="ราคา*" onkeypress='validate(event)' required>

            <input type="text" class=" pro_img" name="pro_img" placeholder=" ลิ้งค์รูปภาพ "> <input type="number" style="width: 160px;" name="pro_limit" placeholder="จำนวนจำกัดซื้อ"><br>
            <div style="height:10px"></div>
            <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" checked> ยาสามัญประจำบ้าน </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="pro_kind" value="ยาควบคุมพิเศษ"> ยาควบคุมพิเศษ </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="pro_kind" value="เวชภัณฑ์"> เวชภัณฑ์ </label>
        </span>

        <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
        <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>
    </form>

    <div id="container">


        <p style="font-size:32px; margin-left:auto; color:white">รายการยาและเวชภัณฑ์</p>
        <div id="back">
            <table class="table">
                <thead >

                    <tr id="tr1">
                        <th style="min-width: 40px;color:#F69A56" class="text-center">#</th>
                        <th style="min-width: 160px;" >รหัสสินค้า</th>
                        <th style="min-width: 60px;" class="text-center">รูปภาพ</th>
                        <th style="min-width: 300px;">ชื่อสินค้า</th>
                        <th style="min-width: 200px;">ประเภทยา</th>
                        <th style="min-width: 100px;" class="text-right">ราคา</th>                    
                        <th style="min-width: 130px;" class="text-center">จำนวนจำกัดซื้อ</th>
                        <th style="min-width: 90px;"></th>
                    </tr>
                </thead>
                <?php
                $item = 1;
                foreach ($tbl_product as $row) {
                ?><tbody>
                        <tr id="tr2" >
                            <th class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></th>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_id; ?></td>
                            <td class="data text-center" style="border-right: 1px solid #b6b6b6"><?php echo ' <img style="width: 54px;height:54px;color:#F69A56;"  src="' . $row->pro_img . '" alt="ไม่มีรูปภาพ"> ' ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_name; ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->type_name; ?></td>
                            <td class="data " style="color:#eb0e0e;border-right: 1px solid #b6b6b6;text-align:right;padding-right:8px"><?php echo $row->pro_price; ?></td>
                            <td class="data text-center"><?php echo $row->pro_limit; ?></td>
                            <td id="btnTable">
                                <a id="Edit" href='Product_Edit?pro_id=<?php echo $row->pro_id; ?>'>แก้ไข</a>
                                <a id="Remove" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่');" href='Product_Remove?pro_id=<?php echo $row->pro_id; ?>'>ลบ</a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    $item++;
                }
                ?>
            </table><br><br><br><br>
            </div>
    </div>
</body>

</html>
<script>
    function validate(evt) { //รับค่าเฉพาะตัวเลข
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

<script>
    // function sortTable(n) {
    //   var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    //   table = document.getElementById("myTable");
    //   switching = true;
    //   //Set the sorting direction to ascending:
    //   dir = "asc"; 
    //   /*Make a loop that will continue until
    //   no switching has been done:*/
    //   while (switching) {
    //     //start by saying: no switching is done:
    //     switching = false;
    //     rows = table.rows;
    //     /*Loop through all table rows (except the
    //     first, which contains table headers):*/
    //     for (i = 1; i < (rows.length - 1); i++) {
    //       //start by saying there should be no switching:
    //       shouldSwitch = false;
    //       /*Get the two elements you want to compare,
    //       one from current row and one from the next:*/
    //       x = rows[i].getElementsByTagName("TD")[n];
    //       y = rows[i + 1].getElementsByTagName("TD")[n];
    //       /*check if the two rows should switch place,
    //       based on the direction, asc or desc:*/
    //       if (dir == "asc") {
    //         if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
    //           //if so, mark as a switch and break the loop:
    //           shouldSwitch= true;
    //           break;
    //         }
    //       } else if (dir == "desc") {
    //         if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
    //           //if so, mark as a switch and break the loop:
    //           shouldSwitch = true;
    //           break;
    //         }
    //       }
    //     }
    //     if (shouldSwitch) {
    //       /*If a switch has been marked, make the switch
    //       and mark that a switch has been done:*/
    //       rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //       switching = true;
    //       //Each time a switch is done, increase this count by 1:
    //       switchcount ++;      
    //     } else {
    //       /*If no switching has been done AND the direction is "asc",
    //       set the direction to "desc" and run the while loop again.*/
    //       if (switchcount == 0 && dir == "asc") {
    //         dir = "desc";
    //         switching = true;
    //       }
    //     }
    //   }
    // }
</script>