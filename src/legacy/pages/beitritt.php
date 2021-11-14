<?php
if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "beitritt");
define("TITLE", "Mitglied werden");

include_once dirname(__DIR__)."/inc/environment.php";
include_once dirname(__DIR__)."/inc/post.php";

ACCEPT_POST();

head();
before();

?>
<h1>Werden Sie jetzt Mitglied der Jazzfreunde Ingolstadt</h1>

<h2>Warum Mitglied werden?</h2>
<p>Weil Jazz in Ingolstadt IN ist! Dank dem elektronischen Newsletter verpassen Sie keine Jazz-Highlights in der Region mehr. Für einige Veranstaltungen gibt es vergünstigte Karten und es finden regelmäßig Bonuskonzerte für Mitglieder der Jazzfreunde Ingolstadt statt. Und ganz nebenbei unterstützen Sie die Jazzförderung in Ingolstadt.</p>
<!-- Stichpunkte wie auf Beitrittserklärung? -->

<h2>Unsere Sonderaktion – <i>zwei für drei</i></h2>
<p>Sie wollen Mitglied werden, erzählen es Ihren Freunden, und die wollen auch dabei sein? Das muss belohnt werden! Deshalb erlassen wir für Neumitglieder, die mit ihrer Beitrittserklärung gleich zwei weitere unterschriebene Beitrittserklärungen abgeben, für das erste Jahr den Mitgliedsbeitrag! Drucken Sie sich dazu einfach den Bogen mit den drei Beitrittserklärungen aus, füllen Sie ihn aus und schicken Sie ihn uns zu oder – noch besser – bringen Sie ihn zu einer unserer Jam-Sessions immer am dritten Sonntag im Monat mit. <i>Zwei für drei</i> gilt für die normale und ermäßigte Mitgliedschaft sowie für die Familienmitgliedschaft. Notieren Sie einfach auf den Beitrittserklärungen, durch wen Sie geworben wurden bzw. wen Sie geworben haben.</p>

<h2>Firmenmitgliedschaft</h2>
<p>Sie wollen als Firma die Jazzfreunde fördern? Werden Sie Firmenmitglied! Als Mitglied (für 500&nbsp;€ oder mehr im Jahr) werden Sie hier auf unserer Homepage verlinkt. Wer ein Firmenmitglied erfolgreich anwirbt, erhält von uns 1 Jahr Mitgliedschaft spendiert. <small>(Gilt nicht, wenn ein Firmenmitglied eine Firma wirbt)</small></p>

<h2>Mitgliedsbeiträge</h2>
<table id="beitrag" border="0" cellspacing="0" cellpadding="3" align="center">
  <thead>
    <tr>
      <th>Art der Mitgliedschaft</th>
      <th>Beitragshöhe</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Einzelmitgliedschaft</th>
      <td>50,– € pro Jahr</td>
    </tr>
    <tr>
      <th>Ermäßigte Mitgliedschaft<br /><small>für Schüler, Studenten und Auszubildende</small></th>
      <td>20,– € pro Jahr</td>
    </tr>
    <tr>
      <th>Familienmitgliedschaft<br /><small>für Haushalte ab 2 Personen</small></th>
      <td>60,– € pro Jahr</td>
    </tr>
    <tr>
      <th>Firmenmitgliedschaft<br /><small> für juristische Personen</small></th>
      <td>500,– € pro Jahr</td>
    </tr>
  </tbody>
</table>

<h2>Mitgliedsantrag</h2>
<p>Um Mitglied zu werden, drucken Sie doch einfach den <a href="/dox/mitgliedsantrag.pdf">Mitgliedsantrag</a> aus, füllen ihn aus und senden ihn an uns oder geben Sie ihn einfach bei unserer nächsten Veranstaltung bei uns ab. Der erste Jahresbeitrag wird dann von Ihrem Konto abgebucht.</p>
<!--<p>Noch bequemer ist es, die Beitrittserklärung <a href="beitritt-online.php">online auszufüllen</a>. Überweisen Sie anschließend den ersten Jahresbeitrag auf unser Konto.</p>-->
<p>Sobald Sie als Mitglied aufgenommen wurden, wird Ihnen Ihr Mitgliedsausweis elektronisch zugesandt. Die folgenden Jahresbeiträge werden jeweils zum 15. Januar jedes Jahres von Ihrem Konto per SEPA-Lastschrift eingezogen.</p>

<?php
  after();
?>