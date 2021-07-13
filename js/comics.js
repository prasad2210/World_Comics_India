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

const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");
const whatsappBtn = document.querySelector(".whatsapp-btn");

function init(){

  let postUrl = document.location.href;
  // let postUrl = 'http://cybersalamat.com/comics.php';
  let postTitle = "Hii everyone, Please check this page. I found it funny";
  
  postUrl = encodeURI(postUrl);

  console.log(postUrl);

  facebookBtn.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}`);
  twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}&hashtags=cybersalamat,worldComicIndia,cyberSecurity`);
  linkedinBtn.setAttribute("href", `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}&summary${postTitle}`);
  whatsappBtn.setAttribute("href", `https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`);

}
init();
