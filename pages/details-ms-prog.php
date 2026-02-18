<?php
include '../includes/init.php';
include '../header.php';

setActiveLink('index.php#programs');
?>

<style>
.video-wrapper {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; /* 16:9 ratio */
}

.video-wrapper iframe {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  border: 0;
}
</style>

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
                <h1>MICROSOFT OFFICE SPECIALIST PROGRAM</h1>
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

                        <img src="../assets/img/cert.jpg" alt="Course Preview" class="img-fluid mb-5">
                        
                        <div class="details-section">
                            <h3>Learning materials for Microsoft Office Specialist certifications</h3>
                            <h5>The pathway to certification success</h5>
                            <p>Preparing your students for certification is a big responsibility, so let Certiport make your job easier and more effective with specially selected course materials and practice tests.</p>
                            <p>Watch this brief video to see how learning products can work for you.</p>

                            <div class="video-wrapper">
                                <iframe src="https://www.youtube.com/embed/aWP5NkoVKUg" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="details-section">
                            <h3>Certify in Microsoft Office</h3>
                            <h5>Microsoft 365 Apps</h5>
                            <p>Microsoft 365 Apps combines familiar Microsoft Office apps with cloud connectivity, collaboration tools, and intelligent services. These 50-minute certifications use Certiport’s Live-in-the-Application (LITA) testing for real-world skill validation. They are continually updated to reflect the latest Microsoft 365 features and workforce needs.</p>
                            <br>
                            <h5 class="mb-4">Microsoft 365 Apps Certifications</h5>

                            <h6>I. Microsoft Excel</h6>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i><b>Excel Associate</b></li>
                                <p class="ms-5">Builds and validates foundational Microsoft Excel skills, including creating and formatting spreadsheets, using basic formulas and functions, and visualizing data with charts—ideal for individuals starting careers in business, data analytics, human resources, marketing, and other major industries.</p>

                                <li><i class="bi bi-dash"></i><b>Excel Associate</b></li>
                                <p class="ms-5">Builds and validates foundational Microsoft Excel skills, including creating and formatting spreadsheets, using basic formulas and functions, and visualizing data with charts—ideal for individuals starting careers in business, data analytics, human resources, marketing, and other major industries.</p>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Advance with Stackable Certifications</h3>
                            <p>Maximize your Microsoft Office proficiency with MOS Associate or Expert certifications, showcasing advanced skills through stacked credentials.</p>
                            <br>
                            <h5>Earn a Microsoft Office Specialist: Associate (Microsoft 365 Apps) certification</h5>
                            <p>Pass three of the following exams*:</p>

                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>Microsoft Word (Microsoft 365 Apps)</li>
                                <li><i class="bi bi-dash"></i>Microsoft Excel (Microsoft 365 Apps)</li>
                                <li><i class="bi bi-dash"></i>Microsoft PowerPoint (Microsoft 365 Apps)</li>
                                <li><i class="bi bi-dash"></i>Microsoft Outlook (Microsoft 365 Apps) - To be released</li>
                            </ul>
                            <br>
                            <h5>Earn a Microsoft Office Specialist: Expert (Microsoft 365 Apps) certification</h5>
                            <p>Earn your Microsoft Office Specialist: Associate certification (outlined above) plus pass two of the following exams*: </p>

                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i>Microsoft Word (Microsoft 365 Apps)</li>
                                <li><i class="bi bi-dash"></i>Microsoft Excel (Microsoft 365 Apps)</li>
                                <li><i class="bi bi-dash"></i>Microsoft PowerPoint (Microsoft 365 Apps)</li>
                                <li><i class="bi bi-dash"></i>Microsoft Outlook (Microsoft 365 Apps) - To be released</li>
                            </ul>

                            <p style="font-style: italic;">*All exams must be in different programs and at least one exam must be a Microsoft 365 Apps exam.</p>
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