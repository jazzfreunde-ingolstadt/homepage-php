<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component;

use Components\Component;
use Components\Traits\PropsWithChildren;

/**
 * Grundlegendes Layout der Applikation
 */
final class MainDeprecated extends Component
{
    use PropsWithChildren;

    public function Render(): void
    {
        define("PAGE", "termine");
        define("TITLE", "Veranstaltungen");

        include_once dirname(__DIR__, 2)."/legacy/inc/environment.php";

        ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de" dir="ltr">
        <?php $this->head() ?>
  <body>
    <table id="alltable" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <tr>
        <td rowspan="2" id="left" align="center" valign="top" width="220">
          <a href="/">
            <div id="logo">
              <img src="/gfx/logo_lomt.png" alt="Jazzfreunde Ingolstadt e. V." width="200" height="200" />
            </div>
          </a>
          <?php menu() ?>
        </td>
        <th id="headline" align="center" valign="middle" height="50">Jazzfreunde Ingolstadt <small>e. V.</small></th>
      </tr>
      <tr>
        <td id="content" align="left" valign="top">
          <?php message(); ?>
                <?= $this->props->children ?>
                </td>
              </tr>
              <tr>
                <td colspan="2" id="footer" height="30" align="center" valign="middle">Jazzfreunde Ingolstadt, Lindbergstr. 3a, 85051 Ingolstadt</td>
              </tr>
            </table>
          </body>

  </html>
            <?php
    }

    private function head(): void
    {
        ?>
        <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Jazzfreunde Ingolstadt e. V.<?= (defined("TITLE") ? " – ".TITLE : "") ?></title>
        <meta name="author" content="Michael Mayer" />
        <meta name="keywords" content="jazz, jazzfreunde, jazzmusik, ingolstadt, b&uuml;rgerhaus, alte post, summerjazz, kultur, jazztage, konzerte, diagonal, neue welt, jazzf&ouml;rderpreis, schule" />
        <meta name="html-author" content="MicheMayer" />
        <meta name="robots" content="<?= ROBOTS ?>" />
        <meta name="generator" content="kwrite" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" type="text/css" media="all" href="/env/default.css" title="Jazzfreunde blau-orange" />
            <?php if (defined("VIDEO")) { ?>
            <script type="text/javascript" src="/env/swfobject.js"></script>
    <?php } ?>
            <script type="text/javascript" src="/env/default.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      </head>
        <?php
    }
}
