<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>E-commerce</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    
    $array = array();
    $_SESSION['cart'] = $array;
    include_once('navbar.php');
    include_once('db_connect.php');

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    // Creazione della tabella prodotti
    echo "<table>";
    echo "<tr>";
    echo "<td>Immagine</td>";
    echo "<td>ID</td>";
    echo "<td>Nome</td>";
    echo "<td>Descrizione</td>";
    echo "<td>Prezzo</td>";
    echo "<td>Aggiungi al carrello</td>";
    echo "</tr>";

    // Visualizzazione dei prodotti
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='images/" . $row["image"] . "'></td>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["price"] . "€</td>";
            echo "<td><a href='prodotti.php?funzione=cart' value=". $row["id"] ."><img src='images/carrello.png'></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nessun prodotto trovato.</td></tr>";
    }
    echo "</table>";
    $conn->close();


    ?>
</body>

</html>