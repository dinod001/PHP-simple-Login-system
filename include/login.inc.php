<?php
include_once 'dbse.inc.php';
include_once 'fucntions.inc.php';

if(isset($_POST['login'])){
    $username=$_POST["Uname"];
    $password=$_POST["password"];

    if(emptyInputsLogin($username,$password)!=false){
        header("Location:../login.php?error=emptyinputs");
        exit();
    }

    LoginUser($conn,$username,$password);
}
else{
    header('Location:../login.php');
    exit();
}