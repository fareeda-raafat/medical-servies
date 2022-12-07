<?php
require_once '../../config.php';
require_once BLA."inc/header.php";
require_once BL.'function/validate.php';


?>

<?php

if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(checkEmpty($name) AND checkEmpty($email And checkEmpty($password)) )
    {
        if(validEmail($email))
        {
           
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO admin (`admin_name` , `admin_email` , `admin_password` )
             VALUES ( '$name' , '$email' , '$hashed_password') ";
    
             $success_message = db_insert($sql);
            
           
        }else
        {
            $error_message = 'Please Enter Valid Email';
            
        }
        
    }else
    {
        $error_message = 'Please Fill All Fields';
       
    }

    require_once BL.'function/message.php';
}

?>


<div class="addAdmin">

   <h2> Add New Admin </h2>

 <form  method="POST">

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputText1" >
  </div>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Save</button>

</form>

</div>


<?Php
require_once BLA."inc/footer.php";
?>