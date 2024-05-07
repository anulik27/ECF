CREATE TABLE service (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(250)
);

CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50),
    commentaire VARCHAR(250),
    isVisible BOOL
);

CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_data VARCHAR(50)
);

CREATE TABLE race (
    race_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50)
);

CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50)
);

CREATE TABLE utilisateur (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50),
    nom VARCHAR(50),
    prenom VARCHAR(50),
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

CREATE TABLE habitat (
    habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(50),
    commentaire_habitat VARCHAR(250),
    image_id INT NOT NULL,
    FOREIGN KEY (image_id) REFERENCES image(image_id)
);

CREATE TABLE commentaire (
    commentaire_id INT AUTO_INCREMENT PRIMARY KEY,
    commentaire VARCHAR(250),
    habitat_id INT NOT NULL,
    FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id)
);

CREATE TABLE animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50),
    etat VARCHAR(50),
    habitat_id INT NOT NULL,
    race_id INT NOT NULL,
    FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id),
    FOREIGN KEY (race_id) REFERENCES race(race_id)
);

CREATE TABLE alimentation (
    alimentation_id INT AUTO_INCREMENT PRIMARY KEY,
    date Date,
    hours VARCHAR(5),
    food VARCHAR(50),
    quantity VARCHAR(50),
    animal_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
);

CREATE TABLE rapport_veterinaire (
    rapport_veterinaire_id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    detail VARCHAR(50),
    animal_id INT NOT NULL,
    utilisateur_id VARCHAR(50),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(username)
);
