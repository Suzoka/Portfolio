document.querySelector('input[type="submit"]').addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('.popupForm').style.display = "flex";
    document.querySelector('span.nom').innerHTML = document.querySelector('input[name="nom"]').value;
    document.querySelector('span.prenom').innerHTML = document.querySelector('input[name="prenom"]').value;
    document.querySelector('span.mail').innerHTML = document.querySelector('input[name="mail"]').value;
    document.querySelector('span.obj').innerHTML = document.querySelector('textarea[name="objet"]').value;
    document.querySelector('span.msg').innerHTML = document.querySelector('textarea[name="message"]').value;

    document.querySelector('.annuler').addEventListener('click', function () {
        document.querySelector('.popupForm').style.display = "none";
    }); 
    document.querySelector('.valider').addEventListener('click', function () {
        document.querySelector('.popupForm').style.display = "none";
        document.querySelector('form.contactParMail').submit();
    });
});