let host = 'http://localhost:8888'

function preUpdateAnimal(id) {
    $("#aid").val(id)
}

function preUpdateService(service) {
    $("#sid").val(service.service_id)
    $("#sname").val(service.name)
    $("#sdescription").val(service.description)

    $('#ss').prop('disabled', true);
    $('#sm').prop('disabled', false);
}
function saveService() {
    event.preventDefault()
    let name = $("#sname").val()
    let description = $("#sdescription").val()

    if(name === "" || description === ""){
        $("#save-service-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/service.php`,
            method: "POST",
            dataType : "json",
            data : {name: name, description: description},
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-service-error").html("Le service n'a pas été ajouté, un problème est survenu")
            }
        })
    }
}

function saveAlimentation() {
    let id = $("#aid").val()
    let date = $("#adate").val()
    let time = $("#atime").val()
    let nourriture = $("#anourriture").val()
    let quantite = $("#aquantité").val()

    if(id === "" || date === "" || time === "" || nourriture === "" || quantite === ""){
        $("#save-animal-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/alimentation.php`,
            method: "POST",
            dataType : "json",
            data: {animal_id:id, date:date, hours:time, food:nourriture, quantity:quantite},
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


function updateService() {
    event.preventDefault()
    let name = $("#sname").val()
    let description = $("#sdescription").val()
    let service_id = $("#sid").val()

    if(name === "" || description === "" || service_id === ""){
        $("#save-service-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/service.php`,
            method: "PUT",
            dataType : "json",
            data : JSON.stringify({name: name, description: description, service_id: parseInt(service_id)}),
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-service-error").html("Le service n'a pas été Modifier, un problème est survenu")
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        })
    }
}
function updateAnimal() {
    let animal_id = $("#aid").val()
    let surname = $("#asurname").val()
    let race = $("#arace").val()
    let state = $("#astate").val()
    let habitat_id = $("#ahabitat").val()

    if(surname === "" || race === "" || state === "" || habitat_id === ""){
        $("#save-animal-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/animal.php`,
            method: "PUT",
            dataType : "json",
            data: JSON.stringify({animal_id: animal_id, surname: surname, race: race, habitat_id: habitat_id, state: state}),
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

function displayService() {
    $.ajax({
        url: `${host}/zoo/api/service.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let service of response.response) {
                result += 
                `<div class="line p-2 d-flex justify-content-between shadow m-2">` +
                `<h5>${service.name}</h5>` +
                `<button onclick='preUpdateService(${JSON.stringify(service)})' data-toggle="modal" data-target="#serviceModal">M</button>` +
                `</div>`
            }
            
            $(".service").html(result)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}
displayService()


function displayAvis() {
    $.ajax({
        url: `${host}/zoo/api/avis.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let avis of response.response) {
                visible = avis.is_visible === 0 ? "Invisble" : "Visible"
                result += 
                `<div class="line p-2 d-flex justify-content-between shadow m-2">` +
                `<div>` + 
                `<h5>${avis.pseudo}</h5>` +
                `<p>${avis.commentaire}</p>` +
                `<h1>${visible}</h1>` + 
                `</div>`+
                `<button onclick='updateAvis(${JSON.stringify(avis)})' >M</button>` +
                `</div>`
            }
            
            $(".avis").html(result)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}
displayAvis()

function updateAvis(avis) {
    visible = avis.is_visible == 1 ? 0 : 1
    $.ajax({
        url: `${host}/zoo/api/avis.php?visibility=${visible}&avis_id=${avis.avis_id}`,
        method: "PUT",
        dataType : "json",
        success: function(response) {
            location.reload()
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}