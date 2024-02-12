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
    (1, 'oeufs', '12', '5', str_to_date('24-02-2024', '%d-%m-%Y'), 2, 3),
    (2, 'Beurre doux', '250g', '225g', str_to_date('28-03-2024', '%d-%m-%Y'), 2, 3),
    (3, 'Lait de soja', '0.5L', '0.25L', str_to_date('25-07-2024', '%d-%m-%Y'), 2, 3),
    (4, 'Bricks', '6p', '6p', str_to_date('16-04-2024', '%d-%m-%Y'), 2, 6),
    (5, 'Tartibon', '500g', '500g', str_to_date('10-06-2024', '%d-%m-%Y'), 2, 3),
    (6, 'tablette de chocolat au lait', '2p', '0.75p', str_to_date('01-03-2025', '%d-%m-%Y'), 1, 7),
    (7, 'Parmesan', '200g', '200g', str_to_date('15-04-2024', '%d-%m-%Y'), 2, 3),
    (8, 'Noix de coco', '250g', '250g', null, 1, 7),
    (9, 'Lait de coco', '1p', '1p', null, 1, 6),
    (10, 'Knackis', '4p', '4p', str_to_date('09-03-2024', '%d-%m-%Y'), 2, 4),
    (11, 'Café Brésil', '250g', '230g', null, 2, 7),
    (12, 'Sojasun', '8p', '6', str_to_date('27-02-2024', '%d-%m-%Y'), 2, 3),
    (13, 'Carottes', '6', '6', null, 2, 1)
;
