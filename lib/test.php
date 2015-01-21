<?
require_once '/phpmailer/PHPMailerAutoload.php';
$results_messages = array();
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
class phpmailerAppException extends phpmailerException {}
try {
    $to = 'ants293@gmail.com';
    if(!PHPMailer::validateAddress($to)) {
        throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
    }
    $mail->isSMTP();
    $mail->SMTPDebug  = 2;
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = EMAIL_PORT;
    $mail->SMTPSecure = EMAIL_SSL ? "ssl" : false;
    $mail->SMTPAuth   = EMAIL_AUTH;
    $mail->Username   = EMAIL_USERNAME;
    $mail->Password   = EMAIL_PASSWORD;
    $mail->addReplyTo(EMAIL_EMAIL, EMAIL_NAME);
    $mail->From       = EMAIL_EMAIL;
    $mail->FromName   = EMAIL_EMAIL;
    $mail->addAddress(EMAIL_EMAIL, EMAIL_NAME);
    $mail->Subject  = "Tere";
    $body = <<<'EOT'
Tere!
EOT;
    $mail->WordWrap = 80;
    $mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
    try {
        $mail->send();
        $results_messages[] = "Message has been sent using SMTP";
    }
    catch (phpmailerException $e) {
        throw new phpmailerAppException('Unable to send to: ' . $to. ': '.$e->getMessage());
    }
}
catch (phpmailerAppException $e) {
    $results_messages[] = $e->errorMessage();
}
if (count($results_messages) > 0) {
    echo "<h2>Run results</h2>\n";
    echo "<ul>\n";
    foreach ($results_messages as $result) {
        echo "<li>$result</li>\n";
    }
    echo "</ul>\n";
}