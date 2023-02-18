
function Out() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='<?php echo base_url('/index.php/controller/CusLogout'); ?>';
  

}

function AmOut() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='<?php echo base_url('/index.php/controller/Logout'); ?>';
    

}
