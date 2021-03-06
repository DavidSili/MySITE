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
    <meta name=viewport content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;'>
    <?php echo $base; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/stylei1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/stylei2.css' />
    <link rel='stylesheet' media='screen and (max-width: 555px)' href='css/styletfm.css' />
    <link rel='stylesheet' media='screen and (min-width: 556px) and (max-width: 700px)' href='css/styletf1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/styletf2.css' />
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jR3DCarousel.js"></script>
</head>
<body id="body_index">
<nav><?php include('toolbar.php');?></nav>

<div id="wrapbig">
    <div id="wrapsmall">
        <section id="index_wrap">
            <div class="innersections">
                <div id="index_zanimanje"><?php echo lang('INDEX1');?></div>
                <div id="index_znanja"><?php echo lang('INDEX2');?></div>
                <h1><a href="availability.php" alt="<?php echo lang('AVAILABILITY');?>"><?php echo lang('AVAILABILITY');?></a></h1>
                <p><?php echo lang('INDEX3');?></p>
                <h1><?php echo lang('INDEX4');?></h1>
                <p><?php echo lang('INDEX5');?></p>
                <h1><?php echo lang('INDEX6');?></h1>
                <p><?php echo lang('INDEX7');?></p>
            </div>
        </section>
        <section id="index_showcase">
            <div class="innersections">
                <h1><?php echo lang('SAMPLE_PROJECTS');?></h1>
                <div class="carousel, carousel-demo"></div>
                <script src="js/carouselsettings1.js"></script>
            </div>
         </section>
    </div>
</div>
<footer><?php include('footer.php');?></footer>
</body>
</html>
