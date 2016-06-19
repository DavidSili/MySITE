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
<?php include('../models/port_load_thumbs.php');?>
<div id="wrapbig">
    <?php
    while($row = $port_thumbs->fetch(PDO::FETCH_ASSOC)) {
        echo '<section class="portfolio_container">
            <div class="port_innerbox">
                <h1>'.$row["name"].'</h1>
                <img src="'.$row["thumbnail"].'" />
                <div class="port_innerboxP">
                    <p>'.$row["short"].'</p>
                </div>
            </div>
        </section>';
    }
    ?>
</div>

<footer><?php include('../views/footer.php');?></footer>
<script src="js/carouselsettings2.js"></script>
</body>
</html>