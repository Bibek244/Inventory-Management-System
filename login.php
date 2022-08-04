<?php
    session_start();
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
      header("location: welcome.php");
      exit;
  }

?>
<html>
    <head>
        <title> Login page </title>
</head>
<body>
 <div class="container">
    <form  method ="post" action ="process_login.php">
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