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
  box-sizing: border-box;
}
 
body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}
 
/* 头部标题 */
.header {
/*  padding: 30px;*/
  text-align: center;
  background: white;
}
 
.header h1 {
  font-size: 50px;
}
 
/* 导航条 */
.topnav {
  overflow: hidden;
  background-color: #333;
}
 
/* 导航条链接 */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
 
/* 链接颜色修改 */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
 
/* 创建两列 */
/* Left column */
.leftcolumn {   
  float: left;
  width: 70%;
}
 
/* 右侧栏 */
.rightcolumn {
  float: left;
  width: 30%;
  
  padding-left: 20px;
}
 
/* 图像部分 */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}
 
/* 文章卡片效果 */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}
 
/* 列后面清除浮动 */
.row:after {
  content: "";
  display: table;
  clear: both;
}
 
/* 底部 */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}
/*             button                  */
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
 
/* 响应式布局 - 屏幕尺寸小于 800px 时，两列布局改为上下布局 */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
 
/* 响应式布局 -屏幕尺寸小于 400px 时，导航等布局改为上下布局 */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
ul.pagination {
    
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    border-radius: 5px;
    width: 100px;
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    font-size: 25px;
}
ul.pagination li a.active {
    background-color: #4CAF50;
    color: white;
}

ul.pagination li a:hover:not(.active) {background-color: #9999ff;}
</style>
<script>
function startTime(){
	var today=new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();// 在小于10的数字前加一个‘0’
	m=checkTime(m);
	s=checkTime(s);
	document.getElementById('txt').innerHTML=h+":"+m+":"+s;
	t=setTimeout(function(){startTime()},500);
}
function checkTime(i){
	if (i<10){
		i="0" + i;
	}
	return i;
        
}


</script>
    </head>
    <link rel="stylesheet" type="text/css" href="calendar.css">
    <link rel="stylesheet" type="text/css" href="photo.css">
    <body style=" background-color: #99ff99"  onload="startTime()">
        
        
        
        <?php
        
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname="words";
$title="";
$content="";
$time="";
$accountnum=0;
$id;
$num=0;
$card= array(
           "words_id"=>array(),
            "words_title"=>array(),
            "submission_date"=>array()
        );
$ph= array(
           "p_id"=>array(),
            "p_name"=>array(),
            "p_date"=>array()
        );
        
        

$conn = mysqli_connect($servername, $username, $password,$dbname);
 


// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
$alter="ALTER TABLE setwords_table DROP words_id";
$add="ALTER TABLE setwords_table ADD words_id INT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (words_id)";
$alter1="ALTER TABLE photo_table DROP p_id";
$add1="ALTER TABLE photo_table ADD p_id INT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (p_id)";
$sql = "SELECT * FROM setwords_table";
$getp="SELECT * FROM photo_table";
$getpage = "SELECT * FROM page_num";
$conn->query($alter);
$conn->query($add);
$conn->query($alter1);
$conn->query($add1);

$result = $conn->query($sql);
$result1 = $conn->query($getp);
$result2 = $conn->query($getpage);
$accountnum1;
if ($result->num_rows > 0) {
    $accountnum=$result->num_rows;
$accountnum1=$result->num_rows;
    while($row = $result->fetch_assoc()) {
        
        $card['words_title'][$row["words_id"]]=$row["words_title"];
        $card["words_content"][$row["words_id"]]=$row["words_content"];
        $card["submission_date"][$row["words_id"]]=$row["submission_date"];
 
    }
    
} else {
    echo "0 结果";
}
    if ($result1->num_rows > 0) {
    $accountnum=$result->num_rows;
    // 输出数据
    
        
    
    while($row = $result1->fetch_assoc()) {
        
        $ph['p_name'][$row["p_id"]]=$row["p_name"];
        $ph["p_size"][$row["p_id"]]=$row["p_size"];
        $ph["p_date"][$row["p_id"]]=$row["p_date"];
       
       
        
    }
    
} else {
    echo "0 结果";
}
if ($result2->num_rows > 0) {

    while($row = $result2->fetch_assoc()) {
        
        $num=$row["page_num"];
        
    
    }
    
} else {
    echo "0 结果";
}









     $conn->close();
        ?>

        

<div class="header">
    <img src="hf.jpg" style=" width: 100%; height: 400px;;">
</div>

<div class="topnav">
  <a href="#">主页</a>
  <a href="#">相册</a>
  <a href="#">板块</a>
  <a href="#" style="float:right">功能</a>
</div>

<div class="row">
  <div class="leftcolumn">
<!--    <div class="card">
        <h2></h2>
      <h5></h5>
      <div class="fakeimg" style="height:200px;">图片</div>
      <p></p>
      <p></p>
     <a onclick=""><button class='button'>删除留言</button></a>
    </div>-->


 
      <?php 
    
     if($num==1){
         if($accountnum>3){
             $accountnum=3;
         }
         
         
         for($i=1;$i<=$accountnum;$i++){
         
              
              echo"<div class='card'>
        <h2> {$card['words_title'][$i]}</h2>
      <h5>{$card['submission_date'][$i]}</h5>";
      if(!empty($ph["p_name"][$i])){
         echo "<a href='http://localhost/PHP/webphoto.php?ii=$i'><div class='fakeimg'><img  style='height:auto; width:100%;' src='{$ph['p_name'][$i]}'></div></a> ";
      } else {
       echo "<a href='http://localhost/PHP/webphoto.php?ii=$i'><div class='fakeimg'>点击此处插入图片</div></a> ";
      }
      
      echo"<p> {$card['words_content'][$i]}</p>
      <p></p>
      <a href='http://localhost/PHP/setwords.php'><button class='button'>新增留言</button></a>
      
      <a href='http://localhost/net/deleteword.php?ii=$i'><button class='button'>删除留言</button></a>
      
      <a href='http://localhost/PHP/setwords.php'><button class='button'>修改留言</button></a>
      <a href='http://localhost/PHP/setwords.php'><button class='button'>查看留言</button></a>
      </div>";  
              
          }
         }
     if($num>1){
         $cc=(3*($num-1))+1;
         if($accountnum>$num*3){
              $accountnum=3*$num;
         }
          for($i=$cc;$i<=$accountnum;$i++){
          
              
         
          
        
              
              echo"<div class='card'>
        <h2> {$card['words_title'][$i]}</h2>
      <h5>{$card['submission_date'][$i]}</h5>";
      if(!empty($ph["p_name"][$i])){
         echo "<a href='http://localhost/PHP/webphoto.php?ii=$i'><div class='fakeimg'><img  style='height:auto; width:100%;' src='{$ph['p_name'][$i]}'></div></a> ";
      } else {
       echo "<a href='http://localhost/PHP/webphoto.php?ii=$i'><div class='fakeimg'>点击此处插入图片</div></a> ";
      }
      
      echo"<p> {$card['words_content'][$i]}</p>
      <p></p>
      <a href='http://localhost/PHP/setwords.php'><button class='button'>新增留言</button></a>
      
      <a href='http://localhost/net/deleteword.php?ii=$i'><button class='button'>删除留言</button></a>
      
      <a href='http://localhost/PHP/setwords.php'><button class='button'>修改留言</button></a>
      <a href='http://localhost/PHP/setwords.php'><button class='button'>查看留言</button></a>
      </div>";  
          }
          }
         
         
    
     
             
          
//         if($i<=3){
//            echo"<div class='card'>
//        <h2> {$card['words_title'][$i]}</h2>
//      <h5>{$card['submission_date'][$i]}</h5>";
//      if(!empty($ph["p_name"][$i])){
//         echo "<a href='http://localhost/PHP/webphoto.php?ii=$i'><div class='fakeimg'><img  style='height:auto; width:100%;' src='{$ph['p_name'][$i]}'></div></a> ";
//      } else {
//        echo "no photograph!";
//      }
//      
//      echo"<p> {$card['words_content'][$i]}</p>
//      <p></p>
//      <a href='http://localhost/PHP/setwords.php'><button class='button'>新增留言</button></a>
//      
//      <a href='http://localhost/net/deleteword.php?ii=$i'><button class='button'>删除留言</button></a>
//      
//      <a href='http://localhost/PHP/setwords.php'><button class='button'>修改留言</button></a>
//      <a href='http://localhost/PHP/setwords.php'><button class='button'>查看留言</button></a>
//      </div>"; 
//         }
         
          
     
      
      
      ?>
 <ul class="pagination">
  <li><a href="#">«</a></li>
 
 <?php 
      
 $page=0;
 for($e=1;$e<=$accountnum1+3;$e++){
     
     if($e%3==0){
         $page++;
         echo "<li><a href='http://localhost/net/pagesave.php?page=$page'>".$page ."</a></li>" ;
     }
     
 }?>  
     
        
  
 
  <li><a href="#">»</a></li>
</ul>
  </div>
   
  <div class="rightcolumn">
    <div class="card">
        <div style=" height:100px; width: 100%; background-color: #cccccc; color: #666;padding-top:  40px;padding-left: 80px;
    ">
            <div style=" font-size: 33px;" id="txt"></div>
                
        </div>
 
<div class="month">      
  <ul>
    <li class="prev">❮</li>
    <li class="next">❯</li>
    <li style="text-align:center">
      <?php echo date("F")?><br>
      <span style="font-size:18px"><?php echo date("Y")?></span>
    </li>
  </ul>
</div>
 
<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>
 
        <ul id="0" class="days"> 
            <li  id="l1"></li>
            <li  id="l2"></li>
            <li id="l3"></li>
            <li id="l4"></li>
            <li id="l5"></li>
            <li  id="l6"></li>
            <li id="l7"></li>
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>
        <script>
      
    
    <?php 
                  $y=date("y");
                  $m=date("m");
            $date=date_create($y."-".$m."-1");
           
            ?>
            
            
        
        
        
        
     var num =<?php echo (date_format($date,"N"))?>;
    
        for(var i =1;i<=8-num;i++){
           var li=document.getElementById("l"+i);
            li.style.display="none";
        }
        
    
        </script>
    </div>
    <div class="card">
      <h3>主页板块</h3>
      <div class="fakeimg"><p>财经</p></div>
      <div class="fakeimg"><p>股市</p></div>
      <div class="fakeimg"><p>科技</p></div>
    </div>
    
   <div class="card">
     <div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="1.jpg" style="width:100%">
    <div class="text">文本 1</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="2.jpeg" style="width:100%">
    <div class="text">文本 2</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="3.jpg" style="width:100%">
    <div class="text">文本 3</div>
  </div>

   <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<script>
    var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
    
</script>
    </div>
  </div>
    
</div>
 
<div class="footer">
  <h2>底部区域</h2>
</div>
    </body>
</html>
