<?php
require_once 'connetion.php';
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



<?php
if(isset($_REQUEST['view']))
{
//Get row id
$uid=intval($_GET['view']);
//Qyery for deletion
$sql2="SELECT id,name,age,address,gender from paitients where id=$uid";
// Prepare query for execution
$query = $conn->prepare($sql2);
// Query Execution
$query -> execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{  

// ?>
<div class="container">
    <?php if ($result->gender == "male") {?>
        <div style="text-align:center;margin:35px ;"><img src="https://cdn-icons-png.flaticon.com/128/4140/4140048.png" alt=""></div>
        <?php } else if ($result->gender == "female"){?>
        <div style="text-align:center;margin:35px;"><img src="https://cdn-icons-png.flaticon.com/128/4140/4140065.png" alt=""></div>
        <?php }?>
<table id="mytable" class="table table-bordred table-striped">                 
    <thead>
        <th>Full Name</th>
        <th>Patient ID</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
    </thead>
    <tr>
        <td><?php echo htmlentities($result->name);?></td>
        <td><?php echo htmlentities($result->id);?></td>
        <td><?php echo htmlentities($result->age);?></td>
        <td><?php echo htmlentities($result->gender);?></td>
        <td><?php echo htmlentities($result->address);?></td>
    </tr>
</table>
</div>
<?php }}?>
