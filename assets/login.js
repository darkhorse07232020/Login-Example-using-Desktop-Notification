function loginUser() {
    $.post('/login.php', {
        'username': $('#username').val(),
        'password': $('#password').val()
    }, function(res) {
        if (res == "success"){
            window.location.href = "https://membership.demo.cyberbukit.com/auth/signup"
        } else {
            $('#fail_alert').removeClass('d-none');
        }
    });
}