<?php 
//We are going to use sessions

session_start();

//lets now reqquire dbconnect.php file
require "dbconnect.php";

//CHECKING IF THE REGISTERER HAS NOT CHECKED THE GENDER RADIO BUTTON
//if its checked then we shall register the user
    if(!empty($_POST['gender'])) {

        $stmt = $con->prepare(" insert into account(username,email,password,day,month,year,gender) values (:username, :email,
         :password, :day, :month, :year, :gender) ");
    
        
        $stmt->bindValue('username', $_POST['username']);
        $stmt->bindValue('email', $_POST['email']);
        $stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_BCRYPT));
        $stmt->bindValue('day', $_POST['day']);
        $stmt->bindValue('month', $_POST['month']);
        $stmt->bindValue('year', $_POST['year']);
        $stmt->bindValue('gender', $_POST['gender']);
        $stmt->execute();

        header("location: logingreen.php");

        // if the gender is empty then do this below


        //BCRYPT IS A TYPE OF PASSWORD HASHING ALGORITHM FOR PROTECTING PASSWORDS FEOM BEING HACKED AND FROM DATABASE INJECTIONS

        }else{
            $error = "select gender";
        }


?>