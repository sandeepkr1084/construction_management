<?php include 'header.php' ?>

<div class="slider-area ">
   <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="hero-cap pt-100">
                  <h2>Single Blog</h2>
                  <nav aria-label="breadcrumb ">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Single Blog</a></li> 
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php 
   $blog_id = 0;
   if(isset($_GET["blog_id"])){
      $blog_id=$_GET["blog_id"];
   }
   echo $blog_id;
   $sql = "SELECT * FROM blogs where id=$blog_id";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc()
?>

<section class="blog_area single-post-area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 posts-list">
            <div class="single-post">
               <div class="row">
                  <div class="col-md-8 feature-img">
                     <img src="admin/<?php echo $row["image"] ?>" alt="" width="100%" height="400px">
                  </div>
               </div>
               <h2><?php echo $row["title"]; ?></h2>

               <div class="blog_details">
                  <?php echo $row["details"]; ?>
                  
               </div>
            </div>
           
         </div>
      </div>
      
      
      
   </div>
   
</section>
<?php include 'footer.php' ?>