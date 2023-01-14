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
$url = 'https://www.eastmoney.com/';
$urlT = 'http://finance.eastmoney.com/a/cgnjj.html';
$webpage = file_get_contents($url);
$webpageT = file_get_contents($urlT);
//4659.6  16.8
$name = '/<a.*[\u4e00-\u9fa5]*.*<\/a>/';
$patternn = '/<span.class="stock\w*">.?\w*.?\w*.?<\/span>/i';
preg_match_all($patternn, $webpage, $gpds1);
preg_match_all($name, $webpageT, $Text);



print_r($gpds1);

?>
    </body>
</html><!--
<div class="hq-news-con-b  "> 
    <div class="hq-news-data"> <div class="nickname">
            <a href="http://quote.eastmoney.com/zs399001.html" class="item_name">深证成指</a> 
        </div> <div class="hq-news-value item_nowPrice"><span class="stockup">13637.88</span></div>
        <div class="hq-news-value"><span class="stockup">171.03</span></div> 
        <div class="hq-news-value"><span class="stockup">1.27%</span></div> </div>
        <div class="bottom-data"> <a href="http://quote.eastmoney.com/zs399001.html"> 
                <img src="//webquotepic.eastmoney.com/GetPic.aspx?nid=0.399001&amp;imageType=rtop&amp;token=e1fc716525030b5517f9968fe65eb25d&amp;timespan=159630576" alt=""> </a> 
            <ul class="but-list">  <li> <a href="http://quote.eastmoney.com/center/gridlist.html#sz_a_board">涨幅</a> </li>  <li>
                    <a href="http://quote.eastmoney.com/center/gridlist.html?st=VolumeRate&amp;sr=-1#sz_a_board">量比</a> </li> 
                <li> <a href="http://quote.eastmoney.com/center/gridlist.html?st=TurnoverRate&amp;sr=-1#sz_a_board">
                    换手</a> </li>  <li> <a href="http://quote.eastmoney.com/changes">异动
                        </a> </li>  </ul> </div></div>-->


<!--<div class="hq-news-con-b first on"> <div class="hq-news-data"> <div class="nickname">
            <a href="http://quote.eastmoney.com/zs000001.html" class="item_name">上证指数</a> </div> 
            <div class="hq-news-value item_nowPrice"><span class="stockup">3310.01</span></div> 
            <div class="hq-news-value"><span class="stockup">23.19</span></div> <div class="hq-news-value">
                <span class="stockup">0.71%</span></div> </div> <div class="bottom-data"> <a href="http://quote.eastmoney.com/zs000001.html">
                        <img src="//webquotestaticpic.dfcfw.com/rtop.1.000001.png?timespan=159630878" alt=""> </a> <ul class="but-list"> 
                            <li> <a href="http://quote.eastmoney.com/center/gridlist.html#sh_a_board">涨幅</a> </li>  <li>
                                <a href="http://quote.eastmoney.com/center/gridlist.html?st=VolumeRate&amp;sr=-1#sh_a_board">量比</a> </li>
                            <li> <a href="http://quote.eastmoney.com/center/gridlist.html?st=TurnoverRate&amp;sr=-1#sh_a_board">换手</a> </li> 
                         


<li> <a href="http://quote.eastmoney.com/changes">异动</a> </li>  </ul> </div></div>-->



<!--<div class="text text-no-img">
            <p class="title">
                <a href="http://finance.eastmoney.com/a/202008031578951174.html" target="_blank">
                    北斗系统卫星新技术占比甚至超过70%
                </a>
            </p>

                <p class="info" title="8月3日，国新办举行北斗三号全球卫星导航系统建成开通新闻发布会。针对在轨运行卫星先进性的问题时，北斗三号工程卫星系统总设计师林宝军透露北斗工程设计之初，我国科学家打破新技术不超过30%的惯例，在配置上尽量进行前瞻性规划，采用一系列创新技术，“我们的新技术甚至超过了70%。”林宝军表示这种做法有利于提高系统的性能。">
                    8月3日，国新办举行北斗三号全球卫星导航系统建成开通新闻发布会。针对在轨运行卫星先进性的问题时，北斗三号工程卫星系统总设计师林宝军透露北斗工程设计之初，我国科学家打破新技术不超过30%的惯例，在配置上...
                </p>
            <p class="time">
                08月03日 12:41
            </p>
        </div>-->