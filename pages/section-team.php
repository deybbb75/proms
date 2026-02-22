<!-- Team Section -->
<section id="team" class="team section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Team</h2>
        <p>Meet the people behind our mission. Our team brings together diverse skills, experience, and passion to drive impact and deliver meaningful results.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <?php
            $first_member = $db->queryUniqueObject('SELECT * FROM tbl_member WHERE status = "Active" AND member_id = 1');
            if ($first_member) {
                $member_id      = encrypt_data($first_member->member_id);
                $name    = e($first_member->name);
                $position       = e($first_member->position);
                $status         = e($first_member->status);
                $image          = $first_member->img;
                $image_data     = base64_encode($image);
                $image_type     = $first_member->img_type;
                $image_src      = "data:{$image_type};base64,{$image_data}";
            }
        ?>
        <div class="leader-container">
            <div class="team-member" data-aos="fade-up" data-aos-delay="200">
                <div class="member-img">
                    <img src="<?= $image_src ?? '' ?>" class="img-fluid" loading="lazy">
                </div>
                <div class="member-info">
                    <h4><?= e($name) ?></h4>
                    <span><?= e($position) ?></span>
                </div>
            </div><!-- End Team Member -->
        </div>
        <div class="team-grid">
            <?php
                $member_query = $db->query('SELECT * FROM tbl_member WHERE status = "Active" AND member_id != 1');
                $counter = 1;
                while ($line = $db->fetchNextObject($member_query)) {
                    $image          = $line->img;
                    $image_data     = base64_encode($image);
                    $image_type     = $line->img_type;
                    $image_src      = "data:{$image_type};base64,{$image_data}";
            ?>
            <div class="team-member" data-aos="fade-up" data-aos-delay="<?= $counter ?>00">
                <div class="member-img">
                    <img src="<?= $image_src ?? '' ?>" class="img-fluid" loading="lazy">
                </div>
                <div class="member-info">
                    <h4><?= e($line->name) ?></h4>
                    <span><?= e($line->position) ?></span>
                </div>
            </div><!-- End Team Member -->
            <?php
                    $counter++;
                }
            ?>
        </div>
    </div>
</section>
<!-- /Team Section -->