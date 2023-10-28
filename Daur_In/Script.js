const slider = document.querySelector(".slider");
const slides = slider.querySelector(".slides");
const slideWidth = slider.offsetWidth;

let slideIndex = 0;

function slideNext() {
  slideIndex = (slideIndex + 1) % slides.children.length;
  gsap.to(slides, {
    x: -slideWidth * slideIndex,
    duration: 0.5,
    ease: "power2.inOut",
  });
}

setInterval(slideNext, 3000);
