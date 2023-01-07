<?php
foreach($users as $row){
    $username=$row->username;
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>หน้าหลัก</title>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');

    #settingbt{
        position: absolute;
        background-color: transparent;
        border: transparent;
        margin-left: 200px;
        margin-top: 5px;

    }
    .menu{
        position: absolute;
        display: none;
        width: 20%;
        max-height: 130px;
        height: 30%;
        margin-left: 216px;
        margin-top: 805px;

        background: #f1e2cd;
        
        
        
        font-size: 16px;
        border: transparent;
    }


    .removeRow {
        background-color: #e8e7c6;
        font-style: italic;
        border-bottom: solid 1px #ff4848;


    }

    body {

        background-color: #FFFBF0;
        font-family: 'Kanit', sans-serif;



    }

    body::-webkit-scrollbar,
    body::-webkit-scrollbar-thumb {
        width: 26px;
        border-radius: 13px;
        background-clip: padding-box;
        border: 7px solid transparent;

    }

    body::-webkit-scrollbar-track {
        width: 1px;

        background-clip: padding-box;
        border: 10px solid #504529;
    }

    body::-webkit-scrollbar-thumb {

        background-color: #E1D3AD;
    }

    body::-webkit-scrollbar-track {

        background-color: #FFFDEBFF;
    }



    #backbox::-webkit-scrollbar,
    #backbox::-webkit-scrollbar-thumb {
        width: 26px;
        border-radius: 13px;
        background-clip: padding-box;
        border: 10px solid transparent;

    }

    #backbox::-webkit-scrollbar-track {
        width: 26px;
        border-radius: 13px;
        background-clip: padding-box;
        border: 10px solid transparent;
    }

    #backbox::-webkit-scrollbar-thumb {

        background-color: #9d9d9d;

    }



    /*banner*/
    #banner {
        background-color: #4A422D;
        position: absolute;
        max-width: 226px;
        width: 12%;
        max-height: 100%;
        height: 100%;
        margin-left: -10px;
        margin-top: -10px;

    }

    #circle {
        position: absolute;
        max-width: 50px;
        max-height: 50px;
        width: 50px;
        height: 50px;
        background: #FFFBF0;
        border: 1px solid #50452A;
        border-radius: 50%;
        margin-left: 80px;
        margin-top: 813px;
        background-image: url("image/user icon.png");
        background-repeat: no-repeat;
        background-position: center;

    }

    #tape {
        position: absolute;
        width: 100%;
        max-height: 130px;
        height: 30%;
        margin-left: -10px;
        margin-top: 805px;
        background: #E1D3AD;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
    }

    #logo {
        position: absolute;
        max-width: 200px;
        width: 11%;
        margin-left: 5px;
    }

    #userbox {
        position: absolute;
        max-height: 50px;
        max-width: 192px;
        width: 11%;
        height: 50px;
        margin-top: 873px;
        margin-left: 11px;
        padding-top: 10px;
        font-weight: bold;
        background: #FFFBF0;
        border: 1px solid #50452A;
        border-radius: 10px;
        text-align: center;

    }

    #box {
        position: absolute;
        max-height: 50px;
        max-width: 450px;
        width: 20%;
        height: 50px;
        margin-top: 18px;
        margin-left: 320px;

        background: #E1DED6;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        text-indent: 59px;
        font-size: 16px;
        border: transparent;
    }

    .fa-magnifying-glass {
        position: absolute;
        margin-left: 340px;
        margin-top: 43px;
        color: gray;

    }

    #backbox {

        text-align: left;
        font-size: 20px;
        text-indent: 10px;
        display: block;
        overflow: auto;
        height: 635px;



    }

    #tbody {
        position: absolute;
        max-width: 2000px;
        width: 97%;
        height: 45px;
        margin-top: 18px;
        margin-left: 18px;
        background: #FFFBF0;

        border-radius: 10px;
    }

    #tbody2 {
        /*position: absolute;*/
        max-width: 2000px;
        width: 97%;
        height: 615px;
        margin-top: 50px;
        margin-left: 18px;
        background: #FFFBF0;

        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }


    .col1 {
        width: 80px;
        text-indent: 20px;
        /*background-color: #F27474;*/

    }

    .col2 {
        width: 380px;
        /*background-color: #ffff80;*/

    }

    .col3 {
        width: 270px;
        /*background-color: #80ff80;*/

    }

    .col4 {
        width: 450px;
        /*background-color: #0080ff;*/

    }

    .col5 {
        width: 60px;
        /*background-color: #ff80c0;*/

    }


    #button {
        position: absolute;
        margin-left: 710px;
        margin-top: 32px;

    }

    #insert,
    #delete_all,
    #ed ,#f5{
        height: 38px;
        border-radius: 10px;
        border: transparent;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        font-size: 16px;
        margin-left: 10px;

    }

    #ed {
        background-color: #ffff80;
    }

    #insert {
        background-color: #A9EA92;

    }

    #delete_all {
        background-color: #F27474;
    }

    #edit {

        background-color: transparent;
        border: transparent;



    }
    #f5{
        background-color: #77bcf4;
    }

    #bigbox {
        position: absolute;

        max-width: 2000px;
        width: 65%;
        height: 680px;
        margin-top: 90px;
        margin-left: 320px;

        background: #E1DED6;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
    }

    #backbox,
    thead,
    th {
        position: sticky;
        top: 0;
        z-index: 1;
    }

    * {
        -webkit-text-fill-color: black;
        transition: color .3s ease;

    }

    #row1 {

        background-color: #FFFBF0;
        height: 40px;
        font-size: 20px;


    }

    .hc1 {
        border-top-left-radius: 10px;



    }

    .hc5 {
        border-top-right-radius: 10px;
    }
</style>
</head>


<body>
    <div id="banner"></div>
    <div id="tape"><button id="settingbt"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></button></div>
    <div id="circle"></div>
    <img id="logo" >
    <div id="userbox" >
        <p><?php echo $row->username; ?></p>
    </div>
    
    
    
    <input type="text" id="box" placeholder="ค้นหา">
    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
    <div id="button">
        <a href="insert"><button id="insert" href='insert'><i class="fa-solid fa-plus"></i>&nbsp;เพิ่ม</button></a>
        <button id="delete_all" name="delete_all"><i class="fa-solid fa-trash-can"></i></i>&nbsp;ลบ</button>
        <!--<button id="ed" onclick="myFunction()"><i class="fa-solid fa-pencil"></i></i>&nbsp;แก้ไข</button>-->
        <a href="es_main"><button id="f5"><i class="fa-solid fa-arrow-rotate-right"></i>&nbsp;รีเฟรชเพจ</button></a>

    </div>


    <div id="bigbox">
        <div id="tbody">
            <table id="backbox">
                <thead>
                    <tr id="row1">
                        <th class="hc hc1 col1"><input type="checkbox" class="checkall">&nbsp;&nbsp;&nbsp;&nbsp;#</th>

                        <th class="hc hc2 col2">อีเมลล์</th>
                        <th class="hc hc3 col3">แท็ก</th>
                        <th class="hc hc4 col4"> คำอธิบาย</th>
                        <th class="hc hc5 col5"> </th>


                    </tr>

                </thead>
                <tbody>
                    <?php
                    foreach ($emails as $row) {
                    ?>


                        <tr>
                            <td style="text-indent: 20px" class="col1"><input type="checkbox" class="delete_checkbox " value="<?php echo $row->email; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$k += 1; ?></td>
                            <td class="col2"><?php echo $row->email; ?></td>
                            <td class="col3"><?php echo $row->tag; ?></td>
                            <td class="col4"><?php echo $row->note; ?></td>
                            <td class="col5 td5"><a href='edit?email=<?php echo $row->email; ?>'><button id="edit"><i class="fa-solid fa-pencil "></i></button></a></td>
                        </tr>


                    <?php
                    }

                    ?>
                </tbody>



            </table>
        </div>
        <div id="tbody2"></div>
    </div>
    <div class="menu">
        <h5  style="margin-top: 6px;margin-left:10px;">ตั้งค่า</h5>
    </div>
    


    <script type="text/javascript">
        $(document).ready(function() {
            $(".checkall").click(function() {
                /**ใส่สีให้ row ที่ checkbox ทำงาน */
                var checked_status = this.checked;
                $(".delete_checkbox").each(function() {
                    this.checked = checked_status;
                    if ($(this).is(':checked')) {
                        $(this).closest('tr').addClass('removeRow');
                    } else {
                        $(this).closest('tr').removeClass('removeRow');
                    }
                });
            });
            $('.delete_checkbox').on('click', function() {
                /** การทำงานของ checkbox ที่เช็คทั้งหมด */
                if ($('.delete_checkbox:checked').length == $('.delete_checkbox').length) {
                    $('.checkall').prop('checked', true);

                } else {
                    $('.checkall').prop('checked', false);
                }
            });
            $('.delete_checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $(this).closest('tr').addClass('removeRow');
                } else {
                    $(this).closest('tr').removeClass('removeRow');
                }
            });


        })
    </script>

    <script>
        $(document).ready(function() {
            /**การลบข้อมูลที่มีการเช็ค checkbox */
            $('#delete_all').click(function() {
                var checkbox = $('.delete_checkbox:checked');
                if (checkbox.length > 0) {


                    var checkbox_value = [];
                    $(checkbox).each(function() {
                        checkbox_value.push($(this).val());

                    });
                    var confirm = window.confirm("ยืนยันการลบข้อมูล");
                    if (confirm) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>controller/delete_all",
                            method: "POST",
                            data: {
                                checkbox_value: checkbox_value
                            },
                            success: function() {
                                
                                $('.removeRow').fadeOut(300);
                                $('.checkall').prop('checked', false);

                                
                            },
                        
                        })
                    }
                    else{
                        alert("ยกเลิกการลบข้อมูล")
                    };

                } else {

                    alert('เลือกอย่างน้อย 1 รายการ');
                }
            });

        });
    </script>

    <script type="text/javascript">
        $("tr").not(':first').hover( /** อีเวนท์ mouseover ไฮไลต์รายการข้อมูลที่เมาส์ไปชี้ */
            function() {
                $(this).css("background", "palegoldenrod");
            },
            function() {
                $(this).css("background", "");
            }
        );
    </script>
    <!--<script>
        function myFunction() {
            var x = document.getElementById("edit");
            if (x.style.visibility === "visible") {
                x.style.visibility = "hidden";
            } else {
                x.style.visibility = "visible";
            }
        }
    </script>-->
    








</body>



</html>