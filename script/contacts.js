document.querySelector('input[type="submit"]').addEventListener('click', function (e) {
    e.preventDefault();
    if (document.querySelector('form.contactParMail').checkValidity()) {
        document.querySelector('.popupForm').style.display = "flex";
        document.querySelector('span.nom').innerHTML = document.querySelector('input[name="nom"]').value;
        document.querySelector('span.prenom').innerHTML = document.querySelector('input[name="prenom"]').value;
        document.querySelector('span.mail').innerHTML = document.querySelector('input[name="mail"]').value;
        document.querySelector('span.obj').innerHTML = document.querySelector('textarea[name="objet"]').value;
        document.querySelector('span.msg').innerHTML = document.querySelector('textarea[name="message"]').value;

        document.querySelectorAll('.popupForm span').forEach(function (element) {
            if (element.innerHTML == "") {
                element.innerHTML = "<i>Non renseigné</i>";
            }
        });
    }
    else {
        if (document.querySelector('input[name="nom"]').value == "") {
            document.querySelector('input[name="nom"]').style.border = "1px solid red";
        }
        if (document.querySelector('input[name="prenom"]').value == "") {
            document.querySelector('input[name="prenom"]').style.border = "1px solid red";
        }
        if (document.querySelector('input[name="mail"]').value == "") {
            document.querySelector('input[name="mail"]').style.border = "1px solid red";
        }
        if (document.querySelector('textarea[name="message"]').value == "") {
            document.querySelector('textarea[name="message"]').style.border = "1px solid red";
        }
        document.querySelector('form.contactParMail').reportValidity();
    }
});

document.querySelectorAll('input[required], textarea[required]').forEach(function (element) {
    element.addEventListener('input', function () {
        this.style.border = "none";
    });
});

document.querySelector('.annuler').addEventListener('click', function () {
    document.querySelector('.popupForm').style.display = "none";
});
document.querySelector('.valider').addEventListener('click', function () {
    document.querySelector('form.contactParMail').submit();
    document.querySelector('.popupForm').style.display = "none";
});