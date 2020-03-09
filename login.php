<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: ./index.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
      <div class="row row-cols-6">
        <div class="col-3 d-flex justify-content-center">
          <h1 class="text-white">Login</h1>
        </div>
        <div class="row row-cols-6 d-flex justify-content-center">
          <div class="col-3">
            <span><h4>or</h4><a class="text-white" href="signup.php">SignUp</a></span>
          </div>
        </div>
        
      </div>
      
    </div>

    <br>

    <form action="login.php" method="POST">
      <div class="container">
        <div class="row row-cols-3">
          <div class="col form-group">
            <input class="form-control" name="email" type="text" placeholder="Enter your email">
        </div>
      </div>
        <div class="row row-cols-3">
            <div class="col form-group">
              <input class="form-control"  name="password" type="password" placeholder="Enter your Password">
            </div>
        </div>
        <div class="row row-cols-3">
          <div class="col">
              <input class="btn btn-primary" type="submit" value="Submit">
          </div>
        </div>
      </div>
    </form>
  </body>
</html>