<?php

 if(isset($_POST["Oppdater"]))
        {
             $db= new mysqli("10.1.2.194","user","dats37","students");

        if(!$db)
        {
            die("Could not connect to database ".$db->connect_error);
        }
        if($db->connect_error){
               die("Database Connection Error");
                  }

            $lagreDelete = $_POST["delete"];
          
          
           

            $check = array($lagreDelete);                                                                            
            for($i = 0; $i <= count($check);){
                if($check[$i] == ""){
                  die ("Please provide student ID");

                  }

                elseif(!$check[$i] == "") {
                    break;
                }
                $i++;
                     }


     
           
                   $sql = "DELETE FROM student WHERE ID = '$lagreDelete';";
                   $sql2 = "DELETE FROM years WHERE ID = '$lagreDelete';";
                   $resultat = $db->query($sql);
                   $resultat2 = $db->query($sql2);
                   if($db->affected_rows > 0)
                                    {
                                        echo "Student deleted OK <br/>";
                                    }

                                    else
                                        {
                                        echo "Feil oppstod";
                                         }
                                               }


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
        
              <section class="left">

            <h1>Student Delete:</h1>
            <form action="" method="post" id="1">
                <label for="first_name">Student ID:</label>
                    <input id="delete" name="delete" type="text" value=""/>
                   
              
                 
                 <input type="submit" name ="Oppdater" value="Delete"/>

            </form>

        </section>
        
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








