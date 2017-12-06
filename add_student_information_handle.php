<!DOCTYPE html>
<html>
	<body>
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
    
    $student_id = $_POST['student_id'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $course = $_POST['course'];
      $mentor_id = $_POST['mentor_id'];
      $intime = date("Y-m-d   h:i:s");
    
    

    if($student_id == null){
      echo "Please enter the student name";
      exit;
    }
  
      if($first_name == null){
      echo "Please enter the student first name";
      exit;
    }
    
    if($last_name == null){
      echo "Please enter the student last name";
      exit;
    }
    
    if($course == null){
      echo "Please select a course";
      exit;
    }
    
    /*$query = "select name from PRODUCT where name = '$product_name'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row[0] === $product_name){
      echo "<br>The product already exits";
      die;
    }
    */
    
    $query1 = "insert into SEStudent (ID, student_id,first_name,last_name,Email,course,mentor_id,intime,outtime) VALUES ('','$student_id','$first_name', '$last_name','$email','$course','$mentor_id','$intime','')";


    $query2 = "select max(ID) from SEStudent";

    $result1 = mysqli_query($con, $query1);
    if($result1){
      echo "Successfully insert the student information<br>\n";
      $result2 = mysqli_query($con, $query2);
      $k = mysqli_fetch_array($result2);
      echo "Student information ID is: ".$k[0]."<br>";
      echo "Student ID is: ".$student_id."<br>";
      echo "Course is: ".$course."<br>";
      echo "Mentor ID is: ".$mentor_id."<br>";
      echo "Sign in time is ".$intime.".";
      echo "<br><br><br><br><br><b>student tutoring sign out</b><br>";
      
      
      
      echo "<form action='tutoring_time_out.php' method = 'post'>
      <input type='hidden' name = 'information_id' value=$k[0]></input>
      <input type='hidden' name = 'student_id' value=$student_id></input>
      <input type='hidden' name = 'course' value=$course></input>
      <input type='submit' value='Sign out'></input>
      </form>";
      


    }
    else {
      echo"Insert faild";
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

	</body>
</html>