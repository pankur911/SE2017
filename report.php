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
      echo "<a href='user_check.php'>Mentor home page<a><br>";

      if(isset($_COOKIE['alogin_id'])){

        echo "<form name='input' action='report.php' method='post' >
        View Reports -
        period:
        <select name='report_period'>
        <option value='all'>all</option>
        <option value='past_week'>past week</option>
        <option value='current_month'>current month</option>
         <option value='past_month'>past month</option>
         </select>
         , by:
         <select name='report_type'>
         <option value='student'>student</option>
         <option value='mentor'>mentor</option>
         </select>
         Enter a keyword to search (* for ALL): 
         <input type ='text' name='keyword' value = '*' required='required'>
         <input type='submit' value='Submit'>
         </form>
        ";

        if(isset($_POST['report_type'])||isset($_POST['report_period'])){

          $report_period = $_POST['report_period'];
          $report_type = $_POST['report_type'];
          $keyword = $_POST['keyword'];


          echo"<br>Here is all the student tutoring information.";

          if($report_type == "student"){
            if ($report_period == "past_week") {
              $day_begin = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
              $day_end = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
              if($keyword=='*'){
                $query = "select * from SEStudent where intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }else{
                $query = "select * from SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%' or mentor_id like '%$keyword%') and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }
          
            }
            elseif ($report_period == "current_month") {
              $day_begin = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
              $day_end = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
              if($keyword=='*'){
                $query = "select * from SEStudent where intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }else{
                $query = "select * from SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%' or mentor_id like '%$keyword%') and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }
            }
            elseif ($report_period == "past_month") {
              $day_begin = date("Y-m-d", mktime(0,0,0,date("m")-1,1,date("Y")));
              $day_end = date("Y-m-d",mktime(0,0,0,date("m")-1,31,date("Y")));
              if($keyword=='*'){
                $query = "select * from SEStudent where intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }else{
                $query = "select * from SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%' or mentor_id like '%$keyword%') and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }
            }
            else {
              if($keyword=='*'){
                $query = "SELECT * FROM SEStudent ";
              }else{
                $query = "SELECT * FROM SEStudent where student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%' or mentor_id like '%$keyword%'";
              }
            }

            $result = mysqli_query($con,$query);
        
            if($result){
              if (mysqli_num_rows($result)>0) {
              
                echo "<br><br>Report by <b>$report_type</b> during period: <b>$report_period</b>";
      
        
                echo "<table border=1>\n";
                echo "<tr><td>#<td>Student ID<td>First name<td>Last name<td>Email<td>Course<td>Mentor ID<td>Log in time<td>Log out time</tr>";
                $num = 0;
                while($row = mysqli_fetch_array($result)){
                  $num = $num +1;
                  $student_id = $row['student_id'];
                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['Email'];
                  $course = $row['course'];
                  $mentor_id = $row['mentor_id'];
                  $intime = $row['intime'];
                  $outtime = $row['outtime'];
                  echo"<tr><td>$num<td>$student_id<td>$first_name<td>$last_name<td>$email<td>$course<td>$mentor_id<td>$intime<td>$outtime</tr>";
                }
                echo "</table>";


            
              }
              else{
                echo "<br>No records in the database. \n";
                
                mysqli_free_result($result);
              }
            }
            else{
              echo "<br>No result set return from the database. \n";
          
            }
        


          }
          elseif ($report_type == "mentor") {
        
            if ($report_period == "past_week") {
              $day_begin = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
              $day_end = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
          
              if($keyword=='*'){
                $query = "select * from Mentor_Clock where intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }else{
                $query = "select * from Mentor_Clock where login_id like '%keyword%' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }
            }
            elseif ($report_period == "current_month") {
              $day_begin = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
              $day_end = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
              if($keyword=='*'){
                $query = "select * from Mentor_Clock where intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }else{
                $query = "select * from Mentor_Clock where login_id like '%keyword%' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }
            }
            elseif($report_period == "past_month"){
              $day_begin = date("Y-m-d", mktime(0,0,0,date("m")-1,1,date("Y")));
              $day_end = date("Y-m-d",mktime(0,0,0,date("m")-1,31,date("Y")));
              if($keyword=='*'){
                $query = "select * from Mentor_Clock where intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }else{
                $query = "select * from Mentor_Clock where login_id like '%keyword%' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
              }
            }
            else{
              if($keyword=='*'){
                $query = "select * from Mentor_Clock";
              }else{
                $query = "select * from Mentor_Clock where login_id like '%$keyword%'";
              }
            }
      
        
            $result = mysqli_query($con,$query);
        
            if ($result) {
              if (mysqli_num_rows($result)>0) {
                echo "Report by $report_type during period: $report_period";
                
                echo "<table border=1>\n";
                
                echo "<tr><td>#<td>Login ID<td>Log in time<td>Log out time</tr>";
                
                $num = 0;
                
                while ($row = mysqli_fetch_array($result)) {
                  $num = $num + 1;
                  $login_id=$row['login_id'];
                  $intime = $row['intime'];
                  $outtime = $row['outtime'];
                  
                  echo "<tr><td>$num<td>$login_id<td>$intime<td>$outtime";
                  
                  
                }
            
                    
                echo "</table>\n";
                echo "<br><a href='CPS5920_employee2_check.php'>Employee home page</a>";            
              }
              else{
                echo "<br>No records in the database";
                echo "<br><a href='CPS5920_employee2_check.php'>Employee home page</a>";
                mysqli_free_result($result);
              }
            }
            else{
              echo "<br>No result set return from the database,";
              echo "<br><a href='CPS5920_employee2_check.php'>Employee home page</a>";
            }
          }
      
        }

      }elseif(isset($_COOKIE['ulogin_id'])){
        echo "<form name='input' action='report.php' method='post' >
        View Reports -
        period:
        <select name='report_period'>
        <option value='all'>all</option>
        <option value='past_week'>past week</option>
        <option value='current_month'>current month</option>
         <option value='past_month'>past month</option>
         </select>
         
         Enter a keyword to search (* for ALL): 
         <input type ='text' name='keyword' value = '*' required='required'>
         <input type='submit' value='Submit'>
         </form>
        ";

        if(isset($_POST['report_period'])||isset($_POST['keyword'])){

          $report_period = $_POST['report_period'];
          $ulogin_id=$_COOKIE['ulogin_id'];
          $keyword = $_POST['keyword'];


          echo"<br>Here is all the student tutoring information.";


          if ($report_period == "past_week") {
            $day_begin = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
            $day_end = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
            if($keyword=='*'){
              $query = "select * from SEStudent where mentor_id = '$ulogin_id' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
            }else{
              $query = "select * from SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%') and mentor_id = '$ulogin_id' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
            }
          
          }
          elseif ($report_period == "current_month") {
            $day_begin = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
            $day_end = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
            if($keyword=='*'){
              $query = "select * from SEStudent where mentor_id = '$ulogin_id' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
            }else{
              $query = "select * from SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%') and mentor_id = '$ulogin_id' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
            }
          }
          elseif ($report_period == "past_month") {
            $day_begin = date("Y-m-d", mktime(0,0,0,date("m")-1,1,date("Y")));
            $day_end = date("Y-m-d",mktime(0,0,0,date("m")-1,31,date("Y")));
            if($keyword=='*'){
              $query = "select * from SEStudent where mentor_id = '$ulogin_id' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
            }else{
              $query = "select * from SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%') and mentor_id = '$ulogin_id' and intime between '$day_begin' and '$day_end' and outtime between '$day_begin' and '$day_end'";
            }
          }
          else {
            if($keyword=='*'){
              $query = "SELECT * FROM SEStudent where mentor_id = '$ulogin_id' ";
            }else{
              $query = "SELECT * FROM SEStudent where (student_id like '%$keyword%' or first_name like '%$keyword%' or last_name like '%$keyword%' or Email like '%$keyword%' or course like '%$keyword%') and mentor_id = '$ulogin_id'";
            }
          }
          
          $result = mysqli_query($con,$query);
        
          if($result){
            if (mysqli_num_rows($result)>0) {     
              echo "<br><br>Report during period: <b>$report_period</b>";
              echo "<table border=1>\n";
              echo "<tr><td>#<td>Student ID<td>First name<td>Last name<td>Email<td>Course<td>Mentor ID<td>Log in time<td>Log out time</tr>";

              $num = 0;

              while($row = mysqli_fetch_array($result)){
                $num = $num +1;
                $student_id = $row['student_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['Email'];
                $course = $row['course'];
                $mentor_id = $row['mentor_id'];
                $intime = $row['intime'];
                $outtime = $row['outtime'];
                echo"<tr><td>$num<td>$student_id<td>$first_name<td>$last_name<td>$email<td>$course<td>$mentor_id<td>$intime<td>$outtime</tr>";
              }
              echo "</table>";
            }
            else{
              echo "<br>No records in the database. \n";
              
              mysqli_free_result($result);
            }
          }
          else{
            echo "<br>No result set return from the database. \n";
          
          }
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
