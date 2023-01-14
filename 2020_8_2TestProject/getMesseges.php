<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "459717";
        $dbname = "Chat";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $a = $_GET["message"];

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO chat_table (Name,Content,Time)
VALUES ('HE','$a',now())";


        if (mysqli_query($conn, $sql)) {

            
        } else {
            echo "not good";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


        $getid = "SELECT * FROM chat_table";
        $gotid = $conn->query($getid);

        if ($gotid->num_rows > 0) {

            while ($row = $gotid->fetch_assoc()) {
                
                echo "<div class='chat'>";
        echo "<div class='triangle'></div>";
        echo  $row["Content"]."<br>";
        echo "<div class='fill'></div>";
       echo "</div>";
    
               
            }
        }
        
        
        $conn->close();
        ?>


    </body>
</html>
