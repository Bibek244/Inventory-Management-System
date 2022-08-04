<?php
    require 'connection.php';
    require'session.php';
    confirm_logged_in();
?>
<?php
$query = "SELECT Employe_Id, fname, lname, gender, email, phone, j.JOB_TITLE,j.JOB_ID,Hired_date, address FROM employee e
join job j on j.JOB_ID = e.JOB_ID where e.Employe_Id = ".$_GET['id'];
$result = mysqli_query($con,$query);        
while ($row = mysqli_fetch_assoc($result)){
$id = $row['Employe_Id'];
$fn = $row['fname'];
$ln = $row['lname'];
$ge = $row['gender'];
$phone = $row['phone'];
$em = $row['email'];
$hd = $row['Hired_date'];
$ad = $row['address'];
$jt = $row['JOB_TITLE'];
}
?>
<head>
    <style>
        form{
            display : flex;
            flex-direction: column;
        }
    </style>
</head>
<div class ="form-container">
<form method = "POST">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
    <label for="fname">First name</label>
    <input type ="text" name = "fname" value ="<?php echo $fn?>">
    <label for="lname">Last name</label>
    <input type ="text" name = "lname" value ="<?php echo $ln?>">
    <label for="gender">Gender</label>
    <select name ="gender" value ="<?php echo $ge?>">
        <option  name ="" disabled>Select gender</option>
        <option  name ="male"  >Male</option>
        <option  name ="female" >Female</option>
    </select>
    <label for="jobtitle">Role</label>
   <input type ="text" value = "<?php echo $jt?>"  disabled>
    <label for="email">Email</label>
    <input type ="email" name = "email" value =" <?php echo $em?>">
    <label for="hired_date">Hired date</label>
    <input type ="date" name = "hired_date" value ="<?php echo $hd?>">
    <label for="address">Address</label>
    <input type ="text" name = "address" value = "<?php echo $ad?>">  
    <label for="phone">Contacts</label>
    <input type ="tel" pattern = "[0-9]{3}[0-9]{4}[0-9]{3}" name = "phone" value = "<?php echo $phone?>">
    <button type = "submit" >Submit</button>
</form>
    </div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Employee_id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = "UPDATE employee SET fname = '$fname' , lname = '$lname',
     	gender = '$gender', email = '$email', address = '$address', phone = '$phone' 
         WHERE  Employe_Id  = '$Employee_id'";
     $result= mysqli_query($con,$query) ;
     if(!$result){
         echo "error".mysqli_error($con);
}
}
?>