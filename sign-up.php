<?php
include 'includes/init.php';
include 'head.php';
?>
<main style="background-image: url(assets/img/login-bg.png);background-size: cover; background-position: center;">

    <!-- signup Section -->
    <section id="signup" class="signup section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-8 mx-auto">
                    <div class="signup-form-wrapper">

                        <div class="signup-header text-center mb-1" data-aos="fade-up" data-aos-delay="200">
                            <h2>Create an Account</h2>
                            <p>Please complete the required information to proceed.</p>
                        </div>

                        <form class="signup-form" id="form_validation" action="pages/controller/ctr-sign-up.php" method="POST" data-aos="fade-up" data-aos-delay="300">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label required">First Name</label>
                                        <input type="text" id="firstName" name="fname" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" id="middleName" name="mname" class="form-control" placeholder="Middle Name (Optional)">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label required">Last Name</label>
                                        <input type="text" id="lastName" name="lname" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label required">Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mobile_no" class="form-label required">Mobile Number</label>
                                        <input type="tel" id="mobile_no" name="mobile_no" class="form-control" maxlength="11" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="birthday" class="form-label required">Birthday</label>
                                        <input type="date" id="birthday" name="birthday" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fb_link" class="form-label required">Facebook Link</label>
                                        <input type="text" id="fb_link" name="fb_link" class="form-control" placeholder="Facebook Link">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="create_password" class="form-label required">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="create_password" name="create_password" class="form-control" placeholder="Password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                <div class="form-group">
                                    <div class="agreement-section">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" name="terms">
                                            <label class="form-check-label" for="terms">
                                                I agree to the 
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#data-privacy-modal">Data Privacy Consent</a> 
                                                and 
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#terms-modal">Terms and Conditions</a> 
                                                <span style="color: red;">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-signup" onclick="submitForm()">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have an account? <a href="login.php" class="ms-1" id="login-link"><b>Log in</b></a></p>
                        </div> <!-- end col -->
                    </div>
                </div><!-- End Form Column -->
            </div>
        </div>

    </section><!-- /signup Section -->

</main>

<div id="data-privacy-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">DATA PRIVACY CONSENT</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <p>I hereby declare that by signing:</p>
                <table>
                    <tr>
                        <td width="60px" style="padding-left: 30px; vertical-align: top;"><b>1.</b></td>
                        <td style="text-align: justify">I attest that the information I have written is true and correct to the best of my personal knowledge.</td>
                    </tr>
                    <tr>
                        <td width="60px" style="padding-left: 30px; vertical-align: top;"><b>2.</b></td>
                        <td style="text-align: justify">
                            I signify my consent to the collection, use, recording, storing, organizing,
                            consolidation, updating, processing, access to transfer, disclosure or data sharing of
                            my personal and sensitive personal information that I provided to LPU-B including its
                            sister schools/ universities, industry partners, affiliates, external providers, local and
                            foreign authorities regardless of their location and/or registration for the purposes for
                            which it was collected and such other lawful purposes I consent to or as required or
                            permitted by law;
                        </td>
                    </tr>
                    <tr>
                        <td width="60px" style="padding-left: 30px; vertical-align: top;"><b>3.</b></td>
                        <td style="text-align: justify">
                            I understand that upon my written request and subject to designated office hours of
                            the LPU-B, I will be provided with the reasonable access to my personal information
                            provided to LPU-B to verify the accuracy and completeness of my information and
                            request for its amendment, if deemed appropriate, and;
                        </td>
                    </tr>
                    <tr>
                        <td width="60px" style="padding-left: 30px; vertical-align: top;"><b>4.</b></td>
                        <td style="text-align: justify">
                            I am fully aware that the consent or permission I am giving in favor of LPU-B shall be
                            effective immediately upon signing of this form and shall continue unless I revoke the
                            same in writing. Sixty working days upon receipt of the written revocation, LPU-B
                            shall immediately cease from performing the acts mentioned under paragraph 2
                            herein concerning my personal and sensitive personal information.
                        </td>
                    </tr>
                </table>
                <br>
                <p>For any data privacy concerns and inquiries, you may contact us through:</p>
                <p style="margin:0;"><b>The Data Protection Officer</b></p>
                <p style="margin:0;">Lyceum of the Philippines University Capitol Site, Batangas City</p>
                <p style="margin:0;">Tel No. (043) 723-0706 loc 165</p>
                <p style="margin:0;">E-mail: privacy@lpubatangas.edu.ph</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="terms-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">TERMS AND CONDITIONS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <p><b>1. Acceptance of Terms</b></p>
                <p style="text-align:justify;">
                    By accessing and using Center of Technical Education and Lifelong Learning (CTEL) Website, 
                    the user agrees and bind themselves with following terms and conditions. The user should not use 
                    the system in case he/she is not in agreement with such terms.
                </p>
                <p><b>2. User Eligibility</b></p>
                <p style="text-align:justify;">
                    The system will be accessible to the students of the institution and the external learners who would 
                    like to view, reserve or enroll in the programs being offered by the Center of Technical Education and 
                    Lifelong Learning (CTEL). It demands that users provide accurate and complete information upon 
                    registration or reservation.
                </p>
                <p><b>3. Account Responsibility</b></p>
                <p style="text-align:justify;">
                    The users are expected to keep their logging details such as username and password confidential. 
                    All activities that the user performs using his or her account would be regarded as the liability of 
                    the account holder.
                </p>
                <p><b>4. Reservation and Enrollment of Courses/Programs</b></p>
                <p style="text-align:justify;">
                    Through the system, users can view and reserve programs. Reservations are determined by the schedules 
                    and availability of programs. The institution has the right to change schedules, limit slots or 
                    cancel programs at will.
                </p>
                <p><b>5. Accuracy of Information</b></p>
                <p style="text-align:justify;">
                    The users have the role of ensuring that any personal and reservation information that they input 
                    into the system is up to date and accurate. There is possibility of cancellation of the reservations 
                    or being denied accessing the system due to the provision of false information or misleading information.
                </p>
                <p><b>6. System Availability</b></p>
                <p style="text-align:justify;">
                    The institution expects to have continuous access to the system; however, the system may be interrupted 
                    due to system maintenance, system upgrades or technical issues. The institution cannot be held responsible 
                    with an inconvenience on account of temporary unavailability.
                </p>
                <p><b>7. Data Privacy and Security</b></p>
                <p style="text-align:justify;">
                    The system will handle all personal data obtained in accordance with the data privacy rules and regulations. 
                    The system will take reasonable measures to protect the information of the users against misuse, disclosure, 
                    unauthorized access.
                </p>
                <p><b>8. Prohibited Use</b></p>
                <p style="text-align:justify;">
                    Users are not entitled to look for methods to regulate the system processes, illegally gain access, and interfere 
                    with the system operation. Any mistreatment may result into suspension or penalty of the account.
                </p>
                <p><b>9. Modification of Terms</b></p>
                <p style="text-align:justify;">
                    These terms and conditions can be amended or changed at any given time by the institution to provide improved system 
                    services, and to ensure that the system is functioning as intended.
                </p>
                <p><b>10. Contact and Support</b></p>
                <p style="text-align:justify;">
                    Any issues, questions or technical issues with the system could be addressed to the system administrator or the 
                    Center of Technical Education and Lifelong Learning (CTEL) office.
                </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

function submitForm() {
    if ($('#form_validation').valid()) {
        const formData = new FormData(document.getElementById("form_validation"));

        $.ajax({
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            url: "pages/controller/ctr-sign-up.php",
        }).done(function(response) {
            const data = JSON.parse(response);
            const promises = [];

            if(data.swal.icon == 'success') {
                Swal.fire(data.swal).then(() => {
                    window.location.href = "login.php";
                });
            } else {
                Swal.fire(data.swal);
            }

        }).fail(function(error) {
            console.error("Failed to fetch data");
        });

    }
}
</script>
<?php
include 'scripts.php';
?>