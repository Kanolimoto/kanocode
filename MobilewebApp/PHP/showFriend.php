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
$dbname="weibo";

$myname=$_GET["username"];
$a=array();

$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT follow_name, submission_date 
        FROM ".$myname."_followtable";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)) {
      $a[]= $row["follow_name"];
       
       
   }     
        
        
 if (mysqli_query($conn, $sql)) {
    
      for($i=0;$i<count($a);$i++){
    echo "

  <div data-role='header' style='background:#F6CEEC'>
    <img src='https://static.runoob.com/images/mix/img_avatar.png' alt='John' style='width:10%'>    <span style='font-size:20px'>$a[$i]</span>
  </div>

  <div data-role='main' class='ui-content' style='background:#EFF2FB'>".
  
    
        
         
         "<p style='font-size:10px; margin-left:250px;'></p>
  </div>

  <div data-role='footer'>
  <div data-role='controlgroup' data-type='horizontal' style='text-align: center;'>
      
      
    </div><br>
  </div>

";
    
    
}
     
     
     
     
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
        ?>
    </body>
</html>
