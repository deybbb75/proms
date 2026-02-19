<?php
$about = $db->queryUniqueValue("SELECT content FROM tbl_about WHERE about_id = 1");
$mission = $db->queryUniqueValue("SELECT content FROM tbl_about WHERE about_id = 2");
$vision = $db->queryUniqueValue("SELECT content FROM tbl_about WHERE about_id = 3");
?>

<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p style="text-align: justify; white-space: pre-line;"><?= $about ?? '' ?></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="container" data-aos="fade-up">
                        <h2>Vision</h2>
                    </div>
                    <p style="text-align: justify; white-space: pre-line;"><?= $vision ?? '' ?></p>
                </div>

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <div class="container" data-aos="fade-up">
                        <h2>Mission</h2>
                    </div>
                    <p style="text-align: justify; white-space: pre-line;"><?= $mission ?? '' ?></p>
                </div>

            

        </div>

    </div>

</section>
<!-- /About Section -->