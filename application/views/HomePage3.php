<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];
    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
} else {
    session_destroy();
    redirect('controller/LoginPage');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url(); ?>css/HomePage.css" rel="stylesheet">
</head>
<script>
    var myVar;
    function myFunction() {
        myVar = setTimeout(showPage, 1800);
    }
    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("page").style.display = "block";
    }
</script>
<body onload="myFunction()">
<?php if ($this->session->flashdata('order_success')) : ?>
            <script>
                var myVar;
                function myFunction() {
                    myVar = setTimeout(showPage, 1800);
                }
                function showPage() {
                    document.getElementById("loader").style.display = "none";
                    document.getElementById("page").style.display = "block";
                    document.getElementById("myModal").style.display = "block";
                }
            </script>
            <style>
                container {
                    display: none;
                }
                #myModal {
                    display: none;
                }
                #loader {
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    z-index: 1;
                    width: 120px;
                    height: 120px;
                    margin: -76px 0 0 -76px;
                    border: 16px solid #f3f3f3;
                    border-radius: 50%;
                    border-top: 16px solid #3498db;
                    -webkit-animation: spin 1s linear infinite;
                    animation: spin 1s linear infinite;
                }
                @-webkit-keyframes spin {
                    0% {
                        -webkit-transform: rotate(0deg);
                    }
                    100% {
                        -webkit-transform: rotate(360deg);
                    }
                }
                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                }
            </style>
            <div id="loader"></div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>สินค้าจะจัดส่งถึงคุณภายใน 2 ชม. ขอบคุณที่ใช้บริการ <i class="fa-solid fa-truck-fast"></i></p>
                </div>
            </div>
        <?php endif; ?>
    <container id="page" class="animate-bottom">
        <banner>
            <a href="<?php echo base_url('/index.php/ProductController/Store'); ?>"><button id="btn1">
                    ดูรายการยาและเวชภัณฑ์
                </button></a>
            <img id="capsule" src="<?php echo base_url('images/Group 15.png'); ?>">
            <a href="<?php echo base_url('/index.php/RequestController/RequestPage'); ?>"><button id="btn2">
                    นัดเวลาปรึกษาเภสัชกร
                </button></a>
        </banner>
        <footer>
            <div id="footer">
                <p id="footH">บริการของ Pharma Good</p>
                <a href="<?php echo base_url('/index.php/ProductController/Store'); ?>"><button id="ft1">
                        <p style="font-size: 20px">สั่งซื้อสินค้า</p>
                        <p>สั่งซื้อยาสามัญประจำบ้าน</p>
                        <p>และเวชภัณฑ์ได้ทันที</p>
                        <img id="pic1" src="<?php echo base_url('images/image 1.png'); ?>">
                    </button></a>
                <a href="<?php echo base_url('/index.php/RequestController/RequestPage'); ?>"><button id="ft2">
                        <p style="font-size: 20px">ปรึกษาเภสัชกร</p>
                        <p>ระบุอาการเบื้องต้นและเวลาที่ต้องการปรึกษา</p>
                        <p>สามารถวิดีโอคอลหรือส่งแชทข้อความได้</p>
                        <img id="pic2" src="<?php echo base_url('images/image 2.png'); ?>">
                    </button>
                </a>
            </div>
        </footer>
    </container>
</body>
</html>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        window.location = '<?php echo base_url('/index.php/controller/HomePage3/') ?>';
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        window.location = '<?php echo base_url('/index.php/controller/HomePage3/') ?>';
    }
</script>