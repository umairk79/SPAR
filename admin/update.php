 <?php
		session_start();
		$thisid=$_SESSION['thisid'];
		
             $link = mysqli_connect("localhost", "root", "","spar");
 
			   
			     if(isset($_POST['submit']))
				 {	 
				 $f=$_POST["fname"];
                 $l=$_POST["lname"];
			     $u=$_POST["uid"];
                 $c=$_POST["class"];
                 $b=$_POST["branch"];
				 
                  //   echo $f."<br>".$l."<br>".$u."<br>".$c."<br>".$b."<br>";
                 $query1 = "update student_details set fname='".$f."' ,lname='".$l."', uid='".$u."', class='".$c."' ,branch='".$b."' where id='".$thisid."'";
                     
                 $res = mysqli_query($link, $query1);
                                     
				 }
				 else if(isset($_POST['submit1']))
				 {
				 $a=$_POST["address"];
                 $p=$_POST["phone"];
			     $p2=$_POST["phone2"];
                 $e=$_POST["email"];
                 $e2=$_POST["email2"];
				 
                  //   echo $f."<br>".$l."<br>".$u."<br>".$c."<br>".$b."<br>";
                 $query1 = "update student_details set address='".$a."' ,phone='".$p."', phone2='".$p2."', email='".$e."' ,email2='".$e2."' where id='".$thisid."'";
                     
                 $res = mysqli_query($link, $query1);
                                     
				 }
				 
				 else if(isset($_POST['submit3']))
				 {
					$i=1;
					for($i=1;$i<=6;$i++)
					{
					$x=$_POST["total".$i];
					$q =  "update lectures set totallec=".$x." where subject='subject".$i."'";

					$res=mysqli_query($link, $q);
					}
					$i=1;
					for($i=1;$i<=6;$i++)
					{
					$x=$_POST["sub".$i];
					$q="update attendance set subj".$i."=".$x." where id='".$thisid."'";
					$res=mysqli_query($link, $q);
					}

				 }

                else if(isset($_POST['submit4']))
				 {
					
                    $i=1;
					for($i=1;$i<=6;$i++)
					{
					$x=$_POST["subj".$i."t1"];
					$q = "update t1 set subj".$i."=".$x." where id='".$thisid."'";
                    $res=mysqli_query($link, $q);
                    }
                 
					$i=1;
					for($i=1;$i<=6;$i++)
					{
                    $x=$_POST["subj".$i."t2"];
					$q = "update t2 set subj".$i."=".$x." where id='".$thisid."'";
					$res=mysqli_query($link, $q);
                    }
                                  
				 }
				 
				 
				 
				  header("location:studentpage.php?thisid=$thisid");
            ?>