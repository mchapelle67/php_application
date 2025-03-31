<?php
    session_start();
    
    
    if(isset($_GET['action'])){
        switch($_GET['action']){
            
            case 'add': 
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                if ($name && $price && $qtt){
                            $product = [
                                "name" => $name,
                                 "price" => $price,
                                "qtt" => $qtt,
                                "total" =>$price*$qtt
                    ];
                    
                    $_SESSION["products"][] = $product;
                    $_SESSION['message'] = "Article en commande.";
                } else {
                      $_SESSION['message'] = "Erreur de saisis.";
                } 

            header("Location:index.php");
            exit;
                
            case 'delete':
            // Vérifier si l'ID du produit à supprimer est spécifié dans l'URL
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $indexToDelete = $_GET['id'];

                    // Supprimer le produit de la session
                    if (isset($_SESSION['products'][$indexToDelete])) {
                    unset($_SESSION['products'][$indexToDelete]);
                    $_SESSION['delete_message'] = "Article supprimé.";
                        } else {
                            $_SESSION['delete_message'] = "Produit introuvable.";
                    }
                } break;

        
                
            case 'clear_all':
            // Supprimer tous les produits de la session
            unset($_SESSION['products']);
            $_SESSION['totalProduct'] = 0;  // Réinitialiser aussi le total
            break;
        
                    
            case 'up_qtt': 
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $idToAdd = $_GET['id'];
                    if (isset($_SESSION['products'][$idToAdd])) {
                    $_SESSION['products'][$idToAdd]['qtt']++;  // Incrémenter la quantité
                    $_SESSION['products'][$idToAdd]['total'] = $_SESSION['products'][$idToAdd]['qtt'] * $_SESSION['products'][$idToAdd]['price'];  // Mettre à jour le total
                    }
                } break;
                        
                        
            case 'down_qtt': 
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $idToAdd = $_GET['id'];
                    if (isset($_SESSION['products'][$idToAdd])) {
                        if ($_SESSION['products'][$idToAdd]['qtt'] > 0) {
                            $_SESSION['products'][$idToAdd]['qtt']--;  
                            $_SESSION['products'][$idToAdd]['total'] = $_SESSION['products'][$idToAdd]['qtt'] * $_SESSION['products'][$idToAdd]['price'];  // Mettre à jour le total
                        }     
                    }
                } break;  
        }
    }

header("Location:recap.php");
exit;

?>


<!-- 
// session: moyen pour stocker des données individuelle pour chaque utilisateur grâce à un identifiant de session unique, 
sa durée de vie par default est de 180 minutes et peut être modifiée par la fonctionssession_cache_expire.
 
 // session_start(): fonction permettant de debuter ou de continuer une session.

 // faille XSS (Cross-site scripting): c'est une vulnaribilité par injections de code malveillant via les paramètres d'entrée client (ex: formulaire).
 Pourquoi ? 
 Les risques: 
 -Vol de cookies ou de jetons sessions, 
 -Altération de donnée ou de contenus,
 -Execution d'un malware...
 Les conséquences sont souvent critiques, voir irreversibles.
 Comment s'en protéger ? 
A l'aide de filtre comme utilisé ci-dessus. 
Par exemple, le filtre FILTER_SANITIZE_SPECIAL_CHARS sert à filtrer les caractères spéciaux utilisés dans le HTML.

 // superglobales: variable native de PHP pouvant être utilisé n'importe où.
 Elles se nomment dans la forme suivante: $_SUPERGLOBAL. 
 Par exemple; $_POST; $_GET; ou $_COOKIE
 -->