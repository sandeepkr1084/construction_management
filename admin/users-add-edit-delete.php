<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>


<?php
$user_id = 0;
if(isset($_GET["user_id"])){
 $user_id = $_GET["user_id"];
}
$sql = "SELECT * FROM user WHERE id=$user_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Member</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <?php 
        if(isset($_POST["user"])){
          $user_id = $_POST["user_id"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $password = md5($password);
          $user_exists = 0;
          if($user_id==""){
            $sql = "SELECT * FROM user WHERE email='$email'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              $user_exists = 1;
              echo "<div class='alert alert-danger' role='alert'>User already exists!!</div>";
            }
            else{
              $sql = "INSERT INTO user (email, password) values('$email', '$password')";
            }
          }
          else{
            $sql = "UPDATE user SET email='$email', password='$password' WHERE id='$user_id'";
          }

          if($user_exists == 0){
            if ($conn->query($sql) === TRUE) {
              header( "location: users.php", true, 303);
            } 
            else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }

        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="validateForm">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Member</h3>
        </div>

        <div class="card-body">
          <input type="hidden" name="user_id" value="<?php echo $row["id"] ?>">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?php echo $row["email"] ?>">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          </div>

          <input type="submit" value="Add User" name="user" class="btn btn-success" style="float: right;">

        </div>
    
        
      </div>
    </form>

  </section>
</div>

<?php include 'footer.php'?>





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
    });
  });


</script>


