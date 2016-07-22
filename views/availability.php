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
    <meta name=viewport content='width=540'>
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (max-width: 900px)' href='css/styleav1.css' />
    <link rel='stylesheet' media='screen and (min-width: 901px)' href='css/styleav2.css' />
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/styletf1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/styletf2.css' />
</head>
<body id="body_avail">
<nav><?php include('../views/toolbar.php');?></nav>

<div id="wrapbig">
    <div id="wrapsmall">
        <section id="avail_text">
            <h1><?php echo lang('USUAL_AVAIL')?></h1>
            <p><?php echo lang('AVAIL_TEXT')?></p>
            <fieldset id="avail_form">
                <legend><?php echo lang('AVAIL_PLACEHOLDER') ?></legend>
                <input type="text" id="avail_name" name="name" autocorrect="off" autocapitalize="words" placeholder="<?php echo lang('AVAIL_NAME'); ?>" title="<?php echo lang('AVAIL_NAME'); ?>"/><br>
                <input type="text" id="avail_email" name="email" autocorrect="off" placeholder="<?php echo lang('AVAIL_EMAIL'); ?>" title="<?php echo lang('AVAIL_EMAIL'); ?>"/><br>
                <input type="text" id="avail_other" autocorrect="off" placeholder="<?php echo lang('AVAIL_OTHER'); ?>" title="<?php echo lang('AVAIL_OTHER'); ?>"/><br>
                <input type="text" id="avail_url" name="url" placeholder="<?php echo lang('AVAIL_URL'); ?>" title="<?php echo lang('AVAIL_URL'); ?>"/>
                <input type="text" id="avail_when" autocorrect="off" name="when" placeholder="<?php echo lang('AVAIL_WHEN'); ?>" title="<?php echo lang('AVAIL_WHEN'); ?>"/><br>
                <textarea id="avail_message" name="message" placeholder="<?php echo lang('AVAIL_MESSAGE'); ?>" title="<?php echo lang('AVAIL_MESSAGE'); ?>" rows="4"></textarea><br>
                <input id="avail_send" type="button" value="<?php echo lang('AVAIL_SEND'); ?>" onclick="sendAvail()" />
            </fieldset>
        </section>
        <section id="avail_calendar">
            <iframe src="https://calendar.google.com/calendar/embed?title=<?php echo lang('CALENDAR_TITLE'); ?>&amp;height=500&amp;wkst=1&amp;hl=<?php echo $language; ?>&amp;bgcolor=%23FFFFFF&amp;src=00vpml18md0km2i9rkel4vdm7k%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FBelgrade" style="border-width:0" width="600" height="400" frameborder="0" scrolling="no"></iframe>
        </section>
    </div>
</div>

<footer><?php include('../views/footer.php');?></footer>
<script>
    function sendAvail() {
        $.getJSON('models/maila.php', {name: $('#avail_name').val(), email: $('#avail_email').val(), other: $('#avail_other').val(), url: $('#avail_url').val(), when: $('#avail_when').val(), message: $('#avail_message').val()}, function(data) {
            alert(lang['MSG_SENT']);
        });
        $('#avail_name').val("");
        $('#avail_email').val("");
        $('#avail_other').val("");
        $('#avail_url').val("");
        $('#avail_when').val("");
        $('#avail_message').val("");
        alert('<?php echo lang('MSG_SENT')?>');
    }
</script>
</body>
</html>