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
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    </head>
    <?php
    $name = $_GET["username"];
    ?>
    <body>
        <div data-role="page">
            <div data-role="header">
                <h1>文本输入</h1>
            </div>

            <div data-role="main" class="ui-content">
                <form method="post" action="Getinformation.php?username=<?php echo $name; ?>" data-ajax="false" >
                    <div class="ui-field-contain">
                        <label for="fullname">Name：</label>
                        <input type="text" name="fullname" id="fullname">       
                        <label for="bday">BirthDay：</label>
                        <input type="date" name="bday" id="bday">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="你的电子邮箱..">
                        <label for="fullname">Age：</label>
                        <input type="text" name="age" id="age">
                        <label for="fullname">Tell：</label>
                        <input type="text" name="tell" id="tell">
                        <label for="fullname">Country：</label>
                        <input type="text" name="country" id="country">
                    </div>
                    <input type="submit" data-inline="true" value="Submit">
                    <a  data-ajax="false" data-role="button" href="../userpage.php?username=<?php echo $name; ?>">Return</a>
                </form>
            </div>
        </div>
    </body>
</html>
