
let host = 'http://localhost:8888'

$("#b-avis").click((event) => {
    event.preventDefault()
    let avis = $("#b-comm").val()
    let pseudo = $("#b-pseudo").val()

    if(avis === "" || pseudo === ""){
        $("#avis-alert").html("Remplissez tout les champs avant l'envoie")
    } else{
        $.ajax({
            url: `${host}/zoo/api/avis.php`,
            method: "POST",
            dataType : "json",
            data : {pseudo: pseudo, commentaire: avis},
            success: function(response) {
                $("#avis-alert").html("Avis envoyé")
            }
        })
    }
}) 

function getAvis() {
    $.ajax({
        url: `${host}/zoo/api/avis.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let avis = "";
            let i = 0
            for(let avisEl of response.response) {
                if(!avisEl.is_visible) {
                    continue;
                }
                let a = ""
                if(i === 0) {
                    a = '<div class="carousel-item active text-center"> <h3>' +
                    avisEl.pseudo + " <br> " + avisEl.commentaire + "</h3></div>"
                    i += 1
                }else {
                    a = '<div class="carousel-item text-center"> <h3>' +
                    avisEl.pseudo + " <br> " + avisEl.commentaire + "</h3></div>"
                }
                avis += a;
            }
            $(".avislist").html(avis);
        }
    }) 
}

getAvis()


//pour ajouter service : 
function displayService() {
    $.ajax({
        url: `${host}/zoo/api/service.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let result = ""
            for(let service of response.response) {
                result += 
                `<div>` +
                `<h3>${service.name}</h3>` +
                `<p>${service.description}</p>` +
                `</div>`
            }
            
            $("#service-list").html(result)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
}
displayService()

//Mettre à jour les animaux 
function displayAnimaux() {
    $.ajax({
        url: `${host}/zoo/api/habitat.php`,
        method: "GET",
        dataType : "json",
        success: function(response) {
            let habs = response.response
            $.ajax({
                url: `${host}/zoo/api/animal.php`,
                method: "GET",
                dataType : "json",
                success: function(response) {
                    let animaux = response.response
                    let result = ""
                    for(let hab of habs) {
                        let r0 =
                        `<div>
                        <div>
                                <h2 class="pl-2">${hab.name}</h2>
                                <p class="container-fluid">
                                    ${hab.description}
                                </p>
                        </div>
                        <div class="text-center">
                            <button class="text-center ani">Découvrir les animaux</button>
                        </div>`

                        let r1 = `<div class="anis hidden">`

                        for(let ani of animaux) {
                            if(ani.habitat_id !== hab.habitat_id)
                                continue
                            
                            r1 += `
                            <div>
                            <div class="card mb-3" style="max-width: 540px; background-color: chocolate;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="img/zebre2.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="background-color: chocolate;">
                                            <h5 class="card-title">${ani.surname}</h5>
                                            <p class="card-text hidden">${ani.state}</p>
                                            <button class="etat">Détail de l’état de l’animal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            `
                        }

                        r1 += "</div>"
                        r0 += r1 + "</div>"
                        result += r0
                    }
                    
                    $(".animaux-list").html(result)
                    $(".etat").click(el => {
                        $(el.target).parent().find("p").removeClass("hidden")
                    })
                    $(".ani").click(el => {
                        $(el.target).parent().parent().find(".anis").removeClass("hidden")
                    })
                },
                error: function(xhr, status, error) {
                    // Gérer l'erreur de la requête
                    console.error(error);
                }
            })
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur de la requête
            console.error(error);
        }
    })
}
displayAnimaux()


