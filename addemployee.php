<?php
include'connection.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($con, $sqlforjob) or die ("mysqli_error( $sqlforjob)");

$job  = "<select name='job' required>
        <option value ='' disabled selected hidden>select Job</option>";

        
  while ($row = mysqli_fetch_assoc($result)) {
    $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option> ";
  }
    $job.= "</select>";
  ?>
<html>
<head>
<title>Add employee</title>
<style>
form {
    display: flex;
    flex-direction: column;
}
    button {
        cursor : pointer;
    }
   
</style>
</head>
<body>
<div class ="form-container">
<form method = "POST">
    <label for="fname">Firstname</label>
    <input type="text" name ="fname" required>
    <label for="lname">Lastname</label>
    <input type="text" name ="lname" required>
    <label for="gender">Gender</label>
    <select name = "gender" required>
        <option value ='' disable selected hidden>Select gender</option>
        <option value = "male">Male</option>
        <option value = "female">Female</option>
</select>
    <label for="email">E-mail</label>
    <input type="email" name ="email" required>
    <label for="phone">Phone Number</label>
    <input type="tel" name ="phone"  pattern ="[0-9]{3}[0-9]{4}[0-9]{3}" required>
    <?php 
    echo $job ;
    ?>
    <label for="hdate">Hired date</label>
    <input type="date" name ="hdate" required>
    <label for="address">Address</label>
    <input type="text" name ="address" required>  
    <button type ="submit"> Submit</button>
    <button type = "reset">Reset</button>
</form>
</div>
</body>
</html>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fname = $_POST['fname'];
        $lname  = $_POST['lname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email  = $_POST['email'];
        $jo = $_POST['job'];
        $hdate = $_POST['hdate'];
        $address = $_POST['address'];
        $test ="INSERT INTO `employee` (`fname`, `lname`, `gender`, `email`, `phone`, `JOB_ID`, `Hired_date`, `address`) VALUES ('$fname', '$lname', '$gender', '$email', '$phone', '$jo', '$hdate', '$address' )";
        $employee =mysqli_query($con, $test);
        if (!$employee){
            echo "error" .mysqli_error($con);
            exit;
        }
        else{
            echo "sucess";
            header("location: employee.php");
        }
    }   
         
    ?>