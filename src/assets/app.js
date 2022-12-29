import "./styles/app.css";
import $ from "jquery";

global.$ = global.jQuery = $;

global.documentReady = $.Deferred();

$(() => {
  documentReady.resolve();
});
