<!DOCTYPE html>
<html>
<head>
<title>Login Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/login.js"></script>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body px-5">
                        <div class="h5 text-center">
                            <b>Welcome, Email!</b><br>
                            You can login with the following details:<br>
                            <b>Username: </b><?php echo $_POST['username']; ?><br>
                            <b>Password: </b><?php echo $_POST['password']; ?>
                        </div>
                        <a href="/login.php">
                            <button type="button" id="sendlogin" class="btn btn-primary w-100 my-3" onclick="loginUser()">Click here to Login now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>