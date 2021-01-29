
    
   <?php include 'navbar.php'?>
   <?php include 'sidebar.php'?>
   
  <?php
      $blog_id = 0;
      if(isset($_GET["blog_id"])){
         $blog_id = $_GET["blog_id"];
      }
      $sql = "SELECT * FROM blogs WHERE id=$blog_id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

  ?>

   <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Blog</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="validateForm">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Blog</h3>
          </div>

          <div class="card-body">
            <input type="hidden" name="blog_id" value="<?php echo $row["id"] ?>">
            <div class="form-group">
              <label for="blog_name">Blog Name</label>
              <input type="text" id="blog_name" name="blog_name" class="form-control" placeholder="Blog Name" value="<?php echo $row["title"] ?>">
            </div>
            <div class="form-group">
              <label for="editor">Blog Details</label>
              <textarea class="form-control" id="editor" name="blog_details"><?php echo $row["details"] ?></textarea>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="blog_image">Blog Image</label>
                  <input type="file" id="select_image" name="image" class="form-control" formnovalidate>
                </div>
                <div class="col-md-4">
                  
                  <img src="<?php echo($row["image"]) ?>" height="80px" width="120px" id="image">

                </div>
              </div>
              
            </div>
            <input type="submit" value="Submit Details" name="blog" class="btn btn-success" style="float: right;">
          </div>
          
        </div>
      </form>
      
    </section>
  </div>
  
  <?php include 'footer.php'?>

  
</div>


<?php 
  if(isset($_POST["blog"])){
    $blog_id = $_POST["blog_id"];
    $blog_name = $_POST["blog_name"];
    $blog_details = $_POST["blog_details"];
    $file_uploaded = 0;

    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
      $target_dir = "images/blogs/";
      $target_file = $target_dir . date("Y-m-d-H-i-s") . basename($_FILES["image"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "<div class='alert alert-success' role='alert'>Successfully uploaded your file!!</div>";
          $file_uploaded = 1;
      }
      else {
          echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file!!</div>";
      }
    }

    if($blog_id==""){
      if($file_uploaded == 1){
        $date = date("d:M:y");
        $sql = "INSERT INTO blogs (title, created_date, details, status, image) values('$blog_name', '$date', '$blog_details', 1, '$target_file')";
      }
    }
    else{
      if($file_uploaded == 1){
        $sql = "UPDATE blogs SET title='$blog_name', details='$blog_details', image='$target_file' WHERE id='$blog_id'";
      }
      else{
        $sql = "UPDATE blogs SET title='$blog_name', details='$blog_details' WHERE id='$blog_id'";
      }
    }
    if ($conn->query($sql) === TRUE) {
      header( "location: blogs.php", true, 303);
    } 
    else {
      echo "<div class='alert alert-danger' role='alert'>Error: there was an error uploading your file!!</div>";
    }

  }
?>





<script type="text/javascript">

  $(function() {
    $("#validateForm").validate({
      rules: {
        blog_name: {
          required: true,
          minlength: 3
        },

    <?php 
      $url_array =  explode('.php', $_SERVER['REQUEST_URI']) ;
      $url = end($url_array);  
      if($url==""){ 
    ?>
        image: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
        }
    <?php } ?>
      },
      messages: {
        name: {
          required: "Please enter your blog name!!",
          minlength: "Your blog name must contain 3 character!!"
        },
        image: {
            required: "Please select file to upload!!!",
            extension: "We only accept jpg,jpeg,png,ico,bmp file type"
        }
      },
    });
  });

</script>


