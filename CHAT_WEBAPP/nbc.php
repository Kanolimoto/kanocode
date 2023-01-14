<?php

 $servername = "localhost";
        $username = "root";
        $password = "459717";
        $dbname = "chat";
       
        
       $c=array();
       $t=array();
       $n=array();
$i=0;


        $conn = mysqli_connect($servername, $username, $password, $dbname);





$getIcon = "SELECT Name,Content,Time from chat_table";
    $gotIcon = $conn->query($getIcon);
    while ($row = $gotIcon->fetch_assoc()) {
        
        $c[$i]= $row["Content"];
        $t[$i]= $row["Time"];
        $n[$i]= $row["Name"];
        echo "<div class='card'>
  <div class='card-header'>$n[$i]</div>
  <div class='card-body'><h4>$c[$i]</h4></div> 
  <div class='card-footer'>$t[$i]</div>
      </div>
</div>";
         
        $i++;
       
    }
    
   