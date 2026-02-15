<?php
include '../includes/init.php';
include '../header.php';

setActiveLink('index.php#programs');
?>

<main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Programs</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Programs 2 Section -->
    <section id="program-list" class="program-list section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12">
                    <div class="programs-grid" data-aos="fade-up" data-aos-delay="200">
                        <div class="row">
                        <div class="col-lg-4 col-md-4 card-padding">
                            <div class="course-card">
                            <div class="course-image">
                                <img src="../assets/img/tesda/1.jpg" alt="Course" class="img-fluid">
                            </div>
                            <div class="course-content">
                                <h3>Barista NC II</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="button-section">
                                    <a href="program-details.php" class="btn-course">View Details</a>
                                </div>
                                
                            </div>
                            </div><!-- End Course Card -->
                        </div>

                        <div class="col-lg-4 col-md-4 card-padding">
                            <div class="course-card">
                            <div class="course-image">
                                <img src="../assets/img/tesda/2.jpg" alt="Course" class="img-fluid">
                            </div>
                            <div class="course-content">
                                <h3>Bartending NC II</h3>
                                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet.</p>
                                <div class="button-section">
                                    <a href="enroll.html" class="btn-course">View Details</a>
                                </div>
                            </div>
                            </div><!-- End Course Card -->
                        </div>

                        <div class="col-lg-4 col-md-4 card-padding">
                            <div class="course-card">
                            <div class="course-image">
                                <img src="../assets/img/tesda/3.jpg" alt="Course" class="img-fluid">
                            </div>
                            <div class="course-content">
                                <h3>Bookkeeping NC II</h3>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas vestibulum tortor.</p>
                                <div class="button-section">
                                    <a href="enroll.html" class="btn-course">View Details</a>
                                </div>
                            </div>
                            </div><!-- End Course Card -->
                        </div>

                        <div class="col-lg-4 col-md-4 card-padding">
                            <div class="course-card">
                            <div class="course-image">
                                <img src="../assets/img/tesda/4.jpg" alt="Course" class="img-fluid">
                            </div>
                            <div class="course-content">
                                <h3>Bread and Pastry Production NC II</h3>
                                <p>Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta nulla facilisi morbi tempus.</p>
                                <div class="button-section">
                                    <a href="enroll.html" class="btn-course">View Details</a>
                                </div>
                            </div>
                            </div><!-- End Course Card -->
                        </div>

                        <div class="col-lg-4 col-md-4 card-padding">
                            <div class="course-card">
                            <div class="course-image">
                                <img src="../assets/img/tesda/5.jpg" alt="Course" class="img-fluid">
                            </div>
                            <div class="course-content">
                                <h3>Commercial Cooking NC III</h3>
                                <p>Sed porttitor lectus nibh vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
                                <div class="button-section">
                                    <a href="enroll.html" class="btn-course">View Details</a>
                                </div>
                            </div>
                            </div><!-- End Course Card -->
                        </div>

                        <div class="col-lg-4 col-md-4 card-padding">
                            <div class="course-card">
                            <div class="course-image">
                                <img src="../assets/img/tesda/6.jpg" alt="Course" class="img-fluid">
                            </div>
                            <div class="course-content">
                                <h3>Computer System Services NC II</h3>
                                <p>Curabitur aliquet quam id dui posuere blandit mauris blandit aliquet elit eget tincidunt nibh pulvinar.</p>
                                <div class="button-section">
                                    <a href="enroll.html" class="btn-course">View Details</a>
                                </div>
                            </div>
                            </div><!-- End Course Card -->
                        </div>

                        </div>
                    </div><!-- End Programs Grid -->

                    <div class="pagination-wrapper" data-aos="fade-up" data-aos-delay="300">
                        <nav aria-label="Programs pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            </li>
                            <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                            <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                            <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                            </li>
                        </ul>
                        </nav>
                    </div><!-- End Pagination -->

                </div>
            </div>

        </div>

    </section>

</main>

<?php
include '../footer.php';
?>