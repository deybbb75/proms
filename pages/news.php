<?php
include '../includes/init.php';
include '../header.php';
$db = DB::getInstance();

setActiveLink('index.php#news');

if(isset($_POST['news_id'])){
    $_SESSION['proms']['news_id'] = decrypt_data($_POST['news_id']);
}

$id = $_SESSION['proms']['news_id'];
$news = $db->queryUniqueObject('SELECT * FROM tbl_news WHERE news_id = :news_id', ['news_id' => $id]);
if ($news) {
    $news_id        = encrypt_data($news->news_id);
    $news_title     = e($news->news_title);
    $news_content   = e($news->news_content);
    $image          = $news->img;
    $image_data     = base64_encode($image);
    $image_type     = $news->img_type;
    $image_src      = "data:{$image_type};base64,{$image_data}";
}
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <h1>News & Event Details</h1>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container" data-aos="fade-up">
                        <article class="article">
                            <div class="banner-img" data-aos="zoom-in">
                                <img src="<?= $image_src ?? '' ?>" alt="Featured blog image" class="img-fluid" loading="lazy">
                            </div>

                            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                <div class="content-header">
                                    <h1 class="title"><?= $news_title ?? '' ?></h1>
                                </div>

                                <div class="content">
                                    <p style="white-space: pre-line;"><?= $news_content ?? '' ?></p>
                                </div>
                            </div>
                        </article>
                    </div>
                </section><!-- /Blog Details Section -->
            </div>
        </div>
    </div>

</main>

<?php
include '../footer.php';
?>