<?php
include '../includes/init.php';
include '../head.php';
include '../header.php';
?>

<style>
#calendar a {
    color: #000 !important;
}
.calendar-section{
    margin-top: 40px;
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
  background-color: var(--accent-color) !important;
}

.fc-day-selected .fc-daygrid-day-number {
  color: white;
  font-weight: bold;
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
                    <img src="../assets/img/education/courses-8.webp" alt="Course Preview" class="img-fluid">
                </div>
                <h1>Full Stack JavaScript Mastery</h1>
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

                        <div class="requirements-section">
                            <h3>Requirements</h3>
                            <ul class="requirements-list">
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

                        <div class="schedule-section">
                            <h3>Select schedule</h3>
                            <div class="calendar-section">
                                <div id='calendar'></div>
                            </div>
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
                        <button class="btn-primary" onclick="SubmitForm()">Apply Now</button>
                        <button class="btn-secondary">Go Back</button>
                    </div>
                </div>

            </div><!-- End Enrollment Card -->

            </div>

        </div>

        </div>

    </section><!-- /Program Details Section -->

</main>

<script>

document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar')

  const today = new Date()
  today.setHours(0, 0, 0, 0)

  const blockedUntil = new Date(today)
  blockedUntil.setDate(today.getDate() + 5)

  let selectedDayEl = null

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    showNonCurrentDates: false,
    fixedWeekCount: false,

    dateClick: function (info) {
      const clickedDate = new Date(info.date)
      clickedDate.setHours(0, 0, 0, 0)

      // ❌ block past dates + next 5 days
      if (clickedDate < blockedUntil) {
        return
      }

      // remove previous highlight
      if (selectedDayEl) {
        selectedDayEl.classList.remove('fc-day-selected')
      }

      // highlight new date
      info.dayEl.classList.add('fc-day-selected')
      selectedDayEl = info.dayEl

      console.log('Clicked date:', info.dateStr)
    },

    dayCellDidMount: function (info) {
      const cellDate = new Date(info.date)
      cellDate.setHours(0, 0, 0, 0)

      if (cellDate < blockedUntil) {
        info.el.classList.add('fc-day-disabled-custom')
      }
    }
  })

  calendar.render()
})

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
include '../scripts.php';
?>