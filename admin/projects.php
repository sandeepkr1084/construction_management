<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>
<?php
$sql = "SELECT * FROM our_projects";
$result = $conn->query($sql);

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Projects</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">

          <a class="btn btn-success btn-sm" href="project-add-edit-delete.php">
            <i class="nav-icon fas fa-plus"></i> Add Project
          </a>
        </div>
      </div>
      <div class="card-body p-0">

        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Project Name</th>
              <th style="width: 15%">Project Image</th>
              <th>Project Details</th>
              <th style="width: 8%" class="text-center">Status</th>
              <th style="width: 30%"> </th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while ($row = $result->fetch_assoc()) {
              ?>
              <tr id="<?php echo 'delete'.$row["id"] ?>">
                <td> <?php echo $row["id"] ?> </td>
                <td> <?php echo $row["title"] ?> </td>
                <td>
                  <img alt="Avatar" class="table-avatar" src="<?php echo $row["image"] ?>" style="border-radius: 2%;">
                </td>
                <td class="project_progress">
                  <small>
                    <?php echo substr($row["detail"],0, 100) ?>...
                  </small>
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
                  <a class="btn btn-info btn-sm" href="project-add-edit-delete.php?project_id='<?php echo $row["id"] ?>'">
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

  </section>
</div>

<?php include 'footer.php'?>

<script type="text/javascript">
  $(document).ready(function(){

    $('button').click(function () {
      var project_status = $(this).attr("status");
      var project_id = $(this).attr("id");
      
      if(project_status == 1){
        var status = 0;
      }
      else{
        var status = 1;
      }
      $.ajax({
        url: "project-action.php",
        method: "post",
        data: { 'project_id': project_id, 'action': 'status', 'status': status },
        dataType: "html",
        success: function(strMessage){
          $("#"+project_id).html(strMessage);
          if(project_status == 1){
            $("#"+"status"+project_id).html("inactive");
            $("#"+project_id).attr('status', 0);
          }
          else{
            $("#"+"status"+project_id).html("active");
            $("#"+project_id).attr('status', 1);
          }
        }
      });
    });
    $('a').click(function () {
      var project_id = $(this).attr("id");

      $.ajax({
        url: "project-action.php",
        method: "post",
        data: { 'project_id': project_id, 'action': 'delete' },
        dataType: "html",
        success: function(strMessage){
          $("#"+"delete"+project_id).html(strMessage);
        }
      });
    });
  });

</script>












