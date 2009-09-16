<?php
header("Location: thankyou.html");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$name = $_POST['Name'];
$phone = $_POST['Telephone'];
$email = $_POST['Email'];
$message = $_POST['Message'];
$body = "Name: $name\r\nPhone: $phone\r\nE-Mail: $email\r\nMessage: $message";
$mailsent = mail('john@elitemaf.com', 'Contact US Form', $body, "From: $email");
echo $mailsent;
?>
</body>
</html>