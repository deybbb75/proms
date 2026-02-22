<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#programs');

if(isset($_POST['prog_id'])){
    $_SESSION['proms']['prog_id'] = decrypt_data($_POST['prog_id']);
}else if(isset($_GET['prog_id'])){
    $_SESSION['proms']['prog_id'] = decrypt_data($_GET['prog_id']);
    safe_redirect('program-list.php');
}

if(!isset($_SESSION['proms']['prog_id'])){
    safe_redirect('../index.php');
}

$page_size = 9;
$prog_title = $db->queryUniqueValue('SELECT prog_name FROM tbl_program WHERE prog_id = :prog_id', ['prog_id' => $_SESSION['proms']['prog_id']]);

if($_SESSION['proms']['prog_id'] == 1){
    $prog_count = $db->countOf('tbl_assess_cert', 'status = "Active"');
}else if($_SESSION['proms']['prog_id'] == 2){
    $prog_count = $db->countOf('tbl_foreign_lang', 'status = "Active"');
}else if($_SESSION['proms']['prog_id'] == 3){
    $prog_count = $db->countOf('tbl_cert_prog', 'status = "Active"');
}else if($_SESSION['proms']['prog_id'] == 4){
    $prog_count = $db->countOf('tbl_short_term', 'status = "Active"');
}else if($_SESSION['proms']['prog_id'] == 5){
    $prog_count = $db->countOf('tbl_micro_course', 'status = "Active"');
}else if($_SESSION['proms']['prog_id'] == 6){
    $prog_count = $db->countOf('tbl_ms_prog', 'status = "Active"');
}

$page_count = ceil($prog_count/$page_size)

?>
<style>
#pagination-container{
    display:none;
}
</style>

<main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-pages-center">
            <h1 class="mb-2 mb-lg-0"><?= $prog_title ?></h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Programs 2 Section -->
    <section id="program-list" class="program-list section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12">
                    <div class="programs-grid" data-aos="fade-up" data-aos-delay="200">
                        <div id="menu-loader-section">
                            <div class="menu-loader"></div>
                        </div>
                        <div class="row" id="program-section">
                            
                        </div>
                    </div><!-- End Programs Grid -->

                    <div class="pagination-wrapper" id="pagination-container" data-aos="fade-up" data-aos-delay="300">
                        <nav aria-label="Programs pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item" id="prev_button">
                                    <a class="page-link">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <div id="pagination-section" style="display:flex;">

                                </div>
                                <li class="page-item" id="next_button">
                                    <a class="page-link">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End Pagination -->

                </div>
            </div>

        </div>

    </section>

</main>

<?php
include '../footer.php';
?>

<script>
// Example Usage:
const pagination = new Pagination({
    totalPages: '<?= $page_count ?>',
    currentPage: 1,
    maxVisible: 5,
    containerId: "pagination-section",
    prevButtonId: "prev_button",
    nextButtonId: "next_button",
    onPageChange: (page) => fetchPrograms(page, '<?= $page_size ?>'),
    onPrev: (page) => fetchPrograms(page, '<?= $page_size ?>'),
    onNext: (page) => fetchPrograms(page, '<?= $page_size ?>')
});

function fetchPrograms(page, page_size){
    $('#pagination-container').css('display', 'none');
    $('#menu-loader-section').css('display', 'block');

    $.ajax({
        type: "POST",
        url: "fetch/fetch-program.php",
        data: {
            page: page,
            page_size: page_size,
        }
    }).done(function(data) {
        $('#program-section').empty();
        $('#menu-loader-section').css('display', 'none');
        $('#program-section').html(data);
        runMatchHeight();
        $('#pagination-container').css('display', 'block');

    }).fail(function(error) {
        console.error("Failed to fetch data", error);
    });
}

fetchPrograms(1, '<?= $page_size ?>');
</script>