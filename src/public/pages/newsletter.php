<?php
require_once('../legacy.php');

if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "newsletter");
define("TITLE", "Newsletter");
define("ROBOTS", "noindex, follow");

include_once(legacy("inc/environment.php"));

include_once(legacy("inc/post.php"));

/* NEWSTICKER */

$GLOBALS["tickerlines"] = array();

define("FLAG_KEEPALWAYS", 1); // Meldung immer verfügbar, auch wenn Limit überschritten
define("FLAG_HIDDEN", 2); // Meldung unsichtbar
define("FLAG_STROKE", 4); // Meldung durchgestrichen
define("FLAG_IMPORTANT", 8); // Meldung wichtig
define("FLAG_BREAKING", 16); // Meldung kurzfristig

define("TICKER", "Newsticker");

@include(legacy("inc/ticker.php"));

function tickerline($text, $time, $flags)
{
  if ($flags & FLAG_HIDDEN) return;
  while (isset($GLOBALS["tickerlines"][$time])) $time++;
  $GLOBALS["tickerlines"][$time] = array("text" => simpleformat($text), "time" => date("d.m.Y H:i", $time), "flags" => $flags, "style" => "" . ($flags & FLAG_STROKE ? " t_stroke" : "") . ($flags & FLAG_IMPORTANT ? " t_important" : "") . ($flags & FLAG_BREAKING ? " t_breaking" : "") . "");
}


function killmail($email)
{ # Macht eine Mail-Adressse so kaputt, dass die Bots damit nix anfangen können (ersetzt @ zu ät und . zu punkt)
  $email = str_replace("@", " ät ", $email);
  $email = str_replace(".", " punkt ", $email);
  return $email;
}


function write_tickerlines()
{
  if (count($GLOBALS["tickerlines"]) == 0 || (defined("TICKERLIMIT") && TICKERLIMIT == 0)) return;
  krsort($GLOBALS["tickerlines"]);
?>
  <h2>Aktuelles</h2>
  <div class="tickerframe">
    <!--<div class="tickerhead">Aktuelles:</div>-->
    <table class="ticker">
      <?php
      $count = 0;
      foreach ($GLOBALS["tickerlines"] as $line) {
        if (!($line["flags"] & FLAG_KEEPALWAYS) && defined("TICKERLIMIT") && $count >= TICKERLIMIT) continue;
        $count++;
      ?>
        <tr>
          <td class="ticktime">(<?=$line["time"] ?>):</td>
          <td class="tickline<?=$line["style"] ?>"><?=$line["text"] ?></td>
        <?php
      }
        ?>
    </table>
  </div>

<?php

}


// define("TICKER", tickerline);




function toc()
{
?>
  <h2>Newsletter-Archiv</h2>
  <p>Ein Newsletter wird dann in das Newsletter-Archiv aufgenommen, wenn bereits ein neuerer Newsletter existiert. Um die jeweils aktuellen Newsletter zu erhalten, einfach den Newsletter abonnieren.</p>
  <ul>
    <?php
    gettoc(PAGE, "tocline");
    ?>
  </ul>
<?php
}

function tocline($id, $title)
{ # CALLBACK FUNCTION
?>
  <li><a href="<?=(PAGE . PAGE_ENDING) ?>?<?=PAGE ?>=<?=$id ?>"><?=$title ?></a></li>
<?php
}


include_once(legacy("data/newsletter.php"));

ACCEPT_POST();

head();
before("autoload_jazzletter()");

content();

after();
?>