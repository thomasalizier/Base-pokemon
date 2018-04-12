<?php

try {
    $db = new PDO("mysql:dbname=local;host=localhost;port=4002",
        "root",
        "root");
} catch (PDOException $exception){
    echo "Erreur : " . $exception -> getMessage();
}
$response=$db->query("SELECT * FROM pokemon;");


while($donnees=$response->fetch())
{
    echo $donnees{'nom'};
    echo " ";
    echo $donnees{'type1'};
    echo " ";
    echo $donnees{'type2'};
    echo "<br>";
}
?>
<li><a href="PageType/<?php echo $donnees{'type1'}?>.php" class="<?php echo $donnees{'type1'} ?>"><?php echo $donnees{'type1'} ?></a></li>

