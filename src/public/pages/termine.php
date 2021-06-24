<?php
define("PAGE", "termine");
define("TITLE", "Veranstaltungen");

include_once __DIR__."/../legacy/inc/environment.php";
$termineList = $app->Include('termine_list');

head();
before();

?>
<h1>Veranstaltungskalenderer</h1>
<?php

$termineList();

after();
