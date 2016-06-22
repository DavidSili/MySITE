<?php
if (isset($_GET['lang'])) $language=$_GET['lang'];
else {
    $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($language != 'sr') $language='sr';
    /**
     * Kako budem dodavao prevode tako ću i ovde da dodam jezike. Kasnije će default biti 'en'
     */
}
include('../config.php');
include('../languages/'.$language.'.php');
$sitepos="portfolio";
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
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jR3DCarousel.js"></script>
</head>
<body>
<nav><?php include('../views/toolbar.php');?></nav>
<?php include('../models/port_load.php');?>
<div id="wrapbig">
    <?php
    while($row = $port_thumbs->fetch(PDO::FETCH_ASSOC)) {
        echo '<section class="portfolio_container" onclick="show('.$row["ID"].')">
            <div class="port_innerbox">
                <h1>'.$row["name"].'</h1>
                <img src="'.$row["thumbnail"].'" />
                <div class="port_innerboxP">
                    <p>'.$row["short"].'</p>
                </div>
            </div>
        </section>
        <div id="ov'.$row["ID"].'" class="overlay">
            <section class="ov_text">
                <div class="ov_head">
                    <img src="images/close.gif" onclick="close('.$row["ID"].')" />
                    <h1>'.$row["name"].'</h1>
                    <div class="ov_btnbox">';
                        if (isset($row['github'])) echo '<a href="'.$row['github'].'" title="'.lang('OV_PROJGITHUB').'" target="_BLANK"><img src="images/ico2_git.gif" /></a>';
                        if (isset($row['demo'])) echo '<a href="'.$row['demo'].'" target="_BLANK">'.lang('OV_PROJDEMO').'</a>';
                    echo '</div>
                </div>
                <p>'.$row["longer"].'</p>
            </section>
            <section class="ov_show">';
                if ($row['pictures'][0]=="{") {
                echo '<div class="ov_carousel, carousel-demo'.$row["ID"].'"></div>
                <script> var slides'.$row["ID"].' = ['.$row["pictures"].'];
                $(\'.carousel-demo'.$row["ID"].'\').jR3DCarousel({
                width : 1366,
                height: 768,
                slides: slides'.$row["ID"].',
                animation: "slide3D",
                animationCurve: \'ease-in-out\',
                animationDuration: 700,
                animationInterval: 4000,});</script>';
                }
                else {
                    echo '<img class="ov_singleimage" src="'.$row['pictures'].'" />';
                }
            echo '</section>
        </div>';
    }
    ?>
</div>
<footer><?php include('../views/footer.php');?></footer>
<script>
function show(id) {
    var krupno = document.getElementById("ov"+id);
    krupno.style.display="block";
}
function close(id) {
    alert ('kliknuto');
    var krupno = document.getElementById("ov"+id);
    krupno.style.display="none";
}
</script>
</body>
</html>