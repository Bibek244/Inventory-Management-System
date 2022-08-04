<?php
    include 'connection.php';
    ini_set("display_errors", "1");
error_reporting(E_ALL);
?>
<?php
$query = "SELECT fname, lname, gender, email, phone, JOB_TITLE, Hired_date, address, TYPE 
FROM login l
JOIN employee e ON e.Employe_Id =  l.Employe_Id
JOIN type t ON t.TYPE_ID = l.TYPE_ID
JOIN job j ON j.JOB_ID = e.JOB_ID 
WHERE id = ".$_GET['id'];
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_assoc($result)){
$fn = $row['fname'];
$ln = $row['lname'];
$ge = $row['gender'];
$em = $row['email'];
$hd = $row['Hired_date'];
$ad = $row['address'];
$jt = $row['JOB_TITLE'];
$ty = $row['TYPE'];
}
$id = $_GET['id'];
?>
<button><a href = "account.php"> Go back</a></button>
<h5> Full name : <?php echo $fn ." ";?> <?php echo $ln;?></h5>
<h5> Gender : <?php echo $ge ;?></h5>
<h5>Email : <?php echo $em ;?></h5>
<h5>Job title: <?php echo $jt ;?></h5>
<h5> Hired date : <?php echo $hd ;?></h5>
<h5>Role : <?php echo $jt?></h5>
<h5> Address : <?php echo $ad?></h5>
<h5>Account Type : <?php echo $ty?></h5>
