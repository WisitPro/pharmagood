function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('มกรคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤษจิกายน', 'ธันวาคม');
        d = date.getDate();
        
        
        result = 'วันที่ '+d+ ' เดือน'+months[month]+'  ปี '+(year+543);
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
function time(id)
{
        
        d = date.getDate();
        
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ' เวลา '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('time("'+id+'");','1000');
        return true;
}