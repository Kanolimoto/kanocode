/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function writebutton1()
{
    var mm;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        mm = new XMLHttpRequest();
    } else
    {
        // IE6, IE5 浏览器执行代码
        mm = new ActiveXObject("Microsoft.XMLHTTP");
    }
    mm.onreadystatechange = function ()
    {
        if (mm.readyState == 4 && mm.status == 200)
        {
            document.getElementById("writebutton").innerHTML = mm.responseText;
        }
    }
    mm.open("GET", "../PHP/setwords.php", true);
    mm.send();
}