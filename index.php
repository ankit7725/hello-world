<?php
session_start();
?>
<!DOCTYPE html>
<html class="wf-patrickhand-n4-active wf-dosis-n4-active wf-active js no-touch" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Welcome</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all">
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){

    function ajax_login(username,password){
        $.ajax({
            type: "POST",
            url: "ajaxLogin.php",
            data: {
                username : username,
                password : password
            },
            beforeSend: function(){ $("#submit_btn").val('Connecting...');},
            success: function(data){
                if(data==1)
                {
                    window.location.href = "bill.php";
                }
                else
                {
                    $("#submit_btn").val('SIGN IN')
                    $("#error").html("<span style='color:#cc0000'>Error : </span> Invalid username and password. ");
                }
            }
        });
    }

    $("#submit_btn").on("click",function(){
        var username = $("#username").val();
        var password = $("#password").val();

        if($.trim(username).length>0 && $.trim(password).length>0)
        {
            ajax_login(username,password);
        }
    });

    $(document).keypress(function(e){
        if(e.which == '13'){
            var username = $("#username").val();
            var password = $("#password").val();

            if($.trim(username).length>0 && $.trim(password).length>0)
            {
                ajax_login(username,password);
            }
        }
    });
});
</script>
</head>
<body>
<?php

if(!empty($_SESSION['login_user']))
{
    header('Location: index.php');
}
?>
<div class="black">
    <div class="outerdiv">
        <div class="innerdiv">
            <div class="logo_left"><a href="#"><img src="images/logo_sony.png"></a></div>
            <div class="logo_right"><a href="#"><img src="images/logo_apple.png"></a></div>
        </div>
    </div>    
</div>     
<div class="outerdiv">
    <div class="innerdiv">
        <div class="content_panel">
            <h1>Deepak Trading Co.</h1>
            <div class="form">
                <h2>LOGIN</h2>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td valign="top">Username</td>
                        <td valign="top"><input type="text" id='username' placeholder="Username"></td>
                    </tr>
                    
                    <tr>
                        <td valign="top">Password</td>
                        <td valign="top"><input type="password" id='password' placeholder="Password"></td>
                    </tr>
                    
                    <tr>
                        <td valign="top"></td>
                        <td valign="top"><input type="button" id='submit_btn' value="SIGN IN"></td>
                    </tr>
                </table>
                <div id="error"></div> 
            </div>          
        </div>
    </div>
</div> 
</body>
</html>