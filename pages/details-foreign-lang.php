<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['sub_prog_id'])){
    $_SESSION['proms']['foreign_lang_id'] = decrypt_data($_POST['sub_prog_id']);
}

if(!isset($_SESSION['proms']['foreign_lang_id'])){
    safe_redirect('../program-list.php');
}

$id = $_SESSION['proms']['foreign_lang_id'];
$program = $db->queryUniqueObject('SELECT * FROM tbl_foreign_lang WHERE sub_prog_id = :sub_prog_id', ['sub_prog_id' => $id]);
if ($program) {
    $sub_prog_id          = encrypt_data($program->sub_prog_id);
    $title          = e($program->title);
    $offering       = json_decode($program->offering, true);
    $level          = json_decode($program->level, true);
    $duration       = json_decode($program->duration, true);
    $mode           = json_decode($program->mode, true);
    $note           = json_decode($program->note, true);
    $status         = e($program->status);
    $image          = $program->img;
    $image_data     = base64_encode($image);
    $image_type     = $program->img_type;
    $image_src      = "data:{$image_type};base64,{$image_data}";
}

if(isset($_SESSION['proms']['student_id'])){
    $redirect = 'SubmitForm()';
}else{
    $redirect = "loginRedirect()";
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
                                <div class="details-section">
                                    <h3>Program Offerings</h3>
                                    <ul class="details-list">
                                        <?php
                                        foreach ($offering as $item) {
                                        ?>
                                        <li><i class="bi bi-dash"></i><?= e($item) ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>

                                    <p style="font-style: italic;">*In coordination with the Center for Language and Applied Media</p>
                                </div>

                                <div class="details-section">
                                    <h3>Competency Levels</h3>
                                    <ul class="details-list">
                                        <?php
                                        foreach ($level as $item) {
                                        ?>
                                        <li><i class="bi bi-dash"></i><?= e($item) ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="details-section">
                                    <h3>Program Duration</h3>
                                    <ul class="details-list">
                                        <?php
                                        foreach ($duration as $item) {
                                        ?>
                                        <li><i class="bi bi-dash"></i><?= e($item) ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="details-section">
                                    <h3>Mode of Study</h3>
                                    <ul class="details-list">
                                        <?php
                                        foreach ($mode as $item) {
                                        ?>
                                        <li><i class="bi bi-dash"></i><?= e($item) ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="details-section">
                                    <h3>Note</h3>
                                    <ul class="details-list">
                                        <?php
                                        foreach ($note as $item) {
                                        ?>
                                        <li><i class="bi bi-dash"></i><?= e($item) ?></li>
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
                            <form action="controller/ctr-reserve.php" method="POST" id="reserve-form">
                                <input type="hidden" name="sub_prog_id" value="<?= encrypt_data($id) ?>">
                            </form>
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
            const form = document.getElementById('reserve-form');
            form.submit();
        }
    });
}

</script>
<?php
include '../footer.php';
?>