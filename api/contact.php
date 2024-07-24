<?php 

// print_r($_POST);

error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

if(!$_POST['h-captcha-response']) {
    header('Location: contact.php?error=' . rawurlencode('Please complete the CAPTCHA check!'), true, 302); exit;
}

if($_POST['h-captcha-response']) {
    $data = [
		'secret' => '0x77E2564897b4fC7bCFCeA2B5f410CA10F829b06B',
		'sitekey' => 'fe084908-dd20-4ed4-86bc-e0d6f886681c',
		'response' => $_POST['h-captcha-response'],
		'remoteip' => $_SERVER['HTTP_CF_CONNECTING_IP'] ?: $_SERVER['REMOTE_ADDR'],
	];
	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, 'https://hcaptcha.com/siteverify');
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($verify);
	
	$api = json_decode($response, true);
	
	if(!$api['success']) {
        header('Location: contact.php?error=' . rawurlencode('Please complete the CAPTCHA check!'), true, 302); exit;
	}
}

if(!$_POST['first'] || !$_POST['last'] || !$_POST['email'] || !$_POST['message']) {
    header('Location: contact.php?error=' . rawurlencode('Not all required fields have been filled!'), true, 302); exit;
}


$email_contents = '================== NEW CONTACT MESSAGE FOR MME SEE CONFERENCE ==================' . "\r\n";
$email_contents .= 'Name: ' . $_POST['first'] . ' ' . $_POST['last'] . "\r\n";
$email_contents .= 'Email: ' . $_POST['email'] . "\r\n";
$email_contents .= 'Message:' . "\r\n";
$email_contents .= '---------' . "\r\n";
$email_contents .= $_POST['message'] . "\r\n";

$msg_subject = 'New contact message on MME SEE conference [' . date('Y-m-d H:i:s') . ']';
$msg_to = 'mmeseeorg@gmail.com';

$api_url = 'https://api.dhilosnetworks.cc/sendmail';

$post_fields = [
	'from' => 'no-reply@mme-see.org',
	'reply_to' => $msg_to,
	'to' => $msg_to,
	'subject' => $msg_subject,
	'body' => $email_contents,
	'is_html' => false
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

header('Location: contact.php?success=1', true, 302); exit;
}

/*


Array
(
    [first] => ime
    [last] => prezime
    [email] => mejl@mejl.com
    [message] => test
)

*/

if($_GET['error']) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Contact form
            </h1>
            <div class="has-text-centered">
                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhLS0gQ3JlYXRlZCB3aXRoIElua3NjYXBlIChodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy8pIC0tPgo8c3ZnCiAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgeG1sbnM6Y2M9Imh0dHA6Ly93ZWIucmVzb3VyY2Uub3JnL2NjLyIKICAgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIgogICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIgogICB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIgogICB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiCiAgIHhtbG5zOmlua3NjYXBlPSJodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy9uYW1lc3BhY2VzL2lua3NjYXBlIgogICB2ZXJzaW9uPSIxLjAiCiAgIHdpZHRoPSI0OTciCiAgIGhlaWdodD0iNDYzIgogICBpZD0ic3ZnMiIKICAgc29kaXBvZGk6dmVyc2lvbj0iMC4zMiIKICAgaW5rc2NhcGU6dmVyc2lvbj0iMC40NXByZTEiCiAgIHNvZGlwb2RpOmRvY25hbWU9IlNwMThfVGFybsOzd19tYXAuc3ZnIgogICBpbmtzY2FwZTpvdXRwdXRfZXh0ZW5zaW9uPSJvcmcuaW5rc2NhcGUub3V0cHV0LnN2Zy5pbmtzY2FwZSIKICAgc29kaXBvZGk6ZG9jYmFzZT0iQzpcUGFza2kgbmFyesSZZHppXE1vamVcTW9qZSByeXN1bmtpXFN2ZyIKICAgc29kaXBvZGk6bW9kaWZpZWQ9InRydWUiPgogIDxtZXRhZGF0YQogICAgIGlkPSJtZXRhZGF0YTIzIj4KICAgIDxyZGY6UkRGPgogICAgICA8Y2M6V29yawogICAgICAgICByZGY6YWJvdXQ9IiI+CiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+CiAgICAgICAgPGRjOnR5cGUKICAgICAgICAgICByZGY6cmVzb3VyY2U9Imh0dHA6Ly9wdXJsLm9yZy9kYy9kY21pdHlwZS9TdGlsbEltYWdlIiAvPgogICAgICA8L2NjOldvcms+CiAgICA8L3JkZjpSREY+CiAgPC9tZXRhZGF0YT4KICA8c29kaXBvZGk6bmFtZWR2aWV3CiAgICAgaW5rc2NhcGU6d2luZG93LWhlaWdodD0iOTY4IgogICAgIGlua3NjYXBlOndpbmRvdy13aWR0aD0iMTI4MCIKICAgICBpbmtzY2FwZTpwYWdlc2hhZG93PSIyIgogICAgIGlua3NjYXBlOnBhZ2VvcGFjaXR5PSIwLjAiCiAgICAgZ3VpZGV0b2xlcmFuY2U9IjEwLjAiCiAgICAgZ3JpZHRvbGVyYW5jZT0iMTAuMCIKICAgICBvYmplY3R0b2xlcmFuY2U9IjEwLjAiCiAgICAgYm9yZGVyb3BhY2l0eT0iMS4wIgogICAgIGJvcmRlcmNvbG9yPSIjNjY2NjY2IgogICAgIHBhZ2Vjb2xvcj0iI2ZmZmZmZiIKICAgICBpZD0iYmFzZSIKICAgICBpbmtzY2FwZTp6b29tPSIxLjQxNDIxMzYiCiAgICAgaW5rc2NhcGU6Y3g9IjMwMi4yMzU0MiIKICAgICBpbmtzY2FwZTpjeT0iMjUyLjYxMjYzIgogICAgIGlua3NjYXBlOndpbmRvdy14PSItNCIKICAgICBpbmtzY2FwZTp3aW5kb3cteT0iLTQiCiAgICAgaW5rc2NhcGU6Y3VycmVudC1sYXllcj0ic3ZnMiIgLz4KICA8ZGVmcwogICAgIGlkPSJkZWZzNSI+CiAgICA8bGluZWFyR3JhZGllbnQKICAgICAgIGlkPSJsaW5lYXJHcmFkaWVudDgwMjMiPgogICAgICA8c3RvcAogICAgICAgICBzdHlsZT0ic3RvcC1jb2xvcjojZmZmZmZmO3N0b3Atb3BhY2l0eToxOyIKICAgICAgICAgb2Zmc2V0PSIwIgogICAgICAgICBpZD0ic3RvcDgwMjUiIC8+CiAgICAgIDxzdG9wCiAgICAgICAgIHN0eWxlPSJzdG9wLWNvbG9yOiNmZjAwMDA7c3RvcC1vcGFjaXR5OjE7IgogICAgICAgICBvZmZzZXQ9IjEiCiAgICAgICAgIGlkPSJzdG9wODAyNyIgLz4KICAgIDwvbGluZWFyR3JhZGllbnQ+CiAgICA8cmFkaWFsR3JhZGllbnQKICAgICAgIGlua3NjYXBlOmNvbGxlY3Q9ImFsd2F5cyIKICAgICAgIHhsaW5rOmhyZWY9IiNsaW5lYXJHcmFkaWVudDgwMjMiCiAgICAgICBpZD0icmFkaWFsR3JhZGllbnQ4MDI5IgogICAgICAgY3g9IjI0NC4zNzEwNSIKICAgICAgIGN5PSIzNDAuMDI0NDgiCiAgICAgICBmeD0iMjQ0LjM3MTA1IgogICAgICAgZnk9IjM0MC4wMjQ0OCIKICAgICAgIHI9IjguNDg2ODYwOSIKICAgICAgIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoLTAuMTI4MTkzOSwtMS4wNDE2NjM2LDAuOTY4Njc3MSwtMC4xMjYwOTgsLTUzLjE3MDE4Myw2MzYuMzMxNTkpIgogICAgICAgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIC8+CiAgICA8bGluZWFyR3JhZGllbnQKICAgICAgIGlua3NjYXBlOmNvbGxlY3Q9ImFsd2F5cyIKICAgICAgIHhsaW5rOmhyZWY9IiNsaW5lYXJHcmFkaWVudDgwMjMiCiAgICAgICBpZD0ibGluZWFyR3JhZGllbnQ5MDI2IgogICAgICAgeDE9IjI5NS4wMjU3OSIKICAgICAgIHkxPSIxODAuNzYyNzQiCiAgICAgICB4Mj0iMjIyLjkwMDg4IgogICAgICAgeTI9IjE5Ny4wMjYyIgogICAgICAgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIC8+CiAgPC9kZWZzPgogIDxwYXRoCiAgICAgc29kaXBvZGk6dHlwZT0iYXJjIgogICAgIHN0eWxlPSJvcGFjaXR5OjE7ZmlsbDojZmZmZmZlO2ZpbGwtb3BhY2l0eToxO2ZpbGwtcnVsZTpldmVub2RkO3N0cm9rZTojZmYwMDAwO3N0cm9rZS13aWR0aDo0MDtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6NDtzdHJva2UtZGFzaGFycmF5Om5vbmU7c3Ryb2tlLW9wYWNpdHk6MSIKICAgICBpZD0icGF0aDIxOTkiCiAgICAgc29kaXBvZGk6Y3g9IjI0OS4yNTUxNCIKICAgICBzb2RpcG9kaTpjeT0iMjM0Ljk1ODA3IgogICAgIHNvZGlwb2RpOnJ4PSIyMDkuNjU3MTciCiAgICAgc29kaXBvZGk6cnk9IjE5OS4wNTA1NSIKICAgICBkPSJNIDU1LjIyNDM1NSwxNTkuNTUyMSBBIDIwOS42NTcxNywxOTkuMDUwNTUgMCAxIDEgNTUuMTc2NTY5LDE1OS42NjMwMyIKICAgICBzb2RpcG9kaTpzdGFydD0iMy41MzAxMjI1IgogICAgIHNvZGlwb2RpOmVuZD0iOS44MTI3MDU3IgogICAgIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0wLjc1NDQ3ODYsLTMuNDU4MDY4OCkiCiAgICAgc29kaXBvZGk6b3Blbj0idHJ1ZSIgLz4KICA8cGF0aAogICAgIHN0eWxlPSJmaWxsOnVybCgjbGluZWFyR3JhZGllbnQ5MDI2KTtmaWxsLXJ1bGU6ZXZlbm9kZDtzdHJva2U6bm9uZTtzdHJva2Utd2lkdGg6MXB4O3N0cm9rZS1saW5lY2FwOmJ1dHQ7c3Ryb2tlLWxpbmVqb2luOm1pdGVyO3N0cm9rZS1vcGFjaXR5OjE7ZmlsbC1vcGFjaXR5OjEuMCIKICAgICBkPSJNIDI0Ni45OTYxOSwxMTIuMjc1MDQgQyAyNDYuOTk2MTksMTEyLjI3NTA0IDIyMC44MzMyNCwxMTAuMTUzNzEgMjEzLjc2MjE3LDEyOS4yNDU2IEMgMjA2LjY5MTExLDE0OC4zMzc0OCAyNTEuMjM4ODMsMzAxLjc3OTY1IDI1MS4yMzg4MywzMDEuNzc5NjUgQyAyNTEuMjM4ODMsMzAxLjc3OTY1IDI5Mi42NTYyOCwxNDIuODY5MTQgMjgyLjM1MTUzLDEyNC4yOTU4NSBDIDI3NC4xNTM1LDEwOS41MTk3MiAyNDcuNzAzMjksMTEyLjI3NTA0IDI0Ni45OTYxOSwxMTIuMjc1MDQgeiAiCiAgICAgaWQ9InBhdGg0MTQxIgogICAgIHNvZGlwb2RpOm5vZGV0eXBlcz0iY3Njc2MiIC8+CiAgPHBhdGgKICAgICBzb2RpcG9kaTp0eXBlPSJhcmMiCiAgICAgc3R5bGU9Im9wYWNpdHk6MTtmaWxsOnVybCgjcmFkaWFsR3JhZGllbnQ4MDI5KTtmaWxsLW9wYWNpdHk6MS4wO2ZpbGwtcnVsZTpldmVub2RkO3N0cm9rZTpub25lO3N0cm9rZS13aWR0aDo0MDtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6NDtzdHJva2UtZGFzaGFycmF5Om5vbmU7c3Ryb2tlLW9wYWNpdHk6MSIKICAgICBpZD0icGF0aDUxMTQiCiAgICAgc29kaXBvZGk6Y3g9IjI0MS44MzA1MiIKICAgICBzb2RpcG9kaTpjeT0iMzM4LjkwMjc3IgogICAgIHNvZGlwb2RpOnJ4PSI4LjQ4NTI4MSIKICAgICBzb2RpcG9kaTpyeT0iOC44Mzg4MzQ4IgogICAgIGQ9Ik0gMjMzLjk3NzY3LDMzNS41NTQzNyBBIDguNDg1MjgxLDguODM4ODM0OCAwIDEgMSAyMzMuOTc1NzQsMzM1LjU1OTMiCiAgICAgc29kaXBvZGk6c3RhcnQ9IjMuNTMwMTIyNSIKICAgICBzb2RpcG9kaTplbmQ9IjkuODEyNzA1NyIKICAgICBzb2RpcG9kaTpvcGVuPSJ0cnVlIgogICAgIHRyYW5zZm9ybT0ibWF0cml4KDMuMjQ5NTgxMiwwLDAsMy4xNTk2MDQ3LC01MzUuOTMzNjIsLTcyMy40MTA3NSkiIC8+Cjwvc3ZnPgo=" alt="Error" style="width: 60%; max-width: 256px; min-width: 64px" />
                <div style="margin-top: 40px">
                    <h2 class="title">An error has occurred!</h2>
                    <h2 class="title" style="color:red"><?php echo htmlspecialchars($_GET['error'] ?: 'An unknown error has occurred. '); ?></h2>
                    <a href="/pages/contact.html" class="mt-2 button is-primary">Back to Contact page</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
exit;
}

if($_GET['success']) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Contact form
            </h1>
            <div class="has-text-centered">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNjQgNjQiPjxwYXRoIGQ9Ik0zMiwyQzE1LjQzMSwyLDIsMTUuNDMyLDIsMzJjMCwxNi41NjgsMTMuNDMyLDMwLDMwLDMwYzE2LjU2OCwwLDMwLTEzLjQzMiwzMC0zMEM2MiwxNS40MzIsNDguNTY4LDIsMzIsMnogTTI1LjAyNSw1MAoJbC0wLjAyLTAuMDJMMjQuOTg4LDUwTDExLDM1LjZsNy4wMjktNy4xNjRsNi45NzcsNy4xODRsMjEtMjEuNjE5TDUzLDIxLjE5OUwyNS4wMjUsNTB6IiBmaWxsPSIjNDNhMDQ3Ii8+PC9zdmc+Cg==" alt="Success" style="width: 60%; max-width: 256px; min-width: 64px" />
                <div style="margin-top: 40px">
                    <h2 class="title">You message has been received. </h2>
                    <h2 class="title">We will reply to you very soon!</h2>
                    <a href="/" class="mt-2 button is-primary">Back to Home page</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
exit;
}