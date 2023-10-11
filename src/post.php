<?php

require 'vendor/autoload.php';
// Get your secret keys from environment variables
$invisibleSecretKey = getenv("INVISIBLE_SECRET_KEY");
$v2SecretKey = getenv("RECAPTCHA_SECRET_KEY");
$v3SecretKey = getenv("V3_SECRET_KEY");

// Get the form input
$recaptchaResponse = $_POST['g-recaptcha-response'];
$formType = $_POST['form_name'];

// Decide which secret key to use based on the form name
switch ($formType) {
    case 'invisible':
        $secretKey = $invisibleSecretKey;
        break;
    case 'v2':
        $secretKey = $v2SecretKey;
        break;
    case 'v3':
        $secretKey = $v3SecretKey;
        break;
    default:
        die('Invalid form type');
}

// Verify the reCAPTCHA response
$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
$responseKeys = json_decode($verifyResponse, true);

if (intval($responseKeys["success"]) !== 1) {
    // Not verified!
    echo "Failed reCAPTCHA verification!";
} else {
    echo "Succeeded reCAPTCHA verification!";
    if ($formType == "v3") {
        // For reCAPTCHA v3, display the score
        $score = $responseKeys["score"];
        echo " Your score is: " . $score;
    }
}


