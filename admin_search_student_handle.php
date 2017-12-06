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
    
    if(isset($_POST['submit'])){
      $keywords = $_POST['keywords'];
      if($keywords == '*'){
        $query = "select ID,student_id,first_name,last_name, Email, course,mentor_id,intime,outtime from SEStudent order by ID asc";
      }else{
        $query = "select ID,student_id,first_name,last_name, Email, course,mentor_id,intime,outtime from SEStudent where student_id like '%$keywords%' or mentor_id like '%$keywords%' or first_name like '%$keywords%' or last_name like '%$keywords%' or course like '%$keywords%' or Email like '%$keywords%' order by ID asc";
      }
      $result = mysqli_query($con, $query);
      echo "<a href = 'user_logout.php'>Admin logout</a>";
      
      if(mysqli_num_rows($result)>0){
          
          echo "<br>Here list the result for searching: $keywords<br>";
          echo "<form name='input' action='update_student.php' method='post'>";
          echo "<table border=1>\n";
          echo "<tr><td>ID<td>Student ID<td>First Name<td>Last Name<td>Email<td>Course<td>Mentor ID<td>Sign in time<td>Sign out time</tr>";
          
          
            while($row = mysqli_fetch_array($result)) {
              $id = $row['ID'];
              $student_id = $row['student_id'];
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              $email = $row['Email'];
              $course = $row['course'];
              $mentor_id = $row['mentor_id'];
              $intime = $row['intime'];
              $outtime = $row['outtime'];
              
                
              echo "<tr><td bgcolor=yellow><input type='hidden' name = 'id[]' value='$id'>$id
              <td><input type='text' name = 'student_id[]' value='$student_id'>
              <input type='hidden' name = 'originstudent_id[]' value='$student_id'>
              <td><input type='text' name = 'first_name[]' value='$first_name'>
              <input type='hidden' name = 'originfirst_name[]' value='$first_name'>
              <td><input type='text' name = 'last_name[]' value='$last_name'>
              <input type='hidden' name = 'originlast_name[]' value='$last_name'>
              <td><input type='text' name = 'email[]' value='$email'>
              <input type='hidden' name = 'originemail[]' value='$email'>
              

              <td><select name = 'course[]'>
              <option value = '$course'>$course</option>
              ";
              
              $querycourse = "SELECT course_id from SECourse";
              $resultcourse = mysqli_query($con, $querycourse);
              while ($rowcourse = mysqli_fetch_array($resultcourse)) {
                $course1 = $rowcourse['course_id'];
                echo"<option value = '$course1'>$course1</option>";
              }
              
              echo"</select>
              <input type='hidden' name = 'origincourse[]' value='$course'>
              <td><select name = 'mentor_id[]'>
              <option value = '$mentor_id'>$mentor_id</option>
              ";
              
              $querymentor = "SELECT login_id from User where Role='mentor'";
              $resultmentor = mysqli_query($con, $querymentor);
              while ($rowmentor = mysqli_fetch_array($resultmentor)) {
                $mentor_id1 = $rowmentor['login_id'];
                echo"<option value = '$mentor_id1'>$mentor_id1</option>";
              }
              
              echo"</select>
              <input type='hidden' name = 'originmentor_id[]' value='$mentor_id'>
              <td><input type='text' name = 'intime[]' value='$intime'>
              <input type='hidden' name = 'originintime[]' value='$intime'>
              <td><input type='text' name = 'outtime[]' value='$outtime'></tr>
              <input type='hidden' name = 'originouttime[]' value='$outtime'>
              ";
            }
          
          echo "</table>\n";
          echo "<br><input type='submit' name='submit' value='Update student info'></form>";
          
          echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
        
        }else{
          echo "<br><br>There is no such records as keywords like <b>$keywords</b>";
          echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
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
