<?php
		session_start();
		$link = mysqli_connect("localhost", "root", "","spar");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$id=$_GET['thisid'];
		$_SESSION['thisid']=$id;
		$user=$_SESSION['user'];
		$q="SELECT * FROM student_details where id='".$id."'" ;
		$result=mysqli_query($link, $q);
		$result=mysqli_fetch_array($result);
		$q1="SELECT * FROM attendance where id='".$id."'" ;
		$res1=mysqli_query($link, $q1);
		$res1=mysqli_fetch_array($res1);

		$q2="SELECT * FROM lectures";
		$res2=mysqli_query($link, $q2);

        $q3="SELECT * FROM lectures";
		$res3=mysqli_query($link, $q3);

        $q4="SELECT * FROM t1 where id='".$id."'" ;
		$res4=mysqli_query($link, $q4);

        $q5="SELECT * FROM t2 where id='".$id."'" ;
		$res5=mysqli_query($link, $q5);
		
		$q6="SELECT * FROM lectures";
		$grp=mysqli_query($link,$q6);
		
		$val=mysqli_fetch_array($grp);
		$var1=$val['totallec'];
		
		$val=mysqli_fetch_array($grp);
		$var2=$val['totallec'];
		
		$val=mysqli_fetch_array($grp);
		$var3=$val['totallec'];
		
		$val=mysqli_fetch_array($grp);
		$var4=$val['totallec'];
		
		$val=mysqli_fetch_array($grp);
		$var5=$val['totallec'];
		
		$val=mysqli_fetch_array($grp);
		$var6=$val['totallec'];
		
    
		$row1=mysqli_fetch_array($res4);
        $row2=mysqli_fetch_array($res5);
        $row;
		
?>


<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>S.P.A.R</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.deep_purple-pink.min.css">
    <link rel="stylesheet" href="studentstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	 
    
		
<script src="editform.js"></script>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Subject', 'T1', 'T2', 'Average'],
          ['sub1',<?php echo $row1['subj1']?>,<?php echo $row2['subj1']?>,<?php echo ($row1['subj1']+$row2['subj1'])/2 ?>],
          ['sub2',<?php echo $row1['subj2']?>,<?php echo $row2['subj2']?>,<?php echo ($row1['subj2']+$row2['subj2'])/2 ?>],
          ['sub3',<?php echo $row1['subj3']?>,<?php echo $row2['subj3']?>,<?php echo ($row1['subj3']+$row2['subj3'])/2 ?>],
          ['sub4',<?php echo $row1['subj4']?>,<?php echo $row2['subj4']?>,<?php echo ($row1['subj4']+$row2['subj4'])/2 ?>],
		  ['sub5',<?php echo $row1['subj5']?>,<?php echo $row2['subj5']?>,<?php echo ($row1['subj5']+$row2['subj5'])/2 ?>],
		  ['sub6',<?php echo $row1['subj6']?>,<?php echo $row2['subj6']?>,<?php echo ($row1['subj6']+$row2['subj6'])/2 ?>]
        ]);

        var options = {
          chart: {
            title: 'Student Performance Analysis Report',
            subtitle: 'Marks',
			vAxis: { gridlines: { count: 4 } }
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
	</script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['Subject','PERCENTAGE'],
          ['sub1',<?php echo ($res1['subj1']/$var1*100)?>],
          ['sub2',<?php echo ($res1['subj2']/$var2*100)?>],
          ['sub3',<?php echo ($res1['subj3']/$var3*100)?>],
          ['sub4',<?php echo ($res1['subj4']/$var4*100)?>],
		  ['sub5',<?php echo ($res1['subj5']/$var5*100)?>],
		  ['sub6',<?php echo ($res1['subj6']/$var6*100)?>]
        ]);

        var options = {
          chart: {
            title: 'Student Performance Analysis Report',
            subtitle: 'Attendance',
			'width':4000,
            'height':3000,
			vAxis: { gridlines: { count: 4 } }
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material1'));

        chart.draw(data, options);
      }
        
    </script>
	
  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
  
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row logo" >
		<h1>S.P.A.R</h1>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3>WELCOME </h3>		  
        </div>        
		 <div class="mdl-layout--large-screen-only mdl-layout__header-row">
		  <h5><em><?php echo $user;?></em></h5>
		 </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
		  <a href="adminhome.php?search=" class="mdl-layout__tab ">Home</a>
          <a href="#profile" class="mdl-layout__tab is-active">Student Profile</a>
          <a href="#academic" class="mdl-layout__tab">Academic details</a>
          <a href="#analysis" class="mdl-layout__tab" onclick="rep()">Analysis report</a> 
		  <a href="logout.php" class="mdl-layout__tab logout">Logout</a>
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="profile">
          
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col" id="card1">
              <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">Personal Details</h4>
                  
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add" onclick="myFunction()">
						<i class="material-icons" role="presentation">mode_edit</i>
						<span class="visuallyhidden">Edit</span>
				</button>
				
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
				
				<form action="update.php" id="personalform" method="post">
                  <h5>NAME</h5>
                <p class="disp1" id="p1"> <?php echo $result['fname']." ".$result['lname']; ?>		</p>		  
				
                
                <p>    <input class="edit1" id="myDIV1" style="display:none;" value="<?php echo $result['fname']?>" name="fname"></input> </p>  
                    <input class="edit1" id="myDIV11" style="display:none;" value="<?php echo $result['lname']?>" name="lname"></input>                
                
                
                </div>
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                <h5>UID</h5>      
                <p class="disp1" id="p2">  <?php echo $result['uid']; ?> </p>
               
               <p>    <input class="edit1" id="myDIV2" style="display:none;" value="<?php echo $result['uid']?>" name="uid"></input> </p>
                </div>
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>CLASS</h5>    
                <p class="disp1" id="p3">  <?php echo $result['class']." ".$result['branch']; ?>  </p>
                
                
                <p>    <input class="edit1" id="myDIV3" style="display:none;"  value="<?php echo $result['class']?>" name="class"></input> </p>
                <p>    <input class="edit1" id="myDIV33" style="display:none;" value="<?php echo $result['branch']?>" name="branch"></input> </p>
                     
                <p>    <input class="edit1" type="submit" value="Update" name="submit" id="sub" style="display:none;" onclick="window.location.reload()"></input> </p>
				</form>
           

        
                </div>
              </div>
              
            </div>
			
            
          </section>
		  
		  <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
              <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">CONTACT INFORMATION</h4>
				
			   <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add" onclick="myFunction1()">
				<i class="material-icons" role="presentation">mode_edit</i>
				<span class="visuallyhidden">Edit</span>
				</button>
				
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  
				  <form id="contactform" action="update.php" name="contact" method="post">
				  <h5>ADDRESS</h5>
				<p class="disp2" id="p4">	<?php echo $result['address']; ?>	</p>
					  
               <p>    <input class="edit2" id="myDIV4" style="display:none;" value="<?php echo $result['address']?>" name="address"></input> </p>
                </div>
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>CONTACT NO</h5>
                 <p class="disp2" id="p5"> <?php echo $result['phone']."<br>".$result['phone2'];?></p>
				  
				
                <p>    <input class="edit2" id="myDIV5" style="display:none;" value="<?php echo $result['phone']?>" name="phone"></input> </p>
				<p>    <input class="edit2" id="myDIV55" style="display:none;" value="<?php echo $result['phone2']?>" name="phone2"></input> </p>
				  
                </div>
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>EMAIL ID</h5>
                 <p class="disp2" id="p6"> <?php echo $result['email']."<br>".$result['email2'];?></p>
				  
				 
                <p>    <input class="edit2" id="myDIV6" style="display:none;" value="<?php echo $result['email']?>" name="email"></input> </p>
				<p>    <input class="edit2" id="myDIV66" style="display:none;" value="<?php echo $result['email2']?>" name="email2"></input> </p> 
				
				          
                <p>    <input class="edit2" type="submit" value="Update" name="submit1" id="sub1" style="display:none;" onclick="window.location.reload()"></input> </p>
				</form>
						
                </div>
              </div>
              
            </div>
			
            
          </section>
          
          
        </div>
		<div class="mdl-layout__tab-panel is-active" id="analysis">
          <div id="reportpdf">
			<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
			
				<div id="barchart_material"style="width: 100%; height: 500px;"></div>
			
			</section>
			
			<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            
				<div id="barchart_material1" style="width: 100%; height: 500px;"></div>
            
			</section>
            <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
			<?php
					$q="select * from comments where studentid='".$id."'";
					$qres=mysqli_query($link,$q);
					
					if(mysqli_num_rows($qres)>0){
						while($qrow=mysqli_fetch_array($qres)){
						
						$qt="select * from teacher_details where id='".$qrow['teacherid']."'";
						$rest=mysqli_query($link,$qt);
						$rest=mysqli_fetch_array($rest);
						?>
                
				<div class="comments mdl-cell mdl-cell--12-col" style="margin-left:10%;">
					
						<h5><?php echo $rest['name']."(".$qrow['subject']."): ".$qrow['comment'].""?></h5>
                        <br>       
			     
				</div>
				
					<?php }}?>
				
			</section>
		</div>
          
          
        </div>
        <div class="mdl-layout__tab-panel" id="academic">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
              <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">ATTENDANCE</h4>
				<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add" onclick="myFunction3()">
				<i class="material-icons" role="presentation">mode_edit</i>
				<span class="visuallyhidden">Edit</span>
				</button>
					
				
					<table>
						<form id="attendanceform" action="update.php" name="attendance" method="post">
						<tr>
						<th></th>
						<th>LECTURES TAKEN</th>
						<th>LECTURES ATTENDED</th>
						<th>PERCENTAGE(%)</th>
						</tr>
						<?php $row=mysqli_fetch_array($res2);?>
						<tr>
						<td><?php echo $row['subject'];?></td>
						<td>
							<p class="disp3" id="p11"><?php echo $row['totallec']?></p>
							<input class="edit3" id="c11" style="display:none;" value="<?php echo $row['totallec']?>" name="total1"></input>
						
						</td>
						
						<td>
							<p class="disp3" id="p12"><?php echo $res1['subj1']?></p>
							<input class="edit3" id="c12" style="display:none;" value="<?php echo $res1['subj1']?>" name="sub1"></input>
						</td>
						
						<td>
							<p class="disp3" id="p13"><?php if($row['totallec'])echo $res1['subj1']/$row['totallec']*100?></p>
							
						</td>
						
						</tr>
						
						<?php $row=mysqli_fetch_array($res2); $var2=$row;?>
						<tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp3" id="p21"><?php echo $row['totallec']?></p>
							<input class="edit3" id="c21" style="display:none;" value="<?php echo $row['totallec']?>" name="total2"></input>
						
						</td>
						
						<td>
							<p class="disp3" id="p22"><?php echo $res1['subj2']?></p>
							<input class="edit3" id="c22" style="display:none;" value="<?php echo $res1['subj2']?>" name="sub2"></input>
						</td>
						
						<td>
							<p class="disp3" id="p23"><?php if($row['totallec'])echo $res1['subj2']/$row['totallec']*100?></p>
							
						</td>
						
						</tr>
						
						<?php $row=mysqli_fetch_array($res2); $var3=$row;?>
						<tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp3" id="p31"><?php echo $row['totallec']?></p>
							<input class="edit3" id="c31" style="display:none;" value="<?php echo $row['totallec']?>" name="total3"></input>
						
						</td>
						
						<td>
							<p class="disp3" id="p32"><?php echo $res1['subj3']?></p>
							<input class="edit3" id="c32" style="display:none;" value="<?php echo $res1['subj3']?>" name="sub3"></input>
						</td>
						
						<td>
							<p class="disp3" id="p33"><?php if($row['totallec'])echo $res1['subj3']/$row['totallec']*100?></p>
							
						</td>
						
						</tr>
						<?php $row=mysqli_fetch_array($res2); $var4=$row;?>
						<tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp3" id="p41"><?php echo $row['totallec']?></p>
							<input class="edit3" id="c41" style="display:none;" value="<?php echo $row['totallec']?>" name="total4"></input>
						
						</td>
						
						<td>
							<p class="disp3" id="p42"><?php echo $res1['subj4']?></p>
							<input class="edit3" id="c42" style="display:none;" value="<?php echo $res1['subj4']?>" name="sub4"></input>
						</td>
						
						<td>
							<p class="disp3" id="p43"><?php if($row['totallec'])echo $res1['subj4']/$row['totallec']*100?></p>
							
						</td>
						
						</tr>
						<?php $row=mysqli_fetch_array($res2); $var5=$row;?>
						<tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp3" id="p51"><?php echo $row['totallec']?></p>
							<input class="edit3" id="c51" style="display:none;" value="<?php echo $row['totallec']?>" name="total5"></input>
						
						</td>
						
						<td>
							<p class="disp3" id="p52"><?php echo $res1['subj5']?></p>
							<input class="edit3" id="c52" style="display:none;" value="<?php echo $res1['subj5']?>" name="sub5"></input>
						</td>
						
						<td>
							<p class="disp3" id="p53"><?php if($row['totallec'])echo $res1['subj5']/$row['totallec']*100?></p>
							
						</td>
						
						</tr>
						<?php $row=mysqli_fetch_array($res2); $var6=$row;?>
						<tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp3" id="p61"><?php echo $row['totallec']?></p>
							<input class="edit3" id="c61" style="display:none;" value="<?php echo $row['totallec']?>" name="total6"></input>
						
						</td>
						
						<td>
							<p class="disp3" id="p62"><?php echo $res1['subj6']?></p>
							<input class="edit3" id="c62" style="display:none;" value="<?php echo $res1['subj6']?>" name="sub6"></input>
						</td>
						
						<td>
							<p class="disp3" id="p63"><?php if($row['totallec'])echo $res1['subj6']/$row['totallec']*100?></p>
							</input>
						</td>
						
						</tr>
						
						<br>
						<p><input class="edit3" type="submit" value="Update" name="submit3" id="sub1" style="display:none;" onclick="window.location.reload()"></input> </p>
						</form>
					</table>
					
					
            </div>
          </section>
		  
		  <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
           <div class="mdl-card mdl-cell mdl-cell--12-col">
              <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">GRADES</h4>
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add" onclick="myFunction4()">
				<i class="material-icons" role="presentation">mode_edit</i>
				<span class="visuallyhidden">Edit</span>
				</button>
				
         <table>
						<form id="gradeform" action="update.php" name="grades" method="post">
						<tr>
						<th></th>
						<th>T-1(OUT OF 20)</th>
						<th>T-2(OUT OF 20)</th>
						<th>AVERAGE(OUT OF 20)</th>
						</tr>
						<?php $row=mysqli_fetch_array($res3);?>
						<tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp4" id="p11"><?php echo $row1['subj1']?></p>
							<input class="edit4" id="c11" style="display:none;" value="<?php echo $row1['subj1']?>" name="subj1t1"></input>
                        
						
						</td>
						
						<td>
							<p class="disp4" id="p12"><?php echo $row2['subj1']?></p>
							<input class="edit4" id="c12" style="display:none;" value="<?php echo $row2['subj1']?>" name="subj1t2"></input>
						</td>
						
						<td>
							<p class="disp4" id="p13"><?php echo ($row1['subj1']+$row2['subj1'])/2 ?></p>
							
						</td>
						
						</tr>
              
					    <?php $row=mysqli_fetch_array($res3);?>    
                        <tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp4" id="p11"><?php echo $row1['subj2']?></p>
							<input class="edit4" id="c11" style="display:none;" value="<?php echo $row1['subj2']?>" name="subj2t1"></input>
                        
						
						</td>
						
						<td>
							<p class="disp4" id="p12"><?php echo $row2['subj2']?></p>
							<input class="edit4" id="c12" style="display:none;" value="<?php echo $row2['subj2']?>" name="subj2t2"></input>
						</td>
						
						<td>
							<p class="disp4" id="p13"><?php echo ($row1['subj2']+$row2['subj2'])/2 ?></p>
							
						</td>
						
						</tr>		

                        <?php $row=mysqli_fetch_array($res3);?>    
                        <tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp4" id="p11"><?php echo $row1['subj3']?></p>
							<input class="edit4" id="c11" style="display:none;" value="<?php echo $row1['subj3']?>" name="subj3t1"></input>
                        						
						</td>
						
						<td>
							<p class="disp4" id="p12"><?php echo $row2['subj3']?></p>
							<input class="edit4" id="c12" style="display:none;" value="<?php echo $row2['subj3']?>" name="subj3t2"></input>
						</td>
						
						<td>
							<p class="disp4" id="p13"><?php echo ($row1['subj3']+$row2['subj3'])/2 ?></p>
							
						</td>
						
						</tr>

                        <?php $row=mysqli_fetch_array($res3);?>    
                        <tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp4" id="p11"><?php echo $row1['subj4']?></p>
							<input class="edit4" id="c11" style="display:none;" value="<?php echo $row1['subj4']?>" name="subj4t1"></input>
                        						
						</td>
						
						<td>
							<p class="disp4" id="p12"><?php echo $row2['subj4']?></p>
							<input class="edit4" id="c12" style="display:none;" value="<?php echo $row2['subj4']?>" name="subj4t2"></input>
						</td>
						
						<td>
							<p class="disp4" id="p13"><?php echo ($row1['subj4']+$row2['subj4'])/2 ?></p>
							
						</td>
						
						</tr>
                        <?php $row=mysqli_fetch_array($res3);?>    
                        <tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp4" id="p11"><?php echo $row1['subj5']?></p>
							<input class="edit4" id="c11" style="display:none;" value="<?php echo $row1['subj5']?>" name="subj5t1"></input>
                        
						
						</td>
						
						<td>
							<p class="disp4" id="p12"><?php echo $row2['subj5']?></p>
							<input class="edit4" id="c12" style="display:none;" value="<?php echo $row2['subj5']?>" name="subj5t2"></input>
						</td>
						
						<td>
							<p class="disp4" id="p13"><?php echo ($row1['subj5']+$row2['subj5'])/2 ?></p>
							
						</td>
						
						</tr>			
                        <?php $row=mysqli_fetch_array($res3);?>    
                        <tr>
						<td><?php echo $row['subject']?></td>
						<td>
							<p class="disp4" id="p11"><?php echo $row1['subj6']?></p>
							<input class="edit4" id="c11" style="display:none;" value="<?php echo $row1['subj6']?>" name="subj6t1"></input>
                        
						
						</td>
						
						<td>
							<p class="disp4" id="p12"><?php echo $row2['subj6']?></p>
							<input class="edit4" id="c12" style="display:none;" value="<?php echo $row2['subj6']?>" name="subj6t2"></input>
						</td>
						
						<td>
							<p class="disp4" id="p13"><?php echo ($row1['subj6']+$row2['subj6'])/2 ?></p>
							
						</td>
						
						</tr>			
						<br>
						<p><input class="edit4" type="submit" value="Update" name="submit4" id="sub1" style="display:none;" onclick="window.location.reload()"></input> </p>
						</form>
					</table>
              
              
            </div>
          </section>
        </div>
      
      </main>
    </div>
    <script src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  </body>
</html>
