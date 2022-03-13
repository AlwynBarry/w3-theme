/**
 * Name: scroll-to-top
 * Descripton: Scripts to create a w3.css based scroll to top button
 * @author: Alwyn Barry from code provided by w3schools: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
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

