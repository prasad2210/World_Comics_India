new WOW().init();

var keys = {37: 1, 38: 1, 39: 1, 40: 1};
function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';


window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);



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
    //   calcHeight();
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


let position = [];
$(document).scrollTop(0);



  for(let i = 0; i<6; i++){
    position[i] = $('#edu'+(i+1)).offset().top;
  }

  
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);



function gotoDiv(e, val){
  e.preventDefault();
  // alert("hi");

  // console.log(val);

  let pos = position[val] - 173;
  $(document).scrollTop(pos);
}

window.onscroll = function () {

  var scrollTop = window.pageYOffset;
  if(scrollTop >= (position[0] - 200) && scrollTop <= (position[5] + 0 ) ){
    $('.navVertical').css('display', 'block');

    let divide = (position[5] - position[4]);
    let val = ((scrollTop - position[0])*50)/divide;

    // console.log(val);
    $('.line').css('height', val)

    }else{
      $('.navVertical').css('display', 'none');
    }
}