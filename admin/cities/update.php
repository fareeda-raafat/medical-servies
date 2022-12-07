<?php

require('../../config.php');
require(BLA.'inc/header.php');
require(BL.'function/validate.php');


if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $city_id = $_POST['city_id'];

    if(checkEmpty($name) && checkLess($name , 3))
    {
      $row = getRow('city' ,'city_id',$city_id);

     if($row)
     {
        $sql="UPDATE city SET `city_name`='$name' WHERE `city_id` = '$city_id'";
        $success_message = db_update($sql);
        header('refresh:2;url='.BURLA.'cities');
      

     }else{
         $error_message = "Please Type Correct Data";
     }    
    }else{
        $error_message = "Please Fill All Fields";
    }

    require(BL.'function/message.php');
}
?>

<?php
require(BLA.'inc/footer.php');
?>