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
       $url = "http://favor.fund.eastmoney.com/";

   $html = file_get_contents($url);

   //如果出现中文乱码使用下面代码

   //$getcontent = iconv("gb2312", "utf-8",$html);

   echo "<textarea style='width:800px;height:600px;'>".$html."</textarea>";
   $pattern = '/[1-9]\d*\.\d*|0\.\d*[1-9]\d*/';
$subject = $html;
$m1= $m2 = [];
 
preg_match($pattern, $subject, $m1);
preg_match_all($pattern, $subject, $m2);
 
print("<pre>"); // 格式化输出数组
print_r($m1);
print("</pre>");
echo '<hr>';
print("<pre>"); // 格式化输出数组
print_r($m2);
print("</pre>");
        ?>
    </body>
</html>
