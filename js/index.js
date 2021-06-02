console.log("sdfsg");
let nav = document.querySelector('nav');

window.addEventListener('scroll', function(){
    if(window.pageYOffset > 100){
        nav.classList.remove('navbar-dark');
        nav.classList.add('bg-white', 'shadow', 'navbar-light');
    }
    else{
        nav.classList.remove('bg-white', 'shadow', 'navbar-light');
        nav.classList.add('navbar-dark');

    }
});