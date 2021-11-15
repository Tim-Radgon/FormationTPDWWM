//pour récupérer notre bouton de façon à pouvoir réagir à des clicks sur celui-ci on peut utiliser getElementById
const btnToClick = document.getElementById("toClick");

let compteur = 0;
//réagir à un évènement se fait au travers d'un gestionnaire d'évènements (event listener en anglais)
//en utilisant addEventListener on peut sélectionner un type d'évènements (ici "click") et indiquer une fonction en réaction à cette évènement, qui s'exécutera lorsque l'évènement sera lancé
btnToClick.addEventListener("click", () => {
    // Ici à chaque clic sur notre bouton, on incrémente notre compteur
    compteur++;
    //on affiche la nouvelle valeur de compteur dans la console
    console.log(compteur);
    //on met également à jour du texte à l'écran dans notre bouton avec la valeur du compteur
    btnToClick.textContent = `Cliquez moi ! ${compteur}`;
});

// Il est possible d'intercepter de nombreux évènements et d'y réagir
// On peut trouver une liste de ces évènements ici par exemple https://developer.mozilla.org/fr/docs/Web/Events
// L'évènement suivant est celui de déplacement de la souris
// On place notre gestionnaire sur le Document entier pour que l'évènement soit "capturé" sur toute la page
document.addEventListener("mousemove", (event) => {
    // a chaque déplacement de souris on affiche sa position en x et y dans une div a l'id "position"
    document.getElementById(
        "position"
    ).textContent = `x : ${event.x} y : ${event.y}`;
});

const textInput = document.getElementById("textInput");
const textValue = document.getElementById("textValue");

// on peut également gérer des évènements de clavier
// ici "keyup" se déclenche au moment du lâcher d'une touche
textInput.addEventListener("keyup", () => {
    // cet évènement permet donc, dans un champ textuel, de capturer les données écrites dans le champ
    textValue.textContent = textInput.value;
});

const btnConfirm = document.getElementById("confirmInput");

btnConfirm.addEventListener("click", () => {
    // on peut bien évidemment accéder à d'autres éléments que celui concerné par le gestionnaire d'évènement
    // pour ça on se contente de référencer l'élément directement
    console.log(textInput.value);
});
