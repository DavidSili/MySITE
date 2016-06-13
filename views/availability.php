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
$sitepos="availability";
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
</head>
<body id="body_avail">
<nav><?php include('../views/toolbar.php');?></nav>

<div id="avail_wrapbig">
    <section id="avail_text">
        <h1><?php echo lang('USUAL_AVAIL')?></h1>
        <p><?php echo lang('AVAIL_TEXT')?></p>
        <fieldset id="avail_form">
            <legend><?php echo lang('AVAIL_PLACEHOLDER') ?></legend>
            <input type="text" id="avail_name" placeholder="<?php echo lang('AVAIL_NAME'); ?>" title="<?php echo lang('AVAIL_NAME'); ?>"/><br>
            <input type="text" id="avail_email" placeholder="<?php echo lang('AVAIL_EMAIL'); ?>" title="<?php echo lang('AVAIL_EMAIL'); ?>"/><br>
            <input type="text" id="avail_other" placeholder="<?php echo lang('AVAIL_OTHER'); ?>" title="<?php echo lang('AVAIL_OTHER'); ?>"/><br>
            <input type="text" id="avail_when" placeholder="<?php echo lang('AVAIL_WHEN'); ?>" title="<?php echo lang('AVAIL_WHEN'); ?>"/><br>
            <textarea id="avail_message" placeholder="<?php echo lang('AVAIL_MESSAGE'); ?>" title="<?php echo lang('AVAIL_MESSAGE'); ?>" rows="4"></textarea><br>
            <input id="avail_send" type="button" value="<?php echo lang('AVAIL_SEND'); ?>" onclick="sendAvail()" />
        </fieldset>
    </section>
    <section id="avail_calendar">
        <iframe src="https://calendar.google.com/calendar/embed?title=<?php echo lang('CALENDAR_TITLE'); ?>&amp;height=500&amp;wkst=1&amp;hl=<?php echo $language; ?>&amp;bgcolor=%23FFFFFF&amp;src=00vpml18md0km2i9rkel4vdm7k%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FBelgrade" style="border-width:0" width="600" height="400" frameborder="0" scrolling="no"></iframe>
    </section>
</div>

<footer><?php include('../views/footer.php');?></footer>
</body>
</html>