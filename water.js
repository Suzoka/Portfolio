let position = 0;
const droite = document.querySelector('.sliderDroite');
const gauche = document.querySelector('.sliderGauche');
const slider = document.querySelector('.flexbox');
const slides = document.querySelectorAll('.element');
const hide = document.querySelector('.hide');

document.querySelectorAll('button.element').forEach(function (element) {
    element.addEventListener('click', function () {
        hide.style.overflow = "visible"
        element.style.zIndex = 1000;
        element.style.transition = '0.2s';
        element.style.scale = 0.75;

        setTimeout(function () {
            element.style.transition = '0.5s';
            element.style.scale = 12;
            setTimeout(function () {
                window.location.href = "./projet.php?id=" + element.id;
            }, 450);
        }, 200);
    });
});

//Si on clique sur la flèche de droite, on décale le slider vers la gauche
droite.addEventListener('click', function () {
    position++;
    decaleGauche();
})

//Si on clique sur la flèche de gauche, on décale le slider vers la droite
gauche.addEventListener('click', function () {
    position--;
    decaleDroite();
})

function decaleGauche() {
    gauche.style.display = "block";
    slider.style.left = "-" + ((position) * 425) - 25 * (position - 1) + "px";
    if (((window.window.innerWidth / 460) % 1) >= 0.9 || ((window.window.innerWidth / 460) % 1) <= 0.25) {
        if (position == slides.length - Math.trunc(window.window.innerWidth / 460)) {
            droite.style.display = "none";
        }
    }

    else if (((window.window.innerWidth / 460) % 1) < 0.9 && ((window.window.innerWidth / 460) % 1) >= 0.5) {
        if (position == slides.length - Math.trunc(window.window.innerWidth / 460) - 1) {
            slider.style.left = "-" + ((position) * 425) - 25 * (position - 1) - 150 + "px";
            droite.style.display = "none";
        }
    }

    else if (((window.window.innerWidth / 460) % 1) > 0.25 && ((window.window.innerWidth / 460) % 1) < 0.5) {
        if (position == slides.length - Math.trunc(window.window.innerWidth / 460)) {
            slider.style.left = "-" + ((position) * 425) - 25 * (position - 1) + 160 + "px";
            droite.style.display = "none";
        }
    }

}

function decaleDroite() {
    if (position == 0) {
        gauche.style.display = "none";
    }
    droite.style.display = "block";
    slider.style.left = "-" + ((position) * 425) - 25 * (position - 1) + "px";
}


// ? Base du code : https://codepen.io/varunpvp/pen/jeVLrG

const zoneTexteFaire = document.querySelector(".savoirFaire");
const listeFaire = ["e développement.", "a plongée.", "e PHP.    ", "a photographie.", "e JavaScript."];

motsDynamiques(zoneTexteFaire, listeFaire);

const zoneTexteEtre = document.querySelector(".savoirEtre");
const listeEtre = ["curieux.        ", "autonome. ", "passionné.", "sérieux.       ", "à l'écoute.  "];

motsDynamiques(zoneTexteEtre, listeEtre);

function motsDynamiques(zoneTexte, liste) {
    // Variable qui indique si nous devons écrire ou effacer le mot
    let avancer = true;

    // Position dans la liste des mots et position dans le mot en cours
    let wordIndex = 0;
    let letterIndex = 0;

    let ecriture;

    //Lance les modifications
    ecrire();

    //Change une lettre toutes les 85ms
    function ecrire() {
        ecriture = setInterval(modifMot, 100);
    }

    function modifMot() {
        //Sélectionne le mot en cours
        const mot = liste[wordIndex];

        //Si on écrit le mot
        if (avancer) {
            letterIndex++;

            //Si on a fini d'écrire le mot
            if (letterIndex == mot.length) {
                //Indique qu'on doit effacer le mot
                avancer = false;

                //Arrête les modifications
                clearInterval(ecriture);
                //Reprendre après 1.5s
                setTimeout(ecrire, 3000);
            }
            //Si on efface le mot
        } else if (!avancer) {
            letterIndex--;

            //Si on a fini d'effacer le mot
            if (letterIndex == 0) {
                //Indique qu'on doit écrire
                avancer = true;
                //Passe au mot suivant
                wordIndex++;

                //Si on a fini la liste des mots, on recommence
                if (wordIndex == liste.length) {
                    wordIndex = 0;
                }
            }
        }

        //Faire la modification
        zoneTexte.innerHTML = mot.substring(0, letterIndex);
    }
}