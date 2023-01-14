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




$conn = mysqli_connect($servername, $username, $password,$dbname);
 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT UserName,UserPassword from user_table";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)) {
      $a[]= $row["UserName"];
       
       
   }
       
       $b=array();

//从请求URL地址中获取 q 参数
$q=$_GET["q"];

//查找是否由匹配值， 如果 q>0
if (strlen($q) > 0)
{
    $hint="";
    for($i=0; $i<count($a); $i++)
    {
        if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
        {
            
                $b[]=$a[$i];
            
            
        }
    }
}

// 如果没有匹配值设置输出为 "no suggestion" 
if ($hint == "")
{
    $response="no suggestion";
}


//输出返回值
for($i=0;$i<count($b);$i++){
    echo "

  <div data-role='header' style='background:#F6CEEC'>
    <img src='https://static.runoob.com/images/mix/img_avatar.png' alt='John' style='width:10%'>    <span style='font-size:20px'>$b[$i]</span>
  </div>

  <div data-role='main' class='ui-content' style='background:#EFF2FB'>".
  
    
        
         
         "<p style='font-size:10px; margin-left:250px;'></p>
  </div>

  <div data-role='footer'>
  <div data-role='controlgroup' data-type='horizontal' style='text-align: center;'>
      
      <a  style='display: inline-block; font-size: 10px; ' href='AddFriends.php?friendname=$b[$i]&myname={$_GET["myname"]}' class='ui-btn'>Add Friend</a>
     
      <a  style='display: inline-block; font-size: 10px; ' href='#' class='ui-btn'>delete</a>
    </div><br>
  </div>

";
    
    
}

        ?>
    </body>
</html>
