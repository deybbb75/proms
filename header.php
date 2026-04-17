<?php
include 'head.php';
$db = DB::getInstance();

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
$page_type = 'index-page';
}

$_SESSION['proms']['ay_id'] = $db->queryUniqueValue('SELECT ay_id FROM tbl_academic_year WHERE status = "Active"');
?>
<header id="header" class="header d-flex align-items-center fixed-top <?php echo isset($page_type) ? $page_type : ''; ?>">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/img/logo/logo1-white.png" id="lpu-logo-name" width="120" alt="">
        <img src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/img/logo/ctel-logo-name.png" id="ctel-logo-name" width="140" alt="">

        <img src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/img/logo/logo-small.png" id="lpu-logo" width="50" alt="">
        <img src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/img/logo/ctel-logo.png" id="ctel-logo" width="40" alt="">
        <!-- <h1 class="sitename">Arsha</h1> -->
        </a>

        <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#banner">Home</a></li>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#about">About</a></li>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#team">Team</a></li>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#programs">Programs</a></li>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/pages/news-list.php#news">News</a></li>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#contact">Contact</a></li>
            
            <?php
                if(isset($_SESSION['proms']['student_id'])){
            ?>
            <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/pages/profile.php">Profile</a></li>
            <li><a class="menu-logout" href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/clear.php">Logout</a></li>
            <?php
                }
            ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <?php
        if(isset($_SESSION['proms']['student_id'])){
            $redirect = 'href="' . $GLOBALS['INF_CONFIG']['sitehost'] . '/index.php#programs"';
        }else{
            $redirect = 'onclick="loginRedirect()"';
        }
        ?>

        <a class="btn-getstarted" <?= $redirect ?>>
            Reserve Now
        </a>

        <?php
        if(isset($_SESSION['proms']['student_id'])){
        ?>
        <a class="btn-logout" href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/clear.php"><i class="bi bi-box-arrow-right logout-icon"></i></a>
        <?php
        }
        ?>

    </div>
</header>

<script type="text/javascript">
    (function(){
        emailjs.init({
            publicKey: "Cx0RcBfIfvAxqiLan",
        });
    })();
</script> 