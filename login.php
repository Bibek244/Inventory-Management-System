<?php
    session_start();
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
      header("location: welcome.php");
      exit;
  }

?>
<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

$login = false;
$showerror = false;
include 'connection.php';
        if($_SERVER["REQUEST_METHOD"]== "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
        
    $query = "SELECT * FROM login WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
        
    if($count > 0){
      
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['user'] = $username;
      header("location: welcome.php");
      
    }
    else {
      $showerror = "Invalid credentials!";
    }
    }
    ?>
    

<html>
    <head>
        <title> Login page </title>
</head>
<body>
 <div class="container">
    <form  method ="post">
    <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name = "username">
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name = "password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>