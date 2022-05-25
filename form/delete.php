<?php
include "config.php";
echo $uid=$_REQUEST['uid'];

$del="DELETE FROM user where uid=$uid";
$result=$conn->query($del);
if ($result==true){
    echo "<script>
    alert('Save Success');
    window.location='fetch.php';
    </script>";
   }
   else{
       echo "fail";
   }
?>