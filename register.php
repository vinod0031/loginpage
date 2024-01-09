<?php session_start(); 






if (empty($_SESSION['user'])){ ?>

            <html>
                <body>

                        <div style="display:flex;flex-direction:row;justify-content:center;">
                        <form action="sqldata.php" method="post">
                        <h1 class="heading_color">Create Account</h1>
                        <label>Firstname</label><br>
                        <input type="text" name="firstname" required/><br></br>
                        <label>Lastname</label><br>
                        <input type="text" name="lastname" required/><br></br>
                        <label>Email</label><br>
                        <input type="email" name="email" required/><br></br>
                        <label>Mobile</label><br>
                        <input type="tel" name="mobile" pattern="{0-9}{10}" required/><br></br>
                        <label>password</label><br>
                        <input type="password" name="userpassword" required/><br></br>
                        <label>confirm password</label><br>
                        <input type="password" name="confirmpassword" required/><br></br>
                        <label>DOB</label><br>
                        <input type="date" name="dob" required/><br></br>
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select><br></br>
                        <label>created date</label><br>
                        <input type="date" name="createdate" required/><br></br>
                        <input style="background-color:green;color:white;" type="submit" value="create account"/><br></br>
                        <?php
                            if (isset($_SESSION['error'])&& $_SESSION['error']==="already_exist_user"){
                                    echo '<p style="color:red;" >Username already exists</p>';
                            }elseif(isset($_SESSION['error'])&& $_SESSION['error']==="wrong_password"){
                                    echo '<p style="color:red;" >Password doesnot match</p>';}
                        ?>
                        <p>Already you are created account <a href="login.tpl.php">Login page</a></p>
                    </form>
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