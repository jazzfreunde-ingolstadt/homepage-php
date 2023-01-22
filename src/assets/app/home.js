import events, { cacheTemplate, fillTemplate } from "./js/events.js";
import $ from "jquery";

const maxCountEvents = 3;
var deferTemplateLoading = $.Deferred();

const fillEventWidget = (widget, template, eventData) => {
  const sampleData = template.attr("data-sample-events") ?? "";

  if (!eventData.length && sampleData) {
    eventData = JSON.parse(sampleData);
  }

  if (sampleData) {
    template.removeAttr("data-sample-events");
  }

  widget.find(".eventlist-item.template").remove();

  $.each(eventData.slice(0, maxCountEvents), (index, event) => {
    fillTemplate(template.clone(), event)
      .appendTo(widget);
  });
};

$.when(events.featured(maxCountEvents), deferTemplateLoading).done((data, template) => {
  const widget = $("#event-widget");
  fillEventWidget(widget, template, data ?? [])
});

$.when(documentReady).done(() => {
  const template = cacheTemplate();
  deferTemplateLoading.resolve(template);
});
