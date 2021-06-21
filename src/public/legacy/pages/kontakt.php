<?php
  if (defined("PAGE")) die("Wrong reference.");
  define("PAGE", "ueberuns");
  define("TITLE", "Kontaktformular");
  define("ROBOTS", "noindex, nofollow");
  
  include_once __DIR__ . "/../inc/environment.php";
  include_once __DIR__ . "/../inc/post.php";
  
  //ACCEPT_POST(); // Nein! Zu viel Verquickung von dynamischem Inhalt und POST-Daten!
  
  $NAMES = array(
    "mayer" => "Michael Mayer",
    "hoepp" => "Daniel Johannes Hoepp",
    "domke" => "Reimund Domke",
    "pacher" => "Dr. Christian Pacher",
    "spranger" => "Ulrich Spranger",
    "reitberger" => "Bernhard Reitberger",
    "aichner" => "Robert Aichner",
    "wild" => "Stefan Wild",
    "wewer" => "Karl Wewer",
    "diewock" => "Tom Diewock",
    "bleckmann" => "Sven Bleckmann",
    "mayer" => "Michael Mayer",
    "mittnacht" => "Ella Mittnacht",
    "righetti" => "Raphael Righetti",
    "spranger-righetti" => "Eva Spranger-Righetti",
    "newsletter" => "Jazzfreunde Ingolstadt Newsletter",
    "schatzmeister" => "Schatzmeister der Jazzfreunde Ingolstadt",
    "1.vorsitzender" => "1. Vorsitzender der Jazzfreunde Ingolstadt",
    "schriftfuehrer" => "Schriftfuehrer der Jazzfreunde Ingolstadt",
    "jugendarbeit" => "Jugend- und Nachwuchskoordinator",
    "vorstand" => "Vorstand der Jazzfreunde Ingolstadt",
    "mitglieder" => "Jazzfreunde Ingolstadt (Mitgliedschaftsangelegenheiten)",
    "webmaster" => "Webmaster",
    "sessions" => "Sessionkoordinator",
    "bilder" => "Fototeam der Jazzfreunde Ingolstadt",
    "verein" => "Verein der Jazzfreunde Ingolstadt",
    "gutsche" => "Matthias Gutsche",
    "bachmaier" => "Helmut Bachmaier"
  );
  
  $MAILS = array(
    "mayer" => "miche.mayer@outlook.de",
    "hoepp" => "jazzfreunde-ingolstadt@hoeppymedien.de",
    "domke" => "domke@jazzfreunde-ingolstadt.de",
    "pacher" => "pacher@jazzfreunde-ingolstadt.de",
    "spranger" => "spranger@jazzfreunde-ingolstadt.de",
    "reitberger" => "reitberger@jazzfreunde-ingolstadt.de",
    "aichner" => "aichner@jazzfreunde-ingolstadt.de",
    "wild" => "wild@jazzfreunde-ingolstadt.de",
    "wewer"=> "wewer@jazzfreunde-ingolstadt.de",
    "diewock" => "diewock@jazzfreunde-ingolstadt.de",
    "bleckmann" => "bleckmann@jazzfreunde-ingolstadt.de",
    "mayer" => "mayer@jazzfreunde-ingolstadt.de",
    "mittnacht" => "mittnacht@jazzfreunde-ingolstadt.de",
    "righetti" => "righetti@jazzfreunde-ingolstadt.de",
    "spranger-righetti" => "spranger-righetti@jazzfreunde-ingolstadt.de",
    "newsletter" => "newsletter@jazzfreunde-ingolstadt.de",
    "schatzmeister" => "schatzmeister@jazzfreunde-ingolstadt.de",
    "1.vorsitzender" => "1.vorsitzender@jazzfreunde-ingolstadt.de",
    "schriftfuehrer" => "schriftfuehrer@jazzfreunde-ingolstadt.de",
    "jugendarbeit" => "jugendarbeit@jazzfreunde-ingolstadt.de",
    "vorstand" => "vorstand@jazzfreunde-ingolstadt.de",
    "mitglieder" => "mitglieder@jazzfreunde-ingolstadt.de",
    "webmaster" => "homepage@jazzfreunde-ingolstadt.de",
    "sessions" => "sessions@jazzfreunde-ingolstadt.de",
    "bilder" => "bilder@jazzfreunde-ingolstadt.de",
    "verein" => "verein@jazzfreunde-ingolstadt.de",
    "gutsche" => "gutsche@jazzfreunde-ingolstadt.de",
    "bachmaier" => "bachmaier@jazzfreunde-ingolstadt.de"
  );
  
  $name = @$NAMES[$_GET["to"]];
  if (!$name || $name == "")
  {
    if (!defined("ERROR")) define("ERROR", "Es gibt keinen Kontakt mit dieser Kennung.");
    if (!defined("NOSHOW")) define("NOSHOW", true);
  }
  define("NAME", $name);
  
  $perr = array(); // Post-Error: Haken-Fehler usw.
  
  $cerr = array(); // Content-Error: Da is was leer!
  
  if (@$_POST["AGB"])
  {
    array_push($perr, "Entfernen Sie bitte den Haken bei <em>Diese Nachricht ist Spam und darf gelöscht werden</em>.<br /><b>Achtung</b>, der Haken wird automatisch immer wieder neu gesetzt! (<a href=\"daten.php\" target=\"_blank\">Wieso das Ganze?</a>)");
  }
  
  if (!@$_POST["under18"])
  {
    array_push($perr, "Sie müssen zuerst versichern, keine Werbung an diese Adresse zu senden. (<a href=\"daten.php\" target=\"_blank\">Wieso das Ganze?</a>)");
  }
  
  if (@$_POST["homepage"] != "")
  {
    array_push($perr, "Oh – Sie haben ein Feld ausgefüllt, das Sie eigentlich gar nicht ausfüllen können und sind damit in eine Spam-Falle getappt. Versuchen Sie es noch einmal.");
  }
  
  if (@$_POST["address"] != getip())
  {
    array_push($perr, "Oha, Sie haben offenbar ihre IP-Adresse vor dem Absenden gewechselt. Versuchen Sie es bitte einfach noch einmal.");
  }
  
  if (@$_POST["mailsubject"] == "")
  {
    array_push($cerr, "Geben Sie bitte einen Betreff für diese Mail an.");
  }
  
  if (@$_POST["mailcontent"] == "")
  {
    array_push($cerr, "Vergessen Sie nicht, die Mail mit einem Inhalt zu versehen!");
  }
  
  if (@$_POST["myname"] == "")
  {
    array_push($cerr, "Geben Sie bitte Ihren Namen an.");
  }
  
  if (!ismail(@$_POST["mymail"]))
  {
    array_push($cerr, "Geben Sie bitte Ihre Mail-Adresse als Absender an, damit man Ihnen antworten kann.");
  }
  
  if (@$_POST["showmail"]) // Mail-Adresse anzeigen
  {
    if (count($perr) == 0)
    {
      define("MAILHTML", "<a href=\"mailto:" . $MAILS[$_GET["to"]] . "\">" . $MAILS[$_GET["to"]] . "</a><input type=\"hidden\" name=\"showmail\" value=\"jup\" />");
    }
    else
    {
      if (!defined("ERROR")) define("ERROR", mkerrorlist($perr));
    }
  }
  
  if (!defined("MAILHTML"))
  {
    define("MAILHTML", "<input type=\"submit\" name=\"showmail\" value=\"Mailadresse anzeigen\" />");
  }
  
  if (@$_POST["sendmail"])
  {
    if (count($cerr) == 0 && count($perr) == 0)
    {
      $subject = "Web: " . $_POST["mailsubject"];
      $text = $_POST["mailcontent"] . "\n\n--\nDiese Mail wurde über das Web-Kontaktformular über http://www.jazzfreunde-ingolstadt.de erstellt.";
      
      $from = ($_POST["myname"] ? "\"" . $_POST["myname"] . "\" <" . $_POST["mymail"] . ">" : $_POST["mymail"]);
      $bcc = ($_POST["bcc"] ? $from : null);
      $to = "\"" . $name . "\" <" . $MAILS[$_GET["to"]] . ">";
      
      if (!send_mail($subject, $text, $from, $to, null, $bcc))
      {
        define("ERROR", "Die Mail konnte nicht versandt werden – offenbar liegt ein Fehler im internen Mail-System vor.<br />Schreiben Sie die Mail bitte mit Ihrem Mail-Client an " . $MAILS[$_GET["to"]] . " und erwähnen Sie darin bitte auch, dass das Mail-System versagt hat, damit wir uns darum kümmern können.");
      }
      
      if (!defined("ERROR"))
      {
        define("MESSAGE", "Die Nachricht wurde an " . $name . " versandt.");
        if (!defined("NOSHOW")) define("NOSHOW", true);
      }
    }
    else
    {
      if (!defined("ERROR")) define("ERROR", mkerrorlist(array_merge($perr, $mittnachtcerr)));
    }
  }

  
  head();
  before("autoload_kontakt()");
  
  if (defined("NOSHOW"))
  {
    ?>
<div class="backlink"><a href="<?= (PAGE . PAGE_ENDING) ?>">Zurück</a></div>
<?php
    after();
    die();
  }
?>
<h1>Kontaktformular</h1>

<h2><?= NAME ?></h2>
<form id="kontaktform" name="kontakt" action="/kontakt?to=<?= $_GET["to"] ?>" method="post">
  <table id="mailtable" border="0" cellpadding="4" cellspacing="0" align="center">
    <tr>
      <td>An:<br /><?= MAILHTML ?></th>
    </tr>
    <tr>
      <td><label for="myname">Von (Name):</label><br /><input id="myname" name="myname" type="text" value="<?= @$_POST["myname"] ?>" /></td>
    </tr>
    <tr>
      <td><label for="mymail">Von (Mail-Adresse):</label><br /><input id="mymail" name="mymail" type="text" value="<?= @$_POST["mymail"] ?>" /></td>
    </tr>
    <tr>
      <th><label for="mailsubject">Betreff:</label><br /><input id="mailsubject" name="mailsubject" type="text" value="<?= (@$_POST["mailsubject"] ? $_POST["mailsubject"] : (@$_GET["s"] ? $_GET["s"] : "")) ?>" /></th>
    </tr>
    <tr>
      <td><input type="hidden" name="homepage" value="" />
        <label for="mailcontent">Inhalt:</label><br /><textarea id="mailcontent" name="mailcontent" cols="40" rows="15"><?= (@$_POST["mailcontent"] ? $_POST["mailcontent"] : (@$_GET["c"] ? $_GET["c"] : "")) ?></textarea>
      </td>
    </tr>
    <tr>
      <td><input id="bcc" name="bcc" type="checkbox" <?= (@$_POST["bcc"] ? " checked=\"checked\"" : "") ?> value="x" /><label for="bcc">Eine Kopie der Mail an meine Adresse senden</label></td>
    </tr>
    <tr>
      <td><input id="under18" name="under18" type="checkbox" <?= (@$_POST["under18"] ? " checked=\"checked\"" : "") ?> value="x" /><label for="under18">Ich versichere, keine Werbung oder sonstige unerwünschte Nachrichten an diese Mailadresse zu senden.</label></td>
    </tr>
    <tr>
      <td><input id="AGB" name="AGB" type="checkbox" checked="checked" value="x" /><label for="AGB" style="color:red">Diese Nachricht ist Spam und darf gelöscht werden</label></td>
    </tr>
    <tr>
      <td><input id="sendmail" name="sendmail" type="submit" value="Mail abschicken" />
        <input type="hidden" name="address" value="<?= getip() ?>" />
      </td>
    </tr>
  </table>
</form>

<div class="backlink"><a href="<?= (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?php 
  after();
?>