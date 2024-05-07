<!doctype html>
<html lang="en">
  <head>
    <title>Zoo BackEnd Docs</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="p-5 bg-dark">
    <div class="container-fluid shadow bg-light mt-2 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Utilisateur</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/user.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = {
                        password : "",
                        username : ""
                        }
                    </p>
                    <p>
                        response = {
                        response : "ROLE_OF_THE_USER" or "NOT_FOUND"
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                        username : "", ::EMAIL
                        password : "",
                        name : "",
                        surname : "",
                        role : "", ::"VETERINARY | EMPLOYE" 
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>

    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Avis</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/avis.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    avis_id : "",
                                    pseudo : "",
                                    commentaire : "",
                                    is_visible : "",
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">PUT</li>
            <div>
                <code>
                    <p>
                        payload = {
                        avis_id : "",
                        visility : true or false ::Visibility of this comment
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    avis_id : "",
                                    pseudo : "",
                                    commentaire : "",
                                    is_visible : ""
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                        avis_id : ""
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>
    
    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Alimentation</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/alimentation.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    alimentation_id : "",
                                    date : "" ::DATE(YYYY-MM-DD),
                                    hours : "" ::Hours(HH-MM),
                                    food : "",
                                    quantity : "",
                                    animal_id : "" ::NUMBER
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    alimentation_id : "",
                                    date : "" ::DATE(YYYY-MM-DD),
                                    hours : "" ::Hours(HH-MM),
                                    food : "",
                                    quantity : "",
                                    animal_id : "" ::NUMBER
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                        alimentation_id : "" ::NUMBER
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>

    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Commentaire</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/comment.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    commentaire_id : "" ::NUMBER,
                                    commentaire : "",
                                    habitat_id : "" ::NUMBER
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    commentaire_id : "" ::NUMBER,
                                    commentaire : "",
                                    habitat_id : "" ::NUMBER
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                        commentaire_id : "" ::NUMBER
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>

    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Animal</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/animal.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    animal_id : "" ::NUMBER,
                                    surname : "",
                                    state : "",
                                    $race : "",
                                    $habitat_id : "" ::NUMBER
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    animal_id : "" ::NUMBER,
                                    surname : "",
                                    state : "",
                                    $race : "",
                                    $habitat_id : "" ::NUMBER
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">PUT</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    animal_id : "" ::NUMBER,
                                    surname : "",
                                    state : "",
                                    $habitat_id : "" ::NUMBER
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                        animal_id : "" ::NUMBER
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>

    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Habitat</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/habitat.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    habitat_id : "" ::NUMBER,
                                    name : "",
                                    description : "",
                                    $commentaire_habitat : "",
                                    $image : "" ::BLOB
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    habitat_id : "" ::NUMBER,
                                    name : "",
                                    description : "",
                                    $commentaire_habitat : "",
                                    $image : "" ::BLOB
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">PUT</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    habitat_id : "" ::NUMBER,
                                    name : "",
                                    description : "",
                                    $commentaire_habitat : ""
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                        habitat_id : "" ::NUMBER
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>

    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Service</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/service.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    service_id : "" ::NUMBER,
                                    name : "",
                                    description : ""
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    service_id : "" ::NUMBER,
                                    name : "",
                                    description : ""
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">PUT</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    service_id : "" ::NUMBER,
                                    name : "",
                                    description : ""
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                        service_id : "" ::NUMBER
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>

    <div class="container-fluid shadow bg-light mt-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Rapport Veterinaire</li>
                <li class="breadcrumb-item">
                    url = host/zoo/api/veterinary.php?...
                </li>
            </ol>
        </nav>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">GET</li>
            <div>
                <code>
                    <p>
                        payload = NO_NEED
                    </p>
                    <p>
                        response = {
                        response : [
                                {
                                    rapport_veterinaire_id : "" ::NUMBER,
                                    date : "" ::DATE(YYYY-MM-DD),
                                    detail : "",
                                    animal_id : "" ::NUMBER,
                                    ustilisateur_id : "" ::NUMBER
                                }, ...
                            ]
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">POST</li>
            <div>
                <code>
                    <p>
                        payload = {
                                    rapport_veterinaire_id : "" ::NUMBER,
                                    date : "" ::DATE(YYYY-MM-DD),
                                    detail : "",
                                    animal_id : "" ::NUMBER,
                                    ustilisateur_id : "" ::NUMBER
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">PUT</li>
            <div>
                <code>
                    
                    <p>
                        payload = {
                                    rapport_veterinaire_id : "" ::NUMBER,
                                    date : "" ::DATE(YYYY-MM-DD),
                                    detail : ""
                                }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <li class="breadcrumb-item active" aria-current="page">DELETE</li>
            <div>
                <code>
                    <p>
                        payload = {
                            rapport_veterinaire_id : "" ::NUMBER
                        }
                    </p>
                    <p>
                        response = {
                        response : true or false
                        }
                    </p>
                </code>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>