<?php
if (isset($_GET['lang'])) $language=$_GET['lang'];
else {
    $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($language != 'sr') $language='sr';
    /**
     * Kako budem dodavao prevode tako ću i ovde da dodam jezike. Kasnije će default biti 'en'
     */
}
$article= isset($_GET['article']) ? $_GET['article'] : "";
$tag= isset($_GET['tag']) ? $_GET['tag'] : "";
$year= isset($_GET['year']) ? $_GET['year'] : "";
$page= isset($_GET['page']) ? $_GET['page'] : "";

include('../../includes/mysite/config.php');
include('../languages/'.$language.'.php');
include('../models/blog_load.php');
$sitepos="blog";
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
    <meta name=viewport content='width=540'>
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/stylea1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/stylea2.css' />
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/styletf1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/styletf2.css' />
</head>
<body>
<nav><?php include('toolbar.php');?></nav>

<div id="wrapbig">
    <div id="wrapsmall">
        <div id="articlearea">
<?php

$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4', $dbusername, $dbpassword);

if (isset($_GET['article'])) {
    $loader = new loadArticle($language,$db);
    $row=$loader->get_article($article);
    $sortedTime=$loader->sortTime();

    ?>

    <!-- Ukoliko je pojedinačni članak -->

        <article>
            <h1><?php echo $row['title'];?></h1>
            <section class="text"><?php echo $row['text'];?></section>
            <div class="time"><?php echo $sortedTime;?></div>
            <section class="share"></section>
            <section class="tags"><?php echo $row['tags'];?></section>
            <section class="disqus"></section>
        </article>

<?php } else {
    $loader = new loadRange($language,$db);
    $data=$loader->get_range();
    foreach ($data as $row) {
        $sortedTime=$loader->sortTime($row['time']);
    ?>

    <!-- Ukoliko je početna strana bloga -->
            <article>
                <h1><?php echo $row['title'];?></h1>
                <section class="text"><?php echo $row['text'];?></section>
                <div class="time"><?php echo $sortedTime;?></div>
                <section class="share"></section>
                <section class="tags"><?php echo $row['tags'];?></section>
                <section class="disqus"></section>
            </article>

<?php }} ?>
        </div>
        <div id="articlebar">
<?php
    $godine = new showYears($language);
    $tagovi = new showTags($language);
    $others = new showOthers($language);

?>
            <h1><?php echo lang('ARCHIVE_TITLE');?></h1>
            <section id="archiveSpace"><?php echo $godine->prepare_years($db); ?><div style="clear:both"></div></section>
            <h1><?php echo lang('TAGS');?></h1>
            <section id="tagSpace"><?php echo $tagovi->prepare_tags($db); ?><div style="clear:both"></section>
            <h1><?php echo lang('ALL_ARTICLES');?></h1>
            <section id="artList"><?php echo $others->prepare_others($db); ?><div style="clear:both"></section>
        </div>
    </div>

</div>

<footer><?php include('footer.php');?></footer>
</body>
</html>