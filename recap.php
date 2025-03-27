<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 


    <title>Récapitulatif des produits </title>
</head>
<body>
<header>
        <img class="logo" src="logo.png" alt="Logo">
        <nav class="navigateur">
            <a href="index.php">Formulaire de commande</a>
            <a href="recap.php">Tableaux de commandes</a>
        </nav>
    </header> 
    <main>
        <?php 
            if(!isset($_SESSION["products"]) || empty($_SESSION["products"])){
            echo "<p>Aucun produit en session...</p>";
            } else {
                echo "<table class='table-container'>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",
                    "<tbody>";
                $totalGeneral = 0;
                foreach($_SESSION["products"] as $index =>$product){
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product["name"]."</td>",
                            "<td>".number_format($product["price"], 2, ",", "&nbsp")."&nbsp;€</td>",
                            "<td>".$product["qtt"]."</td>",
                            "<td>".number_format($product["total"], 2, ",", "&nbsp")."&nbsp;€</td>",
                        "</tr>";
                    $totalGeneral += $product["total"];
                }
                    echo "<tr>",
                            "<td class='tgeneral' colspan=4>Total général: </td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp")."&nbsp;€</td>" ,
                        "</tr>",
                    "</tbody>",
                    "</table>";
        }
    ?>
    </main>
    <footer>
    </footer>
</body>
</html>

