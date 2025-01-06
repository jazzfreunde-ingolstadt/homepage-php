import "./styles/app.css";
import './bootstrap.js'
import { registerReactControllerComponents } from '@symfony/ux-react';
import $ from "jquery";

registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));
global.documentReady = $.Deferred();

$(() => {
  documentReady.resolve();

  const body = $("body");
  const navigation = $("#main-navigation");
  const navclose = $(".main-navigation-close");
  const navLogo = $(".nav-logo");

  const menuExpanded = () => "true" == navigation.attr("aria-expanded");
  const isFullScreenMenu = () => "fixed" === navigation.css("position");
  const setExpanded = (expanded) =>
    navigation.attr("aria-expanded", expanded ? "true" : "false");

  const openMenu = () => {
    isFullScreenMenu() && body.addClass("overflow-y-hidden");
    setExpanded(true);
  };

  const closeMenu = () => {
    isFullScreenMenu() && body.removeClass("overflow-y-hidden");
    setExpanded(false);
  };

  const toggleMenu = (event) => {
    isFullScreenMenu() && event.preventDefault();
    menuExpanded() ? closeMenu() : openMenu();
  };

  navLogo.on("click", toggleMenu);
  navclose.on("click", closeMenu);
});
