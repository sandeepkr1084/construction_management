

<?php include 'navbar.php'?>
<?php include 'sidebar.php'?>

<?php
$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blogs</h1>
        </div>
      </div>
    </div>
  </section>


  <section class="content">

    <div class="card card-solid">
      <div class="card-header">
        <div class="card-tools">
          <a class="btn btn-success btn-sm" href="blog-add-edit-delete.php">
            <i class="nav-icon fas fa-plus"></i> Add Blog
          </a>
        </div>
      </div>

      <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 1%">#</th>
            <th style="width: 20%">Blog Name</th>
            <th style="width: 10%">Blog Image</th>
            <th style="width: 8%" class="text-center">Date</th>
            <th style="width: 8%">status</th>
            <th style="width: 30%"> </th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <tr id="<?php echo 'delete'.$row["id"] ?>">
              <td> <?php echo $row["id"] ?> </td>
              <td> <?php echo $row["title"] ?> </td>
              <td>
                <img alt="Avatar" class="table-avatar" src="<?php echo $row["image"] ?>" style="border-radius: 2%;">
              </td>
              <td class="project-state">
                <span class="badge badge-success"> <?php echo $row["created_date"] ?> </span>
              </td>
              <td >
                <span class="badge badge-success" id="<?php echo 'status'.$row["id"] ?>">
                  <?php echo ($row["status"]==1?'active':'inactive') ?> 
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
                <a class="btn btn-info btn-sm" href="blog-add-edit-delete.php?blog_id='<?php echo $row["id"] ?>'">
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
  </section>

</div>


<?php include 'footer.php'?>

<script type="text/javascript">
  $(document).ready(function(){
    $('button').click(function () {
      var blog_status = $(this).attr("status");
      var blog_id = $(this).attr("id");
      if(blog_status == 1){
        var status = 0;
      }
      else{
        var status = 1;
      }
      $.ajax({
        url: "blog-action.php",
        method: "post",
        data: { 'blog_id': blog_id, 'action': 'status', 'status': status },
        dataType: "html",
        success: function(strMessage){
          $("#"+blog_id).html(strMessage);
          if(blog_status == 1){
            $("#"+"status"+blog_id).html("inactive");
            $("#"+blog_id).attr('status', 0);
          }
          else{
            $("#"+"status"+blog_id).html("active");
            $("#"+blog_id).attr('status', 1);
          }
        }
      });
    });

    $('a').click(function () {
      var blog_id = $(this).attr("id");

      $.ajax({
        url: "blog-action.php",
        method: "post",
        data: { 'blog_id': blog_id, 'action': 'delete' },
        dataType: "html",
        success: function(strMessage){
          $("#"+"delete"+blog_id).html(strMessage);
        }
      });
    });

  });

</script>
