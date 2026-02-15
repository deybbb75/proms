<?php
include 'head.php';

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
  $page_type = 'index-page';
}
?>
<header id="header" class="header d-flex align-items-center fixed-top <?php echo isset($page_type) ? $page_type : ''; ?>">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/img/logo/logo1-white.png" width="120" alt="">
      <!-- <h1 class="sitename">Arsha</h1> -->
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#banner">Home</a></li>
        <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#about">About</a></li>
        <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#team">Team</a></li>
        <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#programs">Programs</a></li>
        <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#news">News</a></li>
        <li><a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#contact">Contact</a></li>
        <li><a class="menu-logout" href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/clear.php">Logout</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#programs">Reserve Now</a>
    <a class="btn-logout" href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/clear.php"><i class="bi bi-box-arrow-right logout-icon"></i></a>

  </div>
</header>