<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname ="medical_service";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
   die( 'Failed To Connect to DataBase'.mysqli_connect_error());
   return false;
}



function db_insert($sql)
{
    global $conn ;

    $result = mysqli_query($conn , $sql);

    if($result)
    {
       return 'Data Added Successfuly';
       
    }
        return false;
 } 

 function db_update($sql)
 {
    global $conn;

    $result = mysqli_query($conn,$sql);

    if($result)
    {
       return 'Data Updated Successfuly';
    }
      return false;
 }


 function db_delete($sql)
 {
    global $conn;

    $result = mysqli_query($conn,$sql);

    if($result)
    {
       return "Data Deleted Successfully";
    }
      return false;
 }


function  getRow($table ,$field ,$value){
   
   global $conn ;

   $sql = "SELECT * FROM `$table` WHERE `$field`= '$value'";

   $result = mysqli_query($conn , $sql);

   if($result)
   {
      $rows =[];
   
      if(mysqli_num_rows($result)>0)
      {
     
        $rows[]=mysqli_fetch_assoc($result);
              
         return $rows[0];

      }
           
   }
              return false;
   }

   function getRows($table)
   {
        global $conn;

        $sql = " SELECT * FROM `$table`";
        $result = mysqli_query($conn,$sql);

        if($result)
        {
           $rows = [];

           if(mysqli_num_rows($result)>0)
           {
             while($row=mysqli_fetch_assoc($result))
             {
                $rows[]= $row;
             }
           }
        }
      return $rows;
   }

?>