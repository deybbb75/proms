<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['sub_prog_id'])){
    $_SESSION['proms']['cert_prog_id'] = decrypt_data($_POST['sub_prog_id']);
}

if(!isset($_SESSION['proms']['cert_prog_id'])){
    safe_redirect('../program-list.php');
}

$id = $_SESSION['proms']['cert_prog_id'];
$program = $db->queryUniqueObject('SELECT * FROM tbl_cert_prog WHERE sub_prog_id = :sub_prog_id', ['sub_prog_id' => $id]);
if ($program) {
    $sub_prog_id          = encrypt_data($program->sub_prog_id);
    $title          = e($program->title);
    $description    = e($program->description);
    $class_details  = e($program->class_details);
    $start_date_1   = e($program->start_date_1);
    $start_date_2   = e($program->start_date_2);
    $schedule       = json_decode($program->schedule, true);
    $venue          = e($program->venue);
    $main_fee       = number_format($program->main_fee, 2, '.', ',');
    $sub_fee        = number_format($program->sub_fee, 2, '.', ',');
    $note           = e($program->note);
    $requirement    = json_decode($program->requirement, true);
    $status         = e($program->status);
    $image          = $program->img;
    $image_data     = base64_encode($image);
    $image_type     = $program->img_type;
    $image_src      = "data:{$image_type};base64,{$image_data}";
}

if(isset($_SESSION['proms']['student_id'])){
    $redirect = 'SubmitForm()';
}else{
    $redirect = "loginRedirect('../login.php')";
}

$has_reservation = $db->hasDuplicate(
    'SELECT student_id, prog_id, sub_prog_id 
    FROM tbl_reservation 
    WHERE student_id = :student_id 
    AND ay_id = :ay_id 
    AND prog_id = :prog_id 
    AND sub_prog_id = :sub_prog_id 
    AND status = "Pending" ', 
    [
        'student_id'        => $_SESSION['proms']['student_id'] ?? 0, 
        'ay_id'             => $_SESSION['proms']['ay_id'],
        'prog_id'           => $_SESSION['proms']['prog_id'], 
        'sub_prog_id'       => $id,
    ]
);

if($has_reservation){
    $button_status = "disabled";
    $button_name = "Existing Reservation";
}else{
    $button_status = "";
    $button_name = "Reserve Now";
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

                            <div class="details-section">
                                <h3>Class Details</h3>
                                <p style="white-space: pre-line;"><?= $class_details ?></p>
                            </div>

                            <div class="details-section">
                                <h3>Start of Classes</h3>
                                <ul class="details-list">
                                    <li><i class="bi bi-dash"></i><b>1st Semester: </b><?= $start_date_1 ?></li>
                                    <li><i class="bi bi-dash"></i><b>2nd Semester: </b><?= $start_date_2 ?></li>
                                </ul>
                            </div>

                            <div class="details-section">
                                <h3>Schedule</h3>
                                <ul class="details-list">
                                    <?php
                                    foreach ($schedule as $item) {
                                    ?>
                                    <li><i class="bi bi-dash"></i><?= e($item['day']) ?>, <?= e(date("h:i A", strtotime($item['start_time']))) ?> - <?= e(date("h:i A", strtotime($item['end_time']))) ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <div class="details-section">
                                <h3>Venue</h3>
                                <ul class="details-list">
                                    <li><i class="bi bi-dash"></i><?= $venue ?></li>
                                </ul>
                            </div>

                            <div class="details-section">
                                <h3>Note</h3>
                                <p style="white-space: pre-line;"><?= $note ?></p>
                            </div>

                            <div class="details-section">
                                <h3>Requirements</h3>
                                <ul class="details-list">
                                    <?php
                                    foreach ($requirement as $item) {
                                    ?>
                                    <li>
                                        <i class="bi bi-check2"></i>
                                        <div style="white-space: pre-line;"><?= e($item) ?></div>
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

                        <div class="card-header">
                            <div class="enrollment-count">
                                <span>Tuition Fee:</span>
                            </div>
                            <div class="price-display">
                                <span class="current-price">₱<?= $main_fee ?? '' ?></span>
                            </div>
                            <div class="enrollment-count">
                                <span>Down Payment:</span>
                            </div>
                            <div class="price-display">
                                <span class="current-price">₱<?= $sub_fee ?? '' ?></span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="action-buttons">
                                <button class="btn-primary" onclick="<?= $redirect ?>" <?= $button_status ?>><?= $button_name ?></button>
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
            $.ajax({
                type: "POST",
                url: "controller/ctr-reserve.php",
                data: {
                    sub_prog_id: '<?= encrypt_data($id) ?>',
                }
            }).done(function(data) {
                Swal.fire({
                    allowOutsideClick: false,
                    padding: '5em 0em',
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                var params = {
                    name: '<?= $_SESSION['proms']['fullname'] ?>',
                    email: '<?= $_SESSION['proms']['email'] ?>',
                    program: '<?= $title ?? '' ?>',
                };

                emailjs.send("service_8au48ns", "template_duzsgyg", params)
                .then(function(response) {
                    console.log("Success:", response);
                    window.location.href = "../index.php";
                }, function(error) {
                    console.error("Error:", error);
                });
            }).fail(function(error) {
                console.error("Failed to fetch data", error);
            });
        }
    });
}

</script>
<?php
include '../footer.php';
?>