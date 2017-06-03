

<html>
<head>
       <link rel="stylesheet" type="text/css" href="mainsheet.css">
        <link type="text/css" rel="stylesheet" href="newcss.css">
        <meta charset="UTF-8">
        <title>Student Portal</title>
<body>
    
    <div class="head">
                                                                     
            <h1>Student portal</h1>

        </div>
    
      <div class="meny">
        <ul>
        <li> <a href="index.php" class="knapp">Registrer</a></li>
        <li><a href="studentliste.php" class="knapp">Student list</a></li>
        <li><a href="year_reg.php" class="knapp">Registrer year</a></li>
        <li><a href="delete_student.php" class="knapp">Delete Student</a></li>
        
        </ul>
    </div>
    
   <?php
   
        error_reporting(0);  
       $db= new mysqli("10.1.2.194","user","dats37","students");

        if(!$db)
        {
            die("Could not connect to database".$db->connect_error);
        }
        if($db->connect_error){
               die("Database Connection Error");
                  }
        elseif($db)
        {
?>


<?php

    
   $sql = "SELECT * FROM student;";
                $result = $db->query($sql);
                
               
              

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row["ID"];
                       
                        echo "<table style='border:black solid 2px;'>";
                        echo "<tr>"."<td id='student'> id: " . $row["ID"]. "<td id='student'> Name: " . $row["firstname"]. " " . $row["lastname"]. "<td id='student'> Class: " . $row["class"].  "<td id='student'> Email: " . $row["email"]."<td id='student'> Start year: " . $row["startyear"]. " <br/>  </td><br></tr>";
                         $sql2 = "SELECT * FROM years WHERE ID = '$id' ORDER BY year";
                         $result2 = $db->query($sql2);
                         while($row2 = $result2->fetch_assoc()) {
                             echo "<tr>"."<td>" .  "Year :" . $row2["year"] . "<td>" ." Semester :" . $row2["semester"] . "<td>" ." Class 1: " . $row2["fag1"] .  " grade : " . $row2["fag1_grade"] .  "<td>" ." Class 2: " . $row2["fag2"] .  " grade: " . $row2["fag2_grade"] .  "<td>" ." Class 3: " . $row2["fag3"] . " grade: " . $row2["fag3_grade"] ."<br></td></tr> ";
                         }
                         echo "</table>"; 
                    }
                  
                }
                else {
                    echo "0 results";
                }

        }


?>
 
    
          <div class="footer">
            <?php
             echo "Web Server IP: " . $_SERVER['SERVER_ADDR'] . "</br>";
           
            error_reporting(0);  
            $db2= new mysqli("10.1.2.194","user","dats37","studentsysinfo");
             if($db2->connect_error){
               echo "Database Connection Error";
                  }
             else{ 
                 
                $r = mysqli_get_host_info($db2);
                if($r !== FALSE){
                        echo "Database IP: " . $r;
                         }
                else {
                        echo "Could not connect to the database";
                        }
                 
                 }
           
            
          
            $db2->close();
           
            ?>

          </div>
    
    
</body>
</html>


