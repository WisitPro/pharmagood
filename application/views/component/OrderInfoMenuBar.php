<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">


    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <style>
        span button {
            border-radius: 10px;
            border: none;
            width: 220px;
        }

        #spb1 {
            background-color: #F69A56;

        }

        #spb2 {
            background-color: #2fe150;
            margin-left: 3px;
        }

        #spb3 {
            background-color: #f74242;
            margin-left: 3px;
        }
        #spb4 {
            background-color: #329afc;
            margin-left: 3px;
        }

        .st {
            background-color: #d1d1d1;

        }

        .st2 {
            background-color: #2fe150;

        }

        .st3 {
            background-color: #f74242;

        }
        .st4 {
            background-color: #329afc;

        }
    </style>



</head>



<body>


    <br><br>
    <container>
        <span style="font-size:24px;">
            <a href="<?php echo base_url('index.php/OrderController/OrderInfo1') ?>"
             style=" margin-left:auto; color:white"><button id="spb1">คำสั่งซื้อที่รอยืนยัน</button></a>
            <a href="<?php echo base_url('index.php/OrderController/OrderInfo2') ?>"
             style=" margin-left:auto; color:white"><button id="spb2">คำสั่งซื้อที่ยืนยันแล้ว</button></a>
            <a href="<?php echo base_url('index.php/OrderController/OrderInfo4') ?>"
             style=" margin-left:auto; color:white"><button id="spb4">คำสั่งซื้อที่จัดส่งแล้ว</button></a>
            <a href="<?php echo base_url('index.php/OrderController/OrderInfo3') ?>"
             style=" margin-left:auto; color:white"><button id="spb3">คำสั่งซื้อที่ยกเลิก</button></a>
        </span>