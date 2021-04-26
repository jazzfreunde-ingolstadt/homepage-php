<?php
if (!defined("PAGE")) {
  header("location:../bilder.php");
  die();
}

function fotograf($text)
{
?>
  <p style="text-align:center; font-size:90%; color:#606060;">Fotos: <?php echo htmlspecialchars($text) ?></p>
  <?php
}

error_reporting(E_ERROR | E_PARSE);

if (false) { // Damit ich mit else if gleich anfangen kann ^^
}
/**

 Die HTML-Daten werden in einzelnen Blöcken abgelegt und jeweils gesondert addressiert. Aus der Reihenfolge der Daten ergibt sich zudem das Inhaltsverzeichnis.

**/

else if (($_GET[PAGE] == ($folder = "JS_20170409")) || ($_GET[PAGE] == addpoint(PAGE, "84. Jam Session (09. April 2017)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 84. Jam Session (09. April 2017)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20170319")) || ($_GET[PAGE] == addpoint(PAGE, "83. Jam Session (19. März 2017)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 83. Jam Session (19. März 2017)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20170219")) || ($_GET[PAGE] == addpoint(PAGE, "82. Jam Session (19. Februar 2017)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 82. Jam Session (19. Februar 2017)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20170120")) || ($_GET[PAGE] == addpoint(PAGE, "81. Jam Session (22. Januar 2017)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 81. Jam Session (22. Januar 2017)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20161218")) || ($_GET[PAGE] == addpoint(PAGE, "80. Jam Session (18. Dezember 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 80. Jam Session (18. Dezember 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20161120")) || ($_GET[PAGE] == addpoint(PAGE, "79. Jam Session (20. November 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 79. Jam Session (20. November 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage16/Jazzgottesdienst")) || ($_GET[PAGE] == addpoint(PAGE, "Batter My Soul (06. November 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Batter My Soul (06. November 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage16/4OfAKind")) || ($_GET[PAGE] == addpoint(PAGE, "4 Of A Kind (01. November 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von 4 Of A Kind (01. November 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage16/Bonuskonzert")) || ($_GET[PAGE] == addpoint(PAGE, "Mallets &amp; Friends und Hard Days Night Bigband (24. Oktober 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Mallets &amp; Friends und der Hard Days Night Bigband (24. Oktober 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20161016")) || ($_GET[PAGE] == addpoint(PAGE, "78. Jam Session (16. Oktober 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 78. Jam Session (16. Oktober 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Eisele_20160925")) || ($_GET[PAGE] == addpoint(PAGE, "Dr. Eisele und die Besen (25. September 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Dr. Eisele und die Besen (25. September 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20160619")) || ($_GET[PAGE] == addpoint(PAGE, "75. Jam Session (19. Juni 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 75. Jam Session (19. Juni 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20160508")) || ($_GET[PAGE] == addpoint(PAGE, "74. Jam Session (08. Mai 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 74. Jam Session (08. Mai 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20160417")) || ($_GET[PAGE] == addpoint(PAGE, "73. Jam Session (17. April 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 73. Jam Session (17. April 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JuL_20160214")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz &amp; Literatur (14. Februar 2016)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jazz &amp; Literatur (14. Februar 2016)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Tom Diewock") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20151221")) || ($_GET[PAGE] == addpoint(PAGE, "69. Jam Session (21. Dezember 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 69. Jam Session (21. Dezember 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "DeathRay_20151129")) || ($_GET[PAGE] == addpoint(PAGE, "Death Ray Boogie Trio (29. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Death Ray Boogie Trio (29. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/Zaz")) || ($_GET[PAGE] == addpoint(PAGE, "Zaz (09. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Zaz (09. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/MelodyGardot")) || ($_GET[PAGE] == addpoint(PAGE, "Melody Gardot (08. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Melody Gardot (08. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/Jazzgottesdienst")) || ($_GET[PAGE] == addpoint(PAGE, "Batter My Soul (08. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Batter My Soul (08. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/JP2")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzparty II (07. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazzparty II (07. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/JP1")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzparty I (06. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazzparty I (06. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/JanDelay")) || ($_GET[PAGE] == addpoint(PAGE, "Jan Delay (06. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jan Delay (06. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/Yakoto")) || ($_GET[PAGE] == addpoint(PAGE, "Welcome Party (05. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Welcome Party (05. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/FabrizioConsoli")) || ($_GET[PAGE] == addpoint(PAGE, "Fabrizio Consoli &amp; Band (05. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Fabrizio Consoli &amp; Band (05. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/BahamaSoulClub")) || ($_GET[PAGE] == addpoint(PAGE, "Bahama Soul Club (05. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Bahama Soul Club (05. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/JeffLorber")) || ($_GET[PAGE] == addpoint(PAGE, "Jeff Lorber (05. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jeff Lorber (05. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/YJP")) || ($_GET[PAGE] == addpoint(PAGE, "19. Session der Young Players (02. November 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 19. Session der Young Players (02. November 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/LisaSimone")) || ($_GET[PAGE] == addpoint(PAGE, "Lisa Simone (30. Oktober 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Lisa Simone (30. Oktober 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/Gasandji")) || ($_GET[PAGE] == addpoint(PAGE, "Gasandji (25. Oktober 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Gasandji (25. Oktober 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20151018")) || ($_GET[PAGE] == addpoint(PAGE, "67. Jam Session (18. Oktober 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 67. Jam Session (18. Oktober 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Tom Diewock") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage15/Verleihung")) || ($_GET[PAGE] == addpoint(PAGE, "Verleihung des Jazzförderpreises (17. Oktober 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Verleihung des Jazzförderpreises (17. Oktober 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20150927")) || ($_GET[PAGE] == addpoint(PAGE, "66. Jam Session (27. September 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 66. Jam Session (27. September 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Tom Diewock") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20150717")) || ($_GET[PAGE] == addpoint(PAGE, "65. Jam Session (19. Juli 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 65. Jam Session (19. Juli 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Tumult_20150712")) || ($_GET[PAGE] == addpoint(PAGE, "Schul-Jazzbands Ingolstadt (12. Juli 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Schul-Jazzbands Ingolstadt (12. Juli 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jamazzing_20150623")) || ($_GET[PAGE] == addpoint(PAGE, "Soiree mit JamaZZing (23. Juni 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Soiree mit JamaZZing (23. Juni 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20150621")) || ($_GET[PAGE] == addpoint(PAGE, "64. Jam Session (21. Juni 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 64. Jam Session (21. Juni 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber, Sebastian Gruber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20150517")) || ($_GET[PAGE] == addpoint(PAGE, "63. Jam Session (17. Mai 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 63. Jam Session (17. Mai 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20150308")) || ($_GET[PAGE] == addpoint(PAGE, "61. Jam Session (08. März 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 61. Jam Session (08. März 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20150208")) || ($_GET[PAGE] == addpoint(PAGE, "60. Jam Session (08. Februar 2015)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 60. Jam Session (08. Februar 2015)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Tom Diewock") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20141214")) || ($_GET[PAGE] == addpoint(PAGE, "58. Jam Session (14. Dezember 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 58. Jam Session (14. Dezember 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/GregoryPorter")) || ($_GET[PAGE] == addpoint(PAGE, "Gregory Porter (09. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Gregory Porter (09. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/BatterMySoul")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzgottesdienst: Batter My Soul (09. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Jazzgottesdienst: Batter My Soul (09. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/Jazzparty2")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzparty II (08. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazzparty II (08. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/Jazzparty1")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzparty I (07. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazzparty I (07. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/WelcomeParty")) || ($_GET[PAGE] == addpoint(PAGE, "Welcome Party (06. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Welcome Party (06. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_031114")) || ($_GET[PAGE] == addpoint(PAGE, "18. Session der Young Jazz Players (03. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 18. Session der Young Jazz Players (03. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/TimBendzko")) || ($_GET[PAGE] == addpoint(PAGE, "Tim Bendzko +4 (02. November 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Tim Bendzko +4 (02. November 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/GJN")) || ($_GET[PAGE] == addpoint(PAGE, "Oliver Wasilesku Trio, Jason Seizer New Quartet plays Cinema Paradiso (27. Oktober 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Oliver Wasilesku Trio und Jason Seizer New Quartet plays Cinema Paradiso (27. Oktober 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Gerhard Löser, Horst Weber, Christian Wurm") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Oliver Wasilesku Trio (<?php echo ilink(IMG_FOLDER, 1, 33) ?>)<br />
      Jason Seizer New Quartet plays Cinema Paradiso (<?php echo ilink(IMG_FOLDER, 34, 70) ?>)<br />
    </p>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/JanGarbarek")) || ($_GET[PAGE] == addpoint(PAGE, "Jan Garbarek &amp; the Hilliard Ensemble (24. Oktober 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jan Garbarek &amp; the Hilliard Ensemble (24. Oktober 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20141019")) || ($_GET[PAGE] == addpoint(PAGE, "56. Jam Session (19. Oktober 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 56. Jam Session (19. Oktober 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage14/OliviaTrummer")) || ($_GET[PAGE] == addpoint(PAGE, "Olivia Trummer (18. Oktober 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Olivia Trummer (18. Oktober 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "MalletAndFriends_20140928")) || ($_GET[PAGE] == addpoint(PAGE, "Mallet &amp; Friends (28. September 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Mallet &amp; Friends (28. September 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140720")) || ($_GET[PAGE] == addpoint(PAGE, "55. Jam Session (20. Juli 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 55. Jam Session (20. Juli 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140629")) || ($_GET[PAGE] == addpoint(PAGE, "54. Jam Session (29. Juni 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 54. Jam Session (29. Juni 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140525")) || ($_GET[PAGE] == addpoint(PAGE, "53. Jam Session (25. Mai 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 53. Jam Session (25. Mai 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140406")) || ($_GET[PAGE] == addpoint(PAGE, "52. Jam Session (04. April 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 52. Jam Session (04. April 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140316")) || ($_GET[PAGE] == addpoint(PAGE, "51. Jam Session (16. März 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 51. Jam Session (16. März 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "BBN2014")) || ($_GET[PAGE] == addpoint(PAGE, "3. Big Band Nacht der Ingolstädter Schulen (15. März 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 3. Big Band Nacht der Ingolstädter Schulen (15. März 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber, Jackie Herr") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Grußworte (<?php echo ilink(IMG_FOLDER, 1, 6) ?>)<br />
      Apian-Gymnasium (<?php echo ilink(IMG_FOLDER, 7, 32) ?>)<br />
      Christoph-Scheiner-Gymnasium (<?php echo ilink(IMG_FOLDER, 33, 46) ?>)<br />
      Gnadenthal-Gymnasium (<?php echo ilink(IMG_FOLDER, 47, 74) ?>)<br />
      Katharinen-Gymnasium (<?php echo ilink(IMG_FOLDER, 75, 103) ?>)<br />
      Reuchlin-Gymnasium (<?php echo ilink(IMG_FOLDER, 104, 165) ?>)<br />
      Piu Piu Latin Orqesta (<?php echo ilink(IMG_FOLDER, 166, 268) ?>)<br />
      Finale „Oye como va“ (<?php echo ilink(IMG_FOLDER, 269, 284) ?>)
    </p>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "BBN2014_Workshops")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz-Workshops für Jedermann (15. März 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von den Jazz-Workshops für Jedermann (15. März 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140216")) || ($_GET[PAGE] == addpoint(PAGE, "50. Jam Session (16. Februar 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 50. Jam Session (16. Februar 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20140119")) || ($_GET[PAGE] == addpoint(PAGE, "49. Jam Session (19. Januar 2014)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 49. Jam Session (19. Januar 2014)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20131215")) || ($_GET[PAGE] == addpoint(PAGE, "48. Jam Session (15. Dezember 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 48. Jam Session (15. Dezember 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20131117")) || ($_GET[PAGE] == addpoint(PAGE, "47. Jam Session (17. November 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 47. Jam Session (17. November 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20131013")) || ($_GET[PAGE] == addpoint(PAGE, "46. Jam Session (13. Oktober 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 46. Jam Session (13. Oktober 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Fourofakind_20130921")) || ($_GET[PAGE] == addpoint(PAGE, "4 Of A Kind (21. September 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von 4 Of A Kind (21. September 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jes_20130907_2")) || ($_GET[PAGE] == addpoint(PAGE, "45. Jam Session (07. September 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 45. Jam Session (07. September 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jes_20130907_1")) || ($_GET[PAGE] == addpoint(PAGE, "Konzert der Schülerband jes! (07. September 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Konzert der Schülerband jes! (07. September 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130721")) || ($_GET[PAGE] == addpoint(PAGE, "44. Jam Session (21. Juli 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 44. Jam Session (21. Juli 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "ClaudiusKonradBand_20130714")) || ($_GET[PAGE] == addpoint(PAGE, "Claudius Konrad Band (14. Juli 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Claudius Konrad Band (14. Juli 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Tumult_20130713")) || ($_GET[PAGE] == addpoint(PAGE, "Tumult (13. Juli 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Tumult (13. Juli 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbrunch_20130623")) || ($_GET[PAGE] == addpoint(PAGE, "Farewell Party / Brunch der Wirtschaftsjunioren Bayern (13. Juni 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Farewell Party / Brunch der Wirtschaftsjunioren Bayern (13. Juni 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130616")) || ($_GET[PAGE] == addpoint(PAGE, "43. Jam Session (16. Juni 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 43. Jam Session (16. Juni 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130512")) || ($_GET[PAGE] == addpoint(PAGE, "42. Jam Session (12. Mai 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 42. Jam Session (12. Mai 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jamazzing_20130505")) || ($_GET[PAGE] == addpoint(PAGE, "JamaZZing (05. Mai 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von JamaZZing (05. Mai 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130421")) || ($_GET[PAGE] == addpoint(PAGE, "41. Jam Session (21. April 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 41. Jam Session (21. April 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130316")) || ($_GET[PAGE] == addpoint(PAGE, "40. Jam Session (16. März 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 40. Jam Session (16. März 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130217")) || ($_GET[PAGE] == addpoint(PAGE, "39. Jam Session (17. Februar 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 39. Jam Session (17. Februar 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20130120")) || ($_GET[PAGE] == addpoint(PAGE, "38. Jam Session (20. Januar 2013)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 38. Jam Session (20. Januar 2013)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20121216")) || ($_GET[PAGE] == addpoint(PAGE, "37. Jam Session (16. Dezember 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 37. Jam Session (16. Dezember 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20121118")) || ($_GET[PAGE] == addpoint(PAGE, "36. Jam Session (18. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 36. Jam Session (18. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage12/battermysoul")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzgottesdienst mit „Batter My Soul“ (11. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Jazzgottesdienst mit „Batter My Soul“ (11. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage12/jazzparty2")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party II (10. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Jazz Party II (10. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Marcus Miller (<?php echo ilink(IMG_FOLDER, 1, 11) ?>)<br />
      Maceo Parker (<?php echo ilink(IMG_FOLDER, 12, 22) ?>)<br />
      Äl Jawala (<?php echo ilink(IMG_FOLDER, 23, 31) ?>)<br />
    </p>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage12/jazzparty1")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party I (09. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Jazz Party I (09. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Anton Knoblach") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Hiromi (<?php echo ilink(IMG_FOLDER, 1, 29) ?>)<br />
      Tower of Power (<?php echo ilink(IMG_FOLDER, 30, 52) ?>)<br />
    </p>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage12/butterscotch")) || ($_GET[PAGE] == addpoint(PAGE, "Welcome Party: Butterscotch (08. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Welcome Party: Butterscotch (08. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage12/grandmothersfunck")) || ($_GET[PAGE] == addpoint(PAGE, "Grand Mother’s Funck (08. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Grand Mother’s Funck (08. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_051112")) || ($_GET[PAGE] == addpoint(PAGE, "16. Session der Young Jazz Players (05. November 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 16. Session der Young Jazz Players (05. November 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage12/garbarek")) || ($_GET[PAGE] == addpoint(PAGE, "Highlight: Jan Garbarek &amp; The Hilliard Ensemble (16. Oktober 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Highlight: Jan Garbarek &amp; The Hilliard Ensemble (16. Oktober 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20121014")) || ($_GET[PAGE] == addpoint(PAGE, "35. Jam Session (14. Oktober 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 35. Jam Session (14. Oktober 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "LatinProject_20120919")) || ($_GET[PAGE] == addpoint(PAGE, "Charly Böck: Latin Jazz Project (19. September 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Charly Böck: Latin Jazz Project (19. September 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20120916")) || ($_GET[PAGE] == addpoint(PAGE, "34. Jam Session (16. September 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 34. Jam Session (16. September 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2012/so_jazzart")) || ($_GET[PAGE] == addpoint(PAGE, "6. Summer Jazz Open Air: Jazzfrühschoppen mit JazzArt (29. Juli 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 6. Summer Jazz Open Air: Jazzfrühschoppen mit JazzArt (29. Juli 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2012/sa_wahlandt")) || ($_GET[PAGE] == addpoint(PAGE, "6. Summer Jazz Open Air: Lisa Wahlandt Quintett (28. Juli 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 6. Summer Jazz Open Air: Lisa Wahlandt Quintett (28. Juli 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2012/sa_yjp")) || ($_GET[PAGE] == addpoint(PAGE, "6. Summer Jazz Open Air: Young Players in Concert (28. Juli 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 6. Summer Jazz Open Air: Young Players in Concert (28. Juli 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20120715")) || ($_GET[PAGE] == addpoint(PAGE, "33. Jam Session (15. Juli 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 33. Jam Session (15. Juli 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20120520")) || ($_GET[PAGE] == addpoint(PAGE, "32. Jam Session (20. Mai 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 32. Jam Session (20. Mai 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20120226")) || ($_GET[PAGE] == addpoint(PAGE, "29. Jam Session (26. Februar 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 29. Jam Session (26. Februar 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazzgmbh10jahre")) || ($_GET[PAGE] == addpoint(PAGE, "Jubiläumskonzert 10 Jahre Jazz GmbH (21. Januar 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Jubiläumskonzert 10 Jahre Jazz GmbH (21. Januar 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20120115")) || ($_GET[PAGE] == addpoint(PAGE, "28. Jam Session (15. Januar 2012)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 28. Jam Session (15. Januar 2012)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20111218")) || ($_GET[PAGE] == addpoint(PAGE, "27. Jam Session (18. Dezember 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 27. Jam Session (18. Dezember 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20111120")) || ($_GET[PAGE] == addpoint(PAGE, "26. Jam Session (20. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 26. Jam Session (20. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/ewf_experience")) || ($_GET[PAGE] == addpoint(PAGE, "Earth, Wind &amp; Fire Experience (06. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Earth, Wind &amp; Fire Experience (06. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/party2")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party II (05. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazz Party II (05. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/party1")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party I (04. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazz Party I (04. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/pat_metheny")) || ($_GET[PAGE] == addpoint(PAGE, "Pat Metheny Trio (04. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Pat Metheny Trio (04. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/welcome_party")) || ($_GET[PAGE] == addpoint(PAGE, "Welcome Party: Hypnotic Brass Ensemble (03. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Welcome Party: Hypnotic Brass Ensemble (03. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/kneipen/theaterbar")) || ($_GET[PAGE] == addpoint(PAGE, "Susan Weinert Global Players Trio (03. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Susan Weinert Global Players Trio (03. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/kneipen/sweptaway")) || ($_GET[PAGE] == addpoint(PAGE, "Boomtownraps &amp; Joey Finger Group feat. Nico Suave (03. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von den Boomtownraps &amp; Joey Finger Group feat. Nico Suave (03. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/kneipen/diagonal")) || ($_GET[PAGE] == addpoint(PAGE, "Johnny A. &amp; Jeff Aug (03. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Johnny A. &amp; Jeff Aug (03. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/kneipen/neuewelt")) || ($_GET[PAGE] == addpoint(PAGE, "Jon Regen &amp; Band (03. November 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jon Regen &amp; Band (03. November 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/yjp")) || ($_GET[PAGE] == addpoint(PAGE, "14. Session der Young Jazz Players (31. Oktober 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 14. Session der Young Jazz Players (31. Oktober 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/gospel_power_soul")) || ($_GET[PAGE] == addpoint(PAGE, "Gospel Power Soul (30. Oktober 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Gospel Power Soul (30. Oktober 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage11/joey_finger")) || ($_GET[PAGE] == addpoint(PAGE, "Josef Finger: Eröffnung der 28. Ingolstädter Jazztage (16. Oktober 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Josef Finger: Eröffnung der 28. Ingolstädter Jazztage (16. Oktober 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20110918")) || ($_GET[PAGE] == addpoint(PAGE, "24. Jam Session (18. September 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 24. Jam Session (18. September 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>
    <p style="text-align:center;"><b>Videos:</b><br />
      <a href="http://www.youtube.com/watch?v=KvU7symtikk" target="_blank">In &quot;F&quot; Active bei der 24. Jam Session</a><br />
    </p>
    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20110717")) || ($_GET[PAGE] == addpoint(PAGE, "23. Jam Session (17. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 23. Jam Session (17. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbuehne2011/3_So/31_Kraiberg")) || ($_GET[PAGE] == addpoint(PAGE, "Kraiberg Jazz Band auf der Jazzbühne des Bürgerfests (10. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Kraiberg Jazz Band auf der Jazzbühne des Bürgerfests (10. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Karl Wewer") ?>
    <p style="text-align:center;"><b>Videos:</b><br />
      <a href="http://www.youtube.com/watch?v=xWREt-N7QgM" target="_blank">Auftritt der Kraiberg Jazz Band</a> (von Karl Wewer)<br />
      <a href="http://www.youtube.com/watch?v=zv_QzosuiZ8" target="_blank">Impressionen vom Bürgerfest-Sonntag</a> (von Karl Wewer)<br />
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbuehne2011/3_So/32_PitMueller")) || ($_GET[PAGE] == addpoint(PAGE, "Pit Müllers Hot Stuff auf der Jazzbühne des Bürgerfests (10. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Pit Müllers Hot Stuff auf der Jazzbühne des Bürgerfests (10. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Karl Wewer") ?>
    <p style="text-align:center;"><b>Video:</b><br />
      <a href="http://www.youtube.com/watch?v=zv_QzosuiZ8" target="_blank">Impressionen vom Bürgerfest-Sonntag</a> (von Karl Wewer)<br />
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbuehne2011/2_Sa/25_Swingbreak")) || ($_GET[PAGE] == addpoint(PAGE, "Swingbreak auf der Jazzbühne des Bürgerfests (09. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Swingbreak auf der Jazzbühne des Bürgerfests (09. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbuehne2011/2_Sa/24_Close2Jazz")) || ($_GET[PAGE] == addpoint(PAGE, "Close2Jazz auf der Jazzbühne des Bürgerfests (09. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Close2Jazz auf der Jazzbühne des Bürgerfests (09. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>
    <p style="text-align:center;"><b>Videos:</b><br />
      <a href="http://www.youtube.com/watch?v=unyEUK7eotM" target="_blank">Auftritt von Close2Jazz</a> (von Manfred See)<br />
      <a href="http://www.youtube.com/watch?v=948QsbPbChQ" target="_blank">Close2Jazz, Teil 2</a> (von Manfred See)<br />
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbuehne2011/2_Sa/2x_YJP")) || ($_GET[PAGE] == addpoint(PAGE, "Young Jazz Players auf der Jazzbühne des Bürgerfests (09. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von den Young Jazz Players auf der Jazzbühne des Bürgerfests (09. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Jazz GmbH (Reuchlin-Gymnasium) (<?php echo ilink(IMG_FOLDER, 1, 37) ?>)<br />
      Fünfklang (Reuchlin-Gymnasium) (<?php echo ilink(IMG_FOLDER, 38, 43) ?>)<br />
      Jazz Club (Gnadenthal-Gymnasium) (<?php echo ilink(IMG_FOLDER, 44, 73) ?>)<br />
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazzbuehne2011/1_Fr/12_CaptainsBog")) || ($_GET[PAGE] == addpoint(PAGE, "Captain’s Bog auf der Jazzbühne des Bürgerfests (08. Juli 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Captain’s Bog auf der Jazzbühne des Bürgerfests (08. Juli 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20110626")) || ($_GET[PAGE] == addpoint(PAGE, "22. Jam Session (26. Juni 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 22. Jam Session (26. Juni 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20110522")) || ($_GET[PAGE] == addpoint(PAGE, "21. Jam Session (22. Mai 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 21. Jam Session (22. Mai 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20110417")) || ($_GET[PAGE] == addpoint(PAGE, "20. Jam Session (17. April 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 20. Jam Session (17. April 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Horst Weber") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20110116")) || ($_GET[PAGE] == addpoint(PAGE, "17. Jam Session (16. Januar 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 17. Jam Session (16. Januar 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Horst Weber") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "BBN2011")) || ($_GET[PAGE] == addpoint(PAGE, "2. Big Band Nacht der Ingolstädter Schulen (12. Februar 2011)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 2. Big Band Nacht der Ingolstädter Schulen (12. Februar 2011)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher, Anton Knoblach, Max Grell") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Workshop: Jazz meets HipHop (<?php echo ilink(IMG_FOLDER, 1, 57) ?>)<br />
      Hinter den Kulissen und Moderation (<?php echo ilink(IMG_FOLDER, 58, 70) ?>)<br />
      Bigband des Gnadenthal-Gymnasiums (<?php echo ilink(IMG_FOLDER, 71, 110) ?>)<br />
      Auftritt der Workshop-Teilnehmer (<?php echo ilink(IMG_FOLDER, 111, 140) ?>)<br />
      Bigband des Reuchlin-Gymnasiums (<?php echo ilink(IMG_FOLDER, 141, 182) ?>)<br />
      Bigband des Christoph-Scheiner-Gymnasiums (<?php echo ilink(IMG_FOLDER, 183, 206) ?>)<br />
      Landesjugendjazzorchester Bayern (<?php echo ilink(IMG_FOLDER, 207, 297) ?>)
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/paco_de_lucia")) || ($_GET[PAGE] == addpoint(PAGE, "3. Highlight-Konzert: Paco de Lucia &amp; Band (07. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 3. Highlight-Konzert: Paco de Lucia &amp; Band (07. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 10), Anton Knoblach (11 – 30)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/jazzparty2")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party II (06. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazz Party II (06. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/jazzgottesdienst")) || ($_GET[PAGE] == addpoint(PAGE, "Jazzgottesdienst mit Tom Diewock und Gerhard Schmidt (07. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Jazzgottesdienst mit Tom Diewock und Gerhard Schmidt (07. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/jazzparty1")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party I (05. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazz Party I (05. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 50), Anton Knoblach (51 – 94)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/jamie_cullum")) || ($_GET[PAGE] == addpoint(PAGE, "2. Highlight-Konzert: Jamie Cullum (05. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 2. Highlight-Konzert: Jamie Cullum (05. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 17), Anton Knoblach (18 – 46)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/kneipen")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz in den Kneipen (04. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jazz in den Kneipen (04. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 37), Anton Knoblach (38 – 83)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/hollinger")) || ($_GET[PAGE] == addpoint(PAGE, "Bernhard Hollinger Group (03. November 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Bernhard Hollinger Group (03. November 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/new_york_voices")) || ($_GET[PAGE] == addpoint(PAGE, "Highlight in der Kirche: New York Voices (31. Oktober 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Highlight in der Kirche: New York Voices (31. Oktober 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 13), Anton Knoblach (14 – 35)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/paolo_conte")) || ($_GET[PAGE] == addpoint(PAGE, "1. Highlight-Konzert: Paolo Conte (30. Oktober 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 1. Highlight-Konzert: Paolo Conte (30. Oktober 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 8), Anton Knoblach (9 – 27)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/tim_allhoff")) || ($_GET[PAGE] == addpoint(PAGE, "Tim Allhoff: Eröffnung der 27. Ingolstädter Jazztage (17. Oktober 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Tim Allhoff: Eröffnung der 27. Ingolstädter Jazztage (17. Oktober 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 29), Anton Knoblach (30 – 58)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage10/YJP")) || ($_GET[PAGE] == addpoint(PAGE, "13. Session der Young Jazz Players (25. Oktober 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 13. Session der Young Jazz Players (25. Oktober 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2010/bigbands")) || ($_GET[PAGE] == addpoint(PAGE, "5. Summer Jazz Open Air mit Big Band Matinee (04. Juli 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 5. Summer Jazz Open Air mit Big Band Matinee (04. Juli 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach (1 – 27), Christian Pacher (28 – 88)") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Workshop Bigband (<?php echo ilink(IMG_FOLDER, 1, 27) ?>)<br />
      Hinter den Kulissen (<?php echo ilink(IMG_FOLDER, 28, 31) ?>)<br />
      Bigband des Gnadenthal Gymnasium (<?php echo ilink(IMG_FOLDER, 32, 36) ?>)<br />
      Bigband des Christoph Scheiner Gymnasium (<?php echo ilink(IMG_FOLDER, 37, 58) ?>)<br />
      Bigband der städt. Simon Mayr Musikschule (<?php echo ilink(IMG_FOLDER, 59, 88) ?>)
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2010/abbamobil")) || ($_GET[PAGE] == addpoint(PAGE, "Abba Mobil beim 5. Summer Jazz Open Air (03. Juli 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Abba Mobil beim 5. Summer Jazz Open Air (03. Juli 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2010/hollinger")) || ($_GET[PAGE] == addpoint(PAGE, "Bernhard Hollinger Group beim 5. Summer Jazz Open Air (03. Juli 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Bernhard Hollinger Group beim 5. Summer Jazz Open Air (03. Juli 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "summerjazz2010/workshop")) || ($_GET[PAGE] == addpoint(PAGE, "Big Band Workshop mit Harald Rüschenbaum (03. Juli 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Big Band Workshop mit Harald Rüschenbaum (03. Juli 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_250410")) || ($_GET[PAGE] == addpoint(PAGE, "12. Young Jazz Players Session (25. April 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 12. Young Jazz Players Session (25. April 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Robert Aichner") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20100228")) || ($_GET[PAGE] == addpoint(PAGE, "11. Jam Session (28. Februar 2010)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 11. Jam Session (28. Februar 2010)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 28), Anton Knoblach (29 – 44)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Xmas09")) || ($_GET[PAGE] == addpoint(PAGE, "9. Jam Christmas-Session (20. Dezember 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 9. Jam Christmas-Session (20. Dezember 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/zap_mama")) || ($_GET[PAGE] == addpoint(PAGE, "Zap Mama (08. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Zap Mama (08. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/jazzparty2")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party II u.&nbsp;a. mit Tower of Power, Curtis Stigers (07. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazz Party II u.&nbsp;a. mit Tower of Power, Curtis Stigers (07. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher (1 – 40), Anton Knoblach (41 – 55)") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      The Hang All Stars (<?php echo ilink(IMG_FOLDER, 1, 16) ?>)<br />
      The Larry Carlton Trio (<?php echo ilink(IMG_FOLDER, 17, 26) ?>)<br />
      Tower of Power (<?php echo ilink(IMG_FOLDER, 27, 46) ?>)<br />
      Late Night Band (<?php echo ilink(IMG_FOLDER, 47, 55) ?>)
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/jazzparty1")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz Party I u.&nbsp;a. mit Nils Petter Molvaer, P-S-P (06. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jazz Party I u.&nbsp;a. mit Nils Petter Molvaer, P-S-P (06. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      Nils Petter Molvaer (<?php echo ilink(IMG_FOLDER, 1, 15) ?>)<br />
      P-S-P (<?php echo ilink(IMG_FOLDER, 16, 30) ?>)
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/corea_clarke_white")) || ($_GET[PAGE] == addpoint(PAGE, "Chick Corea &amp; Stanley Clarke &amp; Lenny White (06. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Chick Corea &amp; Stanley Clarke &amp; Lenny White (06. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher (1 – 18), Anton Knoblach (19 – 25)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/kneipen")) || ($_GET[PAGE] == addpoint(PAGE, "Jazz in den Kneipen (05. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Jazz in den Kneipen (05. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher (1 – 10, 19 – 41), Anton Knoblach (11 – 18)") ?>
    <p style="text-align:center; font-size:90%; color:#606060;">
      The Bahama Soul Club, Diagonal (<?php echo ilink(IMG_FOLDER, 1, 18) ?>)<br />
      Steve Gibbons Band, Neue Welt (<?php echo ilink(IMG_FOLDER, 19, 29) ?>)<br />
      Karolina Glazer, Kult-Hotel (<?php echo ilink(IMG_FOLDER, 30, 41) ?>)
    </p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/jungblut")) || ($_GET[PAGE] == addpoint(PAGE, "Jungblut  feat. Christina Jung (04. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von Jungblut feat. Christina Jung (04. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/yjp")) || ($_GET[PAGE] == addpoint(PAGE, "11. Young Jazz Players Session (02. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 11. Young Jazz Players Session (02. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher (1 – 38), Anton Knoblach (39 – 46)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "jazztage09/wallumrod")) || ($_GET[PAGE] == addpoint(PAGE, "Christian Wallumrød Ensemble (01. November 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Christian Wallumrød Ensemble (01. November 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Anton Knoblach") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jazz4Kids09")) || ($_GET[PAGE] == addpoint(PAGE, "“Jazz for Kids” mit “Hoppel Hoppel Rhythm Club” (25. Oktober 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von “Jazz for Kids” mit “Hoppel Hoppel Rhythm Club” (25. Oktober 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher (1 – 48), Anton Knoblach (49 – 103)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Hollinger_20091018")) || ($_GET[PAGE] == addpoint(PAGE, "Auftakt der 26. Ingolstädter Jazztage: Jazzförderpreisträger Bernhard Hollinger &amp; Band (18. Oktober 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Auftaktkonzert mit Jazzförderpreisträger Bernhard Hollinger &amp; Band (18. Oktober 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Christian Pacher") ?>

    <p class="small">Bild 1 + 2: Preisverleihung für die 150. Vereinsmitgliedschaft<br />
      Bild 3 – 12: Verleihung des Jazzförderpreises an Bernhard Hollinger und Laudation<br />
      Bild 13 – 44: Preisträgerkonzert</p>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20090927")) || ($_GET[PAGE] == addpoint(PAGE, "8. Jam Session (27. September 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 8. Jam Session (27. September 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 33), Anton Knoblach (34 – 57)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Sommerjazz2009")) || ($_GET[PAGE] == addpoint(PAGE, "4. Summer Jazz Open Air (10. / 11. Juli 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 4. Summer Jazz Open Air (10. / 11. Juli 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <p style="text-align:center; font-size:90%; color:#606060;">Fotos:<br />
      Passa Tempo (<?php echo ilink(IMG_FOLDER, 1, 28) ?>): Anton Knoblach<br />
      Birdland Jazz Band (<?php echo ilink(IMG_FOLDER, 29, 62) ?>): Christian Pacher<br />
      Jazz GmbH (RG) (<?php echo ilink(IMG_FOLDER, 63, 106) ?>): Anton Knoblach<br />
      Jazz Club (GG) (<?php echo ilink(IMG_FOLDER, 107, 129) ?>): Anton Knoblach<br />
      Jazz Players (KG) (<?php echo ilink(IMG_FOLDER, 130, 147) ?>): Anton Knoblach<br />
      Scheiner Jazzband (CSG) (<?php echo ilink(IMG_FOLDER, 148, 161) ?>): Christian Pacher<br />
      Club Légère (<?php echo ilink(IMG_FOLDER, 162, 221) ?>): Christian Pacher<br />
      Pit Müller’s Hot Stuff (<?php echo ilink(IMG_FOLDER, 222, 262) ?>): Christian Pacher
    </p>
    <?php #fotograf("") 
    ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20090524")) || ($_GET[PAGE] == addpoint(PAGE, "7. Jam Session (24. Mai 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 7. Jam Session (24. Mai 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Anton Knoblach (1 – 17), Christian Pacher (18 – 42)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Birdland_20090426")) || ($_GET[PAGE] == addpoint(PAGE, "10. Young Jazz Players Session (26. April 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 10. Young Jazz Players Session (26. April 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 80), Anton Knoblach (81 – 116)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "BBN1_Auftritte")) || ($_GET[PAGE] == addpoint(PAGE, "1. Bigband Nacht der Ingolstädter Schulen (21. März 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 1. Bigband Nacht der Ingolstädter Schulen (21. März 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "BBN1_Workshop")) || ($_GET[PAGE] == addpoint(PAGE, "Workshop Soloimprovisation mit Prof. Zoller (21. März 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Workshop Soloimprovisation mit Prof. Zoller (21. März 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>

    <?php fotograf("Anton Knoblach (1 – 35), Beate Diao (36 – 40)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_20090208")) || ($_GET[PAGE] == addpoint(PAGE, "6. Jam-Session (08. Februar 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 6. Jam-Session (08. Februar 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JooKrausProject")) || ($_GET[PAGE] == addpoint(PAGE, "Bonuskonzert (14. Januar 2009)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Bonuskonzert (14. Januar 2009)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 20), Anton Knoblach (21 – 42)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Xmas08")) || ($_GET[PAGE] == addpoint(PAGE, "5. Jam Christmas-Session (14. Dezember 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 5. Jam Christmas-Session (14. Dezember 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher (1 – 46), Anton Knoblach (47 – 96)") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_031108")) || ($_GET[PAGE] == addpoint(PAGE, "9. Session der Young Jazz Players (03. November 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 9. Session der Young Jazz Players (03. November 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Jamsession4_2008")) || ($_GET[PAGE] == addpoint(PAGE, "4. Jam Session (28. September 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der 4. Jam Session (28. September 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "DixieSwing2008")) || ($_GET[PAGE] == addpoint(PAGE, "Dixie- und Swing-Festival (28. Juni 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Dixie- und Swing-Festival (28. Juni 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Summerjazz08Sa")) || ($_GET[PAGE] == addpoint(PAGE, "3. Summer Jazz Open Air im Hotel Rappensberger (26. Juli 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 3. Summer Jazz Open Air im Hotel Rappensberger (26. Juli 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Robert Aichner") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Summerjazz08Fr")) || ($_GET[PAGE] == addpoint(PAGE, "3. Summer Jazz Open Air im Hotel Rappensberger (25. Juli 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom 3. Summer Jazz Open Air im Hotel Rappensberger (25. Juli 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "Workshop08")) || ($_GET[PAGE] == addpoint(PAGE, "Workshops im Bürgerhaus Diagonal (25. Mai 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von den Workshops im Bürgerhaus Diagonal (25. Mai 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Robert Aichner") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "JS_300308")) || ($_GET[PAGE] == addpoint(PAGE, "Jam Session im Bürgerhaus Diagonal (30. März 2008)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jam Session im Bürgerhaus Diagonal (30. März 2008)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Robert Aichner") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_051107")) || ($_GET[PAGE] == addpoint(PAGE, "Jam Session der Young Jazz Players im Diagonal (5. November 2007)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jam Session der Young Jazz Players im Diagonal (5. November 2007)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_160607")) || ($_GET[PAGE] == addpoint(PAGE, "Dixie &amp; Swing-Festival (16. Juni 2007)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Dixie &amp; Swing-Festival (16. Juni 2007)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_150407")) || ($_GET[PAGE] == addpoint(PAGE, "Young Jazz Players im Café an der Hohen Schule (15. April 2007)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von den Young Jazz Players im Café an der Hohen Schule (15. April 2007)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_110207")) || ($_GET[PAGE] == addpoint(PAGE, "Jam Session der Young Jazz Players im Diagonal (11. Februar 2007)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jam Session der Young Jazz Players im Diagonal (11. Februar 2007)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_121106")) || ($_GET[PAGE] == addpoint(PAGE, "Jam Session der Young Jazz Players im Diagonal (12. November 2006)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder von der Jam Session der Young Jazz Players im Diagonal (12. November 2006)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else if (($_GET[PAGE] == ($folder = "YJP_240606")) || ($_GET[PAGE] == addpoint(PAGE, "Summer Jazz Open Air – Young Jazz Players (24. Juni 2006)"))) {
  define("IMG_FOLDER", $folder);
  function content()
  {
  ?>
    <h1>Bilder vom Summer Jazz Open Air – Young Jazz Players (24. Juni 2006)</h1>

    <div class="piccontainer">
      <?php picview(IMG_FOLDER) ?>
    </div>
    <?php fotograf("Christian Pacher") ?>

    <div class="backlink"><a href="<?php echo (BACKLINK) ?>">Zurück</a></div>

  <?php
  }
} else //if (!$_GET[PAGE])
{
  function content()
  {
  ?>
    <h1>Fotos der Jazzfreunde Ingolstadt</h1>

<?php
    toc();
  }
}

?>