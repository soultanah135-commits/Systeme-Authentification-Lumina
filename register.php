<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hachage du mot de passe (Sécurité renforcée)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$fullname, $email, $hashed_password]);
        
        // Redirection vers la page de connexion en cas de succès
        header("Location: index.php?status=success");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            // Erreur si l'email existe déjà
            die("Cet email est déjà utilisé !");
        } else {
            die("Erreur : " . $e->getMessage());
        }
    }
}
?>