<?php
$cars = [
    ['name' => 'Такси 1', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 2', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 3', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 4', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 5', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
];

$passenger = rand(0, 1000);

/* ===== Ваш код ниже ===== */

$min = null;
foreach($cars as $car){
    if($car['isFree']==true){
        if(abs($car['position'] - $passenger) < $min OR $min === null){
            $min = abs($car['position'] - $passenger);
        }
    }
}

foreach($cars as $car){
    echo $car['name'].", стоит на ".$car['position']." км, до пассажира ".abs($car['position'] - $passenger)." км";
    if($car['isFree']==true){
        echo " (свободен)";
        if(abs($car['position'] - $passenger)==$min){
            echo " - едет эта машина";
        }
        echo "<br/>";
    } else{
        echo " (занят)"."<br/>";
    }
}