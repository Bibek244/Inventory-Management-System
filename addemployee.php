<?php
include'connection.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($con, $sqlforjob) or die ("mysqli_error( $sqlforjob)");

$job = <select name='job' required>
      <option >Select Job</option>";
        
  while ($row = mysqli_fetch_assoc($result)) {
    $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
    
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
    
<form method = "POST">
    <label for="fname">Firstname</label>
    <input type="text" name ="fname" required>
    <label for="lname">Lastname</label>
    <input type="text" name ="lname" required>
    <label for="gender">Gender</label>
    <select name = "gender" required>
        <option value = "male">Male</option>
        <option value = "female">Female</option>
</select>
    <label for="email">E-mail</label>
    <input type="email" name ="email" required>
    <label for="phone">Phone Number</label>
    <input type="tel" name ="phone"  pattern ="[0-9]{3}[0-9]{4}[0-9]{3}" required>
    <label for="job">Job</label>
    <? php 
    echo $job;
    ?>
    <label for="hdate">Hired date</label>
    <input type="date" name ="hdate" required>
    <label for="provience">provience</label>
    <input type="number" name ="provience" min ="1" max ="7" required>
    <label for="city">City</label>
    <input type="text" name ="city" required>
    <button type ="submit"> Submit</button>
    <button type = "reset">Reset</button>
</form>
</body>
</html>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fname = $_POST['fname'];
        $lname  = $_POST['lname'];
        $gender = $_POST['gender'];
        $email  = $_POST['email'];
        $job = $_POST['job'];
        $hdate = $_POST['hdate'];
        $provience = $_POST['provience'];
        $city = $_POST['city'];
        mysqli_query($con,"INSERT INTO location(provience, city) VALUES($provience,$city)");
        mysqli_query($con,"INSERT INTO employee(fname, lname, gender, email, Job_Id, Hired_date, (SELECT MAX(location_id) FROM location)");
        }
        //header("location: employee.php");
    ?>