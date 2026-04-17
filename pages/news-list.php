<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('pages/news-list.php');

$page_size = 9;

$news_count = $db->countOf('tbl_news', 'status = "Active"');

$page_count = ceil($news_count/$page_size)
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <h1>News & Events</h1>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Blog Posts Section -->
                <section id="news-list" class="news-list section">
                    <div class="container" data-aos="fade-up" data-aos-delay="100">
                        <div id="menu-loader-section">
                            <div class="menu-loader"></div>
                        </div>
                        <div class="row gy-4" id="news-section">
                            
                        </div><!-- End blog posts list -->
                    </div>

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
                </section><!-- /Blog Posts Section -->

            </div>
        </div>
    </div>

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
    onPageChange: (page) => fetchNews(page, '<?= encrypt_data($page_size) ?>'),
    onPrev: (page) => fetchNews(page, '<?= encrypt_data($page_size) ?>'),
    onNext: (page) => fetchNews(page, '<?= encrypt_data($page_size) ?>')
});

function fetchNews(page, page_size){
    $('#news-section').empty();
    $('#pagination-container').css('display', 'none');
    $('#menu-loader-section').css('display', 'flex');

    $.ajax({
        type: "POST",
        url: "fetch/fetch-news.php",
        data: {
            page: page,
            page_size: page_size,
        }
    }).done(function(data) {
        $('#menu-loader-section').css('display', 'none');
        $('#news-section').html(data);
        runMatchHeight();
        $('#pagination-container').css('display', 'block');

    }).fail(function(error) {
        console.error("Failed to fetch data", error);
    });
}

fetchNews(1, '<?= encrypt_data($page_size) ?>');
</script>