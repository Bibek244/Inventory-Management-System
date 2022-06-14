<?php
include 'sidebar.php';
?>
<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("location: login.php");
        exit;
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $_SESSION['user']?></title>
</head>
<body>
<?php echo "welcome " .$_SESSION['user']?>
<br>
<button><a href ="logout.php"><h1>logout</h1></a></button>
</body>
</html>
