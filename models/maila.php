<?php
$name = isset($_GET["name"]) ? $_GET["name"] : 0;
$email = isset($_GET["email"]) ? $_GET["email"] : 0;
$other = isset($_GET["other"]) ? $_GET["other"] : 0;
$when = isset($_GET["when"]) ? $_GET["when"] : 0;
$message = isset($_GET["message"]) ? $_GET["message"] : 0;

include('../../includes/mysite/config.php');

$content='Ime: '.$name.' - E-mail: '.$email.' - Ostale kontakt informacije: '.$other.' - Za kada: '.$when.' - Poruka: '.$message;

if(isset($_GET['url']) && $_GET['url'] == NULL) {
    mail("agapetos@gmail.com", "Poruka sa moje stranice: Availability form", $content, "From: MySITE <contact@davidsili.com>");
}