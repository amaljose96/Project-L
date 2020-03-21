<?php
session_start();
require 'excecuter.php';
$email=$_POST["email"];
$password=$_POST["password"];
//echo "SELECT PASSWORD FROM USERS WHERE EMAIL='".$email."';";
$r=execute_MYSQL("SELECT UID,PASSWORD FROM USERS WHERE EMAIL='".$email."';");
if($r->num_rows>0){
  $record=$r->fetch_assoc();
  if($password==$record['PASSWORD']){
    //SUCCESSFUL LOGIN
    $_SESSION['UID']=$record['UID'];
    echo "
      $.ajax({
        type: \"POST\",
        url: \"update_location.php\",
        data: 'cur_x='+cur_x+'&cur_y='+cur_y,
        success: function(result){
                //alert(result);
                if(result=='Success'){
                  $(\"#erroralert\").html('Successful login');
                }
                else if(result=='Fail'){
                  alert('Failed to initialize locator');
                }
                else{
                  alert(result);
                }
          }
      });
    ";
  }
  else{
    echo "2";
  }
}
else{
  echo "1";
}





 ?>
