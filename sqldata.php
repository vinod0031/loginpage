<?php
session_start();
require("database.php");
$r_firstname=$_POST["firstname"];
$r_lastname=$_POST["lastname"];
$r_email=$_POST["email"];
$r_mobile=$_POST["mobile"];
$r_userpassword=$_POST["userpassword"];
$r_confirmpassword=$_POST["confirmpassword"];
$r_dob=$_POST["dob"];
$r_gender=$_POST["gender"];
$r_createdate=$_POST["createdate"];
$sql_query_select="SELECT * FROM useridenty where Email='$r_email'";

if(count(mysqli_fetch_all(mysqli_query($sql_login,$sql_query_select)))>0){
    $_SESSION['error']="already_exist_user";
    header("location:register.php");
}
else{
    if($r_userpassword!==$r_confirmpassword){
        $_SESSION['error']="wrong_password";
        header("location:register.php");
    }
    else{
        $sql_query="INSERT INTO useridenty(Firstname,LastName,Email,Mobile,Password,confimPassword,Dateofbirth,Gender,CreatedDate)
        values('$r_firstname','$r_lastname','$r_email','$r_mobile','$r_userpassword','$r_confirmpassword','$r_dob','$r_gender','$r_createdate')";
        (mysqli_query($sql_login,$sql_query));

        echo '
        <html>
        <body>
        <div style="display:flex;flex-direction:column;justify-content:center;align-items: center;">
        <img src="https://terraacademyforarts.com/wp-content/uploads/2023/01/jgcjc.png" alt="error image"/>
        <br>
        <h1>you have successfully registered</h1><br></br>
        <a href="login.tpl.php">Login Page</a>
        </div>
        </body>
        </html>'
        
        ;

    }

    
    }
    














    



mysqli_close($sql_login);


?>