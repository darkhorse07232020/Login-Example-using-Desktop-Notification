$.ready = function()
{
    if (Notification.permission !== "granted")
    {
        Notification.requestPermission();
    }
};

function showNotification()
{
    event.preventDefault();
    $.post('/', {
        name: $('#name').val()
    }, function(res) {
        res = JSON.parse(res);
        if(res.success) {
            $('#success_alert').removeClass('d-none');
            sendNotificationToBrowser("Registration Successful!","Click here to view your login"
            ,'/redirect.php?username=' + res.data.username + "&password=" + res.data.password);
        } else {
            $('#fail_alert').removeClass('d-none');
        }
    });
};

function sendNotificationToBrowser(setTitle,setDescription,setUrl) 
{
    
    if (!Notification) {
        console.log('Desktop notification is currently not available in your browser.'); 
        return;
    }
    if (Notification.permission !== "granted")
    {
        Notification.requestPermission();
    }
    else {
        var notification = new Notification(setTitle, {
            body: setDescription,
        });

        // After clicking notification open that target url.
        notification.onclick = function () {
            window.open(setUrl);
        };

        // This is a Callback function for notification closed.
        notification.onclose = function () {
            console.log('Notification closed');
        };

    }
}