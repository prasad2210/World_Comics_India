// console.log("sdfsg");
let nav = document.querySelector("nav");

window.addEventListener("scroll", function () {
  if (window.pageYOffset > 130) {
    // nav.classList.remove("navbar-dark");
    // nav.classList.add("bg-white", "shadow");
    $(".nav-title-div").css("display", 'block');
  } else {
    // nav.classList.remove("bg-white", "shadow");
    // nav.classList.add("navbar-dark");
    $(".nav-title-div").css("display", 'none');
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

document.getElementById("playpause1").addEventListener("click", function(){
	var audio = document.getElementById('track1');
  if(this.className == 'is-playing'){
    this.className = "";
    this.src = './images/play.png';
    audio.pause();
  }else{
    this.className = "is-playing";
    this.src = './images/pause.png';
    audio.play();
  }

});


document.getElementById("playpause2").addEventListener("click", function(){
	var audio = document.getElementById('track2');
  if(this.className == 'is-playing'){
    this.className = "";
    this.src = './images/play.png';
    audio.pause();
  }else{
    this.className = "is-playing";
    this.src = './images/pause.png';
    audio.play();
  }

});

document.getElementById("playpause3").addEventListener("click", function(){
	var audio = document.getElementById('track3');
  if(this.className == 'is-playing'){
    this.className = "";
    this.src = './images/play.png';
    audio.pause();
  }else{
    this.className = "is-playing";
    this.src = './images/pause.png';
    audio.play();
  }

});