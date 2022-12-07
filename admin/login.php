<?php

require_once('../config.php');


if(isset($_SESSION['admin_name'])){
    header('location:'.BURLA);
}

require(BL.'function/validate.php'); 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css" >

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&family=Work+Sans:wght@400&display=swap" rel="stylesheet">

    
    <title> Dashboard | Login </title>
  </head>



  <body>

        <div class="cont-login d-flex align-items-center justify-content-around">

        <?php

        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];

            $password = $_POST['password'];
          
            if(checkEmpty($email) && checkEmpty($password))
            {
                if(validEmail($email))
                {
                  
                  $check = checkRow('admin','admin_email',$email);


                  if($check)
                  {

                   $check_pass = password_verify($password,$check['admin_password']);

                   if($check_pass == true){

                    $_SESSION['admin_name'] = $check['admin_name'];
                    $_SESSION['admin_email'] = $check['admin_email'];
                    $_SESSION['admin_id'] = $check['admin_id'];

                   
                    header("location:".BURLA);

                   }else{
                         $error_message = "Incorrect Password";
                      }
                      
                  }
                  else 
                  {
                      $error_message = "Incorrect Email";
                  }
             }
              else 
              {
                  $error_message = "Wrong Email";
              }
                
                }else{

                  $error_message = "please type a correct email";
                }

            }else{

               $error_message = "please fill all fields";
            }
        

        ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5" >
                <div class="row">
                    
                    <?php  require BL.'function/message.php'; ?>
                    <div class="col-sm-12  ">
                        <h3 class="text-center p-3 text-white">Login</h3>
                    </div>
                    <div class="col-sm-6 offset-sm-3 ">
                        <div class="form-group">
                            <label >Email </label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label >Password </label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group">
                           
                            <input type="submit" name="submit" class="form-control btn btn-success"   >
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>





  </body>
</html>