


<?php

$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "words";
$title = "";
$content = "";
$time = "";
$accountnum = 0;
$id;
$num = 0;
$card = array(
    "words_id" => array(),
    "words_title" => array(),
    "submission_date" => array()
);
$ph = array(
    "p_id" => array(),
    "p_name" => array(),
    "p_date" => array()
);



$conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$alter = "ALTER TABLE setwords_table DROP words_id";
$add = "ALTER TABLE setwords_table ADD words_id INT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (words_id)";
$alter1 = "ALTER TABLE photo_table DROP p_id";
$add1 = "ALTER TABLE photo_table ADD p_id INT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (p_id)";
$sql = "SELECT * FROM setwords_table";
$getp = "SELECT * FROM photo_table";
$getpage = "SELECT * FROM page_num";
$conn->query($alter);
$conn->query($add);
//$conn->query($alter1);
//$conn->query($add1);

$result = $conn->query($sql);
$result1 = $conn->query($getp);
$result2 = $conn->query($getpage);
$accountnum1;
if ($result->num_rows > 0) {
    $accountnum = $result->num_rows;
    $accountnum1 = $result->num_rows;
    while ($row = $result->fetch_assoc()) {

        $card['words_title'][$row["words_id"]] = $row["words_title"];
        $card["words_content"][$row["words_id"]] = $row["words_content"];
        $card["submission_date"][$row["words_id"]] = $row["submission_date"];
    }
} else {
    echo "0 结果";
}
if ($result1->num_rows > 0) {
    $accountnum = $result->num_rows;
    // 输出数据



    while ($row = $result1->fetch_assoc()) {

        $ph['p_name'][$row["p_id"]] = $row["p_name"];
        $ph["p_size"][$row["p_id"]] = $row["p_size"];
        $ph["p_date"][$row["p_id"]] = $row["p_date"];
    }
} else {
    echo "0 结果";
}
if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {

        $num = $row["page_num"];
    }
} else {
    echo "0 结果";
}









$conn->close();


//content

if ($num == 1) {
    if ($accountnum > 3) {//if the content number over 3.....
        $accountnum = 3;   //each page is only show the num of 3 contents...
    }


    for ($i = 1; $i <= $accountnum; $i++) {
        if (empty($card['words_content'][$i] && $card['submission_date'][$i]) && $card['words_id'][$i]) {
            //if content is nohting...
            echo 'nothing!';
        } else {


            if (empty($card['words_title'][$i])) {   //if title nothing
                echo"<div class='card1'>
      <h5>{$card['submission_date'][$i]}</h5>";
      
        echo"<p> {$card['words_content'][$i]}</p>
      <p></p>
      
      
      <a href='http://localhost/HYQhomepage2020724/PHP/deleteword.php?ii=$i'><button class='button'>削除</button></a>
      
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>修正</button></a>
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>見る</button></a>
     
      </div>";
            } else {
                echo"<div class='card1'>
        <h2> {$card['words_title'][$i]}</h2>
      <h5>{$card['submission_date'][$i]}</h5>";
      
      
      
                if (!empty($ph["p_name"][$i])) {  //if no photo content
                    echo "<a href='http://localhost/HYQhomepage2020724/PHP/webphoto.php?ii=$i'><div class='fakeimg'><img  style='height:400px; width:100%;' src='../img/{$ph['p_name'][$i]}'></div></a> ";
                } else {
//                            echo "<a href='http://localhost/HYQhomepage2020724/PHP/webphoto.php?ii=$i'><div class='fakeimg'>点击此处插入图片</div></a> ";
                }

                echo"<p> {$card['words_content'][$i]}</p>
      <p></p>
      
      
      <a href='http://localhost/HYQhomepage2020724/PHP/deleteword.php?ii=$i'><button class='button'>削除</button></a>
      
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>修正</button></a>
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>見る</button></a>
         <a href='http://localhost/HYQhomepage2020724/PHP/webphoto.php?ii=$i'><button class='button'>插入图片</button></a>
      
      </div>";
            }
        }
    }
}



//-------------------------------------------------if pagenum>1
if ($num > 1) {
    $cc = (3 * ($num - 1)) + 1;
    if ($accountnum > $num * 3) {
        $accountnum = 3 * $num;
    }
    for ($i = $cc; $i <= $accountnum; $i++) {
        if (empty($card['words_content'][$i] && $card['submission_date'][$i]) && $card['words_id'][$i]) {

            echo 'nothing!';
        } else {
            if (empty($card['words_title'][$i])) {
                echo"<div class='card1'>
        
      <h5>{$card['submission_date'][$i]}</h5>";

                echo"<p> {$card['words_content'][$i]}</p>
      <p></p>
      
      
      <a href='http://localhost/HYQhomepage2020724/PHP/deleteword.php?ii=$i'><button class='button'>削除</button></a>
      
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>修正</button></a>
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>見る</button></a>
      
      </div>";
            } else {




                echo"<div class='card1'>
        <h2> {$card['words_title'][$i]}</h2>
      <h5>{$card['submission_date'][$i]}</h5>";
                if (!empty($ph["p_name"][$i])) {
                    echo "<a href='http://localhost/HYQhomepage2020724/PHP/webphoto.php?ii=$i'><div class='fakeimg'><img  style='height:400px; width:100%;' src='../img/{$ph['p_name'][$i]}'></div></a> ";
                } else {
//                            echo "<a href='http://localhost/HYQhomepage2020724/PHP/webphoto.php?ii=$i'><div class='fakeimg'>点击此处插入图片</div></a> ";
                }


                echo"<p> {$card['words_content'][$i]}</p>
      <p></p>
      
      
      <a href='http://localhost/HYQhomepage2020724/PHP/deleteword.php?ii=$i'><button class='button'>削除</button></a>
      
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>修正</button></a>
      <a href='http://localhost/HYQhomepage2020724/PHP/setwords.php'><button class='button'>見る</button></a>
         
      
      </div>";
            }
        }
    }
}



if (empty($accountnum1)) {
    echo '.......';
} else {


    echo"<ul class='pagination'>
  <li><a href='#'>«</a></li>";
    $page = 0;
    for ($e = 1; $e <= $accountnum1 + 3; $e++) {

        if ($e % 3 == 0) {
            $page++;
            echo "<li><a href='http://localhost/HYQhomepage2020724/PHP/pagesave.php?page=$page'>" . $page . "</a></li>";
        }
    }



    echo "<li><a href='#'>»</a></li>
</ul>";
}