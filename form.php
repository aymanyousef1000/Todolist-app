<?php   
    require './helpers/dbConnection.php';
    
    

    $sql = "select * from list";
 

    $op  =  mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>To Do List</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

        .action{
            width:15%;
        }

        .id, .number{
            width:5%;
        }

        .date{
            width: 10%;
        }

        .add{
            position: absolute;
            right: 6%;
            width:15%;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> To Do List </h1>   
            
            <br>

        </div>

        



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th class="number">#</th>
                <th class="id">ID</th>
                <th>Task</th>
                <th class="date">Start Date</th>
                <th class="date">End Date</th>
                <th class="action">Action</th>


            </tr>
            

<?php 
#--- reading records
      $i = 0;
      while ($data = mysqli_fetch_assoc($op)) {
?>
            <tr>
               <td><?php echo ++$i;?></td>
               <td><?php echo $data['id'];?></td>
               <td><?php echo $data['task'];?></td>
               <td><?php echo $data['startdate'];?></td>
               <td><?php echo $data['enddate'];?></td>
               

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>

            </tr>

<?php } ?>

            <!-- end table -->
        </table>
        

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->
    <div>
        <a href='insert.php' type="button" class="add btn btn-success">Add Task</a>
    <div>
    <br><br>
</body>

</html>
