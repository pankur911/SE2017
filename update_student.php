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
    $hostname = "imc.kean.edu";
    $username = "wangqian";
    $password = "1023275";
    $dbname = "2017F_wangqian";
    $con=mysqli_connect($hostname, $username,$password,$dbname);
    
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $mentor_id = $_POST['mentor_id'];
    $intime = $_POST['intime'];
    $outtime = $_POST['outtime'];
    $originstudent_id = $_POST['originstudent_id'];
    $originfirst_name = $_POST['originfirst_name'];
    $originlast_name = $_POST['originlast_name'];
    $originemail = $_POST['originemail'];
    $origincourse = $_POST['origincourse'];
    $originmentor_id = $_POST['originmentor_id'];
    $originintime = $_POST['originintime'];
    $originouttime = $_POST['originouttime'];




    for($i=0;$i<count($id);$i++) {
      if (empty($student_id[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($course[$i])||empty($mentor_id[$i])||empty($intime[$i])||empty($outtime[$i])) {
        echo "<b>ERROR !</b> Any column except Email shouldn't be empty. <br><b>All update faild.</b>";
        echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
        die;
      } 
      elseif ($intime[$i]==0||$outtime[$i]==0) {
        echo "<b>ERROR !</b> Sign in time and sign out time can not be 0. <br><b>All update faild.</b>";
        echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
        die;
      }
    }

    mysqli_query($con, "set autocommit=0");
    mysqli_query($con, "begin");
    $j = 0;

    for($i=0;$i<count($id);$i++) {
      if (empty($student_id[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($course[$i])||empty($mentor_id[$i])) {
        echo "Student ID, first name, last name, course ID, mentor ID shouldn't be empty. <br><b>All update faild.</b>";
        mysqli_query($con, "rollback");
        die;

      }
      elseif($student_id[$i]==$originstudent_id[$i]&&$first_name[$i]==$originfirst_name[$i]&&$last_name[$i]==$originlast_name[$i]&&$email[$i]==$originemail[$i]&&$course[$i]==$origincourse[$i]&&$mentor_id[$i]==$originmentor_id[$i]&&$intime[$i]==$originintime[$i]&&$outtime[$i]==$originouttime[$i]){
        continue;
      }
      else{
        $query[$i] = "UPDATE SEStudent SET student_id='$student_id[$i]',first_name='$first_name[$i]', last_name='$last_name[$i]', Email='$email[$i]'
        , course='$course[$i]',mentor_id='$mentor_id[$i]',intime='$intime[$i]', outtime='$outtime[$i]'  where ID = '$id[$i]'";
        
        $result[$i] = mysqli_query($con, $query[$i]);
        if ($result[$i]) {
          echo "<br>Successfully update Student $id[$i]";
          echo "<br>";
          $j++;
        }
        else {
          echo "<br>Student $i information didn't update: $query[$i]";
          echo "<br>";
          mysqli_query($con, "rollback");
        }
      }
        
      }
      mysqli_query($con, "commit");
      if($j==1){
        echo "<br>$j student was updated.";
      }else{
        echo "<br>$j students were updated.";
      }
      echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
  
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
