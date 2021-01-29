<?php include 'header.php'?>

<main>
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Service Details</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Service Details</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $service_id = "";
        if(isset($_GET["service_id"])){
            $service_id = $_GET["service_id"];
        }
        $sql = "SELECT * FROM our_services WHERE id=$service_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <div class="services-details-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="single-services section-padding2">
                        <div class="row">
                            <div class=" col-md-8 details-img mb-40">
                                <img src="admin/<?php echo $row["image"] ?>" alt="">
                            </div>
                        </div>
                        <div class="details-caption">
                            <h1>
                                <?php echo $row["title"] ?> 
                            </h1>
                            <h2 style="margin-top: 10px;"><?php echo $row["detail"] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Details End -->
</main>

<?php include 'footer.php'?>

