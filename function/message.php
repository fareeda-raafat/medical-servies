
<?php
if(isset($error_message) && $error_message !='')
   {  ?>
    <div class="alert alert-danger error" role="alert"> 
        <h3> <?PHP echo $error_message; ?> </h3> 
    </div> 
  <?php
   }
  ?>


 <?php 
 if(isset($success_message) && $success_message !='')
   { ?>
    <div class="alert alert-success" role="alert"> 
       <h3> <?PHP echo $success_message; ?> </h3> </div>

    <?Php
    }
    ?>
    


