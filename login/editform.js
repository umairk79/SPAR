
function hide()
{
     var elements = document.getElementsByClassName("fpe");
    for(var i = 0, length = elements.length; i < length; i++) 
          elements[i].style.display = "none";
}
 function show(){
     
     var elements = document.getElementsByClassName("fpe");
    for(var i = 0, length = elements.length; i < length; i++) 
          elements[i].style.display = "block";
    
    document.getElementById("prompt").innerHTML="Password has been sent to your email-id if you are registered"
 }
   


