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
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jR3DCarousel.js"></script>
</head>
<body>
<nav><?php include('views/toolbar.php');?></nav>

<section id="index_wrap">
    <div id="index_innersections">
        <div id="index_zanimanje"><?php echo lang('INDEX1');?></div>
        <div id="index_znanja"><?php echo lang('INDEX2');?></div>
        <div><h1><?php echo lang('AVAILABILITY');?></h1></div>
        <div><?php echo lang('INDEX3');?></div>
        <div><h1><?php echo lang('INDEX4');?></h1></div>
        <div><?php echo lang('INDEX5');?></div>
        <div><h1><?php echo lang('INDEX6');?></h1></div>
        <div><?php echo lang('INDEX7');?></div>
    </div>
</section>
<section id="index_showcase">
    <div id="index_innersections">
        <div id="carousel" class="carousel-demo"></div>
    </div>
</section>

<footer></footer>
<script src="">
    alert('hello!');
    console.log('A');
    var slides = [
        {src: 'images/carousel1.jpg'},
        {src: 'images/carousel2.jpg'},
        {src: 'images/carousel3.jpg'},
        {src: 'images/carousel4.jpg'},
    ];
    console.log('B');
    $('.carousel-demo').jR3DCarousel({
        width : 600,
        height: 450,
        slides: slides,
        animation: "slide3D"
    });
    console.log('C');
</script>
</body>
</html>