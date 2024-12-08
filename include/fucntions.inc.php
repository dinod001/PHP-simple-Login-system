<?php
include_once "dbse.inc.php";

function emptyInputs($name,$email,$username,$password,$Rpassword){
    if(empty($name)||empty($email)||empty($username)||empty($password)||empty($Rpassword)){
        return true;
    }
    else{
       return false;
    }
}

function inavidUname($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        return true;
    }
    else{
        return false;
    }
}

function inavidEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
       return false;
    }
}

function pwdMatch($password,$Rpassword){

    if($password!=$Rpassword){
        return true;
    }
    else{
        return false;
    }
}

function UserExit($conn,$Username,$Email){
    $sql = "SELECT * FROM userdetails WHERE Username=? OR Email=?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../signup.php?error=stmtfailed2");
    }
    mysqli_stmt_bind_param($stmt,"ss",$Username,$Email);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$Username,$password){
    $sql="INSERT INTO userdetails(Name,Email,Username,Password) VALUES(?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../signup.php?error=stmtfailed");
    }
    $hashPwd=password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$Username,$hashPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../signup.php?error=none");
    exit();
}

//Login functions

function emptyInputsLogin($username,$password){
    if(empty($username)||empty($password)){
        return true;
    }
    else{
       return false;
    }
}

function LoginUser($conn,$Username,$password){
    $uidexit= UserExit($conn,$Username,$Username);
    if($uidexit==false){
        header("Location:../login.php?error=usernotExit");
        exit();
    }
    $pwdhash=$uidexit["Password"];
    $check_password=password_verify($password,$pwdhash);
    if($check_password==false){
        header("Location:../login.php?error=pwerror");
        exit();
    }
    elseif($check_password==true){
        session_start();
        $_SESSION["username"]=$uidexit["Username"];
        $_SESSION["password"]=$uidexit["Password"];
        header("Location:../index.php");
        exit();
    }

}

?>