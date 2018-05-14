<?php 
    //start a session - users browser
    session_start();

    //setting a cookie
    $sessionID = session_id(); //storing session id

    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true); //cookie terminates after 1 hour - HTTP only flag
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title> ASSIGNMENT 01 Synchronizer Token Pattern </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="configuer.js"> </script>	
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
            <form method = "POST" action = "serve.php">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Email">
            <p>Password</p>
            <input type="password" name="userpassword" placeholder="Enter Password">
            <input type="submit" name="submit" id = "submit" value="Login">
            <a href="#">Forget Password</a>    
            </form>
        
        
        </div>
		
<?php 
        //if cookie is ok, request to the server and get CSRF token & store it inside hidden HTML DOM input tag ~ id=csToken
       if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","csToken");  </script>'; 
                   
                //echo "cookie set";     
            }
?>

    
    </body>
</html>


