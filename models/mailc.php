<?php
$name = isset($_GET["name"]) ? $_GET["name"] : 0;
$email = isset($_GET["email"]) ? $_GET["email"] : 0;
$other = isset($_GET["other"]) ? $_GET["other"] : 0;
$url = isset($_GET["url"]) ? $_GET["url"] : 0;
$message = isset($_GET["message"]) ? $_GET["message"] : 0;

include '../config.php';

$content='Ime: '.$name.'\r\nE-mail'.$email.'\r\nOstale kontakt informacije:'.$other.'\r\nPoruka:\r\n'.$message;
$headers='From: '.$name.' <'.$email.'>\r\n';
$headers.='MIME-Version: 1.0\r\n';
$headers.='Content-type: text/html; charset=UTF-8\r\n';
$headers.='Reply-to: '.$name.' <'.$email.'>\r\n';


if(isset($_POST['url']) && $_POST['url'] == ''){
    mail( 'agapetos@gmail.com', 'Poruka sa moje stranice: Contact form', $content, $headers);
}