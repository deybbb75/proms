<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

$id = 1;
$program = $db->queryUniqueObject('SELECT * FROM tbl_short_term WHERE st_id = :st_id', ['st_id' => $id]);
if ($program) {
    $st_id          = encrypt_data($program->st_id);
    $prog_title     = e($program->prog_title);
    $training_title = e($program->training_title);
    $description    = e($program->description);
    $venue          = e($program->venue);
    $objective      = json_decode($program->objective, true);
    $outline        = json_decode($program->outline, true);
    $status         = e($program->status);
    $image          = $program->img;
    $image_data     = base64_encode($image);
    $image_type     = $program->img_type;
    $image_src      = "data:{$image_type};base64,{$image_data}";
}
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
                    <img src="<?= $image_src ?? '' ?>" alt="Course Preview" class="img-fluid">
                </div>
                <h1><?= strtoupper($prog_title) ?? '' ?></h1>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">
                        <div class="details-section">
                            <h3>Training/Course Title</h3>
                            <p><?= $training_title ?? '' ?></p>
                        </div>

                        <div class="details-section">
                            <h3>Training Description</h3>
                            <p><?= $description ?? '' ?></p>
                        </div>

                        <div class="details-section">
                            <h3>Training Venue</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-dash"></i><?= $venue ?? '' ?></li>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Training Objectives</h3>
                            <ul class="details-list">
                                <?php
                                foreach ($objective as $item) {
                                ?>
                                <li>
                                    <i class="bi bi-dash"></i>
                                    <div style="white-space: pre-line;"><?= e($item) ?></div>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="details-section">
                            <h3>Content Outline</h3>
                            <ul class="details-list">
                                <?php
                                    for ($i = 0; $i < count($outline); $i++) {
                                ?>
                                <li>
                                    <span class="list-number"><?= intToRoman($i + 1) ?>.</span>
                                    <div style="white-space: pre-line;"><?= e($outline[$i]) ?? '' ?></div>
                                </li>
                                <?php
                                    }
                                ?>
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