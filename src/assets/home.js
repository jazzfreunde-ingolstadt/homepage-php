import events, { fillTemplate } from "./js/events.js";
import $ from "jquery";

$.when(events.featured(), documentReady).done((eventData) => {
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

  $.each(eventData, (index, event) => {
    fillTemplate(template.clone(), event).removeClass("d-none").appendTo(widget);
  });
});
