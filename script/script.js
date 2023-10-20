let typing = 6000;

if (sessionStorage.getItem("video")) {
    document.querySelector('div.video').style.display = "none"
    typing = 1000;
}
else {
    setTimeout(function () {
        document.querySelector('video.logo').play()
    }, 600)

    document.querySelector('video.logo').addEventListener("ended", function () {
        document.querySelector('video.logo').style.scale = "50"
        document.querySelector('div.video').style.opacity = "0"
        document.querySelector('.wrapper').style.display = "flex"
        setTimeout(function () {
            document.querySelector('div.video').style.display = "none"
            sessionStorage.setItem("video", true);
        }, 2000)
    })
}

//Peut être useless ?
//
// setTimeout(function(){
//     document.querySelector('div.video').style.opacity="0"
//     document.querySelector('.wrapper').style.display="flex"
//     setTimeout(function(){
//         document.querySelector('div.video').style.display="none"
//     },3000)
// },3000)

let position = 0;
const droite = document.querySelector('.sliderDroite');
const gauche = document.querySelector('.sliderGauche');
const slider = document.querySelector('.flexbox');
const slides = document.querySelectorAll('.lienProjet');

slides.forEach(function (element) {
    element.addEventListener('click', function (e) {
        e.preventDefault();
        const position = element.getBoundingClientRect();

        const clone = element.cloneNode(true);
        element.style.transition = 'none';
        element.style.opacity = 0;


        clone.style.top = position.top + "px";
        clone.style.left = position.left + "px";
        clone.style.position = "fixed";
        clone.style.zIndex = 1000;
        clone.style.scale = 1.03;


        element.parentNode.append(clone)
        document.querySelector('body').style.overflow = "hidden";

        setTimeout(function () {
            clone.style.transition = "0.2s";
            clone.style.scale = 0.75;
        }, 10);

        setTimeout(function () {
            clone.style.transition = '0.5s';
            clone.style.scale = 12;
            setTimeout(function () {
                window.location.href = "./projet.php?id=" + element.id;
            }, 450);
        }, 200);
    })
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



const zoneTexteFaire = document.querySelector(".savoirFaire");
const listeFaire = ["e développement.", "a plongée.", "e PHP.    ", "a photographie.", "e JavaScript.", "'escalade."];

const zoneTexteEtre = document.querySelector(".savoirEtre");
const listeEtre = ["curieux.        ", "autonome. ", "passionné.", "sérieux.       ", "à l'écoute.  ", "souriant. "];

setTimeout(function () {
    motsDynamiques(zoneTexteFaire, listeFaire);
    motsDynamiques(zoneTexteEtre, listeEtre);
}, typing);


// ? Base du code : https://codepen.io/varunpvp/pen/jeVLrG
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