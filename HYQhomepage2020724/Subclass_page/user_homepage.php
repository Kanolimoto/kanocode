

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="sub_css/css.css">
        <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="../js/php.js"> 

        </script>
        <script src="../js/Writecontentbutton.js">
        </script>
        <title></title>
    </head>
    <style>
        .card1 h2{
            font-size: 40px;

            border-bottom-style:   solid;
            border-bottom-color:  #ccc;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom-width:  10px;
        }
        .card1 h5{
            font-size: 20px;
            margin-bottom: 10px;
            text-align:  right;
            border-bottom:  #ccc;
            border-bottom-width:  10px;
            border-bottom-style:  dotted;
            padding-bottom: 10px;

        }
    </style>
    <body onload="PHP()">
        <div class="navbar">
            <a href="#">ニュース</a>
            <a href="#">友達</a>
            <a href="#">情報</a>
            <a href="#" class="right">Other</a>


            <form>
                <input type="text" name="search" placeholder="搜索..">
                <button class="button button2">SEARCH</button>
            </form>


        </div>  


        <div class="header">
            <div class="headtext">
                <p class="headp">何を書いて....</p>
                <form action="../PHP/getwords.php" method="post">

                    <textarea  class="inputtext" name="content"rows="6" cols="50">

                    </textarea>
                    <img  class="texticoca "src="../img/icocamera.png">
                    <img  class="texticovid  "src="../img/icovideo.png">
                    <div></div>
                    <input  class="button"  style="margin-left: 350px; "type="submit" value="発表">
                </form>


            </div>


        </div>



        <div class="row">
            <div class="side">
                <h2>僕について</h2>
                <h5>写真:</h5>
                <div class="fakeimg" style="height:200px;"><img  style=" height: 100%;; width: 100%; " src="../img/trolltunga.jpg"></div>
                <p>紹介について</p>
                <h3>内容</h3>
                <p>他の内容</p>
                <div class="fakeimg" style="height:60px; background-color: #CEF6EC">生活</div><br>
                <div class="fakeimg" style="height:60px; background-color: #CEF6EC">興味</div><br>
                <div class="fakeimg" style="height:60px; background-color: #CEF6EC">目標</div>
            </div>




            <div class="main">
                <div id="content"></div>
                <div id="writebutton"></div>

                <a><button class="button" onclick="writebutton1()">投稿</button></a>

            </div>






            <div class="sideright">





                <div class="card">
                    <img src="https://static.runoob.com/images/mix/img_avatar.png" alt="John" style="width:33%">
                    <div class="container">
                        <h1>カゲンケイ</h1>
                        <p class="title">080-7821-6677</p>
                        <p>早稲田文理専門学校</p>
                        <div style="margin: 24px 0;">
                            <a href="#"><i class="fa fa-dribbble"></i></a> 
                            <a href="#"><i class="fa fa-twitter"></i></a>  
                            <a href="#"><i class="fa fa-linkedin"></i></a>  
                            <a href="#"><i class="fa fa-facebook"></i></a> 
                        </div>
                        <p><button>Contact</button></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <h2>底部内容</h2>
        </div>
        <?php ?>
    </body>
</html>
