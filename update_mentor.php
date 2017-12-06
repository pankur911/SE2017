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
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    
    $originlogin_id = $_POST['originlogin_id'];
    $originpassword = $_POST['originpassword'];
    $originfirst_name = $_POST['originfirst_name'];
    $originlast_name = $_POST['originlast_name'];
    $origindescription = $_POST['origindescription'];
    $originemail = $_POST['originemail'];
    




    for($i=0;$i<count($id);$i++) {
      if (empty($login_id[$i])||empty($password[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($description[$i])||empty($email[$i])) {
        echo "<b>ERROR !</b> Any column shouldn't be empty. <br><b>All update faild.</b>";
        echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
        die;
      } 
    }

    mysqli_query($con, "set autocommit=0");
    mysqli_query($con, "begin");
    $j = 0;

    for($i=0;$i<count($id);$i++) {
      if (empty($login_id[$i])||empty($password[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($description[$i])||empty($email[$i])) {
        echo "<b>ERROR !</b> Any column shouldn't be empty. <br><b>All update faild.</b>";
        mysqli_query($con, "rollback");
        die;

      }
      elseif($login_id[$i]==$originlogin_id[$i]&&$password[$i]==$originpassword[$i]&&$first_name[$i]==$originfirst_name[$i]&&$last_name[$i]==$originlast_name[$i]&&$description[$i]==$origindescription[$i]&&$email[$i]==$originemail[$i]){
        continue;
      }
      else{
        $query[$i] = "UPDATE User SET login_id='$login_id[$i]',password='$password[$i]', first_name='$first_name[$i]', last_name='$last_name[$i]'
        , description='$description[$i]',Email='$email[$i]' where ID = '$id[$i]'";
        
        $result[$i] = mysqli_query($con, $query[$i]);
        if ($result[$i]) {
          echo "<br>Successfully update Mentor $login_id[$i]";
          echo "<br>";
          $j++;
        }
        else {
          echo "<br>Mentor $i information didn't update: $query[$i]";
          echo "<br>Error reason is : ".mysqli_error($con);
          mysqli_query($con, "rollback");
        }
      }
        
      }
      mysqli_query($con, "commit");
      if($j==1){
        echo "<br>$j mentor was updated.";
      }else{
        echo "<br>$j mentors were updated.";
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
