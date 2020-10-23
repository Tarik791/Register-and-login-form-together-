<?php 

//here we shall put code to check whether the person who is logging in really has an account

session_start();
require 'dbconnect.php';

if (isset($_POST['submit'])) {
    $stmt = $con->prepare("SELECT * FROM account where username = :username");
    $stmt->bindValue('username', $_POST['username']);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_OBJ);

    if ($account != NULL){//here we are checking for the existence of the user in the db

        //and we want to check if the hashed stored apssword matches the entered
        //password
        if(password_verify($_POST['password'], $account->password)){
            $_SESSION['username'] = $_POST['username'];
            //if they match when we shall direct the user to a home page
            header ("location:index.php");
        }else{
            $error = "Account invalid";
        }
    }else{
        $error = "Account invalid";
    }
}








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    body {
        font-family:sans-serif; background: url(1.png) no-repeat;
        background-size:cover;
    }

    form {
        background-color: transparent; top:50%; width: 400px; padding: 10px; left: 50%;
        border-top-right-radius: 60px; border-bottom-left-radius: 60px;
        transform: translate(-50%, -50%); position: absolute;
    }

    input[type=text], input[type=email], input[type=password]{
        margin:10px 0px; padding: 10px; border-radius: 20px; width: 250px; border:none;
    }

    input[type=submit]{
        margin:10px 0px; padding:10px; border-radius: 20px; background-color: green;
        width: 260px; border: 2px solid #ddd; color: #fff; font-size:16px;

    }
    input[type=submit]:hover {
        background-color:#fa700;
    }
    
    

    </style>

</head>
<body>
    <center>

    <form action="" method="post" autocomplete="off" onsubmit="return validation();">
    <h2 style="color: #ddd;">Greenade</h2>
    <span>Or <a href="js_register.php" style="color: #fa700c;">signUp</a></span><br>
    <input type="text" name="username" placeholder="Username" id="name"><br>

    <input type="password" name="password" placeholder="Password" id="password"><br>

    <input type="submit" name="submit" value="Login"><br>
    <span><a href="#" style="color: #fa700c;">forgot password?</a></span>
    <div id="myerror" style="color: red; background-color: #ddd; text-decoration:underline;font-size:18px;width:300px">


    <?php echo isset ($error) ? $error :''; ?>
    <!--we shall put an error message here if an error occurs or is execudet-->

    </div>
    </form>
    </center>
</body>
</html>