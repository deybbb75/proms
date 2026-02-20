<!-- News Section -->
<section id="news" class="news section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>News & Events</h2>
        <p>Stay informed about our latest updates and upcoming activities. From announcements and achievements to workshops and special events, this is where you’ll find what’s happening and what’s next.</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-5">
            <?php
                $news_query = $db->query('SELECT * FROM tbl_news WHERE status = "Active" ORDER BY news_id DESC LIMIT 3');
                $counter = 1;
                while ($line = $db->fetchNextObject($news_query)) {
                    $image          = $line->img;
                    $image_data     = base64_encode($image);
                    $image_type     = $line->img_type;
                    $image_src      = "data:{$image_type};base64,{$image_data}";
            ?>
            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="<?= $counter ?>00">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= $image_src ?? '' ?>" class="img-fluid" alt="">
                    </div>

                    <div class="post-content d-flex flex-column">

                    <h3 class="post-title news_title"><?= e($line->news_title) ?></h3>

                    <div class="meta d-flex align-items-center">
                        <p style="white-space: pre-line;"><?= e(truncateText($line->news_content, 200)) ?></p>
                    </div>

                    <hr>

                    <a onclick="submitNews('<?= encrypt_data($line->news_id) ?>')" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->
            <?php
                    $counter++;
                }
            ?>
        </div>

        <div class="more-news text-center" data-aos="fade-up" data-aos-delay="100">
            <a href="pages/news-list.php" class="btn-more">View More News</a>
        </div>

    </div>

</section><!-- /News Section -->

<script>
    function submitNews(news_id){
        $.ajax({
            type: "post",
            data: {
                news_id: news_id,
            },
            url: 'pages/news.php',
            success: function (data) {
                window.location = "pages/news.php";
            },
        });
    }
</script>