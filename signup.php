<?php
include_once "header.php";
?>

<div>
    <form action="include/signup.inc.php" method="post">
        <h1>Register Here !</h1><br>
        <label for="fname">Name</label>
        <input type="text" id="fname" name="name">

        <label for="lname">Email</label>
        <input type="text" id="lname" name="email">

        <label for="lname">Username</label>
        <input type="text" id="lname" name="username" >

        <label for="lname">Password</label>
        <input type="Password" id="lname" name="password">

        <label for="lname">Repeat Password</label>
        <input type="Password" id="lname" name="Rpassword">

        <input type="submit" name="Sign" value="Sign up">
        <p>Already have an account ? <a href="login.php">Login Here</a></p>
    </form>
</div>

<?php
    include_once "footer.php";
?>