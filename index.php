<?php
require_once 'connetion.php';

// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from paitients WHERE  id=:id";
// Prepare query for execution
$query = $conn->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Patients Information </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h3> Patients Information</h3> <hr />
        <a href="create.php"><button class="btn btn-primary"> Add New Patient</button></a>
        <div class="table-responsive">                
    <table id="mytable" class="table table-bordred table-striped">                 
        <thead>
            <th>Full Name</th>
            <th>Patient ID</th>
            <!-- <th>Age</th> -->
            <!-- <th>Gender</th> -->
            <!-- <th>Addres</th> -->
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            
        <?php
        $sql = "SELECT id,name,age,address,gender from paitients";
        //Prepare the query:
        $query = $conn->prepare($sql);
        //Execute the query:
        $query->execute();
        //Assign the data which you pulled from the database (in the preceding step) to a variable.
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        //In case that the query returned at least one record, we can echo the records within a foreach loop:
        foreach($results as $result)
        {    
        ?>  
            <tr>
            <td><?php echo htmlentities($result->name);?></td>
            <td><?php echo htmlentities($result->id);?></td>
            <!-- <td><?php echo htmlentities($result->gender);?> </td> -->
            <!-- <td><?php echo htmlentities($result->gender);?></td> -->
            <!-- <td><?php echo htmlentities($result->address);?></td> -->
            <td><a href="update.php?id=<?php echo htmlentities($result->id);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
            <td><a href="index.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
            </tr>
        <?php 
        } ?>
        </tbody>      
    </table>
    </div>
</div>
</div>
</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="3318815534"></ins>

</body>
</html>
