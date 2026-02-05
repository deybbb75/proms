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
                            
                            <div class="text-center m-auto login-header">
                                <h2 class="text-dark-50 text-center pb-0 fw-bold">Forget Password?</h2>
                                <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                            </div>

                            <form action="#" id="form_validation">

                                <div class="mb-4">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary btn-login" type="submit"> Done </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Remember your password? <a href="login.php" class="text-muted ms-1"><b>Log in</b></a></p>
                        </div> <!-- end col -->
                    </div>
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
