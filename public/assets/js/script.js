
// selection de tous les liens
const listeNav = document.querySelectorAll('.side_nav');

listeNav.forEach(lien => {
    lien.addEventListener('click', function(event) {

        event.preventDefault(); 

        const navActive = document.querySelector('.side_nav.actif')
        if(navActive){
            navActive.classList.remove('actif');
        }

        this.classList.add('actif')
    })
})