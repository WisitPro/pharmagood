
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/OwnerHomePage2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
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