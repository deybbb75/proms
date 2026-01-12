<?php
include 'header.php';
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Program Details</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Program Details Section -->
    <section id="program-details" class="program-details section" style="padding-top: 40px;">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-lg-8">

            <!-- Course Banner -->
            <div class="course-banner" data-aos="fade-up" data-aos-delay="200">
                <div class="banner-content">
                <div class="banner-image">
                    <img src="assets/img/education/courses-8.webp" alt="Course Preview" class="img-fluid">
                </div>
                <h1>Full Stack JavaScript Mastery</h1>
                <div class="course-badge">
                    <span class="category">Web Development</span>
                    <span class="level">Advanced</span>
                </div>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                <!-- Overview Tab -->
                <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">

                    <div class="overview-section">
                    <h3>Course Description</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    </div>

                    <div class="skills-grid">
                    <h3>Skills You'll Gain</h3>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="skill-item">
                            <div class="skill-icon">
                            <i class="bi bi-code-slash"></i>
                            </div>
                            <div class="skill-content">
                            <h5>Frontend Development</h5>
                            <p>React, JavaScript ES6+, HTML5 &amp; CSS3</p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="skill-item">
                            <div class="skill-icon">
                            <i class="bi bi-server"></i>
                            </div>
                            <div class="skill-content">
                            <h5>Backend Development</h5>
                            <p>Node.js, Express.js, RESTful APIs</p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="skill-item">
                            <div class="skill-icon">
                            <i class="bi bi-database"></i>
                            </div>
                            <div class="skill-content">
                            <h5>Database Management</h5>
                            <p>MongoDB, Mongoose, Data Modeling</p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="skill-item">
                            <div class="skill-icon">
                            <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="skill-content">
                            <h5>Security &amp; Testing</h5>
                            <p>Authentication, JWT, Unit Testing</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="requirements-section">
                    <h3>Requirements</h3>
                    <ul class="requirements-list">
                        <li><i class="bi bi-check2"></i>Basic understanding of HTML and CSS</li>
                        <li><i class="bi bi-check2"></i>Familiarity with JavaScript fundamentals</li>
                        <li><i class="bi bi-check2"></i>Computer with internet connection</li>
                        <li><i class="bi bi-check2"></i>Text editor or IDE installed</li>
                    </ul>
                    </div>

                </div><!-- End Overview Tab -->

                <!-- Curriculum Tab -->
                <div class="tab-pane fade" id="program-detailscurriculum" role="tabpanel">

                    <div class="curriculum-overview">
                    <div class="curriculum-stats">
                        <div class="stat">
                        <i class="bi bi-collection-play"></i>
                        <span>12 Sections</span>
                        </div>
                        <div class="stat">
                        <i class="bi bi-play-circle"></i>
                        <span>89 Lectures</span>
                        </div>
                        <div class="stat">
                        <i class="bi bi-clock"></i>
                        <span>45h 32m</span>
                        </div>
                    </div>
                    </div>

                    <div class="accordion" id="curriculumAccordion">

                    <div class="accordion-item curriculum-module">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#module1">
                            <div class="module-info">
                            <span class="module-title">JavaScript Fundamentals &amp; ES6+</span>
                            <span class="module-meta">8 lessons • 4h 15m</span>
                            </div>
                        </button>
                        </h2>
                        <div id="module1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                        <div class="accordion-body">
                            <div class="lessons-list">
                            <div class="lesson">
                                <i class="bi bi-play-circle"></i>
                                <span class="lesson-title">Variables, Functions and Scope</span>
                                <span class="lesson-time">28 min</span>
                            </div>
                            <div class="lesson">
                                <i class="bi bi-play-circle"></i>
                                <span class="lesson-title">Arrow Functions and Destructuring</span>
                                <span class="lesson-time">35 min</span>
                            </div>
                            <div class="lesson">
                                <i class="bi bi-file-earmark-text"></i>
                                <span class="lesson-title">Promises and Async/Await</span>
                                <span class="lesson-time">42 min</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="accordion-item curriculum-module">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module2">
                            <div class="module-info">
                            <span class="module-title">React Development Deep Dive</span>
                            <span class="module-meta">12 lessons • 7h 45m</span>
                            </div>
                        </button>
                        </h2>
                        <div id="module2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                        <div class="accordion-body">
                            <div class="lessons-list">
                            <div class="lesson">
                                <i class="bi bi-play-circle"></i>
                                <span class="lesson-title">Components and JSX Syntax</span>
                                <span class="lesson-time">32 min</span>
                            </div>
                            <div class="lesson">
                                <i class="bi bi-play-circle"></i>
                                <span class="lesson-title">State Management with Hooks</span>
                                <span class="lesson-time">48 min</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="accordion-item curriculum-module">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module3">
                            <div class="module-info">
                            <span class="module-title">Node.js &amp; Server Development</span>
                            <span class="module-meta">15 lessons • 8h 20m</span>
                            </div>
                        </button>
                        </h2>
                        <div id="module3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                        <div class="accordion-body">
                            <div class="lessons-list">
                            <div class="lesson">
                                <i class="bi bi-play-circle"></i>
                                <span class="lesson-title">Express.js Server Setup</span>
                                <span class="lesson-time">25 min</span>
                            </div>
                            <div class="lesson">
                                <i class="bi bi-file-earmark-text"></i>
                                <span class="lesson-title">Building RESTful APIs</span>
                                <span class="lesson-time">55 min</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    </div>

                </div><!-- End Curriculum Tab -->

                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="program-detailsreviews" role="tabpanel">

                    <div class="reviews-summary">
                    <div class="rating-overview">
                        <div class="overall-rating">
                        <div class="rating-number">4.8</div>
                        <div class="rating-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <div class="rating-text">1,247 reviews</div>
                        </div>
                    </div>
                    </div>

                    <div class="reviews-list">
                    <div class="review-item">
                        <div class="reviewer-info">
                        <img src="assets/img/person/person-f-12.webp" alt="Reviewer" class="reviewer-avatar">
                        <div class="reviewer-details">
                            <h6>Jessica Chen</h6>
                            <div class="review-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                        <span class="review-date">2 weeks ago</span>
                        </div>
                        <p class="review-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. The instructor explains complex concepts very clearly.</p>
                    </div>

                    <div class="review-item">
                        <div class="reviewer-info">
                        <img src="assets/img/person/person-m-5.webp" alt="Reviewer" class="reviewer-avatar">
                        <div class="reviewer-details">
                            <h6>David Thompson</h6>
                            <div class="review-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            </div>
                        </div>
                        <span class="review-date">1 month ago</span>
                        </div>
                        <p class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Great practical examples and real-world projects that helped me understand the concepts better.</p>
                    </div>

                    </div>

                </div><!-- End Reviews Tab -->

                </div>
            </div><!-- End Course Navigation Tabs -->

            </div>

            <div class="col-lg-4">

            <!-- Enrollment Card -->
            <div class="enrollment-card" data-aos="fade-up" data-aos-delay="200">

                <div class="card-header">
                <div class="enrollment-count">
                    <span>Tuition:</span>
                </div>
                <div class="price-display">
                    <span class="current-price">₱10,000.00</span>
                </div>
                
                </div>

                <div class="card-body">
                <div class="course-highlights">
                    <div class="highlight-item">
                    <i class="bi bi-trophy"></i>
                    <span>Certificate included</span>
                    </div>
                    <div class="highlight-item">
                    <i class="bi bi-clock-history"></i>
                    <span>45 hours content</span>
                    </div>
                    <div class="highlight-item">
                    <i class="bi bi-download"></i>
                    <span>Downloadable resources</span>
                    </div>
                    <div class="highlight-item">
                    <i class="bi bi-infinity"></i>
                    <span>Lifetime access</span>
                    </div>
                    <div class="highlight-item">
                    <i class="bi bi-phone"></i>
                    <span>Mobile access</span>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-primary">Enroll Now</button>
                    <button class="btn-secondary">Go Back</button>
                </div>
                </div>

            </div><!-- End Enrollment Card -->

            </div>

        </div>

        </div>

    </section><!-- /Program Details Section -->

</main>
<?php
include 'footer.php';
?>