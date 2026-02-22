<?php
include '../../includes/init.php';
$db = DB::getInstance();

$page_number = $_POST['page'];
$page_size = $_POST['page_size'];
$offset = ($page_number - 1) * $page_size;

if($_SESSION['proms']['prog_id'] == 1){
    $program_query = $db->query('SELECT * FROM tbl_assess_cert WHERE status = "Active" ORDER BY sub_prog_id LIMIT :page_size OFFSET :offset', ['page_size' => $page_size, 'offset' => $offset]);
    $url = 'details-assess-cert.php';
}else if($_SESSION['proms']['prog_id'] == 2){
    $program_query = $db->query('SELECT * FROM tbl_foreign_lang WHERE status = "Active" ORDER BY sub_prog_id LIMIT :page_size OFFSET :offset', ['page_size' => $page_size, 'offset' => $offset]);
    $url = 'details-foreign-lang.php';
}else if($_SESSION['proms']['prog_id'] == 3){
    $program_query = $db->query('SELECT * FROM tbl_cert_prog WHERE status = "Active" ORDER BY sub_prog_id LIMIT :page_size OFFSET :offset', ['page_size' => $page_size, 'offset' => $offset]);
    $url = 'details-cert-prog.php';
}else if($_SESSION['proms']['prog_id'] == 4){
    $program_query = $db->query('SELECT * FROM tbl_short_term WHERE status = "Active" ORDER BY sub_prog_id LIMIT :page_size OFFSET :offset', ['page_size' => $page_size, 'offset' => $offset]);
    $url = 'details-short-term.php';
}else if($_SESSION['proms']['prog_id'] == 5){
    $program_query = $db->query('SELECT * FROM tbl_micro_course WHERE status = "Active" ORDER BY sub_prog_id LIMIT :page_size OFFSET :offset', ['page_size' => $page_size, 'offset' => $offset]);
    $url = 'details-micro-course.php';
}else if($_SESSION['proms']['prog_id'] == 6){
    $program_query = $db->query('SELECT * FROM tbl_ms_prog WHERE status = "Active" ORDER BY sub_prog_id LIMIT :page_size OFFSET :offset', ['page_size' => $page_size, 'offset' => $offset]);
    $url = 'details-ms-prog.php';
}
    
while ($line = $db->fetchNextObject($program_query)) {
    $image          = $line->img;
    $image_data     = base64_encode($image);
    $image_type     = $line->img_type;
    $image_src      = "data:{$image_type};base64,{$image_data}";
?>
<div class="col-lg-4 col-md-4 card-padding">
    <div class="course-card">
    <div class="course-image">
        <img src="<?= $image_src ?? '' ?>" alt="Course" class="img-fluid">
    </div>
    <div class="course-content">
        <h3 class="prog_title"><?= e($line->title) ?></h3>
        <div class="button-section">
            <button onclick="submitSubProgram('<?= encrypt_data($line->sub_prog_id) ?>')" class="btn-course">View Details</button>
        </div>
    </div>
    </div><!-- End Course Card -->
</div>
<?php
    }
?>

<script>
    function submitSubProgram(sub_prog_id){
        $.ajax({
            type: "post",
            data: {
                sub_prog_id: sub_prog_id,
            },
            url: '<?= $url ?>',
            success: function (data) {
                window.location = "<?= $url ?>";
            },
        });
    }
</script>