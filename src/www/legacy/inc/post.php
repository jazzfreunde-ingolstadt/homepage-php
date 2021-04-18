<?
if (!defined("PAGE"))
{
  header("location:./");
  die();
}

//---- TOOLS ----//

function ismail($mail)
{
  return preg_match("/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/i", $mail);
}

function gimmezahl($char)
{
  return ord($char[0]) - 55;
}

function isiban($iban)
{ // Besten Dank an http://serprest.pt/jquery/ht5ifv/extensions/tools/IBAN/ :)
  // Erstmal das Format
  if (!preg_match("/^AL\d{10}[0-9A-Z]{16}$|^AD\d{10}[0-9A-Z]{12}$|^AT\d{18}$|^BH\d{2}[A-Z]{4}[0-9A-Z]{14}$|^BE\d{14}$|^BA\d{18}$|^BG\d{2}[A-Z]{4}\d{6}[0-9A-Z]{8}$|^HR\d{19}$|^CY\d{10}[0-9A-Z]{16}$|^CZ\d{22}$|^DK\d{16}$|^FO\d{16}$|^GL\d{16}$|^DO\d{2}[0-9A-Z]{4}\d{20}$|^EE\d{18}$|^FI\d{16}$|^FR\d{12}[0-9A-Z]{11}\d{2}$|^GE\d{2}[A-Z]{2}\d{16}$|^DE\d{20}$|^GI\d{2}[A-Z]{4}[0-9A-Z]{15}$|^GR\d{9}[0-9A-Z]{16}$|^HU\d{26}$|^IS\d{24}$|^IE\d{2}[A-Z]{4}\d{14}$|^IL\d{21}$|^IT\d{2}[A-Z]\d{10}[0-9A-Z]{12}$|^[A-Z]{2}\d{5}[0-9A-Z]{13}$|^KW\d{2}[A-Z]{4}22!$|^LV\d{2}[A-Z]{4}[0-9A-Z]{13}$|^LB\d{6}[0-9A-Z]{20}$|^LI\d{7}[0-9A-Z]{12}$|^LT\d{18}$|^LU\d{5}[0-9A-Z]{13}$|^MK\d{5}[0-9A-Z]{10}\d{2}$|^MT\d{2}[A-Z]{4}\d{5}[0-9A-Z]{18}$|^MR13\d{23}$|^MU\d{2}[A-Z]{4}\d{19}[A-Z]{3}$|^MC\d{12}[0-9A-Z]{11}\d{2}$|^ME\d{20}$|^NL\d{2}[A-Z]{4}\d{10}$|^NO\d{13}$|^PL\d{10}[0-9A-Z]{,16}n$|^PT\d{23}$|^RO\d{2}[A-Z]{4}[0-9A-Z]{16}$|^SM\d{2}[A-Z]\d{10}[0-9A-Z]{12}$|^SA\d{4}[0-9A-Z]{18}$|^RS\d{20}$|^SK\d{22}$|^SI\d{17}$|^ES\d{22}$|^SE\d{22}$|^CH\d{7}[0-9A-Z]{12}$|^TN59\d{20}$|^TR\d{7}[0-9A-Z]{17}$|^AE\d{21}$|^GB\d{2}[A-Z]{4}\d{14}$/", $iban)) return 0;
  
  // Dann die Checksumme
  $v = preg_replace("/^(.{4})(.*)$/", "$2$1", $iban); //Move the first 4 chars from left to the right
  $v = preg_replace_callback("/[A-Z]/", gimmezahl, $v); //Convert A-Z to 10-25
  
  $sum = 0;
  $ei = 1; //First exponent 
  for ($i = strlen($v) - 1; $i >= 0; $i--)
  {
    $sum += $ei * $v[$i]; //multiply the digit by it's exponent 
    $ei = ($ei * 10) % 97; //compute next base 10 exponent  in modulus 97
  }; 
  return $sum % 97 == 1;
}

function isbirthday($birthday)
{
  return preg_match("/^[0-9]{1,2}(\.|[ ])[ ]*([0-9]{1,2}\.|Jan(.|uary?)?|Feb(.|ruary?)?|Mär(.|z)?|Mar(.|ch)?|Apr(.|il)?|Ma(i|y)|Jun(.|i|e)?|Jul(.|i|y)?|Aug(.|ust)?|Sep(.|t(.|ember)?)?|O(c|k)t(.|ober)?|Nov(.|ember)?|De(c|z)(.|ember)?)[ ]*(19|20|\')?[0-9]{2}$/i", $birthday);
}


function mkgeld($cent)
{ // Formatiert einen Centbetrag schön als Euronen (ohne Währungszeichen! Geht also auch mit Mark oder Schilling ;-) )
  return (floor($cent / 100)) . "," . floor(($cent % 100) / 10) . ($cent % 10);
}

function getip()
{ // Holt die IP, verdeckt aber ein Byte davon!
  $ip = getenv("REMOTE_ADDR");
  $bytes = explode(".", $ip, 4);
  if (count($bytes) == 4) $bytes[2] = "XX";
  return implode(".", $bytes);
}

function mkerrorlist($array)
{
  $ret = "<ul style=\"text-align:left;\">\n";
  foreach ($array as $el)
  {
    $ret .= "<li>" . $el . "</li>\n";
  }
  $ret .= "</ul>";
  return $ret;
}

//---- POST ----//

function ACCEPT_POST()
{
  if (!@$_POST) return;
  switch (PAGE)
  {
    case "newsletter": post_newsletter(); break;
    case "beitritt": post_beitritt(); break;
    default: break;
  }
}



function test_newsletter()
{
  if (!ismail(@$_POST["newsletter_mehlabo"]))
  {
    if (!defined("ERROR")) define("ERROR", "Bitte geben Sie eine korrekte E-Mail-Adresse an.");
    return false;
  }
  else return true;
}

define("MG_SINGLE", 1);
define("MG_REDUCED", 2);
define("MG_FAMILY", 3);

define("MG_TIMELIMIT", "4 Wochen");

function calcCost($mg_type)
{ // Gibt die Mitgliedschaftskosten an...
  switch($mg_type)
  {
    case MG_SINGLE: return 5000;
    case MG_REDUCED: return 2000;
    case MG_FAMILY: return 6000;
    default: return 0;
  }
}

function mg_type_name($mg_type)
{
  switch($mg_type)
  {
    case MG_SINGLE: return "Einzelmitgliedschaft";
    case MG_REDUCED: return "Ermäßigte Mitgliedschaft";
    case MG_FAMILY: return "Familienmitgliedschaft";
    default: return "!!! FEHLER !!!";
  }
}

function mg_isCorrect()
{ // Prüft @$GLOBALS["mg"] auf Korrektheit -> nur das ermöglicht das Abschicken.
  // Zurückgeliefert wird ein Array mit Fehlerfeldern / Fehlercodes.
  if (!is_array(@$GLOBALS["mg"])) return array("incorrect_format");
  $mg = @$GLOBALS["mg"];
  if ((!is_array($mg["general"])) || (!is_array($mg["contact"])) || (!is_array($mg["payment"])) || (!is_array($mg["person"]))) return array("incorrect_format");
  $msgarr = array();
  
  if ($mg["general"]["cost"] == 0) array_push($msgarr, "type");
  if (!$mg["general"]["savedata"]) array_push($msgarr, "savedata");
  
  if (!$mg["contact"]["address"] || $mg["contact"]["address"] == "") array_push($msgarr, "address");
  if (!$mg["contact"]["plz"] || $mg["contact"]["plz"] == "") array_push($msgarr, "plzempty");
    else if ((strlen($mg["contact"]["plz"]) != 5) || ($mg["contact"]["plz"]*1 == 0)) array_push($msgarr, "plz");
  if (!$mg["contact"]["town"] || $mg["contact"]["town"] == "") array_push($msgarr, "town");
  if (!$mg["contact"]["email"] || $mg["contact"]["email"] == "") array_push($msgarr, "emailempty");
    else if (!ismail($mg["contact"]["email"])) array_push($msgarr, "email");
  
  if (!$mg["payment"]["bank"] || $mg["payment"]["bank"] == "") array_push($msgarr, "bank");
  if (!$mg["payment"]["bic"] || $mg["payment"]["bic"] == "") array_push($msgarr, "bicempty");
    else if (strlen($mg["payment"]["bic"]) != 8 && strlen($mg["payment"]["bic"]) != 11) array_push($msgarr, "bic");
  if (!$mg["payment"]["iban"] || $mg["payment"]["iban"] == "") array_push($msgarr, "ibanempty");
    else if (!isiban($mg["payment"]["iban"])) array_push($msgarr, "iban");
  
  foreach ($mg["person"] as $p)
  {
    if (!$p["name"] || $p["name"] == "") array_push($msgarr, "name"); // Später evtl. Key mitliefern, um dann z. B. das Feld hervorzuheben (Rahmen oder so...)
    if (!$p["firstname"] || $p["firstname"] == "") array_push($msgarr, "firstname");
    if (!$p["birthday"] || $p["birthday"] == "" || !isbirthday($p["birthday"])) array_push($msgarr, "birthday");
  }
  
  return $msgarr;
}

function rmNumberSpacers($txt)
{ // Entfernt typische Zifferntrenner
  while (preg_match("/[- _.:\/]/", $txt)) $txt = preg_replace("/[- _.:/]/g", "", $txt);
  return $txt;
}

define("NL_VERANTWORTLICH", "Karl Wewer");
define("NL_SENDER", "jazzletter@jazzfreunde-ingolstadt.de");
define("NL_SENDERMAIL", "Jazzfreunde Ingolstadt Newsletter <" . NL_SENDER . ">");

function post_newsletter()
{
  if (@$_POST["newsletter_mehlabo"])
  {
    if (!test_newsletter()) return;
    $NL_VERANTWORTLICH = NL_VERANTWORTLICH;
    $NL_SENDER = NL_SENDER;
    $NL_SENDERMAIL = NL_SENDERMAIL;
    $NL_ABONNENT = (@$_POST["newsletter_nameabo"] != "" ? @$_POST["newsletter_nameabo"] : @$_POST["newsletter_mehlabo"]) . " <" . @$_POST["newsletter_mehlabo"] . ">";
    
    send_mail("Bestätigung: Newsletter der Jazzfreunde Ingolstadt abonniert", "Sie haben gerade den Newsletter der Jazzfreunde Ingolstadt unter dieser Mail-Adresse abonniert. Der Newsletter erscheint in etwa ein- bis zweimal im Monat, abhängig von den Neuigkeiten rund um denn Jazz in der Region.\n\nUm den Newsletter zu kündigen, schicken Sie einfach eine formlose Mail mit dem Betreff \"Newsletter kündigen\" an " . $NL_SENDER . " und Sie werden aus der Empfängerliste entfernt.\n\n(Hinweis: Diese Mail wurde automatisch erstellt. Verantwortlich für den Newsletter ist " . $NL_VERANTWORTLICH . ".)", $NL_SENDERMAIL, $NL_ABONNENT);
    send_mail("Anmeldung Newsletter", "Soeben hat " . $NL_ABONNENT . " den Newsletter der Jazzfreunde Ingolstadt abonniert. Bitte die Person in den Newsletter-Verteiler eintragen.\n\n(Hinweis: Diese Mail wurde automatisch erstellt. Der Abonnent hat automatisch eine Bestätigungsmail erhalten.)", $NL_ABONNENT, $NL_SENDERMAIL);
    
    if (!defined("MESSAGE")) define("MESSAGE", "Die Bestellung des Newsletters war erfolgreich.<br />Sie sollten in kurzer Zeit eine Bestätigungsmail erhalten.");
  }
}

function listofbeitritterrors()
{
  $ret = "";
  
  foreach (@$GLOBALS["mg"]["general"]["iscorrect"] as $s)
  {
    $ret .= "<li>";
    switch ($s)
    {
      case "incorrect_format": $ret .= "Das interne Datenformat ist defekt, eine Online-Anmeldung ist im Moment nicht möglich!"; break;
      case "type": $ret .= "Fehlerhafte Art der Mitgliedschaft"; break;
      case "savedata": $ret .= "Ohne die Einwilligung zum Speichern der Daten können Sie leider kein Mitglied werden"; break;
      case "address": $ret .= "Bitte geben Sie Ihre Anschrift (Straße und Hausnummer) an"; break;
      case "plzempty": $ret .= "Bitte geben Sie Ihre Postleitzahl an"; break;
      case "plz": $ret .= "Bitte geben Sie Ihre Postleitzahl korrekt an"; break;
      case "town": $ret .= "Bitte geben Sie Ihren Wohnort an"; break;
      case "emailempty": $ret .= "Bitte geben Sie Ihre E-Mail-Adresse an"; break;
      case "email": $ret .= "Bitte geben Sie Ihre E-Mail-Adresse korrekt an"; break;
      case "bank": $ret .= "Bitte geben Sie Ihr Kreditinstitut an"; break;
      case "blzempty": $ret .= "Bitte geben Sie Ihre Bankleitzahl an"; break;
      case "blz": $ret .= "Bitte geben Sie Ihre Bankleitzahl korrekt an"; break;
      case "bicempty": $ret .= "Bitte geben Sie den BIC Ihrer Bank an"; break;
      case "bic": $ret .= "Bitte geben Sie den BIC Ihrer Bank korrekt an"; break;
      case "kontoempty": $ret .= "Bitte geben Sie Ihre Kontonummer an"; break;
      case "konto": $ret .= "Bitte geben Sie Ihre Kontonummer korrekt an"; break;
      case "ibanempty": $ret .= "Bitte geben Sie Ihre IBAN an"; break;
      case "iban": $ret .= "Bitte geben Sie Ihre IBAN korrekt an"; break;
      case "name": $ret .= "Bitte geben Sie den Nachnamen des künftigen Mitglieds an"; break;
      case "firstname": $ret .= "Bitte geben Sie den Vornamen des künftigen Mitglieds an"; break;
      case "birthday": $ret .= "Bitte geben Sie das Geburtsdatum des künftigen Mitglieds an"; break;
      default: /*Unbekannter Fehler...*/
    }
    $ret .= "</li>";
  }
  
  return $ret;
}

function personalsformail()
{
  $ret      = "\nArt der Mitgliedschaft: " . mg_type_name(@$GLOBALS["mg"]["general"]["type"]);
  // zur Person
  if (@$GLOBALS["mg"]["general"]["type"] != MG_FAMILY)
  {
    $ret   .= "\n------------------------";
    $ret   .= "\nName: ................. " . @$GLOBALS["mg"]["person"][0]["name"];
    $ret   .= "\nVorname: .............. " . @$GLOBALS["mg"]["person"][0]["firstname"];
    $ret   .= "\nGeburtsdatum: ......... " . @$GLOBALS["mg"]["person"][0]["birthday"];
    if (@$GLOBALS["mg"]["person"][0]["instrument"] && @$GLOBALS["mg"]["person"][0]["instrument"] != "")
      $ret .= "\nInstrument: ........... " . @$GLOBALS["mg"]["person"][0]["instrument"];
    if (@$GLOBALS["mg"]["person"][0]["band"] && @$GLOBALS["mg"]["person"][0]["band"] != "")
      $ret .= "\nBand: ................. " . @$GLOBALS["mg"]["person"][0]["band"];
    if (@$GLOBALS["mg"]["person"][0]["school"] && @$GLOBALS["mg"]["person"][0]["school"] != "")
      $ret .= "\nSchule / Hochschule: .. " . @$GLOBALS["mg"]["person"][0]["school"];
  }
  else foreach (@$GLOBALS["mg"]["person"] as $p)
  {
    $ret   .= "\n------------------------";
    $ret   .= "\nName: ................. " . $p["name"];
    $ret   .= "\nVorname: .............. " . $p["firstname"];
    $ret   .= "\nGeburtsdatum: ......... " . $p["birthday"];
    if ($p["instrument"] && $p["instrument"] != "")
      $ret .= "\nInstrument: ........... " . $p["instrument"];
    if ($p["band"] && $p["band"] != "")
      $ret .= "\nBand: ................. " . $p["band"];
    if ($p["school"] && $p["school"] != "")
      $ret .= "\nSchule / Hochschule: .. " . $p["school"];
  }
  $ret     .= "\n------------------------";
  // Kontaktdaten
  $ret     .= "\nAdresse: .............. " . @$GLOBALS["mg"]["contact"]["address"];
  $ret     .= "\nWohnort: .............. " . @$GLOBALS["mg"]["contact"]["plz"] . " " . @$GLOBALS["mg"]["contact"]["town"];
  if (@$GLOBALS["mg"]["contact"]["phone"] && @$GLOBALS["mg"]["contact"]["phone"] != "")
    $ret   .= "\nTelefonnummer: ........ " . @$GLOBALS["mg"]["contact"]["phone"];
  $ret     .= "\nE-Mail-Adresse: ....... " . @$GLOBALS["mg"]["contact"]["email"];
  $ret     .= "\n------------------------";
  // Kontodaten
  $ret     .= "\nKreditinstitut: ....... " . @$GLOBALS["mg"]["payment"]["bank"];
  $ret     .= "\nBIC: .................. " . @$GLOBALS["mg"]["payment"]["bic"];
  $ret     .= "\nIBAN: ................. " . @$GLOBALS["mg"]["payment"]["iban"];
  $ret     .= "\nKontoinhaber: ......... " . @$GLOBALS["mg"]["payment"]["financier"];
  $ret     .= "\n------------------------";
  $ret     .= "\nJahresbeitrag: ........ " . mkgeld(@$GLOBALS["mg"]["general"]["cost"]) . " €";
  $ret     .= "\n------------------------";
  $ret     .= "\nNewsletter abonniert:   " . (@$GLOBALS["mg"]["general"]["newsletter"] ? "ja" : "nein");
  
  return $ret;
}

define("MG_VERANTWORTLICH", "Karl Wewer");
define("MG_SENDER", "mitglieder@jazzfreunde-ingolstadt.de");
define("MG_SENDERMAIL", "Jazzfreunde Ingolstadt <" . MG_SENDER . ">");

define("JFI_IBAN", "DE77721500000050499672");
define("JFI_KONTOINHABER", "JAZZFREUNDE INGOLSTADT EV");
define("JFI_BIC", "BYLADEM1ING");
define("JFI_BANK", "SPARKASSE INGOLSTADT");

define("MG_RANDOMNUMBERSIZE", 5);

function process_beitritt()
{ // Mail verschicken
  $MG_RANDOMNUMBER = randomstring("123456789", MG_RANDOMNUMBERSIZE);

  $MG_MITGLIED_NAME = @$GLOBALS["mg"]["person"][0]["firstname"] . " " . @$GLOBALS["mg"]["person"][0]["name"];
  $MG_MITGLIED = $MG_MITGLIED_NAME . " <" . @$GLOBALS["mg"]["contact"]["email"] . ">";
  
  // Für das neue Mitglied
  send_mail("Bestätigung: Online-Mitgliedschaftsantrag der Jazzfreunde Ingolstadt", "Sie haben soeben online eine Mitgliedschaft bei den Jazzfreunden Ingolstadt beantragt. Dabei haben Sie folgende Informationen angegeben:\n" . personalsformail() . "\n\nDiese Informationen werden zu Vereinszwecken gespeichert und verarbeitet.\n\nDamit die Mitgliedschaft gültig wird, überweisen Sie bitte den ersten Jahresbeitrag von " . mkgeld(@$GLOBALS["mg"]["general"]["cost"]) . " EUR auf unser Konto. Die Beiträge des folgenden Jahres werden dann per SEPA-Lastschriftmandat jeweils am 15. Januar von Ihrem Konto abgebucht, eine Überweisung brauchen Sie dann nicht mehr ausfüllen.\n\nDaten für die Überweisung:\n" .
  "\nBegünstigter: .................. " . JFI_KONTOINHABER .
  "\nIBAN des Begünstigten: ......... " . JFI_IBAN.
  "\nBIC: ........................... " . JFI_BIC .
  "\nKreditinstitut des Begünstigten: " . JFI_BANK .
  "\nBetrag: ........................ " . mkgeld(@$GLOBALS["mg"]["general"]["cost"]) .
  "\nVerwendungszweck: .............. " . "MITGLIEDSCHAFTSANTRAG" .
  "\nNoch Verwendungszweck: ......... " . $MG_RANDOMNUMBER .
  "\nKontoinhaber: .................. " . @$GLOBALS["mg"]["payment"]["financier"] .
  "\nIBAN des Kontoinhabers: ........ " . @$GLOBALS["mg"]["payment"]["iban"] .
  "\n\nBitte denken Sie an die " . MG_RANDOMNUMBERSIZE . "-stellige Zahl im Verwendungszweck: Diese dient dazu, Verwechslungen bei den Mitgliedsanträgen auszuschließen. Diese Nummer ist NICHT Ihre Mitgliedsnummer - diese erhalten Sie erst, wenn die Überweisung erfolgreich war und Sie Mitglied des Vereins sind.\nBitte überweisen Sie den Jahresbeitrag innerhalb von " . MG_TIMELIMIT . ", damit Ihre Mitgliedschaft gültig wird. Als Vereinsmitglied erhalten Sie einen Mitgliedsausweis, der Ihnen zugeschickt wird.\n\n" . (@$GLOBALS["mg"]["general"]["newsletter"] ? "Da Sie mit dem Mitgliedsantrag auch den Newsletter abonniert haben, erhalten Sie diesen etwa ein- bis zweimal im Monat, abhängig von den Neuigkeiten rund um denn Jazz in der Region. Um den Newsletter zu kündigen, schicken Sie einfach eine formlose Mail mit dem Betreff \"Newsletter kündigen\" an " . NL_SENDER . " und Sie werden aus der Empfängerliste entfernt." : "Sie haben mit dem Mitgliedsantrag nicht den Newsletter abonniert. Sollten Sie diesen erhalten wollen, finden Sie dafür ein Eingabefeld auf http://www.jazzfreunde-ingolstadt.de im Menüpunkt \"Newsletter\". Der Newsletter erscheint in etwa ein- bis zweimal im Monat, abhängig von den Neuigkeiten rund um denn Jazz in der Region, und informiert Sie auch über interne Geschehnisse im Verein.") . "\n\n(Hinweis: Diese Mail wurde automatisch erstellt. Verantwortlich für den Mitgliedsantrag ist " . MG_VERANTWORTLICH . (@$GLOBALS["mg"]["general"]["newsletter"] ? ", verantwortlich für den Newsletter ist " . NL_VERANTWORTLICH : "" ) . ".)", MG_SENDERMAIL, $MG_MITGLIED);
  
  // Für den Schatzmeister...
  send_mail("Online-Mitgliedsantrag: " . $MG_MITGLIED_NAME, "Soeben hat " . $MG_MITGLIED_NAME . " das Online-Formular für eine Vereinsmitgliedschaft ausgefüllt und folgende Informationen angegeben:\n" . personalsformail() . "\n\nDie Antrags-Kennziffer ist " . $MG_RANDOMNUMBER . ".\n\n(Hinweis: Diese Mail wurde automatisch erstellt. Das künftige Mitglied hat automatisch eine Bestätigungsmail mit Aufforderung zur Überweisung der Beitrages innerhalb von " . MG_TIMELIMIT . " erhalten.)", $MG_MITGLIED, MG_SENDERMAIL);
  
  // Für den Newsletter
  if (@$GLOBALS["mg"]["general"]["newsletter"])
  {
    send_mail("Anmeldung Newsletter", "Soeben hat " . $MG_MITGLIED . " den Newsletter der Jazzfreunde Ingolstadt im Rahmen eines Online-Mitgliedsantrags abonniert. Bitte die Person in den Newsletter-Verteiler eintragen.\n\n(Hinweis: Diese Mail wurde automatisch erstellt. Der Abonnent hat automatisch eine Bestätigungsmail erhalten.)", $MG_MITGLIED, NL_SENDERMAIL);
  }

}

function post_beitritt()
{
  // Erstmal: Alles auf @$GLOBALS["mg"] umleiten
  @$GLOBALS["mg"] = array();
  
  @$GLOBALS["mg"]["general"] = array();
  @$GLOBALS["mg"]["general"]["type"] = (!@$_POST["mg_type"] ? MG_SINGLE : @$_POST["mg_type"]);
  @$GLOBALS["mg"]["general"]["newsletter"] = (!@$_POST["mg_newsletter"] || !@$_POST["mg_type"] ? false : true);
  @$GLOBALS["mg"]["general"]["savedata"] = (@$_POST["mg_savedata"] ? true : false);
  
  @$GLOBALS["mg"]["contact"] = array();
  @$GLOBALS["mg"]["contact"]["address"] = @$_POST["mg_address"];
  @$GLOBALS["mg"]["contact"]["plz"] = @$_POST["mg_plz"];
  @$GLOBALS["mg"]["contact"]["town"] = @$_POST["mg_town"];
  @$GLOBALS["mg"]["contact"]["phone"] = @$_POST["mg_phone"];
  @$GLOBALS["mg"]["contact"]["email"] = @$_POST["mg_email"];
  
  @$GLOBALS["mg"]["payment"] = array();
  @$GLOBALS["mg"]["payment"]["bank"] = @$_POST["mg_bank"];
  @$GLOBALS["mg"]["payment"]["bic"] = rmNumberSpacers(@$_POST["mg_bic"]);
  @$GLOBALS["mg"]["payment"]["iban"] = rmNumberSpacers(@$_POST["mg_iban"]);
  @$GLOBALS["mg"]["payment"]["financier"] = @$_POST["mg_financier"];
  
  @$GLOBALS["mg"]["person"] = array();
  $index = 0;
  if (is_array(@$_POST["mg_name"]))
  {
    $keys = array_keys(@$_POST["mg_name"]);
    sort($keys);
    foreach ($keys as $key)
    {
      if (@$_POST["mg_name"][$key] == "") continue;
      @$GLOBALS["mg"]["person"][$index] = array();
      @$GLOBALS["mg"]["person"][$index]["name"] = @$_POST["mg_name"][$key];
      @$GLOBALS["mg"]["person"][$index]["firstname"] = @$_POST["mg_firstname"][$key];
      @$GLOBALS["mg"]["person"][$index]["birthday"] = @$_POST["mg_birthday"][$key];
      @$GLOBALS["mg"]["person"][$index]["instrument"] = @$_POST["mg_instrument"][$key];
      @$GLOBALS["mg"]["person"][$index]["band"] = @$_POST["mg_band"][$key];
      @$GLOBALS["mg"]["person"][$index]["school"] = @$_POST["mg_school"][$key];
      
      $index++;
    }
  }
  // Neues Mitglied hinzufügen
  if (@$_POST["mg_add"])
  {
    @$GLOBALS["mg"]["person"][$index] = array();
    @$GLOBALS["mg"]["person"][$index]["name"] = @$GLOBALS["mg"]["person"][$index-1]["name"];
    @$GLOBALS["mg"]["person"][$index]["firstname"] = "";
    @$GLOBALS["mg"]["person"][$index]["birthday"] = "";
    @$GLOBALS["mg"]["person"][$index]["instrument"] = "";
    @$GLOBALS["mg"]["person"][$index]["band"] = "";
    @$GLOBALS["mg"]["person"][$index]["school"] = "";
    // Dann natürlich nur Familienmitgliedschaft...
    @$GLOBALS["mg"]["general"]["type"] = MG_FAMILY;
  }
  
  if ((!@$GLOBALS["mg"]["payment"]["financier"] || @$GLOBALS["mg"]["payment"]["financier"] == "") && (is_array(@$GLOBALS["mg"]["person"][0]) && @$GLOBALS["mg"]["person"][0]["name"] && @$GLOBALS["mg"]["person"][0]["name"] != "" && @$GLOBALS["mg"]["person"][0]["firstname"] && @$GLOBALS["mg"]["person"][0]["firstname"] != "")) @$GLOBALS["mg"]["payment"]["financier"] = @$GLOBALS["mg"]["person"][0]["name"] . ", " . @$GLOBALS["mg"]["person"][0]["firstname"];
  
  // Preis festsetzen...
  @$GLOBALS["mg"]["general"]["cost"] = calcCost(@$GLOBALS["mg"]["general"]["type"]);
  
  // Dann: Prüfen, ob alles passt - erst mal präventiv...
  @$GLOBALS["mg"]["general"]["iscorrect"] = mg_isCorrect();
  
  // Und jetzt - Absenden?
  @$GLOBALS["mg"]["general"]["wantsend"] = false;
  @$GLOBALS["mg"]["general"]["sent"] = false;
  if (@$_POST["mg_wantgo"])
  {
    if (count(@$GLOBALS["mg"]["general"]["iscorrect"]) == 0)
    {
      @$GLOBALS["mg"]["general"]["wantsend"] = true;
    }
    else
    {
      if (!defined("ERROR")) define("ERROR", "Nicht alle Daten wurden korrekt eingegeben:<ul class=\"errorlist\">" . listofbeitritterrors() . "</ul>");
      @$GLOBALS["mg"]["general"]["wantsend"] = false;
    }
  }
  else if (@$_POST["mg_go"])
  {
    if (count(@$GLOBALS["mg"]["general"]["iscorrect"]) == 0)
    { // Wirklich schicken
      process_beitritt();
      if (!defined("MESSAGE")) define("MESSAGE", "Die Online-Mitgliedserklärung wurde erfolgreich abgeschickt.<br />Sie sollten in kurzer Zeit eine Bestätigungsmail erhalten, in der auch die Überweisungsdaten angegeben sind.<br />Führen Sie die Überweisung des Betrages (" . mkgeld(@$GLOBALS["mg"]["general"]["cost"]) . " €) bitte innerhalb von " . MG_TIMELIMIT . " durch.<br /><br />Bitte denken Sie daran, dass Sie noch das ausgefüllte und unterschriebene <a href=\"dox/SEPA-Mandat.pdf\">SEPA-Lastschriftmandat</a> an uns senden müssen!");
      @$GLOBALS["mg"]["general"]["sent"] = true;
    }
    else
    {
      if (!defined("ERROR")) define("ERROR", "Nicht alle Daten wurden korrekt eingegeben:<ul class=\"errorlist\">" . listofbeitritterrors() . "</ul>");
      @$GLOBALS["mg"]["general"]["sent"] = false;
    }
  }
}

?>
