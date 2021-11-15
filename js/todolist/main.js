// on récupère grâce à leurs id les objets représentant nos éléments d'interface, et on les stocke dans des variables 
const taskInput = document.getElementById("taskInput")
const addBtn = document.getElementById("addBtn")
const taskList = document.getElementById("taskList")
const completedList = document.getElementById("completedList")

// pour pouvoir réagir à un évènement de clic sur notre bouton
// on utilise un gestionnaire d'évènement de clic
addBtn.addEventListener("click", () => {

    // on ne doit ajouter une tâche que si un intitulé de tâche est présent
    // en vérifiant if taskInput.value, on vérifie si une valeur est présente dans notre champ input, si c'est le cas, on fait nos opérations pour ajouter notre tâche à la liste
    if (taskInput.value) {
        // on crée un nouvel élément de liste <li>
        const newTask = document.createElement("li")
        // on définit le contenu textuel de notre nouvel élément <li> comme contenant la valeur de notre champ de texte
        newTask.textContent = taskInput.value
        // enfin on ajoute ce nouvel élément dans notre liste
        taskList.appendChild(newTask)
        // on crée un élément bouton pour pouvoir supprimer nos tâches
        const deleteBtn = document.createElement("button")
        // on définit le texte de ce bouton
        deleteBtn.textContent = "Delete"
        // on ajoute une class pour notre style en css
        deleteBtn.classList.add("delete-btn")
        // on ajoute notre bouton dans notre tâche
        newTask.appendChild(deleteBtn)
        // pour pouvoir retirer notre élément au moment du clic sur notre bouton supprimer il faut utiliser un gestionnaire d'évènements
        deleteBtn.addEventListener("click", () => {
            // au moment du clic, on appelle remove() sur notre élément <li> pour le retirer du DOM
            newTask.remove()
        })
        // creation d'un bouton pour compléter une tâche
        const completeBtn = document.createElement("button")
        // on change le texte du bouton pour "Complete"
        completeBtn.textContent = "Complete"
        // on ajoute une class pour notre style en css
        completeBtn.classList.add("complete-btn")
        // on ajoute notre bouton à notre tâche
        newTask.appendChild(completeBtn)

        // pour pouvoir marquer une tâche comme complétée on doit réagir au clic sur notre bouton
        completeBtn.addEventListener("click", () => {
            // puis ranger notre tâche dans notre liste de tâches complétées
            completedList.appendChild(newTask)
        })
        // on vide notre champ input pour le réinitialiser
        taskInput.value = ""
    }
})
