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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <style>
            button:hover {
                opacity: 0.8;
            }
        </style>
    </head>
    <body>

       

        <div data-role="main" class="ui-content" style="margin:20px;">

            



            <!--        denglu    -->

            <div data-role="page" id="pageone" class="modal">
                <div data-role="header" style="">
                    <h1 style=" color: black; font-size: 25px" >Myblog</h1>
        </div> 
                
                

                <form class="modal-content animate" action="PHP/CheakUser.php" method="post">


                    <div class="container" style="width:80%; margin-left: auto;
    margin-right: auto;">
                        
                        <input type="text" placeholder="Enter Username" name="uname" required>

                       
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="submit" style="
                                 background-color: #BDBDBD;
                                color: black;
                                padding: 14px 20px;
                                margin: auto;;
                                border: none;
                                cursor: pointer;
                                width: 100%;

                                ">Login</button>
                                <a href="#pagetwo"><button   onclick="document.getElementById('id02').style.display = 'block'" 
                                
                                style="
                                background-color: #BDBDBD;
                                color: black;
                                padding: 14px 20px;
                                margin: 8px auto;
                                border: none;
                                cursor: pointer;
                                width: 100%;


                                ">Sign Up</button></a>



                       
                    </div>

                    <div class="container" style="background-color:#f1f1f1">

                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                </form>
                
                <hr>
        <div data-role="footer">
            <h1>ITs a Test</h1>
        </div>
                
            </div>
            
            
            
            
            <div data-role="page" data-dialog="true" id="pagetwo">
  <div data-role="header">
    <h1>我是一个对话框！</h1>
  </div>

  <div data-role="main" class="ui-content">
    <!--        zhuche    -->
            <div id="id02" class="modall">
                <span onclick="document.getElementById('id02').style.display = 'none'" class="closel" title="Close Modal">×</span>
                
                
                
                
                <form class="modal-contentl animate" action="PHP/CreatNewUser.php" method="post">
                    <div class="containerl">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Email" name="username" required>

                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                        
                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                        <div class="clearfixl">
                            <button type="button" onclick="document.getElementById('id02').style.display = 'none'" class="cancelbtnl">Cancel</button>
                            <button type="submit" class="signupbtnl">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
      
      
   
  </div>

  <div data-role="footer">
    <h1>对话框底部文本</h1>
  </div>
</div> 
        </div>
        
    </body>
</html>
