<?php
include 'includes/init.php';
include 'head.php';
?>
<main style="background-image: url(assets/img/login-bg.jpg);background-size: cover; background-position: center;">

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
                                        <input type="text" id="firstName" name="fname" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" id="middleName" name="mname" class="form-control" placeholder="(Optional)">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label required">Last Name</label>
                                        <input type="text" id="lastName" name="lname" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label required">Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mobile_no" class="form-label required">Mobile Number</label>
                                        <input type="tel" id="mobile_no" name="mobile_no" class="form-control" maxlength="11">
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
                                        <input type="text" id="fb_link" name="fb_link" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="create_password" class="form-label required">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="create_password" name="create_password" class="form-control" placeholder="Enter your password">
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
                                                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> *
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-signup">
                                        <i class="bi bi-check-circle me-2"></i>
                                        signup Now
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
<?php
include 'scripts.php';
?>