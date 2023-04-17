window.onscroll = function() {myFunction()};
var scritteLogo = document.getElementById("scritte-logo")
var navlogo = document.getElementById("nav-logo");
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    navlogo.classList.remove("d-none");  
  } else {
    navbar.classList.remove("sticky");
    navlogo.classList.add("d-none"); 
  }
}
