<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ListRQ.css">
</head>
<body>    
        <div id="backform4">
            <table>
                <tr id="tr1">
                <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="width:170px ;text-indent: 4px;">หมายเลขคำขอ</th>
                    <th style="width:300px ;">ลูกค้า</th>
                    <th style="width:120px ;">เบอร์โทร</th>
                    <th style="width:340px;">อาการ</th>
                    <th style="width:150px ;">วันที่นัด</th>
                    <th style="width:100px  ;" class="st4" >สถานะ</th>
                    <th style="min-width:70px ;"></th>
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
                        <td class="data st4 text-center"><strong><?php echo $row->req_status; ?></strong></td>
                        <?php if($row->req_status == "วิดีโอคอล"){ ?>
                        <td id="btnTable" class="text-left">
                            <a id="Edit"  onclick="return confirm('ไปยังหน้าจ่ายยา');" href='AdminCall/<?php echo $row->req_id; ?>'>จ่ายยา</a>
                            &nbsp;&nbsp;&nbsp;
                            <a id="Remove" onclick="return confirm('ยกเลิกคำขอนัด');" href='DenyRQ/<?php echo $row->req_id; ?>'>ยกเลิก</a>
                        </td>
                        <?php }else{?>
                            <td></td>
                            <?php }?>
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