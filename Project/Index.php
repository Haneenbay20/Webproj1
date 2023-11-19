<?php
    include_once 'header2.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    
    <div class="login">
        <h2>Log In</h2>
        <form action="LogInBack.php" method="post">
            <label for="Username">Username:</label>
            <input type="text" name="Username" placeholder=""><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder=""><br><br>

            <button type="submit" name="submit">Sign In</button>
        </form>
     Don't have an account <a href="SignUp.php"> Sign Up</a>
        </div>
</body>
</html>
<style type="text/css">
    .login{
           border: 2px solid darkgrey;
           display: inline-block;
           position: relative;
           background-color: lightgrey;
           display: center;
           border-radius: 7px;
           padding-bottom: 50px;
           padding-top: 50px;
           padding-left: 50px;
           padding-right: 50px;
           margin-top: 50px;

    }
    h2{
        color: black; 
            font-size: 35px; 
            font-weight: bolder; 
            text-align: center; 
    }
    button{
        background-color: 424242; 
            color: #fff; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
    }
    button:hover {
            background-color: darkgrey;}

            label {
            display: block;
            margin-bottom: 10px; 
            font-weight: bold; 
        }

       
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="radio"],
        input[type="date"] {
            width: 100%; 
            padding: 10px; 
            margin-bottom: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }

        a:hover{
             color: blueviolet;
        }
</style>