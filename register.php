<?php
// Include config file
require_once "connection/config.php";

// Define variables and initialize with empty values
include 'connection/validation-process.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
   
</head>

<style>
     *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
   
    background-color:cornflowerblue;
    background: url(image/nnn.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    height: 80px;
    padding-top: 366px;

  
}
* {
    margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
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

.loginbody{
            position: relative;
            text-align: center; 
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background: transparent;
            box-shadow:  5px 5px 10px #bebebe,
        -5px -5px 10px #ffff;
        }
        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 95%;
                    padding: 8px;
                    border: none;
                    outline: none;
                    border: 1px solid #ccc;
                    border-radius: 15px;
                    
        }

        .form-group input:focus,
        .form-group select:focus {
            background-color: white;
 
        }

        .form-group-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px; /* Adjust as needed */
        }
        
        .form-group-container .form-group {
            flex: 1;
            margin-right: 5px; /* Adjust as needed */
        }
        
        .form-group-container .form-group:last-child {
            margin-right: 0;
        }
        
        
        .btn {
            width: 100%;
            padding: 10px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            border-radius: 10px;
            border: none;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            transition: .4s;
            background-color: #00BFA6;
        }

        .btn span:last-child {
            display: none;
        }

        .btn:hover {
            transition: .4s;
            background-color: #fff;
            color: #00BFA6;
        }

        .btn:active {
            background-color: #87dbd0;
        }

        .register-link {
            text-align: center;
            font-size: 15px;
            padding-top: 15px;
        }

        .register-link a {
            color: #ffffff;
            text-decoration: none;
        }

        svg {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .help-block {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .content {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            height: 100vh;
            
        }
        
        /* Integrated CSS for the login form */
        .login-form {
            max-width: 400px;
            /* margin-top: 50px; */
            padding: 20px;
            border-radius: 13px;
            background: transparent;
            box-shadow:  1px 1px 10px skyblue, -1px -1px 10px skyblue;
            max-height: 340px;
        }
        
        .login-form h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-sizing: border-box;
        }
        
        .login-form .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            padding: 6px 10px;
        }
        
        .login-form input:invalid + .error-message {
            display: block;
        }
        
        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .login-form input,
        .login-form select {
                    width: 95%;
                    padding: 8px;
                    border: none;
                    outline: none;
                    border-radius: 15px;
                    background-color: white;
                    box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
        
        }
        
        .login-form input:focus,
        .login-form select:focus {
                    background-color: white;
                    box-shadow: 13px 13px 100px white, -13px -13px 100px;
        }
        
        /* Registration link */
        .registration-link {
            text-align: center;
            margin-top: 15px;
        }
        .title {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Adjust as needed */
        }
        
        .title h1 {
        font-size: 10rem; /* Adjust as needed */
        text-align: center;
        
        }
        
        .pl{
            font-size: small;
        }
        .error_message{
            color: red;
            font-size: 12px;
            margin-top: 5px;
            background-color: #f8d7da;
            border: 10px solid #f5c6cb;
            border-radius: 4px;
            padding: 6px 10px;
        }

        .custom-file-upload {
            display: inline-block;
            position: relative;
            background-color: white;
            border-radius: 15px;
            width: 55%;
            padding: 5px;
            background: transparent;
        }
        
        .upload-icon {
            width: 25px; /* Adjust width as needed */
            height: 25px; /* Adjust height as needed */
            vertical-align: middle;
            margin-right: 5px; /* Adjust the spacing between the icon and text */
           
        }
        
        .file-name {
            vertical-align: middle;
            margin-left: 5px; /* Adjust the spacing between the icon and the file name */
        }
        
        .custom-file-upload:hover {
            cursor: pointer;
        }
        
        /* Style the file input button */
        #profile_image {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
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
   <a href="login.php"style="padding-right: 25px;text-decoration:none;color:black">Sign In </a>
</nav>

</header>


<body >


    <div class="container"style=" 
 box-shadow: 1px 1px 5px gray , -1px -1px 5px gray;border-radius:50px;margin-top: 259px;px; width: 1900px; background-color:white" >
        
        <h2>Register</h2>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" placeholder="Username">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input type="email" id="email" name="email" value="<?php echo $email; ?>"  placeholder="Email">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">

                <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>"  placeholder="First Name">
                <span class="help-block"><?php echo $first_name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"  placeholder="Last Name">
                <span class="help-block"><?php echo $last_name_err; ?></span>
            </div>
            <div class="form-group-container">
                <div class="form-group <?php echo (!empty($birthdate_err)) ? 'has-error' : ''; ?>">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" >
                    <span class="help-block"><?php echo $birthdate_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" >
                        <option value="">Select your gender</option>
                        <option value="Male" <?php if ($gender === "Male") echo "selected"; ?>>Male</option>
                        <option value="Female" <?php if ($gender === "Female") echo "selected"; ?>>Female</option>
                        <option value="Other" <?php if ($gender === "Other") echo "selected"; ?>>Other</option>
                    </select>
                    <span class="help-block"><?php echo $gender_err; ?></span>
                </div>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" id="password" name="password" value="<?php echo $password; ?>" placeholder="Password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password" >
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($profile_image_err)) ? 'has-error' : ''; ?>">
                <div class="custom-file-upload">
                    <img src="icons/upload.png" alt="Upload icon" class="upload-icon">
                    <span id="file-name" class="file-name">Choose Profile Image</span>
                    <input id="profile_image" type="file" name="profile_image" accept="image/*" onchange="displayFileName(this)" style="display: none;">
                </div>
                <span class="help-block"><?php echo $profile_image_err; ?></span>
            </div>

            <button type="submit" class="btn" style="background:#00bfa6">Register</button>
        </form>
        <div class="register-link">
            <span>Already have an account? </span><a href="login.php"style=" text-decoration: none; color:#00bfa6">Login</a>
        </div>
    </div>
</body>
</html>
