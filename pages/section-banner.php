<!-- Banner Section -->
<section id="banner" class="banner section dark-background">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
        <div class="carousel-indicators">
            <?php
                $banner_count = $db->countOf('tbl_banner', 'status = "Active"');

                for ($i = 0; $i < $banner_count; $i++) {
            ?>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>" <?php if($i == 0){ echo 'class="active" aria-current="true"';} ?>></button>
            <?php
                }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
                $counter = 1;
                $banner_query = $db->query('SELECT * FROM tbl_banner WHERE status = "Active"');
                while ($line = $db->fetchNextObject($banner_query)) {
                    $image          = $line->img;
                    $image_data     = base64_encode($image);
                    $image_type     = $line->img_type;
                    $image_src      = "data:{$image_type};base64,{$image_data}";
            ?>
                <div class="carousel-item <?php if($counter == 1){ echo 'active';} ?>" data-bs-interval="3000">
                    <img src="<?= $image_src ?? '' ?>" class="d-block w-100" alt="...">
                </div>
            <?php
                    $counter++;
                }
            ?>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>
</section>
<!-- Banner Section -->