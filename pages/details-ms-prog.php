<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['sub_prog_id'])){
    $_SESSION['proms']['ms_prog_id'] = decrypt_data($_POST['sub_prog_id']);
}

$id = $_SESSION['proms']['ms_prog_id'];
$program = $db->queryUniqueObject('SELECT * FROM tbl_ms_prog WHERE sub_prog_id = :sub_prog_id', ['sub_prog_id' => $id]);
if ($program) {
    $sub_prog_id              = encrypt_data($program->sub_prog_id);
    $title              = e($program->title);
    $description        = e($program->description);
    $cert_image         = $program->cert_img;
    $cert_image_data    = base64_encode($cert_image);
    $cert_image_type    = $program->cert_img_type;
    $cert_image_src     = "data:{$cert_image_type};base64,{$cert_image_data}";
    $yt_link            = e($program->yt_link);
    $query              = parse_url($yt_link, PHP_URL_QUERY);
    parse_str($query, $params);
    $vid_id                 = $params['v'] ?? null;
    $certification      = json_decode($program->certification, true);
    $associate_cert     = json_decode($program->associate_cert, true);
    $expert_cert        = json_decode($program->expert_cert, true);
    $status             = e($program->status);
    $image              = $program->img;
    $image_data         = base64_encode($image);
    $image_type         = $program->img_type;
    $image_src          = "data:{$image_type};base64,{$image_data}";
}

if(isset($_SESSION['proms']['student_id'])){
    $redirect = 'SubmitForm()';
}else{
    $redirect = "loginRedirect('../login.php')";
}
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
                    <img src="<?= $image_src ?? '' ?>" alt="Course Preview" class="img-fluid">
                </div>
                <h1><?= strtoupper($title) ?? '' ?></h1>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">
                        <div class="overview-section">
                            <p style="white-space: pre-line;"><?= $description ?? '' ?></p>
                        </div>

                        <img src="<?= $cert_image_src ?? '' ?>" alt="Cert Preview" class="img-fluid mb-5">
                        
                        <div class="details-section">
                            <h3>Learning materials for Microsoft Office Specialist certifications</h3>
                            <h5>The pathway to certification success</h5>
                            <p>Preparing your students for certification is a big responsibility, so let Certiport make your job easier and more effective with specially selected course materials and practice tests.</p>
                            <p>Watch this brief video to see how learning products can work for you.</p>

                            <div class="video-wrapper">
                                <iframe src="https://www.youtube.com/embed/<?= $vid_id ?? '' ?>" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="details-section">
                            <h3>Certify in Microsoft Office</h3>
                            <h5>Microsoft 365 Apps</h5>
                            <p>Microsoft 365 Apps combines familiar Microsoft Office apps with cloud connectivity, collaboration tools, and intelligent services. These 50-minute certifications use Certiport’s Live-in-the-Application (LITA) testing for real-world skill validation. They are continually updated to reflect the latest Microsoft 365 features and workforce needs.</p>
                            <br>
                            <h5 class="mb-4">Microsoft 365 Apps Certifications</h5>
                            <?php
                                for ($i = 0; $i < count($certification); $i++) {
                            ?>
                            <h6><?= intToRoman($i + 1) ?>. <?= e($certification[$i]['title']) ?? '' ?></h6>
                            <ul class="details-list">
                                <?php
                                    for ($j = 0; $j < count($certification[$i]['ctg']); $j++) {
                                ?>
                                <li><i class="bi bi-dash"></i><b><?= e($certification[$i]['ctg'][$j]['title']) ?? '' ?></b></li>
                                <p class="ms-5" style="white-space: pre-line;"><?= e($certification[$i]['ctg'][$j]['desc']) ?? '' ?></p>
                                <?php
                                    }
                                ?>
                            </ul>
                            <?php
                                }
                            ?>
                        </div>

                        <div class="details-section">
                            <h3>Advance with Stackable Certifications</h3>
                            <p>Maximize your Microsoft Office proficiency with MOS Associate or Expert certifications, showcasing advanced skills through stacked credentials.</p>
                            <br>
                            <h5>Earn a Microsoft Office Specialist: Associate (Microsoft 365 Apps) certification</h5>
                            <p>Pass three of the following exams*:</p>

                            <ul class="details-list">
                                <?php
                                foreach ($associate_cert as $item) {
                                ?>
                                <li><i class="bi bi-dash"></i><?= e($item) ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                            <br>
                            <h5>Earn a Microsoft Office Specialist: Expert (Microsoft 365 Apps) certification</h5>
                            <p>Earn your Microsoft Office Specialist: Associate certification (outlined above) plus pass two of the following exams*: </p>

                            <ul class="details-list">
                                <?php
                                foreach ($expert_cert as $item) {
                                ?>
                                <li><i class="bi bi-dash"></i><?= e($item) ?></li>
                                <?php
                                }
                                ?>
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
                        <button class="btn-primary" onclick="<?= $redirect ?>">Reserve Now</button>
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