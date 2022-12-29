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

const fetchFeaturedEvents = async () => {
  try {
    return await $.ajax({
      url: "/api/events",
      type: "get",
      dataType: "json",
      data: {
        "start[after]": new Date().toISOString(),
        "order[start]": "asc",
        itemsPerPage: 4,
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
