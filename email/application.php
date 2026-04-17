<?php
include '../includes/init.php';
require '../assets/plugins/brevo/vendor/autoload.php';

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['BREVO_API_KEY']);
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(), $config);

$email = new \SendinBlue\Client\Model\SendSmtpEmail([
    'to' => [['email' => $_SESSION['proms']['email'], 'name' => $_SESSION['proms']['fullname']]],
    'templateId' => 3,
    'params' => [
        'name' => $_SESSION['proms']['fullname'],
    ]
]);

try {
    $result = $apiInstance->sendTransacEmail($email);

    Alert::success(array(
        'title' => 'Application Successful!',
        'text'  => 'Your application has been successfully submitted. Please check your email for confirmation and further instructions.',
        'showConfirmButton' => true,
        'path'  => '../index.php'
    ));
    
} catch (Exception $e) {
    echo 'Exception when sending email: ', $e->getMessage();
}
?>