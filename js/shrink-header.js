/**
 * Name: shrink-header.js
 * 
 * Descripton: Script to shrink the web page header to a smaller version when the page is scrolled down.
 * 
 * @author: Alwyn Barry
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
 * When the user scrolls down 90px from the top of the document, shrink the header
 */
document.addEventListener("scroll", scrollHeaderShrink);

function scrollHeaderShrink() {
  if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
    document.getElementById("masthead").classList.add("shrink");
  } else {
    document.getElementById("masthead").classList.remove("shrink");
  }
} 

