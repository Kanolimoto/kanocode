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
        <style>
        * {
            margin: 0;
            padding: 0;
        }

        .chat {
            position: relative;
            max-width: 260px;
            padding: 10px 6px;
            border: 2px solid #ccc;
            margin-top: 50px;
            margin-left: 50px;
            border-radius: 5px;
            word-break: break-all;
        }

        .triangle,
        .triangle_two {
            position: absolute;
            top: 15px;
            border-width: 10px;
            border-style: solid;
        }

        .triangle {
            left: -20px;
            border-color: transparent #ccc transparent transparent;
        }

        .triangle_two {
            right: -20px;
            border-color: transparent transparent transparent #ccc;
        }

        .fill,
        .fill_two {
            position: absolute;
            top: 15px;
            border-width: 10px;
            border-style: solid;
        }

        .fill {
            left: -16px;
            border-color: transparent #fff transparent transparent;
        }

        .fill_two {
            right: -16px;
            border-color: transparent transparent transparent #fff;
        }
    </style>
        <script>
            
      
            
function getContent() {
  var c =  document.getElementById("a").value;
   
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari 执行代码
    xmlhttp=new XMLHttpRequest();
  } else {
    // IE6, IE5 执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("b").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getMesseges.php?message="+c,true);
  xmlhttp.send();
}
</script>
    </head>
    
    <div class="chat">
        <div class="triangle"></div>
        <div class="fill"></div>
        
    </div>
    <div id="b">lm here!</div>
    
    <body>
       
        <input  id="a" type="text" name="box"  />
   <button  onclick="getContent()">弹出</button>

        
    </body>
</html>
