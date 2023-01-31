<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filteredArray = $hotels;
    if(isset($_GET['vote']) && $_GET['vote'] !== ''){

        $tempHotels = [];
        foreach ($hotels as $hotel) {
           if($hotel['vote'] >= $_GET['vote']){
            $tempHotels [] = $hotel;
           }
        }

        $filteredArray = $tempHotels;
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP-HOTEL</title>
</head>
<body>
 <div class="container">
    <div class="row">
        <div class="col-12">
            <h1>lista hotels</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="./index.php" method="GET" class="row my-3">
                <div class="col-sm-4">
                    <label class="control-label">vote</label>
                    <input type="number" class="form-control" placeholder="vote" name="vote">
                </div>
                <div class="col-sm-4">
                <label class="control-label">parking</label>
                    <select class="form-control">
                        <option value="">NO</option>
                        <option value="">SI</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn-sm btn-primary">Filter</button>
                    <button type="reset" class="btn-sm btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <table class="mt-3">
        <thead class=mx-3 >
            <th>NOME</th>
            <th>DESCRIZIONE</th>
            <th>PARCHEGGIO</th>
            <th>VOTO</th>
            <th>DISTANZA DAL CENTRO</th>
        </thead>

        <tbody>
            <?php foreach($filteredArray as $hotel){ ?>

                <tr>
                    <td><?php echo $hotel['name'];  ?></td>
                    <td><?php echo $hotel['description'];  ?></td>
                    <td>
                        <?php if($hotel['parking']){
                            echo 'SI';
                        }else{
                            echo 'NO';
                        };  ?>
                    </td>
                    <td><?php echo $hotel['vote'];  ?></td>
                    <td><?php echo $hotel['distance_to_center'].' km'; ?></td>
                </tr>

            <?php } ?>
            
        </tbody>
    </table>
 </div>
</body>
</html>