<?php
session_start();
require 'excecuter.php';
$cur_x=$_POST['cur_x'];
$cur_y=$_POST['cur_y'];
$id=$_SESSION['UID'];
if($cur_x==-15180&&$cur_y==-15180){
  echo "Fail";
}
else if($cur_x=='undefined'&&$cur_y=='undefined'){
  echo "Fail";
}
else{
  $r=execute_MYSQL("UPDATE USERS SET CUR_X=".$cur_x.",CUR_Y=".$cur_y.",UPDATE_TIME='".time()."' WHERE UID='".$id."'");
  echo "Success";

}
 ?>
