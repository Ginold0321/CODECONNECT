const tutorCards = document.querySelector('.tutor-cards');
const tutorLeftArrow = document.getElementById('tutor-left-arrow');
const tutorRightArrow = document.getElementById('tutor-right-arrow');

let tutorCurrentPosition = 0; // Tracks current position
const tutorCardWidth = 280; // Card width + margin (250px + 2x15px)
const tutorMaxPosition = -(tutorCardWidth * 4); // Total cards - visible cards

// Move cards to the right
tutorRightArrow.addEventListener('click', () => {
    if (tutorCurrentPosition > tutorMaxPosition) {
      tutorCurrentPosition -= tutorCardWidth;
      tutorCards.style.transform = `translateX(${tutorCurrentPosition}px)`;
    }
  });
  
  // Move cards to the left
  tutorLeftArrow.addEventListener('click', () => {
    if (tutorCurrentPosition < 0) {
      tutorCurrentPosition += tutorCardWidth;
      tutorCards.style.transform = `translateX(${tutorCurrentPosition}px)`;
    }
  });