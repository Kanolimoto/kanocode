<?php
$servername = "localhost";
$username = "root";
$password = "459717";
$dbname = "chat";
$Pname = array();
$pnum = 0;
$conn = mysqli_connect($servername, $username, $password, $dbname);
$getIcon = "select * from player_table";
$gotIcon = $conn->query($getIcon);
if ($gotIcon) {
    $pnum = $gotIcon->num_rows;
    while ($row = $gotIcon->fetch_assoc()) {
        $Pname[] = $row["name"];
    }
    echo $pnum;
} else {

    echo 'cant load the player_table';
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Card</title>
        <link rel="stylesheet" type="text/css" href="css/poker.css">
        <link rel="apple-touch-icon" href="css3-fall-leaves/images/apple-touch-icon.png"/>
        <link rel="stylesheet" href="css3-fall-leaves/leaves.css" type="text/css" media="screen" charset="utf-8">
        <script src="css3-fall-leaves/leaves.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>

        <a id="ccc"></a>
        <div id="p1"></div>
        <div id="container">
            <div id="leafContainer"></div>    
            <div id="myWin" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('myWin')">&times;</a>
                <div class="overlay-content">
                    <h1>恭喜！你是胜利者！</h1>
                    <a href="#">游戏结束,请重新开始</a>
                    <a href="#"  onclick="index();sc();create();model(1, 0);" >重开</a>
                    <a href="#">Clients</a>
                    <a href="newhtml1.html" onclick="Quit();index()">退出</a>
                </div>
            </div>
            <div id="noWin" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('noWin')">&times;</a>
                <div class="overlay-content">
                    <a href="#">游戏结束,请等待赢家重新开始</a>

                    <a href="#">Clients</a>
                    <a href="newhtml1.html" onclick="Quit();index()">退出</a>
                </div>
            </div>
            <div id="LackPlayer" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('LackPlayer')">&times;</a>
                <div class="overlay-content">
                    <a href="#">玩家不足，请等待玩家的加入...</a>
                    <a id="p1"></a>
                    <a href="#">Clients</a>
                    <a href="newhtml1.html" onclick="Quit();index()">退出</a>
                </div>
            </div>
            <div id="firstStart" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('firstStart')">&times;</a>
                <div class="overlay-content">
                    <a href="#">欢迎来到斗地主</a>
                    <a href="#" onclick="create();">请开始游戏</a>
                    <a href="#"  onclick="index();sc();create();model(1, 0);closeNav('myNav3');" >开始</a>
                    <a href="#">Clients</a>
                    <a href="newhtml1.html" onclick="Quit();index()">退出</a>
                </div>
            </div>
            <div id="othersStart" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('othersStart')">&times;</a>
                <div class="overlay-content">
                    <a href="#">欢迎来到斗地主</a>
                    <a>等待某一位玩家开始</a>
                    <a href="#"  onclick="index();sc();create();model(1, 0);closeNav('myNav3');" >开始</a>
                    <a href="#">Clients</a>
                    <a href="newhtml1.html" onclick="Quit();index()">退出</a>
                </div>
            </div>
            <div id="player1">
                <a id="ca2"></a>
            </div>
            <div class="center" id="win">

                <div id="PP"><div id="point"></div></div>        
                <div class="desk">

                    <div id="ds"></div>

                </div>

                <div id="player4">

                </div>


                <div id="player2">
                    <a id="ca1"></a>
                </div>
            </div>
            <div id="player3">
                <a id="ca"></a>
            </div>

        </div>
        <div id="footer">
            <a id="com"></a>


        </div>
        <a id="time"></a>
        <div id="compeleteCards">

        </div>  

        <script>
            var d = new Date();
            var t = d.getTime() + 30000;
            var pnum =<?php echo $pnum; ?>;
            var compeleteCards = new Array();
            var dealedcards = new Array();
            var mytimer;
            var cardSequence = 1;
            var name;
            var flag = 1;
            var p1 = new Array();
            var p2 = new Array();
            var p3 = new Array();
            var timer = 0;
            var player1 = new Array();
            //储存玩家一的手牌
            var player2 = new Array();
            //储存玩家二的手牌
            var player3 = new Array();
            //储存玩家三的手牌
            var time1 = 1000;
            var myVarsc = setInterval(function () {
                sc();
            }, time1);
            function openNav(m) {
                document.getElementById(m).style.height = "100%";
            }
            function closeNav(x) {
                document.getElementById(x).style.height = "0%";
            }
            function cheak() {
                var a = document.getElementById('ca');
                var a1 = document.getElementById('ca1');
                var a2 = document.getElementById('ca2');
                var c1 = document.getElementById('compeleteCards');
                var al = a.childNodes.length;
                var al2 = a1.childNodes.length - 1;
                var al3 = a2.childNodes.length - 1;
                var cl1 = c1.childNodes.length - 1;
                console.log(al, al2, al3, cl1);
                if (al == 0 && al2 == 0 && al3 == 0 && cl1 == 0) {

                    var name0 =<?php echo "'" . $Pname[0] . "'"; ?>;
                    var name1 =<?php echo "'" . $Pname[1] . "'"; ?>;
                    var name2 =<?php echo "'" . $Pname[2] . "'"; ?>;
                    if (name === name0) {
                        openNav("firstStart");

                    } else if (name === name2 || name === name1) {
                        openNav("othersStart");

                    }
                } else if ((al <= 0 || al2 <= 0 || al3 <= 0) && cl1 <= 0) {
                    if (al <= 0) {
                        openNav("myWin");

                    } else if (al2 <= 0 || al3 <= 0) {
                        fresh();
                        openNav("noWin");

                    } else {
                        myVarsc = setInterval(function () {
                            sc();
                        }, time1);

                    }
                } else if (al2 > 0 && al > 0 && al3 > 0) {
                    closeNav("noWin");
                    closeNav("othersStart");
                    closeNav("firstStart");
                } else if (al > 0) {
                    closeNav("firstStart");

                } else if (al <= 0) {
                    myVarsc = setInterval(function () {
                        sc();
                    }, time1);
                }
                if (cl1 > 0) {
                    closeNav("myWin");
                    closeNav("firstStart");

                }
                if (pnum < 3) {
                    openNav("LackPlayer");
                }
                if (al2 >= 17 && al >= 17 && al3 >= 17) {
                    window.clearTimeout(myVarsc);
                }


            }
            function getQueryVariable(variable)
            {
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    if (pair[0] == variable) {
                        return pair[1];
                    }
                }
                return(false);
            }
            function geturl() {
                if (name == '') {
                    name = getQueryVariable("name");
                }
            }

            function Cards(number, type) {
                var card = {
                    number: number,
                    type: type
                }
                return card;
            }

            function CreatCompeleteCard() {
                var arr = new Array();
                for (var i = 3; i <= 15; i++) {
                    for (var j = 1; j <= 4; j++) {
                        var card = Cards(i, j);
                        arr.push(card);
                    }
                }
                arr.push(Cards(16, 5));
                arr.push(Cards(16, 6));
                
                return arr;
            }


            function Show() {
                function typeShow(type) {
                    var t;
                    switch (type) {
                        case 1:
                            t = "♠";
                            break;
                        case 2:
                            t = "♣";
                            break;
                        case 3:
                            t = "<font color='#FF0000'>♦</font>";
                            break;
                        case 4:
                            t = "<font color='#FF0000'>♥</font>";
                            break;
                        case 5:
                            t = "<font color='#FF0000'>KING</font>";
                            break;
                        case 6:
                            t = "KING";
                            break;
                    }
                    return t;
                }
                ;
                function numberShow(number) {
                    var n = number;
                    switch (number) {
                        case 11:
                            n = "J";
                            break;
                        case 12:
                            n = "Q";
                            break;
                        case 13:
                            n = "K";
                            break;
                        case 14:
                            n = "A";
                            break;
                        case 15:
                            n = "2";
                            break;
                        case 16:
                            n = "";
                            break;
                    }
                    return n;
                }


                function arrayToShow(array, id) {
                    var html = "";
                    for (var i = 0; i < array.length; i++) {



//                        html += "<div class='card' id='" + id + i + "'onclick='up(" + id + i + ")'><b></b><div class='number'></div></div>";
                        html += "<div class='card' id='" + id + i + "'onclick='up(" + id + i + ")'><b>" + typeShow(array[i].type) + "</b><div class='number'>" + numberShow(array[i].number) + "</div></div>";
                        // html += "<div class='card' id='" + id + i + "'onclick='up(" + s + ")'><b></b><div class='number'></div></div>";

                        document.getElementById(id).innerHTML = html;
                    }
                    ;
                }
                arrayToShow(compeleteCards, "compeleteCards");
//                arrayToShow(player1, "player1");
//                arrayToShow(player2, "player2");
//                arrayToShow(player3, "player3");


            }
            function up(name) {
                if (p2.includes(name) != true) {
                    p2.push(name);
//                    document.getElementById(name).style.background = 'yellow';
                    document.getElementById(name).style.marginTop = '-10px';
                } else {
                    p2.splice(p2.indexOf(name), 1);
//                    document.getElementById(name).style.background = '';
                    document.getElementById(name).style.marginTop = '30px';
                }

            }
            function playcard() {
                cleardesk();
                console.log(p2.length);
                var le = p2.length;
                for (var i = 0; i < le; i++) {

                    var xmlhttp;
                    if (window.XMLHttpRequest)
                    {
                        xmlhttp = new XMLHttpRequest();
                    } else
                    {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    console.log(p2 + "," + i);
                    xmlhttp.open("GET", "playcards.php?s=" + p2.shift(), false);
                    xmlhttp.send();
                    document.getElementById("ccc").innerHTML = xmlhttp.responseText;
                }
                cheak();


            }
            function messages(wds) {
                console.log('Start messages function');

                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.open("GET", "send_m.php?name="+name+"&content="+wds, false);
                xmlhttp.send();
               
               
            }
            function Getmessages() {
                console.log('Start messages function');
               
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    
                }

               xmlhttp.open("GET", "get_m.php", false);
                xmlhttp.send();
          document.getElementById("point").innerHTML=xmlhttp.responseText;      
                
                
            }

            function Kingcards() {
                var arr = new Array();


                for (var i = 0; i < 3; i++) {
                    arr = compeleteCards.shift();
                    console.log(arr);
                    var xmlhttp;
                    if (window.XMLHttpRequest)
                    {
                        xmlhttp = new XMLHttpRequest();
                    } else
                    {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }

                    xmlhttp.open("GET", "kinginsert.php?hs=" + arr.type + "&num=" + arr.number, false);
                    xmlhttp.send();

                }
            }
            function getKingcards() {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.open("GET", "getkingcards.php?name=" + name, false);
                xmlhttp.send();
            }

            function inputp(name, sz, hs)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "get_porke.php?s=" + sz + "&h=" + hs + "&n=" + name, false);
                xmlhttp.send();

            }
            function Quit()
            {
                console.log(name);
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "quit.php?name=" + name, false);
                xmlhttp.send();
                document.getElementById("p1").innerHTML = xmlhttp.responseText;
            }
            function SortCards() {
                if (compeleteCards.length == 54) {
                    compeleteCards.sort(function (a, b) {
                        return 0.5 - Math.random();
                    });
                }
            }

            function DealCards() {
                if (compeleteCards.length == 54) {
                    mytimer = setInterval(function () {
                        GetCards(compeleteCards.shift());
                    }, 100);
                }
            }
            function Insertdate(p1, name1)
            {
                console.log(name1, p1);
                inputp(name1, p1.type, p1.number);
            }

            function GetCards(CardObj) {

                switch (cardSequence) {
                    case 1:
                        var k = InCardsIndex(player1, CardObj);
                        player1.splice(k, 0, CardObj);
                        Insertdate(CardObj, '<?php echo $Pname[0]; ?>');
                        cardSequence = 2;
                        break;
                    case 2:
                        var k = InCardsIndex(player2, CardObj);
                        player2.splice(k, 0, CardObj);
                        Insertdate(CardObj, '<?php echo $Pname[1]; ?>');
                        cardSequence = 3;
                        break;
                    case 3:
                        var k = InCardsIndex(player3, CardObj);
                        player3.splice(k, 0, CardObj);
                        Insertdate(CardObj, '<?php echo $Pname[2]; ?>');
                        cardSequence = 1;
                        break;
                }




                if (compeleteCards.length == 3) {
                    window.clearTimeout(mytimer);
                    Kingcards();
                    fresh();
                }

                sc();
                Show();
                positionChange();
            }
            function fresh() {
                location.reload();
            }

            //在此添加代码
            function InCardsIndex(arr, obj) {
                var len = arr.length;
                if (len == 0) {
                    return 0;
                } else if (len == 1) {
                    if (obj.number >= arr[0].number) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    var backi = -1;
                    for (var i = 0; i < len; i++) {
                        if (obj.number <= arr[i].number) {
                            backi = i;
                            break;
                        }
                    }
                    if (backi == -1) {
                        backi = len;
                    }
                    return backi;
                }
            }
            function positionChange() {
                if (name == '<?php echo $Pname[0]; ?>') {
                    sc1('<?php echo $Pname[1]; ?>');
                    sc2('<?php echo $Pname[2]; ?>');
                }
                if (name == '<?php echo $Pname[1]; ?>') {
                    sc1('<?php echo $Pname[0]; ?>');
                    sc2('<?php echo $Pname[2]; ?>');
                }
                if (name == '<?php echo $Pname[2]; ?>') {
                    sc1('<?php echo $Pname[0]; ?>');
                    sc2('<?php echo $Pname[1]; ?>');
                }
            }
            function desk()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("ds").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "showdesk.php", true);
                xmlhttp.send();
            }
            function Wincheak()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("win").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "wincheak.php", false);
                xmlhttp.send();
            }
            function clear()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {

                    }
                }
                xmlhttp.open("GET", "clearporker.php", true);
                xmlhttp.send();
            }
            function cleardesk()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {

                    }
                }
                xmlhttp.open("GET", "cleardesk.php", false);
                xmlhttp.send();
            }
            function com()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("com").innerHTML = xmlhttp.responseText;
                    }


                }
                xmlhttp.open("GET", "buttonshow.php?name=" + name, true);
                xmlhttp.send();

            }
            function model(num, num1)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "modelchange.php?name=" + name + "&m=" + num + "&m1=" + num1, true);
                xmlhttp.send();

            }

            function sc()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("ca").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "cs1.php?n=" + name, true);
                xmlhttp.send();

            }
            function sc1(name1)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("ca2").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "ca2.php?n=" + name1, true);
                xmlhttp.send();
            }
            function sc2(name2)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("ca1").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "ca1.php?n=" + name2, true);
                xmlhttp.send();
            }
            function index3() {
                positionChange();
            }
            function create() {
                compeleteCards = CreatCompeleteCard();
                Show();
            }
            function sort() {
                SortCards();
                Show();
            }
            function deal() {
                DealCards();
            }
            function index() {
                clear();
            }
            function index1() {
                sc();
            }
            function playcard1() {
                playcard();
                sc();

            }



//            myTimer();
            positionChange();
            desk();
            com();
            sc();







//window.setInterval(function () {
//                sc();
//                
//                if (name =='<?php echo $Pname[0]; ?>') {
//                    sc1('<?php echo $Pname[1]; ?>');
//                     sc2('<?php echo $Pname[2]; ?>');
//                }       
//                if (name =='<?php echo $Pname[1]; ?>') {
// sc1('<?php echo $Pname[0]; ?>');
// sc2('<?php echo $Pname[2]; ?>');
//                }
//                if (name =='<?php echo $Pname[2]; ?>') {
// sc1('<?php echo $Pname[0]; ?>');
// sc2('<?php echo $Pname[1]; ?>');  
// }
//                    }, 100000);
            var myVar = setInterval(function () {                                       //定时
//                myTimer();

                Getmessages();
                positionChange();
                desk();
                com();
                cheak();
            }, time1);



        </script> 
    </body>

</html>

