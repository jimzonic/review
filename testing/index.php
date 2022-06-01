<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM employee WHERE employee_id = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
      
         $_SESSION['login_user'] = $myusername;
         
         header("location: chooseReview.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

   <html>
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link href="css/login.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
   </head>
   <body>
      <div class="login">
         <h1>Login</h1>
         <form method="post">
            <label for="username">
               <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required >
            <label for="password">
               <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">
         </form>
         <div><?php echo $error; ?></div>
               
            </div>
      </div>

      <p> The Dunder Mifflin performance planning and review process is intended to assist supervisors to review the performance of staff annually and develop agreed performance plans based on workload agreements and the strategic direction of Dunder Mifflin.  <br>
 
      The Performance Planning and Review system covers both results (what was accomplished), and behaviours (how those results were achieved). The most important aspect is what will be accomplished in the future and how this will be achieved within a defined period. The process is continually working towards creating improved performance and behaviours that align and contribute to the mission and values of Dunder Mifflin.

</p>
   </body>
</html>