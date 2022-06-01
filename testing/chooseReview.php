<?php
include('config.php');
$date = date('d-m-y h:i:s');

   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM employee WHERE employee_id = '$user_check' ");
   
   $row = mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['firstname'];
   $login_session2 = $row['surname'];

   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
 $sql = "SELECT * FROM review
 WHERE employee_id = '$user_check'
 ORDER BY review_year DESC ";


$sqltwo = "SELECT * FROM review WHERE completed !='Y'
 ORDER BY review_year DESC ";



 $results = $db->query($sql)
 or die ('Problem with query: ' . $db->error);
 $results2 = $db->query($sqltwo)
 or die ('Problem with query: ' . $db->error);

// This is for normal employee

if ($user_check != "DMCEO"){ ?>

<html>
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h><?php echo $date; ?></h>
      <h1>Welcome <?php echo "$login_session $login_session2"; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>

      <table>
        <th>REVIEW ID</th> 
        <th>REVIEW YEAR  </th>
        <th> STATUS </th>
        
    
         <tr>
 <?php
    while ($row = $results->fetch_assoc()) { ?> 
         <tr>
         <td><a href = ""> REVIEW <?php echo $row["review_id"]?> </a>
         </td>
         <td><?php echo $row["review_year"]?></td>
         <td><?php if($row["completed"] == 'Y'){
               echo "COMPLETED";
               }else {
               echo "CURRENT";
               } ?>
            </td>
            </tr>
 <?php }
  ?>
         </table>
   
 <?php 

// This is for supervisor page 

} elseif($user_check = "DMCEO"){ ?>

    <h><?php echo $date; ?></h>
      <h1>Welcome <?php echo "$login_session $login_session2"; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
      <div>
      <button type=button> <a href = "createReview.php"> CREATE REVIEW </a> </button>
      <br>
      <br>
      <br>
</div>
   <div>CURRENT REVIEWS</div>
   <br>
      <table>
         <th>SURNAME</th>
         <th>FIRSTNAME</th>
        <th>REVIEW ID</th> 
        <th>REVIEW YEAR  </th>
        <th>EMPLOYEE ID</th>
        <th> STATUS </th> 
         <th>DATE COMPLETED</th>
    
         <tr>
<?php
    while ($row2 = $results2->fetch_assoc()) { ?> 
         <tr>


         <td>
            <?php
            $empid = $row2["employee_id"];
          $sqlemploy = mysqli_query($db,"SELECT * FROM employee WHERE employee_id ='$empid' ");
   
            $call = mysqli_fetch_assoc($sqlemploy);
            $surname = $call["surname"]; ?>
            <a href = ""> <?php echo "$surname"?> </a>
           
         </td>
          <td>
             <?php
             
            $empid = $row2["employee_id"];
          $sqlemploy = mysqli_query($db,"SELECT * FROM employee WHERE employee_id ='$empid' ");
   
            $call = mysqli_fetch_assoc($sqlemploy);
            $first = $call["firstname"]; 
            echo "$first"?> 
          
           
          </td>
         <td> REVIEW <?php echo $row2["review_id"]?> </td>
         <td><?php echo $row2["review_year"]?></td>
         <td><?php echo $row2["employee_id"]?></td>
         <td><?php echo "CURRENT" ?></td>
           <td><?php echo $row2["date_completed"]?></td> 
            </tr> 
         
<?php
 }  $sqlthree = "SELECT * FROM review WHERE completed ='Y'
 ORDER BY review_year DESC ";
  $results3 = $db->query($sqlthree)
 or die ('Problem with query: ' . $db->error);

 ?>
         </table>
<br>
   <div>COMPLETED REVIEWS</div>
   <br>
      <table>
         <th>SURNAME</th>
         <th>FIRSTNAME</th>
        <th>REVIEW ID</th> 
        <th>REVIEW YEAR  </th>
        <th>EMPLOYEE ID</th>
        <th> STATUS </th> 
         <th>DATE COMPLETED</th>
    
         <tr>
<?php
    while ($row2 = $results3->fetch_assoc()) { ?> 
         <tr>


         <td>
            <?php
            $empid = $row2["employee_id"];
          $sqlemploy = mysqli_query($db,"SELECT * FROM employee WHERE employee_id ='$empid' ");
   
            $call = mysqli_fetch_assoc($sqlemploy);
            $surname = $call["surname"]; ?>
            <a href = ""> <?php echo "$surname"?> </a>
           
         </td>
          <td>
             <?php
             
            $empid = $row2["employee_id"];
          $sqlemploy = mysqli_query($db,"SELECT * FROM employee WHERE employee_id ='$empid' ");
   
            $call = mysqli_fetch_assoc($sqlemploy);
            $first = $call["firstname"]; 
            echo "$first"?> 
          
           
          </td>
         <td> REVIEW <?php echo $row2["review_id"]?> </td>
         <td><?php echo $row2["review_year"]?></td>
         <td><?php echo $row2["employee_id"]?></td>
         <td><?php echo "COMPLETED"?></td>
           <td><?php echo $row2["date_completed"]?></td> 
            </tr> 
            

<?php
 } } 

 $db->close(); ?>

         </table>
      <br>
 

 </body>
   
</html>
