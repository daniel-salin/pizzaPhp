<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php
    $pizza = [
        "hackathon" => [
          "price" => 130,
          "toppings" => "eggs, olives, salami"
        ],
        "plug-in" => [
          "price" => 70,
          "toppings" => "salami, onions"
        ],
        "mr robot" => [
          "price" => 200,
          "toppings" => "everything"
        ]
      ];
?>

    <div class="jumbotron">
        <h1>Pizza Order</h1>

        <div class="row">
            <div class="container col-4 bg-primary p-4">
                <h2>Mr Robot</h2>
                <ul>
                    <li>Price: <?= $pizza['mr robot']['price'] ?> SEK </li>
                    <li>Toppings: <?= $pizza['mr robot']['toppings'] ?></li>
                </ul>
            </div>
            <div class="container col-4 bg-danger p-4">
                <h2>Hackathon</h2>
                <ul>
                    <li>Price: <?= $pizza['hackathon']['price'] ?> SEK </li>
                    <li>Toppings: <?= $pizza['hackathon']['toppings'] ?></li>
                </ul>
            </div>

            <div class="container col-4 bg-success p-4">
                <h2>Plugin</h2>
                <ul>
                    <li>Price: <?= $pizza['plug-in']['price'] ?> SEK </li>
                    <li>Toppings: <?= $pizza['plug-in']['toppings'] ?></li>
                </ul>
            </div>
        
            <form class="container bg-warning col-12 p-4" action="index.php" method="get">
                <div class="form-group">
                    <label class="col-form-label" for="hackathon-quant">Hackathon</label>
                    <input type="number" name="hackathon-quant" min="0" max="10" value="0"><br>
                    <label class="col-form-label" for="mr-robot-quant">Mr Robot</label>
                    <input type="number" name="mr-robot-quant" min="0" max="10" value="0"><br>
                    <label class="col-form-label" for="hackathon-quant">Plug-in</label>
                    <input type="number" name="plug-in-quant" min="0" max="10" value="0"><br><br>
                    <button type="submit" class="btn btn-dark" >Add to order</button><br><br>
                    <a href="index.php" class="btn btn-dark">Reset</a>
                </div>
            </form>
        <?php
        if (isset($_GET["mr-robot-quant"]) > 0 || isset($_GET["hackathon-quant"]) > 0 || isset($_GET["plug-in-quant"]) > 0) {
            $order = [];

            if ($_GET["mr-robot-quant"] > 0) {
                for ($i = 0; $i < $_GET["mr-robot-quant"]; $i++) {
                    array_push($order, $pizza['mr robot']['price']);
                }
            }
            if ($_GET["plug-in-quant"] > 0) {
                for ($i = 0; $i < $_GET["plug-in-quant"]; $i++) {
                    array_push($order, $pizza['plug-in']['price']);
                }
            }
            if ($_GET["hackathon-quant"] > 0) {
                for ($i = 0; $i < $_GET["hackathon-quant"]; $i++) {
                    array_push($order, $pizza['hackathon']['price']);
                }
            }
            sort($order);

            $orderDetails = [
                "mr robot" => [
                   "quantity" => $_GET["mr-robot-quant"],
                ],
                "hackathon" => [
                    "quantity" => $_GET["hackathon-quant"],
                ],
                "plug-in" => [
                    "quantity" => $_GET["plug-in-quant"],
                ]
            ];

            if (count($order) % 3 === 0) {
                $cost = array_sum(array_slice($order, 1));
            } else {
                $cost = array_sum($order);
            }

            echo "
            <div class='container bg-info col-12 p-4'>
                <p>Order: 
                    <ul>
                        <li>Mr Robot - " .$orderDetails['mr robot']['quantity'] ."</li>
                        <li>Hackathon - " .$orderDetails['hackathon']['quantity'] ."</li>
                        <li>Plug-in - " .$orderDetails['plug-in']['quantity'] ."</li> 
                    </ul>
                </p>
                <p>Price: $cost SEK</p>
                </div>
                ";
        }
        ?>
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


