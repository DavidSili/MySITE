<?php
if (isset($_GET['lang'])) $language=$_GET['lang'];
else {
    $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($language != 'sr') $language='sr';
    /**
     * Kako budem dodavao prevode tako ću i ovde da dodam jezike. Kasnije će default biti 'en'
     */
}
include('../models/blog_load.php');
include('../../includes/mysite/config.php');
include('../languages/'.$language.'.php');
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
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/styleb1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px) and (max-width:1000px)' href='css/styleb2.css' />
    <link rel='stylesheet' media='screen and (min-width: 1001px) and (max-width:1200px)' href='css/styleb3.css' />
    <link rel='stylesheet' media='screen and (min-width: 1201px)' href='css/styleb4.css' />
    <link rel='stylesheet' media='screen and (max-width: 555px)' href='css/styletfm.css' />
    <link rel='stylesheet' media='screen and (min-width: 556px) and (max-width: 700px)' href='css/styletf1.css' />
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
            <section class="social">
            </section>
            <section class="text"><?php echo $row['text'];?>
            <div class="time"><?php echo lang('WRITTEN_AT').' '.$sortedTime;?></div></section>
            <section class="share"></section>
            <section class="tags"><?php echo convertTags($row['tags']);?></section>
            <section class="disqus">
                <div id="disqus_thread"></div>
                <script>

                     var disqus_config = function () {
                         this.page.url = "http://www.davidsili.com/blog/<?php echo $language.'/'.$row['ID'];?>";
                         this.page.identifier = "<?php $row['ID'] ?>";
                         this.page.title = "<?php $row['title'] ?>";
                     };
                    (function() {
                        var d = document, s = d.createElement('script');
                        s.src = '//david-sili.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </section>
        </article>

<?php } else {
    // Ukoliko je više članaka

    $loader = new loadRange($language,$db,$type,$tag,$year,$page);
    $data=$loader->get_range();
    foreach ($data as $row) {
        $sortedTime=$loader->sortTime($row['time']);
    ?>
            <article>
                <h1><?php echo $row['title'];?></h1>
                <section class="social">
                </section>
                <section class="text"><?php echo $row['text'];?>
                <div class="time"><?php echo lang('WRITTEN_AT').' '.$sortedTime;?></div></section>
                <section class="share"></section>
                <section class="tags"><?php echo convertTags($row['tags']);?></section>
                <section class="disqus"></section>
            </article>

<?php }}
            if ($type!=4) {
                $pagesel = new pageSelector($language, $type, $page, $year, $tag);
                echo $pagesel->get_pageSel($db);
            }?>
        </div>
        <div id="articlebar">
<?php
    $godine = new showYears($language);
    $tagovi = new showTags($language);
    $others = new showOthers($language);

?>
            <h1><?php echo lang('ARCHIVE_TITLE');?></h1>
            <section id="archiveSpace"><?php echo $godine->prepare_years($db); ?></section>
            <h1><?php echo lang('TAGS');?></h1>
            <section id="tagSpace"><?php echo $tagovi->prepare_tags($db); ?></section>
            <h1><?php echo lang('ALL_ARTICLES');?></h1>
            <section id="artList"><?php echo $others->prepare_others($db); ?></section>
        </div>
    </div>

</div>

<footer><?php include('footer.php');?></footer>
</body>
</html>