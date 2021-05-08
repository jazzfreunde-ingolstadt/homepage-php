<?php
if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "links");
define("TITLE", "Links");

include_once(__DIR__ . "/../inc/environment.php");

head();
before();

define("BOXPERLINE", 2);
$GLOBALS["boxcount"] = 0;
$GLOBALS["boxwidth"] = 100 / BOXPERLINE;

function linkstart()
{
?>
  <table class="linktable" border="0" cellspacing="8" cellpadding="0" width="100%">
  <?php
  $GLOBALS["boxcount"] = 0;
}

function linkend()
{
  while ($GLOBALS["boxcount"] % BOXPERLINE != 0) {
    nobox();
  }
  ?>
  </table>
  <?php
}

function nobox()
{
  if ($GLOBALS["boxcount"] % BOXPERLINE == 0) {
  ?>
    <tr>
    <?php
  }
  $GLOBALS["boxcount"]++;
    ?>
    <td style="width:<?=$GLOBALS["boxwidth"] ?>%;">&nbsp;</td>
    <?php
    if ($GLOBALS["boxcount"] % BOXPERLINE == 0) {
    ?>
    </tr>
  <?php
    }
  }

  function linkbox($name, $url, $icon = null, $banner = null, $htmltext = null)
  {
    if ($GLOBALS["boxcount"] % BOXPERLINE == 0) {
  ?>
    <tr>
    <?php
    }
    $GLOBALS["boxcount"]++;
    ?>
    <td class="kasten link" style="width:<?=$GLOBALS["boxwidth"] ?>%;">
      <div class="link_line"><?php if ($url != null) { ?><a href="http://<?=$url ?>" target="_blank"><img src="gfx/icons/<?=($icon == null || $icon == "" ? "default" : $icon) ?>.png" alt="" height="16" width="16" /></a><?php } else { ?><img src="gfx/empty.png" alt="" height="16" width="16" /><?php } ?>
        <div class="kasten_h1"><?php if ($url != null) { ?><a href="http://<?=$url ?>" target="_blank"><?=$name ?></a><?php } else { ?><?=$name ?><?php } ?></div>
      </div>
      <div class="kasten_h2 small"><?=$url ?></div>
      <div class="kasten_p"><?php if ($banner != null && $banner != "") { ?><div style="text-align:center"><?php if ($url != null) { ?><a href="http://<?=$url ?>" target="_blank"><img src="<?=$banner ?>" alt="" /></a><?php } else { ?><img src="<?=$banner ?>" alt="" /><?php } ?></div><?php } ?><?=($htmltext == null || $htmltext == "" ? "" : $htmltext) ?></div>
    </td>
    <?php
    if ($GLOBALS["boxcount"] % BOXPERLINE == 0) {
    ?>
    </tr>
<?php
    }
  }

?>

<h1>Links rund um Jazz</h1>

<h2>Partner</h2>

<?php linkstart() ?>

<?php linkbox("Bürgertreff Ingolstadt", "www.buergertreff-ingolstadt.de/buergerhaus/index.php", null, null, null) ?>

<?php linkbox("Fachschaft Musik des Reuchlin-Gymnasiums", "www.bingo-ev.de/~sb448/rg/cms/website.php?id=/de/musik.htm", "rgi", null, null) ?>

<?php // linkbox("Hotel Rappensberger", "www.rappensberger.de", null, "gfx/banner/rappensberger.png", null) // Ersetzen durch den Schlosskeller? 
?>

<?php linkbox("Jazzclub Birdland in Neuburg", "www.birdland.de", "birdland", null, null) ?>

<?php linkbox("Jazztage Ingolstadt", "www.ingolstaedterjazztage.de", "jazztage", null, null) ?>

<?php linkbox("Jugend-Jazzförderung in Bayern", "www.ljjb.de", null, null, null) ?>

<?php linkbox("Kleinkunstkneipe Neue Welt", "www.neuewelt-ingolstadt.de", "neuewelt", null, null) ?>

<?php linkbox("Lehrer Big Band Bayern", "www.lbb-bay.de", null, null, null) ?>

<?php linkbox("monophonic", "www.monophonic.de", null, "gfx/banner/monophonic.png", null) ?>

<?php linkbox("Musikzentrum music in", "www.music-in.de", "music-in", "gfx/banner/music-in.png", null) ?>

<?php linkbox("Szenelokal Diagonal", "www.diagonal-bar.de", "diagonal", null, null) ?>

<?php linkbox("Vegetarisches Restaurant Swept Away", "www.swept-away.de", "sweptaway", null, null) ?>

<?php // linkbox("", "", null, null, null) 
?>


<?php linkend() ?>


<h2>Jazz in der Region</h2>

<?php linkstart() ?>

<?php // linkbox("4-phones", "www.4-phones.eu", null, null, null) 
?>

<?php linkbox("4sinn", "www.myspace.com/4sinn", "myspace", null, null) ?>

<?php linkbox("Birdland Jazzband", "www.birdland.de", "birdland", null, null) ?>

<?php linkbox("Blindflug", "www.blindflug-music.de", null, null, null) ?>

<?php linkbox("Captain’s Bog", "www.captains-bog.de", null, null, null) ?>

<?php linkbox("Charly Böck Latin Project", "www.charly-boeck.de", "boeck", null, null) ?>

<?php linkbox("Close 2 Jazz", "www.close2jazz.de", "close2jazz", null, null) ?>

<?php // linkbox("club légère", "www.clublegere.de", "clublegere", null, null) 
?>

<?php linkbox("Da boarische (Jazz)Plan", "www.jazzplan.de", null, null, null) ?>

<?php linkbox("Denise Liepold &amp; Rudi Trögl Duo", "www.rudi-troegl.de/index.php?site=duo", null, null, null) ?>

<?php // linkbox("Die Klangpatrouille", "www.klangpatrouille.de", "klangpatrouille", null, null) 
?>

<?php linkbox("Dr.&nbsp;Eisele und die Besen", "die-besen.de", null, null, null) ?>

<?php linkbox("Fat Toni", "www.fat-toni.de", null, null, null) ?>

<?php linkbox("groove two", "groovetwo.de", "groovetwo", null, null) ?>

<?php linkbox("Hokum &amp; Hilarity Jazz Orchestra", "hokum.info", null, null, null) ?>

<?php linkbox("In &quot;F&quot; Active", "www.in-f-active.de", null, null, null) ?>

<?php linkbox("JazzArt", "www.jazzart-neuburg.de", null, null, null) ?>

<?php linkbox("Jazz GmbH", "www.bingo-ev.de/~sb448/rg/cms/website.php?id=/de/musik/personen/ensembles/jazzcombo.htm", "rgi", null, null) ?>

<?php linkbox("JAZZ please!", "www.jazz-please.de", "jazzplease", null, null) ?>

<?php linkbox("Kraiberg Jazz Band", "www.kraiberg-jazz-band.de", null, null, null) ?>

<?php linkbox("Morgenroth", "www.charlesleimer.de/morgenroth.html", "charlesleimer", null, null) ?>

<?php // linkbox("Nu:Glass", "www.charlesleimer.de/Seiten/projekte_nuglass.html", null, null, null) 
?>

<?php linkbox("Nick Flade &amp; Groovebox", "www.myspace.com/nickflade", "myspace", null, null) ?>

<?php linkbox("Power Sax", "www.manfred-see.de", "manfred-see", null, null) ?>

<?php linkbox("Rudi Trögl Trio", "www.rudi-troegl.de/index.php?site=trio", null, null, null) ?>

<?php linkbox("So What", "www.so-what.info", "sowhat", null, null) ?>

<?php // linkbox("Souled Out", "www.getsouledout.com", "souledout", null, null) 
?>

<?php linkbox("Steps Of Spirit", "www.charlesleimer.de/steps.html", "charlesleimer", null, null) ?>

<?php linkbox("The Bomb", "www.thebomb.de", null, null, null) ?>

<?php // linkbox("The Jazz Five", "www.the-jazz-five.de.vu", "jazzfive", null, null) 
?>

<?php linkbox("Voice Connection", "www.the-voice-connection.de/start", null, null, null) ?>


<?php linkend() ?>


<h2>Jazzförderpreisträger</h2>

<?php linkstart() ?>

<?php linkbox("2020: Malik Diao (Saxophon)", null, null, null, null) ?>

<?php linkbox("2019: Lukas Lindner (Trompete)", "http://lukaslindner.net/", null, null, null) ?>

<?php linkbox("2018: Carsten Fuss (Posaune)", null, null, null, null) ?>

<?php linkbox("2017: Benedikt Streicher (Piano)", null, null, null, null) ?>

<?php linkbox("2016: Simon Mack (Piano)", null, null, null, null) ?>

<?php linkbox("2015: Matthias Hetzer (Schlagzeug)", "www.facebook.com/cebtOne?lst=100001862856023%3A1693218526%3A1487690149", null, null, null) ?>

<?php linkbox("2013: Oliver Kügel (Schlagzeug)", null, null, null, null) ?>

<?php linkbox("2012: Veronika Schnattinger (Geige)", "www.fyddlehud.com", null, null, null) ?>

<?php linkbox("2011: Josef Finger (Trompete)", null, null, null, null) ?>

<?php linkbox("2010: Tim Allhoff (Piano)", "www.timallhoff.com", null, null, null) ?>

<?php linkbox("2009: Bernhard Hollinger (Bass)", "www.myspace.com/bernhardhollinger", "myspace", null, null) ?>

<?php linkbox("2008: Christina Jung (Gesang)", "www.myspace.com/jungblutband", "myspace", null, null) ?>

<?php linkbox("2007: Simon Seidl (Piano)", "www.blindflug-music.de", null, null, null) ?>

<?php linkbox("2006: Christian Diener (Bass)", null, null, null, null) ?>

<?php linkbox("2005: Nick Flade (Keyboards)", "http://www.myspace.com/nickflade", "myspace", null, null) ?>

<?php linkbox("2004: Tom Diewock (Schlagzeug)", null, null, null, null) ?>

<?php linkbox("2003: Florian Schmidt (Bass)", null, null, null, null) ?>

<?php linkbox("2002: Christian Wondra (Piano)", null, null, null, null) ?>

<?php linkbox("2001: Chris Lachotta (Bass)", "www.table-for-two.de/chris.htm", null, null, null) ?>

<?php linkbox("2000: Josef Spreng (Bigband)", "www.bigbandjosefspreng.de/frame.htm", null, null, null) ?>

<?php linkbox("1999: Charly Leimer (Keyboards)", "www.charlesleimer.de", "charlesleimer", null, null) ?>

<?php linkbox("1998: Oliver Mochmann (Gitarre)", null, null, null, null) ?>

<?php linkbox("1997: Timo Verbole (Saxophon)", null, null, null, null) ?>

<?php linkbox("1996: Rudi Trögl (Gitarre)", "www.rudi-troegl.de", null, null, null) ?>

<?php linkbox("1995: Charly Böck (Percussion)", "www.charly-boeck.de", "boeck", null, null) ?>

<?php linkbox("1994: Christoph Hörmann", "www.christophhoermann.de", null, null, null) ?>


<?php linkend() ?>

<?php
after();
?>