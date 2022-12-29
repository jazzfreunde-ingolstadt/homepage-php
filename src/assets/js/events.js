import $ from "jquery";

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

const fillTemplate = function (template, event) {
  let start = new Date(
    typeof event.start === "string" ? event.start : event.start.date
  );
  template.attr("event-id", event.id);
  template.find(".event_weekday").html(wochentag[start.getDay()]);
  template.find(".event_date").html(start.toLocaleDateString("de-DE"));
  template
    .find(".event_time")
    .html(
      start.toLocaleTimeString("de-DE", { hour: "2-digit", minute: "2-digit" })
    );
  template.find(".event_titel").html(event.titel);
  template.find(".event_subtitel").html(event.subtitel ?? "");
  template.find(".event_location").html(event.ort.name);
  let link = template.find(".event_link");
  if (event.link.length) {
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
export { fillTemplate };
