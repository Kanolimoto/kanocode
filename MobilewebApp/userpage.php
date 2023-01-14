<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php 
$he = $_GET["username"];
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "weibo";

$conn = mysqli_connect($servername, $username, $password,$dbname);

$getinfomation = "SELECT * FROM user_table where UserName='".$he."'";
$gotinfomation = $conn->query($getinfomation);
$AarrayInformation =array();
   




if ($gotinfomation->num_rows > 0) {

    while ($row = $gotinfomation->fetch_assoc()) {
        
        $AarrayInformation[] = $row["Icon"];    //0
        $AarrayInformation[] = $row["Email"];   //1 
        $AarrayInformation[] = $row["Tell"];    //2 
        $AarrayInformation[] = $row["BirthDay"];    //3
        $AarrayInformation[] = $row["Age"];     //4
        $AarrayInformation[] = $row["Name"];    //5
        $AarrayInformation[] = $row["Country"];     //6
    }
} else {
    echo "Getinformation was error!";
}

print_r($AarrayInformation);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        

<!--<script src="JS/Userpage_content.js"> </script>-->

    </head>
    <body>

        <div data-role="page" id="pageone">
            <div data-role="header">

                <a data-ajax="false" href="index.php" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Exit</a>
                <h1>Myblog</h1>
                <a  data-ajax="false" href="PHP/serchpage.php?username=<?php echo $_GET["username"]; ?>" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>
                <div data-role="navbar">
                    <ul>
                        <li><a data-ajax="false"  href="userpage.php?username=<?php echo $_GET["username"]; ?>" class="ui-btn ui-corner-all ui-shadow ui-icon-action ui-btn-icon-left">Home</a></li>
                        <li><a   href="#myPane" class="ui-btn ui-corner-all ui-shadow ui-icon-info ui-btn-icon-left">myPane</a></li>
                        <li><a  data-ajax="false" href="userMypage.php?username=<?php echo $_GET["username"]; ?>" class="ui-btn ui-corner-all ui-shadow ui-icon-user ui-btn-icon-left">Mypage</a></li>
                    </ul>
                </div>
            </div>

            <div data-role="main" class="ui-content" style="margin-bottom: 50px;">

                <form action="PHP/GetContent.php?username=<?php echo $_GET["username"]; ?>" method="post" >

                    <textarea  class="inputtext" name="content"rows="6" cols="50">

                    </textarea>


                    <input  class="ui-btn ui-btn-inline"  style="; "type="submit" value="Submit">

                </form>

                <div id="content123">

                </div>  

            </div>
            <div data-role="footer">
     
  </div>
            
            
            
            
            
            <div data-role="panel" id="myPane"  style="background-color: #18cfcf;"> 
                
            <h2>MY INFOMATION</h2>
            <div>
                <a data-role="button">xxxxxx</a>
                <a data-role="button">xxxxxx</a>
                <a data-role="button">xxxxxx</a>
                <a data-role="button">xxxxxx</a>
                <a data-role="button">xxxxxx</a>
                <a data-role="button">xxxxxx</a>
                
                </div>
            </div>
        </div>
            
            
            
            
            
            
            
        </div>   <!--page one-->


        <!--dialog-->






        <!-- mianban -->  

        













        <script>
//            setTimeout(PHP, 1000);
            window.onload=PHP;
            function PHP()
            {

                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("content123").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "PHP/HomepageContentGet.php?name=<?php echo $he; ?>&photo=<?php echo $AarrayInformation[0]?>", true);
                xmlhttp.send();
            }
           
            var u=0;
            
           function disappear(num){
                  var modal = document.getElementById(num); 
                 
                 modal.style.display = "none";
                 u=0;
             } 
                
                
                
           
               function show(num){
                var id=num;
                if(u==0){
                     var modal = document.getElementById(id); 
               
             modal.style.display = "block";
                    u=1;
                    
                }else if(u==1){
                    disappear(id);
                
        }
                
             } 
                
                
            
                
           
            
         
        </script>




    </body>

</html>
