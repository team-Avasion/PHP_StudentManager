<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

            $lagreFornavn = $_POST["first_name"];
            $lagreEtternavn = $_POST["last_name"];
            $lagreKlasse = $_POST["studie"];
            $lagreEmail = $_POST["email"];
             
            $lagreStartyear = $_POST["study_start"];
          
           

            $check = array($lagreKlasse,$lagreEtternavn,$lagreFornavn,$lagreStartyear);                                                                            
            for($i = 0; $i <= count($check);){
                if($check[$i] == ""){
                  die ("Please fill out ALL");

                  }

                elseif(!$check[$i] == "") {
                    break;
                }
                $i++;
                     }


     
           
                   $sql = "INSERT INTO student (firstname, lastname, class, startyear, email) VALUES ('$lagreFornavn','$lagreEtternavn','$lagreKlasse','$lagreStartyear','$lagreEmail');";
                   $resultat = $db->query($sql);

                    if(!$resultat){
                echo "Could not register student, please try again later";
                       }
            elseif($db->affected_rows>0)
            {
                echo "Student oppdatert OK <br/>";
            }
             
            else
                {
                echo "Feil oppstod";
                 }
             
              
            $db->close();
           }
   
        ?>



        <section class="l">

            <h1>Student registrering:</h1>
            <form action="" method="post" id="1">
                <label for="first_name">Fornavn:</label>
                    <input id="input" name="first_name" type="text" value=""/>
                <label for="last_name">Etternavn:</label>
                <input id="input" name="last_name" type="text" value=""/>
                
                <label for="address">Studie:</label>
                    <input id="input" name="studie" type="text" value=""/>
                    
                    <label for="address">Email:</label>
                    <input id="input" name="email" type="text" value=""/>
                   
                  <label for="address">Start år:</label>
                    <input id="input" name="study_start" type="text" value=""/>    
              
                 
                 <input type="submit" name ="Oppdater" value="Registrer"/>

            </form>

        </section>

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
</html>
