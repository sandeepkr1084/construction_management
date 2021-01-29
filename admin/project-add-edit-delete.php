<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>

<?php
$project_id = 0;
if(isset($_GET["project_id"])){
  $project_id = $_GET["project_id"];
}
$sql = "SELECT * FROM our_projects WHERE id=$project_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Project</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="validateForm">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Project</h3>
        </div>

        
        <div class="card-body">
          <input type="hidden" name="project_id" value="<?php echo $row["id"] ?>">
          <div class="form-group">
            <label for="project_name">Project Name</label>
            <input type="text" id="project_name" name="project_name" class="form-control" placeholder="Project Name" value="<?php echo $row["title"] ?>">
          </div>

          <div class="form-group">
            <label for="project_type">Project Type</label>

            <select name="project_type" class="form-control" id="project_type">
              <option disabled selected value="">Select One</option>
              <option <?php echo $row["type"]=='intorior'?"selected":""; ?> value="intorior">Intorior</option>
              <option <?php echo $row["type"]=='big building'?"selected":""; ?> value="big building">Big Building</option>
              <option <?php echo $row["type"]=='park'?"selected":""; ?> value="park">Park</option>
            </select>

          </div>



          <div class="form-group">
            <label for="editor">Project Description</label>
            <textarea class="form-control" id="editor" name="project_details"><?php echo $row["detail"] ?></textarea>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-8">
                <label for="select_image">Project Image</label>
                <input type="file" id="select_image" name="project_image" class="form-control">
              </div>
              <div class="col-md-4" style="padding: 7px;">
                <img src="<?php echo($row["image"]) ?>" height="80px" width="120px" id="image">
              </div>
            </div>
          </div>
          <input type="submit" value="Submit Details" name="project" class="btn btn-success" style="float: right;">
        </div>
        
      </div>
    </form>

    
  </section>
</div>

<?php include 'footer.php'?>



<?php
if(isset($_POST["project"])){

  $project_id = $_POST["project_id"];
  $project_name = $_POST["project_name"];
  $project_type = $_POST["project_type"];
  $project_details = $_POST["project_details"];
  $status = 1;
  $file_uploaded = 0;
  
  if(isset($_FILES['project_image']) && !empty($_FILES['project_image']['name'])){
    $target_dir = "images/projects/";
    $target_file = $target_dir . date("Y-m-d-H-i-s") . basename($_FILES["project_image"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(move_uploaded_file($_FILES["project_image"]["tmp_name"], $target_file)){
     echo "<div class='alert alert-success' role='alert'>Successfuly uploaded your file!!</div>";
     $file_uploaded = 1;
   }
   else {
    echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
  }
}

  if($project_id==""){
    if($file_uploaded == 1){
      $sql = $conn->prepare("INSERT INTO our_projects(title, type, detail, status, image) VALUES(?, ?, ?, ?, ?)");
      $sql->bind_param("sssss", $project_name, $project_type, $project_details, $status, $target_file);
    }
  }
  else{
    if($file_uploaded == 1){
      $sql = $conn->prepare("UPDATE our_projects SET title=?, type=?, detail=?, image=? WHERE id=?");
      $sql->bind_param("sssss", $project_name, $project_type, $project_details, $target_file, $project_id);
    }
    else{
      $sql = $conn->prepare("UPDATE our_projects SET title=?, type=?, detail=? WHERE id=?");
      $sql->bind_param("ssss", $project_name, $project_type, $project_details, $project_id);
    }
  }
  if ($sql->execute() === TRUE) {
    header( "location: projects.php", true, 303);
  } 
  else {
    echo "<div class='alert alert-danger' role='alert'>Error: While uploading your details!!!</div>";
  }
}
?>




<script type="text/javascript">

  $(function() {
    $("#validateForm").validate({
      rules: {
        project_name: {
          required: true,
          minlength: 3
        },
        status: {
          required: true,

        },
        project_type: {
          required: true,
        },
    <?php 
      $url_array =  explode('.php', $_SERVER['REQUEST_URI']) ;
      $url = end($url_array);  
      if($url==""){ 
    ?>
        project_image: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
        }
    <?php } ?>
      },
      messages: {
        project_name: {
          required: "Please enter your project name!!",
          minlength: "Your project name must contain 3 character!!"
        },
        status: {
          required: "Please select status of your project!!",
        },
        project_type: {
          required: "Please select project type",
        },
        project_image: {
            required: "Please select file to upload!!!",
            extension: "We only accept jpg,jpeg,png,ico,bmp file type"
        }
      },
    });
  });


</script>


