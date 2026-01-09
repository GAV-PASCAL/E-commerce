
// selection de tous les liens
const listeNav = document.querySelectorAll('.side_nav');

listeNav.forEach(lien => {
    lien.addEventListener('click', function (event) {

        event.preventDefault();

        const navActive = document.querySelector('.side_nav.actif')
        if (navActive) {
            navActive.classList.remove('actif');
        }

        this.classList.add('actif')
    })
})


// Typing text effect
document.addEventListener('DOMContentLoaded', function () {
    const textElement = document.getElementById('typing-text');
    if (!textElement) return;

    const phrases = [
        "Bienvenue sur EasyOrder, commandez en toute tranquilité.",
        "Votre plateforme de vente en ligne mondiale.",
        "Retrouvez vos produits de hautes qualités."
    ];

    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let typeSpeed = 100;

    function type() {
        const currentPhrase = phrases[phraseIndex];

        if (isDeleting) {
            textElement.textContent = currentPhrase.substring(0, charIndex - 1);
            charIndex--;
            typeSpeed = 50; // Faster when deleting
        } else {
            textElement.textContent = currentPhrase.substring(0, charIndex + 1);
            charIndex++;
            typeSpeed = 100; // Normal typing speed
        }

        if (!isDeleting && charIndex === currentPhrase.length) {
            // Finished typing sentence, wait 5 seconds before deleting
            isDeleting = true;
            typeSpeed = 5000;
        } else if (isDeleting && charIndex === 0) {
            // Finished deleting, move to next sentence
            isDeleting = false;
            phraseIndex = (phraseIndex + 1) % phrases.length;
            typeSpeed = 500; // Pause before typing next
        }

        setTimeout(type, typeSpeed);
    }

    // Start typing
    type();
});

// Category Carousel Logic
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('categoryTrack');
    if (!track) return;

    setInterval(() => {
        const firstCard = track.firstElementChild;
        if (!firstCard) return;
        
        // Calculate width of one item
        const itemWidth = firstCard.getBoundingClientRect().width;
        
        track.style.transition = 'transform 0.5s ease-in-out';
        track.style.transform = 'translateX(-' + itemWidth + 'px)';
        
        track.addEventListener('transitionend', function() {
            track.style.transition = 'none';
            track.style.transform = 'translateX(0)';
            track.appendChild(firstCard);
        }, { once: true });
    }, 2000);
});
