<!DOCTYPE html>
<html>
<head>
<title>Login Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/login.js"></script>

</head>
<body>
    <form action="/info.php" method="post" id="post_form">
        <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>" />
        <input type="hidden" name="password" value="<?php echo $_GET['password']; ?>" />
    </form>
    <script>
        $("#post_form").submit();
    </script>
</body>
</html>