<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">
        body
            {
                font-family:sans-serif;background: url(1.png)no-repeat;
                background-size:cover;
            }
            form{
                background-color: #ddd;margin-top: 35px;width: 400px; padding:20px;
                border-top-right-radius: 60px;border-bottom-left-radius:60px;
            }
            input[type=text], input[type=email],input[type=password]{
                margin:10px 0px;padding: 10px; border-radius:20px;width:250px;border:none;

            }
            input[type=submit]{
                margin:10px 0px;padding: 10px; border-radius:20px;background-color:green;
                width:260px;border:2px solid #fff;color:#fff;font-size:16px;
            }
            input[type=submit]:hover{
                background-color:#fa700;
            }
            input[type="radio"]{
                color:green;border:1px solid #333;}
                .birth{padding:0px 0px 0px 70px;}
    
    </style>
</head>
<body>

<?php 
include 'dbconnect.php';
?>
<center>
    <form action="logingreen.php" method="post" autocomplete="off" onsubmit="return validation();">
        <h2 style="color:green;">Sign-up Today at Greenade</h2>
        <span>Or <a href="logingreen.php" style="text-decoration:none;">Login</a></span><br>
        
        <input type="text" name="username" placeholder="Your Username" id="name"><br>
        
        <input type="email" name="email" placeholder="Enter Email" id="email" required><br>

        <input type="password" name="password" placeholder="Enter Password" id="password"><br>

        <input type="password" name="passwordtwo" placeholder="Confirm Password" id="passwordtwo"><br>

        <div class="age">
            <span>date Of Birth: &nbsp;</span>
                <select name="day" id="myday">
                    <option>Day</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>

                </select>

                <select name="month" id="mymonth">
                    <option>Month</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>Septembar</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>

                </select>

                <select name="year" id="myear">
                    <option>2002</option>
                    <option>2001</option>
                    <option>1999</option>
                    <option>1998</option>
                    <option>1997</option>
                    <option>1996</option>
                    <option>1995</option>
                    <option>1994</option>
                    <option>1993</option>
                    <option>1992</option>

                </select>
        </div><br>

        <div class="mygender">
            <!-- here we shall put pgp code to check one radio input button on gender-->
            <span>Your Gender: &nbsp;</span>
            <label for="male">Male</label>
            <input name="gender" value="male" id="male" type="radio" <?php if(isset($error) && $gender == 'male'){echo "checked";} ?>>
            <label for="female">Female</label>
            <input type="radio" name="gender" value="female" id="female" <?php if(isset($error) && $gender == 'female'){echo "checked";} ?>>

        </div><br>
        
        <input type="submit" name="submit" value="Submit"><br>
        <div id="myerror" style="color: red; background-color: #ddd; text-decoration:underline; font-size:18px; width:300px;">
        
        </div>
    </form>
</center>

<script type="text/javascript">
//lets now call the onsubmit function and ger started
                function validation(){
                    var name = document.getElementById('name').value;
                    var email = document.getElementById('email').value;
                    var password = document.getElementById('password').value;
                    var passwordtwo = document.getElementById('passwordtwo').value;
                    var mday = document.getElementById('myday').value;
                    var month = document.getElementById('mymonth').value;
                    var myear = document.getElementById('myear').value;
                    
                    //we are checking if the user submits a form when fields are empty
                    if (name=="" || password=="" || email=="" || passwordtwo=="" || mday=="" || month=="" || myear==""){

                    document.getElementById('myerror').innerHTML = "*All fields are required";
                    return false;
                    }else if(name.length<5){
                        document.getElementById('myerror').innerHTML = "*name must be atlest 5 characters";
        
                    return false;
                    }
                    else if(password.length<8){
                        document.getElementById('myerror').innerHTML = "password must be atlest 8 characters";
        
                    return false;

                   
                    }else if(password !== passwordtwo){
                        //if the two passwords dont match them execute an error message
                        document.getElementById('myerror').innerHTML = "the two passwords not match, check again";
        
                    return false;
    
                    }else{
                        return true;
                    }

                
               
               }
</script>
    
</body>
</html>