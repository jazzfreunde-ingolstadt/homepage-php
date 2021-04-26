<?php
require_once('../legacy.php');

if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "index");
define("TITLE", "Herzlich Willkommen");

@include(legacy("inc/lock.php"));

if (!@$_GET["preview"] && (!defined("UNLOCKTIME") || UNLOCKTIME > time())) {
  include(legacy("pages/index-locked.html"));
  die("<!-- lock until " . date("d.m.Y H:i:s", UNLOCKTIME) . " -->");
}

include_once(legacy("inc/environment.php"));

head();
before_nomenu();

$c = (@$_GET["c"] ? $_GET["c"] : "se");

function img($type)
{
  global $c;
  return "gfx/start_" . $c . "/start_" . $type . "_ul.png";
}

?>

<table id="introtableau" border="0" cellspacing="0" cellpadding="0" align="center" valign="middle">
  <tbody>
    <tr id="intro_upperlinkline" class="splash_text">
      <td><a id="txt_1a" href="newsletter.php" title="Newsletter" onmouseover="swap('1a', true)" onmouseout="swap('1a', false)">Newsletter &amp; Aktuelles</a></td>
      <td><a id="txt_1b" href="ueberuns.php" title="Über uns" onmouseover="swap('1b', true)" onmouseout="swap('1b', false)">Über uns</a></td>
      <td><a id="txt_1c" href="beitritt.php" title="Mitglied werden" onmouseover="swap('1c', true)" onmouseout="swap('1c', false)">Mitglied werden</a></td>
    </tr>
    <tr id="intro_upperimgline" class="splash_img">
      <td><a href="newsletter.php" title="Newsletter" onmouseover="swap('1a', true)" onmouseout="swap('1a', false)"><img id="img_1a" src="<?php echo img("1a") ?>" alt="" width="250" height="150" border="0" /></a></td>
      <td><a href="ueberuns.php" title="Über uns" onmouseover="swap('1b', true)" onmouseout="swap('1b', false)"><img id="img_1b" src="<?php echo img("1b") ?>" alt="" width="250" height="150" border="0" /></a></td>
      <td><a href="beitritt.php" title="Mitglied werden" onmouseover="swap('1c', true)" onmouseout="swap('1c', false)"><img id="img_1c" src="<?php echo img("1c") ?>" alt="" width="250" height="150" border="0" /></a></td>
    </tr>
    <tr id="intro_lowerimgline" class="splash_img">
      <td><a href="ziele.php" title="Ziele" onmouseover="swap('2a', true)" onmouseout="swap('2a', false)"><img id="img_2a" src="<?php echo img("2a") ?>" alt="" width="250" height="150" border="0" /></a></td>
      <td><a href="projekte.php" title="Projekte" onmouseover="swap('2b', true)" onmouseout="swap('2b', false)"><img id="img_2b" src="<?php echo img("2b") ?>" alt="" width="250" height="150" border="0" /></a></td>
      <td><a href="termine.php" title="Veranstaltungen" onmouseover="swap('2c', true)" onmouseout="swap('2c', false)"><img id="img_2c" src="<?php echo img("2c") ?>" alt="" width="250" height="150" border="0" /></a></td>
    </tr>
    <tr id="intro_lowerlinkline" class="splash_text">
      <td><a id="txt_2a" href="ziele.php" title="Ziele" onmouseover="swap('2a', true)" onmouseout="swap('2a', false)">Ziele</a></td>
      <td><a id="txt_2b" href="projekte.php" title="Projekte" onmouseover="swap('2b', true)" onmouseout="swap('2b', false)">Projekte</a></td>
      <td><a id="txt_2c" href="termine.php" title="Veranstaltungen" onmouseover="swap('2c', true)" onmouseout="swap('2c', false)">Veranstaltungen</a></td>
    </tr>
    <tr id="intro_logotext">
      <td colspan="3" align="center"><a href="ueberuns.php"><img src="gfx/jazzlogotext.png" style="margin:0.5em;" alt="JazzFreunde Ingolstadt e.V." width="190" height="50" border="0" /></a></td>
    </tr>
  </tbody>
</table>


<script type="text/javascript">
  //<!--

  function swap(nr, state) {
    img = document.getElementById('img_' + nr);
    txta = document.getElementById('txt_' + nr);
    if (!img || !img.src || !txta) return;
    img.src = 'gfx/start_<?php echo $c ?>/start_' + nr + '_' + (state ? 'hl' : 'ul') + '.png';
    txta.style.color = (state ? '#242c7f' : '#ee8811');
    txta.style.background = (state ? '#e8c400' : '#242c7f');
  }

  // -->
</script>

<?php
after();
?>