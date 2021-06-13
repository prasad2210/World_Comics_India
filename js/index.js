// console.log("sdfsg");
let nav = document.querySelector("nav");

window.addEventListener("scroll", function () {
  if (window.pageYOffset > 130) {
    // nav.classList.remove("navbar-dark");
    // nav.classList.add("bg-white", "shadow");
    $(".nav-title-div").css("visibility", "visible");
  } else {
    // nav.classList.remove("bg-white", "shadow");
    // nav.classList.add("navbar-dark");
    $(".nav-title-div").css("visibility", "hidden");
  }
});

var scrollDistance, distFromTop, windowWidth, horLength, verticalDist;
var a = [];
var b = [];
calcHeight();
function calcHeight() {
  windowWidth = window.innerWidth;
  horLength = document.querySelector(".element-wrapper").scrollWidth;
  verticalDist = $(".element-wrapper").innerHeight();
  distFromTop = document.querySelector(".horizontal-section").offsetTop;
  scrollDistance = distFromTop + horLength - windowWidth;
  document.querySelector(".horizontal-section").style.height =
    horLength + verticalDist + 200 - windowWidth + "px";

  console.log(
    windowWidth + " " + horLength + " " + distFromTop + " " + scrollDistance
  );
  for (let i = 0; i <= 10; i++) {
    a[i] =
      $(".bubble" + (i + 1)).offset().left + distFromTop + 200 - windowWidth;
    b[i] = a[i] + windowWidth;
  }
}
window.onscroll = function () {
  var scrollTop = window.pageYOffset;

  if (scrollTop >= distFromTop && scrollTop <= scrollDistance) {
    document.querySelector(".element-wrapper").style.transform =
      "translateX(-" + (scrollTop - distFromTop) + "px)";
  } else if (scrollTop < distFromTop) {
    document.querySelector(".element-wrapper").style.transform =
      "translateX(" + 0 + "px)";
  } else if (scrollTop > scrollDistance) {
    document.querySelector(".element-wrapper").style.transform =
      "translateX(-" + (horLength - windowWidth) + "px)";
  }
  fadeinOut();
};

function fadeinOut() {
  // console.log("a==>",a);

  if(windowWidth >=991){
    var scrolldist = window.pageYOffset;

    for (let i = 0; i <= 10; i++) {
      if (scrolldist >= a[i] && scrolldist <= (a[i] + b[i]) / 2) {
        $(".bubble"+(i+1)).css("opacity", (2 * 1.25* (scrolldist - a[i])) / (b[i] - a[i]));
        // console.log((scrolldist-a) / (b-a));
      } else if (scrolldist > (a[i] + b[i]) / 2 && scrolldist <= b[i]) {
        $(".bubble"+(i+1)).css("opacity", (2 * 1.25 * (scrolldist - b[i])) / (a[i] - b[i]));
      }
    }
  }
  

  // if (scrolldist >= a && scrolldist <= (a + b) / 2) {
  //   $(".bubble1").css("opacity", (2 * (scrolldist - a)) / (b - a));
  //   // console.log((scrolldist-a) / (b-a));
  // } else if (scrolldist > (a + b) / 2 && scrolldist <= b) {
  //   $(".bubble1").css("opacity", (2 * (scrolldist - b)) / (a - b));
  // }
}

document.getElementById("playpause1").addEventListener("click", function () {
  var audio = document.getElementById("track1");
  if (this.className == "is-playing") {
    this.className = "";
    this.src = "./images/play.png";
    audio.pause();
  } else {
    this.className = "is-playing";
    this.src = "./images/pause.png";
    audio.play();
  }
});

document.getElementById("playpause2").addEventListener("click", function () {
  var audio = document.getElementById("track2");
  if (this.className == "is-playing") {
    this.className = "";
    this.src = "./images/play.png";
    audio.pause();
  } else {
    this.className = "is-playing";
    this.src = "./images/pause.png";
    audio.play();
  }
});

document.getElementById("playpause3").addEventListener("click", function () {
  var audio = document.getElementById("track3");
  if (this.className == "is-playing") {
    this.className = "";
    this.src = "./images/play.png";
    audio.pause();
  } else {
    this.className = "is-playing";
    this.src = "./images/pause.png";
    audio.play();
  }
});
