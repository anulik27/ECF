let host = 'http://localhost:8888'

function preUpdateAnimal(id) {
    $("#aid").val(id)
}

function saveVeterinaire() {
    let id = $("#aid").val()
    let date = $("#adate").val()
    let detail = $("#adetail").val()

    if(id === "" || date === "" || detail === ""){
        $("#save-animal-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/rapportVeterinaire.php`,
            method: "POST",
            dataType : "json",
            data: {id:id, date:date, detail:detail},
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-animal-error").html("Le service n'a pas été ajouté, un problème est survenu")
            },
            error: function(xhr, status, error) {
                // Gérer l'erreur de la requête
                console.error(error);
            }
        }) 
    }
}

function updateVeterinaire() {
    let id = $("#aid").val()
    let date = $("#adate").val()
    let detail = $("#adetail").val()

    if(id === "" || date === "" || detail === ""){
        $("#save-animal-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/rapportVeterinaire.php`,
            method: "PUT",
            dataType : "json",
            data: JSON.stringify({id:id, date:date, detail:detail}),
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-animal-error").html("Le service n'a pas été modifier, un problème est survenu")
            }
        }) 
    }
}
function displayAnimaux() {
    $.ajax({
        url: `${host}/zoo/api/animal.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let animal of response.response) {
                result +=
                `<div class="line p-2 d-flex justify-content-between shadow m-2">` +
                `<h5>${animal.surname}</h5>` +
                `<button onclick='preUpdateAnimal(${animal.animal_id})' data-toggle="modal" data-target="#animalModal">Ajouter</button>` +
                `</div>`
            }
            
            $(".animaux").html(result)
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur de la requête
            console.error(error);
        }
    })
}
displayAnimaux()

