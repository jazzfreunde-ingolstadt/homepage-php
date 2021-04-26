<?
if (!defined("PAGE"))
{
  header("location:../presse.php");
  die();
}

function more($text, $link)
{
?>
<div>(...)</div>
<?
  if ($link == "")
  {
?>
<div class="newsmore"><?=$text ?></div>
<?
  }
  else
  {
?>
<div class="newsmore"><a href="<?=$link ?>" target="_blank" title="Kompletter Artikel beim Herausgeber"><?=$text ?></a></div>
<?
  }
}


if (false)
{
  // lalala ^^
}

/**

 Die HTML-Daten werden in einzelnen Blöcken abgelegt und jeweils gesondert addressiert. Aus der Reihenfolge der Daten ergibt sich zudem das Inhaltsverzeichnis.

**/

elseif ($_GET[PAGE] == addpoint(PAGE, "Nachwuchsförderung hoch zehn (13.02.2011)"))
{
  function content()
  {
?>
<h1>Nachwuchsförderung hoch zehn</h1>

<div class="newssource">Donaukurier Online vom 13. Februar 2011 </div>

<p class="newsauthor">Von Katrin Poese</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Man kann es als durchweg gelungenes Experiment bezeichnen, was sich am Freitag und Samstag in der Fronte 79 abspielte. Die 2. Big-Band-Nacht der Ingolstädter Schulen bot neben hervorragender Musik Raum für Begegnungen: zwischen Profi und Anfänger, zwischen Jazz und Hip-Hop.</p>

<? more("Mehr lesen mit Video auf donaukurier.de", "http://www.donaukurier.de/lokales/kurzmeldungen/ingolstadt/Nachwuchsfoerderung-hoch-zehn;art74355,2381047") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Erfolgreich wie nie (09.11.2010)"))
{
  function content()
  {
?>
<h1>Erfolgreich wie nie</h1>

<div class="newssource">Donaukurier Online vom 9. November 2010</div>

<p class="newsauthor">Von Barbara Fröhlich</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Mit rund 6400 Besuchern, den beiden ausverkauften Highlights Jamie Cullum und Paco de Lucia im Festsaal und zwei gleich gut besuchten Jazzpartys sind die 27. Ingolstädter Jazztage die bislang erfolgreichsten. "Wir hatten fast doppelt so viele Besucher wie im vergangenen Jahr", zog gestern Kulturreferent Gabriel Engert eine erste Bilanz. Das Konzept der Ingolstädter Jazztage, bedeutende Musiker in einem fast schon familiär zu nennenden Rahmen zu präsentieren, sei in hohem Maße aufgegangen.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/nachrichten/kultur/Erfolgreich-wie-nie;art598,2344966") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Nachwuchskünstler im Rampenlicht (26.10.2010)"))
{
  function content()
  {
?>
<h1>Nachwuchskünstler im Rampenlicht</h1>

<div class="newssource">Donaukurier Online vom 26. Oktober 2010</div>

<p class="newsauthor">Von Bernhard Pehl</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Die Vorfreude ist groß, die Erwartungen hoch und das Diagonal in Ingolstadt brechend voll: Dutzende von Jugendlichen suchen am frühen Montagabend vor Konzertbeginn die besten Plätze vor der Bühne, um ihre Stars live zu erleben. Doch die Jugendlichen warten nicht auf Justin Bieber oder Lady Gaga, sondern auf die Young Jazz Players. Das sind mittlerweile fast 60 Schülerinnen und Schüler aus Ingolstadt und der Region, die den Jazz in all seinen Varianten mehrmals im Jahr auf verschiedenen Bühnen zu Gehör bringen.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/nachrichten/kultur/Nachwuchskuenstler-im-Rampenlicht;art598,2339625") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Reife Leistung (08.09.2009)"))
{
  function content()
  {
?>
<h1>Reife Leistung</h1>

<div class="newssource">Donaukurier Online vom 8. September 2009</div>

<p class="newsauthor">Von Karl Leitner</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Zuerst ist man als Zuhörer ziemlich überrascht. Zwei Herren spielen auf der Bühne der Neuen Welt ganz für sich einen Akkordeon-Tango mit Saxofonlinien und einen Musette-Walzer. Das soll Die Klangpatrouille sein, die Band, die sich seit einigen Jahren in der "Ingolstädter Musikszene" wegen ihres Bläsersatzes und ihrer Funk-Ausrichtung einen nicht geringen Bekanntheitsgrad erspielt hat? Nun, der weitere Verlauf des Abends wird es zeigen: genau, das ist die Band, und zwar in ihrer ganzen Vielfalt, bei der so ziemlich alles möglich ist zwischen nahezu schon kammermusikalischem ECM-Sound und Vollrohr-Gebläse.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/lokales/ingolstadt/Reife-Leistung;art599,2168136") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Es dudelt und rockt und zirpt und swingt (13.07.2009)"))
{
  function content()
  {
?>
<h1>Es dudelt und rockt und zirpt und swingt</h1>
<h2>Nachgespielte Hits dominieren Musikangebot / Junge Jazzer heben sich wohlklingend ab</h2>

<div class="newssource">Donaukurier vom 13. Juli 2009, Seite 18</div>

<p class="newsauthor">Von Christian Silvester</p>

<p><b>Ingolstadt</b> <i>(sic)</i> Am frühen Nachmittag, während das Bürgerfest langsam zu Leben erwacht und aus den Boxen meist noch trist die Konservenmusik dringt, hebt sich ein Nischenprogramm wohlklingend ab: Die Auftritte der Jazz-Combos von vier Ingolstädter Gymnasien im Hof des Hotels Rappensberger. Da zeigen erstaunlich viele junge Musiker ein nicht minder erstaunliches Können in dem bedingt mehrheitsfähigen Genre. Den Auftakt bestreitet die Jazz GmbH des Reuchlin-Gymnasiums samt Sechstklässlern, die erst seit einem Monat mitspielen, aber hohe Taktsicherheit zeigen, auch wenn ein Arrangement mal fünf Minuten länger dauert. Da klatschen nicht nur stolze Eltern und Lehrer, sondern alle Jazzfreunde.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/lokales/ingolstadt/mobilartikel-Es-dudelt-und-rockt-und-zirpt-und-swingt;art599,2132325") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Summerjazz Ingolstädter Schüler (13.07.2009)"))
{
  function content()
  {
?>
<h1>Summerjazz Ingolstädter Schüler</h1>

<div class="newssource">Donaukurier vom 13. Juli 2009, Seite 13</div>

<p class="newsauthor">Von Lorenz Erl</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Draußen spielt die Blaskapelle und der Ochs am Spieß dreht seine Runden. Scheinbar eine starke Konkurrenz für die Jazz-Bands aus vier Ingolstädter Gymnasien, die an Bürgerfest-Nachmittag den Innenhof des Hotel Rappensberger ganz für sich haben. Noch kurz bevor die Jazz GmbH vom Reuchlin-Gymnasium um 14 Uhr den nunmehr vierten Summerjazz im Rappensberger Sommergarten eröffnen soll, schleppen Schüler ihre Instrumente an und basteln beim Soundcheck an den letzten Feinheiten. Nur langsam füllen sich die Bänke. Doch bei aller zur Schau gestellten Lässigkeit – das Timing klappt.</p>

<? more("(Artikel beim Herausgeber nicht online vorhanden!)", "") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Big Band-Nacht der Ingolstädter Schulen begeistert Publikum (24.03.2009)"))
{
  function content()
  {
?>
<h1>Big Band-Nacht der Ingolstädter Schulen begeistert Publikum</h1>

<div class="newssource">Neuburger Rundschau vom 24. März 2009, Seite 33</div>

<p>Auf große Resonanz stieß die erste Big Band-Nacht der Ingolstädter Schulen. Im voll besetzten Haus der Jugend Fronte ’79 bewiesen die Schülerbands mit viel Enthusiasmus ihr musikalisches Können. Von Klassikern des Jazz bis zu modernen Rockstücken boten sie dem Publikum ein breites musikalisches Spektrum. Der große Zuspruch lässt Musikfreunde auf eine Wiederholung des von den Jazzfreunden Ingolstadt veranstalteten Konzertes der Jugendförderung hoffen.</p>

<p class="newsauthor">Christian Pacher</p>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Hörbare Freude am Sound (23.03.2009)"))
{
  function content()
  {
?>
<h1>Hörbare Freude am Sound</h1>
<h2>Big Bands der Ingolstädter Schulen liefen am Samstag im Jugendzentrum Fronte 79 zu großer Form auf</h2>
<div class="newssource">Donaukurier vom 23. März 2009, Seite 23</div>

<p><b>Ingolstadt</b> <i>(er)</i> Der musikalische Nachwuchs aus den Ingolstädter Schulen kann sich hören lassen – und das nicht nur bei Schulfesten vor den Klassenkameraden und wohl meinenden Eltern. Die jungen Damen und Herren haben bei der ersten Big-Band-Nacht der Ingolstädter Schulen am Samstag in der Fronte gezeigt, in welcher hohen musikalischen Güteklasse sie anzusiedeln sind.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/lokales/ingolstadt/Hoerbare-Freude-am-Sound;art599,2068375") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "1. Big Band Nacht der Ingolstädter Schulen (19.03.2009)"))
{
  function content()
  {
?>
<h1>1. Big Band Nacht der Ingolstädter Schulen</h1>
<h2>Freier Eintritt in dreistündiges Konzert</h2>
<div class="newssource">ingolstadt.de Newsletter vom 19. März 2009</div>

<p>Ein Großereignis für den Jazznachwuchs an Ingolstädter Schulen steht vor der Tür: Die 1. Big Band Nacht der Ingolstädter Schulen veranstaltet vom Verein der Jazzfreunde Ingolstadts e.V. mit Unterstützung des Kultur- und Schulreferats Ingolstadt. Schirmherr der Veranstaltung ist Kulturreferent Gabriel Engert. Am Samstag, 21. März, treten ab 19 Uhr in der Fronte ’79 beinahe alle Big-Bands der Ingolstädter Gymnasien auf.</p>
<p>Für das Ende des Big-Band-Festes konnte als Top-Act die Lehrer Big Band Bayern (LBBB) unter der Leitung von Prof. Thomas Zoller (Professor für Jazz-Arrangement und Komposition in Dresden) gewonnen werden, die Ausschnitte aus ihrer neuen CD präsentieren wird. Diese semiprofessionelle Big Band setzt sich aus Lehrerinnen und Lehrer allgemeinbildender Schulen aus allen Regierungsbezirken und Schularten Bayerns zusammen. Im Oktober 1993 traf sie sich unter der Leitung des international bekannten Saxofonisten und Komponisten Professor Joe Viera aus München zum ersten Mal zur Probenarbeit. Mittlerweile, im 15. Jahr ihres Bestehens, kann die LBBB auf ca. 150 Konzerte zurückblicken. Mit diesen Konzerten, den 1997 und 2000 aufgenommenen CDs „Night Journey“ und „Shanghai Blues“, gefolgt von der 2005 veröffentlichten vielbeachteten CD „Better than TV“, sowie einer Italien- ,einer China- und einer Baltikum-Tournee zeigen engagierte Pädagogen, das sie das aktive Musizieren nicht nur zu ihrem Unterrichtsprinzip erhoben haben, sondern das sie sich selbst auch gerne in ihrer Freizeit musikalisch betätigen. Vor allem wollen sie auf diese Weise die Freude am Big-Band-Jazz einem interessierten Publikum mitteilen.</p>

<p>Der Eintritt für das dreistündige Konzert ist frei; die Kosten werden durch Sponsoren, das finanzielle Engagement der Veranstalter und durch Spenden der Zuhörer getragen.</p>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Bühne frei für den Jazz-Nachwuchs (05.11.2008)"))
{
  function content()
  {
?>
<h1>Bühne frei für den Jazz-Nachwuchs</h1>
<h2>Funk, Jazzrock oder Swing: Die Young Jazz Players stellten im Diagonal ihr Können unter Beweis</h2>
<div class="newssource">Donaukurier vom 5. November 2008, Seite 15</div>

<p class="newsauthor">Von Michael Kleinherne</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Ein gutes Forum für junge Musiker boten die Jazzfreunde Ingolstadt auch heuer wieder im Rahmen der 25. Jazztage mit der Nachwuchssession im völlig überfüllten Diagonal. Der Begriff Jazz muss dabei manchmal etwas weiter gefasst werden, aber wann haben etwa Achtklässler sonst schon die Möglichkeit, mit einem weltbekannten Rockmusiker auf der Bühne zu stehen? So geschehen, als inmitten der über dreistündigen Session plötzlich Hans Ziller von Bonfire die Bühne entert. Auf der E-Gitarre begleitet er seine Tochter Chiara, die ein Stück von Norah Jones sowie eine Ballade aus „The Räuber“ singt, welche Bonfire ja für das Theater vertont haben. Dazu spielen die Schüler Jonas Sebald und Ingrid Landes Schlagzeug und Bass, Walter Schuller Trompete und Mitorganisator Robert Aichner E-Piano. Beim nächsten Song stehen dann wieder ganz andere Leute auf der Bühne.</p>

<? more("(Artikel beim Herausgeber nicht online vorhanden!)", "") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Das Who’s who des Jazz (17.10.2008)"))
{
  function content()
  {
?>
<h1>Das Who’s who des Jazz</h1>

<div class="newssource">Donaukurier vom 17. Oktober 2008, Seite 17</div>

<p><b>Ingolstadt</b> <i>(aw)</i> Die Ingolstädter Jazzszene boomt. 2005 gründete sich der Verein der „Jazzfreunde“, der neue Plattformen für den Nachwuchs schuf. Bei den diesjährigen 25. Jazztagen ist die regionale Szene mit drei Programmpunkten – von den Young Jazz Players bis zum Jazz Award Project – vertreten, und die Nachfrage nach Teilnahme an den Workshops „Jazz in den Schulen“ ist nach wie vor ungebrochen. Doch eigentlich fehlt bislang ein Überblick über die Gesamtheit der Bands, ihr CD-Schaffen, ein Konzertkalender. Der wäre schließlich nicht nur für das Publikum interessant, sondern auch für die Musiker selbst, die neue Beziehungen knüpfen wollen oder Veranstalter, die spezielle Acts planen. Wie etwa Andreas Dziuk, der musikalische Leiter des Theaters Ingolstadt, der im Sommer Bands für das Theaterfloß suchte – und Tipps von Robert Aichner bekam.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/nachrichten/kultur/art598,1956038") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Bläser, Bluenotes und satte Beats (30.06.2008)"))
{
  function content()
  {
?>
<h1>Bläser, Bluenotes und satte Beats</h1>

<div class="newssource">Neuburger Rundschau vom 30. Juni 2008, Seite 39</div>

<p>Ekstase auf dem Rathausplatz: Nick Flade war mit seiner Jazz-Band „Groove Box“ einer von insgesamt elf Formationen, die mit elf Stunden Musik beim Dixie- und Swingfestival die Altstadt beschallten. Das Festival, das zum zweiten Mal in dieser Form stattfand, ist auf die regionale Jazzszene fokussiert. Diesmal mit dabei die Schüler-Jazzbands des Christoph-Scheiner-, Gnadenthal- und Reuchlin-Gymnasiums. Am Nachmittag gab es noch viele leere Reihen, am Abend füllte sich der Platz dann, und die Stimmung erreichte bei Charly Böcks Latin Project einen Höhepunkt. Musikalisch auf höchstem Niveau spielte neben dem Jazzförderpreisträger Nick Flade vor allem Simon Seidl mit seinem Quartett „Viersinn“. Die Veranstaltung soll im nächsten Jahr fortgesetzt werden.</p>

<p class="newsauthor">Volker Linder</p>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Die ganze Stadt swingt mit (30.06.2008)"))
{
  function content()
  {
?>
<h1>Die ganze Stadt swingt mit</h1>
<h2>Auch auf zwei Bühnen behält das Dixie- und Swing-Festival seine Anziehungskraft</h2>
<div class="newssource">Donaukurier vom 30. Juni 2008, Seite 23</div>

<p><b>Ingolstadt</b> <i>(reh)</i> Solche Klänge sind auf dem Rathausplatz und in der Innenstadt in diesen Tagen ungewöhnlich. Normalerweise plärren Fußballfans ihre Freude heraus, die Stadt kann aber auch anders: ruhiger, gemütlicher und anspruchsvoller. Das bewies sie am Samstag elf Stunden lang bei der sechsten Auflage des Dixie- und Swingfestivals, wobei sich der erste Teil des Titels dieses Mal ersatzlos streichen ließ: Von den elf Bands war keine als Dixieband angetreten, was aber kaum jemanden störte.</p>

<? more("(Artikel beim Herausgeber nicht online vorhanden!)", "") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Sogar der Straßenmusiker jazzt mit (18.06.2007)"))
{
  function content()
  {
?>
<h1>Sogar der Straßenmusiker jazzt mit</h1>
<h2>Dixie- und Swing-Festival mit großer Bühne auf dem Rathausplatz</h2>
<div class="newssource">Donaukurier vom 18. Juni 2007, Seite 19</div>

<p class="newsauthor">Von Suzanne Schattenhofer</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Wenn Ingolstadt im Sonnenschein swingt, und Dixie über die Dächer klingt, dann gibt es kein Halten mehr, und gute Laune breitet sich aus: In den Cafés und Biergärten sitzen die Leute und lauschen der Musik, und wo es keine Stühle mehr gibt, bleiben die Menschen einfach stehen, angezogen vom Rhythmus, der ins Blut und in die Beine geht. Sogar der Verkehr bleibt dann stecken am Schliffelmarkt, wenn mit 4 of a kind die Post abgeht. Der Straßenmusiker in der Moritzstraße legt seine Quetschn beiseite, packt das Saxofon heraus und jazzt munter mit.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/lokales/ingolstadt/art599,1697821") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Nachwuchsförderung durch die Jazztage (08.11.2007)"))
{
  function content()
  {
?>
<h1>Nachwuchsförderung durch die Jazztage</h1>

<div class="newssource">Neuburger Rundschau vom 8. November 2007, Seite 36</div>

<p>Zu den Jazz-Workshops an den Ingolstädter Schulen wollen die Veranstalter der Ingolstädter Jazztage mit der Nachwuchssession Young Jazz Players besonders den Nachwuchs fördern. Die durch die Ingolstädter Jazzfreunde ins Leben gerufene Veranstaltungsreihe soll ein fester Programmpunkt der Jazztage werden. Im vollbesetzten Diagonal drängten sich die jungen Musiker mit ihren Instrumenten und freuten sich, im großen Rahmen der Jazztage ihr Können vor Publikum zeigen zu können. Darunter dürfte so mancher Ingolstädter Jazzförderpreisträger gewesen sein.</p>

<p class="newsauthor">Christian Pacher</p>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Fachsimpeleien am Bühnenrand (06.11.2007)"))
{
  function content()
  {
?>
<h1>Fachsimpeleien am Bühnenrand</h1>

<div class="newssource">Donaukurier Online vom 6. Juni 2007</div>

<p class="newsauthor">Von Sandra-Isabel Knobloch</p>

<p><b>Ingolstadt</b> <i>(DK)</i> Zu einer Session für Nachwuchsjazzer lud der Verein der Ingolstädter Jazzfreunde im Rahmen der 24. Ingolstädter Jazztage ins Diagonal ein. Bereits seit 2006 werden junge Jazzmusiker gefördert, unterstützt werden sie von den Musiklehrern Charles Leimer (Katharinen-Gymnasium) und Robert Aichner (Reuchlin-Gymnasium).</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/nachrichten/kultur/art598,1776004") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Aktive Jazzer (13.03.2007)"))
{
  function content()
  {
?>
<h1>Aktive Jazzer</h1>

<div class="newssource">Donaukurier Online vom 13. März 2007</div>

<p class="newsauthor">Von Bernhard Pehl</p>

<p><b>Ingolstadt</b> <i>(peh)</i> Der Verein Jazzfreunde Ingolstadt hat in seiner Hauptversammlung den Vorstand einstimmig wiedergewählt. Vorsitzender bleibt Reimund Domke, seine Stellvertreter sind Christian Pacher und Stefan Wild.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/lokales/ingolstadt/art599,1632744") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}

elseif ($_GET[PAGE] == addpoint(PAGE, "Regionale Szene im Blick (14.11.2006)"))
{
  function content()
  {
?>
<h1>Regionale Szene im Blick</h1>
<h2>Jazzfreunde Ingolstadt: Offene Bühne im Diagonal</h2>
<div class="newssource">Donaukurier vom 14. November 2006, Seite 19</div>

<p class="newsauthor">Von Michael Kleinherne</p>

<p><b>Ingolstadt</b> <i>(DK)</i> &quot;Wir wollen den Jazz über das Jahr am Laufen halten&quot;, hieß es bei der jüngsten Mitgliederversammlung der Jazzfreunde Ingolstadt. Und dazu hatte man, nach der Vereinssitzung, zur &quot;Nachwuchs-Musiker-Jamsession&quot; ins Diagonal geladen. Dort konnten sich &quot;Young Jazz Players in Concert&quot; beweisen. Der musikalische Nachwuchs war aufgerufen, die Bühne zu stürmen. Dort hielten bewährte Kräfte, auch Förderpreisträger Tom Diewock am Schlagzeug oder Charly Leimer an den Keyboards, den jungen Musikern quasi die Steigbügel bereit, um Lampenfieber und Bühnenangst gar nicht erst aufkommen zu lassen. Zahlreiche jugendliche Jazzer, vom Siebtklässler bis zum fast erwachsenen Teenager, nahmen die Gelegenheit wahr und unterhielten das Publikum einen ganzen Abend lang.</p>

<? more("Mehr lesen auf donaukurier.de", "http://www.donaukurier.de/nachrichten/kultur/art598,1537821") ?>

<div class="backlink"><a href="<?=(PAGE . PAGE_ENDING) ?>">Zurück</a></div>

<?
  }
}


else //if (!$_GET[PAGE])
{
  function content()
  {
?>
<h1>Die Jazzfreunde Ingolstadt in der Presse</h1>

<?
    toc();
?>
<hr />
<p class="small">Da das Recht am Artikel üblicherweise beim Herausgeber der Zeitung liegt, dürfen wir hier die meisten Artikel – insbesondere die des Donaukurier – nur in Ausschnitten wiedergeben. Jedoch sind diese Artikel nicht immer online beim Herausgeber verfügbar. Den vollständigen Artikel können Sie dann in der Regel nur im Archiv der Zeitung oder gegen Bezahlung nachlesen.</p>
<?
  }
}

?>