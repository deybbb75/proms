<?php
include 'includes/init.php';
include 'head.php';
?>
<main class="loading authentication-bg login" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7">
                    <div class="card">

                        <!-- Logo -->
                        <!-- <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div> -->

                        <div class="card-body p-4">
                            
                            <div class="text-center w-75 m-auto login-header">
                                <h2 class="text-dark-50 text-center pb-0 fw-bold">Reset Password</h2>
                                <p class="text-muted mb-4">Enter your new password</p>
                            </div>

                            <form action="#" id="form_validation">

                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="confirm_password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary btn-login" type="submit"> Reset </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

</main>

<?php
include 'scripts.php';
?>
