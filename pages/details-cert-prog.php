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
                <h1>CERTIFICATES IN CULINARY ARTS (CCA)</h1>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">
                        <div class="overview-section">
                            <p>The Certificate in Culinary Arts program aims to provide the students with practical and theoretical knowledge about basic culinary, basic food preparation and food presentation. It also provides the opportunity to apply the theoretical knowledge into practice commonly found in an operational environment. </p>
                            <p>The program covers mise en place, food preparation, storage of food products, food infection and intoxication, hygiene and cleanliness, methods and techniques of cooking, stocks, sauces and soups, eggs, vegetables and farinaceous products, poultry and meat butchery and cooking, product knowledge and occupational health and safety, weight measure as applied to cooking, unit and temperature conversion, proper knife usage skills, basic cutting and butchering, standard kitchen hand tools, operations of equipment in a commercial kitchen and culinary terminology.</p>
                        </div>

                        <div class="details-section">
                            <h3>Class Details</h3>
                            <p>The Center for Technical Education and Lifelong Learning offers short programs like Certificates in Culinary Arts (CCA). The program’s duration is 6 months and with a TESDA Competency Assessment in COOKERY NCII and is 200 hrs. Internship. Enrollment is now ongoing for the 2nd Semester 2025-2026 batch.</p>
                        </div>

                        <div class="details-section">
                            <h3>Start of Classes</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i><b>1st Semester: </b>August 9, 2025</li>
                                <li><i class="bi bi-dash"></i><b>2nd Semester: </b>February 7, 2026</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Schedule</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>Monday, 7:00 - 5:00 PM</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Venue</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>Hot Kitchen, Lower Ground Floor, SHL Building, Main Campus</li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Note</h3>
                            <p>Tuition fee for the program Certificate in Culinary Arts is inclusive of the ingredients, uniform, and assessment in Cookery NC II.</p>
                        </div>

                        <div class="details-section">
                            <h3>Requirements</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-check2"></i>F-138, TOR (if college graduate)</li>
                                <li><i class="bi bi-check2"></i>F-137A</li>
                                <li><i class="bi bi-check2"></i>PSA Authenticated Birth Certificate (Original) </li>
                                <li><i class="bi bi-check2"></i>Marriage Certificate (if married)</li>
                                <li><i class="bi bi-check2"></i>Hepa-B Screening Result </li>
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