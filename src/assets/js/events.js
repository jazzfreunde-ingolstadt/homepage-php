const $ = require("jquery");

const wochentag = [
  "Sonntag",
  "Montag",
  "Dienstag",
  "Mittwoch",
  "Donnerstag",
  "Freitag",
  "Samstag",
];

const today = new Date();
const archiveDaysAfter = 90;

let archiveDate = new Date();
archiveDate.setDate(today.getDate() - archiveDaysAfter);

let documentReady = $.Deferred();

const fillTemplate = function (template, event) {
  let start = new Date(
    typeof event.start === "string" ? event.start : event.start.date
  );
  template.attr("event-id", event.id);
  template.find(".event_weekday").append(wochentag[start.getDay()]);
  template.find(".event_date").append(start.toLocaleDateString("de-DE"));
  template
    .find(".event_time")
    .append(
      start.toLocaleTimeString("de-DE", { hour: "2-digit", minute: "2-digit" })
    );
  template.find(".event_titel").append(event.titel);
  template.find(".event_subtitel").append(event.subtitel ?? "");
  template.find(".event_location").append(event.ort.name);
  let link = template.find(".event_link");
  if (event.link.length) {
    link.attr("href", event.link);
    link.text(event.link);
  } else {
    link.remove();
  }

  return template;
};

const fillEventList = function (listId, eventData) {
  const table = $(`#${listId}`);
  const list = table.find(".eventlist_body");

  list.find(".placeholder_while_loading").remove();

  const template = table
    .find(".event-item-template")
    .clone()
    .removeClass("event-item-template");
  const sampleData = template.attr("data-sample-events") ?? "";

  if (!eventData.length && sampleData) {
    eventData = jQuery.parseJSON(sampleData);
  }

  if (sampleData) {
    template.removeAttr("data-sample-events");
  }

  if (!eventData.length) {
    list.find(".eventlist_empty").removeClass("d-none");

    return;
  }

  list.empty();

  $.each(eventData, function (index, event) {
    fillTemplate(template.clone(), event).removeClass("d-none").appendTo(list);
  });
};

const upcomingEvents = $.ajax({
  url: '/api/events',
  type: "get",
  dataType: "json",
  data: {
    "start[after]": new Date().toISOString(),
    "order[start]": "asc",
  },
});

const pastEvents = $.ajax({
  url: '/api/events',
  type: "get",
  dataType: "json",
  data: {
    "start[before]": new Date().toISOString(),
    "start[after]": archiveDate.toISOString(),
    "order[start]": "desc",
  },
});

$.when(upcomingEvents, documentReady).done(function (data) {
  fillEventList("upcoming_events", data.shift() ?? []);
});

$.when(pastEvents, documentReady).done(function (data) {
  fillEventList("past_events", data.shift() ?? []);
});

$(document).ready(function () {
  documentReady.resolve();

  var archivedEventsDataCache;

  $("#show_archived").click(function () {
    $("#archived_events_container").show();

    if (undefined !== archivedEventsDataCache) {
      return;
    }

    $.ajax({
      url: '/api/events',
      type: "get",
      dataType: "json",
      data: {
        "start[before]": archiveDate.toISOString(),
        "order[start]": "desc",
      },
    }).done(function (data) {
      archivedEventsDataCache = data;

      fillEventList("archived_events", data);
    });
  });

  $("#hide_archived").on('cick', function () {
    $("#archived_events_container").hide();
  });
});
