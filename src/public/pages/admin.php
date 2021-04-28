<?php
require_once('../legacy.php');

  if (defined("PAGE")) die("Wrong reference.");
  define("PAGE", "admin");
  define("TITLE", "Administration");
  
  include_once(legacy("inc/environment.php"));
  
  define("XWD", "jfi-timestamp");
  
  
  function spltime($string)
  { // Von LAG geklaut... ;-)
    // OMFG Monsterfunction ó.Ò
    // Wandelt einen Datums-/Zeitstring in einen Timestamp um
    if ($string == "" || $string == "0") return 0;
    
    while (preg_match("/\. /", $string)) $string = preg_replace("/\. /", ".", $string);
    while (preg_match("/: /", $string)) $string = preg_replace("/: /", ":", $string);
    while (preg_match("/  /", $string)) $string = preg_replace("/  /", " ", $string);
    
    $MONTH = array(
      "januar" => 1, "jan" => 1,
      "februar" => 2, "feb" => 2,
      "märz" => 3, "mär" => 3, "mar" => 3, "mae" => 3,
      "april" => 4, "apr" => 4,
      "mai" => 5, "may" => 5,
      "juni" => 6, "jun" => 6,
      "juli" => 7, "jul" => 7,
      "august" => 8, "aug" => 8,
      "september" => 9, "sep" => 9,
      "oktober" => 10, "okt" => 10, "oct" => 10,
      "november" => 11, "nov" => 11,
      "dezember" => 12, "dez" => 12, "dec" => 12
    );
    $time = array(0,0,0,0,0,0);
    $x1 = explode(":", $string);
    // x1: Zeit aufgeteilt, bei Stunden hängt noch das Datum dran, evtl. auch nur das Datum, d. h. keine Zeit angegeben
    $time[5] = (count($x1) >= 3 ? $x1[2]*1 : 0);
    $time[4] = (count($x1) >= 2 ? $x1[1]*1 : 0);
    $xs = explode(".", $x1[0]);
    if (count($xs) == 1)
    { // Nicht-Punkt Schreibweise: dd/mm/yy oder mm-dd-yy
      $xs = explode("/", $x1[0]);
      if (count($xs) == 1)
      { // mm-dd-yy
        $xs = explode("-", $x1[0]);
        if (count($xs) == 1)
        { // Nur Monat angegeben oder Monat Jahr
          $time[0] = 1;
          $xl = explode(" ", $x1[0]);
          if (count($x1) == 1)
          { // Nur Monat/Jahr / Monat-Jahr angegeben
            $time[3] = 0;
            if (count($xl) == 1)
            { // mm oder MMM
              if ($xl[0]*1 > 12)
              { // Jahr statt Monat
                $time[2] = $xl[0]*1;
                $time[1] = 1; // Januar!
              }
              else
              { // Nur Monat
                $time[2] = 1970;
                $time[1] = ($xl[0]*1 > 0 ? $xl[0]*1 : ($MONTH[strtolower(substr($xl[0], 0, 3))])*1);
              }
            }
            else if (count($xl == 2))
            { // MMM yyyy
              $time[2] = $xl[1]*1;
              $time[1] = ($MONTH[strtolower(substr($xl[0], 0, 3))])*1;
            }
            else return 0; // ERROR!
          }
          else
          { // [MMM|yy|hh] oder [MMM|hh]
            if (count($xl) == 2)
            {
              $time[1] = ($MONTH[strtolower(substr($xl[0], 0, 3))])*1;
              $time[2] = 1970;
              $time[3] = $xl[1]*1;
            }
            else if (count($xl) == 3)
            {
              $time[1] = ($MONTH[strtolower(substr($xl[0], 0, 3))])*1;
              $time[2] = $xl[1]*1;
              $time[3] = $xl[2]*1;
            }
            else return 0; // ERROR!
          }
        }
        else
        { // [mm|dd|yy hh] oder [mm|dd hh]
          if (count($xs == 2))
          {
            $time[2] = 1970;
            $time[1] = $xs[0]*1;
            $xl = explode(" ", $xs[1]);
            if (count($xl) == 1)
            {
              $time[0] = $xl[0]*1;
              $time[3] = 0;
            }
            else if (count($xl) == 2)
            {
              $time[0] = $xl[0]*1;
              $time[3] = $xl[1]*1;
            }
            else return 0; // ERROR
          }
          else if (count($xs == 3))
          {
            $time[0] = $xs[1]*1;
            $time[1] = $xs[0]*1;
            $xl = explode(" ", $xs[1]);
            if (count($xl) == 1)
            {
              $time[2] = $xl[0]*1;
              $time[3] = 0;
            }
            else if (count($xl) == 2)
            {
              $time[2] = $xl[0]*1;
              $time[3] = $xl[1]*1;
            }
            else return 0; // ERROR
          }
          else return 0; // ERROR!
        }
        $done = true;
      }
    }
    
    if (!$done)
    { // [dd|mm|yy hh] oder [mm|yy hh] oder [mm| hh] (!) oder [dd|mm| hh] oder [dd|MMM hh] oder [dd|MMM yyyy hh]
      if (count($xs) == 2)
      { // [mm|yy hh] oder [mm| hh] oder [dd|MMM hh] oder [dd|MMM yyyy hh] oder [dd|MMM] oder [dd|MMM yyyy] oder [mm|yy]
        if (count($x1) == 1)
        { // Keine Stunde dabei -> [dd|MMM] oder [dd|MMM yyyy] oder [mm|yy]
          $time[3] = 0;
          if ($xs[1]*1 > 0)
          { // [mm|yy]
            $time[0] = 1;
            $time[1] = $xs[0]*1;
            $time[2] = $xs[1]*1;
          }
          else
          { // Das erste ist der Tag
            $time[0] = $xs[0]*1;
            $xl = explode(" ", $xs[1]);
            $time[1] = ($MONTH[strtolower(substr($xl[0], 0, 3))])*1;
            $time[2] = (count($xl) == 1 ? 1970 : $xl[1]*1);
          }
        }
        else
        { // Stunde dabei -> [mm|yy hh] oder [mm| hh] oder [dd|MMM hh] oder [dd|MMM yyyy hh]
          $xl = explode(" ", $xs[1]);
          if (count($xl) == 2)
          { // Stunde ist immer hinten
            $time[3] = $xl[1]*1;
            if ($xl[0]*1 > 0)
            { // [mm|yy hh]
              $time[0] = 1;
              $time[1] = $xs[0]*1;
              $time[2] = $xl[0]*1;
              $time[3] = $xl[1]*1;
            }
            else if ($xl[0] == "")
            { // [mm| hh]
              $time[0] = 1;
              $time[1] = $xs[0]*1;
              $time[2] = 1970;
              $time[3] = $xl[1]*1;
            }
            else
            { // [dd|MMM hh]
              $time[0] = $xs[0]*1;
              $time[1] = ($MONTH[strtolower(substr($xl[0], 0, 3))])*1;
              $time[2] = 1970;
              $time[3] = $xl[1]*1;
            }
          }
          else if (count($xl) == 3)
          { // Gibt nur 1 Möglichkeit...
            $time[0] = $xs[0]*1;
            $time[1] = ($MONTH[strtolower(substr($xl[0], 0, 3))])*1;
            $time[2] = $xl[1]*1;
            $time[3] = $xl[2]*1;
          }
          else return 0; // ERROR!
        }
      }
      else if (count($xs) == 3)
      { // [dd|mm|yy hh] oder [dd|mm| hh] oder [dd|mm|yy] => Tag ist vorne, dann Monat
        $time[0] = $xs[0]*1;
        $time[1] = $xs[1]*1;
        $xl = explode(" ", $xs[2]);
        if (count($xl) == 1)
        {
          $time[2] = ($xl[0] == "" ? 1970 : $xl[0]*1);
          $time[3] = 0;
        }
        else if (count($xl) == 2)
        {
          $time[2] = ($xl[0] == "" ? 1970 : $xl[0]*1);
          $time[3] = $xl[1]*1;
        }
        else return 0; // ERROR!
      }
    }
    
    $NOW = getdate();
    
    if ($time[0] == 0) $time[0] = 1;
    if ($time[1] == 0) $time[1] = $NOW["mon"];
    if ($time[2] == 1970) $time[2] = $NOW["year"];
    if ($time[2] < 100)
    {
      $n2 = $NOW["year"] % 100;
      if ($n2 < $time[2]) $n2 += 100;
      $diff = $n2 - $time[2];
      if ($diff > 30) $diff -= 100;
      
      $time[2] = $NOW["year"] - $diff;
    }
    
    return mktime($time[3], $time[4], $time[5], $time[1], $time[0], $time[2]);
    
  }
  
  function setlocktime($timestamp)
  {
    $f = @fopen("inc/lock.php", "w+");
    if ($f)
    {
      @fputs($f, "<?phpphp define(\"UNLOCKTIME\", " . $timestamp . "); ?>");
      if (!@fflush($f))
      {
        if (!defined("ERROR")) define("ERROR", "Der Wert konnte nicht geschrieben werden! (flush)");
      }
      if (!@fclose($f))
      {
        if (!defined("ERROR")) define("ERROR", "Der Wert konnte nicht geschrieben werden! (close)");
      }
    }
    else
    {
      if (!defined("ERROR")) define("ERROR", "Der Wert konnte nicht geschrieben werden! (open)");
    }
    //if (!defined("ERROR")) define("MESSAGE", "Der Zeitstempel wurde gesetzt.");
  }
  
  define("FLAG_KEEPALWAYS", 1); // Meldung immer verfügbar, auch wenn Limit überschritten
  define("FLAG_HIDDEN", 2); // Meldung unsichtbar
  define("FLAG_STROKE", 4); // Meldung durchgestrichen
  define("FLAG_IMPORTANT", 8); // Meldung wichtig
  define("FLAG_BREAKING", 16); // Meldung kurzfristig
    
  
  function mkticker()
  { // Arbeitet mit $_POST!
    if (!$_POST["sendadmindata"]) return;
  
    $ticklimit = (trim($_POST["tickerlimit"]) == "" ? -1 : $_POST["tickerlimit"]*1);
    
    $tickerdata = array();
    
    if ($_POST["tickertext"])
    {
      unquote_input($_POST["tickertext"]);
      $keys = array_keys($_POST["tickertext"]);
      rsort($keys);
      foreach ($keys as $key)
      {
        if (trim($_POST["tickertext"][$key]) != "") array_push($tickerdata, array("text" => htmlspecialchars($_POST["tickertext"][$key]), "time" => ($key*1 < 1 || $_POST["tickerupdate"][$key] ? time() : $key), "flag" => (0 | ($_POST["tickerflag"][$key][FLAG_KEEPALWAYS]*FLAG_KEEPALWAYS) | ($_POST["tickerflag"][$key][FLAG_HIDDEN]*FLAG_HIDDEN) | ($_POST["tickerflag"][$key][FLAG_STROKE]*FLAG_STROKE) | ($_POST["tickerflag"][$key][FLAG_IMPORTANT]*FLAG_IMPORTANT) | ($_POST["tickerflag"][$key][FLAG_BREAKING]*FLAG_BREAKING))));
        
      }
    }
    
    $f = @fopen("inc/ticker.php", "w+");
    if ($f)
    {
      @fputs($f, "<?phpphp if (!defined(\"TICKER\")) die(\"Wrong reference.\");\n");
      if ($ticklimit >= 0) @fputs($f, "  define(\"TICKERLIMIT\", " . $ticklimit . ");\n");
      
      foreach ($tickerdata as $t)
      {
        @fputs($f, "  tickerline(\"" . $t["text"] . "\", " . $t["time"] . ", " . $t["flag"] . ");\n");
      }
      
      @fputs($f, "?>");
      if (!@fflush($f))
      {
        if (!defined("ERROR")) define("ERROR", "Die Tickerdaten konnten nicht geschrieben werden! (flush)");
      }
      if (!@fclose($f))
      {
        if (!defined("ERROR")) define("ERROR", "Die Tickerdaten konnten nicht geschrieben werden! (close)");
      }
    }
    else
    {
      if (!defined("ERROR")) define("ERROR", "Die Tickerdaten konnten nicht geschrieben werden! (open)");
    }
    //if (!defined("ERROR")) define("MESSAGE", "Die Tickerdaten wurden gesetzt.");
  }
  
  function pwdinput()
  {
?>
<h1>Administration</h1>
<form id="adminform" name="adminform" action="admin.php" method="post">
  <div align="left" style="margin-left:4em;">
    <label for="xwd">Zugangskennwort:</label><br />
    <input id="xwd" name="XWD" type="password" /><br />
    <input type="submit" name="sendadminlogin" value="Login" />
  </div>
</form>
<?php
  }
  
  function admin()
  {
    define("ULSTR", (UNLOCKTIME <= 0 ? "0" : date("d.m.Y H:i:s", UNLOCKTIME)));
?>
<h1>Administration</h1>

<p style="color:red; font-weight:bold;">Wichtig! Es werden beim Übernehmen der Seite immer alle Änderungen gespeichert, also sowohl die Seitenfreischaltung als auch die Ticker-Einträge!</p>

<form id="adminform" name="adminform" action="admin.php" method="post">
  <h2>Freischaltung / Sperrung</h2>
  <div align="left" style="margin-left:4em;">
    Aktueller Freischalt-Zeitpunkt:<br />
    <strong><?=(UNLOCKTIME < 0 ? "Noch nicht definiert!" : ULSTR)?></strong><br />
    <label for="settime">Neuer Freischalt-Zeitpunkt:</label><br />
    <input id="settime" name="settime" type="text" value="<?=ULSTR?>" /><br />
    <em class="small">Um die Seite sofort freizuschalten, einfach 0 eintragen.</em><br />
    <input type="hidden" name="XWD" value="<?=$_POST["XWD"]?>" />
    <input type="submit" name="sendadmindata[-1]" value="Übernehmen" />
  </div>

  <h2>Newsticker-Einträge</h2>
<?php
    $GLOBALS["adminticker"] = array();
    
    $GLOBALS["flagsdescription"] = array(FLAG_KEEPALWAYS => "immer anzeigen", FLAG_HIDDEN => "unsichtbar", FLAG_STROKE => "durchgestrichen", FLAG_IMPORTANT => "wichtig", FLAG_BREAKING => "kurzfristig");
    
    function tickerline($text, $time, $flags)
    {
      while (isset($GLOBALS["adminticker"][$time])) $time++;
      $GLOBALS["adminticker"][$time] = array("text" => $text, "time" => $time, "timeW" => date("d.m.Y H:i", $time), "flags" => array(FLAG_KEEPALWAYS => $flags & FLAG_KEEPALWAYS, FLAG_HIDDEN => $flags & FLAG_HIDDEN, FLAG_STROKE => $flags & FLAG_STROKE, FLAG_IMPORTANT => $flags & FLAG_IMPORTANT, FLAG_BREAKING => $flags & FLAG_BREAKING));
    }
  
    define("TICKER", tickerline);
    
    @ include("inc/ticker.php");
    
    function flag($id, $flagarray, $flagtype)
    {
?>
    <input type="checkbox" id="tickerflag_<?=$id?>_<?=$flagtype?>" name="tickerflag[<?=$id?>][<?=$flagtype?>]" value="1"<?=($flagarray[$flagtype] ? " checked=\"checked\"" : "")?> /><label for="tickerflag_<?=$id?>_<?=$flagtype?>"><?=$GLOBALS["flagsdescription"][$flagtype]?></label><br />
<?php
    }
    
    function flags($id, $flagarray = null)
    {
      if ($flagarray == null) $flagarray = array();
      flag($id, $flagarray, FLAG_KEEPALWAYS);
      flag($id, $flagarray, FLAG_HIDDEN);
      flag($id, $flagarray, FLAG_STROKE);
      flag($id, $flagarray, FLAG_IMPORTANT);
      flag($id, $flagarray, FLAG_BREAKING);
    }
    
    function admin_ticker()
    {
      krsort($GLOBALS["adminticker"]);
      $TL = (defined("TICKERLIMIT") ? TICKERLIMIT : "");
?>
    <div align="left" style="margin-left:4em;">
      <label for="tickerlimit">Ticker-Limit (höchstens angezeigte Einträge):</label><br />
      <input id="tickerlimit" name="tickerlimit" type="text" value="<?=$TL?>" /><br />
      <span class="small">(Zum Anzeigen aller Einträge leer lassen, zum deaktivieren des Tickers auf 0 setzen)</span>
    </div>
    
    <div align="left" style="margin-left:4em;">
      <div class="admininfo">Um einen Eintrag zu löschen, bitte den Eintragstext entfernen. Zum Hinzufügen eines Eintrags die Box ganz oben ausfüllen. Um einen Eintrag mit dem aktuellen Datum zu versehen (also nach oben zu schieben), den zugehörigen Haken „Eintrag aktualisieren“ anfügen. Auch Einträge ohne diesen Haken werden übernommen, jedoch nicht auf das aktuelle Datum gesetzt!</div>
      
      <div class="admintickerentry">
        <div class="admintickerdate">—</div>
        <div class="admintickertext">» Neuer Eintrag «</div>
        <div class="admintickereditor"><textarea name="tickertext[0]"></textarea></div>
        <div class="admintickerflags">
          <?php flags(0) ?>
        </div>
        <div class="adminsubmit"><input type="submit" name="sendadmindata[0]" value="Übernehmen" /></div>
      </div>
<?php
      foreach ($GLOBALS["adminticker"] as $line)
      {
?>
      <div class="admintickerentry">
        <div class="admintickerdate"><?=$line["timeW"]?></div>
        <div class="admintickertext"><?=simpleformat($line["text"])?></div>
        <div class="admintickereditor"><textarea name="tickertext[<?=$line["time"]?>]"><?=$line["text"]?></textarea></div>
        <div class="admintickerflags">
          <?php flags($line["time"], $line["flags"]) ?>
        </div>
        <div class="admintickerupdate"><input type="checkbox" id="tickerupdate_<?=$line["time"]?>" name="tickerupdate[<?=$line["time"]?>]" value="1" /><label for="tickerupdate_<?=$line["time"]?>">Eintrag aktualisieren</label></div>
        <div class="adminsubmit"><input type="submit" name="sendadmindata[<?=$line["time"]?>]" value="Übernehmen" /></div>
      </div>
<?php
      }
?>
    </div>
<?php
    }
    
    admin_ticker();
?>

</form>

<?php
  }
  
  
  // SEITENHAUPTPROZEDUR
  
  if (!isset($_POST["XWD"]))
  {
    function run()
    {
      pwdinput();
    }
  }
  elseif ($_POST["XWD"] != XWD)
  {
    if (!defined("ERROR")) define("ERROR", "Das eingegebene Kennwort ist falsch!");
    function run()
    {
      pwdinput();
    }
  }
  else
  {
    // timer
    if ($_POST["settime"] != "")
    {
      if ($_POST["settime"] == "0")
      {
        setlocktime(0);
      }
      else
      {
        setlocktime(spltime($_POST["settime"]));
      }
    }
    // ticker
    mkticker();
    
    if (($_POST["settime"] != "" || $_POST["sendadmindata"]) && !defined("ERROR")) define("MESSAGE", "Der Zeitstempel und die Tickerdaten wurden gesetzt.");
    
    @include("inc/lock.php");
  
    if (!defined("UNLOCKTIME")) define("UNLOCKTIME", -1);
  
    function run()
    {
      admin();
    }
  }
  
  head();
  before();
  
  run();
  
  ?>
    <div class="backlink"><a href="index.php">Zurück</a></div>
  <?php
  after();
  
?>