<?php 
require  './helpers/dbConnection.php';
require './helpers/helpers.php';




$id = sanitize($_GET['id'],1);    // $_REQUEST

$errors = [];

if(!validate($id,6)){
 $errors['id'] = "InValid Id";      
}



if(count($errors) == 1){
    // 
    $_SESSION['Message'] = $errors['id'];
    
    header("Location: index.php");

}else{

   $sql = "select * from list where id = $id";
   $op  = mysqli_query($con,$sql);
   $data = mysqli_fetch_assoc($op);

}





if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $task     = CleanInputs($_POST['task']);
    $startdate= $_POST['startdate'];
    $enddate  = $_POST['enddate'];

    # Validate Inputs ... 
    $errors = [];

    if(!validate($task,1)){
     $errors['task'] = "Field Required.";
    }elseif(!validate($task,2)){
        $errors['task'] = "Invalid String.";  
    }


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

     $sql = "update list set task='$task' , startdate = '$startdate',enddate ='$enddate'  where id = $id ";

     $op = mysqli_query($con,$sql);

     if($op){
         $message =  'Update done';
     }else{
         $message =  'Error in Update';
       }
 
      $_SESSION['Message'] = $message; 

      header("Location: form.php");
    }  

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update</h2>
  <form method="post" action="edit.php?id=<?php echo $data['id'];?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Edit Task</label>
    <input type="text" name="task" value="<?php echo $data['task'];?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Task">
  
    <br>
    <label for="exampleInputEmail1">Start Date</label>
    <input type="date" value="<?php echo $data['startdate'];?>" name="startdate"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="startdate">

    <br>
    <label for="exampleInputEmail1">End Date</label>
    <input type="date" value="<?php echo $data['enddate'];?>" name="enddate"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="enddate">

    </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>



</body>
</html>