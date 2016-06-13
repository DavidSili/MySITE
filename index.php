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
    <?php echo $base; ?>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jR3DCarousel.js"></script>
</head>
<body id="body_index">
<nav><?php include('views/toolbar.php');?></nav>

<div id="index_wrapbig">
    <section id="index_wrap">
        <div class="index_innersections">
            <div id="index_zanimanje"><?php echo lang('INDEX1');?></div>
            <div id="index_znanja"><?php echo lang('INDEX2');?></div>
            <h1><a href="views/availability.php" alt="<?php echo lang('AVAILABILITY');?>"><?php echo lang('AVAILABILITY');?></a></h1>
            <p><?php echo lang('INDEX3');?></p>
            <h1><?php echo lang('INDEX4');?></h1>
            <p><?php echo lang('INDEX5');?></p>
            <h1><?php echo lang('INDEX6');?></h1>
            <p><?php echo lang('INDEX7');?></p>
        </div>
    </section>
    <section id="index_showcase">
        <div class="index_innersections">
            <h1><?php echo lang('SAMPLE_PROJECTS');?></h1>
            <div id="carousel" class="carousel-demo"></div>
        </div>
    </section>
</div>

<footer><?php include('views/footer.php');?></footer>
<script src="js/carouselsettings1.js"></script>
</body>
</html>