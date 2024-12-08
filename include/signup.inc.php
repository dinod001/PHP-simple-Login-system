<?php
include_once 'dbse.inc.php';
include_once 'fucntions.inc.php';

if(isset($_POST['Sign'])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $Username=$_POST["username"];
    $password=$_POST["password"];
    $Rpassword=$_POST["Rpassword"];

    $emptyInputs=emptyInputs($name,$email,$Username,$password,$Rpassword);
    $inavidUname=inavidUname($Username);
    $inavidEmail=inavidEmail($email);
    $pwdMatch=pwdMatch($password,$Rpassword);
    $UserExit=UserExit($conn,$Username,$email);

    if($emptyInputs!=false){
        header("Location:../signup.php?error=emptyinputs");
        exit();
    }
    if($inavidUname!=false){
        header("Location:../signup.php?error=inavidUname");
        exit();
    }
    if($inavidEmail!=false){
        header("Location:../signup.php?error=inavidEmail");
        exit();
    }
    if($pwdMatch!=false){
        header("Location:../signup.php?error=pwdMatch");
        exit();
    }
    if($UserExit!=false){
        header("Location:../signup.php?error=UserExit");
        exit();
    }

    createUser($conn,$name,$email,$Username,$password);
}
else{
    header('Location:../signup.php');
    exit();
}