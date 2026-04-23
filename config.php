<?php
$host = 'localhost';
$dbname = 'lumina_db';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configuration de PDO pour afficher les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Message d'erreur en Français
    die("Erreur de connexion : " . $e->getMessage());
}
?>