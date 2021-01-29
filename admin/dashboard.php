
  <?php include 'navbar.php' ?>
  <?php include 'sidebar.php' ?>

  <?php
      
      $sql_service = "SELECT COUNT(id) as services FROM our_services;";
      $result_service = $conn->query($sql_service);
      $row_service = $result_service->fetch_assoc();

      $sql_project = "SELECT COUNT(id) as projects FROM our_projects;";
      $result_project = $conn->query($sql_project);
      $row_project = $result_project->fetch_assoc();

      $sql_team = "SELECT COUNT(id) as team FROM our_team;";
      $result_team = $conn->query($sql_team);
      $row_team = $result_team->fetch_assoc();

      $sql_blog = "SELECT COUNT(id) as blogs FROM blogs;";
      $result_blog = $conn->query($sql_blog);
      $row_blog = $result_blog->fetch_assoc();

      $sql_user = "SELECT COUNT(id) as users FROM user;";
      $result_user = $conn->query($sql_user);
      $row_user = $result_user->fetch_assoc();

      $sql_feedback = "SELECT COUNT(id) as feedbacks FROM testimonial;";
      $result_feedback = $conn->query($sql_feedback);
      $row_feedback = $result_feedback->fetch_assoc();

  ?>
  


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          
        </div>
      </div>
    </div>
 
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $row_service["services"]; ?></h3>

                <p>Our Services</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="services.php" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $row_project["projects"]; ?></h3>

                <p>Our Projects</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="projects.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $row_team["team"]; ?></h3>
                <p>Our Team</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="our_team.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $row_blog["blogs"]; ?></h3>
                <p>Blogs</p>
              </div>
              <div class="icon">
                <i class="fas fa-blog"></i>
              </div>
              <a href="blogs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $row_user["users"]; ?></h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="Users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $row_feedback["feedbacks"]; ?></h3>

                <p>Feedbacks</p>
              </div>
              <div class="icon">
                <i class="far fa-comment-alt"></i>
              </div>
              <a href="testimonial.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        
      </div>
    </section>
  </div>

  

<?php include 'footer.php'?>
