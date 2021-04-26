<?php
if (!defined("PAGE")) {
  header("location:../newsletter.php");
  die();
}

function attach()
{
?>
  <div class="attachment">(Anhänge sind nur im original Mail-Newsletter enthalten. Lust auf Newsletter? Warum nicht gleich <a href="newsletter.php">hier</a> eintragen?)</div>
  <?php
}

error_reporting(E_ERROR | E_PARSE);

if (false) {
  // BLAAAAAAAAH :D ich will mit else anfangen :D auch net schlecht, oder?
}

/**

 Die HTML-Daten werden in einzelnen Blöcken abgelegt und jeweils gesondert addressiert. Aus der Reihenfolge der Daten ergibt sich zudem das Inhaltsverzeichnis.

**/

/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 37  (02. August 2010)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 35</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 173</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde:</p>
    <p class="emboss red">Bigband Matinee: <a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a></p>
    <p class="emboss red">Bigband Matinee: <a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Anmeldung zum Big Band Workshop im Reuchlin-Gymnasium (2.-4. Juli)</li>
      <li>Big Band Matinee am 4. Juli ab 10.30 Uhr im Hotel Rappensberger</li>
      <li>Summer Jazz Open Air am 3./4. Juli im Innenhof des Hotels Rappensberger</li>
      <li>Tim Allhoff, Ingolstädter Jazzförderpreisträger 2010, eröffnet am 17.10.2010 Jazztage</li>
      <li>Paco de Lucía &amp; Band “El Rey de Flamenco” am 7.11.210 um 19.30 Uhr im Festsaal</li>
      <li>Hazmat Modine am Dienstag 8.6.2010 um 20 Uhr im Diagonal</li>
      <li>Club Légère mit CD-Release-Konzert Konzert am 12.6. im Diagonal ab 20 Uhr</li>
      <li>Kraiberg Jazzband mit neuer CD. Ab sofort erhältlich!</li>
      <li>Neuauflage der Jam-Sessions im Diagonal jeden 3. Sonntag im Monat unter Leitung von Tom Diewock</li>
      <li>Gesangsformation “The Voice Connection” sucht dringend tiefen Bass</li>
      <li>Gesucht: Band für die Schreiner-Freisprechungsfeier am 29.07.2010 in Ingolstadt</li>
      <li>Ausschreibung Treffen Junge Musik-Szene 11. bis 15.11.2010 in Berlin</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Dienstag</td>
        <td>08.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Hazmat Modine (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>12.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Club Légère CD-Release Konzert mit anschließender Discoparty (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>19.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Kulturwerkhalle in Rohrbach)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>20.06.2010</td>
        <td>19.00 Uhr</td>
        <td>12. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>08.07.2010</td>
        <td>19.00 Uhr</td>
        <td>Rudi Trögl-Rainer Hasenkopf Duo: Eröffnung der 1. Ingolstädter Kunstmesse (Exerzierhalle)</td>
      </tr>
      <tr>
        <td>Fr-So</td>
        <td>2.-4.07.2010</td>
        <td>&nbsp;</td>
        <td>Big Band Workshop mit Harald Rüschenbaum (Reuchlin-Gymnasium)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>03.07.2010</td>
        <td>18.00 Uhr</td>
        <td>Bernhard Hollinger Group beim 5. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>03.07.2010</td>
        <td>18.00 Uhr</td>
        <td>Abba Mobil beim 5. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>04.07.2010</td>
        <td>10.30 Uhr</td>
        <td>5. Summer Jazz Open Air mit Big Band Matinee (Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>18.07.2010</td>
        <td>10.30 Uhr</td>
        <td>13. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>19.09.2010</td>
        <td>10.30 Uhr</td>
        <td>14. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>17.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Tim Allhoff: Eröffnung der 27. Jazztage (Diagonal)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>25.10.2010</td>
        <td>10.30 Uhr</td>
        <td>13. Session der Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>28.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal-Gymnasium)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>29.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal-Gymnasium)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>30.10.2010</td>
        <td>10.30 Uhr</td>
        <td>1. Highlight-Konzert (Audi-Forum Kundencenter)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>31.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Highlight in der Kirche (St. Augustin)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>02.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Ingolstädter Szene (Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>03.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Ingolstädter Szene (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz in den Kneipen</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz im Theater (Altstadttheater)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Welcome Party (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>05.11.2010</td>
        <td>10.30 Uhr</td>
        <td>2. Highlight-Konzert (Festsaal Ingolstadt)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>05.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz Party I (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>06.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz Party II (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>07.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz Brunch mit Birdland Jazzband (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>07.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazzgottesdienst (Kirche St. Matthäus)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>07.11.2010</td>
        <td>10.30 Uhr</td>
        <td>3. Highlight-Konzert: Paco de Lucia &amp; Band (Festsaal Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>21.11.2010</td>
        <td>10.30 Uhr</td>
        <td>15. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>19.12.2010</td>
        <td>10.30 Uhr</td>
        <td>16. Jam Session X-Mas (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>12.02.2011</td>
        <td>18.00 Uhr</td>
        <td>2. Big Band Nacht der Ingolstädter Schulen</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">17. Oktober – 7. November 2009: 27. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>So langsam füllt sich der Jazzkalender wieder. Das 5. Summer Jazz Open Air mit Bigbandworkshop und -matinee naht, im Diagonal soll den Jam Sessions unter der Leitung Tom Diewocks neues Leben eingehaucht werden, die 27. Ingolstädter Jazztage nehmen höchst qualitative Gestalt an, und ... und ... und ... Ich glaube, so viele Einzelpunkte hatte ich noch nie in einem Jazzletter: 12 Stück! Dann schießen wir mal los mit der ...</p>

    <h5>1. Anmeldung zum Big Band Workshop im Reuchlin-Gymnasium (2.-4. Juli)</h5>

    <p>War ja bereits im letzten Jazzletter angekündigt. Jetzt aber gibt es das Anmeldeschreiben im Anhang, das alle wesentlichen Infos enthält. Nur so viel vorne weg:</p>

    <ul>
      <li>Anmeldeschluss ist der 17. Juni, gerne unter dieser Emailadresse</li>
      <li>Noch gibt es keine Teilnahmenbegrenzung, aber bei Überfüllung (legt der Dozent Harald Rüschenbaum fest) entscheidet das Anmeldeeingangsdatum</li>
      <li>ALSO SCHNELL ANMELDEN!</li>
      <li>Mitmachen können alle Schüler &amp; Studenten sowie Jazzfreunde-Vereinsmitglieder</li>
      <li>Vereinsmitglieder erhalten eine Kursgebührenermäßigung</li>
      <li>als Instrumente sind Bigband fähige Instrumente erwünscht (Saxes, Trompete, Posaune, Klavier, Drums, Gitarre, Bass, auch Klarinette)</li>
      <li>Querflöte, Hörner aller Arten, Tuba, etc. können unter der Voraussetzung mitspielen, dass eigenständig aus den vorhandenen Bläserstimmen (in der Regel Bb und Eb) transponiert wird</li>
    </ul>

    <p>Die Workshop-Bigband eröffnet dann die ...</p>

    <hr />

    <h5>2. Big Band Matinee am 4. Juli ab 10.30 Uhr im Hotel Rappensberger</h5>

    <p>Auch dieses erstmalig durchgeführte vormittägliche Bigband-Treffen ist ja schon seit dem dem letzten Jazzletter bekannt. Jetzt steht die Reihenfolge fest:</p>

    <ul>
      <li>10.30 Uhr die Workshop Big Band (Ltg. Harald Rüschenbaum)</li>
      <li>11 Uhr die Big Band des Reuchlin-Gymnasiums (Ltg. meine Wenigkeit)</li>
      <li>12 Uhr die Big Band des Gnadenthal-Gymnasiums (Ltg. Wolfgang Riffelmacher)</li>
      <li>13 Uhr die Big Band des Christoph-Scheiner-Gymnasiums (Ltg. Christine Roß)</li>
      <li>14 Uhr die Big Band der Simon-Mayr-Musikschule (Ltg. Franz Zäch)</li>
    </ul>

    <p>Parallel dazu lädt Stefan Wild vom Hotel Rappensberger zum Brunchen / Mittagessen / Kaffeetrinken gemütlich in den Innenhof des Hotels ein, wie immer Spitzenservice verbunden mit einem offenen Herzen für die Jugendlichen: Danke Stefan! Aber das ist unser Jazz-Ingolstadt schon vom Rappensberger gewohnt, läuft doch dort bereits zum 5. Male das letzte Jahr außerordentlich in der Presse gelobte ...</p>

    <hr />

    <h5>3. Summer Jazz Open Air am 3./4. Juli im Innenhof des Hotels Rappensberger</h5>

    <p>Kombiniert mit der Big Band Matinee am 4. Juli bietet das kostenlose Open Air Minifestival am Samstag 3. Juli zwei Topacts:</p>

    <ul>
      <li>18.30 Uhr Bernhard Hollinger Group (Jazzförderpreisträger der Stadt Ingolstadt 2009)</li>
      <li>gegen 20.30 Uhr Abba Mobil (mit Charly Böck, Jazzförderpreisträger der Stadt Ingolstadt 1995)</li>
    </ul>

    <p>Beide Formationen wirbeln gerade die nationale Jazzszene auf. Toll, dass sich immer mehr Jazzförderpreisträger national und international positionieren! Dem diesjährigen Jazzförderpreisträger 2010 ist dies ebenfalls schon gelungen. Davon kann man sich persönlich überzeugen, wenn es heißt ...</p>

    <hr />

    <h5>4. Tim Allhoff, Ingolstädter Jazzförderpreisträger 2010, eröffnet am 17.10.2010 Jazztage</h5>

    <p>Bei der Eröffnung der 27. Ingolstädter Jazztage 2010 am Sonntag, 17. Oktober, um 18 Uhr im Bürgerhaus/Diagonal, Kreuzstraße 12, wird der diesjährige Jazzförderpreis der Stadt Ingolstadt an Tim Allhoff (Piano) verliehen. Erst vor kurzem veröffentlichte der musikalische Leiter am Theater Ingolstadt unter dem Namen “Tim Allhoff Trio” mit Andreas Kurz (bass) und Bastian Jütte (drums) im Februar 2010 sein Debütalbum „prelude“. Von diesem Meisterwerk und von der unbändigen Energie der Live-Auftritte des Trios zeigen sich Zuhörer und Kritiker gleichermaßen begeistert. Und auch Kurator Kenny Wheeler und das Publikum beim „Neuen Deutschen Jazzpreis“ in Mannheim scheint das Trio überzeugt zu haben, denn 2010 konnten die drei Jungs den Preis mit nach Hause nehmen.<br />
      Im Herbst also: Tim Allhoff live in Ingolstadt, und das ohne Eintritt. Das ist natürlich nicht möglich beim ersten bekannt gewordenen Highlight der Jazztage in Ingolstadt. Es kommt, man glaubt es kaum, ...</p>

    <hr />

    <h5>5. Paco de Lucía &amp; Band “El Rey de Flamenco” am 7.11.210 um 19.30 Uhr im Festsaal</h5>

    <p>Es ist eines der großen Highlight-Konzerte der 27. Ingolstädter Jazztage 2010! Der König des Flamenco gibt sich mit folgender Formation die Ehre:</p>

    <p>Paco de Lucia<br />
      Niño Josele (2nd guitar)<br />
      Antonio Serrano (key, harm)<br />
      Alain Perez (b)<br />
      Piranha (perc)<br />
      Cristo Heredia (voc)<br />
      David de Jacoba (voc)<br />
      Farruco (dance)</p>

    <p>Mit elf Jahren tritt Paco bereits zum ersten Mal öffentlich auf. Da Paco de Lucía fest in seiner Flamenco-Tradition verwurzelt ist, kann er musikalische Experimente wagen, die die Türen öffnen zu Jazz und Klassik. So arbeitet er mit Jazzmusikern wie Larry Coryell, John McLaughlin und Al di Meola zusammen und spielte mit John und Al die weltbekannten Scheiben „Friday Night in San Francisco“ (1980) und „Passion, Grace and Fire“ ein. Er komponiert und arrangiert nach der Musik von Georges Bizet den Soundtrack zu Carlos Sauras Film „Carmen“, ein Film, der in den 80er Jahren ein Flamenco-Fieber in Europa entfacht. De Lucía tritt mit Künstlern wie Chick Corea, Santana und Bryan Adams auf, und wer, wenn nicht Paco, könnte für Adams seinen Hit „Have You Really Loved A Woman“ aus dem Film „Don Juan de Marco“ interpretieren? Letztes, weltbekanntes Highlight seiner formidablen Kunst ist sein wunderbarer Titel „Entre dos Aguas“, den er – schon vor mehr als 35 Jahren eingespielt – Woody Allen 2008 für dessen preisgekrönte Filmkomödie „Vicky Christina Barcelona“ überlässt. Über 50 Singles, CDs und Alben veröffentlichte Paco de Lucía, viele als Solist, viele auch zusammen mit Künstlern aller Facetten. Es wundert nicht, dass Paco de Lucía für sein Werk den Flamenco-Grammy erhält und dass ihn der hoch dotierte Prinz-von-Asturien-Preis ehrt.</p>

    <p>Und für den Auftritt dieses Superstars gibt es bereits Karten: Tickets können im Vorverkauf zwischen 68 Euro und 38 Euro zuzüglich Gebühren erworben werden unter</p>

    <ul>
      <li>www.eventim.de</li>
      <li>Donaukurier-Ticketservice, Tel. 0180/3000013, www.donaukurier.de/ticketservice</li>
      <li>Tourismusinformation am Hauptbahnhof, Tel. 0841/305-3005</li>
    </ul>

    <p>An der Abendkasse kosten die Tickets in vier Kategorien zwischen 45 und 79 Euro. Einen Eindruck von Paco bekommt man übrigens unter</p>

    <p><a href="http://www.youtube.com/watch?v=3BQrWJzTPA8">http://www.youtube.com/watch?v=3BQrWJzTPA8</a><br />
      <a href="http://www.youtube.com/watch?v=a_bmjk_5vjo">http://www.youtube.com/watch?v=a_bmjk_5vjo</a>
    </p>

    <p>Dem Kulturamt unter Josef Gutmann und dem Festivalleiter Jan Rottau ist also ein weiterer Coup gelungen! Wieder ein großartiger Künstler in unserer Region! Wer mit Weltmusik nicht bis November warten will, dem sei wärmsten empfohlen ...</p>

    <hr />

    <h5>6. Hazmat Modine am Dienstag 8.6.2010 um 20 Uhr im Diagonal</h5>

    <p>Was oder wer ist Hazmat Modine? Folgendes findet man dazu im Internet:</p>

    <p><a href="http://www.youtube.com/watch?v=PE3p1LJIzlA&amp;feature=related">http://www.youtube.com/watch?v=PE3p1LJIzlA&amp;feature=related</a><br />
      <a href="http://www.youtube.com/watch?v=Z0rGO6U7wcQ">http://www.youtube.com/watch?v=Z0rGO6U7wcQ</a>
    </p>

    <blockquote>
      <p>“Hazmat Modine ist eine US-amerikanische Blues- und Rootsmusik-Band aus New York, die seit 2006 größere Bekanntheit erlangte. Durch die Verbindung verschiedener Musikstile wie Blues, Rocksteady, Calypso und Klezmer und zahlreiche Live-Auftritte in Nordamerika, Europa und Asien hat die Band sich einen Namen im Weltmusik-Genre gemacht. Bandgründer und Leadsänger Wade Schuman gilt als hervorragender Mundharmonikaspieler und hat als Sessionmusiker auf Joan Osbornes vierfach Grammy-nominierten Album Relish von 1995 und zuletzt auf dem mit dem Grammy 2010 ausgezeichneten Album High, Wide and Handsome von Loudon Wainwright III mitgewirkt. Die Band selbst setzt sich aus erfahrenen Studio- und Livemusikern verschiedener Musikgenres zusammen. So spielt an der Tuba beispielsweise der renommierte Jazz-Musiker Joe Daley. Kritiker bescheinigen der Band große Originalität im Hinblick auf die Mischung verschiedener Musikstile. Während in manchen Momenten der Blues der 20er und 30er Jahre durchklänge, hätte man in anderen Momenten den Eindruck, einer osteuropäischen Brass-Band zuzuhören. Schuman erklärte in einem Interview, dass sich in der Musik seiner Band die vielfältigen Einflüsse des „Schmelztiegels New York“ spiegeln würden. Er selbst sei stark von früher Bluesmusik beeinflusst worden, habe sich jedoch auch stark mit rumänischer Volksmusik beschäftigt. Die anderen Bandmitglieder würden dagegen auch kubanische, jamaikanische oder Jazz- und Klezmer-Einflüsse in die Band einbringen.”</p>
    </blockquote>

    <p>Also ein würdige Fortsetzunge der Reihe “Clubkonzerte” im Diagonal nach den Superstars Bill Evans und George Duke, beide übrigens seltsamerweise ohne Widerhall in den regionalen Medien. Aber vielleicht hat diese Band mehr Glück mit den Medien, nämlich ...</p>

    <hr />

    <h5>7. Club Légère mit CD-Release-Konzert Konzert am 12.6. im Diagonal ab 20 Uhr</h5>

    <p>Dazu der Pressetext der CD-Präsentation:</p>

    <blockquote>
      <p>„Club Légère entspringt aus den musikalischen Tiefen unserer ungezähmten C-Funk-Seele, abgerichtet aufs Publikum entführt es uns, wie einst Pan, ins Selbstvergessene.“<br />
        So lyrisch führt uns die Ingolstädter Soul/Funk/Pop-Combo auf ihrer Website (www.clublegere.de) und auf dem Booklet ihres Debutalbums „Welcome to the Club“ ein. Im Vordergrund stehen aber nicht nur ihre Texte, sondern primär ihre selbst komponierten Lieder. Der Bogen spannt sich von einem funkig-swingendem Instrumentallied, über pop-soulig beschwingten, teils mit Jazz angehauchten englischsprachigen Liedern, bis hin zu zwei deutschen Balladen. Insgesamt finden sich auf ihrem Album 13 eigene Lieder, die sich im Laufe der Jahre ihrer Schaffenskraft entwickelt haben. Diesen kompletten Stil, den sie prägen, nennen die Bandgründer (Hakan Cesur, Claus Böhm, Nils Dinter) den C-Funk! Er steht für cluborientierten Funk!</p>

      <p>Bis zu ihrer ersten CD war es aber kein einfacher Weg. Gründung im Jahre 2004. Sieg beim Aqua-Turbo-Contest 2006 in der Fronte, dem größten Bandnachwuchswettbewerb in der Region, mehrere Konzerte, bis schon Ende 2006 ihre erste Single „Earth Beat“ entstand. Interessant dabei ist, dass auf dieser Single ein Remix der angesagten Ambient- und Chillout DJane Gillian Gordon zu finden ist. Bei einem Votingwettbewerb gelang ihnen dann bei einer renommierten Plattenfirma mit dem Lied „Lifetime“ der Sieg. Dieser fand sich anschließend auf einem europaweit vertriebenen Sampler wieder. Nur wurde aus dem versprochenen Plattenvertrag leider nichts. Hier lernten sie zum ersten mal die Schattenseiten des Musikbusiness kennen. Bevor man sich über den Tisch ziehen ließ, kehrte Club Légère der Plattenfirma den Rücken und nahm alle Titel selbst im Studio auf und ließ sie bei MagicMangoMusic nachmastern.</p>

      <p>Die aktuelle Bandbesetzung:<br />
        Karin Lindauer (Leadvocals)<br />
        Katja Richter (Backvocals)<br />
        Julia Scheufler (Saxophon)<br />
        Claus Böhm (Drums)<br />
        Hakan Cesur (Gitarre)<br />
        Nils Dinter (Bass)<br />
        Gregor Spreng (Piano)</p>

      <p>Diese Besetzung wird es so leider nicht mehr geben, da die Leadsängerin Karin Lindauer eine Profiausbildung als populäre Sängerin in Hamburg beginnen will. Also lasst uns noch mal so richtig feiern und die CD „Welcome to the Club“ musikalisch präsentieren. Im Anschluss gibt es mit dem Schlagzeuger (DJ Olschool) von Club Légère und DJ-Freunden eine Funk/Soul/Disco-Party.</p>

      <p>Einlass: 19:30 Uhr<br />
        Konzertbeginn 20:00 Uhr im Diagonal - Bürgerhaus (Kreuzstraße, Ingolstadt)<br />
        Eintritt: 5 EUR (bei 5 EUR Zuzahlung inklusive neuer CD!!!)<br />
        ab ca. 22:00 Uhr Funk-Party im Diagonal!</p>

      <p>Club Légère freuen sich auf euch!</p>
    </blockquote>

    <p>Und noch jemand freut sich über Aufmerksamkeit, die ...</p>

    <hr />

    <h5>8. Kraiberg Jazzband mit neuer CD. Ab sofort erhältlich!</h5>

    <p>Karl Wewer, vor einiger Zeit Vereinsmitglied beim Jazzverein geworden, kündigt die CD so an:</p>

    <blockquote>
      <p>“Liebe Freunde der Kraiberg Jazz Band!</p>

      <p>Unsere neue CD &quot;Querbeat&quot; ist da! 2 Jahre nach unserer 1. CD “Schlaraffenland” haben wir uns wieder für 2 Tage in den Saal der Schlaraffia Ingolstadt zurückgezogen und mit einfachen technischen Mitteln unsere 2. CD aufgenommen. Sie ist nun fertig gepresst. Wir haben sie “QUERBEAT” genannt, da - quasi als Markenzeichen der Kraiberg Jazz Band - unterschiedlichste Stile gespielt und vermischt wurden. Es sind folgende Titel enthalten;</p>

      <p>1 Cantaloop Island<br />(Herbie Hancock)<br />
        2 Hi Heel Sneakers<br />(Robert Higginbotham)<br />
        3 Agua De Beber<br />(Antonio Jobim)<br />
        4 Moondance<br />(Van Morrison)<br />
        5 Toc-Toc<br />(Kitty Hoff)<br />
        6 Take five<br />(Paul Desmond)<br />
        7 Hallelujah I Love Him So<br />(Ray Charles)<br />
        8 Hard Hearted Hannah<br />(Ager, Yellen, Bigelow,, Bates)<br />
        9 Tokyo Blues<br />(Horace Silver)<br />
        10 Stormy Weather Blues<br />(Barbara Dennerlein)</p>

      <p><img src="gfx/newsletter/querbeet_kraibergjazzband.png" alt="" /></p>

      <p>Uns haben die Aufnahmen riesigen Spaß bereitet und wir hoffen, dass man das beim Zuhören spürt. Falls Interesse besteht, können Sie/ könnt Ihr die CD zum Preis von 10 Euro (plus Versand) über die e-mail <span class="email"><?php echo killmail("kjb@neusob.de"); ?></span> bestellen; alternativ natürlich auch über den direkten Kontakt zu einem der Bandmitglieder:</p>

      <p>- Sabine Graf<br />
        - Helmut Leben<br />
        - Sven Bleckmann<br />
        - Peter Friedrich<br />
        - Joachim Twest<br />
        oder meine Wenigkeit: Karl Wewer</p>

      <p>P.S. Im Herbst planen wir ein Konzert in Ingolstadt, bei dem wir u.a. die Titel auf dieser CD vorstellen. Info über Ort und Termin folgen rechtzeitig.</p>

      <p>Viele Grüße!</p>

      <p>Kraiberg Jazz Band</p>

      <p>Homepage: <a href="http://www.kraiberg-jazz-band.de">www.kraiberg-jazz-band.de</a> (hier gibt es auch Hörproben aus beiden CD's)<br />
        e-mail : <span class="email"><?php echo killmail("kjb@neusob.de"); ?></span>”</p>
    </blockquote>

    <p>Die regionale Szene schläft also nicht! Aktiv werden kann sowieso jeder Jazzmusiker, indem er mitmacht bei der ...</p>

    <hr />

    <h5>9. Neuauflage der Jam-Sessions im Diagonal jeden 3. Sonntag im Monat unter Leitung von Tom Diewock</h5>

    <p>Es wurde ja zuletzt viel diskutiert über die Sessions und nach einigen Gesprächen kamen folgende Ergebnisse heraus:</p>

    <ul>
      <li>Tom Diewock ist ab sofort als Sessionleiter für diese Jam-Reihe verantwortlich</li>
      <li>Er stellt auch die Sessionband zusammen</li>
      <li>Als alleiniger Spielort ist ab sofort das Diagonal auserkoren</li>
      <li>ebenso sollen die Sessions stets am 3. Sonntag im Monat stattfinden, falls es terminlich im Diagonal geht</li>
      <li>Beginn ist gegen 19 Uhr</li>
      <li>nur im August (Sommerpause) und Oktober (sowieso Jazztage mit Late Night Jam Sessions im Hotel Ambassador) wird pausiert</li>
      <li>Grundlage der Jams sind die Real Books. Sind übrigens käuflich bei Nick in music-in (Tränktorstr. 15) zu erwerben. Lohnt sich!!</li>
    </ul>

    <p>Als vorläufige Termine sind eingeplant (Änderungen noch vorbehalten!):</p>

    <ul>
      <li>20. Juni</li>
      <li>18. Juli</li>
      <li>19. September</li>
      <li>4. / 5. / 6. November Jam Sessions mit der Late Night Band stets gegen Mitternacht im NH Hotel Ambassador</li>
      <li>21. November</li>
      <li>19. Dezember (X-Mas-Session)</li>
    </ul>

    <p>Die X-Mas-Session soll wieder mit Kerstin Schulz am Gesang stattfinden, wie in den letzten Jahren bewährt. Apropos Gesang. Vor kurzem erhielt ich einen musikalischen Hilferuf, denn die ...</p>

    <hr />

    <h5>10. Gesangsformation “The Voice Connection” sucht dringend tiefen Bass</h5>

    <p>Thomas Klaschka, Kopf der A-Cappella-Gruppe (Wise Guys lassen grüßen!) mailte mich an:</p>

    <blockquote>
      <p>“Hallo Robert,</p>

      <p>ich komme heute mit einem großen Anliegen zu dir. Vielleicht hast du es ja schon mitbekommen: Der tiefe Bass unserer Voice Connection verlässt uns im Juni aus beruflichen Gründen und geht nach Italien. So sehr wir ihm das persönlich wünschen, es ist doch ein riesiger Verlust für unsere Gruppe. Und wir brauchen dringend Ersatz, der sofort Zeit hat, solistisch ambitioniert ist, über genügend Erfahrung besitzt und auch die nötigen Qualitäten hat - du kennst uns ja. Hast du für mich eventuell konkrete Vorschläge, Namen? Oder kannst du mich an jemanden weiter vermitteln, der uns da helfen kann?</p>

      <p>Ich bin für jede Hilfe dankbar, auch wenn das weiter publik gemacht wird.</p>

      <p>Ganz liebe Grüße und noch eine erholsame zweite Ferienwoche</p>

      <p>Thomas”</p>
    </blockquote>

    <p>Infos zur Gruppe gibt’s unter <a href="http://www.the-voice-connection.de/start">http://www.the-voice-connection.de/start</a><br />
      Und noch jemanden soll geholfen werden, denn es wird ebenfalls ...</p>

    <hr />

    <h5>11. Gesucht: Band für die Schreiner-Freisprechungsfeier am 29.07.2010 in Ingolstadt</h5>

    <p>Heri Mayr, ein Jazzkenner erster Güte und begnadeter Schreiner, wünscht sich:</p>

    <blockquote>
      <p>Hallo Robert,<br />
        ich hätte wieder eine Anfrage der Schreinerinnung für eine Band zur musikalischen Begleitung der Freisprechungsfeier am 29.07.2010 in Ingolstadt. 4- 5 Stücke.<br />
        Hast du was für mich?<br />
        Heri</p>

      <p>Heribert Mayr, Schreinerei<br />
        Ingolstädter Str. 27 85077 Manching<br />
        Tel. 08459 915 Fax 08459 7267<br />
        <a href="http://www.h-mayr.de">www.h-mayr.de</a>
      </p>
    </blockquote>

    <p>Und eine gute Bezahlung ist auch gesichert. Dazu aber bitte Heri deswegen direkt kontaktieren. Und zu guter Letzt gibt es noch die ...</p>

    <hr />

    <h5>12. Ausschreibung Treffen Junge Musik-Szene 11. bis 15.11.2010 in Berlin</h5>

    <p>Was ich im Internet gefunden habe und für Nachwuchsbands sicherlich interessant ist:</p>

    <blockquote>
      <p>“Zum 27. Mal findet in Berlin vom 11. bis 15. November 2010 das „Treffen Junge Musik-Szene“ statt.</p>

      <p>Die Teilnehmerinnen und Teilnehmer werden im Rahmen des 27. Bundeswettbewerbs „Treffen Junge Musik-Szene“ ermittelt. Dieser Wettbewerb wird alljährlich vom Bundesministerium für Bildung und Forschung zur Förderung junger Talente gefördert und von den Kulturveranstaltungen des Bundes in Berlin GmbH, Geschäftsbereich Berliner Festspiele, organisiert und durchgeführt.</p>

      <p>Im Kuratorium des Wettbewerbs wirken zusammen: Vertreter der Kultusbehörden verschiedener Bundesländer, des Verbands Deutscher Schulmusiker e. V., der Bundesvereinigung Kulturelle Kinder- und Jugendbildung e. V. (BKJ), des Verbands deutscher Musikschulen e. V. und der Pop-Akademie Baden-Württemberg GmbH. Die Preisträger-Auswahl trifft eine unabhängige Experten-Jury.</p>

      <p>Zur Teilnahme am Bundeswettbewerb sind Kinder und Jugendliche aller Schularten und Ausbildungswege im Alter von 10 bis 21 Jahren eingeladen. Der Wettbewerb ist offen für Bands und Einzelinterpretinnen und –interpreten.</p>

      <p>Die Bewerbungsunterlagen können angefordert werden bei: www.treffen-junge-musik-szene.de</p>

      <p>Berliner Festspiele<br />
        Treffen Junge Musik-Szene<br />
        Schaperstraße 24<br />
        10719 Berlin<br />
        Tel. 030 – 254 89 213<br />
        Fax 030 – 254 89 132<br />
        <span class="email"><?php echo killmail("jugendwettbewerbe@berlinerfestspiele.de") ?></span><br />
        www.berlinerfestspiele.de
      </p>

      <p>Der ausgefüllte Bewerbungsbogen ist zusammen mit einer Demo-CD mit maximal drei Musikbeiträgen und den Texten der Stücke bis zum 31.07.2010 einzureichen. Preis des Wettbewerbs ist die Teilnahme am Treffen mit öffentlichem Konzert aller Preisträgerinnen und Preisträger, an Experten-Workshops und am umfangreichen Rahmenprogramm.”</p>
    </blockquote>

    <p>Uff! Geschafft! Aber: Der Jazz lebt in der Region. Quod erat demonstrandum!</p>

    <p>See you soon?!</p>

    <div class="signum">Robert Aichner</div>

    <div style="font-size:90%">
      <p>PS: Übrigens: Der Organisationskern des Jazzvereins trifft sich diesen Dienstag (8.6.) um 8.30 Uhr im Hotel Rappensberger zur Besprechung. Wer also nicht nur lesen will, was im Jazz in der Region so alles los ist, sondern aktiv dabei sein will, kann gerne dazu stoßen.</p>
    </div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach(); ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 36  (07. Juni 2010)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 35</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 173</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde:</p>
    <p class="emboss red"><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Anmeldung zum Big Band Workshop im Reuchlin-Gymnasium (2.-4. Juli)</li>
      <li>Big Band Matinee am 4. Juli ab 10.30 Uhr im Hotel Rappensberger</li>
      <li>Summer Jazz Open Air am 3./4. Juli im Innenhof des Hotels Rappensberger</li>
      <li>Tim Allhoff, Ingolstädter Jazzförderpreisträger 2010, eröffnet am 17.10.2010 Jazztage</li>
      <li>Paco de Lucía &amp; Band “El Rey de Flamenco” am 7.11.210 um 19.30 Uhr im Festsaal</li>
      <li>Hazmat Modine am Dienstag 8.6.2010 um 20 Uhr im Diagonal</li>
      <li>Club Légère mit CD-Release-Konzert Konzert am 12.6. im Diagonal ab 20 Uhr</li>
      <li>Kraiberg Jazzband mit neuer CD. Ab sofort erhältlich!</li>
      <li>Neuauflage der Jam-Sessions im Diagonal jeden 3. Sonntag im Monat unter Leitung von Tom Diewock</li>
      <li>Gesangsformation “The Voice Connection” sucht dringend tiefen Bass</li>
      <li>Gesucht: Band für die Schreiner-Freisprechungsfeier am 29.07.2010 in Ingolstadt</li>
      <li>Ausschreibung Treffen Junge Musik-Szene 11. bis 15.11.2010 in Berlin</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Dienstag</td>
        <td>08.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Hazmat Modine (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>12.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Club Légère CD-Release Konzert mit anschließender Discoparty (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>19.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Kulturwerkhalle in Rohrbach)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>20.06.2010</td>
        <td>19.00 Uhr</td>
        <td>12. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>08.07.2010</td>
        <td>19.00 Uhr</td>
        <td>Rudi Trögl-Rainer Hasenkopf Duo: Eröffnung der 1. Ingolstädter Kunstmesse (Exerzierhalle)</td>
      </tr>
      <tr>
        <td>Fr-So</td>
        <td>2.-4.07.2010</td>
        <td>&nbsp;</td>
        <td>Big Band Workshop mit Harald Rüschenbaum (Reuchlin-Gymnasium)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>03.07.2010</td>
        <td>18.00 Uhr</td>
        <td>Bernhard Hollinger Group beim 5. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>03.07.2010</td>
        <td>18.00 Uhr</td>
        <td>Abba Mobil beim 5. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>04.07.2010</td>
        <td>10.30 Uhr</td>
        <td>5. Summer Jazz Open Air mit Big Band Matinee (Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>18.07.2010</td>
        <td>10.30 Uhr</td>
        <td>13. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>19.09.2010</td>
        <td>10.30 Uhr</td>
        <td>14. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>17.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Tim Allhoff: Eröffnung der 27. Jazztage (Diagonal)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>25.10.2010</td>
        <td>10.30 Uhr</td>
        <td>13. Session der Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>28.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal-Gymnasium)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>29.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal-Gymnasium)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>30.10.2010</td>
        <td>10.30 Uhr</td>
        <td>1. Highlight-Konzert (Audi-Forum Kundencenter)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>31.10.2010</td>
        <td>10.30 Uhr</td>
        <td>Highlight in der Kirche (St. Augustin)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>02.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Ingolstädter Szene (Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>03.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Ingolstädter Szene (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz in den Kneipen</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz im Theater (Altstadttheater)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Welcome Party (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>05.11.2010</td>
        <td>10.30 Uhr</td>
        <td>2. Highlight-Konzert (Festsaal Ingolstadt)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>05.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz Party I (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>06.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz Party II (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>07.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazz Brunch mit Birdland Jazzband (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>07.11.2010</td>
        <td>10.30 Uhr</td>
        <td>Jazzgottesdienst (Kirche St. Matthäus)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>07.11.2010</td>
        <td>10.30 Uhr</td>
        <td>3. Highlight-Konzert: Paco de Lucia &amp; Band (Festsaal Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>21.11.2010</td>
        <td>10.30 Uhr</td>
        <td>15. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>19.12.2010</td>
        <td>10.30 Uhr</td>
        <td>16. Jam Session X-Mas (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>12.02.2011</td>
        <td>18.00 Uhr</td>
        <td>2. Big Band Nacht der Ingolstädter Schulen</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">17. Oktober – 7. November 2009: 27. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>So langsam füllt sich der Jazzkalender wieder. Das 5. Summer Jazz Open Air mit Bigbandworkshop und -matinee naht, im Diagonal soll den Jam Sessions unter der Leitung Tom Diewocks neues Leben eingehaucht werden, die 27. Ingolstädter Jazztage nehmen höchst qualitative Gestalt an, und ... und ... und ... Ich glaube, so viele Einzelpunkte hatte ich noch nie in einem Jazzletter: 12 Stück! Dann schießen wir mal los mit der ...</p>

    <h5>1. Anmeldung zum Big Band Workshop im Reuchlin-Gymnasium (2.-4. Juli)</h5>

    <p>War ja bereits im letzten Jazzletter angekündigt. Jetzt aber gibt es das Anmeldeschreiben im Anhang, das alle wesentlichen Infos enthält. Nur so viel vorne weg:</p>

    <ul>
      <li>Anmeldeschluss ist der 17. Juni, gerne unter dieser Emailadresse</li>
      <li>Noch gibt es keine Teilnahmenbegrenzung, aber bei Überfüllung (legt der Dozent Harald Rüschenbaum fest) entscheidet das Anmeldeeingangsdatum</li>
      <li>ALSO SCHNELL ANMELDEN!</li>
      <li>Mitmachen können alle Schüler &amp; Studenten sowie Jazzfreunde-Vereinsmitglieder</li>
      <li>Vereinsmitglieder erhalten eine Kursgebührenermäßigung</li>
      <li>als Instrumente sind Bigband fähige Instrumente erwünscht (Saxes, Trompete, Posaune, Klavier, Drums, Gitarre, Bass, auch Klarinette)</li>
      <li>Querflöte, Hörner aller Arten, Tuba, etc. können unter der Voraussetzung mitspielen, dass eigenständig aus den vorhandenen Bläserstimmen (in der Regel Bb und Eb) transponiert wird</li>
    </ul>

    <p>Die Workshop-Bigband eröffnet dann die ...</p>

    <hr />

    <h5>2. Big Band Matinee am 4. Juli ab 10.30 Uhr im Hotel Rappensberger</h5>

    <p>Auch dieses erstmalig durchgeführte vormittägliche Bigband-Treffen ist ja schon seit dem dem letzten Jazzletter bekannt. Jetzt steht die Reihenfolge fest:</p>

    <ul>
      <li>10.30 Uhr die Workshop Big Band (Ltg. Harald Rüschenbaum)</li>
      <li>11 Uhr die Big Band des Reuchlin-Gymnasiums (Ltg. meine Wenigkeit)</li>
      <li>12 Uhr die Big Band des Gnadenthal-Gymnasiums (Ltg. Wolfgang Riffelmacher)</li>
      <li>13 Uhr die Big Band des Christoph-Scheiner-Gymnasiums (Ltg. Christine Roß)</li>
      <li>14 Uhr die Big Band der Simon-Mayr-Musikschule (Ltg. Franz Zäch)</li>
    </ul>

    <p>Parallel dazu lädt Stefan Wild vom Hotel Rappensberger zum Brunchen / Mittagessen / Kaffeetrinken gemütlich in den Innenhof des Hotels ein, wie immer Spitzenservice verbunden mit einem offenen Herzen für die Jugendlichen: Danke Stefan! Aber das ist unser Jazz-Ingolstadt schon vom Rappensberger gewohnt, läuft doch dort bereits zum 5. Male das letzte Jahr außerordentlich in der Presse gelobte ...</p>

    <hr />

    <h5>3. Summer Jazz Open Air am 3./4. Juli im Innenhof des Hotels Rappensberger</h5>

    <p>Kombiniert mit der Big Band Matinee am 4. Juli bietet das kostenlose Open Air Minifestival am Samstag 3. Juli zwei Topacts:</p>

    <ul>
      <li>18.30 Uhr Bernhard Hollinger Group (Jazzförderpreisträger der Stadt Ingolstadt 2009)</li>
      <li>gegen 20.30 Uhr Abba Mobil (mit Charly Böck, Jazzförderpreisträger der Stadt Ingolstadt 1995)</li>
    </ul>

    <p>Beide Formationen wirbeln gerade die nationale Jazzszene auf. Toll, dass sich immer mehr Jazzförderpreisträger national und international positionieren! Dem diesjährigen Jazzförderpreisträger 2010 ist dies ebenfalls schon gelungen. Davon kann man sich persönlich überzeugen, wenn es heißt ...</p>

    <hr />

    <h5>4. Tim Allhoff, Ingolstädter Jazzförderpreisträger 2010, eröffnet am 17.10.2010 Jazztage</h5>

    <p>Bei der Eröffnung der 27. Ingolstädter Jazztage 2010 am Sonntag, 17. Oktober, um 18 Uhr im Bürgerhaus/Diagonal, Kreuzstraße 12, wird der diesjährige Jazzförderpreis der Stadt Ingolstadt an Tim Allhoff (Piano) verliehen. Erst vor kurzem veröffentlichte der musikalische Leiter am Theater Ingolstadt unter dem Namen “Tim Allhoff Trio” mit Andreas Kurz (bass) und Bastian Jütte (drums) im Februar 2010 sein Debütalbum „prelude“. Von diesem Meisterwerk und von der unbändigen Energie der Live-Auftritte des Trios zeigen sich Zuhörer und Kritiker gleichermaßen begeistert. Und auch Kurator Kenny Wheeler und das Publikum beim „Neuen Deutschen Jazzpreis“ in Mannheim scheint das Trio überzeugt zu haben, denn 2010 konnten die drei Jungs den Preis mit nach Hause nehmen.<br />
      Im Herbst also: Tim Allhoff live in Ingolstadt, und das ohne Eintritt. Das ist natürlich nicht möglich beim ersten bekannt gewordenen Highlight der Jazztage in Ingolstadt. Es kommt, man glaubt es kaum, ...</p>

    <hr />

    <h5>5. Paco de Lucía &amp; Band “El Rey de Flamenco” am 7.11.210 um 19.30 Uhr im Festsaal</h5>

    <p>Es ist eines der großen Highlight-Konzerte der 27. Ingolstädter Jazztage 2010! Der König des Flamenco gibt sich mit folgender Formation die Ehre:</p>

    <p>Paco de Lucia<br />
      Niño Josele (2nd guitar)<br />
      Antonio Serrano (key, harm)<br />
      Alain Perez (b)<br />
      Piranha (perc)<br />
      Cristo Heredia (voc)<br />
      David de Jacoba (voc)<br />
      Farruco (dance)</p>

    <p>Mit elf Jahren tritt Paco bereits zum ersten Mal öffentlich auf. Da Paco de Lucía fest in seiner Flamenco-Tradition verwurzelt ist, kann er musikalische Experimente wagen, die die Türen öffnen zu Jazz und Klassik. So arbeitet er mit Jazzmusikern wie Larry Coryell, John McLaughlin und Al di Meola zusammen und spielte mit John und Al die weltbekannten Scheiben „Friday Night in San Francisco“ (1980) und „Passion, Grace and Fire“ ein. Er komponiert und arrangiert nach der Musik von Georges Bizet den Soundtrack zu Carlos Sauras Film „Carmen“, ein Film, der in den 80er Jahren ein Flamenco-Fieber in Europa entfacht. De Lucía tritt mit Künstlern wie Chick Corea, Santana und Bryan Adams auf, und wer, wenn nicht Paco, könnte für Adams seinen Hit „Have You Really Loved A Woman“ aus dem Film „Don Juan de Marco“ interpretieren? Letztes, weltbekanntes Highlight seiner formidablen Kunst ist sein wunderbarer Titel „Entre dos Aguas“, den er – schon vor mehr als 35 Jahren eingespielt – Woody Allen 2008 für dessen preisgekrönte Filmkomödie „Vicky Christina Barcelona“ überlässt. Über 50 Singles, CDs und Alben veröffentlichte Paco de Lucía, viele als Solist, viele auch zusammen mit Künstlern aller Facetten. Es wundert nicht, dass Paco de Lucía für sein Werk den Flamenco-Grammy erhält und dass ihn der hoch dotierte Prinz-von-Asturien-Preis ehrt.</p>

    <p>Und für den Auftritt dieses Superstars gibt es bereits Karten: Tickets können im Vorverkauf zwischen 68 Euro und 38 Euro zuzüglich Gebühren erworben werden unter</p>

    <ul>
      <li>www.eventim.de</li>
      <li>Donaukurier-Ticketservice, Tel. 0180/3000013, www.donaukurier.de/ticketservice</li>
      <li>Tourismusinformation am Hauptbahnhof, Tel. 0841/305-3005</li>
    </ul>

    <p>An der Abendkasse kosten die Tickets in vier Kategorien zwischen 45 und 79 Euro. Einen Eindruck von Paco bekommt man übrigens unter</p>

    <p><a href="http://www.youtube.com/watch?v=3BQrWJzTPA8">http://www.youtube.com/watch?v=3BQrWJzTPA8</a><br />
      <a href="http://www.youtube.com/watch?v=a_bmjk_5vjo">http://www.youtube.com/watch?v=a_bmjk_5vjo</a>
    </p>

    <p>Dem Kulturamt unter Josef Gutmann und dem Festivalleiter Jan Rottau ist also ein weiterer Coup gelungen! Wieder ein großartiger Künstler in unserer Region! Wer mit Weltmusik nicht bis November warten will, dem sei wärmsten empfohlen ...</p>

    <hr />

    <h5>6. Hazmat Modine am Dienstag 8.6.2010 um 20 Uhr im Diagonal</h5>

    <p>Was oder wer ist Hazmat Modine? Folgendes findet man dazu im Internet:</p>

    <p><a href="http://www.youtube.com/watch?v=PE3p1LJIzlA&amp;feature=related">http://www.youtube.com/watch?v=PE3p1LJIzlA&amp;feature=related</a><br />
      <a href="http://www.youtube.com/watch?v=Z0rGO6U7wcQ">http://www.youtube.com/watch?v=Z0rGO6U7wcQ</a>
    </p>

    <blockquote>
      <p>“Hazmat Modine ist eine US-amerikanische Blues- und Rootsmusik-Band aus New York, die seit 2006 größere Bekanntheit erlangte. Durch die Verbindung verschiedener Musikstile wie Blues, Rocksteady, Calypso und Klezmer und zahlreiche Live-Auftritte in Nordamerika, Europa und Asien hat die Band sich einen Namen im Weltmusik-Genre gemacht. Bandgründer und Leadsänger Wade Schuman gilt als hervorragender Mundharmonikaspieler und hat als Sessionmusiker auf Joan Osbornes vierfach Grammy-nominierten Album Relish von 1995 und zuletzt auf dem mit dem Grammy 2010 ausgezeichneten Album High, Wide and Handsome von Loudon Wainwright III mitgewirkt. Die Band selbst setzt sich aus erfahrenen Studio- und Livemusikern verschiedener Musikgenres zusammen. So spielt an der Tuba beispielsweise der renommierte Jazz-Musiker Joe Daley. Kritiker bescheinigen der Band große Originalität im Hinblick auf die Mischung verschiedener Musikstile. Während in manchen Momenten der Blues der 20er und 30er Jahre durchklänge, hätte man in anderen Momenten den Eindruck, einer osteuropäischen Brass-Band zuzuhören. Schuman erklärte in einem Interview, dass sich in der Musik seiner Band die vielfältigen Einflüsse des „Schmelztiegels New York“ spiegeln würden. Er selbst sei stark von früher Bluesmusik beeinflusst worden, habe sich jedoch auch stark mit rumänischer Volksmusik beschäftigt. Die anderen Bandmitglieder würden dagegen auch kubanische, jamaikanische oder Jazz- und Klezmer-Einflüsse in die Band einbringen.”</p>
    </blockquote>

    <p>Also ein würdige Fortsetzunge der Reihe “Clubkonzerte” im Diagonal nach den Superstars Bill Evans und George Duke, beide übrigens seltsamerweise ohne Widerhall in den regionalen Medien. Aber vielleicht hat diese Band mehr Glück mit den Medien, nämlich ...</p>

    <hr />

    <h5>7. Club Légère mit CD-Release-Konzert Konzert am 12.6. im Diagonal ab 20 Uhr</h5>

    <p>Dazu der Pressetext der CD-Präsentation:</p>

    <blockquote>
      <p>„Club Légère entspringt aus den musikalischen Tiefen unserer ungezähmten C-Funk-Seele, abgerichtet aufs Publikum entführt es uns, wie einst Pan, ins Selbstvergessene.“<br />
        So lyrisch führt uns die Ingolstädter Soul/Funk/Pop-Combo auf ihrer Website (www.clublegere.de) und auf dem Booklet ihres Debutalbums „Welcome to the Club“ ein. Im Vordergrund stehen aber nicht nur ihre Texte, sondern primär ihre selbst komponierten Lieder. Der Bogen spannt sich von einem funkig-swingendem Instrumentallied, über pop-soulig beschwingten, teils mit Jazz angehauchten englischsprachigen Liedern, bis hin zu zwei deutschen Balladen. Insgesamt finden sich auf ihrem Album 13 eigene Lieder, die sich im Laufe der Jahre ihrer Schaffenskraft entwickelt haben. Diesen kompletten Stil, den sie prägen, nennen die Bandgründer (Hakan Cesur, Claus Böhm, Nils Dinter) den C-Funk! Er steht für cluborientierten Funk!</p>

      <p>Bis zu ihrer ersten CD war es aber kein einfacher Weg. Gründung im Jahre 2004. Sieg beim Aqua-Turbo-Contest 2006 in der Fronte, dem größten Bandnachwuchswettbewerb in der Region, mehrere Konzerte, bis schon Ende 2006 ihre erste Single „Earth Beat“ entstand. Interessant dabei ist, dass auf dieser Single ein Remix der angesagten Ambient- und Chillout DJane Gillian Gordon zu finden ist. Bei einem Votingwettbewerb gelang ihnen dann bei einer renommierten Plattenfirma mit dem Lied „Lifetime“ der Sieg. Dieser fand sich anschließend auf einem europaweit vertriebenen Sampler wieder. Nur wurde aus dem versprochenen Plattenvertrag leider nichts. Hier lernten sie zum ersten mal die Schattenseiten des Musikbusiness kennen. Bevor man sich über den Tisch ziehen ließ, kehrte Club Légère der Plattenfirma den Rücken und nahm alle Titel selbst im Studio auf und ließ sie bei MagicMangoMusic nachmastern.</p>

      <p>Die aktuelle Bandbesetzung:<br />
        Karin Lindauer (Leadvocals)<br />
        Katja Richter (Backvocals)<br />
        Julia Scheufler (Saxophon)<br />
        Claus Böhm (Drums)<br />
        Hakan Cesur (Gitarre)<br />
        Nils Dinter (Bass)<br />
        Gregor Spreng (Piano)</p>

      <p>Diese Besetzung wird es so leider nicht mehr geben, da die Leadsängerin Karin Lindauer eine Profiausbildung als populäre Sängerin in Hamburg beginnen will. Also lasst uns noch mal so richtig feiern und die CD „Welcome to the Club“ musikalisch präsentieren. Im Anschluss gibt es mit dem Schlagzeuger (DJ Olschool) von Club Légère und DJ-Freunden eine Funk/Soul/Disco-Party.</p>

      <p>Einlass: 19:30 Uhr<br />
        Konzertbeginn 20:00 Uhr im Diagonal - Bürgerhaus (Kreuzstraße, Ingolstadt)<br />
        Eintritt: 5 EUR (bei 5 EUR Zuzahlung inklusive neuer CD!!!)<br />
        ab ca. 22:00 Uhr Funk-Party im Diagonal!</p>

      <p>Club Légère freuen sich auf euch!</p>
    </blockquote>

    <p>Und noch jemand freut sich über Aufmerksamkeit, die ...</p>

    <hr />

    <h5>8. Kraiberg Jazzband mit neuer CD. Ab sofort erhältlich!</h5>

    <p>Karl Wewer, vor einiger Zeit Vereinsmitglied beim Jazzverein geworden, kündigt die CD so an:</p>

    <blockquote>
      <p>“Liebe Freunde der Kraiberg Jazz Band!</p>

      <p>Unsere neue CD &quot;Querbeat&quot; ist da! 2 Jahre nach unserer 1. CD “Schlaraffenland” haben wir uns wieder für 2 Tage in den Saal der Schlaraffia Ingolstadt zurückgezogen und mit einfachen technischen Mitteln unsere 2. CD aufgenommen. Sie ist nun fertig gepresst. Wir haben sie “QUERBEAT” genannt, da - quasi als Markenzeichen der Kraiberg Jazz Band - unterschiedlichste Stile gespielt und vermischt wurden. Es sind folgende Titel enthalten;</p>

      <p>1 Cantaloop Island<br />(Herbie Hancock)<br />
        2 Hi Heel Sneakers<br />(Robert Higginbotham)<br />
        3 Agua De Beber<br />(Antonio Jobim)<br />
        4 Moondance<br />(Van Morrison)<br />
        5 Toc-Toc<br />(Kitty Hoff)<br />
        6 Take five<br />(Paul Desmond)<br />
        7 Hallelujah I Love Him So<br />(Ray Charles)<br />
        8 Hard Hearted Hannah<br />(Ager, Yellen, Bigelow,, Bates)<br />
        9 Tokyo Blues<br />(Horace Silver)<br />
        10 Stormy Weather Blues<br />(Barbara Dennerlein)</p>

      <p><img src="gfx/newsletter/querbeet_kraibergjazzband.png" alt="" /></p>

      <p>Uns haben die Aufnahmen riesigen Spaß bereitet und wir hoffen, dass man das beim Zuhören spürt. Falls Interesse besteht, können Sie/ könnt Ihr die CD zum Preis von 10 Euro (plus Versand) über die e-mail <span class="email"><?php echo killmail("kjb@neusob.de"); ?></span> bestellen; alternativ natürlich auch über den direkten Kontakt zu einem der Bandmitglieder:</p>

      <p>- Sabine Graf<br />
        - Helmut Leben<br />
        - Sven Bleckmann<br />
        - Peter Friedrich<br />
        - Joachim Twest<br />
        oder meine Wenigkeit: Karl Wewer</p>

      <p>P.S. Im Herbst planen wir ein Konzert in Ingolstadt, bei dem wir u.a. die Titel auf dieser CD vorstellen. Info über Ort und Termin folgen rechtzeitig.</p>

      <p>Viele Grüße!</p>

      <p>Kraiberg Jazz Band</p>

      <p>Homepage: <a href="http://www.kraiberg-jazz-band.de">www.kraiberg-jazz-band.de</a> (hier gibt es auch Hörproben aus beiden CD's)<br />
        e-mail : <span class="email"><?php echo killmail("kjb@neusob.de"); ?></span>”</p>
    </blockquote>

    <p>Die regionale Szene schläft also nicht! Aktiv werden kann sowieso jeder Jazzmusiker, indem er mitmacht bei der ...</p>

    <hr />

    <h5>9. Neuauflage der Jam-Sessions im Diagonal jeden 3. Sonntag im Monat unter Leitung von Tom Diewock</h5>

    <p>Es wurde ja zuletzt viel diskutiert über die Sessions und nach einigen Gesprächen kamen folgende Ergebnisse heraus:</p>

    <ul>
      <li>Tom Diewock ist ab sofort als Sessionleiter für diese Jam-Reihe verantwortlich</li>
      <li>Er stellt auch die Sessionband zusammen</li>
      <li>Als alleiniger Spielort ist ab sofort das Diagonal auserkoren</li>
      <li>ebenso sollen die Sessions stets am 3. Sonntag im Monat stattfinden, falls es terminlich im Diagonal geht</li>
      <li>Beginn ist gegen 19 Uhr</li>
      <li>nur im August (Sommerpause) und Oktober (sowieso Jazztage mit Late Night Jam Sessions im Hotel Ambassador) wird pausiert</li>
      <li>Grundlage der Jams sind die Real Books. Sind übrigens käuflich bei Nick in music-in (Tränktorstr. 15) zu erwerben. Lohnt sich!!</li>
    </ul>

    <p>Als vorläufige Termine sind eingeplant (Änderungen noch vorbehalten!):</p>

    <ul>
      <li>20. Juni</li>
      <li>18. Juli</li>
      <li>19. September</li>
      <li>4. / 5. / 6. November Jam Sessions mit der Late Night Band stets gegen Mitternacht im NH Hotel Ambassador</li>
      <li>21. November</li>
      <li>19. Dezember (X-Mas-Session)</li>
    </ul>

    <p>Die X-Mas-Session soll wieder mit Kerstin Schulz am Gesang stattfinden, wie in den letzten Jahren bewährt. Apropos Gesang. Vor kurzem erhielt ich einen musikalischen Hilferuf, denn die ...</p>

    <hr />

    <h5>10. Gesangsformation “The Voice Connection” sucht dringend tiefen Bass</h5>

    <p>Thomas Klaschka, Kopf der A-Cappella-Gruppe (Wise Guys lassen grüßen!) mailte mich an:</p>

    <blockquote>
      <p>“Hallo Robert,</p>

      <p>ich komme heute mit einem großen Anliegen zu dir. Vielleicht hast du es ja schon mitbekommen: Der tiefe Bass unserer Voice Connection verlässt uns im Juni aus beruflichen Gründen und geht nach Italien. So sehr wir ihm das persönlich wünschen, es ist doch ein riesiger Verlust für unsere Gruppe. Und wir brauchen dringend Ersatz, der sofort Zeit hat, solistisch ambitioniert ist, über genügend Erfahrung besitzt und auch die nötigen Qualitäten hat - du kennst uns ja. Hast du für mich eventuell konkrete Vorschläge, Namen? Oder kannst du mich an jemanden weiter vermitteln, der uns da helfen kann?</p>

      <p>Ich bin für jede Hilfe dankbar, auch wenn das weiter publik gemacht wird.</p>

      <p>Ganz liebe Grüße und noch eine erholsame zweite Ferienwoche</p>

      <p>Thomas”</p>
    </blockquote>

    <p>Infos zur Gruppe gibt’s unter <a href="http://www.the-voice-connection.de/start">http://www.the-voice-connection.de/start</a><br />
      Und noch jemanden soll geholfen werden, denn es wird ebenfalls ...</p>

    <hr />

    <h5>11. Gesucht: Band für die Schreiner-Freisprechungsfeier am 29.07.2010 in Ingolstadt</h5>

    <p>Heri Mayr, ein Jazzkenner erster Güte und begnadeter Schreiner, wünscht sich:</p>

    <blockquote>
      <p>Hallo Robert,<br />
        ich hätte wieder eine Anfrage der Schreinerinnung für eine Band zur musikalischen Begleitung der Freisprechungsfeier am 29.07.2010 in Ingolstadt. 4- 5 Stücke.<br />
        Hast du was für mich?<br />
        Heri</p>

      <p>Heribert Mayr, Schreinerei<br />
        Ingolstädter Str. 27 85077 Manching<br />
        Tel. 08459 915 Fax 08459 7267<br />
        <a href="http://www.h-mayr.de">www.h-mayr.de</a>
      </p>
    </blockquote>

    <p>Und eine gute Bezahlung ist auch gesichert. Dazu aber bitte Heri deswegen direkt kontaktieren. Und zu guter Letzt gibt es noch die ...</p>

    <hr />

    <h5>12. Ausschreibung Treffen Junge Musik-Szene 11. bis 15.11.2010 in Berlin</h5>

    <p>Was ich im Internet gefunden habe und für Nachwuchsbands sicherlich interessant ist:</p>

    <blockquote>
      <p>“Zum 27. Mal findet in Berlin vom 11. bis 15. November 2010 das „Treffen Junge Musik-Szene“ statt.</p>

      <p>Die Teilnehmerinnen und Teilnehmer werden im Rahmen des 27. Bundeswettbewerbs „Treffen Junge Musik-Szene“ ermittelt. Dieser Wettbewerb wird alljährlich vom Bundesministerium für Bildung und Forschung zur Förderung junger Talente gefördert und von den Kulturveranstaltungen des Bundes in Berlin GmbH, Geschäftsbereich Berliner Festspiele, organisiert und durchgeführt.</p>

      <p>Im Kuratorium des Wettbewerbs wirken zusammen: Vertreter der Kultusbehörden verschiedener Bundesländer, des Verbands Deutscher Schulmusiker e. V., der Bundesvereinigung Kulturelle Kinder- und Jugendbildung e. V. (BKJ), des Verbands deutscher Musikschulen e. V. und der Pop-Akademie Baden-Württemberg GmbH. Die Preisträger-Auswahl trifft eine unabhängige Experten-Jury.</p>

      <p>Zur Teilnahme am Bundeswettbewerb sind Kinder und Jugendliche aller Schularten und Ausbildungswege im Alter von 10 bis 21 Jahren eingeladen. Der Wettbewerb ist offen für Bands und Einzelinterpretinnen und –interpreten.</p>

      <p>Die Bewerbungsunterlagen können angefordert werden bei: www.treffen-junge-musik-szene.de</p>

      <p>Berliner Festspiele<br />
        Treffen Junge Musik-Szene<br />
        Schaperstraße 24<br />
        10719 Berlin<br />
        Tel. 030 – 254 89 213<br />
        Fax 030 – 254 89 132<br />
        <span class="email"><?php echo killmail("jugendwettbewerbe@berlinerfestspiele.de") ?></span><br />
        www.berlinerfestspiele.de
      </p>

      <p>Der ausgefüllte Bewerbungsbogen ist zusammen mit einer Demo-CD mit maximal drei Musikbeiträgen und den Texten der Stücke bis zum 31.07.2010 einzureichen. Preis des Wettbewerbs ist die Teilnahme am Treffen mit öffentlichem Konzert aller Preisträgerinnen und Preisträger, an Experten-Workshops und am umfangreichen Rahmenprogramm.”</p>
    </blockquote>

    <p>Uff! Geschafft! Aber: Der Jazz lebt in der Region. Quod erat demonstrandum!</p>

    <p>See you soon?!</p>

    <div class="signum">Robert Aichner</div>

    <div style="font-size:90%">
      <p>PS: Übrigens: Der Organisationskern des Jazzvereins trifft sich diesen Dienstag (8.6.) um 8.30 Uhr im Hotel Rappensberger zur Besprechung. Wer also nicht nur lesen will, was im Jazz in der Region so alles los ist, sondern aktiv dabei sein will, kann gerne dazu stoßen.</p>
    </div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach(); ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 35  (24. April 2010)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 35</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 173</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde:</p>
    <p class="red">Jam Session vom 28. Februar 2010</p>
    <p class="emboss red"><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=JS_20100228&amp;page=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=JS_20100228&amp;page=1</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Im Überblick die Acts der letzten Wochen</li>
      <li>Jazztermine der nächsten Monate</li>
      <li>Das 5. Summer Jazz Open Air vom 3. - 4. Juli im Hotel Rappensberger</li>
      <li>Big Band Workshop für die Ingolstädter Jazzjugend vom 2. bis 4. Juli 2010 mit Harald Rüschenbaum</li>
      <li>Mallorca-Music-In-Kurs Ende Mai und Anfang Juni 2010</li>
      <li>Tim Allhoff mit seinem Trio gewinnt den “Neuen Deutschen Jazzpreis” 2010</li>
      <li>Die neue Konzertreihe für die Region 10: music in ... concerts</li>
      <li>Jazzgitarre zum Verkauf</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>25.04.2010</td>
        <td>19.00 Uhr</td>
        <td>12. Young Jazz Players Session (Jazzclub Birdland Neuburg)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>11.05.2010</td>
        <td>20.00 Uhr</td>
        <td>George Duke Band (Diagonal)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>08.06.2010</td>
        <td>20.00 Uhr</td>
        <td>Hazmat Modine (Diagonal)</td>
      </tr>
      <tr>
        <td>Fr-So</td>
        <td>2.-4.07.2010</td>
        <td>&nbsp;</td>
        <td>Big Band Workshop mit Harald Rüschenbaum (Reuchlin-Gymnasium)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>03.07.2010</td>
        <td>18.00 Uhr</td>
        <td>5. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>04.07.2010</td>
        <td>10.30 Uhr</td>
        <td>5. Summer Jazz Open Air mit Big Band Matinee (Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>12.02.2011</td>
        <td>18.00 Uhr</td>
        <td>2. Big Band Nacht der Ingolstädter Schulen</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">17. Oktober – 7. November 2009: 27. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Ich bin wieder da! Hat schon etwas lange gedauert, bis ich wieder aus Versenkung aufgetaucht bin, aber es gab so viel zu tun ... Macht nichts: Um ein Haus, ein tolles Schulkonzert und ein wunderbares Schulpartnerschaftsjubiläum reicher kehrt schön langsam wieder Normalität in den Laden ein ... Wie man an den Terminen sieht, wird auch wieder einiges geboten, aber zunächst was bisher geschah ...</p>

    <h5>1. Im Überblick die Acts der letzten Wochen</h5>

    <p>Wenn ich mich so recht entsinne, war ich mit meinen Jazzlettern Ende Januar stehen geblieben, ähem ... Seitdem hatten wir</p>

    <ul>
      <li>eine Jahreshauptversammlung des Jazzvereins mit vielen Ergebnissen (Hat jedes Vereinsmitglied das Protokoll erhalten??)</li>
      <li>ein geniales Konzert mit Funklegende Pee Wee Ellis im Audiforum (“We felt good”!! Many Thanks, Manfred Rehm vom Birdland!!)</li>
      <li>eine tolle Jazz-Session unter Leitung von Tom Diewock mit einigen Jazzern am Instrument, die nach einer Fortführung lechzt (Machs nochmal Tom!!)</li>
      <li>eine irre Perfomance des Moscow Art Trios als Bonuskonzert (Es kommt Leben ins Diagonal!!)</li>
      <li>ein Wahnsinnskonzert mit Bill Evans &amp; Friends (“That’s it”!! Weiter so lieber Franz Werthmann &amp; Jan Rottau!!!)</li>
    </ul>

    <p>Viel regionale Aktivität im Jazz &amp; eine unglaubliche Dichte an Jazz-Megastars! Und es geht noch weiter. Die kommenden... </p>

    <hr />

    <h5>2. Jazztermine der nächsten Monate</h5>

    <p>An diesem Wochenende zum 2. Mal im Jazzclub Birdland</p>

    <ul>
      <li>So 25.04. &nbsp; &nbsp; 12. Young Jazz Players Session im Jazzclub Birdland (Neuburg) ab 19 Uhr</li>
    </ul>

    <p>Dank Manfred Rehm vom Birdland gastieren unsere Nachwuchsjazzer erneut in den heiligen Hallen des Jazz in der Region. Mit dabei diesmal: Der “Jazz Club” vom Gnadenthal Gymnasium, die Band “Supersonic” (hervorgegangen aus den Jazz Players des Katharinen-Gymnasiums), die “Jazz GmbH” und die “Jazz GmbH junior” vom Reuchlin-Gymnasium, “ The Jazz Five” (die jüngste Jazzband der Region) und ... Alle, die sich jung fühlen und mitjammen wollen, denn Gäste sind mehr als erwünscht!! Also ran ans Gerät und Ohren auf am Sonntag!!</p>

    <p>Dann beehrt schon wieder ein Superstar des Jazz Ingolstadt: Am 11. Mai 2010 um 20 Uhr gibt George Duke sein Debüt im Diagonal! Mensch, das ist der Hammer!! Nach Bill Evans sofort der nächste Meilenstein des Jazz bei uns. Das Diagonal wird wieder brodeln, wie wir es uns nur wünschen können. Noch ganz schnell Karten sichern, denn es ist jetzt schon denkbar knapp bei den Plätzen!</p>

    <p>Am Dienstag 8. Juni dann gastiert Hazmat Modine an gleicher Stelle um 20 Uhr. Und noch ein Kracher ist für den Herbst geplant. Clubkonzerte at his best! Das ist die Zukunft! Regional bieten wir von den Jazzfreunden aber auch wie jedes Jahr ein Highlight ...</p>

    <hr />

    <h5>3. Das 5. Summer Jazz Open Air vom 3. - 4. Juli im Hotel Rappensberger</h5>

    <p>Was wären wir ohne Stefan Wild vom Hotel Rappensberger!? Wo andere sparen (Crisis, what crisis?) investiert unser stellvertretende Vorstand Stefan weiter in die Jazzszene und holt wie jedes Jahr die Stars der Jazzregion in sein Hotel: Diesmal verbinden wir klug die Fußball-WM mit dem Summer Jazz Open Air und lassen das kleine kostenlose Festival erst am Samstag, den 3. Juli anlaufen, da sollte nämlich Deutschland bereits Argentinien im Viertelfinale von 16 – 18 Uhr samstags geschlagen haben (hehe, mal sehen ob ich Recht behalte ... ). Dann können wir uns doch ganz beruhigt zurücklehnen und Folgendem im Innenhof des Hotels Rappensberger (übrigens auch bei Regenwetter wegen einer Überdachungslösung) lauschen:</p>

    <ul>
      <li>18 Uhr Bernhard Hollinger Group (“Ingolstadt muss sich da warm anziehen” O-Ton Berni!)</li>
      <li>gegen 20.30 Uhr Abba Mobil um unseren Percussion-Hero Charly Böck</li>
    </ul>

    <p>Den Sonntag 4. Juli gönnen wir ab 10.30 Uhr unseren Big Bands der Region, denn es spielen (Stand April 2010) bisher bei unserer Big Band Matinee, von hinten herein gelesen:</p>

    <ul>
      <li>14 Uhr die Big Band der Simon-Mayr-Musikschule (Ltg. Franz Zäch)</li>
      <li>13 Uhr die Big Band des Christoph-Scheiner-Gymnasiums (Ltg. Christine Roß)</li>
      <li>12 Uhr die Big Band des Reuchlin-Gymnasiums (Ltg. meine Wenigkeit)</li>
      <li>11 Uhr höchstwahrscheinlich die Big Band des Gnadenthal-Gymnasiums (Ltg. Wolfgang Riffelmacher)</li>
      <li>10.30 Uhr die Workshop Big Band (Ltg. Harald Rüschenbaum)</li>
    </ul>

    <p>Workshop Big Band? Welche Workshop Big Band? Die wird sich finden beim ...</p>

    <hr />

    <h5>4. Big Band Workshop für die Ingolstädter Jazzjugend vom 2. bis 4. Juli 2010 mit Harald Rüschenbaum</h5>

    <p>In der Tat: Harald is back! Nach einem fulminanten und begeisternden Big Band Workshop bei den Jazztagen 2007 im Gnadenthal-Gymnasium konnten wir den rastlosen Leiter des Landesjugendjazzorchesters Bayern Harald Rüschenbaum endlich wieder gewinnen, mit unseren Jazzjugendlichen ab Freitag den 2. Juli über den ganzen Samstag (3. Juli) hinweg bis zur Big Band Matinee am Sonntag 4. Juli im Reuchlin-Gymnasium zu arbeiten. Wer ihn kennt, weiß was das heißt: Energie pur! Interessenten können sich bereits unverbindlich bei mir melden. Übrigens: Das mögliche Viertelfinalspiel mit deutscher Beteiligung wird natürlich gemeinsam während des Workshops angeschaut. So viel Sport darf sein ... Genaue Infos demnächst, wenn die Organisation steht. Die ist bereits perfekt beim ...</p>

    <hr />

    <h5>5. Mallorca-Music-In-Kurs Ende Mai und Anfang Juni 2010</h5>

    <p>
      Jedes Jahr bietet Nick von music-in (aktives Vereinsmitglied von der 1. Stunde an!) die Möglichkeit in relaxter Atmosphäre am Mittelmeer (diesmal Mallorca) dem Geheimnis des Groove in der Musik auf die Spur zukommen? Interesse? Dann hier mal reinschauen:</p>

    <p><a href="http://formentera.music-in.de/formentera_buchen.php">http://formentera.music-in.de/formentera_buchen.php</a></p>

    <p>Nur soviel:</p>

    <ul>
      <li>vom 24.05.2010 - 28.05.2010 gibt es den Kurs “Jazz Gitarre” (siehe Anhang “Jazzgitarre) mit Hans "Yankee" Meier (auch für Bass), ebenso Rumba- und Flamencogitarre mit Sascha Gerofejeff und Gitarre Gesang Groove mit Klaus Rohls</li>
      <li>vom 31.05.2010 - 04.06.2010 steht auf dem Programm: “Blues Gitarre” mit Charly Hoernemann (auch für Bass), Gesang mit Conny Kreitmeier, Rock Bass mit Martin Engelien, Percussion mit Roman Seehon und dazu Yoga mit Inga Heckmann</li>
    </ul>

    <p>Kann sein, dass mittlerweile schon alle Plätze ausgebucht sind? Also schnell handeln und dabei sein. Ganz vorne dabei ist mittlerweile ein Mann, ein “Rising Star” des deutschen Jazz und er weilt mitten unter uns als musikalischer Leiter des Theaters Ingolstadt und gewinnt nebenbei noch nationale Preise ...</p>

    <hr />

    <h5>6. Tim Allhoff mit seinem Trio gewinnt den “Neuen Deutschen Jazzpreis” 2010</h5>

    <p>Dazu schreibt der informative Stadtnewsletter Ingolstadt (guter Tipp: immer aktuell informiert. Da kann man sich ihn holen <a href="http://www2.ingolstadt.de/index.phtml?NavID=465.23&amp;AID=1337&amp;RID">http://www2.ingolstadt.de/index.phtml?NavID=465.23&amp;AID=1337&amp;RID</a>):</p>

    <blockquote>
      <p>“Mehr als 500 Zuschauer wählten Mitte März nach drei hochklassigen Konzerten in Mannheim den Gewinner des MVV-Energie Bandpreises, der mit 10.000 Euro dotiert ist.<br />
        In einer spannenden Entscheidung konnte das als letzte an den Start gehende Trio des Augsburger Pianisten und musikalischen Leiters des Theaters Ingolstadt, Tim Allhoff, mit den Münchnern Bastian Jütte (Drums) und Andreas Kurz (Kontrabass), das Publikum für sich gewinnen. Mit „eingängigen Ohrwurm-Themen und überschäumender Fabulierlust“ überzeugte er ebenso wie „mit leichter Hand und perkussivem Elan“. Damit erhob sich der Pianist zu „solistischen Höhenflügen, die er mit kontrapunktischen Linien erdete. Die Spiellaune der Drei begeisterte.“ (Mannheimer Morgen, 15.3.2010). Mehr als 200 Bands aus ganz Deutschland hatten sich um den „Neuen Deutschen Jazzpreis“ beworben. Es ist der höchstdotierte Preis für professionelle deutsche Jazzbands und der einzige Preis, der direkt vom Publikum gewählt wird. Aus den Bewerbern suchte der diesjährige Kurator, der legendäre Trompeter Kenny Wheeler, die drei Bands aus, die sich am 13. März in Mannheim dem Votum des Publikums stellten. Das „Tim Allhoff Trio“ begeisterte bereits Anfang März mit einem CD-Release-Konzert des im Februar erschienenen Debut-Albums „Prelude“ das Ingolstädter Publikum.”</p>
    </blockquote>

    <p>In der Tat: Tim Allhoff wird noch viel von sich reden machen und wir sind mächtig froh, dass er zu uns nach Ingolstadt gekommen ist! Mächtig stolz macht mich auch ein neue Konzertreihe im Swept Away, die Nick von music-in mit initiiert hat:</p>

    <hr />

    <h5>7. Die neue Konzertreihe für die Region 10: music in ... concerts</h5>

    <p>Wir Jazzer sind ja von Natur aus jeglichen ehrlichen Musikstilen aufgeschlossen. So ist es für den Jazzletter selbstverständlich, dass er Nicks Initiative anpreist:</p>

    <blockquote>
      <p>“Hallo liebe Musikkonsumenten,</p>

      <p>ab heute startet an jedem Donnerstag die neue Konzertreihe für die Region 10: music in...concerts. Siehe Konzept und Flyer im Anhang! Das Ganze findet im Swept Away in der Donaustraße 14 statt. Einlass ist ab 19:oo Uhr, Start ist um 20:oo Uhr, der Eintrittspreis beträgt jeweils Euro 8.-. Also kommt jeden Donnerstag in Scharen und unterstützt die Ingolstädter Bandszene!!!</p>

      <p>Long live Rock'n Roll (und Funk, Soul, Reggae, Blues, Country, Jazz etc...)</p>

      <p>Nick”</p>
    </blockquote>

    <p>Dann mal prima Start Nick! Ich bin gleich am Ende. Fehlt nur noch die </p>

    <hr />

    <h5>8. Jazzgitarre zum Verkauf</h5>

    <p>Obs wirklich eine Jazzgitarre ist, mögen die Fachkundigen anhand der Fotos G1-4 beurteilen. Sieht jedenfalls stylish aus und der Preis passt doch auch, oder? Aber das soll Herr Christian Friedrich in seiner Mail selbst anpreisen:</p>

    <blockquote>
      <p>“ ... anbei ein paar Bilder der Gitarre meiner Frau. VB 150.-€ Bei Interesse würden wir uns über ein Feeback freuen.</p>

      <p>Mit freundlichen Grüßen,<br />
        Christian Friedrich”</p>
    </blockquote>


    <p>Dann hätte ich es endlich wieder geschafft! Der neue Jazzletter geht raus und mit ihm dann der aktuelle Newsletter unseres Partnervereins Birdland. Dort sehen wir uns doch bestimmt diesen Sonntag, oder?</p>

    <p>Bis dahin: Have a nice Spring!</p>

    <div class="signum">Robert Aichner</div>

    <div style="font-size:90%">
      <p>PS: Übrigens: Der Organisationskern des Jazzvereins trifft sich diesen Dienstag um 8.30 Uhr im Hotel Rappensberger zur Besprechung. Wer also nicht nur lesen will, was im Jazz in der Region so alles los ist, sondern aktiv dabei sein will, kann gerne dazu stoßen.</p>
    </div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach(); ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 34  (24. Januar 2010)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 34</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 171</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde:</p>
    <p class="red">Christmas Session vom 20.12.2010!</p>
    <p class="emboss red"><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php">http://www.jazzfreunde-ingolstadt.de/bilder.php</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Workshops des Landesjugendjazzorchesters 2010</li>
      <li>Obacht: Die Termine 2010 der Jazzfreunde kommen!</li>
      <li>Die Jazzreihe im Kleinen Haus des Stadttheaters Ingolstadt</li>
      <li>Funklegende Pee Wee Ellis (Mr. “Chicken”!!) gastiert am 11.2.10 im Audiforum Ingolstadt</li>
      <li>“The Jazz Five” ist mit dabei beim 1. Kinder-Jazz-Festival am letzten Januarwochenende in Leipzig</li>
      <li>Regionale Verzeichnis von Jazzlehrern (instrumental und vokal) im Entstehen</li>
      <li>Sängerin sucht Band</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Samstag</td>
        <td>23.01.2010</td>
        <td>21.00 Uhr</td>
        <td>Claudius Ress Quartett (Kleines Haus, Brückenkopf)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>31.01.2010</td>
        <td>19.00 Uhr</td>
        <td>10. Jam Session (Swept Away) mit den “Seemännern”</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>04.02.2010</td>
        <td>20.00 Uhr</td>
        <td>Jahreshauptversammlung des Vereins der Jazzfreunde (Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>11.02.2010</td>
        <td>20.00 Uhr</td>
        <td>The Pee Wee Ellis Assembly (Audiforum Ingolstadt)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>05.02.2010</td>
        <td>21.00 Uhr</td>
        <td>ETNA (Kleines Haus am Brückenkopf)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>28.02.2010</td>
        <td>19.00 Uhr</td>
        <td>11. Jam-Session der Jazzfreunde (Diagonal): Sessionband wird noch gesucht!</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>18.03.2010</td>
        <td>20.00 Uhr</td>
        <td>Bonuskonzert mit dem “Moscow Art Trio” (Diagonal): freier Eintritt für alle Vereinsmitglieder!</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.04.2010</td>
        <td>19.00 Uhr</td>
        <td>12. Young Jazz Players Session (Jazzclub Birdland Neuburg)</td>
      </tr>
    </table>

    <p>In Planung Freitag bis Sonntag 2. bis 4. Juli 2010: Summer Jazz Open Air in Kombination mit einem Big Band Workshop im Reuchlin-Gymnasium mit Harald Rüschenbaum (Leiter des bayerischen Landesjugendjazzorchesters)</p>

    <hr />

    <p class="emboss" style="color:#00c000;">17. Oktober – 7. November 2009: 27. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Spätabends sitze ich hier in der Musikakademie in Marktoberdorf – tief verschneites Allgäu – und habe noch die fantastischen Klänge des Landesjugendjazzorchesters Bayern unter der Leitung von Harald Rüschenbaum im Ohr: 1a Qualität!! Und: der BR hat es für eine TV-Sendung (BR3) mitgeschnitten. Wer will darf sich also selbst im Fernsehen (leider aber erst im Oktober) überzeugen, wie die Spitze des Jazznachwuchses Bayern auftrumpft. Und wer will, darf sich auch anmelden zu den ...</p>

    <h5>1. Workshops des Landesjugendjazzorchesters 2010</h5>

    <p>“Jugend jazzt”, so das Motto und auch die gleichnamige Workshopreihe des Landesjugendjazzorchesters, bei der hauptsächlich jugendliche Jazzhungrige professionelle Unterstützung erfahren. Auch 2010 gibt es einige Workshops von “Jugend jazzt”, wo sich unsere regionalen Nachwuchsjazzer, aber auch Jazzpädagogen Anregungen holen können (Details unter <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen.html</a>):</p>

    <table border="0" cellspacing="8" cellpadding="2">
      <tr>
        <td class="nobreak" valign="top">Fr 03.03.10 – So 05.03.2010</td>
        <td valign="top">Workshop “Combo kicks” in Marktoberdorf (für bereits bestehende Bands: intensives Coaching!)</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Di 06.04.10 – Sa 10.04.2010</td>
        <td valign="top">Workshop “Jazz juniors” in Rügheim/Hofheim (für jazzinteressierte Jugendliche der ideale Kurs!)</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Mi 04.08.10 – So 08.08.2010</td>
        <td valign="top">Workshop “Jazz juniors” in Alteglofsheim (für jazzinteressierte Jugendliche der ideale Kurs!)</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Mi 04.08.10 – So 08.08.2010</td>
        <td valign="top">Workshop “Know how für Big &amp; Jazz” in Alteglofsheim (hier sind v.a. Erwachsene angesprochen, die eine Jazzband leiten)</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Mo 01.11.10 – Fr 05.11.2010</td>
        <td valign="top">Workshop “Jazz juniors” in Marktoberdorf (für jazzinteressierte Jugendliche der ideale Kurs!)</td>
      </tr>
    </table>

    <p>“Jugend jazzt” bietet jedoch nicht nur Kurse an, sondern die Vereinigung organisiert auch jedes Jahr einen bayernweiten Wettbewerb für Big Bands und Combos. Im Dezember 2009 stellten sich die Big Bands der Jury-Meinung, und da schlug sich die Reuchlin-Big-Band unter meiner Leitung ziemlich gut: Wir ergatterten den 2. Preis in unserer Alterskategorie (bis Durchschnittsalter 14 Jahre). Infos und Bilder hierzu findet man unter</p>

    <p><a href="http://www.ljjb.de/jugend_jazzt_landeswettbewerb/wettbewerb.html">http://www.ljjb.de/jugend_jazzt_landeswettbewerb/wettbewerb.html</a></p>

    <p>Dieses Jahr im Dezember sind die Combos an der Reihe! Das wäre doch eine gute Bewährungsprobe für einige unserer Nachwuchstruppen?? Bei obigen Link gibt es noch mehr Infos zum Contest 2010. Und nicht genug: den Dreiklang von “Jugend jazzt” komplettiert das “Landesjugendjazzorchester” unter der Leitung von Harald Rüschenbaum, bei dem jazztalentierte Jugendliche mitmachen können. Voraussetzung hierfür ist ein Vorspiel, das am Besten innerhalb eines oben genannten Kurses stattfinden sollte. Also: Wer da mitspielen will, meldet sich am Besten bei einem der Workshops an, füllt im Voraus den Bewerbungsbogen (siehe <a href="http://www.ljjb.de/uploads/media/bewerbungsbogen-ljjb_09-2006.pdf">http://www.ljjb.de/uploads/media/bewerbungsbogen-ljjb_09-2006.pdf</a>) aus und übt fleißig den einen oder anderen Standard sowie Blattspielen, denn neben dem letztgenannten wird man in der Prüfung zusammen mit einer vom Landesjugendjazzorchester gestellten Rhythmusgruppe ein paar Standards vorspielen mit Improvisation. Falls jetzt jemand an solch ein Vorspiel denkt, kann er sich auch gerne mit mir in Verbindung setzten, denn ich stehe in regem Austausch mit “Jugend jazzt”. Und ganz allein aus der Region wird man auch nicht sein, denn schon Simon Seidl, Bernhard Hollinger, Carsten Fuss, Matthias Hetzter, Ferdinand Reitberger und Martin Schütz waren und sind dabei! Freilich freuen wir uns, wenn viele aus der Region da mitmischen: Bleibt aber den Veranstaltungen der Jazzfreunde in eurer Heimatstadt noch treu, denn auch in diesem Jahr ist wieder jede Menge geboten, denn seit kurzem heißt es ...</p>

    <hr />

    <h5>2. Obacht: Die Termine 2010 der Jazzfreunde kommen!</h5>

    <p>Wer bei einem Blick auf die Homepage der Jazzfreunde dachte, 2010 wird ein maues Jahr, der hat sich gründlich getäuscht, denn im Hintergrund wurde fleißig am Jahr 2010 gebastelt und nun können wir voller Stolz einige Termine für die kommenden Monate verkünden. Also los geht’s:</p>

    <table border="0" cellspacing="8" cellpadding="2">
      <tr>
        <td class="nobreak" valign="top">So 31.01.</td>
        <td valign="top">10. Jam-Session der Jazzfreunde ab 19 Uhr im Swept Away mit den “Seemännern”, eine Combo mit Manfred See, Bass; Markus Bergmann, Saxophon; Steffen Mayer, Piano; Jörg Konz, Schlagzeug</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Do 04.02.</td>
        <td valign="top">Jahreshauptversammlung des Vereins der Jazzfreunde um 20 Uhr im Hotel Rappensberger</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">So 28.02.</td>
        <td valign="top">11. Jam-Session der Jazzfreunde ab 19 Uhr im Diagonal (Sessionband wird noch gesucht!)</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Do 18.03.</td>
        <td valign="top">Bonuskonzert mit dem “Moscow Art Trio” 20 Uhr im Diagonal (freier Eintritt für alle Vereinsmitglieder!)</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">So 25.04.</td>
        <td valign="top">12. Young Jazz Players Session im Jazzclub Birdland (Neuburg) ab 19 Uhr</td>
      </tr>
      <tr>
        <td class="nobreak" valign="top">Fr-So 2.-4.7.</td>
        <td valign="top">in Planung: Summer Jazz Open Air in Kombination mit einem Big Band Workshop mit Harald Rüschenbaum</td>
      </tr>
    </table>

    <p>Und als alljährliches Highlight:</p>

    <p><strong>17. Oktober – 7. November: Die 27. Ingolstädter Jazztage</strong></p>

    <p>Nebenbei laufen noch weitere tolle Jazzevents in der Region, die wir als Jazzfreunde stets gerne in unserem Newsletter ankündigen, so z.B. ...</p>

    <hr />

    <h5>3. Die Jazzreihe im Kleinen Haus des Stadttheaters Ingolstadt</h5>

    <p>Kurzfristig erreichte mich ein Mail, in dem die sehr hörenswerte Reihe “Kleine Hausmusik” angekündigt wird. Julia Mayr vom Organisationsteam des Kleinen Hauses initiiert dort Jazzkonzerte mit überregionalen Stars, die unsere Jazzszene neben dem Jazzclub Birdland und der Clubkonzertreihe im Diagonal bereichert. Da wächst tatsächlich ein drittes kontinuierliches Jazzstandbein heran! Am Freitag, 5.2.10 wäre dort (gegenüber der Sing- und Musikschule am Brückenkopf) um 21 Uhr ETNA mit ihrem Programm “Waiting for the Sun” im Rahmen einer CD Präsentation zu hören. </p>

    <blockquote>
      <p>“Etna wurde auf Initiative des Gitarristen Grizelj und unterstützt durch vulkanische Aktivitäten des Namensgebers Ätna im Sommer 2002 gegründet. Auf der Suche nach einem neuen Stilkleid für bereits entstandene Kompositionen von Hermenau und Grizelj gelang es Etna bereits in ihren Anfängen, die kreativen Quellen jedes Bandmitgliedes zur Formung eines homogenen und eigenständigen Bandsounds zu nutzen. Beflügelt und ermutigt durch den Gewinn des Wettbewerbs Jugend Jazzt 2002 und eine ebenso erfolgreiche Teilnahme am internationalen Nachwuchswettbewerb New Generation entstanden neue Kompositionen. Zumeist inspiriert durch die Symbiose verschiedener musikalischer Hintergründe wurde die stilistische Vielfalt zum kompositorischen Hauptmotiv der Band. Im Modern Jazz verwurzelt öffnet sich Etna dem weiten Spektrum grooviger Beats - Afro, Funk, Rock bis hin zu expressiven Balkanrhythmen. Klassische Harmoniefolgen in Grizeljs Kompositionen verweben sich mit melodiösen Liedern Andrea Hermenaus zu einem unüberhörbaren Klangnetz, getragen von den kraftvollen und tänzerischen Basslinien von Yvo Fischer. Mit ihrer im Herbst 2005 veröffentlichen CD Tauwetter und den inzwischen über 150 gemeinsamen Auftritten, blickt Etna auf eine blühende Publikumslandschaft und fantastische Konzerterlebnisse zurück. Mit der für Herbst 2009 geplanten Veröffentlichung der 2. CD waiting for the sun beim renommierten Plattenlabel GLM-Music beendet Etna die wunderbare Zusammenarbeit mit dem Schlagzeuger Manuel Da Coll, zu welcher als unvergessliches Highlight auch die Konzertreihe mit der österreichischen Saxophonlegende Heinz von Hermann gehört. Seit Juni 2008 erfreut sich Etna an der Bereicherung durch den neuen Schlagzeuger Tobias Weber, dessen Fähigkeit und Mut, der Musik spontane Richtungswechsel zu geben, zur neuen Klangspannung der gesamten Band führt.”</p>
    </blockquote>

    <p>Das klingt doch viel versprechend! Und wer kurz darauf am Unsinnigen Donnerstag Sinnvolles im Sinn hat, dem bleibt nichts anderes übrig, als eine Jazzlegende im Audiforum zu genießen. Warum? Es ist kaum zu glauben, aber wahr: Die ...</p>

    <hr />

    <h5>4. Funklegende Pee Wee Ellis (Mr. “The Chicken”!!) gastiert am 11.2.10 im Audiforum Ingolstadt</h5>

    <p>Manfred Rehm vom Jazzclub Birdland schafft es doch tatsächlich immer wieder die absoluten internationalen Topstars ins Audiforum zu holen. So gastiert am</p>

    <ul>
      <li>Donnerstag, 11. Februar 2010 um 20.00 Uhr die Funk-Legende Pee Wee Ellis mit seiner Band im Audiforum, und am</li>
    </ul>

    <p>Hier der Text aus dem Programmheft des Birdlands zu Pee Wee Ellis:</p>

    <blockquote>
      <p>“Das Original: Zusammen mit Maceo Parker und Fred Wesley bildete Alfred „Pee Wee“ Ellis die JB Horns. Damals, in den 1960ern, nannte sich James Brown „Godfather“, inszenierte mit „seinen“ JB Horns ekstatische Bühnenshows und brachte die Funk-Revolution auf den Weg. Aber eigentlich war es Pee Wee Ellis, der mit seiner Arrangierkunst Nummern wie „Cold Sweat“ oder „Say It Loud, I’m Black, I’m Proud“ erst den Status von Hits verlieh. Wer Ellis’ Rolle bei James Brown retrospektiv auf die des Saxofonisten reduziert, der verschließt die Augen vor den Tatsachen. Seine Jazz-Roots (in den 1950ern nahm er Unterricht bei Sonny Rollins) trotz Engagements bei George Clinton, Blood, Sweat &amp; Tears, Van Morrison, Rod Stewart und Tom Jones hat der heute 68-Jährige nie verleugnet. Ellis’ Einzigartigkeit liegt gerade darin, das Raffinement des Jazz mit der Exaltiertheit des Soul und des Funk zusammenzuführen, egal in welcher Besetzungsgröße er auftritt. Im Audi Forum Ingolstadt leisten ihm dabei unter anderem die langjährige James Brown-Sängerin Martha High sowie der Münchner Drummer Guido May tatkräftigen Beistand. Trotz kühler Außentemperaturen sei den Besuchern an diesem Abend luftige Kleidung empfohlen. Denn Pee Wees funkifizierter Soul-Jazz ist heiß, lässig, sexy, rauschhaft – und groovt, groovt, groovt.</p>
      <p>Reservierung unter: <a href="http://www.birdland.de/platzreservierung">www.birdland.de/platzreservierung</a>”</p>
    </blockquote>

    <p>Wem das noch nicht genug ist, hier der ultimative Grund: (Young Jazz Players aufgepasst): Von Pee Wee Ellis stammt die legendäre Funknummer “The Chicken”!!! Da sollten doch unsere Youngsters in Scharen hineinströmen, falls der Fasching sie lässt. Apropos Youngsters: die jüngste - wie ich vermute - Jazzband der Region hat demnächst eine große Ehre, denn ...</p>

    <hr />

    <h5>5. “The Jazz Five” ist mit dabei beim 1. Kinder-Jazz-Festival am letzten Januarwochenende in Leipzig</h5>

    <p>Noch gar nicht 1 Jahr alt (die Band natürlich ;-) ) wagen sich:</p>

    <ul>
      <li>Franz Rottenkolber, Bass</li>
      <li>Jonas Sebald, Drums</li>
      <li>Benni Löhlein, Tenorsax &amp; Clarinet</li>
      <li>Max Grell, Gitarre</li>
      <li>Martin Schütz, Piano</li>
    </ul>

    <p>in die weite Welt. Die 12- bis 16-jährigen – alle begeisterte “The Chicken”-Spieler – haben einen halbstündigen Auftritt am Samstag 30. Januar beim 1. bundesweiten Kinderjazzfestival am 29. und 30.1.2010 Leipzig ergattert! Glückwunsch Jungs!! Wir sind stolz auf euch!! Neben den gängigen Young-Jazz-Players-Standards haben die 5 auch 2 selbst komponierte Tunes im Gepäck: die “Keplerischen Gesetze” und den “Pseudo Blues”! Hut ab und weiter so! Am besten sich gleich für das Bandcoaching von “Jugend jazzt” (“Combo kicks”) am 5. - 7. März 2010 in Marktoberdorf anmelden und dann am Landeswettbewerb in Bayern für Solo & Ensemble von “Jugend jazzt” vom 3. - 5. Dezember 2010 in Marktoberdorf teilnehmen.<br />
      Für das Festival in Leipzig kann man sich auch auf dieser Seite informieren: <a href="http://www.kidsjazz.de/Programm.html">http://www.kidsjazz.de/Programm.html</a>. Da wird auch unser Jazzfreundeverein gebührend erwähnt! Yeah! Unser Nachwuchs macht also auf sich und uns aufmerksam (auch auf der Homepage <a href="http://www.the-jazz-five.de.vu">www.the-jazz-five.de.vu</a> - Daniel, bitte mit unserer Homepage verlinken! Mercy!!). Das lässt sich auch aus den immer mehr werdenden Anfragen bezüglich Jazzlehrern feststellen, die mich persönlich oder per Mail erreichen. Deshalb dachte ich mir, die Zeit wäre jetzt reif für das ...</p>

    <hr />

    <h5>6. Regionale Verzeichnis von Jazzlehrern (instrumental und vokal) im Entstehen</h5>

    <p>Warum nicht? Weshalb zögern? Die Jungen stehen in den Startlöchern und wollen! Die Erfahrenen können ihr angesammeltes Jazzwissen weitergeben! Die Region könnte davon profitieren ...<br />
      Genug geschwärmt: Worum geht es? Meine Email-Adresse wird immer mehr zur Anlaufstelle für jegliche Fragen den Jazz betreffend. Durch meine Arbeit als Lehrer komme ich mit vielen Jugendlichen zusammen und so wird mir öfters die Frage gestellt: “Herr Aichner, kennen sie nicht einen Lehrer für Jazzklavier, - gesang, - improvisation ...?” Ja, sicherlich kenne ich den ein oder anderen, aber wieso nicht alle pädagogischen Lehr-Kräfte, die die Region zur Verfügung hat, bündeln und mögliche Lehrer (instrumental wie vokal) in einer Liste auf der Jazzfreunde-Homepage veröffentlichen (Hallo Daniel! Wieder mal Arbeit für unseren Webmaster, uff!)? Das fehlt uns doch noch. Unser “Jazz.IN- Das Jazzverzeichnis für die Region Ingolstadt”, welches die Jazzbands der Region vereinigt, steht kurz vor dem Abschluss (Danke Katrin Poese, die unermüdlich und unentgeltlich an diesem werkelt!!), da könnten wir doch ... Aber langsam:</p>

    <p>Zunächst bitte ich alle, die sich berufen fühlen jazzinteressierten Instrumentalisten und Sänger(inne)n das Wesen des Jazz (Improvisation, Phrasierung, &amp; Artikulation, Groove &amp; Rhythmik, Skalen, Harmonielehre &amp; Jazzakkorde, Styles ...) in Unterrichtsstunden nahe zu bringen, sich auf der Liste im Anhang einzutragen und mir diese zu mailen. Ich werde die Daten dann zusammentragen, fehlende Instrumente z. T. durch die Mithilfe von “Jugend jazzt” in Bayern, also mit Mitgliedern des Landesjugendorchester oder dessen Dozenten, die in der Region beheimatet sind, aufzufüllen. Ihr könnt mir auch, falls ihr mal einen Jazzworkshop bei uns Jazzfreunden plant, dies extra mitteilen. Die Veröffentlichung auf der Homepage hat noch Zeit! Ebenso nicht ganz so dringend ist folgende Nachfrage, nämlich ...</p>

    <h5>7. Sängerin sucht Band</h5>

    <p>Gabriele Strobl, bekannt als Sängerin des semiprofessionellen Chors “Incanto corale” mailte mir um Weihnachten folgenden Text:</p>

    <blockquote>
      <p>“Hallo Robert,</p>
      <p>ich bin keine Jazzband dennoch suche ich auf meine alten Tage ebensolche<br />
        Semisenioren oder knapp darunter, die noch, wenn sie auch schon einen Sänger<br />
        oder Sängerin haben Zuwachs brauchen. Möchte schon lange was in der Richtung<br />
        machen und jetzt ist allerhöchste Zeit. Wenn Du was weißt würde ich mich über Unterstützung oder Nachricht freuen.”</p>
    </blockquote>

    <hr />

    <p>Dann lassen wir das Neue Jahr weiterhin so elanvoll anrollen, mit tollen Events und jazzpädagogischer Aufrüstung. Einen gelungenen Rutsch hinein ins Jazzjahr 2010 wünscht wie immer</p>

    <div class="signum">Robert Aichner</div>

    <div style="font-size:90%">
      <p>PS: Es gibt wirklich einige Jazzbrennpunkte in Bayern! Was ich noch neben all den tolle Angeboten bei uns in der Region gefunden habe:</p>

      <blockquote>
        <p><strong>30. Internationaler Jazz Workshop in Erlangen</strong><br />
          Der mittlerweile größte Jazzkurs Deutschlands lädt zum 30. mal nach Erlangen ein. Elf renommierte Dozenten decken die Bereiche Gesang, Trompete, Posaune, Saxophon, Gitarre, Klavier, Kontrabass, E-Bass und Schlagzeug ab. Für junge Talente gibt es wieder einige Stipendien.<br />
          Kursleitung: Rainer Glas<br />
          Termin: 03.04.2010 - 10.04.2010<br />
          Ort: Erlangen<br />
          Anmeldung: Projektbüro Jazz Workshops, Telefon 09135-723528<br />
          <a class="red" href="http://www.jazz-workshops.de">www.jazz-workshops.de</a>
        </p>
      </blockquote>
    </div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach(); ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 33  (28. November 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 33</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 171</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde (Jede Menge von den Jazztagen!):</p>
    <p class="emboss red"><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php">http://www.jazzfreunde-ingolstadt.de/bilder.php</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Pressenachlese der 26. Ingolstädter Jazztage</li>
      <li>Ermäßigung von 10 % für Mitglieder des Jazzfreundevereins</li>
      <li>Suchanzeigen von Jazzbands der Region</li>
      <li>Die Spielstätte “kleines haus” des Stadttheaters IN sucht Jazzbands</li>
      <li>Neue Sessiontermine im Jahr 2010</li>
      <li>Der Kunst und Kulturführer für Kinder geht in den Verkauf!</li>
      <li>Mein Weihnachtsdank für 2009 und meine Weihnachtswünsche für 2010</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>06.12.2009</td>
        <td>?</td>
        <td>4 of a kind “A jazzy Christmas” (Kunstscheune Marienheim bei Neuburg)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>11.12.2009</td>
        <td>21.00 Uhr</td>
        <td>Isabell und Adrian (kleines haus Stadttheater Ingolstadt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2009</td>
        <td>20.30 Uhr</td>
        <td>Häns’che Weiss &amp; Vali Meyer – Der König des „Zigeunerjazz“ (Neue Welt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>16.12.2009</td>
        <td>20.00 Uhr</td>
        <td>Charly Böck Latin Project (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">17. Oktober – 7. November 2009: 27. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Die Jazzwelt in Ingolstadt ruht nicht, das hat das phantastische Konzert mit dem Ignacio Berroa Quartett letzten Donnerstag im Diagonal gezeigt. Ein solch brillantes Konzert mit unglaublich harmonierenden Musikern war ein Jazzhochgenuss! So darf, so muss es weitergehen. Aber dafür sorgen schon unsere Kulturgestalter an der Jazzfront im Diagonal, im Birdland und bei den Jazztagen. Auch hier konnte man Perlen der Jazzwelt genießen! Wer sich nochmals in die perfekten 26. Jazztage hineinversetzten will, dem seien die hervorragenden Berichte empfohlen zur ...</p>

    <h5>1. Pressenachlese der 26. Ingolstädter Jazztage</h5>

    <p>Zunächst findet man unter dem ewig langen Link beim Donaukurier so ziemlich alle Zeitungsartikel der Jazztage. Dabei sind auch die Fernsehberichte unseres Lokalsenders IN-TV eingearbeitet, die nach Auskunft von Sabine Roelen von IN-TV sogar ein Jahr abrufbar sind. Und weil ich sie gerade nenne: Vielen vielen herzlichen Dank Sabine und Schorsch, ihrem Kameramann, für die sehr informative, lebendige und bestens gearbeitete Berichterstattung von den Jazztagen!! Da harmoniert wirklich ein klasse Team, das zudem noch ein extra großes Herz für die Jugend hat, wie man dem langem Bericht über die Young Jazz Players entnehmen kann! Das motiviert ungemein bei der Nachwuchsarbeit, wenn man so gut in einem Beitrag gewürdigt wird!!</p>

    <p>Wer nicht lange nach den Fernsehberichten suchen will, der wird direkt bei IN-TV bei folgenden Links fündig:</p>

    <table border="0" cellspacing="8" cellpadding="2">
      <tr>
        <td valign="top">Bernhard Hollinger Group</td>
        <td valign="top">
          <a href="http://intv.de/index.php?option=com_hello&amp;cal=200910&amp;erschtag=19.10.2009&amp;Itemid=41">http://intv.de/index.php?option=com_hello&amp;cal=200910&amp;erschtag=19.10.2009&amp;Itemid=41</a>
        </td>
      </tr>
      <tr>
        <td valign="top">Young Jazz Players</td>
        <td valign="top">
          <a href="http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=04.11.2009&amp;Itemid=41">http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=04.11.2009&amp;Itemid=41</a><br />
          <a href="http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=11.11.2009&amp;Itemid=41">http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=11.11.2009&amp;Itemid=41</a>
        </td>
      </tr>
      <tr>
        <td valign="top">Jazz Party II</td>
        <td valign="top">
          <a href="http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=10.11.2009&amp;Itemid=41">http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=10.11.2009&amp;Itemid=41</a><br />
          <a href="http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=11.11.2009&amp;Itemid=41">http://intv.de/index.php?option=com_hello&amp;cal=200911&amp;erschtag=11.11.2009&amp;Itemid=41</a>
        </td>
      </tr>
      <tr>
        <td valign="top">Für die Donaukurier Berichte</td>
        <td valign="top">
          <a href="http://www.donaukurier.de/archiv/?fs%5Barchivsuche%5D=archivsuche&amp;fs%5Blastsearchedword%5D=&amp;fs%5Bpage%5D=&amp;fs%5Bausgabe%5D=&amp;fs%5Bressort%5D=&amp;fs%5Bnum%5D=10&amp;fs%5Barchivsuche%5D=archivsuche&amp;fs%5Bdates%5D%5Bfromday%5D=01&amp;fs%5Bdates%5D%5Bfrommonth%5D=01&amp;fs%5Bdates%5D%5Bfromyear%5D=2006&amp;fs%5Bdates%5D%5Btoday%5D=&amp;fs%5Bdates%5D%5Btomonth%5D=&amp;fs%5Bdates%5D%5Btoyear%5D=&amp;fs%5Bqall%5D=jazztage&amp;suche.x=0&amp;suche.y=0">http://www.donaukurier.de/archiv/?fs%5Barchivsuche%5D=archivsuche&amp;...&amp;fs%5Bqall%5D=jazztage</a>
        </td>
      </tr>
    </table>

    <p>Da wird einem noch mal ganz warm ums Herz, wenn all die Berichte an einem vorbeiziehen! Deshalb:</p>

    <p>DANKE JAN ROTTAU &amp; SEINEM JAZZTAGE TEAM!! DANKE DEM KULTURAMT &amp; SEINEM LEITER JOSEF GUTMANN!! UND AUF EIN NEUES IM JAHR 2010!!</p>

    <p>Ein großes Dankeschön auch an Franz Werthmann im Bürgerhaus, der für die Diagonal-Club-Konzerte in Zukunft anbietet eine ...</p>

    <hr />

    <h5>2. Ermäßigung von 10 % für Mitglieder des Jazzfreundvereins</h5>

    <p>Und so lautete seine Email:</p>

    <blockquote>
      <p>Hallo Robert, ich möchte Dir mitteilen, dass wir für Mitglieder der Jazzfreunde e.V. ab sofort 10% Ermäßigung bei Vorlage des Mitgliedsausweises für Jazzkonzerte im Bürgerhaus anbieten können. Dies gilt auch schon für das Konzert mit Ignacio Berroa (erm. 16.- EUR). Allerdings können die Karten nur im Bürgerhausbüro oder an der Abendkasse ermäßigt erworben werden. Vielleicht könntest Du dies beim nächsten Newsletter ankündigen?</p>
      <p>Grüße</p>
      <p>Franz</p>
      <p>Stadt Ingolstadt BUERGERHAUS Kreuzstr. 12 85049 Ingolstadt Tel. +49(0)841 305 2802”</p>
    </blockquote>

    <p>... Was hiermit sehr gerne erledigt wird! Also wieder ein Grund, bei uns einzusteigen, z.B. unter <a href="http://www.jazzfreunde-ingolstadt.de/beitritt.php">http://www.jazzfreunde-ingolstadt.de/beitritt.php</a> geht das ganz einfach, da online. Übrigens: Wir knacken dieses Jahr noch die 175er-Grenze, wetten? 4 Mitglieder fehlen noch! Und, da ich letztes Mal schändlicherweise das Neumitglied Matthias Hetzer angeblich nicht kannte, hier die Auflösung:</p>

    <p>Matthias Hetzer kenne ich schon länger, denn der Drummer aus dem Scheiner-Gymnasium fiel mir schon 2008 beim damals noch stattfindenden
      Dixie- und Swingfestival auf, tolles Timing, knackige Beats am Drum-Set!</p>

    <p>Also, an Jazzinteressierten und an Talenten fehlt es nicht bei uns in der Region, deshalb sollten sich doch Leute finden bei den ...</p>

    <hr />

    <h5>3. Suchanzeigen von Jazzbands der Region</h5>

    <p>Claus Böhm vom soulig-funkigen club légère schreibt:</p>

    <blockquote>
      <p>“hallo robert,</p>
      <p>nun ist es mal wieder so weit. nachdem berni (schreyer bernadette) nach münchen gegangen ist und es unsere saxophonistin zum studieren nach bozen
        gezogen hat, brauchen wir wieder musiker. anbei eine suchanzeige von uns: vielleicht kannst du ihn ja bei deinem nächsten newsletter als anhang oder
        auch als text mit verschicken. das wäre ganz lieb von dir!</p>
      <p>vielen dank schon im voraus</p>
      <p>claus von club legere</p>
      <p>ps: schreib doch mal was nettes in unser gästebuch: <a href="http://www.clublegere.de">www.clublegere.de</a> “</p>
    </blockquote>

    <p>Die Suchanzeige liegt im Anhang und ins Gästebuch dürfen gerne noch mehr schreiben ;-)). Weiter schreibt ein Bekannter von Charles Leimer, dem
      hoffentlich ebenso geholfen werden kann:</p>

    <blockquote>
      <p>“hallo herr aichner,</p>
      <p>ich habe ihre mailadresse von charles leimer erhalten, ich bin nämlich auf der suche nach einen tastenmann der für eine funkyband zeit hat. vielleicht kennen sie ja den einen oder anderen!!</p>
      <p>viele grüße rob bachmann”</p>
    </blockquote>

    <p>Es gibt also genug Gelegenheit, sich unseren regionalen Bands anzuschließen. Und
      Auftrittsmöglichkeiten gibt es auch nicht wenige, denn ...</p>

    <hr />

    <h5>4. Die Spielstätte “kleines haus” des Stadttheaters IN sucht Jazzbands</h5>

    <p>Neulich kontaktierte mich Julia Mayr, Leiterin der Spielstätte “kleines haus” des Stadttheaters Ingolstadt. Sie schrieb:</p>

    <blockquote>
      <p>“Ich arbeite am Theater Ingolstadt und leite dort die Spielstätte "kleines haus" (<a href="http://www.theater.ingolstadt.de/frameset.cfm?case=reihe_kleines_haus_extra">http://www.theater.ingolstadt.de/frameset.cfm?case=reihe_kleines_haus_extra</a>). (...) Wir veranstalten dort unter anderem einmal im Monat ein Konzert. Mittlerweile sind dies verstärkt Jazzkonzerte. Es sind meist kleine Jazzgruppen aus München (aus Ingolstadt hat Simon Seidl schon bei uns gespielt), die wirklich hervorragend sind. Mittlerweile ist das kleine haus in Bezug auf Jazz fast schon ein Geheimtipp. (...) Unser nächstes Konzert ist am 11.12. um 21 Uhr. Die Band ist aus München und heißt "Isabella und Adrian". es wäre toll, wenn ein paar von euch Jazzfreunden kämen!</p>
      <p>liebe grüße Julia Mayr”</p>
    </blockquote>

    <p>Und nach kurzer Korrespondenz mit Julia:</p>

    <blockquote>
      <p>“(...) und wenn du mal gute Nachwuchsjazzer hast, die nach Auftrittsmöglichkeiten suchen, gerne an mich weiterleiten!”</p>
    </blockquote>

    <p>Also Klagen über zu wenig Gigs in der Region sollten angesichts dessen weniger werden. Und wer sich noch ein wenig einspielen will für den großen Auftritt, dem seien ans Herz gelegt die ...</p>

    <hr />

    <h5>5. Neue Sessiontermine im Jahr 2010</h5>

    <p>Auch wir im Verein verfallen nicht in den Winterschlaf und organisieren fleißig weiter das Jahr 2010. Hier ein kurzer Überblick über unsere geplanten Aktivitäten:</p>

    <ul>
      <li>So 20.12.2009 um 19 Uhr Weihnachtssession im Diagonal mit Kerstin Schulz’s famosen 4 of a kind</li>
      <li>So 31.1.2010 um 19 Uhr Jam Session im Swept Away (Termin noch nicht 100%)</li>
      <li>Do 4.2.2010 ab 20 Uhr Jahreshauptversammlung des Jazzfreundevereins im Hotel Rappensberger (auch noch nicht 100 %)</li>
      <li>So 28.2.2010 um 20 Uhr Jam Session im Diagonal (ebenfalls noch nicht 100 %)</li>
      <li>So 25.4.2010 Young Jazz Players Session im Jazzclub Birdland (das versuche ich morgen persönlich mit Manfred Rehm zu klären)</li>
      <li>Summer Jazz Open Air 2010 voraussichtlich am Wochenende 23.-24. Juli 2010</li>
    </ul>

    <p>Noch viel zu klären, aber wir sind halt “Work in Progress”!! Dafür bereitet es mir ein großes Vergnügen ein einzigartiges Projekt, das in diesen Tagen wirklich seinen Abschluss fand, in diesem Jazzletter anzukündigen:</p>

    <hr />

    <h5>6. Der Kunst und Kulturführer für Kinder geht in den Verkauf!</h5>

    <p>Unsere stets vereinsaktive Beate Diao hat ein Kunststück geschafft: Seit 2007 entwickelte sie einen Stadtführer, der die Geschichte der Stadt und ihre Sehenswürdigkeiten in Illustrationen von Kindern vorstellt. Über 1000 Jahre Stadtgeschichte wurden von ihrer KUNST UND KULTUR GARAGE und 23 teilnehmenden Schulen/Einrichtungen ausgiebig in Text und Bild bearbeitet. Dabei erhielt die Künstlerin und liebevolle Kunstpädagogin volle Unterstützung vom Team des Ingolstädter Stadtmuseums, das sie jederzeit mit Informationen und Bildmaterialien versorgte. Durch die beiderseitige gute Zusammenarbeit konnte das erste Projekt, ein eigenes Kinderwappentier, für Ingolstadt entstehen: das Ingolstädter Phan-Tier SCHANZI, das an mehreren Aktionstagen von Kindern gebaut und bemalt wurde und jetzt alle Kinder im Stadtmuseum begrüßt.</p>

    <p>Nun also ist dieser tolle und sehr unterstützungswürdige Stadtführer in der Touristikinfo, in den Museen und im Buchhandel erhältlich! Zusätzlich wird eine Ausstellung zum Buch ist vom 14.01.2010 bis zum 10.02.2010 in der Sparkasse am Rathausplatz zu sehen sein! Und das sei noch erwähnt: Beate hat dies eigens finanziert und hatte einen nicht unerheblichen Betrag privat geschultert. Deshalb verdient diese Werk ein Kassenschlager zu werden!!</p>

    <p>Mehr Info zum Kunst und Kultur Führer unter <a href="http://www.kunstundkulturgarage.de">www.kunstundkulturgarage.de</a></p>


    <p>Beate Diao Kinder und Jugendkunstschule KUNST UND KULTUR GARAGE Dahlienstr. 10 85053 Ingolstadt Tel./Fax.: 0841 / 9312922<br />
      <a href="http://www.kunstundkulturgarage.de">http://www.kunstundkulturgarage.de</a>
    </p>

    <p>Im Übrigen durften sich auch die Jazzfreunde mit ihrer Nachwuchsarbeit in diesem Werk verewigen. Und nicht nur deshalb:</p>

    <p>Das ideale, weil andere und neuartige und noch nie da gewesene, WEIHNACHTSGESCHENK! (Cover im Anhang)</p>

    <p>Weihnachten, Weihnachten. So gar nicht mag sich die Weihnachtsstimmung angesichts des milden Wetters und der noch knapp 4 Wochen zum Fest einstellen, aber da ich eingedenk meiner Arbeit bis zu den Ferien – u.a. fährt meine Schulbigband nächstes Wochenende auf den bayerischen Bigbandwettbewerb nach Marktoberdorf <a href="http://www.ljjb.de/jugend_jazzt_landeswettbewerb.html">http://www.ljjb.de/jugend_jazzt_landeswettbewerb.html</a> – hier den letzten Jazzletter des Jahres 2009 schreibe, kommen an dieser Stelle wie immer ...</p>

    <hr />

    <h5>7. Mein Weihnachtsdank für 2009 und meine Weihnachtswünsche für 2010</h5>

    <p>Letztes Mal hatte ich eine ganze Dankeslitanei verfasst. Da muss meine Zeit noch unbegrenzt gewesen sein ;-)). Oder vielleicht habe ich dieses Jahr einfach einer unendlichen Anzahl von Leuten zu danken, die dem Ingolstädter Jazzleben, unserem Verein, mir in meiner Funktion als Schriftführer und Nachwuchsbeauftragten im Verein stets zur Seite stehen und mit aller Tat und Kraft unterstützen., so dass mir für 2009 nur einfach ein simples:</p>

    <p style="font-size:160%; font-weight:bold;">DANKE FÜR DIE WUNDERBARE ZEIT IM JAHR 2009!!!</p>

    <p>über die Lippen kommt. Dafür fallen mir aber ein paar fromme und auch realisierbare Weihnachtswünsche ein. Ich wünsche mir, dass:</p>

    <ol>
      <li>der Jazzverein auch weiterhin so wächst in seiner Mitgliederzahl. Wir hatten 2006 nur knapp 30 Mitglieder! Wahnsinn!</li>
      <li>unsere Nachwuchsmusiker auf der Erfolgsleiter stets weiterklettern. Klettern beinhaltet aber auch Anstrengung und dafür wünsche ich euch Ausdauer! Uff!</li>
      <li>die Stadt Ingolstadt jedes Jahr die Jazztage organisatorisch und finanziell so phantastisch unterstützt. Wir haben ein international anerkanntes Festival! Yeah!</li>
      <li>sich die Clubkonzerte im Diagonal in Qualität und Kontinuität weiter so entfalten können, wie es diese Reihe verdient! Weltstars in Clubatmosphäre!</li>
      <li>unsere Vereinsmitglieder die Jazzevents in der Region zahlreicher unterstützen. Weltstars (z.B. Ignacio Berroa) haben keine leeren Stuhlreihen verdient. Ähm!</li>
      <li>sich unsere Jazzförderpreisträger und Jazzetablierten rege bei den Sessions des Vereins beteiligen, auch wenn der Nachwuchs gerne die Bühnen erobert.</li>
      <li>all Jazzgestalter der Region sich gegenseitig unterstützen und im Sinne des die Welt vereinenden Jazz an einem Strang ziehen.</li>
      <li>wir vom Jazzkern ( i.d.R. die Vorstandsmitglieder + Beate Diao + Nik von music-in) immer noch mehr Vereinsunterstützung bei unserer Organisation erfahren.</li>
      <li>sich alle Bands und Jazzförderpreisträger der Stadt IN in dem 2010 erscheinenden Verzeichnis Jazz.IN wieder finden. Es fehlen nur noch ein paar ...</li>
      <li>ich bei all der ehrenamtlichen Arbeit für den Verein noch die Geduld und Kraft behalte, den vielerlei Wünschen gerecht zu werden.</li>
    </ol>

    <p>Das waren meine 10 Wünsche zu Weihnachten und fürs neue Jahr 2010! Da sollte sich doch einiges verwirklichen lassen, oder? Dann mal</p>

    <p style="font-size:160%; font-weight:bold;">EIN GESEGNTES WEIHNACHTSFEST UND EIN ERFOLGREICHES JAHR 2010</p>

    <div class="signum">Robert Aichner</div>


    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach(); ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 32  (31. Oktober 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 32</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 171</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde:</p>
    <ul class="emboss red">
      <li>8. Jam Session im Swept Away</li>
      <li>Jazztage Eröffnung mit Jazzförderpreisträger Hollinger</li>
      <li>Jazz for kids: “Hoppel Hoppel Rhythm Club” in der Fronte</li>
    </ul>
    <p class="emboss red"><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php">http://www.jazzfreunde-ingolstadt.de/bilder.php</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Nachlese der ersten beiden Jazztagekonzerte </li>
      <li>Vorschau auf die kommenden Konzerte der Jazztage</li>
      <li>Young Jazz Players Session am 2.11.09 ab 19.30 Uhr im Diagonal</li>
      <li>Die heiße Jazznachspeise: Ignacio Berroa (drums) und David Sanchez (sax) im Diagonal</li>
      <li>Neu im Verein: Matthias Hetzer, Familie Löhleins, Familie Rehrl</li>
      <li>Noah Gold mit neuer CD!</li>
      <li>Empfehlenswerter Bigband-Leiter Workshop mit Harald Rüschenbaum</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>01.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Highlight: Christian Wallumrod Ensemble (St. Augustin)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Montag</td>
        <td>02.11.2009</td>
        <td>19.30 Uhr</td>
        <td>11. Young Jazz Players Session (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Dienstag</td>
        <td>03.11.2009</td>
        <td>20.30 Uhr</td>
        <td>Regionale Szene: 4 of a kind feat. Kerstin Schulz (Neue Welt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Mittwoch</td>
        <td>04.11.2009</td>
        <td>20.30 Uhr</td>
        <td>Regionale Szene: Jungblut feat. Christina Jungblut (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>05.11.2009</td>
        <td>20.30 Uhr</td>
        <td>Jazz in den Kneipen (div. Veranstaltungsorte)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>05.11.2009</td>
        <td>22.00 Uhr</td>
        <td>Marie Boine (Altstadttheater)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>05.11.2009</td>
        <td>22.00 Uhr</td>
        <td>Welcome Party mit Late Night Musicians (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>06.11.2009</td>
        <td>19.30 Uhr</td>
        <td>Top Act: Chick Corea &amp; Stanley Clarke &amp; Lenny White (Festsaal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>06.11.2009</td>
        <td>22.00 Uhr</td>
        <td>Jazz Party I u.a. mit Nils Petter Molvaer, P-S-P (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>07.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Jazz Party II u.a. mit Tower of Power, Curtis Stigers (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>08.11.2009</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch mit der Birdland Jazz Band (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>08.11.2009</td>
        <td>11.00 Uhr</td>
        <td>Jazzgottesdienst mit Gerhard Schmidt &amp; Tom Diwock (St. Matthäus)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>08.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Highlight: Zap Mama (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Backhaus Gaimersheim)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>22.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Gasthaus zum Gutmann Eichstätt)</td>
      </tr>
      <tr class="red">
        <td>Donnerstag</td>
        <td>26.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Ignacio Berroa Quartet feat. David Sánchez (Diagonal) NEU!!</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>06.12.2009</td>
        <td>?</td>
        <td>4 of a kind “A jazzy Christmas” (Kunstscheune Marienheim bei Neuburg)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2009</td>
        <td>20.30 Uhr</td>
        <td>Häns’che Weiss &amp; Vali Meyer – Der König des „Zigeunerjazz“ (Neue Welt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>16.12.2009</td>
        <td>20.00 Uhr</td>
        <td>Charly Böck Latin Project (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Die Ereignisse überschlagen sich momentan, so dass mir nichts anderes übrig bleibt, als einen Jazzletter in Stenoform zu verfassen ... Jazz-Boomtown Ingolstadt ...</p>

    <h5>1. Nachlese der ersten beiden Jazztagekonzerte</h5>

    <p>Hier sind Berichte zu finden für</p>

    <ul>
      <li>Das Eröffnungskonzert der Jazztage mit der “Bernhard Hollinger Group” (Wer dabei war: Funk ohne Ende! Es lebe der Groove!!)<ul>
          <li><a href="http://intv.de/index.php?option=com_content&amp;view=article&amp;id=2247:teleschau-beitr?%20f?en%2019.10.2009&amp;catid=10:playlist">http://intv.de/index.php?option=com_content&amp;view=article&amp;id=2247:teleschau-beitr?%20f?en%2019.10.2009&amp;catid=10:playlist</a></li>
          <li><a href="http://www.donaukurier.de/nachrichten/kultur/Ungestuemer-Sound;art598,2193655">http://www.donaukurier.de/nachrichten/kultur/Ungestuemer-Sound;art598,2193655</a></li>
          <li><a href="http://www.br-online.de/br-klassik/u21/jugendradiotag-ingolstadt-audio-jazzpreistraeger-bernhard-hollinger-ID1253451176217.xml">http://www.br-online.de/br-klassik/u21/jugendradiotag-ingolstadt-audio-jazzpreistraeger-bernhard-hollinger-ID1253451176217.xml</a></li>
          <li><a href="http://www.myspace.com/bernhardhollinger">http://www.myspace.com/bernhardhollinger</a></li>
        </ul>
      </li>
      <li>Das Konzert “Jazz for kids” mit dem “Hoppel Hoppel Rhythm Club” (Begeisterte Kinder mit roten Backen, beschwingte Eltern mit Schweißperlen auf der Stirn)<ul>
          <li><a href="http://www.donaukurier.de/nachrichten/kultur/Praxisnah-und-unkompliziert;art598,2198193">http://www.donaukurier.de/nachrichten/kultur/Praxisnah-und-unkompliziert;art598,2198193</a></li>
          <li><a href="http://media21.kanal8.de/MediaFrontend/21/Kulturkanal%2026%2010%2009.mp3">http://media21.kanal8.de/MediaFrontend/21/Kulturkanal%2026%2010%2009.mp3</a></li>
        </ul>
      </li>
      <li>Und nicht vergessen: Parallel zu den Jazztagen stellen die Jazztage-Fotographen im Bürgerhaus Diagonal tolle Fotos zu den “Young Jazz Players” aus (täglich geöffnet)</li>
    </ul>

    <hr />

    <h5>2. Vorschau auf die kommenden Konzerte der Jazztage</h5>

    <p>Folgend ein paar News für die kommenden Jazztagekonzerte. Es können noch Karten gesichert werden für:</p>

    <ul>
      <li>CHRISTIAN WALLUMRØD ENSEMBLE am 1.11.09.: ECM-Star auf Tour macht Halt in IN – Neues Album zu bestaunen unter<br /><a href="http://www.jazzecho.de/aktuell/rezensionen/detail/article/79003/0/christian-wallumr--d-ensemble--fabuloese-suite/">http://www.jazzecho.de/aktuell/rezensionen/detail/article/79003/0/christian-wallumr--d-ensemble--fabuloese-suite/</a></li>
      <li>4 OF A KIND am 3.11.09 mit Radio-IN-Star Kerstin Schulz und neu dabei: Vereinsmitglied Bernadette Schreyer (Keyboards)</li>
      <li>JUNGBLUT am 4.11.09: <i>LIVEAUFZEICHNUNG MIT BR2!!</i><br /><a href="http://www.jungblut-band.de/">http://www.jungblut-band.de/</a></li>
      <li>MARI BOINE am 5.11.09: Weltbekannt durch ihren Auftritt bei der Hochzeit des norwegischen Prinzen Haakon mit Mette-Marit<br /><a href="http://de.wikipedia.org/wiki/Mari_Boine">http://de.wikipedia.org/wiki/Mari_Boine</a></li>
      <li>POWER OF THREE am 6.11.09: Legenden des Jazzrock zu Gast!! (Chick Corea – Master of Electric Jazz / Stanley Clarke – Slapping-King / Lenny White – Member of “Bitches Brew”)<br /><a href="http://de.wikipedia.org/wiki/Return_to_Forever">http://de.wikipedia.org/wiki/Return_to_Forever</a></li>
      <li>JAZZ PARTY 1 am 6.11.09: u.a. mit NILS PETTER MOLVÆR (noch ein ECM-Star!) &amp; PSP (Wer ist das? Aber, aber: Hat jeder schon gehört! Siehe Links)<br /><a href="http://de.wikipedia.org/wiki/Simon_Phillips">http://de.wikipedia.org/wiki/Simon_Phillips</a> (Drummer bei Toto, Mike Oldfield, Gary Moore ...)<br /><a href="http://www.philippesaisse.com/">http://www.philippesaisse.com/</a> (als Keyboarder und Produzent tätig für David Bowie, Al Di Meola, Al Jarreau, Tina Turner)<br /><a href="http://de.wikipedia.org/wiki/Pino_Palladino">http://de.wikipedia.org/wiki/Pino_Palladino</a> (Studio-Bassist bei Paul Simon, The Who, BB King, Elton John, Phil Collins, Chris DeBurgh)</li>
    </ul>

    <p>!!!!!ACHTUNG: JAZZ PARTY 2 &amp; ZAP MAMA SCHON AUSVERKAUFT!!!!!</p>

    <hr />

    <h5>3. Young Jazz Players Session am 2.11.09 ab 19.30 Uhr im Diagonal</h5>

    <p>Jeder darf einsteigen, ob jung oder erfahren bei der Young Jazz Players! Es treten auf:</p>

    <ul>
      <li>der Jazz Club des Gnadenthal-Gymnasiums</li>
      <li>die Jazz GmbH des Reuchlin Gymnasiums samt Juniorabteilung</li>
    </ul>

    <p>Mit dabei:</p>

    <ul>
      <li>über 30 jazzbegeisterte Jugendliche</li>
      <li>der ein oder andere Jazzförderpreisträger</li>
      <li>Überraschungsgäste??</li>
    </ul>

    <p>Das Programm zum Mitspielen:</p>

    <ul>
      <li>die üblichen “Standards” wie “Mercy, Mercy”, “Watermelon Man”, “Chameleon” “Fly me to the Moon” oder “Blue Bossa”</li>
      <li>aber auch “Neuzugänge” wie “Freddie Freeloader” oder “Sticks” oder “Killer Joe”</li>
    </ul>

    <p></p>

    <hr />

    <h5>4. Die heiße Jazznachspeise: Ignacio Berroa (drums) und David Sanchez (sax) im Diagonal</h5>

    <p>Noch weitere Superstars in IN am 26.11.09 um 20 Uhr im Diagonal!! Heißer Latin Jazz mit Ignacio Berroa (drums) und David Sanchez (sax)</p>

    <blockquote>
      <p>“Mit dem „Ignacio Berroa Quartet“ und dem Saxophonisten David Sanchez gastieren zwei absolute Weltklasse-Musiker aus dem Latin-Jazz-Bereich im Ingolstädter Bürgerhaus. Der kubanische Drummer Ignacio Berroa erhielt seine musikalische Ausbildung am Nationalkonservatorium in Havanna und war schon 1975, 5 Jahre nach dem Start seiner professionellen Karriere, einer der gefragtesten Schlagzeuger Kubas. Kurz nach seiner Übersiedlung nach New York im Jahr 1980 engagierte der Bebop-Meister Dizzy Gillespie Ignacio in seinem Quartett und später auch in all seinen bedeutenden Bands, unter anderem im Grammy-Award-Winner „United Nations Orchestra“. Daneben sicherten sich viele Jazz-Größen seine Dienste, u.a. Chick Corea, Wynton Marsalis, Tito Puente, Ron Carter. Auch als Lehrer machte sich Ignacio Berroa einen Namen: Sein Video „Mastering The Art of Afro-Cuban Drumming“ wurde 1995 als Lehr-Video des Jahres ausgezeichnet. Und Dennis Chambers lobte Ignacio Berroa als „besten Lehrer für Jazz und Afro-Cubanische Rhythmen“. David Sanchez gilt als der bedeutendste Saxophonist der aktuellen Latin-Jazzszene. Mit seinem Album „Coral“ gewann er den Latin Grammy Award 2005.”</p>
    </blockquote>

    <p>Eintritt: 18,00 €/ 12,00 €</p>

    <hr />

    <h5>5. Neu im Verein: Matthias Hetzer, Familie Löhleins, Familie Rehrl</h5>

    <p>Herzlich willkommen im Club!! Wir steuern auf die 200 zu. Dieses oder nächstes Jahr? Mal sehen was die Jazztage bringen??!! Ach ja: Wegen der Vorstellung. Da weiß ich momentan nur was zur Familie Löhlein:</p>
    <ul>
      <li>Benedikt Löhlein brilliert an Tenorsax und Klarinette in der Jazz GmbH des Reuchlin-Gymnasiums (der mit der giftgrünen Schiebermütze)</li>
    </ul>

    <hr />

    <h5>6. Noah Gold mit neuer CD!</h5>

    <p>Schon lange kein Geheimtipp in IN: Noah Gold alias Christian Mayer. Jetzt mit neuem Pop-Jazz-Album. Reinhören lohnt sich unter<br /><a href="http://www.myspace.com/noahgoldmusic">http://www.myspace.com/noahgoldmusic</a></p>

    <hr />

    <h5>7. Empfehlenswerter Bigband-Leiter Workshop mit Harald Rüschenbaum</h5>

    <p>In Augsburg (Universität, Schillstr. 100) am 14. November 2009 von 9.00 Uhr – 18.00 Uhr mit Harald Rüschenbaum &amp; Daniel Eberhard.</p>

    <blockquote>
      <p>“<span style="text-decoration:underline;">Inhalt:</span></p>

      <p>Inzwischen gehört die Leitung einer Schüler-Big-Band vielerorts zu den alltäglichen Aufgaben einer Musiklehrkraft, immer wieder jedoch wird von Seiten der Lehrkräfte ein Mangel an adäquaten Ausbildungsinhalten oder anerkannten Fortbildungsangeboten beklagt. Auf diesen Missstand möchte dieser Big-Band-Leiter-Workshop in Kooperation von Landes-Jugendjazzorchester Bayern (LJJB), Leopold-Mozart-Zentrum der Universität Augsburg, Bildungsreferat der Stadt Augsburg und AfS Bezug nehmen.<br />
        Die TeilnehmerInnen arbeiten einen Tag lang praktisch mit einer Schülerband mit dem Hauptziel, über die Veränderung der musikalischen Wahrnehmung der Beteiligten „neuralgische“ Soundprobleme einer Big-Band zu beheben. Im Verlauf des Workshops sollen individuelle Fragen geklärt, Arrangementempfehlungen ausgetauscht und zahlreiche Anregungen sowie neue Impulse für die erfolgreiche Leitung einer Big-Band gegeben werden. Abgerundet wird der Workshop durch ein abendliches Konzert des Landes-Jugendjazzorchesters Bayern in Augsburg. Die Teilnahme daran ist jedoch freiwillig und nicht Bestandteil des Kursangebotes.</p>

      <p style="text-decoration:underline;">Portraits:</p>

      <p>Daniel Eberhard:<br />
        Realschullehrer, professioneller, mehrfach ausgezeichneter (Jazz-) Pianist und Keyboarder, Dozent am Leopold-Mozart-Zentrum der Universität Augsburg, Leiter der Uni Big Band Augsburg, Lehrtätigkeiten u.a. für das Landes-Jugendjazzorchester Bayern und div. Lehrerverbände;</p>

      <p>Harald Rüschenbaum:<br />
        international tätiger Jazz-Schlagzeuger, künstlerischer Leiter des Landes-Jugendjazzorchesters Bayern, Gründer und Leiter der Harald Rüschenbaum Big Band sowie zahlreicher eigener Formationen</p>

      <p style="text-decoration:underline;">Wegbeschreibung:</p>

      <p>A8 Mü-Stuttgart, Ausfahrt Augsburg/Ost, Richtung Augsburg fahren, an der 3. Ampel rechts in die Schillstraße, 2.Einfahrt rechts: Parkplatz der Universität (rotes Backsteingebäude); Vom Hbf: Bus 22 Richtung Firnhaberau</p>

      <p><span style="text-decoration:underline;">Veranstalter:</span> AfS-Bayern</p>

      <p><span style="text-decoration:underline;">Kursgebühr:</span> 50 € / 45 € (Mitgl.) 40 € (Ref., Stud.)</p>

      <p><span style="text-decoration:underline;">Verpflegung:</span> bitte selbst mitbringen</p>

      <p style="text-decoration:underline;">Anmeldeschluss:</p>

      <p>31.10.09, Anmeldung über <a href="http://www.afs-musik.de/">www.afs-musik.de</a><br />
        Der gemeinsame Arbeitstag wird abgerundet durch ein Konzert des Landes-Jugendjazzorchesters Bayern am selben Abend.”</p>
    </blockquote>

    <hr />

    <p>Hallo! Noch jemand da? War schon viel Info! Aber so intensiv ist es halt, das Ingolstädter Jazzleben ... Es lebe der Jazz!!</p>

    <p>Man sieht sich, auf den 26. JAZZTAGEN!! ES GEHT LOS!!</p>

    <div class="signum">Robert Aichner</div>


    <hr />

    <h2>NACHSCHLAG JAZZLETTER: MEGASESSION 5. und 6.11. IM HOTEL!!</h2>

    <p>Liebe Jazzfreunde,</p>

    <p>EIN KLEINER NACHSCHALG ZUM JAZZLETTER HEUTE: WIE ICH GERADE EBEN ERFAHREN HABE, WIRD <span class="red">“TOWER OF POWER”</span> DIE GANZE NÄCHSTE WOCHE IM NH-HOTEL AMBASSADOR ÜBERNACHTEN. SOMIT BESTEHT DIE REELLE <span class="red">CHANCE</span>, DASS WIR DIE <span class="red">FUNK-GÖTTER BEI DEN LATE NIGHT SESSIONS</span> AM</p>
    <ul>
      <li>DO 5.11. AB 22 UHR</li>
      <li>FR 6.11. GEGEN 24 UHR</li>
      <li>SA 7.11. GEGEN 24 UHR</li>
    </ul>

    <p>
      IM RESTAURANT NOCHMALS HÖREN KÖNNEN ZUSAMMEN MIT DEN LATE NIGHT MUSIKERN. UND DAS BESTE: ES HERRSCHT <span class="red">OPEN STAGE</span>, ALSO WER SICH FIT FÜHLT IM <span class="red">JAMMEN</span> KANN <span class="red">MITMACHEN</span>!!! DIE IDEALE GELEGENHEIT FÜR UNSERE <span class="red">JAZZFÖRDERPREISTRÄGER UND <span class="red">FITTEN NACHWUCHSJAZZERN DER YOUNG JAZZ PLAYERS!!!!</span></p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 31  (15. September 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 31</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 161</p>

    <hr />

    <p class="emboss red">BRANDAKTUELL: DAS WERBEVIDEO FÜR DIE 26. INGOLSTÄDTER JAZZTAGE</p>
    <p class="emboss red"><a href="http://www.jazzfreunde-ingolstadt.de/jazztage09.php">http://www.jazzfreunde-ingolstadt.de/jazztage09.php</a></p>
    <p class="emboss red">BEINAHE ALLE KÜNSTLER WERDEN IN KURZFILMEN VORGESTELLT!!!</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li style="color:#00c000;">Es geht los: Das Programm der 26. Ingolstädter Jazztage</li>
      <li>Riesig: Young Jazz Players mit eigener Fotoausstellung</li>
      <li>Jam Session Nr. 8 am 27.09. (Sonntag) im Swept Away</li>
      <li>Jazz im Bürgerhaus / Diagonal u.a. mit Simon Seidls 4sinn (23.9.)</li>
      <li>TV-Tipps – auch mit Jazzsendungen – Freihaus per Mail</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Mittwoch</td>
        <td>23.09.2009</td>
        <td>20.00 Uhr</td>
        <td>Simon Seidl &amp; 4sinn (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09.2009</td>
        <td>19.00 Uhr</td>
        <td>8. Jam Session mit Berni Schreyer &amp; friends (Swept Away)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>28.09.2009</td>
        <td>20.30 Uhr</td>
        <td>C.B.Green &amp; Band feat. Martin Kälberer: CD-Präsentation &quot;Third&quot; (Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>30.09.2009</td>
        <td>20.00 Uhr</td>
        <td>Erika Stucky &amp; Sina (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>08.10.2009</td>
        <td>20.30 Uhr</td>
        <td>Joscho Stephan Trio (D): „Django Forever“ (Neue Welt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>10.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>13.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Ulita Knaus &amp; Band (Bürgerhaus/Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>18.10.2009</td>
        <td>18.00 Uhr</td>
        <td>Jazzförderpreisträger 2009 Bernhard Hollinger &amp; Band (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>25.10.2009</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch mit C’est si bon (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>25.10.2009</td>
        <td>16.00 Uhr</td>
        <td>“Jazz for Kids” mit “Hoppel Hoppel Rhythm Club” (Fronte 79)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>01.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Highlight: Christian Wallumrod Ensemble (St. Augustin)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Montag</td>
        <td>02.11.2009</td>
        <td>19.30 Uhr</td>
        <td>11. Young Jazz Players Session (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Dienstag</td>
        <td>03.11.2009</td>
        <td>20.30 Uhr</td>
        <td>Regionale Szene: 4 of a kind feat. Kerstin Schulz (Neue Welt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Mittwoch</td>
        <td>04.11.2009</td>
        <td>20.30 Uhr</td>
        <td>Regionale Szene: Jungblut feat. Christina Jungblut (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>05.11.2009</td>
        <td>20.30 Uhr</td>
        <td>Jazz in den Kneipen (div. Veranstaltungsorte)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>05.11.2009</td>
        <td>22.00 Uhr</td>
        <td>Marie Boine (Altstadttheater)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>05.11.2009</td>
        <td>22.00 Uhr</td>
        <td>Welcome Party mit Late Night Musicians (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>06.11.2009</td>
        <td>19.30 Uhr</td>
        <td>Top Act: Chick Corea &amp; Stanley Clarke &amp; Lenny White (Festsaal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>06.11.2009</td>
        <td>22.00 Uhr</td>
        <td>Jazz Party I u.a. mit Nils Petter Molvaer, P-S-P (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>07.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Jazz Party II u.a. mit Tower of Power, Curtis Stigers (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>08.11.2009</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch mit der Birdland Jazz Band (Hotel Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>08.11.2009</td>
        <td>11.00 Uhr</td>
        <td>Jazzgottesdienst mit Gerhard Schmidt &amp; Tom Diwock (St. Matthäus)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>08.11.2009</td>
        <td>20.00 Uhr</td>
        <td>Highlight: Zap Mama (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Backhaus Gaimersheim)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>22.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Gasthaus zum Gutmann Eichstätt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>06.12.2009</td>
        <td>?</td>
        <td>4 of a kind “A jazzy Christmas” (Kunstscheune Marienheim bei Neuburg)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2009</td>
        <td>20.30 Uhr</td>
        <td>Häns’che Weiss &amp; Vali Meyer – Der König des „Zigeunerjazz“ (Neue Welt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>16.12.2009</td>
        <td>20.00 Uhr</td>
        <td>Charly Böck Latin Project (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Schon das Werbevideo für die 26. Jazztage angeschaut? (<a href="http://www.jazzfreunde-ingolstadt.de/jazztage09.php">http://www.jazzfreunde-ingolstadt.de/jazztage09.php</a>). Na dann wir sind wir alle bestens gewappnet, denn ...</p>

    <h5 style="color:#00c000;">1. Es geht los: Das Programm der 26. Ingolstädter Jazztage</h5>

    <p>Ich möchte gar nicht viel Worte verlieren denn das Video spricht Bände: Es wird wieder ein Mega-Festival mit Weltstars wie Chick Corea (den lässt IN einfach nicht los), Lee Ritenour (brillanter Gitarrenheld), Larry Carlton (legendäres Mitglied der Jazz Crusaders), Tower of Power (Funkgötter), ... </p>

    <p>Ein Großes DANKE an:</p>

    <p>GABRIEL ENGERT (KULTURREFERENT)<br />
      JAN ROTTAU (FESTIVALLEITER)<br />
      JOSEPH GUTMANN (KULTURAMT)</p>

    <p>Und dem gesamten Team der Jazztage!!</p>

    <p>DER JAZZ UND INGOLSTADT – DIE GEHÖREN EINFACH UNTRENNBAR ZUSAMMEN!!</p>

    <p>Programmhefte werden gerade in IN verteilt. Ab Freitag, den 18. Sept. - 09.00 Uhr sind die Tickets für alle Veranstaltungen im Kulturamt erhältlich. Vereinsmitglieder können die Karten direkt im Kulturamt - ohne Vorverkaufsgebühr von 10 % - unter Vorlage Ihres Mitgliedsausweises erwerben. Das Kulturamt befindet sich ”Auf der Schanz 39” (Ansprechpartner Frau Schipper).<br />
      Das war kurz und bündig, denn es gibt noch was sehr Erfreuliches für die Ingolstädter Jazznachwuchswelt zu vermelden: es ist einfach ...</p>

    <hr />

    <h5>2. Riesig: Young Jazz Players in eigener Fotoausstellung</h5>

    <p>Gewöhnlich stellten unsere Profifotografen der Region ihre Werke von den Größen des Jazz im Bürgerhaus / Diagonal aus. Diesmal aber erweisen sie den Nachwuchskünstlern des Jazz in der Region ihre Referenz, die bald – am 2.11.09 ab 19 Uhr im Diagonal – bei der 11. Young Jazz Players Session während der Jazztage ihr famoses Können wieder unter Beweis stellen werden. Hier ein kurzer Auszug aus dem Jazztage-Programmheft:</p>

    <blockquote>
      <p>“Fotoausstellung „Young Jazz Players“. Eröffnung Sonntag, 18.10.2009, 18.00 Uhr im Bürgerhaus/Diagonal. Eine Produktion der Forum Fotografie: Christian Pacher, Gerhard Löser, Roland Schiebel und Christian Wurm. (Eintritt frei)”</p>
    </blockquote>

    <p>Danke Christian, Gerhard, Roland und Christian!! Die Jugendlichen werden es euch danken!! Vielleicht schon bei der ...</p>

    <hr />

    <h5>3. Jam Session Nr. 8 am 27.09. (Sonntag) im Swept Away</h5>

    <p>Wer die Wahl hat, hat die Qual. Jedoch: Das könnte der perfekte Sonntag werden: Zum Bundestag-Wählen spazieren, 18 Uhr Hochrechnungen anschauen. 19 Uhr Mitjammen bei der 8. Jam Session im Swept away zusammen mit Berni Schreyer &amp; friends. Nebenbei die Prognosen diskutieren in angenehmem Ambiente. Dann gegen 22 Uhr zuhause die Endergebnisse gucken. Dabeisein im Swept ist alles denn die Szene wärmt sich so richtig auf für die kommenden Jazztage. Neben den Highlight-Jazzkonzerten in der Neuen Welt (erst vor Kurzem die Klangpatrouille mit einer bemerkenswerten Kritik unter <a href="http://www.donaukurier.de/lokales/ingolstadt/Reife-Leistung;art599,2168136">http://www.donaukurier.de/lokales/ingolstadt/Reife-Leistung;art599,2168136</a>) kann man sich im Herbst bestens vergnügen beim ...</p>

    <hr />

    <h5>4. Jazz im Bürgerhaus / Diagonal u.a. mit Simon Seidls 4sinn (23.9.)</h5>

    <p>Franz Werthmann, Programmverantwortlicher im Bürgerhaus / Diagonal, hat ein glückliches Händchen für die Mischung von regionalen und internationalen Künstlern. In der Jazzadresse Nr. 1 in IN gesellen sich neben Simon Seidls 4sinn, die gerade ihre Tournee in Berlin begonnen haben und sich irrsinnig darauf freuen im happy herbst ihr brandneues Programm der Marke “Modern Jazz vom Feinsten” vorzustellen (<a href="http://www.myspace.com/4sinn">http://www.myspace.com/4sinn</a>), und Charly Böcks “Latin Project” mit heißen südamerikanischen Rhythmen zur Winterszeit (am 16.12.), tatsächlich solch Megastars wie Zap Mama am 8.11. (sicher in Kürze ausverkauft!!). Für unsere regionalen Stars gibt es übrigens noch Karten, auch an der Abendkasse für Kurzentschlossene. Näheres im beigefügten Newsletter!
      Und wem das noch nicht genug ist, bekommt von mir ...</p>

    <hr />

    <h5>5. TV-Tipps – auch mit Jazzsendungen – Freihaus per Mail</h5>

    <p>Als Mitglied beim Verband bayerischer Schulmusiker bekomme ich ungefähr alle 3-4 Wochen eine sehr übersichtliche Zusammenfassung von TV-Sendungen, die Musik zum Thema haben, zugesendet. Gerne maile ich diese Liste an Interessenten weiter, sind doch einige Jazzhighlights (Konzerte, Dokumentationen) dabei. Wer also Mitglied in dieser Mailingliste von mir werden will, ein Kurzmail an mich genügt.</p>

    <p>So jetzt aber Vollgas hinein in das größte Vergnügen, was Ingolstadt 2009 für Jazzfans zu bieten hat: Der heiße Jazzherbst 2009!!!!</p>

    <p>Man sieht und hört sich! Let the good times roll!!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 30  (17. August 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 30</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 161</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde: 4. Summer Jazz Open Air</p>

    <p><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=Sommerjazz2009">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a></p>

    <p class="emboss" style="color:#008000">IN-TV-Bericht dazu unter</p>

    <p><a href="http://intv.de/index.php?option=com_hello&amp;cal=200907&amp;erschtag=14.07.2009">http://intv.de/index.php?option=com_hello&amp;cal=200907&amp;erschtag=14.07.2009</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Jam Session am 27.09. (Sonntag) im Swept Away</li>
      <li>Open Flair und Neue Welt jazzen Anfang September!</li>
      <li>Start des Kartenvorverkaufs für die 26. Ingolstädter Jazztage am 18.09.2009</li>
      <li>Neuer Jazzförderpreisträger 2009: Bernhard Hollinger (Bass)</li>
      <li>Wir haben die 160! Neue Mitglieder</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Dienstag</td>
        <td>01.09.2009</td>
        <td>20.30 Uhr</td>
        <td> Da Boarische Jazzplan (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>03.09.2009</td>
        <td>19.00 Uhr</td>
        <td>Pit Müllers’ Hot Stuff (Hotel Rappensberger)</td>
      </tr>
      <tr style="color:red;">
        <td>Samstag</td>
        <td>05.09.2009</td>
        <td>15.00 Uhr</td>
        <td>So What (Ingolstadt Open Flair/Klangraumzelt)</td>
      </tr>
      <tr style="color:red;">
        <td>Samstag</td>
        <td>05.09.2009</td>
        <td>21.00 Uhr</td>
        <td>Ras Dashan meets Jazz (Ingolstadt Open Flair/Klangraumzelt)</td>
      </tr>
      <tr style="color:red;">
        <td>Samstag</td>
        <td>05.09.2009</td>
        <td>20.00 Uhr</td>
        <td>3 of a kind beim Poetry Slam (Ingolstadt Open Flair/Literaturzelt)</td>
      </tr>
      <tr style="color:red;">
        <td>Sonntag</td>
        <td>06.09.2009</td>
        <td>11.00 Uhr</td>
        <td>4 of a kind Jazzfrühschoppen (Ingolstadt Open Flair)</td>
      </tr>
      <tr style="color:red;">
        <td>Sonntag</td>
        <td>06.09.2009</td>
        <td>18.00 Uhr</td>
        <td>Rudi Trögl-Rainer Hasenkopf Duo (Ingolstadt Open Flair/Klangraumzelt)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>07.09.2009</td>
        <td>20.30 Uhr</td>
        <td>Klangpatrouille (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>08.09.2009</td>
        <td>20.30 Uhr</td>
        <td>Trialogo und Emil &amp; Eduard (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>14.09.2009</td>
        <td>20.30 Uhr</td>
        <td>Claudius &amp; Band feat. Nick Flade (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>15.09.2009</td>
        <td>20.30 Uhr</td>
        <td>Jack Skupin Trio inkl. Gary Todd &amp; Eduard Israelov (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>23.09.2009</td>
        <td>20.00 Uhr</td>
        <td>Simon Seidl &amp; 4sinn (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09.2009</td>
        <td>19.00 Uhr</td>
        <td>8. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>28.09.2009</td>
        <td>20.30 Uhr</td>
        <td>C.B.Green &amp; Band feat. Martin Kälberer: CD-Präsentation &quot;Third&quot; (Neue Welt)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>08.10.2009</td>
        <td>20.30 Uhr</td>
        <td>Joscho Stephan Trio (D): „Django Forever“ (Neue Welt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>10.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>13.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Ulita Knaus &amp; Band (Bürgerhaus/Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>18.10.2009</td>
        <td>18.00 Uhr</td>
        <td>Jazzförderpreisträger 2009 <span style="color:#00c000;">Bernhard Hollinger &amp; Band (Diagonal)</span></td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Backhaus Gaimersheim)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>22.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Gasthaus zum Gutmann Eichstätt)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>06.12.2009</td>
        <td>?</td>
        <td>4 of a kind “A jazzy Christmas” (Kunstscheune Marienheim bei Neuburg)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2009</td>
        <td>20.30 Uhr</td>
        <td>Häns’che Weiss &amp; Vali Meyer – Der König des „Zigeunerjazz“ (Neue Welt)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Noch laufen die Sommerferien, noch können wir endlich heiße Sommertage genießen, noch befindet sich der regionale Jazz in der Sommerpause. Zeit zum Ausspannen, Loslassen, Auftanken. Vielleicht passt hier hinein noch ein Sommer-Jazzletter, kurz bevor die heiße Phase des Jazz in Ingolstadt im Herbst wieder anläuft? Wir von den Jazzfreunden jedenfalls begrüßen den Herbst mit einer ...</p>

    <h5>1. Jam Session am 27.09. (Sonntag) im Swept Away</h5>

    <p>Mittlerweile die 8. seiner Art! An diesem letzten Sonntag im September wird ein neues Quartett unter der Leitung von Bernadette Schreyer “berni schreyer &amp; friends”– Ex-Jazz GmbH und aktuelle Keyboarderin von Club Légère – gespickt mit Regensburger Jazzstudenten aufspielen. Ideal zum Aufwärmen für die vielleicht dann nahenden kühleren Tage. Wie immer werden Stücke aus den beiden Sessionbooks zum Mitspielen angeboten. Wir nehmen aber gerne auch Wünsche für Stücke entgegen. Vorneweg jedoch wird schon Anfang des Monats heiß aufgespielt denn ...</p>

    <hr />

    <h5>2. Open Flair und Neue Welt jazzen Anfang September!</h5>

    <p>Das Ende der Sommerferien muss nicht in Traurigkeit versinken, dafür sorgen jedes Jahr das Open Flair Festival und die Veranstaltung der Ingolstädter Musikszene in der Neuen Welt. Zahlreiche Ingolstädter Topstars (Rudi Trögl, Klangpatrouille, 4 of a kind, Eduard Israelov, Nick Flade, Ras Dashan) geben sich innerhalb kürzester Zeit ein Stelldichein. Grund genug sich entweder im Klangraumzelt von Nikolaj Rimsky-Korsakov (music-in) auf dem Open Flair (Klenzepark) oder in der Kleinkunstkneipe von Walter Haber und Josi Jauering (mit dem besten Chili der Stadt!) einen schönen Abend zu machen. Wichtige Termine sind oben im Jazzletter ausgewiesen. Ansonsten gibt’s genaue Infos:</p>

    <ul>
      <li>für die Neue Welt unter <a href="http://www.neuewelt-ingolstadt.de/frame.html">http://www.neuewelt-ingolstadt.de/frame.html</a></li>
      <li>für das Open Flair <a href="http://www.openflair-klenzepark.de/">http://www.openflair-klenzepark.de/</a></li>
    </ul>

    <p>Eingerahmt werden die Jazzleckerbissen im September von:</p>

    <ul>
      <li>Pit Müller’s Hot Stuff (3.9.): Stefan Wild, Chef des Rappensbergers, gönnt den Ingolstädtern KOSTENLOS nochmals das Jazzhighlight des letzten Bürgerfests</li>
      <li>Simon Seidls 4sinn machen am 23.9.09 im Diagonal Station auf ihrer Deutschlandtournee.</li>
      <li>In der Traditionswirtschaft “Gutmann” in Eichstätt – muss man gesehen haben! – gastieren das Rudi-Trögl-Trio (10.10.) und The Voice Connection (22.11.)</li>
    </ul>

    <p>Und da sage noch einer Ingolstadt hätte außer den Jazztagen im Jazz nichts zu bieten! Also nichts wie hin zu unseren lokalen Heros, Denn schon bald wird es dicke international, denn es naht der ...</p>

    <hr />

    <h5>3. Start des Kartenvorverkaufs für die 26. Ingolstädter Jazztage am 18.09.2009</h5>

    <p>Ja es ist wahr: Es nahen die nächsten Jazztage in Ingolstadt und man darf wieder gespannt sein auf ein fein austariertes und mit Neuigkeiten aufwartendes Programm aus der Feder von Jan Rottau, Festivalleiter und unser Kämpfer für internationalen Jazz in IN, und Josef Gutmann, die unermüdliche Schaltstelle im Kulturamt. Fest vormerken sollte man sich in jedem Fall schon mal den Beginn des Vorverkaufs am Freitag 18.09.2009 an den bekannten VVK-Stellen (Näheres im nächsten Jazzletter), denn was ich weiß, werden so manche Konzerte im Nu ausverkauft sein bei der Qualität der Megakünstler, die diesmal wieder Ingolstadt beehren. Für alle Vereinsmitglieder gibt es übrigens wie jedes Jahr exklusiv Karten im Kulturamt (Auf der Schanz 39) ohne Vorverkaufsgebühren (immerhin 10 % Ersparnis!!). Einen Künstler darf ich übrigens schon verraten, denn an ihn geht der ...</p>

    <hr />

    <h5>4. Jazzförderpreis der Stadt Ingolstadt 2009: Bernhard Hollinger</h5>

    <p>Traditionell beginnen die Ingolstädter Jazztage mit der Verleihung des Jazzförderpreises, und dieser geht heuer an den Bassisten Bernhard Hollinger.
      Der junge Ingolstädter war schon als Dreijähriger stolzer Besitzer einer Gitarre und eines Schlagzeugs – beide allerdings aus Plastik. In der dritten Klasse begann er mit klassischem Gitarrenunterricht und besuchte auch Kurse renommierter Gitarristen verschiedener Stilrichtungen wie z.B. Blues und Flamenco. Mit 16 Jahren wechselte er zum E-Bass und nahm Unterricht an der Ettinger Musikschule, wo er schnell Fortschritte an dem neuen Instrument machte. Während seiner Schul- und Ausbildungszeit war Musik ein ständiger und immer wichtiger werdender Begleiter. Während dieser Zeit spielte er in zahlreichen Gruppen, die sich unterschiedlicher Musik widmeten, z.B. Jazz, Funk, Gospel, Big-Band, Latin, Flamenco, und nahm an diversen Workshops z.B. bei Patrick Scales, Harald Rüschenbaum, Tom Good, … teil. Seit Ende 2007 ist er dazu Mitglied im Landesjugend-Jazzorchester Bayern. Die Musik führte ihn auch ins Ausland, z.B. nach Kroatien und seit einem Jahr nun nach Amsterdam, wo er 2008 sein Musikstudium am Konservatorium begann. Dort steht ihm der Unterricht bei verschiedenen Jazzmusikern (Erik van Lier, David Marez Oyens, Theo de Jong, Charlie Angenois, Johan Plomp), Masterclasses mit Jazzgrößen (Larry Grenadier – Brad Mehldau Trio, John Clayton – Count Basie), sowie die Möglichkeit alle erdenklichen Stilrichtungen hautnah mit Musikern und Mitstudenten aus der ganzen Welt zu erforschen, offen.</p>

    <p>Zur Eröffnung der 26. Ingolstädter Jazztage spielt der Förderpreisträger Berhard Hollinger am Sonntag, 18. Oktober in der Bürgerhauskneipe Diagonal. Beginn des Konzerts ist um 18 Uhr, der Eintritt ist frei.</p>

    <p>Herzlichen Glückwunsch, lieber Bernhard, ein Bassist, der bis zum seinem Jazzbassstudium in Amsterdam ab Herbst 2008 stets bei den Ingolstädter Jam Sessions vertreten war. Hier das aktuelle Interview vom Donaukurier:<br />
      <a href="http://www.donaukurier.de/nachrichten/kultur/Jazzfoerderpreis-geht-an-Bernhard-Hollinger;art598,2137538">http://www.donaukurier.de/nachrichten/kultur/Jazzfoerderpreis-geht-an-Bernhard-Hollinger;art598,2137538</a>
    </p>

    <div><img src="gfx/bernhardhollinger.jpg" alt="" /></div>

    <p>Und noch was gibt es zu feiern ...</p>

    <hr />

    <h5>5. Wir haben die 160! Neue Mitglieder</h5>

    <p>Dem 4. Summer Open Air sei es gedankt: Wir konnten unsere Mitgliederzahl rasant auf einmal auf 160 Mitglieder erhöhen! Und hier sind sie, unserer Neuzugänge:</p>

    <ul>
      <li>Familie Rasche: mit Henning, Ursula, Silke, Jens, Anke (einer der Herren ist Mitglied in der der Scheiner Jazzcombo!)</li>
      <li>Christine Roß, unsere Garantin für den besten Jazznachwuchs am Christoph-Scheiner-Gymnasium (Bigband und Jazzcombo)</li>
      <li>Gerold Matschi, besser bekannt als Ted, der Bass-Guru Ingolstadts: Keiner spielt schöner Sousaphon (Hokum &amp; Hilarity Orchestra)</li>
      <li>Familie Burmann mit Karsten, Regina, Jens und Nils, wobei letzterer für den unbestechlichen Groove der Katherl Jazzcombo zuständig ist</li>
    </ul>

    <p>Mal sehen, ob uns die Jazztage die nächsten Mitglieder bescheren, damit im Jahre 2010 die 200er Grenze fällt?? Na nun mal langsam, denn wir können mit Stolz behaupten, dass beinahe jeder aktive Jazzmusiker unserer Region sowie viele Jazzsympathisanten mittlerweile den Fördergedanken des Jazzfreundevereins nicht nur ideell, sondern auch finanziell (20 Euro für Schüler und Studenten, 40 Euro Normal, 60 Euro für Familien, stets pro Jahr) mittragen, wobei man auch ehrlich mitteilen sollte, dass der Verein schon einiges zu bieten hat:</p>

    <ul>
      <li>Karten für die Jazztage ohne Vorverkaufsgebühr</li>
      <li>Bei den Jazzparties Möglichkeit die Konzerte im Restaurant im VIP-Bereich zu genießen</li>
      <li>Jährlich ein Jazz-Bonuskonzert (kostenloser Eintritt) im Diagonal im Wert von ca. 15 Euro pro Karte</li>
      <li>Kostenloser Bezug der beiden Sessionbooks (2007 &amp; 2008), beide normalerweise 10 Euro kostend</li>
    </ul>

    <p>Damit wäre der erste Jahresbeitrag für Jazzfreunde schon mal amortisiert! Online-Abschluss der Mitgliedschaft ist übrigens sehr bequem auf unserer Homepage möglich:<br />
      <a href="http://www.jazzfreunde-ingolstadt.de/beitritt-online.php">http://www.jazzfreunde-ingolstadt.de/beitritt-online.php</a>
    </p>

    <p>Dann mal noch viele heiße Tage – wie auch immer ...</p>

    <div class="signum">Robert Aichner</div>

    <p class="small">PS: Und quasi als Nachschlag: Herzlich Willkommen Julia Knelange, deren Eintritt in den Verein ich gerade noch mitgeteilt bekommen habe!</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 29 ½  (11. Juli 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 29 ½</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 150</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde: 7. Jam Session am 24. Mai 09</p>

    <p><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=JS_20090524">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Terminberichtigung Rudi Trögl-Rainer Hasenkopf Duo am <span class="red">6. statt 5.09.09</span></li>
      <li>Charly Böcks Sambapito am Bürgerfest (So, 12.7.09 ab 20 Uhr)</li>
      <li>“So What” ebenfalls im Klangraumzelt am 5.09.09 (Open Flair)</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Fr - Sa</td>
        <td>10.-11.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>05.09.2009</td>
        <td>15.00 Uhr</td>
        <td>So What (Ingolstadt Open Flair/Klangraumzelt)</td>
      </tr>
      <tr style="color:red;">
        <td>Sonntag</td>
        <td>06.09.2009</td>
        <td>18.00 Uhr</td>
        <td>Rudi Trögl-Rainer Hasenkopf Duo (Ingolstadt Open Flair/Klangraumzelt)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>08.09.2009</td>
        <td>20.30 Uhr</td>
        <td>Trialogo und Emil &amp; Eduard (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>23.09.2009</td>
        <td>20.00 Uhr</td>
        <td>Simon Seidl &amp; 4sinn (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>10.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Backhaus Gaimersheim)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>22.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Gasthaus zum Gutmann Eichstätt)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Ein kleiner Nachschlag zum 29. Jazzletter. In aller Kürze</p>

    <h5>1. Terminberichtigung Rudi Trögl-RainerHasenkopf Duo am <span class="red">6. statt 5.09.09</span></h5>

    <p>Ein von den Jazzfreunden arrangierter Act nun mit richtigem Termin, Nick von music-in sei es gedankt!</p>

    <hr />

    <h5>2. Charly Böcks Sambapito am Bürgerfest (So, 12.7.09 ab 20 Uhr)</h5>

    <p>Ein kleiner Hilferuf vom Meister der Congas, Charly Böck. Gerne helfe ich:</p>

    <blockquote>
      <p>“Hallo Robert,</p>

      <p>kannst du die Info (charly böck &amp; sambapito live am bürgerfest) an die Jazzfreunde schicken.<br />
        Aus verschiedenen Gründen konnte der Auftritt nicht in das Bürgerfestprogramm aufgenommen werden.<br />
        Daher bin ich dran den Termin auf diesem Wege bekannt zu machen.</p>

      <p>Danke</p>

      <p>Charly”</p>
    </blockquote>

    <p>Die Info gibt es im Anhang!</p>

    <hr />

    <h5>3. “So What” ebenfalls im Klangraumzelt am 5.09.09 (Open Flair)</h5>

    <p>Gerade auf der frisch ins Netz gestellten Homepage (<a href="http://www.so-what.info">http://www.so-what.info</a>) entdeckt. Auch “So What” spielt in Nicks Klangraumzelt am Open Flair, genau: Am Samstag 5.9.09 ab 15 Uhr.</p>

    <p>Dann ein schönes und sonniges Bürgerfest!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 29  (06. Juli 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 29</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 150</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde: 7. Jam Session am 24. Mai 09</p>

    <p><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=JS_20090524">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Summer Jazz Open Air dieses Wochenende beim Bürgerfest</li>
      <li>Jazzpiano-Infoveranstaltung mit Eduard Israelov, 18. Juli (Sa) um 10 Uhr</li>
      <li>Das 150. Vereinsmitglied!!</li>
      <li>E-Mail-Adressen von Jazzletter-Empfänger, die nicht funktionieren</li>
      <li>Band für Sommerfest des MBA-Studiengangs der Uni EI am 18.7.09 gesucht</li>
      <li>Regionaler Jazz am laufenden Band</li>
      <li>Diverse Jazzkurse, Workshops oder Fortbildungen</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Fr - Sa</td>
        <td>10.-11.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr style="color:red;">
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Open-Air-Jazzfestival des Jazzclubs “Birdland” (entfällt!)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>05.09.2009</td>
        <td>19.00 Uhr</td>
        <td>Rudi Trögl-Rainer Hasenkopf Duo (Ingolstadt Open Flair)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>08.09.2009</td>
        <td>20.30 Uhr</td>
        <td>Trialogo und Emil &amp; Eduard (Musikszene: Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>23.09.2009</td>
        <td>20.00 Uhr</td>
        <td>Simon Seidl &amp; 4sinn (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>10.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Backhaus Gaimersheim)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>22.11.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Gasthaus zum Gutmann Eichstätt)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Nach längerer Pause wieder ein Jazzletter ... “Endlich”, mag sich mancher denken, denn fast 2 Monate sind schon eine ganze Menge, erinnere ich mich an die Anfangszeiten des Jazzletters, in denen beinahe jede Woche ein Letterchen in das Mailböxchen flog ... Jetzt aber zu den Fakten, Fakten, Fakten ... Es geht los mit dem</p>

    <h5>1. Summer Jazz Open Air dieses Wochenende beim Bürgerfest</h5>

    <p>Schon das vierte seiner Art im Innenhof des Hotels Rappensberger – Stefan Wild, dem Pächter sei es herzlichst gedankt! Vom Jazzfreundeverein veranstaltet trägt das Mini-Jazzfestival zur Beruhigung der erhitzten Bürgerfestgemüter am Freitagabend (10. Juli) und Samstag (11. Juli) ab 14 Uhr bis tief in die Nacht bei unter dem Motto “Das andere Bürgerfest” bei. Groovig und energiegeladen wird es aber bei uns auch, nur auf hohem Niveau. Dafür sorgen schon die Bands, die da sind:</p>

    <h6>Freitag 10.7.</h6>
    <ul>
      <li>18.30 – 20 Uhr Passa Tempo (mit dem Starpianisten Eduard Israelov)</li>
      <li>ab 20.30 Uhr Birdland-Jazzband (Hit-Garanten Nr. 1 in der Region)</li>
    </ul>

    <h6>Samstag 11.7.</h6>
    <ul>
      <li><span style="text-decoration:underline;">14 – 18 Uhr: Young Jazzplayers in Concert (Dem Nachwuchs eine Chance!):</span>
        <ul>
          <li>14 – 15 Uhr: Jazz GmbH</li>
          <li>15 – 16 Uhr Jazz Club </li>
          <li>16 – 17 Uhr Jazzplayers</li>
          <li>17 – 18 Uhr Scheiner Jazzband </li>
        </ul>
      </li>
      <li>19 - 20 Uhr Club Légère (Coole Sounds und heiße Beats!)</li>
      <li>ab 20.45 Uhr Pit Müller’s Hot Stuff (Einer der Knaller der letztjährigen Jazz-in-den-Kneipen-Reihe)</li>
    </ul>

    <p>Und zum Essen und Trinken gibt’s auch genügend, dafür sorgt schon die Spezialkarte des Rappensberger! Also rein in den Innenhof und den Jazz genießen! Wir, der Jazzverein, freuen uns auf zahlreiche Zuhörer! Die werden auch am übernächsten Wochenende erwartet bei der ...</p>

    <hr />

    <h5>2. Jazzpiano-Infoveranstaltung mit Eduard Israelov, 18. Juli (Sa) um 10 Uhr</h5>

    <p>Brigitte Pinggera, stellvertretende Leiterin der Simon-Mayr Musikschule, wartet mit einer erfreulichen Meldung auf. Sie schrieb mir:</p>

    <blockquote>
      <p>Im kommenden Schuljahr 2009/2010 wird Eduard Israelov an der Simon Mayr Sing- und Musikschule Jazzpiano unterrichten. Am Samstag, den 18. Juli, 10:00 wird Hr. Israelov eine kostenlose Infoveranstaltung für interessierte Jugendliche und Erwachsene zu seinem Unterricht abhalten. Die Infoveranstaltung findet in Zimmer 37 der Simon Mayr Sing- und Musikschule, Brückenkopf 3, 85051 Ingolstadt statt. Der vielseitige Musiker Eduard Israelov ist als Pianist, Dirigent und Komponist vor allem im Jazzbereich tätig. Er wirkte an zahlreichen Rundfunk- und Fernsehproduktionen mit und spielte u.a. mit Jazzlegenden wie Benny Golson und Jimmy Woody. Seit Jahren ist er der Pianist der Audi Big Band.</p>
    </blockquote>

    <p>Da sind sie schon erkennbar, die ersten öffentlichen Ausläufer der geplanten Jazz- und Rock-Abteilung der städtischen Musikschule! Wieder eine Wachstumsmeldung, die von der nächsten – wenigstens für uns Vereinsmitglieder – übertroffen wird, denn wir haben es, man glaubt es kaum, geschafft: Wir feiern ...</p>

    <hr />

    <h5>3. Das 150. Vereinsmitglied!!</h5>

    <p>Bei 145 blieb der Zähler des letzten Jazzletters stehen und dann passierte es: Mit einem Schlag sicherte sich die 5-köpfige Familie Mittnacht, deren Tochter Ella in der Nachwuchscombo “Jazz GmbH junior” des Reuchlin-Gymnasiums trommelt, die 150. Mitgliedschaft und somit Karten für die 26. Jazztage, deren Planungen sich gerade in der heißen Phase befinden.</p>

    <p>HERZLICHSTE GLÜCKWÜNSCHE VON DIESER ELEKTRONISCHEN SEITE AUS AN DIE FAMILIE MITTNACHT UND HERZLICH WILLKOMMEN IN DER REGIONALEN JAZZFAMILIE, DIE SICH STETIG VERGÖßERT!</p>

    <p>Apropos vergrößern, die Empfängerliste des Jazzletters hat sich etwas verkleinert, denn schon wieder schleichen sich ein paar in meinen Verteiler ein, die ....</p>

    <hr />

    <h5>4. E-Mail-Adressen von Jazzletter-Empfänger, die nicht funktionieren</h5>

    <p>Nur kurz: Falls mir jemand beim Aufspüren der richtigen E-Mail-Adressen wie folgt helfen kann, der sichert den Genannten auch das weitere Vergnügen dieses Rundbriefs. Also, es funktionieren nicht mehr:</p>

    <ul>
      <li class="attachment">Die Liste kann nur direkt im Newsletter eingesehen werden.</li>
    </ul>

    <p>Über Hilfe bin ich dankbar. So dankbar wie Simon Woll, falls sich jemand bei ihm meldet, denn es wird eine ...</p>

    <hr />

    <h5>5. Band für Sommerfest des MBA-Studiengangs der Uni EI am 18.7.09 gesucht</h5>

    <p>Simon, Tenorsaxofonist bei diversen Ingolstädter Jazzgruppen und legendärer Jazztage-Promi-Fahrer ;-)) schreibt:</p>

    <blockquote>
      <p>“Hallo Robert,</p>

      <p>wende mich mit einer recht "kurzfristigen" Bitte bzw. Anfrage an Dich. Kannst Du folgendes bitte über den Vereinsverteiler schicken?! Danke.</p>

      <p>Der MBA-Studiengang der Katholischen Universität EI/IN sucht für den 18. Juli 2009 ab ca.19.00 Uhr eine musikalische Umrahmung für ihr Sommerfest in Ingolstadt. Es sollte lockere, abwechslungsreiche und unterhaltsame (Cover-)Musik sein, die nicht notwendigerweise jazzig sein muss. Eine Gage gibt es natürlich auch. Sollte sich also eine "kurzfristig" verfügbare Band finden, bitte Kontaktdaten und möglicherweise ein Hörbeispiel bzw. Referenzen an mich senden.</p>

      <p>Vielen Dank und bis bald</p>

      <p>Simon Woll”</p>
    </blockquote>

    <p>Schon öfters konnte durch diesen Jazzletter geholfen werden, so dass sich die berühmte “Win-Win-Situation” ergab. Dienstleister des Jazz! Auch eine Aufgabe des Jazzvereins ... Motor für die regionale Szene ... aber die überholt sich sowieso gerade, denn er ist nicht mehr zu bremsen, unser ...</p>

    <hr />

    <h5>6. Regionaler Jazz am laufenden Band</h5>

    <p>Sei es der Jazzgitarrist Rudi Trögl, der mit seinem Duo oder Trio in den nächsten Wochen und Monaten in der Region tourt (<a href="http://www.rudi-troegl.de">http://www.rudi-troegl.de</a>), sei es die A-Cappella-Formation “The Voice Connection”, die geballt im November die Vocaljazzfahne im Eichstätter Raum hochhält (<a href="http://www.the-voice-connection.de/start">http://www.the-voice-connection.de/start</a>), sei es der viel gerühmte Jazzpianist Simon Seidl im September mit 4sinn im Diagonal (<a href="http://www.myspace.com/4sinn">http://www.myspace.com/4sinn</a>), sei es Eduard Israelov (<a href="http://www.jazzgeneral.de/piano/piano.html">http://www.jazzgeneral.de/piano/piano.html</a>), das Jazzklavier-Urgestein im Rahmen der Ingolstädter Musikszene in der Neuen Welt ... Der Jazz in IN und Region läuft und läuft und läuft (Termine siehe Übersicht zu Beginn des Jazzletters) ... Und am Laufen halten ihn auch ...</p>

    <h5>7. Diverse Jazzkurse, Workshops oder Fortbildungen</h5>

    <p>Überall in der Region sprießen die Jazzblüten, die jedoch mit neuem Input und frischem Wissen gedüngt und gegossen werden können. Dafür gibt es immer mehr Kursangebote verschiedener Träger. Und deshalb zum Schluss noch für alle Lernwilligen aktuelle Workshops:</p>

    <p>Gleich diesen Donnerstag, 9.7.09 findet von 9.30 bis 16 Uhr eine regionale Lehrerfortbildung (RLFB) im Reuchlin-Gymnasium statt mit dem Thema “Literaturbörse für Schul-Bigband-Arrangements”. Leider nur für Lehrer und für noch Teilnahmewillige sehr kurzfristig. Aber wer noch will und seinen Schulchef von Notwendigkeit einer Befreiung überzeugen kann, darf noch einsteigen. Nähere Infos im Anhang.</p>

    <p>Weiter geht es am Montag, den 20. Juli ab 9.30 Uhr mit der RLFB für Lehrkräfte aller Schularten mit dem Thema „Workshop Jazz-Solo- &amp; Ensemblespiel“ im Werner-Heisenberg-Gymnasium Garching bei München. Auch hier Infos im Anhang. Beide RLFBs sind übrigens Veranstaltungen der LAG Jazz an Schulen in Bayern.</p>

    <p>Und zuletzt: Jazz and more - Vokale und instrumentale Kurse. In diesem Workshop werden konzertreife Bigband-Repertoires erarbeitet. Weitere Schwerpunkte sind Satzspiel, Artikulation und Phrasierung in Swing, Jazz und Latin, Grundlagen der Improvisation, Gehörbildung, Vertiefung der allgemeinen Grundlagen des Instruments und ein Einblick in die Geschichte des Jazz. Kursleitung: Prof. Klaus Graf, Prof. Martin Schrack, Veit Hübner u.a.;Termin: 31.08.2009 - 06.09.2009; Ort: Ochsenhausen (Baden-Württtemberg). Anmeldung: Landesakademie für die musizierende Jugend, Telefon 07352-91100, sekretariat@landesakademie-ochsenhausen.de, www.landesakademie-ochsenhausen.de</p>

    <p>Zu guter Allerletzt noch was für die Jugendlichen: Die “Jazz Juniors” vom 3. August 2009 bis 7. August 2009 in der Bayerischen Musikakademie Schloss Alteglofsheim, der beliebte Ferientermin für junge Musiker zwischen 10 und 15 Jahren, die bereits ein Instrument spielen und gerne das Zusammenspiel mit anderen Musikern und freies Musizieren ausprobieren möchten. Vorausgesetzt werden Grundkenntnisse am Instrument. Eine Begegnung mit Jazz sollte schon einmal stattgefunden haben, ist aber nicht erforderlich. Für Betreuung rund um die Uhr ist gesorgt, ein entsprechendes Rahmenprogramm auch außerhalb des Probenraumes mit Bewegung und Frischluft wird angeboten. Veranstalter: Landesjugendjazzorchester und “jugend jazzt”. Infos unter <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_alteglofsheim.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_alteglofsheim.html</a></p>

    <p>That’s it! Man sieht sich, hoffentlich ohne Regenschirm ...</p>

    <div class="signum">Robert Aichner</div>

    <p class="small">PS: Wann wird’s mal wieder richtig Sommer? Du-du- du- du- du- du ...</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 28  (18. Mai 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 28</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 145</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde (= Young Jazz Player im Birdland):</p>

    <p><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=Birdland_20090426&amp;via=termine">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=Birdland_20090426&amp;via=termine</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>“So What” bei der 7. Jam Session am So 24.5.09 ab 19 Uhr im Diagonal</li>
      <li>Jazzband für Frühschoppen am So 12.7.09 auf der Bühne Donaustraße gesucht!</li>
      <li>Heri Mayr sucht ebenfalls für Familienfeier am So 5.7.09 in Manching eine Jazzband!</li>
      <li>Simon Seidl sucht gebrauchtes Klavier</li>
      <li>Abbamobil sucht Zuhörer am Mi 20.5.09 ab 20 Uhr im Diagonal</li>
      <li>Sucht jemand einen Homerecording-Kurs? Ich hätte einen am 27.6.09 bei music-in</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Mittwoch</td>
        <td>20.05.2009</td>
        <td>20.00 Uhr</td>
        <td>Abbamobil (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td style="color:red;">10.-11.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr style="color:red;">
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Open-Air-Jazzfestival des Jazzclubs “Birdland” (Schlosshof Neuburg)<br /><span class="emboss red">REALISIERUNG SEHR UNSICHER!</span></td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.06.2009</td>
        <td>19.30 Uhr</td>
        <td>Rudi Trögl Trio (Atelier des Künstlers Viktor Kraus, Kinding)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td style="color:red;">10.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann) <span style="color:red">TERMINÄNDERUNG</span></td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Sind wir nicht alle irgendwie auf der Suche? Vielleicht kann dieser Mai-Jazzletter ja dann zur frischen Frühlings-Findungsaktion beitragen. Gesucht und gefunden hatten sich jedenfalls am letzten Aprilsonntag an die 50 junge Jazzmusiker im Birdland Jazzclub Neuburg. Es war eine Riesenparty mit ausgesprochenen musikalischen Leckerbissen. Mafred Rehm vom Jazzclub Birdland will uns wieder haben, Mädels und Jungs! Voller Erfolg auf ganzer Linie, wie auch auf den Fotos (Link oben) zu sehen ist. Wer nicht dabei war, hat was verpasst. Aber keine Panik, gibt es doch wieder zahlreiche Möglichkeiten für Jazzmusiker und -genießer, sich in der Region aktiv spielend oder passiv zuhörend im vor der Tür stehenden Frühsommer in IN zu beteiligen. So z. B. zusammen mit ...</p>

    <h5>1. “So What” bei der 7. Jam Session am So 24.5.09 ab 19 Uhr im Diagonal</h5>

    <p>Die letzte Session vor der Sommerpause – beim 4. Summer-Jazz-Open-Air am Bürgerfest-Freitag und –Samstag (10. Und 11. Juli) treten nur feste Formationen auf – bringt erstmalig “So What”, eine etablierte Swing- / Soul-Formation auf die Bühne, die fleißigen Summer-Jazz-Open-Air-Besuchern sicher nicht unbekannt ist, versüßte die Band doch in den letzen Jahren stets den Samstag-Nachmittagskaffee im Rappensberger. Eingeladen zu dieser mittlerweile 7. Ingolstädter Session sind alle Musiker jeglichen Alters und Niveaus, die sich in den Welten des Jazz einigermaßen zurechtfinden. Bitte Equipment (Verstärker z.B.) selbst mitnehmen. Die nächste Session ist übrigens höchstwahrscheinlich am 27.9.09 im Swept Away; dafür suchen wir noch eine Sessionband, ebenfalls wird eine ...</p>

    <hr />

    <h5>2. Jazzband für Frühschoppen am So 12.7.09 auf der Bühne Donaustraße gesucht!</h5>

    <p>Nick von music-in bietet beim diesjährigen Bürgerfest wieder an, dass auf der Bühne in der Donaustraße eine Jazzband zum Frühschoppen am Sonntag 12. Juli auftreten kann. Ein bisschen was wird dabei für die Bandkasse rausspringen. Wer also mal abseits des Bandprobenraums eine wirklich professionelle Bühne sucht, wird hier fündig. Bitte gleich mit Nick Kontakt aufnehmen. Hoffe der Nächste wird auch fündig, denn ...</p>

    <hr />

    <h5>3. Heri Mayr sucht ebenfalls für Familienfeier am So 5.7.09 in Manching eine Jazzband!</h5>

    <p>Wer bei der Big-Band-Nacht 2009 aufmerksam das Helferpersonal studiert hat, dem kann Heri nicht entgangen sein: Er war der stets hilfsbereite und unglaublich nette und dabei immer professionelle Backstage-Powerman mit Baseball-Kappe! Und nun sucht Heri am 5. Juli eine Jazzband für die Umrahmung einer Familienfeier in Manching. Ich würde ihm sofort mit meiner Jazz GmbH zur Seite springen und bei ihm aufspielen, nur bin ich selbst auf einer Familienfeier genau am gleichen Tag unterwegs. Also: Wer kann Heri helfen? Gleich melden unter</p>

    <p>Heribert Mayr, Schreinerei<br />
      Ingolstädter Str. 27 85077 Manching<br />
      Tel. 08459 915 Fax 08459 7267<br />
      www.h-mayr.de</p>

    <p>Der Nächste bitte ...</p>

    <hr />

    <h5>4. Simon Seidl sucht gebrauchtes Klavier</h5>

    <p>Helfen wir doch alle unserem sicher noch vielen bekannten Studenten des Jazzpianos in Köln, der mir folgendes zusteckte:</p>

    <blockquote>
      <p>“Liebe Jazzfreunde!<br />
        Ich suche ein akustisches!! und gut spielbares Piano für mein Elternhaus bei Ingolstadt. Da ich in Köln studiere habe ich mein Piano letzte Woche nach Nordrhein Westfalen kommen lassen und suche jetzt ein Ersatzinstrument, damit ich, wenn ich nach Hause komme, weiter spielen kann. Ich würde mich über Angebote sehr freuen!!</p>

      <p>mobil:0176/61539098</p>

      <p>Vielen Dank und bis bald!</p>

      <p>Simon”</p>
    </blockquote>

    <p>Falls das klappt, könnten wir Simons pianistisches Niveau auch in Ingolstadt erhalten, wenn er mal wieder zu Besuch ist und uns mit einem Konzert überrascht. Bis dahin brauchen wir auf Highlights nicht zu warten, denn auch ...</p>

    <hr />

    <h5>5. Abbamobil sucht Zuhörer am Mi 20.5.09 ab 20 Uhr im Diagonal</h5>

    <p>So was hat Ingolstadt selten gehört: Abba verjazzt in Soulkleid mit Funkkaskaden! Auf geht’s am Mittwoch zu Charly Böcks neuestem innovativen Projekt ABBAMOBIL am Mittwoch, 20. 05. 2009, um 20 Uhr im Diagonal!</p>

    <p><b>Abbamobil, das sind</b></p>

    <table border="0" cellspacing="4" cellpadding="2">
      <tr>
        <td>Silke Straub</td>
        <td>vocals</td>
      </tr>
      <tr>
        <td>Kathrin Kohlmann</td>
        <td>vocals</td>
      </tr>
      <tr>
        <td>Markus Rießbeck</td>
        <td>sax</td>
      </tr>
      <tr>
        <td>Tobias Schöpker</td>
        <td>bassclarinet</td>
      </tr>
      <tr>
        <td>Christoph Müller</td>
        <td>trombone</td>
      </tr>
      <tr>
        <td>Norbert Meyer-Venus</td>
        <td>bass</td>
      </tr>
      <tr>
        <td>Budde Thiem</td>
        <td>piano</td>
      </tr>
      <tr>
        <td>Werner Treiber</td>
        <td>drums</td>
      </tr>
      <tr style="font-weight:bold; font-style:italic;">
        <td>Charly Böck</td>
        <td>percussion</td>
      </tr>
    </table>

    <blockquote>
      <p>“Der Ingolstädter Meister-Percussionist Charly Böck präsentiert mit seiner neuen Formation Abbamobil am Mittwoch, 20. Mai, um 20 Uhr die Hits des Schweden-Quartetts Abba im Jazz-Gewand. So wird aus „Money, Money, Money“ heißes Geld aus Südamerika „Dinheiro“, die „Dancing Queen“ mutiert zur „Disco Queen“ und sogar Napoleon hätte seine Freude an einem flott swingenden „Waterloo“ gehabt. Ansonsten schüttet sich „Fernando“ Salsa über die Uniform, „Gimme, Gimme“ wird zu Jamaicas Nationalhymne und am Ende räumt „The Winner“ alles ab und bedankt sich mit einem fetzigen „Thank you“ für die Musik. Alles in allem ein gut fusio- und funktionierendes Latin-Swing-Programm, das nicht nur 70er Jahre-Saurier zum Zappeln bringt. Im passenden „blond &amp; black“ sorgen die beiden Frontdamen weit reichend für ein „besser als das Original“-Gefühl beim Publikum. Unterstützt werden sie dabei vom LittleBigBand-Sound des Bläsersatzes und einer kompakten Funkybass-Percussion-Drums-Dreierkette. Der Pianist und Arrangeur Budde Thiem vervollständigt die neunköpfige Band.</p>

      <p>Karten zu diesem Konzert sind im Bürgerhaus, im Diagonal und in der DK-Geschäftsstelle erhältlich. Eintritt: 10.- €/ 6.- €</p>

      Weitere Informationen unter: <a href="http://www.buergerhaus-ingolstadt.de">http://www.buergerhaus-ingolstadt.de</a>”</p>
    </blockquote>

    <p>Und wer bis jetzt für die letzten Maitage noch nicht fündig geworden ist ...</p>

    <hr />

    <h5>6. Sucht jemand einen Homerecording-Kurs? Ich hätte einen am 27.6.09 bei music-in</h5>

    <p>Wieder eine Initiative von Nick aus dem Musikgeschäft music-in, die sicher Interessenten bei den Jazzletter-Lesern finden könnte: Ein Homerecording-Kurs; aber Näheres im O-Ton Nick:</p>

    <blockquote>
      <p>“Hallo Musikanten und Soundfreaks,</p>

      <p>Tom Zauner ist Tonmeister, Studiobetreiber, Livemixer für z.B. Bonfire/Konstantin Wecker und obendrein ein Pfundskerl.<br />
        Am Samstag den 27.06.09 bietet er im Musikzentrum in der Donaustraße 14 einen 3-stündigen Workshop zum Thema Homerecording an.<br />
        Heutzutage kann man sich für wenig Geld ein komplettes Studio einrichten und doch sind die Ergebnisse oft nicht zufrieden stellend. Das liegt einfach daran dass immer noch der Mensch den Sound macht und nicht das Equipment.<br />
        Wie man dieses bedient, wird Euch in anschaulicher Weise vermittelt.</p>

      <p>Bitte einfach die Anmeldung ausfüllen und zurückmailen oder faxen an: 0841-9939055 Siehe Anlage!<br />
        Die Kursgebühr über Euro 30.- bitte am Kurstag mitbringen.</p>

      <p>Keep groovin'</p>

      <p>Nick”</p>
    </blockquote>

    <p>Das Anmeldeformular liegt bei.</p>

    <p>Dann sind wir wieder am Ende unseres Jazzletters angekommen. Hoffe, ich habe nichts vergessen. Falls jemand ebenfalls veröffentlichungswürdige Daten, Konzerte, Kurse, Gesuche etc. hat, die in gewisser Weise mit Jazz zu tun haben, dann einfach Mail an mich und falls es passt erscheint es hier für über 360 Leser, denn die Gemeinde wächst stetig! Redaktionsschluss ist übrigens immer so Mitte des Monats, denn je nach meiner zeitlichen Lage – im Hauptberuf bin ich immer noch als Musiklehrer am Reuchlin-Gymnasium tätig – erscheinen die Jazzletters gegen Ende des Monats.</p>

    <p>Auf in den Sommer!!!</p>

    <div class="signum">Robert Aichner</div>

    <p class="small">PS: Ich persönlich begebe mich demnächst auch auf die Suche: Ein Haus (Einfamilienhaus, Doppelhaushälfte, Reiheneckhaus) in Ingolstadt für meine 4-köpfige Familie solls sein, nicht zu weit vom Zentrum weg, für Musiker geeignet und gerne mit eigenem Studio / Anbau zwecks Büro oder Musikraum, Garten kein Hindernis. Wer suchet der findet. Wer wünschet, dem wird gegeben. Familiendienliche Hinweise bitte direkt an mich ;-)</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 27  (17. April 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 27</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 145</p>

    <hr />

    <p class="emboss red">Aktuelle Fotos vom Verein der Jazzfreunde (= Big Band Nacht):</p>

    <p><a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=BBN1_Auftritte&amp;image=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=BBN1_Auftritte&amp;image=1</a></p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Nachbericht zur erfolgreichen 1. Big Band Nacht am 21.3.2009</li>
      <li>Young Jazz Players am 26.4.09 ab 19 Uhr im Neuburger Jazzclub Birdland</li>
      <li>Verein packt weitere Hürde: Das 150. Mitglied naht samt satter Belohung (es lohnt sich!)</li>
      <li>“Klangpatrouille” sucht dringend einen Probenraum</li>
      <li>Anmeldeschluss für die Ingolstädter Musikszene 2009 am 22.4.2009</li>
      <li>Verzeichnis “Jazz.IN – das Jazzverzeichnis für die Region Ingolstadt” ist fertig</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>26.04.2009</td>
        <td>20.00 Uhr</td>
        <td>Etna (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.04.2009</td>
        <td>19.00 Uhr</td>
        <td>10. Young Jazz Players Session (Birdland / Neuburg)</td>
      </tr>
      <tr style="color:red;">
        <td>Mittwoch</td>
        <td>13.05.2009</td>
        <td>20.00 Uhr</td>
        <td>Bill Evans Group (Diagonal) ENTFÄLLT!!</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Open-Air-Jazzfestival des Jazzclubs “Birdland” (Schlosshof Neuburg)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.06.2009</td>
        <td>19.30 Uhr</td>
        <td>Rudi Trögl Trio (Atelier des Künstlers Viktor Kraus, Kinding)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td style="color:red;">10.10.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann) <span style="color:red">TERMINÄNDERUNG</span></td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Wie gewohnt einmal pro Monat kommt heute der aktuelle Jazzletter des Ingolstädter Jazzfreundevereins mit vielen interessanten Infos zu unserer immer weiter wachsenden Jazzszene in IN und um IN herum in die Mailbox geflattert.<br />
      Ein großes Event, die 1. Big Band Nacht der Ingolstädter Schulen, sowie die Erstellung des Jazzverzeichnisses für die Region Ingolstadt, liebevoll und professionell erstellt von Katrin Poese, sind abgeschlossen;<br />
      Premieren wie die 1. Session der Jazzfreunde im Neuburger Jazzclub Birdland oder das 1. Kinder-Jazzkonzert “Jazz for kids” bei den 26. Ingolstädter Jazztagen stehen in den Startlöchern;<br />
      bewährte Produkte wie die Jam Sessions, das Summer Jazz Open Air, oder die Ingolstädter Jazztage kommen in die heiße Planungsphase ...</p>

    <p>... Gründe genug, am Ball zu bleiben, z. B. bei der Lektüre vom ... </p>

    <h5>1. Nachbericht zur erfolgreichen 1. Big Band Nacht am 21.3.2009</h5>

    <p>Eine besonders erfolgreiche 1. Big Band Nacht der Ingolstädter Schulen zählt mittlerweile schon wieder seit knapp einem Monat zur Geschichte. Zeit wird es, dass ich mich an dieser Stelle bei allen Beteiligten, Mitwirkenden wie Organisatoren, Medienleuten wie Zuschauern auf das herzlichste für die tolle Zusammenarbeit bedanke! Besonders hervorheben möchte ich aber eine Person, die mir bei der Planung und Durchführung immer zur Seite gestanden hat, die wirklich bei jeder Besprechung anwesend war, die sich nicht schade zu war für die vielen Arbeiten im Hintergrund und unseren Jazzverein dabei auf das Beste als 1. Vorsitzender präsentiert: Reimund Domke!! Es hat uns übrigens bei der Organisation so viel Spaß gemacht, dass wir bereits jetzt schon über der 2. Big Band Nacht brüten, die vielleicht schon 2010 stattfinden könnte.
      Um die ausgezeichnete Stimmung nochmals nacherleben zu können, nun in diesem Mail eine ausführliche Pressenachlese:</p>
    <ol class="nolist">
      <li><span class="hl">1. Printmedien (ein herzliches “Danke” federführend hier an Anja Witzke vom DK!)</span>
        <ul>
          <li>DK Vorankündigung <a href="http://www.donaukurier.de/lokales/ingolstadt/Ein-grosses-Forum-fuer-den-Nachwuchs;art599,2061013">http://www.donaukurier.de/lokales/ingolstadt/Ein-grosses-Forum-fuer-den-Nachwuchs;art599,2061013</a></li>
          <li>DK Konzertkritik <a href="http://www.donaukurier.de/lokales/ingolstadt/Hoerbare-Freude-am-Sound;art599,2068375">http://www.donaukurier.de/lokales/ingolstadt/Hoerbare-Freude-am-Sound;art599,2068375</a></li>
          <li>Neuburger Rundschau Bericht (siehe Anhang)</li>
          <li>Newsletter der Stadt Ingolstadt (siehe Anhang)</li>
        </ul>
      </li>
      <li><span class="hl">2. Radioberichte (hier großen Dank an Kerstin Schulz und Gabriele Schmidt von Radio IN!)</span>
        <ul>
          <li>am Sonntag, 29.3. Um 11 Uhr auf Radio IN: Bericht im Kulturkanal (Nachzuhören unter <a href="feed://www.radio-in.de/radioin_kulturkanal.xml">feed://www.radio-in.de/radioin_kulturkanal.xml</a>)</li>
          <li>Vorankündigung durch Radio IN (produziert von Kerstin Schulz): lief vorab auf Radio IN und Radio Galaxy</li>
        </ul>
      </li>
      <li><span class="hl">3. TV-Berichte (großartige Arbeit von Sabine Roelen und Georg Siegwardt von intv!)</span>
        <ul>
          <li>Vorankündigung von IN TV am 13.3.09, ansehbar unter <a href="http://intv.de/flv/kalender.php?ausgabe=090313">http://intv.de/flv/kalender.php?ausgabe=090313</a><br />(auch unter <a href="http://www.youtube.com/watch?v=NY8TV1kU6bM">http://www.youtube.com/watch?v=NY8TV1kU6bM</a>)</li>
          <li>Ausführlicher Bericht Nr. 1 in IN TV am 24.3.09, ansehbar unter <a href="http://intv.de/flv/kalender.php?ausgabe=090324">http://intv.de/flv/kalender.php?ausgabe=090324</a></li>
          <li>Ausführlicher Bericht Nr. 2 in IN TV am 26.3.09, ansehbar unter <a href="http://intv.de/flv/kalender.php?">http://intv.de/flv/kalender.php?</a></li>
        </ul>
      </li>
      <li><span class="hl">4. An die 200 Fotos (perfekt wie immer erstellt von Christian Pacher und Anton Knoblach!)</span>
        <ul>
          <li>auf der Homepage der Jazzfreunde: <a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=BBN1_Auftritte&amp;image=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=BBN1_Auftritte&amp;image=1</a></li>
          <li>Bilder des DK unter <a href="http://www.donaukurier.de/bivi/bilder/bilduebersicht/cme131690,0.html?SORT=PRIO">http://www.donaukurier.de/bivi/bilder/bilduebersicht/cme131690,0.html?SORT=PRIO</a></li>
        </ul>
      </li>
      <li><span class="hl">5. Internetberichte (wie bei der Organisation unermüdlich auch hier im Einsatz: Beate Diao!)</span>
        <ul>
          <li>Auf der Kinderseite der Stadt Ingolstadt <a href="http://www.kidnetting.de">http://www.kidnetting.de</a></li>
        </ul>
      </li>
      <li><span class="hl">6. Persönliche Statements (siehe Anhang)</span></li>

    </ol>

    <p>Big Points für ein Big Event! Nun sollen aber wie bereits in den letzten Jahren schon bewiesen die kleineren Ensembles, die Jazzcombos ihr Können unter Beweis stellen: Vorhang auf für eine Premiere, die ...</p>


    <hr />

    <h5>2. Young Jazz Players am 26.4.09 ab 19 Uhr im Neuburger Jazzclub Birdland</h5>

    <p>
      Zum 1. Mal bietet der Jazzclub Birdland in Neuburg a. d. Donau – Danke Manfred Rehm für Dein offenes Ohr und Tor!! - in Zusammenarbeit mit dem Verein der Jazzfreunde Ingolstadt e.V. Jugendlichen die Gelegenheit am Sonntag, den 26. April 2009, ab 19 Uhr ihr Können in den Schulcombos im „Mekka des bayerischen Jazz“ einem fachkundigen Publikum zu präsentieren. Es werden auftreten:</p>

    <ul>
      <li>Die Jazzgruppe des Christoph-Scheiner-Gymnasiums unter Leitung von Christine Ross</li>
      <li>Der „Jazz Club“ vom Gnadenthal-Gymnasium unter Leitung von Bernhard Reitberger</li>
      <li>Die „Jazz Players“ des Katharinen-Gymnasiums unter Leitung von Charly Leimer</li>
      <li>Die „Jazz GmbH“ des Reuchlin-Gymnasiums unter Leitung von Robert Aichner</li>
    </ul>

    <p>Nach einem Kurzprogramm der einzelnen Formationen steht es im Sinne einer offenen Bühne allen Musikern jeglichen Alters frei, sich bei dieser Session zu beteiligen. Basis des gemeinsamen Spiels stellen die vom Verein herausgebrachten Sessionbooks 2007 &amp; 2008 dar, die wesentliche Standards der Jazzliteratur beinhalten. Diese können bei den Musiklehrern sowie beim Vorsitzenden des Jazzvereins, bei Reimund Domke (DER-Reisebüro, Milchstraße 1), gegen einen geringen Unkostenbeitrag (für Vereinsmitglieder kostenlos) bezogen werden.<br />
      Der Eintritt für die bis ca. 21.30 Uhr dauernde Session ist frei; Platzreservierungen sind nicht möglich. Die Parkmöglichkeiten in der Neuburger Altstadt sind stark eingeschränkt; bitte deshalb die auf der Karte (siehe Anhang) vermerkten Parkplätze unterhalb der Altstadt benutzen.<br />
      Für alle, die noch in dieser Zeit finden zum Üben, hier ein paar Nummern, die an diesem Abend erklingen, allesamt Klassiker und Evergreens (in den Sessionbooks) für Teenies und Twenty-Somethings:</p>

    <ul>
      <li>Watermelon Man</li>
      <li>All Blues</li>
      <li>The Chicken</li>
      <li>Tough Talk</li>
      <li>Oye como va</li>
      <li>Killer Joe</li>
    </ul>

    <p>Also auf nach Neuburg in einen der schönsten Jazzkeller Deutschlands! Und vielleicht können wir dann schon verkünden ...</p>

    <hr />

    <h5>3. Verein packt weitere Hürde: Das 150. Mitglied naht samt satter Belohung (es lohnt sich!)</h5>

    <p>Ja, es lohnt sich wirklich Mitglied im coolen Jazzverein zu werden, denn hier tummeln sich nicht nur zahlreiche Jazzförderpreisträger der Stadt Ingolstadt sowie so ziemlich alle Jazzmusiker der Region samt Nachwuchs an den Schulen, sondern es lohnt sich die Mitgliedschaft, v. a. für Schüler und Studenten, bekommen doch die
      Jugendlichen ihren Jahresbeitrag von 20 Euro locker durch das Bonuskonzert, die Verbilligungen bei Workshops (beim letzten 10 Euro gespart!) und den ermäßigten Eintritten bei den Jazztagen und den Clubkonzerten im Diagonal wieder herein. Dieses Vergünstigen jedenfalls haben sich seit neuestem gesichert:</p>

    <ul>
      <li>die jazzbegeisterte Familie Poese, bei der die Tochter Katrin nicht nur ein tolles Tenorsax bläst, sondern auch ein perfektes Jazzverzeichnis für IN verfasst hat!</li>
      <li>Franz Rottenkolber, Enkel eines prominenten Fans des Vereins (Alt-OB Peter Schnell) und Nachwuchsbassist am Reuchlin-Gymnasium</li>
      <li>Steffen Mayer, ein Jazzfreak der demnächst aktiv ins Jazzinnenleben des Vereins eingreifen möchte: Solche Leute brauchen wir!!</li>
    </ul>

    <p>... Und ... Ja ... Ähm ... Hier könnte Dein oder Ihr Name oder / und auch der Name einer Firma (Jahresbeitrag bei Firmen 400,-) stehen ...</p>

    <p>Die Gelegenheit ist günstig, nicht nur am 26.4.09 im Birdland, sondern auch jetzt und sofort per Mail an mich oder per Onlineantrag über die Homepage www.jazzfreunde-ingolstadt.de, denn dem 150. Mitglied winkt eine tolle Belohnung: <span class="emboss red">eine vom Jazzverein gesponserte Freikarte für ein Konzert nach Wahl bei den 26. Ingolstädter Jazztagen.</span> OK, ok, man kauft zwar momentan noch die Katze im Sack, aber soviel darf ich verraten: Festivalleiter Jan Rottau bastelt gerade an einem Programm, das mitnichten hinter dem Jubiläumsprogramm von 2008 zurückstehen wird. Jetzt aber genug geschwärmt und zu was Ernsterem, denn die großartige Combo ...</p>

    <hr />

    <h5>4. “Klangpatrouille” sucht dringend einen Probenraum</h5>

    <p>Wer letztens die Jungs der Patrouille bei den Jazztagen erleben durfte weiß, welch toller Sound und ausgetüftelten Arrangements sich hinter dem Namen verbergen. Leider steht die KLANGPATROUILLE ab sofort ohne Proberäumlichkeiten da. O-Ton des Posaunisten Martin Bürkl:</p>

    <blockquote>
      <p>“Wir hatten im berühmten Uraltbau neben dem Alf-Lechner-Museum geprobt, wie Slut, Pelzig und einige andere Kapellen. Aus feuerpolizeilichen Gründen ist die Nutzung seit letzter Woche von Amts wegen untersagt. Nun, wir proben 1-2 Mal monatlich, recht unregelmäßig und nur an Wochenenden - immer innerhalb des Zeitfensters von Freitag 19 Uhr bis Sonntag 17 Uhr. An einem neuen Raum wäre besonders wichtig, dass wir mindestens bis 24 Uhr proben können, ohne Nachbarn damit Ärger zu machen.
        Es wäre schön, wenn Du innerhalb des Jazzfreundevereins (zu dem ja fünf KP-Mitglieder selbst zählen) ein wenig die Fühler ausstrecken könntest:</p>

      <p>- Vielleicht können wir in einen bereits von einer anderen Gruppe benutzten Raum einziehen und uns die Miete teilen.<br />
        - Oder es ergibt sich an einer Schule die Möglichkeit, den Musiksaal zu benutzen (das wäre zwar kein eigener Raum, dafür steht da aber meist ein Flügel und/oder ein Schlagzeug.). Absolut ordentliches Hinterlassen und Absperren ist selbstverständlich!<br />
        - Oder wir können einen gänzlich ungenutzten Raum "beziehen", in den wir ein altes Schlagzeug und E-Piano stellen können.</p>

      <p>Wir sind recht anspruchslos, kommen gänzlich ohne PA und sonstige Sperenzchen aus und sind lange nicht so laut, wie eine Rockcombo. Ein funktionierendes WC wäre allerdings wichtig.</p>

      <p>Allerbesten Dank,</p>

      <p>Martin Bürkl”</p>
    </blockquote>

    <p style="font-style:italic;">ALSO: HELFT DEN JUNGS! WER WEITER WEIß, BITTE BEI MARTIN SICH DIREKT MELDEN!</p>

    <p>Alle Musiker wissen, ungestörtes Proben ist die Ausgangsbasis für den Erfolg in der Öffentlichkeit, und da bietet sich zum Glück für alle Nachwuchsbands wieder die tolle Gelegenheit, sich einem breiten Publikum zu präsentieren, man muss aber schnell sein, denn er naht, der ...</p>

    <hr />

    <h5>5. Anmeldeschluss für die Ingolstädter Musikszene 2009 am 22.4.2009</h5>

    <p>Endlich wieder nach einem Jahr Zwangspause! Walter Haber, dem unermüdlichen Kämpfer für die Kultur in IN und Pächter der Neuen Welt, und dem Kulturamt, hier speziell Joseph Gutmann, sei es gedankt. Das wichtigste Event für alle Nachwuchsbands jeglicher Stilart geht in sein 24. Jahr: Die Ingolstädter Musikszene. Über die Geschichte der Konzertreihe gibt es seit Neuestem übrigens eine hervorragende (Fach)-Arbeit verfasst von Daniel Schlamp, die noch ihrer Veröffentlichung harrt.<br />
      Für alle, die sich jetzt aber genauer informieren möchten, hier Auszüge aus dem Anmeldeschreiben 2009:</p>

    <blockquote>
      <p>“Zum 24. Mal veranstalten die Kleinkunstbühne Neue Welt, der Kultur Club e. V. und das Kulturamt der Stadt Ingolstadt die Reihe &quot;Ingolstädter Musikszene&quot;. Ziel dieser Reihe ist es, alljährlich einen umfassenden Überblick über die Aktivitäten Ingolstädter Künstler zu bieten, sowohl der etablierten, als auch der so genannten Newcomer, die hier einen Start für weitere Auftritte ermöglicht bekommen. Für alle Künstler aus den Bereichen Musik (Folk, Rock, Blues, Jazz etc.), Kleinkunst oder Kabarett gilt, dass mindestens ein Gruppenmitglied aus Ingolstadt oder nächster Umgebung sein muss. Es können sich alle bewerben, die glauben, ein Programm von ca. 70 Minuten oder mehr anbieten zu können. Die Auswahl treffen jeweils Walter Haber (Neue Welt) und ein Vertreter des Kultur Club e. V. nach Absprache mit dem Kulturamt.</p>

      <p class="emboss red">Anmeldeschluss: Mittwoch, 22. April 2009</p>

      <p>Die Anmeldeformulare sind bis dahin <u>vollständig ausgefüllt</u> im angepeilten Spielort abzugeben oder an die Adresse: KKB Neue Welt-Griesbadgasse 7 in 85049 Ingolstadt zu schicken. (Fax: 08453/9410). Das Ohrakel hat eigene Anmeldeformulare!!!</p>

      <p class="emboss red">Von der Webseite kann man´s runterladen <a href="http://www.neuewelt-ingolstadt.de">www.neuewelt-ingolstadt.de</a> Link :Musikszene !</p>

      <p>Gegenleistung: <span class="red">Pro Künstler zahlt das Kulturamt 50 €, max. 150 € pro Band</span>, PA und Licht werden gestellt. Soundmixer muss von der Band direkt bezahlt werden. 80% der Eintrittsgelder gehen an die Band, die restlichen 20% dienen der Unkostendeckung (Gema/ Druck etc.). Die Eintrittspreise liegen zwischen 5 und max. 12 € und werden in Absprache mit Band bzw. Veranstalter festgelegt. Jeder Akteur muss 10 bzw. pro Band . 40 Karten abnehmen. Sie gelten als verkauft. ... ”</p>
    </blockquote>

    <p>Ich persönlich kann nur zur Teilnahme raten, denn auch meine ersten Schritte als Bandmusiker mit der Music-Comedy-Gruppe “Quax” geschahen in der Neuen Welt, und es wirklich ein tolles Gefühl auf den Brettern zu stehen, die vor einem schon Megastars der Kleinkunst betreten haben. Wünschenswert wäre es, wenn sich der Trend der letzten Jahren, dass immer mehr Jazzformationen an den Start gehen, verfestigen würde. Ist doch eigentlich ein guter Plan: Zuerst bei der Musikszene auftreten und dann gleich in ein perfektes Bandverzeichnis aufgenommen zu werden, denn das ...</p>

    <hr />

    <h5>6. Verzeichnis “Jazz.IN – das Jazzverzeichnis für die Region Ingolstadt” ist fertig</h5>

    <p>Wie schon im Donaukurier Ende 2008 angekündigt, hat sich unser Neuvereinsmitglied Katrin Poese in eine Riesenarbeit gestürzt und eine Verzeichnis von Jazzgruppen der Region Ingolstadts sowie einen Überblick über die Jazzförderpreisträger der Stadt Ingolstadt angelegt, und jetzt – das Verzeichnis entstand im Rahmen einer Facharbeit - darf ich es ja verraten: Es ist Katrin auf professionellste Weise gelungen: Ein Meisterstück!! Jede(r) darin aufgelistete(r) Band / Jazzmusiker darf stolz darauf sein, in diesem Katalog einen Platz ergattert zu haben. Nachdem eine Facharbeit in der Arbeitszeit begrenzt ist und wir vom Verein aus gerne alle Jazzgruppen der Region IN dabei haben wollen, hat sich Katrin dankenswerter Weise bereit erklärt, nach dem Abitur im Mai 2009, also ab ca. Juli 09 den Katalog mit Vereinshilfe zu vervollständigen. Also “Don’t panic!”: Jeder Jazzmusiker hat die Chance, bei der offiziellen Version von “Jazz.IN” - so der Titel – dabei zu sein. Wer es versäumt hatte, mit Katrin Kontakt aufzunehmen, bzw. wen wir vor einem halben Jahr schlicht beim Kontaktieren vergessen haben, kann sich – noch momentan wegen Katrins nahendem Abitur (Good Luck ;-)) - bei mir per Mail melden.</p>

    <p>... Puhh ... Das war wieder mal ein langer Letter ... Immer gibt’s massenweise zu berichten ... Aber lieber so als Schweigen im Jazzwalde ... </p>

    <p>In diesem Sinne ein nachträglich sonniges Osterfest und hoffentlich bis zum 26.4.09 im Birdland??</p>

    <p>Let the sun shine!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 26  (08. März 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 26</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 137</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Megaevent: Die 1. Big Band Nacht der Ingolstädter Schulen am 21.3.09 ab 19 Uhr</li>
      <li>Noch Plätze frei beim Jazz-Improworkshop am 21.3.09 in der Fronte 79</li>
      <li>Konzertreihe “Club Concerts” im Diagonal mit großen Namen des Jazz!</li>
      <li>Weltstar Ron Carter macht Stopp am 12.3.09 im Audiforum!</li>
      <li>Regionale Bands mit Jazzeinschlag live in und um Ingolstadt herum</li>
      <li>Neu bei den 26. Ingolstädter Jazztagen: “Jazz for kids”</li>
      <li>Sessionband für Jam-Session am 24.5.09 im Diagonal gesucht</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Mittwoch</td>
        <td>11.03.2009</td>
        <td>20.00 Uhr</td>
        <td>Leni Stern “Afrika” (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>12.03.2009</td>
        <td>20.00 Uhr</td>
        <td>Ron Carter Quartett (Audiforum)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>12.03.2009</td>
        <td>20.30 Uhr</td>
        <td>Zimt (Cafe Tagtraum)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>13.03.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Theater Preith)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>14.03.2009</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Theater Preith)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.03.2009</td>
        <td>ab 9.00 Uhr</td>
        <td>Workshop Soloimprovisation mit Prof. Zoller (Fronte 79)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.03.2009</td>
        <td>19.00 Uhr</td>
        <td>1. Bigband Nacht der Ingolstädter Schulen (Fronte 79)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>25.03.2009</td>
        <td>20.00 Uhr</td>
        <td>Luis di Matteo (Diagonal)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>31.03.2009</td>
        <td>20.00 Uhr</td>
        <td>Scott Henderson Trio (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.04.2009</td>
        <td>20.00 Uhr</td>
        <td>Etna (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.04.2009</td>
        <td>19.00 Uhr</td>
        <td>10. Young Jazz Players Session (Birdland / Neuburg)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>02.05.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>13.05.2009</td>
        <td>20.00 Uhr</td>
        <td>Bill Evans Group (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit 4. Summer Jazz Open Air (Rappensberger)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Open-Air-Jazzfestival des Jazzclubs “Birdland” (Schlosshof Neuburg)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Es hat etwas länger gedauert mit der Veröffentlichung unseres 26. Jazzlettters. Das liegt daran, dass mich ein Projekt sehr in Beschlag nimmt, unser ...</p>

    <h5>1. Megaevent: Die 1. Big Band Nacht der Ingolstädter Schulen am 21.3.09 ab 19 Uhr</h5>

    <p>Ein Großereignis für den Jazznachwuchs an Ingolstädter Schulen steht vor der Tür: Die 1. Big Band Nacht der Ingolstädter Schulen veranstaltet vom Verein der Jazzfreunde Ingolstadts e.V. mit Unterstützung des Kultur- und Schulreferat Ingolstadts (Schirmherr Kulturreferent Gabriel Engert). Am Samstag, den 21. März 2009, treten ab 19 Uhr in der Fronte ’79 beinahe alle Big-Bands der Ingolstädter Gymnasien auf. Für das Ende des Big-Band-Festes konnte als Top-Act die Lehrer Big Band Bayern unter der Leitung von Prof. Thomas Zoller (Professor für Jazz-Arrangement und Komposition in Dresden) gewonnen werden, die Ausschnitte aus ihrer neuen CD präsentieren wird. Wer sich einen Vorabbericht im Ingolstädter Fernsehen dazu ansehen will, der sollte diesen Mittwoch (11.3.) die Teleschau anschauen, oder später unter <a href="http://intv.de/flv/kalender.php">http://intv.de/flv/kalender.php</a> die Sendung im Internet betrachten. Sabine Roelen mit ihrem Kameramann Schorsch Siegwarth haben mal wieder ganze Arbeit geleistet: Kompliment an dieser Stelle an die beiden!</p>
    <p>Der Eintritt für das dreistündige Konzert ist frei; die Kosten werden durch Sponsoren, das finanzielle Engagement der Veranstalter und durch Spenden der Zuhörer getragen. Deshalb freuen sich einerseits die Veranstalter über zahlreiches Erscheinen von Zuhörern, andererseits unsere musikbegeisterten Jugendlichen in den Schul-Bigbands über gebührende öffentliche Aufmerksamkeit. Im Zentrum dieses in seiner Art erstmals in Ingolstadt durchgeführten Festivals steht der Austausch und das gegenseitige Zuhören. Ergänzt wird der Grundgedanke der Begegnung durch einen am selben Tag von 9 bis 14.30 Uhr in der Fronte stattfindenden Improvisations-Workshop, der sich v. a. an Solisten von Big Bands richtet und von Prof. Thomas Zoller geleitet wird. Doch nicht nur Schüler dürfen am Impro-Workshop teinehmen, auch junggebliebene Jazzer dürfen sich bei mir per Mail anmelden, denn es sind ...</p>

    <hr />

    <h5>2. Noch Plätze frei beim Jazz-Improworkshop am 21.3.09 in der Fronte</h5>

    <p>Wer also einen der heiß begehrten Plätze in der Fronte ergattern will, sollte schnell sein! Vereinsmitglieder erhalten übrigens 10 Euro Ermäßigung auf die Teilnahmegebühr von 20 Euro. Details gibt’s im Anhang. Drummer und E-Bassisten sind ebenso willkommen. Mitmachen lohnt sich immer, denn vielleicht dringt man dann tiefer in Musik ein, die uns in Ingolstadt demnächst in familiärer Atmosphäre angeboten wird bei der ...</p>

    <hr />

    <h5>3. Konzertreihe “Club Concerts” im Diagonal mit großen Namen des Jazz!</h5>

    <p>Schon seit vielen Jahren stellt das Team um Jan Rottau und Franz Werthmann unter Mitarbeit von Reinhard Dorn im Diagonal eine Club Concert Reihe auf die Beine, die sich international sehen lassen kann! Manche Weltstars, die sich hier in familiärer Atmosphäre den Ingolstädtern präsentieren, machen hier zwischen den großen Jazzfestivals Europas Station. So kann man u. a. demnächst im Diagonal erleben und genießen:</p>

    <blockquote>
      <p>“<b>Leni Stern „Africa“ – Mi., 11.03.</b><br />
        Leni Stern, die sich am Anfang ihrer 20-jährigen Karriere mit 9 veröffentlichten Instrumentalalben einen Namen in Jazzkreisen erworben hat, wechselte in den letzten Jahren immer mehr in den Singer-Songwriter-Bereich.<br />
        Die letzten zwei Jahre arbeitete sie in Mali mit lokalen Musikern an ihrer CD “Africa”, die afrikanische und westliche Musikformen mit einer Authentizität verbindet, dass die Scheibe als audiophiles Dokument gegenwärtigen afrikanischen Musik-Lebens bezeichnet werden kann.<br />
        Mit dem aktuellen Live Line-up war diese Band schon auf vielen Festivals in Amerika und Europa zu hören. Die 10-seitige Oud des Marokkaners Brahim bringt den emotionalen Charme der arabischen Vierteltonskalen ein. Sein Spiel auf der Cajon und der Dumbek steht in wunderbarem Einklang mit dem Können des nigerianischen Talking Drum Spielers Kofo. Der Bassist Mamdou hält das Ganze zusammen mit seinen hochsynkopierten westafrikanischen Rhythmen und brillianten Solis und alles leitet die Gitarre und der Gesang Leni Sterns. Eintritt: 18.- €/12.- €”</p>
    </blockquote>

    <p>Hier gibt es noch Karten auch an der Abendkasse für Kurzentschlossene!</p>

    <blockquote>
      <p>“<b>Scott Henderson Trio – Di., 31.03.</b><br />
        Aufgewachsen in einer Zeit, als der Blues-Rock auf seinem Höhepunkt war und beeinflusst von Musikern wie Jimmy Page, Jeff Beck, Jimi Hendrix und den großen Blues-Gitarristen Albert King und Buddy Guy, war es doch der Jazz, der ihn zu der Spieltechnik und den Kompositionen führte, wofür Scott Henderson heute berühmt ist.<br />
        Nach Engagements in Chick Corea’s Electric Band und Joe Zawinuls “Weather Report” gründete er 1984 mit dem Bassisten Gary Willis “Tribal Tech” und veröffentlichte mit dieser Band 9 Alben. 1994 startete Scott Henderson seine Solokarriere, veröffentlichte drei Blues-Alben, wobei er das dritte Album “Well to the Bone” mit seiner aktuellen Band, John Humphrey am Bass und Alan Hertz an den Drums auf extensiven Tourneen weltweit präsentierte. Eintritt: 18.- €/12.- €”</p>
    </blockquote>

    <p>Und, fast zu 100%: Bill Evans mit seinem furiosen “Soul-Grass”-Ensemble, noch bestens in Erinnerung vom Jazzfestival 2007, soll uns am 13.5.09 die Ehre geben. Alles nachzulesen im Flyer im Anhang.</p>

    <hr />

    <h5>4. Weltstar Ron Carter macht einen Stopp am 12.3.09 im Audiforum!</h5>

    <p>Noch eine Jazzbühne bereichert unser Jazzkulturleben seit Jahrzehnten: Der Jazzclub Birdland in Neuburg. Man darf es schon als Meisterleistung anpreisen, den Superstar unter den Jazzbassisten nicht einmal innerhalb eines Jahres gleich zweimal in unseren Region auftreten zu lassen: Ron Carter kommt am 12.03.2009 ins Audiforum um 20 Uhr mit seinem Miles-Davis-Projekt. Wer ihn letztes Jahr beim Open Air Festival im Neuburger Schlosshof erleben durfte, wird sicher mit Freunde an die Sternstunde des kammermusikalischen Jazz zurückdenken.</p>
    <p>Übrigens soll dieses Jahr wieder unter der Regie von Clubbesitzer Manfred Rehm ein großes Open Air Festival vom 10. bis 12. Juli starten, bei dem am Sonntag die regionale Szene in den Mittelpunkt gerückt werden soll. Einen kleinen Vorgeschmack darauf bieten in den nächsten Wochen bereits ...</p>

    <hr />

    <h5>5. Regionale Bands mit Jazzeinschlag live in und um Ingolstadt herum</h5>

    <p>Mich erreichen öfters Mails mit der Bitte, die darin beworbenen Konzerte der Masse an Jazzfans zur Verfügung zu stellen. Das mache ich stets sehr gerne! So schreibt die “Voice Connection”:</p>

    <blockquote>
      <p>“Hallo Freunde der gepflegten Musik,</p>

      <p>nach Fasching sollte man ja alles etwas ruhiger angehen lassen. Wer dabei nicht auf gute Musik verzichten will, dem sei eines unserer beiden Konzerte an dem Wochenende Mitte März empfohlen. Die &quot;Theaterleit vo Preith&quot; haben uns am 13. und am 14. März eingeladen. Wer Freitags nicht kann, kommt einfach am Samstag. ;-)</p>

      <p>Details zum Theater und zur Kartenvorbestellung gibt es unter<br /></p>
      <a href="http://www.altmuehlnet.de/~an02609">http://www.altmuehlnet.de/~an02609</a></p>

      <p>Dort auf &quot;Aktuelles&quot; klicken.</p>

      <p>Viele Grüße von<br />
        The Voice Connection<br />
        <a href="http://www.the-voice-connection.de">http://www.the-voice-connection.de</a>”
      </p>
    </blockquote>

    <p>Und ein weiteres Ensemble, dass Jazzeinschläge in ihrem Programm aufbieten kann:</p>

    <blockquote>
      <p>“Zimt am 12.3 (Donnerstag) ab 20.30 im Cafe Tagtraum, Paradeplatz, Ingolstadt</p>

      <p>Noch so ‘ne Deutschrockband? Nicht wirklich, obwohl Zimt durchaus rocken, aber eben nicht mit verzerrten Stakkato-Gitarren und hymnischen Stadion-Melodien. Die Songs von Songwriter, Gitarrist und Sänger Point befassen sich mit so ziemlich allem, was das Leben des zeitgenössischen Geringverdieners so spannend macht: Alternatives Wohnen in überteuerten Bruchbuden, materieller und informeller Overkill, der globale Markt im eigenen Wohnzimmer, herzhafte Paranoia, der Kampf mit dem eigenen Schweinehund, das ewige Auf-die-Schnauze-fallen-und-immer-wieder-Aufstehen, sowie die unsterbliche Rock’n’Roll-Romanze &quot;Wir zwei gegen den Rest Welt&quot;. Das ganze verpackt er mit Bernie Sauer (Bass), Helmut Denzler (Perkussion) und Markus Mayer (Gitarre, Akkordeon, E-Piano) in kernig-schrägen Rhythm &amp; Blues, Manu-Chao-artigen Reggae, lyrische Balladen oder lässigen Swing. Süß und herb wie das Gewürz eben.</p>

      <p>Das geneigte Jazzfreunde Ohr wird sich an jede Menge Weltmusikeinfluessen und dem ein oder anderen Solo erfreuen können. Auch ein Ingolstädter ist bei dieser Band beteiligt: Markus Mayer, den man sonst als Gitarrist der Klangpatrouille kennt oder als dritter Mann des boarischen Jazzplans, zeigt mit Zimt, dass er sich nicht nur auf den 6 Saiten wohlfühlt, sondern auch schwarz-weisse Tasten greifen kann. Und das ein Akkordeon nicht nur in der Volksmusik und im Tango Sinn macht.</p>

      <p>Reinhören? <a href="http://www.myspace.com/zimtlieder">http://www.myspace.com/zimtlieder</a>”</p>
    </blockquote>

    <p>Es regt sich was in der Ingolstädter Bandszene! Immer neue Ensembles schießen wie Pilze aus dem Boden und verheißen guten Geschmack. Damit uns in der Region auch nicht der Zuhörernachwuchs ausgeht, wartet unser internationales Jazzfestival im Oktober 2009 mit einer interessanten Neuerung auf:</p>

    <hr />

    <h5>6. Neu bei den 26. Ingolstädter Jazztagen: “Jazz for kids”</h5>

    <p>Als Vater von 2 Kindern im zarten Alter von 2 und fast 5 Jahren weiß ich, wie dünn gestreut gute Konzerte für Kinder in der Region sind. Jammern besserte die Lage auch nicht, so legte ich mich ins Zeug und überzeugte den Festivalleiter der Jazztage, Jan Rottau, sowie den Kulturreferenten der Stadt Ingolstadt, Herrn Gabriel Engert, von der Idee und Notwendigkeit, im Jazz schon bei den Kleinsten zu beginnen. Was Walter Haber mit der Reihe “Jazz an Schulen” seit Jahren auf perfekte Weise den Schülern ab 10 Jahren anbietet - Vielen Dank an dieser Stelle dem unermüdlichen Woidl aus der Neuen Welt, der dem nicht nur wegen der Blues- und Kabaretttage großes Lob gebührt! - könnte man doch auch schon Kindern von 4 bis 9 Jahren, also Vor- und Grundschulkindern angedeihen lassen: Jazzförderung von und mit Profis. Und somit soll bei den diesjährigen Jazztagen die Reihe “Jazz for kids” starten. Wie da die Planungen aussehen, kann man in den nächsten Jazzletters nachlesen. Vielleicht gibt’s da auch schon den Bandnamen einer unserer vereinsinternen Musikreihe zu lesen, denn es wird noch die ...</p>

    <h5>7. Sessionband für Jam-Session am 24.5.09 im Diagonal gesucht</h5>

    <p>Wer schon einmal dabei war, weiß wie vielfältig blühend mittlerweile die Jazzszene in IN sich im Diagonal oder im Swept Away präsentiert. Fast jeden Monat spielen zufällig zusammengesetzte Ensembles in einer der beiden Szenelokalen. Den Beginn setzt stets eine Sessionband, die entsprechend vergütet die erste Dreiviertelstunde gestaltet. Genau eine solche Mannschaft sucht der Jazzverein noch für die Jam-Session am 24.5.09 im Diagonal. Interessenten mögen sich bitte anmelden bei Beate Diao, die weitere Infos bereit hält. Unsere Jamm-Session ist übrigens so angekündigt:</p>

    <blockquote>
      <p>“<b>Jam-Session – Offene Bühne – So., 24.05.</b></p>
      <p>Um das Musikleben in Ingolstadt anzuregen, organisieren die „Jazzfreunde Ingolstadt e.V.“ im monatlichen Wechsel zu den Sessions mit Ingolstädter Nachwuchsmusikern eine Offene Bühne in wechselnden Lokalitäten. Musiker aller Stilrichtungen (Jazz, Blues, Rock, Latin, etc.) aus Ingolstadt und der Umgebung sind dazu herzlich eingeladen, sich an diesen Sessions aktiv zu beteiligen. Instrumente und Amps bitte mitbringen, PA ist vorhanden.</p>
      <p><b>Eintritt frei!</b>”</p>
    </blockquote>

    <p>Einen schönen Tag wünscht wie immer</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 25  (29. Januar 2009)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 25</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 136</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Neues Jahr – Neue Mitglieder: Wir wachsen!</li>
      <li>Beginn unserer Sessionreihe 2009 am 8.2. mit Klangpatrouille im Swept Away</li>
      <li>Zahlreiche Jazzförderpreisträger gastieren in der Region</li>
      <li>Jazzverein in Ingolstädter Medien (intv, Radio IN)</li>
      <li>Simon Seidl erringt mit 4sinn 1. Preis beim Landeswettbewerb “Jugend jazzt 2008”</li>
      <li>Hilfe beim Jazzverein-Mega-Event am 21.3.09 gesucht!!</li>
      <li>Anmeldung Ingolstädter Musikszene 2009 läuft an</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>01.02.2009</td>
        <td>20.00 Uhr</td>
        <td>Charly Leimer „Steps of Spirit“ (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>08.02.2009</td>
        <td>19.00 Uhr</td>
        <td>6. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>15.02.2009</td>
        <td>20.00 Uhr</td>
        <td>Nick Flade &amp; Groovebox (Diagonal)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>13.02.2009</td>
        <td>19.30 Uhr</td>
        <td>Duo Trögl-Hasenkopf (Kolpingshaus: Diavortrag-Kanada)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>26.02.2009</td>
        <td>18.30 Uhr</td>
        <td>Duo Trögl-Hasenkopf (Audi Forum After Work Party)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>11.03.2009</td>
        <td>20.00 Uhr</td>
        <td>Leni Stern “Afrika” (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.03.2009</td>
        <td>ab 9.00 Uhr</td>
        <td>Workshop Soloimprovisation mit Prof. Zoller (Fronte 79)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.03.2009</td>
        <td>19.00 Uhr</td>
        <td>1. Bigband Nacht der Ingolstädter Schulen (Fronte 79)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.04.2009</td>
        <td>19.00 Uhr</td>
        <td>10. Young Jazz Players Session (Birdland / Neuburg)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>02.05.2009</td>
        <td>20.00 Uhr</td>
        <td>Rudi Trögl Trio (Eichstätt/Gutmann)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit Summer Jazz Open Air (Rappensberger)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">18. Oktober – 8. November 2009: 26. Ingolstädter Jazztage <a class="inherit" href="http://www.ingolstadt.de/jazztage">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p><big>Liebe Jazzfreunde,</big></p>

    <p>Ein kleines Jubiläum: Der 25. Jazzletter flattert mit dieser Mail ins Haus! Auch 2009 werde ich alle 3-4 Wochen über das Jazzleben Ingolstadts ausführlich berichten. Dabei wie immer der Konzertkalender und viele Aktivitäten des Vereins der Jazzfreunde Ingolstadt. Und: Ich bin stets dankbar über weitere Informationen den regionalen Jazz betreffend, die ich hier gerne vermehre. Apropos vermehren ...</p>

    <h5>1. Neues Jahr – Neue Mitglieder: Wir wachsen!</h5>

    <p>Angeschürt durch das ausgezeichnete Bonuskonzert mit Joo Kraus Mitte Januar greift das Jazzfreunde-Feuer immer mehr um sich. So dürfen wir ganz frisch in unseren Reihen begrüßen:</p>
    <ul>
      <li>Ulrike Frank-Wilhelm mit ihrem Mann</li>
      <li>Thomas Wilhelm, die man beide fast bei allen wichtigen Jazzevents der Region antrifft!</li>
      <li>sowie die Töchter Julie und Valentine, wobei letztere als tolle klassische Geigerin am Reuchlin-Gymnasium glänzt</li>
      <li>Christine Metzger, deren Bekanntschaft ich gerne noch machen werde, und</li>
      <li>Josef Ertl, Musiklehrer an der Fronhofer-Realschule und leidenschaftlicher Saxofonist</li>
    </ul>

    <p>Und ich bin kein Prophet, aber die 150 Mitglieder sollten wir doch dieses Jahr packen. Beste Gelegenheit für noch Unentschiedenen sich dem Verein zu nähern bietet sich ja demnächst, beim ...</p>

    <hr />

    <h5>2. Beginn unserer Sessionreihe 2009 am 8.2. mit Klangpatrouille im Swept Away</h5>

    <p>Wir haben ein Zuckerl parat: Der aufstrebende Komet des Ingolstädter Jazzhimmels, die Klangpatrouille, gibt uns am 8.2.09 ab 19 Uhr im Swept Away die Ehre und eröffnet die Sessionreihe des Vereins. Mitspieler und Zuhörer jeglichen Alters sind wie immer herzlichst willkommen!<br />
      Erfahrene Sessionmusiker (Simon Seidl, Tom Diewock, Thomas Buschko, Kerstin Schulz) hatten sich übrigens nach der letzten Session zusammengesetzt und eine Struktur für alle kommenden Sessions erarbeitet, die im Ungefähren so aussieht:</p>

    <ul>
      <li>Wer einmal Sessionband sein will, meldet sich bei Beate Diao oder mir</li>
      <li>Jede Sessionband bekommt eine angemessene Aufwandsentschädigung und hat freie Getränke</li>
      <li>Mitglieder der Sessionband können Sessionleiter sein (alternativ übernehmen Thomas Buschko, Manfred See oder ich)</li>
      <li>PA-Anlage wird gestellt, Equipment (Drum-Set, E-Piano, E-Gitarren und -Bass-Verstärker) stellt idealerweise die Sessionband</li>
      <li>Pro Session werden in Absprache mit der Sessionband über den Jazzletter 3 Standards für diesen Abend vorgeschlagen, die nicht den üblichen Hits (Mercy, Cantaloupe, Blue Bossa ...) entsprechen sollen zwecks Repertoireerweiterung</li>
      <li>Jeder beschlagene Jazzer kann durch Üben derselbigen sein Repertoire aufmöbeln und hat in der Sessionband die kongenialen Mitstreiter</li>
      <li>Diese 3 Standards können aus den Real Books oder den Ingolstädter Sessionbooks 2007 und 2008 sein (erhältlich bei Reimund Domke, DER-Reisebüro, Milchstr. 1. Für Mitglieder kostenlos, sonst 10 Euro)</li>
      <li>Ansonsten liegt an der Bühne eine Titelliste aus, in der sich alle willigen Jammer mit Name + Instrument + Titel eintragen können.</li>
      <li>Damit wird eine Organisation des Zusammenspiels besser koordiniert, bzw. man lernt sich besser beim Namen kennen.</li>
    </ul>

    <p>Die 3 Standards lauten am 8.2.09:</p>

    <ol>
      <li>Tough Talk (Sessionbook 2008 oder Realbook I Seite 433)</li>
      <li>All Blues (Sessionbook 2007 oder Realbook I Seite 13)</li>
      <li>Take Five (Sessionbook 2008 oder Realbook I Seite 420)</li>
    </ol>

    <p>Wer also fleißig übt und bei den Sessions der Jazzfreunde aktiv mitwirkt, wird vielleicht demnächst auch unter der folgenden Überschrift erscheinen ...</p>

    <hr />

    <h5>3. Zahlreiche Jazzförderpreisträger gastieren in der Region</h5>

    <p>Dass wir in der Boomregion IN auch mit grandiosen Jazzmusikern Marke Eigengewächs aufwarten können, beweisen unsere Local-Heros, die Jazzförderpreisträger, die sich vermehrt in den nächsten Wochen in Konzerten zeigen, die da wären:</p>

    <ul>
      <li>01.Februar: Charly Leimers „Steps of Spirit“ (Diagonal) - Eine Info zur Band gibt’s im Anhang!</li>
      <li>13. Februar: Duo Trögl-Hasenkopf (Kolpingshaus: Diavortrag-Kanada)</li>
      <li>15. Februar: Nick Flade &amp; Groovebox (Diagonal)</li>
      <li>26. Februar: Duo Trögl-Hasenkopf (Audi Forum After Work Party)</li>
      <li>2. Mai: Rudi Trögl Trio (Eichstätt/Gutmann)</li>
    </ul>

    <p>Ein Interview mit Rudi Trögl kann des Weiteren als Podcast unter<br />
      <a href="http://www.radio-in.de/MediaFrontend/21/Kulturkanal.%2022.01.09.mp3">http://www.radio-in.de/MediaFrontend/21/Kulturkanal.%2022.01.09.mp3</a><br />
      angehört werden. Auch verzeichnen wir immer mehr öffentliche Präsenz in Funk und Fernsehen, und er macht sich ganz gut, der ...
    </p>

    <hr />

    <h5>4. Jazzverein in Ingolstädter Medien (IN-TV, Radio IN)</h5>

    <p>Auch der Jazzfreundeverein als Organisator will 2009 nicht zurückstecken und kann mit einigen Highlights aufwarten:</p>

    <p>Wer als Zuschauer beim Bonuskonzert am 14.1.2009 mit Joo Kraus dabei war, sollte mal unter<br />
      <a href="http://www.intv.de/flv/kalender.php?ausgabe=090116%20=%20Joo%20Kraus">http://www.intv.de/flv/kalender.php?ausgabe=090116%20=%20Joo%20Kraus</a><br />
      reinschauen. Hier gibt’s in Bild und Ton einen schönen Beitrag von IN-TV mit Hinweisen auf unseren Verein. Auf den 16.1. im Kalender klicken, dann Beitrag “Kuba-Feeling in Ingolstadt” aufrufen. Neben Rudi Trögl gab auch unsere Vereinsaktive Beate Diao dem Kulturkanal von Radio IN ein Gespräch, das man unter<br />
      <a href="http://www.radio-in.de/MediaFrontend/21/Kulturkanal,%2015.01.09.mp3">http://www.radio-in.de/MediaFrontend/21/Kulturkanal,%2015.01.09.mp3</a><br />
      findet. Reinhören lohnt sich auch hier, denn Beate, eine wahre Kämpferin für die Kinderkultur in Ingolstadt, entwirft gerade zusammen mit Kindern und Schulklassen einen Kinderstadtführer. In diesem werden auch alle Einrichtungen aufgelistet, die Kultur in irgendeiner Form für Kinder anbieten; deshalb der Aufruf von Beate Diao, sich bei ihr zu melden unter<br />
      <a href="http://www.kunstundkulturgarage.de" style="color:#ff0000;">www.kunstundkulturgarage.de</a>
    </p>

    <p>Ein Riesenprojekt, dem ich meinen höchsten Respekt zolle!! Also auch von meiner Seite aus: (Musik)-Kulturschaffende Ingolstadts, nehmt die tolle Gelegenheit war und seid mit dabei im 1. Ingolstädter Kinderstadtführer!</p>

    <p>Im Internetportal myspace finden sich zuletzt Infos über einen weiteren Jazzförderpreisträger mit Berichten über einen hervorragenden Erfolg, denn ...</p>

    <hr />

    <h5>5. Simon Seidl erringt mit 4sinn 1. Preis beim Landeswettbewerb “Jugend jazzt 2008”</h5>

    <p>Wer ist denn 4sinn? Hier gibt’s die Infos:<br />
      <a href="http://www.myspace.com/4sinn">http://www.myspace.com/4sinn</a>
    </p>

    <p>Und wie kams zu dem Erfolg? Alle 2 Jahre trifft sich die bayerische Nachwuchselite in der Musikakademie Marktoberdorf, um unter sich die beste Combo Bayerns auszuspielen, die ihrerseits dann Bayern auf dem Bundescontest im Sommer vertritt. Schon im Jahr 2006 gewann Simon Seidl mit seiner damaligen Band “Blindflug” den höchsten Preis in Bayern und konnte auch im Bundesentscheid überzeugen, wurde er doch damals als einer der besten Talente am Jazzklavier ausgezeichnet. Mittlerweile Jazzstudent bei der Klavierkoryphäe Hubert Nuss – letztes Jahr am Flügel beim Vereins-Bonuskonzert mit Wolfgang Haffner – in Köln heimste seine relativ neue Band “4sinn” den 1. Preis ein. Dabei errang der Bassist Tom Berkmann (Ex-Blindflug) sogar zwei erste Preise, startete er doch neben 4sinn noch in der Kategorie der bis 19-jährigen mit einer weiteren Band. Dabei hat er bei den 4 Jungs von 4sinn mit die längste Anreise, studiert er doch in Berlin Jazzbass.</p>

    <p>Übrigens: Das Jazzvereinsmitglied mit den längsten Weg zu unseren Events heißt Peter Maletz. Er wohnt in Kerpen bei Köln und ist regelmäßiger Gast bei den Ingolstädter Jazztagen; und er findet unsere Vereinsarbeit so unterstützenswert, dass er auch außerhalb der Ingolstädter Region seinen finanziellen und ideellen Beitrag leistet. Aber jetzt nur kein schlechtes Gewissen, denn alle, die sich neben den monetären Beiträgen bei den Jazzfreunden aktiv beteiligen wollen, haben jetzt die einmalige Gelegenheit: ...</p>

    <hr />

    <h5>6. Hilfe beim Jazzverein-Mega-Event am 21.3.09 gesucht!!</h5>

    <p>Der aktive Kern des Jazzvereins arbeitet gerade bienenfleißig an der Organisation der 1. Big Band Nacht der Ingolstädter Schulen am 21.03.09 ab 19 Uhr in der Fronte 79. Besonders an diesem Tag brauchen wir einige Helfer, die uns bei der Betreuung (Ansprechpartner) und Versorgung (Catering) von 5 (!) Big Bands helfen. Ich selbst bin Leiter von einer und Mitspieler bei einer und somit nicht immer greifbar. Deshalb:</p>

    <p>Wer kann helfen am Samstag 21.3.09? Gerne schon ab 9 Uhr, aber auch ein späterer Termin (beim Abbauen und Aufräumen) ist möglich! Je mehr Insider (also Verantwortliche mit Backstagepass und somit Ansprechpartner bei allerlei Fragen) vor Ort sind, desto relaxter wird der Abend für die Hauptverantwortlichen (neben mir Reimund Domke, Beate Diao, Stefan Wild, Manfred und Gerda See, Stefan Wild, Oliver Angermüller).</p>

    <p>INTERESSENTEN BITTE BEI MIR PER MAIL MELDEN!</p>

    <p>Seine Power kann der Verein an diesem Tag zeigen, seine ganze Bandbreite hingegen der regionale Jazz im Sommer 2009 beweisen und sogar noch einiges an Geld verdienen, denn die ...</p>

    <h5>7. Anmeldung Ingolstädter Musikszene 2009 läuft an</h5>

    <p>Zum Glück haben die Renovierungsarbeiten an der Kleinkunstbühne “Neuen Welt” vergangenes Jahr nicht die bis dahin reibungslos laufende Ingolstädter Musikszene verschüttet, eine Konzertreihe finanziell getragen vom Kulturamt Ingolstadt und ausgetragen in den Musikstätten Neue Welt und Ohrakel. Genaue Details gibt es unter<br />
      <a href="http://www.musikszene-ingolstadt.de/index.html">http://www.musikszene-ingolstadt.de/index.html</a>
    </p>

    <p>Bei dieser Konzertreihe besteht die ideale Gelegenheit für alle regionalen Nachwuchsbands sich einem größeren Publikum zu präsentieren und gutes Geld durch die Eintrittsgelder zu verdienen, einen satten Zuschuss durchs Kulturamt inklusive. Danke an dieser Stelle Walter Haber von der Neuen Welt und Joseph Gutmann vom Kulturamt, die hier unschätzbare Arbeit im Kulturleben Ingolstadts leisten. Ich weiß das aus eigener Erfahrung, denn ich stand auch mal als 16-jähriger auf den Bühnenbrettern der Neuen Welt ... Bald übrigens, kann man in einer von Daniel Schlamp verfassten Facharbeit nachlesen, wen alles die Musikszene an großen und kleineren Namen hervorgebracht hat. Danke Daniel schon mal im Voraus für Deine – wie ich bei der Betreuung der Arbeit feststellen konnte - akribische Arbeit!</p>

    <p>Nun denn meine lieben Ingolstädter Jazzbands : Einer hervorragende Möglichkeit bietet sich hier an und die Anmeldung dazu gibt es im Anhang!<br />
      Nun denn meine lieben Leser der Anfang 2009 ist wieder gemacht!<br />
      Nun denn meine lieben Jazzfreunde. Wir sehen uns spätestens am 10.2.09 um 20 Uhr im Hotel Rappensberger zur Hauptversammlung des Vereins mit Vorstandswahlen!<br />
      Nun denn meine lieben Mitwachgebliebenen zur späten Mitternachtsstunde!</p>

    <p>Eine gute Nacht und einen schönen Tag wünscht wie immer</p>

    <div class="signum">Robert Aichner</div>

    <p>PS: Im nächsten Jazzletter gibt es vielleicht schon eine kleine Überraschung zu verkünden, die die ganz Kleinen unserer tollen Stadt betrifft. Also, am Ball bleiben!</p>

    <p>PPS: Den Newsletter des Birdland Jazzclubs Neuburg gibst gleich als Nachschlag hinterher</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 24  (11. Dezember 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 24</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 130</p>

    <hr />

    <p class="emboss" style="color:#ff0000;">Der Verein der Jazzfreunde wünscht allen Lesern ein frohes Weihnachtsfest und ein erfolgreiches Jahr 2009!</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Große Jahresabschlusssession am Sonntag 14.12.08 ab 19 Uhr im Diagonal</li>
      <li>Bonuskonzert am 14.01.2009 um 20.00 Uhr mit Joo Kraus „Sueno“ (Diagonal)</li>
      <li>Konzertreihe “Jazz” im Diagonal Frühjahr 2009</li>
      <li>Neue Termine des Jazzvereins für 2009</li>
      <li>“Jugend jazzt” Fördermaßnahmen</li>
      <li>Rückblick und Danke</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.30 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>23.12.2008</td>
        <td>20.30 Uhr</td>
        <td>Albert C. Humphrey &amp; Band “Blue Christmas” (Neue Welt)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>14.01.2009</td>
        <td>20.00 Uhr</td>
        <td>Joo Kraus „Sueno“ (Diagonal) BONUSKONZERT</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.01.2009</td>
        <td>20.00 Uhr</td>
        <td>Hans Stückle Blues Band (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>01.02.2009</td>
        <td>20.00 Uhr</td>
        <td>Charly Leimer „Steps of Spirit“ (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>08.02.2009</td>
        <td>19.00 Uhr</td>
        <td>6. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>15.02.2009</td>
        <td>20.00 Uhr</td>
        <td>Nick Flade &amp; Groovebox (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>11.03.2009</td>
        <td>20.00 Uhr</td>
        <td>Leni Stern “Afrika” (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.03.2009</td>
        <td>ab 9.00 Uhr</td>
        <td>Workshop Soloimprovisation mit Prof. Zoller (Fronte 79)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>21.03.2009</td>
        <td>19.00 Uhr</td>
        <td>1. Bigband Nacht der Ingolstädter Schulen (Fronte 79)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>26.04.2009</td>
        <td>19.00 Uhr</td>
        <td>10. Young Jazz Players Session (Birdland / Neuburg)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>24.05.2009</td>
        <td>19.00 Uhr</td>
        <td>7. Jam Session (Diagonal)</td>
      </tr>
      <tr>
        <td>Fr - So</td>
        <td>10.-12.07.09</td>
        <td>&nbsp;</td>
        <td>Bürgerfest mit Summer Jazz Open Air (Rappensberger)</td>
      </tr>
    </table>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <p>Das Jazzjahr 2008 in IN neigt sich dem Ende zu. Grund genug in einem letzten Jazzletter vor der Jahreswende einen Ausblick auf das kommende Jahr zu werfen, Rückschau zu halten und Dankesworte zu verlieren. Aber zuvor gibt’s ja noch die Gelegenheit sich persönlich ein frohes Fest zu wünschen, denn hier kommt sie, die ...</p>

    <h5>1. Große Jahresabschlusssession am Sonntag 14.12.08 ab 19 Uhr im Diagonal</h5>

    <p>Eine Session wirklich der besonderen Art denn:</p>
    <ul>
      <li>Die Jazzsängerin Kerstin Schulz präsentiert mit ihrer Band “Four of a kind” weihnachtliche Evergreens</li>
      <li>Powersax mit Frontman Manfred See bietet ein italienisches Christmas-Medley an</li>
      <li>bei der Jam-Session werden wieder Alt und Jung, Erfahrung und Newcomer die richtige Mischung abgeben</li>
      <li>und: IN-TV ist live mit dabei</li>
    </ul>

    <p>Also: Jeder hat die Gelegenheit ins Fernsehen zu kommen! Let the X-Mas-Party get started!! Falls aber der vorweihnachtliche Stress ein Kommen diesen Sonntag verhindert, dann gibt’s nächste Gelegenheit zum Wiedersehen beim ...</p>

    <hr />

    <h5>2. Bonuskonzert am 14.01.2009 um 20.00 Uhr mit Joo Kraus „Sueno“ (Diagonal)</h5>

    <p>Wer dachte, 2008 wäre das höchste der Jazzgefühle in IN gewesen, kennt die Projekte des neuen Jahres noch nicht! Beginnen wir mit dem Bonuskonzert: am 14. Januar 2009 mit Joo Kraus und seinem Projekt „Sueno“ im Diagonal. Das kostenlose Konzert für alle Vereinsmitglieder gestaltet diesmal Joo Kraus (hier seine spacige website: <a href="http://www.jookraus.de">http://www.jookraus.de</a>). Er gehört zu den Top 3 Trompeter Deutschlands, gibt bei der SWR- Bigband den Lead-Trompeter und ist der Lieblingstrompeter unseres stellvertretenden Vorsitzenden Christian Pacher.</p>

    <p>Das Diagonal schreibt dazu im Programmheft:</p>

    <blockquote>
      <p>“Der Trompeter Joo Kraus ist aus der deutschen Musikgeschichte der letzten zwanzig Jahre nicht weg zu denken. Einen exzellenten Namen konnte sich der Musiker mit dem JazzAward prämierten Hip-Jazz Projekt Tab Two machen, mit dem Joo Kraus in den 90ern auf nahezu allen Festivals im In- und Ausland zu hören war.<br />
        Seine erste eigene Platte “Public Jazz Lounge” erschien 2003, wo sich Jazz, Pop und Rap mit BigBand-Arrangements vereinen. Sein zweites Solo-Album “The Ride” verwirklichte Joo mit “Basic Jazz Lounge” und verkündete einen lässigen Souljazz mit einer gehörigen Portion Groove.<br />
        Für sein neuestes Album “Sueño” reiste Joo Kraus mit seinem Arrangeur und Pianisten Ralf Schmid im Dezember 2007 nach Havanna/Kuba und spielte dort im altehrwürdigen Egrem-Studio mit kubanischen Musikern seine Melodien ein. So entstand mit “Sueño” ein Projekt, das den feinen kubanischen Bolero und Son entfaltet. Joo Kraus musikalische Heimat, der jazzige Groove, zeigt sich dabei meist in einem ruhigeren Gewand. Und trotzdem ist er auch hier treibend und intensiv.
        Live wie auf CD ein besonderer Hörgenuss!</p>

      <p>Joo Kraus - trumpet; Ralf Schmid - piano; Davide Petrocca - bass; Kristiina Tuomi - vocals; Tomás Pérez - percussion</p>

      <p>Eintritt 15 Euro bzw. 10 Euro (Schüler und Studenten unter Vorlage eines Ausweises)”</p>
    </blockquote>

    <p>Bei YouTube empfehle ich folgendes Video: <a href="http://de.youtube.com/watch?v=_QSwrBiRWzE">http://de.youtube.com/watch?v=_QSwrBiRWzE</a><br />
      Und wer die neue Scheibe Sueno hören will: <a href="http://www.amazon.de/Sueno-Joo-Kraus/dp/B001CBX2YW">http://www.amazon.de/Sueno-Joo-Kraus/dp/B001CBX2YW</a></p>

    <p>Besser jedoch: Joo Kraus live zu hören bei der ...</p>

    <hr />

    <h5>3. Konzertreihe “Jazz” im Diagonal</h5>

    <p>Noch weitere Konzerte sind neben Joo Kraus im Angebot des Diagonals: Neben 2 Lokalheros der Ingolstädter Szene (Charly Leimer und Nick Flade), haben es Franz Werthmann und Jan Rottau wieder einmal geschafft, im Frühjahr spannende Namen in das Jazzlokal Ingolstadts zu holen, die da wären:</p>

    <ul>
      <li>25. Januar: Hans Stückle Blues Band (Diagonal)</li>
      <li>01.Februar: Charly Leimers „Steps of Spirit“ (Diagonal)</li>
      <li>15. Februar: Nick Flade &amp; Groovebox (Diagonal)</li>
      <li>11. März: Leni Stern “Afrika” (Diagonal)</li>
    </ul>

    <p>Aber das ist noch lange nicht alles im ersten Halbjahr 2009, den da wären noch die ...</p>

    <hr />

    <h5>4. Termine der Jazzfreunde Ingolstadts</h5>

    <p>Auch der Jazzfreundeverein als Organisator will 2009 nicht zurückstecken und kann mit einigen Highlights aufwarten:</p>

    <p>Wir starten wegen der Fülle an Terminen im Januar erst am <span style="color:#00c000;">8. Februar (So) mit der Jam-Session-Reihe im “Swept away”</span>.<br />
      Gleich am <span style="color:#00c000;">Dienstag</span> darauf am <span style="color:#00c000;">10.2.09</span> treffen sich alle Vereinsmitglieder um <span style="color:#00c000;">20 Uhr im Hotel Rappensberger zur Jahreshauptversammlung</span>.<br />
      Im März dann ein Highlight: Beinahe alle Ingolstädter Schul-Big-Bands präsentieren sich am <span style="color:#00c000;">21. März bei der 1. Big Band Nacht der Ingolstädter Schulen (in der Fronte 79)</span>: 100 jazzende Schüler(innen)!!! Als Top-Act konnten wir die Lehrer Bigband Bayern gewinnen, dessen Leiter Prof. Thomas Zoller am gleichen Tag (Sa) für alle interessierten Jazzsolisten einen Workshop gibt.<br />
      Es folgt ein weiteres Novum: Die Jubiläums-Session (Nr. 10) <span style="color:#00c000;">der Young Jazz Players findet am 26.4. ab 19 Uhr</span> erstmalig in den heiligen Gewölben des <span style="color:#00c000;">Birdland Jazzclubs / Neuburg</span> statt! Eine Session mit dem legendären, weil von Oscar Peterson persönlich eingeweihten, Bösendorfer-Flügel!!<br />
      Am <span style="color:#00c000;">24. Mai</span> dann wieder in heimatlichen Gefilden eine Jam Session im <span style="color:#00c000;">Diagonal</span>.</p>

    <p>Wie man sieht, jeden Monat volles Programm, und das war noch nicht alles, denn im Juni könnte wieder ein Swing- und Dixie-Festival am Horizont auftauchen, am 9.-11. Juli läuft das Bürgerfest mit einem Jazzprogramm des Vereins (Summer Jazz Festival), September wieder eine Jam-Session, Oktober / November die 26. Jazztage, Dezember vielleicht wieder eine X-Mas-Session ... Und dann wären noch die Konzert im Birdland, Veranstaltungen in der Neuen Welt, die Jazzreihe im Diagonal ... Und für die Jugend Workshops im professionellen Rahmen innerhalb der ...</p>

    <hr />

    <h5>5. “Jugend jazzt” Fördermaßnahmen</h5>

    <p>Allen Jugendlichen mit Jazzfieber stehen hervorragende Kurse des bayerischen Landesjugend-Jazzorchesters (künstlerische Leitung Harald Rüschenbaum) offen, die beinahe monatlich in den bayerischen Musikakademien angeboten werden. Hier lernt man unter Anleitung von Vollprofis das Combospiel, Improvisieren, Arrangieren, sprich alles rund um den Jazz herum. Ich habe mal die Kursinformationen für Interessierte als Link hier reinkopiert:</p>

    <p><a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_vocal_marktoberdorf.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_vocal_marktoberdorf.html</a><br />
      <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_vocal_alteglofsheim.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_vocal_alteglofsheim.html</a><br />
      <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/combo_kicks.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/combo_kicks.html</a><br />
      <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_ruegheim.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_ruegheim.html</a><br />
      <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_alteglofsheim.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_alteglofsheim.html</a><br />
      <a href="http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_marktoberdorf.html">http://www.ljjb.de/jugend_jazzt_foerdermassnahmen/foerdermassnahmen/jazz_juniors_marktoberdorf.html</a><br />
    </p>
    <p>Also liebe Jugend: Ran an die Profis und keine Angst; jeder fing mal klein an.</p>

    <hr />

    <h5>6. Rückblick und Danke</h5>

    <p>Das war nun der 24. Jazzletter, der 16. in diesem Jahr; eine ganze Menge Infos, die ich in die Ingolstädter Weiten hinausgeschickt habe. Ein paar Mal habe ich nette Rückmeldungen bekommen, habe Hilfe bei verschollenen Emails bekommen, Anregungen und Verbesserungen gerne angenommen, denn ich freue mich immer über Feedback jeglicher Art. Danke dafür!!<br />
      Der Verein hat in diesem Jahr Enormes geleistet! Zu nennen wäre hier:</p>

    <ul>
      <li>die neu installierten Jam Sessions, 5 im Jahr 2008</li>
      <li>2 erfolgreiche Young Jazz Players Sessions</li>
      <li>das einmalige Bonuskonzert mit dem “Wolfgang Haffner Trio” im April</li>
      <li>der Jazzworkshop für Schüler(innen) im Mai</li>
      <li>unser beharrliches Beraten bei der Organisation des Swing- und Dixie-Festivals</li>
      <li>das 3 Summer Jazz Open Air im Innenhof des Hotels Rappensberger</li>
      <li>unser legendäres Grillfest Anfang August in Niks herrlichen Garten</li>
      <li>fantastische Jazztage im Herbst</li>
      <li>zahlreiche Treffen der aktiven Organisatoren donnerstags ab 8.30 Uhr im Hotel Rappensberger (die Zeche ging oft aufs Hotel: Danke Stefan dafür!)</li>
    </ul>

    <p>Ein tolles Gefühl in so einem Verein mitwirken zu dürfen. Dank deshalb von ganzem Herzen an:</p>

    <ul>
      <li>Reimund Domke, ein 1. Vorsitzender wie man ihn sich nur wünschen kann und mit dem die Zusammenarbeit nicht besser klappen könnte!! Auf ein Neues!</li>
      <li>Beate Diao, die Mega-Aktive, verantwortlich für die Jam Sessions und gute Seele im Diagonal bei den Jazzveranstaltungen! Schneller organisiert keine!</li>
      <li>Jan Rottau und seinem Team für unglaubliche Jazztage im Jubiläumsjahr! Der liebste Festivalleiter!</li>
      <li>Stefan Wild für die vielen “wilden” Ideen und die unglaublich motivierende Art. Immer voller Energie in unserem Stammhaus, dem Rappensberger!</li>
      <li>Uli Spranger für die zuverlässige Kontrolle unserer Finanzen und die Übernahme des Briefverkehrs</li>
      <li>Christian Pacher für manche Meisterwerke der Fotographie (aktuell zu besichtigen unter <a href="http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1">http://www.jazzfreunde-ingolstadt.de/bilder.php?bilder=1</a>)</li>
      <li>Nikolaj Rimsky-Korsakow, unser bester Mann im Musikgeschäft, stets dabei mit Technik und Equipment und mit dem schönsten Garten zum Grillen :)</li>
      <li>Oliver Angermüller von monophonics, immer on the road im Namen der Tontechnik (Wann schläft der Mann eigentlich??)</li>
      <li>Franz Werthmann für den stets reibungslosen Ablauf der Konzerte im Diagonal. Worauf man sich verlassen kann!</li>
      <li>Manuel Royer vom Swept Away, ein Schmuckstück in der Ingolstädter Restaurant-Szene! Super Essen!!</li>
      <li>Daniel Höpp für die geniale Homepage unseres Vereins! Wer arbeitet Tag und Nacht??</li>
      <li>Eugen Hoffart vom Diagonal, die Heimat des Jazz in IN! Immer relaxt und freundlich!</li>
      <li>Reinhard Dorn für die kunst- und geschmackvollen Designentwürfe für den Verein</li>
      <li>meine treue Jazz GmbH, die immer am Ende der Sessions mit mir das Aufräumen und Abtransportieren übernimmt!</li>
      <li>die Familie Suchanek für die Dauerleihgabe des Fender Rhodes bei den Sessions</li>
      <li>Katrin Poese für die aktuelle Erstellung des Katalogs aller Jazzgruppen in IN</li>
      <li>meine Musiklehrerkollegen Christine Ross (CSG), Wolfgang Riffelmacher &amp; Bernhard Reitberger (GG), Charly Leimer (KG): Nur mit Euch lebt der Jazznachwuchs!</li>
      <li>Manfred Rehm für die hervorragende Kooperation mit seinem Jazzclub Birdland in Neuburg: Vernetzung ist alles!</li>
      <li>Walter Haber für die stets offenen und bereichernden Worte und das tolle Kulturprogramm mit Jazzeinschlag in der Neuen Welt</li>
      <li>das Kulturamt unter Leitung von Josef Gutmann mit seinem nimmermüden Team bei den Jazztagen</li>
      <li>Charly Böck, der als Jazzförderpreisträger bei fast allen Sessions mit dabei war. Vorbild für den Nachwuchs!</li>
      <li>Manfred See, der aktive Mann am Saxofon und Mitglied in der aktiven Kerntruppe des Vereins</li>
      <li>alle Sessionmusiker, die mit ihrem glanzvollen Dasein bei unseren Veranstaltungen beweisen, dass der Jazz in IN lebt!</li>
      <li>meine Frau Eva und meine Kinder Emma und Anna, die mich öfter wegen dem Jazz in IN entbehren müssen!</li>
      <li>... Diejenigen, die ich sicher bei der Menge an Kulturschaffenden vergessen habe. Sorry!</li>
    </ul>

    <p>Was bleibt noch übrig? LET IT SNOW!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>


  <?php
  }
}
/**/ else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 23  (24. November 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 23</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 130</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li style="color:red;">Konzert Jasper van’t Hof &amp; Bob Malach (Diagonal) am 26.11.2008 ENTFÄLLT</li>
      <li>Verbilligte Schülerkarten für Konzerte im Diagonal</li>
      <li>X-mas Session am 14.12.08 im Diagonal mit IN-TV!!</li>
      <li>Weitere Jazztermine / Sessionplanung 2009</li>
      <li>Neue Mitglieder im Verein</li>
      <li>Jazz Echo informiert</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr style="color:red">
        <td>Mittwoch</td>
        <td>26.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jasper van’t Hof &amp; Bob Malach (Diagonal) ENTFÄLLT!</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>28.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Souled Out und 5vor8 (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>10.12.2008</td>
        <td>20.00 Uhr</td>
        <td>Erika Stucky “Bubbles &amp; Bangs” (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.00 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5 style="color:red;">1. Konzert Jasper van’t Hof &amp; Bob Malach (Diagonal) am 26.11.2008 ENTFÄLLT</h5>

    <p>Ein internationaler Star wie Jasper van’t Hof in der Region, und das gleich zweimal kurz hintereinander! Das wäre auch für die aufstrebende Jazzstadt IN zuviel. So entfällt das Konzert in IN, da Jasper am Sa 29.11.08 im Birdland in Neuburg auftritt. Also eigentlich entfällt das Konzert nicht! Dann mal rüber nach Neuburg in das wunderschöne Kellergewölbe zu Manfred Rehm, dem Urgestein des Birdlands fahren! </p>

    <hr />

    <h5>2. Verbilligte Schülerkarten für Konzerte im Diagonal</h5>

    <p>Das Diagonal zeigt ein Herz für Schüler! Gegen Vorlage des Schülerausweises an der Abendkasse bekommt man folgende Ermäßigungen:</p>
    <table border="0" cellpadding="4" cellspacing="4">
      <tr>
        <th align="center">Normalpreis</th>
        <th align="center">Schülerpreis</th>
      </tr>
      <tr>
        <td align="center">8 €</td>
        <td align="center">5 €</td>
      </tr>
      <tr>
        <td align="center">10 €</td>
        <td align="center">6 €</td>
      </tr>
      <tr>
        <td align="center">15 €</td>
        <td align="center">10 €</td>
      </tr>
      <tr>
        <td align="center">18 €</td>
        <td align="center">12 €</td>
      </tr>
    </table>
    <p>Ein dickes Lob an Franz Werthmann vom Bürgerhaus, der uns diese Rabatte – unabhängig von der Vereinszugehörigkeit – gewährt! Demnächst gibt’s auch neue Konzerte für 2009. Lassen wir uns überraschen!</p>

    <hr />

    <h5>3. X-mas Session am 14.12.08 im Diagonal mit IN-TV!!</h5>

    <p>Draußen weihnachtet es schneemäßig, drinnen werden die Adventskränze in Stellung gebracht; der Handel quillt schon über vor Präsente. Da wollen wir auch unseren Beitrag zur Rettung der schwächelnden Wirtschaft leisten und zur ersten X-Mas-Session am Sonntag 14.12.08 ab 19 Uhr im Diagonal einladen. Dort wird uns bei frostigen Außentemperaturen sicherlich Kerstin Schulz mit ihrem heißen Gesang und der Combo “4 of a kind” gehörig einheizen! Einsteiger (Wiederholungstäter, Frischlinge oder Quereinsteiger) sind herzlichst willkommen!! V.a. Besteht die Möglichkeit, ins Fernsehen zu kommen, denn IN-TV schneidet mit! Schnell noch zum Friseur, die Instrumente frisch poliert und geübt mitjammen. Übrigens: Es besteht die einmalige Chance, dass euer Schlagzeug oder E-Piano live im TV erscheint, denn wir suchen noch diese 2 Instrumente und deren Inhaber, die sich bereit erklären, dieselbigen an diesem Abend den spielwütigen Jazzern zur Verfügung zu stellen, sonst müssen wir auf Mouth-Percussion und vierstimmigen Harmoniegesang ausweichen. Wer opfert sich? Es naht das Weihnachten der guten Herzen ...</p>

    <hr />

    <h5>4. Weitere Jazztermine / Sessionplanung 2009</h5>

    <p>Noch mehr Jazztermine? Nach diesen gigantischen Jazztagen? Jan Rottau, dem Festivalleitern, sowie seinem Team und dem Kulturreferat / -amt mit Hr. Engert und Hr. Gutmann an der Spitze sei an dieser Stelle nochmals wärmstens gedankt!! Wir können mehr als stolz sein auf die Jazzhochkultur unserer Boomtown!!! Und jetzt ohne zu Verzagen hinein in die Jazztage 2009! Lasst uns das einer Großstadt würdige Niveau halten!!</p>

    <p>Der harte Kern ist nach den diesen Jazztagen übrigens nicht in den Winterschlaf gefallen, sondern arbeitet schon wieder fleißig an den Terminen im Jahr 2009. Wer da mitreden will, auch mal die ein oder andere Aufgabe schultern kann, soll mir doch kurz eine Mail schicken, dann teile ich ihm den Ort und die Zeit des nächsten Treffens umgehend mit. Bisher haben wir folgende Termine 2009, die noch nicht definitiv sind, ins Auge gefasst:</p>

    <ul>
      <li>So 25.1. Jam Session (JS) im Swept Away</li>
      <li>So 15.2. JS im Diagonal</li>
      <li>Sa 21.3. Big Band Treffen der Ingolstädter Gymnasien in der Fronte</li>
      <li>So 26.4. Young Players Session (Diagonal oder Birdland, wär das was, Manfred R.??)</li>
      <li>So 24.5. JS im Swept Away</li>
      <li>in Juni wieder Programmberatung beim Dixie- und Swing-Festival</li>
      <li>Fr-So 10.-12.7. Jazzbühne am Bürgerfest (Summer Jazz Open Air)</li>
      <li>Ende Juli Jazz-Schulbands in der Musikszene (Neue Welt)</li>
    </ul>

    <p>Weiter planen wir:</p>

    <ul>
      <li>Jahreshauptversammlung des Vereins Anfang Februar</li>
      <li>kostenloses Bonuskonzert für alle Vereinsmitglieder im Frühling im Diagonal</li>
    </ul>

    <p>Definitiv ist dafür folgendes brühwarmes Konzert:</p>

    <blockquote>
      <p>“Am 28.11.08 steigt im Diagonal in Ingolstadt ein Konzert der etwas anderen Art:<br />
        Souled Out, Gewinner des letztjährigen Publikumspreises beim Maxi-DSL-Contest geben Coversongs und Eigenes aus den Bereichen Jazzfunk, Soul und Fusion zum Besten. Interessant könnte auch für den ein oder anderen unser neuer Mann an den schwarzen und weißen Tasten sein: Wasti Zäch gehört seit geraumer Zeit fest zu unserer Band.</p>

      <p>Doch der Abend wird nicht nur funky, sondern auch rockig. 5vor8, Indieband aus Ingolstadt und vor kurzem mit den nicht ganz unbekannten "Peilomat" zusammen auf der Bühne, komplettieren den musikalischen Stilmix und präsentieren ihr von Reggae und anderem inspiriertes Programm.</p>

      <p>Souled Out und 5vor8<br />
        Funk meets Indie<br />
        am 28.11.08 - Einlass 19.30<br />
        im Bürgerhaus / Diagonal<br />
        Abendkasse: 5 Euro - incl. Gutschein fürs maki.</p>

      <p>Hier findet man den Flyer:<br />
        <a href="http://getsouledout.com/flyerfarbe2.jpg">http://getsouledout.com/flyerfarbe2.jpg</a>
      </p>
    </blockquote>

    <hr />

    <h5>5. Neue Mitglieder im Verein</h5>

    <p>Schon wieder eine Grenze überschritten: Wir habe die 130er Marke gerissen: Wir haben neu im Verein dabei:</p>

    <ul>
      <li>Elisabeth Baumann,</li>
      <li>Martin Flick,</li>
      <li>Bettina Nehir,</li>
    </ul>

    <p>von denen ich mangels Bekanntschaft – noch – nichts berichten kann. Dafür sind mir die beiden folgenden Neueinsteiger mehr als bekannt:</p>

    <ul>
      <li>Daniel Höpp, unser aller Webmaster, Gestalter der einmaligen Vereinshomepage</li>
      <li>und Daniel Schlamp, Held am Altsaxophon in der aktuellen Jazz GmbH</li>
    </ul>

    <p>Leider sind mir wieder beim letzten Jazzletter einige Fehlermeldungen ins Haus getrudelt, wo ich um Mithilfe bei der Suche nach der richtigen Adresse bitten wollte. Wer hat die richtige Email von</p>

    <ul>
      <li class="attachment">Die Liste kann nur direkt im Newsletter eingesehen werden.</li>
    </ul>

    <p>?? Sonst muss ich diese Namen aus dem Jazzletter streichen. Wär schad drum.</p>

    <hr />

    <h5>6. Jazzecho informiert</h5>

    <p>Was ich zum Schluss nicht vorenthalten will, ist eine Internetadresse, bei der man sich aktuell per Text, Sound - inkl. Podcast - und Video kostenlos über aktuelle Jazzscheiben informieren kann, auch mit Newsletter. Die Adresse lautet:</p>
    <p><a href="http://www.jazzecho.de">http://www.jazzecho.de</a></p>

    <p>Lohnt sich!<br />
      Wie auch die Mitgliedschaft im Verein!<br />
      Wie auch das Lesen meiner Jazzletter!<br />
      Wie auch das Mitjammen bei den Sessions!<br />
      Wie auch das Jazzleben in IN!<br />
      Wie auch Konzertbesuche in den Kultkneipen Neue Welt, Diagonal, Swept Away oder dem Birdland!<br />
      Wie auch das Sinnieren, welche Superstars 2009 bei 26. Ingolstädter Jazztagen kommen!<br />
      Wie auch immer: Der Jazz lebt in IN und um UNS herum!</p>

    <p>Let it flow!</p>

    <div class="signum">Robert Aichner</div>

    <p class="small">PS: Gleich nach diesem Letter gibts den Dezember-Letter des Birdlands! Dort wie immer höchste Qualität! Und auch öfter mal hier reinschauen:</p>

    <p><a href="http://www.neuewelt-ingolstadt.de">http://www.neuewelt-ingolstadt.de</a></p>

    <p>Hier gibt’s den ein oder anderen Juwel zu entdecken! Woidl von der Neuen Welt zaubert jedes Jahr aufs Neue aus der Welt Newcomer und internationale Stars!</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>


  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 22  (31. Oktober 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 22</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 129</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>“Holly Cole” singt heutabend Tom Waits” in der Fronte 79</li>
      <li>Noch Karten für die “Klangpatrouille” am 4.11.2008</li>
      <li>Newsletter vom Birdland Jazzclub Neuburg</li>
      <li>Voice Connection in Eichstätt</li>
      <li>Randy Newman Konzert entfällt wegen Krankheit!</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Freitag</td>
        <td>31.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Holly Cole sing Tom Waits (Fronte 79)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>02.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch mit Birdland Jazzband (NH Ambassador Ingolstadt) </td>
      </tr>
      <tr style="color:#00c000;">
        <td>Montag</td>
        <td>03.11.2008</td>
        <td><span style="color:red">19.30 Uhr</span></td>
        <td>9. Session der Young Jazz Players (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Dienstag</td>
        <td>04.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Die Klanpatrouille (Neue Welt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Mittwoch</td>
        <td>05.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Jazz Award Project (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Caecilie Norby Band (Diagonal) oder: Jazz in den Kneipen</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazzkantine (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Chick Corea &amp; John McLaughlin (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazz Party I: Brand New Heavies, Wolfgang Haffner (Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>08.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jazz Party II: Herbie Hancock, James Carter, David Sanborn (Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazzgottesdienst (Kirche St. Matthäus, Schrannenstraße 7)</td>
      </tr>
      <tr style="color:red;">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Gala-Night: Randy Newman (Festsaal Ingolstadt) ENTFÄLLT!!</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>18.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Electric Outlet (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>26.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jasper van’t Hof &amp; Bob Malach (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>10.12.2008</td>
        <td>20.00 Uhr</td>
        <td>Erika Stucky “Bubbles &amp; Bangs” (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.00 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage <a href="http://www.ingolstadt.de/jazztage" style="color:inherit">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. “Holly Cole” singt Tom Waits” in der Fronte 79</h5>

    <p>Nun melde ich mich doch früher als gedacht, aber wie ich gestern erfahren habe, gastiert heute eine phantastische Frauenstimme ab 20 Uhr in der Fronte 79: Holly Cole (dazu heute ein Artikel im DK). Sie präsentiert heute Abend Songs von Tom Waits an. Nach Ingolstadt geholt hat diese einzigartige Stimme Walter Haber, vielen Ingolstädtern als Woidl der Neuen Welt bestens bekannt, einer der wichtigsten Kulturschaffenden unserer Stadt. Woidl präsentiert auf seiner Kleinkunstbühne Neue Welt nicht nur ein professionelles Programm der höchsten Güte, er fördert auch durch die Veranstaltungsreihe “Ingolstädter Musikszene” seit Jahrzehnten den musikalischen Nachwuchs. So haben schon manche Stars von heute (Chris Böttcher, Günther Grünwald) auf seiner Kulturbühne die ersten Gehversuche gemacht. Dazu wird demnächst auch eine Arbeit des Jazz GmbH Mitglieds Daniel Schlamp genauer Auskunft geben. Also, wer ein Zuflucht vor Neck und Schreck der Halloween-Nacht sucht, ist in der Fronte heute genau richtig!</p>

    <hr />

    <h5>2. Noch Karten für die “Klangpatrouille” am 4.11.2008</h5>

    <p>Wie vielleicht bekannt, sind zahlreiche Konzerte der Jazztage bereits ausverkauft. Deshalb ein kleiner Geheimtipp: Am Dienstag 4.11.08 für das Konzert der Klangpatrouille in der Neuen Welt ab 20.30 Uhr gibt es noch Karten! Die Jungs dieser Combo gelten mittlerweile als die Nachwuchsjazzband Ingolstadts! Nachzulesen, was das Septett auszeichnet, kann man unter:<br />
      <a href="http://www.klangpatrouille.de">http://www.klangpatrouille.de</a>
    </p>
    <p>Also rein in die regionale Szene Ingolstadts und v.a. sich mal die renovierte Neue Welt von innen anschauen!!</p>

    <hr />

    <h5>3. Newsletter vom Birdland Jazzclub Neuburg</h5>

    <p>Für alle, deren Lieblingskonzert bei den Jazztagen wirklich schon ausverkauft ist, habe ich noch einen großen Trost, denn es gibt ja in der Region den Jazzclub Nr. 1: das Birdland in Neuburg! Manfred Rehm hält an dem Wochenende der Higlightkonzerte in Ingolstadt (6. bis 8. November) ein bewährt gutes Programm parat, das ich im Newsletter des Birdlands Euch im Anschluss zusende.</p>

    <hr />

    <h5>4. Voice Connection in Eichstätt</h5>

    <p>Und vor kurzem erreichte mich ein Mail von Andreas Kern, Mitglied der besten regionalen A-Cappella Formation, das ich gerne weitergebe:</p>

    <blockquote>
      <p>“Hallo Freunde der gepflegten Musik,</p>

      <p>einen ham'wer noch.... in diesem Jahr.</p>

      <p>Bevor wir uns in die kreative Winterpause zurückziehen gibt's noch einen Auftritt. Wir freuen uns schon riesig auf das Konzert am Dienstag, den 18. November im Alten Stadttheater Eichstätt. Das Konzert wird unser bisher größtes sein!</p>

      <p>Das ganze läuft zugunsten der Weihnachtsaktion des Willibald-Gymnasiums. Karten zu EUR 10,- bzw. 5,- gibt's im Vorverkauf beim Musik Gottstein, im Willibald-Gymnasium und bei den Band-Mitglieder. Alle Details stehen auch auf unserer Homepage auf der News-Seite.</p>

      <p><a href="http://www.the-voice-connection.de">http://www.the-voice-connection.de</a></p>

      <p>Viele Grüße von<br />
        The Voice Connection”</p>
    </blockquote>

    <hr />

    <h5>5. Randy Newman Konzert entfällt wegen Krankheit!</h5>

    <p>Und zuletzt die schlechte Nachricht: Das Galakonzert mit Randy Newman am 9.11.08 muss leider wegen Krankheit des Künstlers entfallen. Karten können an den bekannten Vorverkaufstellen zurückgegeben werden. Das Eintrittsgeld wird zurückerstattet! Schade! Aber vielleicht klappts ja im nächsten Jahr, oder Jan??</p>

    <p>Man sieht sich auf den Jazztagen oder in der Neuen Welt!!</p>

    <div class="signum">Robert Aichner</div>

    <p class="small">PS: Wir haben wieder neue Mitglieder! Die stelle ich dann in Ruhe im nächsten Jazzletter vor, denn es kommen doch sicher noch einige durch die Jazztage mit dazu, oder??</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>


  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 21  (15. Oktober 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 21</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 125</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Ingolstädter Jazztage 2008 haben begonnen! Newsticker auf der Vereinshomepage</li>
      <li>Vereins-Highlight: Young-Jazz-Players-Session am 3.11.2008 bei den Jazztagen</li>
      <li>Das Sessionbook 2008 ist da! Songliste im Anhang</li>
      <li>PMIO Musikschule Regensburg sucht Lehrer</li>
      <li>Dieser Newsletter geht über eine neue Email-Adresse</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>19.10.2008</td>
        <td>18.00 Uhr</td>
        <td>Preisträgerkonzert: Christina Jung mit “Jungblut” (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>26.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Gospel &amp; Soul Night – Thilo Wolf &amp; Joan Faulkner (St. Augustin)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>30.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Kolsimcha (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>30.10.2008</td>
        <td>&nbsp;</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal- und Reuchlin-Gymnasium)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>31.10.2008</td>
        <td>&nbsp;</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal- und Reuchlin-Gymnasium)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>02.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch mit Birdland Jazzband (NH Ambassador Ingolstadt) </td>
      </tr>
      <tr style="color:#00c000;">
        <td>Montag</td>
        <td>03.11.2008</td>
        <td><span style="color:red">19.30 Uhr</span></td>
        <td>9. Session der Young Jazz Players (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Dienstag</td>
        <td>04.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Die Klanpatrouille (Neue Welt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Mittwoch</td>
        <td>05.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Jazz Award Project (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Caecilie Norby Band (Diagonal) oder: Jazz in den Kneipen</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazzkantine (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Chick Corea &amp; John McLaughlin (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazz Party I: Brand New Heavies, Wolfgang Haffner (Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>08.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jazz Party II: Herbie Hancock, James Carter, David Sanborn (Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazzgottesdienst (Kirche St. Matthäus, Schrannenstraße 7)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Gala-Night: Randy Newman (Festsaal Ingolstadt)</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>18.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Electric Outlet (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>26.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jasper van’t Hof &amp; Bob Malach (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>10.12.2008</td>
        <td>20.00 Uhr</td>
        <td>Erika Stucky “Bubbles &amp; Bangs” (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.00 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage <a href="http://www.ingolstadt.de/jazztage" style="color:inherit">www.ingolstadt.de/jazztage</a></p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Ingolstädter Jazztage 2008 haben begonnen! Newsticker auf der Vereinshomepage</h5>

    <p>Es ist soweit: Mit einem steilen Warm-Up-Konzert diesen Dienstag mit dem Nachwuchsstar Malene Mortensen aus Dänemark begannen die 25. Ingolstädter Jazztage. Aber es kommt noch heißer, denn nach der Gospel &amp; Soul Night am 26.10.08 und der Weltmusik-Sensation Kolsimcha am 30.10.08 reiht sich in der 1. Novemberwoche (für alle Schultätigen: Da sind Herbstferien!!) ein Highlight nach dem anderen:</p>
    <ul>
      <li>das vereinsinterne Highlight: Die Session der Young Jazz Players am 3.11.08</li>
      <li>die Highlights der Jazzförderpreisträger am 4.11.08 (Jazz Award in Concert)</li>
      <li>die momentan führende Nachwuchs-Jazzband in IN die “Klangpatrouille” am 5.11.08</li>
      <li>Jazz in den Kneipen: IN swingt, jazzt und rockt am 6.11.08</li>
      <li>Chick Corea &amp; John McLaughlin am 7.11.08</li>
      <li>die bereits ausverkaufte Jazz Party II u.a. Mit Herbie Hancock am 8.11.08</li>
      <li>und das ultimative Galakonzert mit dem 5-maligen Grammygewinner Randy Newman am 9.11.08 (schnell Karten kaufen!!)</li>
    </ul>

    <p>Reimund Domke, der 1. Vorsitzende unseres Vereins, hat dabei den Überblick behalten und veröffentlich aktuell seine persönlichen Empfehlungen auf unserer Vereinshomepage unter <a href="http://www.jazzfreunde-ingolstadt.de/jazztage.php">http://www.jazzfreunde-ingolstadt.de/jazztage.php</a></p>

    <p>Übrigens: Wer noch keine Karten hat, sollte mit seiner Bestellung nicht zögern, da einige Konzert schon knapp am “Ausverkauft”-Limit sind, denn das Kulturamt Ingolstadt fährt dieses Jahr eine verdammt gute Werbung: An dieser Stelle auch unser herzlichster Dank an die Fleißigen des Kulturamts, Hr. Gutmann, Fr. Willner, Fr. Mödl... und alle, die ich hier sicherlich vergessen habe!</p>

    <p>Also: Zugreifen und kaufen unter <a href="http://www.ingolstadt.de/jazztage/documents/kartenreservierungsassistent_1.cfm">http://www.ingolstadt.de/jazztage/documents/kartenreservierungsassistent_1.cfm</a></p>

    <hr />

    <h5>2. Vereins-Highlight: Young-Jazz-Players-Session am 3.11.2008 bei den Jazztagen</h5>

    <p>Wie schon oben erwähnt, fiebert der Verein seinem persönlichen Highlight entgegen, der Young Jazz Players Session am 3.11.08 ab 19.30 Uhr im Kultlokal Diagonal. Dieses Jahr werden sich gleich 3 Ingolstädter Nachwuchsformationen dem Jazzpublikum präsentieren:</p>
    <ul>
      <li>die Jazz GmbH des Reuchlin-Gymnasiums (Ltg. Robert Aichner)</li>
      <li>der Jazzclub des Gnadenthal-Gymnasiums (Ltg. Bernhard Reitberger)</li>
      <li>die Jazz Players des Katharinen-Gymnasiums (Ltg. Charly Leimer)</li>
    </ul>

    <p>Natürlich sind alle Jazzaktive jeglichen Alters zum Mitjammen herzlichst eingeladen. Um einen Überblick über Mitspieler zu bewahren, nehme ich gerne per Mail Anmeldungen an! Und damit die Absprachen bezüglich der machbaren Jazztunes vorab erleichtert werden, nun eine Auflistung von Titeln, die von den oben genannten Sessionbands gespielt werden können:</p>
    <ul>
      <li>All Blues</li>
      <li>Bags Groove</li>
      <li>Blue Bossa</li>
      <li>Cantaloupe Island</li>
      <li>Chameleon</li>
      <li>C Jam Blues</li>
      <li>Georgia</li>
      <li>Mercy, Mercy, Mercy</li>
      <li>Oye Como va</li>
      <li>Southwick</li>
      <li>Tenor Madness</li>
      <li>Watermelon Man</li>
      <li>...</li>
    </ul>

    <p>Und nicht genug: Ab Freitag 17.10.08 ist es endlich soweit:</p>

    <hr />

    <h5>3. Das Sessionbook 2008 ist da! (Songliste im Anhang)</h5>

    <p>Nach nächtelanger Arbeit im Hochsommer konnte es endlich fertig gestellt werden: Das vereinsinterne Sessionbook 2008! Es enthält 18 Klassiker des Jazz / Soul / Funk, bzw. 2 Kompositionen von regionalen Nachwuchsjazzern (Simon Seidl, Bernadette Schreyer) für C-, Bb-, Es-, Bassinstrumente und Stimme gesetzt; also kompatibel mit allen jazztauglichen Instrumenten. Ideal also für die Ingolstädter Sessions und zum Unterrichten. Ein Inhaltsverzeichnis gibt’s im Anhang.<br />
      Zu beziehen ist unser neues Baby ab Freitag entweder bei Reimund Domke im DER-Reisebüro zentral in der Milchstr. 1, oder bei mir im Reuchlin-Gymnasium.</p>

    <p>Für Vereinsmitglieder gibt’s dieses mit CD versetzte Werk umsonst, Schulen erhalten ebenso kostenlose Exemplare; Noch-Nicht-In-Den-Verein-Eintrittswillige müssen 10 Euro Unkostenbeitrag berappen, denn wir hatten schon ein paar Ausgaben. Aber das muss ja nicht sein, wenn man noch schnell Vereinsmitglied wird unter<br />
      <a href="http://www.jazzfreunde-ingolstadt.de/beitritt.php">http://www.jazzfreunde-ingolstadt.de/beitritt.php</a>
    </p>

    <hr />

    <h5>4. PMIO Musikschule Regensburg sucht Lehrer</h5>

    <p>Fast zu guter Letzt ein Anliegen der PMIO Musikschule Regensburg. Sie trat an mich heran mit der Bitte, folgendes zu veröffentlichen:</p>

    <blockquote>
      <p>“Sehr geehrter Herr Aichner,<br />
        <br />
        entschuldigen Sie vielmals, dass wir ohne Voranmeldung auf Sie per e-mail zukommen.<br />
        <br />
        Sie wurden uns als "Kenner" der Szene in Ingolstadt in Bezug auf Musiklehrerinnen und Musiklehrer empfohlen.<br />
        <br />
        Unser Anliegen: Wir suchen für unsere Zweigstelle in der Auenstraße in Ingolstadt einen Lehrer oder eine Lehrerin für E-Gitarre (ggf. auch E-Bass).<br />
        Dies kann auch ein praxisbewährter Musiker (Musikerin) sein, der in puncto Rock&amp;Pop qualifizierten Unterricht erteilen kann.<br />
        Übrigens erfolgte die Empfehlung über einen neuen Schlagzeuglehrer bei uns an der Schule, Herrn Martin Schnabel und dessen Pianisten aus seiner Band.<br />
        <br />
        Wir hoffen, dass Sie uns bei unserer Suche weiterhelfen könnten.<br />
        Mit freundlichen Grüßen,<br />
        PMIO/Muikschule Regensburg<br />
        i.A. Inge Filchner, Sekretariat<br />
        <br />
        <br />
        __________________________<br />
        <br />
        PMIO/Musikschule Regensburg<br />
        Fröhliche-Türkenstr.9<br />
        93047 Regensburg<br />
        Tel.:0941/565353<br />
        <a href="http://www.pmio.de">www.pmio.de</a>”
      </p>
    </blockquote>

    <hr />

    <h5>5. Dieser Newsletter kommt über eine neue Email-Adresse</h5>

    <p>Und als letztes nicht erschrecken: Dieser Newsletter kommt über eine neue Email-Adresse, da ich die bei meinem Provider web.de nötige Aufteilung der 300 Empfänger des Jazzletters in 3 Teile umgehen will, sende ich ab sofort den Letter über eine neue, von unserem Webmaster Daniel Höpp eingerichtete Email-Adresse:<br />
      <u>newsletter @ jazzfreunde-ingolstadt.de</u>
    </p>

    <p>Also mich bitte nicht wegspamen, außer es war beabsichtigt ;) Sollte jemand nicht den Jazzletter über die neue Adresse bekommen haben, so kriege ich das hoffentlich mit!</p>

    <p>Dann wars das mal für die nächsten Wochen, denn ich tauche jetzt ganz tief ein in die<br />25. INGOLSTÄDTER JAZZTAGE!!</p>

    <p>Wir sehen uns, oder?? Liebe Grüße!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 20 – Der Megaletter! (25. September 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 20 – Der Megaletter!</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 125</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Homepage am Start! <a href="http://www.jazzfreunde-ingolstadt.de">http://www.jazzfreunde-ingolstadt.de</a></li>
      <li>Jazztage mit großartigem Jubiläumsprogramm</li>
      <li>Alle guten Dinge sind Drei! Unsere Sessions bis Weihnachten</li>
      <li>Perfektes Jazz-Programm im Bürgerhaus / Diagonal</li>
      <li>Neue Vereinsmitglieder</li>
      <li>Hilfe bei versand(e)ten E-Mails. Wer hat Kontakt zu ...</li>
    </ol>

    <hr />

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td><span style="color:red;">28</span>.09.2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>03.10.2008</td>
        <td style="text-align:center">?</td>
        <td>Close to Jazz (Ohrakel)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>08.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Emil &amp; Eduard (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>11.10.2008</td>
        <td>20.00 Uhr</td>
        <td>The Voice Connection (Pfarrsaal Kösching)</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Dienstag</td>
        <td>14.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Malene Mortensen Group (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>19.10.2008</td>
        <td>18.00 Uhr</td>
        <td>Preisträgerkonzert: Christina Jung mit “Jungblut” (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>26.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Gospel &amp; Soul Night – Thilo Wolf &amp; Joan Faulkner (St. Augustin)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>30.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Kolsimcha (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>30.10.2008</td>
        <td>&nbsp;</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal- und Reuchlin-Gymnasium)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>31.10.2008</td>
        <td>&nbsp;</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal- und Reuchlin-Gymnasium)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>02.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch mit Birdland Jazzband (NH Ambassador Ingolstadt) </td>
      </tr>
      <tr style="color:#00c000;">
        <td>Montag</td>
        <td>03.11.2008</td>
        <td><span style="color:red">19.30 Uhr</span></td>
        <td>9. Session der Young Jazz Players (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Dienstag</td>
        <td>04.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Die Klanpatrouille (Neue Welt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Mittwoch</td>
        <td>05.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Jazz Award Project (Diagonal)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Caecilie Norby Band (Diagonal) oder: Jazz in den Kneipen</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazzkantine (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Chick Corea &amp; John McLaughlin (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazz Party I: Brand New Heavies, Wolfgang Haffner (Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>08.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jazz Party II: Herbie Hancock, James Carter, David Sanborn (Ambassador)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazzgottesdienst (Kirche St. Matthäus, Schrannenstraße 7)</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Gala-Night: Randy Newman (Festsaal Ingolstadt)</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>18.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Electric Outlet (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>26.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jasper van’t Hof &amp; Bob Malach (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>10.12.2008</td>
        <td>20.00 Uhr</td>
        <td>Erika Stucky “Bubbles &amp; Bangs” (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.00 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#00c000;">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <p>Jazzletter Nr. 20! 125 Mitglieder! 25. Jubiläum Jazztage! Es gibt jede Menge zu feiern in unserem MEGALETTER!!</p>

    <h5>1. Homepage am Start!</h5>

    <p>Es ist soweit! Nach monatelanger Arbeit ist das Kind auf die Welt gebracht: Die Homepage des Vereins der Jazzfreunde. Unter<br /><a href="http://www.jazzfreunde-ingolstadt.de">http://www.jazzfreunde-ingolstadt.de</a><br />könnt ihr ab sofort alles Wissenswerte über unseren Verein abrufen, so z. B. unsere Ziele, Projekte, Veranstaltungen; Bilder und CD-Tipps; eine Link-Sammlung, die – hoffentlich – alle Jazzbands der Region sowie eine Auflistung aller Jazzförderpreisträger enthält. Ein Riesendank geht hier an unseren Webmaster und Homepageentwickler Daniel Höpp für seine zahlreichen Stunden, die er in dieses Projekt investiert hat. Wir sind natürlich dankbar über jedwede Kritik oder Verbesserungsvorschläge!</p>

    <hr />

    <h5>2. Jazztage mit großartigem Jubiläumsprogramm</h5>

    <p>Es ist kaum zu glauben, wer sich dieses Jahr bei den 25. Jazztagen die Klaviertasten in die Hand gibt: Chick Corea, Herbie Hancock, Randy Newman ... Es ist der schiere Wahnsinn, was Jan Rottau, der Festivalleiter, und sein Team geleistet haben und bedarf hoffentlich keines Kommentars mehr. Wenn doch, dann schaut mal nach unter:<br /><a href="http://www.ingolstadt.de/jazztage">http://www.ingolstadt.de/jazztage</a></p>
    <p>Alle Termine gibt’s kompakt im obigen Terminplaner oder auf unserer Homepage. Und nicht vergessen: Der Kartenvorverkauf läuft bereits. Alle Vereinsmitglieder können durch Vorzeigen ihres Mitgliedausweises im Kulturamt (Auf der Schanz 39, 85049 Ingolstadt, Montag bis Freitag: 8.00 bis 12.30 Uhr, Montag, Dienstag: 13.30 bis 16.00 Uhr, Donnerstag: 13.30 bis 17.30 Uhr) um 10 % günstigere Karten erwerben. Also gleich ordern, denn auf viele Konzerte setzt bereits bundesweit ein Run ein (300 Online-Bestellungen für Chick Corea innerhalb einer Woche)!!</p>

    <hr />

    <h5>3. Alle guten Dinge sind Drei! Unsere Sessions bis Weihnachten</h5>

    <p>Wer will, kann sich diesen Sonntag (28.9.08) schon mal für die Jazztage Warmspielen, falls ihn die Bayernwahl außer Haus lässt, wobei: Auch im Swept Away ab Sessionbeginn um 19 Uhr werden wir die aktuellen Hochrechnungen durchgeben und was gibt es besseres, als die Ergebnisse gleich bei einem (oder 2?) Bier(en) zu diskutieren. Dass diese Session eine besondere werden wird, dafür bürgt schon die Ankündigung des diesmaligen Verantwortlichen für die Sessionband, Manfred See:</p>

    <blockquote>
      <p>“Hi Robert,<br />
        das Saxophon Quartrett Powersax übt schon fleißig für die Eröffnung der Jam Session..
        Wir bringen folgende Musiker mit<br />
        Sax Quartett Powersax: Wolfgang Böhnel, Barbara Rehrl, Simon Woll Manfred See<br />
        Die Band dazu:<br />
        Gregor Spreng Piano<br />
        Les Mann Gitarre<br />
        Thomas Sendtner Bass<br />
        Günther Haunschild Schlagzeug<br />
        Eine Neuigkeit gibt's auch:<br />
        Günter Haunschild war Gründungsmitglied von United Cervelat und Komik Partner von Günter Grünwald - die Parodien im IN Stadttheater mit Günther Haunschild alias "Kurt Schellack" sind zwar lange her aber ich freue mich einen "alten Kampfgefährten von früher wieder dabei zu haben ....</p>

      <p>die Parodie auf den damaligen Golfplatz im Naturschutzgebiet und auf Aktienzeichen XY Ungelöst mit Eduard Zimmermann und Peter Niedetzky sind alteingesessen Ingolstädtern sicher noch bekannt...”</p>
    </blockquote>

    <p>Die übernächste Session findet dann im Rahmen der Jazztage am 3. November ab 19.30 Uhr im Diagonal statt und wird von Ingolstädter Schuljazzbands, IN-Jazzern und hoffentlich zahlreichen ehemaligen Jazzförderpreisträgern getragen: Hier soll sich die gesamte Jazzszene von Jung bis Erfahren präsentieren!</p>

    <p>Und zum Jahresausklang noch ein internes Highlight: Kerstin Schulz und ihre groovy Combo konnte für eine Christmas-Session am 14.12.08 (Sonntag) im Diagonal gewonnen werden! Aller guten Dinge sind ja bekanntlich drei; also unsere erfolgreiche Sessionserie im Trubel der Jazztage nicht vergessen!</p>

    <hr />

    <h5>4. Perfektes Jazz-Programm im Bürgerhaus / Diagonal</h5>

    <p> Es rührt sich wirklich was im Jazz in IN, denn das Jazzlokal Ingolstadts, das Diagonal im Bürgerhaus, bietet ab Herbst 2008 wieder ein tolles Programm an. Unermüdlich arbeitet für den Jazz in diesem Haus Franz Werthmann, dem man als Jazzfreund eine Jazzversorgung erster Güte übers Jahr verteilt verdankt (Danke Franz für deine unglaublich wichtige Arbeit fürs Ingolstädter Kulturleben)! Um den Überblick in Zeiten eines heißen Jazzherbstes zu behalten, lege ich den Programm-Flyer zum Ausdrucken in den Anhang. Schaut Euch dabei auch mal die Liste der Weltstars an, die in Clubatmosphäre in Ingolstadt schon ein Konzert gaben (Joe Zawinul, Brecker Brothers, The Jazz Crusadersm Tuck &amp; Patti ... )!</p>

    <p>Auch im Ohrakel regt sich mittlerweile der Jazz, wie folgende mir zugesandten Zeilen von Vereinsmitglied Steffen Mayer verraten:</p>

    <blockquote>
      <p>“Hallo,<br />
        hier ist Steffen Mayer. Vielleicht könntest Du noch unseren Auftritt (Close to Jazz) am 03.10.2008 im Ohrakel mit in den Veranstaltungskalender aufnehmen. Weitere Infos:</p>

      <p>Caro Lindner;Vocal<br />
        Steffen Mayer;keyboards<br />
        Markus Bergmann; Saxes<br />
        Wolfgang Kittan; Bass<br />
        Gerhard Kiffe; Drums</p>

      <p>Groovende Coverversionen von Pop- und Rocknummern mit souliger Stimme und Rockjazz Begleitung. Nicht der 150. Norah Jones Aufguss oder stundenlanges Improvisieren auf 2 Akkorden, sondern intelligentes Jonglieren mit den Stilen und den Stilmitteln aus Latin, Jazz und Pop. Vorgetragen von Leuten, die schon ein breites Spektrum an Musik hinter sich gebracht haben.”</p>
    </blockquote>

    <hr />

    <h5>5. Neue Vereinsmitglieder</h5>

    <p>Fast klingt es geplant: Zum 25. Jubiläum der Jazztage präsentiert der 20. Jazzletter die 125. Mitglieder des Vereins der Jazzfreunde. Herzlich willkommen:</p>
    <ul>
      <li>Andreas Kern, Powerbariton bei der A-Cappella-Formation “The Voice Connection” (www.the-voice-connection.de)</li>
      <li>Markus Mayer, begnadeter Gitarrist bei Klangpatrouille (www.klangpatrouille.de)</li>
      <li>Simon &amp; Johannes Leininger, deren Papa und Vereinsmitglied Dr. Gerhardt Schmidt bei den Jazztagen den Jazzgottesdienst beorgelt<br />(beide sind als Teenager am Reuchlin-Gymnasium in der Jazz GmbH junior aktiv)</li>
    </ul>

    <p>Und: vielleicht überzeugen wir ja unsere neue Jazzförderpreisträgerin, Christine Jung, als Powerfrau an den Stimmbändern in unseren Club einzutreten? Jedenfalls Herzlichen Glückwunsch zum Jubiläumspreis!! Akustisches von Christine gibt’s übrigens unter: <a href="http://www.myspace.com/jungblutband">www.myspace.com/jungblutband</a>)</p>

    <hr />

    <h5>6. Hilfe bei versand(e)ten E-Mails. Wer hat Kontakt zu ...</h5>

    <ul>
      <li class="attachment">Die Liste kann nur direkt im Newsletter eingesehen werden.</li>
    </ul>

    <p>Einst bekamen die genannten Personen unseren Jazzletter, jedoch sind diese seit ein paar Wochen nicht mehr per Mail aus diversen Gründen erreichbar. Hat jemand Kontakt zu ihnen, oder kann mir eine Alternativadresse angeben? Ansonsten werde ich diese Namen demnächst aus dem Verteiler nehmen müssen.</p>

    <p>Aber jetzt erst einmal hinein in den heißen Jazzherbst mit zahlreichen regionalen und internationalen Topacts! Wir sehen uns!</p>

    <div class="signum">Robert Aichner</div>

    <p>PS: als Dessert gibst noch den Newsletter des Jazzclubs Birdland aus Neuburg hinterher!!</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 19 ½ (28. August 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 19 ½</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 127</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Blechbläser-Workshop mit Stötter statt Brönner</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Stötter</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09.2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>08.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Emil &amp; Eduard (Diagonal)</td>
      </tr>

      <tr style="color:#30c060">
        <td>Dienstag</td>
        <td>14.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Malene Mortensen Group (Diagonal)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Sonntag</td>
        <td>19.10.2008</td>
        <td>18.00 Uhr</td>
        <td>Preisträgerkonzert: Christina Jung mit “Jungblut” (Diagonal)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Donnerstag</td>
        <td>30.10.2008</td>
        <td>20.00 Uhr</td>
        <td>Kolsimcha (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Donnerstag</td>
        <td>30.10.2008</td>
        <td>&nbsp;</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal- und Reuchlin-Gymnasium)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Freitag</td>
        <td>30.10.2008</td>
        <td>&nbsp;</td>
        <td>Jazz für Schulen: Workshops (Gnadenthal- und Reuchlin-Gymnasium)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Sonntag</td>
        <td>02.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Montag</td>
        <td>03.11.2008 </td>
        <td>20.00 Uhr</td>
        <td>9. Session der Young Jazz Players (Diagonal)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Mittwoch</td>
        <td>05.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Jazz Award Project (Diagonal)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>20.30 Uhr</td>
        <td>Caecilie Norby Band (Diagonal: Jazz in den Kneipen)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Donnerstag</td>
        <td>06.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazzkantine (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Chick Corea &amp; John McLaughlin (Festsaal Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Freitag</td>
        <td>07.11.2008</td>
        <td>22.00 Uhr</td>
        <td>Jazz Party I: Brand New Heavies ( NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Samstag</td>
        <td>08.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jazz Party II: Herbie Hancock Quintet (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazz Brunch (NH Ambassador Ingolstadt)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>11.00 Uhr</td>
        <td>Jazzgottesdienst (Kirche St. Matthäus, Schrannenstraße 7)</td>
      </tr>
      <tr style="color:#30c060">
        <td>Sonntag</td>
        <td>09.11.2008</td>
        <td>19.30 Uhr</td>
        <td>Highlight: Randy Newman (Festsaal Ingolstadt)</td>
      </tr>


      <tr>
        <td>Dienstag</td>
        <td>18.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Electric Outlet (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>26.11.2008</td>
        <td>20.00 Uhr</td>
        <td>Jasper van’t Hof &amp; Bob Malach (Diagonal)</td>
      </tr>
      <tr>
        <td>Mittwoch</td>
        <td>10.12.2008</td>
        <td>20.00 Uhr</td>
        <td>Erika Stucky “Bubbles &amp; Bangs” (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.00 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss" style="color:#30c060">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Blechbläser-Workshop mit Stötter statt Brönner</h5>

    <p>Nur ein kurzes Hallo während der Sommerpause aus gegebenen Anlass: Der von Thomas Schösser (Danke Thomas für Dein Engagement!) organisierte Blechbläser-Workshop vom 10. bis 14. September 2008 hat eine Personaländerung: Es kommt statt Till Brönner der Solotrompeter der NDR Big Band in Hamburg, Claus Stötter. Nähere Infos im Anhang und auf dessen Homepage:<br />
      <a href="http://www.wuerttembergische-philharmonie.de/web/3_Mitarbeiter/Solisten/2006_08_02_15_03_00_Claus_Sttter.html" title="Homepage von Claus Stötter">http://www.wuerttembergische-philharmonie.de/web/3_Mitarbeiter/Solisten/2006_08_02_15_03_00_Claus_Sttter.html</a>
    </p>

    <p>So, nun aber Schluss und lassen wir die Spannung steigen bis zum 20. Jazzletter, der einige Überraschungen parat hält!</p>

    <p>Noch einen schönen Spätsommer wünscht Euch</p>

    <div class="signum">Robert Aichner</div>

    <p>PS: Als zusätzliche Sommerlektüre habe ich grad eben den Newsletter des Birdland Jazzclubs Neuburg versandt.</p>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 19 (19. Juli 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 19</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 121</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Vereinsintern: Bitte noch fürs Grillfest am 2.8.08 anmelden!!</li>
      <li>Jazz in IN: Summer Jazz Open Air am 25./26.7. im Rappensberger</li>
      <li>Jazz in der Region: The Voice Connection am 20.7.08 in concert</li>
      <li>Jazz bayernweit: Verein bei “Landesarbeitsgemeinschaft (LAG) Jazz” dabei</li>
      <li>Deutsche Superstars in Neuburg: Denkwürdige Jazz-Abende in Neuburg!</li>
      <li>Internationale Megastars bei uns: Ron Carter, Chick Corea, John McLaughlin ... ??</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>So</td>
        <td>20.07. 2008</td>
        <td>20 Uhr</td>
        <td>Open Air in der Burg Nassenfels mit The Voice Connection</td>
      </tr>
      <tr>
        <td>Fr</td>
        <td>25.07.2008</td>
        <td>18.30 Uhr</td>
        <td>3. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sa</td>
        <td>26.07.2008</td>
        <td>14 Uhr</td>
        <td>3. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sa</td>
        <td>02.08.2008</td>
        <td>ab 15 Uhr</td>
        <td>Grillfest des Jazzfreunde-Vereins (Roter Gries: Nicks Garten)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09.2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>14.12.2008</td>
        <td>19.00 Uhr</td>
        <td>5. Jam Christmas-Session (Diagonal)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Vereinsintern: Bitte noch fürs Grillfest am 2.8.08 anmelden!!</h5>

    <p>Große Jazzereignisse suchen zur Zeit IN und die Region heim! Es macht Spaß zu sehen, wie der Jazz bei uns zu immer intensiveren Hochblüten gelangt! Aber fangen wir zunächst im Kleinen an: Die Jazzfreunde Ingolstadts wollen am 2.8.08 ab 15 Uhr in gemütlicher Atmosphäre in Nicks Garten (die Anfahrtsbeschreibung wurde jedem Mitglied per Mail oder Brief versandt) die bisherige Arbeit feiern. Wir vom aktiven Kern freuen uns schon sehr, möglichst viele Vereinsmitglieder mal persönlich kennen zu lernen. Falls noch nicht geschehen, bitte sagt per Mail oder per Telefon Bescheid, ob ihr überhaupt und wenn ja, mit wie viel Personen. Reimund Domke (unser 1. Vorstand hat an diesem Termin übrigens Geburtstag!!) hat die Mailadresse reimund.domke(ät)der.de oder die Telefonnummer 0841-1606 (= DER-Reisbüro). An dem hoffentlich sonnigen Samstag lasst uns dann zusammen plaudern über den ...</p>

    <hr />

    <h5>2. Jazz in IN: Summer Jazz Open Air am 25./26.7. im Rappensberger</h5>

    <p>In einer Woche zeigt sich vor der Sommerpause nochmals die Ingolstädter Jazzszene von ihrer besten Seite. Beim vom Verein organisierten 3. Summer Jazz Open Air am Wochenende 25. und 26. Juli im Innenhof des Hotels Rappensberger sind diese Jahr bei freiem Eintritt mit dabei:</p>

    <h6>FREITAG 25.7.08</h6>
    <ul style="font-style:italic;">
      <li><em>Die Klangpatrouille</em> (18.30 - 20 Uhr)</li>
      <li><em>Das Rudi Trögl Trio</em> (20.30 - 22 Uhr)</li>
    </ul>

    <h6>SAMSTAG 26.7.08</h6>
    <ul style="font-style:italic;">
      <li><em>Die Jazzplayers vom Katharinen-Gymnasium</em> (14 – 15 Uhr)</li>
      <li><em>Der Jazz Club vom Gnadenthal-Gymnasium</em> (15.15 - 16.15 Uhr)</li>
      <li><em>So What</em> (16.30 – 17.30 Uhr)</li>
      <li><em>Die Jazz GmbH + Jazz GmbH juniors vom Reuchlin-Gymnasium</em> (18.00 – 19.30 Uhr)</li>
      <li><em>Steps of Spirit</em> (20.30 Uhr - 22.00 Uhr)</li>
    </ul>

    <p>Nachwuchs und Profis vereint in einem wunderschönen Ambiente bei sehr moderaten Getränke- und Speisepreisen (Karte siehe im Anhang). Mit ermöglicht hat dies Stefan Wild, Pächter des Hotels Rappensberger und unser stellvertretender Vorsitzender: Vielen Dank Stefan für Dein stets großes Herz für den regionalen Jazz!! Womit wir gleich beim nächsten Thema wären ...</p>

    <hr />

    <h5>3. Regionaler Jazz: The Voice Connection am 20.7.08 in concert</h5>

    <p>Eine der besten A-Cappella-Formationen der Region gibt ihr mit Jazz angereichertes Können am 20. Juli zu Gehör. Aber da lassen wir gleich Andreas Kern, Mitglied bei der Connection (übrigens auch bald im Verein!), zu Wort kommen:</p>

    <blockquote>
      <p>“Am Sonntag, den 20. Juli, geben wir um 20:00 Uhr ein Open Air in der Burg Nassenfels. Den Abend gestalten wir zusammen mit CHORISMA. Das ist ein Chor aus Eichstätt. Weitere Infos dazu gibt's auf unserer Homepage.</p>

      <p><a href="http://www.the-voice-connection.de">http://www.the-voice-connection.de</a></p>

      <p>Viele Grüße von<br />
        The Voice Connection”</p>
    </blockquote>

    <p>Seine Connections hat übrigens der Verein auch vor Kurzem ausgebaut, und zwar beim ...</p>

    <hr />

    <h5>4. Jazz bayernweit: Verein bei “Landesarbeitsgemeinschaft (LAG) Jazz” dabei</h5>

    <p>Im Frühjahr 2008 trafen sich im Kultusministerium in München einige Personen, denen die Förderung des Jazz in Bayern, v.a. an den Schulen, sehr am Herzen liegt. Neben einigen Schulmusikern waren dort mit dabei Harald Rüschenbaum und Thomas Zoller, die als Profijazzer und ausgezeichnete Pädagogen im Jazz Herausragendes leisten. Bei dieser Besprechung wurde die Idee diskutiert, eine Landesarbeitsgemeinschaft Jazz (LAG Jazz) zu gründen, die sich um die Vernetzung, den Ideenaustausch, Fortbildungen und Kursangebote im Rahmen der Jazzmusik kümmern soll. Nachdem nun nach der Ausschreibung an allen bayerischen Schulen die Auswahl für das Gremium getroffen wurde, ist erfreulicherweise zu vermelden, dass auch der Verein in meiner Person dieser Gruppe angehören wird. Ich freue mich sehr über das neue Aufgabenfeld und habe mir zum Vorbild meine Musikkollegin am Reuchlin-Gymnasium, Eva-Maria Atzerodt (übrigens auch Vereinsmitglied!), genommen, die als Leiterin der schon länger existenten LAG Schulchor unglaublich viel leistet. Was eine LAG (hier die LAG Chor) so alles anstellt, kann auf deren Homepage (<a href="http://www.schulchor-bayern.de">http://www.schulchor-bayern.de</a>) nachgelesen werden, die übrigens Daniel Höpp, auch unser Homepage-Macher, entwickelt hat. Ach ja, unsere Homepage ... Keine Angst: wir sind dran und sie wird gut! Hoffentlich von der Qualität her vergleichbar mit den ... </p>

    <hr />

    <h5>5. Deutschen Superstars in Neuburg: Denkwürdige Jazz-Abende in Neuburg!</h5>

    <p>Und da kann es noch soviel regnen, das Summer Jazz Festival in Neuburg vor Kurzem war ein Festival der Superlative!! Unser Partner-Verein, der Jazzclub Birdland in Neuburg hat zu seinem 50. Jubiläum nicht gegeizt, und den begeisterten Zuhörern u.a. Superstars des deutschen Jazz präsentiert: Ein fantastischer Till Brönner zusammen mit Wolfgang Haffner und Dieter Ilg schafften es doch tatsächlich, mit ihrer einmalig groovenden Band mittels eines brasilianischen Standards die dunklen Regenwolken zu vertreiben. Am nächsten Tag dann übergab die Ikone des Zigeuner-Jazz, der deutsche Häns’che Weiss, den Stab an die Swing-Legende der Bundesrepublik, Paul Kuhn. Und damit nicht genug: Manfred Rehm, der unermüdliche Kämpfer für den Jazz in unserer Region und Haupt des Birdland-Jazzclubs ließ es sich nicht nehmen, uns mit einem der ganz Großen des Jazz zu beglücken: Ron Carter! Und dieser Grandseigneur am Kontrabass passt hervorragen in die unglaubliche Reihe, die demnächst bei den Ingolstädter Jazztagen fortgesetzt wird:</p>

    <hr />

    <h5>6. Internationale Megastars bei uns: Ron Carter, Chick Corea, John McLaughlin...??</h5>

    <p>Eigentlich sollte man froh sein, wenigstens einen dieser 3 Weltstars des Jazz wenigstens einmal bei uns in der Region hören zu dürfen, aber ... unglaublich aber wahr: Nach dem ehemaligen Miles Davis Sideman Ron Carter treten tatsächlich am 7.11.2008 die Miles-Gefährten Chick Corea und John McLaughlin bei den 25. Ingolstädter Jazztagen auf! Und das soll laut Jan Rottau, dem unermüdlichen Festivalsleiter, bei Weitem noch nicht das Ende der Fahnenstange sein. Wer da wohl noch kommen mag ... ?? Auf jeden Fall sollte das beim 20. Jazzletter schon feststehen, der nach der Sommerpause in gewohnter Weise in euer Postfach flattern wird. Und in diesem gibt es dann neben dem Programm der Ingolstädter Jazztage – da bekommen Vereinsmitglieder übrigens verbilligte Karten!! - noch ein Highlight zu feiern: Die fertige Homepage des Vereins! Aber bis dahin lassen wir uns mal die Sonne auf den Pelz brennen, relaxen in lauschigen Stunden auf Balkonen, Terrassen und Gärten, lauschen den CDs, die wir schon lange mal hören wollten, und schmökern in dicken Büchern, die für laue Sommertage am Strand ideal geschaffen erscheinen und ... da war doch nochwas??</p>

    <p>Ach ja: der Treff beim Grillfest des Vereins am 2. August ab 15 Uhr in Nicks Garten!! Vielleicht entlocken wir ja da den Verantwortlichen der Jazztagen bei einem Gläschen Wein die restlichen Megastars der kommenden Ingolstädter Jazztagen??</p>

    <p>Auf bald und einen schönen Sommer in der Jazzstadt IN!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <?php attach() ?>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 18 (22. Juni 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 18</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 121</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Findet statt: Das Dixie- und Swingfestival am 28.6.2008!</li>
      <li>Wir wachsen kontinuierlich: Wieder neue Mitglieder!</li>
      <li>Grillfest der Jazzfreunde-Vereinsmitglieder am Sa 2.8.08</li>
      <li>Nachlese Workshop und Young Players Session vom 25.5.08</li>
      <li>Herzlichen Glückwunsch: 2 Musiker aus IN bald Jazzstudenten</li>
      <li>Soul- und Funkcombo von Club Légère sucht neue Mitspieler</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Samstag</td>
        <td>28.06. 2008 </td>
        <td>11.15–22 Uhr</td>
        <td>Dixie- und Swingfestival (Rathausplatz, Modehaus Mayr)</td>
      </tr>

      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>10.07. 2008</td>
        <td>ab 18.30 Uhr</td>
        <td>David Sanchez Group / Ron Carter Quintet</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>11.07. 2008</td>
        <td>ab 18.30 Uhr</td>
        <td>Curtis Stigers &amp; Band / Till Brönner</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>12.07. 2008</td>
        <td>ab 18.30 Uhr</td>
        <td>Häns’che Weiss Ensemble / Paul Kuhn &amp; All Stars</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>13.07. 2008</td>
        <td>10.30 Uhr</td>
        <td>Birdland Jazz Band</td>
      </tr>

      <tr>
        <td>Fr / Sa</td>
        <td>25-26.07. 08</td>
        <td>&nbsp;</td>
        <td>3. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Sa</td>
        <td>02.08. 2008</td>
        <td>ab 15 Uhr</td>
        <td>Grillfest des Jazzfreunde-Vereins (Roter Gries: Niks Garten)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09. 2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
    </table>

    <p style="color:#00c000;">SOMMER JAZZ 2008 IM HOF DES NEUBURGER RESIDENZSCHLOSSES (Veranstalter Jazzclub Birdland Neuburg/Donau)</p>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Findet statt: Das Dixie- und Swingfestival am 28.6.2008</h5>

    <p>Nach längerer Ungewissheit ist es nun definitiv: Das Dixie- und Swingfestival am 28.06. 2008 findet statt! Auf 2 Bühnen verteilt boomt an diesem Tag die Ingolstädter Jazzszene, zwar in abgespeckter Form gegenüber unserem Vereinskonzept (siehe frühere Newsletter), aber dafür von 11.15 bis 22.30 Uhr. Groß im Technik-Einsatz bewährt sich hier souverän unser Vereinsmitglied Oliver Angermüller (<a href="http://www.monophonic.de">http://www.monophonic.de</a>): Danke Olli und seinem Team für Deinen / Euren unermüdlichen Einsatz beim Bühnen- und Technik-Aufbau und für die aktiven Ohren am Mischpult!! Ohne euch geht so was nicht!</p>

    <p>Hier aber nun die Auftrittstermine – alle Konzerte ohne Eintritt! - im Überblick:</p>

    <h6>Bühne Rathausplatz:</h6>

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>11:15-12:30 Uhr</td>
        <td>Jazz GmbH des Reuchlin-Gymnasiums</td>
      </tr>
      <tr>
        <td>13-14 Uhr</td>
        <td>Big Band des Reuchlin-Gymnasiums</td>
      </tr>
      <tr>
        <td>14-15 Uhr</td>
        <td>Big Band des Christoph-Scheiner-Gymnasiums</td>
      </tr>
      <tr>
        <td>15-16 Uhr</td>
        <td>Big Band des Gnadenthal-Gymnasiums</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>17-18:30 Uhr</td>
        <td>4sinn (mit Simon Seidl)</td>
      </tr>
      <tr>
        <td>19-20:30 Uhr</td>
        <td>Groove Box (mit Nick Flade)</td>
      </tr>
      <tr>
        <td>21-22:30 Uhr</td>
        <td>Charly Böck Latin Project</td>
      </tr>
    </table>

    <h6>Bühne Modehaus Xaver Mayr:</h6>

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>11-12:30 Uhr</td>
        <td>Mallet &amp; Friends (mit Bernhard Reitberger und Tom Diewock)</td>
      </tr>
      <tr>
        <td>13-14 Uhr</td>
        <td>Georgisches Swing Duo</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>15-16 Uhr</td>
        <td>Power Sax (mit Manfred See)</td>
      </tr>
      <tr>
        <td>16-17 Uhr</td>
        <td>Jazzplayers (Combo des Katharinen-Gymnasiums unter Leitung von Charly Leimer)</td>
      </tr>
    </table>

    <p>Und nicht genug: Der heiße Jazzsommer findet seine Fortsetzung vom 10. bis 13. Juli im Neuburger Schloss beim Summer Jazz 2008 des Jazzclubs Birdland mit Superstars wie Ron Carter, Curtis Stigers, Till Brönner ... Und der Verein legt mit einem kleinen aber feinen Summer Jazz Open Air vom 25. und 26. Juli im Innenhof des Hotel Rappensberger nach, bei dem am Freitag (25.7.) ab 18.30 Uhr die stetig sich vorwärts entwickelnde Funk-Formation “Klangpatrouille” und ab 20.30 Uhr der Ingolstädter Stargitarrist Rudi Trögl mit seinem Trio auftreten wird. Samstags (26.7.) präsentieren sich ab 14 Uhr Ingolstädter Gymnasien (Katharinen, Gnadenthal, Reuchlin) mit ihrem Jazznachwuchs. Bevor dann der Abend ab 20.30 Uhr mit dem Top-Act “Steps of Spirit”, Charly Leimers Überflieger-Combo, beendet wird, unterhält die Ingolstädter Jazzformation “So What” das Publikum. Und das alles ohne Eintritt!!</p>

    <p>Also nicht schlappmachen nach der Fußball-EM!! Ran an das wahre Sommermärchen: Jazz in IN ist in!</p>

    <hr />

    <h5>2. Wir wachsen kontinuierlich: Wieder neue Mitglieder!</h5>

    <p>In in IN ist es anscheinend auch, Mitglied im Verein der Jazzfreunde zu werden, gemäß der Philosophie der Wirtschaft: Unser Wachstum bleibe uneingeschränkt, denn schon wieder ist unser Mitgliederstamm um 4 Personen gewachsen! Herzlich Willkommen im Club:</p>

    <ul>
      <li>Familie Grell, dessen Sohn Max sich seine Sporen schon in der Jazz GmbH junior und der Big Band des Reuchlin-Gymnasiums verdient (zu hören am 28.6.)</li>
      <li>Georg Pegelhoff, der mir persönlich noch nicht bekannt ist ...</li>
    </ul>

    <p>Aber das kann sich ja ändern am ...</p>

    <hr />

    <h5>3. Grillfest der Jazzfreunde-Vereinsmitglieder am Sa 2.8.08</h5>

    <p>Nach 3 Jahren kontinuierlicher Aufbauarbeit ist es endlich an der Zeit, den Verein in gemütlicher Runde ohne Organisations-, Aufbau- oder Auftrittsstress zu feiern. Deshalb sind alle Vereinsmitglieder zum Grillfest am Samstag 2.8.2008 ab 15 Uhr in Niks großen Garten im Roten Gries herzlich eingeladen. Kinder ausdrücklich erwünscht!! Eine gesonderte Einladung inklusive Anfahrtsbeschreibung ergeht demnächst an alle Mitgliede per Post. Also: schnell noch Mitglied werden und mitfeiern!</p>

    <p>Natürlich auch ein riesiges Dankeschön an Nik, genauer Nikolaj Rimsky-Korsakow, Urgroßenkel des weltberühmten russischen Komponisten mit gleichem Namen, der z.B. Den Hummelflug komponierte (heute Bericht auf der Kulturseite des Donaukuriers!). Nik und sein Laden music-in sind stets große Unterstützer des Vereins, ... Und er ist ein akribischer Fußball-Analyst!</p>

    <hr />

    <h5>4. Nachlese Workshop und Young Players Session vom 25.5.08</h5>

    <p>Ein neues Projekt des Vereins macht Mut: Workshops für jazzbegeisterte Jugendliche, durchgeführt von bekannten und erfahrenen Ingolstädter Jazzmusikern. Nach einem eher unerkannt gebliebenen 1. Workshop im Februar 2007 boten Tom Diewock (Schlagzeug), Manfred See (Bläser und Streicher), Georg Spreng (Piano) und Rudi Trögl (Gitarre und Bass) knapp 20 Interessenten im Alter von 11 bis 27 Jahren beim zweiten, über die Presse und an allen weiterführenden Ingolstädter Schulen publik gemachten Workshop Jazzunterricht auf hohem Niveau an. Ein Kurzbericht und Bilder sind einzusehen bei <a href="http://www.kidnetting.de/index.htm?/a_themen/ingolstadt/jazzworkshop/jazzworkshop.htm">http://www.kidnetting.de/index.htm?/a_themen/ingolstadt/jazzworkshop/jazzworkshop.htm</a>. Der harte Kern des Vereins (wer dabei sein will, Mail an mich!) denkt über eine Fortführung dieser Reihe nach, wobei geplant ist, um noch mehr SchülerInnen zu erreichen den Workshop aus den Ferien raus zu nehmen und von der Young Players Session zu trennen, denn harte Arbeit von 14-18 Uhr und dann Auftritt von 19 bis 22 Uhr inklusive Aufbauarbeit zuvor und Zusammenräumen danach grenzt schon an Kinderarbeit <tt>;))</tt><br />
      Jedenfalls war der gemeinsame Auftritt aller Kursteilnehmer bei der Session einer der Höhepunkte des Abends!</p>

    <hr />

    <h5>5. Herzlichen Glückwunsch: 2 Musiker aus IN bald Jazzstudenten</h5>

    <p>Dass Ingolstadt eine ernst zu nehmende Jazzstadt darstellt, zeigt neben der aufblühenden regionalen Jazzszene, den international renommierten Jazztagen, der immer intensiveren Jazzarbeit an den Schulen auch die wachsende Zahl an Jazzstudenten aus der Region: Aber nicht lange herumgeredet: Herzlichste Glückwünsche an Bernhard Hollinger (Bass) und Simon Seidl (Piano), die beide ab Herbst 2008 ihr Jazzstudium aufnehmen werden. Bernhard bestand im Mai 2008 die Aufnahmeprüfung in Amsterdam; Simon konnte sich nach erfolgreichen Vorspielen in Leipzig, Wien, Köln und München - Mitbewerber in Graz und Berlin werden aufatmen, denn dort will er nicht mehr zur Aufnahmeprüfung antreten - den Ort seiner Wahl raussuchen und entschied sich für die Stadt der Musik, Wien. Wir hoffen natürlich, beide noch oft bei Veranstaltungen in Ingolstadt zu hören, was wäre eine Session ohne Bernhard und Simon ... <tt>;((</tt></p>

    <p>Ach ja: Simon tourt übrigens ab dieser Woche durch Bayern mit seiner neu formierten Band 4sinn (<a href="http://www.myspace.com/4sinn">http://www.myspace.com/4sinn</a>). Hier die Daten:</p>

    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>27.juni</td>
        <td>Jazzclub Waldstraße 4 Huglfing</td>
      </tr>
      <tr style="color:#800080;">
        <td>28.juni</td>
        <td>Swing und Dixiefestival Ingolstadt</td>
      </tr>
      <tr>
        <td>01.Juli</td>
        <td>Jazzclub Unterfahrt München</td>
      </tr>
      <tr>
        <td>03.Juli</td>
        <td>Bad Tölz</td>
      </tr>
      <tr>
        <td>04.Juli</td>
        <td>Garmisch-Partenkirchen im Jazzclub JazzGAP</td>
      </tr>
      <tr>
        <td>05.Juli</td>
        <td>Foolstheater Holzkirchen</td>
      </tr>
      <tr>
        <td>12.Juli</td>
        <td>Karlstadt &quot;Jazz in alten Gebäuden und Höfen&quot;</td>
      </tr>
    </table>

    <p>Und Bernhard beglückt am 28.6.08 ab 11.15 Uhr die Jazz GmbH am Rathausplatz nochmals mit seinem Bassspiel!! Und wer weiß, vielleicht greift demnächst wieder einer der Nachwuchsjazzer aus IN nach den Jazzstudiumssternen? Das Rezept: Üben, Platten der Megastars des Jazz hören, in einer Band mitwirken, ... Die Gelegenheit bietet sich immer an, denn die ... </p>

    <hr />

    <h5>6. Soul- und Funkcombo von Club Légère sucht neue Mitspieler</h5>

    <p>Vor Kurzem erreichte mich ein Mail von Claus Böhm, ebenfalls im Verein, mit folgendem Inhalt:</p>

    <blockquote>
      <p>“hallo robert,<br />
        wir - die soul- und funkcombo von club légère bräuchten einmal deine hilfe und unterstützung. nachdem uns leider durch umzug mehrere bandmitglieder "abhandengekommen sind", suchen wir musikhungrige und -begeisterte musiker, die gerne in richtung funk, soul, acid jazz coole musik machen wolllen:</p>
      <ul class="nolist">
        <li>sänger, sängerin</li>
        <li>keyboarder/in (piano, fender rhodes ...)</li>
        <li>trompeter/in</li>
      </ul>

      <p>kontakt: boehmclaus(ä)freenet.de oder info(ä)clublegere.de oder 0172/9164405</p>

      <p>könntest du diese suchmail in deinen newletter mit hinzufügen? danke schon einmal!</p>

      <p>lg claus böhm”</p>
    </blockquote>

    <p>Es ist Deine Chance: Nutze Sie und sei dabei!!</p>

    <p>Jazz in IN ist in!! Bis demnächst!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 17 (20. Mai 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 17</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 117</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Wieder neue Mitglieder!</li>
      <li>Heißer Jazzfrühling</li>
      <li>Workshop &amp; Session für Schüler / Studenten am 25.5.08</li>
      <li>Jubiläum: 50 Jahre Jazzclub Birdland mit Highlights</li>
      <li>Wie war das eigentlich ... ? Dixie- und Swing-Festival 2008</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td>14-18 Uhr</td>
        <td>Jazzworkshop für Schüler und Studenten</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td>19.00 Uhr</td>
        <td>8. Session Young Jazz Players (Diagonal)</td>
      </tr>

      <tr style="color:#800080;">
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td>22.00 Uhr</td>
        <td>Steps of Spirit (Donauzelt / Theatertage)</td>
      </tr>
      <tr style="color:#800080;">
        <td>Montag</td>
        <td>26.06. 2008</td>
        <td>22.00 Uhr</td>
        <td>Mallet &amp; Friends (Donauzelt / Theatertage)</td>
      </tr>
      <tr>
        <td>Freitag</td>
        <td>30.05.2008</td>
        <td>20.30 Uhr</td>
        <td>Charly Böck Latin Projekt (Birdland Neuburg)</td>
      </tr>
      <tr style="color:#800080;">
        <td>Sonntag</td>
        <td>01.06. 2008</td>
        <td>21.00 Uhr</td>
        <td>Da boarische (Jazz)plan (Donauzelt / Theatertage)</td>
      </tr>
      <tr style="color:#800080;">
        <td>Montag</td>
        <td>02.06. 2008</td>
        <td>21.00 Uhr</td>
        <td>Mallet &amp; Friends (Donauzelt / Theatertage)</td>
      </tr>
      <tr style="color:#800080;">
        <td>Sonntag</td>
        <td>08.06. 2008</td>
        <td>17.00 Uhr</td>
        <td>Nu Glass (Donauzelt / Theatertage)</td>
      </tr>

      <tr>
        <td>Samstag</td>
        <td>28.06. 2008 </td>
        <td>ganzer Tag</td>
        <td>Dixie- und Swingfestival (Innenstadt)</td>
      </tr>

      <tr style="color:#00c000;">
        <td>Donnerstag</td>
        <td>10.07. 2008</td>
        <td>ab 18.30 Uhr</td>
        <td>David Sanchez Group / Ron Carter Quintet</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Freitag</td>
        <td>11.07. 2008</td>
        <td>ab 18.30 Uhr</td>
        <td>Curtis Stigers &amp; Band / Till Brönner</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Samstag</td>
        <td>12.07. 2008</td>
        <td>ab 18.30 Uhr</td>
        <td>Häns’che Weiss Ensemble / Paul Kuhn &amp; All Stars</td>
      </tr>
      <tr style="color:#00c000;">
        <td>Sonntag</td>
        <td>13.07. 2008</td>
        <td>10.30 Uhr</td>
        <td>Birdland Jazz Band</td>
      </tr>

      <tr>
        <td>Fr / Sa</td>
        <td>25-26.07. 08</td>
        <td>&nbsp;</td>
        <td>3. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09. 2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
    </table>

    <p style="color:#800080;">JAZZ IM RAHMEN DER BAYERISCHEN THEATERTAGE</p>

    <p style="color:#00c000;">SOMMER JAZZ 2008 IM HOF DES NEUBURGER RESIDENZSCHLOSSES</p>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Wieder zahlreiche neue Mitglieder</h5>

    <p>Frühling im Verein: er wächst und gedeiht! Innerhalb kurzer Zeit können wir wieder zahlreiche Mitglieder in unseren Reihen begrüßen:</p>

    <ul>
      <li>Alexandra und Andreas Feichtlbauer: Alexandra am Saxofon tätig bei der Big Band der Ingolstädter Musikschule</li>
      <li>Sebastian Gruber: Rhythm Machine der freakigen Klangpatrouille<br />(<a href="http://www.klangpatrouille.de">http://www.klangpatrouille.de</a>)</li>
      <li>James, Lydia, Bianca und Tanja Ransom: James, der legendäre Bassist von United Cervelat<br />(<a href="http://www.gproject-blues.de/html/james_ransom.html">http://www.gproject-blues.de/html/james_ransom.html</a>)</li>
      <li>Simon Woll: Tenorsax-Allrounder (4-phones, Honkey Tonk Dixie Band, Audi Werksorchester ... )<br />(<a href="http://www.4-phones.eu/index.html">http://www.4-phones.eu/index.html</a>)</li>
      <li>Lilli Ganz</li>
      <li>Dr. Oswald Hollitzer</li>
      <li>Dominik Hülshorst</li>
      <li>Stephan Kraus</li>
      <li>Reinhold Schlaifer</li>
      <li>Hans Schubert</li>
    </ul>

    <p>... to be continued ...</p>

    <p>Bei letzteren 6 Neu-Mitglieder konnte ich leider keine weiteren Angaben machen. Aber vielleicht lernen wir uns ja mal alle kennen?</p>

    <p>Ein “Herzliches Willkommen” allen Jazzbegeisterten und Förderern. Übrigens: Wer holt einen dicken Fisch, sprich eine Firmenmitgliedschaft an Land? Kostenpunkt für eine Firma: 400,- oder mehr pro Jahr. Gegenleistung:</p>

    <ul>
      <li>für den Werber: Der Verein spendiert ein Jahr lang die Mitgliedschaft</li>
      <li>für die geworbene Firma: Werbung auf unserer Vereinshomepage</li>
    </ul>

    <hr />

    <h5>2. Heißer Jazzfrühling</h5>

    <p>Lust auf Jazz in außergewöhnlichem Ambiente? Mal den Abend entspannt ausklingen lassen? Darüber hinaus nichts bezahlen? Dann hier der Geheimtipp: Im Rahmenprogramm der Bayerische Theatertage treten einige Jazzformationen im Donauzelt auf, die ich gerne oben in den Terminkalender aufgenommen habe, sind doch zahlreiche Vereinsmitglieder aktiv mit dabei. Und noch etwas: den Sommermonat Juni leitet standesgemäß Charly Böck und sein Latin Project am 30. Mai um 20.30 Uhr im Birdland / Neuburg ein: Heißer Sound zu coolen Rhythmen. Man sieht sich!?</p>

    <hr />

    <h5>3. Jubiläum: 50 Jahre Jazzclub Birdland mit Highlights</h5>

    <p>Wer meint, in Ingolstadt und Region gastieren die Großen des Jazz nur im Herbst während der Jazztage, der irrt! Nicht unweit von Ingolstadt treffen sich regelmäßig bekannte Weltstars, Insider Tipps und Newcomer des Jazz im Birdland Jazzclub in Neuburg, dem wir als Jazzfreunde-Verein sehr herzlich verbunden sind. Nun gönnt sich der Club unter der unermüdlichen Leitung von Manfred Rehm zu seinem 50. Geburtstag vier Tage internationale Stars erster Güte beim Summer Jazz 2008 im Hof des Neuburger Residenzschlosses: ob Ron Carter (ehemals Bassist bei Miles Davis), Häns’che Weiss (die Ikone des Zigeuner-Jazz) oder Curtis Stigers (als Sänger verantwortlich für manche Ohnmacht-Orgien bei weiblichen Fans), vom 10. bis 13. Juli herrscht internationaler Hochbetrieb in Neuburg! Mehr Infos unter www.birdland.de! Sehen wir uns!?</p>

    <hr />

    <h5>4. Workshop und Session für Schüler und Studenten am 25.5.08</h5>

    <p>Schon 16 Jugendliche zwischen 11 und 19 Jahren haben sich für unseren Workshop im Bürgerhaus / Diagonal angemeldet. Somit sind noch Plätze frei und Interessenten können sich bis Samstagabend bei mir oder im DER-Reisebüro bei Reimund Domke anmelden (Formular im Anhang). Auch Kurzentschlossene sind am Sonntag ab 14 Uhr bei uns willkommen. Und nicht vergessen: ab 19 Uhr steigt die 8. Young Player Session im Diagonal, wozu jeder – auch Junggebliebene und gefühlte Jugendliche – herzlich eingeladen ist. Freu mich auf ein Wiedersehen!</p>

    <hr />

    <h5>5. Wie war das eigentlich ... ? Dixie- und Swing-Festival 2008</h5>

    <p>Der Vereinsmotor läuft momentan auf Hochtouren! Unsere Eigenproduktionen wie die Veranstaltungen Young Players Session, Jazzworkshop für Jugendliche, Jam Session und Summer Jazz im Rappensberger, die Projekte Ingolstädter Jazz-Band Archiv sowie Homepage der Jazzfreunde werden vom bewährten Aktiv-Team organisiert, professionell durchgeführt und laufend betreut (wer will, kann jederzeit im “Inneren Zirkel” mit einsteigen!!). Auch bei diversen Veranstaltungen (Ingolstädter Jazztage, Jazzkonzertreihe im Diagonal oder Bayerische Theatertage) tritt der Verein z. T. als Berater mit auf. Zu diesen das Ingolstädter Jazzleben bereichernden Events zählt auch das Dixie- und Swing-Festival, das wie jedes Jahr auch 2008 vom Verein IN City organisiert und durchgeführt wird. Wir vom Jazzfreunde-Verein wurden bereits Februar 2008 von dem damaligen City-Manager Peter Haas beauftragt, nach seinen sehr üppigen Vorgaben ein Konzept zu erstellen, das ein Bespielen von 6 Bühnen in der Innenstadt von maximal 12 bis 23 Uhr vorsah. Wir entwickelten daraufhin ein überzeugendes Konzept, das 19 regionale Bands – beinahe die gesamte Jazzszene Ingolstadts - mit 26 Stunden Musiklaufzeit und 7 Jazzförderpreisträgern vorsah. Beim 2. Treffen mit Hr. Haas Ende Februar zeigte sich dieser sehr beeindruckt von unseren Ideen und versprach uns, für den doch nicht geringen finanziellen Aufwand sofort auf Sponsorensuche zu gehen, um möglichst bald die Finanzierung in trockene Tücher zu bringen. Im März dann begannen die Turbulenzen bei IN City, die sicherlich aus der Presse bekannt sein dürften und die dem Dixie- und Swing-Festival 2008 den Hauptverantwortlichen, Herrn Haas, wegnahmen. Mitte April dann wurde uns von IN City mitgeteilt, dass unser Konzept wahrscheinlich aus finanziellen und organisatorischen Gründen nicht durchführbar sei. Da aber dem Vorstand von IN City alle Kontaktdaten der von uns vorgeschlagenen Bands sowie deren Bandbeschreibung (samt Foto) und Bühnenanforderung vorliegen, kamen wir zu der Übereinkunft, dass nun IN City je nach finanzieller Lage selbst entscheiden sollte, wer wann und wo spielen soll sowie die Kontaktaufnahme zu den in Frage kommenden Bands selbst herstellen soll. Hauptgrund unseres Handelns: Der Jazzfreunde-Verein ist nicht der Veranstalter und Organisator des Festivals sondern fungiert wegen der hervorragenden Kontakte zu den regionalen Jazzgruppen nur als Vermittler und Berater. Nun liegt also die Durchführung des Festivals, wie anfangs auch vorgesehen, in den Händen von IN City, genauer in den Händen der neuen Verantwortlichen für dieses Festivals, Frau Yilmaz. Wir beraten IN City, soweit dies unser Zeitbudget zulässt, weiterhin wie zuvor.</p>

    <p>Auch wenn unser tolles Konzept für das Dixie- und Swing-Festival 2008 leider nicht wie geplant durchgeführt werden wird, seid versichert: Der Jazzfreunde Verein wird wie gewohnt mit Elan und im Rahmen seiner finanziellen Mittel für den Jazz in IN – wie oben eingangs beschrieben – tätig sein und diese Projekte mit ehrenamtlichen Zeitaufwand zuverlässig durchführen, denn ...</p>

    <p>DER JAZZ IN IN LEBT!!</p>

    <p>Keep on Groovin’!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

    <p>PS: Manfred See, aktives Vereinsmitglied, wollte um folgende Hilfe bitten:</p>

    <blockquote>
      <p>“Da ich desöfteren mal Noten für Bläsersätze schreibe suche ich ein Programm das mir die Noten schreibt und ausdruckt, wenns geht transponiert für Alt oder Tenorsax... wer hat sowas und kennt sich aus: Wenns geht alles nur mit einem Laptop, da ich öfters im Zug nach Berlin fahre und hier Zeit hätte die Bläser Sätze zu basteln und zu hören ....ich hatte vor jahren eins, da mußte ich mit der maus die noten reinfummeln und dann noch die Notenwerte anklicken, geht das mit Tastatur? Das wäre mir sehr gelegen!! Also meine Frage an den Verein: Wer hat Erfahrungen und kann mir Tipps geben?” (Manfred See, Tel 0841 379 32 72, Hy 0176 23 57 24 06)</p>
    </blockquote>

    <?php attach() ?>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 16 (20. April 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 16</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 103</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Das 100. Mitglied!! Preis verleiht W. Haffner diesen Die!</li>
      <li>Workshop für Schüler und Studenten am 25.5.08</li>
      <li>Bandarchiv im Entstehen</li>
      <li>Jam Session Nr. 3 im Swept Away am 27.04.08</li>
      <li>Konzert Klangpatrouille am 24.04.08 im Café Tagtraum</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Dienstag</td>
        <td>22.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Bonuskonzert Wolfgang Haffner Trio (Diagonal)</td>
      </tr>
      <tr>
        <td>Donnerstag</td>
        <td>24.04. 2008</td>
        <td>20.30 Uhr</td>
        <td>Klangpatrouille (Café “Tagtraum”)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.04. 2008</td>
        <td>19.00 Uhr</td>
        <td>3. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td>14-18 Uhr</td>
        <td>Jazzworkshop für Schüler und Studenten</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td>19.00 Uhr</td>
        <td>8. Session Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>28.06. 2008 </td>
        <td>ganzer Tag</td>
        <td>Dixie- und Swingfestival (Innenstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>25-26.07. 08</td>
        <td>&nbsp;</td>
        <td>3. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09. 2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Das 100. Mitglied!!</h5>

    <p>Kaum zu glauben, aber wahr! Die Mitgliederzahl des Vereins hat sich innerhalb eines Jahr verdoppelt! Rasant steuerten wir auf die 100 zu und den Endspurt entschied die Familie Knoblach am 6.4.08 um 11.13 Uhr für sich! Herzlichen Glückwunsch!! Herr Knoblach ist selbst ein passionierter Jazzgitarrist. Sein Sohn Anton wird in Jazzpiano von Simon Seidl unterrichtet und glänzt in der Reuchlin-Bigband am Klavier.<br />
      Ganz knapp dahinter: Claus Böhm, denn seine Anmeldung ging bei mir am gleichen Tag um 15.35 Uhr ein. Claus sorgt bei club légère ( www.clublegere.de), für den chilligen Groove am Schlagzeug!<br />
      An dritter Stelle Alexandra Ring, die mir am 7.4.08 um 8.36 Uhr ihre Anmeldung schickte. Mehr Details weiß ich leider noch nicht von ihr.</p>

    <p>Für Familie Knoblach hat der Verein noch ein besonderes Präsent: Der Preis für die 100. Vereinsmitgliedschaft wird am kommenden Dienstag (22.4.) von niemanden anderen als Wolfgang Haffner überreicht! Wer das ist?? Also:</p>

    <blockquote>
      <p>“Mit seinem neuesten Projekt „Acoustic Shapes“ kommt Wolfgang Haffner, der wohl wichtigste deutsche Schlagzeuger der jüngeren Generation, ins Bürgerhaus. Als Schlagzeuger von Klaus Doldingers Passport und in den Bands von Till Brönner und Nils Landgren repräsentiert er die nationale Spitze. Seine Engagements an der Seite unzähliger Weltstars wie Pat Metheny, Bill Evans, Cassandra Wilson belegen, dass ihm auch international der Durchbruch gelang. Beinahe unglaublich, dass Haffner bei all dem auch noch Zeit für eigene wegweisende Projekte als Schlagzeuger, Komponist und Produzent findet. Ein Meilenstein dieser Aktivitäten ist die im Mai 2006 eingespielte CD „Shapes“, von der Presse als „Legierung aus griffigen Melodien, cleverer Elektronik, altem Rock, neuem Jazz und kühler Klangästhetik“ gefeiert. Für seine Formation „Acoustic Shapes“ arrangierte Wolfgang Haffner alles komplett um, so dass dabei teilweise völlig Neues entstanden ist. Wie begeistert dieses neue Konzept vom Publikum aufgenommen wurde, dokumentiert der Live-Mitschnitt aus der Berliner Philharmonie vom Oktober letzten Jahres.”</p>
    </blockquote>

    <p>Übrigens: Dies ist das Bonuskonzert für Vereinsmitglieder!! Ihr kommt kostenlos mit Euerm Ausweis rein!</p>

    <hr />

    <h5>2. Workshop für Schüler und Studenten am 25.5.08</h5>

    <p>Nachdem das Projekt “Jamsession” hervorragend angelaufen ist, will der Verein ein neues “Baby” in die Welt setzten: Jazzworkshops für Schüler(innen) und Studenten / Studentinnen. Vor über einem Jahr stieg schon einmal ein “Versuchsballon” in die Luft; jetzt wird dieser Kurs für die jazzbegeisterte Jugend professionell aufgezogen. Der Workshop findet am Sonntag 25.5.08 von 14-18 Uhr im Diagonal/Bürgerhaus statt. Als Dozenten sind dabei: Tom Diewock, Manfred See, Gregor Spreng und Rudi Trögl, alles also bekannte Namen des Jazz in IN. Jedes Instrument kann mitmachen, denn auf dem Programm stehen das Zusammenspiel in der Rhythmusgruppe sowie Improvisation für Anfänger und Fortgeschrittene, die Teilnahme ist also nicht an bestimmte Instrumente gebunden. Zwei Standards aus dem Sessionbook Vol. I sollen erarbeitet werden: “Tenor Madness” (Blues) und “Blue Bossa” (Latin). Notenmaterial stellt der Verein, Instrumente / Equipment (Verstärker) / Notenständer bitte selbst mitnehmen. Die Ergebnisse werden dann in der um 19 Uhr beginnenden Young Players Session im Diagonal vorgestellt. Angeschrieben werden alle weiterführenden Schulen Ingolstadts. Die Teilnahmegebühr beträgt 8 Euro und ist am Workshoptag selbst zu entrichten. Vereinsmitglieder zahlen nur die Hälfte. Die Anmeldung erfolgt über mich per Mail (Antrag als Word-Dokument im Anhang) oder persönlich durch Abgabe der Anmeldung im DER-Reisebüro (Milchstraße 1) bei Reimund Domke. Nähere Infos auf der Anmeldung im Anhang! Let’s do it!</p>

    <hr />

    <h5>3. Bandarchiv im Entstehen </h5>

    <p>Und noch ein weiteres Projekt läuft in diesen Wochen an: Das Erstellen eines Bandarchivs aller Jazzbands der Region Ingolstadt. Diese Mammutprojekt betreut Katrin Poese im Rahmen einer Facharbeit im Leistungskurs Musik am Reuchlin-Gymnasium. Sie hat vom Verein schon einige Telefonnummern / E-Mail-Adressen von Jazzgruppen bekommen, wir haben aber sicherlich die ein oder andere Formation unbeabsichtigt vergessen. Deshalb mein Aufruf: Bitte alle, die in diesem Katalog – er soll auch in Schriftform und auf der Jazzfreunde-Homepage mit Verlinkung zu existierenden Homepages veröffentlicht werden – aufgelistet werden wollen, sollen sich bis zum 15. Mai 2008 per Mail bei Katrin melden.</p>

    <p>Katrin wird sich dann mit den betreffenden Bands / Künstlern kurzschließen und alle wichtigen Details erfragen. Just jump in!</p>

    <hr />

    <h5>4. Jam Session Nr. 3 im Swept Away am 27.04.</h5>

    <p>Nicht vergessen: Die Jazzszene Ingolstadts trifft sich wie jeden Sonntag zur kostenlosen Jam Session ab 19 Uhr im Swept Away (Donaustr. 14). Wir hoffen natürlich, dass auch unser genialer Sessionleiter, Thomas Buschko, wieder mit von der Partie sein wird! Falls er zeitlich verhindert ist: Wer würden den Job machen wollen? Die Sessionband jedenfalls steht schon: Bernadette Schreyer – eine aufstrebende junge Pianistin, Christian Dannebrink – Tenorsaxheld der Klangpatrouille, Bernhard Hollinger – die Bassentdeckung des letzten Jahres! Schon dabei beim Landesjugendjazzorchester, und Tom Diewock – wer kennt den Gott der Trommeln in IN nicht? Ist doch ein Jazzförderpreisträger! See you soon!</p>

    <hr />

    <h5>5. Konzert Klangpatrouille am 24.04.08 im Café Tagtraum</h5>

    <p>Das ist doch der perfekte Jazz-Dreiklang: Haffner Trio am Dienstag – Klangpatrouille am Donnerstag – Jam Session am Sonntag!! Was, Ihr kennt die Klangpatrouille noch nicht? Dann lest mal weiter:</p>

    <blockquote>
      <p>“Die Ingolstädter Jazzszene ist wieder komplett! KLANGPATROUILLE feiert Dannes Rückkehr mit einem kleinen Konzert im Café Tagtraum am Paradeplatz: Der Saxman Nummer Eins ist nach zwei Semestern Australien wieder mit von der Partie. Wir spielen am Donnerstag, den 24. April ab 20:30 Uhr Modern Jazz, Funk und Fusion im tollen Café von Lisa und Mike. Der Eintritt kostet schlappe 5 (in Worten fünf) Euro!</p>
      <ul class="nolist">
        <li>Christian Dannenbrink: Alt- u. Tenorsax</li>
        <li>Thomas Schösser: Trompete</li>
        <li>Martin Bürkl: Posaune</li>
        <li>Claus Bächer: Piano, Orgel</li>
        <li>Markus Mayer: Gitarre</li>
        <li>Alexander Fuchs: E- und Kontrabass</li>
        <li>Matthias Gutsche: Schlagzeug”</li>
      </ul>
    </blockquote>

    <p>Jazz in IN ist IN!</p>

    <div class="signum">Robert Aichner</div>

    <?php attach(); ?>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 15 (5. April 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 15</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 99</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Nachlese Jam Session vom 30.3.2008</li>
      <li>Wer ist das 100. Mitglied? Schnell handeln!</li>
      <li>Bonuskonzert 22.4.08 mit TV-Aufzeichnung durch BR</li>
      <li>10% gespart bei Tuck &amp; Patti diesen Montag</li>
      <li>Konzert Power Sax am 6. April im Swept Away</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>06.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Power Sax (Swept Away)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>07.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Tuck &amp; Patti (Diagonal)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>22.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Bonuskonzert Wolfgang Haffner Trio (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.04. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">3. Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">8. Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>28.06. 2008 </td>
        <td>ganzer Tag</td>
        <td>Dixie- und Swingfestival (Innenstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>25-26.07. 08</td>
        <td>&nbsp;</td>
        <td>3. Summer Jazz Open Air (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.09. 2008</td>
        <td>19.00 Uhr</td>
        <td>4. Jam Session (Swept Away)</td>
      </tr>
    </table>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Nachlese Jam Session vom 30.3.2008</h5>

    <p>Das war wieder mal klasse! Am letzten Sonntagabend trafen sich im Szene-Lokal Diagonal über 20 Musiker aus Jazz, Blues, Funk und Soul, um die 2. Ingolstädter Jam Session von der Bühne zu lassen. Eröffnet wurde der eintrittfreie Abend von der groovigen Band “SoulSociecity”, die nicht lange unter sich blieb, denn einige Musiker ließen sich die Gelegenheit nicht nehmen, auf der offenen Bühne mit einzusteigen, so dass sich bald ein reges Miteinander einstellte. Den knapp 40 Zuhörer, von denen sogar einige die Bühne tanzenderweise eroberten, bot sich somit ein abwechslungsreicher Abend. Der Dank des Vereins gilt hierbei:</p>

    <ul>
      <li>Beate Diao, der die Organsisation dieser Jam-Session-Reihe (die nächste steigt am Sonntag, den 27. April 2008 im Swept Away) obliegt</li>
      <li>Thomas Buschko, unserem genialen Sessionleiter</li>
      <li>Nik von music-in, der wie immer Anlage und Drum-Set stellte</li>
      <li>Eugen, der coole Pächter des Diagonals</li>
      <li>Allen Musikern, welche die Bühne im Sturm eroberten</li>
      <li>Allen, die an diesem Abend Mitglied im Verein wurden:
        <ul>
          <li>Bernadette Schreyer, swingendes Pianogirl der Extraklasse! Mitglied der “Jazz GmbH”</li>
          <li>Bernhard Hollinger: Masterslapper am E-Bass, unglaubliches Timing! Ebenfalls “Jazz GmbH”</li>
          <li>Familie Spreng (5 Personen):
            <ul>
              <li>Vincent Spreng, ein Schlagzeugtalent aus der 5. Klasse des RG</li>
              <li>Vater Gregor Spreng, groovender Keyboarder von “SoulSociety”</li>
            </ul>
          </li>
          <li>Stefan Siegele, Gitarrenkönig von “SoulSociety”</li>
          <li>Dr. Sichelstiel, mir noch leider unbekannt, aber hoffentlich nicht mehr lange!</li>
          <li>Christa Kuhn, mir ebenfalls leider unbekannt, noch!</li>
          <li>Christian Dannebrink, Tenorsaxgott, tragend Säule bei “Klangpatrouille” (www.klangpatrouille.de)</li>
          <li>Familie Diao (5 Personen), mit Beate, unserem Organisationsschatz der Jam Sessions</li>
        </ul>
      </li>
    </ul>

    <p>Und somit ist es endlich soweit!! Wir stellen uns alle die Frage: ....</p>

    <hr />

    <h5>2. Wer ist das 100. Mitglied? Es heißt: Schnell handeln!</h5>

    <p>Das kann doch nicht wahr sein!!! Wir haben es beinahe geschafft: Der nächste Beitritt zum Verein der Jazzfreunde stellt das 100. Mitglied dar! Im Anhang für Schnellentschlossene deshalb das Beitrittsformular. Der Glückliche bekommt vom Vorstand 1 Jahr den Mitgliedsbeitrag erlassen und darf sich zusätzlich noch im Diagonal ein kostenloses Konzert auswählen. Folgende Regel gilt jedoch für das 100. Mitglied: Die Anmeldung muss per Mail an mich geschehen. Dazu genügt eine Übermittlung der sich auf dem Formular befindlichen Daten in einem formlosen Mail. Es zählt hierbei das Eingangsdatum in meiner Mailbox. Das unterschriebene Formular muss dann aber binnen einer Woche bei unserem 1. Vorstand Reimund Domke im DER-Reisebüro (Milchstr. 1) abgeliefert werden, damit die Mitgliedschaft rechtskräftig wird. Alle, die zu langsam waren, seien getröstet, denn sie sind trotzdem kostenlos dabei beim...</p>

    <hr />

    <h5>3. Bonuskonzert am 22.4.08 mit TV-Aufzeichnung durch BR</h5>

    <p>Alle Vereinsmitglieder können sich die 15 Euro Eintritt sparen, denn es genügt ein Vorzeigen des Mitgliedsausweise an der Abendkasse, und man kommt kostenlos in dieses Megakonzert um 20 Uhr rein. Zu hören sein wird:</p>

    <ul class="nolist">
      <li>Wolfgang Haffner drums / Hubert Nuss piano / Christian Diener bass</li>
    </ul>

    <p>Mit seinem neuesten Projekt „Acoustic Shapes“ kommt Wolfgang Haffner, der wohl wichtigste deutsche Schlagzeuger der jüngeren Generation, ins Bürgerhaus. Als Schlagzeuger von Klaus Doldingers Passport und in den Bands von Till Brönner und Nils Landgren repräsentiert er die nationale Spitze. Seine Engagements an der Seite unzähliger Weltstars wie Pat Metheny, Bill Evans, Cassandra Wilson belegen, dass ihm auch international der Durchbruch gelang. Beinahe unglaublich, dass Haffner bei all dem auch noch Zeit für eigene wegweisende Projekte als Schlagzeuger, Komponist und Produzent findet. Ein Meilenstein dieser Aktivitäten ist die im Mai 2006 eingespielte CD „Shapes“, von der Presse als „Legierung aus griffigen Melodien, cleverer Elektronik, altem Rock, neuem Jazz und kühler Klangästhetik“ gefeiert. Für seine Formation „Acoustic Shapes“ arrangierte Wolfgang Haffner alles komplett um, so dass dabei teilweise völlig Neues entstanden ist. Wie begeistert dieses neue Konzept vom Publikum aufgenommen wurde, dokumentiert der Live-Mitschnitt aus der Berliner Philharmonie vom Oktober letzten Jahres.</p>

    <p>Noch ein Zuckerl: Dieses Konzert wird live vom BR mitgeschnitten! Also auf die Garderobe achten <tt>;))</tt></p>

    <hr />

    <h5>4. 10% gespart bei Tuck &amp; Patti diesen Montag</h5>

    <p>Übrigens: Der Mitgliedsausweis verhilft auch an diesem Montag (7.4.08) zu 10% verbilligten Karten an der Abendkasse, wenn Tuck &amp; Patti im Diagonal ihr Stelldichein geben. Wer die beiden sind?</p>

    <ul class="nolist">
      <li>Tuck Andress guitar / Patti Cathcart vocals</li>
    </ul>

    <p>Mit einer Mischung aus Jazz, Pop und Soul begeistern der Gitarrist Tuck Andress und die Sängerin Patti Cathcart, besser bekannt als Tuck &amp; Patti, seit mehr als 25 Jahren das Publikum. Atemberaubendes Fingerpicking, fliegende Akkordverbindungen und eine außergewöhnliche Stimme kennzeichnen die Musik des Duos. Tuck &amp; Patti schreiben wunderschöne Songs und ihre Balladen gehen unter die Haut. Dabei harmoniert Pattis leicht rauchiger Alt wunderbar mit den Gitarrenparts. (Eintritt: 18€)</p>

    <hr />

    <h5>5. Konzert Power Sax am 6. April im Swept Away</h5>

    <p>Und zu guter Letzt: Der Verein freut sich über ein stark aktives Mitglied: Manfred See, Saxofonist, Querflötist – er war bei der letzten Session auf der Bühne im Diagonal zu bewundern! - und Chef des Saxofonquartetts “Power Sax”. Manfred spielt nicht nur rege bei den Sessions mit, er engagiert sich auch in der Kerntruppe des Vereins, dem inneren Zirkle, der sich mehr als einmal im Monat zu Gesprächen im Hotel Rappensberger trifft, wozu jedes Vereinsmitglied jederzeit willkommen ist. Mir einfach nur eine Mail schreiben, dann seid Ihr im Verteiler des Jazzkerns dabei und immer bestens informiert. Einzige Bedingung: Aktiv am coolen Verein mitwirken!<br />
      “Power Sax” spielt am Sonntag, 6. April, um 20 Uhr mit dieser kleinen aber feinen Besetzung im Restaurant Swept Away. Geboten werden Jazz Standards (How high the moon, etc.), zu empfehlen auch die (vegetarische) Küche im Swept und die coooolen Drinks.</p>

    <p>So, that’s all and let it roll!</p>

    <div class="signum">Robert Aichner</div>

    <?php attach(); ?>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 14 (25. März 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 14</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 83</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Jamsession am Sonntag, 30.3.08 um 19 Uhr im Diagonal</li>
      <li>Innere Zirkel der Jazzfreunde für alle Vereinsmitglieder offen</li>
      <li>Neuigkeiten Dixie- und Swingfestival 2008</li>
      <li>Bands für monatlichen Jazzfrühschoppen gesucht</li>
      <li>Homepage kurz vor dem Start: Wer will noch mitgestalten?</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>30.03. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">Jam Sesssion (Diagonal)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>07.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Tuck &amp; Patti (Diagonal)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>22.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Bonuskonzert Wolfgang Haffner Trio (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.04. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>28.06. 2008 </td>
        <td>ganzer Tag</td>
        <td>Dixie- und Swingfestival (Innenstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>25-26.07. 08</td>
        <td>&nbsp;</td>
        <td>Summer Jazz (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
    </table>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Jamsession am Sonntag, 30.3.08 um 19 Uhr im Diagonal</h5>

    <p>Bei den winterlichen Wetterverhältnissen braucht man doch wirklich eine Aufwärmgelegenheit: Die gibt es am kommenden Sontag 30.3.2008 um 19 Uhr bei der Jamsession der Jazzfreunde im Diagonal! Musiker wie Zuhörer sind bei diesem kostenlosen Event herzlich willkommen. Bitte die Instrumente selbst mitnehmen. Nur ein Drum-Set und eine Gesangsanlage werden gestellt. Eröffnungsband ist diesmal Highsoulciety; einsteigen darf aber jeder zu jederzeit! Sessionbooks, die beliebte Standards für C-, Bb-, Eb-, Bass- und Vokalstimme enthalten, sowie die Real Books Vol. I-III stellt der Verein an diesem Abend zur Verfügung. Das Sessionbook 2007 ist für Vereinsmitglieder kostenlos bei mir erhältlich. Nicht-Mitglieder müssen einen Unkostenbeitrag von 5 Euro zahlen.</p>
    <p>Die monatlichen Sessions sind übrigens gesichert, denn wir vom Verein haben heute mit Eugen Hoffart vom Diagonal und Manuel Royer vom Swept Away die Organisation unter Dach und Fach gebracht: Die Jazz-Szene Ingolstadts boomt weiter! Seid mit dabei!</p>

    <hr />

    <h5>2. Innere Zirkel der Jazzfreunde für alle Vereinsmitglieder offen</h5>

    <p>Dass der Motor des Jazzvereins momentan so gut läuft und immer mehr Gas gibt, liegt zum großen Teil an der Kerntruppe, sozusagen dem inneren Zirkel des Vereins, der sich so im Durchschnitt einmal pro Monat, meist donnerstags von 8.30 bis 9.30 Uhr im Hotel Rappensberger, zu Besprechungen trifft. Dies 10 PS / PerSonen starke Truppe soll aber kein Geheimbund bleiben! Wer also als Vereinsmitglied mitdenken, mitdiskutieren, mitentscheiden will, ist hierzu jederzeit willkommen. Dafür brauche ich nur eine kurze Mail, dass ihr an Bord seid und die PS-Zahl nach oben treibt! Damit seid Ihr im Kernverteiler dabei, bekommt immer die brandaktuellen Infos und Termine für die Treffen mitgeteilt. </p>

    <hr />

    <h5>3. Neuigkeiten Dixie- und Swingfestival 2008</h5>

    <p>Neuigkeiten vom Dixie- und Swingfestival 2008? Haben wir leider auch noch nicht. Eigentlich sollte ja bald alles unter Dach und Fach sein, aber ... Wie vielleicht aus der Presse (DK) entnommen, gab es bei IN-City, dem Veranstalter, personelle Veränderungen, welche die Organisation etwas ins Stocken gebracht haben. Allen Bands, die sich fürs Festival bei mir verbindlich angemeldet haben und sich somit auch den Termin 28.6.08 freihalten sei aber hier an dieser Stell versichert, dass wir sobald wie möglich Klarheit schaffen wollen. Würde das Konzept des Vereins wirklich umgesetzt werden, dann würde am Samstag den 28.6.2008 von 11-23 Uhr die Innenstadt von Ingolstadt vom Jazz nur so brummen:</p>

    <ul>
      <li>19 Bands, ausnahmslos regionale Musiker</li>
      <li>davon 65 Semiprofi- / Profimusiker</li>
      <li>100 jugendliche Jazzer in den Schülerbands</li>
      <li>7 Jazzförderpreisträger der Stadt Ingolstadt on stage</li>
      <li>über 26 Live-Stunden Musik</li>
      <li>auf 6 Bühnen in der Stadt</li>
    </ul>

    <p>Fast die gesamte Jazzszene Ingolstadts ist mit von der Partie! Ein Mega-Event, sollte es so stattfinden!!</p>

    <hr />

    <h5>4. Bands für monatlichen Jazzfrühschoppen gesucht</h5>

    <p>Was mittlerweile sehr gut funktioniert: Veranstalter, die Jazzformationen suchen wenden sich direkt an den Verein. So bekam ich vor Ostern eine Anfrage von Frau Ziegaus, der Pächterin des Lokals “Boothaus” am Donaustausee. Sie sucht von April bis Oktober 2008 für jeden ersten Sonntag im Monat eine Band zum Jazzfrühschoppen. Auch Abendveranstaltungen sind geplant. Interessierte Bands sollen bitte direkt mit ihr Kontakt aufnehmen: Tel. 0171-7955557. Wer da einen Gig bekommen hat, sage mir bitte ebenfalls Bescheid, dann kann ich den Termin im Terminkalender des Newsletters mit aufnehmen. Und auch auf der Homepage kann er veröffentlicht werden. Auf welcher Homepage?</p>

    <hr />

    <h5>5. Homepage kurz vor dem Start: Wer will noch mitgestalten?</h5>

    <p>Unsere Vereins-Homepage geht Anfang April an den Start!! Dank Daniel Höpp, unserem Homepageentwickler, ist sie beinahe fertig. Bereits morgen füllen wir das entworfene Gerüst mit Daten (Texte, Bilder, Links, ...) und da kann jeder mitmachen! Wer also kurzfristig morgen Abend, also am 26.3.08 um 19 Uhr Zeit hat, der ist herzlich bei mir zuhause (Orbanstr. 43a, in IN) zur “Taufe” eingeladen. Wer kommt, sage bitte per Mail bei mir kurz Bescheid!
      Wann genau die Homepage online ist, erfahrt Ihr im nächsten Newsletter!</p>

    <p>So long! See you on Sunday? Let the good times roll!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 13 (3. März 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 13</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 83</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>VORSICHT: <span class="highlight">TERMIN-ÄNDERUNGEN BEI DEN SESSIONS</span></li>
      <li>Frage der Sessionbands: Wer will?</li>
      <li>Die Zahl 13? Zwei Kündigungen</li>
      <li>Musikkurse auf Formentera</li>
      <li>Vergünstigungen für Vereinsmitglieder (über 25 Euro gespart!)</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Mittwoch</td>
        <td>05.03.2008</td>
        <td>20.00 Uhr</td>
        <td>Ola Onabule (Diagonal)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>10.03.2008</td>
        <td>20.00 Uhr</td>
        <td>The Yellowjackets (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>30.03. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">Jam Sesssion (Diagonal)</td>
      </tr>
      <tr>
        <td>Montag</td>
        <td>07.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Tuck &amp; Patti (Diagonal)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>22.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Bonuskonzert Wolfgang Haffner Trio (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.04. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td class="highlight">19.00 Uhr</td>
        <td class="highlight">Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>28.06. 2008 </td>
        <td>ganzer Tag</td>
        <td>Dixie- und Swingfestival (Innenstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>26.07. 2008</td>
        <td>ab 14 Uhr</td>
        <td>Summer Jazz (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
    </table>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. VORSICHT: <span class="highlight">TERMIN-ÄNDERUNGEN BEI DEN SESSIONS</span></h5>

    <p>Da hat sich tatsächlich ein kleiner Fehlerteufel bei den Sessionorten eingeschlichen! Die nächste Session findet demnach richtigerweise am 30.3.08 ab 19 Uhr im Diagonal (nicht im Swept away) als Jam Session / Open Stage statt! Für Schüler ein idealer Termin, ist das doch der letzte Osterferiensonntag. Danach folgt am 27.04.08 gleiche Zeit wieder eine Jam Session im Swept away, bevor sich dann der Nachwuchs am 25.5.08 ab 19 Uhr im Diagonal als Young Jazz Players präsentiert.</p>

    <hr />

    <h5>2. Frage der Sessionbands: Wer will?</h5>

    <p>Und da sind wir schon beim Organisatorischen: Bei der letzten Vereinssitzung waren wir uns einig, dass zu Beginn jeder Session eine Sessionband spielen sollte, die auch den Abend über die Leitung innehat. Gewisse Erfahrung im Umgang mit Standards aus den Real Books ist da natürlich hilfreich. Wer kann sich das vorstellen? Zu welchen Konditionen würdet Ihr das machen? Es müssen keine feststehenden Bands sein, sondern die Band kann auch für diesen Abend extra zusammengestellt werden. Bei Interesse, mich anmailen mit Nennung der Konditionen + gewünschter Termin. Übrigens: Bei den Young Players stellen die Sessionbands Ingolstädter Schüler.</p>

    <hr />

    <h5>3. Die Zahl 13? Zwei Kündigungen :((</h5>

    <p>Habe ja lange gezögert, den 13. Newsletter vom Stapel zu lassen! Und dann ... Zwei Kündigungen der Vereinsmitgliedschaft sind hier leider zu verkünden. Sie erfolgten zum Glück aus privaten Gründen. Danke in jeden Fall den beiden, die uns beinah ein Jahr die Treue gehalten haben und alles Gute für die Zukunft!</p>

    <hr />

    <h5>4. Musikkurse auf Formentera</h5>

    <p>Unser Jazzfreund Nik von music-in bietet dieses Jahr u.a. einen Jazzkurs auf der Baleareninsel Formentera an. Dazu Nik:</p>

    <blockquote style="color:red;">
      <p>“Hallo Formentera Freaks,<br />
        die ersten &quot;warmen&quot; Sonnenstrahlen beglücken uns bereits und Formentera rückt, gerade in diesem Jahr, immer näher.
        Das schlägt sich auch auf die Buchungen nieder und für den Ein- oder Anderen Kurs wird es bereits eng.</p>

      <p><em>Für den Jazzkurs mit Yankee z.B. gibt es gerade noch 2 Plätze zu vergeben. Also ran an die Tasten und über</em><br />
        <a href="http://formentera.music-in.de/formentera_buchen.php">http://formentera.music-in.de/formentera_buchen.php</a><br />
        buchen.
      </p>

      <p>Ach ja....sollte noch jemand Flyer brauchen, es sind noch genügend vorhanden! Gibt es bei “music in”,
        Tränktorstraße 15, 85049 Ingolstadt</p>

      <p>In diesem Sinne.....rock the island!!</p>

      <p>Mit den besten Wünschen</p>

      <p>Nikolaj Rimsky-Korsakow”</p>
    </blockquote>

    <hr />

    <h5>5. Vergünstigungen für Vereinsmitglieder (über 25 Euro gespart!)</h5>

    <p>Nur noch mal zur Erinnerung: Auf alle Diagonal Konzerte bekommt man als Vereinsmitglied gegen Vorlage des Mitgliedausweises 10 % Ermäßigung. Wer als Vereinsmitglied also diesen Mittwoch zum Soul-König Ola Onabule geht, dann am 10.3.08 den Hammer “Yellow-Jackets” mitnimmt, neben dem Weltklasse-Duo Tuck &amp; Patti am 7.4.08 noch unser Bonuskonzert am 22.4.08 mit Master-Drummer Wolfgang Haffner besucht, hat zusammengerechnet schon über 20 Euro eingespart, also den Jahresbeitrag von 20 Euro für Schüler und Studenten. Und bald erscheint das Sessionbook Vol. II mit CD – umsonst für Mitglieder! - das wieder an die 20 Standards in den gängigen Tonarten zum Mitspielen enthält, das sonst für 5 Euro Unkostenbeitrag zu haben ist. Also junge Jazzmusiker und Jazzfreaks: Spart Euch reich! (Und da habe ich noch gar nicht die Vergünstigungen für die Jazztagekarten mit eingerechnet, für die es bereits im September ein Exklusivverkaufsrecht geben wird!)</p>

    <p>Noch was für Vereinsmitglieder: Fürs kostenlose Bonuskonzert ohne Bezahlung (ja genau!!) am 22.4.08 bitte noch per Mail bei Uli Spranger, unserm Kassier anmelden.</p>

    <p>Isn’t it lovely?! See you!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 12 (19. Februar 2008)")) {
  function content()
  {
  ?>
    <h1>Newsletter Nr. 12</h1>
    <p class="emboss right">Aktuelle Mitgliederzahl: 85</p>

    <hr />

    <p>Inhalt:</p>
    <ol>
      <li>Neues Layout</li>
      <li>Anmeldung zum Dixie- und Swingfestival am 28.6. noch möglich</li>
      <li>Infos zum Blechbläser-Workshop mit M. Burba und T. Brönner 09/2008</li>
      <li>Newsletter Birdland-Jazz-Club Neuburg (demnächst per Mail)</li>
    </ol>

    <hr />

    <p>Termine:</p>
    <table border="0" width="90%" cellspacing="4" cellpadding="2">
      <tr>
        <td>Sonntag</td>
        <td>24.02. 2008</td>
        <td>20.00 Uhr</td>
        <td>Nick Flade Groove Box (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>30.03. 2008</td>
        <td>19.00 Uhr</td>
        <td>Jam Sesssion (Swept Away)</td>
      </tr>
      <tr>
        <td>Dienstag</td>
        <td>22.04. 2008</td>
        <td>20.00 Uhr</td>
        <td>Bonuskonzert Wolfgang Haffner Trio (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>27.04. 2008</td>
        <td>18.00 Uhr</td>
        <td>Young Jazz Players (Diagonal)</td>
      </tr>
      <tr>
        <td>Sonntag</td>
        <td>25.05. 2008</td>
        <td>19.00 Uhr</td>
        <td>Jam Session (Swept Away)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>28.06. 2008</td>
        <td>ganzer Tag</td>
        <td>Dixie- und Swingfestival (Innenstadt)</td>
      </tr>
      <tr>
        <td>Samstag</td>
        <td>26.07. 2008</td>
        <td>ab 14 Uhr</td>
        <td>Summer Jazz (Innenhof Hotel Rappensberger)</td>
      </tr>
      <tr>
        <td>Mi - So</td>
        <td>10. - 14.09.</td>
        <td>2008</td>
        <td>Blechbläser-Workshop mit Burba und Brönner</td>
      </tr>
    </table>

    <hr />

    <p class="emboss">19. Oktober – 9. November 2008: 25. Ingolstädter Jazztage</p>

    <hr />

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Neues Layout</h5>

    <p>Überrascht? Ein neues Layout hält Einzug in den Newsletter des Vereins der Jazzfreunde Ingolstadt e.V.! Um bei der Menge an Infos, Terminen und Themen den Überblick zu behalten, hab ich mir Folgendes überlegt:</p>

    <ul>
      <li>die Newsletters werden ab sofort durchnummeriert (Nr. 1 erschien im August letzten Jahres)</li>
      <li>er soll ungefähr alle 2 Wochen erscheinen</li>
      <li>es wird stets die aktuelle Zahl der Mitglieder im Verein angegeben</li>
      <li>für diejenigen, die wenig Zeit zum Lesen haben, gibt’s das Wichtigste als Inhalt</li>
      <li>bei Terminen erscheinen Konzerte und Veranstaltungen der Vereinsmitglieder, die in der Region Ingolstadt stattfinden</li>
      <li>Veranstaltungen von Nichtmitgliedern werden wie gewohnt im laufenden Text angepriesen</li>
    </ul>

    <p>Ich hoffe, das neue Design gefällt. Ich bin jedenfalls sehr offen für Verbesserungsvorschläge! Übrigens: Es besteht jederzeit die Möglichkeit, aus dem Newletter wieder auszusteigen. Ein kurzes, formlose Mail an mich genügt. Andererseits: Ich bin immer dankbar um weitere E-Mail-Adressen von Jazzbegeisterten. Die Szene kann immer wachsen!</p>

    <hr />

    <h5>2. Anmeldung zum Dixie- und Swingfestival am 28.6. noch möglich</h5>

    <p>Der Termin für die Festlegung der Bands beim Dixie- und Swingfestival wurde nochmals verschoben. Wer also noch auf den Dixie- und Swing-Zug am 28.6.08 aufspringen will, bitte diese Woche noch bei mir per Mail melden, denn demnächst steht das Programm fest. Wir versuchen wie letztes Jahr die regionalen Jazzbands fest dort zu verankern.</p>

    <hr />

    <h5>3. Infos zum Blechbläser-Workshop mit M. Burba und T. Brönner 09/2008</h5>

    <p>Mittlerweile schon eine feste Einrichtung: Der Workshop für Blechbläser (Profis und Amateure) mit den Referenten Prof. Malte Burba und Till Brönner von Mittwoch 10.09. bis einschließlich Sonntag 14.09.2008 in Eichstätt. Organisiert wird dieser vom Vereinsmitglied Thomas Schösser, Ingolstadts Trompeten-Hero. Super Thomas, dass Du Weltstars in die Region holst! Infos und Anmeldeformalitäten findet ihr im Anhang.</p>

    <hr />

    <h5>4. Newsletter Birdland-Jazz-Club Neuburg folgt demnächst per Mail</h5>

    <p>Wie schon im Februar wird der Newsletter unseres befreundeten Vereins vom Birdland-Jazz-Club Neuburg demnächst per Mail versandt. Ein absolutes Highlight möchte ich hier noch hervorheben:</p>

    <blockquote style="color:red">
      <p>Jazz im Audi Forum Ingolstadt:<br />
        <b>Donnerstag, 13. März 2008</b>,<br />
        <b>20.00 Uhr</b><br />
        EUR 20.- / 15.- <b>Roy Hargrove Quintet</b>
      </p>
    </blockquote>

    <p>Let the good times roll!</p>

    <div class="signum">Robert Aichner</div>

    <?php attach(); ?>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 11: Die Post geht ab! Dringend! (14. Februar 2008)")) {
  function content()
  {
  ?>
    <h1>Die Post geht ab! Dringend!</h1>

    <p>Liebe Jazzfreunde,</p>

    <h5>1. Die Post geht ab!</h5>

    <p>Alle Mitglieder sollten heute oder morgen per Post die Mitgliedsausweise, das Protokoll der Vereinssitzung (falls nicht schon per Mail bekommen) und die Anmeldung fürs kostenlose Bonuskonzert am 22.4.08 im Diagonal erhalten haben. Wenn nicht, lasst es mich wissen! Danke an Uli Spranger und Kathin Fischer dafür!</p>

    <h5>2. Mitglieder</h5>

    <p>Denkt Euch, ich hab das ... -75. Mitglied gefunden! Es passierte Mitte Januar, dass Manfred See, ein Sax-Hero Ingolstadts in den Verein als 75. Member eintrat! Glückwunsch Manfred! Dein Preis: Ein zusätzliches Bounskonzert im Diagonal (Konzertankündigungen siehe unten). Sag uns einfach, wo du hingehen willst. Und Ihr werdet es kaum glauben: Wir sind mittlerweile insgesamt schon 85 Mitglieder!! Ehrlich, denn hier kommen die Neuen:</p>

    <ol>
      <li>Claudia Schmaderer: Frontfrau bei “Highsoulciety”, eine großartige Funk-Soul-Formation in Ingolstadt. Die Frau hat Power!!</li>
      <li>Bernd Hoffmann mit Familie (bringt also gleich noch 3 weitere Mitglieder!), Claudias Sangesbruder bei Highsoulciety. Ich kenne Bernd noch nicht und deshalb hier O-Ton Claudia: “ist eine echte rampensau with the beat in the blood..”: Herzlich willkommen!! Solche Leute brauchen wir!</li>
      <li>Familie Gutsche (wieder 4 auf einen Streich), die da wären
        <ul>
          <li>Verena Gutsche – unermüdliche Mitarbeiterin beim Team der Ingolstädter Jazztage, Gründungsmitglied bei Klangpatrouille (Klavier) und tolle Saxofonistin, ganz der Papa ...</li>
          <li>Charly Gutsche – Klarinettist der legendären Birdland Jazzband (immer ein volles Haus!) und Sax- und Klarilehrer im Gnadenthal, wo auch sein Sohn...</li>
          <li>Matthias Gutsche war – der Grooveminister des Simon-Seidl-Trios am Schlagzeug und Backbone so mancher Session an den Drums!</li>
          <li>Renate Gutsche – Sie hält den Laden der gutschigen Musiker zusammen!</li>
        </ul>
      </li>
    </ol>

    <p>Gehen wir also das 100. Mitglied an!! (Hab ich eigentlich bei meiner Vorstellung irgendjemand vergessen?? Bitte gleich mailen! Kein Absicht!!)</p>

    <h5>3. Dringend: Bands fürs Dixie- und Swing-Festivals am Sa 28.6. In IN gesucht</h5>

    <p>Am Montag 18.2. Schon ist die erste Besprechung mit dem City-Manager wegen dieses Jazzfestivals. Wir wollen da schon ein Vorab-Konzept vorlegen. Das Festival findet auf einer Hauptbühne am Rathausplatz und verteilt in der Fußgängerzone, eigentlich so wie letztes Jahr, statt. Es soll ein großer Querschnitt der Ingolstädter Jazzszene präsentiert werden (Dixie und Swing ist hier ein wenig irreführend meiner Meinung nach).</p>
    <p>Die Bands, die spielen wollen, sollen sich bis So 17.2. bei Robert per Mail melden, bitte mit Gagenvorstellung, möglicher Spieldauer, Spielortwunsch und kurzer Bandcharakteristik (Stilistik, Besetzung). Vielleicht können wir da ein passendes Paket schnüren. Der Verein wird sich bei diesem Festival voll engagieren und versuchen, v. a. Seine Mitglieder unterzubringen.</p>

    <h5>4. Sessionplanung</h5>

    <p>Die geplante Session am So 24.2. muss wegen dem Konzert von Nick Flades “Groove Box” am gleichen Tag im Diagonal leider entfallen. Aber wir sehen uns ja dann sowieso, bei Nick, oder? (Unbedingt hingehen! Groovt wie die S..euche). Auch bei den anderen geplanten Sessions hat sich vom Ort her klein wenig was verändert:<br />
      Weiter geht es so:</p>
    <ul>
      <li>27.4. Diagonal 18 Uhr Young Jazz Players</li>
      <li>25.5. Jam Session 19 Uhr Swept away</li>
      <li>26.7. Summer Jazz im Rappensberger eventuell mit Session</li>
    </ul>

    <p>Für jede Session suchen wir noch eine eröffnende Sessionband, die auch die Leitung des Abends übernehmen kann. Wer hat Lust dazu? Bei mir per Mail melden! Weiter suchen wir auch nach Sponsoren für die Sessions, um der Ausgaben besser Herr zu werden. Wer hat hier eine Idee? Oder habt Ihr einen Laden, der auf diese Veranstaltung beworben werden möchte? Oder kennt Ihr jemanden, der wiederum Beziehungen hat zu dem, der beim Direktor ... (z. B. bei Media Saturn??)</p>

    <h5>5. Jazzkonzerte im Bürgerhaus/Diagonal</h5>

    <p>Der Jazzfrühling naht (auch wenn der Industrieschnee ...) in Form von Wahnsinns-Acts in Ingolstadts Jazzkneipe Nr. 1!! Übrigens: Vereinsmitglieder erhalten bei diesen Konzerten verbilligten Eintritt. Nur den Ausweis an der Kasse vorzeigen!</p>

    <pre>
==========================================================================
01 Jazz &amp; More: Nick Flade &amp; Groovebox, So., 24.02., 20 Uhr

Groove-orientierte Funk-Fusion ist das Markenzeichen des Ingolstädter
Pianisten Nick Flade und seiner Band Groovebox.  Dabei sind die
Arrangements von treibenden Rhythmen, spannenden Melodiebögen und
knackigen Riffs bestimmt.
Bei diesem Konzert wird der Pianist und Keyboarder viele Eigenkompositionen
und seine neue CD “Tabox” vorstellen.

Nick Flade - Rhodes, synthesizer; Stefan Puppele - guitar;
Peter Lichtneckert - drums; Heiko Jung - bass; Tom Reinbrecht - sax;
Jason Lee Jackson - vocals

Eintritt: 6.- EUR

==========================================================================
02 Jazz &amp; More: Ola Onabule, Mi., 05.03., 20 Uhr

Wer das heimliche Highlight der Freitagsparty beim letztjährigen
Ingolstädter Jazzfestival versäumt hat, erhält noch mal die Gelegenheit,
den britisch-nigerianischen Sänger Ola Onabule live zu erleben. In England
bereits ein Star, schickt sich Onabule mit seiner sechsten CD “The Devoured
Man” jetzt auch an, den Kontinent zu erobern.

Ola Onabule - vocals; Andrew Noble - keys; Ramsey Mc Iness - guitar;
Neil Raymond - bass; Victor Trivino - percussion;
Julian Mc Laren - drums

Eintritt: 15.- EUR

==========================================================================
03 - Jazz &amp; More: The Yellowjackets - Mo., 10.03., 20 Uhr

1981 als Band in der „Robben Ford Band“  gegründed, schreiben die
Yellowjackets seit mehr als 25 Jahren Musikgeschichte im
Fusion/Jazz-Bereich. Ihr Debutalbum war das erste digital aufgenommene
Jazzalbum. Mit ihren Alben “Shades” und “Polities” gewannen sie zwei
Grammys und wurden für acht weitere Grammys nominiert. Als der Saxophonist
Bob Mintzer an die Stelle des Gründungsmitglieds Marc Russo trat, bewegte
sich die Gruppe weg von ihren kommerziellen Anfängen in Richtung
zeitgenössischem Jazz.

Russell Ferrante - piano; <span style="color:red; font-weight:bold;">Bob Mintzer - saxophone</span>; Jimmy Haslip - bass;
Marcus Baylor - drums

Eintritt: 20.- EUR

==========================================================================
04 Jazz &amp; More: Tuck &amp; Patti, Mo., 07.04., 20 Uhr

Mit einer Mischung aus Jazz, Pop und Soul begeistern der Gitarrist Tuck
Andress und die Sängerin Patti Cathcart, besser bekannt als Tuck &amp; Patti,
seit mehr als 25 Jahren das Publikum.
Atemberaubendes Fingerpicking, fliegende Akkordverbindungen und eine
außergewöhnliche Stimme kennzeichnen die Musik des Duos.

Tuck Andress - guitar; Patti Cathcart - vocals

Eintritt: 18.- EUR

==========================================================================
05 Jazz &amp; More: Wolfgang Haffner Acoustic Shapes, Di., 22.04., 20 Uhr

Mit seinem neuesten Projekt “Acoustic Shapes” kommt Wolfgang Haffner, der
wohl wichtigste deutsche Schlagzeuger der jüngeren Generation, ins
Bürgerhaus. Als Schlagzeuger von Klaus Doldingers Passport und in den
Bands von Till Brönner und Nils Landgren repräsentiert er die nationale
Spitze. Seine Engagements an der Seite unzähliger Weltstars wie Pat
Metheny, Bill Evans, Cassandra Wilson belegen, dass ihm auch international
der Durchbruch gelang.

Wolfgang Haffner - drums; Hubert Nuss - piano; Christian Diener - bass

Eintritt: 15.- EUR

==========================================================================
</pre>
    <p>Eintrittskarten sind im Bürgerhaus, Diagonal und im DK-Ticketservice
      erhältlich. Einlass 1 Stunde vor Beginn</p>

    <p>DK-Ticket-Hotline: 0180 30 00 013</p>

    <p>(Weltstars des Jazz!!)</p>

    <h5>6. Musikworkshops</h5>

    <p>Unser fleißiges Vereinsmitglied Nik von “music-in” (der Equipment-Mann bei der Januar-Session!! Danke Nik!) bietet Workshops von Beginn des Lebens an. Neugierig? Im Anhang mehr, wo auch Sandra-Isabel Knobloch (mit im Verein) trommelt.</p>

    <p>Was vergessen? Der nächste Newsletter kommt bestimmt! Und kein “Let it snow” mehr!</p>

    <p style="color:red; font-weight:bold;">Herzliche Grüße!</p>

    <div class="signum">Robert Aichner</div>

    <?php attach() ?>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 10: Neue Mitglieder, Bands für Theatertage 2008 (8. Februar 2008)")) {
  function content()
  {
  ?>
    <h1>Neue Mitglieder, Bands für Theatertage 2008%</h1>

    <p>Liebe Jazzfreunde,<br />
      Habe noch einen Nachschlag für Euch: Zunächst haben wir</p>

    <h5>1. Wieder 3 neue Mitglieder,</h5>

    <p>die ich Euch kurz vorstellen möchte:</p>

    <ul>
      <li>Martin Bürkl: Ingolstadts bester Posaunen-Blondschopf, Frontman bei Klangpatrouille (<a href="http://www.klangpatrouille.de">www.klangpatrouille.de</a>) und Mitbegründer der crazy Gruppe "Da boarische (Jazz) Plan" (<a href="http://www.jazzplan.de">www.jazzplan.de</a>)</li>
      <li>Bernhard Reitberger: der Jazzkatalysator am Gnadenthal-Gymnasium (Jazz Club) und einmaliger Vibraphonist der Neuburger Gruppe "JazzArt" (<a href="http://www.jazzart-neuburg.de">www.jazzart-neuburg.de</a>)</li>
      <li>Manfred See: Saxofonist im starken "Power Sax" Saxofonquartett (<a href="http://www.manfred-see.de/powersax.htm">www.manfred-see.de/powersax.htm</a>) und bei der kultigen Band "Basement Boogie Bunch" (<a href="http://www.basementboogiebunch.de">www.basementboogiebunch.de</a>)</li>
    </ul>

    <p>Es geht also ganz knapp auf das 75. Mitglied zu (ES WINKT DER EXTRAPREIS!!)</p>

    <h5>2. Bands für die Ingolstädter Theatertage 2008</h5>

    <p>Heute telefonierte mich der musikalische Leiter des Stadttheaters Ingolstadt, Herr Andreas Dziuk, an. Er sucht bis spätestens Montag (11.2.) Bands für die Ingolstädter Theatertage. Das Theater – und das finde ich ziemlich gut! - denkt v. a. an die Ingolstädter Szene! Folgendes Mail sandte Hr. Dziuk mir zu:</p>

    <blockquote style="color:blue;">
      <p>Hallo,<br />
        also die Theatertage finden in Ingolstadt vom 25.5.-8.6. statt.</p>
      <ul class="nolist">
        <li>25.5. Eröffnung sehr offiziell. 4-5 Mann Besetzung Jazz, Lounge, Soul evtl. gesang.</li>
        <li>26.5. Jazz Monday - 3Mann Besetzung (muss nicht zwangsläufig immer mit Drums sein)</li>
        <li>27.5. Country Abend, dafür suche ich Contrabass und Drums (wobei Drums übertrieben ist, eher Snare und Bassdrum und Percussion, also minimal)</li>
        <li>1.6. Blues Night, Blues Band oder Soul, kleine Bestzung 3-4 Mann</li>
        <li>2.6. Jazz Monday (wie 26.5.)</li>
        <li>3.6. (wie 27.5.)</li>
        <li>8.6. offizielle Preisverleihung, 4-5 Mann Band, Jazz Soul Lounge.</li>
      </ul>
      <p>Anfangszeiten jeweils ca.21uhr. für 1,5 Stunden.</p>
      <p>Dank nochmal für die schnelle Hilfe.</p>
      <p>Gruss<br />
        Andreas Dziuk</p>
    </blockquote>

    <p>Falls jemand von Euch Interesse daran hat und die Beschreibung auf Eure Bands oder Projekte zutrifft, dann sofort direkt Kontakt mit Herrn Dziuk aufnehmen!! Die Ingolstädter Szene lebt!! Zeigt es IN!</p>

    <p>Bis demnächst! And ... Let the good times roll!!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 9: Rollin’ rollin’ rollin’ (5. Februar 2008)")) {
  function content()
  {
  ?>
    <h1>Rollin’ rollin’ rollin’</h1>

    <p>Liebe Jazzfreunde,<br />
      Der Jazzzug in In rollt weiter mit neuen Passagieren, die ihre E-Mail bei der sehr erfolgreichen Jamsession am letzten Sonntag im Januar im Swept away (Danke Manuel, Beate, Angie, Nik, Simon, ... Hab ich jemand vergessen? Dann Sorry!!) eingetragen haben. Also: HERZLICH WILLKOMMEN AN ALLE NEUEN INTERESSENTEN FÜR INGOLSTADTS COOLE JAZZSZENE!!<br />
      Wie schon bekannt folgt zunächst</p>

    <h5>1. Die Ankündigung ein paar neuer Termine</h5>

    <p>Folgende Mails leite ich gerne weiter:</p>

    <blockquote style="color:navy;">
      <p>Hallo Robert,<br />
        wäre es möglich unser Acapella - Konzert von The Voice Connection siehe Homepage<br />
        <a href="http://www.the-voice-connection.de">www.the-voice-connection.de</a><br />
        am 16. Februar im Rathaussaal Gaimersheim um 20 Uhr, Eintritt 8 Euro im Internet anzukündigen?
      </p>
      <p>Wäre super. Danke im Voraus.</p>
    </blockquote>

    <p>Ist eine geniale A-Cappella-Truppe mit jazzigen Background!</p>

    <p>Und Simon Seidl, sicher kein Unbekannter mehr, schreibt:</p>

    <blockquote style="color:green;">
      <p>Könntest du bitte ein bisschen Werbung für mich machen bei den Jazzfreundeadressen??</p>
      <table border="0" width="90%" cellspacing="4" cellpadding="2">
        <tr>
          <td>03 - 05. februar 08</td>
          <td>Kaffee Giesing (MUC)</td>
          <td>Paulo Cardoso - Simon S.</td>
          <td>Kontrabass - Piano</td>
        </tr>
        <tr>
          <td>02 - 06. April 08 </td>
          <td>Kaffee Giesing (MUC)</td>
          <td>Paulo Cardoso - Simon S.</td>
          <td>Kontrabass - Piano</td>
        </tr>
        <tr>
          <td colspan="4">Eintritt frei!!!!!!!!!!</td>
        </tr>
        <tr>
          <td>10. März 08</td>
        <tr colspan="3">Konzertbesetzung des Landesjugendjazzorchesters unter der Leitung von Harald Rüschenbaum in der Unterfahrt München.</td>
        </tr>
      </table>
    </blockquote>

    <p>Werbung für unsere Jazzer mach ich doch gerne! Aber ups: Den ersten Seidl-Termin hab ich zu spät beworben, wie ich grad sehe. Liegt an meinem Lazarett zuhause im Moment (Wen von den Lesern hat die Erkältungs- oder Magen-Darm-Grippe noch nicht erwischt?)</p>


    <h5>2. Das 50. Mitglied!</h5>

    <p>Glückwunsch Martin Schütz (Pianist und Schüler des Reuchlin-Gymnasiums in der 8. Klasse)! Er ist das 50. Mitglied im Verein und bekommt somit ein Jazzkonzert im Diagonal gratis vom Verein gesponsert geschenkt. Die Termine der nächsten Konzerte dort folgen bald per Newsletter. Nur soviel sei verraten: Es kommen die totalen Hammer (Bob Mintzer!!, Tuck &amp; Patti usw.!!) Und: Wer wird das 75. Mitglied mit Gratiskonzert?? Ihr seht: es lohnt sich. Übrigens: Am 22.4.08 findet im Diagonal</p>

    <h5>3. Das Bonuskonzert für alle Vereinsmitglieder kostenlos</h5>

    <p>statt. Es wird das Wolfgang Hafner (dr) Trio (mit Hubert Nuss p, Christian Diener b). Also schnell noch Mitglied werden!! Der Verein tut was für seine Mitglieder!</p>

    <h5>4. Protokoll der Vereinssitzung vom 24.1.08</h5>

    <p>Es war ein dichtes Programm bei der Sitzung am Donnerstag 24.1. Um 18.30 bis 20.30 Uhr im Hotel Rappensberger. Es bewegt sich einiges im Jazz in IN und alle Vereinsmitglieder werden demnächst natürlich per Protokoll über die neuesten Entwicklungen exklusiv informiert.</p>

    <h5>5. Der Nächste Sessiontermin</h5>

    <p>Steht leider noch nicht fest, da der angepeilte Termin 24.2. (letzter Sonntag im Februar ) sich mit einem coolen Konzert, nämlich mit der “Groove Box” von Nik Flade (auch Vereinsmitglied) überschneidet, der zeitgleich im Diagonal auftritt. Aber die Kerntruppe des Vereins arbeit an einem Ersatztermin!</p>


    <p>So long. Let The Jazz-Train in IN Roll!!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 8: Weihnachtswünsche (20. Dezember 2007)")) {
  function content()
  {
  ?>
    <h1>Weihnachtswünsche</h1>

    <p>Liebe Jazzfreunde,<br />
      Ich wünsche Euch allen stellvertretend für den Verein der Jazzfreunde Ingolstadt:</p>

    <p class="emboss">Geruhsame Weihnachten und bewegte und bewegende Monate im Jahr 2008!</p>

    <p>Und was wünsche ich mir zum Weihnachtsfest?</p>

    <ol>
      <li>Dass wir uns alle im Jahr 2008 gesund, fröhlich und voller Tatendrang bei vielen Jazzkonzerten sehen!</li>
      <li>Wieder geniale Jazztage vom 19.10. Bis 9.11.2008 (die Termine stehen schon)!</li>
      <li>Das 50. Mitglied im Verein, am Besten noch vor der Vereinssitzung am 24.1.08 um 18.30 Uhr!</li>
      <li>Zahlreiche Musiker bei der nächsten Ingolstädter Session am So 27.1.08 im Swept Away!</li>
      <li>Ein riesiges Bandarchiv, das alle regionalen Jazzgruppen Ingolstadts enthält ( 1. Meldungen sind schon da)!</li>
      <li>Eine tolle Kooperation mit dem Birdland-Jazzclub Neuburg, die gerade in den Anfängen ist!</li>
      <li>Eine Homepage, auf die der Verein stolz ist!</li>
      <li>Jazznachwuchs, der nie versiegt!</li>
      <li>Genügend, den Lebensunterhalt sichernde Gigs für unsere hauptberuflichen Jazzmusiker!</li>
      <li>Freunde, Gönner und Jazzliebhaber, die den Verein auf allen Ebenen unterstützen!</li>
    </ol>

    <p>Das und nicht mehr könnte in Erfüllung gehen!</p>

    <p>So let us row – together!</p>

    <p>Ich freu mich auf 2008!!!</p>

    <div class="signum">Euer Robert Aichner</div>

    <p>PS: Näheres zu den nächsten Events und Planungen im nächsten Mail Anfang Januar!</p>


    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 7: Jazztage befruchten ... (25. November 2007)")) {
  function content()
  {
  ?>
    <h1>Jazztage befruchten ...</h1>

    <p>Na wie geht's?<br />
      Den Musik-Rausch produziert durch die fantastischen Jazztage 2007 ausgeschlafen? Ich bin noch ganz atemlos, deshalb an dieser Stelle:</p>

    <p class="emboss">DANKE AN JAN ROTTAU UND SEINEM TEAM FÜR SUPER-GENIALIEN TAGE MIT AUF- UND ANREGENDER MUSIK: ES WAR SPITZE!!!</p>

    <p>Nach den Festtagen weiß ich gar nicht, wo ich anfangen soll mit all den Neuigkeiten, die seit 2 Wochen auf meinem Schreibtisch warten, publiziert zu werden. Also: rein ins Vergnügen:</p>

    <h5>1. Der Verein wächst!!</h5>

    <p>Das war doch eine gute Ernte! Schon bei der Session am 5.11. im Diagonal ging es los. Das Konzept, Jazzneulinge mit absoluten Vollprofis wie Christian Diener, Larry Sieberth, Charly Böck oder Igor Loboda auf der Bühne zusammenspielen zu lassen ging voll auf: Eine der besten Sessions, die Ingolstadt gesehen hat. Effekt: Zahlreiche begeisterte Zuhörer und Eltern unseres Jazznachwuchs traten dem Verein bei. Und somit darf ich neu in unserer Familie begrüßen (in alphabetischer Reihenfolge):</p>
    <ol>
      <li>Eva-Maria Atzerodt, meine sehr geschätzte Musikkollegin am Reuchlin-Gymnasium und Frau mit Beziehungen!!</li>
      <li>Sebastian Biswanger, ein Vollblutmusiker wie in IN selten gesehen hat, Akkordeonist bei der Birdland-Jazzband!!</li>
      <li>Beate Diao, jeden Sonntagabend super gelaunt arbeitend im Diagonal anzutreffen, bildende Künstlerin mit Herz für Kinder und tollen Ideen (siehe weiter unten)!!</li>
      <li>Reinhard Ecker, mir leider noch unbekannt, aber bald ist ja Vereinssitzung (Anfang 2008)!</li>
      <li>Angelika Gützlaff, auch noch eine Unbekannte für mich, aber hoffentlich nicht mehr lange!</li>
      <li>Eugen Hoffart, der Pächter (oder Besitzer??) des Diagonal, immer ein offenes Ohr für den Jazz!!</li>
    </ol>
    <p>... Und, soweit ich weiß, waren das noch nicht alle, denn ein paar Anträge sind noch am Laufen! Übrigens, bald (noch 5 Mitglieder) durchbrechen wir die Schallmauer des 50. Mitglieds! Wir peilen das noch für 2007 an: Also ran die Formulare (gibt’s auch bei mir per Mail!!)</p>

    <h5>2. Der Verein bewegt was!!</h5>

    <p>Demnächst – Anfang 2008 – ist wieder Vereinssitzung. Da gibt’s wieder Internas zu besprechen: z.B., wenn Jan, Festivalleiter der Jazztage da ist, ein Rückblick auf die Jazztage 2007, Ausblick auf die Termine des kommenden Jahres und Ideen für die Zukunft. Und da darf ich hier sicherlich schon was verraten: Gerade ist eine Homepage für den Verein im Entstehen. Wer Lust hat, da mitzuarbeiten, bitte mir Bescheid geben. Verantwortlich zeichnet sich Daniel Höpp, auch kein Unbekannter in der Technikszene. Und: Für alle Mitglieder wird es im Frühjahr ein kostenloses Bonuskonzert mit überregionalen Jazzstars geben. (Schell noch Mitglied werden??)</p>

    <h5>3. Jamsessions im Diagonal jeden letzten Sonntag im Monat!!??</h5>

    <p>Beate Diao (Neumitglied und schon genial aktiv!!) hatte die Idee und auch die Connections (sie ist immerhin die Kusine von Christian Diener): Warum nicht jeden letzten Sonntag im Monat im Diagonal fest eine Session einrichten?? Was haltet Ihr von der Idee? Entweder mir mailen oder zur Vereinssitzung kommen, deren Termin die Vereinsmitglieder ja per Post mitgeteilt bekommen. Wer würde denn als Sessionmusiker zur Verfügung stehen? Wir bräuchten halt für jeden der Termine Drums + Piano + Bass. Ich bin absolut dafür: IN hat das verdient und kann das auch zur Institution werden lassen! Wenn alles gut geht, starten wir schon am 27. Januar. Näheres demnächst.</p>

    <h5>4. Archiv aller Jazzbands der Region</h5>

    <p>Wir Jazzer der Region wollen uns mehr zusammenschließen. Deshalb plant der Verein ein Archiv aller Jazzbands in, aus und um Ingolstadt herum anzulegen, dessen Daten uns eine Basis bieten soll, wenn, wie schon öfter passiert, Veranstalter an uns herantreten, die vom Verein Bands angeboten haben wollen. Aktuell wird der Verein wieder beim Dixie- und Swingfestival am 28. Juni 2008 (Sa) versuchen, seine Bands unterzubringen. Nun ergeht also der Aufruf an alle Ingolstädter Jazz- und jazzverwandten Gruppen, das im Anhang befindliche Formular mir ausgefüllt zurück zu mailen. Die Daten werden vertraulich behandelt, nur unter Zustimmung der Kontaktperson der Band auch an Veranstalter weitergegeben. Das sensible Thema der Gage habe ich auch aufgeführt. Diese Meldung ist aber für den Verein nötig, um bei Verhandlungen ungefähr den finanziellen Rahmen zu kennen. Hier also bitte am Besten eine realistische Preisspanne angeben (z.B. Minimum 25 Euro pro Bandmitglied pro Stunde, gewünscht: 50 Euro pro Nase pro Stunde ... ). Und: Wer eine CD im Gepäck hat, wäre schön, wenn der Verein für sein Archiv eine Gratis-CD bekommen könnte. Wir werden im Gegenzug dann uns für Euch einsetzten. Übrigens: Dieses Archiv wird mit den Web-Links natürlich auf unserer Homepage vertreten sein. Wer also seinen Link da verewigt haben will, schnell mir die Daten schicken.</p>

    <h5>5. Gegen Langeweile im trüben Herbst</h5>

    <p>Es haben mich mal wieder ein paar Leute angemailt, die ihre Veranstaltung über den Verteiler, der mittlerweile 200 Jazzbegeisterte bedient!!, beworben haben möchten: Wer also dem tristen November entfliehen will, hat folgende Möglichkeiten:</p>


    <blockquote style="color:maroon;">
      <p>“Im Anhang Werbung für ein Konzert am 29.11.07”</p>
    </blockquote>

    <p>Dann:</p>

    <blockquote style="color:navy;">
      <p><strong>“FUNK YOU” (Soul &amp; Funk &amp; a little bit of Jazz goes Byblos, Ingolstadt)</strong><br />
        <em>2 Livebands und 3 DJs</em>
      </p>

      <p>Ein ganz besonderes Event unter dem Motto „FUNK YOU“ steigt am Sa., 08.12., im Byblos (Adolf-Kolping-Straße 1, Ingolstadt, ehemals „Le Vento“, „Hochalm“). Ab 22.00 Uhr geben sich die Sieger der beiden letzten Maxi-DSL-Contests die Ehre und heizen mit bestem Soul &amp; Funk in der City-Disco in Ingolstadt ein. Den ersten Teil des Abends absolvieren Souled Out mit ihrer Liveshow. Sie begeisterten bereits in diesem Jahr auf dem Maxi-DSL-Contest, auf dem Pförringer Open Air und dem Open Flair. Nach einer kleinen Umbaupause gehen Club Légère an den Start. Sie gewannen 2006 den Contest und sind absolute Profis im Soul &amp; Funk-Bereich. Kein Wunder, dass sie uns an diesem Abend gleich mit zwei Sets beglücken. Zwischen den Umbaupausen legt für euch DJ Eugen auf, für den Ausklang ist DJ Daniel M. mit DJ Oldschool am Start. Also, viel geboten für schlappe 5,- Euro. Seid dabei!</p>

      <p>Euer club légère<br />
        <a href="http://www.clublegere.de">www.clublegere.de</a>
      </p>

    </blockquote>

    <p>Und zuletzt schreibt Nik von music-in u.a.:</p>

    <blockquote style="color:green;">
      <p>Hallo Ihr Lieben Musikanten,<br />
        Das Workshop Programm in Formentera für 2008 steht und die ersten Anmeldungen und Reservierungen kommen schon rein! Das ganze ist unter <a href="http://www.music-in.de">www.music-in.de</a> zu sehen! Neben Gitarre-Gesang-Groove mit Klaus, Gesang mit Sandrina, Percussion mit Roman, Rumba- und Flamencogitarre mit Sascha, habe ich fürs nächste (Jubilee) Jahr wieder &quot;Neues&quot; zu bieten:</p>
      <ul>
        <li>Yankee hat seinen Jazzkurs diesmal auch für &quot;Wiederholer&quot; konzipiert, der den Fortgeschrittenen ebenso bedient wie die Bassisten unter Euch. Wer Ihn kennt, der weiß dass Yankee diese Aufgabe mit Leichtigkeit wenn nicht sogar &quot;Freihändig&quot; löst!</li>
        <li>Roman gibt auf vielfachem Wunsch zwei Kurse wobei er den ersten zusammen mit seinem Sohn Raphael leitet und wieder die Einsteiger und Interessierten bedient.
          In der 2. Woche geht es dann ins eingemachte und ist für Fortgeschrittene und &quot;Wiederholer&quot; gedacht.</li>
        <li>Neu im Team ist ein Freund und Bandkollege von Roman. Ein unglaublich netter und guter Gitarrist: Charly Hoernemann aus München. Er ist 2008 für die Bluesfraktion zuständig und ich freu mich sehr dass er mit dabei ist. Sein Kurs ist im übrigen ebenfalls für Bassisten konzipiert.</li>
      </ul>

      <p>(...)</p>

      <p>Ich freue mich sehr, dass sich all diese netten und vor allem guten Dozenten wieder auf dieses ganz spezielle Abenteuer auf dieser wunderschönen Insel einlassen, und ich Euch wieder ein attraktives Kursangebot präsentieren kann!!</p>

      <p>Also.....ran an die Tasten und Sonne, Meer und Musik buchen!!</p>

      <p>Rock the island!!</p>

      <p>Euer Nick</p>

      <p>p.s. Das Hotel Pittiuses ist wieder günstiger geworden und bietet uns einen Sonderpreis an.
        Doppelzimmer ohne Frühstück: ca.25.- pro Person.</p>

    </blockquote>

    <p>Nun denn, die Szene wächst und gedeiht, auch dank der befruchtenden Jazztage. Ich freu mich schon auf die Antworten für unser Archiv und auf das 50. Mitglied und auf die monatlichen Jamsessions und auf die Homepage und auf das Bonuskonzert 2008 und auf die Vereinssitzung und auf die Jazztage 2008 und ... auf etwas mehr Sonne!! (Wobei: Kerzen sind auch schön!)</p>

    <p>Let it grow, let it snow - oder: Let the sun shine!!</p>

    <div class="signum">Euer Robert Aichner</div>

    <?php attach() ?>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 6:  Am laufenden Band! (24. Oktober 2007)")) {
  function content()
  {
  ?>
    <h1>Am laufenden Band!</h1>

    <p>Liebe Jazzfreunde,<br />
      Es geht zu wie am laufenden Band. Man kommt fast nicht mehr hinterher, denn</p>

    <h5>1. Wir haben schon wieder neue Mitgliedschaften zu vermelden:</h5>

    <p>Barbara, Karen und Martina Huber (die Huber Sisters) mit ihren Eltern sind nach dem fulminanten Seidl'schen Konzert der “Familie” beigetreten. Apropos Familie: Für 60 Euro pro Monat ist die komplette Family dabei, egal wie viel Mitglieder. Dass nenn ich sozial. Die Hubers sind übrigens keine Unbekannten in IN: Die Eltern sind große Jazzfans und auf vielen Konzerten unterwegs, und die Huber Sisters machen sich im Reuchlin-Gymnasium sehr um die Musik verdient (Karen ist neues Mitglied in der Jazz GmbH!!)</p>

    <h5>2. Bernie Rieger, ein toller Vibraphonist und Schlagzeuger (unterrichtet am Gnadenthal) schrieb mir:</h5>

    <blockquote style="color:#8000ff">
      <p>“Am 26.10.2007 spielt die Neuburger Jazzformation &quot;Jazz Art&quot; zusammen mit der &quot;Voice Connection&quot; in Neuburg im Gewölbekeller P.A. Jazz Art spielt ausschließlich Eigenkompositionen aus ihrer aktuellen CD &quot;Easy Going&quot;. Voice Connection ist eine Acapella - Formation und bieten Jazzstandards in Eigenbearbeitung (Leiter Michael Klaschka). Beginn ist um 20.00Uhr. Abendkasse:8 €”</p>
    </blockquote>

    <p>Die Jungs von JazzArt sind unbedingt hörenswert, tragen sie doch meist nur Eigenkompositionen vor, die es in sich haben. Und Voice Connection ist so ziemlich einmalig in der Region: Ein Vokalquintett / -sextett mit professionellen Arrangements zu genießen. Wer also noch Zeit hat ...</p>

    <p>Bis zum nächsten Mail! (Kann nicht lange auf sich warten lassen <tt>;)</tt> As it flows)</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 5: 3 auf einen Streich! (22. Oktober 2007)")) {
  function content()
  {
  ?>
    <h1>3 auf einen Streich!</h1>

    <p>Liebe Jazzfreunde,<br />
      Die Familie wächst! Gestern bekam der Jazzverein Nachwuchs: gleich drei neue Mitglieder auf einen Streich!! Und das sind die Neuzugänge:</p>
    <ol>
      <li>Gisela Heck: meine sehr geschätzte Kollegin am Reuchlin-Gymnasium und Hobby-Saxofonistin</li>
      <li>Thomas Schösser: Megatrompeter bei Captains Bog, endlich wieder ein Bläser!!!</li>
      <li>Simon Seidl: Tastengott aus IN mit Zug nach Berlin. Da tanzt der Bär!!</li>
    </ol>
    <p>... Und da hatte ich doch tatsächlich vergessen, die Ursel Suchanek (Familienmitgliedschaft!!!) letztes Mal vorzustellen. Here she comes:</p>
    <ol start="4">
      <li>Ursel Suchanek, die bezaubernde Jazzgeigerin mit dem groovigen Saitenton!</li>
    </ol>

    <p>Bis demnächst!! (Na auf den Jazztagen!! Let it grow, let it flow, now it's show - time!!)</li>

    <p>LG</p>

    <div class="signum">Robert Aichner</div>

    <p>PS: Thomas Schösser organisiert übrigens 2008 wieder einen Workshop für Blechbläser, bei dem auch wieder TILL BRÖNNER mit von der Partie ist. Mehr im Anhang!</p>

    <?php attach() ?>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 4: Es geht los!! Und: Herzlich Willkommen Familie Suchanek!! (20. Oktober 2007)")) {
  function content()
  {
  ?>
    <h1>Es geht los!! Und: Herzlich Willkommen Familie Suchanek!!</h1>

    <p>Liebe Jazzfreunde,<br />
      Viele konnten es ja kaum noch erwarten, aber jetzt ist es soweit! Nein, ich meine jetzt nicht die Vollmitgliedschaft der Familie Suchanek, die ich an dieser Stelle sehr herzlich als neues Mitglied im Verein begrüßen darf, sondern die <em>JAZZTAGE</em> haben endlich angefangen!! Und wo solls hingehen? Vielleicht:</p>

    <ul>
      <li>Sonntag 21.10. um 18 Uhr Preisverleihung an Simon Seidl mit kostenlosem Konzert. SEIN NEUES QUARTETT MIT JUNGEN AMSTERDAMER STARS!</li>
      <li>Mittwoch 31.1. um 20 Uhr Gospel Konzert in der Augustinkirche. HALLELUJAH!</li>
      <li>Sonntag 4.11. um 19 Uhr im Audi-Forum Roger Cicero und Big Band: ES GIBT WIRKLICH NOCH KARTEN!</li>
      <li>Montag 5.11. ab 19.30 Jam-Session der Ingolstädter Nachwuchsjazzer von 12 bis ? (im Herzen ist man doch stets jung, oder) mit einem prominenten Überraschungsgast. EINTRITT FREI!! (Also frühzeitig da sein und Plätze reservieren)</li>
      <li>Dienstag 6.11. um 20.30 Uhr in der Neuen Welt Simon Seidl mit seiner preisgekrönten Combo &quot;Blindflug&quot;! SCHNELL NOCH DIE LETZTEN - wirklich sehr günstigen - KARTEN SICHERN!!</li>
      <li>Mittwoch 7.11. um 20.30 Uhr Diagonal: Charly Böck Latin Project. SO GUT WIE AUSVERKAUFT. NUR NOCH RESTKARTEN.</li>
      <li>Donnerstag 8.11. ab 20.30 Uhr &quot;Jazz in Ingolstädter Kneipen&quot;. DER TIPP FÜR RISING STARS. Danach ab 23 Uhr &quot;Welcome Party&quot; im Hotel &quot;Ambassador&quot;</li>
      <li>Freitag 9.11. 20 Uhr im Hotel &quot;Ambassador&quot;: Jazzparty I mit MACEO PARKER - TH MATER OF FUNK!!</li>
      <li>Samstag 10.11. 20 Uhr im Hotel &quot;Ambassador&quot;: Jazzparty II mit NILS LANDGREN UND BILL EVANS - SUPERSTARS DES JAZZ!!</li>
      <li>Sonntag 11.11. 19 Uhr Nigel Kennedy Quintett: DER KRÖNENDE ABSCHLUSS!!</li>
    </ul>
    <p>Die Woche danach?? AUSSCHLAFEN!!!</p>

    <p>Übrigens: Für die vom Verein organisierte Session am 5.11. gibt es erstmalig ein "Ingolstädter Sessionbook 2007", in dem sich 18 Jazzstandards notiert für jegliche Instrumente (auch Vocals) befinden. Wer fleißig an diesem Tag mitjammt, bekommt eins gratis geschenkt (inklusive CD mit allen Titeln drauf). Also kommen, auspacken, mitspielen!! INGOLSTADT BRAUCHT EUCH!!! (Übrigens auch der Verein, ähem...)</p>

    <p>Und: Vereinsmitglieder dürfen sich freuen: Im Frühjahr 2008 organisiert für Euch der Verein exklusiv ein kostenloses Bonuskonzert mit einem überregional bekannten Jazzstar. Näheres demnächst. Ach ja, die nächste Vereinssitzung mit interessanten Internas der Ingolstädter Jazzszene folgt aller Voraussicht nach im Januar 2008.</p>

    <p>Wir sehen uns bestimmt, oder?? Ich freu mich auf Euch!!!!</p>

    <div class="signum">Robert Aichner</div>


    <p>PS: FÜR DIE JAZZTAGE SCHNELL NOCH KARTEN IM VORVERKAUF SICHERN, DENN BEI DIESEN TOPACTS KANN DAS EINE ODER ANDERE KONZERT BALD AUSVERKAUFT SEIN!!</p>


    <p>PS 2: Gerne gebe ich folgende Infos eines tollen Jazzensembles weiter:</p>

    <blockquote style="color:red">
      <p>DA BOARISCHE (JAZZ)PLAN – Newsletter 10/07</p>

      <p>Liebe Fangemeinde!<br />
        Um Euch darüber auf dem Laufenden zu halten, wann und wo wir auftreten und wer von uns dreien gerade Liebeskummer hat, wird es von heute an in unregelmäßigen Abständen unseren Newsletter geben.</p>

      <p>SA, 20.10.2007 – KLEINES HAUS (THEATER INGOLSTADT)</p>

      <p>“Partyplus” zur Spielzeit- und Bareröffnung im Kleinen Haus mit einer 30-minütigen (Jazz)Plan-Show.</p>
      <ul>
        <li>ab 18 Uhr: Grillfest</li>
        <li>20-24: Livemusik, Performance und DJ</li>
        <li>EINRITT FREI!</li>
      </ul>

      <p>SA, 03.11.2007 – KLEINES HAUS (THEATER INGOLSTADT)</p>

      <p>“Kleine Hausmusik 8” mit unserem umjubelten, aktuellen Programm “für nix z’schad”</p>
      <ul>
        <li>Beginn 20 Uhr (Kasse ab 19:15 Uhr geöffnet)</li>
        <li>Eintritt 8, ermäßigt 5 Euro</li>
      </ul>

      <p>Vergesst nicht, Euch bereits Karten zu sichern! Unser letztes Konzert in der Neuen Welt war mit 120 Besuchern restlos ausverkauft und so Mancher musste nach Hause gehen.</p>


      <p>AUSFÜHRLICHE INFOS mit Bildern und Hörbeispielen:</p>

      <p><a href="http://www.jazzplan.de">www.jazzplan.de</a><br />
        <a href="http://www.myspace.com/jazzplan">www.myspace.com/jazzplan</a>
      </p>


      <p>Bis zum nächsten Konzert!</p>

      <p>Markus, Martin und Michael</p>
    </blockquote>

    <p>PS 3: Und unser Vereinsmitglied Nik schreibt:</p>

    <blockquote style="color:blue">
      <p>Hallo liebe Freunde der Musik,<br />
        ab D0. 25.10.07 startet unser Percussion Workshop &quot;Percussion Compact&quot; mit Sandra und es sind noch einige Plätze frei.<br />
        Unterrichtet wird 4 mal Donnerstags von 18:00 bis 20:00 Uhr im neuen Musikzentrum in der Donaustraße 14 über Swept Away in Ingolstadt. Danach wird Ihr wissen welches Percussioninstrument und welcher Stil Euch am meisten antörnt.<br />
        Die Instrumente werden gestellt!</p>

      <p>Anrufen, Platz reservieren und die Anmeldung am ersten Kurstag mitbringen. Tel.: (0841) 967379 Fax: 9939055</p>

      <p>Dann noch ein Konzerthinweis: Am Sa., 27.10.07 präsentieren music in &amp; MonoPhonic das &quot;Backto Summer&quot; Festival in IN/Ohrakel mit den Bands: Erntezeit (Hip Hop), Twenty Trees (Roots Reggae) und als Topact &quot;Jahcoustix&quot; der im Moment mit Gentleman auf Tournee ist und exklusiv für uns einen Stopp in IN einlegt. Der Reggae Grammy Gewinner präsentiert sein legendäres Soloprogramm und Insider bestätigen dass er gerade Solo eine unglaubliche Präsenz und Leidenschaft versprüht!
        Den Beweis dafür liefert er on stage, wo er vom Publikum begeistert gefeiert wird. Nicht versäumen!!</p>

      <p>Darüber hinaus werden wir die Halle sommerlich dekorieren und das coolste Sommeroutfit gewinnt eine Flasche Champagner!</p>

      <p>Karten gibt es im Donaukurier Office in der Mauthstraße, im Swept Away und bei music in für schlappe 12.-!!</p>


      <p>Keep on groovin</p>
      <pre>--

Mit den besten Wünschen

Nikolaj Rimsky-Korsakow


music in
Tränktorstraße 15
85049 Ingolstadt

<a href="http://www.music-in.de">www.music-in.de</a></pre>
    </blockquote>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 3: Your my heart, your my soul, lalalala.... (24. September 2007)")) {
  function content()
  {
  ?>
    <h1>Your my heart, your my soul, lalalala....</h1>

    <p>Hallo Jazzfreunde,<br />
      Wer kennt denn noch den Hit von Modern Talking &quot;Your my heart, your my soul, lalalala....&quot;?? Ok, ok, Dieter Bohlen ist nicht jedermanns Geschmack!<br />
      Aber vielleicht habt Ihr ja Lust auf das</p>

    <p class="emboss">&quot;With Heart and Soul Festival&quot; am 12.10.2007 um 20 Uhr im Paradox Ingolstadt (Krumenauer Str. 42, gegenüber Klinikum)</p>

    <p>Und warum dort hingehen?? Es treten da auf:</p>
    <ul>
      <li>J-unk</li>
      <li>Soulde out</li>
      <li>Young Jazz Players</li>
      <li>Club Légère</li>
    </ul>

    <p>Da werden doch Erinnerungen an das Bürgerfest und das Swing- und Dixie-Festival im verflossenen Sommer wach!! Gebt also auch im Herbst der Jazzjugend ihre Chance (Karten VVK im DK oder bei den Bands zu 5,50 ermäßigt 4,- oder AK 7,50 / 6,-), bevor die Großen Stars bei den Jazztagen auftreten.</p>

    <p>Your my heart, and my soul, oder so ...</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 2: Vorteile der Vereinsmitgliedschaft (6. September 2007)")) {
  function content()
  {
  ?>
    <h1>Vorteile der Vereinsmitgliedschaft</h1>

    <p>Liebe Jazzfreunde,<br />
      Ich hab gerade eben mal die Beitrittserklärung der Jazzfreunde durchgeschaut und festgestellt, das wir da Vorteile anbieten, die wir noch gar nicht realisiert haben, bzw. noch realisieren können. Um bei unseren Neuwerbungen glaubhaft bleiben zu können, habe ich mir bei den einzelnen Punkten folgendes gedacht:</p>

    <h5>1. Homepage</h5>

    <p>Gibt’s noch nicht, deshalb der Vorschlag, ein Rundmail raus zu lassen, das bei unseren Mitgliedern nach einem fähigen Mann sucht, der das am Besten kostenlos macht. Bei negativer Rückmeldung könnte man versuchen, einen fähigen Schüler zu finden.</p>

    <h5>2. Ermäßigung zu den Eintritten bei den Jazztagen</h5>

    <p>Wie kommen die Vereinsmitglieder an die verbilligten Karten ran? Mit dem Mitgliedsausweis in die Vorverkaufsstelle? Wir könnten da für Klarheit schaffen.</p>

    <h5>3. VIP-Empfang für Mitglieder / “Meet and Greet”</h5>

    <p>Gabs das im letzten Jahr schon? Wenn nein, wie können wir das machen? Hat Jan da einen Vorschlag?</p>

    <h5>4. Bonuskonzert der Jazzfreunde Ingolstadt</h5>

    <p>Was ist damit gemeint? Ist das im Rahmen der Jazztage? Gibt’s da ein Konzert für die Mitglieder frei, oder sollten wir da ein anderes Konzert planen?</p>

    <p>Vielleicht können wir die Punkte 2-4 noch vor Oktober klären??</p>

    <p>LG</p>

    <div class="signum">Robert</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else if ($_GET[PAGE] == addpoint(PAGE, "Newsletter Nr. 1: Jazzfreunde nach der Sommerpause (5. September 2007)")) {
  function content()
  {
  ?>
    <h1>Jazzfreunde nach der Sommerpause</h1>

    <p>Liebe Jazzfreunde,<br />
      Ist der Sommer nun vorbei? Er kommt wieder, wenn man dem Wetterbericht glauben schenken mag, zur Veranstaltung der Jazzfreunde am:</p>

    <h5>Open Flair am 8. September (Samstag) ab 15 Uhr im Klangraumzelt</h5>

    <p>Dort präsentiert Nik vom Shop music-in im Klangraumzelt sommerlichen Jazz (<a href="http://www.openflair-klenzepark.de">http://www.openflair-klenzepark.de</a>)</p>

    <ul class="nolist">
      <li>15 Uhr Simon Seidl Trio mit anschließender Jamsession</li>
      <li>18 Uhr Voice Connection, eine Wahnsinns-A-Cappella Truppe aus EI und IN</li>
      <li>20 Uhr Ras Dashan meets Jazz</li>
    </ul>

    <p>Also gute Laune, scharfe Ohren und coole Instrumente für die Session einpacken, bei der übrigens erstmals eine Menge Real Books zum Jammen bereit liegen, gesponsert vom Verein! (He, der Verein tut was!!). Simons Trio kann so gut wie alle Jazztitel begleiten, falls sie in dieser Jazzstandardsammlung (wir haben die Ausgaben “Real Book I-III” für C, Bb, Eb, Bass und Vocals) zu finden sind. Es liegen Titellisten mit Seitenangaben aus, so dass Ihr Eure Songs auch aufspüren könnt.
      Die Session ist ideal zum Warmspielen für den</p>

    <h5>Mega-Jam bei den Jazztagen am 5. November (Montag) um 19.30 Uhr im Diagonal</h5>

    <p>
      Dank dem Veranstalter der Jazztage, Jan Rottau (Danke Jan!! Übrigens auch Vereinsmitglied), findet erstmals während der Jazztage eine lokale Session statt, bei der junge Jazzmusiker aus der Region zusammen auf der Bühne stehen werden. Erstmalig kommt hier auch das vom Verein initiierte Sessionbook zum Einsatz, das ausgewählte, für junge Musiker machbare Standards wieder für C, Bb, Eb, Bass und Vocals enthält. Wer macht denn mit bei der wichtigsten Session der vergangenen Monate? Bitte mir melden, denn dann bekommt Ihr das Sessionbook zum schon mal Üben von mir zugeschustert. Ne kleine Überraschung ist auch dabei!! Also bir mir bald per Mail melden. Übergabe der heißen Ware erfolgt im Reuchlin-Gymnasium bzw. in der Umgebung!</p>

    <p>Und da ich schon mitten drin bin bei den Jazztagen, sollte Ihr nicht vergessen den Top-Hit im Kalender eines Jazzers zu vermerken, die</p>

    <h5>Ingolstädter Jazztage vom 18. Oktober bis 7. November 2007</h5>

    <p>Ich kenn schon einige Details (Vereinsmitglieder wissen mehr!) und es sind diesmal tolle jazzige Acts dabei. Einige darf ich schon verraten: Roger Cicero kommt am Sonntag 4. November um 19 Uhr im Audi Forum Ingolstadt. Dann das Preisträgerkonzert am Sonntag 21. Oktober um 18 Uhr im Diagonal, bei dem Simon Seidl (GLÜCKWUNSCH!!) den Jazzförderpreis überreicht bekommt. Wenig später, am 6. November, ist Simon mit seiner preisgekrönten Formation “Blindflug” in der Neuen Welt (20.30 Uhr) zu hören.</p>

    <p>Aktuelle Infos bei <a href="http://www.ingolstadt.de/jazztage/documents/programm_de.htm">http://www.ingolstadt.de/jazztage/documents/programm_de.htm</a></p>

    <p>Und wie kommt man da an Karten?? Ja, jetzt müsste man halt Mitglied im Verein sein, denn da bekommt man Ermäßigung auf die Karten, denn man spart sich stets die Vorverkaufsgebühr!! Wollt Ihr Mitglied werden, so sende ich Euch gerne die Beitrittserklärung per Mail zu! Aber nun zu den Details des offiziellen Kartenvorverkaufs:</p>
    <blockquote style="color:blue">
      <p>Offizieller Kartenvorverkaufsbeginn: Samstag, 15.09.2007
        <br />
        <br />Exklusiv-Kartenvorverkauf für Roger Cicero (Sonntag, 04.11.2007, 19.00 Uhr) am Freitag, 14.09.2007 im Audi Forum Ingolstadt (max. 4 Karten pro Person)
        <br />
        <br />
        <br />Vorverkaufsstellen:
        <br />
        <br />DONAUKURIER-Office
        <br />Mauthstr. 9, 85049 Ingolstadt
        <br />Tel. 0180 3000013 (0,09 €/Min. aus dem deutschen Festnetz)
        <br />
        <br />Theater Ingolstadt
        <br />Schloßlände 1, 85049 Ingolstadt
        <br />Tel. 0841 9813200
        <br />
        <br />Kulturamt Ingolstadt
        <br />Anja Schipper
        <br />Auf der Schanz 39, 85049 Ingolstadt
        <br />Tel. 0841 305-1811
        <br />Fax 0841 305-1805
        <br />kulturamt(ä)ingolstadt.de
      </p>
    </blockquote>

    <p>Zuletzt noch Werbung für eine bereits oben erwähnte Jazzformation, denn über diesen Mailrundbrief könnt Ihr auch Eure Jazzkonzerte bewerben lassen, denn die Szene soll, darf, muss wachsen (Let it grow!!)<br />
      Mich erreichte folgende Mail von Andreas Kern:</p>

    <blockquote style="color:green">
      <p>Hallo zusammen,<br />
        bald ist die Sommerpause vorbei, und dann wird es für uns Zeit wieder auf die Bühne zu gehen.<br />
        Wir sind das nächste Mal am Samstag, den 08. September, um 18:00 Uhr im "Klangraum" auf dem Open Flair Festival in Ingolstadt zu hören.<br />
        <a href="http://www.openflair-klenzepark.de">http://www.openflair-klenzepark.de</a>
      </p>

      <p>Danach gibt es dieses Jahr noch einen Auftritt bei P.A. Kunst + Kneipe im Gewölbe in Neuburg, und zwar am Freitag, den 26. Oktober um 20:30 Uhr. Wir wiederholen das restlos ausverkaufte Event vom April, wo wir gemeinsam mit JazzArt aus Neuburg einen Abend gestaltet haben.<br />
        <a href="http://www.pa-gewoelbe.de">http://www.pa-gewoelbe.de</a>
      </p>

      <p>Auf Euer komme freut sich<br />
        The Voice Connection<br />
        <a href="http://www.the-voice-connection.de">http://www.the-voice-connection.de</a>
      </p>
    </blockquote>

    <p>So, ich denke das wars nach langer Sommerpause. Und wie immer:<br />
      Let it grow, let it flow, it’s your show!</p>

    <div class="signum">Robert Aichner</div>

    <div class="backlink"><a href="<?php echo (PAGE . PAGE_ENDING) ?>">Zurück</a></div>

  <?php
  }
} else // if (!$_GET[PAGE])
{

  function content()
  {
  ?>
    <h1>Newsletter der Jazzfreunde Ingolstadt</h1>
    <p>Immer über das Neuste informiert sein über Jazz in und um Ingolstadt? Kein Problem! Der Newsletter der Jazzfreunde Ingolstadt informiert mindestens einmal im Monat über Aktuelles im Verein, über Aktionen und Projekte, über Jazzkonzerte und sonstige Vorkommnisse in der Jazzwelt der Region. Einfach in das Formular unten die eigene Mail-Adresse eintragen; auch und gerade für Nicht-Mitglieder ist dies eine hervorragende Möglichkeit, in die Welt der Jazzfreunde hineinzuschnuppern! Der Newsletter ist natürlich jederzeit ohne Angabe von Gründen kündbar. Dazu einfach eine Mail an den Newsletter-Absender zurückschreiben.</p>
    <form action="<?php echo (PAGE . PAGE_ENDING) ?>" method="post">
      <div id="newsletterform">
        <p class="center"><label for="mehl">Ihre Mail-Adresse: </label><input type="text" name="newsletter_mehlabo" id="mehl" value="" /></p>
        <p class="center"><label for="name">Ihr Name (optional): </label><input type="text" name="newsletter_nameabo" id="name" value="" /></p>
        <p class="center"><input type="submit" name="order" value="Newsletter abonnieren" /></p>
      </div>
    </form>

<?php
    write_tickerlines();

    //toc();
  }
}

?>