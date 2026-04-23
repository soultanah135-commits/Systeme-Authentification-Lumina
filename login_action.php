<? php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD" ] == "POST") {
$email = $_POST['email' ];
$password = $_POST['password' ];
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch();

// Vérification du mot de passe haché
if ($user && password_verify($password, $user['password' ]) ) {
$_SESSION['user_id' ] = $user['id' ];
$_SESSION['user_name' ] = $user['fullname'];

echo "Bienvenue " . $user['fullname' ] . " ! Vous êtes connecté.";
} else {

die("Email ou mot de passe incorrect !");

}