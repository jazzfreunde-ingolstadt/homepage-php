import events, { fillTemplate } from "./js/events.js";
import $ from "jquery";

let documentReady = $.Deferred();

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

$.when(events.upcomingEvents(), documentReady).done((data) => {
  fillEventList("upcoming_events", data?.shift() ?? []);
});

$.when(events.pastEvents(), documentReady).done((data) => {
  fillEventList("past_events", data ?? []);
});

$(document).ready(() => {
  documentReady.resolve();

  var archivedEventsDataCache;

  $("#show_archived").click(function () {
    $("#archived_events_container").show();

    if (undefined !== archivedEventsDataCache) {
      return;
    }

    events.archivedEvents().then((data) => {
      archivedEventsDataCache = data;

      fillEventList("archived_events", data);
    });
  });

  $("#hide_archived").on("cick", function () {
    $("#archived_events_container").hide();
  });
});
