// console.log("sdfsg");

window.addEventListener("load", function () {
  const loader = document.querySelector(".loader");
  loader.className += " hidden"; // class "loader hidden"
  // this.setTimeout(function () {
    const navbar = this.document.querySelector(".navbar");
    navbar.className += " fixed-top";
    if (window.innerWidth < 991) {
      $(".nav-img").attr("width", "40");
      $(".nav-img").attr("height", "40");
    }
    calcHeight();
  // }, 500);
});

let nav = document.querySelector("nav");

window.addEventListener("scroll", function () {
  if (window.innerWidth < 991) {
    $(".nav-img").attr("width", "40");
    $(".nav-img").attr("height", "40");
  } else {
    if (window.pageYOffset > 130) {
      // nav.classList.remove("navbar-dark");
      nav.classList.add("bg-dark");
      $(".nav-title-div").css("font-size", "150%");
      $(".nav-img").attr("width", "40");
      $(".nav-img").attr("height", "40");
    } else {
      nav.classList.remove("bg-dark");
      // nav.classList.add("navbar-dark");
      $(".nav-title-div").css("font-size", "200%");
      $(".nav-img").attr("width", "80");
      $(".nav-img").attr("height", "80");
      // $(".nav-title-div").css("visibility", "hidden");
    }
  }
});

var scrollDistance, distFromTop, windowWidth, horLength, verticalDist;
var a = [];
var b = [];
function calcHeight() {
  windowWidth = window.innerWidth;
  horLength = document.querySelector(".element-wrapper").scrollWidth;
  verticalDist = $(".element-wrapper").innerHeight();
  distFromTop = document.querySelector(".horizontal-section").offsetTop;
  scrollDistance = distFromTop + 2*horLength - 2*windowWidth;
  document.querySelector(".horizontal-section").style.height =
    2*horLength + verticalDist + 270 - 2*windowWidth + "px";

  for (let i = 0; i <= 11; i++) {
    a[i] =
      $(".bubble" + (i + 1)).offset().left*2 + distFromTop + 270 - 2*windowWidth;
    b[i] = a[i] + 2*windowWidth;
  }
}
window.onscroll = function () {
  var scrollTop = window.pageYOffset;

  if (scrollTop >= distFromTop && scrollTop <= scrollDistance) {
    document.querySelector(".element-wrapper").style.transform =
      "translateX(-" + (scrollTop - distFromTop)/2 + "px)";
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

  if (windowWidth >= 991) {
    var scrolldist = window.pageYOffset;

    for (let i = 0; i <= 11; i++) {
      if (scrolldist >= a[i] && scrolldist <= (a[i] + b[i])/2) {
        $(".bubble" + (i + 1)).css(
          "opacity",
          (2 * 0.9 * (scrolldist - a[i])) / (b[i] - a[i])
        );
        // console.log((2 * 0.9 * (scrolldist - a[i])) / (b[i] - a[i]));
        // console.log((scrolldist-a) / (b-a));
      } else if (scrolldist > (a[i] + b[i])/2  && scrolldist <= b[i]) {
        $(".bubble" + (i + 1)).css(
          "opacity",
          (2 * 0.9 * (scrolldist - b[i])) / (a[i] - b[i])
        );
        // console.log((2 * 0.9 * (scrolldist - b[i])) / (a[i] - b[i]));

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

// document.getElementById("playpause1").addEventListener("click", function () {
//   var audio = document.getElementById("track1");
//   if (this.className == "is-playing") {
//     this.className = "";
//     this.src = "./images/play.png";
//     audio.pause();
//   } else {
//     this.className = "is-playing";
//     this.src = "./images/pause.png";
//     audio.play();
//   }
// });

// document.getElementById("playpause2").addEventListener("click", function () {
//   var audio = document.getElementById("track2");
//   if (this.className == "is-playing") {
//     this.className = "";
//     this.src = "./images/play.png";
//     audio.pause();
//   } else {
//     this.className = "is-playing";
//     this.src = "./images/pause.png";
//     audio.play();
//   }
// });

// document.getElementById("playpause3").addEventListener("click", function () {
//   var audio = document.getElementById("track3");
//   if (this.className == "is-playing") {
//     this.className = "";
//     this.src = "./images/play.png";
//     audio.pause();
//   } else {
//     this.className = "is-playing";
//     this.src = "./images/pause.png";
//     audio.play();
//   }
// });

// $('.carousel').carousel({
//   interval: 5000
// })
