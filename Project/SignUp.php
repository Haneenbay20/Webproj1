<?php
    include_once 'header2.php';
?>

<section class="signupform">
    <div class="SignUp">
    <h2>Sign Up</h2>
    <form action="SignUpBack.php" method="post">
    <label for="Username">Username:</label>
    <input type="text" name="Username" placeholder=""><br>

    <label for="FullName">FullName:</label>
    <input type="text" name="FullName" placeholder=""><br>

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder=""><br>

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder=""><br>

    <label for="passwordrpt">Confirm Password:</label>
    <input type="password" name="passwordrpt" placeholder=""><br>

    <label for="gender">Gender:</label>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female<br>

    <label for="dateofbirth">Date of Birth:</label>
    <input type="date" name="dateofbirth" placeholder=""><br>

    <button type="submit" name="submit">Sign Up</button>
</form>
    </div>
    
</section>
<style type="text/css">
    .SignUp{
           border: 2px solid darkgrey;
           display: inline-block;
           position: relative;
           background-color: lightgrey;
           display: center;
           border-radius: 7px;
           
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
        
        input[type="date"] {
            width: 100%; 
            padding: 10px; 
            margin-bottom: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        </style>
