<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-NoteMaker</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body{
    background-color:cornflowerblue;
    background-size: cover;
    background-position: center;
    height: 80px;

  
}
* {
    margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
}
body {
    display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
background: url(image/nnn.jpg) no-repeat;
background-size: cover;
background-position: center;
}
.header{
position: fixed;
top: 0;
left: 0;
width: 100%;
padding: 1.3rem 10%;
background: rgba(0, 0, 0, .1);
backdrop-filter: blur(50px);
display: flex;
justify-content: space-between;
align-items: center;
z-index: 300;
}

.logo{

font-size:20px;

text-decoration: none;

font-weight: bold

}

.navbar a{

color: #fff;
text-decoration: none;


}


.navbar a:hover{
background:rgb(10, 9, 9) 242;
backdrop-filter: blur(50px);
text-transform: none;
text-align: center;
font-weight: 200;
}



</style>

<body style="
    background-color: white">

<header class="header" style="height: 80px;
    background-color: 	#00bfa6">



<a  class="logo" style="float: left;margin: 20px;font-size: 25px;color:black;margin-left: -88px" , font-size: 5rem; color: white; padding-top: 50px;><span style="color: #0bffa7;">N</span>ote<span style="color: #0bffa7;">T</span>aker</span></a>

<nav class= "navbar" style="float: inline-end;
    font-size: 20px;
    margin: 50px;
    font-size:arial;
    margin-right: -101px">
  
   <a href="hm.php" style="padding-right: 25px;text-decoration:none;color:black">Home</a>
   <a href="register.php"style="padding-right: 25px;text-decoration:none;color:black">Register</a>
   <a href="login.php"style="padding-right: 25px;text-decoration:none;color:black">Sign In</a>
</nav>

</header>


<body class="loginbody"style="font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: center;
    background-color:white" >

<div class="content" style="padding-left:150px;font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: center;
    background-color: white">



    <div class="login-form"style=" 
    margin-top: 200px;    box-shadow: 1px 1px 5px gray, -1px -1px 5px gray;;border-radius:40px">
        <h1>NoteTaker</h1>
        <br>
        
        
        <form id="loginForm" action="login_process.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" >
            <input type="password" id="password" name="password" placeholder="Password" >
            <?php
        session_start();
        if(isset($_SESSION['error_message'])) {
            echo '<div style="color: red;">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>
        
            <button type="submit" id="loginButton" class="btn" style="background:#00bfa6">Login</button>

        </form>
        <div class="registration-link">
            <br>
            <p>Don't have an account? <a href="register.php" style=" text-decoration: none; color:#00bfa6;">Register here</a></p>
        </div>
    </div>
</div>

</body>
</html>
