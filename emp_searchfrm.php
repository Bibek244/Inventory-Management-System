<?php
    include 'connection.php';
    ini_set("display_errors", "1");
error_reporting(E_ALL);
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
}
$id = $_GET['id'];
?>
<button><a href = "employee.php"> Go back</a></button>
<h5> Full name : <?php echo $fn ." ";?> <?php echo $ln;?></h5>
<h5> Gender : <?php echo $ge ;?></h5>
<h5>Email : <?php echo $em ;?></h5>
<h5>Job title: <?php echo $jt ;?></h5>
<h5> Hired date : <?php echo $hd ;?></h5>
<h5> Address : <?php echo $ad?></h5>
