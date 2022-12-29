import events, { fillTemplate } from "./js/events.js";
import $ from "jquery";

const maxCountEvents = 4;

// Place blank Templates until information has been processed
$.when(documentReady).done(() => {
  const widget = $("#event-widget");
  const template = widget
    .find(".event-widget-card.template")
    .clone()
    .removeClass("template");

  for (var i = 1; i < 4; i++) {
    template.clone().removeClass("d-none").appendTo(widget);
  }
});

$.when(events.featured(maxCountEvents), documentReady).done((eventData) => {
  const widget = $("#event-widget");

  const template = widget
    .find(".event-widget-card.template")
    .clone()
    .removeClass("template");

  const sampleData = template.attr("data-sample-events") ?? "";

  if (!eventData.length && sampleData) {
    eventData = JSON.parse(sampleData);
  }

  if (sampleData) {
    template.removeAttr("data-sample-events");
  }

  widget.empty();

  $.each(eventData.slice(0, maxCountEvents), (index, event) => {
    fillTemplate(template.clone(), event)
      .removeClass("d-none")
      .appendTo(widget);
  });
});
