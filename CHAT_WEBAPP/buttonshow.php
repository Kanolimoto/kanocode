
<?php
    $servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "chat";
$name=$_GET['name'];
$dz="抢地主！";
$ybq="要不起！";
$conn = mysqli_connect($servername, $username, $password, $dbname);
      $getIcon = "select status from player_table where name='".$name."'";
    
$gotIcon = $conn->query($getIcon);
if ($gotIcon) {
    while ($row = $gotIcon->fetch_assoc()) {
        $num=$row["status"];
        
        if($num==0){
            
     echo  "
            <input id='create' type='button' onclick='create(); messages(\"创建牌局！\");' value='创建'/>
            <input id='sort' type='button' onclick='sort(); messages(\"正在洗牌...\");' value='洗牌'/>
            <input id='deal' type='button' onclick='deal(); model(1,10); messages(\"发牌了@_@\");' value= '发牌' />
            <input id='index' type='button' onclick='index();sc()' value= '重开' />";
      
        }elseif ($num==10) {
            
    echo  " <input id='index' onclick='create();index(); model(1,0);sc()' type='button' value= '重开' />
            <input id='index3' type='button' onclick='model(4,110); messages(\"".$ybq."\");' value= '要不起' />
            <input id='index4' type='button' onclick='model(3,111); model(2,11);getKingcards();sc(); messages(\"".$dz."\");' value= '抢地主' />";
        }elseif ($num==11) {
    echo  " <input id='index' type='button' onclick='create();index(); model(1,0);sc()'  value= '重开' />
            <input id='index4' type='button' onclick='playcard1(); model(4,110); messages(\"出牌了\");' value= '出牌' />
            <h1>地主出牌！</h1>";
            
        }elseif ($num==110) {
            echo  " <input id='index' type='button' onclick='create();index(); model(1,0);sc()'  value= '重开' />
            <input id='index3' type='button' onclick='model(4,110); messages(\"".$ybq."\");'  value= '要不起' />
            <input id='index4' type='button' onclick='playcard1(); model(4,110); messages(\"出牌了\");' value= '出牌' />
            <h1>该你出牌了！</h1>";
            
            
        }elseif ($num==111) {
            echo  " <input id='index' type='button' onclick='index(); model(1,0);sc()'  value= '重开' />";
            
            
            
        }elseif ($num==1) {
            echo  " <input id='index' type='button' onclick='index(); model(1,0)'  value= '测试用清牌' />
             <input id='index1' type='button' onclick='index1()' value= '测试用登陆玩家显示' />
            <input id='index3' type='button' onclick='create()' value= '测试用要不起' />
            <input id='index4' type='button' onclick='create()' value= '测试用出牌' />";
            
            
        }
            
        
         
        
    }
} else {
    echo 'its Bad';
}   