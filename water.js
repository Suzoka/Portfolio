document.querySelectorAll('div.element').forEach(function (element) {
    element.addEventListener('click', function () {
        element.style.zIndex = 1000;
        element.style.transition = '0.2s';
        element.style.scale = 0.75;

        setTimeout(function () {
            element.style.transition = '0.5s';
            element.style.scale = 12;
        }, 200);
    });
});


let position = 0;
const droite = document.querySelector('.sliderDroite');
const gauche = document.querySelector('.sliderGauche');
const slider = document.querySelector('.flexbox');
const slides = document.querySelectorAll('.element');

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
    slider.style.left = "-" + ((position) * 425)-25*(position-1) + "px";
}

//Si on arrive au début du slider, on revient à la fin en coupant l'animation (slider infini)
function decaleDroite() {
    if (position == -1) {
        slider.style.transition = "0s";
        slider.style.left = "-163.5%";
        setTimeout(function () {
            slider.style.transition = "1s";
            slider.style.left = "-116.5%";
            position = 2;
        }, 100);
        return
    }
    //Sinon on décale simplement le slider
    slider.style.left = "-" + ((position) * 47 + 22.5) + "%";
}
