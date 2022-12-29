import events, { fillTemplate } from "./js/events.js";
import $ from "jquery";

const fillEventList = (listId, eventData) => {
  const table = $(`#${listId}`);
  const list = table.find(".eventlist_body");

  list.find(".placeholder_while_loading").remove();

  const template = table
    .find(".eventlist-item.template")
    .clone()
    .removeClass("template");
  const sampleData = template.attr("data-sample-events") ?? "";

  if (!eventData.length && sampleData) {
    eventData = JSON.parse(sampleData);
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

$.when(events.upcoming(), documentReady).done((data) => {
  fillEventList("upcoming_events", data?.shift() ?? []);
});

$.when(events.past(), documentReady).done((data) => {
  fillEventList("past_events", data ?? []);
});

$.when(documentReady).done(() => {
  var archivedEventsDataCache;

  $("#show_archived").on('click', () => {
    $("#archived_events_container").show();

    if (undefined !== archivedEventsDataCache) {
      return;
    }

    events.archived().then((data) => {
      archivedEventsDataCache = data;

      fillEventList("archived_events", data);
    });
  });

  $("#hide_archived").on("cick", () => {
    $("#archived_events_container").hide();
  });
});
