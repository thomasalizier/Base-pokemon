<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <?php

    try {

        $db = new PDO("mysql:dbname=local;host=localhost;port=4002;charset=UTF8",
            "root",
            "root");
    } catch (PDOException $exception){
        echo "Erreur : " . $exception -> getMessage();
    }
    $response=$db->query("SELECT * FROM pokemon;");
    $DiffType=$db->query("SELECT distinct type1 FROM pokemon;");


    ?>
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/International_Pok%C3%A9mon_logo.svg/269px-International_Pok%C3%A9mon_logo.svg.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pokemon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="row">
        <div class="col-3">
            <!-- Boutton -->
            <ul class="menu-familles">
                <?php
                while($donneesType=$DiffType->fetch()){?>
                    <li class="<?php echo $donneesType{'type1'}?>">
                        <button class="nav-item">
                            <a href="Type.php?type=<?php echo $donneesType{'type1'}?>">
                                <div class="<?php echo $donneesType{'type1'}?>"><?php echo $donneesType{'type1'}?></div>
                            </a>
                        </button>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- boutton -->
        <div class="col-9 bloc-pokemons">


            <!-- fiche pokemon debut -->
            <?php
            while($donnees=$response->fetch()){?>
                <div class="row">
                    <div class="col-3">
                        <ul class="taille-img">
                            <img class="img-fluid" src="<?php echo $donnees{'img'} ?>">
                        </ul>
                    </div>
                    <div class="col-9">
                        <h4><?php echo $donnees{'id'}.'-'.$donnees{'nom'}?></h4>
                        <p class="<?php echo $donnees{'type1'} ?>"> <?php echo $donnees{'type1'} ?> </p>
                        <p class="<?php echo $donnees{'type2'} ?>"> <?php echo $donnees{'type2'} ?> </p>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus aliquid animi atque dolorem eius eligendi exercitationem explicabo fuga, fugit iure laudantium odio, quaerat recusandae rem vero voluptas voluptate voluptates?</p>
                    </div>
                </div>
            <?php } ?>

            <!-- fiche pokemon fin -->

        </div>
    </div>
    <footer>
        Site Internet sur les pokemons, "LE POKEDEX" , créé par Alizier Thomas Etudiant en Première Année de BTS SIO !!
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>