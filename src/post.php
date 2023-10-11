<?php

require 'vendor/autoload.php';

$formName = $_POST['form_name'];

if ($formName === 'invisible') {
    $recaptchaSecretKey = getenv("INVISIBLE_SECRET_KEY");
} elseif ($formName === 'v2') {
    $recaptchaSecretKey = getenv("RECAPTCHA_SECRET_KEY");
} else {
    // 予期しないform_nameの値の場合のエラーハンドリング
    die("Invalid form_name value");
}
print_r("recaptchaSecretKey is $recaptchaSecretKey \n");

$recaptchaResponse = $_POST['g-recaptcha-response'];

print_r("recaptchaResponse is $recaptchaResponse \n");

$client = new \GuzzleHttp\Client();

$response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
    'form_params' => [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse
    ]
]);

$body = $response->getBody();
$result = json_decode($body, true);
print_r($result);

if ($result['success'] === true) {
    echo "reCAPTCHA verification succeeded!";
} else {
    echo "reCAPTCHA verification failed!";
}

?>
