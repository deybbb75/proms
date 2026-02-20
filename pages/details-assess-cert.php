<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['sub_prog_id'])){
    $_SESSION['proms']['assess_cert_id'] = decrypt_data($_POST['sub_prog_id']);
}

$id = $_SESSION['proms']['assess_cert_id'];
$program = $db->queryUniqueObject('SELECT * FROM tbl_assess_cert WHERE sub_prog_id = :sub_prog_id', ['sub_prog_id' => $id]);
if ($program) {
    $sub_prog_id    = encrypt_data($program->sub_prog_id);
    $title          = e($program->title);
    $description    = e($program->description);
    $main_fee       = e(number_format($program->main_fee, 2, '.', ','));
    $sub_fee        = e(number_format($program->sub_fee, 2, '.', ','));
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
?>

<style>
#calendar a {
    color: #000 !important;
}
.calendar-section{
    width: 80%;
    margin-inline: auto;
}

.fc-day-today {
  background-color: none !important;
}

.fc-day-disabled-custom {
  background-color: #e2e2e2 !important;
  opacity: 0.6;
  cursor: not-allowed;
  pointer-events: none; /* THIS makes it unclickable */
}

.fc-day-selected {
  background-color: var(--secondary-color) !important;
}

.fc-day-selected .fc-daygrid-day-number {
  color: white;
  font-weight: bold;
}

.modal-title {
    color: #fff !important;
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
    <section id="program-details" class="program-details section" style="padding-top: 40px;">

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
                        <span>Assessment Fee:</span>
                    </div>
                    <div class="price-display">
                        <span class="current-price">₱<?= $main_fee ?? '' ?></span>
                    </div>
                    <div class="enrollment-count">
                        <span>Processing Fee:</span>
                    </div>
                    <div class="price-display">
                        <span class="current-price">₱<?= $sub_fee ?? '' ?></span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="action-buttons">
                        <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Apply Now</button>
                        <button class="btn-secondary" onclick="window.location='program-list.php'">Go Back</button>
                    </div>
                </div>

            </div><!-- End Enrollment Card -->

            </div>

        </div>

        </div>

    </section><!-- /Program Details Section -->

    <div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="controller/ctr-system-user.php" method="POST" id="form_validation">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Select Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <div class="schedule-section">
                            <div class="calendar-section">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_changes" onclick="<?= $redirect ?>">Submit</button>
                    </div>
                    <input type="hidden" id="delete_id" value="">
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</main>

<script>

let calendar; // keep it outside so it doesn't re-create every time

const modalEl = document.getElementById('primary-header-modal');

modalEl.addEventListener('shown.bs.modal', function () {
  if (calendar) {
    calendar.updateSize();
    return;
  }

  const calendarEl = document.getElementById('calendar');

  const today = new Date();
  today.setHours(0, 0, 0, 0);

  const blockedUntil = new Date(today);
  blockedUntil.setDate(today.getDate() + 5);

  let selectedDayEl = null;

  calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    showNonCurrentDates: false,
    fixedWeekCount: false,

    dateClick(info) {
      const clickedDate = new Date(info.date);
      clickedDate.setHours(0, 0, 0, 0);

      if (clickedDate < blockedUntil) return;

      if (selectedDayEl) {
        selectedDayEl.classList.remove('fc-day-selected');
      }

      info.dayEl.classList.add('fc-day-selected');
      selectedDayEl = info.dayEl;

      console.log('Clicked date:', info.dateStr);
    },

    dayCellDidMount(info) {
      const cellDate = new Date(info.date);
      cellDate.setHours(0, 0, 0, 0);

      if (cellDate < blockedUntil) {
        info.el.classList.add('fc-day-disabled-custom');
      }
    }
  });

  calendar.render();
});


function SubmitForm(){
    Swal.fire({
        title: 'Are you sure you want to apply?',
        text: 'You won’t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, proceed',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Successfully Applied!',
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