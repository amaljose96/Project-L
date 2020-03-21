<?php
require 'excecuter.php';
$email=$_POST["email"];
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
$password=$_POST["password"];
$confpassword=$_POST["confpassword"];
if($password==$confpassword){
  //CHECK IF PRESENT
  $r=execute_MYSQL("SELECT * FROM USERS WHERE EMAIL=".$email);
  if($r->num_rows>0){
    echo "1";
  }
  else{
    $uid=uniqid();
    $q="INSERT INTO USERS VALUES ('$uid','$email','$fname','$lname','$password',0,0,".time().")";
  //  echo $q;
    $r=execute_MYSQL($q);
    echo "Success";
  }
}
else{
  echo "2";
}






 ?>
