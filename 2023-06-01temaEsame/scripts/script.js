document.getElementById("user").addEventListener("mouseenter", function() {
    document.getElementById("myPopup1").classList.add("show");
    document.getElementById("myPopup2").classList.add("show");
});

document.getElementById("popup").addEventListener("mouseleave", function() {
    document.getElementById("myPopup1").classList.remove("show");
    document.getElementById("myPopup2").classList.remove("show");
});