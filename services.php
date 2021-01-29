<?php include 'header.php'?>

<main>
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Services</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Services</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    $sql = "SELECT * FROM our_services WHERE status=1";
    $result = $conn->query($sql);

    ?>
    <div class="services-area1 section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 class="">Our Services</h2>
                        </div>
                        <span class="back-text">Services</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service-cap mb-30">
                        <div class="service-img">
                            <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                        </div>
                        <div class="service-cap">
                            <h4><a href="services_details.php?service_id=<?php echo $row["id"] ?>">
                                    <?php echo $row["title"] ?>
                                </a></h4>
                            <a href="services_details.php?service_id=<?php echo $row["id"] ?>" class="more-btn">Read More <i class="ti-plus"></i></a>
                        </div>
                        <div class="service-icon">
                            <img src="assets/img/icon/services_icon1.png" alt="">
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'?>


