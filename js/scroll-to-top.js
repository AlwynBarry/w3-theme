/**
 * Name: scroll-to-top
 * Descripton: Scripts to create a w3.css based scroll to top button
 * @author: Alwyn Barry from code provided by w3schools: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
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

