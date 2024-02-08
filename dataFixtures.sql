INSERT INTO storage
VALUES
    (1, 'Placards'),
    (2, 'Frigo'),
    (3, 'Freezer')
;

INSERT INTO ingredient
VALUES
    (1, 'Poireaux', '2p', '2p', null, 2),
    (2, 'Topinambours', '6p', '6p', null, 2),
    (3, 'Emmental râpé', '200g', '100g', null, 2),
    (4, 'Bricks', '6p', '3p', null, 2),
    (5, 'Farine de blé', '1 kg', '800g', null, 1),
    (6, 'tablette de chocolat au lait', '2p', '0.75p', null, 1),
    (7, 'Sucre en poudre', '1 kg', '250g', null, 1),
    (8, 'Noix de coco', '250g', '250g', null, 1),
    (9, 'Lait de coco', '1p', '1p', null, 1),
    (10, 'Pain de campagne', '1p', '0.5p', str_to_date('09-02-2024', '%d-%m-%Y'), 1),
    (11, 'Café Brésil', '250g', '250g', null, 2),
    (12, 'Houmous', '1p', '0.5p', null, 2)
;
