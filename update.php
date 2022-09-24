<?php
require_once 'connetion.php';

if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$fname=$_POST['fname'];
$age=$_POST['age'];
$id=$_POST['id'];
$gender=$_POST['gender'];
$address=$_POST['address'];

// Query for Query for Updation
$sql="update paitients set name=:fn,age=:ag,id=:id,gender=:ge,address=:adrss where id=$userid";
//Prepare Query for Execution
$query = $conn->prepare($sql);
// Bind the parameters
$query->bindParam(':id',$id);
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ag',$age,PDO::PARAM_STR);
$query->bindParam(':ge',$gender,PDO::PARAM_STR);
$query->bindParam(':adrss',$address,PDO::PARAM_STR);
// Query Execution
$query->execute();
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
    <title>Add New Patient</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
    <div class="col-md-12">
        <h3>Update Patient Information</h3>
        <hr/>
    </div>
</div>

<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT id,name,age	,address,gender from paitients where id=:uid";
//Prepare the query:
$query = $conn->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{               
?>

<form name="insertrecord"  method="post">
    <div class="row">
        <div class="col-md-4"><b>Full Name</b>
            <input type="text" name="fname"  value="<?php echo htmlentities($result->name);?>" class="form-control" required>
        </div>
        <div class="col-md-4"><b>Age</b>
            <input type="text" name="age" class="form-control" value="<?php echo htmlentities($result->age);?>" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"><b>Patient ID</b>
            <input type="number" name="id" class="form-control" value="<?php echo htmlentities($result->id);?>"  minlength="10" required>
        </div>
        <div class="col-md-4"><b>Gender</b>
            <select name="gender" class="form-control" id="gender" value="<?php echo htmlentities($result->gender);?>">
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
        </div>
    </div>  

    <div class="row">
        <div class="col-md-8"><b>Addres</b>
            <textarea class="form-control" name="address" required><?php echo htmlentities($result->address);?></textarea>        
        </div>
    </div>  

    <div class="row" style="margin-top:1%">
        <div class="col-md-8">
            <input type="submit" name="update" value="Update" style="width:100%">
        </div>
    </div> 

</form>
<?php } ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
    style="display:inline-block;width:728px;height:15px"
    data-ad-client="ca-pub-8906663933481361"
    data-ad-slot="3318815534"></ins>
</div>
</div>
</body>
</html>