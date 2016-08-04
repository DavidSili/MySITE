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

include('../../includes/mysite/config.php');
include('../languages/'.$language.'.php');
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
    $stmt = $db->prepare('SELECT
      ID,
      title_'.$language.' title,
      text_'.$language.' text,
      time,
      tags
    FROM
      blog
    WHERE ID = ?');
    if ($stmt->execute(array($article))) $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $sortedtime=date('G:i d.m.Y.',strtotime($row['time']));

    /* kada završim ovo što radim, srediću i tagove da mogu da se pozivaju
    na osnovu tagova i datuma
    $presortedtags=explode(',',$row['tags']);
    */

    ?>

    <!-- Ukoliko je pojedinačni članak -->

        <article>
            <h1><?php echo $row['title'];?></h1>
            <section class="text"><?php echo $row['text'];?></section>
            <div class="time"><?php echo $sortedtime;?></div>
            <section class="share"></section>
            <section class="tags"><?php echo $row['tags'];?></section>
            <section class="disqus"></section>
        </article>

<?php } else {
    $stmt = $db->query('SELECT
      ID,
      title_'.$language.' title,
      text_'.$language.' text,
      time,
      tags
    FROM
      blog
    LIMIT 3');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $sortedtime=date('G:i d.m.Y.',strtotime($row['time']));

    ?>

    <!-- Ukoliko je početna strana bloga -->
            <article>
                <h1><?php echo $row['title'];?></h1>
                <section class="text"><?php echo $row['text'];?></section>
                <div class="time"><?php echo $sortedtime;?></div>
                <section class="share"></section>
                <section class="tags"><?php echo $row['tags'];?></section>
                <section class="disqus"></section>
            </article>

<?php }} ?>
        </div>
        <div id="articlebar">

            <!-- Ovde će ići tagovi, biranje na osnovu godine i biranje pojedinačnih nedavnih članaka -->

        </div>
    </div>

</div>

<footer><?php include('footer.php');?></footer>
</body>
</html>