<?php
		session_start();
		if (!$_SESSION['logged_in'])
		{
			header("Location: ../login/loginpage.php");  
		}
		$link = mysqli_connect("localhost", "root", "","spar");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$id=$_SESSION['id'];
		$user=$_SESSION['user'];
		$search="";
		$branch="";
		$class="";
		if(isset($_GET['search']))
		$search=$_GET['search'];
		if(isset($_GET['branch']))
		{
		$branch=$_GET['branch'];
		$class=$_GET['class'];
		
		$q="SELECT * FROM student_details where branch='".$branch."' and class='".$class."' order by fname" ;
		$result=mysqli_query($link, $q);
		}
		else{
			$q="SELECT * FROM student_details where fname like'".$search."%' or lname like'".$search."%' or  concat(fname,' ',lname) like '".$search."' order by fname" ;
			$result=mysqli_query($link, $q);
		}
		
		
		
		
		
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
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.deep_purple-pink.min.css">
    <link rel="stylesheet" href="styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			function route(val){
				 document.location="studentpage.php?thisid=" + val;
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
		  <a href="adminhome.php?search=" class="mdl-layout__tab is-active">Home</a>
		  
			<button id="comps" class="mdl-button mdl-js-button mdl-layout__tab" >
			COMPS
			</button>

			<ul class="mdl-menu  mdl-js-menu mdl-js-ripple-effect"
			for="comps">
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=COMPS&class=FE';">FE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=COMPS&class=SE';">SE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=COMPS&class=TE';">TE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=COMPS&class=BE';">BE</li>
			</ul>
			
			<button id="it" class="mdl-button mdl-js-button mdl-layout__tab" onclick="<?php $branch="IT";?>">
			IT
			</button>

			<ul class="mdl-menu  mdl-js-menu mdl-js-ripple-effect"
			for="it">
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=IT&class=FE';">FE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=IT&class=SE';">SE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=IT&class=TE';">TE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=IT&class=BE';">BE</li>
			</ul>
			
			<button id="extc" class="mdl-button mdl-js-button mdl-layout__tab" onclick="<?php $branch="EXTC";?>">
			EXTC
			</button>

			<ul class="mdl-menu  mdl-js-menu mdl-js-ripple-effect"
			for="extc">
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=EXTC&class=FE';">FE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=EXTC&class=SE';">SE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=EXTC&class=TE';">TE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=EXTC&class=BE';">BE</li>
			</ul>
			
			<button id="etrx" class="mdl-button mdl-js-button mdl-layout__tab" onclick="<?php $branch="ETRX";?>">
			ETRX
			</button>

			<ul class="mdl-menu  mdl-js-menu mdl-js-ripple-effect"
			for="etrx">
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=ETRX&class=FE';">FE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=ETRX&class=SE';">SE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=ETRX&class=TE';">TE</li>
			<li class="mdl-menu__item" onclick="window.location.href = 'adminhome.php?search=&branch=ETRX&class=BE';">BE</li>
			</ul>
			
			
		  <form name="searchform" class="searchbar">
			<input name="search" value="" class="mdl-layout__tab" id="srch" placeholder="search student" style="color:black"/>
					<span class="input-group-btn" id="srch-btn">
                        <button class="btn btn-info btn-lg" id="sub" type="submit" name="submit" >
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
			
		  </form>
		  
		  <a href="logout.php" class="mdl-layout__tab logout right_tab">Logout</a>
        </div>
		
      </header>
	  
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="profile">
          <?php 
		  	  
		  while($row=mysqli_fetch_array($result))
		  {
	
			?>
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col" id="<?php echo $row['id'];?>" onclick="route(id)" >
				
				<div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
					<!--<h4 class="mdl-cell mdl-cell--12-col">Personal Details</h4>-->

                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  
                  <?php echo "<h3>".$row['fname']." ".$row['lname']."</h3>"; ?>				  
					
                </div>
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  
                  <?php echo "<h4>".$row['uid']."</h4>"; ?>	
                </div>
                
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  
                  <?php echo "<h4>".$row['class']." ".$row['branch']."</h4>"; ?>	
                </div>
              </div>
              </input>
            </div>
			
            
          </section>
		  <?php } ?>
		</div>
	   </main>		
		  

    </div>

    <script src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  </body>
</html>
