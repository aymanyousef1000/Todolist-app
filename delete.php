  
<?php 
require './helpers/dbConnection.php';

if($_SERVER['REQUEST_METHOD'] == "GET"){
 // code ... 
 require './helpers/helpers.php';

 $id = sanitize($_GET['id'],1);    // $_REQUEST

 $errors = [];

if(!validate($id,6)){
  $errors['id'] = "InValid Id";
       
 }


 if(count($errors) == 1){
     // 
     $_SESSION['Message'] = $errors['id'];
 }else{

    // delete op ;
    $sql = "delete from list where id= $id";

    $op  = mysqli_query($con,$sql);

     if($op){
         $message = "task deleted sucessfully";
     }else{
         $message = "Error Try Again.";
     }

     $_SESSION['Message'] = $message;
     header("Location: form.php");
 }
  


}

?>