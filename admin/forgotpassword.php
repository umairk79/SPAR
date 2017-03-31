<?php
			
			session_start();
			
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "","spar");
 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
?>



<!DOCTYPE html>
<html >
  <head>
	
   
    <meta charset="UTF-8">
    <title>login</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
 
    <script src="editform.js"></script>
  </head>

  <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

    <div class="wrapper">
	
	<section class="logo">
		<h1> S.P.A.R </h1>
	</section>
		
	<form class="login" method="post">
	<div id="uk7">	
        <p class="title" id="i">PASSWORD RECOVERY</p>
		<input type="email" placeholder="EMAIL" name="email" id="i" autofocus/>
		<i class="fa fa-user"></i>
        <input type ="button" value="Submit" name="submit" onclick="recovery" id="i"/>
    </div>    
        
    <div id="uk8" style="display:none;">    
        <p  class="mess" >USER ID AND PASSWORD HAS BEEN SENT TO YOUR EMAIL</p>
        <a href="loginpage.php" class="mess">Click here to login</a>
    </div> 
    </form>
	
      </div>
	  
	  <script type="text/javascript"> 
	  function recovery()
{		alert('test');
  //   var elements = document.getElementsById("i");++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  for(var i = 0, length = elements.length; i < length; i++) 
          document.getElementsById("uk7").style.display = 'none';
    
//     var elements = document.getElementsById("mess");
  //  for(var i = 0, length = elements.length; i < length; i++) 
          document.getElementsById("uk8").style.display = 'block';
    
}
     </script>
  </body>
</html> 