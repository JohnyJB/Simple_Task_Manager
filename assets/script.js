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
document.querySelectorAll(".taskcheck").forEach(box => {

    // Marca o desmarca tarea
    box.addEventListener("change", function(){

        let formData = new FormData()
        formData.append("id", this.dataset.id)
        formData.append("status", this.checked)

        fetch("update.php", {
            method: "POST",
            body: formData
        })

    })
})