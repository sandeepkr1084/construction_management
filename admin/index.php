<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Construction | Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style type="text/css">
    .error{
        color: red;
        font-size: 12px;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <?php 
  session_start();
  include 'connection.php'
  ?>
<div class="login-box">
  <?php

  if(isset($_POST["user"])){
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM user where email='$email' and password='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows>0){
      if($email==$row["email"] && $password==$row["password"]){
        $_SESSION["user"] = $row["id"];
        header( "location: dashboard.php", true, 303);
      }
    }
    else{
      echo "<div class='alert alert-danger' role='alert'>incorect email or password!!</div>";
    }
  }

  ?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../users" class="h1"><b>Construction</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="validateForm">
        <div class="input-group mb-3" id="email">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" id="password">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="submit" value="Sign in" class="btn btn-primary btn-block" name="user">
        </div>
      </form>

      
    </div>
  </div>
</div>



<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(function() {
    $("#validateForm").validate({
      rules: {
        email: {
          required: true,
        },
        password: {
          required: true,
          minlength: 3
        },
        
      },
      messages: {
        email: {
          required: "Please enter your email!!",
        },
        password: {
          required: "Please enter your password!!",
          minlength: "Your password must contain 3 character!!"
        },
      },
      errorPlacement: function(error, element) {
        if (element.attr("type") == "email") {
          error.insertAfter($("#email"));
        } 
        else if(element.attr("type") == "password") {
          error.insertAfter($("#password")); 
        }
      },
    });
  });
</script>
</body>
</html>
