<?php
include 'includes/init.php';
include 'header.php';

$db = DB::getInstance();
?>

<main class="main index-main">
<?php
include 'pages/section-banner.php';
include 'pages/section-about.php';
include 'pages/section-team.php';
include 'pages/section-programs.php';
include 'pages/section-news.php';
include 'pages/section-contact.php';
?>
</main>

<?php
include 'footer.php';
?>

<script>
<?php
    if(isset($_SESSION['proms']['swal_object'])) {
?>
    let swalObject = <?= json_encode($_SESSION['proms']['swal_object']); ?>;
    Swal.fire(swalObject);
<?php
    unset($_SESSION['proms']['swal_object']);
    }
?>
</script>