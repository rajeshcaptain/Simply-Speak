<?php
 session_start();
 require 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html>
<head>
<title>Adosat Home</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<style>
    .btn-space {
    margin-right: 45px;
}
</style>
</head>
<body class="container">
    <br>
    <a href="logout.php"><button class="btn pull-right btn-danger">Logout</button></a><br>
    <h1>Welcome <?php echo $userRow['userName']; ?></h1><br>
    <p class="text-center">
        <a href="taketest.php"><button class="btn btn-success btn-lg btn-space">Take test now</button></a>
        <a href="viewmyscores.php"><button class="btn btn-primary btn-lg">View My scores</button></a>
    </p>
</body>
</html>