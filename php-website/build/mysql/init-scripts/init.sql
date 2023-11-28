-- | CREATING DATABASE | --

CREATE DATABASE IF NOT EXISTS BIKE_SHOP;
USE BIKE_SHOP;

-- Bikes, Scooters, etc...
DROP TABLE IF EXISTS CATEGORY;
CREATE TABLE CATEGORY(
    ID INT NOT NULL,
    NAME VARCHAR(20),
    PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS PRODUCT;
CREATE TABLE PRODUCT(
    ID INT NOT NULL AUTO_INCREMENT,
    CATEGORY_ID INT NOT NULL,
    NAME VARCHAR(300),
    IMAGE LONGTEXT,
    DESCRIPTION LONGTEXT,
    PRICE DECIMAL(10, 2),
    PRIMARY KEY (ID),
    FOREIGN KEY (CATEGORY_ID) REFERENCES CATEGORY (ID)
);

CREATE DATABASE IF NOT EXISTS BIKE_SHOP;
USE BIKE_SHOP;

INSERT INTO CATEGORY (ID, NAME)
VALUES (1, 'Bikes'),
       (2, 'Scooters'),
       (3, 'Accessories'),
       (4, 'Apparel'),
       (5, 'Components');

INSERT INTO PRODUCT (ID, CATEGORY_ID, NAME, IMAGE, DESCRIPTION, PRICE)
VALUES
    (1,
     1,
     'Merida Big Seven 10 D',
     'https://www.99bikes.com.au/media/catalog/product/m/e/merida_big_seven_10_d_mountain_bike_anthracite_green_silver_2021_.png?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300&format=jpeg',
     'Anthracite Green/Silver',
     729.00
    ),
    (
     2,
     1,
     'Pedal Messenger',
     'https://www.99bikes.com.au/media/catalog/product/3/9/399a0010.png?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300&format=jpeg',
     'Black',
     249.00
    ),
    (
     3,
     1,
     'Cube Reaction Hybrid',
     'https://www.99bikes.com.au/media/catalog/product/2/2/22cubereactionhybridperformance400metallicgreynwhite_0_1.jpeg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Grey',
     3397.00
    ),
    (
     4,
     1,
     'Pedal Uptown Classic',
     'https://www.99bikes.com.au/media/catalog/product/d/4/d4s_1984.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Rose Gold',
     299.00
     ),
    (
     5,
     2,
     'Envy Prodigy',
     'https://www.99bikes.com.au/media/catalog/product/e/v/evcspros9mos_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Purple',
     224.00
    ),
    (
     6,
     2,
     'Nitro Circus',
     'https://www.99bikes.com.au/media/catalog/product/n/i/nitro_circus_kids_ryan_williams_replica_scooter_gold-1.jpeg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Gold',
     127.00
    ),
    (
     7,
     2,
     'Globber ONE',
     'https://www.99bikes.com.au/media/catalog/product/4/7/477-101_ft-l_s.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'White',
     249.00
    ),
    (
     8,
     2,
     'BLVD Forge',
     'https://www.99bikes.com.au/media/catalog/product/1/3/13158601_00.png?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300&format=jpeg',
     'Black',
     749.00
    ),
    (
     9,
     3,
     'Garmin Edge 530',
     'https://www.99bikes.com.au/media/catalog/product/r/_/r_edge530_hr_2000.png?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300&format=jpeg',
     'GPS Bike Computer Bundle',
     699.00
    ),
    (
     10,
     3,
     'Yakima DoubleDown',
     'https://www.99bikes.com.au/media/catalog/product/y/a/yak1_1_2.jpeg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     '4 Bike Hitch Rack',
     499.00
    ),
    (
     11,
     3,
     'Magnum Cable Lock',
     'https://www.99bikes.com.au/media/catalog/product/l/o/lock_16_12_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     '180x12',
     34.95
    ),
    (
     12,
     3,
     'BBB EasyFit Bell',
     'https://www.99bikes.com.au/media/catalog/product/b/e/bellbbb.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Black',
     11.99
    ),
    (
     13,
     4,
     '100% Strata Goggles',
     'https://www.99bikes.com.au/media/catalog/product/5/0/50028-00001.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Black with Mirror Silver Lens',
     64.99
    ),
    (
     14,
     4,
     'Shimano RC702',
     'https://www.99bikes.com.au/media/catalog/product/s/h/shoshimrc702wteblack.jpeg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'White/Black',
     329.00
    ),
    (
     15,
     4,
     'FOX Dirtpaw Gloves',
     'https://www.99bikes.com.au/media/catalog/product/f/o/fo25796021_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'Black/Black',
     39.99
    ),
    (
     16,
     4,
     'BBB Impress Sunglasses',
     'https://www.99bikes.com.au/media/catalog/product/1/2/1280_gtboluqgbn32.png?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300&format=jpeg',
     'Black',
     59.99
    ),
    (
     17,
     5,
     'Jet Black Pedal',
     'https://www.99bikes.com.au/media/catalog/product/j/e/jetblack_pedals_black_3.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     'MTB/BMX',
     149.99
    ),
    (
     18,
     5,
     'Shimano Gear Cable',
     'https://www.99bikes.com.au/media/catalog/product/s/h/shimano_shift_cable.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     '1.2mm',
     12.99
    ),
    (
     19,
     5,
     "Stan's Valve Stem",
     'https://www.99bikes.com.au/media/catalog/product/s/t/stans-notubes-universal-mtb-35mm-valve-stem_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     '35mm',
     39.99
    ),
    (
     20,
     5,
     'Freedom Cutlass',
     'https://www.99bikes.com.au/media/catalog/product/i/n/inkedftc262_lifreee_1__1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=300&width=240&canvas=240:300',
     '27.5 x 2.00',
     42.99
    );