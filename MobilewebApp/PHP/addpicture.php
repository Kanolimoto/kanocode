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

        <form action="uploadPicture.php?id=<?php echo $_GET["id"]; ?>&name=<?php echo $_GET["name"]; ?>" method="post" enctype="multipart/form-data" data-ajax="false">
            <label for="file">文件名：</label>
            <input type="file" name="file" id="file"><br>
            <input type="submit" name="submit" value="提交">
        </form>
    </body>
</html>
