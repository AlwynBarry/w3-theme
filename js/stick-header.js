/**
 * Name: stick-header
 * Descripton: Script to stick the sticky masthead to the top of the page when it gets there.
 * @author: Alwyn Barry from code provided by w3schools: https://www.w3schools.com/howto/howto_js_sticky_header.asp
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

