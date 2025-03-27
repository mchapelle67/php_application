<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <title>Ajout produit</title>
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
        <form action="traitement.php" method="post">
            <h1> Formulaire de commande </h1>
                <p>
                    <label> Nom du produit:</label>
                        <input type="text" name="name" placeholder="Ex: Banane">
                </p>
                <p>
                    <label>Prix du produit:</label>
                        <input type="number" name="price" step="0.1" placeholder="€">
                </p>
                <p>
                    <label>Quantité désirée:</label> 
                        <input type="number" name="qtt" value="1">
                </p>
                <p class="button">
                        <input type="submit" name="submit" value="Ajouter le produit">
                </p>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>

