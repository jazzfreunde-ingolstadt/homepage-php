<?php
if (!defined("PAGE"))
{
  header("location:./");
  die();
}

if (!defined("PAGE_ENDING")) define("PAGE_ENDING", ".php");

if (!defined("ROBOTS")) define("ROBOTS", "index, follow");

/* ========= TIME_DATA ========= */
define("NOW", time());
define("SECOND", 1);
define("MINUTE", 60 * SECOND);
define("HOUR", 60 * MINUTE);
define("DAY", 24 * HOUR);
define("WEEK", 7 * DAY);
/* ========= ========= ========= */

date_default_timezone_set("Europe/Berlin");

header("Content-Type: text/html; charset=UTF-8");

function head()
{
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de" dir="ltr">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Jazzfreunde Ingolstadt e. V.<?php echo (defined("TITLE") ? " – " . TITLE : "") ?></title>
    <meta name="author" content="Daniel J. H&ouml;pp" />
    <meta name="keywords" content="jazz, jazzfreunde, jazzmusik, ingolstadt, b&uuml;rgerhaus, alte post, summerjazz, kultur, jazztage, konzerte, diagonal, neue welt, jazzf&ouml;rderpreis, schule" />
<?php if (defined("CONTENT")) { ?>
    <meta name="content" content="<?php echo CONTENT ?>" />
<?php } ?>
    <meta name="html-author" content="H&ouml;ppyMedien" />
    <meta name="robots" content="<?php echo ROBOTS ?>" />
    <meta name="generator" content="kwrite" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="legacy/env/default.css" title="Jazzfreunde blau-orange" />
<?php if (defined("VIDEO")) { ?>
    <script type="text/javascript" src="legacy/env/swfobject.js"></script>
<?php } ?>
    <script type="text/javascript" src="legacy/env/default.js"></script>
  </head>

<?php
}

function before($onload = null)
{
?>

  <body <?php echo ($onload ? " onload=\"$onload\"" : "") ?>>
    <table id="alltable" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <tr>
        <td rowspan="2" id="left" align="center" valign="top" width="220">
          <div id="logo">
            <img src="legacy/gfx/logo_lomt.png" alt="Jazzfreunde Ingolstadt e. V." width="200" height="200" />
          </div>
<?php menu() ?>
        </td>
        <th id="headline" align="center" valign="middle" height="50">Jazzfreunde Ingolstadt <small>e. V.</small></th>
      </tr>
      <tr>
        <td id="content" align="left" valign="top">
<?php message(); ?>
        <!-- CONTENT STARTS HERE -->

<?php
}

function before_nomenu()
{
?>

  <body>
  
<div id="viewmenu" style="position:absolute; left:0px; top:0px; width:1ex; height:1ex; background:transparent; color:#e8c400; cursor:pointer;" onclick="document.getElementById('viewchanger').style.display='block';">&nbsp;</div>

<div id="viewchanger" style="position:absolute; left:0px; top:30%; width:11ex; background-color:#e8c400; color:#bf1300; display:none;">
  <ul style="list-style-type:none; margin:0px; padding-left:2px; text-align:center; font-weight:bold;">
    <li><a href="index1.php" style="color:#bf1300; text-decoration:none;">1.&nbsp;Version</a></li>
    <li><a href="index.php?c=or" style="color:#bf1300; text-decoration:none;">Orange</a></li>
    <li><a href="index.php?c=gr" style="color:#bf1300; text-decoration:none;">Grau</a></li>
    <li><a href="index.php?c=se" style="color:#bf1300; text-decoration:none;">Sepia</a></li>
    <li style="font-size:80%;"><a href="#" onclick="document.getElementById('viewchanger').style.display='none';" style="color:#bf1300; text-decoration:none;">ausblenden</a></li>
  </ul>
</div>

  
    <table id="alltable" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <tr>
        <td colspan="2" id="splash" align="center" valign="middle">
<?php message(); ?>
        <!-- CONTENT STARTS HERE -->

<?php
}


function after()
{
?>

        <!-- CONTENT ENDS HERE -->
        </td>
      </tr>
      <tr>
        <td colspan="2" id="footer" height="30" align="center" valign="middle">Jazzfreunde Ingolstadt, Schaum&uuml;hle 1, 85049 Ingolstadt</td>
      </tr>
    </table>
  </body>
</html>
<?php
}

function message()
{
  if (defined("ERROR"))
  {
?>
          <div class="error"><?php echo ERROR ?></div>
<?php
  }
  if (defined("MESSAGE"))
  {
?>
          <div class="message"><?php echo MESSAGE ?></div>
<?php
  }
}

function menu()
{
?>
          <table id="menu" width="100%">
<?php
//menuline("index", "Willkommen");
menuline("ueberuns", "Über uns");
menuline("ziele", "Ziele");
//menuline("tipps", "CD-Tipps");
menuline("termine", "Veranstaltungen");
//menuline("event", "<b>Big Band Nacht &amp;<br />Latin Jazz Kurse</b>");
menuline("projekte", "Projekte");
menuline("jazzlehrer", "Jazzlehrer");
menuline("bilder", "Bilder");
//menuline("presse", "Pressestimmen");
menuline("beitritt", "Mitglied werden");
menuline("newsletter", "Newsletter &amp; Aktuelles");
menuline("satzung", "Satzung");
menuline("links", "Links");
?>
          </table>
<?php
}

function menuline($pagename, $title)
{
?>
            <tr>
              <td><?php echo menulink($pagename, $title) ?></td>
            </tr>
<?php
}

function menulink($pagename, $title)
{
  return "<a" . ($pagename == PAGE ? " class=\"selected\"" : "") . " href=\"" . $pagename . PAGE_ENDING . "\">" . $title . "</a>";
}

/*-- WRAPPER-FUNKTIONEN --*/

function unumlaut(&$array)
{
  foreach ($array as $el)
  {
    $array = preg_replace(array("/ä/", "/ö/", "/ü/", "/Ä/", "/Ö/", "/Ü/",  "/ß/"), array("ae", "oe", "ue", "Ae", "Oe", "Ue", "ss"), $array);
  }
}
/**
 * Schickt eine Mail per mail() weg.
 * Die Daten werden nicht geprüft, es handelt sich nur um ein wrap um mail()!
 * Ab $from können die Parameter (bis auf $to und $sendertime) auch mit null ausgefüllt werden.
 * Ab $cc sind die Parameter fakultativ.
 * 
 * @param string $subject – Betreff
 * @param string $text – Inhalt der Mail
 * @param string $from – Absender der Mail
 * @param string_or_array $to – Empfänger(liste)
 * @param string_or_array $cc – Kopie an (Liste)
 * @param string_or_array $bcc – Blindkopie(liste)
 * @param string $replyto – Rückantwortadresse
 * @param boolean $sendertime – Sendezeitpunkt mit in Header einschließen
 * @return int – Rückgabewert von mail()
 */
function send_mail($subject, $text, $from, $to, $cc = array(), $bcc = array(), $replyto = "", $sendertime = true)
{ // Schickt eine Mail weg, Daten müssen vorher schon geprüft sein, das hier ist nur ein wrap um mail()!!
# send_mail(string $subject, string $text, string $from, array $to, array $cc, array $bcc, string $replyto, boolean $sendertime)
  if (!is_array($to)) $to = array($to);
  if (!is_array($cc)) $cc = array($cc);
  if (!is_array($bcc)) $bcc = array($bcc);
  $header = "";
  
  if (count($to)) unumlaut($to);
  if (count($cc)) unumlaut($cc);
  if (count($bcc)) unumlaut($bcc);
  
  if ($from != null && $from != "") $header .= "From: " . $from . "\n";
  if ($replyto != null && $replyto != "") $header .= "Reply-To: " . $replyto . "\n";
  if (count($cc) > 0 || (count($cc) == 1 && ($cc[0] == "" || $cc[0] == null))) $header .= "CC: " . implode(",", $cc) . "\n";
  if (count($bcc) > 0 || (count($bcc) == 1 && ($bcc[0] == "" || $bcc[0] == null))) $header .= "BCC: " . implode(",", $bcc) . "\n";
  $header .= "Content-Type: text/plain; charset=UTF-8\n";
  $header .= "X-Mailer: Codux Webmail (JFI, PHP/" . phpversion() . ")\n";
  $time = time();
  if ($sendertime) $header .= "X-Sent: " . date("d.m.Y H:i", $time). " (" . $time . ")\n";
  
  //$RC = mail("Daniel Hoepp <djh@hoeppymedien.de>", "Test", "Fülltext\n1. is das ein schmarrn\n2. noch viel mehr\n3. erst recht\nFormel, Name", "From: Test Mail <jazzfreunde-ingolstadt@hoeppymedien.de>");
  //$RC = false;
  //echo $RC;
 
  //echo "<pre>" . htmlspecialchars("mail(\"" . implode(",", $to) . "\", \"" . $subject . "\", \"" . $text . "\", \"" . $header . "\")") . "</pre>"; return 0;
  
  $RC = mail(implode(",", $to), $subject, $text, $header);
  
  //echo " = $RC;</pre>";
  return $RC;
}

/*-- FUNKTIONEN FÜR DATENIMPORT --*/

function addpoint($name, $title)
{
  if (!is_array($GLOBALS[$name])) $GLOBALS[$name] = array();
  return array_push($GLOBALS[$name], $title);
}

function gettoc($name, $linefunction)
{
  for ($nr = 0; $nr < count($GLOBALS[$name]); $nr ++)
  {
    $linefunction($nr+1, $GLOBALS[$name][$nr]);
  }
}

/*-- SONSTIGE TOOLS --*/
function randomstring($chars, $count)
{
  if (!defined("RANDOM_INIT"))
  {
    mt_srand();
    define("RANDOM_INIT", true);
  }
  $ret = "";
  $num = strlen($chars);
  for ($i = 0; $i < $count; $i++)
  {
    $ret .= substr($chars, mt_rand(0, $num-1), 1);
  }
  return $ret;
}

function unquote_input(&$string)
{ // Nimmt magic_quotes zurück
  if (get_magic_quotes_gpc())
  {
    if (is_array($string))
    {
      $keys = array_keys($string);
      foreach ($keys as $key) unquote_input($string[$key]);
    }
    else $string = stripslashes($string);
  }
}

function simpleformat($string)
{ // Wandelt in einem reinen String bestimmte Flags in HTML-Tags um
  // Links: [[URL]] bzw. [[URL|Text]]
  $ret = nl2br($string);
  // preg_replace(mixed $Suchmuster, mixed $Ersatz, mixed $Zeichenkette [, int $Limit [, int &$Anzahl]]);
  
  // URL mit Linktext
  $ret = preg_replace("/\\[\\[([^|\\]]+)\\|([^\\]]+)\\]\\]/U", "<a href=\"\$1\">\$2</a>", $ret);
  // Einfache URL
  $ret = preg_replace("/\\[\\[([^|\\]]+)\\]\\]/U", "<a href=\"\$1\">\$1</a>", $ret);
  
  return $ret;
}

?>
