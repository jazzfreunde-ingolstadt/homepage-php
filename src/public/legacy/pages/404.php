<?php
if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "satzung");
define("TITLE", "Satzung");

include_once __DIR__ . "/../inc/environment.php";

head();
before();
?>
<h1>Hoppla, da ist wohl was schiefgelaufen... :(</h1>

<?php
after();
?>