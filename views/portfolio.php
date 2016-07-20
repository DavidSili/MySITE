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
$sitepos="portfolio";
?>
<script>
    var language="<?php echo $language; ?>";
</script>
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
    <link rel='stylesheet' media='screen and (max-width: 600px)' href='css/stylep1.css' />
    <link rel='stylesheet' media='screen and (min-width: 601px) and (max-width: 900px)' href='css/stylep2.css' />
    <link rel='stylesheet' media='screen and (min-width: 901px) and (max-width: 1200px)' href='css/stylep3.css' />
    <link rel='stylesheet' media='screen and (min-width: 1201px) and (max-width: 1500px)' href='css/stylep4.css' />
    <link rel='stylesheet' media='screen and (min-width: 1501px)' href='css/stylep5.css' />
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/styletf1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/styletf2.css' />
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
            <div class="port_bcgn">
                <div class="port_innerbox">
                    <h1>'.$row["name"].'</h1>
                    <img src="'.$row["thumbnail"].'" />
                    <div class="port_innerboxP">
                        <p>'.$row["short"].'</p>
                    </div>
                </div>
            </div>
        </section>
        <div id="overlay" class="overlay">
        </div>';
   }
    ?>
</div>
<footer><?php include('../views/footer.php');?></footer>
<script>
var krupno="";
function show(id) {
    krupno = document.getElementById("overlay");
    krupno.style.display="block";
    $.getJSON('models/port_large.php', {id: id, language: language}, function(data) {
        $('#overlay').html(data.pass2html);
    });
}
function closer() {
    krupno = document.getElementById("overlay");
    krupno.style.display="none";
}
$(document).keyup(function(e) {
    if (e.keyCode == 27 && krupno.style.display=="block") closer();
    });
</script>
</body>
</html>