$( document ).ready(function() {
    
    
    $( "#num" ).ready(function(){
            var1s = $( "#num" ).val();						
            if(var1s.match(/^\d+$/)){
                $('.messageError').html('');
                sums();						
            }else{
                $('.messageError').html('sorry number only for the first value');						
            }					
        });
        
        $( "#num2" ).ready(function() {
            var2s = $( "#num2" ).val();						
            if(var2s.match(/^\d+$/)){
                $('.messageError').html('');
                sums();						
            }else{
                $('.messageError').html('sorry number only for the second value');						
            }					
        });					
        $( "#num" ).click(function(){
            var1s = $( "#num" ).val();						
            if(var1s.match(/^\d+$/)){
                $('.messageError').html('');
                sums();						
            }else{
                $('.messageError').html('sorry number only for the first value');						
            }					
        });
        			
        
          
        
        function sums(){		
            console.log('testtest');
            var1 =  parseInt($( "#num" ).val());	
            var2 =  parseInt($( "#num2" ).val());	
            operator = $( ".operator" ).html();			
             sum = (var1 * var2);
             document.getElementById('sum').value = sum;   
             
               				
        }
        
    
    });		


   