<!-- Programs Section -->
<section id="programs" class="programs section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Programs</h2>
        <p>Explore our programs designed to support, inspire, and create positive change. Each initiative is thoughtfully developed to meet real needs and achieve lasting outcomes.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="program-grid">
                <?php
                    $program_query = $db->query('SELECT * FROM tbl_program WHERE status = "Active"');
                    $counter = 1;
                    while ($line = $db->fetchNextObject($program_query)) {
                        $image          = $line->img;
                        $image_data     = base64_encode($image);
                        $image_type     = $line->img_type;
                        $image_src      = "data:{$image_type};base64,{$image_data}";
                ?>
                <div class="steps-item" data-aos="fade-up" data-aos-delay="<?= $counter ?>00">
                    <div class="steps-image">
                        <img src="<?= $image_src ?? '' ?>" class="img-fluid" loading="lazy">
                    </div>
                    <div class="steps-content">
                        <div class="steps-number"><?= sprintf("%02d", $counter) ?></div>
                        <h3 class="prog_title" style="margin-bottom: 30px;"><?= e($line->prog_name) ?></h3>
                        <button onclick="submitProgram('<?= encrypt_data($line->prog_id) ?>')" class="btn-course">View</button>
                    </div>
                </div><!-- End Steps Item -->
                <?php
                        $counter++;
                    }
                ?>
            </div>

    </div>

</section>
<!-- /Programs Section -->

<script>
    function submitProgram(prog_id){
        $.ajax({
            type: "post",
            data: {
                prog_id: prog_id,
            },
            url: 'pages/program-list.php',
            success: function (data) {
                window.location = "pages/program-list.php";
            },
        });
    }
</script>