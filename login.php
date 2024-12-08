<?php
include_once "header.php";
?>
<div>
    <form action="include/login.inc.php" method="post">
        <h1>Login Here !</h1><br>
        <label for="fname">Username/Email</label>
        <input type="text" id="fname" name="Uname" placeholder="Username/Email here">

        <label for="lname">Password</label>
        <input type="text" id="lname" name="password" placeholder="Your password..">
        <input type="submit" name="login" value="Login">
        <p>don't have an account ? <a href="signup.php">Register Here</a></p>
    </form>
</div>

<?php
include_once "footer.php";
?>