<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>



</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>Search</h1>
    <div data-role="navbar">
      <ul>
        <li><a  data-ajax="false" href="../userpage.php?username=<?php echo $_GET["username"];?>">Homepage</a></li>
        <li><a href="#">Mypane</a></li>
        <li><a href="#">Search</a></li>
      </ul>
    </div>
  </div>
     <div data-role="main" class="ui-content">
     
<form> 
 <input type="text" onkeyup="showHint(this.value)">
</form>
   <script>
    
function showHint(str)
{
    if (str.length==0)
    { 
        document.getElementById("txtHint").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {    
        //IE6, IE5 浏览器执行的代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","gethint.php?q="+str+"&myname=<?php echo $_GET["username"];?>",true);
    xmlhttp.send();
}

</script>      
         
<p><span id="txtHint"></span></p>
    
         
    <div id="textHint"></div>
  
</div>
  <div data-role="footer">
    <h1>Foot</h1>
  </div>
</div> 


</body>
</html>