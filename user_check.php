<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Codesamarie</title> 

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Ankur
    Theme URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-templat/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body class="homepage">
  <header id="header">
    <nav class="navbar navbar-fixed-top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
          <a class="navbar-brand" href="index.html">Codesamarie.</a>
        </div>

        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="about-us.html">About Us</a></li>
            <li><a  href="user_login.php">Services</a></li>
            <li><a href="user_check.php">Portfolio</a></li>
            <li><a href="contact-us.html">Contact</a></li>
          </ul>
        </div>
      </div>
      <!--/.container-->
    </nav>
    <!--/nav-->

  </header>
  <!--/header-->

  

  <section  id="..">
    <div class="container" style="min-height: 400px">
      <div class="center wow fadeInDown">
       
      </div>

      <div class="row">
        
          <?php

      $servername = "imc.kean.edu";
      $username = "wangqian";
      $password = "1023275";
      $dbname = "2017F_wangqian";
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {

          die("Connection failed: " . $conn->connect_error);

      }else{

      
      if(isset($_COOKIE['ulogin_id'])){
        $login_id = $_COOKIE['ulogin_id'];
        $password = $_COOKIE['upassword'];
      }elseif(isset($_COOKIE['alogin_id'])){
        $login_id = $_COOKIE['alogin_id'];
        $password = $_COOKIE['apassword'];
      }else{
        $login_id = $_POST['login_id'];
        $password = $_POST['password'];
      }
      
      
      
      $ip = $_SERVER["REMOTE_ADDR"];
      echo "Your IP is: ".$ip;
      
      
      $ip_subnet=explode(".",$ip);
      if($ip_subnet[0]=="131" && $ip_subnet[1]=="125"|| $ip_subnet[0]=="10")
      {
        echo "<br>You are from Kean University";
      }else{
        echo "<br>You are not from Kean University.<br>";
      }

      echo   "Login time: ".date("Y-m-d   h:i:s")."<br>";   


      $result=mysqli_query($conn,"select * from User where login_id='$login_id'");

      $row=mysqli_fetch_array($result);

      if($row>0){
        
      $dblogin_id = $row['login_id'];
      $dbpassword = $row['password'];
      $dbrole = $row['Role'];
      $dbfirstname = $row['first_name'];
      $dblastname = $row['last_name'];
      if($password == $dbpassword){
       
      
      if($dbrole == 'admin'){
        echo "Welcome admin: <b>" .$dbfirstname.' '.$dblastname. "</b>";
        echo "<br><a href = 'user_logout.php'>Admin logout</a>";

        echo "<br><br><a href = 'add_student_information.php'>Student information</a>";
        echo "<br><br><a href = 'admin_search_student.php'>Search and update student information</a>";
        echo "<br><br><a href = 'add_mentor_information.php'>Sign up for mentor</a>";
        echo "<br><br><a href = 'admin_search_mentor.php'>Search and update mentor information</a>";
        echo "<br><br><a href = 'report.php'>Report</a>";
        echo "<br><br><a href='index.php'>Go back to home page</a>";
        setcookie('alogin_id',$login_id,time()+3600);
        setcookie('apassword',$password,time()+3600);
      }else{
        echo "Welcome Mentor: <b>" .$dbfirstname.' '.$dblastname."</b>";
        echo "<br><a href = 'user_logout.php'>Mentor logout</a>";
        echo "<br><br><a href = 'user_info_display.php'>Change user information</a>";
        echo "<br><br><a href = 'add_student_information.php'>Student information</a>";
        echo "<br><br><a href = 'report.php'>Student Report</a>";
        
        setcookie('ulogin_id',$login_id,time()+3600);
        setcookie('upassword',$password,time()+3600);

        echo "<br>";
        


        if(isset($_POST['checkout'])){
          $outdate=date("Y-m-d   h:i:s");
          $query2="UPDATE  Mentor_Clock set outtime = '$outdate' where login_id = '$dblogin_id' and outtime =0";
          $result2=mysqli_query($conn,$query2);
          echo "<br><b>Successful check out!</b><br><br>";
          
          $query4="select m.login_id, u.first_name, u.last_name, m.intime, m.outtime from Mentor_Clock m, User u where m.login_id = '$dblogin_id' and m.login_id=u.login_id";
          $result4=mysqli_query($conn, $query4);
          echo "<table border=1>\n";
          echo "<tr><td>Mentor ID<td>First Name<td>Last Name<td>Check in time<td>Check out time</tr>";
          while($row4=mysqli_fetch_array($result4)){
              echo "<tr><td>$row4[0]<td>$row4[1]<td>$row4[2]<td>$row4[3]<td>$row4[4]</tr>";
          }
          echo "</table>";
        }
        else{
          if(isset($_POST['checkin'])){
            //May be can add a login count. If login time count >10, refuse the mentor login
            


            $checktimebegin = date("Y-m-d h:i:s", mktime(date("h"),date("i"),date("s"),date("m"),date("d")-1,date("Y")));
            $checktimeend = date("Y-m-d h:i:s");
            $query5 = "select count(login_id) from Mentor_Clock where login_id = '$dblogin_id' and intime between '$checktimebegin' and '$checktimeend' and outtime between '$checktimebegin' and '$checktimeend'";
            $result5 = mysqli_query($conn, $query5);
            $row5=mysqli_fetch_array($result5);
            
            if($row5[0]>10){
              echo "<br><br><b>You have login more than 10 times, you cannot login anymore today.</b><br>If you have question, please contact the administrator.";

            }
            else{


              $indate=date("Y-m-d   h:i:s");
              $query1="INSERT INTO Mentor_Clock value(' ','$dblogin_id', '$indate', '')";
              $result1=mysqli_query($conn, $query1);
            }
          }
          $query3="select *from Mentor_Clock where login_id = '$dblogin_id' and outtime = 0";
          $result3=mysqli_query($conn, $query3);
          $row3=mysqli_fetch_array($result3);
          
          if($row3[1]==$dblogin_id){
            $checkout=0;
                echo "<br><br>Mentor click here to <b>check out</b>";
                echo  "<form name = 'input' action ='user_check_out.php' method = 'post' >
                    <input type='hidden' name = 'checkout' value=$checkout></input>";
                echo "<input type='submit' value='Mentor check out'></input>";
                echo "</from>";
          }
          else{
            $checkin=0;

              echo "<br><br>Mentor click here to <b>check in</b>";
              echo  "<form name = 'input' action ='user_check.php' method = 'post' >
                    <input type='hidden' name = 'checkin' value=$checkin></input>";
              echo "<input type='submit' value='Mentor check in'></input>";
              echo "</from>";
          }
        }

        echo "<br><br><a href='index.php'>Go back to home page</a>";
    
      }

      mysqli_close($conn);

      }

      else if($password!= $dbpassword)
      {
        echo "User ".$row['first_name'].' '.$row['last_name']." exists, but password not mathces.";
        mysqli_close($conn);
      }
      }else{

        echo "Login ID ".$login_id." doesn't exist in the database.";
        mysqli_close($conn);

      }

      }
    ?>




          
        <!--/.services-->
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>
  <!--/#feature-->

  
  <!--/#recent-works-->

  
  <!--/#middle-->

  
  <!--/#bottom-->

  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="social">
            <ul class="social-share">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--/.container-->
  </div>
  <!--/.top-bar-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; Ankur. All Rights Reserved.
                    <div class="credits">
                        <!--
                          All the links in the footer should remain intact.
                          You can delete the links only if you purchased the pro version.
                          Licensing information: https://bootstrapmade.com/license/
                          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Gp
                        -->
                        <a href="http://patelankur.planettravelsnj.com/patel/patel/developer-v1.2/index.html#/"> Templates</a> by <a href="http://patelankur.planettravelsnj.com/patel/patel/developer-v1.2/index.html#">Pankur.com</a>

                    </div>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
  <!--/#footer-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
