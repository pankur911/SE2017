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
      echo "<br><a href = 'user_logout.php'>Admin logout</a>";
    ?>
    <br>
    Add Student information
    <form action="add_student_information_handle.php" method="post">
      <p>Student ID(7 numbers): <input type = "text" placeholder="ID" name="student_id" size="7" maxlength="7" reuqired="required"></p>
        <p>First name: <input type="text" placeholder="First name" name="first_name" size="30" maxlength="60" required="required"></p>
      <p>Last name: <input type="test" placeholder="Last name" name="last_name" size="30" maxlength="60" required="required"></p>
      <p>Email: <input type="text" placeholder="Email" name="email" size="30" maxlength="60" required="required"></p>
      <p>Select mentor:<select name="mentor_id" required="required">
        <option selected value="">---Please Select mentor ID---</option>
        <?php
        $hostname = "imc.kean.edu";
        $username = "wangqian";
        $password = "1023275";
        $dbname = "2017F_wangqian";
        $con=mysqli_connect($hostname, $username,$password,$dbname);
    
        $query = "select login_id From User where Role='mentor'";
        $result = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($result)) {
        $mentor_id = $row['login_id'];
        echo "<option value = '$mentor_id'>$mentor_id</option>\n";  
      }

        ?>
      </select>
      <p>Select Course:<select name="course" required="required">
        <option selected value="">---Please Select a course---</option>
        <?php
        $hostname = "imc.kean.edu";
        $username = "wangqian";
        $password = "1023275";
        $dbname = "2017F_wangqian";
        $con=mysqli_connect($hostname, $username,$password,$dbname);
    
        $query = "select course_id,course_name From SECourse";
        $result = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($result)) {
        $c_id = $row['course_id'];
        $c_name = $row['course_name'];
        echo "<option value = '$c_id'>$c_id</option>\n";  
      }

        ?>
      </select>
      <input type="submit" value="Submit">
    </form>
    
    <br><br><br><a href='user_check.php'>Admin home page</a>
    




          
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
