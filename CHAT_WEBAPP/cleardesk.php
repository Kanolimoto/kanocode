
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


$conn = mysqli_connect($servername, $username, $password, $dbname);
 
                     $getIcond1 = "delete from porkerdesk_table";
                                  
                            $gotIcond1 = $conn->query($getIcond1);