<?php session_start();



if (!empty($_SESSION['user'])){ 

    print_r($_SESSION['user']);
    ?>

<html>
    <body>
    <div style="display:flex;flex-direction:column;justify-content:center;align-items: center;">
    <h1 style="color: blue;">Welcome user ! your registerd details is :</h1><br>

    <?php echo "User ID: ".$_SESSION['id']; ?><br>
    <?php echo "User Name: ".$_SESSION['firstname']." ".$_SESSION['lastname']; ?><br>
    <?php echo "Email: ".$_SESSION['user']; ?><br>
    <?php echo "Mobile: ".$_SESSION['mobile']; ?><br>
    <?php echo "Date of birth: ".$_SESSION['dob']; ?><br>
    <?php echo "Gender: ".$_SESSION['gender']; ?><br>
    <?php echo "Create date: ".$_SESSION['cdate']; ?><br></br>
 
    <button><a  href="logout.php">Logout</a></button></div>


    </body>
</html>
<?php
}


else {
    header("location:login.tpl.php");
    exit();
}




?>
