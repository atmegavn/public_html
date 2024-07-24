<?php 
// print_r($_POST);
// print_r($_FILES);

error_reporting(0);

if(!$_POST['h-captcha-response']) {
    header('Location: index.php?error=' . rawurlencode('Please complete the CAPTCHA check!'), true, 302); exit;
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
        header('Location: index.php?error=' . rawurlencode('Please complete the CAPTCHA check!'), true, 302); exit;
	}
}

if(!$_POST['title'] || !$_POST['first_name'] || !$_POST['last_name'] || !$_POST['organization'] || !$_POST['address'] || !$_POST['city'] || !$_POST['country'] || !$_POST['consent_publish_photos'] || !$_POST['wants_presentation'] || !$_POST['fee_category']) {
    header('Location: index.php?error=' . rawurlencode('Not all required fields have been filled!'), true, 302); exit;
}

/*
if($_FILES['abstract']['name']) {
    $extension = strtolower(end(explode('.', trim($_FILES['abstract']['name'], '.'))));
    if(!in_array($extension, [ 'pdf', 'doc', 'docx', 'odt', 'zip', 'rar', 'gz', 'tar', '7z' ])) {
        header('Location: index.php?error=' . rawurlencode('Attached file type is not allowed!'), true, 302); exit;
    }
    if($_FILES['abstract']['size'] > 20 * 1024 * 1024) {
        header('Location: index.php?error=' . rawurlencode('Attached file type is too big!'), true, 302); exit;
    }
    $attachment_name = $_FILES['abstract']['name'];
    $attachment_file = __DIR__ . '/../uploads/' . sha1(time() . rand() . $_FILES['abstract']['name']) . '.' . $extension;
    $attachment_url = 'https://mme-see.org/uploads/' . basename($attachment_file);
    move_uploaded_file($_FILES['abstract']['tmp_name'], $attachment_file);
}
*/

$email_contents = '================== NEW REGISTRATION FOR MME SEE CONFERENCE ==================' . "\r\n";
$email_contents .= 'Name: ' . $_POST['title'] . ' ' . $_POST['first_name'] . ' ' . $_POST['last_name'] . "\r\n";
$email_contents .= 'Organization: ' . $_POST['organization'] . "\r\n";
$email_contents .= 'Address: ' . $_POST['address'] . "\r\n";
$email_contents .= 'City: ' . $_POST['city'] . "\r\n";
$email_contents .= 'Email: ' . $_POST['email'] . "\r\n";
$email_contents .= 'Country: ' . $_POST['country'] . "\r\n";
$email_contents .= 'Agree that photos can be published on the website of the conference? ' . ($_POST['consent_publish_photos'] == 'agree' ? 'Yes' : 'No') . "\r\n";
$email_contents .= 'Wants to participate: ' . ($_POST['wants_presentation'] == 'no_presentation' ? 'Without presentation' : 'With oral or poster presentation') . "\r\n";
$email_contents .= 'Fee category: ' . ($_POST['fee_category'] == 'student' ? 'Student fee' : 'Regular fee') . "\r\n";
$email_contents .= 'Facultative excursion: ' . ($_POST['optional_facultative_excursion'] == 'Visting Boka Kotorska' ? 'Visting Boka Kotorska' : 'No') . "\r\n";
$email_contents .= 'Hotel Leotar booking: ' . $_POST['hotel_leotar'] . "\r\n";
$email_contents .= 'Remarks: ' . ($_POST['remarks'] ?: 'None') . "\r\n";
$email_contents .= 'Gift code: ' . ($_POST['gift_code'] ?: 'None') . "\r\n";
// $email_contents .= 'Attachments: ' . ($attachment_url ? $attachment_name . ' - ' . $attachment_url : 'None') . "\r\n";

$msg_subject = 'New registration on MME SEE conference [' . date('Y-m-d H:i:s') . ']';
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

header('Location: success.php', true, 302); exit;

/*
Array
(
    [title] => Dr.
    [first_name] => name
    [last_name] => lastname
    [organization] => org
    [address] => address
    [city] => city
    [state] => state
    [email] => email@email.com
    [consent_publish_photos] => agree
    [wants_presentation] => no_presentation
    [fee_category] => participant
    [optional_facultative_excursion] => Visting Boka Kotorska
    [hotel_leotar] => Single bed
    [remarks] => remarks
    [gift_code] => code
)
Array
(
    [abstract] => Array
        (
            [name] => sms042024.csv
            [type] => text/csv
            [tmp_name] => /tmp/phprAZ9nY
            [error] => 0
            [size] => 41605
        )

)
*/