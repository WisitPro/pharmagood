$(document).ready(function(){
  $("#check").hide()
  $("#not").hide()
  $("#regisbt").hide()
  $("#regisbt2").show()
    $("#confirmpass").bind('keyup change', function(){
      
      check_Password( $("#pass").val(), $("#confirmpass").val() )
      
      
    })
    $("#pass").bind('keyup change', function(){
      
      check_Password( $("#pass").val(), $("#confirmpass").val() )
      
      
    })

    $("#regisbt").click(function(){
      console.log("click");
      check_Password( $("#pass").val(), $("#confirmpass").val() )

    })
  })

  function check_Password( Pass, Con_Pass){
    

    if(Pass === "" || Con_Pass ===""){
      $("#check").hide()
      $("#not").hide()
      $("#regisbt").hide()
      $("#regisbt2").show()
    }else if( Pass === Con_Pass & Pass.length > 7 & Con_Pass.length > 7){
      $("#check").show()
      console.log("matched")
      $("#regisbt").removeAttr("onclick")
      $("#regisbt").show()
      $("#regisbt2").hide()
      $("#not").hide()
    }

    
    else if(Pass.length > 7 ){
      
      $("#check").hide()
      $("#not").show()
      $("#regisbt2").show()
      $("#regisbt").hide()
      
    }
    else{
      $("#check").hide()
      $("#not").hide()
      $("#regisbt2").show()
      $("#regisbt").hide()
    }

  }