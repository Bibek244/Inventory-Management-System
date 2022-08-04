<?php
include 'connection.php';
include'session.php';

        if($_SERVER["REQUEST_METHOD"]== "POST"){
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $sql = 'SELECT id,username,fname,lname,TYPE,e.Employe_Id
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE l.TYPE_ID = 2';
    $query = "SELECT id,username,fname,lname,TYPE,e.Employe_Id 
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    if($count > 0){
        $matcheduser = mysqli_fetch_assoc($result);
      $_SESSION['TYPE'] = $matcheduser['TYPE'];
      $_SESSION['FIRST_NAME'] = $matcheduser['fname'];
      $_SESSION['LAST_NAME'] = $matcheduser['lname'];
      //$_SESSION[''] = $matcheduser[''];
      $_SESSION['loggedin'] = true;
      $_SESSION['user'] = $username;

      if ($_SESSION['TYPE']=='admin'){
      ?>
    <script type="text/javascript">
    //then it will be redirected to index.php
    alert("<?php echo  $_SESSION['FIRST_NAME']; ?> Welcome!");
    window.location = "welcome.php";
</script>
<?php
  }   
    elseif($_SESSION ['TYPE']== 'user' ){
        ?>
        <script>
            alert("<?=$_SESSION['FIRST_NAME']?> Welcome");
            window.location = "sales.php";
        </script>
        <?php
    }
      
    }
    else {
        ?>
        <script type="text/javascript">
        alert("Username or Password Not Registered! Contact Your administrator.");
        window.location = "login.php";
        </script>
      <?php
    }
    }
    ?>