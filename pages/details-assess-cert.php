<?php
include '../includes/init.php';
include '../header.php';

setActiveLink('index.php#programs');
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
  background: none !important;
}

.fc-day-disabled-custom {
  background-color: #f9fafb;
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
                    <img src="../assets/img/tesda/1.jpg" alt="Course Preview" class="img-fluid">
                </div>
                <h1>Barista NC II</h1>
                </div>
            </div><!-- End Course Banner -->

            <!-- Course Navigation Tabs -->
            <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="program-detailsCourseTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="program-detailsoverview" role="tabpanel">

                        <div class="overview-section">
                            <p>Lyceum of the Philippines University-Batangas is an accredited TESDA Assessment Center for 21 qualifications. This will be done at one day assessment only.</p>
                            <p>Candidates must have training in the said assessment or an industry worker. Minimum 10 candidates / applicants per assessment. </p>
                        </div>

                        <div class="details-section">
                            <h3>Requirements</h3>
                            <ul class="details-list">
                                <li><i class="bi bi-check2"></i>Application Form</li>
                                <li><i class="bi bi-check2"></i>Passport size picture - 2 pcs (name at the bottom, white background & with collar attire)</li>
                                <li><i class="bi bi-check2"></i>Assessment and Processing Fee – will be done after submission of hard copy of the requirements listed above  </li>
                                <li><i class="bi bi-check2"></i>TESDA Practicing COVID-19 Preventive Measure Certificate (kindly refer to TESDA website)</li>
                                <p style="padding-left: 50px; margin-bottom: 10px;"><b>Note:</b></p>
                                <ul style="padding-left: 50px;">
                                    <li><i class="bi bi-dash"></i>Please print the certificate on A4-size paper in landscape orientation</li>
                                    <li><i class="bi bi-dash"></i>Please ensure that your full legal name is indicated on your certificate.</li>
                                </ul>
                                <li><i class="bi bi-check2"></i>Training Certificate or Certificate of Employment</li>
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
                        <span class="current-price">₱10,000.00</span>
                    </div>
                    <div class="enrollment-count">
                        <span>Processing Fee:</span>
                    </div>
                    <div class="price-display">
                        <span class="current-price">₱5,000.00</span>
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
                        <button type="button" class="btn btn-primary" id="save_changes" onclick="SubmitForm()">Submit</button>
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