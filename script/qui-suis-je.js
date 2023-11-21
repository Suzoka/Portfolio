document.querySelectorAll(".slide").forEach(function (element) {
    element.addEventListener("click", function () {
        document.querySelector(".active").classList.add("nonActive")
        document.querySelector(".active").classList.remove("active");
        element.classList.add("active");
        element.classList.remove("nonActive");
    });
});