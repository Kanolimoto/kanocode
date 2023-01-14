<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>
<body onload="PHP1()">
    

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>欢迎访问我的主页</h1>
    <div data-role="navbar">
      <ul>
        <li><a  data-ajax="false" href="userpage.php?username=<?php echo $_GET["username"];?>">homepage</a></li>
        <li><a href="#">my</a></li>
        <li><a href="#">search</a></li>
      </ul>
    </div>
  </div>

  <div data-role="main" class="ui-content">
      <p id="Fcontent">我的内容..</p>
      
     <script>
         setTimeout(PHP1, 1000);
    function PHP1()
{
    
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("Fcontent").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","PHP/showFriend.php?username=<?php echo $_GET["username"];?>",true);
    xmlhttp.send();
}
</script>
  </div>

  <div data-role="footer">
    <h1>我的底部</h1>
  </div>
</div> 


</body> 
</html>
