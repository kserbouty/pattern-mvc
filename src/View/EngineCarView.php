<?php

use Archive\Mvc\Controller\EngineCarController;

require_once __DIR__ . '/../../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>MVC PHP</title>
</head>

<body>

    <article id="cars" style="margin: 7em;">
        <h2>Cars</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Model</th>
                    <th scope="col">Engine</th>
                    <th scope="col">Price</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Serial</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $controller = new EngineCarController;
                $orders = $controller->showOrders();

                foreach ($orders as $order) { ?>
                    <tr>
                        <td><?= $order['manufacturer'] ?></td>
                        <td><?= $order['model'] ?></td>
                        <td><?= $order['engine'] ?></td>
                        <td><?= $order['price'] ?>$</td>
                        <td><?= $order['tax'] ?>%</td>
                        <td><?= $order['discount'] ?>%</td>
                        <td>#<?= $order['serial'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </article>

    <?php

    /*
    ### CREATE

    $car = [
        "manufacturer" => "Toyota",
        "model" => "Supra",
        "price" => 20000.99,
        "tax" => 20,
        "discount" => 7,
        "serial" => null,
        "engine" => "3.0"
    ];
    $controller = new EngineCarController;
    $controller->order($car);
    
    ### UPDATE

    $name = "Aygo XII";
    $serial = "62f5640901f31";
    $controller = new EngineCarController;
    $controller->renameModel($name, $serial);

    ### DELETE

    $serial = "62f5643933080";
    $controller = new EngineCarController;
    $controller->cancelOrder($serial);

    */

    ?>

</body>

</html>