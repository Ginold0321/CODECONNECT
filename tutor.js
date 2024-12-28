const languageSlider = document.querySelector('.language-slider');
const langLeftArrow = document.getElementById('lang-left-arrow');
const langRightArrow = document.getElementById('lang-right-arrow');

let currentPosition = 0;
const cardWidth = 170; // Width of each card + margin
const maxSlide = -(cardWidth * 2); // Adjust for the number of cards visible

langRightArrow.addEventListener('click', () => {
  if (currentPosition > maxSlide) {
    currentPosition -= cardWidth;
    languageSlider.style.transform = `translateX(${currentPosition}px)`;
  }
});

langLeftArrow.addEventListener('click', () => {
  if (currentPosition < 0) {
    currentPosition += cardWidth;
    languageSlider.style.transform = `translateX(${currentPosition}px)`;
  }
});