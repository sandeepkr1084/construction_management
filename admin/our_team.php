

<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>

<?php
$sql = "SELECT * FROM our_team";
$result = $conn->query($sql);
?>


<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Our Team</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Our Team</h3>

        <div class="card-tools">

          <a class="btn btn-success btn-sm" href="our_team-add-edit-delete.php">
            <i class="nav-icon fas fa-plus"></i> Add Member
          </a>
        </div>
      </div>
      <div class="card-body p-0">

        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Name</th>
              <th style="width: 15%">Image</th>
              <th>Post</th>
              <th>Status</th>
              <th style="width: 30%"> </th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while ($row = $result->fetch_assoc()) {
              ?>
              <tr id="<?php echo 'delete'.$row["id"] ?>">
                <td> <?php echo $row["id"] ?> </td>
                <td> <?php echo $row["first_name"] ?> <?php echo $row["last_name"] ?> </td>
                <td>
                  <img alt="Avatar" class="table-avatar" src="<?php echo $row["image"] ?>" style="border-radius: 2%;">
                </td>
                <td> <?php echo $row["post"] ?> </td>
                <td >
                  <span class="badge badge-success" id="<?php echo 'status'.$row["id"] ?>">
                    <?php echo $row["status"]==1?"active":"inactive" ?>
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
                  <a class="btn btn-info btn-sm" href="our_team-add-edit-delete.php?our_team_id='<?php echo $row["id"] ?>'">
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
      var our_team_status = $(this).attr("status");
      var our_team_id = $(this).attr("id");
      
      if(our_team_status == 1){
        var status = 0;
      }
      else{
        var status = 1;
      }
      $.ajax({
        url: "our_team-action.php",
        method: "post",
        data: { 'our_team_id': our_team_id, 'action': 'status', 'status': status },
        dataType: "html",
        success: function(strMessage){
          $("#"+our_team_id).html(strMessage);
          if(our_team_status == 1){
            $("#"+"status"+our_team_id).html("inactive");
            $("#"+our_team_id).attr('status', 0);
          }
          else{
            $("#"+"status"+our_team_id).html("active");
            $("#"+our_team_id).attr('status', 1);
          }
        }
      });
    });
    $('a').click(function () {
      var our_team_id = $(this).attr("id");

      $.ajax({
        url: "our_team-action.php",
        method: "post",
        data: { 'our_team_id': our_team_id, 'action': 'delete' },
        dataType: "html",
        success: function(strMessage){
          $("#"+"delete"+our_team_id).html(strMessage);
        }
      });
    });

    

  });

</script>

