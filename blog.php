<?php include 'header.php'?>

<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap pt-100">
                        <h2> Blog</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#"> Blog</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$sql = "SELECT * FROM blogs where status=1";
$result = $conn->query($sql);

?>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <article class="blog_item">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="admin/<?php echo $row["image"] ?>" alt="" height="400px">
                                    <a class="blog_item_date">
                                        <h3><?php echo $row["created_date"][0].$row["created_date"][1] ?></h3>
                                        <p>
                                            <?php echo $row["created_date"][3].$row["created_date"][4].$row["created_date"][5] ?>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.php?blog_id=<?php echo $row["id"] ?>">
                                <h2><?php echo $row["title"] ?></h2>
                            </a>
                            <?php echo substr($row["details"], 0, 350) ?>...
                        </div>
                    </article>

                    <?php } ?>

                </div>
            </div>
            
        </div>
    </div>
</section>


<?php include 'footer.php'?>

