<?php
include '../../includes/init.php';
$db = DB::getInstance();

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

try {
    $_SESSION['proms']['contact_us']['email'] = $email;
    $_SESSION['proms']['contact_us']['name'] = $name;
    $_SESSION['proms']['contact_us']['subject'] = $subject;
    $_SESSION['proms']['contact_us']['message'] = $message;

    safe_redirect('../../email/contact-us.php');

} catch (Exception $e) {
    console_error('An error occurred: ' . $e->getMessage());
}
?>