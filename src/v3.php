<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include the reCAPTCHA JavaScript library -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo getenv('V3_SITE_KEY'); ?>"></script>
</head>
<body>
<form id="recaptchaForm" action="post.php" method="post">
    <h1>TEST</h1>
    <input type="text" placeholder="Username"/>
    <input type="password" placeholder="Password"/>

    <!-- Hidden input for specifying the reCAPTCHA version -->
    <input type="hidden" name="form_name" value="v3">

    <!-- Hidden input to store the reCAPTCHA token -->
    <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">

    <button type="submit" onclick="submitRecaptchaForm()">Login</button>
</form>

<script>
    function submitRecaptchaForm() {
        event.preventDefault();
        // Execute the reCAPTCHA v3 verification
        grecaptcha.execute('<?php echo getenv('V3_SITE_KEY'); ?>', {action: 'login'}).then(function(token) {
            // Add the token to the form
            document.getElementById('recaptchaResponse').value = token;
            // Submit the form
            document.getElementById('recaptchaForm').submit();
        });
    }
</script>

</body>
</html>
