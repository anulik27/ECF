-- Insertion de données dans la table role
INSERT INTO role (label) VALUES
('ADMIN'),
('VETERINARY'),
('EMPLOYE');

-- Insertion de données dans la table utilisateur
INSERT INTO utilisateur (username, password, nom, prenom, role_id) VALUES
('user1', SHA1('pass1'), 'User1', 'Nom1', 1),
('user2', SHA1('pass2'), 'User2', 'Nom2', 2),
('user3', SHA1('pass3'), 'User3', 'Nom3', 3);

-- Insertion de données dans la table service
INSERT INTO service (nom, description) VALUES
('Service 1', 'Description du service 1'),
('Service 2', 'Description du service 2'),
('Service 3', 'Description du service 3');

-- Insertion de données dans la table avis
INSERT INTO avis (pseudo, commentaire, isVisible) VALUES
('User1', 'Commentaire de User1', 1),
('User2', 'Commentaire de User2', 0),
('User3', 'Commentaire de User3', 1);

-- Insertion de données dans la table race
INSERT INTO race (label) VALUES
('Race 1'),
('Race 2'),
('Race 3');

-- Insertion de données dans la table image
INSERT INTO image (image_data) VALUES
("logo.jpg");


-- Insertion de données dans la table habitat
INSERT INTO habitat (nom, description, commentaire_habitat, image_id) VALUES
('Habitat 1', 'Description de l\'habitat 1', 'Commentaire de l\'habitat 1', 1),
('Habitat 2', 'Description de l\'habitat 2', 'Commentaire de l\'habitat 2', 1),
('Habitat 3', 'Description de l\'habitat 3', 'Commentaire de l\'habitat 3', 1);

-- Insertion de données dans la table commentaire
INSERT INTO commentaire (commentaire, habitat_id) VALUES
('Commentaire 1', 1),
('Commentaire 2', 2),
('Commentaire 3', 3);

-- Insertion de données dans la table animal
INSERT INTO animal (prenom, etat, habitat_id, race_id) VALUES
('Animal 1', 'Etat 1', 1, 1),
('Animal 2', 'Etat 2', 2, 2),
('Animal 3', 'Etat 3', 3, 3);

-- Insertion de données dans la table alimentation
INSERT INTO alimentation (date, hours, food, quantity, animal_id) VALUES
('2024-04-19', '08:00', 'Food 1', '100g', 1),
('2024-04-19', '12:00', 'Food 2', '150g', 2),
('2024-04-19', '18:00', 'Food 3', '200g', 3);

-- Insertion de données dans la table rapport_veterinaire
INSERT INTO rapport_veterinaire (date, detail, animal_id, utilisateur_id) VALUES
('2024-04-19', 'Détail du rapport 1', 1, 'user1'),
('2024-04-19', 'Détail du rapport 2', 2, 'user2'),
('2024-04-19', 'Détail du rapport 3', 3, 'user3');
