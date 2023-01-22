import events, { cacheTemplate, fillTemplate } from "./js/events.js";
import $ from "jquery";

const getList = (listId) => {
  return $(`#${listId}`);
};

const fillEventList = (list, template, eventData) => {
  const sampleData = template.attr("data-sample-events") ?? "";

  if (!eventData.length && sampleData) {
    eventData = JSON.parse(sampleData);
  }

  if (sampleData) {
    template.removeAttr("data-sample-events");
  }

  if (!eventData.length) {
    list.find(".eventlist_empty").removeClass("hidden");

    return;
  }

  list.find(".eventlist-item.template").remove();

  $.each(eventData, function (index, event) {
    fillTemplate(template.clone(), event).appendTo(list);
  });
};

var deferTemplateLoading = $.Deferred();
var archivedEventsDataCache;

$.when(events.upcoming(), deferTemplateLoading).done((data, template) => {
  const list = getList("upcoming_events");
  fillEventList(list, template, data ?? []);
});

$.when(events.past(), deferTemplateLoading).done((data, template) => {
  const list = getList("past_events");
  fillEventList(list, template, data ?? []);
});

$.when(documentReady).done(() => {
  const template = cacheTemplate();
  deferTemplateLoading.resolve(template);

  $("#show_archived").on('click', () => {
    $("#archived_events_container").show();

    if (undefined !== archivedEventsDataCache) {
      return;
    }

    events.archived().then((data) => {
      const list = getList("archived_events");
      
      archivedEventsDataCache = data;

      fillEventList(list, template, data);
    });
  });

  $("#hide_archived").on("click", () => {
    $("#archived_events_container").hide();
  });
});
