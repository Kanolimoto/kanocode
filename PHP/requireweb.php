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
$dbname="users";

$Name=$_POST["name"];
$passwords=$_POST["passwords"];

$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user_id, user_name,user_password from user_table";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        if($row["user_name"]!==$Name&&$row["user_password"]!==$passwords){
            echo 'you put in username or password is error';
        } else {
             $url="http://localhost/PHP/homepage.html" ;  

echo " <script language = 'javascript' type = 'text/javascript'>";  

echo " window.location.href = '$url' ";  

echo " </script>"; 
        }
       
    }
} else {
    echo "0 结果";
}
$conn->close();
?>

                
  
  
        
    </body>
</html>
