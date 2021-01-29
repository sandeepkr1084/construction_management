  
<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>

<?php
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>


<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin Members</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Admin Members</h3>

        <div class="card-tools">

          <a class="btn btn-success btn-sm" href="users-add-edit-delete.php">
            <i class="nav-icon fas fa-plus"></i> Add Member
          </a>
        </div>
      </div>
      <div class="card-body p-0">

        <table class="table table-striped projects">
          <thead>
            <tr>
              <th>#</th>
              <th>Email</th>
              <th>Password</th>

              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while ($row = $result->fetch_assoc()) {
              ?>

              <tr id="<?php echo 'delete'.$row["id"]; ?>">
                <td> <?php echo $row["id"]; ?> </td>
                <td> <?php echo $row["email"]; ?> </td>
                <td> <?php echo $row["password"]; ?> </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="users-add-edit-delete.php?user_id='<?php echo $row["id"] ?>'">
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

    $('a').click(function () {
      var user_id = $(this).attr("id");

      $.ajax({
        url: "user-action.php",
        method: "post",
        data: { 'user_id': user_id },
        dataType: "html",
        success: function(strMessage){
          $("#"+"delete"+user_id).html(strMessage);
        }
      });
    });

  });

</script>

