<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>

<?php
$our_team_id = 0;
if(isset($_GET["our_team_id"])){
 $our_team_id = $_GET["our_team_id"];
}
$sql = "SELECT * FROM our_team WHERE id=$our_team_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Team Member</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="validateForm">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Team Member</h3>
        </div>


        <div class="card-body">
          <input type="hidden" name="our_team_id" value="<?php echo $row["id"] ?>">
          <div class="form-group">
            <label for="fname">Member's First Name</label>
            <input type="text" id="fname" name="fname" class="form-control" placeholder="Member's First Name" value="<?php echo $row["first_name"] ?>" >
          </div>
          <div class="form-group">
            <label for="lname">Member's Last Name</label>
            <input type="text" id="lname" name="lname" class="form-control" placeholder="Member's Last Name" value="<?php echo $row["last_name"] ?>" >
          </div>
          <div class="form-group">
            <label for="post">Member's Post</label>
            <input type="text" id="post" name="post" class="form-control" placeholder="Member's Post"  value="<?php echo $row["post"] ?>" >
          </div>
          <div class="form-group">

            <div class="row">
              <div class="col-md-8" style="padding-top: 7px;">
                <label for="select_image">Member's Image</label>
                <input type="file" id="select_image" name="image" class="form-control">
              </div>
              <div class="col-md-4">
                <img src="<?php echo($row["image"]) ?>" height="80px" width="120px" id="image">
              </div>
            </div>

          </div>

          <input type="submit" value="Submit details" name="our_team" class="btn btn-success" style="float: right;">
        </div>
        
      </div>
    </form> 

  </section>
</div>

<?php include 'footer.php'?>






<?php 
if(isset($_POST["our_team"])){
  $our_team_id = $_POST["our_team_id"];
  $first_name = $_POST["fname"];
  $last_name = $_POST["lname"];
  $post = $_POST["post"];
  $file_uploaded = 0;
  if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
    $target_dir = "images/our_team/";
    $target_file = $target_dir . date("Y-m-d-H-i-s") . basename($_FILES["image"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "<div class='alert alert-success' role='alert'>Successfully uploaded uploading your file!!</div>";
      $file_uploaded = 1;
    }
    else {
      echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file!!</div>";
    }
  }

  if($our_team_id==""){
    if($file_uploaded == 1){
      $sql = "INSERT INTO our_team (first_name, last_name, post, status, image) values('$first_name', '$last_name', '$post', 1, '$target_file')";
    }
  }
  else {
    if($file_uploaded == 1){
      $sql = "UPDATE our_team SET first_name='$first_name', last_name='$last_name', post='$post', image='$target_file' WHERE id='$our_team_id'";
    }
    else{
     $sql = "UPDATE our_team SET first_name='$first_name', last_name='$last_name', post='$post' WHERE id='$our_team_id'";
    }
  }

  if ($conn->query($sql) === TRUE) {
    header( "location: our_team.php", true, 303);
  } 
  else {
    echo "<div class='alert alert-danger' role='alert'>Error: there was an error uploading your details!!</div>";
  }

}

?>




<script type="text/javascript">

  $(function() {
    $("#validateForm").validate({
      rules: {
        fname: {
          required: true,
          minlength: 2
        },
        lname: {
          required: true,
          minlength: 2
        },
        post: {
          required: true,
          minlength: 4
        },
    <?php 
      $url_array =  explode('.php', $_SERVER['REQUEST_URI']) ;
      $url = end($url_array);  
      if($url==""){ 
    ?>
        image:{
          required: true,
          extension: "jpg|jpeg|png|ico|bmp"
        }
      },
    <?php } ?>
      messages: {
        fname: {
          required: "Please enter your First name!!",
          minlength: "First name must contain 2 character!!"
        },
        lname: {
          required: "Please enter your Last name!!",
          minlength: "Last name must contain 2 character!!"
        },
        post: {
          required: "Please select status of your service!!",
          minlength: "post must contain 4 character!!"
        },
        image:{
          required: "Please select file to upload!!!",
          extension: "We only accept jpg,jpeg,png,ico,bmp file type"
        }
      },
    });
  });

</script>

