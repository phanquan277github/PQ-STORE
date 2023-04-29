// slider show js
let slideIndex = 0;
showSlides(slideIndex);
// Next/previous controls
function plusSlides(n) {
showSlides(slideIndex += n);
}
function showSlides(n) {
let i;
let slides = document.getElementsByClassName("slidershow__slides");

if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
}
slides[slideIndex-1].style.display = "block";
}

// auto slides show 
let slideIndexA = slideIndex;
showSlidesAuto();
function showSlidesAuto() {
let i;
let slides = document.getElementsByClassName("slidershow__slides");
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
}
slideIndexA++;
if (slideIndexA > slides.length) {slideIndexA = 1}
slides[slideIndexA-1].style.display = "block";
setTimeout(showSlidesAuto, 8000); // Change image every 2 seconds
}

// footer popup mobile 
let footerTitle = document.getElementsByClassName('footer__title');
let footerList = document.getElementsByClassName("footer__list");

for (let i = 0; i < footerTitle.length; i++) {
    footerTitle[i].addEventListener('click', function(){
        if(footerList[i].classList.contains("open")){
            footerList[i].classList.remove("open");
            console.log(footerList[i])
        }else {
            console.log(footerList[i])
            footerList[i].classList.add("open");
        }
    }, false);
}

// header__nav__navigation-icon
let headerIconNav = document.querySelector(".header__nav__navigation-icon");
let headerNavEmerge = document.querySelector(".header__nav__navgigation__emerge");
headerIconNav.onclick = function(){
    if(headerNavEmerge.classList.contains("open")){
        headerNavEmerge.classList.remove("open");
    } else headerNavEmerge.classList.add("open");
}