<?php 
session_start();

require_once("database.php");
    if(!empty($_POST)){
        
    $emailvalue=$_POST['email'];

    $sql_query_select="SELECT * FROM useridenty where Email='$emailvalue'";

    if(count(mysqli_fetch_all(mysqli_query($sql_login,$sql_query_select)))>0){
        $user_identify= (mysqli_fetch_assoc(mysqli_query($sql_login,$sql_query_select)));
        if ($user_identify["Email"]===$_POST['email'] && $user_identify["Password"]===$_POST['userpassword']){
                $_SESSION["user"]=$user_identify;
        

                header("location:index.php");
                exit();
        }else{
            $_SESSION["error"]="password_error";
            header("location:login.tpl.php");
            exit();
        }
    }
    else{
        $_SESSION["error"]="user_error";
    header("location:login.tpl.php");
    exit();
    }


    mysqli_close($sql_login);}

if (empty($_SESSION['user'])){ 
    ?>
<html>
<div>
    <form action="" method="post">
        <label>Email</label><br>
        <input type="email" name="email" required/><br>
        <label>Password</label><br>
        <input type="password" name="userpassword" required/>
        <br></br>
        
        <input  style="background-color:rgb(19, 75, 216);color:white;"  type="submit" value="login"/>
        <br></br>

        <p>Are you new user ?   <a href="register.php">Signup</a> </p>
    </form>
        <?php
            if(isset($_SESSION['error'])&& $_SESSION['error']==="user_error"){
            echo '<p style="color:red;">Enter email not register</p><br></br>';
            }
            elseif (isset($_SESSION['error'])&& $_SESSION['error']==="password_error"){
                echo '<p style="color:red;">User enter wrong password</p><br></br>';
            }
        ?>
       </div> 
    </body>
</html>
<?php } 
else{
    header("location:index.php");
    exit();

}
?>
<?php session_destroy();?>

