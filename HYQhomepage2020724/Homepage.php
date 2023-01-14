<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<?php
$url = 'https://www.eastmoney.com/';
$urlT = 'http://finance.eastmoney.com/a/cgnjj.html';
$webpage = file_get_contents($url);
$webpageT = file_get_contents($urlT);
//4659.6  16.8
$name = '/<a.*[\u4e00-\u9fa5]*.*<\/a>/';
$patternn = '/<span.class="stock\w*">.?\w*.?\w*.?<\/span>/i';
preg_match_all($patternn, $webpage, $gpds);
preg_match_all($name, $webpageT, $Text);
print("<pre>"); // 格式化输出数组
print_r($gpds);
print("</pre>");
?>

<!--  ------------------------------------------------------------------------PHP--------------------------------------------------  -->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/Homepagestyle.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <link rel="stylesheet" type="text/css" href="css/logon.css">
        <link rel="stylesheet" type="text/css" href="css/Mainstock.css">
        

        <title>Hello！everbody~</title>
    </head>
    <body onload="myFunction()">
        <script>
          function myFunction(){
	setInterval(function(){show()},3000);
}  
        </script>
        
        <!-----------------------------------------head--------------------------------------------------------------------------->


        <div class="header">
            <h1>WELCOME TO IThomepage</h1>

        </div>


        <!-------------------------------------------navbar------------------------------------------------------------------------->



        <div class="navbar">
            <a href="#">ニュース</a>
            <a href="#">ウェブサイト</a>
            <a href="#">友達</a>
            <a href="#" class="right">ホームページ</a>
        </div>

        <div class="row">
            <div class="side">



                <!------------------------------------------register-------------------------------------------------------------------------------->


                <div id="id02" class="modall">
                    <span onclick="document.getElementById('id02').style.display = 'none'" class="closel" title="Close Modal">×</span>
                    <form class="modal-contentl animate" action="#">
                        <div class="containerl">
                            <label><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>

                            <label><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>

                            <label><b>Repeat Password</b></label>
                            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                            <input type="checkbox" checked="checked"> Remember me
                            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                            <div class="clearfixl">
                                <button type="button" onclick="document.getElementById('id02').style.display = 'none'" class="cancelbtnl">Cancel</button>
                                <button type="submit" class="signupbtnl">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>



                <div id="id01" class="modal">

                    <form class="modal-content animate" action="password_cheak.php" method="post">
                        <div class="imgcontainer">

                            <img src="https://static.runoob.com/images/mix/img_avatar.png" alt="Avatar" class="avatar">
                        </div>

                        <div class="container">
                            <label><b>用户名</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" required>

                            <label><b>密码</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>

                            <button type="submit">登陆</button>
                            <button onclick="document.getElementById('id02').style.display = 'block'">注册</button>



                            <input type="checkbox" checked="checked"> 记住我
                        </div>

                        <div class="container" style="background-color:#f1f1f1">

                            <span class="psw">Forgot <a href="#">password?</a></span>
                        </div>
                    </form>
                </div>
            </div>



            <!-- ---------------------------------------------content------------------------------------------------------------------------------->







            <div class="main">
                

                
               <div><div>
                    <h1>股票行情</h1>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

                        <tr>
                            <td align="right" height="25">2017-01-02---2017-05-02</td>
                        </tr>
                    </table>

                    <table width="100%" border="0" cellspacing="1" cellpadding="4" bgcolor="#cccccc" class="tabtop13" align="center">

                        <tr>

                            <td width="8%" class="btbg font-center">股票名</td>
                            <td width="8%" class="btbg font-center">指数</td>
                            <td width="8%" class="btbg font-center">涨跌指数</td>
                            <td width="8%" class="btbg font-center">涨跌比</td>
                            <td width="8%" class="btbg font-center">股票名</td>
                            <td width="8%" class="btbg font-center">指数</td>                        
                            <td width="8%" class="btbg font-center">涨跌指数</td>
                            <td width="8%" class="btbg font-center">涨跌比</td>
                        </tr>
                        <tr>

                            <td width="7%"  class="btbg2">上证指数</td>
                            <td><?php echo $gpds[0][0]; ?></td>
                            <td><?php echo $gpds[0][1]; ?></td>
                            <td><?php echo $gpds[0][2]; ?></td>
                            <td>法国CAC40</td>
                            <td><?php echo $gpds[0][42]; ?></td>
                            <td><?php echo $gpds[0][43]; ?></td>
                            <td><?php echo $gpds[0][44]; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="btbg2">深证指数</td>
                            <td><?php echo $gpds[0][3]; ?></td>
                            <td><?php echo $gpds[0][4]; ?></td>
                            <td><?php echo $gpds[0][5]; ?></td>
                            <td>基金指数</td>
                            <td><?php echo $gpds[0][45]; ?></td>
                            <td><?php echo $gpds[0][46]; ?></td>
                            <td><?php echo $gpds[0][47]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">创业指数</td>
                            <td><?php echo $gpds[0][6]; ?></td>
                            <td><?php echo $gpds[0][7]; ?></td>
                            <td><?php echo $gpds[0][8]; ?></td>
                            <td>乐富指数</td>
                            <td><?php echo $gpds[0][48]; ?></td>
                            <td><?php echo $gpds[0][49]; ?></td>
                            <td><?php echo $gpds[0][50]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">沪深300</td>
                            <td><?php echo $gpds[0][9]; ?></td>
                            <td><?php echo $gpds[0][10]; ?></td>
                            <td><?php echo $gpds[0][11]; ?></td>
                            <td>深证ETF</td>
                            <td><?php echo $gpds[0][51]; ?></td>
                            <td><?php echo $gpds[0][52]; ?></td>
                            <td><?php echo $gpds[0][53]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">东方财富</td>
                            <td><?php echo $gpds[0][12]; ?></td>
                            <td><?php echo $gpds[0][13]; ?></td>
                            <td><?php echo $gpds[0][14]; ?></td>
                            <td>国证基金</td>
                            <td><?php echo $gpds[0][54]; ?></td>
                            <td><?php echo $gpds[0][55]; ?></td>
                            <td><?php echo $gpds[0][56]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">恒生指数</td>
                            <td><?php echo $gpds[0][15]; ?></td>
                            <td><?php echo $gpds[0][16]; ?></td>
                            <td><?php echo $gpds[0][17]; ?></td>
                            <td>国证ETF</td>
                            <td><?php echo $gpds[0][57]; ?></td>
                            <td><?php echo $gpds[0][58]; ?></td>
                            <td><?php echo $gpds[0][59]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">国企指数</td>
                            <td><?php echo $gpds[0][18]; ?></td>
                            <td><?php echo $gpds[0][19]; ?></td>
                            <td><?php echo $gpds[0][20]; ?></td>
                            <td>沪深300</td>
                            <td><?php echo $gpds[0][60]; ?></td>
                            <td><?php echo $gpds[0][61]; ?></td>
                            <td><?php echo $gpds[0][62]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>

                            <td width="7%"  class="btbg2">红筹指数</td>
                            <td><?php echo $gpds[0][21]; ?></td>
                            <td><?php echo $gpds[0][22]; ?></td>
                            <td><?php echo $gpds[0][23]; ?></td>
                            <td>5年国债</td>
                            <td><?php echo $gpds[0][63]; ?></td>
                            <td><?php echo $gpds[0][64]; ?></td>
                            <td><?php echo $gpds[0][65]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">日经指数</td>
                            <td><?php echo $gpds[0][24]; ?></td>
                            <td><?php echo $gpds[0][25]; ?></td>
                            <td><?php echo $gpds[0][26]; ?></td>
                            <td>美原油</td>
                            <td><?php echo $gpds[0][66]; ?></td>
                            <td><?php echo $gpds[0][67]; ?></td>
                            <td><?php echo $gpds[0][68]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">韩国KOSPI</td>
                            <td><?php echo $gpds[0][27]; ?></td>
                            <td><?php echo $gpds[0][28]; ?></td>
                            <td><?php echo $gpds[0][29]; ?></td>
                            <td>美黄金</td>
                            <td><?php echo $gpds[0][69]; ?></td>
                            <td><?php echo $gpds[0][70]; ?></td>
                            <td><?php echo $gpds[0][71]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">道琼斯</td>
                            <td><?php echo $gpds[0][30]; ?></td>
                            <td><?php echo $gpds[0][31]; ?></td>
                            <td><?php echo $gpds[0][32]; ?></td>
                            <td>上期原油</td>
                            <td><?php echo $gpds[0][72]; ?></td>
                            <td><?php echo $gpds[0][73]; ?></td>
                            <td><?php echo $gpds[0][74]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">纳斯达克</td>
                            <td><?php echo $gpds[0][33]; ?></td>
                            <td><?php echo $gpds[0][34]; ?></td>
                            <td><?php echo $gpds[0][35]; ?></td>
                            <td>人民币</td>
                            <td><?php echo $gpds[0][75]; ?></td>
                            <td><?php echo $gpds[0][76]; ?></td>
                            <td><?php echo $gpds[0][77]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">英国富时</td>
                            <td><?php echo $gpds[0][36]; ?></td>
                            <td><?php echo $gpds[0][37]; ?></td>
                            <td><?php echo $gpds[0][38]; ?></td>
                            <td>美元</td>
                            <td><?php echo $gpds[0][78]; ?></td>
                            <td><?php echo $gpds[0][79]; ?></td>
                            <td><?php echo $gpds[0][80]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="btbg2">德国DAX30</td>
                            <td><?php echo $gpds[0][39]; ?></td>
                            <td><?php echo $gpds[0][40]; ?></td>
                            <td><?php echo $gpds[0][41]; ?></td>
                            <td>欧元</td>
                            <td><?php echo $gpds[0][81]; ?></td>
                            <td><?php echo $gpds[0][82]; ?></td>
                            <td><?php echo $gpds[0][83]; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table> 

                </div></div>
                
                
            </div>
        </div>




        <!-------------------------------------------foot---------------------------------------------------------->
        <div class="footer">
            <h2>foot</h2>
        </div>
        <?php
// put your code here
        ?>
    </body>
</html>
