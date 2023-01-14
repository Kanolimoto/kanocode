<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php $he=$_GET["username"];
        

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

</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
      <a data-ajax="false" href="index.php" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Exit</a>
    <h1>Mypage</h1>
    <a  data-ajax="false" href="PHP/serchpage.php?username=<?php echo $_GET["username"]; ?>" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>
    <div data-role="navbar">
      <ul>
          <li><a  data-ajax="false" href="userpage.php?username=<?php echo $_GET["username"];?>">Live</a></li>
        <li><a href="#myPanel">Mypanel</a></li>
        <li><a href="#">Mypage</a></li>
      </ul>
    </div>
  </div>

  <div data-role="main" class="ui-content">
      <form action="PHP/GetContent.php?username=<?php echo $_GET["username"];?>" method="post">

                    <textarea  class="inputtext" name="content"rows="6" cols="50">

                    </textarea>
                    
                    <div></div>
                    <input  class="button"  type="submit" value="Submit">
                </form>
      
      
      <div id="content22">
        
    </div>
  </div>

  <div data-role="footer">
    
  </div>
    
    
    
    
    
    <!-- mianban -->  

  <div data-role="panel" id="myPanel"> 
    <h2><?php echo $he ?></h2>
            <div>
                <a href="PHP/headIconImport.php?name=<?php echo $he;?>"><img src="headIcon/<?php echo $AarrayInformation[0];?>" alt="John" style="width:33%"></a>
                <div class="container">
                    
                    <h1></h1>
                    <a data-role="button" data-ajax="false" href="follower.php?username=<?php echo $_GET["username"]; ?>">My friends</a><hr>
                    <a>Emai</a>   <?php if(empty($AarrayInformation[1])){  echo '';} else {echo    $AarrayInformation[1];} ?><hr>
                    <a>Tell</a>   <?php if(empty($AarrayInformation[2])){  echo '';} else {echo    $AarrayInformation[2];} ?><hr>
                    <a>Country</a>   <?php if(empty($AarrayInformation[6])){  echo '';} else {echo    $AarrayInformation[6];} ?><hr>
                    <a>Age</a>   <?php if(empty($AarrayInformation[4])){  echo '';} else {echo    $AarrayInformation[4];} ?><hr>
                     <a>Birthday</a>   <?php if(empty($AarrayInformation[3])){  echo '';} else {echo    $AarrayInformation[3];} ?><hr>
                    <a  data-role="button" href="PHP/informationReword.php?username=<?php echo $he ;?>">Reword</a>
              
               

  
    
    <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">星期三, 1 月 2 日, 2013 <span class="ui-li-count">2</span></li>   
      <li><a href="#">   
              
        <h2>医生</h2>
        <p><b>To Peter Griffin</b></p>
        <p>Well, Mr. Griffin, I've looked into physical results.</p>
        <p>Ah, Mr. Griffin, I'm not quite sure how to say this. Kim Bassinger? Bass singer? Bassinger?</p>
        <p>But now, onto the cancer</p>
        <p>You are a Cancer, right? You were born in July? Now onto these test results.</p>
        <p class="ui-li-aside">Re: Appointment</p></a>
      </li>
      <li><a href="#">
        <h2>Glen Quagmire</h2>
        <p>Don't forget me this weekend!</p>
        <br>
        <p>- giggity giggity goo</p>
        <p class="ui-li-aside">Re: Camping</p></a>
      </li>
      <li data-role="list-divider">周二, 1 月 1 日, 2013 <span class="ui-li-count">1</span></li>   
      <li><a href="#">   
        <h2>Louis</h2>
        <p><b>Happy Girl!</b></p>
        <p>Thank you so much, Peter!!</p>
        <p class="ui-li-aside">Re: Christmas Gifts</p></a>
      </li>
    </ul>
  </div>

            </div>
  </div>
    
    
    
    
</div> 
  <script>
            setTimeout(PHP1, 1000);
            function PHP1()
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
                        document.getElementById("content22").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "PHP/MypageshowContent.php?name=<?php echo $he; ?>", true);
                xmlhttp.send();
            }
        </script>  
    
    
  

</body>
</html>
