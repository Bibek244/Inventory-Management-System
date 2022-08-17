<?php
    include 'connection.php';
    include'sidebar.php';
?>
<?php
$query = "SELECT Employe_Id, fname, lname, gender, email, phone, j.JOB_TITLE, Hired_date, address FROM employee e
join job j on j.JOB_ID = e.JOB_ID where e.Employe_Id = ".$_GET['id'];
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_assoc($result)){
$eid = $row['Employe_Id'];
$fn = $row['fname'];
$ln = $row['lname'];
$ge = $row['gender'];
$em = $row['email'];
$hd = $row['Hired_date'];
$ad = $row['address'];
$jt = $row['JOB_TITLE'];
$phone= $row['phone'];
}
$id = $_GET['id'];
?>
<button><a href = "employee.php"> Go back</a></button>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee detail</title>
</head>
<body>
    <div id="content">
    <div class="container">

        
        <div class ="card shadow">
         
            <div class="card-header bg-primary text-white">
                    <h3>Employee Detail</h3>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type ="text" class = "form-control" id= "fname" name = "fname" value ="<?php echo $fn?>"disabled >
                    </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type ="text" class= "form-control" id="lname"name = "lname" value ="<?php echo $ln?>"disabled >
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name ="gender" value ="<?php echo $ge?>"disabled >
                            <option  name ="" disabled>Select gender</option>
                            <option  name ="male"  >Male</option>
                            <option  name ="female" >Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jobtitle">Role</label>
                        <input type ="text" class ="form-control" id ="jobtitle" value = "<?php echo $jt?>"  disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type ="email" class= "form-control"id= "email" name = "email" value =" <?php echo $em?>"disabled >
                    </div>
                    <div class="form-group">
                        <label for="hired_date">Hired date</label>
                        <input type ="date"  class = "form-control" id="hired_date" name = "hired_date" value ="<?php echo $hd?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type ="text" class = "form-control" id ="address" name = "address" value = "<?php echo $ad?>"disabled >  
                    </div>
                    <div class="form-group">
                        <label for="phone">Contact no</label>
                        <input type ="tel" pattern = "[0-9]{3}[0-9]{4}[0-9]{3}"class = "form-control" id="phone" name = "phone" disabled value = "<?php echo $phone?>">
                    </div>
                </div>
                    <div class="card-footer">
                        <a class = "btn btn-secondary btn-gradiant-secondary" href ="employee.php">Go back</a>
                    </div>

</div>
</div>
</div>

</body>
    </html>
