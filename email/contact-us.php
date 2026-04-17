<?php
include '../includes/init.php';
require '../assets/plugins/brevo/vendor/autoload.php';

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['BREVO_API_KEY']);
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(), $config);

$email = new \SendinBlue\Client\Model\SendSmtpEmail([
    'to' => [['email' => 'ctedlpubatangas@gmail.com', 'name' => 'Center for Technical Education and Lifelong Learning (CTEL)']],
    'subject' => $_SESSION['proms']['contact_us']['subject'],
    'templateId' => 2,
    'params' => [
        'name' => $_SESSION['proms']['contact_us']['name'],
        'email' => $_SESSION['proms']['contact_us']['email'],
        'message' => $_SESSION['proms']['contact_us']['message'],
    ]
]);

try {
    $result = $apiInstance->sendTransacEmail($email);
    
    unset($_SESSION['proms']['contact_us']);

    Alert::success(array(
        'title' => 'Sent Successful!',
        'text'  => 'Email sent successfully.',
        'showConfirmButton' => true,
        'path'  => '../index.php'
    ));
} catch (Exception $e) {
    echo 'Exception when sending email: ', $e->getMessage();
}
?>