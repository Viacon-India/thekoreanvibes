
let icon = document.querySelector(".navbar-c-button-wrapper");
icon.addEventListener("click", () => {
  icon.classList.toggle("clicked");
});

var newMenu = document.querySelector(".navbar-c-button-wrapper");
var dropMenu = document.querySelector(".mobile-menu-content");
closeHam = document.getElementById("close-mobile-menu");

newMenu.addEventListener("click", function () {
  dropMenu.style.transform = "translateX(-0)";
});

closeHam.addEventListener("click", function () {
  dropMenu.style.transform = "translateX(100%)";
});

// nav bar toggle hover and  on click

var menus = document.querySelectorAll(".mobile-ham-accordion");
menus.forEach(function (menu) {
  menu.addEventListener("click", togglePanel);
  menu.addEventListener("mouseover", togglePanel);
  menu.addEventListener("mouseleave", togglePanelOne);
});

function togglePanel() {
  this.classList.toggle("active");
  var newPanel = this.nextElementSibling;
  newPanel.style.maxHeight = newPanel.style.maxHeight
    ? null
    : newPanel.scrollHeight + "px";
}

function togglePanelOne() {
  this.classList.remove("active"); 
  var newPanel = this.nextElementSibling;
  newPanel.style.maxHeight = 0;  
}

// nab bar search bar toggle tab

var modal = document.getElementById("searchModal");
var btn = document.getElementById("searchButton");
var span = document.getElementsByClassName("search-close")[0];
btn.addEventListener("click", function () {
  modal.style.display = "block";
});
span.addEventListener("click", function () {
  modal.style.display = "none";
});
window.addEventListener("click", function (event) {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});


// When the user scrolls the page, execute myFunction 
if (window.location.hash) {
  var hash = window.location.hash;
  if ($(hash).length) {
      if(hash.includes('#comment')){
          $('html, body').animate({
              scrollTop: $(hash).offset().top -300
          }, 2000, 'swing');
      }
      if(hash.includes('#respond')){
          $('html, body').animate({
              scrollTop: $(hash).offset().top -300
          }, 2000, 'swing');
      }
  }
}



$(document).ready(function(){
  // Home Marquee Script
  $('.marquee').marquee();


  // Subscription Button Script
  $('.sidebar-email-box .emaillist form input[type="email"]').attr('placeholder', 'Your Email*').after('<button class="sidebar-email-from-bottom"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.488 0.000976562L8.86709 0.703383L14.3286 5.53116H0V6.46866H14.3286L8.86709 11.2964L9.488 11.9989L16 6.24244V5.75738L9.488 0.000976562Z" fill="#828282" /></svg></button>');
  $('.footer-three-sec .emaillist input[type="submit"]').insertAfter('.footer-three-sec .emaillist input[type="email"]');

  // Share Button Function
  $("button.share-social").click(function (e) {
    e.preventDefault();
    window.open(
      jQuery(this).data("link"),
      "_blank",
      "rel=noopener noreferrer nofollow"
    );
  });

  // Share More Function
  $("button.share-more").click(function () {
    shareData = {
      title: jQuery(this).data("post_title"),
      text: jQuery(this).data("post_text"),
      url: jQuery(this).data("post_url"),
    };
    navigator.share(shareData);
  });

  // Add Alt Tag To Img Script
  let images = document.getElementsByTagName("img");
  for (var i = 0; i < images.length; i++) addAlt(images[i]);
  function addAlt(el) {
    if (el.getAttribute("alt")) return;
    url = el.src;
    let filename = url.substring(url.lastIndexOf("/") + 1);
    if (!filename) {
      filename = "insightsofamerica-img";
    }
    filename = filename.split(".").slice(0, -1).join(".");
    el.setAttribute("alt", filename);
  }
})



// Infinite Scroll
