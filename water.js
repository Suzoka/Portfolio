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
    if (position == slides.length-2) {
        droite.style.display = "none";
    }
    gauche.style.display = "block";
    slider.style.left = "-" + ((position) * 425)-25*(position-1) + "px";
}

function decaleDroite() {
    if (position == 0) {
        gauche.style.display = "none";
    }
    droite.style.display = "block";
    slider.style.left = "-" + ((position) * 425)-25*(position-1) + "px";
}
