import $ from "jquery";
import { DateTime } from "luxon";

const wochentag = [
  undefined,
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

const cacheTemplate = () => {
  return $(".eventlist-item.template")
    .first()
    .clone()
    .removeClass("template");
};

const fillTemplate = function (template, event) {
  let start = typeof event.start === "string" ? DateTime.fromISO(event.start) : DateTime.fromSQL(event.start.date);
  start.setLocale("de-DE");

  template.attr("event-id", event.id);
  template.find(".event_weekday").html(wochentag[start.toFormat("c")]);
  template.find(".event_date").html(start.toLocaleString(DateTime.DATE_SHORT));
  template
    .find(".event_time")
    .html(
      start.toLocaleString(DateTime.TIME_24_SIMPLE)
    );
  template.find(".event_titel").html(event.titel);
  template.find(".event_subtitel").html(event.subtitel ?? "");
  template.find(".event_location").html(event.ort.name);
  let link = template.find(".event_link");
  if (event.link?.length) {
    link.attr("href", event.link);
    link.text(event.link);
  } else {
    link.remove();
  }

  return template;
};

const fetchUpcomingEvents = async () => {
  try {
    return await $.ajax({
      url: "/api/events",
      type: "get",
      dataType: "json",
      data: {
        "start[after]": new Date().toISOString(),
        "order[start]": "asc",
      },
    });
  } catch (error) {
    console.error(error);
  }
};

const fetchPastEvents = async () => {
  try {
    return await $.ajax({
      url: "/api/events",
      type: "get",
      dataType: "json",
      data: {
        "start[before]": new Date().toISOString(),
        "start[after]": archiveDate.toISOString(),
        "order[start]": "desc",
      },
    });
  } catch (error) {
    console.error(error);
  }
};

const fetchArchivedEvents = async () => {
  try {
    return await $.ajax({
      url: "/api/events",
      type: "get",
      dataType: "json",
      data: {
        "start[before]": archiveDate.toISOString(),
        "order[start]": "desc",
      },
    });
  } catch (error) {
    console.error(error);
  }
};

const fetchFeaturedEvents = async (maxCount = 4) => {
  try {
    return await $.ajax({
      url: "/api/events",
      type: "get",
      dataType: "json",
      data: {
        "start[after]": new Date().toISOString(),
        "order[start]": "asc",
        itemsPerPage: maxCount,
      },
    });
  } catch (error) {
    console.error(error);
  }
};

export default {
  upcoming: fetchUpcomingEvents,
  past: fetchPastEvents,
  archived: fetchArchivedEvents,
  featured: fetchFeaturedEvents,
};
export { cacheTemplate, fillTemplate };
