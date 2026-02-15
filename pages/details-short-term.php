<?php
include '../includes/init.php';
include '../header.php';

setActiveLink('index.php#programs');
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Program Details</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Program Details Section -->
    <section id="program-details" class="program-details section" style="padding-bottom: 30px;">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-lg-8">

            <!-- Course Banner -->
            <div class="course-banner" data-aos="fade-up" data-aos-delay="200">
                <div class="banner-content">
                <div class="banner-image">
                    <img src="../assets/img/tesda/1.jpg" alt="Course Preview" class="img-fluid">
                </div>
                <h1>BASICS OF FOOD AND BEVERAGE SERVICE OPERATIONS</h1>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">
                        <div class="details-section">
                            <h3>Training/Course Title</h3>
                            <p>Restaurant Service Basics / Basics of Food and Beverage Service Operations</p>
                        </div>

                        <div class="details-section">
                            <h3>Training Description</h3>
                            <p>This course focuses on fundamental skills, concept and techniques of Restaurant Service. It covers basic knowledge napkin folding, table setting, restaurant service and room service procedures. Important terminologies will also be discussed.</p>
                        </div>

                        <div class="details-section">
                            <h3>Training Venue</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>LPU SMART Room, LPU LE Café (UG SHL Bldg.)</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Training Objectives</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-check2"></i>Classify F & B service equipment.</li>
                                <li><i class="bi bi-check2"></i>Handle food and beverage wares properly.</li>
                                <li><i class="bi bi-check2"></i>Demonstrate the procedure in taking table reservation</li>
                                <li><i class="bi bi-check2"></i>Demonstrate napkin folding following international standards.</li>
                                <li><i class="bi bi-check2"></i>Demonstrate table setting based on given menu.</li>
                                <li><i class="bi bi-check2"></i>Execute correct sequence of restaurant service.</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Content Online</h3>
                            <ul class="details-list">
                                <li><span class="list-number">I.</span>Familiarization of Food and Beverage Service wares and Equipment</li>
                                <li><span class="list-number">II.</span>Napkin Folding</li>
                                <li><span class="list-number">III.</span>Table Setting</li>
                                <li><span class="list-number">IV.</span>Restaurant Service Sequence</li>
                                <li><span class="list-number">V.</span>Room Service</li>
                                <li><span class="list-number">VI.</span>Customer Service</li>
                            </ul>
                        </div>
                    </div><!-- End Overview Tab -->

                </div>
            </div><!-- End Course Navigation Tabs -->

            </div>

            <div class="col-lg-4">

            <!-- Enrollment Card -->
            <div class="enrollment-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body">
                    <div class="action-buttons">
                        <button class="btn-primary" onclick="SubmitForm()">Reserve Now</button>
                        <button class="btn-secondary" onclick="window.location='program-list.php'">Go Back</button>
                    </div>
                </div>

            </div><!-- End Enrollment Card -->

            </div>

        </div>

        </div>

    </section><!-- /Program Details Section -->
</main>

<script>
function SubmitForm(){
    Swal.fire({
        title: 'Are you sure you want to reserve?',
        text: 'You won’t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, proceed',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Successfully Reserved!',
                text: 'Kindly proceed to the CTEL office for more information.',
                icon: 'success'
            }).then(() => {
                window.location.href = '../index.php';
            });
        }
    });
}

</script>
<?php
include '../footer.php';
?>