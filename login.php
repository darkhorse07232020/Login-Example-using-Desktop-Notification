<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $myFile = "assets/user.json";
    $jsondata = file_get_contents($myFile);
    $user_data = json_decode($jsondata, true);
    foreach($user_data as $user) {
        if($user['username'] == $username && $user['password'] == $password) {
            echo 'success';
            exit;
        }
    }
    echo 'failed';
    exit;
} else {
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/login.js"></script>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div id="fail_alert" class="bg-light text-center h5 text-danger p-4 d-none rounded-3 mb-5">
                    Login Failed!
                </div>
                <div class="card">
                    <div class="card-body px-5">
                        <form autocomplete="off">
                            <div class="form-group row">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group row">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="row justify-content-center">
                                <button type="button" id="sendlogin" class="btn btn-primary w-100 my-3" onclick="loginUser()">login</button>
                                <a href="/">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>