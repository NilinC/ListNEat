INSERT INTO storage
VALUES
    (1, 'Placards'),
    (2, 'Frigo'),
    (3, 'Freezer')
;

INSERT INTO category
VALUES
    (1, 'Fruits et légumes'),
    (2, 'Pain et pâtisserie'),
    (3, 'Produits laitiers et œufs'),
    (4, 'Traiteur'),
    (5, 'Surgelés'),
    (6, 'Epicerie salée'),
    (7, 'Epicerie sucrée'),
    (8, 'Boissons'),
    (9, 'Alcools'),
    (10, 'Entretien et nettoyage'),
    (11, 'Hygiène'),
    (12, 'Maison')
;

INSERT INTO ingredient
VALUES
    (1, 'Poireaux', '2p', '2p', null, 2, 1),
    (2, 'Topinambours', '6p', '6p', null, 2, 1),
    (3, 'Emmental râpé', '200g', '100g', null, 2, 3),
    (4, 'Bricks', '6p', '3p', null, 2, 6),
    (5, 'Farine de blé', '1 kg', '800g', null, 1, 7),
    (6, 'tablette de chocolat au lait', '2p', '0.75p', null, 1, 7),
    (7, 'Sucre en poudre', '1 kg', '250g', null, 1, 7),
    (8, 'Noix de coco', '250g', '250g', null, 1, 7),
    (9, 'Lait de coco', '1p', '1p', null, 1, 6),
    (10, 'Pain de campagne', '1p', '0.5p', str_to_date('09-02-2024', '%d-%m-%Y'), 1, 2),
    (11, 'Café Brésil', '250g', '250g', null, 2, 7),
    (12, 'Houmous', '1p', '0.5p', null, 2, 4)
;
