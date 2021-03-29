<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%^&*()";
    $password = substr( str_shuffle( $chars ), 0, 8 );


    //Get data from existing json file
    $myFile = "assets/user.json";
    $jsondata = file_get_contents($myFile);

    // converts json data into array
    $arr_data = json_decode($jsondata, true);
    $name = strtolower(str_replace(' ', '', $name));
    $chars = "0123456789";
    $username = $name;
    $existUser = true;
    while($existUser) {
        $username = $name.substr( str_shuffle( $chars ), 0, rand(1, 5) );
        $existUser = false;
        foreach($arr_data as $user) {
            if($user['username'] == $username) {
                $existUser = true;
                break;
            }
        }
    }

    //Get form data
    $formdata = array(
        'username'=> $username,
        'password'=> $password
    );

    // Push user data to array
    array_push($arr_data,$formdata);

    //Convert updated array to JSON
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
    
    //write json data into data.json file
    if(file_put_contents($myFile, $jsondata)) {
        $result = array("success"=>true, "data"=>array("username"=> $username, "password"=> $password));
        echo json_encode($result);
        exit;
    }
    else {
        $result = array("success"=>false);
        echo json_encode($result);
        exit;
    }
}
else {
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="assets/index.js"></script>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" onsubmit="showNotification()" style="height:100vh">
            <div class="col-4">
                <div id="success_alert" class="bg-light text-center h5 text-success p-4 d-none rounded-3 mb-5">
                    Registration was successful!<br>
                    Click on the notification to view your login details
                </div>
                <div id="fail_alert" class="bg-light text-center h5 text-danger p-4 d-none rounded-3 mb-5">
                    Registration Failed!
                </div>
                <div class="card shadow">
                    <div class="card-body px-5">
                        <form autocomplete="off">
                            <div class="form-group row">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="row">
                                <button type="submit" id="sendlogin" class="btn btn-primary w-100 my-3">Register</button>
                                <a href="/login.php" class="text-center">Login</a>
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