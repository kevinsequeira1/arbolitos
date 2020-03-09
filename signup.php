<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (name,email, password,type) VALUES (:name,:email, :password,:type)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':type', $_POST['type']);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
  </head>
  <body background="./fonts/ac22750f1799d985742260e6c89ecb09.jpg">

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
      <div class="container">
            <div class="row row-cols-1">
              <h1 class="text-white">SignUp</h1>
          </div>
          <div class="row row-cols-1">
            <a href="login.php">Login</a>
          </div>
          
      </div>
    
    <form action="signup.php" method="POST">
      <div class="container">
            <div class="form-group">
          <input class="form-control" name="name" type="text" placeholder="Enter your name">  
        </div>
        <div class="form-group">
          <input class="form-control" name="email" type="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
          <input class="form-control" name="type" type="text" placeholder="type" value="client" readonly="readonly" style="visibility:hidden">
        </div>
        <div class="form-group">
          <input class="form-control" name="password" type="password" placeholder="Enter your Password">
        </div>
        <div class="form-group">
          <input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password">
        </div>
            <input class="btn btn-primary" type="submit" value="Submit">
            </div>

    </form>

  </body>
</html>