<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Content;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Zeigt Informationen zum Verein.
 */
class About implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?>
        <h1>Über den Verein der Jazzfreunde Ingolstadt</h1>
        <h2>… eine kleine Geschichte zur Geschichte der Geschichte der Jazzfreunde Ingolstadt</h2>
        <div class="container px-2 py-4" style="text-align: justify">
            <p>„Es war einmal vor gar nicht allzu langer Zeit…“, so könnte die Geschichte der Entstehung des Jazzfreunde-Vereins beginnen, denn die Idee, die zum Verein führte, klingt beinahe wie ein Märchen.</p>
            <p>Ein kurzer Rückblick: Seit Ende der 1990er Jahre besteht ein reger kulturpolitischer Austausch zwischen den Ingolstädter Jazztagen und dem Jazz und Heritage Festival in New Orleans, der Wiege des Jazz. Verschiedene Delegationen der beiden Städte besuchten sich wiederholt und förderten den Künstleraustausch. Anfang Mai 2004 war erneut eine kleine Abordnung aus Ingolstadt zu Besuch in New Orleans, bestehend aus OB Dr. Alfred Lehmann, dem Kulturreferenten Gabriel Engert, Festivalleiter Jan Rottau und einem der Mitarbeiter für den Austausch, Reimund Domke. Anscheinend beseelt von der brodelnden Jazzatmosphäre in New Orleans schlug der Oberbürgermeister während eines Frühstücks vor: „Gründen wir doch einen Jazzförderverein! Herr Rottau schaut sich da mal um und Herr Domke übernimmt den Vorsitz.“ – Soweit das erhaltene Originalzitat. Aus diesem Geistesblitz sollte sich innerhalb von wenigen Jahren ein blühender Verein entwickeln, der sich intensiv um die Jazzszene in Ingolstadt verdient macht und aus dem Kulturleben Ingolstadts nicht mehr wegzudenken ist.</p>
            <p>Ganz so schnell wie damals angedacht ging es dann aber doch nicht, denn erst am 17.&nbsp;Februar 2005 war es soweit: Nach erfolgter Presseeinladung trafen sich im <i>Neuburger Kasten</i> (Ingolstadt) 19 Jazzfans und legten somit den Grundstein des Vereins. Die mitanwesenden Dr. Lehmann und Herr Engert brachten die Satzung auf den Weg und gaben unserem „Jazzbaby“ den ersten kräftigen Anschub.</p>
            <p>So entstand der anfangs noch manchmal belächelte Verein, dessen Mitgliederzahl sich inzwischen auf ca. 150 entwickelt hat. „Und wenn sie nicht …“</p>
        </div>

        <?= $this->card(
            name: 'Karl Wewer',
            position: 'Erster Vorsitzender, Schriftführer, Newsletter',
            bio: 'Karl Wewer ist aufgewachsen in Datteln (Ruhrgebiet); Studium konstruktiver Ingenieurbau in Bochum, seit 1979 in Ingolstadt – Manager in der IT in einem Automobilunternehmen, jetzt im Ruhestand.<br />
            Er hat in jungen Jahren in mehren Rock- und Beat Bands im Ruhrgebiet Gitarre gespielt. Seit 1991 ist er Gitarrist in der Ingolstädter „<a href="http://www.kraiberg-jazz-band.de">Kraiberg Jazz Band</a>“. Daneben ist er begeisterter Hörer von Livekonzerten mit dem Schwerpunkt Jazz / Blues / Rock.<br />
            Seit 2010 ist er Mitglied im Verein und wurde 2011 zum Schriftführer und 2014 zum ersten Vorsitzenden gewählt; er versendet zudem den Jazz–Newsletter des Vereins.',
            pictureSrc: '/gfx/wewer_pre.png',
            mail: 'wewer',
        ) ?>
        <?= $this->card(
            name: 'Tom Diewock',
            position: 'Stellvertretender Vorsitzender, Sessionkoordinator',
            bio: 'Tom Diewock ist Musiker und stellvertretender Leiter der Musikschule Mainburg. Er spielt neben seiner umfangreichen Unterrichtstätigkeit in einer Vielzahl von Bands verschiedener Stilrichtungen, u.&nbsp;a. Wes Mackey, Keith Thopmson, The Blues Hunt, Fiona Boyes, Jamazzing, 4 Of A Kind, Oliver Wasilesku Trio, Captain’s Bog, The Bomb, Clausius Konrad, Charly Böck Latin Project, Late Night Band der Ingolstädter Jazztage...',
            pictureSrc: '/gfx/diewock_pre.png',
            mail: 'diewock',
        ) ?>
        <?= $this->card(
            name: 'Helmut Bachmaier',
            position: 'Schatzmeister',
            bio: 'Helmut Bachmaier lebt in Ingolstadt und arbeitet in München bei einer internationalen Bank. Er ist seit 2007 Mitglied bei den Jazzfreunden und seit 2020 Schatzmeister. Theater, Kabarett und Livemusik sind in der Freizeit fester Bestandteil.',
            pictureSrc: '/gfx/bachmaier.jpeg',
            mail: 'bachmaier',
        ) ?>
        <?= $this->card(
            name: 'Michael Mayer',
            position: 'Webmaster',
            bio: 'Mit dem Eintritt ins Gymnasium begann Michael Mayer klassische Gitarre zu lernen.
            Weil aber im Schulensemble "Not am Bass" war, machte er seine ersten Erfahrungen am E-Bass, ohne überhaupt die zugehörigen Bassnoten lesen zu können.
            Später kaufte er sich kurzer Hand einen gebrauchten Kontrabass und fing an, darauf umzusetzen, was er sich am E-Bass beigebracht hatte.
            Zu seinen musikalischen Idolen zählen Chic Korea, Frank Zappa, Allan Holdsworth, Jacob Collier, Robert Glasper, Derek Trucks, Joni Mitchell, um nur ein paar wenige zu nennen.
            Privat ist der gelernte Softwareentwickler gerne auf dem Rennrad unterwegs. Dann aber notgedrungen ohne Kontrabass.',
            pictureSrc: '/gfx/mayer_pre.jpg',
            mail: 'mayer',
        ) ?>
        <?php
    }

    /**
     * Anzeige zur Vorstellung der Person.
     *
     * @param string $position
     * @param string $name
     * @param string $bio
     * @param string $pictureSrc
     * @param string $mail
     * @return void
     */
    private function card(string $position, string $name, string $bio, string $pictureSrc, string $mail): void
    {
        static $order = 0;
        $order = ++$order % 2;

        ?>
        <div class="card mb-3">
            <div class="row g-3">
                <div class="col-md-4 order-md-<?= $order ?>">
                    <img src="<?= $pictureSrc ?>" class="img-fluid rounded-start" alt="<?= $name ?>" style="width: 100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $position ?></h5>
                        <p class="card-text"><small class="text-muted"><?= $name ?></small></p>
                        <p class="card-text" style="text-align: justify"><?= $bio ?></p>
                        <p class="card-text">
                            <div class="right"><a class="kontakt" href="/kontakt/?to=<?= $mail ?>" title="Zum Kontaktformular">Kontakt</a></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
