

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ListRQ.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
   
    

        
        <div id="backform3">
            <table>

                <tr id="tr1">

                    <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="width:170px ;text-indent: 4px;">หมายเลขคำขอ</th>
                    <th style="width:300px ;">ลูกค้า</th>
                    <th style="width:120px ;">เบอร์โทร</th>
                    <th style="width:340px;">อาการ</th>
                    <th style="width:150px ;">วันที่นัด</th>
                    <th style="width:100px  ;" class="st3" >สถานะ</th>
                    <!-- <th style="width:200px ;"></th> -->

                </tr>
                <?php
                $item = 1;
                foreach ($list_req as $row) {
                    $fmd = date('d-m-Y H:i', strtotime($row->req_time));

                ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->req_id; ?></td>
                        <td class="data"><?php echo $row->cus_name; ?></td>
                        <td class="data"><?php echo $row->cus_phone; ?></td>
                        <td class="data"><?php echo $row->req_sym; ?></td>
                        <td class="data"><?php echo $fmd; ?> น.</td>
                        <td class="data st3 text-center"><strong><?php echo $row->req_status; ?></strong></td>
                        <!-- <td id="btnTable" class="text-right">
                            

                        </td> -->
                    </tr>
                <?php
                    $item++;
                }

                ?>



            </table>

        
        </div>
    </container>

    <div>

    </div>



    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>

</html>