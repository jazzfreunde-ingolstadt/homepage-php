<?php
define("PAGE", "termine");
define("TITLE", "Veranstaltungen");

include_once(__DIR__ . "/../legacy/inc/environment.php");

use \Jazzfreunde\App\Models;

try {
	$termine = new Models\TermineModel($app->DatabaseContext());
	$VAs = $termine->fetch(
		new Models\TermineFilter()
	);
} catch (Exception $e) {
	$termine = [];
}

head();
before();
?>

<h1>Veranstaltungskalenderer</h1>

<?php
after();
?>