<?php

require_once('database.php');

if(!empty($_GET['id'])) {
  $film_id = intval($_GET['id']);
}

try{
  $results = $db->query('SELECT * FROM film WHERE film_id = '.$film_id);
  $actors_table = $db->query('SELECT actor_id FROM film_actor WHERE film_id = ' .$film_id);
  $actors_id = $actors_table->fetch(PDO::FETCH_ASSOC);
  $actor_name = $db->query('SELECT * FROM actor WHERE actor_id = ' . $actors_id["actor_id"]);
  $actor_names = $actor_name->fetch(PDO::FETCH_ASSOC);

  // $results->execute();
  // echo "<pre>";
  // var_dump($results->fetchAll(PDO::FETCH_ASSOC));
  // echo "</pre>";
  // die();

} catch(Exception $e) {
  echo $e->getMessage();
  die();
}

$film = $results->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1>Sakila Sample Database</h1>

  <h2><?php echo $film['title']; ?></h2>
  <p><?php echo $film["description"]; ?></p>
  <p>Release year: <?php echo $film["release_year"];?> / <em><b>Special features: </b></em> <?php echo $film["special_features"];?></p>
  <p>Featuring actors: <?php echo $actor_names["first_name"] . " "; echo $actor_names["last_name"] ; ?></p>


</body>

</html>
