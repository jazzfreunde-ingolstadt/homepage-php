<?php
if (defined("PAGE")) die("Wrong reference.");
define("PAGE", "bilder");
define("TITLE", "Bilder");

include_once(__DIR__ . "/../inc/environment.php");

function toc()
{
?>
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
  <li><a href="<?= (PAGE . PAGE_ENDING) ?>?<?= PAGE ?>=<?= $id ?><?= ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") ?>"><?= $title ?></a></li>
<?php
}

function ilink($folder, $nrfrom, $nrto = null)
{
  $link = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $folder . "&amp;image=" . ($nrfrom) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">" . $nrfrom . "</a>";
  if ($nrto != null) $link .= " – <a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $folder . "&amp;image=" . ($nrto) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">" . $nrto . "</a>";
  return $link;
}

//--- PICVIEWER ---//

define("IMG_PICSPERLINE", 6);
define("IMG_LINESPERPAGE", 6);
define("IMG_FULLDIR", "full/"); // Muss mit '/' enden, soll nicht mit '/' beginnen
define("IMG_THUMBDIR", "pre/"); // Muss mit '/' enden, soll nicht mit '/' beginnen
define("IMG_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/imx/"); // Muss mit '/' enden
define("IMG_THUMBSIZE", 80);

define("BACKLINK", (isset($_GET["via"]) ? $_GET["via"] . PAGE_ENDING : PAGE . PAGE_ENDING));

var_dump(IMG_ROOT);

function getpix($folder)
{ // Gibt die Bildnamen im Verzeichnis aus.
  // Es werden nur die aufgelistet, die im FULLDIR und im THUMBDIR vorhanden sind!
  $imx = array();
  $fulldir = IMG_ROOT . $folder . "/" . IMG_FULLDIR;
  $thumbdir = IMG_ROOT . $folder . "/" . IMG_THUMBDIR;
  if ((!is_dir($fulldir)) || (!is_dir($thumbdir)))
    throw new Exception("Bilder: Der angegebene Pfad '${fulldir}' existiert nicht.");
  $dir = opendir($fulldir);

  if ($dir == false)
    throw new Exception("Bilder: Der angegebene Pfad '${dir}' konnte nicht geöffnet werden.");

  while (($file = readdir($dir)) !== false) {
    if (strtolower(substr($file, -4, 4)) == ".jpg") { // Ist ein gültiges Bild... gibts das nun auch als Thumbnail?
      if (file_exists(IMG_ROOT . $folder . "/" . IMG_THUMBDIR . $file)) {
        array_push($imx, $file);
      }
    }
  }
  closedir($dir);
  sort($imx);
  return $imx;
}

function writeNaviThumb($pid, $count, $page, $imgcnt)
{

  if ($page == 1) {
    $backlink = "&nbsp;";
  } else {
    $backlink = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;page=" . ($page - 1) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Seite " . ($page - 1) . "</a>";
  }

  if ($page == $count) {
    $nextlink = "&nbsp;";
  } else {
    $nextlink = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;page=" . ($page + 1) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Seite " . ($page + 1) . "</a>";
  }

  $pagename = $imgcnt . " Bild" . ($imgcnt == 1 ? "" : "er");
  if ($count > 1) {
    $pagename = "Seite " . $page . " von " . $count . " (" . $pagename . ")";
  }
?>

  <table class="navitable" border="0" cellspacing="0" cellpadding="4" width="100%">
    <tr>
      <td class="back" width="30%" align="left"><?= $backlink ?></td>
      <td class="page" width="40%" align="center"><?= $pagename ?></td>
      <td class="next" width="30%" align="right"><?= $nextlink ?></td>
    </tr>
  </table>

<?php
}

function writeNaviPic($pid, $imgcnt, $img, $basepage, $toplink = false)
{
  $img++;
  if ($img == 1) {
    $backlink = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;image=" . ($imgcnt) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Zum letzten Bild</a>";
  } else {
    $backlink = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;image=" . ($img - 1) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Vorheriges Bild</a>";
  }

  if ($img == $imgcnt) {
    $nextlink = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;image=" . (1) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Zum ersten Bild</a>";
  } else {
    $nextlink = "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;image=" . ($img + 1) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Nächstes Bild</a>";
  }

  $pagename = ($toplink ? "<a href=\"" . $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $pid . "&amp;page=" . $basepage . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") . "\">Zur Übersicht</a>" : "Bild " . $img . " von " . $imgcnt);
?>

  <table class="navitable" border="0" cellspacing="0" cellpadding="4" width="100%">
    <tr>
      <td class="back" width="30%" align="left"><?= $backlink ?></td>
      <td class="page" width="40%" align="center"><?= $pagename ?></td>
      <td class="next" width="30%" align="right"><?= $nextlink ?></td>
    </tr>
  </table>

  <?php
}

function picview($folder)
{
  try {
    $PIX = getpix($folder);
  } catch (Exception $e) {
    $PIX = [];
  }

  $page = $_GET["page"] * 1;
  $image = $_GET["image"] * 1;

  if ($page <= 0) $page = 1;

  $picsum = count($PIX);

  $numpages = ceil($picsum / (IMG_PICSPERLINE * IMG_LINESPERPAGE));

  if ($page > $numpages) $page = $numpages;

  if ($numpages == 0) {
  ?>
    <div class="message">Es sind keine Bilder vorhanden.</div>
  <?php
    return;
  }

  if ($image == 0) { // Thumbnails
    $startnr = ($page - 1) * IMG_PICSPERLINE * IMG_LINESPERPAGE;
    $lines = ($numpages > $page ? IMG_LINESPERPAGE : ceil(($picsum - $startnr) / IMG_PICSPERLINE));

    // Kopftabelle schreiben
    writeNaviThumb($folder, $numpages, $page, $picsum);
    // Thumb-Tabelle schreiben
  ?>
    <table class="thumbtable" border="0" cellspacing="4" cellpadding="2" align="center">
      <?php
      for ($line = 0; $line < $lines; $line++) {
      ?>
        <tr>
          <?php
          for ($nr = $startnr + $line * IMG_PICSPERLINE; $nr < $startnr + ($line + 1) * IMG_PICSPERLINE; $nr++) {
            if ($nr < $picsum) {
          ?>
              <td class="thumbnail" align="center" valign="center" height="<?= IMG_THUMBSIZE + 4 ?>" width="<?= IMG_THUMBSIZE + 4 ?>"><a href="<?= $_SERVER["PHP_SELF"] . "?" . PAGE . "=" . $folder . "&amp;image=" . ($nr + 1) . ($_GET["via"] ? "&amp;via=" . $_GET["via"] : "") ?>" title="Bild ansehen"><img src="<?= IMG_ROOT . $folder . "/" . IMG_THUMBDIR . $PIX[$nr] ?>" alt="" />
                  <!--<?= $PIX[$nr] ?>-->
                </a></td>
            <?php
            } else {
            ?>
              <td class="empty_thumbnail" align="center" valign="center"><img src="gfx/blank.png" alt="" /></td>
          <?php
            }
          }
          ?>
        </tr>
      <?php
      }
      ?>
    </table>
  <?php
    // Fußtabelle schreiben
    writeNaviThumb($folder, $numpages, $page, $picsum);
  } else { // Details
    $basepage = ceil($image / (IMG_PICSPERLINE * IMG_LINESPERPAGE));
    $image--; // Wurde als $nr+1 übergeben, damit image=0 im Search auffällt
    // Kopftabelle schreiben
    writeNaviPic($folder, $picsum, $image, $basepage);
    // Bild-Ansicht
  ?>
    <table class="imagetable" border="0" cellspacing="0" cellpadding="4" align="center">
      <tr>
        <td class="image"><img src="<?= IMG_ROOT . $folder . "/" . IMG_FULLDIR . $PIX[$image] ?>" alt="<?= $PIX[$image] ?>" /></td>
      </tr>
    </table>
<?php
    // Fußtabelle schreiben
    writeNaviPic($folder, $picsum, $image, $basepage, true);
  }
}


include_once(__DIR__ . "/../data/bilder.php");

head();
before();

content();

after();
?>