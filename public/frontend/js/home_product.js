 $(document).ready(function(){

var time = $(".timer").attr('data-timeuudai');
 console.log(time);

var deadline = new Date(time).getTime();             
var x = setInterval(function() {
   var currentTime = new Date().getTime();                
   var t = deadline - currentTime; 
   var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
   var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
   var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
   var seconds = Math.floor((t % (1000 * 60)) / 1000); 
   document.getElementById("day").innerHTML =days ; 
   document.getElementById("hour").innerHTML =hours; 
   document.getElementById("minute").innerHTML = minutes; 
   document.getElementById("second").innerHTML =seconds; 

   document.getElementById("day-voucher").innerHTML =days ; 
   document.getElementById("hour-voucher").innerHTML =hours; 
   document.getElementById("minute-voucher").innerHTML = minutes; 
   document.getElementById("second-voucher").innerHTML =seconds; 



   if (t < 0) {
      clearInterval(x); 
      document.getElementById("time-up").innerHTML = "TIME UP"; 
      document.getElementById("day").innerHTML ='0'; 
      document.getElementById("hour").innerHTML ='0'; 
      document.getElementById("minute").innerHTML ='0' ; 
      document.getElementById("second").innerHTML = '0'; 

      document.getElementById("time-up-voucher").innerHTML = "TIME UP"; 
      document.getElementById("day-voucher").innerHTML ='0'; 
      document.getElementById("hour-voucher").innerHTML ='0'; 
      document.getElementById("minute-voucher").innerHTML ='0' ; 
      document.getElementById("second-voucher").innerHTML = '0'; 

   } 
}, 1000);  

     });

