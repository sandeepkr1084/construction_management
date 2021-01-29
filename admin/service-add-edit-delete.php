 
   <?php include 'navbar.php'?>
   <?php include 'sidebar.php'?>
   
  <?php
      $service_id = 0;
      if(isset($_GET["service_id"])){
         $service_id = $_GET["service_id"];
      }
      $sql = "SELECT * FROM our_services WHERE id=$service_id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
  ?>


   <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Service</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

        


          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="validateForm">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Service</h3>
            </div>

           
            <div class="card-body">
              <input type="hidden" name="service_id" value="<?php echo $row["id"] ?>">
              <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" id="service_name" name="service_name" class="form-control" placeholder="Service Name" value="<?php echo $row["title"] ?>">
              </div>
              <div class="form-group">
                <label for="editor">Service Description</label>
                <textarea class="form-control" id="editor" name="service_details"><?php echo $row["detail"] ?></textarea>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8" style="padding-top: 7px;">
                     <label for="select_image">Service Image</label>
                     <input type="file" id="select_image" name="service_image" class="form-control">
                  </div>
                  <div class="col-md-4" style="padding: 7px;">
                     <img src="<?php echo($row["image"]) ?>" height="80px" width="120px" id="image">
                  </div>
                </div>

                
              </div>
              <input type="submit" value="Submit Details" name="service" class="btn btn-success" style="float: right;">
              
            </div>
            
          </div>
          </form>


    

      
    </section>
  </div>
  
  <?php include 'footer.php'?>

  



<?php 
if(isset($_POST["service"])){
  $service_id = $_POST["service_id"];
  $service_name = $_POST["service_name"];
  $service_details = $_POST["service_details"];
  $status = 1;
  $file_uploaded = 0;

  if(isset($_FILES['service_image']) && !empty($_FILES['service_image']['name'])){
      $target_dir = "images/services/";
      $target_file = $target_dir . date("Y-m-d-H-i-s") . basename($_FILES["service_image"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      if(move_uploaded_file($_FILES["service_image"]["tmp_name"], $target_file)){
          echo "<div class='alert alert-danger' role='alert'>Successfuly uploaded your file</div>";
          $file_uploaded = 1;
      }
      else {
          echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
      }

  }

  if($service_id==""){
    if($file_uploaded == 1){

      $sql = $conn->prepare("INSERT INTO our_services (title, detail, status, image) VALUES(?, ?, ?, ?)");
      $sql->bind_param("ssss", $service_name, $service_details, $status, $target_file);

    }
  }
  else{
    if($file_uploaded == 1){

      $sql = $conn->prepare("UPDATE our_services SET title=?, detail=?, image=? WHERE id=?");
      $sql->bind_param("ssss", $service_name, $service_details, $target_file, $service_id);
    }
    else{
      $sql = $conn->prepare("UPDATE our_services SET title=?, detail=? WHERE id=?");
      $sql->bind_param("sss", $service_name, $service_details, $service_id);
    }
  }
  if ($sql->execute() === TRUE) {
    header( "location: services.php", true, 303);
  } 
  else {
    echo "<div class='alert alert-danger' role='alert'>Error: there was an error uploading your details</div>";
  }

}

?>




<script type="text/javascript">
  
  $(function() {
    $("#validateForm").validate({
      rules: {
        service_name: {
          required: true,
          minlength: 3
        },
        status: {
          required: true,

        },
    <?php 
      $url_array =  explode('.php', $_SERVER['REQUEST_URI']) ;
      $url = end($url_array);  
      if($url==""){ 
    ?>
        service_image: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
        }
    <?php } ?>
      },
      messages: {
        service_name: {
          required: "Please enter your project name!!",
          minlength: "Your service name must contain 3 character!!"
        },
        status: {
          required: "Please select status of your service!!",
        },
        service_image: {
            required: "Please select file to upload!!!",
            extension: "We only accept jpg,jpeg,png,ico,bmp file type"
        }
      },
    });
  });

</script>

