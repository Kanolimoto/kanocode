


        <?php
        
        $servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "weibo";
$name = $_GET["name"];
$photo;
$content = "";

$accountnum = 0;
$id;
$num = 0;
$card = array(
    
    
    "text_id" => array(),
    "text_content" => array(),
    "submission_date" => array(),
    "photo1" => array(),
);



$conn = mysqli_connect($servername, $username, $password, $dbname);




if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}




//$freshid = "ALTER TABLE ".$name."_texttable DROP text_id";
//$addid = "ALTER TABLE ".$name."_texttable ADD text_id INT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (text_id)";
//$conn->query($freshid);
//$conn->query($addid);

$getIcon = "SELECT Icon FROM user_table where UserName='" . $name . "'";
    $gotIcon = $conn->query($getIcon);
    while ($row = $gotIcon->fetch_assoc()) {
        $photo = $row["Icon"];
    }





$gettextcount = "SELECT * FROM ".$name."_texttable";




$textcount = $conn->query($gettextcount);


if ($textcount->num_rows > 0) {
    $accountnum = $textcount->num_rows;
    // 输出数据



    while ($row = $textcount->fetch_assoc()) {
        $card['text_id'][$row["text_id"]] = $row["text_id"];
        $card["text_content"][$row["text_id"]] = $row["text_content"];
        $card["photo1"][$row["text_id"]] = $row["photo1"];
        
        $card["submission_date"][$row["text_id"]] = $row["submission_date"];
        
    }
} else {
    echo "0 结果";
    
}
  
array_multisort($card["submission_date"], SORT_DESC, $card["photo1"], $card["text_content"], $card['text_id']);
$conn->close();




      for ($i = 0; $i < $accountnum; $i++) {
          
          
          
//          echo "
//    <h2>我的日历</h2>
//    <ul data-role='listview' data-inset='true'>
//      <li data-role='list-divider'>星期三, 1 月 2 日, 2013 <span class='ui-li-count'>2</span></li>   
//      <li><a href='#'>   
//        <h2>医生</h2>
//        <p><b>To Peter Griffin</b></p>
//        <p>Well, Mr. Griffin, I've looked into physical results.</p>
//        <p>Ah, Mr. Griffin, I'm not quite sure how to say this. Kim Bassinger? Bass singer? Bassinger?</p>
//        <p>But now, onto the cancer</p>
//        <p>You are a Cancer, right? You were born in July? Now onto these test results.</p>
//        <p class='ui-li-aside'>Re: Appointment</p></a>
//      </li>
//      <li><a href='#'>
//        <h2>Glen Quagmire</h2>
//        <p>Don't forget me this weekend!</p>
//        <br>
//        <p>- giggity giggity goo</p>
//        <p class='ui-li-aside'>Re: Camping</p></a>
//      </li>
//      <li data-role='list-divider'>周二, 1 月 1 日, 2013 <span class='ui-li-count'>1</span></li>   
//      <li><a href='#'>   
//        <h2>Louis</h2>
//        <p><b>Happy Girl!</b></p>
//        <p>Thank you so much, Peter!!</p>
//        <p class='ui-li-aside'>Re: Christmas Gifts</p></a>
//      </li>
//    </ul>
//  "; 
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          echo "
 

  <div data-role='header' style='background:#F6CEEC'>
    <img src='headIcon/$photo' alt='John' style='width:10%'>    <span style='font-size:20px'>$name</span>
  </div>

  <div data-role='main' class='ui-content' style='background:#EFF2FB'>
  
    <p style='font-size:20px'>{$card['text_content'][$i]}</p>";
        
         if(empty($card["photo1"][$i])){
    echo '';
         }else{
           echo  "<div><img style='width:100%; height:auto ;border-radius: 8px;' src='IMG/{$card['photo1'][$i]}'></div>";
         }
        echo "<p style='font-size:10px; margin-left:250px;'>{$card['submission_date'][$i]}</p>
            

    
    
  



  </div>

  <div data-role='footer' style='background:#F6CEEC ;text-align:center;'>
  
            <a style='font-size:13px;' href='#' class='ui-btn ui-corner-all ui-shadow ui-icon-heart ui-btn-icon-left ui-btn-inline'>Like</a>
	<a style='font-size:13px;' href='PHP/Deletecontent.php?name=$name&textid={$card['text_id'][$i]}' class='ui-btn ui-corner-all ui-shadow ui-icon-delete ui-btn-icon-left ui-btn-inline'>Delete</a>
            
	<a  style='font-size:13px;'  href='PHP/addpicture.php?id={$card['text_id'][$i]}&name=$name' class='ui-btn ui-corner-all ui-shadow ui-icon-camera ui-btn-icon-left ui-btn-inline'>AddPicture</a>
        
  </div><hr>

";
          
      }
        
        
        
   
