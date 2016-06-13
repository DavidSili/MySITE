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
$sitepos="contact";
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
<body id="body_avail">
<nav><?php include('../views/toolbar.php');?></nav>

<div id="contact_wrapbig">
    <section id="contact_text">
        <div class="contact_innersections">
            <h1><?php echo lang('CONTACT_SENDMESSAGE')?></h1>
            <p><?php echo lang('CONTACT_TEXT')?></p>
            <fieldset id="contact_form">
                <legend><?php echo lang('CONTACT_PLACEHOLDER') ?></legend>
                <input type="text" id="contact_name" placeholder="<?php echo lang('AVAIL_NAME'); ?>" title="<?php echo lang('AVAIL_NAME'); ?>"/><br>
                <input type="text" id="contact_email" placeholder="<?php echo lang('AVAIL_EMAIL'); ?>" title="<?php echo lang('AVAIL_EMAIL'); ?>"/><br>
                <input type="text" id="contact_other" placeholder="<?php echo lang('AVAIL_OTHER'); ?>" title="<?php echo lang('AVAIL_OTHER'); ?>"/><br>
                <textarea id="contact_message" placeholder="<?php echo lang('AVAIL_MESSAGE'); ?>" title="<?php echo lang('AVAIL_MESSAGE'); ?>" rows="4"></textarea><br>
                <input id="contact_send" type="button" value="<?php echo lang('AVAIL_SEND'); ?>" onclick="sendContact()" />
            </fieldset>
        </div>
    </section>
    <section id="contact_info">
        <div class="contact_innersections">
            <a href="mailto:agxapetoxs@gmxail.com" onmouseover="this.href=this.href.replace(/x/g,'');" >agapetos@<span class="displaynone">null</span>gmail.com</a>
        </div>
    </section>
</div>

<footer><?php include('../views/footer.php');?></footer>
<script src="js/carouselsettings2.js"></script>
</body>
</html>