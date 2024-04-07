
// Code pour le slider 
const nextButton = document.querySelector('.next');
const prevButton = document.querySelector('.prev');
const carouselInner = document.querySelector('.carouselInner');
const slides = carouselInner.querySelectorAll('img');
const slideWidth = slides[0].offsetWidth;
const totalSlides = slides.length;
const visibleSlides = 4;

let currentIndex = 0; 

nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

function nextSlide() {
  currentIndex++;
  
  if (currentIndex >= totalSlides) {
    currentIndex = 0; // Revenir à la première image
  }
  updateSlidePosition();
}

function prevSlide() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = totalSlides - 1; // Revenir à la dernière image
  }
  updateSlidePosition();
}

//const updateSlidePosition = () => {

function updateSlidePosition() {
  if (currentIndex >= visibleSlides && currentIndex < totalSlides - visibleSlides) {
    let newPosition = -(currentIndex - visibleSlides) * slideWidth;
    carouselInner.style.transition = 'transform 0.5s ease';
    carouselInner.style.transform = `translateX(${newPosition}px)`;
  }

  // for (const item of slides) {
  //   item.classList.contains('active') ? item.classList.remove('active') : '';
  // }

  for (let i = 0; i < totalSlides; i++) {
    slides[i].classList.remove('active');
  }
  slides[currentIndex].classList.add('active');
}

updateSlidePosition(); // Positionnement initial


document.addEventListener("DOMContentLoaded", function() {
  const cookiePopup = document.getElementById("cookiePopup");
  const acceptCookiesBtn = document.getElementById("acceptCookiesBtn");


  
  // Fonction pour vérifier si le cookie de consentement existe
  function checkCookie() {
      const cookieAccepted = getCookie("cookiesAccepted");
      // Afficher la pop-up uniquement si le cookie de consentement n'existe pas
      if (!cookieAccepted) {
          cookiePopup.style.display = "block";
      } else {
          cookiePopup.style.display = "none";
      }
  }

  // Gérer le clic sur le bouton "Accepter les cookies"
  acceptCookiesBtn.addEventListener("click", function() {
      // Masquer le popup
      cookiePopup.style.display = "none";
      // Mettre à jour le cookie en PHP si nécessaire
      // Redirection vers une page où le cookie est mis à jour en PHP
  });

  // Fonction pour obtenir la valeur d'un cookie
  function getCookie(name) {
      const cookieArr = document.cookie.split(";");
      for (let i = 0; i < cookieArr.length; i++) {
          const cookiePair = cookieArr[i].split("=");
          if (name === cookiePair[0].trim()) {
              return cookiePair[1];
          }
      }
      return null;
  }

  // Vérifier le cookie au chargement de la page
  checkCookie();
});