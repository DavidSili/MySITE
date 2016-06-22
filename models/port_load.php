<?php
$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4', $dbusername, $dbpassword);
$port_thumbs = $db->query('SELECT
  ID,
  name,
  short_'.$language.' short,
  thumbnail,
  pictures,
  long_'.$language.' longer,
  github,
  demo
FROM
  portfolio
ORDER BY ID ASC');