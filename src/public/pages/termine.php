<?php
$app = include_once(__DIR__ . '/../../app/startup.php');

if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "termine");
define("TITLE", "Veranstaltungen");

include_once(__DIR__ . "/../legacy/inc/environment.php");

define("ARCTIME", 120 * DAY);

function writeVAhead()
{
?>
	<table class="termine" cellspacing="0" cellpadding="3" border="0" width="90%" align="center">
		<thead>
			<tr>
				<th width="20%">Datum</th>
				<th width="15%">Zeit</th>
				<th width="40%">Veranstaltung</th>
				<th width="25%">Ort</th>
				<th width="32">&nbsp;</th>
				<th width="32">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php
	}

	function titletext($bystyle)
	{
		switch ($bystyle) {
			case "session":
				return "Jam Session - offene Bühne!";
			case "jazztage":
				return "Im Rahmen der Ingolstädter Jazztage";
			case "youngplayers":
				return "Im Rahmen der Ingolstädter Jazztage";
			default:
				return "";
		}
	}

	function sessionCount()
	{
		global $VADATA;

		if (is_array($VADATA)) {
			return count(array_keys(array_column($VADATA, 'style'), "session"));
		}
		return 0;
	}

	function title($name, $link = "", $info = "", $name2 = "", $name3 = "")
	{
		$link_head = $link_tail = "";
		if (!empty($link)) {
			$link_head = "<a href=\"" . $link . "\" title=\"" . (!empty($info) ? $info : "zur Seite") . "\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">";
			$link_tail = "</a>";
		}
		return $link_head . $name . (!empty($name2) ? "<br /><small>" . $name2 . "</small>" : "") . (!empty($name3) ? "<br /><small>" . $name3 . "</small>" : "") . $link_tail;
	}

	function title_series($event, $name = "", $link = "", $info = "", $name2 = "", $name3 = "", $options = "")
	{
		switch (strtoupper($event)) {
			case "JAZZTAGE":
				$eventName = "Jazztage " . $options;
				break;
			case "SESSION":
				$nSession = sessionCount();
				$eventName = ($nSession > 0 ? $nSession . ". " : "") . "Jam Session";
				break;
			default:
				$eventName = ucFirst($event);
		}
		return title((empty($eventName) ? "" : $eventName) . (empty($name) ?  "" : " - " . $name), $link, $info, $name2, $name3);
	}

	function writeVAfoot()
	{
		?>
		</tbody>
	</table>
<?php
	}

	function writeVA($wannd, $wannt, $was, $wo, $imgid = null, $videolink = null, $style = null)
	{
		$tdstyle = ($style == null || $style == "" ? "" : " class=\"" . $style . "\"");
		$infotip = titletext($style);
		if (stristr($was, "session")) {
			if ($tdstyle == "") $tdstyle = " class=\"session\"";
			else $tdstyle = substr($tdstyle, 0, -1) . " session" . "\""; // Anführungsstriche weg, class dazu, Anführungsstriche wieder hin.

			if ($infotip == "") $infotip = titletext("session");
			else $infotip .= "; " . titletext("session");
		}

		$titletext = ($infotip == "" ? "" : " title=\"" . $infotip . "\"");
?>
	<tr <?= $tdstyle ?>>
		<td <?= $titletext ?>>
			<?= $wannd ?>
		</td>
		<td <?= $titletext ?>>
			<?= $wannt ?>
		</td>
		<th <?= $titletext ?>>
			<?= $was ?>
		</th>
		<td <?= $titletext ?>>
			<?= $wo ?>
		</td>
		<td>
			<?= ($imgid == null || $imgid == "0" || $imgid < 0 || $imgid == "" ? "<img src=\"gfx/empty.png\" height=\"32\" width=\"32\" border=\"0\" alt=\"\" />" : "<a href=\"bilder.php?bilder=" . $imgid . "&amp;via=" . PAGE . "\" title=\"Zu den Bildern\"><img src=\"gfx/dia.png\" height=\"32\" width=\"32\" border=\"0\" alt=\"Bilder\" /></a>") ?>
		</td>
		<td>
			<?= ($videolink == null || $videolink == "" ? "<img src=\"gfx/empty.png\" height=\"32\" width=\"32\" border=\"0\" alt=\"\" />" : "<a href=\"" . $videolink . "\" title=\"Wer ist das?\" target=\"_blank\"><img src=\"gfx/cam.png\" height=\"32\" width=\"32\" border=\"0\" alt=\"Wer ist das?\" /></a>") ?>
		</td>
	</tr>
<?php
	}

	function setVA($wannd, $wannt, $was, $wo, $imgid = null, $videolink = null, $style = null)
	{
		global $VADATA;
		// DATE
		// Alles nach dem letzten Leerschritt
		$xspl = explode(" ", strip_tags($wannd));
		$date = $xspl[count($xspl) - 1];
		//echo "<pre style=\"background:red; color:white;\">" . "date=" . $date . "</pre>";
		$dpts = explode(".", $date);
		if (count($dpts) == 1) { // nur Jahr
			$y = $dpts[0];
			$m = 12;
			$d = 31; // Läuft Ende des Jahres ab...
		} else if (count($dpts) == 2) { // Monat + Jahr -> gibts eigentlich net
			$y = $dpts[1];
			$m = $dpts[0];
			$d = 15; // Läuft Mitte des Monats ab... einfach so.
		} else {
			$y = $dpts[2];
			$m = $dpts[1];
			$d = $dpts[0];
		}
		// TIME
		// Alles nach dem letzten Leerschritt
		$xspl = explode(" ", strip_tags($wannt));
		$time = $xspl[count($xspl) - 1];
		//echo "<pre style=\"background:red; color:white;\">" . "time=" . $time . "</pre>";
		$tpts = explode(":", $time);
		if (count($tpts) < 2) { // kein Datum sondern was anderes -> 23:59
			$h = 23;
			$i = 59;
		} else { // Sekunden sin wurscht, werden eh net angegeben
			$h = $tpts[0] * 1;
			$i = $tpts[1] * 1;
		}

		$timestamp = mktime($h, $i, 59, $m, $d, $y);

		// NEU (20100105): Wochentag bei nur 2 Punkten (= genau ein Tag)
		$cc = count_chars($wannd, 0);
		if ($cc[ord('.')] == 2) {
			$darr = getdate($timestamp);
			$wtag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag");
			$wannd = "<small class=\"wochentag\">" . $wtag[$darr["wday"]] . "</small><br />" . $wannd;
		}

		if (!is_array($VADATA)) $VADATA = array();
		array_push($VADATA, array("timestamp" => $timestamp, "wannd" => $wannd, "wannt" => $wannt, "was" => $was, "wo" => $wo, "imgid" => $imgid, "videolink" => $videolink, "style" => $style));
	}

	function writeVAs()
	{
		global $VADATA;

		if (!is_array($VADATA)) $VADATA = array();

		$VAFUT = array(); // Kommende
		$VAPER = array(); // Vergangene
		$VAARC = array(); // Archiv

		foreach ($VADATA as $V) {
			$ts = $V["timestamp"];
			if ($ts > NOW) { // Kommende
				//        while (isset($VAFUT[$ts])) $ts++;
				//        array_push($VAFUT, $ts => $V);
				array_push($VAFUT, $V);
			} else if ($ts > NOW - ARCTIME) { // Vergangene
				array_push($VAPER, $V);
			} else { // Archiv
				array_push($VAARC, $V);
			}
		}

		ksort($VAFUT);
		krsort($VAPER);
		krsort($VAARC);

?>
	<h2>Kommende Veranstaltungen</h2>
	<?php if (count($VAFUT) == 0) print "<p>Im Moment stehen keine Veranstaltungen an.</p>";
		else { ?>
		<?php writeVAhead() ?>
		<?php
			foreach ($VAFUT as $V) writeVA($V["wannd"], $V["wannt"], $V["was"], $V["wo"], $V["imgid"], $V["videolink"], $V["style"]);
		?>
		<?php writeVAfoot() ?>
	<?php } ?>

	<p>Auch interessant: Das Programm unserer Partner vom <a href="http://www.birdland.de/programm/" target="_blank">Birdland Jazz Club Neuburg</a>!</p>

	<h2>Vergangene Veranstaltungen</h2>
	<?php if (count($VAPER) == 0) print "<p>Es sind keine vergangenen Veranstaltungen eingetragen.</p>";
		else { ?>
		<?php writeVAhead() ?>
		<?php
			foreach ($VAPER as $V) writeVA($V["wannd"], $V["wannt"], $V["was"], $V["wo"], $V["imgid"], $V["videolink"], $V["style"]);
		?>
		<?php writeVAfoot() ?>
	<?php } ?>

	<h2>Archiv</h2>
	<div id="vaarcsw" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;" onclick="document.getElementById('vaarc').style.display = 'block'; document.getElementById('vaarcsw').style.display='none';">Archiv anzeigen</div>

	<div id="vaarc" style="display:none;">
		<?php if (count($VAARC) == 0) print "<p>Es befinden sich keine Veranstaltungen im Archiv.</p>";
		else { ?>
			<?php writeVAhead() ?>
			<?php
			foreach ($VAARC as $V) writeVA($V["wannd"], $V["wannt"], $V["was"], $V["wo"], $V["imgid"], $V["videolink"], $V["style"]);
			?>
			<?php writeVAfoot() ?>
		<?php } ?>

		<div id="vaarcsw" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;" onclick="document.getElementById('vaarc').style.display = 'none'; document.getElementById('vaarcsw').style.display='block';">Archiv verbergen</div>
	</div>

<?php
	}

use \Jazzfreunde\App\Models;

$getVAsFromDatabase = function () use ($app): void
	{
		$termine = new Models\TermineModel($app->DatabaseContext());
		$VAs = $termine->fetch(
			new Models\TermineFilter()
		);

		$newVA = function(\Jazzfreunde\App\DTOs\Termin $termin) {
				$start = new DateTime($termin->start);
			setVA($start->format('d.m.Y'), $start->format('H:i'), $termin->titel, $termin->ort);
		};

		array_walk($VAs, $newVA);
	};

	head();
	before();
?>

<h1>Veranstaltungskalender</h1>

<?php
// include(__DIR__ . "/../data/termine.php");
$getVAsFromDatabase();
writeVAs();
?>

<!-- <h1>Besonderes</h1>
<ul>
	<li><a href="bigbandnacht14.php">Sonderseite zur Big Band Nacht 2014 &amp; Latin Jazz Kurse</a>
	</li>
	<li><a href="jazztage13.php">Sonderseite zu den Jazztagen 2013</a>
	</li>
	<li><a href="jazztage12.php">Sonderseite zu den Jazztagen 2012</a>
	</li>
	<li><a href="jazztage11.php">Sonderseite zu den Jazztagen 2011</a>
	</li>
	<li><a href="jazztage10.php">Sonderseite zu den Jazztagen 2010</a>
	</li>
	<li><a href="jazztage09.php">Sonderseite zu den Jazztagen 2009</a>
	</li>
	<li><a href="jazztage08.php">Sonderseite zu den Jazztagen 2008</a>
	</li>
</ul> -->

<?php
after();
?>