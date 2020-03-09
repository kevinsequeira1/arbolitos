<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password,type FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  </head>
  <body background="./fonts/ac22750f1799d985742260e6c89ecb09.jpg">
  <div class="container">
    <div class="row row-cols-4">
      <div class="col-2 " >

          <?php require 'partials/header.php' ?>

          <?php if(!empty($user)): ?>
            <br> <h1 class="font-weight-bold text-white ">Welcome.</h1> <h4 class="font-weight-bold text-white" ><?= $user['email']; 
            ?></h4>
            <br>
            <?php 
              if($user['type']=="root"){
                echo "<br>";
                echo "<a class='font-weight-bold text-white text-info' href='./dash/dash.php'>Go dashboard</a>";
              }
            ?>
            <br>
            <br>
            <h5 class="font-weight-bold text-white">You are Successfully Logged In</h5>
            <a class="font-weight-bold text-white text-info" href="logout.php">
              Logout
            </a>
          <?php else: ?>
            <h1 class="text-white">Please Login or SignUp</h1>

            <a class="text-info font-weight-bold" href="login.php">Login</a> or
            <a class="text-info font-weight-bold" href="signup.php">SignUp</a>
          <?php endif; ?>

      </div>
    </div>      

  </div>
  
  </body>
</html>