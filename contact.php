<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $destinataire = "depoorx@gmail.com";
    $sujet = "Nouveau message de $nom";

    $corps = "Nom : $nom\n";
    $corps .= "Email : $email\n";
    $corps .= "Message : $message\n";
    $entetes = "From: $email";
    // Vous pouvez ajouter ici le code pour envoyer l'e-mail ou enregistrer les données dans une base de données, par exemple.
    // Pour un exemple simple, nous allons simplement afficher les données :
    $response = [
        'success' => true,
        'message' => 'Les données ont été traitées avec succèssss.',
        'data' => [
            'nom' => $nom,
            'email' => $email,
            'message' => $message
        ]
    ];
    if (mail($destinataire, $sujet, $corps, $entetes)) {
        echo json_encode($response);
    }
    
    exit;
}
?>
