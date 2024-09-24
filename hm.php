<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteTaker</title>
     
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
font-size: 20px;

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


  

.text{
    width: 600px;
  height: 450px;
  box-sizing: border-box;
 
  background: transparent;
  
  background-size:100%;
  box-shadow: #333;
box-sizing: border-box;
  color:black solid;
  border-radius: 40px;
  padding-left: 10px;
  padding-right: 10px;
  margin-bottom:50px ;
  padding-top: 105px;
  align-items: center;



  
}

.text,h1{
    color:black;
   font-size: 20px;
   text-align: center;
  
    
}

.text,h3{
    color: rgb(21, 20, 20);
    text-align:center ;
    margin-top: 10px;
   

}

.btn {
   border-radius: 20px;
    color:white;
    padding: 15px 50px;
    text-align: center;
    text-decoration: none;
 
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  
    margin-top: 30px;
   
 
}
  

.btn a{
    color: white;
  }
</style>
<body style="
    background-color: white">

<header class="header" style="height: 80px;
    background-color: 	#00bfa6">

<a  class="logo" style="float: left;margin: 20px;font-size: 25px;color:black;margin-left: -88px">NoteTaker</a>

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

      <div class= "text" style="
    background-color: white;
    box-shadow: 1px 1px 5px gray , -1px -1px 5px gray;border-radius:40px;padding-top: 55px;margin-top: 100px" >
      <h1>WELCOME</h1><br>
      <h3>Note Taker is an online application designed for efficient note-taking and organization. Users can create, edit, and categorize their notes easily within the platform's intuitive interface. It offers synchronization across devices, ensuring seamless access to notes from anywhere with an internet connection.</h3>

   
      
      <button type="submit" class="btn" style="background:#00bfa6"> <a href="login.php"  style="text-decoration:none">SIGN IN</a></button>

      </div>


    </div>

    


   

</body>
</html>