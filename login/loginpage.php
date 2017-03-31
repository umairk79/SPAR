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
 
	<SCRIPT type="text/javascript">
	
	window.history.forward();
	function noBack() { 
	window.history.forward(); 
	}
        
    function hide()
{
     var elements = document.getElementsByClassName("fpe");
    for(var i = 0, length = elements.length; i < length; i++) 
          elements[i].style.display = "none";
    var elements = document.getElementsByClassName("abc");
    for(var i = 0, length = elements.length; i < length; i++) 
          elements[i].style.display = "block";
}
 function show(){
     
     var elements = document.getElementsByClassName("fpe");
    for(var i = 0, length = elements.length; i < length; i++) 
          elements[i].style.display = "none";
 }
	</SCRIPT>
    
  </head>

  <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

    <div class="wrapper">
	
	<section class="logo">
		<h1> S.P.A.R </h1>
	</section>
		
	<form class="login" method="post">
		<p class="title" id="i">Log in</p>
		<input type="text"  class="fpe" placeholder="Username" name="username" autofocus/>
		<i class="fa fa-user"></i>
		<input type="password" class="fpe" placeholder="Password" name="password" />
		<i class="fa fa-key"></i>
		<a href="#" class="fpe" onclick="hide()">Forgot your password?</a>
        <input type="email" class="abc" style="display:none;" placeholder="EMAIL-ID" name="email" />
        <input type ="submit" class="abc" style="display:none;" value="Send" onclick="show()" name="submit1"/>
        
      <?php 
        
        if(isset($_POST['submit1']))
        {
            $emailid=$_POST["email"];
            $query="SELECT uname,pword FROM login natural join student_details  where student_details.email ='".$emailid."'";
            
            $res = mysqli_query($link,$query);
            $row = mysqli_fetch_array($res);
            require 'PHPMailer-master/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->isSMTP();                                   // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                            // Enable SMTP authentication
            $mail->Username = 'sparadityakuchekar@gmail.com ';          // SMTP username
            $mail->Password = 'nvidia8500'; // SMTP password
            $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                 // TCP port to connect to

            $mail->setFrom('sparadityakuchekar@gmail.com', 'ADMIN');
            //$mail->addReplyTo('email@codexworld.com', 'CodexWorld');
            $mail->addAddress($emailid);   // Add a recipient
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->isHTML(true);  // Set email format to HTML

            $bodyContent = "<h5>USERNAME: </h5>".$row['uname'] ;
            $bodyContent .= "<h5><br>PASSWORD</h5>".$row['pword'];

            $mail->Subject = 'Email from SPAR admin';
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                echo "Message could not be sent.";
                echo "Mailer Error: " . $mail->ErrorInfo;
            } 
            else {
                echo "<br>Password has been sent to your email-id if you are registered";
            }
      
        }
           
        ?>
                
       
        <input type ="submit" class="fpe" value="Log in" name="submit"/>
    
		<span class="error">
			
		<?php
			if(isset($_POST['submit']))
            {
			$user=$_POST["username"];
			$pass=$_POST["password"];
			
			$q="SELECT * FROM login where uname='".$user."' and pword='".$pass."'" ;
			$result=mysqli_query($link, $q);


			if(mysqli_num_rows($result)>0)
			{	
				$result=mysqli_fetch_array($result);
				
				
					$_SESSION['logged_in'] = true;
					$_SESSION['id']=$result['id'];
					$_SESSION['user']=$result['uname'];
					if($result['type']=="s")
					{
					header('Location:../student/homepage.php?search=');
					}
					else if($result['type']=="a")
					{
					header('Location:../admin/adminhome.php?search=');
					}
                    else if($result['type']=="t")
					{
					header('Location:../teacher/teacherhome.php');
					}
	 
			}
			else
			{
				echo "<p style='color:red;'>INVALID USERNAME OR PASSWORD</p>";
				
			}
		
			}
			?>
		</span>
	</form>
	
</div>
     
  </body>
</html>
