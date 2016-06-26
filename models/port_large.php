<?php
$id = isset($_GET["id"]) ? $_GET["id"] : 0;
$language = isset($_GET["language"]) ? $_GET["language"] : 0;
include '../config.php';
include('../languages/'.$language.'.php');

$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4', $dbusername, $dbpassword);
$port_thumbs = $db->query('SELECT
  ID,
  name,
  pictures,
  long_'.$language.' longer,
  github,
  demo
FROM
  portfolio
WHERE ID = "'.$id.'"');

$row = $port_thumbs->fetch(PDO::FETCH_ASSOC);
$send='<section class="ov_textbox">
            <div class="ov_head">
                <img class="ov_closer" src="images/close.gif" onclick="closer()" />
                <h1>'.$row["name"].'</h1>
                <div class="ov_btnbox">';
                    if (isset($row['github'])) $send.='<a href="'.$row['github'].'" title="'.lang('OV_PROJGITHUB').'" target="_BLANK"><img src="images/ico2_git.gif" /></a>';
                    if (isset($row['demo'])) $send.='<a href="'.$row['demo'].'" target="_BLANK">'.lang('OV_PROJDEMO').'</a>';
                $send.='</div>
            </div>
            <div class="ov_text">'.$row["longer"].'</div>
        </section>
        <section class="ov_show">';
            if ($row['pictures'][0]=="{") {
                $send.='<div id="car'.$row["ID"].'" class="ov_carousel, carousel-demo'.$row["ID"].'"></div>
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
                $send.= '<img class="ov_singleimage" src="'.$row['pictures'].'" />';
            }
        $send.='</section>';

$passhtml['pass2html']=$send;
echo json_encode($passhtml);
