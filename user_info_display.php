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
      if(!empty($_COOKIE['ulogin_id'])){ 

        echo "<a href='user_logout.php'>Mentor logout</a><br>";

        $servername = "imc.kean.edu";
        $username = "wangqian";
        $password = "1023275";
        $dbname = "2017F_wangqian";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);

        }else{
          $login_id = $_COOKIE['ulogin_id'];
          $sql = "SELECT * FROM User where login_id='$login_id'";
          $result = mysqli_query($conn,$sql);
        ?>

        <form name='input' action='user_info_update.php' method='post'>
        <table border=1>
        <th>ID</th><th>login ID</th><th>Password</th><th>First Name</th><th>Last Name</th><th>Description</th><th>Email</th><tr>

        <?php
        while($row = mysqli_fetch_array($result)){
          echo "<td bgcolor=yellow>".$row['ID']."</td><td bgcolor=yellow> ".$row['login_id']."</td><td>".$row['password']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['description']."</td><td>".$row['Email']."</td><tr>";
         
          ?>
          <td bgcolor=yellow><?php echo $row['ID']  ?></td><input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">  <?php
           ?><td bgcolor=yellow><?php echo $row['login_id']  ?></td><input type="hidden" name="login_id" value="<?php echo $row['login_id'] ?>"><?php
           ?><td><input type="text" name="password" value="<?php echo $row['password'];  ?>"></td><?php
           ?><td><input type="text" name="first_name" value="<?php echo $row['first_name'];  ?>"></td><?php
           ?><td><input type="text" name="last_name" value="<?php echo $row['last_name'];  ?>"></td><?php
           ?><td><input type="text" name="description" value="<?php echo $row['description'];  ?>"></td><?php
           ?><td><input type="text" name="email" value="<?php echo $row['Email'];  ?>"></td><?php
        }
        ?>
        <br>

        </table>

        <input type='submit' value='Update information'>  

        <?php
        echo "<br><a href='user_check.php'>Mentor home page</a>";

        }

      }else{
        echo "Please login first.";
      }
      mysqli_close($conn);
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
