window.onscroll = function() {myFunction()};
var scritteLogo = document.getElementById("scritte-logo")
var navlogo = document.getElementById("nav-logo");
var navbar = document.getElementById("navbar");
var headerLogo = document.getElementById("header-logo")

var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    navlogo.classList.remove("d-none");
    
  } else {
    navbar.classList.remove("sticky");
  }
  
  // if (window.pageYOffset >= sticky - 110) {
  //   headerLogo.children[0].classList.remove("position-fixed")
  //   for(let element of scritteLogo.children){
  //     element.classList.remove("position-fixed")
  //   }
  // } else {
  //   headerLogo.children[0].classList.add("position-fixed")
  //   for(let element of scritteLogo.children){
  //     element.classList.add("position-fixed")
  //   }
  // }
}

