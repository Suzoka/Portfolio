function animation(anime) {
    anime.forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault();
            if (e.target.localName != "p") {
                const position = element.getBoundingClientRect();

                const clone = element.cloneNode(true);
                element.style.transition = 'none';
                element.style.opacity = 0;


                clone.style.top = position.top + "px";
                clone.style.left = position.left + "px";
                clone.style.position = "fixed";
                clone.style.zIndex = 100000;
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
                        window.location.href = element.getAttribute('href');
                        setTimeout(function () {
                            clone.remove();
                            element.removeAttribute('style');
                            document.querySelector('body').style.overflow = "auto";
                        }, 100);
                    }, 450);
                }, 200);
            }
        })
    });
}

function slider(droite, gauche, sliderBox, slides) {
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
        gauche.style.visibility = "visible";
        sliderBox.style.left = "-" + ((position) * 425) - 25 * (position - 1) + "px";
        if (((window.window.innerWidth / 460) % 1) >= 0.9 || ((window.window.innerWidth / 460) % 1) <= 0.25) {
            if (position == slides.length - Math.trunc(window.window.innerWidth / 460)) {
                droite.style.visibility = "hidden";
            }
        }

        else if (((window.window.innerWidth / 460) % 1) < 0.9 && ((window.window.innerWidth / 460) % 1) >= 0.5) {
            if (position == slides.length - Math.trunc(window.window.innerWidth / 460) - 1) {
                sliderBox.style.left = "-" + ((position) * 425) - 25 * (position - 1) - 150 + "px";
                droite.style.visibility = "hidden";
            }
        }

        else if (((window.window.innerWidth / 460) % 1) > 0.25 && ((window.window.innerWidth / 460) % 1) < 0.5) {
            if (position == slides.length - Math.trunc(window.window.innerWidth / 460)) {
                sliderBox.style.left = "-" + ((position) * 425) - 25 * (position - 1) + 160 + "px";
                droite.style.visibility = "hidden";
            }
        }

    }

    function decaleDroite() {
        if (position == 0) {
            gauche.style.visibility = "hidden";
        }
        droite.style.visibility = "visible";
        sliderBox.style.left = "-" + ((position) * 425) - 25 * (position - 1) + "px";
    }
}

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

function refreshFiltres() {
    document.querySelectorAll('.filtre select').forEach(function (element) {
        element.addEventListener('change', function () {
            document.querySelector('.filtres').submit();
        });
    });
}

function addTechnosLinks() {
    document.querySelectorAll('.theme p').forEach(function (element) {
        element.addEventListener('click', function () {
            liens(element);
        });
    });
    document.addEventListener('keydown', function (e) {
        if (e.key == "Enter") {
            liens(document.activeElement);
        }
    });
}

function liens(element){
    const filtre = element.getAttribute('class');
            let formulaire = document.createElement('form');
            document.body.appendChild(formulaire);
            formulaire.method = 'post';
            formulaire.action = './projets.php';

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'techno';
            input.value = filtre;
            formulaire.appendChild(input);

            formulaire.submit();
}