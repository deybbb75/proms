    <footer id="footer" class="footer light-background">
        <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
            <a href="$GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php" class="d-flex align-items-center">
                <span class="sitename">Center for Technical Education and Lifelong Learning (CTEL)</span>
            </a>
            <div class="footer-contact pt-3">
                <p>Rm. 105 SHL Bldg. LPU-Batangas Main Campus</p>
                <p>Kumintang Ibaba, Batangas City, 4200</p>
                <p class="mt-3"><strong>Phone:</strong> <span>+63 945 319 0678</span> / <span>+63 18 640 0837</span></p>
                <p><strong>Email:</strong> <span>cted@lpubatangas.edu.ph</span></p>
            </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#banner">Home</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#about">About us</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#team">Our Team</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#programs">Programs</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/index.php#news">News & Events</a></li>
            </ul>
            </div>

            <div class="col-lg-3 col-md-3 footer-links">
            <h4>Our Programs</h4>
            <ul>
                <?php
                    $program_query = $db->query("SELECT * FROM tbl_program WHERE status = 'Active'");
                    while ($line = $db->fetchNextObject($program_query)) {
                ?>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/pages/program-list.php?prog_id=<?= encrypt_data($line->prog_id) ?>"><?= e($line->prog_name) ?></a></li>
                <?php
                    }
                ?>
            </ul>
            </div>

            <div class="col-lg-3 col-md-12">
            <h4>Follow Us</h4>
            <p>Follow us to get updates, news, and special offers right in your feed.</p>
            <div class="social-links d-flex">
                <a href="https://x.com/lpubofficial/"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.facebook.com/share/1csmt3GTrR/?mibextid=wwXIfr"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/lpubofficial/"><i class="bi bi-instagram"></i></a>
            </div>
            </div>

        </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

<?php
include 'scripts.php';
?>