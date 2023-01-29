$(document).ready(function(){
  $("#check").hide()
  $("#not").hide()
  $("#btnRegister").hide()
    $("#confirmpass").bind('keyup change', function(){
      
      check_Password( $("#pass").val(), $("#confirmpass").val() )
      
      
    })
    $("#pass").bind('keyup change', function(){
      
      check_Password( $("#pass").val(), $("#confirmpass").val() )
      
      
    })

    $("#btnRegister").click(function(){
      console.log("click");
      check_Password( $("#pass").val(), $("#confirmpass").val() )

    })
  })

  function check_Password( Pass, Con_Pass){
    

    if(Pass === "" || Con_Pass ===""){
      $("#check").hide()
      $("#not").hide()
      $("#btnRegister").hide()
    }else if( Pass === Con_Pass & Pass.length > 7 & Con_Pass.length > 7){
      $("#check").show()
      console.log("matched")
      $("#btnRegister").removeAttr("onclick")
      $("#btnRegister").show()
      $("#not").hide()
    }

    
    else if(Pass.length > 7 ){
      
      $("#check").hide()
      $("#not").show()
      
      $("#btnRegister").hide()
      
    }
    else{
      $("#check").hide()
      $("#not").hide()
      
      $("#btnRegister").hide()
    }

  }