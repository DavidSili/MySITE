<?php
$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4', $dbusername, $dbpassword);
$port_thumbs = $db->query('SELECT name, short_'.$language.' short, thumbnail  FROM portfolio ORDER BY ID ASC');