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
    <meta name=viewport content='width=540'>
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/stylec1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/stylec2.css' />
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='css/styletf1.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px)' href='css/styletf2.css' />
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jR3DCarousel.js"></script>
</head>
<body id="body_avail">
<nav><?php include('../views/toolbar.php');?></nav>

<div id="wrapbig">
    <div id="wrapsmall">
        <section id="contact_text">
            <div class="innersections">
                <h1><?php echo lang('CONTACT_SENDMESSAGE')?></h1>
                <p><?php echo lang('CONTACT_TEXT')?></p>
                <fieldset id="contact_form">
                    <legend><?php echo lang('CONTACT_PLACEHOLDER') ?></legend>
                    <input type="text" id="contact_name" name="name" autocorrect="off" autocapitalize="words" placeholder="<?php echo lang('AVAIL_NAME'); ?>" title="<?php echo lang('AVAIL_NAME'); ?>"/><br>
                    <input type="text" id="contact_email" name="email" autocorrect="off" placeholder="<?php echo lang('AVAIL_EMAIL'); ?>" title="<?php echo lang('AVAIL_EMAIL'); ?>"/><br>
                    <input type="text" id="contact_other" autocorrect="off" placeholder="<?php echo lang('AVAIL_OTHER'); ?>" title="<?php echo lang('AVAIL_OTHER'); ?>"/><br>
                    <input type="text" id="contact_url" name="url" placeholder="<?php echo lang('AVAIL_URL'); ?>" title="<?php echo lang('AVAIL_URL'); ?>"/>
                    <textarea id="contact_message" name="message" placeholder="<?php echo lang('AVAIL_MESSAGE'); ?>" title="<?php echo lang('AVAIL_MESSAGE'); ?>" rows="4"></textarea><br>
                    <input id="contact_send" type="button" value="<?php echo lang('AVAIL_SEND'); ?>" onclick="sendContact()" />
                </fieldset>
            </div>
        </section>
        <section id="contact_info">
            <div class="innersections">
                <h1 id="contact_naslov"><?php echo lang('CONTACT_ME'); ?></h1>
                <h3 id="contact_subtitle"><?php echo lang('INDEX3'); ?></h3>

                <h2 class="contact1"><?php echo lang('CONTACT_PHONE'); ?></h2><h1 class="contact2"><?php echo lang('CONTACT_PHONENO'); ?></h1>
                <h2 class="contact1"><?php echo lang('CONTACT_EMAIL'); ?></h2><h1 class="contact2"><a href="mailto:agxapetoxs@gmxail.com" onmouseover="this.href=this.href.replace(/x/g,'');" >agapetos@<span class="displaynone">null</span>gmail.com</a></h1>
                <h2 class="contact1"><?php echo lang('CONTACT_SOCIAL'); ?></h2>
                <div>
                    <div class="contact_btns">
                        <a href="https://rs.linkedin.com/in/david-šili-8407752b" target="_blank" title="linkedin">
                            <img src="images/ico2_linkedin.gif" alt="linkedin" />
                        </a>
                        <a href="https://github.com/DavidSili" target="_blank" title="git hub">
                            <img src="images/ico2_git.gif" alt="git hub" />
                        </a>
                        <a href="http://stackoverflow.com/users/988433/agapetos" target="_blank" title="stack overflow">
                            <img src="images/ico2_stack.gif" alt="stack overflow" />
                        </a>
                        <a href="https://www.facebook.com/david.sili" target="_blank" title="facebook">
                            <img src="images/ico2_face.gif" alt="facebook" />
                        </a>
                    </div>
                    <div class="contact_btns">
                        <a href="https://plus.google.com/u/0/117493549919110084778" target="_blank" title="google plus">
                            <img src="images/ico2_google.gif" alt="google plus" />
                        </a>
                        <a href="https://twitter.com/david_sili" target="_blank" title="twitter">
                            <img src="images/ico2_twit.gif" alt="twitter" />
                        </a>
                        <a href="https://www.youtube.com/channel/UCvp2rL5lWOEcAqb5uSf-nOw" target="_blank" title="youtube">
                            <img src="images/ico2_yt.gif" alt="youtube" />
                        </a>
                        <a href="viber://add?number=+38163540484" target="_blank" title="viber">
                            <img src="images/ico2_viber.gif" alt="viber" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<footer><?php include('../views/footer.php');?></footer>
<script>
var msg = lang['MSG_SENT'];
function sendContact() {
    $.getJSON('models/mailc.php', {name: $('#contact_name').val(), email: $('#contact_email').val(), other: $('#contact_other').val(), url: $('#contact_url').val(), message: $('#contact_message').val()}, function(data) {
    });
    $('#contact_name').val("");
    $('#contact_email').val("");
    $('#contact_other').val("");
    $('#contact_url').val("");
    $('#contact_message').val("");
    alert('<?php echo lang('MSG_SENT')?>');
}
</script>
</body>
</html>