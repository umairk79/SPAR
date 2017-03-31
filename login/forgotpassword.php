<?php
			
			session_start();
			
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "","soad");
 
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
		
	<form class="login" >
		
        <p class="title" id="ii">PASSWORD RECOVERY</p>
		<input type="email" placeholder="EMAIL" name="email" id="ii" autofocus/>
		<i class="fa fa-user"></i>
       <input type ="submit" value="Submit" name="submit" id="i"/>
        
        
        <?php
			if(isset($_POST['submit']))
            {
                $emailid=$_POST["email"];
                
                $query="SELECT * FROM login natural join student_details  where student_details.email='".$emailid."' or student_details.email2='".$emailid."'";
                
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
                $mail->addAddress($row['email']);   // Add a recipient
                 //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                $mail->isHTML(true);  // Set email format to HTML

                $bodyContent = '<h1>'.$row['pword'].'</h1>';
                

                $mail->Subject = 'Email from admin';
                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Sent successfully';
                }
                
                
                
            }
        
        ?>
        
        <p style="display:none;" id="mess">USER ID AND PASSWORD HAS BEEN SENT TO YOUR EMAIL</p>
        <a href="loginpage.php" style="display:none;" id="mess">Click here to login</a>
     
    </form>
	
      </div>
     
  </body>
</html> 