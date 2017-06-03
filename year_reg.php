<?php

?>

<html>
    
    <head>
       
            <link rel="stylesheet" type="text/css" href="mainsheet.css">
        <link type="text/css" rel="stylesheet" href="newcss.css">
        <meta charset="UTF-8">
        <title>Student Portal</title>
    </head>
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
         if(isset($_POST["Oppdater"]))
        {
             $db= new mysqli("10.1.2.194","user","dats37","studentsysinfo");

        if(!$db)
        {
            die("Could not connect to database".$db->connect_error);
        }
        if($db->connect_error){
               die("Database Connection Error");
                  }
        
        
            $lagresemester = $_POST["semester"];
            $lagreID = $_POST["ID"];
            
            $lagreyear = $_POST["year"];
            $lagreFag1 = $_POST["fag1"];
            $lagreFag2 = $_POST["fag2"];
           
            $lagreFag3 = $_POST["fag3"];
        
           
            $lagreFag1_grade = $_POST["fag1_grade"];
            $lagreFag2_grade = $_POST["fag2_grade"];
           
            $lagreFag3_grade = $_POST["fag3_grade"];
            $lagreFag1_code = $_POST["fag1_code"];
            $lagreFag2_code = $_POST["fag2_code"];
           
            $lagreFag3_code = $_POST["fag3_code"];
       
           

            $check = array( $lagreID,$lagreyear,$lagreFag1, $lagreFag2,$lagreFag3, $lagreFag1_grade,$lagreFag2_grade,$lagreFag3_grade,$lagresemester,$lagreFag1_code,$lagreFag2_code,$lagreFag3_code);                                                                            
            for($i = 0; $i <= count($check);){
                if($check[$i] == ""){
                  die ("Please fill out ALL");

                  }

                elseif(!($check[$i] == "")) {
                    break;
                }
                $i++;
                     }
               
              $sql1 = " SELECT ID FROM student WHERE ID = '$lagreID';";
                
             $resultat11 = $db->query($sql1);
            
            
                if($resultat11->num_rows < 1){
                            echo "This student has not been registred, please go to the student registere page";
                            
                          }
                else{  
                        
                         $sql3 = "SELECT * FROM years WHERE year = '$lagreyear' AND semester = '$lagresemester';";
                   
                         $resultat3 = $db->query($sql3);
                        if($resultat3->num_rows > 0){
                
                             
                            $sql2 = "UPDATE `years` SET fag1_code= '$lagreFag1_code',fag2_code= '$lagreFag2_code',fag1= '$lagreFag3_code', fag1= '$lagreFag1',`fag1_grade`='$lagreFag1_grade',`fag2`='$lagreFag2',`fag2_grade`='$lagreFag2_grade',`fag3`='$lagreFag3',`fag3_grade`='$lagreFag3_grade' WHERE year = '$lagreyear' AND semester = '$lagresemester' AND ID = '$lagreID';";
                            $resultat2 = $db->query($sql2);

                              
                              if($db->affected_rows > 0)
                                {   echo "Year updated";
                                    
                                }
                              else{
                                echo "Could not update";
                                             }
                                }
                        else{ 

                                           
                                           $sql = " INSERT INTO years (ID,   fag1_code, fag2_code, fag3_code ,fag1, fag2, fag3, fag1_grade, fag2_grade, fag3_grade, semester, year) VALUES ('$lagreFag1_code','$lagreFag2_code,'$lagreFag3_code' ,'$lagreID','$lagreFag1','$lagreFag2','$lagreFag3','$lagreFag1_grade','$lagreFag2_grade','$lagreFag3_grade','$lagresemester','$lagreyear');";
                                           $resultat = $db->query($sql);

                                            
                                    if($db->affected_rows > 0)
                                    {
                                        echo "Student year registered <br/>";
                                    }

                                    else
                                        {
                                        echo "Something went wrong";
                                         }
                                               }
                    }
             $db->close();
           }
  
        ?>

        
        
        
        
        
        
        
        <div class="section">
            <div class="block">  
                <form action="" method="post" id="1">
                   <label for="year">År:</label>
                <input id="year" name="year" type="text" value="" />  
                <label for="Semester">Semester:</label>
                <select name="semester">
                   <option value="Spring">Spring</option>
                  <option value="Fall">Fall</option>
                  </select> 
                   <label for="year">Student ID:</label>
                <input id="firstname" name="ID" type="text" value="" />  
             
                
            <input type="submit" name ="Oppdater" value="Registrer" id="1"/>
              
              </div> 
        </div> 


        
                <div class="section">        
              
        <div class="block">
            
                <label for="fag 1">Course 1 Code:</label>
                <input id="fag1_grade" name="fag1_code" type="text" value="" />
            
                 <label for="fag 1">Course 1 Name:</label>
                <input id="fag1" name="fag1" type="text" value="" />
                
                 <label for="fag 1">Course 1 Grade:</label>
                <input id="fag1_grade" name="fag1_grade" type="text" value="" />
                
                
                    </div>      
                <div class="block">
                  <label for="fag 1">Course 2 Code:</label>
                <input id="fag1_grade" name="fag2_code" type="text" value="" />
                    
                 <label for="alder">Course 2 Name:</label>
                 <input id="fag2" name="fag2" type="text" value=""/>
                  <label for="fag 1">Course 2 Grade:</label>
                <input id="fag2_grade" name="fag2_grade" type="text" value="" />
                </div>
                <div class="block">
                   <label for="fag 1">Course 3 Code:</label>
                <input id="fag1_grade" name="fag3_code" type="text" value="" />  
                    
                 <label for="alder">Course 3 Name:</label>
                 <input id="fag3" name="fag3" type="text" value=""/>
                     <label for="fag 1">Course 3 Grade:</label>
                <input id="fag3_grade" name="fag3_grade" type="text" value="" />
              </div>
           
                    </div>  
        
        
        
           <div class="footer">
            <?php 
             echo "Web Server IP: " . $_SERVER['SERVER_ADDR'] . "</br>";
           
            error_reporting(0);  
            $db2= new mysqli("10.1.2.194","user","dats37","students");
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