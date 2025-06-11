// script
const navbar = document.getElementById("navbar");
let hideTimeout;

function showNavbar() {
    navbar.classList.remove("hidden");
    clearTimeout(hideTimeout);
    hideTimeout = setTimeout(() => {
        navbar.classList.add("hidden");
    }, 3000);
}

window.addEventListener("scroll", showNavbar);

navbar.addEventListener("mouseenter", () => {
    clearTimeout(hideTimeout);
    navbar.classList.remove("hidden");
});

navbar.addEventListener("mouseleave", () => {
    hideTimeout = setTimeout(hideNavbar, 3000);
});

window.addEventListener("load", () => {
    if (window.scrollY > 0) {
        showNavbar();
    } else {
        showNavbar();
    }
});