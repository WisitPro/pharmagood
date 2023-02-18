<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/OwnerHomePage2.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>
</head>
<body>
    <span id="date_time"></span><br>
    <span id="time"></span>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>
</html>
<script type="text/javascript">
    window.onload = date_time('date_time');
</script>
<script type="text/javascript">
    window.onload = time('time');
</script>