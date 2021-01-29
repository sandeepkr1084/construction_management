
<?php include 'header.php'?>
<main>

    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>About us</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Product</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="support-company-area fix pt-10 section-padding30">
        <div class="support-wrapper align-items-end">
            <div class="left-content">
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Who we are</h2>
                    </div>
                    <span class="back-text">About us</span>
                </div>
                <div class="support-caption">
                    <p class="pera-top">Mollit anim laborum duis au dolor in voluptcate velit ess cillum dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit cillu.</p>
                    <p>Mollit anim laborum.Dvcuis aute iruxvfg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur sfwsignjnt occa cupidatat non aute iruxvfg dhjinulpadeserunt mollitemnth incididbnt ut;o5tu layjobore mofllit anim.</p>
                    <a href="about.html" class="btn red-btn2">read more</a>
                </div>
            </div>
            <div class="right-content">
                <div class="right-img">
                    <img src="assets/img/gallery/safe_in.png" alt="">
                </div>
                <div class="support-img-cap text-center">
                    <span>1994</span>
                    <p>Since</p>
                </div>
            </div>
        </div>
    </section>
    
<?php 
$sql = "SELECT * FROM testimonial where status=1";
$result = $conn->query($sql);

?>

    <div class="testimonial-area t-bg testimonial-padding">
        <div class="container ">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle section-tittle6 mb-50">
                        <div class="front-text">
                            <h2 class="">Testimonial</h2>
                        </div>
                        <span class="back-text">Feedback</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 col-lg-11 col-md-10 offset-xl-1">
                    <div class="h1-testimonial-active">

                        <?php while ($row = $result->fetch_assoc()) { ?>

                        <div class="single-testimonial">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"width="86px" height="63px">
                                        <path fill-rule="evenodd"  stroke-width="1px" stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                        d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                    </svg>
                                    <p>
                                        <?php echo $row["feedback"] ?>
                                    </p>
                                </div>
                                <div class="testimonial-founder d-flex align-items-center">
                                    <div class="founder-text">
                                        <span><?php echo $row["given_by"] ?></span>
                                        <p><?php echo $row["post"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
$sql = "SELECT * FROM our_team where status=1";
$result = $conn->query($sql);

?>
    <div class="team-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle section-tittle5 mb-50">
                        <div class="front-text">
                            <h2 class="">Our team</h2>
                        </div>
                        <span class="back-text">exparts</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="admin/<?php echo $row["image"] ?>" alt="" height="300px" width="100%">
                        </div>
                        <div class="team-caption">
                            <span><?php echo $row["post"] ?></span>
                            <h3><?php echo $row["first_name"]." ".$row["last_name"] ?></h3>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'?>

