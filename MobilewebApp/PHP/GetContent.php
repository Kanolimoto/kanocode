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
        $dbname = "weibo";
        $username1 = $_GET["username"];
        $Content = $_POST["content"];



        $conn = mysqli_connect($servername, $username, $password, $dbname);


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO " . $username1 . "_texttable (text_content,submission_date)
VALUES ('$Content',now())";



        if (mysqli_query($conn, $sql)) {



            $getid = "SELECT text_id FROM " . $username1 . "_texttable";
            $gotid = $conn->query($getid);

            if ($gotid->num_rows > 0) {

                while ($row = $gotid->fetch_assoc()) {
                    $createcomment = "create table " . $username1 . $row["text_id"] . "_commenttable" .
                            "(comment_id INT NOT NULL AUTO_INCREMENT," .
                            "comment_name VARCHAR(100)," .
                            "comment_content VARCHAR(1000)," .
                            "comment_date datetime," .
                            "PRIMARY KEY (comment_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";

                    if (mysqli_query($conn, $createcomment)) {
                        
                    } else {
                        echo "Error: " . $createcomment . "<br>" . mysqli_error($conn) . "<hr>";
                    }
                }

                echo "新记录插入成功";
                $url = "../userpage.php?username=$username1";
                echo " <script language = 'javascript' type = 'text/javascript'>";

                echo " window.location.href = '$url' ";

                echo " </script>";
            } else {
                echo "Getid was error!";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        ?>
    </body>
</html>





$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "weibo";
$comment = $_GET["addinfo"];
$name=$_GET["name"];
$ID=$_GET["id"];

$conn = mysqli_connect($servername, $username, $password,$dbname);
$getinfomation = "INSERT INTO ". $name.$ID."_commenttable (comment_name,comment_content,comment_date)
VALUES ('$name','$comment',now())";





if (mysqli_query($conn, $getinfomation)) {
echo "新记录插入成功";
$url="../userpage.php?username=$name" ; 
echo " <script language = 'javascript' type = 'text/javascript' data-ajax='false'>";  

            echo " window.location.href = '$url' ";
    echo " </script>";
} else {
echo "Error: " . $getinfomation . "<br>" . mysqli_error($conn);
}
