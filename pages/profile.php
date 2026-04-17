<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

$student = $db->queryUniqueObject("SELECT * FROM tbl_student WHERE student_id = :student_id", ['student_id' => $_SESSION['proms']['student_id']]);
if ($student) {
    $fname = e($student->fname);
    $mname = e($student->mname);
    $lname = e($student->lname);
    $email = e($student->email);
    $mobile_no = e($student->mobile_no);
    $birthday = e($student->birthday);
    $fb_link = e($student->fb_link);
}
?>

<main class="main">

    <!-- Page Title -->
    <!-- <div class="page-title" data-aos="fade">
        <div class="container">
            <h1>Profile</h1>
        </div>
    </div> -->
    <!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Enroll Section -->
                <section id="enroll" class="profile section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="profile-form-wrapper">

                                <div class="profile-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                                    <h2>Profile Information</h2>
                                    <p>Update your personal details and account information.</p>
                                </div>

                                <form id="form_validation" action="controller/ctr-profile.php" method="POST" class="profile-form" data-aos="fade-up" data-aos-delay="300">

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="firstName" class="form-label required">First Name</label>
                                                <input type="text" id="firstName" name="fname" class="form-control" placeholder="First Name" value="<?= $fname ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middleName" class="form-label">Middle Name</label>
                                                <input type="text" id="middleName" name="mname" class="form-control" placeholder="Middle Name (Optional)" value="<?= $mname ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lastName" class="form-label required">Last Name</label>
                                                <input type="text" id="lastName" name="lname" class="form-control" placeholder="Last Name" value="<?= $lname ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" id="email" class="form-control" placeholder="Email Address" value="<?= $email ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile_no" class="form-label required">Mobile Number</label>
                                                <input type="tel" id="mobile_no" name="mobile_no" class="form-control" maxlength="11" placeholder="Mobile Number" value="<?= $mobile_no ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="birthday" class="form-label required">Birthday</label>
                                                <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Birthday" value="<?= $birthday ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fb_link" class="form-label required">Facebook Link</label>
                                                <input type="text" id="fb_link" name="fb_link" class="form-control" placeholder="Facebook Link" value="<?= $fb_link ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-profile">
                                                <i class="bi bi-check-circle me-2"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>

                                </form>

                                </div>
                            </div><!-- End Form Column -->

                        </div>

                    </div>

                </section><!-- /Enroll Section -->

            </div>
        </div>
    </div>

</main>

<script>
    const birthdayInput = document.getElementById("birthday");

    const today = new Date();
    const maxDate = new Date(
        today.getFullYear() - 17,
        today.getMonth(),
        today.getDate()
    );

    // format to YYYY-MM-DD
    const formattedDate = maxDate.toISOString().split("T")[0];

    birthdayInput.max = formattedDate;
</script>

<?php
include '../footer.php';
?>

<script>
    $(function () {
        $("#form_validation").valid();
    });
</script>

