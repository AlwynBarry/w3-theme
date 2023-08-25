/**
 * Name			scroll-to-top
 * Descripton	Scripts to create a w3.css based scroll to top button
 * @author		Alwyn Barry from code provided by w3schools: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
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
 * When the user scrolls down 20px from the top of the document, show the button
 */
document.addEventListener("scroll", scrollButtonReveal);

function scrollButtonReveal() {
  if ((document.body.scrollTop > 80) || (document.documentElement.scrollTop > 80)) {
    document.getElementById("scroll-to-top").style.display = "block";
  } else {
    document.getElementById("scroll-to-top").style.display = "none";
  }
}

/**
 * When the user clicks on the button, scroll to the top of the document
 */
function scrollToTop() {
  document.body.scrollTop = 0; /* For Safari */
  document.documentElement.scrollTop = 0; /* For Chrome, Firefox, IE and Opera */
} 

