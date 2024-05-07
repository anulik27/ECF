// Sélectionnez tous les liens de navigation
let navLinks = document.querySelectorAll('nav a');

// Ajoutez un écouteur d'événements à chaque lien
navLinks.forEach(link => {
link.addEventListener('click', function(e) {
// Supprimez la classe 'active' de tous les liens
navLinks.forEach(link => link.classList.remove('active'));

// Ajoutez la classe 'active' au lien cliqué
this.classList.add('active');
});
});
const popover = new bootstrap.Popover('.popover-dismiss', {
trigger: 'focus'
});

let togg1 = document.getElementById("togg1");
let togg2 = document.getElementById("togg2");
let togg3 = document.getElementById("togg3");
let d1 = document.getElementById("d1");
let d2 = document.getElementById("d2");
let d3 = document.getElementById("d3");
togg1.addEventListener("click", () => {
if(getComputedStyle(d1).display != "none"){
d1.style.display = "none";
} else {
d1.style.display = "block";
}
})

function togg(){
if(getComputedStyle(d2).display != "none"){
d2.style.display = "none";
} else {
d2.style.display = "block";
}
};
togg2.onclick = togg;

function togg(){
if(getComputedStyle(d3).display != "none"){
d3.style.display = "none";
} else {
d3.style.display = "block";
}
};
togg3.onclick = togg;
