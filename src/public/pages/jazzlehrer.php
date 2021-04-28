<?php
require_once('../legacy.php');

if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "jazzlehrer");
define("TITLE", "Verzeichnis der Jazzlehrer");

include_once(legacy("inc/environment.php"));

head();
before("autoload_jazzlehrer()");

function killmail($email)
{ # Macht eine Mail-Adressse so kaputt, dass die Bots damit nix anfangen können (ersetzt @ zu ät und . zu punkt)
	$email = str_replace("@", " ät ", $email);
	$email = str_replace(".", " punkt ", $email);
	return $email;
}

function write_lehrer($name, $instrument, $musikschule, $telefon, $email = null, $homepage = null)
{ # Schreibt eine Zeile ins Jazzlehrerverzeichnis
?>

	<tr>
		<th>
			<?=$name ?>
		</th>
		<td>
			<?=$instrument ?>
		</td>
		<td>
			<?=($musikschule ? $musikschule : "–") ?>
		</td>
		<td>
			<?=($telefon ? $telefon : "–") ?>
		</td>
		<td class="email">
			<?=($email ? killmail($email) : "–") ?>
		</td>
		<td>
			<?=($homepage ? "<a href=\"" . $homepage . "\" title=\"" . $homepage . "\"><img src=\"gfx/icons/default.png\" alt=\"\" height=\"16\" width=\"16\" /></a>" : "&nbsp;") ?>
		</td>
	</tr>

<?php
}


?>

<h1>Verzeichnis der Jazzlehrer in der Region</h1>

<p>Der Verein der Jazzfreunde Ingolstadt bekommt immer mehr Anfragen bezüglich Instrumentallehrer (auch Gesang), die sich berufen fühlen, interessierte Schüler in die Welt des Jazz einzuführen. Deshalb entstand die Idee, die Kontaktadressen von Lehrer(innen) der Region zu sammeln, die das Wesentliche des Jazz im Unterricht vermitteln könnten. Dazu gehören u. a.: Jazzimprovisation / -rhythmik / -phrasierung / -harmonik / -skalen / -spieltechniken / -sound / ...</p>

<table id="jazzlehrer" cellspacing="0" cellpadding="3" border="0" width="90%" align="center">
	<thead>
		<tr>
			<th>Name</th>
			<th>Instrument</th>
			<th>Musikschule</th>
			<th>Telefon</th>
			<th id="mailhead">E-Mail</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php
		write_lehrer("Ertl, Josef", "Klavier", null, null, "josef.ertl@gmx.de");
		write_lehrer("Espinosa, Alexander Kraus", "Gitarre<br />E-Gitarre", null, "0170 3431248", "alex.espinosa@online.de");
		//write_lehrer("Frank, Oliver", "Klavier", "Ettinger Musikschule", "0841 9930080");
		//write_lehrer("Griener, Bettina", "Gesang", "Musikschule Ingolstadt,<br />Turm Baur", "0841 3051900");
		write_lehrer("Haunsperger, Tobias", "Schlagzeug", "Ettinger Musikschule", null, "loddi91@gmx.de");
		//write_lehrer("Henrichs, Klaus", "Saxophon<br />Klarinette", "Musikschule Kornprobst", "0176 21011089<br />0841 35890");
		//write_lehrer("Kister, Sebastian", "Gitarre", "Musikschule Kornprobst", "0841 35890");
		//write_lehrer("Messias, Adam", "Schlagzeug", "Musikschule Kornprobst", "0841 35890");
		write_lehrer("Philipp, Basti", "E-Bass", "Ettinger Musikschule", "0841 9930080");
		write_lehrer("Rakosi, Joszef", "Saxophon (Alt, Sopran)<br />Klarinette<br />Flöte<br />Violine", "Musikschule Kornprobst<br />Ettinger Musikschule", "0841 35890<br />0841 9930080", null, "http://www.kunst-musik-rakosi.de");
		write_lehrer("Reitberger, Bernhard", "Schlagzeug<br />Vibraphon<br />Marimbaphon", null, "08432 1720", "Bernie64@freent.de");
		write_lehrer("Rissmann, Gunther", "Kontrabass<br />E-Bass", null, null, "info@der-rissmann.de", "http://www.der-rissmann.de");
		write_lehrer("Stöckl, Armin", "Schlagzeug<br />Cajon", null, "0152 01935928", "armin94@hotmail.com");
		write_lehrer("Trögl, Rudi", "Gitarre", null, "0841 940887", "RudolfRTBZ@aol.com", "http://www.rudi-troegl.de");
		write_lehrer("Viale, Benjamin", "Schlagzeug", "Musikschule Ingolstadt,<br />Turm Baur", "0163 3315302<br />0841 3051900", "vialetime@web.de", "http://www.myspace.com/benjaminviale");
		write_lehrer("Von Obernitz, Michael", "Gitarre<br />Bass<br />Schlagzeug<br />Ukulele", "Basement Performing Arts Tanzstudio 1", "0174 6116735", "studio@michaelvonobernitz.com", "https://michaelvonobernitz.business.site/")


		?>
	</tbody>
	<tfoot>

	</tfoot>
</table>

<!--p>Auch Jazzlehrer in der Region, aber nicht in der Liste? Einfach eine Mail mit den Daten an <a href="kontakt.php?to=aichner">Robert Aichner</a> senden. Bitte auch die Adresse mitgeben, diese wird jedoch nicht auf der Homepage veröffentlicht und dient zur direkten Kontaktaufnahme durch den Verein.</p-->


<?php
after();
?>