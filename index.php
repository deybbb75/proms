<?php
include 'includes/init.php';
include 'header.php';
$db = DB::getInstance();
?>

<main class="main index-main">
  <?php
    include 'sections/banner.php';
    include 'sections/about.php';
    include 'sections/team.php';
    include 'sections/programs.php';
    include 'sections/news.php';
    include 'sections/contact.php';
  ?>
</main>

<?php
include 'footer.php';
?>