<?php ob_start(); ?>
<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  $url_array =  explode('?', $url) ;
  $url = $url_array[0];
  if($currect_page == $url){
      echo 'active'; 
  } 
}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="../users" class="brand-link">
    <img src="dist/img/loder-logo.png" alt="Construction Logo" height="100%" width="100%" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><h3><b>Construction</b></h3></span>
  </a>

  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <a href="profile.php" class="d-block">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </a>
      </div>
      <div class="info">
        <a href="profile.php" class="d-block">
          User name
        </a>
      </div>
    </div>

    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>


    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <li class="nav-item">
        <a href="dashboard.php" class="nav-link <?php active('dashboard.php');?>">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="projects.php" class="nav-link <?php active('projects.php'); active('project-add-edit-delete.php');?>">
          <i class="fas fa-project-diagram nav-icon"></i>
          <p>Our Projects</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="services.php" class="nav-link <?php active('services.php'); active('service-add-edit-delete.php');?>">
          <i class="fab fa-servicestack nav-icon"></i>
          <p>Our Services</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="our_team.php" class="nav-link <?php active('our_team.php'); active('our_team-add-edit-delete.php');?>">
          <i class="fas fa-users nav-icon"></i>
          <p>Our Team</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="blogs.php" class="nav-link <?php active('blogs.php'); active('blog-add-edit-delete.php');?>">
          <i class="nav-icon far fa-image"></i>
          <p>Blogs</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="testimonial.php" class="nav-link <?php active('testimonial.php'); active('testimonial-add-edit-delete.php');?>">
          <i class="nav-icon far fa-comment-alt"></i>
          <p>Testimonial</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="users.php" class="nav-link <?php active('users.php'); active('users-add-edit-delete.php');?>">
          <i class="fas fa-users nav-icon"></i>
          <p>Admin Members</p>
        </a>
      </li>
      
    
    </ul>
    <hr style="background-color: white; width: 100%;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <button type="submit" name="signoff" style="background: none;border: none; color: white;">Sign off</button>
    </form>
  </nav>

  <?php 
      if(isset($_POST["signoff"])){
         session_destroy();
         header( "location: index.php", true, 303);
      }
  ?>

  </div>
</aside>