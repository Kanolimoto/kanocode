<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "weibo";
$name = $_GET["name"];
$photo = $_GET["photo"];
$num = 0;




$card = array(
    "icon" => array(),
    "text_name" => array(),
    "text_id" => array(),
    "text_content" => array(),
    "submission_date" => array(),
    "photo1" => array(),
);

$followArray[] = $name;
$photo = array();

$conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}


$getfollowtable = "SELECT * FROM " . $name . "_followtable";
$gotfollowtable = $conn->query($getfollowtable);





if ($gotfollowtable->num_rows > 0) {
//    $accountnum = $textcount->num_rows;




    while ($row = $gotfollowtable->fetch_assoc()) {
        $followArray[] = $row["follow_name"];
    }
} else {
    echo "GetfolloweTable was error!";
}


for ($c = 0; $c < count($followArray); $c++) {

    $getfollowtableContent = "SELECT * FROM " . $followArray[$c] . "_texttable";
    $gotfollowtableContent = $conn->query($getfollowtableContent);
    $getIcon = "SELECT Icon FROM user_table where UserName='" . $followArray[$c] . "'";
    $gotIcon = $conn->query($getIcon);
    while ($row = $gotIcon->fetch_assoc()) {
        $photo[] = $row["Icon"];
    }
    while ($row = $gotfollowtableContent->fetch_assoc()) {
        $card['icon'][$num] = $photo[$c];
        $card['text_name'][$num] = $followArray[$c];
        $card['text_id'][$num] = $row["text_id"];
        $card["text_content"][$num] = $row["text_content"];
        $card["photo1"][$num] = $row["photo1"];
        $card["submission_date"][$num] = $row["submission_date"];

//        $id[$card["submission_date"][$num]] = $card['text_id'][$num];
//       $content[$card["submission_date"][$num]] = $card['text_content'][$num];
//       $photo[$card["submission_date"][$num]] = $card['photo1'][$num];

        $num++;
    }
}




array_multisort($card["submission_date"], SORT_DESC, $card["photo1"], $card["text_content"], $card['text_id'], $card['text_name'], $card['icon']);
?>
<?PHP for ($i = 0; $i < $num; $i++) { ?>



    <!--  content   -->

    <div data-role='header' style='background:#F6CEEC; padding:10px;border-radius: 5px;'>
        <img src='headIcon/<?PHP echo $card['icon'][$i]; ?>'  style='width:50px; height:50px; border-radius: 360px;'>    <span style='font-size:30px;font-weight:700;'><?PHP echo $card['text_name'][$i]; ?></span>
    </div>

    <a onclick=" show(<?PHP echo $i; ?>);" style='color:black; font-weight:normal;'><div data-role='main' class='ui-content' style='background:#EFF2FB'>




            <p style='font-size:20px'><?PHP echo $card['text_content'][$i]; ?></p>

            <?PHP
            if (empty($card["photo1"][$i])) {
                echo '';
                ?>
                <?PHP
            } else {
                echo "<div><img style='width:100%; height:auto ;border-radius: 8px;' src='IMG/{$card['photo1'][$i]}'></div>";
                ?>
            <?PHP } ?>
            <p style='font-size:10px; margin-left:250px;'><?PHP echo $card['submission_date'][$i]; ?></p>   

        </div></a>

    <div data-role='footer' style='background:#F6CEEC ;text-align:center; border-radius: 5px;'>

        <a style='font-size:13px;' href='#' class='ui-btn ui-corner-all ui-shadow ui-icon-heart ui-btn-icon-left ui-btn-inline'>Like</a>
        <a  date-rel='popup' style='font-size:13px;'  onclick=" show(<?PHP echo $i ?>);"  class='ui-btn ui-corner-all ui-shadow ui-icon-comment ui-btn-icon-left ui-btn-inline'>Comment</a>


        <a  style='font-size:13px;'  href='#' class='ui-btn ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left ui-btn-inline'>Share</a>

    </div>

    <hr>
    <div data-role='main' class='ui-content'>


        <div data-role='popup' style='display:none;' id='<?php echo $i; ?>'>
            <form action="PHP/Getcomment.php?name=<?php echo $name;?>&textname=<?php echo $card['text_name'][$i]; ?>&id=<?php echo $card['text_id'][$i];?>" method="get" >

                    <textarea  class="inputtext" name="addinfo">

                    </textarea>


                    <input  class="ui-btn ui-btn-inline" type="submit" value="Submit">

                </form>

            <?php
//
//            print("<pre>");
//            print_r($card);
//            print("</pre>");
            $getComment = "SELECT * FROM " . $card['text_name'][$i] . $card['text_id'][$i] . "_commenttable";
            $gotComment = $conn->query($getComment);
            if ($gotComment) {
                while ($row = $gotComment->fetch_assoc()) {
                    ?>

                    <div style='background:#F6CEEC; padding:10px;border-radius: 5px;'><p style="text-align: left; font-size: 20px;">   <?php echo $row["comment_content"]; ?> </p>   

                        <p style="text-align: right;">   <?php echo $row["comment_name"]; ?>  </p>  
                        <p style="text-align:  right; font-size: 10px;">     <?php echo $row["comment_date"]; ?> </p></div><hr>

                    <?php
                }
            } else {
                echo '...';
            }
            ?>

        </div>
    </div>
    <hr>
<?php } $conn->close(); ?>