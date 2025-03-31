<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    

    <title>Récapitulatif des produits</title>
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

session_start();
            if(!isset($_SESSION["products"]) || empty($_SESSION["products"])){
            echo "<span class='no_product'>Aucun produit en session...</span>";
            } else {
                echo "<table class='table-container'>",
                        // "<h1>PANIER</h1>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                                "<th>Action</th>",
                            "</tr>",
                        "</thead>",
                    "<tbody>";
                $totalGeneral = 0;
                $totalProduct = 0;
                foreach($_SESSION["products"] as $index =>$product){
                    echo "<tr>",
                                "<td>".$index."</td>",
                                "<td>".$product["name"]."</td>",
                                "<td>".number_format($product["price"], 2, ",", "&nbsp")."&nbsp;€</td>",
                                "<td class='modifier_qtt'><a href='traitement.php?action=down_qtt&id=".$index."'> - </a>".$product["qtt"]."<a href='traitement.php?action=up_qtt&id=".$index."'> + </a></td>",
                                "<td>".number_format($product["total"], 2, ",", "&nbsp")."&nbsp;€</td>",
                                "<td><a href='traitement.php?action=delete&id=".$index."'>Supprimer</a></td>",
                                "</tr>";  
                    $totalGeneral += $product["total"];
                    $totalProduct += $product["qtt"];
                }
                    echo "<tr>",
                            "<td class='tgeneral' colspan=3><strong>Total général: </td>",
                            "<td><strong>".$totalProduct."</td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp")."&nbsp;€</td>",
                            "<td class='delete_all'><a href='traitement.php?action=clear_all'>Tout supprimer</a></td>",
                            "</tr>",    
                    "</tbody>",
                    "</table>";
                
                $_SESSION['totalProduct'] = $totalProduct;
            
            }

    // MESSAGES 
            if (isset($_SESSION['delete_message'])) {
                echo "<p>".$_SESSION['delete_message']."</p>";
                unset($_SESSION['delete_message']);  // Supprimer le message après l'affichage
            }    
        
            if (isset($_SESSION['message_down_qtt'])) {
                echo "<p>".$_SESSION['message_down_qtt']."</p>";
                unset($_SESSION['message_down_qtt']);
            }

    ?>
    </main>
    <footer>
    </footer>
</body>
</html>