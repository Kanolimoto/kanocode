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
        $dbname = "chat";
        
        $Content = $_GET["q"];
         $name = $_GET["n"];


        $conn = mysqli_connect($servername, $username, $password, $dbname);


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO chat_table (name,content,time)
VALUES ('".$name."','".$Content."',NOW())";
       
        
        if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
mysqli_close($conn);
        ?>
    </body>
</html>
