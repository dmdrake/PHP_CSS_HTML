<?php include('views/elements/header.php');?>
<script>function checkPass()
    {
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('password2');
        var message = document.getElementById('confirmMessage');
        var badColor = "#ff6666";
        var goodColor = "#66cc66";
        if(pass1.value == pass2.value){
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
            document.getElementById("submit").disabled = false;
        }else{
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
            document.getElementById("submit").disabled = true;

        }
    }</script>
<div class="container">
    <div class="page-header">
        <h1>My Profile</h1>
    </div>

    <form action="<?php echo BASE_URL?>members/updateProfile" method="post">

        <fieldset>
            <label for="first_name">First Name: <font color="#FF0000">*</font></label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" maxlength="20" required="first_name" />
            <br />

            <label for="last_name">Last Name: <font color="#FF0000">*</font></label>
            <input type="text" class="txt" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" maxlength="20" required="last_name" />
            <br />

            <label for="email">E-mail Address: <font color="#FF0000">*</font></label>
            <input type="text" class="txt" id="email" name="email" value="<?php echo $user['email']; ?>" maxlength="100" required="email" />
            <br />

            <label for="password1">Password: <font color="#FF0000">*</font></label>
            <input type="password" class="txt" id="password" name="password" value="" maxlength="100" required="password" />
            <br />
            <label for="password2">Confirm Password: <font color="#FF0000">*</font></label>
            <input type="password" class="txt" id="password2" name="password2" value="" maxlength="100"
                   required="password2" onkeyup="checkPass(); return false;" />
            <br />

            <input type="hidden" name="uID" value=<?php echo $user['uID']; ?>/>
            <br />
            <button id="submit" type="submit" class="btn btn-primary" >Edit Profile</button>
        </fieldset>
    </form><p><a href="<?php echo BASE_URL?>">Back to home page</a></p>
    <?php
    if(isset($message)){
        echo "<div class=\"alert alert-danger\">";
        echo $message;
        echo "</div>";
        unset($message);
    }

    ?>
</div>
<?php include('views/elements/footer.php');?>
