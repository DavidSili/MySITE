<?php
if (isset($_GET['lang'])) $language=$_GET['lang'];
else {
    $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($language != 'sr') $language='sr';
    /**
     * Kako budem dodavao prevode tako ću i ovde da dodam jezike. Kasnije će default biti 'en'
     */
}
include('languages/'.$language.'.php');
include('config.php');
$sitepos="index";
?>

<!doctype html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <title><?php echo lang('TITLE');?></title>
    <link rel="icon"
          type="image/png"
          href="images/favicon.gif">
    <meta name="description" content="<?php echo lang('DESCRIPTION');?>">
    <meta name="author" content="<?php echo lang('AUTHOR');?>">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav><?php include('views/toolbar.php');?></nav>

<footer></footer>
<script src=""></script>
</body>
</html>