console.log("sdfsg");
let nav = document.querySelector("nav");

window.addEventListener("scroll", function () {
  if (window.pageYOffset > 100) {
    nav.classList.remove("navbar-dark");
    nav.classList.add("bg-white", "shadow", "navbar-light");
  } else {
    nav.classList.remove("bg-white", "shadow", "navbar-light");
    nav.classList.add("navbar-dark");
  }
});

var scrollDistance, distFromTop, windowWidth, horLength, verticalDist;
calcHeight();
function calcHeight(){

windowWidth = window.innerWidth;
horLength = document.querySelector(".element-wrapper").scrollWidth;
verticalDist = $(".element-wrapper").innerHeight();
distFromTop = document.querySelector(".horizontal-section").offsetTop;
scrollDistance = distFromTop + horLength - windowWidth;
document.querySelector(".horizontal-section").style.height = horLength + verticalDist + 200 - windowWidth  + "px";

console.log(windowWidth+' '+horLength+ ' '+ distFromTop+' '+scrollDistance);

}
window.onscroll = function () {
  var scrollTop = window.pageYOffset;

  if (scrollTop >= distFromTop && scrollTop <= scrollDistance) {
    document.querySelector(".element-wrapper").style.transform =
      "translateX(-" + (scrollTop - distFromTop) + "px)";
  }
  else if(scrollTop < distFromTop){
    document.querySelector(".element-wrapper").style.transform =
    "translateX(" + (0) + "px)";
  }
  else if(scrollTop > scrollDistance){
    document.querySelector(".element-wrapper").style.transform =
      "translateX(-" + (horLength- windowWidth) + "px)";

  }
};
