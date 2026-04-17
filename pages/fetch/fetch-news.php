<?php
include '../../includes/init.php';
$db = DB::getInstance();

$page_number = $_POST['page'];
$page_size = decrypt_data($_POST['page_size']);
$offset = ($page_number - 1) * $page_size;

$news_query = $db->query('SELECT * FROM tbl_news WHERE status = "Active" ORDER BY news_id DESC LIMIT '. $page_size .' OFFSET :offset', ['offset' => $offset]);
      
while ($line = $db->fetchNextObject($news_query)) {
    $image          = $line->img;
    $image_data     = base64_encode($image);
    $image_type     = $line->img_type;
    $image_src      = "data:{$image_type};base64,{$image_data}";
?>
<div class="col-lg-4">
    <article>
        <div class="post-img">
            <img src="<?= $image_src ?? '' ?>" alt="">
        </div>

        <h2 class="title news_title"><?= e($line->news_title) ?></h2>

        <div class="content">
            <p style="white-space: pre-line;"><?= e(truncateText($line->news_content, 200)) ?></p>

            <div class="read-more">
                <button onclick="submitNews('<?= encrypt_data($line->news_id) ?>')">Read More</button>
            </div>
        </div>
    </article>
</div><!-- End post list item -->
<?php
    }
?>

<script>
    function submitNews(news_id){
        $.ajax({
            type: "post",
            data: {
                news_id: news_id,
            },
            url: 'news.php',
            success: function (data) {
                window.location = "news.php";
            },
        });
    }
</script>