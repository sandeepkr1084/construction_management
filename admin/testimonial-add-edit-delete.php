
<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>
<?php
$feedback_id = 0;
if(isset($_GET["feedback_id"])){
  $feedback_id = $_GET["feedback_id"];
}
$sql = "SELECT * FROM testimonial where id=$feedback_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Testimonial</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="validateForm">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Feedback</h3>
        </div>
        <div class="card-body">
          <input type="hidden" name="feedback_id" value="<?php echo $row["id"] ?>">
          <div class="form-group">
            <label for="name">Enter Your Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo $row["given_by"] ?>">
          </div>
          <div class="form-group">
            <label for="post">Enter Your Post</label>
            <input type="text" id="post" name="post" class="form-control" placeholder="Enter Your Post" value="<?php echo $row["post"] ?>">
          </div>
          <div class="form-group">
            <label for="feedback">Enter Your Feedback</label>
            <textarea id="feedback" class="form-control" name="feedback" rows="2"><?php echo $row["feedback"] ?></textarea>
          </div>
          <?php 
          if(isset($_POST["testimonial"])){
            $feedback_id = $_POST["feedback_id"];
            $name = $_POST["name"];
            $post = $_POST["post"];
            $feedback = $_POST["feedback"];

            if($feedback_id == ""){
              $date = date("d:m:y");
              $sql = "INSERT INTO testimonial (given_by, given_date, post, status, feedback) values('$name', '$date', '$post', 1, '$feedback')";
            }
            else{
              $sql = "UPDATE testimonial SET given_by='$name', post='$post', feedback='$feedback' WHERE id='$feedback_id'";
            }

            if ($conn->query($sql) === TRUE) {
              header( "location: testimonial.php", true, 303);
            } 
            else {
              echo "<div class='error'>Error: please don't put any special charcters</div>";
            }

          }


          ?>

          <input type="submit" value="Add Feedback" name="testimonial" class="btn btn-success" style="float: right;">
          
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
        name: {
          required: true,
        },
        post: {
          required: true,
        },
        feedback: {
          required: true,
          minlength: 20,
          lettersonly: true
        }
        
      },
      messages: {
        name: {
          required: "Please enter your name!!",
        },
        password: {
          required: "Please enter your post!!",
        },
        feedback: {
          required: "Please write your feedback!!",
          minlength: "Your feedback atleast contain 20 charcters!!",
          lettersonly: "feedback must only contain charcters"
        }
      },
    });
  });


</script>






