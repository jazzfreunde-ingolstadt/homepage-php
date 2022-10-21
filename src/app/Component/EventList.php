<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component;

use Components\Component;
use DateInterval;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\Type\DateTimeSQL;
use Components\Props\Props;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Eventliste
 */
final class EventList extends Component
{
    /**
     * Dependency Injection
     *
     * @param Props $props
     * @param SerializerInterface $serializer
     */
    public function __construct(protected ?Props $props = null, private SerializerInterface $serializer)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function render(): void
    {
        ?>
        <style>
            .d-none {
                display: none;
            }
            
            .eventlist th {
                text-align: left;
            }
        </style>
        <script>
            var wochentag = ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag' ];

            let fillTemplate = function (template, event) {
                let start = new Date(event.start);
                template.find(".event_weekday").append(wochentag[start.getDay()]);
                template.find(".event_date").append(start.toLocaleDateString("de-DE"));
                template.find(".event_time").append(start.toLocaleTimeString());
                template.find(".event_titel").append(event.titel);
                template.find(".event_subtitel").append(event.subtitel ?? "");
                template.find(".event_location").append(event.ort);

                return template;
            }

            let fillEventList = function(listId, eventData) {
                let table = $(`#${listId}`);
                let list = table.find(".eventlist_body");
                
                list.find(".placeholder_while_loading").remove();
                
                if (!eventData.length) {
                    list.find(".eventlist_empty").removeClass("d-none");
                    
                    return;
                }

                let template = table.find(".event-item-template").clone();
                list.empty();
                
                $.each(eventData, function(index, event) {
                    fillTemplate(template.clone(), event).removeClass("d-none").appendTo(list);
                });

            }

            <?php if ($this->props->debug ?? false) { ?>
                var sampleData = <?= $this->serializer->serialize([
                    new Event(id: 1, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTimeSQL())->sub(new DateInterval('P1D')), end: (new DateTimeSQL())->sub(new DateInterval('P1D')), ort: 'Jazzfreunde Club', link: 'jazzfreunde.de'),
                    new Event(id: 2, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTimeSQL())->sub(new DateInterval('P10D')), end: (new DateTimeSQL())->sub(new DateInterval('P10D')), ort: 'Jazzfreunde Club', link: 'jazzfreunde.de'),
                ], 'json') ?>
            <?php } ?>

            $(document).ready(function () {
                fillEventList("upcoming_events", []);
                fillEventList("past_events", sampleData);
                fillEventList("archived_events", sampleData);
            });
        </script>

        <h2>Kommende Veranstaltungen</h2>
        <?php $this->EventList('upcoming_events', 'Im Moment stehen keine Veranstaltungen an.'); ?>

        <p>Auch interessant: Das Programm unserer Partner des <a href="https://www.birdland.de/programm/" target="_blank">Birdland Jazz Club Neuburg</a>!</p>

        <h2>Vergangene Veranstaltungen</h2>
        <?php $this->EventList('past_events', 'Es sind keine vergangenen Veranstaltungen eingetragen.'); ?>

        <h2>Veranstaltungsarchiv</h2>
        <div id="vaarcsw" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;" onclick="document.getElementById('vaarc').style.display = 'block'; document.getElementById('vaarcsw').style.display='none';">Archiv anzeigen</div>
        <div id="vaarc" style="display:none;">
        <?php $this->EventList('archived_events', 'Es befinden sich keine Veranstaltungen im Archiv.'); ?>
            <div id="vaarcsw" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;" onclick="document.getElementById('vaarc').style.display = 'none'; document.getElementById('vaarcsw').style.display='block';">Archiv verbergen</div>
        </div>
        <?php
    }

    /**
     * Rendert eine Liste von Veranstaltungen.
     *
     * @param string $messageOnEmpty Meldung, die angezeigt wird, falls keine Daten vorhanden sind
     * @return void
     */
    private function EventList(string $id, string $messageOnEmpty): void
    {
        ?>
        <table id="<?= $id ?>" class="eventlist" cellspacing="0" cellpadding="3" border="0" width="90%" align="center">
            <thead>
                <tr>
                    <th width="20%">Datum</th>
                    <th width="15%">Zeit</th>
                    <th width="40%">Veranstaltung</th>
                    <th width="25%">Ort</th>
                </tr>
            </thead>
            <tbody class="eventlist_body">
                <tr class="event-item-template d-none">
                    <td>
                        <small class="wochentag"><span class="event_weekday"></span></small><br />
                        <span class="event_date"></span>
                    </td>
                    <td>
                        <span class="event_time"></span>
                    </td>
                    <th>
                        <span class="event_titel"></span>
                        </br><small><span class="event_subtitel"></span></small>
                    </th>
                    <td>
                        <span class="event_location"></span>
                    </td>
                </tr>
                <tr class="eventlist_empty d-none">
                    <td colspan="4" style="padding: 1em;"><?= $messageOnEmpty ?></td>
                </tr>
                <tr class="placeholder_while_loading">
                    <td colspan="4" style="text-align: center; padding: 1em;"><img src="/gfx/icons/loading_icon.gif" style="width: 3em"/></td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    /**
     * Rendert den Bearbeitungsmodus
     *
     * @return void
     */
    private function renderEditModul(): void
    {
        ?>
        <form action="<?= "/termine/edit/" ?>" method="post">
            <table class="termine" cellspacing="0" cellpadding="3" border="0" width="90%" align="center">
            <thead>
                <tr>
                    <th width="20%">Datum</th>
                    <th width="15%">Zeit</th>
                    <th width="40%">Veranstaltung</th>
                    <th width="25%">Ort</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="start">Beginn:</label><br>
                        <input type="datetime-local" id="start" name="start"><br>
                        <label for="ende">Ende:</label><br>
                        <input type="datetime-local" id="ende" name="ende"><br>
                    </td>
                    <td></td>
                    <td>
                        <label for="titel">Titel:</label><br>
                        <input type="text" id="titel" name="titel"><br>
                        <label for="subtitel">Subtitel:</label><br>
                        <input type="text" id="subtitel" name="subtitel"><br>
                        <label for="link">Link:</label><br>
                        <input type="url" id="link" name="link"><br>
                    </td>
                    <td>
                        <label for="ort">Ort:</label><br>
                        <input type="text" id="ort" name="ort"><br>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Veranstaltung hinzufügen">
        </form>
        <?php
    }
}
