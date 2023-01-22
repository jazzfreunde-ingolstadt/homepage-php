import "./styles/app.css";
import $ from "jquery";

global.documentReady = $.Deferred();

$(() => {
  documentReady.resolve();
});
