<?php
define("PAGE", "termine");
define("TITLE", "Veranstaltungen");

include_once(__DIR__ . "/../legacy/inc/environment.php");
$termine_list = $app->Include('termine_list');

head();
before();

?>
<h1>Veranstaltungskalenderer</h1>
<?php

$termine_list();

after();
?>