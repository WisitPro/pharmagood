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
    <title>Pharma Good | เจ้าของกิจการ | รายการยาและเวชภัณฑ์</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductListN.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="AdminHomePage">หน้าหลัก</a>
            <div class="dropdown">
                <button class="dropbtn">เมนู <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a  href="AdminListPage">ข้อมูลผู้ใช้งาน</a>
                    <a  href="ProductListPage">รายการสินค้า</a>
                    <a  href="">ข้อมูลร้องขอคำปรึกษา</a>
                    <a  href="">ข้อมูลการชำระเงิน</a>
                </div>
            </div>
            <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>
    <p style="font-size:20px; margin-left:190px; color:white">สำหรับเจ้าของกิจการ</p>


    <form action="Product_Add" method="POST">
        <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มเพิ่มสินค้า</p>
        <!-- <input type="text" name="pro_id"  style="visibility:hidden ;position:absolute" value="<?php echo $row->pro_id + 1 ?>"> -->


        <input type="text" class="head pro_id" name="pro_id" placeholder="รหัสสินค้า*" maxlength="13" onkeypress='validate(event)'>
        <input type="text" class="head pro_name" name="pro_name" placeholder="ชื่อสินค้า*">
        <select name="pro_type" class="head ">
            <option disabled selected hidden style="color:#FF5353;">ประเภทยารักษา</option>
            <option>ยาลดกรด แก้ท้องอืด</option>
            <option>ยาบรรเทาอาการท้องเสีย</option>
            <option>ยาระบายแก้ท้องผูก</option>
            <option>ยาแก้ปวด ลดไข้</option>
            <option>ยาแก้แพ้ คัน ผื่น</option>
            <option>ยาแก้ไอ ขับเสมหะ</option>
            <option>ยาทาผิวหนัง</option>
            <option>ยาดม ยาหม่อง</option>
            <option>เวชภัณฑ์</option>
            <option>อุปกรณ์อื่นๆ</option>


        </select>






        <input type="text" class="head pro_price" name="pro_price" placeholder="ราคา*" onkeypress='validate(event)'>


        <br><br>
        <p id="img">ลิ้งค์รูปภาพ: <input type="text" class=" pro_img" name="pro_img">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" name="pro_kind" value="ยาทั่วไป" checked> ยาทั่วไป &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" name="pro_kind" value="ยาผ่านเภสัชกร"> ยาผ่านเภสัชกร

        </p>







        <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
        <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>

    </form>

    <div id="container">


        <p style="font-size:32px; margin-left:auto; color:white">รายการยาและเวชภัณฑ์</p>
        <div id="backform">
            <table id="myTable" class="tablesorter">

                <tr id="tr1">

                    <th onclick="sortTable(0)" style="width:3% ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">#</th>
                    <th onclick="sortTable(0)" class="dt" style="width:10% ;border-right: 1px solid #b6b6b6;">รหัสสินค้า</th>
                    <th  style="width:6% ;border-right: 1px solid #b6b6b6;text-align:center;">รูปภาพ</th>

                    <th  class="dt" style="width:25% ;border-right: 1px solid #b6b6b6;">ชื่อสินค้า</th>
                    <th  class="dt" style="width:16% ;border-right: 1px solid #b6b6b6;">ประเภทยา</th>
                    <th  class="dt" style="width:7% ;border-right: 1px solid #b6b6b6;">ราคา</th>

                    <th  class="dt" style="width:10% ;">ชนิดยา</th>
                    <th style="width:8% ;"></th>

                </tr>
                
                    <?php
                    $item = 1;

                    foreach ($tbl_product as $row) {



                    ?><tbody>

                        <tr id="tr2">
                            <th class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></th>
                            <td class="data dt" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_id; ?></td>

                            <td class="data"style="border-right: 1px solid #b6b6b6" ><?php echo ' <img style="width: 50px;height:50px;margin-left:13px;color:#F69A56;"  src="' . $row->pro_img . '" alt="ไม่มีรูปภาพ"> ' ?></td>

                            <!-- <td class="data"><img style="width: 30px;height:30px src="<?php echo base_url();
                                                                                            $row->pro_img ?>"></td> -->
                            <td class="data dt"style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_name; ?></td>
                            <td class="data dt"style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_type; ?></td>
                            <td class="data " style="color:#eb0e0e;border-right: 1px solid #b6b6b6;text-align:right;padding-right:8px"><?php echo $row->pro_price; ?></td>


                            <td class="data dt"><?php echo $row->pro_kind; ?></td>
                            <td id="btnTable">
                                <a id="Edit" href='Product_Edit?pro_id=<?php echo $row->pro_id; ?>'>แก้ไข</a>
                                <a id="Remove" href='Product_Remove?pro_id=<?php echo $row->pro_id; ?>'>ลบ</a>

                            </td>
                        </tr></tbody>
                    <?php
                        $item++;
                    }

                    ?>


                



            </table>
            


        </div><br><br><br><br>
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


