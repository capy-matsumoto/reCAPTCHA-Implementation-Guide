<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<form id="recaptchaForm" action="post.php" method="post">
    <h1>TEST</h1>
    <input type="text" placeholder="Username"/>
    <input type="password" placeholder="Password"/>
    <input type="hidden" name="form_name" value="v2">

    <div class="g-recaptcha" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_KEY'); ?>"></div>

    <button>Login</button>
</form>
</body>
</html>
