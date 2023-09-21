<?php

require_once __DIR__ . '/Models/products.php';
require_once __DIR__ . '/Models/food.php';
require_once __DIR__ . '/Models/games.php';
require_once __DIR__ . '/Models/boxes.php';


$categoryCane = new category('Cane', 'dog.png');
// var_dump($categoryCane);

$categoryGatto = new category('Gatto', 'cat.png');
// var_dump($categoryGatto);

$foodDog = new food('Monge Natural Superpremium', 'dog-food.jpg', 49.99, $categoryCane, 12, ['Agnello - ', 'Riso - ', 'Patate '], '2023-11-24');
// var_dump($foodDog);

$foodCat = new food('Ultima Cat Sterilized', 'cat-food.jpg', 25.99, $categoryGatto, 7, ['Salmone - ', 'Verdure - ', 'Orzo - ', 'Fibre'], '2023-12-15');
// var_dump($foodCat);

$gameDog = new games('Osso di gomma', 'osso-cane.jpg', 18.99, $categoryCane, '32 x 11 x 2,8 cm; 330 grammi', ['Plastica - ', 'Caucciù ']);
// var_dump($gameDog);

$gameCat = new games('Cannetta gioco con topino sonoro', 'gioco-gatto.jpg', 2.99, $categoryGatto, '50', ['Plastica - ', 'Gomma - ', 'Tessuto']);
// var_dump($gameCat);

$boxDog = new boxes('Cuccia per cani in legno Eco Rex', 'cuccia-cane.jpg', 120.48, $categoryCane, 'Outdoor', '78 x 88 x 80 cm', ['Legno massello di abete FSC - ', 'Granito']);
// var_dump($boxDog);

$boxCat = new boxes('Yaheetech Albero Tiragraffi per Gatti', 'tiragraffi.jpg', 46.99, $categoryGatto, 'Indoor', 'Big', ['Velcro - ', 'Legno - ', 'Plastica - ', 'Imbottito']);
// var_dump($boxCat);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Php OOP 2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.5/axios.min.js" integrity="sha512-JEXkqJItqNp0+qvX53ETuwTLoz/r1Tn5yTRnZWWz0ghMKM2WFCEYLdQnsdcYnryMNANMAnxNcBa/dN7wQtESdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav class="d-flex align-items-center header bg-warning" style="height: 80px;">
        <div class="container-fluid">
            <h2 class="mb-0 display-5 fw-bold text-white">Shop Animals</h2>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="./img/<?php echo $foodDog->getImage() ?>" class="card-img-top" alt="<?php echo $foodDog->getImage() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title"><?php echo $foodDog->getTitle() ?></h4>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="m-0 me-2"><?php echo $foodDog->category->getSpecies() ?></p>
                                    <img src="./img/<?php echo $foodDog->category->getIconCategory() ?>" alt="<?php echo $foodDog->category->getIconCategory() ?>" class="icon">
                                </div>
                            </div>
                            <p class="card-text">Prezzo: <strong><?php echo $foodDog->getPrice() ?>&euro;</strong></p>
                            <p class="card-text">Peso: <strong><?php echo $foodDog->getWeight() ?> Kg</strong></p>
                            <p class="card-text">Ingredienti: <strong><?php foreach ($foodDog->getIngredients() as $ingredients) echo $ingredients ?></strong></p>
                            <p class="card-text">Data scadenza: <strong><?php echo $foodDog->getExpirationDate() ?></strong></p>
                            <p class="card-text">
                                <?php
                                if ($foodDog->getAvailable()) {
                                    echo "<span class='text-success'><strong>Disponibile</strong></span>";
                                } else {
                                    echo "<span class='text-danger'><strong>Non Disponibile</strong></span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <img src="./img/<?php echo $gameDog->getImage() ?>" class="card-img-top" alt="<?php echo $foodDog->getImage() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title"><?php echo $gameDog->getTitle() ?></h4>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="m-0 me-2"><?php echo $foodDog->category->getSpecies() ?></p>
                                    <img src="./img/<?php echo $gameDog->category->getIconCategory() ?>" alt="<?php echo $gameDog->category->getIconCategory() ?>" class="icon">
                                </div>
                            </div>
                            <p class="card-text">Prezzo: <strong><?php echo $gameDog->getPrice() ?>&euro;</strong></p>
                            <p class="card-text">Taglia: <strong><?php echo $gameDog->getSize() ?> cm</strong></p>
                            <p class="card-text">Materiali: <strong><?php foreach ($gameDog->getMaterials() as $materials) echo $materials ?></strong></p>
                            <p class="card-text">
                                <?php
                                if ($gameDog->getAvailable()) {
                                    echo "<span class='text-success'><strong>Disponibile</strong></span>";
                                } else {
                                    echo "<span class='text-danger'><strong>Non Disponibile</strong></span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <img src="./img/<?php echo $boxDog->getImage() ?>" class="card-img-top" alt="<?php echo $boxDog->getImage() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title"><?php echo $boxDog->getTitle() ?></h4>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="m-0 me-2"><?php echo $foodDog->category->getSpecies() ?></p>
                                    <img src="./img/<?php echo $boxDog->category->getIconCategory() ?>" alt="<?php echo $boxDog->category->getIconCategory() ?>" class="icon">
                                </div>
                            </div>
                            <p class="card-text">Prezzo: <strong><?php echo $boxDog->getPrice() ?>&euro;</strong></p>
                            <p class="card-text">Tipo: <strong><?php echo $boxDog->getWhere() ?></strong></p>
                            <p class="card-text">Taglia: <strong><?php echo $boxDog->getSize() ?> cm</strong></p>
                            <p class="card-text">Materiali: <strong><?php foreach ($boxDog->getMaterials() as $materials) echo $materials ?></strong></p>
                            <p class="card-text">
                                <?php
                                if ($boxDog->getAvailable()) {
                                    echo "<span class='text-success'><strong>Disponibile</strong></span>";
                                } else {
                                    echo "<span class='text-danger'><strong>Non Disponibile</strong></span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <img src="./img/<?php echo $foodCat->getImage() ?>" class="card-img-top" alt="<?php echo $foodCat->getImage() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title"><?php echo $foodCat->getTitle() ?></h4>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="m-0 me-2"><?php echo $foodCat->category->getSpecies() ?></p>
                                    <img src="./img/<?php echo $foodCat->category->getIconCategory() ?>" alt="<?php echo $foodCat->category->getIconCategory() ?>" class="icon">
                                </div>
                            </div>
                            <p class="card-text">Prezzo: <strong><?php echo $foodCat->getPrice() ?>&euro;</strong></p>
                            <p class="card-text">Peso: <strong><?php echo $foodCat->getWeight() ?> Kg</strong></p>
                            <p class="card-text">Ingredienti: <strong><?php foreach ($foodCat->getIngredients() as $ingredients) echo $ingredients ?></strong></p>
                            <p class="card-text">Data scadenza: <strong><?php echo $foodCat->getExpirationDate() ?></strong></p>
                            <p class="card-text">
                                <?php
                                if ($foodCat->getAvailable()) {
                                    echo "<span class='text-success'><strong>Disponibile</strong></span>";
                                } else {
                                    echo "<span class='text-danger'><strong>Non Disponibile</strong></span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <img src="./img/<?php echo $gameCat->getImage() ?>" class="card-img-top" alt="<?php echo $gameCat->getImage() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title"><?php echo $gameCat->getTitle() ?></h4>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="m-0 me-2"><?php echo $gameCat->category->getSpecies() ?></p>
                                    <img src="./img/<?php echo $gameCat->category->getIconCategory() ?>" alt="<?php echo $gameCat->category->getIconCategory() ?>" class="icon">
                                </div>
                            </div>
                            <p class="card-text">Prezzo: <strong><?php echo $gameCat->getPrice() ?>&euro;</strong></p>
                            <p class="card-text">Taglia: <strong><?php echo $gameCat->getSize() ?> cm</strong></p>
                            <p class="card-text">Materiali: <strong><?php foreach ($gameCat->getMaterials() as $materials) echo $materials ?></strong></p>
                            <p class="card-text">
                                <?php
                                if ($gameCat->getAvailable()) {
                                    echo "<span class='text-success'><strong>Disponibile</strong></span>";
                                } else {
                                    echo "<span class='text-danger'><strong>Non Disponibile</strong></span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <img src="./img/<?php echo $boxCat->getImage() ?>" class="card-img-top" alt="<?php echo $boxCat->getImage() ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title"><?php echo $boxCat->getTitle() ?></h4>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="m-0 me-2"><?php echo $boxCat->category->getSpecies() ?></p>
                                    <img src="./img/<?php echo $boxCat->category->getIconCategory() ?>" alt="<?php echo $boxCat->category->getIconCategory() ?>" class="icon">
                                </div>
                            </div>
                            <p class="card-text">Prezzo: <strong><?php echo $boxCat->getPrice() ?>&euro;</strong></p>
                            <p class="card-text">Tipo: <strong><?php echo $boxCat->getWhere() ?></strong></p>
                            <p class="card-text">Taglia: <strong><?php echo $boxCat->getSize() ?> cm</strong></p>
                            <p class="card-text">Materiali: <strong><?php foreach ($boxCat->getMaterials() as $materials) echo $materials ?></strong></p>
                            <p class="card-text">
                                <?php
                                if ($boxCat->getAvailable()) {
                                    echo "<span class='text-success'><strong>Disponibile</strong></span>";
                                } else {
                                    echo "<span class='text-danger'><strong>Non Disponibile</strong></span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="./script.js"></script>
</body>

</html>