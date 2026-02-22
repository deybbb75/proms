<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['sub_prog_id'])){
    $_SESSION['proms']['micro_course_id'] = decrypt_data($_POST['sub_prog_id']);
}

if(!isset($_SESSION['proms']['micro_course_id'])){
    safe_redirect('../program-list.php');
}

$id = $_SESSION['proms']['micro_course_id'];
$program = $db->queryUniqueObject('SELECT * FROM tbl_micro_course WHERE sub_prog_id = :sub_prog_id', ['sub_prog_id' => $id]);
if ($program) {
    $sub_prog_id              = encrypt_data($program->sub_prog_id);
    $title         = e($program->title);
    $description        = e($program->description);
    $course_title       = e($program->course_title);
    $course_1           = e($program->course_1);
    $course_2           = e($program->course_2);
    $course_3           = e($program->course_3);
    $duration           = e($program->duration);
    $credit_unit        = e($program->credit_unit);
    $developer          = e($program->developer);
    $developer_email    = e($program->developer_email);
    $objective          = e($program->objective);
    $policy             = json_decode($program->policy, true);
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
                                <h3>Course Title</h3>
                                <p><?= $course_title ?? '' ?></p>
                                <ul class="details-list">
                                    <li><i class="bi bi-dash"></i><b>Course 1: </b><?= $course_1 ?? '' ?></li>
                                    <li><i class="bi bi-dash"></i><b>Course 2: </b><?= $course_2 ?? '' ?></li>
                                    <li><i class="bi bi-dash"></i><b>Course 3: </b><?= $course_3 ?? '' ?></li>
                                <ul class="details-list">
                            </div>

                            <div class="details-section">
                                <h3>Duration</h3>
                                <ul class="details-list">
                                    <li><i class="bi bi-dash"></i><?= $duration ?? '' ?></li>
                                </ul>
                            </div>

                            <div class="details-section">
                                <h3>Credit Units</h3>
                                <ul class="details-list">
                                    <li><i class="bi bi-dash"></i><?= !empty($credit_unit) ? $credit_unit . ' units' : 'Not Applicable' ?></li>
                                </ul>
                            </div>

                            <div class="details-section">
                                <h3>Developer</h3>
                                <ul class="details-list">
                                    <li><i class="bi bi-dash"></i><?= $developer ?? '' ?></li>
                                    <li><i class="bi bi-dash"></i><b>Email: </b><?= $developer_email ?? '' ?></li>
                                </ul>
                            </div>

                            <div class="details-section">
                                <h3>Course Objective</h3>
                                <p style="white-space: pre-line;"><?= $objective ?? '' ?></p>
                            </div>

                            <div class="details-section">
                                <h3>Course Policies</h3>
                                <ul class="details-list">
                                    <?php
                                        for ($i = 0; $i < count($policy); $i++) {
                                    ?>
                                    <li><span class="list-number"><?= $i + 1 ?>.</span><?= e($policy[$i]) ?></li>
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