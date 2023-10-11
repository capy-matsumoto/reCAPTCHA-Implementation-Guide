<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("recaptchaForm").submit();
        }
    </script>
</head>
<body>
<form id="recaptchaForm" action="post.php" method="post">
    <h1>TEST</h1>
    <input type="text" placeholder="Username"/>
    <input type="password" placeholder="Password"/>
    <input type="hidden" name="form_name" value="invisible">

    <button class="g-recaptcha"
            data-sitekey="<?php echo getenv("INVISIBLE_SITE_KEY"); ?>"
            data-callback='onSubmit'
            data-action='submit'>Login
    </button>
</form>
</body>
</html>
