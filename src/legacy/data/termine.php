<?php
if (!defined("PAGE"))
{
  header("location:../termine.php");
  die();
}

// Veranstaltungsorte
define("_DIAGONAL_", "<a href=\"https://de-de.facebook.com/diagonal.IN/\" title=\"diagonal auf Facebook\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Diagonal</a>");
define("_AUDI_FORUM_", "<a href=\"https://www.audi.de/de/foren/de/audi-forum-ingolstadt/veranstaltungen/jazz-im-audi-forum-ingolstadt.html\" title=\"Jazz im Audi Forum Ingolstadt\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Audi Forum Ingolstadt</a>");
define("_HALLE_NEUN_", "<a href=\"http://www.neun-ingolstadt.de/\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Kulturzentrum neun in Ingolstadt</a>");
define("_SEEHAUS_", "<a href=\"http://seehaus-ingolstadt.de/\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Seehaus Ingolstadt</a>");
define("_NH_HOTEL_", "<a href=\"https://www.nh-hotels.de/hotels/ingolstadt\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">nh Hotel Ingolstadt</a>");
define("_WERKSTATTBUEHNE_", "<a href=\"https://theater.ingolstadt.de/\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Werkstattbühne</a>");
define("_FOYER_STADTTHEATER_", "<a href=\"https://theater.ingolstadt.de/\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Foyer Stadttheater Ingolstadt</a>");
define("_NEUE_WELT_", "<a href=\"https://www.neuewelt-ingolstadt.de/\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Neue Welt</a>");
define("_ST_PIUS_", "Kirche St. Pius");
define("_ST_MATTHAEUS_", "Kirche St. Matthäus");
define("_JAZZ_IN_DEN_KNEIPEN_", "Diagonal, Mo, Neue Welt, Swept Away, Altstadttheater");
define("_FESTSAAL_", "<a href=\"https://theater.ingolstadt.de/\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Festsaal Stadttheater Ingolstadt</a>");
define("_GNADENTHAL_REUCHLIN_", "Gnadenthal- und Reuchlin- Gymnasium");
define("_BRIGK_", "<a href=\"https://www.brigk.digital/\" title=\"Zur Homepage\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">brigk</a>");
define("_AUDI_PIAZZETTA_", "<a href=\"https://www.audi.com/foren/de/audi-forum-ingolstadt/veranstaltungen/jazz-im-audi-forum-ingolstadt.html/\" title=\"Jazz im Audi Forum Ingolstadt\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Audi Piazzetta Ingolstadt</a>");
define("_SCHUTTER_", "<a href=\"https://de-de.facebook.com/Schutter8/\" title=\"Schutter auf Facebook\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Schutter</a>");
define("_KLENZEPARK_", "Klenze Park");
define("_REDUIT_TILLY_", "Reduit Tilly");
define("_HARDERBASTEI_", "<a href=\"https://ingolstadt.de/Kultur/Kunst-Kultur/Galerie-Harderbastei\" title=\"Zur Seite der Stadt Ingolstadt\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">Harderbastei</a>");



setVA("17.02.2005", "ganztags", "Gründung des Vereins durch Initiative von Herrn Oberbürgermeister Dr. Alfred Lehmann und Kulturreferenten Herrn Gabriel Engert", "Ingolstadt");
setVA("01.03.2005", "ganztags", "Bildung des Musikbeirates zum Vorschlag des jährlichen Jazz-Förderpreisträgers der Stadt Ingolstadt", "Ingolstadt");
setVA("16.01.2006", "18:00", "1. Session der Young Jazz Players", "Diagonal", null, null, "jazztage");
setVA("24.06.2006", "ganztags", "1. Summer Jazz Open Air", "Hotel Rappensberger", "YJP_240606", null, "jazztage");
setVA("12.11.2006", "18:00", "2. Session der Young Jazz Players", "Diagonal", "YJP_121106", null, "jazztage");
setVA("11.02.2007", "14:00", "Jazz-Workshops / 3. Session der Young Jazz Players", "Diagonal", "YJP_110207", null, "jazztage");
setVA("15.04.2007", "18:00", "4. Session der Young Jazz Players", "Café an der Hohen Schule", "YJP_150407", null, "jazztage");
setVA("16.06.2007", "ganztags", "Mitproduktion des Musikprogramms des Dixie- und Swing-Festivals", "Ingolstädter Innenstadt", "YJP_160607");
setVA("13.07.2007 - 14.07.2007", "ganztags", "2. Summer Jazz Open Air<br />(im Rahmen des Bürgerfests)<br />mit 5. Session der Young Jazz Players", "Hotel Rappensberger", null, null, "jazztage");
setVA("08.09.2007", "nachmittags", "6. Session der Young Jazz Players", "Open Flair");
setVA("05.11.2007", "19:30", "7. Session der Young Jazz Players<br />(im Rahmen der 24. Ingolstädter Jazztage)", "Diagonal", "YJP_051107", null, "jazztage");

setVA("27.01.2008", "19:00", "1. Jam Session", "Swept Away", null, null, "session");
setVA("30.03.2008", "19:00", "2. Jam Session", "Diagonal", "JS_300308", null, "session");
setVA("22.04.2008", "20:00", "Wolfgang Haffner Trio (Bonuskonzert)", "Diagonal");
setVA("27.04.2008", "19:00", "3. Jam Session", "Swept Away", null, null, "session");
setVA("25.05.2008", "14:00 - 18:00", "Jazzworkshops für Schüler + Studenten", "Diagonal" , "Workshop08");
setVA("25.05.2008", "19:00", "8. Session der Young Jazz Players", "Diagonal", null, null, "jazztage");
setVA("25.05.2008", "22:00", "Steps of Spirit", "Donauzelt / Theatertage");
setVA("26.05.2008", "22:00", "Mallet &amp; Friends", "Donauzelt / Theatertage");
setVA("30.05.2008", "20:30", "Charly Böck Latin Projekt", "Birdland Neuburg");
setVA("01.06.2008", "21:00", "Da boarische (Jazz);Plan", "Donauzelt / Theatertage");
setVA("02.06.2008", "21:00", "Mallet &amp; Friends", "Donauzelt / Theatertage");
setVA("08.06.2008", "17:00", "Nu Glass", "Donauzelt / Theatertage");
setVA("28.06.2008", "11:00 - 23:00", "Dixie- und Swing-Festival", "Ingolstädter Innenstadt", "DixieSwing2008");
setVA("10.07.2008", "18:30", "David Sanchez Group /<br />Ron Carter Quintet", "Neuburger Residenzschloss");
setVA("11.07.2008", "18:30", "Curtis Stigers &amp; Band /<br />Till Brönner", "Neuburger Residenzschloss");
setVA("12.07.2008", "18:30", "Häns&apos;che Weiss Ensemble /<br />Paul Kuhn &amp; All Stars", "Neuburger Residenzschloss");
setVA("13.07.2008", "10:30", "Birdland Jazz Band", "Neuburger Residenzschloss");
setVA("20.07.2008", "20:00", "Open Air mit The Voice Connection", "Burg Nassenfels");
setVA("25.07.2008", "18:30", "3. Summer Jazz Open Air", "Hotel Rappensberger", "Summerjazz08Fr");
setVA("26.07.2008", "14:00", "3. Summer Jazz Open Air", "Hotel Rappensberger", "Summerjazz08Sa");
setVA("02.08.2008", "15:00", "Grillfest des Jazzfreunde-Vereins", "Roter Gries: Niks Garten");
setVA("10.09.2008 - 14.09.2008", "ganztags", "Blechbläser-Workshop mit Burba und Stötter", "Eichstätt");
setVA("28.09.2008", "19:00", "4. Jam Session", "Swept Away", "Jamsession4_2008", null, "session");
setVA("03.10.2008", "20:30", "Close to Jazz", "Ohrakel");
setVA("08.10.2008", "20:00", "Emil &amp; Eduard", "Diagonal");
setVA("11.10.2008", "20:00", "The Voice Connection", "Pfarrsaal Kösching");
setVA("14.10.2008", "20:00", "Malene Mortensen Group", "Diagonal");
setVA("19.10.2008", "18:00", "Preisträgerkonzert: Christina Jung mit \"Jungblut\"", "Diagonal", null, null, "jazztage"); // Jazztage 2008
setVA("26.10.2008", "20:00", "Gospel &amp; Soul Night - Thilo Wolf &amp; Joan Faulkner", "St. Augustin", null, null, "jazztage"); // Jazztage 2008
setVA("30.10.2008", "20:00", "Kolsimcha", "Festsaal Ingolstadt", null, null, "jazztage"); // Jazztage 2008
setVA("30.10.2008", "&nbsp;", "Jazz für Schulen: Workshops", "Gnadenthal- und Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2008
setVA("31.10.2008", "&nbsp;", "Jazz für Schulen: Workshops", "Gnadenthal- und Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2008
setVA("31.10.2008", "20:00", "Holly Cole sing Tom Waits", "Fronte 79", null, null, "jazztage"); // Jazztage 2008
setVA("02.11.2008", "11:00", "Jazz Brunch", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2008
setVA("03.11.2008", "19:30", "9. Session der Young Jazz Players", "Diagonal", "YJP_031108", null, "jazztage"); // Jazztage 2008
setVA("04.11.2008", "20:30", "Die Klangpatrouille", "Neue Welt", null, null, "jazztage"); // Jazztage 2008
setVA("05.11.2008", "20:30", "Jazz Award Project", "Diagonal", null, null, "jazztage"); // Jazztage 2008
setVA("06.11.2008", "20:30", "Caecilie Norby Band", "Diagonal: Jazz in den Kneipen", null, null, "jazztage"); // Jazztage 2008
setVA("06.11.2008", "abends", "Jazz in den Kneipen", "&nbsp;", null, null, "jazztage"); // Jazztage 2008
setVA("06.11.2008", "22:00", "Jazzkantine", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2008
setVA("07.11.2008", "19:30", "Chick Corea &amp; John McLaughlin", "Festsaal Ingolstadt", null, null, "jazztage"); // Jazztage 2008
setVA("07.11.2008", "22:00", "Jazz Party I: Brand New Heavies", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2008
setVA("08.11.2008", "20:00", "Jazz Party II: Herbie Hancock Quintet", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2008
setVA("09.11.2008", "11:00", "Jazzgottesdienst", "Kirche St. Matthäus, Schrannenstr. 7", null, null, "jazztage"); // Jazztage 2008
setVA("09.11.2008", "19:30", "Gala-Night: Randy Newman <span class=\"red\">entfällt!</span>", "<span class=\"red stroke\">Festsaal Ingolstadt</span>", null, null, "jazztage"); // Jazztage 2008
setVA("18.11.2008", "20:00", "Electric Outlet", "Diagonal");
setVA("26.11.2008", "20:00", "Jasper van't Hof &amp; Bob Malach <span class=\"red\">entfällt!</span>", "<span class=\"red stroke\">Diagonal</span>");
setVA("28.11.2008", "20:00", "Souled Out und 5vor8", "Diagonal");
setVA("10.12.2008", "20:00", "Erika Stucky \"Bubbles &amp; Bangs\"", "Diagonal");
setVA("14.12.2008", "19:00", "5. Jam Session", "Diagonal", "Xmas08", null, "session");
setVA("23.12.2008", "20:30", "Albert C. Humphrey &amp; Band \"Blue Christmas\"", "Neue Welt");

setVA("14.01.2009", "20:00", "Joo Kraus \"Sueno\" - <b>Bonuskonzert</b>", "Diagonal", "JooKrausProject");
setVA("25.01.2009", "20:00", "Hans Stückle Blues Band", "Diagonal");
setVA("01.02.2009", "20:00", "Charly Leimer \"Steps of Spirit\"", "Diagonal");
setVA("08.02.2009", "19:00", "6. Jam Session", "Swept Away", "JS_20090208", null, "session");
setVA("13.02.2009", "19:30", "Duo Trögl-Hasenkopf: Diavortrag Kanada", "Kolpinghaus");
setVA("15.02.2009", "20:00", "Nick Flade &amp; Groovebox", "Diagonal");
setVA("26.02.2009", "18:30", "Duo Trögl-Hasenkopf: After Work Party", "Audi Forum");
setVA("11.03.2009", "20:00", "Leni Stern \"Afrika\"", "Diagonal");
setVA("12.03.2009", "20:00", "Ron Carter Quartett", "Audi Forum");
setVA("12.03.2009", "20:30", "Zimt", "Cafe Tagtraum");
setVA("13.03.2009", "20:00", "The Voice Connection", "Theater Preith");
setVA("14.03.2009", "20:00", "The Voice Connection", "Theater Preith");
setVA("21.03.2009", "09:00", "Workshop Soloimprovisation mit Prof. Zoller", "Fronte 79", "BBN1_Workshop");
setVA("21.03.2009", "19:00", "1. Big Band Nacht der Ingolstädter Schulen", "Fronte 79", "BBN1_Auftritte");
setVA("25.03.2009", "20:00", "Luis di Matteo", "Diagonal");
setVA("31.03.2009", "20:00", "Scott Henderson Trio", "Diagonal");
setVA("26.04.2009", "20:00", "Etna", "Diagonal");
setVA("26.04.2009", "19:00", "10. Young Jazz Players Session", "Birdland Neuburg", "Birdland_20090426", null, "jazztage");
setVA("13.05.2009", "20:00", "Bill Evans Group <span class=\"red\">entfällt!</span>", "<span class=\"red stroke\">Diagonal</span>");
setVA("20.05.2009", "20:00", "Abbamobil", "Diagonal");
setVA("24.05.2009", "19:00", "7. Jam Session", "Diagonal", "JS_20090524", null, "session");
setVA("26.06.2009", "19:30", "Rudi Trögl Trio", "Atelier des Künstlers Viktor Kraus / Kinding");
setVA("10.07.2009 - 12.07.2009", "&nbsp;", "Bürgerfest mit 4. Summer Jazz Open Air", "Hotel Rappensberger", "Sommerjazz2009");
setVA("10.07.2009 - 12.07.2009", "&nbsp;", "Open-Air-Jazzfestival des Jazzclubs \"Birdland\"<br /><small class=\"red\">entfällt!</small>", "<span class=\"red stroke\">Schlosshof Neuburg</span>");
setVA("01.09.2009", "20:30", "Da Boarische Jazzplan", "Musikszene: Neue Welt");
setVA("03.09.2009", "19:00", "Pit Müllers' Hot Stuff", "Hotel Rappensberger");
setVA("05.09.2009", "15:00", "So What", "Ingolstadt Open Flair / Klangraumzelt");
setVA("05.09.2009", "20:00", "3 of a kind beim Poetry Slam", "Ingolstadt Open Flair / Literaturzelt");
setVA("05.09.2009", "21:00", "Ras Dashan meets Jazz", "Ingolstadt Open Flair / Klangraumzelt");
setVA("06.09.2009", "11:00", "4 of a kind Jazzfrühschoppen", "Ingolstadt Open Flair");
setVA("06.09.2009", "18:00", "Rudi Trögl - Rainer Hasenkopf Duo", "Ingolstadt Open Flair / Klangraumzelt");
setVA("07.09.2009", "20:30", "Klangpatrouille", "Musikszene: Neue Welt");
setVA("08.09.2009", "20:30", "Trialogo und Emil &amp; Eduard", "Musikszene: Neue Welt");
setVA("14.09.2009", "20:30", "Claudius &amp; Band feat. Nick Flade", "Musikszene: Neue Welt");
setVA("15.09.2009", "20:30", "Jack Skupin Trio inkl. Gary Todd &amp; Eduard Israelov", "Musikszene: Neue Welt");
setVA("23.09.2009", "20:00", "Simon Seidl &amp; 4sinn", "Diagonal");
setVA("27.09.2009", "19:00", "8. Jam Session", "Swept Away", "JS_20090927", null, "session");
setVA("28.09.2009", "20:30", "C.B.Green &amp; Band feat. Martin Kälberer: CD-Präsentation \"Third\"", "Neue Welt");
setVA("30.09.2009", "20:00", "Erika Stucky &amp; Sina", "Diagonal");
setVA("08.10.2009", "20:30", "Joscho Stephan Trio (D): \"Django Forever\"", "Neue Welt");
setVA("10.10.2009", "20:00", "Rudi Trögl Trio", "Gutmann / Eichstätt");
setVA("13.10.2009", "20:30", "Ulita Knaus &amp; Band", "Diagonal");
setVA("18.10.2009", "18:00", "Jazzförderpreisträger 2009 Bernhard Hollinger &amp; Band", "Diagonal", "Hollinger_20091018", null, "jazztage"); // Jazztage 2009
setVA("25.10.2009", "11:00", "Jazz Brunch mit C'est si bon", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2009
setVA("25.10.2009", "16:00", "\"Jazz for Kids\" mit \"Hoppel Hoppel Rhythm Club\"", "Fronte 79", "Jazz4Kids09", null, "jazztage"); // Jazztage 2009
setVA("01.11.2009", "11:00", "Highlight: Christian Wallumrød Ensemble", "Kirche St. Augustin", "jazztage09/wallumrod", null, "jazztage"); // Jazztage 2009
setVA("02.11.2009", "19:30", "11. Young Jazz Players Session", "Diagonal", "jazztage09/yjp", null, "jazztage"); // Jazztage 2009
setVA("03.11.2009", "20:30", "Regionale Szene: 4 of a kind  feat. Kerstin Schulz", "Neue Welt", null, null, "jazztage"); // Jazztage 2009
setVA("04.11.2009", "20:30", "Regionale Szene: Jungblut  feat. Christina Jung", "Diagonal", "jazztage09/jungblut", null, "jazztage"); // Jazztage 2009
setVA("05.11.2009", "20:30", "Jazz in den Kneipen", "div. Veranstaltungsorte", "jazztage09/kneipen", null, "jazztage"); // Jazztage 2009
setVA("05.11.2009", "22:00", "Marie Boine", "Altstadttheater", null, null, "jazztage"); // Jazztage 2009
setVA("05.11.2009", "22:00", "Welcome Party mit Late Night Musicians", "Hotel Ambassador", null, null, "jazztage"); // Jazztage 2009
setVA("06.11.2009", "19:30", "Top Act: Chick Corea &amp; Stanley Clarke &amp; Lenny White", "Festsaal", "jazztage09/corea_clarke_white", null, "jazztage"); // Jazztage 2009
setVA("06.11.2009", "22:00", "Jazz Party I u.&nbsp;a. mit Nils Petter Molvaer, P-S-P", "Hotel Ambassador", "jazztage09/jazzparty1", null, "jazztage"); // Jazztage 2009
setVA("07.11.2009", "20:00", "Jazz Party II u.&nbsp;a. mit Tower of Power, Curtis Stigers", "Hotel Ambassador", "jazztage09/jazzparty2", null, "jazztage"); // Jazztage 2009
setVA("08.11.2009", "11:00", "Jazz Brunch mit der Birdland Jazz Band", "Hotel Ambassador", null, null, "jazztage"); // Jazztage 2009
setVA("08.11.2009", "11:00", "Jazzgottesdienst mit Gerhard Schmidt &amp; Tom Diwock", "St. Matthäus", null, null, "jazztage"); // Jazztage 2009
setVA("08.11.2009", "20:00", "Highlight: Zap Mama", "Diagonal", "jazztage09/zap_mama", null, "jazztage"); // Jazztage 2009
setVA("21.11.2009", "20:00", "The Voice Connection", "Backhaus Gaimersheim");
setVA("22.11.2009", "20:00", "The Voice Connection", "Gutmann / Eichstätt");
setVA("26.11.2009", "20:00", "Ignacio Berroa Quartet feat. David Sánchez", "Diagonal");
setVA("06.12.2009", "-&nbsp;?&nbsp;-", "4 of a kind \"A jazzy Christmas\"", "Kunstscheune Marienheim bei Neuburg");
setVA("14.12.2009", "20:30", "Häns'che Weiss &amp; Vali Meyer - Der König des \"Zigeunerjazz\"", "Neue Welt");
setVA("16.12.2009", "20:00", "Charly Böck Latin Project", "Diagonal");
setVA("20.12.2009", "19:30", "9. Jam Session (Weihnachtssession)", "Diagonal", "Xmas09", null, "session");

setVA("22.01.2010", "19:30", "Duo Trögl-Hasenkopf: Diavortrag Rocky Mountains", "Kolpingsaal");
setVA("23.01.2010", "21:00", "Claudius Ress Quartett", "Kleines Haus am Brückenkopf");
setVA("31.01.2010", "19:00", "10. Jam Session", "Swept Away", null, null, "session");
setVA("04.02.2010", "20:00", "Jahreshauptversammlung", "Hotel Rappensberger");
setVA("05.02.2010", "21:00", "ETNA", "Kleines Haus am Brückenkopf");
setVA("11.02.2010", "20:00", "The Pee Wee Ellis Assembly", "Audi Forum Ingolstadt");
setVA("28.02.2010", "19:00", "11. Jam Session", "Diagonal", "JS_20100228", null, "session");
setVA("07.03.2010", "20:00", "Christian Krischkowsky Quintett", "Diagonal", "", "http://www.youtube.com/watch?v=JB-VCId3-Fs");
setVA("18.03.2010", "20:00", "Moscow Art Trio - <b>Bonuskonzert</b>", "Diagonal", "", "http://www.youtube.com/watch?v=e4qjCpidJsM");
setVA("14.04.2010", "20:00", "Bill Evans Soulgrass", "Diagonal", "", "http://www.youtube.com/watch?v=BU-x0cXQcyU");
setVA("25.04.2010", "19:00", "12. Young Jazz Players Session", "Birdland Neuburg", "YJP_250410", null, "jazztage");
setVA("11.05.2010", "20:00", "George Duke Band", "Diagonal", "", "http://www.youtube.com/watch?v=e1H3wIqpYGU");
setVA("08.06.2010", "20:00", "Hazmat Modine", "Diagonal", "", "http://www.youtube.com/watch?v=mFFcGqY4ti8");
setVA("12.06.2010", "20:00", "Club Légère CD-Release Konzert mit anschließender Discoparty", "Diagonal");
setVA("19.06.2010", "20:00", "Rudi Trögl Trio", "Kulturwerkhalle in Rohrbach");
setVA("20.06.2010", "19:00", "12. Jam Session", "Diagonal", null, null, "session");
setVA("02.07.2010 - 04.07.2010", "&nbsp;", "Big Band Workshop mit Harald Rüschenbaum", "Reuchlin-Gymnasium", "summerjazz2010/workshop");
setVA("03.07.2010", "18:30", "Bernhard Hollinger Group beim 5. Summer Jazz Open Air", "Innenhof Hotel Rappensberger", "summerjazz2010/hollinger");
setVA("03.07.2010", "20:30", "Abba Mobil beim 5. Summer Jazz Open Air", "Innenhof Hotel Rappensberger", "summerjazz2010/abbamobil");
setVA("04.07.2010", "10:30", "5. Summer Jazz Open Air mit Big Band Matinee", "Innenhof Hotel Rappensberger", "summerjazz2010/bigbands");
setVA("08.07.2010", "19:00", "Rudi Trögl - Rainer Hasenkopf Duo: Eröffnung der 1. Ingolstädter Kunstmesse", "Exerzierhalle");
setVA("25.07.2010", "19:00", "13. Jam Session", "Diagonal", null, null, "session");
setVA("06.09.2010", "20:30", "Close to Jazz", "Neue Welt, Musikszene");
setVA("07.09.2010", "20:30", "Noah Gold &amp; Band", "Neue Welt, Musikszene");
setVA("09.09.2010", "20:30", "Klangpatrouille", "Neue Welt, Musikszene");
setVA("12.09.2010", "19:00", "14. Jam Session", "Diagonal", null, null, "session");
setVA("24.09.2010", "20:30", "The Jazz Five &amp; Just Friends", "Ohrakel, Musikszene");
setVA("26.09.2010", "20:00", "morgenRoth", "<span class=\"red\">Diagonal</span>");
setVA("13.10.2010", "20:00", "Grace Kelly Quintet", "Diagonal"); // Jazztage 2010
setVA("17.10.2010", "18:00", "Tim Allhoff: Eröffnung der 27. Ingolstädter Jazztage", "Diagonal", "jazztage10/tim_allhoff", null, "jazztage"); // Jazztage 2010
setVA("20.10.2010", "20:00", "Michael Landau Group", "Diagonal", null, null, "jazztage"); // Jazztage 2010
setVA("24.10.2010", "16:00", "Jazz for Kids: Martin Johnson &amp; Band feat. Ruth Sabadino", "Fronte 79", null, null, "jazztage"); // Jazztage 2010
setVA("25.10.2010", "19:30", "13. Session der Young Jazz Players", "Diagonal", "jazztage10/YJP", null, "jazztage"); // Jazztage 2010
setVA("28.10.2010", "08:00", "Jazz für Schulen: Workshops mit \"String Thing\"", "Gnadenthal-Gymnasium", null, null, "jazztage"); // Jazztage 2010
setVA("29.10.2010", "08:00", "Jazz für Schulen: Workshops mit \"String Thing\"", "Gnadenthal-Gymnasium", null, null, "jazztage"); // Jazztage 2010
setVA("30.10.2010", "20:00", "1. Highlight-Konzert: Paolo Conte", "Audi-Forum Kundencenter", "jazztage10/paolo_conte", null, "jazztage"); // Jazztage 2010
setVA("31.10.2010", "20:00", "Highlight in der Kirche: New York Voices", "St. Augustin", "jazztage10/new_york_voices", null, "jazztage"); // Jazztage 2010
setVA("02.11.2010", "20:30", "Ingolstädter Szene: San2 &amp; his Soul Patrol", "Neue Welt", null, null, "jazztage"); // Jazztage 2010
setVA("03.11.2010", "20:30", "Ingolstädter Szene: Bernhard Hollinger Group", "Diagonal", "jazztage10/hollinger", null, "jazztage"); // Jazztage 2010
setVA("04.11.2010", "20:30", "Jazz in den Kneipen<br /><small>u.&nbsp;a. mit Victor Bailey &amp; David Gilmore</small>", "&nbsp;", "jazztage10/kneipen", null, "jazztage"); // Jazztage 2010
setVA("04.11.2010", "22:00", "Jazz im Theater: Clueso &amp; Bernewitz Trio feat. Paul Brody<br /><small class=\"red\"><b>Verschoben</b> auf 19.05.2011!</small>", "<span class=\"red stroke\">Altstadttheater</span>", null, null, "jazztage"); // Jazztage 2010
setVA("04.11.2010", "22:15", "Welcome Party", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2010
setVA("05.11.2010", "19:30", "2. Highlight-Konzert: Jamie Cullum", "Festsaal Ingolstadt", "jazztage10/jamie_cullum", null, "jazztage"); // Jazztage 2010
setVA("05.11.2010", "22:00", "Jazz Party I<br /><small>u. a. mit Ulf Wakenius, Incognito</small>", "NH Ambassador Ingolstadt", "jazztage10/jazzparty1", null, "jazztage"); // Jazztage 2010
setVA("06.11.2010", "20:00", "Jazz Party II<br /><small>u.a. mit  Omar Hakim, Wolfgang Haffner</small>", "NH Ambassador Ingolstadt", "jazztage10/jazzparty2", null, "jazztage"); // Jazztage 2010
setVA("07.11.2010", "11:00", "Jazz Brunch mit \"4 of a kind\"", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2010
setVA("07.11.2010", "11:00", "Jazzgottesdienst mit Tom Diewock und Gerhard Schmidt", "Kirche St. Matthäus", "jazztage10/jazzgottesdienst", null, "jazztage"); // Jazztage 2010
setVA("07.11.2010", "19:30", "3. Highlight-Konzert: Paco de Lucia &amp; Band", "Festsaal Ingolstadt", "jazztage10/paco_de_lucia", null, "jazztage"); // Jazztage 2010
setVA("21.11.2010", "19:00", "15. Jam Session", "Diagonal", null, null, "session");
setVA("24.11.2010", "20:00", "Trialogo / Emil &amp; Eduard", "Diagonal");
setVA("27.11.2010", "-&nbsp;?&nbsp;-", "Moop Mama (Marcus Kesselbauer) in Concert", "Ohrakel");
setVA("28.11.2010", "20:00", "Prisma feat. Sylwia Bialas", "Diagonal");

setVA("02.12.2010", "18:30", "After Work Party mit Rudi Trögl und Rainer Hasenkopf", "Audi Forum");
setVA("05.12.2010", "11:00", "\"A jazzy Christmas Brunch\" mit \"4 of a kind\"", "NH Hotel Ambassador");
setVA("05.12.2010", "19:30", "Doppelkonzert Cantares (brasilianischer Chor) &amp; The Voice Connection", "Fronte 79");
setVA("11.12.2010", "ganztags", "Europäische Jazzakademie: Peter Weniger (sax), David Friedman (vib)", "Birdland Neuburg");
setVA("19.12.2010", "19:00", "16. Jam Session X-Mas", "Diagonal", null, null, "session");


setVA("16.01.2011", "19:00", "17. Jam Session", "Diagonal", "JS_20110116", null, "session");

setVA("12.02.2011", "18:00", "2. Big Band Nacht der Ingolstädter Schulen", "Fronte 79", "BBN2011");
setVA("13.02.2011", "ganztags", "Europäische Jazzakademie: Thomas Dobler (vib), Kenny Drew jun. (p)", "Birdland Neuburg");
setVA("20.02.2011", "19:00", "18. Jam Session", "Diagonal", null, null, "session");

setVA("20.03.2011", "19:00", "19. Jam Session", "Diagonal", null, null, "session");
setVA("26.03.2011", "ganztags", "Europäische Jazzakademie: Don Friedman (p), Martin Wind (b), Hans Braber (dr)", "Birdland Neuburg");

setVA("13.04.2011", "20:00", "Dean Brown Trio", "Diagonal");
setVA("17.04.2011", "19:00", "20. Jam Session<br /><small>mit Fünfklang</small>", "Diagonal", "JS_20110417", null, "session");

setVA("08.05.2011", "20:00", "Victor Wooten &amp; JD Blair", "Diagonal");
setVA("15.05.2011", "ganztags", "Europäische Jazzakademie: Scott Robinson (sax), Bill Cunliffe (p), Joe LaBarbera (dr), Martin Wind (b)", "Birdland Neuburg");
setVA("15.05.2011", "20:00", "Danilo Perez Trio - <b>Bonuskonzert</b>", "Diagonal");
setVA("19.05.2011", "20:30", "Jazz im Theater: Clueso &amp; Bernewitz Trio feat. Paul Brody<br /><small class=\"red\">Nachschlag der Jazztage 2010</small>", "Altstadttheater", null, null, "jazztage");
setVA("22.05.2011", "19:00", "21. Jam Session", "Diagonal", "JS_20110522", null, "session");

setVA("08.06.2011", "20:00", "Steps of Spirit / Supersonic", "Diagonal");
setVA("26.06.2011", "19:00", "22. Jam Session<br /><small>mit Bernhard Hollinger Group</small>", "Diagonal", "JS_20110626", null, "session");

setVA("08.07.2011", "18:30", "Charly Böck &amp; Latin Project", "Bürgerfest: Jazzbühne am Carraraplatz");
setVA("08.07.2011", "21:00", "Captain's Bog", "Bürgerfest: Jazzbühne am Carraraplatz", "Jazzbuehne2011/1_Fr/12_CaptainsBog");
setVA("09.07.2011", "14:30", "Young Jazz Players in Concert", "Bürgerfest: Jazzbühne am Carraraplatz", "Jazzbuehne2011/2_Sa/2x_YJP", null, "jazztage");
setVA("09.07.2011", "18:30", "Close2Jazz", "Bürgerfest: Jazzbühne am Carraraplatz", "Jazzbuehne2011/2_Sa/24_Close2Jazz");
setVA("09.07.2011", "20:30", "Swingbreak", "Bürgerfest: Jazzbühne am Carraraplatz", "Jazzbuehne2011/2_Sa/25_Swingbreak");
setVA("09.07.2011", "22:30", "M'Tub - Live from Amsterdam", "Bürgerfest: Jazzbühne am Carraraplatz");
setVA("10.07.2011", "10:00", "Kraiberg Jazz Band", "Bürgerfest: Jazzbühne am Carraraplatz", "Jazzbuehne2011/3_So/31_Kraiberg");
setVA("10.07.2011", "12:00", "Pit Müllers Hot Stuff", "Bürgerfest: Jazzbühne am Carraraplatz", "Jazzbuehne2011/3_So/32_PitMueller");
setVA("17.07.2011", "19:00", "23. Jam Session", "Diagonal", "JS_20110717", null, "session");
setVA("26.07.2011", "20:30", "fourfreude", "Neue Welt");


setVA("15.09.2011", "20:30", "Klangpatrouille", "Neue Welt");
setVA("18.09.2011", "19:00", "24. Jam Session<br /><small>mit In \"F\" Active</small>", "Diagonal", "JS_20110918", null, "session");
setVA("30.09.2011", "20:00", "Bibalicious meets In \"F\" Active", "Ohrakel");

setVA("08.10.2011", "19:00", "Jubiläumskonzert: 25 Jahre GG Bigband", "Gnadenthal Gymnasium, Aula");
setVA("08.10.2011", "20:00", "Jubiläumskonzert: 20 Jahre Kraiberg Jazz Band", "Diagonal");
setVA("12.10.2011", "20:00", "Simone", "Diagonal");
setVA("16.10.2011", "18:00", "Josef Finger: Eröffnung der 28. Ingolstädter Jazztage", "Diagonal", "jazztage11/joey_finger", null, "jazztage"); // Jazztage 2011
//setVA("19.10.2011", "20:00", "Sophie Hunger", "Diagonal"); // Der Oktober ist eine Frau, nicht Jazztage!
setVA("23.10.2011", "19:00", "25. Jam Session", "Diagonal", null, null, "session");
setVA("26.10.2011", "08:00 - 17:00", "Jazzprojekttag", "Johann-Michael-Sailer-Schule", null, null, "jazztage"); // Jazztage 2011
setVA("27.10.2011", "ganztags", "Jazz für Schulen: \"Rhythm-a-ning\"", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2011
setVA("28.10.2011", "ganztags", "Jazz für Schulen: \"Rhythm-a-ning\"", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2011
setVA("29.10.2011", "16:00", "Jazz for Kids: Jolli, Juri, und die Jungs... und das große Fernweh", "Volkshochschule", null, null, "jazztage"); // Jazztage 2011
setVA("30.10.2011", "20:00", "Highlight: Gospel Power Soul", "Kirche St. Augustin", "jazztage11/gospel_power_soul", null, "jazztage"); // Jazztage 2011
setVA("31.10.2011", "19:30", "14. Session der Young Jazz Players", "Diagonal", "jazztage11/yjp", null, "jazztage"); // Jazztage 2011

setVA("01.11.2011", "20:30", "Denise Liepold &amp; Rudi Trögl Trio<br /><small>Ingolstädter Szene</small>", "Neue Welt", null, null, "jazztage"); // Jazztage 2011
setVA("02.11.2011", "20:30", "A Tribute to Paul Simon feat. Lisa Wahlandt / Charly Böck<br /><small>Ingolstädter Szene</small>", "Diagonal", null, null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:00", "Johnny A. &amp; Jeff Aug<br /><small>Jazz in den Kneipen</small>", "Diagonal", "jazztage11/kneipen/diagonal", null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Lubos Bena &amp; Matej Ptaszek<br /><small>Jazz in den Kneipen</small>", "Café Hohe Schule", null, null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Jon Regen &amp; Band<br /><small>Jazz in den Kneipen</small>", "Neue Welt", "jazztage11/kneipen/neuewelt", null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Miranda Sykes &amp; Rex Preston<br /><small>Jazz in den Kneipen</small>", "Ölbaum", null, null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Pamela Mendez Band<br /><small>Jazz in den Kneipen</small>", "Ouzerie bar", null, null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Boomtownraps &amp; Joey Finger Group feat. Nico Suave<br /><small>Jazz in den Kneipen</small>", "Swept Away", "jazztage11/kneipen/sweptaway", null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Susan Weinert Global Players Trio<br /><small>Jazz in den Kneipen</small>", "Theaterbar", "jazztage11/kneipen/theaterbar", null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "20:30", "Olivia Trummer Trio<br /><small>Jazz in den Kneipen</small>", "Hotel Rappensberger", null, null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "22:00", "Lisa Bassenge<br /><small>Jazz im Altstadttheater</small>", "Altstadttheater", null, null, "jazztage"); // Jazztage 2011
setVA("03.11.2011", "22:15", "Welcome Party: Hypnotic Brass Ensemble", "NH Ambassador Ingolstadt", "jazztage11/welcome_party", null, "jazztage"); // Jazztage 2011
setVA("04.11.2011", "19:30", "Highlight: Pat Metheny Trio<br /><small>mit Larry Grenadier &amp; Bill Stewart</small>", "Festsaal Ingolstadt", "jazztage11/pat_metheny", null, "jazztage"); // Jazztage 2011
setVA("04.11.2011", "22:00", "Jazz Party I<br /><small>mit George Duke, Tingvall Trio, Iiro Rantala</small>", "NH Ambassador Ingolstadt", "jazztage11/party1", null, "jazztage"); // Jazztage 2010
setVA("05.11.2011", "20:00", "Jazz Party II<br /><small>mit Incognito, The Bahama Soul Club, Mike Stern Trio, Magnus Lindgren Quartet, Raphael Gualazzi</small>", "NH Ambassador Ingolstadt", "jazztage11/party2", null, "jazztage"); // Jazztage 2010
setVA("06.11.2011", "11:00", "Jazz Brunch mit \"Blue Moon\"", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2011
setVA("06.11.2011", "11:00", "Jazzgottesdienst mit \"Batter My Soul\"", "Kirche St. Matthäus", null, null, "jazztage"); // Jazztage 2011
setVA("06.11.2011", "19:30", "Highlight: Earth, Wind &amp; Fire Experience<br /><small>feat. The Al McKay Allstars</small>", "Festsaal Ingolstadt", "jazztage11/ewf_experience", null, "jazztage"); // Jazztage 2011

setVA("20.11.2011", "19:00", "26. Jam Session<br /><small>mit Fünfklang</small>", "Diagonal", "JS_20111120", null, "session");
setVA("21.11.2011 - 22.11.2011", "&nbsp;", "Eric Bibb &amp; Staffan Astner", "Neue Welt");
setVA("23.11.2011", "20:00", "Trialogo / Emil &amp; Eduard", "Diagonal");

setVA("18.12.2011", "19:00", "27. Jam Session", "Diagonal", "JS_20111218", null, "session");


setVA("15.01.2012", "19:00", "28. Jam Session<br /><small>mit der Kraiberg Jazz Band</small>", "Diagonal", "JS_20120115", null, "session");
setVA("20.01.2012", "19:00", "<small>10 Jahre Jazz GmbH:</small><br />15. Session der Young Jazz Players", "Fronte 79", null, null, "jazztage");
setVA("21.01.2012", "09:00 - 15:00", "<small>10 Jahre Jazz GmbH:</small><br />Jazzworkshops", "Fronte 79");
setVA("21.01.2012", "19:00", "<small>10 Jahre Jazz GmbH:</small><br />Jubiläumskonzert<br /><small>Top Act: Captain's Bog</small>", "Fronte 79", "jazzgmbh10jahre");
setVA("22.01.2012", "11:00", "Jazz &amp; Literatur: \"Baron von Hüpfenstich\" (Clemens Brentano)<br /><small>Lesung, musikalisch untermalt von Kasia Lewandowska und Charly Böck</small>", "Theaterfoyer");
setVA("25.01.2012", "20:00", "Pili-Pili", "Diagonal");
setVA("26.01.2012", "20:00", "The Big Chris Barber Band", "Audi Forum");

setVA("08.02.2012", "20:00", "Ida Sand", "Diagonal");
setVA("11.02.2012", "20:00", "Soundcheck N° 1<br />mit \"Ludwig Two\", \"Wir und die Anderen\" und \"Fünfklang\"", "Werkstatt/Junges Theater");
setVA("16.02.2012", "20:00", "Hardbop Icons - The Cookers", "Audi Forum");
setVA("26.02.2012", "19:00", "29. Jam Session<br /><small>mit Close2Jazz; </small><small class=\"red\">Eine Woche später als üblich!</small>", "Diagonal", "JS_20120226", null, "session");

setVA("04.03.2012", "11:00", "Jazz &amp; Literatur: \"Baron Münchhausen\"<br /><small>Lesung mit Peter Greif, musikalisch untermalt von Christof Zoelch, Tom Sendtner &amp; Tom Diewock</small>", "Theaterfoyer");
setVA("07.03.2012", "20:00", "Truman Doktrin feat. Simon Seidl<br /><small class=\"red\">Abgesagt!</small>", "<span class=\"red stroke\">Diagonal</span>");
setVA("08.03.2012", "20:00", "Johnny Varros Swing 7", "Audi Forum");
setVA("18.03.2012", "19:00", "30. Jam Session<br /><small>mit JazzArt</small>", "Diagonal", null, null, "session");
setVA("21.03.2012", "20:00", "Solveig Slettahjell", "Diagonal");

setVA("15.04.2012", "19:00", "31. Jam Session<br /><small>mit Olli Krügel &amp; Band</small>", "Diagonal", null, null, "session");
setVA("18.04.2012", "20:00", "Malia - <b class=\"red\">Bonuskonzert</b><br /><small class=\"red\">Ersatz für Soul Rebels Brass Band</small>", "Diagonal");
setVA("19.04.2012", "20:00", "Roberto Santamaria Latin Band", "Audi Forum");

setVA("06.05.2012", "11:00", "Jazz &amp; Literatur: \"Oi wei!\" (Woody Allen)<br /><small>Lesung von Tobias Hoffmann, musikalisch untermalt von Ulrich Wangenheim, Dieter Hoelsch, Ludwig Leininger und Tobias Hofmann</small>", "Theaterfoyer");
setVA("06.05.2012", "20:00", "Oz Noy Trio", "Diagonal");
setVA("13.05.2012", "20:00", "Soul Rebels Brass Band - Bonuskonzert<br /><small class=\"red\">Entfällt! Tournee abgesagt!</small>", "<span class=\"red stroke\">Diagonal</span>");
setVA("20.05.2012", "19:00", "32. Jam Session<br /><small>mit Mallet &amp; Friends</small>", "Diagonal", "JS_20120520", null, "session");

setVA("24.05.2012", "20:00", "Charly Antolinis \"In Memory To Jazz At The Philharmonic\"", "Audi Forum");

setVA("10.06.2012", "11:00", "Jazz &amp; Literatur", "Theaterfoyer");
setVA("16.06.2012", "20:00", "Close2Jazz", "Kotterhof, Böhmfeld");
setVA("17.06.2012", "19:00", "33. Jam Session<br /><small>mit Jamazzing</small><small class=\"red\"> - <b>Abgesagt wegen EM-Übertragung!</b></small>", "<span class=\"red stroke\">Diagonal</span>", null, null, "session");

setVA("15.07.2012", "19:00", "34. Jam Session<br /><small>mit Swingbreak</small>", "Diagonal", "JS_20120715", null, "session");
setVA("28.07.2012", "16:30", "6. Summer Jazz Open Air: Young Jazz Players in Concert<br />Gnadenthal- und Reuchlin-Gymnasium", "Mo Biergarten", "summerjazz2012/sa_yjp", null, "jazztage");
setVA("28.07.2012", "20:30", "6. Summer Jazz Open Air: Lisa Wahlandt Quintett", "Mo Biergarten", "summerjazz2012/sa_wahlandt");
setVA("29.07.2012", "11:30", "6. Summer Jazz Open Air: Jazzfrühschoppen mit JazzArt", "Mo Biergarten", "summerjazz2012/so_jazzart");

setVA("13.09.2012", "20:00", "Munich Swing Orchestra feat. Lynelle Jonsson", "Audi Forum");
setVA("16.09.2012", "19:00", "35. Jam Session<br /><small>mit JazzArt</small>", "Diagonal", "JS_20120916", null, "session");
setVA("19.09.2012", "20:00", "Charly Böck: Latin Jazz Project", "Diagonal", "LatinProject_20120919");
setVA("26.09.2012", "20:00", "Passatempo", "Diagonal");
setVA("30.09.2012", "20:15", "Bernhard Hollinger Group", "Diagonal");

setVA("07.10.2012", "20:00", "Silje Nergaard", "Diagonal");
setVA("14.10.2012", "19:00", "36. Jam Session<br /><small><span class=\"red\">1 Woche früher wegen Preisträgerkonzert!</span></small>", "Diagonal", "JS_20121014", null, "session");
setVA("18.10.2012", "20:00", "Orchestre National du Jazz: \"Piazzolla\"", "Audi Forum");
setVA("21.10.2012", "18:00", "Veronika Schnattinger: Eröffnung der 29. Ingolstädter Jazztage", "Diagonal", null, null, "jazztage"); // Jazztage 2012
setVA("25.10.2012", "ganztags", "Jazz für Schulen: \"Blues- und Boogiepiano-Spielen ohne Noten\" und \"Voices in Jazz\"<br /><small>mit Christian Christl (piano) und Lisa Doby (vocals)</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2012
setVA("26.10.2012", "ganztags", "Jazz für Schulen: \"Blues- und Boogiepiano-Spielen ohne Noten\" und \"Voices in Jazz\"<br /><small>mit Christian Christl (piano) und Lisa Doby (vocals)</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2012
setVA("26.10.2012", "20:00", "Highlight: Jan Garbarek &amp; The Hilliard Ensemble", "Liebfrauenmünster", "jazztage12/garbarek", null, "jazztage"); // Jazztage 2012
setVA("28.10.2012", "16:00", "Jazz for Kids: Sternschnuppe", "Fronte 79", null, null, "jazztage"); // Jazztage 2012

setVA("02.11.2012", "19:30", "Boomtown presents: Joey Finger Group &amp; Guests<br /><small>Ingolstädter Szene</small>", "Kleines Haus am Turm Baur", null, null, "jazztage"); // Jazztage 2012
setVA("04.11.2012", "11:00", "Jazz Brunch: Blue Moon", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2012
setVA("04.11.2012", "19:00", "Highlight: Take 6", "Kirche St. Augustin", null, null, "jazztage"); // Jazztage 2012
setVA("05.11.2012", "19:00", "16. Session der Young Jazz Players", "Diagonal", "YJP_051112", null, "jazztage"); // Jazztage 2012
setVA("06.11.2012", "20:30", "Bibalicious<br /><small>Ingolstädter Szene</small>", "Neue Welt", null, null, "jazztage"); // Jazztage 2012
setVA("07.11.2012", "20:30", "Evasphere feat. Joey Finger<br /><small>Ingolstädter Szene</small>", "Diagonal", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Michael Wollny's [em]<br /><small>Jazz in den Kneipen</small>", "Diagonal", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Stephanie Nilles Band<br /><small>Jazz in den Kneipen</small>", "Neue Welt", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Tok Tok Tok - Goodbye Tour<br /><small>Jazz in den Kneipen</small>", "Das Mo", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Grand Mother's Funck<br /><small>Jazz in den Kneipen</small>", "Swept Away", "jazztage12/grandmothersfunck", null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Iain Matthews &amp; Egbert Derix<br /><small>Jazz in den Kneipen</small>", "Café Hohe Schule", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Ensemble Draj<br /><small>Jazz in den Kneipen</small>", "Ölbaum", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "20:30", "Tim Allhoff Trio<br /><small>Jazz in den Kneipen</small>", "Theaterbar", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "22:00", "Quadro Nuevo<br /><small>Jazz im Altstadttheater</small>", "Altstadttheater", null, null, "jazztage"); // Jazztage 2012
setVA("08.11.2012", "22:15", "Welcome Party: Butterscotch", "NH Ambassador Ingolstadt", "jazztage12/butterscotch", null, "jazztage"); // Jazztage 2012
setVA("09.11.2012", "20:00", "Jazz Party I<br /><small>mit Tower of Power, Hiromi - The Trio Project feat. Anthony Jackson &amp; Simon Phillips, Jacob Karlzon 3, Viktoria Tolstoy; Open End mit der Late Night Band</small>", "NH Ambassador Ingolstadt", "jazztage12/jazzparty1", null, "jazztage"); // Jazztage 2012
setVA("10.11.2012", "20:00", "Jazz Party II<br /><small>mit Joo Kraus &amp; Tales in Tone Trio, Karo Glazer, Marcus Miller, Maceo Parker, Äl Jawala; Open End mit der Late Night Band</small>", "NH Ambassador Ingolstadt", "jazztage12/jazzparty2", null, "jazztage"); // Jazztage 2012
setVA("11.11.2012", "11:00", "Jazzgottesdienst mit \"Batter My Soul\"", "Kirche St. Matthäus", "jazztage12/battermysoul", null, "jazztage"); // Jazztage 2012
setVA("13.11.2012", "20:00", "Christian Scott", "Diagonal");
setVA("15.11.2012", "20:00", "Pasadena Roof Orchestra", "Audi Forum");
setVA("18.11.2012", "11:00", "Jazz &amp; Literatur: Auf den Hund gekommen<br /><small>musikalisch untermalt von Double Emploi</small>", "Theaterfoyer");
setVA("18.11.2012", "19:00", "37. Jam Session<br /><small>mit JAmaZZing</small>", "Diagonal", "JS_20121118", null, "session");
setVA("21.11.2012", "20:00", "Chihiro Yamanaka Trio", "Diagonal");
setVA("25.11.2012", "20:00", "Emil and Eduard feat. Trialogo", "Diagonal");

setVA("06.12.2012", "20:00", "Big Funky Party<br /><small>mit Fat Toni</small>", "Eventhalle (Westpark)");
setVA("06.12.2012", "20:00", "Django Reinhardt Night", "Audi Forum");
setVA("16.12.2012", "19:00", "38. Jam Session<br /><small>mit der Kraiberg Jazz Band</small>", "Diagonal", "JS_20121216", null, "session");
setVA("19.12.2012", "20:00", "Uni-Bigband Eichstätt - Swinging Christmas", "Uni Eichstätt / Aula");
setVA("23.12.2012", "16:00", "Kerstin Schulz &amp; 4 Of A Kind", "Schrannenplatz Neuburg");


setVA("20.01.2013", "20:00", "39. Jam Session", "Diagonal", "JS_20130120", null, "session");
setVA("23.01.2013", "20:00", "Jessica Gall", "Diagonal");
setVA("24.01.2013", "20:00", "The Big Chris Barber Band", "Audi Forum");

setVA("03.02.2013", "20:00", "Claudius Konrad Band", "Diagonal");
setVA("17.02.2013", "11:00", "Jazz &amp; Literatur: Der törichte Karpfen<br /><small>musikalisch untermalt von Christoph Hörmann und Christian Diener</small>", "Theaterfoyer");
setVA("17.02.2013", "20:00", "40. Jam Session<br /><small>mit Swingbreak</small>", "Diagonal", "JS_20130217", null, "session");
setVA("21.02.2013", "20:00", "Pete Yorks Hoochi Coochie Night feat. Albie Donelly", "Audi Forum");

setVA("02.03.2013", "20:00", "Kraiberg Jazz Band: Still groovin' - swingin' - jazzin'", "Kastaniengarten Oberhaunstadt");
setVA("04.03.2013", "20:00", "Jahreshauptversammlung der Jazzfreunde Ingolstadt e.V.", "Hotel im GVZ");
setVA("13.03.2013", "20:00", "Beady Belle", "Diagonal");
setVA("16.03.2013", "20:00", "41. Jam Session<br /><small>mit Mallet &amp; Friends<br /><span class=\"red\" style=\"font-weight:bold\">ACHTUNG! Vorverlegt auf Samstag!</span></small>", "Diagonal", "JS_20130316", null, "session");
setVA("17.03.2013", "11:00", "Jazz &amp; Literatur<br /><small>musikalisch untermalt von Lipa Majstrovic und Charly Leimer</small>", "Theaterfoyer");
setVA("21.03.2013", "20:00", "Swing Oldies - Max Greger &amp; Hugo Strasser", "Audi Forum");

setVA("11.04.2013", "18:30", "Latin Jazz Trio<br /><small>mit Andrea Jamenau, Manolo Diaz &amp; Charly Böck</small>", "Bar &amp; Lounge, Audi Forum");
setVA("14.04.2013", "20:00", "GrandMothers of Invention - <b>Bonuskonzert</b>", "Diagonal");
setVA("18.04.2013", "20:00", "Swing, Swing, Swing<br /><small>mit Three Tenors of Swing, Three Wise Men und Shaunette Hildabrand Trio</small>", "Audi Forum");
setVA("21.04.2013", "20:00", "42. Jam Session<br /><small>mit dem Trio Wasilesku - Schiekofer - Diewock</small>", "Diagonal", "JS_20130421", null, "session");

setVA("01.05.2013", "20:00", "Tuck and Patti", "Diagonal");
setVA("05.05.2013", "20:00", "JamaZZing", "Diagonal", "Jamazzing_20130505");
setVA("12.05.2013", "20:00", "43. Jam Session<br /><small><span class=\"red\">1 Woche früher wegen Pfingsten!</span>  mit Fistfull of Jazz</small>", "Diagonal", "JS_20130512", null, "session");
setVA("15.05.2013", "20:00", "Mike Stern / Bill Evans Band<br /><small>featuring Dave Weckl and Tom Kennedy</small>", "Diagonal");
setVA("18.05.2013", "20:00", "New Gary Burton Quartet", "Audi Forum");

setVA("05.06.2013", "20:00", "Hazmat Modine", "Diagonal");
setVA("16.06.2013", "20:00", "44. Jam Session<br /><small>mit Anna Valiulina, Christian Diener und Tom Diewock</small>", "Diagonal", "JS_20130616", null, "session");
setVA("23.06.2013", "11:00", "Farewell Party / Brunch der Wirtschaftsjunioren Bayern", "Schlosshof", "Jazzbrunch_20130623");
setVA("26.06.2013", "20:00", "Yara Linss", "Diagonal");
setVA("27.06.2013", "19:30", "\"Summer Jazz\": Sonoc de Las Tunas", "Piazetta Audi / Audi Forum");
setVA("28.06.2013", "20:00", "Close2Jazz", "Backhaus Gaimersheim");
setVA("29.06.2013", "17:00", "Tag der Donau", "Donaubühne im Klenzepark");

setVA("10.07.2013", "20:00", "Denise Liepold &amp; Rudi Trögl Duo", "Buchhandlung Thalia Ingolstadt");
setVA("13.07.2013", "14:00", "Bürgerfest Ingolstadt: \"Tumult\"<br /><small>mit Jazzbands der Ingolstädter Schulen: Jazz GmbH (RG)  jes!  Jazz-Club (GG)  Jazz Voices (KG)</small>", "Donau-Meile Skulpturengarten / Schutterstraße", "Tumult_20130713");
setVA("13.07.2013", "19:00", "Bürgerfest Ingolstadt: Jazz and Art Quartet<br /><small>mit Steve Hooks, John Paiva, Patrick Scales und Harald Pompl</small>", "Donau-Meile Skulpturengarten / Schutterstraße");
setVA("13.07.2013", "22:00", "Bürgerfest Ingolstadt: Jazz meets Hip-Hop", "Donau-Meile Skulpturengarten / Schutterstraße");
setVA("21.07.2013", "20:00", "45. Jam Session", "Diagonal", "JS_20130721", null, "session");
setVA("28.07.2013", "10:00", "Brunch der Jazzfreunde<br /><small>Öffentliche Veranstaltung!</small>", "Seehaus am Baggersee");


setVA("05.09.2013", "18:30", "C'est Si Bon", "Bar &amp; Lounge, Audi Forum");
setVA("07.09.2013", "15:00", "Konzert der Schülerband jes!", "<a href=\"http://www.openflair.net/index.php?option=com_content&view=category&layout=blog&id=9&Itemid=44\" target=\"_blank\" title=\"Lageplan\">Open Flair</a>: Klangraumzelt / Klenzepark", "Jes_20130907_1");
setVA("07.09.2013", "22:15", "46. Jam Session<br /><small>mit jes!</small>", "<span class=\"red\"><a href=\"http://www.openflair.net/index.php?option=com_content&view=category&layout=blog&id=9&Itemid=44\" target=\"_blank\" title=\"Lageplan\">Open Flair</a>: \"Wort im Wald\" am Turm Triva</span>", "Jes_20130907_2", null, "session");
setVA("09.09.2013", "20:00", "Denise Liepold &amp; Rudi Trögl Duo<br />Rudi Trögl Trio", "Neue Welt");
setVA("10.09.2013", "20:00", "Charly Böck Latin Project", "Neue Welt");
setVA("12.09.2013", "18:30", "Breuer: Breuer", "Bar &amp; Lounge, Audi Forum");
setVA("19.09.2013", "20:00", "Munich Swing Orchestra &amp; The Funny Valentines", "Audi Forum");
setVA("26.09.2013", "18:30", "Köhnlein: Engel", "Bar &amp; Lounge, Audi Forum");

setVA("04.10.2013", "20:30", "<small>Ungarische Kulturtage:</small><br />Creative Art Trio", "Diagonal");
setVA("10.10.2013", "18:30", "Michael Arlt &amp; Wolfgang Kriener", "Bar &amp; Lounge, Audi Forum");
setVA("13.10.2013", "20:00", "47. Jam Session<br /><small><span class=\"red\">1 Woche früher wegen Jazzförderpreisverleihung!</span></small>", "Diagonal", "JS_20131013", null, "session");
setVA("16.10.2013", "18:15", "Soiree mit JAmaZZing", "Klinikum Ingolstadt");
setVA("17.10.2013", "20:00", "Jeremy Pelt Quintet", "Audi Forum");
setVA("20.10.2013", "18:00", "Oliver Kügel: Eröffnung der 29. Ingolstädter Jazztage", "Fronte 79", null, null, "jazztage");
setVA("20.10.2013", "20:00", "Austria 4+", "Diagonal");
setVA("23.10.2013", "20:00", "Krytle Warren and The Faculty<br /><small>im Rahmen von \"Der Oktober ist eine Frau\"</small>", "Diagonal");
setVA("24.10.2013", "ganztags", "<small>Jazz für Schulen:</small><br />\"Fühlen - Hören - Spielen\" - 2 Bigbands im Training<br /><small>mit Harald Rüschenbaum (drums) und Daniel Klingl (sax)</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2012
setVA("24.10.2013", "18:30", "Necessarily Two<br /><small>Annedore Wienert &amp; Peter Wegele</small>", "Bar &amp; Lounge, Audi Forum");
setVA("25.10.2013", "ganztags", "<small>Jazz für Schulen:</small><br />\"Fühlen - Hören - Spielen\" - 2 Bigbands im Training<br /><small>mit Harald Rüschenbaum (drums) und Daniel Klingl (sax)</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2012
setVA("27.10.2013", "15:00", "<small>Jazz for Kids:</small><br />Jolli, Juri und die Jungs...", "Fronte 79", null, null, "jazztage");
setVA("28.10.2013", "19:30", "<small>Die Jazzfreunde Ingolstadt präsentieren:</small><br />Frederik Köster - Die Verwandlung und Maxime Bender 4tet feat. Simon Seidl", "Theaterfoyer", null, null, "jazztage");
setVA("29.10.2013", "20:00", "<small>Warm Up Konzert:</small><br />Terry Bozzio", "Diagonal", null, null, "jazztage");

setVA("02.11.2013", "20:00", "<small>Highlight:</small><br />Katie Melua", "Festsaal Ingolstadt", null, null, "jazztage");
setVA("03.11.2013", "11:00", "<small>Jazz Brunch:</small><br />Blue Moon", "NH Ambassador Ingolstadt", null, null, "jazztage");
setVA("03.11.2013", "19:00", "<small>Highlight in der Kirche:</small><br />Big Mama &amp; The Golden Six", "Kirche St. Augustin", null, null, "jazztage");
setVA("04.11.2013", "19:30", "17. Session der Young Jazz Players", "Diagonal", null, null, "jazztage");
setVA("05.11.2013", "20:30", "<small>Ingolstädter Szene:</small><br />Simons &amp; Friend", "Neue Welt", null, null, "jazztage");
setVA("06.11.2013", "20:30", "<small>Ingolstädter Szene:</small><br />Charlatan and the Fyddlehud<br /><small>Veronika Schnattinger und Julien Chanal</small>", "Diagonal", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />Cindy Blackman-Santana Group: Another Lifetime", "Diagonal", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />The California Honeydrops", "Neue Welt", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />HATTLER", "Das Mo", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />Sebastian Sturm &amp; Exile Airline", "Swept Away", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />Schorsch Hampel &amp; Dr. Will", "Gasthaus Daniel", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />Franco Morone", "Ölbaum", null, null, "jazztage");
setVA("07.11.2013", "20:30", "<small>Jazz in den Kneipen:</small><br />Caecilie Norby &amp; Lars Danielsson Project", "Theaterbar", null, null, "jazztage");
setVA("07.11.2013", "22:00", "<small>Jazz im Altstadttheater:</small><br />Cindy Blackman-Santana Group", "Altstadttheater", null, null, "jazztage");
setVA("07.11.2013", "22:15", "<small>Welcome Party:</small><br />Defunkt und Omar Hakim feat. Victor Bailey &amp; Rachel Z.", "NH Ambassador Ingolstadt", null, null, "jazztage");
setVA("08.11.2013", "19:30", "<small>Highlight:</small><br />Xavier Naidoo &amp; Quartett", "Saturn-Arena Ingolstadt", null, null, "jazztage");
setVA("08.11.2013", "22:00", "Jazz Party I<br /><small>mit Candy Dulfer, Stanley Jordan feat. Ayisha und Maya Azucena</small>", "NH Ambassador Ingolstadt", null, null, "jazztage");
setVA("09.11.2013", "20:00", "Jazz Party II<br /><small>mit The Brand New Heavies, The Soul Rebels, Bob James &amp; David Sanborn feat. Steve Gadd &amp; Scott Colley, Niogi und Butterscotch &amp; Band</small>", "NH Ambassador Ingolstadt", null, null, "jazztage");
setVA("10.11.2013", "11:00", "Jazz &amp; Literatur", "Theaterfoyer");
setVA("10.11.2013", "11:00", "<small>Jazz in der Kirche:</small><br />Jazzgottesdienst - Batter my soul", "Kirche St. Matthäus", null, null, "jazztage");
setVA("10.11.2013", "19:30", "<small>Highlight:</small><br />Randy Crawford &amp; Joe Sample Trio", "Festsaal Ingolstadt", null, null, "jazztage");
setVA("17.11.2013", "20:00", "48. Jam Session<br /><small>mit Mallet &amp; Friends</small>", "Diagonal", "JS_20131117", null, "session");
setVA("20.11.2013", "20:00", "Erika Stucky: Ping Pong", "Diagonal", null, null, "jazztage");
setVA("21.11.2013", "18:30", "<small>After Work Jazz Lounge</small><br />Hörmann - Flügel", "Audi Forum");
setVA("24.11.2013", "20:00", "Emil &amp; Eduard feat. Trialogo", "Diagonal");
setVA("28.11.2013", "18:30", "<small>After Work Jazz Lounge</small><br />Kagerer - Dombert", "Audi Forum");

setVA("05.12.2013", "18:30", "<small>After Work Jazz Lounge</small><br />Drums No Way / Trio Arlt - Engel - Pichl", "Audi Forum");
setVA("06.12.2013", "20:30", "Mallets &amp; Friends<br /><small><span class=\"red\">50% Ermäßigung für Vereinsmitglieder!</span></small>", "Birdland Neuburg");
setVA("12.12.2013", "20:00", "Django Reinhardt Night<br /><small>Häns'sche Weiss Ensemble, Wawau Adler Group feat. Marcel Loeffler</small>", "Audi Forum");
setVA("14.12.2013", "20:30", "Kerstin Schulz &amp; Band", "Birdland Neuburg");
setVA("15.12.2013", "20:00", "49. Jam Session<br /><small>mit dem James Crutchfield Trio</small>", "Diagonal", "JS_20131215", null, "session");
setVA("19.12.2013", "18:30", "<small>After Work Jazz Lounge</small><br />C'est Si Bon", "Audi Forum");
setVA("22.12.2013", "20:00", "Fat Toni", "Diagonal");


setVA("16.01.2014", "20:00", "Dutch Swing College Band", "Audi Forum");
setVA("19.01.2014", "20:00", "50. Jam Session<br /><small>mit der Benjamin Viale Band</small>", "Diagonal", "JS_20140119", null, "session");

setVA("01.02.2014", "20:30", "Christoph Möckel Quartett<br /><small>mit Christoph Möckel, Simon Seidl, Matthias Nowak und Silvio Morger<br /><span class=\"red\">Ermäßigter Eintritt für Mitglieder der Jazzfreunde Ingolstadt!</span></small>", "Birdland Neuburg");
setVA("02.02.2014", "20:00", "Kitty Hoff &amp; Forêt Noire", "Diagonal");
setVA("12.02.2014", "20:00", "Tingvall Trio", "Diagonal");
setVA("13.02.2014", "20:00", "Upper Austrian Jazz Orchestra Swing &amp; All That Jazz!", "Audi Forum");
setVA("16.02.2014", "20:00", "51. Jam Session<br /><small>mit Simons &amp; Friend</small>", "Diagonal", "JS_20140216", null, "session");
setVA("23.02.2014", "20:00", "TRAM des Balkans", "Diagonal");

setVA("13.03.2014", "20:00", "Butch Miles Jubilee All Stars", "Audi Forum");
setVA("15.03.2014", "10:30 - 15:30", "Jazz-Workshops für Jedermann<br /><small class=\"red\"><a href=\"bigbandnacht14.php\">Mehr Infos und Anmeldung...</a></small>", "Fronte 79", "BBN2014_Workshops");
setVA("15.03.2014", "19:00", "3. Big Band Nacht der Ingolstädter Schulen<br /><small class=\"red\"><a href=\"bigbandnacht14.php\">Mehr Infos...</a></small>", "Fronte 79", "BBN2014");
setVA("16.03.2014", "11:00", "Jazz &amp; Literatur: \"Revolution im Pflanzenreich\"", "Theaterfoyer");
setVA("16.03.2014", "20:00", "52. Jam Session<br /><small>mit Alex Fuchs &amp; Band</small>", "Diagonal", "JS_20140316", null, "session");
setVA("21.03.2014", "20:00", "American Songbirds", "Diagonal");
setVA("23.03.2014", "20:00", "Yojo Christen - piano", "Diagonal");

setVA("06.04.2014", "20:00", "53. Jam Session<br /><small>mit dem King Crimson Project  <span class=\"red\">1 Woche früher wegen den Osterferien!</span></small>", "Diagonal", "JS_20140406", null, "session");
setVA("10.04.2014", "20:00", "Bolero Berlin", "Audi Forum");
setVA("16.04.2014", "20:00", "The Box<br /><small>feat. Christian Diener, Nick Flade, Christoph Holzhauser, Axel Kühn</small>", "Diagonal");
setVA("27.04.2014", "20:00", "Alain Caron Band", "Diagonal");

setVA("13.05.2014", "20:00", "Billy Cobham Band", "Diagonal");
setVA("15.05.2014", "20:00", "The Brasilian Jazz Unit feat. Viviane de Farias", "Audi Forum");
setVA("18.05.2014", "20:00", "Marlene Mortensen", "Diagonal");
setVA("25.05.2014", "20:00", "54. Jam Session<br /><small>mit der Kraiberg Jazz Band  <span class=\"red\">1 Woche später wegen Konzerttermin im Diagonal!</span></small>", "Diagonal", "JS_20140525", null, "session");
setVA("28.05.2014", "20:00", "Third Rail", "Diagonal");
setVA("31.05.2014", "19:00", "Jambalaya", "Restaurant Oase / Interpark");

setVA("29.06.2014", "20:00", "55. Jam Session<br /><small>mit Alex Fuchs &amp; Tom Diewock  <span class=\"red\">1 Woche früher wegen den Pfingsferien!</span></small>", "Diagonal", "JS_20140629", null, "session");

setVA("20.07.2014", "20:00", "56. Jam Session<br /><small>mit jes!</small>", "Diagonal", "JS_20140720", null, "session");


setVA("12.09.2014", "21:00", "Soulstube", "Rosengasse 2");
setVA("18.09.2014", "20:00", "Munich Swing Orchestra feat. Lynelle Jonsson", "Audi Forum");
setVA("28.09.2014", "20:00", "Mallet &amp; Friends<br /><small class=\"red\">Statt September-&#83;ession!</small>", "Diagonal", "MalletAndFriends_20140928");

setVA("08.10.2014", "20:00", "Stephanie Neigel &amp; Band", "Diagonal");
setVA("09.10.2014", "19:00", "Denise Liepold &amp; Rudi Trögl Duo<br /><small>im Rahmen einer Vernissage</small>", "Hollerhaus");
setVA("09.10.2014", "20:00", "Albie Donnely's Supercharge", "Audi Forum");
setVA("18.10.2014", "20:00", "<small>Ingolstädter Jazzpreis 2014</small><br />Olivia Trummer<br /><small>Piano, Vocals</small>", "\"neun\" Kulturzentrum", "jazztage14/OliviaTrummer", null, "jazztage"); // Jazztage 2014
setVA("19.10.2014", "20:00", "57. Jam Session", "Diagonal", "JS_20141019", null, "session");
setVA("22.10.2014", "20:00", "Anna Aaron", "Diagonal");
setVA("23.10.2014", "ganztags", "Jazz für Schulen<br /><small>mit Harald Haugaard und Sune Rahbeck</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2014
setVA("24.10.2014", "ganztags", "Jazz für Schulen<br /><small>mit Harald Haugaard und Sune Rahbeck</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2014
setVA("24.10.2014", "19:30", "Highlight: Jan Garbarek &amp; the Hilliard Ensemble", "Liebfrauenmünster", "jazztage14/JanGarbarek", null, "jazztage"); // Jazztage 2014
setVA("24.10.2014", "20:00", "Denise Liepold &amp; Rudi Trögl Duo", "Kotterhof, Böhmfeld");
setVA("26.10.2014", "15:00", "<small>Jazz For Kids</small><br />The Angles - Mit Charlie um die Welt", "\"neun\" Kulturzentrum", null, null, "jazztage"); // Jazztage 2014
setVA("27.10.2014", "19:30", "<small>Jazzfreunde Ingolstadt e. V. presents:</small><br />Oliver Wasilesku Trio, Jason Seizer New Quartet plays Cinema Paradiso - <b class=\"red\">Bonuskonzert!</b><br /><small>Voranmeldung für Mitglieder bis 22.10.2014 per <a href=\"/kontakt?to=wewer&s=Bonuskonzert\">Mail an Karl Wewer</a></small>", "Theaterfoyer", "jazztage14/GJN", null, "jazztage"); // Jazztage 2014
setVA("29.10.2014", "20:00", "Malia &amp; Band", "Diagonal");

setVA("02.11.2014", "11:00", "Rudi Trögl (Solojazzgitarre)<br /><small>im Rahmen einer Vernissage von Werner Kapfer</small>", "Harderbastei");
setVA("02.11.2014", "11:00", "<small>Jazz Brunch</small><br />Blue Moon", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2014
setVA("02.11.2014", "19:30", "Highlight: Tim Bendzko +4", "Festsaal Ingolstadt", "jazztage14/TimBendzko", null, "jazztage"); // Jazztage 2014
setVA("03.11.2014", "19:00", "18. Session der Young Jazz Players<br /><small>Nachwuchssession der Ingolstädter Schüler &amp; Studenten</small>", "Diagonal", "YJP_031114", null, "jazztage"); // Jazztage 2014
setVA("04.11.2014", "20:00", "San2 &amp; His Soul Patrol", "Neue Welt", null, null, "jazztage"); // Jazztage 2014
setVA("05.11.2014", "20:00", "Ollie Kügel's nu Soul", "Diagonal", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "Raul Midón", "Altstadttheater", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />Bill Evans Soulgrass", "Diagonal", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />Janice Harrington Trio", "Gasthaus Daniel", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />Errorhead", "Das Mo", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />Julia Biel Group", "Museum für konkrete Kunst", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />Paul Millns &amp; Band", "Neue Welt", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />Sigi Finkel &amp; Mamadou Diabaté", "Ölbaum", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:00", "<small>Jazz in den Kneipen</small><br />The Ruffcats", "Swept Away", null, null, "jazztage"); // Jazztage 2014
setVA("06.11.2014", "20:15", "Welcome Party<br /><small>mit Three Fall, Maceo Parker, Jonas Hellborg Solo, Neutral Ground Brass Band, Late Night Musicians</small>", "NH Ambassador Ingolstadt", "jazztage14/WelcomeParty", null, "jazztage"); // Jazztage 2014
setVA("07.11.2014", "20:00", "Jazzparty I<br /><small>mit Dr. John &amp; The Nite Trippers, Marialy Pacheco Trio, The Terence Blanchard E-Collective, Stanley Clarke Band, Neutral Ground Brass Band, Late Night Musicians</small>", "NH Ambassador Ingolstadt", "jazztage14/Jazzparty1", null, "jazztage"); // Jazztage 2014
setVA("08.11.2014", "20:00", "Jazzparty II<br /><small>mit Tower Of Power, Youn San Nah &amp; Ulf Wakenius, Wolfgang Haffner Trio, Spyro Gyra, Neutral Ground Brass Band, Late Night Musicians</small>", "NH Ambassador Ingolstadt", "jazztage14/Jazzparty2", null, "jazztage"); // Jazztage 2014
setVA("09.11.2014", "11:00", "Jazz &amp; Literatur: \"Neues vom Teufel!\"<br /><small>mit Peter Greif und Bernhard Reitberger</small>", "Theaterfoyer");
setVA("09.11.2014", "11:00", "Jazzgottesdienst: Batter My Soul", "Kirche St. Matthäus", "jazztage14/BatterMySoul", null, "jazztage"); // Jazztage 2014
setVA("09.11.2014", "19:30", "Highlight: Gregory Porter", "Festsaal Ingolstadt", "jazztage14/GregoryPorter", null, "jazztage"); // Jazztage 2014
setVA("13.11.2014", "20:00", "Jeff Hamilton-John Clayton Jazz Orchestra<br /><small>im Rahmen des 4. Birdland Radio Jazz-Festivals</small>", "Audi Forum");
setVA("14.11.2014", "20:00", "Medeski, Scofield, Martin &amp; Wood<br /><small>im Rahmen des 4. Birdland Radio Jazz-Festivals</small>", "Audi Forum");
setVA("16.11.2014", "20:00", "58. Jam Session<br /><small>mit Sebastian Kutscher, Alex Fuchs und Benjamin Viale</small>", "Diagonal", null, null, "session");
setVA("19.11.2014", "20:00", "Bernhard Hollinger Group - Vinyl-Release-Tour 2014", "Diagonal");

setVA("04.12.2014", "19:00", "UNICEF Benefizkonzert<br /><small>u.&nbsp;a. mit Rudi Trögl (Solojazzgitarre)</small>", "Kolpingsaal Ingolstadt");
setVA("11.12.2014", "20:00", "Django Reinhardt Night: Fapy Lafertin Trio und Vano Bamberger &amp; Band", "Audi Forum");
setVA("14.12.2014", "20:00", "59. Jam Session<br /><small>mit der Bourbon Street Band</small>", "Diagonal", "JS_20141214", null, "session");
setVA("18.12.2014", "19:30", "Opera Swing Quartet: Jazzet, frohlocket!", "Theaterfoyer");
setVA("27.12.2014", "20:00", "Fat Toni: Play That Funky Music<br /><small>Debüt von \"Elisabetta Lombardo\" (Gesang)</small>", "Diagonal");
setVA("28.12.2014", "20:00", "Soulstube", "Diagonal");


setVA("08.01.2015", "18:30", "After Work Jazz Lounge<br /><small>mit Rudi Trögl (Gitarre) und Florian Helming (Saxophon)</small>", "Audi Forum");
setVA("15.01.2015", "20:00", "The Big Chris Barber Band", "Audi Forum");
setVA("16.01.2015", "20:00", "Adriano Prestel feat. Delicious Groove Gourmets", "Tin Tin Bar");
setVA("18.01.2015", "20:00", "60. Jam Session<br /><small>mit Bernhard Reitberger &amp; Friends (Bernhard Reitberger, Steffen Mayer, Ted Matschi, Tom Diewock)</small>", "Diagonal", null, null, "session");
setVA("24.01.2015", "20:00", "Kraiberg Jazzband", "Gutmann / Eichstätt");
setVA("28.01.2015", "20:00", "Emil &amp; Eduard feat. Trialogo", "Diagonal");

setVA("04.02.2015", "19:00", "Jahresversammlung Jazzfreunde e. V. 2015", "Zum Anker");
setVA("08.02.2015", "11:00", "Jazz &amp; Literatur: Mark Twain<br /><small>mit der Bourbon Street Band</small>", "Theaterfoyer");
setVA("08.02.2015", "20:00", "61. Jam Session<br /><small>mit dem Florian Müller Trio (Florian Müller, Leonhard Heydecker, Alex Fuchs)</small>", "Diagonal", "JS_20150208", null, "session");
setVA("12.02.2015", "20:00", "The Jazz Big Band Association", "Audi Forum");
setVA("15.02.2015", "20:00", "JAmaZZing", "Diagonal");
setVA("22.02.2015", "20:00", "Charly Böck Percussion Trio", "Diagonal");

setVA("08.03.2015", "11:00", "Jazz &amp; Literatur: Woody Allen<br /><small>mit Christoph Hörmann, Helmut Kagerer und Paul Brändle</small><br /><small class=\"red\">Vorverlegt!</small>", "Theaterfoyer");
setVA("08.03.2015", "20:00", "62. Jam Session<br /><small>mit Alex Fuchs und Band</small><br /><small class=\"red\">Vorverlegt!</small>", "Diagonal", "JS_20150308", null, "session");
setVA("11.03.2015", "20:00", "Beady Belle", "Diagonal");
setVA("14.03.2015", "21:00", "Fat Toni: Play That Funky Music", "Firenze Café Bistro, Wettstetten");
setVA("15.03.2015", "20:00", "Schallpoet", "Diagonal");
setVA("16.03.2015", "20:30", "Karl Ivar Refseth Trio I: Release-Tour \"Praying\"", "Tagtraum Ingolstadt");
setVA("19.03.2015", "20:00", "International Hot Jazz Quartet<br /><small>meets Japanese Friends</small>", "Audi Forum");
setVA("25.03.2015", "20:00", "Jacob Karlzon 3", "Diagonal");
setVA("28.03.2015", "20:00", "SchutterNeun Jazzorchester", "neun Kulturzentrum");

setVA("12.04.2015", "20:00", "63. Jam Session<br /><small>mit Bernhard Reitberger &amp; Friends</small>", "Diagonal", null, null, "session");
setVA("16.04.2015", "20:00", "Carolyn Breuer's Four Seasons of Life", "Audi Forum");
setVA("16.04.2015 - 18.04.2015", "19:30", "Weltenklang Festival", "neun Kulturzentrum");
setVA("19.04.2015", "11:00", "Jazz &amp; Literatur: Goethes Weimar<br /><small>mit dem Oliver Wasilesku Trio</small>", "Theaterfoyer");
setVA("19.04.2015", "20:00", "Charles Leimer: Steps of Spirit", "Diagonal");
setVA("28.04.2015", "20:00", "Silje Nergaard", "Diagonal");

setVA("06.05.2015", "20:00", "Dave Weckl Acoustic Band", "Diagonal");
setVA("10.05.2015", "20:00", "Lea W. Frey Band: Wohnzimmerkonzert #3", "Tagtraum Ingolstadt");
setVA("17.05.2015", "20:00", "64. Jam Session<br /><small>mit dem James Crutchfield Trio</small>", "Diagonal", "JS_20150517", null, "session");
setVA("20.05.2015", "20:00", "Chris Minh Doky &amp; The Nomads", "Diagonal");
setVA("21.05.2015", "20:00", "Allotria Jazz Band", "Audi Forum");

setVA("10.06.2015", "20:00", "Tram des Balkans", "Diagonal");
setVA("21.06.2015", "20:00", "65. Jam Session<br /><small>mit Almost Blue</small>", "Diagonal", "JS_20150621", null, "session");
setVA("23.06.2015", "18:15", "Soiree mit JAmaZZing", "Klinikum Ingolstadt", "Jamazzing_20150623");
setVA("24.06.2015", "20:00", "Kasia Lewandowska &amp; Charly Böck - The Art of Duo", "Diagonal");
setVA("25.06.2015", "20:00", "<small>Audi Summer Jazz:</small><br />Roberto Santamaria &amp; his Latin Jazz Stars", "Audi Piazetta");

setVA("05.07.2015", "10:00 - 17:00", "Workshop Street Marching Band", "Harderbastei");
setVA("11.07.2015", "10:00 - 13:00", "Workshop Street Marching Band<br /><small>mit anschließendem Konzert auf dem Bürgerfest</small>", "Harderbastei");
setVA("12.07.2015", "11:00", "Schul-Jazzbands Ingolstadt<br /><small>im Rahmen des Tumult Festival / Bürgerfest</small>", "Bühne am Museum für Konkrete Kunst", "Tumult_20150712");
setVA("13.07.2015", "20:30", "Wes Mackey &amp; The Blues Train", "Neue Welt");
setVA("19.07.2015", "20:00", "66. Jam Session<br /><small>mit jes!</small>", "Diagonal", "JS_20150717", null, "session");

setVA("17.09.2015", "20:00", "Munich Swing Orchestra &amp; The Funny Valentines", "museum mobile");
setVA("27.09.2015", "20:00", "67. Jam Session<br /><small>mit der Death Ray Boogie Band: Dirk Rutenbeck, Norbert Zepter und Armin Stöck</small>", "Diagonal", "JS_20150927", null, "session");
setVA("30.09.2015", "20:00", "Mo Kenney<br /><small>im Rahmen der Veranstaltungsreihe \"Der Oktober ist eine Frau\"</small>", "Diagonal");

setVA("07.10.2015", "20:00", "Ashia &amp; The Bison Rouge<br /><small>im Rahmen der Veranstaltungsreihe \"Der Oktober ist eine Frau\"</small>", "Diagonal");
setVA("15.10.2015", "20:00", "Ron Carter Foursight Quartet", "museum mobile");
setVA("17.10.2015", "20:00", "<small>Eröffnung der Jazztage:</small><br />Verleihung des Jazzförderpreises<br /><small>an Matthias Hetzer</small>", "neun Kulturzentrum", "jazztage15/Verleihung", null, "jazztage"); // Jazztage 2015
setVA("18.10.2015", "20:00", "68. Jam Session<br /><small>mit Bernhard Reitberger &amp; Friends</small>", "Diagonal", "JS_20151018", null, "session");
setVA("21.10.2015", "20:00", "Julia Biel<br /><small>im Rahmen der Veranstaltungsreihe \"Der Oktober ist eine Frau\"</small>", "Diagonal");
setVA("25.10.2015", "11:00", "Jazzbrunch<br /><small>mit Blue Moon</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2015
setVA("25.10.2015", "16:00", "<small>Jazz for Kids:</small><br />Jazz mit Kick", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2015
setVA("25.10.2015", "19:30", "Highlight in der Kirche: Gasandji", "Kirche St. Augustin", "jazztage15/Gasandji", null, "jazztage"); // Jazztage 2015
setVA("26.10.2015", "19:30", "<small>Jazzfreunde Ingolstadt e. V. presents:</small><br />Hendrika Entzian Quartett feat. Sandra Hempel &amp; Jim Mullen Group feat. Zoe Francis - <b class=\"red\">Bonuskonzert!</b><br /><small>Voranmeldung für Mitglieder bis 26.09.2015 per <a href=\"/kontakt?to=wewer&s=Bonuskonzert+2015\">Mail an Karl Wewer</a></small>", "Theaterfoyer", null, null, "jazztage"); // Jazztage 2015
setVA("28.10.2015", "20:00", "Olivia Trummer<br /><small>im Rahmen der Veranstaltungsreihe \"Der Oktober ist eine Frau\"</small>", "Diagonal");
setVA("29.10.2015", "ganztags", "Jazz für Schulen: Boogie &amp; Blues Combo Workshop<br /><small>mit Stephanie Nilles &amp; Ludwig Seuss</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2015
setVA("30.10.2015", "ganztags", "Jazz für Schulen: Boogie &amp; Blues Combo Workshop<br /><small>mit Stephanie Nilles &amp; Ludwig Seuss</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2015
setVA("30.10.2015", "19:30", "Lisa Simone", "neun Kulturzentrum", "jazztage15/LisaSimone", null, "jazztage"); // Jazztage 2015

setVA("02.11.2015", "19:00", "19. Session der Young Jazz Players<br /><small>Nachwuchssession der Ingolstädter Schüler &amp; Studenten</small>", "Diagonal", "jazztage15/YJP", null, "jazztage"); // Jazztage 2015
setVA("03.11.2015", "20:30", "<small>Ingolstädter Szene:</small><br />San2 &amp; His Soul Patrol feat. Dr. Will", "Neue Welt", null, null, "jazztage"); // Jazztage 2015
setVA("04.11.2015", "20:30", "<small>Ingolstädter Szene:</small><br />Töchter &amp; Söhne Ingolstadts", "Diagonal", null, null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "<small>Jazz in den Kneipen:</small><br />Jeff Lorber Group", "Diagonal", "jazztage15/JeffLorber", null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "<small>Jazz in den Kneipen:</small><br />The Bahama Soul Club", "Das Mo", "jazztage15/BahamaSoulClub", null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "<small>Jazz in den Kneipen:</small><br />Vera Jonas Experiment", "Museum für konkrete Kunst", null, null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "<small>Jazz in den Kneipen:</small><br />Fabrizio Consoli &amp; Band", "Neue Welt", "jazztage15/FabrizioConsoli", null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "<small>Jazz in den Kneipen:</small><br />Cuentos Del Sur", "Ölbaum", null, null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "<small>Jazz in den Kneipen:</small><br />Bella s'ol", "Swept Away", null, null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "20:30", "Welcome Party <br /><small>mit Robert Batyi Quartett, Niogi und Y'akoto</small>", "NH Ambassador Ingolstadt", "jazztage15/Yakoto", null, "jazztage"); // Jazztage 2015
setVA("05.11.2015", "22:30", "<small>Jazz im Altstadttheater:</small><br />Klaus Paier &amp; Asja Valcic", "Altstadttheater", null, null, "jazztage"); // Jazztage 2015
setVA("06.11.2015", "17:00", "Vernissage \"Die Kreativen\"<br /><small>mit Rudi Trögl (Gitarre) und Martina Semmlinger-Menschick (Cello)</small>", "Notre Dame / Eichstätt");
setVA("06.11.2015", "19:30", "Highlight: Jan Delay &amp; Disko No.1", "Festsaal Ingolstadt", "jazztage15/JanDelay", null, "jazztage"); // Jazztage 2015
setVA("06.11.2015", "22:15", "Jazzparty I <br /><small>mit Incognito, Dominic Miller Band und Butterscotch &amp; Band</small>", "NH Ambassador Ingolstadt", "jazztage15/JP1", null, "jazztage"); // Jazztage 2015
setVA("07.11.2015", "20:00", "Jazzparty II <br /><small>mit Marcus Miller &amp; Band, Steve Gadd Band, Vincent Peirani &amp; Emile Parisien und Wolfgang Haffner All Star Trio</small>", "NH Ambassador Ingolstadt", "jazztage15/JP2", null, "jazztage"); // Jazztage 2015
setVA("08.11.2015", "11:00", "Jazzgottesdienst: Batter my Soul", "Kirche St. Matthäus", "jazztage15/Jazzgottesdienst", null, "jazztage"); // Jazztage 2015
setVA("08.11.2015", "11:00", "Jazz &amp; Literatur: Die Geschichte von der abgehauenen Hand<br /><small>aus dem Märchen-Almanach 1926 von Wilhelm Hauff mit Peter Greif und Beatrice Kahl</small>", "Theaterfoyer");
setVA("08.11.2015", "19:30", "Highlight: Melody Gardot<br /><small>Currency of Man Tour 2015</small>", "Festsaal Ingolstadt", "jazztage15/MelodyGardot", null, "jazztage"); // Jazztage 2015
setVA("09.11.2015", "20:00", "Highlight: Zaz", "Festsaal Ingolstadt", "jazztage15/Zaz", null, "jazztage"); // Jazztage 2015
setVA("12.11.2015", "20:00", "The Pasadena Roof Orchestra", "museum mobile");
setVA("18.11.2015", "20:00", "Marcin Wasilewski Trio feat. Joakim Milder", "Diagonal");
setVA("22.11.2015", "18:00", "<small>Ausklang der Jazztage:</small><br />Sacred Concert<br /><small>SwingIN Big Band &amp; Jugendkammerchor Ingolstadt</small>", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2015
setVA("22.11.2015", "20:00", "69. Jam Session<br /><small>mit Sarah Mettenleiter, Alex Fuchs und Benjamin Viale</small>", "Diagonal", null, null, "session");
setVA("26.11.2015", "18:00", "After Work Party<br /><small>mit Rudi Trögl (Gitarre) und Uli Schiekofer (Kontrabass)</small>", "Audi Forum");
setVA("28.11.2015", "14:00 - 18:00", "Street Marching Workshop<br /><small>Teil 1  für alle bis 25 Jahre</small>", "Harderbastei");
setVA("29.11.2015", "14:00 - 18:00", "Street Marching Workshop<br /><small>Teil 2  für alle bis 25 Jahre</small>", "Harderbastei");
setVA("29.11.2015", "16:00", "Death Ray Boogie Trio", "Kulturzelt im Schlosshof", "DeathRay_20151129");

setVA("05.12.2015", "20:00", "4 Of A Kind", "Backhaus Gaimersheim");
setVA("06.12.2015", "20:00", "Erika Stucky: Spidergirl", "Diagonal");
setVA("10.12.2015", "20:00", "Django Reinhardt Night<br /><small>mit dem Joscho Stephan Trio und dem Kussi Weiss Ensemble</small>", "museum mobile");
setVA("20.12.2015", "20:00", "70. Jam Session<br /><small>X-Mas Session mit Kerstin Schulz &amp; 4 Of A Kind</small>", "Diagonal", "JS_20151221", null, "session");
setVA("25.12.2015", "20:00", "Soulstube", "Diagonal");
setVA("27.12.2015", "20:00", "Fat Toni &ndash; After X-Mas Show", "Diagonal");

setVA("17.01.2016", "20:00", "71. Jam Session<br /><small>mit Bernhard Reitberger &amp; Friends</small>", "Diagonal", null, null, "session");
setVA("21.01.2016", "20:00", "Dutch Swing College Band", "Audi Forum");
setVA("23.01.2016", "20:00", "Schutter-9 Bigband", "neun Kulturzentrum");
setVA("24.01.2016", "20:00", "Rigmor Gustafsson", "Diagonal");
//setVA("31.01.2016", "20:00", "Austria 4+: Für eine Handvoll Schilling", "Diagonal"); // Austria-Pop

setVA("06.02.2016", "20:30", "Mallets &amp; Friends", "Birdland Neuburg");
setVA("14.02.2016", "11:00", "Jazz &amp; Literatur<br /><small>mit Claus Koch und Kuno Kürner</small>", "Theaterfoyer", "JuL_20160214");
setVA("17.02.2016", "20:00", "Radio Europa", "Diagonal");
setVA("18.02.2016", "20:00", "Les Haricots Rouges", "Audi Forum");
setVA("21.02.2016", "20:00", "72. Jam Session<br /><small>mit dem Death Ray Boogie Trio</small>", "Diagonal", null, null, "session");
setVA("26.02.2016", "20:00", "Death Ray Boogie Trio", "Cafe Trödl, Die Bruckmühle / Valley");

setVA("02.03.2016", "20:00", "Quadro Nuevo: Tango", "Diagonal");
setVA("06.03.2016", "20:00", "4 Of A Kind feat. Kerstin Schulz", "Gutmann / Eichstätt");
setVA("17.03.2016", "20:00", "Jacey Falk &amp; Friends: Memory of Lionel Hampton", "Audi Forum");
setVA("20.03.2016", "11:00", "Jazz &amp; Literatur<br /><small>\"Der Kosmos ist kein Kindergarten\"</small>", "Theaterfoyer");
setVA("20.03.2016", "20:00", "73. Jam Session<br /><small>mit Jazz Of Course</small>", "Diagonal", null, null, "session");

setVA("17.04.2016", "20:00", "74. Jam Session<br /><small>mit den Jazzbands des Reuchlin Gymnasiums</small>", "Diagonal", "JS_20160417", null, "session");
setVA("21.04.2016", "20:00", "Barrelhouse Jazzband", "Audi Forum");
setVA("24.04.2016", "20:00", "Matthias Eick", "Diagonal");

setVA("08.05.2016", "20:00", "75. Jam Session<br /><small>mit Bernhard Reitberger &amp; Friends</small>", "Diagonal", "JS_20160508", null, "session");
setVA("11.05.2016", "20:00", "Lakecia Benjamin Band", "Diagonal");

setVA("02.06.2016", "20:00", "Snow Owl", "Audi Forum");
setVA("10.06.2016", "20:00", "Schutter neun Jazzorchester<br /><small>feat. Kim Barth &ndash; Vorband: Bigband des Reuchlin-Gymnasiums</small>", "neun Kulturzentrum");
setVA("17.06.2016", "20:00", "Hazmat Modine", "Diagonal");
setVA("19.06.2016", "20:00", "76. Jam Session<br /><small>mit der Spring Street Jazz Band</small>", "Diagonal", "JS_20160619", null, "session");
setVA("23.06.2016", "20:00", "Snow Owl", "Audi Forum");

setVA("08.07.2016", "20:00", "Stromsparplan", "Diagonal");
setVA("13.07.2016", "20:00", "Isabel Casas y Cuba Vista", "Diagonal");
setVA("17.07.2016", "20:00", "77. Jam Session<br /><small>mit JAZZ please!</small>", "Diagonal", null, null, "session");
setVA("19.07.2016", "20:00", "Mike Stern Dean Brown &amp; Bill Evans Band<br /><small>feat. Dennis Chambers &amp; Darryl Jones</small>", "Diagonal");
setVA("24.07.2016", "20:00", "Stromlos Bigband<br /><small>mit anschließender Jam-Session</small>", "Kunst und Kultur Bastei");
setVA("27.07.2016", "20:00", "Literatur meets Jazz<br /><small>mit dem Joe Finger Quartett</small>", "Kunst und Kultur Bastei");


setVA("10.09.2016", "20:00", "SchutterNeun mit Monika Roscher<br /><small>im Rahmen der Nacht der Museen</small>", "Lechner-Museum");
setVA("18.09.2016", "20:00", "78. Jam Session<br /><small>mit dem Benjamin Viale Trio", "Diagonal", null, null, "session");
setVA("25.09.2016", "15:00", "Dr. Eisele und die Besen", "Bauerngerätemuseum", "Eisele_20160925");

setVA("12.10.2016", "20:00", "Beady Belle", "Diagonal");
setVA("13.10.2016", "20:00", "Roberta Gamarini &amp; Band", "museum mobile");
setVA("15.10.2016", "20:00", "<small>Eröffnung der Jazztage:</small><br />Verleihung des Jazzförderpreises<br /><small>an Simon Mack</small>", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2016
setVA("15.10.2016", "20:00", "Jubiläumskonzert 25 Jahre Kraiberg Jazz-Band", "Beckerwirt Böhmfeld");
setVA("16.10.2016", "19:00", "79. Jam Session<br /><small>mit den Ingolstädter Schulbands</small>", "Diagonal", "JS_20161016", null, "session"); // Jazztage 2016
setVA("23.10.2016", "16:00", "<small>Jazz for Kids:</small><br />Klang Tarassa Bumm", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2016
setVA("24.10.2016", "19:30", "<small>Jazzfreunde Ingolstadt e. V. presents:</small><br />Mallets &amp; Friends &bull; Hard Days Night Bigband<br /><b class=\"red\">Bonuskonzert!</b>", "Theaterfoyer", "jazztage16/Bonuskonzert", null, "jazztage"); // Jazztage 2016
setVA("26.10.2016", "20:00", "<small>Warm-up-Konzert zu den 33. Ingolstädter Jazztagen:</small><br />Michael Landau Group", "Diagonal", null, null, "jazztage"); // Jazztage 2016
setVA("26.10.2016", "19:30", "GOIN Bigband Jahreskonzert", "neun Kulturzentrum");
setVA("27.10.2016", "ganztags", "<small>Jazz für Schulen:</small><br />Big Band &amp; Vocals", "Gnadenthal- und Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2016
setVA("28.10.2016", "ganztags", "<small>Jazz für Schulen:</small><br />Big Band &amp; Vocals", "Gnadenthal- und Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2016
setVA("28.10.2016", "20:00", "China Moses", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2016
setVA("28.10.2016", "20:00", "20 Jahre Captain's Bog Birthday Konzert", "Diagonal");
setVA("30.10.2016", "11:00", "Jazz Brunch: Blue Moon", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("30.10.2016", "11:00", "Jazz &amp; Literatur<br /><small>\"Dieses war der erste Streich, doch der zweite folgt sogleich\"<br />mit Jakob Dinkelacker (dr)</small>", "Theaterfoyer");
setVA("30.10.2016", "19:30", "Viva Voce", "Kirche St. Augustin", null, null, "jazztage"); // Jazztage 2016

setVA("01.11.2016", "20:30", "<small>Ingolstädter Szene:</small><br />4 Of A Kind feat. Kerstin Schulz", "Neue Welt", "jazztage16/4OfAKind", null, "jazztage"); // Jazztage 2016
setVA("02.11.2016", "20:30", "<small>Ingolstädter Szene:</small><br />Söhne &amp; Töchter Ingolstadts", "Diagonal", null, null, "jazztage"); // Jazztage 2016
setVA("03.11.2016", "20:30", "Jazz in den Kneipen<br /><small>Etienne Mbappé &amp; The Prophets &bull; The Bahama Soul Club &bull; Christoph Pepe Auer Quintett &bull; Corey Harris \"Acoustic Blues Legend\" &bull; \"One Night of Buena Vista\" feat. Luis Frank &amp; Friends &bull; The Kitchen Circus &bull; The Sazerac Swingers</small>", "Altstadt Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("03.11.2016", "20:30", "Welcome Party<br /><small>Hattler &bull; Tingvall Trio &bull; Noise Adventures</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("03.11.2016", "23:59", "Late Night Musicians", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("04.11.2016", "20:00", "Jazzparty I<br /><small>AL DI MEOLA &bull; Marcus Strickland's Twi-Life &bull; Robert Glasper Experiment &bull; The Brand New Heavies</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("04.11.2016", "23:59", "Late Night Musicians", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("05.11.2016", "20:00", "Jazzparty II<br /><small>Standley Clarke Band &bull; Richard Bona Group &bull; Renaud Garcia-Fons Trio &bull; Dieter Ilg Trio</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("05.11.2016", "23:59", "Late Night Musicians", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("06.11.2016", "11:00", "Jazzgottesdienst: Batter my Soul - Spirit Project", "Kirche St. Matthäus", "jazztage16/Jazzgottesdienst", null, "jazztage"); // Jazztage 2016
setVA("06.11.2016", "19:30", "Gregory Porter", "Festsaal Ingolstadt", null, null, "jazztage"); // Jazztage 2016
setVA("10.11.2016", "20:00", "Lucky Chops (NY)", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2016
setVA("10.11.2016", "20:00", "Brussels Jazz Orchestra", "museum mobile");
setVA("20.11.2016", "20:00", "80. Jam Session<br /><small>mit Mademoiselle Manouche &amp; her swinging Reinhardts</small>", "Diagonal", "JS_20161120", null, "session");
setVA("23.11.2016", "20:00", "Malia", "Diagonal");
setVA("27.11.2016", "18:00", "Jazz please!", "Museum für konkrete Kunst");

setVA("08.12.2016", "20:00", "Django Reinhardt Night<br /><small>mit dem Sandro Roy Quartett und dem Diknu Schneeberger Trio</small>", "museum mobile");
setVA("09.12.2016", "19:00", "Swinging Christmas<br /><small>mit Stefan Bernhardt und Caro Lindner</small>", "Kötterhof Böhmfeld");
setVA("17.12.2016", "19:30", "Stromlos Jugend Bigband", "Kunst &amp; Kultur Bastei");
setVA("18.12.2016", "18:00", "swingIN Bigband &amp; Funny Valentines - Christmas Konzert", "neun Kulturzentrum");
setVA("18.12.2016", "20:00", "81. Jam Session<br /><small>mit Dr. Eisele &amp; die Besen</small>", "Diagonal", "JS_20161218", null, "session");
setVA("21.12.2016", "18:30", "Mallets &amp; Friends", "Kamerariat");
setVA("27.12.2016", "20:00", "Fat Tony - After X-Mas Show", "Diagonal");


setVA("13.01.2017", "20:00", "Lesung Michael Kleinhernes<br /><small>mit Musik von Rudi Trögl</small>", "Vronis Ratschhaus");
setVA("15.01.2017", "20:00", "GProject Blues Band", "Diagonal");
setVA("19.01.2017", "20:00", "The Big Chris Barber Band", "museum mobile");
setVA("22.01.2017", "11:00", "Jazz &amp; Literatur: Scheherazades Schwestern", "Theaterfoyer");
setVA("22.01.2017", "20:00", "82. Jam Session", "Diagonal", "JS_20170120", null, "session");

setVA("16.02.2017", "20:00", "Christian Elsässer Jazz Orchestra", "museum mobile");
setVA("19.02.2017", "20:00", "83. Jam Session", "Diagonal", "JS_20170219", null, "session");
setVA("22.02.2017", "20:00", "Sarah Ferri", "Diagonal");

setVA("19.03.2017", "20:00", "84. Jam Session", "Diagonal", "JS_20170319", null, "session");
setVA("23.03.2017", "20:00", "Tram des Balkans", "Diagonal");
setVA("23.03.2017", "20:00", "International Hot Jazz Quartet +2<br /><small>100 Years Original Dixieland Jazz Band - 100 Years of Recorded Jazz</small>", "museum mobile");
setVA("25.03.2017", "19:30", "Close2Jazz: Live and in living colour", "Backhaus Gaimersheim");
setVA("29.03.2017", "20:00", "Oz Noy Trio feat. Jimmy Haslip &amp; Keith Carlock", "Diagonal");

setVA("06.04.2017", "20:00", "Funkalosophy", "Diagonal");
setVA("07.04.2017", "20:00", "Jeni Williams and Black Bohemians", "Rosengasse");
setVA("09.04.2017", "20:00", "85. Jam Session<br /><small><span class=\"red\">Achtung, Terminverschiebung!</span></small>", "Diagonal", "JS_20170409", null, "session");
setVA("23.04.2017", "20:00", "Balász Elemér Group", "Diagonal");
setVA("27.04.2017", "20:00", "Don Menza Bigband", "museum mobile");

setVA("03.05.2017", "20:00", "Iyeoka", "Diagonal");
setVA("11.05.2017", "20:00", "Jeff Jensen Band<br /><small>Blues &amp; Rock from Memphis/USA</small>", "Diagonal");
setVA("14.05.2017", "20:00", "JAmaZZing", "Diagonal");
setVA("20.05.2017", "20:00", "Fat Tony - Brand new family affairs", "Eventhalle (Westpark)");
setVA("21.05.2017", "20:00", "Marilyn Mazur Trio", "Diagonal");
setVA("26.05.2017", "21:00", "Lariza - Native Tribes Tour", "baby &amp; bombe (Poppenstraße 1, Stadtmitte)");
setVA("28.05.2017", "20:00", "86. Jam Session", "Diagonal", null, null, "session");

setVA("24. - 25.06.2017", "09:30 - 19:00", "JazzUp Wochenende<br /><small>Bandworkshops für Kinder und Jugendliche bis 25 Jahre - <a href=\"http://www.kunstundkulturbastei.de/stromlos\" title=\"Mehr Informationen &amp; Anmeldung bei der Kunst und Kultur Bastei\">mehr Infos</a></small>", "Harderbastei");
setVA("25.06.2017", "18:30", "JazzUp Workshopkonzert", "Harderbastei");
setVA("25.06.2017", "20:00", "87. Jam Session", "Diagonal", null, null, "session");

setVA("01.07.2017", "18:00", "Dr.&nbsp;Eisele und die Besen", "Altstadtfest Eichstätt<br /><small>Pater-Philipp-Jeningen-Platz</small>");
setVA("03.07.2017", "10:00 - 17:00", "PopUp Art Piano", "Audi Forum");
setVA("06.07.2017", "17:00 - 21:30", "Ausstellung &amp; Jazzsession \"100 Jahre Jazz &amp; Kunst\"", "Reuchlin-Gymnasium &amp; Harderbastei");
setVA("06.07.2017", "22:00", "<small>Jugend Kunst &amp; Musik Festival</small><br />Colectivo Estimulo", "Harderbastei");
setVA("16.07.2017", "20:00", "88. Jam Session", "Diagonal", null, null, "session");
setVA("18.07.2017", "20:00", "Lindy Hop mit \"Jazz of cource\"", "Diagonal");

setVA("10.09.2017", "11:00", "Dr.&nbsp;Eisele und die Besen", "Bauerngerätemuseum");
setVA("10.09.2017", "19:00", "<small>Benefizkonzert für \"Verleih der Jugend Flügel\"</small><br />Claudius Konrad Band &amp; Glow Connection", "Harderbastei");
setVA("14.09.2017", "20:00", "Munich Swing Orchestra &amp; The Funny Valentines", "museum mobile");

setVA("11.10.2017", "20:00", "Ida Sand Trio", "Diagonal");
setVA("12.10.2017", "20:00", "Bolero Berlin", "museum mobile");
setVA("21.10.2017", "20:00", "<small>Eröffnung der Jazztage: Verleihung des Ingolstädter Jazzförderpreises</small><br />Benedikt Streicher", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2017
setVA("22.10.2017", "15:00 - 16:30", "<small>Jazz For Kids</small><br />Saxshop / Drachenjazz", "Werkstattbühne", null, null, "jazztage"); // Jazztage 2017
setVA("22.10.2017", "19:00", "20. Session der Young Jazz Players", "Diagonal", null, null, "jazztage"); // Jazztage 2017
setVA("23.10.2017", "19:30", "<small>Jazzfreunde Ingolstadt e. V. presents:</small><br />Viviane de Farais feat. Morello &amp; Barth &bull; Close2Jazz<br /><b class=\"red\" title=\"Freier Eintritt an der Abendkasse für Vereinsmitglieder\">Bonuskonzert!</b>", "Theaterfoyer", null, null, "jazztage"); // Jazztage 2017
setVA("24.10.2017", "20:00", "Randi Tytingv&aring;g Trio", "Diagonal");
setVA("26. - 27.10.2017", "ganztags", "Jazz für Schulen: Brass Band Workshop<br /><small>mit Moop Mama (Peter Palmer, Marcus Kesselbauer, Christoph Holzhauser)</small>", "Gnadenthal- &amp; Reuchlin-Gymnasium", null, null, "jazztage"); // Jazztage 2017
setVA("29.10.2017", "11:00", "Jazz Brunch<br /><small>mit Blue Moon</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2017
setVA("29.10.2017", "19:30", "Quadro Nuevo", "Kirche St. Augustin", null, null, "jazztage"); // Jazztage 2017
setVA("31.10.2017", "20:30", "<small>Ingolstädter Szene:</small><br />Söhne &amp; Töchter Ingolstadts", "Neue Welt", null, null, "jazztage"); // Jazztage 2017

setVA("02.11.2017", "20:30", "<small>Jazz in den Kneipen</small><br />Raphael Gualazzi Trio", "Diagonal", null, null, "jazztage"); // Jazztage 2017
setVA("02.11.2017", "20:30", "<small>Jazz in den Kneipen</small><br />Hyleen", "Das Mo", null, null, "jazztage"); // Jazztage 2017
setVA("02.11.2017", "20:30", "<small>Jazz in den Kneipen</small><br />Joscho Stephan Trio", "Neue Welt", null, null, "jazztage"); // Jazztage 2017
setVA("02.11.2017", "20:30", "<small>Jazz in den Kneipen</small><br />Andrea Pancur", "Swept Away", null, null, "jazztage"); // Jazztage 2017
setVA("02.11.2017", "20:30", "<small>Jazz in den Kneipen</small><br />Marina &amp; The Kats", "Altstadttheater", null, null, "jazztage"); // Jazztage 2017
setVA("02.11.2017", "22:30", "Welcome Party<br /><small>mit der Nils Landgren Funk Unit<br />Anschließend Late Night Musicians</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2017
setVA("03.11.2017", "20:00", "Jazzparty I<br /><small>mit Mike Stern &bull; Dave Weckl Band &bull; Marcus Miller &bull; Kennedy Administration &bull; The Raul Midón Trio<br />Anschließend Late Night Musicians</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2017
setVA("04.11.2017", "20:00", "Jazzparty II<br /><small>mit Billy Cobham's Crosswinds Project &bull; Manu Dibango &bull; Younee &bull; Wolfgang Haffner Band<br />Anschließend Late Night Musicians</small>", "NH Ambassador Ingolstadt", null, null, "jazztage"); // Jazztage 2017
setVA("05.11.2017", "11:30", "Jazz &amp; Swing Lunch mit der Kraiberg Jazzband", "Pizzeria Colosseo Gaimersheim");
setVA("05.11.2017", "19:30", "Klaus Doldinger's Passport &amp; Max Mutzke", "Festsaal Ingolstadt", null, null, "jazztage"); // Jazztage 2017
setVA("06.11.2017", "20:00", "Max Giesinger", "Festsaal Ingolstadt", null, null, "jazztage"); // Jazztage 2017
setVA("08.11.2017", "18:30", "JAZZ please!<br /><small>im Rahmen der MittwochsKlassik</small>", "Kamerariat");
setVA("08.11.2017", "20:00", "SingINpool", "Diagonal");
setVA("09.11.2017", "20:00", "Rebekka Bakken &amp; Band", "neun Kulturzentrum", null, null, "jazztage"); // Jazztage 2017
setVA("09.11.2017", "20:00", "Swing 2017<br /><small>mit Frank Roberscheuten</small>", "museum mobile");
setVA("11.11.2017", "20:00", "Stefan Pellmaier &amp; Band", "Bauerngerätemuseum", null, null, "jazztage"); // Jazztage 2017
setVA("12.11.2017", "11:00", "<small>Jazzgottesdienst</small><br />Batter My Soul: Tomorrow", "Kirche St. Matthäus", null, null, "jazztage"); // Jazztage 2017
setVA("15.11.2017", "19:30", "GOIN Bigmend<br /><small>Benefizkonzert zugunsten des Peter-Steuart-Hauses</small>", "neun Kulturzentrum");
setVA("19.11.2017", "20:00", "89. Jam Session", "Diagonal", null, null, "session");
setVA("22.11.2017", "20:00", "Mulo Francel &amp; Friends", "Diagonal");
setVA("29.11.2017", "20:00", "Jimi Hendrix Project<br /><small>mit Christy Doran, Erika Stucky, Fredy Studer und Thomy Jordi</small>", "Diagonal");

setVA("03.12.2017", "19:30", "Wer dablost's?<br /><small>Blechbläser Kabarett mit A. Hofmeir, K. Wecker, F. Simbeck, T. Franz und dem SchutterNEUN Jazzorchester</small>", "neun Kulturzentrum");
setVA("07.12.2017", "20:00", "Django Reinhardt Night<br /><small>Hono Winderstein Trio &bull; Timbo Mehrstein Quartet</small>", "museum mobile");
setVA("09.12.2017", "20:30", "Mallets &amp; Friends", "Birdland Jazzclub Neuburg");
setVA("17.12.2017", "18:00", "SwingIN Bigband: \"amazing gospels\"", "neun Kulturzentrum");
setVA("17.12.2017", "20:00", "90. Jam Session", "Diagonal", null, null, "session");
setVA("21.12.2017", "19:30", "Söhne und Töchter Ingolstadts<br /><small>Benefizkonzert</small>", "Harderbastei");
setVA("26.12.2017", "19:00", "Senza Nome - Songs, die unser Leben bewegt haben", "Diagonal");
setVA("27.12.2017", "20:00", "Fat Toni's Last Chance to Dance", "Diagonal");
setVA("28.12.2017", "20:00", "Flaming Fenix - Jahresabschlusskonzert", "Diagonal");
setVA("29.12.2017", "19:00", "Rockin in the free world<br /><small>Just4Fun Cover-Rock</small>", "Diagonal");
setVA("30.12.2017", "20:00", "RasDashaN Live!!! - PreSilvesterKonzert", "Diagonal");


setVA("14.01.2018", "11:00", "Jazz &amp; Literatur Nr. 20: Luna - Der Mond<br /><small>mit dem Benedikt Streicher Trio</small>", "Theaterfoyer");
setVA("18.01.2018", "20:00", "Dutch Swing College Band", "Audi Forum");
setVA("21.01.2018", "20:00", "91. Jam Session", "Diagonal", null, null, "session");

setVA("18.02.2018", "20:00", "92. Jam Session", "Diagonal", null, null, "session");
setVA("21.02.2018", "20:00", "Martha High &amp; The Soul Cookers", "Diagonal");
setVA("22.02.2018", "20:00", "The Uptown Jazz Orchestra feat. Sandro Roy", "Audi Forum");
setVA("24.02.2018", "20:00", "Kulturzeit: Jazzkonzert<br /><small>mit Rudi Trögl, Daniel Schmidt und Uli Schiekofer</small>", "Bürgersaal Wettstetten");
setVA("26.02.2018", "20:00", "Jahreshauptversammlung der Jazzfreunde Ingolstadt e.V.", "Neuburger Kasten, Raum 24");

setVA("04.03.2018", "11:00", "Jazz &amp; Literatur Nr. 21", "Theaterfoyer");
setVA("14.03.2018", "20:00", "Stefanie Boltz Quartett", "Diagonal");
setVA("18.03.2018", "20:00", "93. Jam Session", "Diagonal", null, null, "session");
setVA("21.03.2018", "20:00", "Café del Mundo: \"Dance of Joy\"", "Diagonal");
setVA("22.03.2018", "20:00", "Jeremy Pelt &amp; Band", "Audi Forum");

setVA("08.04.2018", "11:00", "Jazz &amp; Literatur Nr. 22", "Theaterfoyer");
setVA("11.04.2018", "20:00", "Magnus Lindgren: \"Stockholm Underground\"", "Diagonal");
setVA("15.04.2018", "20:00", "94. Jam Session", "Diagonal", null, null, "session");
setVA("19.04.2018", "20:00", title("CaboCubaJazz: \"When Creole Cultures meet\"", "http://www.neun-ingolstadt.de/cabocubajazz-weltenklang-in-der-neun/", "Zur Veranstaltung", "www.cabocubajazz.com"), _HALLE_NEUN_);
setVA("22.04.2018", "20:00", "Bill Evans: \"Petite Blonde II\"", "Diagonal");
setVA("26.04.2018", "20:00", "Marialy Pacheco &amp; Omar Sosa: \"Duets\"", "Diagonal");

setVA("02.05.2018", "20:00", "Stefan Leonhardsberger und die Pompfüneberer", _DIAGONAL_);
setVA("13.05.2018", "20:00", title("95. Jam Session mit \"Trio Djangology\" aus Nürnberg", "https://www.hyun-guitar.de/%C3%BCber-mich/djangology/", "Zur Homepage von Djangology"), _DIAGONAL_, null, null, "session");
setVA("16.05.2018", "20:00", title("Étienne M'Bappé & The Prophets", "http://www.etiennembappe.com/", "Zur Homepage"), _DIAGONAL_);

setVA("17.06.2018", "20:00", title("96. Jam Session mit der Jazz GmbH des Reuchlin Gymnasiums", "http://www.reuchlin-in.de/index.php/unterricht/wahlfachangebot/bigband", "Zur Homepage"), _DIAGONAL_, null, null, "session");

setVA("08.09.2018", "19:00", "<b>\"Offenlassen\" Elektronisches mit Bernhard Hollinger und Hotzeck</b><br />
 im Rahmen \"Nacht der Museen\"", "Kunstverein Ingolstadt im Foyer der Galerie");
setVA("12.09.2018", "20:00", title("Alexandr Misko", "https://www.facebook.com/alexandrmisko", "Zur Facebook Page"), _DIAGONAL_);
setVA("13.09.2018", "20:00", title("swingIN Big Band Ingolstadt", "http://www.swingin-bigband.de/", "Zur Homepage"), _AUDI_FORUM_);
setVA("21.09.2018", "18:00", title("Klavier Jazz / Tango Argentino Konzert & Rodizio", "http://www.swingin-bigband.de/", "Zur Homepage", "Stefan Bernhard (Piano), All you can eat"), _SEEHAUS_);
setVA("24.09.2018", "20:00", title("Mic Mali Gold, Album-Release-Tour", "https://www.backstagepro.de/mic-mali", "Zur Homepage"), _DIAGONAL_);
setVA("30.09.2018", "20:00", title("Senza Nome", "facebook.com/SenzaNomeIngolstadt", "Zur Facebook Page"), _DIAGONAL_);

setVA("05.10.2018", "20:00", title("Konzert im Dunkeln #1", "", "", "mit Eivind Aarset und Michele Rabbia"),_HALLE_NEUN_);
setVA("10.10.2018", "20:00", title("Dean Brown Band", "https://www.deanbrown.com/", "Zur Homepage"), _DIAGONAL_);
setVA("11.10.2018", "20:00", title("Yellow Jackets & Luciana Souza", "http://www.yellowjackets.com/itinerary", "Zur Homepage"), _AUDI_FORUM_);
setVA("12.10.2018", "20:00", title("Mela Marie Spaemann", "", "", "Künstlerinnentage Ingolstadt 2018"), _DIAGONAL_);
setVA("14.10.2018", "19:00", title("SchutterNeun Jazzorchester feat. Norbert Emminger & Izabella Effenberg / Stromlos Big Band"), _HALLE_NEUN_);
setVA("17.10.2018", "20:00", title("NORISHA", "www.norisha.de", "Zur Homepage"), _DIAGONAL_);
setVA("21.10.2018", "20:00", title("21. Session der Young Jazz Players"), _DIAGONAL_, null, null, "session"); // Wurde fälschlicherweise zu den Sessions gezählt
setVA("27.10.2018", "20:00", title("Verleihung Jazzförderpreis 2018 und Eröffnung der Jazztage"), _HALLE_NEUN_);
setVA("28.10.2018", "11:00", title("Jazz Brunch: Blue Moon"), _NH_HOTEL_);
setVA("28.10.2018", "15:00", title("Jazz For Kids: Jazz mit den Musikpiraten"), _WERKSTATTBUEHNE_);
setVA("29.10.2018", "19:30", title("Jazzfreunde presents: Groove Legend Orchestra", "https://groovelegendorchestra.de/", "Zur Homepage"), _FOYER_STADTTHEATER_);

setVA("03.11.2018", "20:00", title("Philharmonisches Orchester Inso & Vadim Neselovskyi", "http://www.vadimneselovskyi.com/no_flash.php", "Zur Homepage"), _FESTSAAL_);
setVA("06.11.2018", "20:00", title("Ingolstädter Szene: Benedikt Streicher Trio"), _NEUE_WELT_);
setVA("07.11.2018", "20:00", title("Söhne und Töchter Ingolstadts 2018"), _DIAGONAL_);
setVA("08.11.2018", "20:00", title("Jazz in den Kneipen", "https://www.ingolstaedter-jazztage.de/programm/", "Zum Programm der Ingolstädter 2018", "Tingvall Trio, Mörk, Ben Prestage, The Ballers & Bellasol, Three Fall & Melane"), _JAZZ_IN_DEN_KNEIPEN_);
setVA("08.11.2018", "22:30", title("Welcome Party: Candy Dulfer & Band", "https://candydulfer.nl/", "Zur Homepage"), _NH_HOTEL_);
setVA("08.11.2018", "20:00", title("Pasadena Roof Orchestra", "http://www.pasadena-roof-orchestra.com/", "Zur Homepage"), _AUDI_FORUM_);
setVA("09.11.2018", "19:30", title("Jan Garbarek Group feat. Trilok Gurtu", "http://www.garbarek.com/", "Zur Homepage"), _FESTSAAL_);
setVA("09.11.2018", "21:20", title("Jazzparty I", "https://www.ingolstaedter-jazztage.de/programm/", "Zum Programm der Ingolstädter Jazztage", "Okan Ersan & Noise Adventures, Kinga Glyk, Ida Nielsen & Band, Chris Minh Doky & Electric Nomads"), _NH_HOTEL_);
setVA("10.11.2018", "20:00", title("Jazzparty II", "https://www.ingolstaedter-jazztage.de/programm/", "Zum Programm der Ingolstädter Jazztage", "Myles Sanko & BAnd, Ghost Note, Nik West & Trio, Incognito"), _NH_HOTEL_);
setVA("11.11.2018", "11:00", title("Jazzgottesdienst: Batter My Soul \"Inspiration\""), _ST_MATTHAEUS_);
setVA("11.11.2018", "19:30", title("Gregory Porter & Band", "www.gregoryporter.com/", "Zur Homepage"), _FESTSAAL_);
setVA("14.11.2018", "20:00", title("Ed Motta: \"Criterion Of The Scenses\"", "facebook.com/EdMotta/", "Zur Facebookpage von Ed Motta"), _DIAGONAL_);
setVA("15.11.2018", "8:00", title("Jazz in den Schulen", "", "", "Workshop: Axel Lindner & Frank Wingold"), _GNADENTHAL_REUCHLIN_);
setVA("16.11.2018", "21:00", title("Club Indepéndance", "", "", "Digitalisierung trifft Subkultur"), _BRIGK_);
setVA("16.11.2018", "8:00", title("Jazz in den Schulen", "", "", "Workshop: Axel Lindner & Frank Wingold"), _GNADENTHAL_REUCHLIN_);
setVA("18.11.2018", "20:00", title("98. Jam Session"), _DIAGONAL_, null, null, "session");
setVA("28.11.2018", "20:00", title("Die Drei Damen", "https://www.lisa-wahlandt.com/", "Zur Homepage"), _DIAGONAL_);

setVA("06.12.2018", "20:00", title("Django Reinhardt Night"), _AUDI_FORUM_);
setVA("12.12.2018", "20:00", title("5/8erl in Ehr'n: \"Duft der Männer\"", "http://www.5achterl.at/", "Zur Homepage"), _DIAGONAL_);
setVA("16.12.2018", "20:00", title("99. Jam Session", "", "", "Session Band: Christoph Teuschel (git), Uli Schiekofer (bass), Tom Diewock(drums) - Funk & Fussion"), _DIAGONAL_, null, null, "session");
setVA("28.12.2018", "18:30", title("Flaming Fenix Live", "", "", "Album-Release & Jahresabschlusskonzert"), _DIAGONAL_);
setVA("29.12.2018", "20:00", title("Rockin in the free World"), _DIAGONAL_);

setVA("13.01.2019", "20:00", title("Flaming Fenix und ME + Marie"), _HALLE_NEUN_);
setVA("20.01.2019", "11:30", title("Jazz-Lunch mit der Kraiberg Jazzband"), "Waldhaus Kösching");
setVA("20.01.2019", "20:00", title("100. Jam Session"), _DIAGONAL_, null, null, "session");
setVA("24.01.2019", "20:00", title("The Big Chris Barber Band"), _AUDI_FORUM_);

setVA("10.02.2019", "11:00", title("Jazz & Literatur Nr. 24 \"Bairische Raritäten\" mit Simon Mack"), _FOYER_STADTTHEATER_);
setVA("10.02.2019", "20:00", title("Jeni Williams & The Black Bohemia", "https://www.jenisjoint.com/", "Zur Homepage"), _DIAGONAL_);
setVA("13.02.2019", "20:00", title("Steve Smith - Groove: Blue", "http://www.vitalinformation.com/"), _DIAGONAL_);
setVA("17.02.2019", "20:00", title("101. Jam Session"), _DIAGONAL_, null, null, "session");
setVA("21.02.2019", "20:00", title("Son Del Nene", "http://www.kramer-artists.de/son-del-nene/"), _AUDI_FORUM_);

setVA("10.03.2019", "20:00", title("102. Jam Session", "", "", "mit der Session-Band Teuschel/Schiekofer/Diewock"), _DIAGONAL_, null, null, "session");
setVA("13.03.2019", "20:00", title("Tiptons Saxophone Quartet & Drums", "http://www.thetiptonssaxquartet.com", "Zur Homepage"), _DIAGONAL_);
setVA("13.03.2019", "20:00", title("Jazz & Gin", "", "", "Sebastian Diepold"), _SCHUTTER_);
setVA("21.03.2019", "20:00", title("Dusko Goykovich & RTS Radio Belgrad Big Band", "https://www.audi.de/de/foren/de/audi-forum-ingolstadt/veranstaltungen/jazz-im-audi-forum-ingolstadt/layer/dusko-goykovich-rts-radio-belgrad-big-band.html"), _AUDI_FORUM_);
setVA("27.03.2019", "20:00", title("Tram des Balkans", "http://www.lesentetes.com/"), _DIAGONAL_);
setVA("27.03.2019", "20:00", title("Jazz & Gin", "", "", "Sebastian Diepold"), _SCHUTTER_);

setVA("02.04.2019", "20:00", title("Mike Stern/Dave Weckl BAnd feat. Tom Kennedy & Bob Franceschini", "http://mikestern.org/", "Zur Homepage"), _DIAGONAL_);
setVA("10.04.2019", "20:00", title("Eric Person Trio", "http://www.ericperson.com/", "Zur Homepage"), _DIAGONAL_);
setVA("10.04.2019", "20:00", title("Jazz & Gin", "", "", "Sebastian Diepold"), _SCHUTTER_);
setVA("11.04.2019", "20:00", title("Barrelhouse JAzzband", "https://www.barrelhouse-jazzband.com/", "Zur Homepage"), _AUDI_FORUM_);
setVA("14.04.2019", "11:00", title("Jazz & Literatur Nr. 25"), _FOYER_STADTTHEATER_);
setVA("28.04.2019", "20:00", title("103. Jam Session"), _DIAGONAL_, null, null, "session");

setVA("19.05.2019", "20:00", title("104. Jam Session"), _DIAGONAL_, null, null, "session");
setVA("22.05.2019", "20:00", title("Ida Sand - My Soul Kitchen", "http://www.idasandmusic.com/", "Zur Homepage"), _DIAGONAL_);
setVA("23.05.2019", "20:00", title("Summer Jazz: Conexion Cubana"), _AUDI_PIAZZETTA_);
setVA("25.05. - 26.05.2019", "12:00 - 5:00", title("Berliner Nächte Ingolstadt 2019"), "Kneipen & Clubs der Stadt");

setVA("03.06.2019", "20:00", title("Yellow Jackets", "https://www.yellowjackets.com/", "Zur Homepage"), _DIAGONAL_);
setVA("07.06. - 26.07.2019", "", title("TUMULTim Klenze"), _KLENZEPARK_);
setVA("09.06.2019", "19:30", title("Wer dablost's"), _HALLE_NEUN_);
setVA("28.06.2019", "20:00", title("Klavierkonzert im Retzbachpark mit Stefan Bernhardt"), "Gaimersheim");
setVA("30.06.2019", "20:00", title("105. Jam Session", "", "", "Session Band: Jazz Please"), _DIAGONAL_, null, null, "session");

setVA("04.07.2019", "19:00", title("Jazz und Dixie Party", "", "", "mit den Dixie Dogs"), _SCHUTTER_);
setVA("07.07.2019", "11:00", title("Altstadtfest Eichstätt", "", "", "Frühschoppen mit der Bigband der Universität Eichstätt"), "Peter Philipp-Jennigen-Platz Eichstätt");
setVA("11.07.2019", "19:00", title("Sommerfest der Kath. Universität Eichstätt-Ingolstadt", "", "", "mit der Bigband der Universität"), "Hofgarten Eichstätt");
setVA("19.07.2019", "18:00", title("Jazzabteilung des Reuchlin Gymnasiums", "", "", "(Bigband und div. Jazz- und Rockbands von K5-12)"), "<b>Bürgerfest Ingolstadt:</b> Bühne an der Neuen Welt, Griesbadgasse");
setVA("19.07.2019", "19:00", title("Flaming Fenix | TAMAD | Highsoulciety"), "<b>Bürgerfest Ingolstadt:</b> Auto-Rott Bühne Kreuztor");
setVA("20.07.2019", "17:00", title("Wild Ones | Popstartkillers | FAT TONI | Rad Gumbo"), "<b>Bürgerfest Ingolstadt:</b> Auto-Rott Bühne Kreuztor");
setVA("25.07.2019", "16:00", title("Jazzabteilung des Reuchlin Gymnasiums"), "Schulhof Reuchlin Gymnasium");
setVA("26.07. - 27.07.2019", "", title("Taktraumfestival"), _REDUIT_TILLY_);

setVA("07.09.2019", "09:30", title("Cladius Conrad Band", "", "", "70 Jahre Audi Festival"), _AUDI_PIAZZETTA_);
setVA("19.09.2019", "20:00", title("swingIN Big Band"), _AUDI_FORUM_);
setVA("19.09.2019", "20:00", title("Quartett Rasgueo", "http://www.neun-ingolstadt.de/quartett-rasgueo-flamenco-festival-2019/", "weitere Informationen", "Flamenco-Jazz"), _NEUE_WELT_);

setVA("06.10.2019", "20:00", title("Claudius Conrad Band"), _DIAGONAL_);
setVA("09.10.2019", "20:00", title("Radio Europa", "http://radio-europa.eu/", "Zur Homepage", "\"Mit Allen und scharf\"... Der Kontinent in concert!"), _DIAGONAL_);
setVA("10.10.2019", "20:00", title("Enrico Rava's 80th Anniversary", "http://www.enricorava.com/", "Zur Homepage"), _AUDI_FORUM_);
setVA("20.10.2019", "20:00", title_series("session"), _DIAGONAL_, null, null, "session");
setVA("23.10.2019", "20:00", title("Chris Minh Doky's - New Nordic Jazz Trio", "https://doky.com/", "Zur Homepage"), _DIAGONAL_);
setVA("25.10.2019", "18:30", title_series("jazztage", "Jazz an den Schulen", "", "", "", "", "2019"), _HALLE_NEUN_);
setVA("26.10.2019", "20:00", title_series("jazztage", "Eröffnung der Jazztage, Förderpreisverleihung Lukas Linder", "", "", "", "","2019"), _HALLE_NEUN_);
setVA("27.10.2019", "11:00", title_series("jazztage", "Jazz Brunch mit Blue Moon", "", "", "", "","2019"), _NH_HOTEL_);
setVA("27.10.2019", "21:00", title_series("jazztage", "Pulsar Trio Konzert im Dunklen", "", "", "", "","2019"), _HALLE_NEUN_);
setVA("29.10.2019", "20:00", title_series("jazztage", "Rebekka Bakken", "", "", "", "","2019"), _HALLE_NEUN_);
setVA("30.10.2019", "20:30", title_series("jazztage", "Jazztage LBT Jazztage Meets Baby & Bomb", "", "", "", "","2019"), "baby & bomb");
setVA("31.10.2019", "20:00", title_series("jazztage", "\"Jazzfreunde presents\": Bekmulin / Findling Duo", "(Gewinner des Förderpreises des Bayrischen Jazzverbands 2019)", "", "", "", "2019"), _NEUE_WELT_);

setVA("03.11.2019", "20:00", title_series("jazztage", "Highlight - Nigle Kennedy plays Gerschwin", "", "", "", "","2019"), _FESTSAAL_);
setVA("04.11.2019", "19:00", title_series("jazztage", "Young Jazz Players Session)", "", "", "", "","2019"), _DIAGONAL_, null, null, "jazztage");
setVA("05.11.2019", "20:00", title_series("jazztage", "Oli Kügel, Christian Diener, Martin Kasper, Lukas Lindner - Ingolstädter Szene", "", "", "", "","2019"), _NEUE_WELT_);
setVA("07.11.2019", "20:00", title_series("jazztage", "Jazz in den Kneipen: Tuck & Patti", "", "", "", "","2019"), _DIAGONAL_);
setVA("07.11.2019", "20:00", title_series("jazztage", "Jazz in den Kneipen: Groove Galaxy", "", "", "", "","2019"), "Diskothek Amadeus");
setVA("07.11.2019", "20:00", title_series("jazztage", "Jazz in den Kneipen: Jon Regen", "", "", "", "","2019"), _NEUE_WELT_);
setVA("07.11.2019", "20:00", title_series("jazztage", "Jazz in den Kneipen: Tokumbo", "", "", "", "","2019"), "Das Mo - Neue Galerie");
setVA("07.11.2019", "20:00", title_series("jazztage", "Welcome Party Jazzrausch Bigband", "", "", "", "","2019"), _NH_HOTEL_);
setVA("07.11.2019", "20:00", title_series("jazztage", "Allotria Jazz Band", "", "", "", "","2019"), _AUDI_FORUM_);
setVA("08.11.2019", "20:00", title_series("jazztage", "Jazzparty I Avery Sunshine", "", "", "", "","2019"), _NH_HOTEL_);
setVA("08.11.2019", "20:00", title_series("jazztage", "Jazzparty I Simon Phillips Band", "", "", "", "","2019"), _NH_HOTEL_);
setVA("08.11.2019", "20:00", title_series("jazztage", "Jazzparty I John Scofield / Jon Cleary Duo", "", "", "", "","2019"), _NH_HOTEL_);
setVA("08.11.2019", "20:00", title_series("jazztage", "Jazzparty I Caecilie Norby Sisters in Jazz", "", "", "", "","2019"), _NH_HOTEL_);
setVA("09.11.2019", "20:00", title_series("jazztage", "Jazzparty II The Wooten Brothers", "", "", "", "","2019"), _NH_HOTEL_);
setVA("09.11.2019", "20:00", title_series("jazztage", "Jazzparty II Spyro Gary", "", "", "", "","2019"), _NH_HOTEL_);
setVA("09.11.2019", "20:00", title_series("jazztage", "Jazzparty II Younee", "", "", "", "","2019"), _NH_HOTEL_);
setVA("09.11.2019", "20:00", title_series("jazztage", "Jazzparty II Kimberose", "", "", "", "","2019"), _NH_HOTEL_);
setVA("10.11.2019", "11:00", title("Jazz & Literatur"), _FOYER_STADTTHEATER_);
setVA("10.11.2019", "20:00", title_series("jazztage", "Jazzgotesdienst Batter My Soul", "", "", "", "","2019"), _ST_MATTHAEUS_);
setVA("11.11.2019", "20:00", title_series("jazztage", "Highlight Samy Deluxe & das DLX Ensemble präsentieren: SAMTV UNPLUGGED LIVE", "", "", "", "","2019"), _FESTSAAL_);
setVA("27.11.2019", "20:00", title("triosence - \"Scoripio Rising\"", "https://triosence.com/", "Zur Homepage"), _DIAGONAL_);

setVA("04.12.2019", "20:00", title("Hotel Bossa Nova", "http://hotelbossanova.com/", "Zur Homepage"), _DIAGONAL_);
setVA("05.12.2019", "20:00", title("Django Reinhardt Night", "", "", "Grappelli Tribute Trio Giovanni Weiss: Django Deluxe feat. Jamaine Landsberger"), _AUDI_FORUM_);
setVA("11.12.2019", "20:00", title("Home for Christmas - Lisa Wahlmandt & Band"), _DIAGONAL_);
setVA("12.12.2019", "20:00", title_series("session"), _DIAGONAL_, null, null, "session");
setVA("15.12.2019", "19:30", title("Wer Dablost's?", "", "", "Kleinkunst Mixshow mit Andreas M. Hofmeir"), _HALLE_NEUN_);
setVA("26.12.2019", "20:00", title("RAD GUMBO live im diagonal"), _DIAGONAL_);
setVA("27.12.2019", "20:00", title("Fat Toni"), _DIAGONAL_);
setVA("28.12.2019", "20:00", title("Kapuze - Zwischen den Jahren"), _DIAGONAL_);

setVA("04.01.2020", "20:00", title("Downtown Blues Band"), _NEUE_WELT_);
setVA("05.01.2020", "19:30", title("GProject Blues Band's new year Bash 2020"), _DIAGONAL_);
setVA("12.01.2020", "11:00", title("Jazz Brunch", "https://www.kraiberg-jazz-band.de/", "Zur Homepage", "mit der Kraiberg Jazz Band"), "Pizzaria Colosseo Gaimersheim");
setVA("19.01.2020", "20:00", title_series("session", "", "", "", "mit Teuschel, Schiekofer, Diewok"), _DIAGONAL_, null, null, "session");
setVA("23.01.2020", "20:00", title("Dutch Swing College Band"), _AUDI_FORUM_);

setVA("01.02.2020", "20:00", title("High Soulciety Konzert"), _DIAGONAL_);
setVA("05.02.2020", "20:00", title("Seba Kaapstad", "http://www.kaapstad-music.com/", "Zur Homepage"), _DIAGONAL_);
setVA("09.02.2020", "11:00", title("Jazz & Literatur", "", "", "mit dem Benedikt Streicher Trio"), _FOYER_STADTTHEATER_);
setVA("09.02.2020", "19:00", title("Ingolstadt KU Bigband meets Stromlos Bigband"), _HARDERBASTEI_);
setVA("12.02.2020", "20:00", title("Martin Taylor & Ulf Wakenius"), _DIAGONAL_);
setVA("16.02.2020", "20:00", title_Series("session", "", "", "", "mit Bernhard Reitberger & Friends"), _DIAGONAL_, null, null, "session");
setVA("20.02.2020", "20:00", title("Dominic Miller & Band"), _AUDI_FORUM_);

setVA("04.03.2020", "20:00", title("Adam Ben Ezra", "https://www.adambenezra.com/", "Zur Homepage"), _DIAGONAL_);
setVA("15.03.2020", "20:00", title_series("session", "", "", "", "mit Bernhard Reitberger & Friends"), _DIAGONAL_, null, null, "session");
setVA("26.03.2020", "20:00", title("Cuban Jazz Unit - Celebrating McCoy Tyner"), _AUDI_FORUM_);
setVA("26.03.2020", "19:00", title("JAZZ please! live bei \"SynTon\""), _HARDERBASTEI_);
setVA("29.03.2020", "11:00", title("Jazz & Literatur", "http://www.close2jazz.de/", "Zur Homepage", "mit Close2Jazz"), _FOYER_STADTTHEATER_);

setVA("01.04.2020", "20:00", title("Carsten Lindholm Trio", "https://carstenlindholm.dk/", "Zur Homepage"), _DIAGONAL_);
setVA("26.04.2020", "11:00", title("Jazz & Literatur", "", "", "", "mit Reitberger/ Schnattinger/ Matschi/ Diewock"), _FOYER_STADTTHEATER_);
setVA("26.04.2020", "20:00", title_series("session", "", "", "", "mit Bernhard Reitberger & Friends"), _DIAGONAL_, null, null, "session");
setVA("29.04.2020", "20:00", title("Ida Nielsen & The Funkbots", "http://www.idanielsenbass.com/", "Zur Homepage"), _DIAGONAL_);
setVA("30.04.2020", "20:00", title("Albie Donnelly's Supercharge"), _AUDI_FORUM_);

setVA("06.05.2020", "20:00", title("Tini Thomsen's MaxSax", "http://www.tinithomsen.de/", "Zur Homepage"), _DIAGONAL_);
setVA("10.05.2020", "11:00", title("Jazz & Literatur", "", "", "online!"), _FOYER_STADTTHEATER_);
setVA("13.05.2020", "20:00", title("Alexandrina Simeon Quintett meets BEnny Brown", "www.alexandrina-simeon.de", "Zur Homepage"), _DIAGONAL_, null, null, "session");
setVA("17.05.2020", "20:00", title_series("session", "", "", "", "mit Bernhard Reitberger & Friends"), _DIAGONAL_);
setVA("28.05.2020", "20:00", title("Mayito Rivera & Sons of Cuba"), _AUDI_FORUM_);
setVA("31.05.2020", "11:00", title("Jazzfrühschoppen", "", "", "", "mit der Bourbon Street Jazzband"), "Landesgartenschau Ingolstadt");

setVA("21.06.2020", "20:00", title_series("session", "", "", "", "mit Quirin Birzer"), _DIAGONAL_, null, null, "session");
setVA("28.06.2020", "11:00", title("Jazzfrühschoppen", "", "", "", "mit Teuschel/ Schiekofer/ Diewok"), "Landesgartenschau Ingolstadt");

setVA("17.09.2020", "20:00", title("SwingIN Bigband", "http://www.swingin-bigband.de/", "Zur Homepage"), _AUDI_FORUM_);



?>
