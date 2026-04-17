<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['sub_prog_id'])){
    $_SESSION['proms']['assess_cert_id'] = decrypt_data($_POST['sub_prog_id']);
}

if(!isset($_SESSION['proms']['assess_cert_id'])){
    safe_redirect('../program-list.php');
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
    $button_name = "Apply Now";
}

$events = [];

$schedule = $db->query('SELECT * FROM tbl_schedule WHERE sub_prog_id = :sub_prog_id', ['sub_prog_id' => $id]);
while ($line = $db->fetchNextObject($schedule)) {
    $events[] = ["date" => $line->sched_date, "slots" => $line->slot_count];
}

// Convert PHP array to JSON for JS
$js_events = json_encode(array_map(function($event) {
    return [
        "title" => "Available Slots: " . $event['slots'],
        "start" => $event['date'],
        "color" => "#356fbf"
    ];
}, $events));
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

.fc-daygrid-event {
    white-space: normal !important;
}

.fc-daygrid-event .fc-event-title {
    white-space: normal !important;
    text-align: center;
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
                                <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal" <?= $button_status ?>><?= $button_name ?></button>
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
                <form action="controller/ctr-reserve.php" method="POST" id="reserve-form">
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

                    <input type="hidden" id="date_scheduled" name='date_scheduled' value="">
                    <input type="hidden" name='sub_prog_id' value="<?= encrypt_data($id) ?>">
                    
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</main>

<script>

let calendar;
let selectedDate = null;
let selectedDayEl = null;

const dateField = document.getElementById('date_scheduled');
const modalEl = document.getElementById('primary-header-modal');

modalEl.addEventListener('shown.bs.modal', function () {

    if (selectedDayEl) {
        selectedDayEl.classList.remove('fc-day-selected');
        selectedDayEl = null;
    }

    if (calendar) {
        calendar.updateSize();
        return;
    }

    const calendarEl = document.getElementById('calendar');

    const today = new Date();
    today.setHours(0,0,0,0);

    function getBlockedUntilDate(startDate, days) {
        const d = new Date(startDate);
        let added = 0;

        while (added <= days) {
            d.setDate(d.getDate() + 1);

            const day = d.getDay();
            const isWeekend = day === 0 || day === 6;

            if (!isWeekend) {
                added++;
            }
        }

        return d;
    }

    const blockedUntil = getBlockedUntilDate(today, 15);

    function isDisabledDate(date){
        const d = new Date(date);
        d.setHours(0,0,0,0);

        const day = d.getDay();
        const isWeekend = day === 0 || day === 6;

        return d < blockedUntil || isWeekend;
    }

    calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',
        showNonCurrentDates: false,
        fixedWeekCount: false,

        events: <?= $js_events; ?>,

        dateClick(info){

            if (isDisabledDate(info.date)) return;

            if (selectedDayEl) {
                selectedDayEl.classList.remove('fc-day-selected');
            }

            info.dayEl.classList.add('fc-day-selected');
            selectedDayEl = info.dayEl;

            selectedDate = info.dateStr;
            dateField.value = selectedDate;

            console.log("Selected date:", selectedDate);
        },

        dayCellClassNames(info){

            if (isDisabledDate(info.date)) {
                return ['fc-day-disabled-custom'];
            }

            return [];
        },

        datesSet(){

            selectedDate = null;
            dateField.value = '';

            if (selectedDayEl){
                selectedDayEl.classList.remove('fc-day-selected');
                selectedDayEl = null;
            }
        }

    });

    calendar.render();
});

// Reset selection when modal is closed
modalEl.addEventListener('hidden.bs.modal', function () {
    if (selectedDayEl) {
        selectedDayEl.classList.remove('fc-day-selected');
        selectedDayEl = null;
    }
    selectedDate = null;
    dateField.value = '';
});

// Example: get the selected date elsewhere
function getSelectedDate() {
  if (selectedDate) {
    dateField.value = selectedDate;
    console.log("You selected: " + selectedDate);
    return true;
  } else {
    Swal.fire({
        title: "No Date Selected",
        text: "Please select a date first.",
        icon: "error",
        showConfirmButton: false,
        timer: 1500
    });
  }
}

function SubmitForm(){
    if(getSelectedDate()){
        Swal.fire({
            title: 'Are you sure you want to apply?',
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
}

</script>
<?php
include '../footer.php';
?>