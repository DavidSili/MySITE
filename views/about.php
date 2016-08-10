<?php
if (isset($_GET['lang'])) $language=$_GET['lang'];
else {
    $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($language != 'sr') $language='sr';
    /**
     * Kako budem dodavao prevode tako ću i ovde da dodam jezike. Kasnije će default biti 'en'
     */
}
include('../../includes/mysite/config.php');
include('../languages/'.$language.'.php');
$sitepos="about";
?>

<!doctype html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <?php echo $base; ?>
    <title><?php echo lang('TITLE');?></title>
    <link rel="icon"
          type="image/png"
          href="images/favicon.gif">
    <meta name="description" content="<?php echo lang('DESCRIPTION');?>">
    <meta name="author" content="<?php echo lang('AUTHOR');?>">
    <meta name=viewport content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;'>
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/stylea1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/stylea2.css' />
    <link rel='stylesheet' media='screen and (max-width: 555px)' href='css/styletfm.css' />
    <link rel='stylesheet' media='screen and (min-width: 556px) and (max-width: 700px)' href='css/styletf1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/styletf2.css' />
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jR3DCarousel.js"></script>
</head>
<body>
<nav><?php include('toolbar.php');?></nav>

<div id="wrapbig">
    <div id="wrapsmall">
        <div class="innersection2">
            <h1><?php echo lang('ABOUT_ME'); ?></h1>
            <p class="veci_tekst"><?php echo lang('ABOUT_TEXT1'); ?></p>
            <div id="mecarousel" class="carousel, carousel-demo"></div>
            <script src="js/carouselsettings2.js"></script>
            <p><?php echo lang('ABOUT_TEXT2'); ?></p>
            <p class="veci_tekst"><?php echo lang('ABOUT_TEXT3'); ?></p>
            <div id="image_container">
                <img id="imgApex" src="images/logoApex.gif" alt="logo apex">
                <img id="imgPF" src="images/logoPathfinder.gif" alt="logo pathfinder">
                <img id="imgLoR" src="images/logoLoR.gif" alt="logo land of roses">
                <img id="imgKZ" src="images/logoKZ.gif" alt="logo klub zdravlja">
            </div>
        </div>
    </div>
</div>

<footer><?php include('footer.php');?></footer>
</body>
</html>