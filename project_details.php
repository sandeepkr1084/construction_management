<?php include 'header.php'?>

<main>
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>projects Details</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">projects Details</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $project_id = "";
        if(isset($_GET["project_id"])){
            $project_id = $_GET["project_id"];
        }
        else{
            header("location: project.php");
        }
        $sql = "SELECT * FROM our_projects WHERE id=$project_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <div class="services-details-area">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    
                    <div class="single-services section-padding2">
                        <div class="row">
                            <div class="col-md-8 details-img mb-40">
                                <img src="admin/<?php echo $row["image"] ?>" alt="" height="400px" width="100%">
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

</main>

<?php include 'footer.php'?>
