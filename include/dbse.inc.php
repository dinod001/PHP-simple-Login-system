<?php

define('servername','localhost:3308');
define('username','root');
define('password','');
define('name','codesage lk');

$conn=mysqli_connect(servername,username,password,name);

if(!$conn){
    die("connection failed".mysqli_connect_errno());
}
