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
const sliderBox = document.querySelector('.flexbox');
const slides = document.querySelectorAll('.lienProjet');

animation(slides);
slider(droite, gauche, sliderBox, slides);


const zoneTexteFaire = document.querySelector(".savoirFaire");
const listeFaire = ["e développement.", "a plongée.", "e PHP.    ", "a photographie.", "e JavaScript.", "'escalade."];

const zoneTexteEtre = document.querySelector(".savoirEtre");
const listeEtre = ["curieux.        ", "autonome. ", "passionné.", "sérieux.       ", "à l'écoute.  ", "souriant. "];

setTimeout(function () {
    motsDynamiques(zoneTexteFaire, listeFaire);
    motsDynamiques(zoneTexteEtre, listeEtre);
}, typing);
