<?php
include 'includes/init.php';
include 'head.php';
?>
<script type="text/javascript">
    (function(){
        emailjs.init({
            publicKey: "pr94tQJGbGM6rvPgo",
        });
    })();
</script>   

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
                                <h2 class="text-dark-50 text-center pb-0 fw-bold">Log In</h2>
                                <p class="text-muted mb-4">Enter your email address and password</p>
                            </div>

                            <form action="pages/controller/ctr-login.php" method="POST" id="form_validation">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <a href="forget-pass.php" class="text-muted float-end"><small>Forgot your password?</small></a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button type="submit" class="btn btn-primary btn-login">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>
                                        LOG IN
                                    </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="sign-up.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
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

<script>
<?php
    if(isset($_SESSION['proms']['reset_email'])) {
?>
    var params = {
        email: '<?= $_SESSION['proms']['reset_email']['email'] ?>',
        link: '<?= $GLOBALS['INF_CONFIG']['sitehost']. '/reset-pass.php?token=' . $_SESSION['proms']['reset_email']['token'] ?>',
    };

    emailjs.send("service_tvzu0wq", "template_wwkq2vc", params)
    .then(function(response) {
        console.log("Success:", response);
    }, function(error) {
        console.error("Error:", error);
    });
<?php
    unset($_SESSION['proms']['reset_email']);
    }
?>
</script>

<?php
include 'scripts.php';
?>
