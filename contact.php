<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Valider que les champs ne sont pas vides
        switch (true) {
            case empty($nom):
                throw new Exception("Le champ nom est vide.");
            case empty($email):
                throw new Exception("Le champ email est vide.");
            case empty($message):
                throw new Exception("Le champ message est vide.");
        }

        $destinataire = "depoorx@gmail.com";
        $sujet = "Nouveau message de $nom";

        $corps = "Nom : $nom\n";
        $corps .= "Email : $email\n";
        $corps .= "Message : $message\n";
        $entetes = "From: $email";
        
        // Envoyer l'e-mail
        if (mail($destinataire, $sujet, $corps, $entetes)) {
            $response = [
                'success' => true,
                'message' => 'Message envoyé avec succès.',
                'data' => [
                    'nom' => $nom,
                    'email' => $email,
                    'message' => $message
                ]
            ];
            echo json_encode($response);
        } else {
            throw new Exception("Erreur lors de l'envoi de l'e-mail.");
        }
    } catch (Exception $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
        echo json_encode($response);
    }

    exit;
}
?>