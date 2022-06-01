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
 $sql = "SELECT * FROM employee
 ORDER BY employee_id ASC ";

 $results = $db->query($sql)
 or die ('Problem with query: ' . $db->error);

?>
<!DOCTYPE html>
<html>
<script type ="text/javascript" src="javascript/create.js"> </script>

<h><?php echo $date; ?></h>
<body>
    
      <h1>Welcome <?php echo "$login_session $login_session2"; ?></h1> 
      <h2><a href = "chooseReview.php">View Review</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>


     <form id="form" name="form"  method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
            Select Employee:
            <select  id = "employee" name = "employee" required>
            <option value="">--- Select ---</option>

        <?php

            while ($row = $results->fetch_assoc()) { ?> 


                    <option value="<?php echo $row["employee_id"];
                    ?>">
                               <?php echo $row["employee_id"];?>
                    </option>
                <?php
             }
                ?>
            </select>
            <br>
            Enter Year:
            <input type="number" id ="year"  name = "year" max =2030 min=2022 required >
            <br>
            <input type="submit" name="Submit" value="Select" onclick = "validate()"/>
            <div id = "error"> </div>
        </form>
       

        <div id="hidevar2" style="visibility: hidden;"> 
        <div>SELECTED EMPLOYEE </div>
        <table>
         <th>EMPLOYEE INFORMATION</th>
         <tr>


         <td>
            <?php
            $empid = $_POST['employee'];
          $sqlemploy = mysqli_query($db,"SELECT * FROM employee WHERE employee_id ='$empid' ");
   
            $call = mysqli_fetch_assoc($sqlemploy);
            $surname = $call["surname"];
            $firstname = $call["firstname"];
            $job = $call["job_id"];
            $depid = $call ["department_id"];
             echo "Employee ID: $empid"; 
             ?> </td>
        </tr>
        <tr> 
            <td> <?php echo "Surname: $surname"; ?> </td>
        </tr>
        <tr> 
            <td> <?php echo "Firstname: $firstname"; ?> </td>
        </tr>
        <tr> 
            <td> <?php  $sqljob = mysqli_query($db,"SELECT * FROM job WHERE job_id ='$job' ");
            $jbid = mysqli_fetch_assoc($sqljob);
            $jobtitle = $jbid["job_title"];
             echo "Job Title: $jobtitle"; ?> </td>
        </tr>
        <tr> 
            <td> <?php 
            $sqldep = mysqli_query($db,"SELECT * FROM department WHERE department_id ='$depid' ");
            $department = mysqli_fetch_assoc($sqldep);
            $dep = $department["department_name"];
            echo "Department: $dep"; ?> </td>
        </tr>
        <tr> 
            <td><?php 
            $year = $_POST['year'];
            echo "YEAR REVIEW : $year";
            ?>
            </td>
        </tr>
            </table>
            <br>
            <br>
        <table id=tab2 >
        <form id="form2" method = post >
          <th>  Ratings for the employee: 1-5 </th>
          <tr>
            <td>
            Job: <br>
            <input type="number" name="job" id="job">
            </td>
            </tr>
            <tr>
            <td>
            Knowledge: <br>
            <input type="number" name="know" id="know">
            </td>
            </tr>
            <tr>
            <td>
            Work Quality: <br>
            <input type="number" name="work" id="work">
            </td>
            </tr>
            <tr>
            <td>
            Initiative: <br>
            <input type="number" name="init" id="init">
            </td>
            </tr>
            <tr>
                <td>
            Communication: <br>
            <input type="number" name="com" id="com">
            </td>
            </tr>
            <tr>
                <td>
            Dependability: <br>
            <input type="number" name="dep" id="dep">
            </td>
            </tr>
            </form>
            </table>
        </div>
        </body>
        </html>
