/**
 * Name: stick-header.js
 * Descripton: Script to stick the sticky masthead to the top of the page when it gets there.

 * @author: Alwyn Barry from code provided by w3schools: https://www.w3schools.com/howto/howto_js_sticky_header.asp
 * @copyright	2021
 * For use in	w3-theme
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.2
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */


/**
 * When the user scrolls down sufficient to obscure what's above the masthead, stick it
 */
document.addEventListener("scroll", scrollStickHeader);

var header = document.getElementById("masthead");
var stickyDistance = header.offsetTop;

function scrollStickHeader() {
  if (document.body.scrollTop > stickyDistance || document.documentElement.scrollTop > stickyDistance) {
    document.getElementById("masthead").classList.add("sticky");
  } else {
    document.getElementById("masthead").classList.remove("sticky");
  }
} 

