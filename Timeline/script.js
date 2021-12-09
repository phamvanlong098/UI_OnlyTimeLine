// SMOOTH SCROLLING SECTIONS
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        console.log(target)
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});

document.onscroll = function() {
    let activeSection = document.querySelector(".active");
    let activeNumber = activeSection.children[0].getAttribute("pid");
    let nav = document.querySelector(".nav__wrapper");
    if(activeNumber < 7) {
        nav.style.justifyContent = "flex-start";
    }
    else {
        nav.style.justifyContent = "flex-end";
    }
}

