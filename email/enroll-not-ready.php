<?php
include '../includes/init.php';
require '../assets/plugins/brevo/vendor/autoload.php';

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['BREVO_API_KEY']);
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(), $config);

$email = new \SendinBlue\Client\Model\SendSmtpEmail([
    'to' => [['email' => $_SESSION['proms']['email'], 'name' => $_SESSION['proms']['fullname']]],
    'templateId' => 5,
    'params' => [
        'name' => $_SESSION['proms']['fullname'],
        'program' => $_SESSION['proms']['enroll-reserve']['sub_prog_title'],
    ]
]);

try {
    $result = $apiInstance->sendTransacEmail($email);

    Alert::success(array(
    'title' => 'Reservation Received!',
    'text'  => 'Enrollment is not yet open. We will send you an email once it becomes available.',
    'showConfirmButton' => true,
    'path'  => '../index.php'
));

} catch (Exception $e) {
    echo 'Exception when sending email: ', $e->getMessage();
}
?>