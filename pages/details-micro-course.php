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
                <h1>CERTIFICATE IN RESTAURANT AND BAR OPERATIONS</h1>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">
                        <div class="overview-section">
                            <p>The Certificate in Restaurant and Bar Services is an intensive, career-focused program designed to develop essential professional competencies for the hospitality, food and beverage service industry in partnership with The Bistro Group, a leading international hospitality casual dining brand with homegrown concepts in the restaurant industry. The curriculum offers in-depth training in key areas of food and beverage safety and sanitation, restaurant and bar management and service excellence – equipping students with the essential competencies to adapt in the dynamic and continuously evolving landscape of the hospitality industry.</p>
                            <p>Students will engage in a blended learning approach, combining asynchronous online lectures and self-paced learning materials with face to-face practical assessments in a simulated hospitality setting. All course materials and activities are delivered through the institution’s official myLPU Learning Management System (LMS), ensuring accessibility, flexibility, and guided support throughout the learning process.</p>
                            <p>Student performance is assessed through a variety of methods, including online quizzes, case analyses, online examination and practical performance assessments.</p>
                            <p>As a stackable credential, this program may serve as a pathway to the Associate and/or Bachelor of Science in International Hospitality Management Specialized in Hotel and Restaurant Administration, with completed modules eligible for academic credit in accordance with institutional policies.</p>
                        </div>

                        <div class="details-section">
                            <h3>Course Title</h3>
                            <p>Restaurant and Bar Operations</p>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i><b>Course 1: </b>Risk Management as Applied to Safety, Security and Sanitation</li>
                                <li><i class="bi bi-dash"></i><b>Course 2: </b>Fundamentals in Food and Beverage Service Operations</li>
                                <li><i class="bi bi-dash"></i><b>Course 3: </b>Bar and Beverage Management</li>
                            <ul class="details-list">
                        </div>

                        <div class="details-section">
                            <h3>Duration</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>19 days; 152 hours</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Credit Units</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>9 units</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Developer</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>Dr. Kristine M. Manlapaz</li>
                                <li><i class="bi bi-dash"></i><b>Email:</b> kmmanlapaz@lpubatangas.edu.ph</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Course Objective</h3>
                            <p>At the end of the course, the learners are expected to demonstrate industry standard competencies in food and beverage and bar service operations by applying knowledge, technical skills and professional work values in accordance with the national certification standards, ensuring readiness for employment in hospitality establishments.</p>
                        </div>

                        <div class="details-section">
                            <h3>Course Policies</h3>
                            <ul class="details-list">
                                <li><span class="list-number">1.</span>Student shall abide by the rules and procedures set by the university</li>
                                <li><span class="list-number">2.</span>For cohort-based program, students are required to attend at least 80% of synchronous sessions.</li>
                                <li><span class="list-number">3.</span>Posting or sharing negative comments, posts, messages, photos and any inappropriate material in the LMS is strictly prohibited.</li>
                                <li><span class="list-number">4.</span>Students are expected to uphold respectful communication in all learning environments. </li>
                                <li><span class="list-number">5.</span>Honesty and integrity are essential components of the program. Scholastic dishonesty (cheating in any form) is subject to sanctions stipulated in the Student Code</li>
                            </ul>
                        </div>
                    </div><!-- End Overview Tab -->

                </div>
            </div><!-- End Course Navigation Tabs -->

            </div>

            <div class="col-lg-4">

            <!-- Enrollment Card -->
            <div class="enrollment-card" data-aos="fade-up" data-aos-delay="200">

                <div class="card-header">
                    <div class="enrollment-count">
                        <span>Tuition Fee:</span>
                    </div>
                    <div class="price-display">
                        <span class="current-price">₱10,000.00</span>
                    </div>
                    <div class="enrollment-count">
                        <span>Down Payment:</span>
                    </div>
                    <div class="price-display">
                        <span class="current-price">₱5,000.00</span>
                    </div>
                </div>

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