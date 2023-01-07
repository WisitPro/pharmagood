<?php
foreach($emails as $row){
    $email=$row->email;
    $tag=$row->tag;
    $note=$row->note;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>หน้าหลัก</title>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');

    body {

        background-color: #ffffff;
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


    *:hover {
        color: rgba(0, 0, 0, 0.3);
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
        width: 226px;
        max-height: 130px;
        height: 30%;
        margin-left: -10px;
        margin-top: 805px;
        background: #E1D3AD;

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

        background: #FFFBF0;
        border: 1px solid #50452A;
        border-radius: 10px;
        text-align: center;

    }

    * {
        -webkit-text-fill-color: black;
        transition: color .3s ease;

    }

    form {
        position: absolute;
        width: 500px;
        height: 680px;
        left: 700px;
        top: 100px;

        background: #FFFBF0;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

        border-radius: 10px;
    }

    #cross {
        background-color: #F27474;
        width: 30px;
        height: 30px;
        border: transparent;
        border-radius: 10px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        float: right;
        margin-right: 5px;
        margin-top: 5px;
    }

    h4 {
        font-weight: bold;
        margin-left: 200px;
        margin-top: 40px;
    }

    #area {
        font-size: 18px;
        font-weight: bold;
        margin-left: 60px;

    }

    #email {
        width: 380px;
        height: 40px;


        background: #ebebeb;
        border: 0.5px solid #949494;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;

        padding-left: 10px;
    }

    #tag {
        width: 380px;
        height: 40px;


        background: #FFFFFF;
        border: 0.5px solid #949494;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        padding-left: 10px;

    }



    textarea {
        width: 380px;
        height: 120px;
        background: #FFFFFF;
        border: 0.5px solid #949494;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        padding-left: 10px;
    }

    #cancel,
    #submit {
        width: 70px;
        height: 35px;
        border-radius: 10px;
        margin-top: 140px;
        font-weight: bold;

    }

    #cancel {
        margin-left: 290px;
        background-color: #F27474;
        border: transparent;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
    }

    #submit {
        margin-left: 5px;
        background-color: #A9EA92;
        border: transparent;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
    }
</style>
</head>


<body>
    <div id="banner"></div>
    <div id="tape"></div>
    <div id="circle"></div>
    <img id="logo" src="image/logo.png">
    <div id="userbox">
        <p>ชื่อผู้ใช้งาน</p>
    </div>
    <form action="update" method="post">
        <button id="cross" type="button"  onClick="window.location.replace('http://localhost/emailstock/index.php/controller/es_main');">
            <i class="fa-solid fa-xmark fa-xl"></i>
        </button>   
        
        <h4>แก้ไขข้อมูล</h4><br>
        <div id="area">

            <div>
                <label for="email">อีเมลล์ </label><br>
                <input id="email" type="email" name="email" readonly value="<?php echo $email; ?>"><div style="font-size:small;">(ไม่สามารถแก้ไขได้)</div>
                <font color="red"><?php echo form_error('email'); ?></font>
            </div><br>
            <div>
                <label for="tag">แท็ก</label><br>
                <input id="tag" type="text" name="tag" value="<?php echo $tag; ?>">
                <font color="red"><?php echo form_error('tag'); ?></font>
            </div><br>


            
            <label for="note">คำอธิบาย</label>
            <textarea name="note" id="note" ><?php echo $note; ?></textarea>
            <font color="red"><?php echo form_error('note'); ?></font>
        </div><br>

        </div>

        <button id="cancel" type="button"  onClick="window.location.replace('http://localhost/emailstock/index.php/controller/es_main');" value="Cancel">ยกเลิก</button>
        <button id="submit" type="submit" >ยืนยัน</button>




    </form>







</body>

</html>