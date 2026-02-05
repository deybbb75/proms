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
      <!-- <img src="assets/img/logo.webp" alt=""> -->
      <h1 class="sitename">Arsha</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#banner" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="index.php#team">Team</a></li>
        <li><a href="#programs">Programs</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="#about">Get Started</a>

  </div>
</header>