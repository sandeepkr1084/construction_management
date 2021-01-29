<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>
<?php
$sql = "SELECT * FROM our_services";
$result = $conn->query($sql);
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Our Services</h1>
        </div>
      </div>
    </div>
  </section>


  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Our Services</h3>
        <div class="card-tools">
          <a class="btn btn-success btn-sm" href="service-add-edit-delete.php">
            <i class="nav-icon fas fa-plus"></i> Add Service
          </a>
        </div>
      </div>
      <div class="card-body p-0">

        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Service Name</th>
              <th style="width: 15%">Service Image</th>
              <th>Service Details</th>
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
                <td class="project_progress"><small> <?php echo substr($row["detail"],0, 100) ?>... </small></td>
                <td class="project-state">
                  <span class="badge badge-success" id="<?php echo 'status'.$row["id"] ?>" >
                    <?php echo($row["status"]==1?"active":"inactive") ?> 
                  </span>
                </td>
                <td class="project-actions text-right">
                  <button class="btn btn-info btn-sm" status="<?php echo $row["status"] ?>" id="<?php echo $row["id"] ?>">
                    
                    <?php
                      if($row["status"]==1){ 
                        echo "<i class='fas fa-times'></i> deactivate";
                      }
                      else{ 
                        echo "<i class='fas fa-check'></i> activate";
                      }
                    ?>
                    
                  </button>
                  <a class="btn btn-info btn-sm" href="service-add-edit-delete.php?service_id='<?php echo $row["id"] ?>'">
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
      var service_status = $(this).attr("status");
      var service_id = $(this).attr("id");

      if(service_status == 1){
        var status = 0;
      }
      else{
        var status = 1;
      }
      $.ajax({
        url: "service-action.php",
        method: "post",
        data: { 'service_id': service_id, 'action': 'status', 'status': status },
        dataType: "html",
        success: function(strMessage){
          $("#"+service_id).html(strMessage);
          if(service_status == 1){
            $("#"+"status"+service_id).html("inactive");
            $("#"+service_id).attr('status', 0);
          }
          else{
            $("#"+"status"+service_id).html("active");
            $("#"+service_id).attr('status', 1);
          }
        }
      });

    });
    $('a').click(function () {
      var service_id = $(this).attr("id");

      $.ajax({
        url: "service-action.php",
        method: "post",
        data: { 'service_id': service_id, 'action': 'delete' },
        dataType: "html",
        success: function(strMessage){
          $("#"+"delete"+service_id).html(strMessage);
        }
      });
    });

    

  });

</script>

