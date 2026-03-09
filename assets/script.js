//Script de Interacción AJAX

// NUEVA TAREA

// Selec formulario de agregar tareas
document.getElementById("taskform").addEventListener("submit", function(e){

    e.preventDefault()
    let input = document.getElementById("taskinput")
    let inputdesc = document.getElementById("taskdescinput")
    let formData = new FormData()

    // Evita que guarden tareas vacías
    let error = document.getElementById("taskerrorname")
    if(input.value.trim() === ""){
        error.textContent = "Nombre de tarea obligatorio"
        return
    }else{
        error.textContent = ""
    }
    formData.append("task", input.value)
    formData.append("description", inputdesc.value)

    fetch("store.php", {

        method: "POST",   
        body: formData  

    })
    .then(res => res.json()) 
    .then(data => {
        input.value = ""  
        location.reload()
    })

})


// MARCAR TAREA COMPLETADA
// MARCAR TAREA COMPLETADA
document.querySelectorAll(".taskcheck").forEach(box => {

    box.addEventListener("change", function(){

        let formData = new FormData()
        formData.append("id", this.dataset.id)
        formData.append("status", this.checked)

        fetch("update.php", {
            method: "POST",
            body: formData
        })

        // li de checkbox
        let li = this.closest("li")

        // span
        let span = li.querySelector("span")

        if(this.checked){

            li.classList.remove("bg-warning")
            li.classList.add("bg-success")

            span.classList.add("text-decoration-line-through")

        }else{

            li.classList.remove("bg-success")
            li.classList.add("bg-warning")

            span.classList.remove("text-decoration-line-through")

        }

    })

})