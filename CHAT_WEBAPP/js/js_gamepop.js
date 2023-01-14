
// 获取弹窗
var modal = document.getElementById('myModal');
var modal1 = document.getElementById('myModal1');

// 打开弹窗的按钮对象
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");

// 获取 <span> 元素，用于关闭弹窗 that closes the modal
var span= document.getElementsByClassName("close")[0];
var span1= document.getElementsByClassName("close")[1];
var span2= document.getElementsByClassName("close")[2];

// 点击按钮打开弹窗
btn.onclick = function() {
    modal.style.display = "block";
    closeNav();
}

// 点击 <span> (x), 关闭弹窗
span.onclick = function() {
    modal.style.display = "none";
}

// 在用户点击其他地方时，关闭弹窗
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}





btn1.onclick = function() {
    modal1.style.display = "block";
    closeNav();
}

// 点击 <span> (x), 关闭弹窗
span1.onclick = function() {
    modal1.style.display = "none";
    
}

// 在用户点击其他地方时，关闭弹窗
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}