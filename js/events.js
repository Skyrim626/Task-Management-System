

/** Click Events */

const hamburger = document.querySelector("[data-menu]");
const hamburgerMenu = document.querySelector("[data-menu-link]");

hamburger.addEventListener('click', ()=> {
    
    if(!(hamburgerMenu.classList.contains('js-active'))) {
        hamburgerMenu.classList.add("js-active");
        hamburger.classList.add("js-active");
    }

    else {
        hamburgerMenu.classList.remove("js-active");
        hamburger.classList.remove("js-active");
    }

});



/** Intersection Events */

/** Changin Header Style During Hover */
const header = document.querySelector("[data-header]");
const firstSection = document.querySelector(".hero-section");

const sectionOneOptions = {};

const firstSectionObserver = new IntersectionObserver((entries, firstSectionObserver) => {
    entries.forEach(entry => {
       
        if(!entry.isIntersecting) {
            header.classList.add("nav-scrolled");
        }

        else {
            header.classList.remove("nav-scrolled");
        }

    });
}, sectionOneOptions);

firstSectionObserver.observe(firstSection);