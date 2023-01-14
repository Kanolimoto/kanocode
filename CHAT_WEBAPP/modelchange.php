<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "chat";
$name=$_GET['name'];
$m=$_GET['m'];
$m1=$_GET['m1'];
$max=0;
$min=0;
$self=0;
$conn = mysqli_connect($servername, $username, $password, $dbname);
    $sq2="select max(id) from player_table";
    $result=mysqli_query($conn, $sq2);
    while ($row = $result->fetch_assoc()) {
            $max=$row['max(id)'];
    }
    $sq2="select min(id) from player_table";
    $result=mysqli_query($conn, $sq2);
    while ($row = $result->fetch_assoc()) {
            $min=$row['min(id)'];
    }
if($m==1){
    $sql="update player_table set status=".$m1;
}elseif ($m==2) {
    $sql="update player_table set status=".$m1." where name='".$name."'";
}elseif ($m==3) {
    $sql="update player_table set status=".$m1." where name!='".$name."'";
}elseif ($m==4) {
    echo $max."+++".$min."++++";
    $sq2="select id from player_table  where name='".$name."'";
    $result=mysqli_query($conn, $sq2);
    while ($row = $result->fetch_assoc()) {
        $self=$row['id'];
    }
    if($self==$max){
        $sql="update player_table set status=".$m1." where id=".$min;
        mysqli_query($conn, $sql);
        $sql="update player_table set status=111 where id!=".$min;
    }elseif ($self==$min) {
        $a=($min+1);
        $sql="update player_table set status=".$m1." where id=".$a;
        mysqli_query($conn, $sql);
        $sql="update player_table set status=111 where id!=".$a;
        echo $min+1;
    } elseif($self!=$max && $self!=$min) {
        $sql="update player_table set status=".$m1." where id=".$max;
        mysqli_query($conn, $sql);
        $sql="update player_table set status=111 where id!=".$max;
    }
}


 mysqli_query($conn, $sql);




mysqli_close($conn);