

<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>

<?php
$sql = "SELECT * FROM testimonial";
$result = $conn->query($sql);

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
  <div class="card-header">
    <div class="card-tools">
      <a class="btn btn-success btn-sm" href="testimonial-add-edit-delete.php">
        <i class="nav-icon fas fa-plus"></i> Add Feedback
      </a>
    </div>
  </div>


  <div class="card-body p-0">

    <table class="table table-striped projects">
      <thead>
        <tr>
          <th style="width: 1%">#</th>
          <th style="width: 15%">Given By</th>
          <th style="width: 15%">Post</th>
          <th>Feedback</th>
          <th style="width: 8%" class="text-center">Date</th>
          <th style="width: 8%">status</th>
          <th style="width: 30%"> </th>
        </tr>
      </thead>
      <tbody>
        <?php 
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr id="<?php echo 'delete'.$row["id"] ?>">
            <td> <?php echo $row["id"] ?> </td>
            <td> <?php echo $row["given_by"] ?> </td>
            <td>
              <?php echo $row["post"] ?>
            </td>
            <td class="project_progress">
              <small>
                <?php echo substr($row["feedback"],0, 100) ?>...
              </small>
            </td>
            <td class="project-state">
              <span class="badge badge-success"><?php echo $row["given_date"] ?></span>
            </td>
            <td >
              <span class="badge badge-success" id="<?php echo 'status'.$row["id"] ?>">
                <?php echo($row["status"]==1?"active":"inactive") ?>
              </span>
            </td>
            <td class="project-actions text-right">
              <button class="btn btn-info btn-sm" status="<?php echo $row["status"] ?>" id="<?php echo $row["id"] ?>">

                <?php
                if($row["status"]==1){ 
                  echo "<i class='fas fa-times'></i> de-activate";
                }
                else{ 
                  echo "<i class='fas fa-check'></i> activate";
                }
                ?>

              </button>
              <a class="btn btn-info btn-sm" href="testimonial-add-edit-delete.php?feedback_id='<?php echo $row["id"] ?>'">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
              </a>
              <a class="btn btn-danger btn-sm" id="<?php echo $row["id"] ?>" onClick='return delete_check()'>
                <i class="fas fa-trash">
                </i>
                Delete
              </a>
            </td>
          </tr>

        <?php } ?>

      </tbody>
    </table>
  </div>


</div>

<?php include 'footer.php'?>

<script type="text/javascript">
  $(document).ready(function(){
    $('button').click(function () {
      var feedback_status = $(this).attr("status");
      var feedback_id = $(this).attr("id");
      
      if(feedback_status == 1){
        var status = 0;
      }
      else{
        var status = 1;
      }
      $.ajax({
        url: "testimonial-action.php",
        method: "post",
        data: { 'feedback_id': feedback_id, 'action': 'status', 'status': status },
        dataType: "html",
        success: function(strMessage){
          $("#"+feedback_id).html(strMessage);
          if(feedback_status == 1){
            $("#"+"status"+feedback_id).html("inactive");
            $("#"+feedback_id).attr('status', 0);
          }
          else{
            $("#"+"status"+feedback_id).html("active");
            $("#"+feedback_id).attr('status', 1);
          }
        }
      });
    });
    $('a').click(function () {
      var feedback_id = $(this).attr("id");

      $.ajax({
        url: "testimonial-action.php",
        method: "post",
        data: { 'feedback_id': feedback_id, 'action': 'delete' },
        dataType: "html",
        success: function(strMessage){
          $("#"+"delete"+feedback_id).html(strMessage);
        }
      });
    });

  });

</script>


