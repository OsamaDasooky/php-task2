<?php
require_once 'connetion.php';
?>

<?php
// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_POST['del']);
//Qyery for deletion
$sql = "delete from paitients WHERE  id=:id";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
}


if(isset($_POST['insert']))
{

// Posted Values  
$fname=$_POST['fname'];
$age=$_POST['age'];
$id=$_POST['id'];
$gender=$_POST['gender'];
$address=$_POST['address'];

// Query for Insertion
$sql="INSERT INTO paitients(id,	name,age,gender,address) VALUES(:id,:fn,:ag,:ge,:adrss)";
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
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
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
        <h3>Add New Patient</h3>
        <hr/>
    </div>
</div>


<form name="insertrecord"  method="post">
    <div class="row">
        <div class="col-md-4"><b>Full Name</b>
            <input type="text" name="fname" class="form-control" required>
        </div>
        <div class="col-md-4"><b>Age</b>
            <input type="text" name="age" class="form-control" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"><b>Patient ID</b>
            <input type="number" name="id" class="form-control"  minlength="10" required>
        </div>
        <div class="col-md-4"><b>Gender</b>
            <select name="gender" class="form-control" id="gender">
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
        </div>
    </div>  

    <div class="row">
        <div class="col-md-8"><b>Addres</b>
            <textarea class="form-control" name="address" required></textarea>        
        </div>
    </div>  

    <div class="row" style="margin-top:1%">
        <div class="col-md-8">
            <input type="submit" name="insert" value="Add patient" style="width:100%">
        </div>
    </div> 

</form>
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