let host = 'http://localhost:8888'


function generatePassword(length) {
    // Définir les caractères possibles pour le mot de passe
    const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
    
    // Variable pour stocker le mot de passe généré
    let password = "";

    // Boucle pour choisir un caractère aléatoire du jeu de caractères pour chaque position du mot de passe
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }

    return password;
}

$("#c-admin").click((event) => {
    event.preventDefault()
    let username = $("#admin-username").val()
    let password = $("#admin-password").val()
    let role = $("#admin-role").val()
    let name = $("#admin-name").val()
    let surname = $("#admin-surname").val()

    if(username === "" || password === "" || role === "" || name === "" || surname === ""){
        $("#admin-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/user.php`,
            method: "POST",
            dataType : "json",
            data : {username: username, password: password, role: role, name: name, surname: surname},
            success: function(response) {
                if(response.response)
                    $("#admin-error").html("Compte crée")
                else
                    $("#admin-error").html("Le compte n'a pas été crée")
            }
        })
    }
}) 

$("#admin-generate").click(() => {
    $("#admin-password").val(generatePassword(12))
})

function deleteHabitat(id) {
    $.ajax({
        url: `${host}/zoo/api/habitat.php?habitat_id=${id}`,
        method: "DELETE",
        dataType : "json",
        success: function(response) {
            if(response.response) {
                location.reload()
            }
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur de la requête
            console.error(error);
        }
    })
}

function deleteService(id) {
    $.ajax({
        url: `${host}/zoo/api/service.php?service_id=${id}`,
        method: "DELETE",
        dataType : "json",
        success: function(response) {
            if(response.response) {
                location.reload()
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}

function deleteAnimaux(id) {
    $.ajax({
        url: `${host}/zoo/api/animal.php?animal_id=${id}`,
        method: "DELETE",
        dataType : "json",
        success: function(response) {
            if(response.response) {
                location.reload()
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}

function preUpdateHabitat(habitat) {
    $("#hid").val(habitat.habitat_id)
    $("#hname").val(habitat.name)
    $("#hdescription").val(habitat.description)
    $("#hcommentaire").val(habitat.commentaire_habitat)
    $("#himage").val(habitat.image)

    $('#hs').prop('disabled', true);
    $('#hm').prop('disabled', false);
}

function preUpdateAnimal(animal) {
    $("#aid").val(animal.animal_id)
    $("#asurname").val(animal.surname)
    $("#astate").val(animal.state)
    $("#arace").val(animal.race)
    $("#ahabitat").val(animal.habitat_id)

    $('#as').prop('disabled', true);
    $('#am').prop('disabled', false);
}

function preUpdateService(service) {
    $("#sid").val(service.service_id)
    $("#sname").val(service.name)
    $("#sdescription").val(service.description)

    $('#ss').prop('disabled', true);
    $('#sm').prop('disabled', false);
}

function displayHabitat() {
    $.ajax({
        url: `${host}/zoo/api/habitat.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let habitat of response.response) {
                result += 
                `<div class="line p-2 d-flex justify-content-between shadow m-2">` +
                `<h5>${habitat.name}</h5>` +
                `<button onclick="deleteHabitat(${habitat.habitat_id})">S</button>` +
                `<button onclick='preUpdateHabitat(${JSON.stringify(habitat)})' data-toggle="modal" data-target="#habitatModal">M</button>` +
                `</div>`
            }
            
            $(".habitat").html(result)
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur de la requête
            console.error(error);
        }
    })
}

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
                `<button onclick="deleteService(${service.service_id})">S</button>` +
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
                `<button onclick="deleteAnimaux(${animal.animal_id})">S</button>` +
                `<button onclick='preUpdateAnimal(${JSON.stringify(animal)})' data-toggle="modal" data-target="#animalModal">M</button>` +
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

function displayRapport() {
    $.ajax({
        url: `${host}/zoo/api/veterinary.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let rapport of response.response) {
                result +=
                `<div class="line p-2 shadow m-2">` +
                `<h5>${rapport.date}</h5>` +
                `<texterea>${rapport.detail}</texterea>` +
                `<h6>Ecrit par ${rapport.utilisateur_id}</h6>` +
                `</div>`
            }
            
            $(".rapport").html(result)
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur de la requête
            console.error(error);
        }
    })
}

displayRapport()
displayHabitat()
displayService()
displayAnimaux()

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
                    $("#save-service-error").html("Le service n'a pas été ajouté, un problème est surcenu")
            }
        })
    }
}

function saveAnimal() {
    let surname = $("#asurname").val()
    let race = $("#arace").val()
    let state = $("#astate").val()
    let habitat_id = $("#ahabitat").val()

    if(surname === "" || race === "" || state === "" || habitat_id === ""){
        $("#save-animal-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/animal.php`,
            method: "POST",
            dataType : "json",
            data: {surname:surname, race:race, habitat_id:habitat_id, state:state},
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-animal-error").html("Le service n'a pas été ajouté, un problème est surcenu")
            }
        }) 
    }
}

function saveHabitat() {
    let name = $("#hname").val()
    let image = $("#himage").val()
    let commentaire = $("#hcommentaire").val()
    let description = $("#hdescription").val()

    if(name === "" || image === "" || commentaire === "" || description === ""){
        $("#save-habitat-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/habitat.php`,
            method: "POST",
            dataType : "json",
            data: {name:name, image:image, description:description, commentaire_habitat:commentaire},
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-habitat-error").html("Le habitat n'a pas été ajouté, un problème est surcenu")
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
                    $("#save-service-error").html("Le service n'a pas été Modifier, un problème est surcenu")
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
                    $("#save-animal-error").html("Le service n'a pas été modifier, un problème est surcenu")
            }
        }) 
    }
}

function updateHabitat() {
    let habitat_id = $("#hid").val()
    let name = $("#hname").val()
    let image = $("#himage").val()
    let commentaire = $("#hcommentaire").val()
    let description = $("#hdescription").val()

    if(habitat_id === "" || name === "" || image === "" || commentaire === "" || description === ""){
        $("#save-habitat-error").html("Tous les champs sont requis")
    } else{
        $.ajax({
            url: `${host}/zoo/api/habitat.php`,
            method: "PUT",
            dataType : "json",
            data: JSON.stringify({habitat_id:habitat_id, name:name, image:image, description:description, commentaire_habitat:commentaire}),
            success: function(response) {
                if(response.response) {
                    location.reload()
                } else
                    $("#save-habitat-error").html("Le habitat n'a pas été ajouté, un problème est surcenu")
            }
        }) 
    }
}

function configHabitat() {
    $.ajax({
        url: `${host}/zoo/api/habitat.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let habitat of response.response) {
                result += 
                `<option value='${habitat.habitat_id}'>` +
                `${habitat.name}` +
                `</option>`
            }
            
            $("#ahabitat").html(result)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}

function configDate() {
    $.ajax({
        url: `${host}/zoo/api/veterinary.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            list = new Set(response.response.map(e => e.date))
            for(let date of list) {
                result += 
                `<option value='${date}'>` +
                `${date}` +
                `</option>`
            }
            
            $("#cdate").html(result)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}

function configAnimal() {
    $.ajax({
        url: `${host}/zoo/api/animal.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            list = new Set(response.response.map(e => { return {surname:e.surname, id: e.animal_id}}, ))
            for(let animal of list) {
                result += 
                `<option value='${animal.id}'>` +
                `${animal.surname}` +
                `</option>`
            }
            
            $("#canimal").html(result)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}

configHabitat()
configDate()
configAnimal()


$('#cdate').on('change', function() {
    var date = $(this).val();
    configRapportVue(date, $("#canimal").val())
});

$('#canimal').on('change', function() {
    var animal = $(this).val();
    configRapportVue($("#cdate").val(), animal)
});

function configRapportVue(date, animal_id) {
    $.ajax({
        url: `${host}/zoo/api/veterinary.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let rapport of response.response) {
                if(rapport.date == date && rapport.animal_id == animal_id)
                    result +=
                    `<div class="line p-2 shadow m-2">` +
                    `<h5>${rapport.date}</h5>` +
                    `<texterea>${rapport.detail}</texterea>` +
                    `<h6>Ecrit par ${rapport.utilisateur_id}</h6>` +
                    `</div>`
            }
            
            $(".rapport").html(result)
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur de la requête
            console.error(error);
        }
    })
}


