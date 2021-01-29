<?php include 'header.php'?>

<main>
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Our projects</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Project</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<section class="project-area  section-padding30">
    <div class="container">
        <div class="project-heading mb-35">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="section-tittle section-tittle3">
                        <div class="front-text">
                            <h2 class="">Our Projects</h2>
                        </div>
                        <span class="back-text">Gellary</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="properties__button">                                          
                        <nav> 
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false"> Show  all </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Intorior</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Recent</a>
                                <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Big building</a>
                                <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Park</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content active" id="nav-tabContent">

                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  
                        <?php 
                        $sql = "SELECT * FROM our_projects WHERE status=1";
                        $result = $conn->query($sql);
                        ?>
                        <div class="project-caption">
                            <div class="row">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.php?project_id=<?php echo $row["id"] ?>" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.php?project_id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php 
                        $sql = "SELECT * FROM our_projects WHERE type='intorior' and status=1";
                        $result = $conn->query($sql);
                        ?>
                        <div class="project-caption">
                            <div class="row">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.php?project_id=<?php echo $row["id"] ?>" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.php?project_id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <?php 
                        $sql = "SELECT * FROM our_projects WHERE status=1 ORDER BY id DESC";
                        $result = $conn->query($sql);
                        ?>
                        <div class="project-caption">
                            <div class="row">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.php?project_id='<?php echo $row["id"] ?>'" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.php?project_id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                        <?php 
                        $sql = "SELECT * FROM our_projects WHERE type='big building' and status=1";
                        $result = $conn->query($sql);
                        ?>
                        <div class="project-caption">
                            <div class="row">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.php?project_id=<?php echo $row["id"] ?>" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.php?project_id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                        <?php 
                        $sql = "SELECT * FROM our_projects WHERE type='park' and status=1";
                        $result = $conn->query($sql);
                        ?>
                        <div class="project-caption">
                            <div class="row">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.php?project_id=<?php echo $row["id"] ?>" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.php?project_id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php include 'footer.php'?>




