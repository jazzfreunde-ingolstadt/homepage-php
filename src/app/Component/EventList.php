<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component;

use Components\Component;
use DateInterval;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\Type\DateTimeSQL;
use Components\Props\Props;
use Jazzfreunde\App\Entity\Ort;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
    public function __construct(protected Props $props, private SerializerInterface $serializer, private UrlGeneratorInterface $router)
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
            const wochentag = ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag' ];
            const today = new Date();
            const archiveDaysAfter = 90;

            let archiveDate = new Date();
            archiveDate.setDate(today.getDate() - archiveDaysAfter);

            let documentReady = $.Deferred();

            const fillTemplate = function (template, event) {
                let start = new Date(event.start);
                template.attr("event-id", event.id);
                template.find(".event_weekday").append(wochentag[start.getDay()]);
                template.find(".event_date").append(start.toLocaleDateString("de-DE"));
                template.find(".event_time").append(start.toLocaleTimeString("de-DE", { hour: '2-digit', minute: '2-digit' }));
                template.find(".event_titel").append(event.titel);
                template.find(".event_subtitel").append(event.subtitel ?? "");
                template.find(".event_location").append(event.ort.name);
                let link = template.find(".event_link");
                if (event.link?.length) {
                    link.attr("href", event.link);
                    link.text(event.link);
                } else {
                    link.remove();
                }

                return template;
            }

            const fillEventList = function(listId, eventData) {
                let table = $(`#${listId}`);
                let list = table.find(".eventlist_body");
                
                list.find(".placeholder_while_loading").remove();
                
                if (!eventData.length) {
                    list.find(".eventlist_empty").removeClass("d-none");
                    
                    return;
                }

                let template = table.find(".event-item-template").clone().removeClass("event-item-template");
                list.empty();
                
                $.each(eventData, function(index, event) {
                    fillTemplate(template.clone(), event).removeClass("d-none").appendTo(list);
                });

            }

            let upcomingEvents = $.ajax({
                url: "<?= $this->router->generate('_api_/events.{_format}_get_collection') ?>",
                type: "get",
                dataType: "json",
                data: {
                    "start[after]": new Date().toISOString(),
                    "order[start]": "asc"
                }
            });

            let pastEvents = $.ajax({
                url: "<?= $this->router->generate('_api_/events.{_format}_get_collection') ?>",
                type: "get",
                dataType: "json",
                data: {
                    "start[before]": new Date().toISOString(),
                    "start[after]": archiveDate.toISOString(),
                    "order[start]": "desc"
                }
            });

            $.when(upcomingEvents, documentReady).done(function (data) {
                let upcomingEventsData = data.shift() ?? []

                <?php if ($this->props->debug ?? false) { ?>
                    // Falls keine Testdaten vorhanden sind, stehen hier Dummydaten zur Verfügung.
                    if (!upcomingEventsData.length) {   
                        upcomingEventsData = <?= $this->serializer->serialize([
                            new Event(id: 1, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTimeSQL())->add(new DateInterval('P1D')), end: (new DateTimeSQL())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                            new Event(id: 2, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTimeSQL())->add(new DateInterval('P10D')), end: (new DateTimeSQL())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                        ], 'json') ?>
                    }
                <?php } ?>

                fillEventList("upcoming_events", upcomingEventsData);
            });

            $.when(pastEvents, documentReady).done(function (data) {
                let pastEventsData = data.shift() ?? []

                <?php if ($this->props->debug ?? false) { ?>
                    // Falls keine Testdaten vorhanden sind, stehen hier Dummydaten zur Verfügung.
                    if (!pastEventsData.length) {   
                        pastEventsData = <?= $this->serializer->serialize([
                            new Event(id: 3, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTimeSQL())->sub(new DateInterval('P1D')), end: (new DateTimeSQL())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                            new Event(id: 4, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTimeSQL())->sub(new DateInterval('P10D')), end: (new DateTimeSQL())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                        ], 'json') ?>
                    }
                <?php } ?>

                fillEventList("past_events", pastEventsData);
            });

            $(document).ready(function() {
                documentReady.resolve();

                var archivedEventsDataCache;

                $("#show_archived").click(function() {
                    $("#archived_events_container").show();

                    if (undefined !== archivedEventsDataCache) {
                        return;
                    }

                    $.ajax({
                        url: "<?= $this->router->generate('_api_/events.{_format}_get_collection') ?>",
                        type: "get",
                        dataType: "json",
                        data: {
                            "start[before]": archiveDate.toISOString(),
                            "order[start]": "desc"
                        }
                    }).done(function(archivedEventsData) {
                        <?php if ($this->props->debug ?? false) { ?>
                            // Falls keine Testdaten vorhanden sind, stehen hier Dummydaten zur Verfügung.
                            if (!archivedEventsData.length) {   
                                archivedEventsData = <?= $this->serializer->serialize([
                                    new Event(id: 3, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTimeSQL())->sub(new DateInterval('P1D')), end: (new DateTimeSQL())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                                    new Event(id: 4, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTimeSQL())->sub(new DateInterval('P10D')), end: (new DateTimeSQL())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                                ], 'json') ?>
                            }
                        <?php } ?>

                        archivedEventsDataCache = archivedEventsData;

                        fillEventList("archived_events", archivedEventsData);
                        
                    });
                });

                $("#hide_archived").click(function() {
                    $("#archived_events_container").hide();
                });
            });
        </script>
        <h1>Veranstaltungskalender</h1>
        <h2>Kommende Veranstaltungen</h2>
        <?php $this->EventList('upcoming_events', 'Im Moment stehen keine Veranstaltungen an.'); ?>

        <p>Auch interessant: Das Programm unserer Partner des <a href="https://www.birdland.de/programm/" target="_blank">Birdland Jazz Club Neuburg</a>!</p>

        <h2>Vergangene Veranstaltungen</h2>
        <?php $this->EventList('past_events', 'Es sind keine vergangenen Veranstaltungen eingetragen.'); ?>

        <h2>Veranstaltungsarchiv</h2>
        <div id="show_archived" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;">Archiv anzeigen</div>
        <div id="archived_events_container" style="display:none;">
            <?php $this->EventList('archived_events', 'Es befinden sich keine Veranstaltungen im Archiv.'); ?>
                <div id="hide_archived" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;">Archiv verbergen</div>
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
        <table id="<?= $id ?>" class="eventlist termine" cellspacing="0" cellpadding="3" border="0" width="90%" align="center">
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
                        <a class="event_link" target="_blank"></a> 
                    </th>
                    <td>
                        <span class="event_location"></span>
                    </td>
                </tr>
                <tr class="eventlist_empty d-none">
                    <td colspan="4" style="padding: 1em;"><?= $messageOnEmpty ?></td>
                </tr>
                <tr class="placeholder_while_loading">
                    <td colspan="4" style="text-align: center; padding: 1em;">
                        <noscript>Um Veranstaltungen zu sehen, muss die Verwendung von Javascript zugelassen werden.</br></noscript>    
                        <img src="/gfx/icons/loading_icon.gif" style="width: 3em"/>
                    </td>
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
