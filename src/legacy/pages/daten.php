<?
  if (defined("PAGE")) die("Wrong reference.");
  define("PAGE", "ueberuns");
  define("TITLE", "Datenerhebung und Datenschutz");
  
  include_once __DIR__ . "/../inc/environment.php";
  
  head();
  before();
?>

<h1>Datenerhebung und Datenschutz</h1>

<h2>Erhobene Daten beim Besuch der Homepage</h2>

<p>Wenn Sie unsere Homepage besuchen und sich nur die Inhalte ansehen, speichern die Jazzfreunde Ingolstadt keinerlei Informationen über Sie, Ihren Browser, Ihr Betriebssystem, Ihr Surfverhalten o.&nbsp;Ä. ab. Ebenso speichern wir keine Cookies auf Ihrem Rechner ab. Bei uns beginnt der Datenschutz bereits damit, so wenige Daten wie möglich zu erheben.</p>
<p>Wie bei den meisten anderen Webangeboten auch werden vom Webhoster anonymisierte Zugriffsstatistiken erstellt, welche von uns eingesehen werden können. Zwar werden hier unter anderem die oben genannte Daten ermittelt, jedoch einfach nur gezählt, ohne dass ein Rückschluss auf einzelne Benutzer möglich ist. Eine Verknüpfung der Daten (beispielsweise wann ein Nutzer eines bestimmten Browsers über eine bestimmte IP-Adresse welche Seite geladen hat) ist also nicht möglich.</p>
<p>Allerdings ist es möglich und auch wahrscheinlich, dass zusätzlich Daten Ihres Besuches bei unserem oder Ihrem Provider ermittelt und auf längere Zeit gespeichert werden – darauf können wir jedoch keinen Einfluss nehmen und auf die Daten auch nicht zugreifen. Inwieweit der Provider diese von ihm gesammelten Daten weitergibt, erfahren Sie in dessen Datenschutzrichtlinien. Unser Provider ist <a href="https://www.ionos.de/" target="_blank">IONOS</a>.</p>

<h2>Kontakt und E-Mail</h2>

<p>Um uns vor einer Flut von ungewünschten Werbemails zu schützen, veröffentlichen wir keine E-Mail-Adressen in maschinenlesbarer Form auf unserer Internetpräsenz. Diese Werbemails (besser bekannt als „Spam“) werden von automatischen Programmen (sogenannten „Spambots“) erstellt. Diese durchforsten Webseiten gezielt nach E-Mail-Adressen. Um mit uns in Kontakt zu treten, müssen Sie daher einige „Hürden“ überwinden, um sich als Mensch zu identifizieren. Die meisten dieser Hürden bemerken Sie nicht einmal, da sie auf das Verhalten der Spambots zugeschnitten sind und für Sie daher nicht sichtbar sein müssen.</p>
<p>Falls sie kein JavaScript benutzen, bleibt Ihnen leider nicht erspart, zum Anzeigen der E-Mail-Adresse oder zum Versenden einer Mail über das Kontaktformular zwei Haken zu verändern: Zum einen müssen Sie zustimmen (Haken setzen), dass sie keine Werbung oder unerwünschte Mails an den Empfänger senden. Zum anderen müssen Sie den Haken entfernen, welcher die Nachricht als Spam markiert. Dieser erscheint auch immer wieder nach einem Sendeversuch. Keine Angst – wenn Sie den Haken vergessen wird zu entfernen, werden Sie darauf hingewiesen; Ihre Nachricht wird nicht einfach gelöscht.</p>
<p>Das Spiel mit den Haken mag Ihnen vielleicht umständlich vorkommen, ist aber eine sehr einfache, dennoch effektive und trotzdem <strong>barrierefreie</strong> Art des Spamschutzes. Die andere Methode trifft man viel öfter im Internet an: Das sogenannte „Captcha“. Hierbei muss man aus einem Bild verzerrte Buchstaben abtippen, um sich als Mensch zu identifizieren. Allerdings haben dabei z.&nbsp;B. blinde Menschen, die einen Screenreader benutzen, das Nachsehen. (Übrigens: Blinde Menschen sind im Internet gar nicht so selten anzutreffen, wie man immer glaubt!) Zudem lassen sich einige Captchas nicht vernünftig lesen, sodass das Abschicken einer Nachricht zum Ratespiel wird. Viele der zu findenden Lösungen sind auch ohne JavaScript und Cookies gar nicht nutzbar – dies ist hier nicht der Fall, JavaScript vereinfacht hier nur die Datenangabe.</p>
<p>Im Kontaktformular werden Sie darum gebeten, Ihren Namen und Ihre Mail-Adresse zu hinterlegen. Dies wird in der E-Mail dazu benutzt, eine Absenderangabe zu erstellen, die in die Mail mit eingebunden wird. Ihr Name und Ihre Mail-Adresse werden auf dem Server in keine Datenbank aufgenommen. Allerdings ist es natürlich möglich, dass der Empfänger der E-Mail Ihre Daten mit seinem Mail-Client bei sich auf dem Rechner (oder über einen Web-Client bei sich auf seinem Account seines Mail-Providers) speichert. Dies kann aber genauso bei E-Mails der Fall sein, welche Sie von Ihrem Mail-Client aus an die Person schreiben – auf unserem Server wird aus Ihren eingegebenen Daten einfach eine ganz normale E-Mail erstellt, welche auch gleich verschickt wird. Wenn Sie eine Kopie der Mail anfordern, trägt Sie der Server als „Blindkopie-Empfänger“ in die E-Mail ein. Sie erhalten also die selbe Mail wie der Empfänger.</p>
<p>Sie können uns auch Mails direkt mit Ihrem Mail-Client schreiben, die Mail-Adresse des Empfängers wird im Kontaktformular oben angezeigt; sollten Sie kein JavaScript nutzen, klicken Sie dazu einfach auf den Button zum Anzeigen der Mail-Adresse (vergessen Sie aber die Haken unten nicht). Natürlich brauchen Sie auf eine Antwort von uns nicht wieder das Kontaktformular verwenden; verfahren Sie einfach, wie sie es von allen anderen E-Mail-Korrespondenzen auch gewohnt sind.</p>
<p>Unter dem Aspekt des Spamschutzes wird beim Laden des Mail-Formulares auch Ihre IP-Adresse abgefragt. Diese wird bereits bei der Abfrage teilweise verschleiert. Das bedeutet konkret: Von den 4 Byte der IP-Adresse (z.&nbsp;B. <tt>192.168.120.157</tt>) wird das dritte Byte unkenntlich gemacht (im Beispiel dann: <tt>192.168.XX.157</tt>). Diese uneindeutige Adresse wird verdeckt im Formular gespeichert und beim Klick auf einen Button auch mit an den Server übertragen. Auf dem Server wird dann erneut die teilweise verschleierte IP-Adresse ermittelt und mit der gesendeten verglichen. Stimmen die IP-Adressen nicht überein, so wird eine Meldung ausgegeben, anstatt die Nachricht zu senden (bzw. die Mail-Adresse anzuzeigen). Somit können wir Spambots aussperren, die willkürlich in jedes vorhandene Feld Informationen hineinschreiben. Auch direkte „Angriffe“, die gar nicht über das Formular gehen, sondern die Daten gleich direkt senden, werden dadurch erschwert. Die ermittelte IP-Adresse wird weder in der E-Mail versendet, noch auf dem Server gespeichert.<p>

<h2>Online-Mitgliedsantrag</h2>
<p>Die beim Online-Mitgliedsantrag mit einem Sternchen gekennzeichneten Felder sind Pflichtfelder. Diese Felder müssen Sie auch ausfüllen, wenn Sie einen ganz normalen Mitgliedsantrag (auf Papier) bei uns ausfüllen. Die von Ihnen eingegebenen Daten werden in eine E-Mail verpackt und an die im Verein zuständige Person (üblicherweise an den Schatzmeister) verschickt und werden nicht auf dem Server gespeichert. Die per Mail übermittelten Daten werden zunächst als vorläufige Mitgliedschaft behandelt; Sobald der Jahresbeitrag des ersten Jahres bei den Jazzfreunden eingegangen ist, wird die Mitgliedschaft fest eingetragen; nach vier Wochen ohne Zahlungseingang wird die Mitgliedschaft als nie beantragt behandelt; dennoch bleibt möglicherweise die Mail mit dem Antrag auf Mitgliedschaft in einer Datensicherung vorhanden. Die Verwaltung der Kartei der Mitglieder obliegt dem Vereinsvorstand, der diese Aufgabe mit bestem Wissen und Gewissen und im Blick auf die Satzung des Vereins, das geltende deutsche Recht und die gute Sitte durchführt.</p>
<p>Die im Online-Mitgliedsantrag angegebenen Daten werden über eine ungesicherte Verbindung übertragen. Ebenso wird die E-Mail-Benachrichtigung vom Server an die zuständige Person ungesichert übertragen. Dies bedeutet, dass es theoretisch möglich ist, dass die Verbindung von Dritten mitgehört und die übermittelten Daten ausgelesen wird.</p>

<h2>Logging von IP-Adressen und Zeitstempeln</h2>
<p>Bei uns werden im Moment keine IP-Adressen gespeichert. Dennoch behalten wir uns vor, die vollständigen IP-Adressen von (befugten und unbefugten) Zugriffen und Zugriffsversuchen auf zugriffsbeschränkte Bereiche (z.&nbsp;B. Administration) sowie von fehlgeschlagenen Versuchen, Nachrichten zu übermitteln<!-- oder sich interaktiv an der Homepage zu beteiligen-->, zusammen mit dem Zeitstempel und ggf. dem übermittelten Inhalt in einer Datenbank zu speichern, um besser Gegenmaßnahmen einleiten zu können. Sollte eine solche Datenbank eingerichtet werden, werden Sie hier genauer darüber informiert, bis jetzt ist jedoch noch nichts konkretes in Planung und auch noch kein Bedarf dafür vorhanden.</p>

<h2>Daten außerhalb der Internetpräsenz</h2>
<p>Um Auskunft über den Umgang mit Ihren Daten im Verein außerhalb der Internetpräsenz zu erhalten, können Sie sich gerne per E-Mail an den <a href="/kontakt/?to=wewer" title="Kontaktformular">ersten Vorsitzenden</a> des Vereins wenden. Dort bekommen Sie im Detail Auskunft über die Speicherung und Verwendung der Daten. Allgemein werden die Daten nach geltendem deutschen Recht, der Vereinssatzung und der guten Sitte behandelt. (Somit ist beispielsweise ein Verkauf Ihrer persönlichen Daten definitiv ausgeschlossen, da dies mit den Zielen des Vereins nicht vereinbar wäre.)</p>

<h2>Weitergabe von Daten</h2>
<p>Gesetzlich sind wir dazu verpflichtet, unter bestimmten Bedingungen in laufenden Strafverfahren auf Anfrage Daten an die Ermittlungsbehörden zu übermitteln. Dies betrifft allerdings nur einzelne Daten, die mit der Straftat zu tun haben. Ansonsten werden von uns keinerlei Daten an Dritte weitergegeben.</p>

<h2>Informationen im Detail</h2>
<p>Sollten diese Informationen zur Datenerhebung und zum Datenschutz noch Fragen offen lassen, wird Ihnen der <a href="/kontakt/?to=mayer" title="Kontaktformular">Webmaster</a> des Internetauftrittes auf Nachfrage gerne weitere Informationen geben.</p>

<div class="backlink"><a href="#" onclick="history.back()">Zurück</a></div>

<?
  after();
?>
